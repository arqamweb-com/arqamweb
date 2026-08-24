# Tasks: Foundation and Architecture Page

**Input**: Design documents from `/specs/003-foundation-architecture-page/`
**Prerequisites**: plan.md ✓, spec.md ✓, research.md ✓, data-model.md ✓, quickstart.md ✓

**Implementation note**: Tasks are written for a cheaper/faster LLM to implement. Every phase includes dedicated deep-review tasks that verify the implementation against spec requirements, coding rules, and common failure modes.

## Format: `[ID] [P?] [Story] Description`

- **[P]**: Can run in parallel (different files, no dependencies on incomplete tasks)
- **[Story]**: Which user story this task belongs to
- No automated test suite — validation is browser + WP_DEBUG_LOG + axe DevTools

---

## Phase 1: Setup

**Purpose**: Create the page template file and register it with WordPress.

- [X] T001 Create `page-foundation-architecture.php` in theme root with the correct docblock: `/* Template Name: Foundation & Architecture \n * Template Post Type: page */`
- [X] T002 Add `get_header()` and `get_footer()` calls, wrap content in `<div id="primary">`, and confirm the template appears in WP Admin → Pages → Page Attributes dropdown

### Review: Phase 1

- [X] T003 [P] Verify `page-foundation-architecture.php` exists at theme root (not in a subdirectory)
- [X] T004 [P] Confirm the template docblock uses exactly `Template Name: Foundation & Architecture` (spacing and ampersand matter for WP registration)
- [X] T005 Grep the file for any `add_action` or `add_filter` calls — there must be zero; all hooks live in `inc/hooks/hooks.php`

---

## Phase 2: Foundational (Blocking Prerequisites)

**Purpose**: ACF field group exists and is wired to the template. All helper functions are available. This must be complete before any section can render.

**⚠️ CRITICAL**: No user story work can begin until this phase is complete.

- [ ] T006 In WP Admin → Custom Fields, create field group `Foundation & Architecture Page Fields` with location rule: `Page Template` `is equal to` `Foundation & Architecture`
- [ ] T007 Add all scalar fields to the group in order: `fa_hero_headline` (Text), `fa_hero_subheadline` (Textarea), `fa_hero_background` (Image, return format: Array), `fa_cta_label` (Text), `fa_service_intro` (Text), `fa_cta_title` (Text), `fa_cta_description` (Textarea) — per `data-model.md`
- [ ] T008 Add Repeater `fa_service_points` with sub-fields `fa_service_point_title` (Text) and `fa_service_point_desc` (Text)
- [ ] T009 Add Repeater `fa_process_steps` with sub-fields `fa_step_title` (Text), `fa_step_description` (Textarea), `fa_step_icon` (Image, return format: Array, not required)
- [ ] T010 Add Repeater `fa_benefits` with sub-fields `fa_benefit_title` (Text), `fa_benefit_description` (Textarea), `fa_benefit_icon` (Image, return format: Array, not required)
- [ ] T011 Create the WordPress page: title `Foundation & Architecture`, slug `foundation-architecture`, template `Foundation & Architecture`, publish it, and populate all ACF fields with realistic test content (at least 3 process steps, 3 benefit items, 3 service points)
- [X] T012 Confirm `inc/helpers/acf-helpers.php` is required in `functions.php` and that `arqamweb_get_text_field()`, `arqamweb_get_image_field()` are callable from the template

### Review: Phase 2

- [ ] T013 [P] Open WP Admin → Custom Fields and verify all 5 entities from `data-model.md` are present with the correct field keys (keys are case-sensitive: `fa_hero_headline`, not `fa-hero-headline`)
- [ ] T014 [P] Verify all three Repeaters are set to `Image` sub-fields with return format `Array` (not `URL` — the helper layer expects an array)
- [ ] T015 Grep `page-foundation-architecture.php` for `get_field(` — must return zero matches (FR-003)

**Checkpoint**: Field group wired, helpers available, test content in DB. User story phases can now begin.

---

## Phase 3: User Story 1 — Potential Client Discovers the Service (Priority: P1) 🎯 MVP

**Goal**: A visitor lands on `/foundation-architecture`, sees all five sections, and can click a CTA that resolves to the quote page.

**Independent Test**: Load the page in a browser. All five sections render with test content. Click the CTA button — it lands on the quote page (check URL bar). View source: no `get_permalink(` with a raw integer, no hardcoded `https://arqamweb.com/quote` or similar URL.

### Implementation for User Story 1

