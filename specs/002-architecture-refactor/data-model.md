# Data Model: WordPress Theme Architecture Refactoring

**Phase 1 Output** — Branch: `002-architecture-refactor` | Date: 2026-03-26

> This feature has no new database entities. The "data model" here describes the **class interfaces** and **function contracts** for the new PHP files being created.

---

## Class: ArqamWeb_Project

**File**: `inc/class-project.php`
**Pattern**: All static methods. No instantiation.
**Dependency**: `arqamweb_get_image_field()` from `inc/helpers/acf-helpers.php`

| Method | Return Type | ACF Fields Accessed | Fallback |
|--------|-------------|---------------------|----------|
| `get_hero_title( int $post_id )` | `string` | `hero_title` | `get_the_title( $post_id )` |
| `get_category( int $post_id )` | `string` | `project_category` | `''` |
| `get_tags( int $post_id )` | `WP_Term[]` | `get_the_terms( $post_id, 'project_tag' )` | `[]` |
| `get_action_button( int $post_id )` | `array\|null` | `action_button_text`, `website_url` | `null` if no text — shape: `['text'=>string,'url'=>string]` |
| `get_portfolio_image( int $post_id )` | `array\|null` | `portfolio_image` | `null` |
| `get_stat( int $post_id )` | `array` | `project_stat_value`, `project_stat_label` | `['value'=>'','label'=>'']` |
| `get_showcase_images( int $post_id )` | `array[]` | `image_1`..`image_4` | `[]` — each element: `['url'=>string,'alt'=>string,'width'=>int,'height'=>int]` via `arqamweb_get_image_field()`; null results excluded |
| `get_video_id( int $post_id )` | `string\|null` | `video_url` | `null` |
| `get_transform_cards( int $post_id )` | `array[]` | `icon_1..3`, `tag_1..3`, `title_1..3`, `desc_1..3` | `[]` — each card: `['icon'=>string,'tag'=>string,'title'=>string,'desc'=>string]`; cards with empty title excluded |
| `get_project_phases( int $post_id )` | `array[]` | `project_phases` (relation) | `[]` |
| `get_features( int $post_id )` | `array` | `arqamweb_features` (relation) | `[]` |
| `get_result_features( int $post_id )` | `array` | `arqamweb_results_features` (relation) | `[]` |
| `get_cta( int $post_id )` | `array` | `calltoaction_title`, `calltoaction_description` | `['title'=>'','description'=>'']` |
| `get_is_featured( int $post_id )` | `bool` | meta key `is_featured` | `false` |
| `get_related_projects( int $post_id, int $limit = 3 )` | `WP_Query` | WP_Query by post type | Empty WP_Query |
| `get_featured_projects( int $limit )` | `WP_Query` | meta_query `is_featured=1` | Empty WP_Query |
| `get_all_projects( int $per_page, int $paged )` | `WP_Query` | post_type=project | Empty WP_Query |

**WP_Query args — `get_featured_projects()`**:
```php
[
    'post_type'      => 'project',
    'posts_per_page' => $limit,
    'no_found_rows'  => true,   // no pagination
    'meta_query'     => [[ 'key' => 'is_featured', 'value' => '1' ]],
]
```

**WP_Query args — `get_all_projects()`**:
```php
[
    'post_type'      => 'project',
    'posts_per_page' => $per_page,
    'paged'          => $paged,
    'no_found_rows'  => false,  // pagination required
]
```

**WP_Query args — `get_related_projects()`**:
```php
[
    'post_type'      => 'project',
    'posts_per_page' => $limit,
    'post__not_in'   => [ $post_id ],
    'no_found_rows'  => true,
]
```

---

## Class: ArqamWeb_Theme_Setup

**File**: `inc/class-theme-setup.php`
**Pattern**: All static methods. No instantiation.

| Method | Current function | Lines moved from |
|--------|-----------------|------------------|
| `setup()` | `arqam_web_setup()` | `functions.php:23–106` |
| `set_content_width()` | `arqam_web_content_width()` | `functions.php:116–119` |
| `register_widgets()` | `arqam_web_widgets_init()` | `functions.php:127–140` |
| `allow_svg_filetype( $data, $file, $filename, $mimes )` | anonymous closure | `functions.php:371–378` |
| `add_svg_mime_type( array $mimes )` | `cc_mime_types()` | `functions.php:380–384` |
| `fix_svg_admin_display()` | `fix_svg()` | `functions.php:387–396` |
| `set_image_threshold( int $threshold )` | anonymous closure | `functions.php:399–401` |

