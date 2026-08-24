# Feature Specification: Performance & Accessibility Fixes

**Feature Branch**: `001-performance-accessibility-fixes`
**Created**: 2026-03-26
**Status**: Draft
**Input**: Audit of arqam-web WordPress theme — 21 issues across 6 categories (performance, CLS, LCP, JS errors, font loading, accessibility)

---

## User Scenarios & Testing

### User Story 1 — Fast First Paint on Homepage (Priority: P1)

A visitor lands on the homepage on a mobile device with a mid-range connection. The page should feel fast: the hero appears quickly, no content jumps around, and the font displays immediately without invisible text.

**Why this priority**: LCP and CLS directly affect Google search ranking and first impressions. This is the highest-traffic page.

**Independent Test**: Run Lighthouse on the homepage in mobile mode with "Slow 4G" throttling. Pass = Performance ≥ 85, CLS < 0.1, LCP < 2.5s.

**Acceptance Scenarios**:

1. **Given** a mobile visitor on Slow 4G, **When** the homepage loads, **Then** the hero image is the LCP element and paints within 2.5s.
2. **Given** the page loads, **When** the logo and hero image appear, **Then** no layout shift occurs (no elements move after initial paint).
3. **Given** `font-display: swap` is set, **When** the Dubai font loads, **Then** fallback text is visible immediately and swaps without layout shift.

---

### User Story 2 — Accessible Social Links for Screen Reader Users (Priority: P1)

A visually impaired user navigating the footer with a screen reader should be able to identify and activate each social media link by its purpose.

**Why this priority**: Missing accessible labels are a WCAG 2.1 AA Critical violation — the most severe accessibility failure category.

**Independent Test**: Tab to each footer social link with VoiceOver or NVDA. Each link must be announced with its destination (e.g. "Follow ArqamWeb on Facebook, link").

**Acceptance Scenarios**:

1. **Given** a screen reader user focuses on the Facebook link, **When** it is announced, **Then** it reads "Follow ArqamWeb on Facebook" (not just "link" or empty).
2. **Given** each SVG icon, **When** scanned by axe DevTools, **Then** zero "links must have discernible text" errors appear.

---

### User Story 3 — No JavaScript Errors on Any Page (Priority: P1)

A developer or visitor on any page of the site should never see a TypeError or uncaught exception in the browser console caused by the theme.

**Why this priority**: The current `menuBtn.addEventListener` crash silently breaks all subsequent JS on pages without `#menu-btn`, including analytics and form handling.

**Independent Test**: Open DevTools Console on the homepage, single-project page, quote page, and 404 page. Zero errors from theme scripts.

**Acceptance Scenarios**:

1. **Given** any page without `#menu-btn`, **When** `main.js` runs, **Then** no TypeError is thrown.
2. **Given** `AOS.init()` is called, **When** the DOM is not yet ready, **Then** AOS initializes without errors.
3. **Given** `prefers-reduced-motion: reduce` is enabled, **When** the page loads, **Then** AOS uses `duration: 0` and no animations play.

---

### User Story 4 — Zero CLS on Project Pages (Priority: P2)

A visitor viewing a project's case study should see the page render completely without any images or content shifting after the initial paint.

**Why this priority**: The portfolio image and YouTube thumbnail both lack dimensions, causing visible layout shift that degrades UX and CLS score.

**Independent Test**: Run Chrome DevTools > Performance > Layout Shift Regions on a single-project page. No highlighted regions should appear for the portfolio image or video thumbnail.

**Acceptance Scenarios**:

1. **Given** a project page loads, **When** the portfolio image renders, **Then** the correct dimensions are reserved before the image downloads.
2. **Given** a project page loads, **When** the YouTube thumbnail renders, **Then** a 16:9 space is reserved before the image downloads.
3. **Given** any project, **When** the page is inspected, **Then** the `alt` attribute reflects the actual project name, not "GetMax project mockup".

---

### User Story 5 — Scripts Load Without Blocking Render (Priority: P2)

All theme JavaScript should download and execute without blocking the browser's HTML parsing or delaying Time to Interactive.

**Why this priority**: Removing render-blocking JS is a direct Lighthouse Performance score improvement and reduces FID/INP.

**Independent Test**: View page source — all theme `<script>` tags must have the `defer` attribute. Lighthouse "Eliminate render-blocking resources" warning must be absent for theme scripts.

**Acceptance Scenarios**:

1. **Given** the page source, **When** inspected, **Then** `aos.js`, `blaze-slider.min.js`, and `main.js` all have `defer` attribute.
2. **Given** `smooth-scroll.js` is removed from enqueue, **When** the page loads, **Then** the header hides when scrolling down past 100px and reappears when scrolling up (behavior consolidated in `main.js` using a passive scroll listener).

---

### Edge Cases

- What happens when a project's ACF `portfolio_image` field returns a string URL instead of an array? → Handle both formats in `single-project.php` (check `is_array()`).
- What happens when `filemtime()` fails (file not found)? → Falls back to WordPress theme version string.
- What if a page has neither `#menu-btn` nor a hero section? → null guards in `main.js` prevent any errors.
- What if the quote page is not set up as a page template but included via `get_template_part()`? → Confirmed: use `is_page('quote')` by slug for conditional enqueue (not `is_page_template()`).
- What happens to users on browsers that don't support WebP? → `<picture>` element provides PNG fallback automatically.
- What if 6 featured projects is not enough? → Cap is controlled by `ARQAM_FEATURED_PROJECTS_LIMIT` constant defined in `functions.php`. Editors adjust it there; no UI needed.

