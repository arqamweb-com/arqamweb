<?php
/**
 * ACF field accessor helpers — normalize inconsistent ACF return types.
 *
 * @package Arqam-Web
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Returns a text field value as a string, never false.
 * Does NOT apply escaping — callers escape at render time.
 */
function arqamweb_get_text_field( string $key, int $post_id, string $fallback = '' ): string {
	if ( ! function_exists( 'get_field' ) ) return $fallback;
	$value = get_field( $key, $post_id );
	return ( $value !== false && $value !== null && $value !== '' ) ? (string) $value : $fallback;
}

/**
 * Returns a normalized image array or null.
 * Handles both ACF "Image Array" and "Image URL" return formats.
 *
 * @return array{url:string,alt:string,width:int,height:int}|null
 */
function arqamweb_get_image_field( string $key, int $post_id ): ?array {
	if ( ! function_exists( 'get_field' ) ) return null;
	$value = get_field( $key, $post_id );
	if ( empty( $value ) ) return null;

	if ( is_array( $value ) && ! empty( $value['url'] ) ) {
		return [
			'url'    => (string) $value['url'],
			'alt'    => (string) ( $value['alt'] ?? '' ),
			'width'  => (int) ( $value['width'] ?? 0 ),
			'height' => (int) ( $value['height'] ?? 0 ),
		];
	}

	if ( is_string( $value ) && ! empty( $value ) ) {
		return [
			'url'    => $value,
			'alt'    => '',
			'width'  => 0,
			'height' => 0,
		];
	}

	return null;
}

/**
 * Returns a relation field as an array of posts, never false.
 *
 * @return array
 */
function arqamweb_get_relation_field( string $key, int $post_id ): array {
	if ( ! function_exists( 'get_field' ) ) return [];
	$value = get_field( $key, $post_id );
	return ( is_array( $value ) && ! empty( $value ) ) ? $value : [];
}

/**
 * Returns a URL field as a string, never false.
 * Does NOT apply escaping — callers escape at render time.
 */
function arqamweb_get_url_field( string $key, int $post_id, string $fallback = '#' ): string {
	if ( ! function_exists( 'get_field' ) ) return $fallback;
	$value = get_field( $key, $post_id );
	return ( ! empty( $value ) && is_string( $value ) ) ? (string) $value : $fallback;
}

/**
 * Returns a boolean field value as a boolean, never false/null.
 * Normalizes ACF's truthy/falsy values (1, 0, '1', '0', true, false).
 */
function arqamweb_get_boolean_field( string $key, int $post_id, bool $fallback = false ): bool {
	if ( ! function_exists( 'get_field' ) ) return $fallback;
	$value = get_field( $key, $post_id );
	if ( $value === false || $value === null ) return $fallback;
	return (bool) $value;
}

/**
 * Returns a number field value as a float, never false.
 * Handles both integer and decimal ACF number fields.
 */
function arqamweb_get_number_field( string $key, int $post_id, float $fallback = 0.0 ): float {
	if ( ! function_exists( 'get_field' ) ) return $fallback;
	$value = get_field( $key, $post_id );
	return ( $value !== false && $value !== null && $value !== '' ) ? (float) $value : $fallback;
}

/**
 * Returns a select field value as a string, never false.
 * Does NOT apply escaping — callers escape at render time.
 */
function arqamweb_get_select_field( string $key, int $post_id, string $fallback = '' ): string {
	if ( ! function_exists( 'get_field' ) ) return $fallback;
	$value = get_field( $key, $post_id );
	return ( $value !== false && $value !== null && $value !== '' ) ? (string) $value : $fallback;
}
