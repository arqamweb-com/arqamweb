# Tasks: Performance & Accessibility Fixes

**Input**: Design documents from `/specs/001-performance-accessibility-fixes/`
**Branch**: `001-performance-accessibility-fixes`
**Prerequisites**: plan.md ✅ · spec.md ✅ · research.md ✅ · data-model.md ✅ · contracts/ ✅ · quickstart.md ✅

**Organization**: Tasks grouped by user story — each story is independently implementable and testable.

## Format: `[ID] [P?] [Story?] Description`

- **[P]**: Can run in parallel (different files, no shared dependencies)
- **[US#]**: Maps to user story in spec.md

---

## Phase 1: Setup

**Purpose**: One-time build prerequisites before any code edits.

- [X] T001 Convert Dubai OTF fonts to WOFF2 using `npx ttf2woff2` or `fonttools` — output to `frontend/fonts/` (Dubai-Light, Dubai-Regular, Dubai-Medium, Dubai-Bold)
- [X] T002 [P] Convert PNG images to WebP using `cwebp -q 85` — output `Arqam-Web-Logo.webp`, `Arqam-Web-Logo-White-Title.webp`, `hero-mockup.webp` to `frontend/img/`

---

## Phase 2: Foundational (Blocking Prerequisites)

**Purpose**: Safety and infrastructure fixes that affect all subsequent phases.

**⚠️ CRITICAL**: Complete before any user story phase begins.

- [X] T003 Remove `use WP_CLI\Context\Auto;` from `functions.php` line 11 — prevents potential fatal error on shared hosting
- [X] T004 Replace static `define('_S_VERSION', '1.0.0')` in `functions.php:14-16` with `filemtime()`-based versioning per asset — update all `wp_enqueue_style()` and `wp_enqueue_script()` calls to use `$css_ver` and `$js_ver` variables (see data-model.md: Script/Style Enqueue Config)
- [X] T005 Define `ARQAM_FEATURED_PROJECTS_LIMIT` constant (value: 6) in `functions.php` — used by projects.php in Phase 6

**Checkpoint**: Foundation safe — user story work can begin. T001 and T002 (build assets) must also be complete before US1 markup tasks.

---

## Phase 3: User Story 1 — Fast First Paint on Homepage (Priority: P1) 🎯 MVP

**Goal**: Homepage loads with LCP < 2.5s, CLS < 0.1, and font renders immediately — measured on `arqamweb.com` via PageSpeed Insights.

**Independent Test**: Run Lighthouse on `arqamweb.com` in mobile mode. Pass = Performance ≥ 85, CLS < 0.1, LCP < 2.5s. Network tab shows no requests to `fonts.googleapis.com`.

### Implementation

- [X] T006 [US1] Remove Google Fonts `<link rel="preconnect">` lines from `header.php:21-22` (2 lines deleted — no Google Font is loaded)
- [X] T007 [US1] Move hero image preload out of `header.php` (delete lines 27-33) and register via `add_action('wp_head', 'arqam_web_preload_hints', 1)` in `functions.php` — include both hero WebP preload (front page only) and Dubai-Regular.woff2 font preload (all pages)
- [X] T008 [P] [US1] Update all four `@font-face` blocks in `frontend/src/style.scss:5-39` — change `src` from absolute OTF URLs to relative WOFF2 paths with OTF fallback (e.g. `url('../fonts/Dubai-Regular.woff2') format('woff2'), url('../fonts/Dubai-Regular.otf') format('opentype')`) for all weights: 300, 400, 500, 700
- [X] T009 [P] [US1] Add `width="200" height="55" decoding="async" fetchpriority="high"` to the header logo `<img>` in `header.php:54-58` — wrap in `<picture>` element with `<source srcset=".../Arqam-Web-Logo.webp" type="image/webp">` and PNG `<img>` fallback (requires T002)
- [X] T010 [US1] Add `prefers-reduced-motion` global media query block at end of `frontend/src/style.scss` — disable all animations/transitions and neutralize `[data-aos]` elements (see SPEC-014 in PERFORMANCE-SEO-SPEC.md)
- [X] T011 [US1] Update `frontend/tailwind.config.js` — add `"../template-parts/**/*.php"` and `"../inc/**/*.php"` to `content` array, add `safelist: ["font-[Dubai]"]`
- [X] T012 [US1] Run Tailwind build: `cd frontend && npm run build` — verify `style.min.css` contains `font-[Dubai]` class and WOFF2 `@font-face` declarations

**Checkpoint**: Homepage renders with no layout shift on logo, hero preloads early, fonts load from WOFF2. Validate with Lighthouse before proceeding.

---

## Phase 4: User Story 2 — Accessible Social Links (Priority: P1)

**Goal**: All footer social icon links are announced correctly by screen readers.

**Independent Test**: Tab to each social link in footer with VoiceOver/NVDA. Each announces its destination. axe DevTools shows zero "links must have discernible text" errors.

### Implementation

- [X] T013 [US2] Fix duplicate `menu_id` in `footer.php` — change first nav to `'menu_id' => 'menu-footer-quick-links'` and second to `'menu_id' => 'menu-footer-services'` (lines 84 and 100)
- [X] T014 [US2] Add `aria-label="Follow ArqamWeb on Facebook"` (and equivalent for Instagram, LinkedIn) to each social `<a>` tag in `footer.php:52-70` — add `rel="noopener noreferrer" target="_blank"` — add `aria-hidden="true" focusable="false"` to each `<svg>`

**Checkpoint**: axe DevTools reports zero critical violations in the footer. HTML validator shows no duplicate `id` errors.

---

## Phase 5: User Story 3 — No JavaScript Errors on Any Page (Priority: P1)

**Goal**: Zero TypeErrors or uncaught exceptions from theme scripts on any page.

**Independent Test**: Open DevTools Console on homepage, single-project page, quote page, and 404 page. Zero errors. Enable OS "Reduce Motion" — AOS elements appear instantly.

### Implementation

- [X] T015 [US3] Consolidate scroll behavior from `js/smooth-scroll.js` into `frontend/public/js/main.js` — add passive scroll listener for header hide/show (hide on scroll down > 100px, show on scroll up) inside `DOMContentLoaded`
- [X] T016 [US3] Refactor `frontend/public/js/main.js` — wrap all code in `DOMContentLoaded`, add null guard on `menuBtn` and `mainHeader`, move `AOS.init()` inside `DOMContentLoaded` with `typeof AOS !== 'undefined'` check and `prefers-reduced-motion` duration check (see SPEC-011 fixed code in PERFORMANCE-SEO-SPEC.md)
- [X] T017 [US3] Remove `wp_enqueue_script('arqam-web-smooth-scroll', ...)` line from `functions.php` (SPEC-012) — the scroll logic is now in `main.js` (T015 must be done first)

**Checkpoint**: No console errors on any page. Header hides/shows on scroll. Reduced-motion users see no animations.

---

## Phase 6: User Story 4 — Zero CLS on Project Pages (Priority: P2)

**Goal**: No layout shift on single-project pages or projects archive. Portfolio image alt text is always accurate.

**Independent Test**: Chrome DevTools > Performance > Layout Shift Regions on a single-project page. No highlighted regions for portfolio image or video thumbnail. Alt text matches actual project name.

### Implementation

- [X] T018 [P] [US4] Fix portfolio image in `single-project.php:67` — add dynamic `alt` (check `is_array(get_field('portfolio_image'))` for array vs string return), add `width`/`height` from ACF array or fallback to 1200/675, add `fetchpriority="high" decoding="async"` (see SPEC-007 fixed code in PERFORMANCE-SEO-SPEC.md)
- [X] T019 [P] [US4] Fix YouTube thumbnail in `single-project.php:361` — add `width="1280" height="720" loading="lazy" decoding="async"` and dynamic `alt` using post title (see SPEC-008)
- [X] T020 [P] [US4] Remove inline `will-change: transform` from all five decorative orb `<div>` elements in `single-project.php:21-25` — replace with a `.glass-orb` CSS class in `frontend/src/style.scss`
- [X] T021 [P] [US4] Update featured projects `WP_Query` in `template-parts/projects.php:33` — replace `posts_per_page => -1` with `posts_per_page => ARQAM_FEATURED_PROJECTS_LIMIT`, add `no_found_rows => true` (requires T005)
- [X] T022 [P] [US4] Update all-projects `WP_Query` in `template-parts/projects.php:120` — replace `posts_per_page => -1` with `posts_per_page => 12`, add `paged => max(1, get_query_var('paged'))` for pagination support
- [X] T023 [US4] Add `loading` and `decoding` attrs to `the_post_thumbnail()` calls in `template-parts/projects.php:64` (first card `eager`, rest `lazy`) and `template-parts/projects.php:145` (all `lazy`) — track `$index` in the loop (see SPEC-009)

**Checkpoint**: CLS < 0.1 on single-project page. MySQL shows LIMIT clauses in project queries (use Query Monitor plugin). Alt text is correct on all projects.

---

## Phase 7: User Story 5 — Scripts Load Without Blocking Render (Priority: P2)

**Goal**: All theme JS loads deferred. No render-blocking scripts flagged by Lighthouse.

**Independent Test**: View page source — `aos.js`, `blaze-slider.min.js`, `main.js` all have `defer` attribute. Lighthouse "Eliminate render-blocking resources" warning absent for theme scripts.

### Implementation

- [ ] T024 [US5] Add `arqam_web_defer_scripts()` function to `functions.php` using the `script_loader_tag` filter — add `defer` to handles: `aos-main-js`, `blaze-slider-main-js`, `arqamweb-main-js` (see contracts/enqueue-contract.md and SPEC-010 fixed code)
- [ ] T025 [P] [US5] Fix `big_image_size_threshold` in `functions.php:346` — remove `add_filter('big_image_size_threshold', '__return_false')` and replace with `add_filter('big_image_size_threshold', fn() => 2560)`
- [X] T026 [US5] Extract `template-parts/quote.php` inline `<style>` block (lines 35-83) to `frontend/src/quote.scss`, compile to `frontend/public/css/quote.min.css`, and enqueue conditionally in `functions.php` using `is_page('quote')` (see SPEC-021 and research.md D-007)
- [X] T027 [US5] Extract `template-parts/quote.php` inline `<script>` block (lines 111-152) to `js/quote.js`, and enqueue conditionally in `functions.php` using `is_page('quote')` — remove both inline blocks from `quote.php` after extraction

**Checkpoint**: Page source shows `defer` on all theme scripts. Lighthouse shows no render-blocking warnings. Quote page tab-switching works identically.

---

## Phase 8: Polish & Cross-Cutting Concerns

**Purpose**: Final validation, Tailwind rebuild, and production verification.

- [X] T028 Run Tailwind build: `cd frontend && npm run build` — pick up `.glass-orb` class (T020), quote styles (T026), and any new utility classes added across phases
- [X] T029 [P] Verify `filemtime()`-based asset versions update correctly — edit a CSS file, reload, confirm query string changes in Network tab
- [X] T030 Run full validation per `quickstart.md` — Lighthouse on `arqamweb.com` (Performance ≥ 85, Accessibility ≥ 95), axe DevTools on all pages (zero critical), Console errors on homepage/project/quote/404 (zero)

---

## Dependencies & Execution Order

### Phase Dependencies

- **Phase 1 (Setup)**: No dependencies — run immediately. T001 and T002 can run in parallel.
- **Phase 2 (Foundational)**: No dependencies — run immediately in parallel with Phase 1.
- **Phase 3 (US1)**: Requires T001 (WOFF2 fonts), T002 (WebP images), T003, T004 complete.
- **Phase 4 (US2)**: Requires Phase 2 complete. Independent of US1, US3.
- **Phase 5 (US3)**: Requires Phase 2 complete. T017 requires T015 and T016 first.
- **Phase 6 (US4)**: Requires T005 (constant). T018–T022 can run in parallel. T023 after T021/T022.
- **Phase 7 (US5)**: Requires Phase 2 complete. T027 requires T026 first.
- **Phase 8 (Polish)**: Requires all story phases complete.

### User Story Dependencies

| Story | Depends On | Blocks |
|-------|-----------|--------|
| US1 (P1) | T001, T002, Phase 2 | Nothing |
| US2 (P1) | Phase 2 | Nothing |
| US3 (P1) | Phase 2; T017 needs T015+T016 | Nothing |
| US4 (P2) | T005; T023 needs T021+T022 | Nothing |
| US5 (P2) | Phase 2; T027 needs T026 | Nothing |

### Parallel Opportunities

```
Phase 1+2 run together:
  T001 ──┐
  T002 ──┤ (parallel)
  T003 ──┤
  T004 ──┤
  T005 ──┘

Phase 3 (US1) parallel tasks:
  T008 (font-face SCSS) ──┐
  T009 (logo WebP markup) ─┤ (parallel, different files)
                            ├── T010 → T011 → T012 (sequential)
  T006 (remove preconnect) ┘
  T007 (preload hook) ──────── sequential after T006

Phase 6 (US4) parallel tasks:
  T018 (portfolio image) ──┐
  T019 (YouTube thumb)  ───┤
  T020 (will-change orbs) ─┤ (all touch different parts of single-project.php)
  T021 (featured query)  ──┤
  T022 (all-projects query)┘
```

---

## Implementation Strategy

### MVP First (P1 Stories Only)

1. Complete Phase 1 + Phase 2 (parallel)
2. Complete Phase 3: US1 — Fast First Paint
3. Complete Phase 4: US2 — Accessible Social Links
4. Complete Phase 5: US3 — No JS Errors
5. **STOP and VALIDATE**: Lighthouse ≥ 85, axe zero critical, zero console errors
6. Deploy to production and confirm scores

### Full Delivery

6. Complete Phase 6: US4 — Zero CLS on Project Pages
7. Complete Phase 7: US5 — Scripts Without Blocking
8. Complete Phase 8: Polish + Full Lighthouse validation on production

### Solo Developer Order (Recommended)

```
Day 1: T001, T002, T003, T004, T005 (setup + foundation)
Day 1: T006, T007, T008, T009 (US1 font + image fixes)
Day 2: T010, T011, T012 (US1 CSS + Tailwind)
Day 2: T013, T014 (US2 accessibility)
Day 2: T015, T016, T017 (US3 JS fixes)
Day 3: T018–T023 (US4 CLS fixes)
Day 3: T024–T027 (US5 defer + quote extraction)
Day 3: T028, T029, T030 (polish + validation)
```

---

## Notes

- **[P]** = different files, safe to work in parallel
- **[US#]** = maps task to user story for traceability
- Run `cd frontend && npm run build` after any SCSS or Tailwind config change
- Commit after each phase checkpoint — makes rollback easier
- T030 must run on production (`arqamweb.com`) not local MAMP for authoritative scores
- `ARQAM_FEATURED_PROJECTS_LIMIT` constant (T005) must exist before T021 references it
