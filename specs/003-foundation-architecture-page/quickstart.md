# Quickstart: Foundation and Architecture Page

**Branch**: `003-foundation-architecture-page` | **Date**: 2026-03-31

---

## What This Feature Builds

A single WordPress page template (`page-foundation-architecture.php`) for ArqamWeb's "Foundation & Architecture" service page, with all content managed via ACF Pro field groups. No new JS, no new CSS bundle, no new CPT.

---

## Prerequisites

- MAMP running with WordPress 6.x at `http://localhost/wordpress`
- ACF Pro plugin active
- Theme active: `Arqam-Web`
- Feature 001 and 002 merged to `main` (helper layer must exist at `inc/helpers/`)
- Node + npm installed (only needed if rebuilding Tailwind CSS)

---

## Step 1: Switch to the Feature Branch

```bash
git checkout 003-foundation-architecture-page
```

---

## Step 2: Create the Page Template File

Create `page-foundation-architecture.php` in the theme root. The file must start with:

```php
<?php
/*
 * Template Name: Foundation & Architecture
 * Template Post Type: page
 */
```

See `data-model.md` for the full ACF field list and section order.

---

## Step 3: Create the ACF Field Group

In WP Admin → Custom Fields → Add New:

1. **Group name**: `Foundation & Architecture Page Fields`
2. **Location rule**: `Page Template` `is equal to` `Foundation & Architecture`
3. Add fields in this order (see `data-model.md` for all field keys, types, and sub-fields):
   - Hero Block fields (`fa_hero_headline`, `fa_hero_subheadline`, `fa_hero_background`, `fa_cta_label`)
   - Service Description (`fa_service_intro`, Repeater `fa_service_points` with sub-fields)
   - Process Steps (Repeater `fa_process_steps` with sub-fields)
   - Benefits (Repeater `fa_benefits` with sub-fields)
   - Closing CTA (`fa_cta_title`, `fa_cta_description`)
4. Save the field group.

---

## Step 4: Create the WordPress Page

In WP Admin → Pages → Add New:

1. Title: `Foundation & Architecture`
2. Slug: `foundation-architecture`
3. Page Template: select `Foundation & Architecture`
4. Publish the page.
5. Fill in all ACF fields with test content.

---

## Step 5: Verify the Template Renders

Visit `http://localhost/wordpress/foundation-architecture/` and check:

- [ ] Hero section renders with background image, headline, and CTA button
- [ ] CTA button href resolves to the quote page (not a raw integer permalink)
- [ ] Service description section shows intro + bullet list
- [ ] "Our Process" section shows all steps; section absent if repeater is empty
- [ ] "Why It Matters" section shows all benefits; section absent if repeater is empty
- [ ] Closing CTA section renders and CTA button links to quote page
- [ ] No horizontal overflow at 375px viewport
- [ ] `WP_DEBUG_LOG` is empty

---

## Step 6: Empty Fields Smoke Test

Clear all ACF fields (leave everything blank) and reload the page:

- [ ] No PHP notice or warning in `WP_DEBUG_LOG`
- [ ] Hero falls back to solid dark background (no broken `<img>`)
- [ ] Repeater-driven sections are completely absent from HTML
- [ ] Page does not crash or show a white screen

---

## Step 7: Accessibility Check

Run axe DevTools in Chrome on the rendered page:

- [ ] Zero critical violations
- [ ] Single H1 on the page
- [ ] All images have non-empty `alt` attributes
- [ ] No duplicate `id` attributes

---

## Key Files Reference

| File | Role |
|------|------|
| `page-foundation-architecture.php` | New page template (create this) |
| `inc/helpers/acf-helpers.php` | ACF helper functions — use these, never `get_field()` directly |
| `inc/helpers/template-helpers.php` | Logo, permalink, social helpers |
| `inc/hooks/hooks.php` | All hooks live here — do not add hooks in the template |
| `specs/003-foundation-architecture-page/data-model.md` | All ACF field keys and types |

---

## Common Pitfalls

| Pitfall | Solution |
|---------|---------|
| Using `get_field()` directly in template | Use `arqamweb_get_text_field()` / `arqamweb_get_image_field()` instead |
| Hardcoding the quote page URL | Use `arqamweb_get_page_permalink(ARQAM_QUOTE_PAGE_SLUG)` |
| Rendering an empty `<p>` for empty description | Check `get_sub_field()` truthy before outputting the tag |
| Hero `<img>` missing `width`/`height` | Always pass dimensions from the ACF image array to prevent CLS |
| Adding `add_action` in the template file | All hooks go in `inc/hooks/hooks.php` only |
