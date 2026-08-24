# Feature Specification: Foundation and Architecture Page

**Feature Branch**: `003-foundation-architecture-page`
**Created**: 2026-03-31
**Status**: Draft
**Input**: User description: "Read ARCHITECTURE-REFACTOR-SPEC.md and create a specification for the phase 6: Foundation and Architecture page ONLY."

---

## Overview

A dedicated WordPress page that showcases ArqamWeb's "Foundation & Architecture" service offering — the strategic and technical groundwork (site structure, information architecture, tech stack selection, scalability planning) that ArqamWeb provides to clients before full project execution. The page must integrate with the existing theme architecture produced in features 001 and 002, using ACF Pro fields for all editable content and the helper classes from `inc/helpers/` for all data access.

---

## Clarifications

### Session 2026-03-31

- Q: What is the content structure of the "Service Description" section? → A: Bullet list — `fa_service_intro` (text) + ACF repeater of 3–6 short bullet points, each with a title and a one-line description.
- Q: Should this page capture leads with an inline form or only link to the quote page? → A: Link only — CTA buttons redirect to the quote page; no inline form on this page.
- Q: Which hero visual pattern should the Foundation & Architecture page use? → A: New pattern — full-width ACF-managed background image with text/CTA overlay, no decorative orbs or animated elements.
- Q: Should the page include a "Related Projects" showcase section? → A: No — out of scope; page links to the quote page only, no project query on this page.

---

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Potential Client Discovers the Service (Priority: P1)

A business owner or marketing manager visits the Foundation & Architecture page from the main navigation or a project case study link, quickly understands what the service covers, and decides to request a quote.

**Why this priority**: This is the primary conversion path. If the page cannot communicate the service value and drive the visitor to the quote form, everything else on the page is irrelevant.

**Independent Test**: Load the page on both desktop and mobile. Verify all sections render, all CTAs link to the quote page, and a visitor with no prior context can describe the service after reading.

**Acceptance Scenarios**:

1. **Given** a visitor lands on `/foundation-architecture`, **When** they scroll through the page, **Then** they see a hero, a service description, a process breakdown, a benefits section, and at least one CTA button that links to the quote page.
2. **Given** a visitor clicks the primary CTA button, **When** the click is registered, **Then** they are taken to the quote page resolved via `ARQAM_QUOTE_PAGE_SLUG` — no hardcoded URL in the template.
3. **Given** the page is loaded on a 375px mobile viewport, **When** they scroll, **Then** all sections are fully readable with no horizontal overflow and no overlapping elements.

---

### User Story 2 - Content Editor Updates Page Copy (Priority: P2)

An ArqamWeb team member updates the hero headline, service bullets, or process step descriptions through the WordPress admin without touching any PHP or template file.

**Why this priority**: The page must be maintainable without developer involvement for routine copy changes.

**Independent Test**: In WP Admin, edit every ACF field on this page, save, and verify every change appears on the front end with no PHP errors or notices in the debug log.

**Acceptance Scenarios**:

1. **Given** an editor is in WP Admin on the Foundation & Architecture page, **When** they update an ACF text field and save, **Then** the new value renders on the front end through the helper layer — no raw `get_field()` call exists in the template file.
2. **Given** an ACF field is intentionally left empty, **When** the page renders, **Then** the corresponding section either hides gracefully or shows a safe fallback string — no PHP notice, no broken layout, no empty HTML attribute.
3. **Given** the editor uploads a new hero background image via ACF, **When** the page loads, **Then** the new image is displayed inside a `<picture>` element with a WebP source, a PNG/JPG fallback, and the correct `alt` text drawn from the ACF image array.

---

### User Story 3 - Search Engine Crawls the Page (Priority: P3)

A search engine bot crawls the page and indexes well-structured, semantically correct HTML with a proper heading hierarchy, descriptive alt text on every image, and no duplicate element IDs.

**Why this priority**: Organic discoverability for foundation and architecture service keywords in the Egypt/KSA market.

