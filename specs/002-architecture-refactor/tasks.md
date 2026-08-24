# Tasks: WordPress Theme Architecture Refactoring

**Input**: Design documents from `/specs/002-architecture-refactor/`
**Branch**: `002-architecture-refactor`
**Tests**: No automated tests — validation is manual (grep + visual inspection + error_log)

## Format: `[ID] [P?] [Story] Description`

- **[P]**: Can run in parallel (different files, no dependencies on each other)
- **[Story]**: Primary user story this task serves
- No automated test tasks — spec explicitly states manual validation only

---

## Phase 1: Zero-Risk Extractions

**Purpose**: Safest changes first — move class code to own files, delete one debug line. No template changes, no hook changes. Verify site loads after each task.

**⚠️ Verification after each task**: Load homepage. Check `error_log` for PHP errors. Confirm nav menus render.

- [ ] T001 [US3] Delete `console.log(...)` line at `functions.php:428` inside `add_custom_admin_script()` — SPEC-003
- [ ] T002 [P] [US3] Create `inc/class-walker-nav-menu.php` with exact copy of `Custom_Walker_Nav_Menu` class from `functions.php:252–303`; add `require get_template_directory() . '/inc/class-walker-nav-menu.php';` before the class definition; delete the class body from `functions.php` — SPEC-001
- [ ] T003 [P] [US3] Create `inc/class-walker-footer-menu.php` with exact copy of `Custom_Footer_Walker` class from `functions.php:307–365`; add `require get_template_directory() . '/inc/class-walker-footer-menu.php';` before the class definition; delete the class body from `functions.php` — SPEC-002

**Checkpoint**: Homepage nav and footer nav render identically. `error_log` silent. `wc -l functions.php` is ~100 lines smaller.

---

## Phase 2: Foundation Layer

**Purpose**: Define all constants and create all helper/class files. No templates changed yet. Each file can be required from `functions.php` as it is created.

**⚠️ CRITICAL**: T007 depends on T005. T006 depends on T004. T004 and T005 are independent and can be done in parallel.

- [ ] T004 [P] [US3] Add all 10 `ARQAM_` constants to `functions.php` (grouped block, each guarded with `if ( ! defined(...) )`) — values from data-model.md — SPEC-004
- [ ] T005 [P] [US2] Create `inc/helpers/acf-helpers.php` with 4 functions: `arqamweb_get_text_field()`, `arqamweb_get_image_field()`, `arqamweb_get_relation_field()`, `arqamweb_get_url_field()` — return types per data-model.md; require from `functions.php` — SPEC-005
- [ ] T006 [US4] Create `inc/helpers/template-helpers.php` with 7 functions: `arqamweb_get_logo_markup()`, `arqamweb_get_page_permalink()`, `arqamweb_get_whatsapp_url()`, `arqamweb_get_contact_email()`, `arqamweb_get_copyright_year()`, `arqamweb_get_language_switcher()`, `arqamweb_get_breadcrumb()` — specs per data-model.md; require from `functions.php` after constants; depends on T004 — SPEC-006
- [ ] T007 [US2] Create `inc/class-project.php` with `ArqamWeb_Project` class — all 17 static methods per data-model.md; `get_video_id()` MUST use `isset( $matches[1] )` guard; all three query methods return `WP_Query`; `get_action_button()` returns `['text'=>string,'url'=>string]|null`; all text methods return raw unescaped values; require from `functions.php` after acf-helpers; depends on T005 — SPEC-007

**Checkpoint**: Load any page. Zero PHP errors. All constants accessible. All new PHP files load without syntax errors (`php -l`).

---

## Phase 3: US2 — Zero `get_field()` Calls in Templates

**Goal**: `single-project.php` and `template-parts/projects.php` have zero direct `get_field()` calls — all ACF access goes through `ArqamWeb_Project`.

**Independent Test**: `grep -rn "get_field(" single-project.php template-parts/projects.php` returns zero results. Load a single-project page — all sections render correctly.

