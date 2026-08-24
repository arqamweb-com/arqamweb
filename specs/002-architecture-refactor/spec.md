# Feature Specification: WordPress Theme Architecture Refactoring

**Feature Branch**: `002-architecture-refactor`
**Created**: 2026-03-26
**Status**: Draft
**Input**: Software Architect analysis of arqam-web theme — logic buried in templates, 494-line functions.php, 20+ raw get_field() calls, hardcoded page IDs and URLs

---

## User Scenarios & Testing

### User Story 1 — Developer Finds All Hooks in One Place (Priority: P1)

A developer joining the project opens `inc/hooks/hooks.php` and sees every `add_action`/`add_filter` registration in one file. They don't need to grep `functions.php` to understand what fires when.

**Why this priority**: The hook consolidation is the architectural north star of this refactor. Every other change supports it. A project without a hook registry is a project where every change risks a conflict.

**Independent Test**: Run `grep -r "add_action\|add_filter" functions.php inc/ --include="*.php"`. Only `inc/hooks/hooks.php` should contain results (except for any hooks inside class method bodies, which are registered from hooks.php).

**Acceptance Scenarios**:

1. **Given** the refactor is complete, **When** `grep -r "add_action\|add_filter" functions.php` runs, **Then** zero results appear (no hooks in functions.php).
2. **Given** `inc/hooks/hooks.php` exists, **When** opened, **Then** all theme hooks are listed — Theme Setup, Assets, Template, Walker classes — in labeled sections.

---

### User Story 2 — Template Has Zero Direct ACF Calls (Priority: P1)

A developer viewing `single-project.php` sees no `get_field()` calls. All data access goes through `ArqamWeb_Project::get_*()` static methods that return clean, typed values.

**Why this priority**: Raw `get_field()` in templates means field name changes require grep-and-replace across multiple files. The class is the single source of truth for field names.

**Independent Test**: Run `grep -r "get_field(" single-project.php template-parts/`. Zero results.

**Acceptance Scenarios**:

1. **Given** the refactor is complete, **When** `grep "get_field(" single-project.php` runs, **Then** zero results appear.
2. **Given** a project with no `video_url` field, **When** its page loads, **Then** the video section is completely absent with zero PHP notices in `error_log`.
3. **Given** `ArqamWeb_Project::get_portfolio_image($id)` is called with a post where the ACF field returns a string URL, **Then** it returns a normalized array with fallback `width`/`height` values.

---

### User Story 3 — functions.php Under 60 Lines (Priority: P1)

A developer opens `functions.php` and finds only: constants, requires, and a closing tag. No logic, no class definitions, no inline hooks.

**Why this priority**: 494 lines of mixed concerns in a single file is the root cause of every maintainability problem in the theme. This is the most visible measure of success.

**Independent Test**: `wc -l functions.php` returns a number under 60.

**Acceptance Scenarios**:

1. **Given** the refactor is complete, **When** `wc -l functions.php` runs, **Then** the line count is under 60.
2. **Given** `functions.php`, **When** opened, **Then** no class definition, no `add_action`/`add_filter`, and no business logic is present.

---

### User Story 4 — No Hardcoded Page IDs or URLs in Templates (Priority: P2)

A developer searching for `get_permalink(` in any template file finds zero results. All page links use named constants or helper functions.

**Why this priority**: `get_permalink(62)` breaks silently after a database migration, import, or staging→production copy. Named slugs are environment-independent.

**Independent Test**: `grep -r "get_permalink([0-9]" . --include="*.php"` returns zero results.

**Acceptance Scenarios**:

1. **Given** the refactor is complete, **When** `grep -rn "get_permalink([0-9]" .` runs across all PHP files, **Then** zero results.
2. **Given** `arqamweb_get_page_permalink( ARQAM_QUOTE_PAGE_SLUG )` is called, **Then** it returns the correct escaped URL of the Quote page on both local and production.
3. **Given** the copyright year in the footer, **When** the page loads in 2027, **Then** it shows "2027" without any code change.

---

### User Story 5 — Visual Output Identical Pre- and Post-Refactor (Priority: P1)

A QA reviewer visually comparing the site before and after the refactor sees no difference on any page — homepage, project pages, projects archive, quote page, 404.

**Why this priority**: This is a pure refactoring. Any visual change is a regression.

**Independent Test**: Take full-page screenshots before and after using a browser automation tool (or manual visual inspection). All pages render identically.

**Acceptance Scenarios**:

1. **Given** any page, **When** loaded after the refactor, **Then** navigation, logo, footer, content, and styles are visually identical to before.
2. **Given** a project page with a video, **When** loaded, **Then** the video thumbnail and modal function identically.
3. **Given** the footer, **When** loaded, **Then** social links, copyright year, and page links all work.

---

### Edge Cases