**Independent Test**: Run axe DevTools and the W3C HTML validator against the rendered page. Zero critical violations, no duplicate IDs, headings form a valid H1 → H2 → H3 hierarchy.

**Acceptance Scenarios**:

1. **Given** the page is rendered, **When** an HTML validator inspects it, **Then** there are no duplicate `id` attributes and the heading level order is strictly hierarchical with a single H1.
2. **Given** all images have ACF alt text fields populated, **When** a screen reader reads the page, **Then** every `<img>` carries a meaningful non-empty `alt` attribute sourced from the ACF field — never the hardcoded fallback.
3. **Given** the page has a breadcrumb region, **When** it renders, **Then** `arqamweb_get_breadcrumb()` is the only breadcrumb call in the template — no direct plugin function call.

---

### Edge Cases

- What happens when ACF Pro is active but the field group is not yet assigned to the page template? All helper functions return safe fallbacks (`''` for text, `null` for images), so the page renders without fatal errors, showing only the structural HTML skeleton.
- What if the quote page is deleted and recreated with a new database ID? `arqamweb_get_page_permalink(ARQAM_QUOTE_PAGE_SLUG)` resolves by slug, so the CTA links automatically update without any template edit.
- What happens when a process step ACF repeater row has a title but no description? The description element must not render an empty `<p>` tag — it should be absent entirely.
- How does the page behave under WPML language switching? All layout uses existing `rtl:` Tailwind variants; no new RTL overrides are introduced. If WPML is active, the page renders without errors in both Arabic and English, though translation setup itself is out of scope.

---

## Requirements *(mandatory)*

### Functional Requirements

- **FR-001**: The page MUST be a standard WordPress page using a named page template file (`page-foundation-architecture.php`) registered with a `/*Template Name: Foundation & Architecture*/` docblock comment.
- **FR-002**: All editable content — hero headline, subheadline, service intro text, service bullet points, process steps, benefits list, and CTA copy — MUST be managed through ACF Pro field groups assigned exclusively to this page template. No copy is hardcoded in the template file.
- **FR-003**: The template MUST NOT call `get_field()` directly anywhere. All ACF data access MUST go through `arqamweb_get_text_field()`, `arqamweb_get_image_field()`, or equivalent functions from `inc/helpers/acf-helpers.php`.
- **FR-004**: All internal links — CTA buttons, nav references — MUST use `arqamweb_get_page_permalink()` with the appropriate `ARQAM_*_SLUG` constant. Zero hardcoded page IDs or absolute internal URLs in the template.
- **FR-005**: The page MUST include a hero section using a new pattern: a full-width ACF-managed background image (`fa_hero_background`) with a text/CTA overlay. The hero contains a headline, a subheadline, and a primary CTA button linking to the quote page. No decorative orbs, animated SVG vectors, or homepage-specific CSS classes are used. If `fa_hero_background` is empty, the hero falls back to a solid background color.
- **FR-006**: The page MUST include a "Our Process" section containing an ACF repeater with a minimum of 3 steps. Each step has a title and a description field. If the repeater is empty, the section is hidden entirely.
- **FR-007**: The page MUST include a "Why It Matters" benefits section with an ACF repeater. Each benefit item has a title and a description. If the repeater is empty, the section is hidden entirely.
- **FR-008**: The page MUST include a closing CTA section that visually matches the CTA block pattern used in `single-project.php`, using `arqamweb_get_page_permalink(ARQAM_QUOTE_PAGE_SLUG)` for its action link. The page MUST NOT embed any inline contact or inquiry form — all lead capture is handled exclusively through the quote page.
- **FR-009**: All images on the page MUST use a `<picture>` element with a WebP source and a PNG or JPG fallback, consistent with the pattern in `arqamweb_get_logo_markup()` and the image helpers from SPEC-005 of the architecture refactor.
- **FR-010**: The page MUST render with zero PHP notices, warnings, or fatal errors. `WP_DEBUG_LOG` must be clean after a full page load with all ACF fields both populated and intentionally empty.
- **FR-011**: Scroll animation attributes (`data-aos`) MAY be applied to sections. When present, they MUST work with the globally registered `prefers-reduced-motion` override already in `style.scss` — no additional motion CSS is needed.
- **FR-012**: The page MUST be registerable in the WordPress navigation menus via WP Admin. No hardcoded navigation item is added to any template file.
- **FR-013**: The page MUST include a "Service Description" section between the hero and the "Our Process" section. It consists of an intro text field (`fa_service_intro`) and an ACF repeater of 3–6 bullet items, each with a `fa_service_point_title` (text) and `fa_service_point_desc` (one-line text). If the repeater is empty, the section is hidden entirely.