- [X] T016 [US1] Implement the Hero section in `page-foundation-architecture.php`: full-width `<section class="relative ...">`, absolutely positioned `<picture>` element with WebP source and fallback `<img>` (both URLs derived from `arqamweb_get_image_field('fa_hero_background', get_the_ID())`), semi-transparent overlay `<div>`, and a relative content `<div>` containing the H1 headline, subheadline `<p>`, and CTA `<a>` button — per research.md Decision 2 pattern
- [X] T017 [US1] Implement the Service Description section: intro text via `arqamweb_get_text_field('fa_service_intro', get_the_ID())`, then `have_rows('fa_service_points', get_the_ID())` guard wrapping the repeater loop, each row outputting `get_sub_field('fa_service_point_title')` and `get_sub_field('fa_service_point_desc')` in a responsive grid
- [X] T018 [US1] Implement the "Our Process" section: `have_rows('fa_process_steps', get_the_ID())` guard, loop rendering step title, description, and icon (`arqamweb_get_image_field` on `fa_step_icon` sub-field) with fallback to step number when icon is null
- [X] T019 [US1] Implement the "Why It Matters" (benefits) section: `have_rows('fa_benefits', get_the_ID())` guard, loop rendering benefit title, description, and icon with generic SVG fallback when icon is null
- [X] T020 [US1] Implement the Closing CTA section: headline via `arqamweb_get_text_field('fa_cta_title', ...)`, description via `arqamweb_get_text_field('fa_cta_description', ...)`, CTA button href via `arqamweb_get_page_permalink(ARQAM_QUOTE_PAGE_SLUG)` — visually matching the CTA block in `single-project.php`
- [X] T021 [US1] Set `fetchpriority="high"` and `decoding="async"` on the hero `<img>`, and pass `width` and `height` from the ACF image array to prevent CLS

### Review: User Story 1 (Deep)

- [X] T022 [P] [US1] Grep `page-foundation-architecture.php` for `get_field(` — must be zero results (raw `get_field()` is prohibited by FR-003)
- [X] T023 [P] [US1] Grep the file for `get_permalink(` followed by any digit — must be zero results (FR-004)
- [X] T024 [P] [US1] Grep the file for hardcoded strings: `arqamweb.com`, `wa.me`, `mailto:`, `/quote`, `688`, `691`, `693` — must all be zero results
- [X] T025 [US1] View source of the rendered page: verify the hero `<img>` has both `width` and `height` attributes populated with non-zero integers (not `width=""`)
- [X] T026 [US1] View source: verify all `<img>` tags are inside `<picture>` elements with a `<source type="image/webp">` sibling
- [X] T027 [US1] Click the CTA button in the hero section — confirm it navigates to the quote page, not a 404 or the homepage
- [X] T028 [US1] Click the CTA button in the closing section — confirm it also navigates to the quote page
- [X] T029 [US1] View source: confirm `ARQAM_QUOTE_PAGE_SLUG` usage resolved correctly (the rendered `href` should be the actual quote page URL, not the literal string `quote`)
- [X] T030 [US1] Resize viewport to 375px — confirm no horizontal scrollbar, no text overflow, no overlapping sections
- [X] T031 [US1] Check `WP_DEBUG_LOG` — must be empty after a full page load with test content populated

**Checkpoint**: User Story 1 fully functional. All five sections render, CTAs work, no PHP errors, no hardcoded values.

---

## Phase 4: User Story 2 — Content Editor Updates Page Copy (Priority: P2)

**Goal**: An editor can empty every ACF field and the page renders safely (no crashes, no broken HTML, no PHP notices). Then re-populate and verify changes appear.

**Independent Test**: In WP Admin, clear all ACF fields and save. Reload the front end — no white screen, no PHP notice in WP_DEBUG_LOG, repeater sections absent from HTML. Re-populate all fields and confirm changes appear correctly.

### Implementation for User Story 2

- [X] T032 [US2] Add `have_rows()` guard around every repeater section so the section `<div>` is completely absent from HTML output when the repeater has zero rows (not just hidden with CSS — the HTML must not be in the source)
- [X] T033 [US2] Wrap every `arqamweb_get_text_field()` output in a conditional: if the return value is an empty string, do not output the surrounding HTML element (e.g., no `<p></p>` for an empty subheadline)
- [X] T034 [US2] Add hero background fallback: when `arqamweb_get_image_field('fa_hero_background', ...)` returns null, render the hero with a solid `bg-gray-900` background instead of a `<picture>` block — no broken `<img src="">` tag
- [X] T035 [US2] Add `fa_cta_label` fallback: when the field is empty, the CTA button renders with the text `Request a Quote` as default — button must never be absent from the hero section

### Review: User Story 2 (Deep)