---

## Requirements

### Functional Requirements

- **FR-001**: Theme MUST NOT make requests to `fonts.googleapis.com` or `fonts.gstatic.com` (no Google Fonts used).
- **FR-002**: All theme `<script>` tags MUST include the `defer` attribute.
- **FR-003**: All `<img>` elements MUST have explicit `width` and `height` attributes.
- **FR-004**: All interactive icon links MUST have an `aria-label` describing their purpose.
- **FR-005**: All SVG icons inside links MUST have `aria-hidden="true"` and `focusable="false"`.
- **FR-006**: Font files MUST be served in `.woff2` format with OTF as fallback.
- **FR-007**: Font `src` URLs MUST use relative paths, not absolute `https://arqamweb.com/...` URLs.
- **FR-008**: Script and style cache-busting version strings MUST update automatically when files change.
- **FR-009**: Featured projects `WP_Query` MUST use a configurable cap defined as `ARQAM_FEATURED_PROJECTS_LIMIT` constant in `functions.php` (default: 6), with `no_found_rows: true`. No pagination on this section.
- **FR-010**: All-projects grid `WP_Query` MUST paginate with `posts_per_page: 12`.
- **FR-011**: Portfolio image `alt` text MUST be dynamic — extracted from ACF array `['alt']` if field returns an array, or derived from post title if field returns a string URL. Code MUST use `is_array()` to detect return format.
- **FR-012**: Theme MUST respect `prefers-reduced-motion` — all animations disabled when set.
- **FR-013**: `main.js` MUST wrap all DOM queries in `DOMContentLoaded` with null guards.
- **FR-014**: `big_image_size_threshold` MUST NOT be disabled globally; max 2560px.
- **FR-015**: No inline `<style>` or `<script>` blocks in `quote.php` template body. Extracted assets MUST be conditionally enqueued using `is_page('quote')` (slug-based detection).

### Key Entities

- **Script Handle**: WordPress script identifier used in `wp_enqueue_script()` and `script_loader_tag` filter — must be consistent between enqueue and defer filter.
- **WP_Query Args**: Configuration object passed to `new WP_Query()` — `posts_per_page`, `no_found_rows`, `paged` are the critical fields being modified.
- **Font Face Declaration**: SCSS `@font-face` block defining `font-family`, `src`, `font-weight`, `font-display` — all four Dubai weights must be updated.
- **Image Attributes**: `width`, `height`, `loading`, `decoding`, `fetchpriority`, `alt` — each has specific rules per image type (hero, logo, portfolio, thumbnail, video).

---

## Success Criteria

### Measurable Outcomes

- **SC-001**: Lighthouse Performance score ≥ 85 on mobile — measured on production URL (`arqamweb.com`) via PageSpeed Insights. Local MAMP scores are for iterative development only.
- **SC-002**: Lighthouse Accessibility score ≥ 95 on all pages.
- **SC-003**: CLS < 0.1 on homepage and all single-project pages.
- **SC-004**: LCP < 2.5s on homepage and single-project pages (Slow 4G).
- **SC-005**: Zero console errors on homepage, single-project, projects archive, quote page, and 404.
- **SC-006**: Zero axe DevTools critical violations on all pages.
- **SC-007**: No render-blocking resources flagged by Lighthouse for theme scripts.
- **SC-008**: Total font payload < 150 KB (down from ~330 KB OTF).
- **SC-009**: Logo payload < 20 KB (down from 69 KB PNG via WebP).
- **SC-010**: Zero requests to external font/preconnect domains (Google Fonts) on page load.

---

## Clarifications

### Session 2026-03-26

- Q: Does `get_field('portfolio_image')` return an array or a string URL? → A: Handle both formats defensively using `is_array()` — no assumption on ACF field return format setting.
- Q: What is the intended header scroll behavior when consolidating smooth-scroll.js into main.js? → A: Hide header on scroll down past 100px, show on scroll up (standard smart-header pattern).
- Q: How should the quote page CSS/JS conditional enqueue detect the correct page? → A: Use `is_page('quote')` — detect by page slug, not template file assignment.
- Q: Is the featured projects cap of 6 a hard design limit or should it be configurable? → A: Hard cap but configurable — define as a named constant (e.g. `ARQAM_FEATURED_PROJECTS_LIMIT`) in functions.php; no pagination on featured section.
- Q: Where should final Lighthouse validation be run to confirm SC-001–SC-010? → A: Production URL (arqamweb.com) — authoritative score used by Google; local MAMP only for iterative development checks.

## Assumptions

- WordPress version is 6.x with `the_post_thumbnail()` supporting attrs array parameter.
- ACF (Advanced Custom Fields) is installed and `portfolio_image` field returns an array with `url`, `alt`, `width`, `height` keys.
- The quote page is a standard WordPress page (not a custom post type), accessible at slug `/quote`.
- `smooth-scroll.js` header behavior is the only functionality not already in `main.js`; no other pages depend on it independently.
- MAMP local environment is used for development; production is at `arqamweb.com`.
- `cwebp` and font conversion tools can be installed locally (not a CI/CD dependency).
- Tailwind CSS is built locally via `npm run build` in the `frontend/` directory.
- No automated test suite exists — validation is manual via Lighthouse, axe, and DevTools.