**⚠️ These tasks all touch `single-project.php` — must be done sequentially T008→T011.**

- [ ] T008 [US2] Update `single-project.php` hero section and portfolio image: replace `get_field('hero_title')` with `ArqamWeb_Project::get_hero_title()`, `get_field('project_category')` with `::get_category()`, taxonomy loop with `::get_tags()`, action button fields with `::get_action_button()` (add `if ($btn)` guard), 12-line portfolio image normalization block with `::get_portfolio_image()` — SPEC-008
- [ ] T009 [US2] Update `single-project.php` video section: replace `get_field('video_url')` + `preg_match()` block with `ArqamWeb_Project::get_video_id( get_the_ID() )`; wrap entire video section in `<?php if ( $video_id ) : ?>` ... `<?php endif; ?>` — SPEC-009
- [ ] T010 [US2] Update `single-project.php` transform cards and phases: replace `for ($i=1;$i<=3;$i++)` with `ArqamWeb_Project::get_transform_cards( get_the_ID() )` and iterate returned array; replace `get_field('project_phases')` block with `ArqamWeb_Project::get_project_phases( get_the_ID() )` — SPEC-010
- [ ] T011 [US2] Update `single-project.php` features, results, CTA, related projects: replace `get_field('arqamweb_features')` block with `ArqamWeb_Project::get_features()`; replace `get_field('arqamweb_results_features')` block with `::get_result_features()`; replace `get_field('calltoaction_*')` calls with `::get_cta()`; replace inline related `WP_Query` with `::get_related_projects()`; replace hardcoded `https://www.arqamweb.com` CTA links with `arqamweb_get_page_permalink( ARQAM_QUOTE_PAGE_SLUG )` — SPEC-011
- [ ] T012 [US2] Update `template-parts/projects.php`: replace featured `WP_Query` block with `ArqamWeb_Project::get_featured_projects( ARQAM_FEATURED_PROJECTS_LIMIT )`; replace all-projects `WP_Query` block with `::get_all_projects( 12, get_query_var('paged') )`; replace `get_field('project_category')` with `::get_category()`; replace stat fields with `::get_stat()`; replace hardcoded WhatsApp URL with `arqamweb_get_whatsapp_url()`; replace hardcoded email with `'mailto:' . arqamweb_get_contact_email()` — SPEC-012

**Checkpoint**: `grep -rn "get_field(" single-project.php template-parts/projects.php` → zero results. Load a project with a video → renders. Load a project without a video → video section absent, zero PHP notices. Projects archive pagination works.

---

## Phase 4: US4 — No Hardcoded Page IDs or URLs

**Goal**: `header.php` and `footer.php` have zero `get_permalink(INT)` calls, no hardcoded copyright year, no hardcoded social URLs, no duplicated logo markup.

**Independent Test**: `grep -rn "get_permalink([0-9]" . --include="*.php"` → zero results. Footer copyright year shows `2026`. Logo renders in both header and footer.

- [ ] T013 [US4] Update `header.php`: replace `get_permalink(62)` with `arqamweb_get_page_permalink( ARQAM_QUOTE_PAGE_SLUG )`; replace `<picture>` logo block (lines 43–54) with `echo arqamweb_get_logo_markup( 'header' )`; replace `do_shortcode('[wpml_language_selector_widget]')` with `arqamweb_get_language_switcher()`. Update `footer.php`: replace footer `<picture>` logo block (lines 41–48) with `echo arqamweb_get_logo_markup( 'footer' )`; replace `get_permalink(688)` / `(691)` / `(693)` with `arqamweb_get_page_permalink( ARQAM_PRIVACY_PAGE_SLUG )` / `TERMS` / `COOKIE`; replace hardcoded `2024` copyright year with `arqamweb_get_copyright_year()`; replace hardcoded social URLs with `ARQAM_SOCIAL_FACEBOOK_URL`, `ARQAM_SOCIAL_INSTAGRAM_URL`, `ARQAM_SOCIAL_LINKEDIN_URL` constants — SPEC-013

