<?php

/**
 * Cookie consent helper functions — consent checking, preference management.
 * Handles GDPR/PDPL compliance for cookie consent banner.
 *
 * @package Arqam-Web
 */

if (! defined('ABSPATH')) exit;

/**
 * Cookie name constant for storing user consent preferences.
 */
if (! defined('ARQAM_COOKIE_CONSENT_NAME')) {
	define('ARQAM_COOKIE_CONSENT_NAME', 'arqamweb_cookie_consent');
}

/**
 * Cookie expiry duration in seconds (1 year).
 */
if (! defined('ARQAM_COOKIE_CONSENT_EXPIRY')) {
	define('ARQAM_COOKIE_CONSENT_EXPIRY', 365 * DAY_IN_SECONDS);
}

/**
 * Determines if the cookie consent banner should be displayed.
 * Returns true if user has not yet made a consent choice.
 *
 * @return bool True if banner should be shown, false otherwise.
 */
function arqamweb_should_show_cookie_banner(): bool
{
	// Check if consent cookie exists
	return ! isset($_COOKIE[ARQAM_COOKIE_CONSENT_NAME]);
}

/**
 * Gets the current cookie consent value from the cookie.
 * Possible values: 'accepted', 'rejected', or null if not set.
 *
 * @return string|null The consent status or null if not set.
 */
function arqamweb_get_cookie_consent_value(): ?string
{
	if (! isset($_COOKIE[ARQAM_COOKIE_CONSENT_NAME])) {
		return null;
	}

	$value = sanitize_text_field(wp_unslash($_COOKIE[ARQAM_COOKIE_CONSENT_NAME]));

	// Only return valid consent values
	if (in_array($value, ['accepted', 'rejected'], true)) {
		return $value;
	}

	return null;
}

/**
 * Checks if user has accepted all cookies (including analytics/marketing).
 *
 * @return bool True if user accepted all cookies, false otherwise.
 */
function arqamweb_has_cookie_consent(): bool
{
	return arqamweb_get_cookie_consent_value() === 'accepted';
}

/**
 * Checks if user has rejected non-essential cookies.
 *
 * @return bool True if user rejected non-essential cookies, false otherwise.
 */
function arqamweb_has_rejected_cookies(): bool
{
	return arqamweb_get_cookie_consent_value() === 'rejected';
}

/**
 * Checks if a specific cookie category is allowed based on user consent.
 *
 * Categories:
 * - 'necessary': Always allowed (required for site functionality)
 * - 'analytics': Allowed only if user accepted all cookies
 * - 'marketing': Allowed only if user accepted all cookies
 *
 * @param string $category Cookie category to check ('necessary', 'analytics', 'marketing')
 * @return bool True if category is allowed, false otherwise.
 */
function arqamweb_is_cookie_category_allowed(string $category): bool
{
	// Necessary cookies are always allowed
	if ($category === 'necessary') {
		return true;
	}

	// Analytics and marketing require user consent
	if (in_array($category, ['analytics', 'marketing'], true)) {
		return arqamweb_has_cookie_consent();
	}

	// Unknown categories default to requiring consent
	return arqamweb_has_cookie_consent();
}

/**
 * Returns the cookie consent banner markup attributes for accessibility.
 * Includes ARIA attributes and role for screen readers.
 *
 * @return string Space-separated HTML attributes (pre-escaped).
 */
function arqamweb_get_cookie_banner_attributes(): string
{
	$attrs = [
		'id="arqamweb-cookie-consent-banner"',
		'role="dialog"',
		'aria-live="polite"',
		'aria-label="' . esc_attr__('Cookie Consent', 'arqamweb') . '"',
		'aria-describedby="arqamweb-cookie-consent-message"',
	];

	return implode(' ', $attrs);
}
