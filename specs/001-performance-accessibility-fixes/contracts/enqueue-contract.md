# Contract: WordPress Enqueue Functions

**Scope**: All `wp_enqueue_script()` and `wp_enqueue_style()` calls in `functions.php`

---

## Script Enqueue Contract

Every script enqueued by this theme MUST:

1. Use `$in_footer = true` (3rd positional arg or `['in_footer' => true]`)
2. Use `filemtime( get_template_directory() . '/path/to/file.js' )` as the version arg
3. Declare explicit dependencies array (empty `[]` if none)
4. Be added to the `$defer_handles` array in `arqam_web_defer_scripts()` if it should load deferred

## Style Enqueue Contract

Every style enqueued by this theme MUST:

1. Use `filemtime()` for version
2. Load on `'all'` media (or a specific media query if intentionally targeted)
3. Be conditionally enqueued if only needed on specific page types

## Removed Handles (do not re-add without justification)

| Handle | Reason removed |
|--------|---------------|
| `arqam-web-smooth-scroll` | Functionality consolidated into `main.js` |