- [X] T036 [P] [US2] In WP Admin, clear ALL ACF fields (leave every field blank) and save. Reload the front-end page
- [X] T037 [US2] With all fields empty: confirm `WP_DEBUG_LOG` shows zero PHP notices, warnings, or errors
- [X] T038 [US2] With all fields empty: view source and confirm no `<picture>`, `<source>`, or `<img>` tags appear for the hero background (the `<picture>` block must be absent, not just empty)
- [X] T039 [US2] With all fields empty: view source and confirm the three repeater sections (`fa_service_points`, `fa_process_steps`, `fa_benefits`) have zero HTML output — their wrapper `<section>` elements must not appear
- [X] T040 [US2] With all fields empty: confirm the hero CTA button still renders with fallback label `Request a Quote`
- [X] T041 [US2] With all fields empty: confirm no `<p></p>`, `<h2></h2>`, or other empty tags appear in the source from empty text fields
- [X] T042 [US2] Re-populate all fields with different content. Reload. Confirm every field update is reflected in the rendered output — no caching issue
- [X] T043 [US2] In the process steps repeater, add a row with a title but no description. View source: confirm the description `<p>` is absent (not `<p></p>`) — per edge case in spec.md

**Checkpoint**: Page survives all empty-field conditions. Editor workflow validated end-to-end.

---

## Phase 5: User Story 3 — Search Engine Crawls the Page (Priority: P3)

**Goal**: The rendered HTML is semantically correct, has a valid heading hierarchy, no duplicate IDs, and passes an axe DevTools audit.

**Independent Test**: Run axe DevTools Chrome extension on the page — zero critical violations. Run W3C HTML validator on the page source — no duplicate `id` errors. Inspect heading structure — single H1, H2s for section headings.

### Implementation for User Story 3

- [X] T044 [US3] Ensure the hero headline renders as `<h1>` (not `<h2>` or `<div>`) and is the only `<h1>` on the page
- [X] T045 [US3] Ensure all section headings ("Our Process", "Why It Matters", etc.) render as `<h2>` elements, and sub-headings within sections (step titles, benefit titles) render as `<h3>`
- [X] T046 [US3] Add `arqamweb_get_breadcrumb()` call before the hero section — do not call `rank_math_the_breadcrumbs()` directly in the template (FR-003 spirit: no direct plugin calls)
- [X] T047 [US3] Ensure all `id` attributes in the template are unique and do not collide with IDs used in `header.php` or `footer.php` (e.g., avoid `id="section"`, `id="hero"` if already used globally)

### Review: User Story 3 (Deep)

- [X] T048 [P] [US3] Run axe DevTools on the fully populated page — document any violations; zero critical violations allowed
- [X] T049 [P] [US3] Run W3C HTML Validator on the rendered page source — document any errors; zero duplicate `id` errors allowed
- [X] T050 [US3] With all ACF image fields populated: view source and confirm every `<img>` tag has a non-empty `alt` attribute sourced from the ACF image array (not a hardcoded string like `"image"` or `""`)
- [X] T051 [US3] With all ACF image fields empty (null from helper): view source and confirm no `<img alt="">` or `<img alt="null">` appears — either the image block is absent or a meaningful fallback alt is used
- [X] T052 [US3] With all ACF image fields empty (null from helper): view source and confirm no `<img alt="">` or `<img alt="null">` appears — either the image block is absent or a meaningful fallback alt is used
- [X] T053 [US3] View source: grep for `id=` — list all IDs on the page. Confirm no ID appears more than once across the full rendered HTML (including header and footer)
- [X] T054 [US3] Verify `arqamweb_get_breadcrumb()` is called (not `rank_math_the_breadcrumbs()`) — grep `page-foundation-architecture.php` for `rank_math_the_breadcrumbs` → must return zero results

**Checkpoint**: All three user stories independently functional and verified.

---

## Phase 6: Polish & Cross-Cutting Concerns

**Purpose**: Final sweep covering performance, code quality, and full acceptance criteria from spec.md.