- What if `get_page_by_path( ARQAM_QUOTE_PAGE_SLUG )` returns `null`? → `arqamweb_get_page_permalink()` MUST fall back to `home_url('/')`.
- What if ACF `get_field()` returns `false` (field not set)? → All ACF helper functions MUST return the documented fallback type, never `false`.
- What if `ArqamWeb_Project::get_video_id()` is called for a post with an invalid YouTube URL? → MUST return `null` (not `$matches[1]` which is undefined).
- What if a walker class file is required but the file doesn't exist? → PHP fatal — the `require` in `functions.php` will catch this at load time, not silently.
- What if `ARQAM_WHATSAPP_NUMBER` is the placeholder value? → `arqamweb_get_whatsapp_url()` returns a valid `https://wa.me/` URL regardless — editors update the constant.
- What if Phase 5 breaks the hooks? → Each phase is independently deployable. If Phase 5 fails, revert only `inc/hooks/hooks.php` and restore inline hooks to `functions.php`.

---

## Requirements

### Functional Requirements

- **FR-001**: All `add_action` and `add_filter` calls MUST reside exclusively in `inc/hooks/hooks.php`.
- **FR-002**: `functions.php` MUST contain only constants, `require` statements, and nothing else (target: under 60 lines).
- **FR-003**: No template file (`.php` in root or `template-parts/`) MUST call `get_field()` directly — all ACF access goes through `ArqamWeb_Project` static methods.
- **FR-004**: No template file MUST call `get_permalink( INT )` — all page links go through `arqamweb_get_page_permalink( STRING_SLUG )`.
- **FR-005**: All ARQAM_ constants MUST be defined with `if ( ! defined(...) )` guards.
- **FR-006**: `ArqamWeb_Project::get_video_id()` MUST return `null` when `video_url` is empty or does not match the YouTube URL regex.
- **FR-016**: All `ArqamWeb_Project` methods returning text or URLs MUST return raw unescaped values. Templates are responsible for calling `esc_html()`, `esc_attr()`, or `esc_url()` at render time. This follows the WordPress `get_*()` convention and preserves reusability in non-HTML contexts.
- **FR-007**: `ArqamWeb_Project::get_portfolio_image()` MUST handle both ACF "Image Array" format and "Image URL" string format, returning a normalized `['url','alt','width','height']` array.
- **FR-017**: `ArqamWeb_Project::get_featured_projects()`, `get_all_projects()`, and `get_related_projects()` MUST all return a `WP_Query` object. Templates use the standard `have_posts()` / `the_post()` / `wp_reset_postdata()` loop. No method returns a `WP_Post[]` array.
- **FR-018**: `ArqamWeb_Project::get_action_button()` MUST return `['text' => string, 'url' => string]` when `action_button_text` is non-empty, or `null` otherwise. Templates MUST guard with `if ( $btn )` before accessing keys.
- **FR-019**: SPEC-014 (`ArqamWeb_Theme_Setup`) and SPEC-015 (`ArqamWeb_Assets`) MUST each be extracted atomically — all methods of a class created and all corresponding old functions deleted from `functions.php` in one change. No temporary wrapper functions. Verify site loads after each class before extracting the next.
- **FR-008**: Logo markup MUST be generated by `arqamweb_get_logo_markup()` in both `header.php` and `footer.php` — no duplicated `<picture>` HTML. The function MUST apply `esc_url()` and `esc_attr()` to all dynamic values internally. Templates call `echo arqamweb_get_logo_markup( 'header' )` with no additional escaping.
- **FR-020**: HTML-generating functions in `inc/helpers/template-helpers.php` (those returning complete HTML strings) MUST escape all dynamic values internally using `esc_url()`, `esc_attr()`, or `esc_html()`. FR-016 (raw return values) applies exclusively to data-accessor methods on `ArqamWeb_Project`.
- **FR-021**: `ArqamWeb_Project::get_transform_cards()` MUST return an `array` of card arrays, each with exactly four keys: `['icon' => string, 'tag' => string, 'title' => string, 'desc' => string]`. Missing ACF fields default to empty string. Cards with an empty `title` MUST be excluded from the returned array.
- **FR-022**: `ArqamWeb_Project::get_showcase_images()` MUST return an `array` of normalized image arrays, each with keys `['url' => string, 'alt' => string, 'width' => int, 'height' => int]`, produced by calling `arqamweb_get_image_field()` on each of `image_1`–`image_4`. Elements where `arqamweb_get_image_field()` returns `null` MUST be excluded from the result.
- **FR-009**: `ArqamWeb_Assets::get_asset_version()` private method MUST eliminate repeated `filemtime()` pattern (currently 7 occurrences in `enqueue()`).
- **FR-010**: CF7 webhook inline script MUST be attached via `wp_add_inline_script( 'contact-form-7', $script )` instead of raw `echo` in footer.
- **FR-011**: `body_class` filter for `font-[Dubai]` MUST be merged into `arqam_web_body_classes()` in `template-functions.php` — no duplicate filter registrations.
- **FR-012**: `console.log` in `add_custom_admin_script()` MUST be removed before any other change.
- **FR-013**: All new class files MUST use the `ArqamWeb_` prefix and `class-*.php` filename convention.
- **FR-014**: Visual output MUST be identical to pre-refactor on all pages. No behavioral changes.
- **FR-015**: Zero PHP errors or notices in `error_log` on any page after full refactor.