Hook registrations (moved to `hooks.php`):
- `after_setup_theme` → `setup`
- `after_setup_theme` (priority 0) → `set_content_width`
- `widgets_init` → `register_widgets`
- `wp_check_filetype_and_ext` → `allow_svg_filetype`
- `upload_mimes` → `add_svg_mime_type`
- `admin_head` → `fix_svg_admin_display`
- `big_image_size_threshold` → `set_image_threshold` (returns 2560)

---

## Class: ArqamWeb_Assets

**File**: `inc/class-assets.php`
**Pattern**: All static methods + one private helper.

| Method | Current function | Lines moved from |
|--------|-----------------|------------------|
| `enqueue()` | `arqam_web_scripts()` | `functions.php:146–177` |
| `preload_hints()` | `arqam_web_preload_hints()` | `functions.php:183–205` |
| `defer_scripts( $tag, $handle, $src )` | `arqam_web_defer_scripts()` | `functions.php:210–219` |
| `admin_tinymce_script()` | `add_custom_admin_script()` | `functions.php:413–434` |
| `cf7_webhook_script()` | anonymous `wp_footer` closure | `functions.php:466–493` |
| `private get_asset_version( string $path )` | inline `filemtime()` × 7 | `functions.php:146–177` |

`get_asset_version()` signature:
```php
private static function get_asset_version( string $relative_path ): string {
    $full_path = get_template_directory() . $relative_path;
    return (string) ( filemtime( $full_path ) ?: wp_get_theme()->get( 'Version' ) );
}
```

CF7 webhook change:
```php
// Before (raw echo):
add_action( 'wp_footer', function() {
    ?>
    <script>
        document.addEventListener('wpcf7mailsent', function(e) { ... });
    </script>
    <?php
});

// After (wp_add_inline_script):
public static function cf7_webhook_script(): void {
    $script = "document.addEventListener('wpcf7mailsent', function(e) { ... });";
    wp_add_inline_script( 'contact-form-7', $script, 'after' );
}
```

Hook registrations (moved to `hooks.php`):
- `wp_enqueue_scripts` → `enqueue`
- `wp_head` (priority 1) → `preload_hints`
- `script_loader_tag` → `defer_scripts`
- `admin_footer` → `admin_tinymce_script`
- `wp_footer` → `cf7_webhook_script`

---

## Functions: inc/helpers/acf-helpers.php

| Function | Signature | Returns | Never returns |
|----------|-----------|---------|---------------|
| `arqamweb_get_text_field` | `( string $key, int $post_id, string $fallback = '' ): string` | `string` — esc_html applied | `false`, `null` |
| `arqamweb_get_image_field` | `( string $key, int $post_id ): ?array` | `['url','alt','width','height']` or `null` | `false` |
| `arqamweb_get_relation_field` | `( string $key, int $post_id ): array` | `WP_Post[]` (may be empty) | `false` |
| `arqamweb_get_url_field` | `( string $key, int $post_id, string $fallback = '#' ): string` | Escaped URL string | `false`, `null` |

`arqamweb_get_image_field()` normalization:
- ACF "Image Array" format: field returns `['url' => ..., 'alt' => ..., 'width' => ..., 'height' => ...]`
- ACF "Image URL" format: field returns a string URL — normalize to array with empty alt, 0 width/height
- If `is_array()` → use directly; else → wrap in normalized array with fallback dimensions

---

## Functions: inc/helpers/template-helpers.php

| Function | Signature | Returns |
|----------|-----------|---------|
| `arqamweb_get_logo_markup` | `( string $context = 'header' ): string` | Full `<picture>` HTML |
| `arqamweb_get_page_permalink` | `( string $slug ): string` | Escaped permalink or `home_url('/')` |
| `arqamweb_get_whatsapp_url` | `(): string` | `https://wa.me/` + `ARQAM_WHATSAPP_NUMBER` |
| `arqamweb_get_contact_email` | `(): string` | `ARQAM_CONTACT_EMAIL` constant value |
| `arqamweb_get_copyright_year` | `(): string` | `date('Y')` |
| `arqamweb_get_language_switcher` | `(): string` | `do_shortcode('[wpml_language_selector_widget]')` |
| `arqamweb_get_breadcrumb` | `(): void` | Calls `rank_math_the_breadcrumbs()` if available |

Logo markup output shape:
```html
<!-- context = 'header' -->
<picture>
    <source srcset="{uri}/frontend/img/Arqam-Web-Logo.webp" type="image/webp">
    <img src="{uri}/frontend/img/Arqam-Web-Logo.png" alt="ArqamWeb Logo"
         width="200" height="55" decoding="async" fetchpriority="high" class="...">
</picture>

<!-- context = 'footer' -->
<picture>
    <source srcset="{uri}/frontend/img/Arqam-Web-Logo-White-Title.webp" type="image/webp">
    <img src="{uri}/frontend/img/Arqam-Web-Logo-White-Title.png" alt="ArqamWeb Logo"
         width="200" height="66" decoding="async" class="...">
</picture>
```

