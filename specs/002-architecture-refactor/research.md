# Research: WordPress Theme Architecture Refactoring

**Phase 0 Output** — Branch: `002-architecture-refactor` | Date: 2026-03-26

---

## Decision Log

### D-001 — Class Pattern: Static Methods vs Instantiated Objects

- **Decision**: Use all-static classes (`ArqamWeb_Project`, `ArqamWeb_Theme_Setup`, `ArqamWeb_Assets`) with no instantiation.
- **Rationale**: WordPress themes have a single global execution context. There is one request, one theme, one set of hooks. Singleton patterns and static classes are both valid; static methods are simpler — no `->getInstance()` boilerplate, no injection. WordPress core itself uses many procedural/static patterns.
- **Alternatives considered**: Singleton pattern (`private static $instance`) — adds `getInstance()` boilerplate with no benefit for this use case. Dependency injection container — over-engineered for a theme with no autoloader.
- **Rule**: If a class ever needs to be tested in isolation or needs state, reconsider. For now, static is correct.

---

### D-002 — PHP Namespaces: No

- **Decision**: Do not use PHP namespaces. Use `ArqamWeb_` prefix convention instead.
- **Rationale**: WordPress core does not use namespaces. Namespaces require either Composer autoloading or manual `spl_autoload_register()`. Adding either introduces a dependency and a build step where none exists. The `ArqamWeb_` prefix achieves collision-avoidance at zero cost.
- **Alternatives considered**: `namespace ArqamWeb\Theme;` with Composer autoloading — rejected because this theme has no `composer.json`, no CI/CD, and no Composer-aware deployment. Adding it only for namespaces creates more complexity than it solves.

---

### D-003 — Hook Consolidation: hooks.php vs Registering Hooks in Each Class

- **Decision**: All `add_action`/`add_filter` calls live exclusively in `inc/hooks/hooks.php`. Classes contain only the callback methods, never the registration calls.
- **Rationale**: The primary goal of this refactor is auditability — a developer should be able to open one file and see exactly what the theme hooks into WordPress. If each class registers its own hooks in a `register()` method, the hook registry is fragmented across 5 files. One file beats grep.
- **Alternatives considered**: `ArqamWeb_Assets::register_hooks()` called from `functions.php` — slightly more OOP but defeats the single-registry goal. Accepted pattern in larger plugins but not warranted here.
- **Critical constraint**: `hooks.php` MUST be required LAST in `functions.php`, after all class files are loaded. Requiring it before a class is defined causes a fatal error.

---

### D-004 — ACF Helper Functions: Procedural vs Methods on ArqamWeb_Project

- **Decision**: ACF type-normalization helpers (`arqamweb_get_text_field`, `arqamweb_get_image_field`, etc.) are procedural functions in `inc/helpers/acf-helpers.php`. `ArqamWeb_Project` methods call these internally.
- **Rationale**: The helpers normalize the inconsistency of ACF's return types regardless of which post type is using them. Making them procedural functions keeps them reusable without a class dependency. `ArqamWeb_Project` uses them internally — this is the only consumer right now, but a future `ArqamWeb_Page` class would also benefit.
- **Alternatives considered**: `private static` methods on `ArqamWeb_Project` — makes them private to the project class, not reusable. Rejected.

---

### D-005 — `get_video_id()` Regex: Fail-Safe Return

- **Decision**: `ArqamWeb_Project::get_video_id()` MUST check if `preg_match()` returned 1 (success) before accessing `$matches[1]`. Return `null` on failure.
- **Rationale**: The current production code at `single-project.php:374–378` calls `$video_id = $matches[1]` unconditionally. If `video_url` is empty or not a YouTube URL, `preg_match()` returns 0 and `$matches[1]` is undefined — producing a live PHP notice on every project page without a video URL.
- **Correct pattern**:
  ```php
  public static function get_video_id( int $post_id ): ?string {
      $url = get_field( 'video_url', $post_id );
      if ( empty( $url ) ) return null;
      preg_match( '/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $url, $matches );
      return isset( $matches[1] ) ? $matches[1] : null;
  }
  ```
- **Template must guard**: `<?php if ( $video_id ) : ?>` ... `<?php endif; ?>`