**Checkpoint**: Homepage loads. Header logo renders. Footer logo renders. Footer copyright shows current year. Privacy/Terms/Cookie links resolve. Social links use constant values.

---

## Phase 5: US1 + US3 — Class Extraction and Hook Consolidation

**Goal**: All remaining logic extracted from `functions.php` into `ArqamWeb_Theme_Setup` and `ArqamWeb_Assets`; all hooks consolidated in `inc/hooks/hooks.php`; `functions.php` reduced to ≤ 60 lines.

**Independent Test**: `grep -r "add_action\|add_filter" functions.php` → zero results. `wc -l functions.php` ≤ 60. Full page load with zero PHP errors.

**⚠️ T014 and T015 both modify `functions.php` — do sequentially. T016 can be done alongside T014 (different file). T017 MUST be last — all classes must exist.**

- [ ] T014 [US3] Create `inc/class-theme-setup.php` with `ArqamWeb_Theme_Setup` class — 7 static methods per data-model.md (`setup`, `set_content_width`, `register_widgets`, `allow_svg_filetype`, `add_svg_mime_type`, `fix_svg_admin_display`, `set_image_threshold`); copy exact logic from `functions.php` source lines; add require to `functions.php`; delete all 7 old functions and their inline `add_action`/`add_filter` calls from `functions.php` atomically — SPEC-014
- [ ] T015 [US3] Create `inc/class-assets.php` with `ArqamWeb_Assets` class — 5 public static methods + 1 private `get_asset_version()` per data-model.md; `cf7_webhook_script()` MUST use `wp_add_inline_script( 'contact-form-7', $script, 'after' )` instead of raw echo; `get_asset_version()` eliminates 7 repeated `filemtime()` calls in `enqueue()`; add require to `functions.php`; delete all 5 old functions and their inline `add_action`/`add_filter` calls from `functions.php` atomically; depends on T014 — SPEC-015
- [ ] T016 [P] [US1] Merge `font-[Dubai]` body class into `arqam_web_body_classes()` in `inc/template-functions.php`: add `'font-[Dubai]'` to the classes array inside that function; delete `add_body_class()` function from `functions.php`; delete `add_filter( 'body_class', 'add_body_class' )` from `functions.php` — SPEC-017
- [ ] T017 [US1] Create `inc/hooks/hooks.php` with ALL `add_action`/`add_filter` registrations per ARCHITECTURE-REFACTOR-SPEC.md SPEC-016 hook list; update `functions.php` require block to final target structure from data-model.md (constants → helpers → classes → existing inc files → hooks.php LAST); verify `functions.php` has ≤ 60 lines and zero `add_action`/`add_filter` calls; depends on T014, T015, T016 — SPEC-016

**Checkpoint**: `grep -r "add_action\|add_filter" functions.php` → zero. `wc -l functions.php` ≤ 60. Every page loads. `error_log` silent. `<body>` has `font-[Dubai]` class.

---

## Phase 6: US5 — Cleanup and Verification

**Goal**: Dead code documented, visual output confirmed identical, grep assertions all pass.

**Independent Test**: All SC-001 through SC-010 from spec.md pass.

- [ ] T018 [P] [US5] Audit `inc/template-tags.php`: run `grep -rn "arqam_web_posted_on\|arqam_web_posted_by\|arqam_web_entry_footer\|arqam_web_post_thumbnail" . --include="*.php"`; if zero results, add comment block at top of file: `// Legacy starter-theme functions. Not called by any active template. Safe to delete in future cleanup.` — SPEC-018
- [ ] T019 [P] [US5] Audit `template-parts/content/content-project.php`: run `grep -rn "get_template_part.*content-project\|get_template_part.*content/content-project" . --include="*.php"`; add comment at top of file documenting grep result and caller (if any) or marking as unused — SPEC-019