---

## Constants: functions.php (top section)

| Constant | Value | Used in |
|----------|-------|---------|
| `ARQAM_FEATURED_PROJECTS_LIMIT` | `6` | `ArqamWeb_Project::get_featured_projects()` |
| `ARQAM_QUOTE_PAGE_SLUG` | `'quote'` | `header.php`, `single-project.php` CTA |
| `ARQAM_PRIVACY_PAGE_SLUG` | `'privacy-policy'` | `footer.php` |
| `ARQAM_TERMS_PAGE_SLUG` | `'terms-of-service'` | `footer.php` |
| `ARQAM_COOKIE_PAGE_SLUG` | `'cookie-policy'` | `footer.php` |
| `ARQAM_WHATSAPP_NUMBER` | `'966500000000'` | `arqamweb_get_whatsapp_url()` |
| `ARQAM_CONTACT_EMAIL` | `'info@arqamweb.com'` | `arqamweb_get_contact_email()` |
| `ARQAM_SOCIAL_FACEBOOK_URL` | `'https://www.facebook.com/ArqamWeb'` | `footer.php` |
| `ARQAM_SOCIAL_INSTAGRAM_URL` | `'https://www.instagram.com/arqamweb/'` | `footer.php` |
| `ARQAM_SOCIAL_LINKEDIN_URL` | `'https://www.linkedin.com/company/arqamweb/'` | `footer.php` |

All constants guarded with `if ( ! defined( 'CONSTANT_NAME' ) )`.

---

## functions.php After Refactor (target structure)

```php
<?php
/**
 * arqam-web functions and definitions
 */

// Constants
if ( ! defined( 'ARQAM_FEATURED_PROJECTS_LIMIT' ) ) define( 'ARQAM_FEATURED_PROJECTS_LIMIT', 6 );
if ( ! defined( 'ARQAM_QUOTE_PAGE_SLUG' ) )         define( 'ARQAM_QUOTE_PAGE_SLUG',         'quote' );
if ( ! defined( 'ARQAM_PRIVACY_PAGE_SLUG' ) )       define( 'ARQAM_PRIVACY_PAGE_SLUG',       'privacy-policy' );
if ( ! defined( 'ARQAM_TERMS_PAGE_SLUG' ) )         define( 'ARQAM_TERMS_PAGE_SLUG',         'terms-of-service' );
if ( ! defined( 'ARQAM_COOKIE_PAGE_SLUG' ) )        define( 'ARQAM_COOKIE_PAGE_SLUG',        'cookie-policy' );
if ( ! defined( 'ARQAM_WHATSAPP_NUMBER' ) )         define( 'ARQAM_WHATSAPP_NUMBER',         '966500000000' );
if ( ! defined( 'ARQAM_CONTACT_EMAIL' ) )           define( 'ARQAM_CONTACT_EMAIL',           'info@arqamweb.com' );
if ( ! defined( 'ARQAM_SOCIAL_FACEBOOK_URL' ) )     define( 'ARQAM_SOCIAL_FACEBOOK_URL',     'https://www.facebook.com/ArqamWeb' );
if ( ! defined( 'ARQAM_SOCIAL_INSTAGRAM_URL' ) )    define( 'ARQAM_SOCIAL_INSTAGRAM_URL',    'https://www.instagram.com/arqamweb/' );
if ( ! defined( 'ARQAM_SOCIAL_LINKEDIN_URL' ) )     define( 'ARQAM_SOCIAL_LINKEDIN_URL',     'https://www.linkedin.com/company/arqamweb/' );

// Helpers (no dependencies)
require get_template_directory() . '/inc/helpers/acf-helpers.php';
require get_template_directory() . '/inc/helpers/template-helpers.php';

// Classes
require get_template_directory() . '/inc/class-walker-nav-menu.php';
require get_template_directory() . '/inc/class-walker-footer-menu.php';
require get_template_directory() . '/inc/class-project.php';
require get_template_directory() . '/inc/class-theme-setup.php';
require get_template_directory() . '/inc/class-assets.php';

// Existing theme files
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/custom-header.php';

// Hooks — MUST be last (all classes must exist)
require get_template_directory() . '/inc/hooks/hooks.php';
```

Total: ~35 lines (well under the 60-line target).

---

## State Transitions: None

This feature reorganizes existing code — no state machines, no new database tables, no schema changes.
