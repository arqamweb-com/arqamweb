# Research: Performance & Accessibility Fixes

**Phase 0 Output** — Branch: `001-performance-accessibility-fixes` | Date: 2026-03-26

---

## Decision Log

### D-001 — Font Format: WOFF2 over OTF

- **Decision**: Convert all Dubai font variants from `.otf` to `.woff2`
- **Rationale**: WOFF2 uses Brotli compression, reducing file size by ~55–65% vs OTF. All modern browsers support WOFF2 (97%+ global coverage). OTF is an uncompressed format not designed for web delivery.
- **Alternatives considered**: WOFF (older compressed format) — rejected because WOFF2 is universally supported and ~30% smaller than WOFF.
- **Tool**: `fonttools` (Python) or `ttf2woff2` (npm). Keep OTF as fallback source in `@font-face`.

### D-002 — Script Loading: defer over async

- **Decision**: Use `defer` attribute on theme scripts, not `async`
- **Rationale**: `async` executes scripts as soon as downloaded, in any order — this breaks AOS which must init after its CSS is parsed, and main.js which depends on AOS. `defer` preserves document order and executes after HTML parsing completes, making it safe for all theme scripts.
- **Alternatives considered**: `type="module"` (implicit defer) — rejected because it requires ESM refactor of existing non-module scripts.

### D-003 — Cache Busting: filemtime() over theme version

- **Decision**: Use `filemtime()` per asset file for cache-busting query string
- **Rationale**: A static version `'1.0.0'` never changes unless manually updated. `filemtime()` returns the Unix timestamp of the file's last modification, which changes automatically on every file edit. This is standard WordPress practice for development environments.
- **Alternatives considered**: Git commit hash — more accurate for production but requires a build step. `filemtime()` is simpler and requires no CI integration.
- **Note**: On high-traffic production sites, `wp_get_theme()->get('Version')` from `style.css` is acceptable for release versioning. Both approaches are valid; `filemtime()` is used here for zero-friction development.

### D-004 — Image Format: WebP with PNG fallback via `<picture>`

- **Decision**: Serve WebP for all static PNG theme images with PNG `<img>` fallback inside `<picture>`
- **Rationale**: WebP is ~30% smaller than PNG for photographic images and ~25% smaller for logos with transparency. All modern browsers support WebP (96%+). The `<picture>` element provides seamless fallback.
- **Alternatives considered**: AVIF — smaller than WebP but ~88% browser support as of 2026; not yet worth the conversion overhead for a theme with few static images. Revisit in 12 months.
- **Tool**: `cwebp` (Google's CLI encoder), quality `-q 85` for logos, `-q 80` for photos.

### D-005 — WP_Query: no_found_rows for non-paginated queries

- **Decision**: Add `'no_found_rows' => true` to the featured projects query
- **Rationale**: By default, `WP_Query` runs a `SELECT COUNT(*)` SQL query to support pagination. For the featured projects loop (which is never paginated), this COUNT query is pure overhead. `no_found_rows: true` disables it.
- **Alternatives considered**: Transient caching of the query — valid but adds invalidation complexity. `no_found_rows` is zero-complexity and sufficient for this use case.

### D-006 — prefers-reduced-motion: CSS-first approach

- **Decision**: Handle `prefers-reduced-motion` in CSS with a global media query block, supplemented by a JS check in `AOS.init()`
- **Rationale**: CSS-first means the reduction applies even before JS loads, covering the initial paint. The JS check in AOS.init sets `duration: 0` which causes AOS to skip animations entirely.
- **Alternatives considered**: JS-only check — insufficient because CSS keyframe animations (orb floats) would still play even if AOS is disabled.

### D-007 — Inline Script Extraction: Conditional enqueue pattern

- **Decision**: Extract quote.php inline styles/scripts to separate files, enqueued conditionally with `is_page_template()`
- **Rationale**: Inline resources cannot be cached by the browser or CDN. Conditional enqueuing means the extra CSS/JS only loads on the quote page, not everywhere.
- **Alternatives considered**: Keeping inline code but adding `<style nonce="">` for CSP — adds CSP complexity without solving caching. File extraction is cleaner.

---

## WordPress API Notes

### script_loader_tag filter

Used to modify the `<script>` tag output by `wp_enqueue_script()`. Signature:
```php
add_filter( 'script_loader_tag', function( $tag, $handle, $src ) {
    // return modified $tag string
}, 10, 3 );
```
This is the correct WordPress way to add `defer`/`async` — do NOT manually echo `<script>` tags.

### wp_head action priority

Lower number = earlier execution. Priority `1` fires before almost everything:
```php
add_action( 'wp_head', 'my_function', 1 );
```
WordPress core uses priorities 1–10 for its own head output. Using priority `1` guarantees preload hints appear before any CSS link tags, allowing the browser's preload scanner to find them first.

### the_post_thumbnail() attrs parameter

The second argument accepts an array of HTML attributes merged into the `<img>` tag:
```php
the_post_thumbnail( 'large', [
    'loading'  => 'lazy',
    'decoding' => 'async',
    'class'    => '...',
]);
```
WordPress 5.5+ automatically adds `loading="lazy"` only for registered image sizes where dimensions are known. Passing it explicitly is safe and overrides the auto value.

---

## Resolved Unknowns

| Unknown | Resolution |
|---------|------------|
| Does the theme use Google Fonts? | No — confirmed in source. Preconnects are orphaned. |
| Is `use WP_CLI\Context\Auto` referenced anywhere? | No — grep confirms zero usages in functions.php |
| Does `smooth-scroll.js` functionality overlap with `main.js`? | Yes — both handle header scroll behavior |
| What image dimensions are the logos? | Logo: ~200×55px · Footer logo: ~150×40px (measured from source) |
| Does `is_page_template()` work for template-parts files? | No — use `is_page()` with page slug or a custom body class check instead |
| Font conversion tooling available? | `cwebp` via Homebrew, `fonttools` via pip, or `npx ttf2woff2` |
