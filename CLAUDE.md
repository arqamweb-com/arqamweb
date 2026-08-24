# arqam-web Development Guidelines

Auto-generated from all feature plans. Last updated: 2026-03-31

## Active Technologies
- PHP 8.x + WordPress 6.x, ACF Pro (Advanced Custom Fields) (002-architecture-refactor)
- MySQL via WordPress — no schema changes (002-architecture-refactor)
- PHP 8.x (WordPress 6.x), HTML5, Tailwind CSS 3.x (utility classes via compiled `style.min.css`) + ACF Pro (repeater fields), AOS.js (scroll animations, globally enqueued), existing `inc/helpers/` layer (003-foundation-architecture-page)
- MySQL via WordPress post meta (ACF fields) — no schema changes, no new CPT (003-foundation-architecture-page)

- PHP 8.x (WordPress), JavaScript (ES2020), SCSS + WordPress 6.x, Tailwind CSS 3.x, AOS.js, Blaze Slider, ACF (Advanced Custom Fields) (001-performance-accessibility-fixes)

## Project Structure

```text
src/
tests/
```

## Commands

npm test && npm run lint

## Code Style

PHP 8.x (WordPress), JavaScript (ES2020), SCSS: Follow standard conventions

## Recent Changes
- 003-foundation-architecture-page: Added PHP 8.x (WordPress 6.x), HTML5, Tailwind CSS 3.x (utility classes via compiled `style.min.css`) + ACF Pro (repeater fields), AOS.js (scroll animations, globally enqueued), existing `inc/helpers/` layer
- 002-architecture-refactor: Added PHP 8.x + WordPress 6.x, ACF Pro (Advanced Custom Fields)

- 001-performance-accessibility-fixes: Added PHP 8.x (WordPress), JavaScript (ES2020), SCSS + WordPress 6.x, Tailwind CSS 3.x, AOS.js, Blaze Slider, ACF (Advanced Custom Fields)

<!-- MANUAL ADDITIONS START -->
<!-- MANUAL ADDITIONS END -->