### Key Entities

- **Foundation & Architecture Page**: A single WordPress page using the named template. Contains all ACF field groups for this service's editable content.
- **Process Step**: An ACF repeater row with fields: `fa_step_title` (text), `fa_step_description` (textarea), `fa_step_icon` (image, optional).
- **Benefit Item**: An ACF repeater row with fields: `fa_benefit_title` (text), `fa_benefit_description` (textarea), `fa_benefit_icon` (image, optional).
- **Hero Block**: ACF fields — `fa_hero_headline` (text), `fa_hero_subheadline` (textarea), `fa_hero_background` (image, optional), `fa_cta_label` (text).
- **Closing CTA Block**: ACF fields — `fa_cta_title` (text), `fa_cta_description` (textarea) — mirrors the CTA field naming pattern from the project post type.
- **Service Description Block**: ACF fields — `fa_service_intro` (text, section headline/intro), plus a repeater of 3–6 bullet items each with `fa_service_point_title` (text) and `fa_service_point_desc` (text, one line). Positioned between the hero and "Our Process" sections.

---

## Success Criteria *(mandatory)*

### Measurable Outcomes

- **SC-001**: A non-developer team member can update any text or image on the page through WP Admin in under 5 minutes without touching any PHP or template file.
- **SC-002**: The rendered page scores zero critical or serious violations in an axe DevTools accessibility audit.
- **SC-003**: The rendered HTML contains no duplicate `id` attributes, no raw `get_permalink(INT)` calls, and no hardcoded internal URLs.
- **SC-004**: `WP_DEBUG_LOG` shows zero PHP notices, warnings, or errors after a full page load under two conditions: all ACF fields populated, and all ACF fields left empty.
- **SC-005**: The primary CTA button correctly resolves to the quote page URL even after the quote page is deleted and recreated with a new database ID.
- **SC-006**: The page layout is intact and has no horizontal overflow or overlapping elements at viewport widths 375px, 768px, and 1280px.

---

## Assumptions

- ACF Pro is active on the installation and a field group will be created in WP Admin and assigned to the `Foundation & Architecture` page template — consistent with how all other content is managed in this theme.
- The page slug will be `foundation-architecture`. No new `ARQAM_*_SLUG` constant is required for this page itself, as it is not linked from other templates at launch.
- No new WordPress custom post type or taxonomy is required — this is a single static page.
- The page does not require a dedicated CSS or JS bundle at launch. The globally enqueued `style.min.css`, `main.js`, AOS.js, and Blaze Slider from feature 001 are sufficient.
- WPML translation of this page is out of scope. The template must be WPML-compatible (using `__()` / `_e()` for any hardcoded UI strings), but translation content setup is a separate task.
- The "process steps" and "benefit items" sections use ACF repeater fields. ACF Pro (which supports repeaters) is already a declared dependency of this project (see CLAUDE.md).
- Hero background image will either use an existing asset from `frontend/img/` or be uploaded directly through the ACF image field in WP Admin.
- The page will be manually added to the main navigation by the content team after the template is deployed — no automated menu registration is needed.
- No "Related Projects" section is included on this page. Project social proof is available via the main projects archive page, which visitors can reach from the nav menu.
