<?php
/**
 * WP-CLI command for bulk converting existing images to WebP.
 *
 * @package Arqam-Web
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Bulk convert existing media library images to WebP format.
 */
class ArqamWeb_CLI_WebP_Converter {

	/**
	 * Convert existing images in the media library to WebP format.
	 *
	 * ## OPTIONS
	 *
	 * [--limit=<number>]
	 * : Maximum number of images to process. Default: all images.
	 *
	 * [--dry-run]
	 * : Preview what would be converted without making changes.
	 *
	 * ## EXAMPLES
	 *
	 *     # Convert all existing images to WebP
	 *     $ wp arqamweb webp convert
	 *
	 *     # Convert only the first 10 images
	 *     $ wp arqamweb webp convert --limit=10
	 *
	 *     # Preview what would be converted
	 *     $ wp arqamweb webp convert --dry-run
	 *
	 * @param array $args       Positional arguments.
	 * @param array $assoc_args Associative arguments (flags).
	 */
	public function convert( $args, $assoc_args ) {
		// Check if WebP is supported
		if ( ! ArqamWeb_Image_Optimizer::supports_webp() ) {
			WP_CLI::error( 'WebP is not supported on this server. GD or Imagick extension with WebP support is required.' );
			return;
		}

		// Parse arguments
		$limit   = isset( $assoc_args['limit'] ) ? absint( $assoc_args['limit'] ) : 0;
		$dry_run = isset( $assoc_args['dry-run'] );

		if ( $dry_run ) {
			WP_CLI::line( 'DRY RUN MODE: No files will be modified.' );
			WP_CLI::line( '' );
		}

		// Query for image attachments
		$query_args = [
			'post_type'      => 'attachment',
			'post_mime_type' => [ 'image/jpeg', 'image/png' ],
			'post_status'    => 'inherit',
			'posts_per_page' => $limit > 0 ? $limit : -1,
			'fields'         => 'ids',
			'orderby'        => 'ID',
			'order'          => 'ASC',
		];

		$attachments = get_posts( $query_args );

		if ( empty( $attachments ) ) {
			WP_CLI::warning( 'No JPEG or PNG images found in the media library.' );
			return;
		}

		$total = count( $attachments );
		WP_CLI::line( sprintf( 'Found %d image(s) to process.', $total ) );
		WP_CLI::line( '' );

		// Process each attachment
		$processed = 0;
		$skipped   = 0;
		$failed    = 0;

		foreach ( $attachments as $attachment_id ) {
			$file_path = get_attached_file( $attachment_id );

			if ( ! $file_path || ! file_exists( $file_path ) ) {
				WP_CLI::warning( sprintf( 'Attachment #%d: File not found, skipping.', $attachment_id ) );
				$skipped++;
				continue;
			}

			$filename = basename( $file_path );

			if ( $dry_run ) {
				WP_CLI::line( sprintf( '[%d/%d] Would convert: %s (ID: %d)', $processed + $skipped + $failed + 1, $total, $filename, $attachment_id ) );
				$processed++;
				continue;
			}

			// Get attachment metadata
			$metadata = wp_get_attachment_metadata( $attachment_id );

			if ( ! $metadata ) {
				WP_CLI::warning( sprintf( 'Attachment #%d: No metadata found, skipping.', $attachment_id ) );
				$skipped++;
				continue;
			}

			// Generate WebP for full-size and all sizes
			WP_CLI::line( sprintf( '[%d/%d] Converting: %s (ID: %d)', $processed + $skipped + $failed + 1, $total, $filename, $attachment_id ) );

			// Generate WebP for the full-size image
			$full_webp = ArqamWeb_Image_Optimizer::generate_webp( $file_path );

			if ( false === $full_webp ) {
				WP_CLI::warning( sprintf( '  → Failed to generate WebP for full-size image.' ) );
				$failed++;
				continue;
			}

			WP_CLI::line( sprintf( '  → Full-size: %s', basename( $full_webp ) ) );

			// Generate WebP for each registered size
			$sizes_converted = 0;
			if ( ! empty( $metadata['sizes'] ) && is_array( $metadata['sizes'] ) ) {
				$base_dir = dirname( $file_path );

				foreach ( $metadata['sizes'] as $size_name => $size_data ) {
					if ( empty( $size_data['file'] ) ) {
						continue;
					}

					$size_path = $base_dir . '/' . $size_data['file'];

					if ( ! file_exists( $size_path ) ) {
						continue;
					}

					$size_webp = ArqamWeb_Image_Optimizer::generate_webp( $size_path );

					if ( false !== $size_webp ) {
						$sizes_converted++;
					}
				}
			}

			if ( $sizes_converted > 0 ) {
				WP_CLI::line( sprintf( '  → %d additional size(s) converted', $sizes_converted ) );
			}

			$processed++;
		}

		// Summary
		WP_CLI::line( '' );
		WP_CLI::line( '━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━' );

		if ( $dry_run ) {
			WP_CLI::success( sprintf( 'Dry run complete. %d image(s) would be converted.', $processed ) );
		} else {
			WP_CLI::success( sprintf(
				'Conversion complete! Processed: %d, Skipped: %d, Failed: %d',
				$processed,
				$skipped,
				$failed
			) );
		}
	}

	/**
	 * Register the WP-CLI command.
	 */
	public static function register() {
		if ( ! class_exists( 'WP_CLI' ) ) {
			return;
		}

		WP_CLI::add_command( 'arqamweb webp', __CLASS__ );
	}
}