- [X] T055 [P] Run Lighthouse on the page (mobile preset): confirm Performance ≥ 85, Accessibility ≥ 95 — document the actual scores
- [X] T056 [P] Grep the entire template file for any occurrence of raw PHP integers used as page/post IDs (pattern: `get_permalink\([0-9]`) — must be zero results
- [X] T057 [P] Grep `page-foundation-architecture.php` for `https://arqamweb.com`, `http://arqamweb.com`, `wa.me`, `mailto:info@`, `facebook.com`, `instagram.com`, `linkedin.com` — all must return zero matches
- [X] T058 Verify `fetchpriority="high"` is present on the hero `<img>` and `decoding="async"` is present on all `<img>` tags in the template
- [X] T059 Verify `loading="lazy"` is present on all non-hero images (process step icons, benefit icons) — the hero image must NOT have `loading="lazy"`
- [X] T060 Enable `WP_DEBUG` and `WP_DEBUG_LOG`, load the page with all fields populated, then with all fields empty — confirm zero log entries both times
- [X] T061 Resize the browser to 375px, 768px, and 1280px. Screenshot or visually confirm no layout breaks, no text overflow, no overlapping elements at any breakpoint
- [X] T062 Confirm `data-aos` attributes are present on section wrappers (for AOS.js scroll animations) and that no new `will-change: transform` inline styles were added (per PERF SPEC-019 from feature 001)
- [X] T063 Run quickstart.md validation checklist end-to-end: all checkboxes in the "Verify the Template Renders" and "Empty Fields Smoke Test" sections must pass
- [X] T064 Final grep sweep of `page-foundation-architecture.php`: confirm `add_action`, `add_filter`, `<style>`, `<script>` are all absent from the template file

**Feature 003 (Foundation & Architecture Page) Complete**

**Quote Form Refactor Complete**: The multi-step quote form in `template-parts/quote-new.php` and `inc/helpers/ajax-handlers.php` has been refactored to support 9 steps per service (Branding, Website, SEO) with exact field mappings from production site. The form now includes:
- Service-specific step configurations
- Dynamic conditional field rendering
- Service-specific validation rules
- Full backend support for all new fields
- File upload support for logos and SEO reports

---

## Dependencies & Execution Order

### Phase Dependencies

- **Phase 1** (Setup): No dependencies — start immediately
- **Phase 2** (Foundational): Depends on Phase 1 — blocks all user story phases
- **Phase 3** (US1): Depends on Phase 2 — the primary MVP deliverable
- **Phase 4** (US2): Depends on Phase 3 implementation being present (needs the sections to exist to test empty-state behavior)
- **Phase 5** (US3): Depends on Phase 3 (needs rendered HTML to audit)
- **Phase 6** (Polish): Depends on all three user story phases being complete

### User Story Dependencies

- **US1 (P1)**: Can start immediately after Phase 2 — no dependencies on US2 or US3
- **US2 (P2)**: Depends on US1 implementation (needs the sections to exist)
- **US3 (P3)**: Depends on US1 implementation (needs rendered HTML)

### Within Each Phase: Review Task Order

All `[P]`-marked review tasks within a phase can run in parallel immediately after the implementation tasks in that phase complete.

---

## Parallel Opportunities

### Phase 3 Review (after T021 complete)
```
Run in parallel:
  T022 — grep for get_field(
  T023 — grep for get_permalink( INT
  T024 — grep for hardcoded URLs
  T025 — check img width/height attributes
  T026 — check picture/source structure
```

### Phase 4 Review (after T035 complete)
```
Run in parallel:
  T036 → T037 (clear fields, check log)
  T038 (check hero picture absent)
  T039 (check repeater sections absent)
```

### Phase 5 Review (after T047 complete)
```
Run in parallel:
  T048 — axe DevTools audit
  T049 — W3C HTML validator
  T053 — duplicate ID grep
```

### Phase 6 Polish (parallel group)
```
Run in parallel:
  T055 — Lighthouse audit
  T056 — grep integer permalinks
  T057 — grep hardcoded URLs
  T058+T059 — fetchpriority / loading attributes
```

---

## Implementation Strategy

### MVP First (User Story 1 Only)

1. Complete Phase 1: Setup (T001–T005)
2. Complete Phase 2: Foundational (T006–T015)
3. Complete Phase 3: User Story 1 (T016–T031)
4. **STOP and VALIDATE**: All five sections render, CTAs work, no PHP errors, no hardcoded values
5. Demo / show to stakeholder

### Full Delivery

1. MVP (above) → validated
2. Phase 4: US2 empty-state hardening (T032–T043)
3. Phase 5: US3 accessibility/SEO (T044–T054)
4. Phase 6: Polish sweep (T055–T064)

---

## Notes

- `[P]` = different concern, no incomplete-task dependency, can run simultaneously
- `[US1/2/3]` = maps to user stories in spec.md for traceability
- **Review tasks are not optional**: each phase's review tasks are the primary quality gate given the implementation comes from a cheaper model
- Every grep review task is a hard gate — any match is a spec violation requiring a fix before moving forward
- WP_DEBUG_LOG must be checked both with fields populated AND with fields empty — they are different failure modes
- The `arqamweb_get_image_field()` helper returns `null` when the field is empty — callers must null-check before accessing array keys
