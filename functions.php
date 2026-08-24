<?php

/**
 * Arqam-Web functions and definitions
 *
 * @package Arqam-Web
 */

// ── Constants ──────────────────────────────────────────────────────────────────

if (! defined('ARQAM_S_VERSION'))          define('ARQAM_S_VERSION',          '1.0.0');
if (! defined('ARQAM_HOME_CACHE_KEY'))     define('ARQAM_HOME_CACHE_KEY',     'arqam_home_v1');
if (! defined('ARQAM_FEATURED_PROJECTS_LIMIT')) define('ARQAM_FEATURED_PROJECTS_LIMIT', 6);
if (! defined('ARQAM_QUOTE_PAGE_SLUG'))         define('ARQAM_QUOTE_PAGE_SLUG',         'request-a-quote');
if (! defined('ARQAM_PRIVACY_PAGE_SLUG'))       define('ARQAM_PRIVACY_PAGE_SLUG',       'privacy-policy');
if (! defined('ARQAM_TERMS_PAGE_SLUG'))         define('ARQAM_TERMS_PAGE_SLUG',         'terms-of-service');
if (! defined('ARQAM_COOKIE_PAGE_SLUG'))        define('ARQAM_COOKIE_PAGE_SLUG',        'cookie-policy');
if (! defined('ARQAM_CONTACT_PAGE_SLUG'))       define('ARQAM_CONTACT_PAGE_SLUG',       'contact-us');
if (! defined('ARQAM_PROJECTS_PAGE_SLUG'))      define('ARQAM_PROJECTS_PAGE_SLUG',      'our-projects');
if (! defined('ARQAM_SERVICES_PAGE_SLUG'))      define('ARQAM_SERVICES_PAGE_SLUG',      'services');
if (! defined('ARQAM_REVIEWS_PAGE_SLUG'))       define('ARQAM_REVIEWS_PAGE_SLUG',       'clients-reviews');
if (! defined('ARQAM_ABOUT_PAGE_SLUG'))         define('ARQAM_ABOUT_PAGE_SLUG',         'about-us');
if (! defined('ARQAM_WHATSAPP_NUMBER'))         define('ARQAM_WHATSAPP_NUMBER',         '+201118721404');
if (! defined('ARQAM_CONTACT_EMAIL'))           define('ARQAM_CONTACT_EMAIL',           'info@arqamweb.com');
if (! defined('ARQAM_SOCIAL_FACEBOOK_URL'))     define('ARQAM_SOCIAL_FACEBOOK_URL',     'https://www.facebook.com/ArqamWeb');
if (! defined('ARQAM_SOCIAL_INSTAGRAM_URL'))    define('ARQAM_SOCIAL_INSTAGRAM_URL',    'https://www.instagram.com/arqamweb/');
if (! defined('ARQAM_SOCIAL_LINKEDIN_URL'))     define('ARQAM_SOCIAL_LINKEDIN_URL',     'https://www.linkedin.com/company/arqamweb/');
if (! defined('ARQAM_CF7_WEBHOOK_URL'))         define('ARQAM_CF7_WEBHOOK_URL',         'https://n8n.arqamweb.com/webhook/cf7-lead');

// ── Helpers (no dependencies) ──────────────────────────────────────────────────
require get_template_directory() . '/inc/helpers/acf-helpers.php';
require get_template_directory() . '/inc/helpers/template-helpers.php';
require get_template_directory() . '/inc/helpers/ajax-handlers.php';

// ── Walker Classes ─────────────────────────────────────────────────────────────
require get_template_directory() . '/inc/class-walker-nav-menu.php';
require get_template_directory() . '/inc/class-walker-footer-menu.php';

// ── Theme Classes ──────────────────────────────────────────────────────────────
require get_template_directory() . '/inc/class-project.php';
require get_template_directory() . '/inc/class-theme-setup.php';
require get_template_directory() . '/inc/class-assets.php';
require get_template_directory() . '/inc/class-schema.php';

// ── Existing Theme Files ───────────────────────────────────────────────────────
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';

if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

// ── Hooks — MUST be last ───────────────────────────────────────────────────────
require get_template_directory() . '/inc/hooks/hooks.php';

add_filter('body_class', function ($classes) {
	if (!is_front_page()) {
		$classes[] = 'not-frontend';
	}
	return $classes;
});
