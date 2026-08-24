# Quickstart: Implementing Performance & Accessibility Fixes

**Branch**: `001-performance-accessibility-fixes`

---

## Prerequisites

Before starting, ensure you have:

- [ ] MAMP running with WordPress accessible at `localhost`
- [ ] Node.js + npm installed (for Tailwind rebuild)
- [ ] Python 3 + pip (for font conversion) OR `npx` available
- [ ] `cwebp` installed: `brew install webp`
- [ ] Browser DevTools open for validation

---

## Quick Commands

```bash
# Navigate to theme
cd /Applications/MAMP/htdocs/wordpress/wp-content/themes/arqam-web

# Build Tailwind CSS after any config/SCSS change
cd frontend && npm run build

# Convert OTF fonts to WOFF2 (run once)
pip install fonttools brotli
# Then use fonttools to export — see SPEC-013 in PERFORMANCE-SEO-SPEC.md

# Convert PNG images to WebP (run once)
cwebp -q 85 frontend/img/Arqam-Web-Logo.png -o frontend/img/Arqam-Web-Logo.webp
cwebp -q 85 frontend/img/Arqam-Web-Logo-White-Title.png -o frontend/img/Arqam-Web-Logo-White-Title.webp
cwebp -q 85 frontend/img/hero-mockup.png -o frontend/img/hero-mockup.webp
```

---

## Validation Steps After Each Phase

### After Phase 1 (Quick Wins)
- Open Chrome DevTools > Network tab
- Confirm no requests to `fonts.googleapis.com` or `fonts.gstatic.com`
- Confirm no PHP warnings in `error_log`
- Confirm footer nav menus render correctly

### After Phase 2 (Core Web Vitals)
- Run Lighthouse on homepage: Performance tab > CLS and LCP
- Check CLS < 0.1 (no layout shift on logo or portfolio image)
- Throttle to "Slow 4G" and confirm hero image preloads first

### After Phase 3 (JavaScript)
- Open Console — confirm zero TypeErrors on homepage, project page, 404 page
- Open Network > JS — confirm `defer` on all three theme scripts
- Enable OS "Reduce Motion" — confirm AOS animations are instant (0ms)

### After Phase 4 (CSS & Fonts)
- Network tab: font files should be `.woff2`, not `.otf`
- Total font payload should be under 150 KB
- Enable "Reduce Motion" — all CSS animations should stop

### After Phase 5 (WordPress)
- Change any CSS file → reload → confirm query string on stylesheet URL has changed
- Upload a large image in WP Admin → confirm it's scaled to max 2560px
- Inspect SQL queries on projects page (use Query Monitor plugin) → confirm `LIMIT 6` and `LIMIT 12`

### After Phase 6 (Images)
- Network tab: logo request should return `image/webp` in browsers supporting it
- Run axe DevTools on footer → confirm zero "links must have discernible text" errors

---

## Testing Checklist

Use with `/speckit.checklist`

```
Lighthouse Performance ≥ 85 (mobile, throttled)
Lighthouse Accessibility ≥ 95
CLS < 0.1 on homepage
CLS < 0.1 on single-project page
LCP < 2.5s on homepage (Slow 4G)
LCP < 2.5s on single-project page (Slow 4G)
Zero console errors on: homepage, single-project, projects archive, quote page, 404
Zero render-blocking resources in Lighthouse
axe DevTools: zero critical violations on all pages
Network tab: no requests to fonts.googleapis.com
Network tab: theme scripts have defer attribute
Network tab: font files are .woff2 format
Network tab: logo is .webp format in Chrome/Firefox
OS Reduce Motion enabled: zero CSS animations visible
OS Reduce Motion enabled: AOS elements appear instantly
```

---

## Implementation Notes

### is_page_template() for quote.php
`template-parts/quote.php` is included via `get_template_part()`, not set as a page template. Use a page slug check or custom body class instead:
```php
// Option A — check by page slug
if ( is_page( 'quote' ) ) { ... }

// Option B — check by template filename assigned in page editor
if ( is_page_template( 'page-quote.php' ) ) { ... }
```
Confirm which approach matches how the quote page is set up in WP Admin > Pages.

### smooth-scroll.js consolidation
Before removing `smooth-scroll.js`, copy its header hide/show scroll logic into `main.js` (see SPEC-012). Test the header show/hide on scroll before deleting the file or its enqueue.

### Tailwind rebuild required
Any change to `style.scss`, `tailwind.config.js`, or PHP files that add new Tailwind classes requires a rebuild:
```bash
cd frontend && npm run build
```
The output goes to `frontend/public/style.min.css` and `frontend/style.min.css`.
