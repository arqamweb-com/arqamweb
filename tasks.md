# Arqam-Web Theme — Codex Tasks

**Generated:** 2026-04-16
**Scope:** Structural / SEO / Accessibility / Security / Performance / i18n cleanup.
**Target stack:** PHP 8.x, WordPress 6.x, Tailwind 3.x, Rank Math.
**Rule of thumb for Codex:** every task below is a self-contained change. Do each task in its own commit. Do not reformat unrelated code.

---

## 0. Summary of what's already good (do NOT change)

- `functions.php` only loads classes/helpers; hook registration lives in `inc/hooks/hooks.php`. Keep this pattern.
- `ArqamWeb_Schema`, `ArqamWeb_Assets`, `ArqamWeb_Theme_Setup`, `ArqamWeb_Project` classes already split concerns cleanly.
- `class-assets.php` uses `filemtime()` cache-busting, preloads the hero font + hero image, and defers non-critical JS. Good.
- `class-schema.php` emits JSON-LD with correct Rank Math integration (`rank_math/json_ld` filter) and OG/canonical/hreflang fallbacks. Good.
- `single.php` already uses `<article itemscope itemtype>`, `<time datetime>`, `fetchpriority`, and a proper H2/H3 hierarchy for related posts. Keep.

Everything below is the *gap list*.

---

## 1. CRITICAL — Fix before anything else

### 1.1 Unify the text domain (i18n is currently broken)

`style.css` declares `Text Domain: arqam-web` but the code uses **three** different domains (`arqam-web`, `arqamweb`, `arqam_web`). Pick **`arqam-web`** (matches the theme slug) and replace globally.

- Do a repo-wide find/replace **inside string literals only** (PHP single/double-quoted strings used as the 2nd argument of `__()`, `_e()`, `_x()`, `_n()`, `esc_html__()`, `esc_attr__()`, `esc_html_e()`, `esc_attr_e()`, `load_theme_textdomain()`):
  - `'arqamweb'` → `'arqam-web'`
  - `"arqamweb"` → `"arqam-web"`
- Do **not** touch variable/function/constant names (`arqam_web_body_classes`, `ARQAM_*`, `arqamweb_get_*()`, etc.).
- Do **not** touch URLs (`arqamweb.com`, `/company/arqamweb/`, etc.).
- After the sweep, run `grep -Rn "'arqamweb'\|\"arqamweb\"" .` — must return 0 hits.

### 1.2 `home.php` — remove duplicate H1, fix invalid HTML, stop XSS on alt attribute

File: `home.php`

Problems:
- Two `<h1>` tags on the same page (one empty, one saying "Blog").
- `<sidebar>` is **not a valid HTML element**; must be `<aside>`.
- `<img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">` bypasses WP's responsive srcset/webp logic, and the alt attribute prints the raw title (XSS risk if title contains quotes).
- Hard-coded English `Blog`, `Read more`, `Previous`, `Next`, `Blog Categories`, `No posts found…` — none are translated.

Rewrite:
- Delete the empty `<h1 class="entry-title font-bold text-2xl sm:text-4xl"></h1>`.
- Keep only one `<h1>` for the page ("Blog"). Wrap it with the `__()` helper.
- Replace `<sidebar>...</sidebar>` with `<aside>...</aside>`.
- Replace the manual `<img>` with `the_post_thumbnail( 'medium', [ 'class' => 'w-full h-48 object-cover', 'loading' => 'lazy', 'decoding' => 'async', 'alt' => the_title_attribute([ 'echo' => false ]) ] );`.
- Wrap every English string in `esc_html_e()` / `esc_html__()` with text domain `arqam-web`.
- Replace `the_posts_pagination` `prev_text`/`next_text` with translatable strings.
- Remove the hard-coded `'category_name' => 'articles'`. The blog index should respect whatever the user has set as the Posts Page. If you need a curated category, expose it via a Customizer setting — do **not** hard-code a slug.

### 1.3 `template-parts/headers/header-page.php` — XSS in H1 split logic

Current code:

```php
echo '<h1 ...>' . $words[0];
if (count($words) > 1) echo ' <span...>' . $words[1] . '</span>';
```

`$words[i]` is raw, unescaped, un-sanitized page title fragments. If a page title ever contains HTML or quotes, it breaks out.

Also `__($header_description, 'arqamweb')` is an **anti-pattern** — gettext cannot extract variables into the .pot file, so this string will never be translatable.