### Key Entities

- **ArqamWeb_Project**: Static class providing all ACF data access for project post type. Lives in `inc/class-project.php`. No instantiation.
- **ArqamWeb_Theme_Setup**: Static class providing theme setup, widget registration, SVG support, image threshold. Lives in `inc/class-theme-setup.php`.
- **ArqamWeb_Assets**: Static class providing asset enqueue, preload hints, defer filter, admin TinyMCE script, CF7 webhook. Lives in `inc/class-assets.php`.
- **ARQAM_ Constants**: Named constants for page slugs, contact info, social URLs — defined at top of `functions.php`.
- **ACF Helper Functions**: Procedural functions in `inc/helpers/acf-helpers.php` — normalize inconsistent ACF return types.
- **Template Helper Functions**: Procedural functions in `inc/helpers/template-helpers.php` — logo markup, page permalinks, social/contact accessors.

---

## Success Criteria

### Measurable Outcomes

- **SC-001**: `wc -l functions.php` returns ≤ 60.
- **SC-002**: `grep -r "add_action\|add_filter" functions.php` returns zero results.
- **SC-003**: `grep -r "get_field(" single-project.php template-parts/` returns zero results.
- **SC-004**: `grep -rn "get_permalink([0-9]" . --include="*.php"` returns zero results.
- **SC-005**: All pages load with zero PHP errors in `error_log`.
- **SC-006**: Visual output on homepage, single-project, projects archive, and quote page is identical to pre-refactor (manual inspection).
- **SC-007**: A project page with empty `video_url` shows no video section and no PHP notice.
- **SC-008**: Copyright year in footer matches current year without code change.
- **SC-009**: `inc/hooks/hooks.php` lists all theme hooks (theme setup, assets, template, walkers) in one file.
- **SC-010**: `inc/class-project.php` contains all 17 methods documented in SPEC-007.

---

## Clarifications

### Session 2026-03-26

- Q: Should `ArqamWeb_Project` methods return raw unescaped values, or pre-escaped values? → A: Raw values. Templates own escaping at render time (`esc_html()`, `esc_attr()`, `esc_url()`). Follows WordPress `get_*()` convention.
- Q: Should `get_featured_projects()`, `get_all_projects()`, and `get_related_projects()` return `WP_Query` or `WP_Post[]`? → A: All three return `WP_Query`. Templates use `have_posts()` / `the_post()` / `wp_reset_postdata()` loop. Consistent with existing template loop code and WordPress core patterns.
- Q: What is the return array shape for `ArqamWeb_Project::get_action_button()`? → A: `['text' => string, 'url' => string]` or `null` if `action_button_text` is empty. Template checks `if ( $btn )` then uses `$btn['text']` and `$btn['url']`.
- Q: When extracting `ArqamWeb_Theme_Setup` and `ArqamWeb_Assets` in Phase 5, use big-bang per class or incremental per method? → A: Big-bang per class. Extract all methods of one class atomically, remove old functions from `functions.php` in the same change, verify site loads, then do the next class. No temporary wrappers or zombie functions.
- Q: Do HTML-generating template helpers (`arqamweb_get_logo_markup()`) escape internally, or do templates escape after? → A: HTML-generating helpers escape internally — they apply `esc_url()`/`esc_attr()` to all dynamic values before embedding. Templates call bare `echo`. FR-016 (raw return values) applies only to data-accessor methods on `ArqamWeb_Project`, not to HTML-string-returning helpers.
- Q: What are the per-card array keys for `ArqamWeb_Project::get_transform_cards()`? → A: `['icon' => string, 'tag' => string, 'title' => string, 'desc' => string]`. Missing fields default to empty string. Cards with empty `title` excluded from result.
- Q: What format does each element of `ArqamWeb_Project::get_showcase_images()` use? → A: Normalized array `['url' => string, 'alt' => string, 'width' => int, 'height' => int]` via `arqamweb_get_image_field()` internally — same shape as `get_portfolio_image()`. Images where field returns null are excluded from the result array.

---

## Assumptions

- WordPress 6.x, PHP 8.x — no namespace/autoloader required; `ArqamWeb_` prefix is sufficient.
- ACF (Advanced Custom Fields) Pro is installed and active.
- The existing `inc/template-functions.php`, `inc/template-tags.php`, `inc/customizer.php`, `inc/custom-header.php` files exist and are required from `functions.php`.
- No automated test suite exists — validation is manual (grep verification + visual inspection + error_log).
- The refactor is implemented one phase at a time; each phase is independently verifiable before proceeding to the next.
- `create-new-feature.sh` already created branch `002-architecture-refactor` and `specs/002-architecture-refactor/` directory.
- The performance fixes from `001-performance-accessibility-fixes` are already merged — this refactor builds on top of them.