---

### D-006 — Logo Markup Helper: Return String vs Echo Directly

- **Decision**: `arqamweb_get_logo_markup( string $context )` MUST return a string, not echo directly.
- **Rationale**: Functions that echo are not composable. Returning a string allows `echo arqamweb_get_logo_markup('header')` in templates, and also allows `wp_kses_post()` filtering if needed. WordPress `get_` functions return; `the_` functions echo — follow the convention.
- **Usage in templates**: `echo arqamweb_get_logo_markup( 'header' );`

---

### D-007 — `arqamweb_get_page_permalink()`: Slug-Based, Not ID-Based

- **Decision**: Implement `arqamweb_get_page_permalink( string $slug )` using `get_page_by_path( $slug )` — never hardcode page IDs.
- **Rationale**: Page IDs are database-assigned auto-increments. They change on every database import, migration, staging-to-production copy, or multisite clone. Page slugs are human-assigned and environment-independent.
- **Pattern**:
  ```php
  function arqamweb_get_page_permalink( string $slug ): string {
      $page = get_page_by_path( $slug );
      return $page ? esc_url( get_permalink( $page ) ) : esc_url( home_url( '/' ) );
  }
  ```
- **Note**: `get_page_by_path()` is cached by WordPress object cache — no extra DB hit on repeated calls.

---

### D-008 — CF7 Webhook: `wp_add_inline_script` vs `wp_footer` echo

- **Decision**: Replace the raw `echo "<script>...</script>"` in the `wp_footer` action with `wp_add_inline_script( 'contact-form-7', $script )`.
- **Rationale**: Raw echoing bypasses the script dependency system, always fires regardless of whether CF7 is active, and cannot be dequeued by child themes. `wp_add_inline_script()` attaches the script to the CF7 handle, so it only loads when CF7 loads, and can be overridden cleanly.
- **Note**: If CF7 is not active, `contact-form-7` handle doesn't exist and `wp_add_inline_script` silently does nothing — correct behavior.

---

## WordPress API Notes

### `get_page_by_path( $slug )`

Returns a `WP_Post` object for the page at that slug, or `null`. Uses WordPress object cache. Preferred over `get_posts()` for slug-based page lookups.

```php
$page = get_page_by_path( 'quote' ); // WP_Post|null
```

### `wp_add_inline_script( $handle, $data, $position )`

Attaches inline JavaScript to a registered script handle. Outputs immediately before or after the script tag for `$handle`. Silently does nothing if `$handle` is not registered.

```php
wp_add_inline_script( 'contact-form-7', $js_string, 'after' );
```

### Walker class structure in WordPress

`Walker_Nav_Menu` and `Walker` have four key methods: `start_lvl`, `end_lvl`, `start_el`, `end_el`. Extracting to a separate file is a simple file copy — no API changes, no hook changes.

### `filemtime()` in production

On high-traffic production sites, `filemtime()` is called once per request per asset. This is negligible for a theme (< 10 assets). The private `get_asset_version()` method in `ArqamWeb_Assets` centralizes this pattern.

---

## Resolved Unknowns

| Unknown | Resolution |
|---------|------------|
| Does functions.php use PHP namespaces? | No — `use WP_CLI\Context\Auto;` was removed in 001 branch. No other namespace imports. |
| Are the walker classes referenced anywhere besides functions.php? | `Custom_Walker_Nav_Menu` used in `header.php` nav args. `Custom_Footer_Walker` used in `footer.php` nav args. No other references. |
| Does `is_page('quote')` work for the quote page? | Yes — confirmed in 001 branch. Quote page is a standard WordPress page at slug `quote`. |
| What line is the console.log on? | `functions.php:428` per ARCHITECTURE-REFACTOR-SPEC.md |
| Are `arqam_web_posted_on()` etc. actually called? | Need to grep — SPEC-018 requires verification before touching template-tags.php. |
| Does content-project.php have any callers? | Need to grep — SPEC-019 requires verification. |
| What hardcoded page IDs are in footer.php? | `get_permalink(688)`, `get_permalink(691)`, `get_permalink(693)` per spec |
| What hardcoded page ID is in header.php? | `get_permalink(62)` per spec |
