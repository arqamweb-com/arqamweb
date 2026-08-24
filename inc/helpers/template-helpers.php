<?php

/**
 * Template helper functions — logo markup, permalinks, social/contact.
 * HTML-generating functions escape internally with esc_url()/esc_attr().
 *
 * @package Arqam-Web
 */

if (! defined('ABSPATH')) exit;

/**
 * Returns full <picture> logo HTML for header or footer context.
 * Escapes all dynamic values internally.
 *
 * @param string $context 'header' or 'footer'
 * @return string
 */
function arqamweb_get_logo_markup(string $context = 'header'): string
{
	$uri = get_template_directory_uri();

	if ($context === 'footer') {
		return '<picture>'
			. '<source srcset="' . esc_url($uri) . '/frontend/img/Arqam-Web-Logo-White-Title.webp" type="image/webp">'
			. '<img src="' . esc_url($uri) . '/frontend/img/Arqam-Web-Logo-White-Title.png"'
			. ' class="custom-logo astra-logo-svg min-w-24"'
			. ' alt="' . esc_attr__('Digital Marketing Agency in Egypt, Cairo | Arqam Web', 'arqamweb') . '"'
			. ' decoding="async" width="200" height="66">'
			. '</picture>';
	}

	return '<picture>'
		. '<source srcset="' . esc_url($uri) . '/frontend/img/Arqam-Web-Logo.webp" type="image/webp">'
		. '<img src="' . esc_url($uri) . '/frontend/img/Arqam-Web-Logo.png"'
		. ' alt="' . esc_attr(get_bloginfo('name')) . '"'
		. ' width="200" height="55" decoding="async" fetchpriority="high"'
		. ' class="custom-logo astra-logo-svg min-w-24">'
		. '</picture>';
}

/**
 * Returns escaped permalink for a page by slug.
 * Falls back to home_url('/') if page not found.
 */
function arqamweb_get_page_permalink(string $slug): string
{
	$page = get_page_by_path($slug);
	return $page ? esc_url(get_permalink($page)) : esc_url(home_url('/'));
}

/**
 * Returns the WhatsApp URL using the ARQAM_WHATSAPP_NUMBER constant.
 */
function arqamweb_get_whatsapp_url(): string
{
	return esc_url('https://wa.me/' . ARQAM_WHATSAPP_NUMBER);
}

/**
 * Returns the contact email address.
 */
function arqamweb_get_contact_email(): string
{
	return ARQAM_CONTACT_EMAIL;
}

/**
 * Returns the current 4-digit year as a string.
 */
function arqamweb_get_copyright_year(): string
{
	return date('Y');
}

/**
 * Returns the WPML language switcher shortcode output.
 * Returns empty string if WPML is not active.
 */
function arqamweb_get_language_switcher(): string
{
	return do_shortcode('[wpml_language_selector_widget]');
}

/**
 * Outputs the Rank Math breadcrumb if available.
 */
function arqamweb_get_breadcrumb(): void
{
	if (function_exists('rank_math_the_breadcrumbs')) {
		rank_math_the_breadcrumbs();
	}
}


/**
 * Arqam Web front page content.
 *
 * This file intentionally contains the page content only.
 */


if (!function_exists('arqam_icon')) {
	function arqam_icon($name)
	{
		$icons = [
			'arrow' => '<path d="M5 12h14M13 5l7 7-7 7"></path>',
			'website' => '<rect x="3" y="4" width="18" height="14" rx="2"></rect><path d="M3 9h18M8 14h2M14 14h2"></path>',
			'search' => '<circle cx="11" cy="11" r="7"></circle><path d="M21 21l-4.3-4.3"></path>',
			'brand' => '<path d="M12 3l3 6 6 .9-4.5 4.4 1.1 6.7L12 17.8l-5.6 3.2 1.1-6.7L3 9.9 9 9z"></path>',
			'social' => '<path d="M21 11.5a8.4 8.4 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.4 8.4 0 01-3.8-.9L3 21l1.9-5.7a8.4 8.4 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.4 8.4 0 013.8-.9h.5a8.5 8.5 0 018 8v.5z"></path>',
			'code' => '<path d="M16 18l6-6-6-6M8 6l-6 6 6 6M14 4l-4 16"></path>',
			'spark' => '<path d="M12 2v6M12 22v-6M4.93 4.93l4.24 4.24M14.83 14.83l4.24 4.24M2 12h6M22 12h-6"></path>',
			'bolt' => '<path d="M13 2L3 14h7l-1 8 10-12h-7l1-8z"></path>',
			'growth' => '<path d="M3 17l6-6 4 4 8-9M14 6h7v7"></path>',
			'team' => '<circle cx="9" cy="8" r="3"></circle><circle cx="17" cy="8" r="3"></circle><path d="M3 20c0-3 3-5 6-5s6 2 6 5M21 20c0-2-1.5-3.5-4-4.3"></path>',
			'play' => '<polygon points="6 4 20 12 6 20 6 4"></polygon>',
			'check' => '<path d="M20 6L9 17l-5-5"></path>',
			'plus' => '<path d="M12 5v14M5 12h14"></path>',
		];

		return '<svg class="aw-icon aw-icon--' . esc_attr($name) . '" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . ($icons[$name] ?? $icons['arrow']) . '</svg>';
	}
}

if (!function_exists('arqam_stars')) {
	function arqam_stars()
	{
		return str_repeat('<svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M12 2l3 7h7l-5.5 4.5L18 21l-6-4-6 4 1.5-7.5L2 9h7z"></path></svg>', 5);
	}
}


if (!function_exists('arqamweb_floating_contact')) {
	/**
	 * Output the site-wide floating contact widget (WhatsApp / Email / Call).
	 * Hooked to `wp_footer` so it renders on every front-end page.
	 */
	function arqamweb_floating_contact()
	{
		if ( is_admin() ) {
			return;
		}
		get_template_part('template-parts/partials/floating-contact');
	}
}


if (!function_exists('arqamweb_home_cache_key')) {
	/**
	 * Language-aware transient key for the blog index (home.php) cache.
	 * Without the language suffix, WPML would serve one language's cached
	 * post IDs to every language — making post__in queries return nothing
	 * for the other languages.
	 */
	function arqamweb_home_cache_key()
	{
		$lang = apply_filters('wpml_current_language', null); // 'en', 'ar', … or null when WPML is inactive
		return ARQAM_HOME_CACHE_KEY . ($lang ? '_' . $lang : '');
	}
}


if (!function_exists('arqamweb_clear_home_cache')) {
	/**
	 * Clear the blog index cache for the base key and every active WPML language.
	 */
	function arqamweb_clear_home_cache()
	{
		delete_transient(ARQAM_HOME_CACHE_KEY);
		$langs = apply_filters('wpml_active_languages', null);
		if (is_array($langs)) {
			foreach (array_keys($langs) as $code) {
				delete_transient(ARQAM_HOME_CACHE_KEY . '_' . $code);
			}
		}
	}
}


/**
 * Add Svg To Media Library
 */

add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {
	$filetype = wp_check_filetype($filename, $mimes);
	return [
		'ext' => $filetype['ext'],
		'type' => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];
}, 10, 4);

function cc_mime_types($mimes)
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

function fix_svg()
{
	echo '<style type="text/css">
          .attachment-266x266, .thumbnail img {
               width: 100% !important;
               height: auto !important;
          }
          </style>';
}

add_action('admin_head', 'fix_svg');