Fix:
- Escape every echoed word with `esc_html()`.
- Replace the dynamic `__($header_description, ...)` call with plain `esc_html( $header_description )` — the caller is already responsible for translating if needed.
- Simplify the whole two-word-gradient trick by letting the site editor control it via an ACF field, or move the styling to CSS (first word + `::first-word`-style span generated once, not in a loop).

### 1.4 SVG upload is currently an unsanitized XSS vector

File: `inc/class-theme-setup.php` → `allow_svg_filetype()` + `add_svg_mime_type()`

`allow_svg_filetype()` returns the file type as-is **without any sanitization**. Any user with `upload_files` capability can upload an SVG containing `<script>` and embed it in the site. Big XSS hole.

Fix one of the following:
1. **Preferred:** remove the SVG upload feature entirely from the theme and instruct admins to install the `safe-svg` plugin (which sanitizes with enshrined/svg-sanitizer).
2. Or restrict to administrators and sanitize:

```php
public static function add_svg_mime_type( array $mimes ): array {
    if ( ! current_user_can( 'manage_options' ) ) return $mimes;
    $mimes['svg']  = 'image/svg+xml';
    return $mimes;
}

public static function sanitize_svg_on_upload( array $file ): array {
    if ( isset( $file['type'] ) && $file['type'] === 'image/svg+xml' && isset( $file['tmp_name'] ) ) {
        $contents = file_get_contents( $file['tmp_name'] );
        if ( stripos( $contents, '<script' ) !== false || stripos( $contents, 'onload=' ) !== false ) {
            $file['error'] = __( 'SVG files containing scripts are not allowed.', 'arqam-web' );
        }
    }
    return $file;
}
add_filter( 'wp_handle_upload_prefilter', [ 'ArqamWeb_Theme_Setup', 'sanitize_svg_on_upload' ] );
```

Pick option 1 unless the user has a strong reason to keep inline theme-level SVG uploads.

### 1.5 Delete dev scratch files from the theme root

Remove from `git` and from the theme:

- `old.php`
- `new.php`
- `error_log` (and add to `.gitignore`)
- `.DS_Store` everywhere (add `**/.DS_Store` to `.gitignore`, `git rm --cached` the existing ones)

These are not WP template hierarchy files and will be silently exposed by direct hits like `https://site.com/wp-content/themes/arqam-web/old.php`. They leak code.

### 1.6 Duplicate `class` attribute in `single-service.php`

Line 14 currently reads:

```php
<main class="pt-24" class="site-main my-8">
```

That's **invalid HTML** (two `class` attributes on one tag — browsers only keep the first). Fix:

```php
<main id="primary" class="pt-24 site-main my-8">
```

Also add `id="primary"` so the skip-link (`#primary`) actually lands on the `<main>` of this template.

---

## 2. HIGH — SEO / Accessibility

### 2.1 Fix `template-parts/content/content.php` (the generic archive card)

Current issues:
- Manual `<img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">` — skips srcset, unescaped output, no width/height, no lazy-loading, no decoding hint.

Replace with:

```php
<?php if ( has_post_thumbnail() ) : ?>
    <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
        <?php
        the_post_thumbnail( 'medium', [
            'class'    => 'w-full h-48 object-cover',
            'loading'  => 'lazy',
            'decoding' => 'async',
            'alt'      => the_title_attribute( [ 'echo' => false ] ),
        ] );
        ?>
    </a>
<?php endif; ?>
```

Same fix applies anywhere templates use `the_post_thumbnail_url()` inside a manual `<img>`. Grep the whole theme:

```
grep -Rn "the_post_thumbnail_url" template-parts/ *.php
```

Convert every hit to `the_post_thumbnail()` with an `alt`/`loading`/`decoding` args array.

### 2.2 `content-review.php` — strip Lovable.dev exported junk

The star/quote SVGs carry dozens of `data-lov-*`, `data-component-*` attributes left over from a Lovable.dev export. They ship to every browser, bloat the HTML, and mean nothing in production.

Remove every `data-lov-*`, `data-component-*` attribute from the review template. Keep only what has semantic value (`viewBox`, `fill`, `stroke`, `aria-hidden="true"`, `focusable="false"`).

Also: the 5 stars are **hard-coded** — the actual `rating` post meta (which `class-schema.php::reviews_aggregate()` already reads) should drive how many filled stars render. Loop `1..5` and compare against `get_post_meta( $id, 'rating', true )`.

### 2.3 `single-service.php` — stop referencing a third-party image

```html
<img src="https://images.unsplash.com/photo-1547658719-..." alt="Web Development" />
```

This is an uncached third-party dependency on every service page — hurts LCP and privacy. Replace with `the_post_thumbnail( 'large', [...] )` so the user can set the image in the editor. If thumbnail is missing, fall back to a local placeholder at `frontend/img/service-placeholder.webp`.

