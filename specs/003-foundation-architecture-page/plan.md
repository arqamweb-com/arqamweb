# Implementation Plan: Foundation and Architecture Page

**Branch**: `003-foundation-architecture-page` | **Date**: 2026-03-31 | **Spec**: [spec.md](./spec.md)
**Input**: Feature specification from `/specs/003-foundation-architecture-page/spec.md`

## Summary

Create a WordPress page template (`page-foundation-architecture.php`) for ArqamWeb's "Foundation & Architecture" service page. The page uses a new hero pattern (full-width ACF-managed background image + text/CTA overlay, no decorative orbs), a service description bullet list, a process steps section, a benefits section, and a closing CTA — all content managed through ACF Pro field groups, all data access through the existing `inc/helpers/acf-helpers.php` and `inc/helpers/template-helpers.php` helper layer. No new CSS bundle, no new JS, no WP_Query, no inline form.

---

## Technical Context

**Language/Version**: PHP 8.x (WordPress 6.x), HTML5, Tailwind CSS 3.x (utility classes via compiled `style.min.css`)
**Primary Dependencies**: ACF Pro (repeater fields), AOS.js (scroll animations, globally enqueued), existing `inc/helpers/` layer
**Storage**: MySQL via WordPress post meta (ACF fields) — no schema changes, no new CPT
**Testing**: Manual browser testing + axe DevTools accessibility audit + W3C HTML validator + WP_DEBUG_LOG inspection
**Target Platform**: WordPress theme on MAMP (local) → arqamweb.com (production)
**Project Type**: WordPress page template + ACF field group configuration
**Performance Goals**: Lighthouse Performance ≥ 85 mobile, LCP < 2.5s, CLS < 0.1 (inherits from feature 001 global fixes)
**Constraints**: No new enqueued CSS/JS file, no new CPT, no raw `get_field()` in template, no hardcoded page IDs, no inline form, hero has no decorative orbs
**Scale/Scope**: Single static page — no pagination, no WP_Query, no AJAX

---

## Constitution Check

*GATE: Must pass before Phase 0 research. Re-check after Phase 1 design.*

The project constitution file is unpopulated (template placeholder only). No project-specific gates defined. The following theme-level coding rules (from CLAUDE.md and features 001/002) are applied as gates:

| Gate | Status | Notes |
|------|--------|-------|
| No raw `get_field()` in templates | PASS | All ACF access via helper layer (enforced by FR-003) |
| No hardcoded page IDs or absolute internal URLs | PASS | All links via `arqamweb_get_page_permalink()` (FR-004) |
| No new `add_action`/`add_filter` outside `hooks.php` | PASS | No new hooks needed — page template enqueues nothing new |
| `<picture>` WebP + fallback for all images | PASS | FR-009, enforced via `arqamweb_get_image_field()` return value |
| Zero PHP notices with empty fields | PASS | Repeater empty checks + helper fallbacks (FR-010) |
| No inline `<style>` or `<script>` blocks | PASS | No new CSS/JS on this page |

All gates pass. No violations to justify.

---

## Project Structure

### Documentation (this feature)

```text
specs/003-foundation-architecture-page/
├── plan.md              # This file
├── research.md          # Phase 0 output
├── data-model.md        # Phase 1 output
├── quickstart.md        # Phase 1 output
└── tasks.md             # Phase 2 output (/speckit.tasks — not created here)
```

### Source Code (repository root)

```text
# New files
page-foundation-architecture.php       # Page template (theme root)

# Modified files — none (existing helper layer used as-is)

# ACF field group (WP Admin only — not a PHP file)
# Field group: "Foundation & Architecture Page Fields"
# Assigned to: Page Template == Foundation & Architecture
```

**Structure Decision**: Single-file page template at theme root, consistent with WordPress convention and how all other page templates are placed in this theme. No new subdirectory needed. All logic flows through the existing `inc/` helper layer.

---

## Complexity Tracking

No constitution violations. Table omitted.
