# Implementation Plan: WordPress Theme Architecture Refactoring

**Branch**: `002-architecture-refactor` | **Date**: 2026-03-26 | **Spec**: `specs/002-architecture-refactor/spec.md`
**Input**: Feature specification from `/specs/002-architecture-refactor/spec.md`

---

## Summary

Refactor the `arqam-web` WordPress theme to separate logic from templates, extract inline classes to dedicated files, centralize all hooks in a single registry, replace hardcoded values with named constants, and introduce a typed ACF data-access layer. The refactor produces zero behavioral or visual changes — it is a structural reorganization only.

**End state:**
- `functions.php`: ≤ 60 lines (constants + requires only)
- `inc/hooks/hooks.php`: single file containing every `add_action`/`add_filter`
- `inc/class-project.php`: `ArqamWeb_Project` — all ACF data access in one class
- `inc/class-theme-setup.php`, `inc/class-assets.php`: extracted from functions.php
- `inc/helpers/acf-helpers.php`, `inc/helpers/template-helpers.php`: typed helpers
- `inc/class-walker-nav-menu.php`, `inc/class-walker-footer-menu.php`: moved walker classes

---

## Technical Context

**Language/Version**: PHP 8.x
**Primary Dependencies**: WordPress 6.x, ACF Pro (Advanced Custom Fields)
**Storage**: MySQL via WordPress — no schema changes
**Testing**: Manual — grep verification + visual inspection + `error_log` monitoring
**Target Platform**: WordPress theme (Apache/MAMP locally, production at arqamweb.com)
**Project Type**: WordPress theme refactoring (pure structural reorganization)
**Performance Goals**: No regression — identical page load times
**Constraints**: Zero behavioral changes; zero visual changes; zero PHP errors/notices
**Scale/Scope**: Single-site WordPress theme, ~10 PHP files modified, ~8 new files created

---

## Constitution Check

*GATE: Must pass before Phase 0 research. Re-check after Phase 1 design.*

The constitution is a template (not yet filled). Applying arqam-web project principles from ARCHITECTURE-REFACTOR-SPEC.md:

| Principle | Status |
|-----------|--------|
| `ArqamWeb_` class prefix (no PHP namespaces) | ✅ All new classes follow this convention |
| File naming: `class-*.php` WordPress convention | ✅ All new files use `class-*.php` naming |
| Every `add_action`/`add_filter` lives only in `inc/hooks/hooks.php` | ✅ Core architectural constraint |
| Templates never call `get_field()` directly | ✅ All ACF access goes through `ArqamWeb_Project` |
| No behavior changes — pure refactoring | ✅ Visual and functional output must be identical |

**GATE: PASS** — no violations. No complexity justification required.

---

## Project Structure

### Documentation (this feature)

```text
specs/002-architecture-refactor/
├── plan.md              # This file (/speckit.plan command output)
├── research.md          # Phase 0 output (/speckit.plan command)
├── data-model.md        # Phase 1 output (/speckit.plan command)
├── quickstart.md        # Phase 1 output (/speckit.plan command)
└── tasks.md             # Phase 2 output (/speckit.tasks command)
```

### Source Code (repository root)

```text
# New files created by this refactor:
inc/
├── class-theme-setup.php       # SPEC-014: ArqamWeb_Theme_Setup
├── class-assets.php            # SPEC-015: ArqamWeb_Assets
├── class-project.php           # SPEC-007: ArqamWeb_Project
├── class-walker-nav-menu.php   # SPEC-001: Custom_Walker_Nav_Menu (moved)
├── class-walker-footer-menu.php# SPEC-002: Custom_Footer_Walker (moved)
├── helpers/
│   ├── acf-helpers.php         # SPEC-005: arqamweb_get_*_field() functions
│   └── template-helpers.php    # SPEC-006: logo, permalink, social helpers
└── hooks/
    └── hooks.php               # SPEC-016: all add_action/add_filter calls

# Modified files:
functions.php                   # SPEC-003/004/016: ≤60 lines after refactor
header.php                      # SPEC-013: use helpers for logo and permalink
footer.php                      # SPEC-013: use helpers for logo, permalinks, year
single-project.php              # SPEC-008/009/010/011: use ArqamWeb_Project
template-parts/projects.php     # SPEC-012: use ArqamWeb_Project + helpers
inc/template-functions.php      # SPEC-017: merge body_class filter
inc/template-tags.php           # SPEC-018: audit dead code
template-parts/content/content-project.php  # SPEC-019: audit legacy template
```

**Structure Decision**: WordPress convention — no `src/` directory. All PHP in theme root. Walker classes in `inc/`, helpers in `inc/helpers/`, hooks in `inc/hooks/`. Matches WordPress Coding Standards for themes.

---

## Complexity Tracking

No Constitution Check violations — no complexity justification required.

---

## Execution Order

Phases are strictly ordered. Each phase must be complete and verified before the next begins. Phases within each tier are independent and can be done in any order within the tier.

### Tier 1 — Zero-Risk (no template changes)
1. SPEC-003 — Remove console.log *(30 seconds, single line delete)*
2. SPEC-001 — Extract walker nav menu
3. SPEC-002 — Extract walker footer menu

### Tier 2 — Foundation (no behavior changes)
4. SPEC-004 — Define ARQAM_ constants
5. SPEC-005 — Create acf-helpers.php
6. SPEC-006 — Create template-helpers.php
7. SPEC-007 — Create class-project.php (depends on SPEC-005)

### Tier 3 — Template Updates (visual output must remain identical)
8. SPEC-008 — single-project.php hero + portfolio image (depends on SPEC-007)
9. SPEC-009 — single-project.php video + null guard (depends on SPEC-007)
10. SPEC-010 — single-project.php transform cards + phases (depends on SPEC-007)
11. SPEC-011 — single-project.php features + results + CTA + related (depends on SPEC-007, SPEC-006)
12. SPEC-012 — template-parts/projects.php (depends on SPEC-007, SPEC-006)
13. SPEC-013 — header.php + footer.php (depends on SPEC-006, SPEC-004)

### Tier 4 — Class Extraction and Consolidation
14. SPEC-014 — Create class-theme-setup.php (depends on Tier 1–2 complete)
15. SPEC-015 — Create class-assets.php (depends on Tier 1–2 complete)
16. SPEC-017 — Merge body_class filters (depends on SPEC-014)
17. SPEC-016 — Create hooks.php and wire everything (depends on SPEC-014, SPEC-015, SPEC-017)

### Tier 5 — Cleanup and Audit
18. SPEC-018 — Audit template-tags.php
19. SPEC-019 — Audit content-project.php
