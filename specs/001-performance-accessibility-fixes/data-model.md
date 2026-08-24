# Data Model: Performance & Accessibility Fixes

**Phase 1 Output** — Branch: `001-performance-accessibility-fixes` | Date: 2026-03-26

> This feature has no new database entities. The "data model" here describes the **configuration entities** (WordPress enqueue args, WP_Query args, image attributes) that are being modified.

---

## Entity: Script Enqueue Config

Describes the correct state of all `wp_enqueue_script()` calls after fixes.

| Handle | Source File | In Footer | Defer | Dependencies | Version Strategy |
|--------|------------|-----------|-------|--------------|-----------------|
| `aos-main-js` | `frontend/public/js/aos.js` | true | ✅ yes | none | `filemtime()` |
| `blaze-slider-main-js` | `frontend/public/js/blaze-slider.min.js` | true | ✅ yes | none | `filemtime()` |
| `arqamweb-main-js` | `frontend/public/js/main.js` | true | ✅ yes | `aos-main-js` | `filemtime()` |
| `arqam-web-smooth-scroll` | `js/smooth-scroll.js` | true | ~~removed~~ | — | **REMOVED** |

---

## Entity: Style Enqueue Config

| Handle | Source File | Version Strategy | Conditional |
|--------|------------|-----------------|-------------|
| `tailwind-css` | `frontend/public/style.min.css` | `filemtime()` | always |
| `arqam-web-aos-css` | `frontend/public/css/aos.css` | `filemtime()` | always |
| `arqam-quote-css` | `frontend/public/css/quote.min.css` | `filemtime()` | quote page only |

---

## Entity: WP_Query Args (projects.php)

### Featured Projects Query (line ~33)

| Arg | Before | After | Reason |
|-----|--------|-------|--------|
| `posts_per_page` | `-1` (unlimited) | `6` | Hard cap; featured layout uses max 3–6 |
| `no_found_rows` | not set | `true` | Skip COUNT SQL for non-paginated loop |
| `meta_query` | `is_featured = 1` | unchanged | — |

### All Projects Grid Query (line ~120)

| Arg | Before | After | Reason |
|-----|--------|-------|--------|
| `posts_per_page` | `-1` (unlimited) | `12` | Paginated grid |
| `paged` | not set | `max(1, get_query_var('paged'))` | Enable pagination |
| `no_found_rows` | not set | `false` | Needed for pagination links |

---

## Entity: Image Attributes

### Header Logo (`header.php`)

| Attribute | Before | After |
|-----------|--------|-------|
| `width` | missing | `200` |
| `height` | missing | `55` |
| `decoding` | missing | `async` |
| `fetchpriority` | missing | `high` |
| format | PNG only | `<picture>` with WebP + PNG fallback |

### Portfolio Image (`single-project.php:67`)

| Attribute | Before | After |
|-----------|--------|-------|
| `alt` | `"GetMax project mockup"` (hardcoded) | Dynamic from ACF field or post title |
| `width` | missing | From ACF field `['width']` or `1200` |
| `height` | missing | From ACF field `['height']` or `675` |
| `fetchpriority` | missing | `high` |
| `decoding` | missing | `async` |

### YouTube Thumbnail (`single-project.php:361`)

| Attribute | Before | After |
|-----------|--------|-------|
| `alt` | `"Video thumbnail"` | `"{Post Title} — project walkthrough video"` |
| `width` | missing | `1280` |
| `height` | missing | `720` |
| `loading` | missing (eager) | `lazy` |
| `decoding` | missing | `async` |

### Project Grid Thumbnails (`projects.php:64, 145`)

| Attribute | Before | After |
|-----------|--------|-------|
| `loading` | auto (may be missing) | `eager` for index 0, `lazy` for rest |
| `decoding` | missing | `async` |

---

## Entity: Font Face Declarations (`style.scss`)

| Family | Weight | Before | After |
|--------|--------|--------|-------|
| Dubai | 300 | `Dubai-Light.otf` (absolute URL) | `Dubai-Light.woff2` + OTF fallback (relative) |
| Dubai | 400 | `Dubai-Regular.otf` (absolute URL) | `Dubai-Regular.woff2` + OTF fallback (relative) |
| Dubai | 500 | `Dubai-Medium.otf` (absolute URL) | `Dubai-Medium.woff2` + OTF fallback (relative) |
| Dubai | 700 | `Dubai-Bold.otf` (absolute URL) | `Dubai-Bold.woff2` + OTF fallback (relative) |

All declarations keep `font-display: swap`. Paths change from absolute `https://arqamweb.com/...` to relative `../fonts/...`.

---

## Entity: Tailwind Config (`tailwind.config.js`)

| Field | Before | After |
|-------|--------|-------|
| `content` | `["../*.php", "../**/*.php", "./src/**/*"]` | Add explicit `template-parts/**/*.php` + `inc/**/*.php` |
| `safelist` | not set | `["font-[Dubai]"]` |

---

## State Transitions: None

This feature modifies static configuration and markup — no state machines or transitions involved.
