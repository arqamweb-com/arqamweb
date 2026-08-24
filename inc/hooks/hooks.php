<?php
/**
 * All add_action / add_filter registrations for the arqam-web theme.
 * This is the single source of truth for theme hooks.
 * MUST be required last — all classes must exist before this file loads.
 *
 * @package Arqam-Web
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// ── Theme Setup ────────────────────────────────────────────────────────────────
add_action( 'after_setup_theme',        [ 'ArqamWeb_Theme_Setup', 'setup' ] );
add_action( 'after_setup_theme',        [ 'ArqamWeb_Theme_Setup', 'set_content_width' ], 0 );
add_action( 'widgets_init',             [ 'ArqamWeb_Theme_Setup', 'register_widgets' ] );
add_action( 'admin_notices',            [ 'ArqamWeb_Theme_Setup', 'svg_upload_notice' ] );
add_filter( 'big_image_size_threshold', [ 'ArqamWeb_Theme_Setup', 'set_image_threshold' ] );

// ── Assets ─────────────────────────────────────────────────────────────────────
add_action( 'wp_enqueue_scripts',       [ 'ArqamWeb_Assets', 'enqueue' ] );
add_action( 'wp_enqueue_scripts',       [ 'ArqamWeb_Assets', 'optimize_plugin_assets' ], 100 );
add_action( 'wp_head',                  [ 'ArqamWeb_Assets', 'preload_hints' ], 1 );
add_filter( 'script_loader_tag',        [ 'ArqamWeb_Assets', 'defer_scripts' ], 10, 3 );
add_action( 'admin_footer',             [ 'ArqamWeb_Assets', 'admin_tinymce_script' ] );
add_action( 'wp_footer',                [ 'ArqamWeb_Assets', 'cf7_webhook_script' ] );

// ── Floating contact widget (site-wide) ────────────────────────────────────────
add_action( 'wp_footer',                'arqamweb_floating_contact' );

// ── Schema.org / SEO ───────────────────────────────────────────────────────────
add_action( 'wp_head', [ 'ArqamWeb_Schema', 'organization_and_website' ], 5 );
add_action( 'wp_head', [ 'ArqamWeb_Schema', 'faq_page' ],                 6 );
add_action( 'wp_head', [ 'ArqamWeb_Schema', 'reviews_aggregate' ],        7 );
add_action( 'wp_head', [ 'ArqamWeb_Schema', 'article' ],                  8 );
add_action( 'wp_head', [ 'ArqamWeb_Schema', 'project' ],                  9 );
add_action( 'wp_head', [ 'ArqamWeb_Schema', 'item_list' ],                10 );
add_action( 'wp_head', [ 'ArqamWeb_Schema', 'person_author' ],            10 );
// Fallbacks — only fire when no SEO plugin is active
add_action( 'wp_head', [ 'ArqamWeb_Schema', 'opengraph_fallback' ],       2 );
add_action( 'wp_head', [ 'ArqamWeb_Schema', 'meta_description_fallback' ], 2 );
add_action( 'wp_head', [ 'ArqamWeb_Schema', 'canonical_fallback' ],       2 );
add_action( 'wp_head', [ 'ArqamWeb_Schema', 'breadcrumb_list' ],          4 );
// hreflang — fires when WPML active but Rank Math is absent
add_action( 'wp_head', [ 'ArqamWeb_Schema', 'hreflang' ],                 3 );
// Rank Math integration — upgrade Organization → LocalBusiness + inject Service schema
add_filter( 'rank_math/json_ld', [ 'ArqamWeb_Schema', 'enhance_rank_math_schema' ], 20, 2 );

// ── Customizer ─────────────────────────────────────────────────────────────────
add_action( 'customize_register',       'arqam_web_customize_register' );
add_action( 'customize_preview_init',   'arqam_web_customize_preview_js' );

// ── Custom Header ──────────────────────────────────────────────────────────────
add_action( 'after_setup_theme',        'arqam_web_custom_header_setup' );

// ── Jetpack ────────────────────────────────────────────────────────────────────
if ( defined( 'JETPACK__VERSION' ) ) {
	add_action( 'after_setup_theme', 'arqam_web_jetpack_setup' );
}

// ── Home page transient cache invalidation (clears all WPML languages) ─────────
add_action( 'save_post',    'arqamweb_clear_home_cache' );
add_action( 'deleted_post', 'arqamweb_clear_home_cache' );
add_action( 'trashed_post', 'arqamweb_clear_home_cache' );

// ── AJAX ───────────────────────────────────────────────────────────────────────
add_action( 'wp_ajax_arqamweb_quote_request',        'arqamweb_handle_quote_request' );
add_action( 'wp_ajax_nopriv_arqamweb_quote_request', 'arqamweb_handle_quote_request' );

// ── Template ───────────────────────────────────────────────────────────────────
add_filter( 'body_class',               'arqam_web_body_classes' );
add_action( 'wp_head',                  'arqam_web_pingback_header' );
add_filter(
	'robots_txt',
	function ( $output, $public ) {
		if ( $public ) {
			$output .= "\nSitemap: " . esc_url( home_url( '/sitemap_index.xml' ) ) . "\n";
		}
		return $output;
	},
	10,
	2
);
