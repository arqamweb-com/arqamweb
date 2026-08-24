<?php
/**
 * Asset enqueue, preload hints, defer filter, admin TinyMCE, CF7 webhook.
 *
 * @package Arqam-Web
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class ArqamWeb_Assets {

	private static function get_asset_version( string $relative_path ): string {
		$full_path = get_template_directory() . $relative_path;
		return (string) ( filemtime( $full_path ) ?: wp_get_theme()->get( 'Version' ) );
	}

	public static function enqueue(): void {
		wp_enqueue_style( 'tailwind-css', get_template_directory_uri() . '/frontend/public/style.min.css', [], self::get_asset_version( '/frontend/public/style.min.css' ), 'all' );
		// On RTL locales (e.g. Arabic) WordPress automatically swaps this for the
		// rtlcss-generated mirror: frontend/public/style.min-rtl.css.
		wp_style_add_data( 'tailwind-css', 'rtl', 'replace' );

		$load_aos   = self::should_load_aos();
		$load_blaze = self::should_load_blaze();

		if ( $load_aos ) {
			// Inline AOS CSS into the main stylesheet — no extra HTTP request.
			$aos_css_path = get_template_directory() . '/frontend/public/css/aos-css.min.css';
			if ( file_exists( $aos_css_path ) ) {
				wp_add_inline_style( 'tailwind-css', file_get_contents( $aos_css_path ) ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
			}
			wp_enqueue_script( 'aos-main-js', get_template_directory_uri() . '/frontend/public/js/aos.js', [], self::get_asset_version( '/frontend/public/js/aos.js' ), true );
		}

		if ( $load_blaze ) {
			wp_enqueue_style( 'blaze-main-css', get_template_directory_uri() . '/frontend/public/css/blaze.css', [], self::get_asset_version( '/frontend/public/css/blaze.css' ), 'all' );
			wp_enqueue_script( 'blaze-slider-main-js', get_template_directory_uri() . '/frontend/public/js/blaze-slider.min.js', [], self::get_asset_version( '/frontend/public/js/blaze-slider.min.js' ), true );
		}

		wp_enqueue_script( 'arqamweb-main-js', get_template_directory_uri() . '/frontend/public/js/main.js', $load_aos ? [ 'aos-main-js' ] : [], self::get_asset_version( '/frontend/public/js/main.js' ), true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		if ( is_page( ARQAM_QUOTE_PAGE_SLUG ) || is_page_template( 'template-parts/quote.php' ) ) {
			wp_enqueue_style(  'arqam-quote-css', get_template_directory_uri() . '/frontend/public/css/quote.min.css', [], self::get_asset_version( '/frontend/public/css/quote.min.css' ), 'all' );
			wp_enqueue_script( 'arqam-quote-js',  get_template_directory_uri() . '/js/quote.js',                       [], self::get_asset_version( '/js/quote.js' ),                        true );
		}
	}

	public static function preload_hints(): void {
		if ( is_front_page() ) {
			echo "\t" . '<link rel="preload" as="font" href="' . esc_url( get_template_directory_uri() ) . '/frontend/fonts/Inter-Regular.woff2" type="font/woff2" crossorigin="anonymous">' . "\n";
			echo "\t" . '<link rel="preload" as="font" href="' . esc_url( get_template_directory_uri() ) . '/frontend/fonts/SpaceGrotesk-Light.woff2" type="font/woff2" crossorigin="anonymous">' . "\n";
			echo "\t" . '<link rel="preload" as="image" href="' . esc_url( get_template_directory_uri() ) . '/frontend/img/ascend/gsc1.webp" type="image/webp" fetchpriority="high">' . "\n";
		} else {
			echo "\t" . '<link rel="preload" as="font" href="' . esc_url( get_template_directory_uri() ) . '/frontend/fonts/Dubai-Regular.woff2" type="font/woff2" crossorigin="anonymous">' . "\n";
			echo "\t" . '<link rel="preload" as="font" href="' . esc_url( get_template_directory_uri() ) . '/frontend/fonts/Dubai-Bold.woff2" type="font/woff2" crossorigin="anonymous">' . "\n";
			echo "\t" . '<link rel="preload" as="font" href="' . esc_url( get_template_directory_uri() ) . '/frontend/fonts/Dubai-Medium.woff2" type="font/woff2" crossorigin="anonymous">' . "\n";
		}
		if ( is_front_page() || is_singular( 'project' ) ) {
			echo "\t" . '<link rel="dns-prefetch" href="//www.youtube-nocookie.com">' . "\n";
			echo "\t" . '<link rel="dns-prefetch" href="//i.ytimg.com">' . "\n";
			echo "\t" . '<link rel="preconnect" href="https://www.youtube-nocookie.com" crossorigin>' . "\n";
		}
		// LCP image preload for singular pages (single post, page, CPT)
		if ( is_singular() ) {
			$thumb_id  = get_post_thumbnail_id( get_the_ID() );
			$thumb_src = $thumb_id ? wp_get_attachment_image_src( $thumb_id, 'arqam-hero' ) : false;
			if ( $thumb_src ) {
				echo "\t" . '<link rel="preload" as="image" fetchpriority="high" href="' . esc_url( $thumb_src[0] ) . '">' . "\n";
			}
		}

		if ( is_page( ARQAM_CONTACT_PAGE_SLUG ) || is_page( ARQAM_QUOTE_PAGE_SLUG ) || is_page_template( 'template-parts/quote.php' ) ) {
			echo "\t" . '<link rel="preconnect" href="https://n8n.arqamweb.com" crossorigin>' . "\n";
		}
	}

	private static function should_load_aos(): bool {
		// data-aos is only used in the About page template
		return is_page_template( 'template-parts/about.php' );
	}

	private static function should_load_blaze(): bool {
		// BlazeSlider is only used in the Projects page template
		return is_page_template( 'template-parts/projects.php' );
	}

	public static function defer_scripts( string $tag, string $handle, string $src ): string {
		$defer_handles = [ 'aos-main-js', 'blaze-slider-main-js', 'arqamweb-main-js', 'comment-reply' ];
		if ( in_array( $handle, $defer_handles, true ) ) {
			return '<script defer src="' . esc_url( $src ) . '"></script>' . "\n";
		}
		return $tag;
	}

	public static function optimize_plugin_assets(): void {
		$styles = [
			'wp-block-library',
			'lbwps-styles-photoswipe5-main',
			'sr7css',
			'tutor-icon',
			'tutor',
			'tutor-frontend',
			'wc-blocks-style',
			'woocommerce-inline',
			'woocommerce-layout',
			'woocommerce-smallscreen',
			'woocommerce-general',
		];

		if ( ! self::should_load_cf7() ) {
			array_push(
				$styles,
				'contact-form-7',
				'arqam-cf7-sync-base'
			);
		}

		if ( ! self::should_load_newsletter() ) {
			$styles[] = 'newsletter';
		}

		foreach ( $styles as $handle ) {
			wp_dequeue_style( $handle );
			wp_deregister_style( $handle );
		}

		$scripts = [
			'tp-tools',
			'sr7',
			'tutor-script',
			'tutor-frontend',
			'tutor-social-share',
			'wc-add-to-cart',
			'wc-cart-fragments',
			'wc-jquery-blockui',
			'wc-js-cookie',
			'woocommerce',
			'sourcebuster-js',
			'wc-order-attribution',
			'lbwps-photoswipe5',
			'quicktags',
			'jquery-ui-core',
			'jquery-ui-mouse',
			'jquery-ui-sortable',
			'jquery-touch-punch',
			'jquery-ui-datepicker',
		];

		if ( ! self::should_load_cf7() ) {
			array_push(
				$scripts,
				'contact-form-7',
				'swv',
				'cf7mls',
				'wpcf7cf-scripts',
				'wpcf7-recaptcha-controls',
				'google-recaptcha',
				'googlesitekit-events-provider-contact-form-7'
			);
		}

		if ( ! self::should_load_newsletter() ) {
			$scripts[] = 'newsletter';
		}

		foreach ( $scripts as $handle ) {
			wp_dequeue_script( $handle );
			wp_deregister_script( $handle );
		}

		self::remove_hook_callbacks_by_class( 'wp_head', 'RevSliderFront' );
		self::remove_hook_callbacks_by_class( 'wp_footer', 'RevSliderFront' );
	}

	private static function should_load_cf7(): bool {
		if ( is_page( ARQAM_CONTACT_PAGE_SLUG ) || is_page_template( 'template-parts/contact.php' ) ) {
			return true;
		}

		$post = get_post();
		if ( ! $post instanceof WP_Post ) {
			return false;
		}

		if ( has_shortcode( $post->post_content, 'contact-form-7' ) ) {
			return true;
		}

		return function_exists( 'has_block' ) && has_block( 'contact-form-7/contact-form-selector', $post );
	}

	private static function should_load_newsletter(): bool {
		$post = get_post();
		if ( ! $post instanceof WP_Post ) {
			return false;
		}

		foreach ( [ 'newsletter', 'newsletter_form', 'tnp' ] as $shortcode ) {
			if ( has_shortcode( $post->post_content, $shortcode ) ) {
				return true;
			}
		}

		return false;
	}

	private static function remove_hook_callbacks_by_class( string $hook_name, string $class_name ): void {
		global $wp_filter;

		if ( empty( $wp_filter[ $hook_name ] ) || ! $wp_filter[ $hook_name ] instanceof WP_Hook ) {
			return;
		}

		foreach ( $wp_filter[ $hook_name ]->callbacks as $priority => $callbacks ) {
			foreach ( $callbacks as $callback ) {
				$function = $callback['function'] ?? null;

				if ( ! is_array( $function ) || empty( $function[0] ) ) {
					continue;
				}

				$owner = $function[0];
				$is_target_class = ( is_object( $owner ) && is_a( $owner, $class_name ) ) || $owner === $class_name;

				if ( $is_target_class ) {
					remove_action( $hook_name, $function, $priority );
				}
			}
		}
	}

	public static function admin_tinymce_script(): void {
		if ( ! is_admin() ) return;
		?>
		<script>
			document.addEventListener('DOMContentLoaded', function() {
				if (typeof tinyMCE !== 'undefined' && tinyMCE.activeEditor) {
					tinyMCE.activeEditor.settings.force_br_newlines = true;
					tinyMCE.activeEditor.settings.force_p_newlines = false;
					tinyMCE.activeEditor.settings.forced_root_block = '';
				}
			});
		</script>
		<?php
	}

	public static function cf7_webhook_script(): void {
		if ( ! defined( 'WPCF7_VERSION' ) || ! self::should_load_cf7() ) {
			return;
		}

		$script = "
document.addEventListener('wpcf7mailsent', function(event) {
	const formData = new FormData(event.target);
	let data = {};
	formData.forEach((value, key) => { data[key] = value; });
	data.form_id = event.detail.contactFormId;
	data.form_unit = event.detail.unitTag;
	fetch('" . esc_js( ARQAM_CF7_WEBHOOK_URL ) . "', {
		method: 'POST',
		headers: { 'Content-Type': 'application/json' },
		body: JSON.stringify(data)
	});
});";
		wp_add_inline_script( 'contact-form-7', $script, 'after' );
	}
}