**Final Verification Checklist**:
- [ ] T020 [US5] Run all SC grep assertions: (1) `wc -l functions.php` ≤ 60; (2) `grep -r "add_action\|add_filter" functions.php` = 0; (3) `grep -r "get_field(" single-project.php template-parts/` = 0; (4) `grep -rn "get_permalink([0-9]" . --include="*.php"` = 0; (5) Check `error_log` for zero PHP errors/notices; (6) Visually inspect homepage, single-project, projects archive, quote page

---

## Dependencies & Execution Order

### Phase Dependencies

- **Phase 1** (T001–T003): No dependencies — start immediately
- **Phase 2** (T004–T007): Depends on Phase 1 complete. T004+T005 can be parallel. T006 depends on T004. T007 depends on T005.
- **Phase 3** (T008–T012): Depends on Phase 2 complete (T007 especially). T008→T009→T010→T011 must be sequential (same file). T012 can start after Phase 2 independently.
- **Phase 4** (T013): Depends on Phase 2 complete (T006 for helpers). Independent of Phase 3.
- **Phase 5** (T014–T017): Depends on Phases 1–4 complete. T014→T015 sequential. T016 parallel with T014. T017 must be last.
- **Phase 6** (T018–T020): Depends on all phases complete. T018+T019 parallel.

### User Story Completion Order

- **US3** (functions.php < 60 lines): T001, T002, T003 → T004 → T014, T015, T016, T017
- **US2** (zero get_field in templates): T005 → T007 → T008→T009→T010→T011→T012
- **US4** (no hardcoded page IDs): T006 → T013
- **US1** (hooks in one place): T014, T015, T016 → T017
- **US5** (visual output identical): T018, T019, T020

### Parallel Opportunities

- T002 + T003 (Phase 1): Different files, fully independent
- T004 + T005 (Phase 2): Different files, fully independent
- T012 (projects.php): Can run in parallel with T008–T011 (different file)
- T013 (header/footer): Can run in parallel with T008–T012 (different files), after T006
- T016 (template-functions.php): Can run in parallel with T014 (different file)
- T018 + T019 (Phase 6): Different files, fully independent

---

## Implementation Strategy

### MVP First (US2: Zero ACF in Templates)

1. Complete Phase 1 (T001–T003) — zero risk
2. Complete Phase 2 foundation (T004–T007)
3. Complete Phase 3 (T008–T012)
4. **STOP and VALIDATE**: `grep -r "get_field(" single-project.php template-parts/` = 0
5. US2 delivered — every other story can be tackled independently

### Incremental Delivery

1. Phase 1 → Site unchanged, functions.php shorter
2. Phase 2 → All new files created, wired in, site unchanged
3. Phase 3 → US2 complete (zero ACF in templates)
4. Phase 4 → US4 complete (no hardcoded IDs)
5. Phase 5 → US1+US3 complete (hooks.php + slim functions.php)
6. Phase 6 → US5 verified (visual output confirmed identical)

---

## Notes

- **No automated tests** — validation is grep + visual inspection + `error_log`
- **Commit after each phase** — each phase is independently verifiable
- **hooks.php MUST be required last** — if required before any class, PHP fatal
- **Big-bang per class** (T014, T015) — extract ALL methods of one class atomically, delete old functions in same change
- **Raw values from ArqamWeb_Project** — templates call `esc_html()` / `esc_attr()` / `esc_url()` at render time (FR-016)
- **All query methods return WP_Query** — templates use `have_posts()` / `the_post()` / `wp_reset_postdata()` (FR-017)
- **get_action_button() shape** — `['text'=>string,'url'=>string]|null`, template guards with `if ($btn)` (FR-018)
- Do NOT change `newsletter form action` URL in `footer.php` (`admin-ajax.php?action=tnp`) — requires plugin testing