Also in the same file:
- Hard-coded `<a href="/contact">` → `arqamweb_get_page_permalink( ARQAM_CONTACT_PAGE_SLUG )`.
- All English headings, CTAs and body copy must be wrapped in `esc_html_e()` / `__()`.
- Dangling `<button class="...">View Portfolio</button>` has no href/action — either link it to the projects page or remove.

### 2.4 `footer.php` — use helpers/constants, stop hard-coding

Replace the hard-coded values with their existing helper equivalents:

| Hard-coded | Replace with |
|---|---|
| `href="tel:+201118721404"` + visible `+20 111 872 1404` | `esc_url( 'tel:' . ARQAM_WHATSAPP_NUMBER )` + `esc_html( ARQAM_WHATSAPP_NUMBER )` |
| `href="mailto:info@arqamweb.com"` + visible `info@arqamweb.com` | `esc_url( 'mailto:' . ARQAM_CONTACT_EMAIL )` + `esc_html( ARQAM_CONTACT_EMAIL )` |
| `https://www.arqamweb.com/sitemap_index.xml` | `esc_url( home_url( '/sitemap_index.xml' ) )` |
| `<form action="https://arqamweb.com/wp-admin/admin-ajax.php?...">` | `esc_url( admin_url( 'admin-ajax.php' ) ) . '?action=tnp&na=s'` |
| `© <?php echo arqamweb_get_copyright_year(); ?> ArqamWeb. All rights reserved. \| Proudly serving clients since 2010` | wrap in `sprintf( esc_html__( '© %s ArqamWeb. All rights reserved.', 'arqam-web' ), arqamweb_get_copyright_year() )` |
| Newsletter placeholder `"Enter your email"` and submit `"Subscribe"` | `esc_attr__( 'Enter your email', 'arqam-web' )` / `esc_attr__( 'Subscribe', 'arqam-web' )` |

Also add `noopener` `noreferrer` is already present — good. Make sure every `target="_blank"` also has `rel="noopener noreferrer"` (grep the theme; any missing ones need it).

### 2.5 Add meta description fallback to `class-schema.php`

`opengraph_fallback()` already builds a `$desc`. Add a matching `<meta name="description">` emit when no SEO plugin is active. New method `meta_description_fallback()` registered on `wp_head` priority 2. Skip when `self::seo_plugin_active()` returns true.

### 2.6 Add BreadcrumbList JSON-LD fallback

Rank Math emits this when active, but when Rank Math is off, the theme currently does nothing. Add `ArqamWeb_Schema::breadcrumb_list()` that walks the current URL (`is_singular`, `is_category`, `is_tax`, etc.) and emits a `BreadcrumbList` JSON-LD. Skip when `seo_plugin_active()`.

### 2.7 Add `<html lang>` already handled; add `<meta name="theme-color">`

In `header.php` (inside `<head>`, before `wp_head()`):

```html
<meta name="theme-color" content="#269bd9">
```

This matches the brand accent and removes a Lighthouse warning.

### 2.8 `single-service.php` and `front-page.php` — add schema for service/creative list

