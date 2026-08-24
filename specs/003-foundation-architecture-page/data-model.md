# Data Model: Foundation and Architecture Page

**Branch**: `003-foundation-architecture-page` | **Date**: 2026-03-31

All fields are ACF Pro fields stored as WordPress post meta on the Foundation & Architecture page (`post_type = page`, `page_template = page-foundation-architecture.php`). No new database tables or custom post types.

---

## ACF Field Group

**Group name**: `Foundation & Architecture Page Fields`
**Location rule**: Page Template == `Foundation & Architecture`

---

## Entities & Fields

### Hero Block

| Field Key | ACF Type | Required | Fallback | Notes |
|-----------|----------|----------|----------|-------|
| `fa_hero_headline` | Text | Yes | `''` (section hidden if empty) | Section `<h1>` |
| `fa_hero_subheadline` | Textarea | No | `''` | Rendered as `<p>` |
| `fa_hero_background` | Image (Array) | No | Solid `bg-gray-900` background | Returns `['url','alt','width','height']` via `arqamweb_get_image_field()` |
| `fa_cta_label` | Text | No | `'Request a Quote'` | CTA button label |

**Validation rules**:
- If `fa_hero_background` is null, hero renders with a solid dark background — no broken `<img>` tag.
- `fa_cta_label` always has a safe fallback so the CTA button is always present.

---

### Service Description Block

| Field Key | ACF Type | Required | Fallback | Notes |
|-----------|----------|----------|----------|-------|
| `fa_service_intro` | Text | No | `''` | Section intro headline, rendered via `arqamweb_get_text_field()` |
| `fa_service_points` | Repeater | No | — | 3–6 rows recommended; section hidden if 0 rows |
| `fa_service_points` → `fa_service_point_title` | Text (sub-field) | Yes (per row) | Row skipped if empty | Bullet point label |
| `fa_service_points` → `fa_service_point_desc` | Text (sub-field) | No | `''` | One-line supporting description |

**Validation rules**:
- Section is completely absent from HTML if `have_rows('fa_service_points')` is falsy.
- Rows with an empty `fa_service_point_title` are skipped during the loop.

---

### Process Steps Block

| Field Key | ACF Type | Required | Fallback | Notes |
|-----------|----------|----------|----------|-------|
| `fa_process_steps` | Repeater | No | — | Section hidden if 0 rows |
| `fa_process_steps` → `fa_step_title` | Text (sub-field) | Yes (per row) | Row skipped if empty | Step name |
| `fa_process_steps` → `fa_step_description` | Textarea (sub-field) | No | `''` | Step body — `<p>` absent if empty |
| `fa_process_steps` → `fa_step_icon` | Image (sub-field, optional) | No | Step number shown instead | Returns array via `arqamweb_get_image_field()` |

**Validation rules**:
- Step description `<p>` tag must not render when `fa_step_description` is empty.
- If `fa_step_icon` is null, display the step number (1, 2, 3…) as the visual indicator instead.

---

### Benefits Block

| Field Key | ACF Type | Required | Fallback | Notes |
|-----------|----------|----------|----------|-------|
| `fa_benefits` | Repeater | No | — | Section hidden if 0 rows |
| `fa_benefits` → `fa_benefit_title` | Text (sub-field) | Yes (per row) | Row skipped if empty | Benefit name |
| `fa_benefits` → `fa_benefit_description` | Textarea (sub-field) | No | `''` | Benefit body |
| `fa_benefits` → `fa_benefit_icon` | Image (sub-field, optional) | No | Generic check-mark SVG fallback | Returns array via `arqamweb_get_image_field()` |

---

### Closing CTA Block

| Field Key | ACF Type | Required | Fallback | Notes |
|-----------|----------|----------|----------|-------|
| `fa_cta_title` | Text | No | `''` (section still renders) | CTA section headline |
| `fa_cta_description` | Textarea | No | `''` | Supporting text under headline |

**Notes**:
- CTA button label and href are not ACF fields — they use `ARQAM_QUOTE_PAGE_SLUG` constant resolved via `arqamweb_get_page_permalink()`, consistent with the single-project.php CTA pattern.
- The closing CTA section always renders (it is structural), but headline/description can be empty — they simply don't output HTML.

---

## Field Key Naming Convention

All field keys use the `fa_` prefix (Foundation & Architecture) to avoid collision with other ACF field groups on shared page types. Sub-field keys inherit the parent repeater prefix (e.g., `fa_service_points` → `fa_service_point_title`).

---

## Section Order (page template)

```
1. Hero                    (fa_hero_*)
2. Service Description     (fa_service_intro + fa_service_points repeater)
3. Our Process             (fa_process_steps repeater)
4. Why It Matters          (fa_benefits repeater)
5. Closing CTA             (fa_cta_title + fa_cta_description + hardcoded CTA button)
```

---

## Relationships

- All fields belong to a single ACF field group assigned to one page.
- No relationships to other post types (no ACF relationship fields, no WP_Query).
- CTA button links to the quote page via `arqamweb_get_page_permalink(ARQAM_QUOTE_PAGE_SLUG)` — resolved at render time, not stored.
