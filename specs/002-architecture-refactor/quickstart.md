# Quickstart: WordPress Theme Architecture Refactoring

**Branch**: `002-architecture-refactor`

## What This Feature Does

Pure refactoring of the arqam-web WordPress theme. No behavior changes. No visual changes. Reorganizes ~494 lines of `functions.php` into properly separated files with a typed data-access layer.

## New Files Created

| File | Purpose |
|------|---------|
| `inc/class-walker-nav-menu.php` | `Custom_Walker_Nav_Menu` class (moved from functions.php) |
| `inc/class-walker-footer-menu.php` | `Custom_Footer_Walker` class (moved from functions.php) |
| `inc/helpers/acf-helpers.php` | Type-safe ACF field accessors (`arqamweb_get_text_field`, etc.) |
| `inc/helpers/template-helpers.php` | Logo markup, page permalinks, social/contact helpers |
| `inc/class-project.php` | `ArqamWeb_Project` — all ACF data access for project post type |
| `inc/class-theme-setup.php` | `ArqamWeb_Theme_Setup` — theme setup, widgets, SVG, image threshold |
| `inc/class-assets.php` | `ArqamWeb_Assets` — enqueue, preload, defer, admin TinyMCE, CF7 |
| `inc/hooks/hooks.php` | ALL `add_action`/`add_filter` registrations in one file |

## Verification Commands

After each phase, run these to confirm no regressions:

```bash
# Check for PHP errors
tail -20 /Applications/MAMP/logs/php_error.log

# Confirm no hooks left in functions.php
grep -n "add_action\|add_filter" functions.php

# Confirm no get_field() in templates
grep -rn "get_field(" single-project.php template-parts/

# Confirm no hardcoded page IDs
grep -rn "get_permalink([0-9]" . --include="*.php"

# Line count target
wc -l functions.php
```

## Phase Order (MUST be followed)

1. **SPEC-003**: Remove `console.log` from functions.php *(do first — zero risk)*
2. **SPEC-001/002**: Extract walker classes
3. **SPEC-004**: Define ARQAM_ constants
4. **SPEC-005/006**: Create helper files
5. **SPEC-007**: Create `ArqamWeb_Project` class
6. **SPEC-008–013**: Update templates
7. **SPEC-014/015**: Create `ArqamWeb_Theme_Setup`, `ArqamWeb_Assets`
8. **SPEC-017**: Merge body_class filters
9. **SPEC-016**: Create `hooks.php` and wire everything *(do last)*
10. **SPEC-018/019**: Audit dead code

## Key Constraints

- **Zero visual changes** — if any page looks different after a phase, roll back that phase.
- **Zero PHP notices** — check `error_log` after every phase change.
- **hooks.php LAST** — requiring `hooks.php` before any class file causes a fatal error.
- **ArqamWeb_ prefix** — all new classes use this prefix. No PHP namespaces.
- **get_video_id() null guard** — MUST return `null` on missing/invalid URL, never access `$matches[1]` without checking `isset`.