Already partially covered by `class-schema.php::enhance_rank_math_schema()` for `Service`. Double-check it fires by verifying `is_singular( 'service' )` resolves (the theme's template is `single-service.php` — post type slug must be `service`). If the CPT slug is different (e.g. `services`), update the `is_singular()` check.

### 2.9 Missing `loading="lazy"` on decorative background images

Grep: `grep -Rn "background-line\|Line-background\|Section-background" template-parts/`

Every decorative `<img>` with `aria-hidden="true"` must also carry `loading="lazy"` and explicit `width`/`height` to avoid CLS. Already done in `frontpage-blog.php`; verify all decorative images.

### 2.10 `archive.php` — malformed markup

The `<?php endif; ?>` closes too late relative to `<div class="grid">`. The current indentation hides an open-tag/close-tag mismatch. Rewrite the structure so:

```
<main>
  <?php if ( have_posts() ) : ?>
    <header>...</header>
    <div class="container">
      <div class="grid">
        <?php while (...) : ... endwhile; the_posts_navigation(); ?>
      </div>
    </div>
  <?php else : ?>
    <?php get_template_part( 'template-parts/content/content', 'none' ); ?>
  <?php endif; ?>
</main>
```

Also: the archive title should be an `<h1>` inside a `<header>` — currently OK — but add `aria-label` to `<main>` so screen readers announce the archive term.

### 2.11 `404.php` — translate all strings

Three hard-coded Arabic strings. Wrap each in `esc_html__( '...', 'arqam-web' )` or `esc_html_e()` so translations are possible. Keep the Arabic as the default (source) text.

---

## 3. MEDIUM — Structure / Maintainability

### 3.1 Refactor oversize templates

- `template-parts/quote-new.php` is **98 KB** in one file. Break it into `template-parts/quote/` with one partial per section (hero, form-step-1, form-step-2, summary, etc.). Load each via `get_template_part()`.
- `single-project.php` is **39 KB**. Split into:
  - `template-parts/project/project-hero.php`
  - `template-parts/project/project-stats.php`
  - `template-parts/project/project-showcase.php`
  - `template-parts/project/project-transform.php`
  - `template-parts/project/project-phases.php`
  - `template-parts/project/project-features.php`
  - `template-parts/project/project-cta.php`
  - `template-parts/project/project-related.php`

Keep the data access in `ArqamWeb_Project` (already there). Each partial should consume the class methods, not `get_field()` directly.

### 3.2 Move inline `<style>` blocks out of templates

Inline `<style>` appears in:
- `template-parts/content/content-page.php` (`p { margin-bottom: 1.5em; }`)
- `single-service.php` (entry-content heading/paragraph rules)
- `template-parts/frontpage/frontpage-slider.php` (typewriter caret styles)

Move these selectors to `frontend/src/style.scss`, rebuild `frontend/public/style.min.css`, and delete the `<style>` tags from the templates. Prevents duplicate CSS delivery on every request.

### 3.3 Extract repeating inline SVGs

The footer repeats ~9 identical lucide icons inline. Create `template-parts/icons/` with one file per icon (`icon-facebook.php`, `icon-instagram.php`, etc.) and a helper:

```php
function arqamweb_icon( string $name, array $attrs = [] ): void {
    $path = get_template_directory() . "/template-parts/icons/icon-{$name}.php";
    if ( file_exists( $path ) ) {
        set_query_var( 'icon_attrs', $attrs );
        include $path;
    }
}
```

Replace the inline SVGs in `footer.php`, `content-review.php`, `frontpage-slider.php` with `arqamweb_icon( 'facebook', [ 'class' => '...' ] )`.

### 3.4 Clean up stale metadata files

- `style.css` header:
  - `Tested up to: 5.4` → `Tested up to: 6.4`
  - `Requires PHP: 5.6` → `Requires PHP: 8.0`
  - `Text Domain: arqam-web` is correct — keep.
  - Rewrite the Description to reflect the actual theme (remove the "Astra" phrasing).
- `readme.txt`:
  - Same version bumps as above.
  - Add a proper Description paragraph + Changelog entry for the current version.
- `package.json`:
  - Replace the `description` field (currently a copy of Astra's description) with something honest.
  - `name` is `"Arqam Web"` with a space — rename to `"arqam-web"` (npm-safe).
  - `homepage` / `repository` / `bugs` still point to `Automattic/_s` — update or remove.

### 3.5 Replace `screenshot.gif` with `screenshot.png`

WordPress themes expect `screenshot.png` at 1200×900. Animated GIF screenshots are unsupported by the theme browser and do not render correctly in the admin. Export one static 1200×900 PNG and replace.

### 3.6 Harden `template-parts/` against direct access

Every file inside `template-parts/` should start with:

```php
<?php
if ( ! defined( 'ABSPATH' ) ) exit;
```

Several files currently don't (e.g. `template-parts/content/content.php`, `template-parts/frontpage/frontpage-*.php`). Walk the directory and add the guard to every `.php` file that is missing it.

### 3.7 Extract `cf7_webhook_script` URL into a constant

`inc/class-assets.php::cf7_webhook_script()` hard-codes `https://n8n.arqamweb.com/webhook/cf7-lead`. Promote to a constant in `functions.php`:

```php
if ( ! defined( 'ARQAM_CF7_WEBHOOK_URL' ) ) {
    define( 'ARQAM_CF7_WEBHOOK_URL', 'https://n8n.arqamweb.com/webhook/cf7-lead' );
}
```

and reference `ARQAM_CF7_WEBHOOK_URL` inside the inline JS. Also wrap the whole registration so it only runs when CF7 is active:

```php
if ( ! defined( 'WPCF7_VERSION' ) ) return;
```

---

## 4. LOW — Nice-to-have polish

### 4.1 Add `inc/helpers/svg-helpers.php`

Central helper to render icons server-side (see 3.3). Register in `functions.php` near the other helpers.

### 4.2 Add a `sizes` attribute for responsive thumbnails

Every `the_post_thumbnail( 'large', … )` should also receive a `sizes` arg so browsers pick the right srcset candidate:

```php
the_post_thumbnail( 'large', [
    'sizes' => '(max-width: 640px) 100vw, (max-width: 1024px) 50vw, 33vw',
    ...
] );
```

Do this for the card thumbnails in `content.php`, `custom-loop-blog.php`, `home.php`, `custom-loop-projects.php`.

### 4.3 Add preload for Dubai-Bold font variant

`class-assets.php::preload_hints()` only preloads `Dubai-Regular.woff2`. If the theme uses `Dubai-Bold.woff2` on the hero H1, add a second preload line, otherwise FOUT appears on first paint.

### 4.4 Expose the phone/email/social URLs in the Customizer

All of `ARQAM_WHATSAPP_NUMBER`, `ARQAM_CONTACT_EMAIL`, `ARQAM_SOCIAL_FACEBOOK_URL`, `ARQAM_SOCIAL_INSTAGRAM_URL`, `ARQAM_SOCIAL_LINKEDIN_URL` currently have to be edited in `functions.php`. Move them into a Customizer section `arqam_web_contact_info` with `get_theme_mod()` fallback to the current `defined()` constants, so the client can change them without touching code.

### 4.5 Add a `robots_txt` filter

```php
add_filter( 'robots_txt', function ( $output, $public ) {
    if ( $public ) {
        $output .= "\nSitemap: " . esc_url( home_url( '/sitemap_index.xml' ) ) . "\n";
    }
    return $output;
}, 10, 2 );
```

Put it in `inc/hooks/hooks.php`.

### 4.6 Add `rel="preconnect"` for the n8n webhook domain

If the CF7 → n8n handshake is performance-critical at first form submit, add in `preload_hints()`:

```php
echo "\t" . '<link rel="preconnect" href="https://n8n.arqamweb.com" crossorigin>' . "\n";
```

Only on the `is_page( ARQAM_CONTACT_PAGE_SLUG )` or `is_page( ARQAM_QUOTE_PAGE_SLUG )` pages.

### 4.7 `.editorconfig` + `.gitattributes`

Add an `.editorconfig` with:

```
root = true
[*]
indent_style = tab
indent_size = 4
end_of_line = lf
charset = utf-8
trim_trailing_whitespace = true
insert_final_newline = true

[*.{js,json,css,scss,yml}]
indent_style = space
indent_size = 2
```

And a `.gitattributes` that forces LF line endings on PHP/CSS/JS.

### 4.8 Composer

`composer.json` exists but `inc/` is manually `require`'d. If nothing in `vendor/` is used by the theme at runtime, delete `composer.json`, `composer.lock`, `vendor/` from the theme package (keep dev-only tools in a separate `composer.json` that is `.gitignore`'d for production).

Run `grep -Rn "require 'vendor" *.php inc/` — if no runtime use, remove.

---

## 5. Verification step — run after applying all tasks

Codex must finish by doing each of these and reporting pass/fail:

1. `grep -Rn "'arqamweb'" .` — expect **0** matches.
2. `grep -Rn "old\.php\|new\.php\|\.DS_Store\|error_log" .` — expect only `.gitignore` matches.
3. `grep -Rn "the_post_thumbnail_url" template-parts/ *.php` — expect **0** matches.
4. `grep -Rn "data-lov-\|data-component-" template-parts/` — expect **0** matches.
5. Open the homepage HTML in a browser / `curl` → exactly **one** `<h1>` per page (check front page, blog, archive, single, 404, search).
6. W3C validator pass for front page, a single post, and a 404.
7. Lighthouse SEO + Accessibility ≥ 95 on front page and a single post.
8. Rich Results Test (Google) passes for:
   - Organization / LocalBusiness
   - FAQPage (front page)
   - Article (single post)
   - CreativeWork (single project)
   - Service (single service)
   - BreadcrumbList

If any check fails, the corresponding task is not done.

---

## Suggested commit order for Codex

1. §1.1 — text-domain unification (isolated, low risk, touches everything).
2. §1.5 — delete dev scratch files.
3. §1.2, §1.3, §1.6 — fix the HTML/XSS bugs in `home.php`, `header-page.php`, `single-service.php`.
4. §1.4 — SVG security fix.
5. §2.1 – §2.4 — SEO / accessibility fixes on card & footer templates.
6. §2.5 – §2.8 — schema/meta additions.
7. §3.1 – §3.7 — refactors.
8. §4.1 – §4.8 — polish.
9. §5 — verification.
