# Research: Foundation and Architecture Page

**Branch**: `003-foundation-architecture-page` | **Date**: 2026-03-31

---

## Decision 1: ACF Image → `<picture>` WebP/Fallback Pattern

**Decision**: Use `arqamweb_get_image_field( $key, $post_id )` from `inc/helpers/acf-helpers.php` to retrieve a normalized `['url','alt','width','height']` array, then render manually with a `<picture>` element.

**Rationale**: The helper already handles both ACF "Image Array" and "Image URL" return formats and normalizes to a consistent shape. The WebP source must be derived by replacing the file extension (`.jpg`/`.png` → `.webp`) using `preg_replace` on the URL, consistent with how `arqamweb_get_logo_markup()` works in `template-helpers.php`. If no WebP variant exists, the `<source>` tag simply won't match and the browser falls back to the `<img>` `src` — no error.

**Alternatives considered**:
- `wp_get_attachment_image()` — generates `<img>` only, no `<picture>`. Rejected: spec requires WebP source.
- ACF's `get_field()` direct — rejected: FR-003 prohibits direct `get_field()` in templates.

---

## Decision 2: Hero Full-Width Background Image with Text Overlay

**Decision**: Implement the hero as a `<section>` with a Tailwind `relative` container. The background image is rendered as an absolutely positioned `<picture>` element (cover fill) behind a semi-transparent overlay `<div>`, with the headline/CTA content in a relative `<div>` on top.

**Rationale**: This approach keeps the background image in the HTML (accessible, preloadable, correct `alt` attribute) rather than as a CSS `background-image` (which would make it invisible to screen readers and the preload scanner). It is consistent with WordPress and Tailwind best practices for hero sections. The `fetchpriority="high"` attribute on the hero `<img>` ensures LCP optimization, consistent with feature 001's SPEC-006 pattern.

**Implementation pattern**:
```html
<section class="relative min-h-[480px] flex items-center overflow-hidden">
  <picture class="absolute inset-0 w-full h-full">
    <source srcset="{webp_url}" type="image/webp">
    <img src="{fallback_url}" alt="{alt}" class="w-full h-full object-cover"
         width="{w}" height="{h}" fetchpriority="high" decoding="async">
  </picture>
  <div class="absolute inset-0 bg-gray-900/60"></div><!-- overlay -->
  <div class="container relative z-10 text-white">
    <!-- headline, subheadline, CTA -->
  </div>
</section>
```

**Alternatives considered**:
- CSS `background-image` inline style — rejected: inaccessible, not preloadable, requires hardcoded URL or PHP echo into style attribute (XSS risk if not escaped).
- Reuse homepage hero pattern — rejected in clarification Q3: adds orb/animation complexity not appropriate for a service page.

---

## Decision 3: ACF Repeater Empty-State Guard Pattern

**Decision**: Wrap every repeater-driven section in `<?php if ( have_rows( 'fa_process_steps', get_the_ID() ) ) : ?>` before the section HTML, so the section is entirely absent when no rows exist.

**Rationale**: `have_rows()` is the correct ACF function to check repeater availability. However, FR-003 prohibits direct `get_field()` — `have_rows()` is a separate ACF loop function, not `get_field()`, so its use is permitted. The helper layer (`arqamweb_get_text_field` etc.) handles scalar fields; repeater loops use ACF's native `have_rows()` / `the_row()` / `get_sub_field()` pattern, which is the standard WordPress/ACF idiom.

**Alternatives considered**:
- Wrapping all repeater access in a new `ArqamWeb_Project`-style class method — overkill for a single page template with no reuse across other templates. Deferred to a future refactor if this pattern proliferates.

---

## Decision 4: Service Description Bullet List Rendering

**Decision**: The service description section renders `fa_service_intro` as a section headline via `arqamweb_get_text_field()`, then loops the `fa_service_points` repeater to render a grid/list of `fa_service_point_title` + `fa_service_point_desc` pairs.

**Rationale**: Matches clarification Q1 answer (Option B). 3–6 bullet items in a responsive 2-column or 3-column grid (Tailwind `grid-cols-1 md:grid-cols-2 lg:grid-cols-3`) is the standard B2B service page pattern. Each item only renders if both title and description are non-empty (checked via `get_sub_field()` truthy check inside the loop).

---

## Decision 5: No Contracts File Needed

**Decision**: Skip the `contracts/` directory entirely for this feature.

**Rationale**: This is a purely internal WordPress page template. It exposes no API, no CLI interface, no public schema, and no inter-service communication. All "contracts" are the ACF field group key names documented in `data-model.md`.
