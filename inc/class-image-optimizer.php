<?php
/**
 * Image optimization — WebP generation, conversion, and utilities.
 *
 * @package Arqam-Web
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class ArqamWeb_Image_Optimizer {

	/**
	 * Check if the server supports WebP image generation.
	 *
	 * @return bool True if WebP is supported, false otherwise.
	 */
	public static function supports_webp(): bool {
		// Check if GD library has WebP support
		if ( function_exists( 'imagewebp' ) ) {
			return true;
		}

		// Check if Imagick extension has WebP support
		if ( extension_loaded( 'imagick' ) ) {
			$imagick = new Imagick();
			$formats = $imagick->queryFormats( 'WEBP' );
			return ! empty( $formats );
		}

		return false;
	}

	/**
	 * Get the WebP file path for a given original image path.
	 *
	 * @param string $original_path Full path to the original image file.
	 * @return string WebP file path with .webp extension.
	 */
	public static function get_webp_path( string $original_path ): string {
		$path_info = pathinfo( $original_path );
		return $path_info['dirname'] . '/' . $path_info['filename'] . '.webp';
	}

	/**
	 * Generate a WebP version of an image file.
	 *
	 * @param string $file_path Full path to the original image file (JPEG or PNG).
	 * @return string|false WebP file path on success, false on failure.
	 */
	public static function generate_webp( string $file_path ) {
		if ( ! self::supports_webp() ) {
			return false;
		}

		if ( ! file_exists( $file_path ) ) {
			return false;
		}

		// Only process JPEG and PNG images
		$mime_type = wp_check_filetype( $file_path )['type'];
		if ( ! in_array( $mime_type, [ 'image/jpeg', 'image/png' ], true ) ) {
			return false;
		}

		// Load the image using WordPress image editor
		$image_editor = wp_get_image_editor( $file_path );

		if ( is_wp_error( $image_editor ) ) {
			return false;
		}

		// Set WebP quality (85 provides good balance between quality and file size)
		$quality = apply_filters( 'arqamweb_webp_quality', 85 );
		if ( method_exists( $image_editor, 'set_quality' ) ) {
			$image_editor->set_quality( $quality );
		}

		// Get WebP output path
		$webp_path = self::get_webp_path( $file_path );

		// Save as WebP
		$saved = $image_editor->save( $webp_path, 'image/webp' );

		if ( is_wp_error( $saved ) ) {
			return false;
		}

		return $webp_path;
	}

	/**
	 * Generate WebP versions for all image sizes of an attachment.
	 *
	 * @param array $metadata Attachment metadata from wp_generate_attachment_metadata.
	 * @param int   $attachment_id Attachment post ID.
	 * @return array Modified metadata (unchanged, WebP files are additional).
	 */
	public static function generate_webp_for_all_sizes( array $metadata, int $attachment_id ): array {
		if ( ! self::supports_webp() ) {
			return $metadata;
		}

		// Get the file path for this attachment
		$file_path = get_attached_file( $attachment_id );

		if ( ! $file_path || ! file_exists( $file_path ) ) {
			return $metadata;
		}

		// Generate WebP for the full-size image
		self::generate_webp( $file_path );

		// Generate WebP for each registered size
		if ( ! empty( $metadata['sizes'] ) && is_array( $metadata['sizes'] ) ) {
			$base_dir = dirname( $file_path );

			foreach ( $metadata['sizes'] as $size => $size_data ) {
				if ( empty( $size_data['file'] ) ) {
					continue;
				}

				$size_path = $base_dir . '/' . $size_data['file'];

				if ( file_exists( $size_path ) ) {
					self::generate_webp( $size_path );
				}
			}
		}

		return $metadata;
	}

	/**
	 * Delete WebP versions when an attachment is deleted.
	 *
	 * @param int $attachment_id Attachment post ID being deleted.
	 */
	public static function delete_webp_versions( int $attachment_id ): void {
		$file_path = get_attached_file( $attachment_id );

		if ( ! $file_path || ! file_exists( $file_path ) ) {
			return;
		}

		$metadata = wp_get_attachment_metadata( $attachment_id );

		// Delete WebP for full-size image
		$webp_path = self::get_webp_path( $file_path );
		if ( file_exists( $webp_path ) ) {
			wp_delete_file( $webp_path );
		}

		// Delete WebP for each size
		if ( ! empty( $metadata['sizes'] ) && is_array( $metadata['sizes'] ) ) {
			$base_dir = dirname( $file_path );

			foreach ( $metadata['sizes'] as $size => $size_data ) {
				if ( empty( $size_data['file'] ) ) {
					continue;
				}

				$size_path      = $base_dir . '/' . $size_data['file'];
				$size_webp_path = self::get_webp_path( $size_path );

				if ( file_exists( $size_webp_path ) ) {
					wp_delete_file( $size_webp_path );
				}
			}
		}
	}
}
