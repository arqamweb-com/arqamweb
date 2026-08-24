<?php
/**
 * Theme setup — feature support, menus, widgets, SVG, image threshold.
 *
 * @package Arqam-Web
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class ArqamWeb_Theme_Setup {

	public static function setup(): void {
		load_theme_textdomain( 'arqamweb', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'arqam-card',         800, 500,  true );
		add_image_size( 'arqam-card-related', 480, 320,  true );
		add_image_size( 'arqam-hero',        1440, 810,  true );
		add_image_size( 'arqam-og',          1200, 630,  true );
		register_nav_menus( [
			'menu-1'     => esc_html__( 'Primary Header Menu', 'arqamweb' ),
			'quick-links'=> esc_html__( 'Footer Quick Links', 'arqamweb' ),
			'services'   => esc_html__( 'Footer Services Menu', 'arqamweb' ),
		] );
		add_theme_support( 'html5', [
			'search-form', 'comment-form', 'comment-list',
			'gallery', 'caption', 'style', 'script',
		] );
		add_theme_support( 'custom-background', apply_filters( 'arqam_web_custom_background_args', [
			'default-color' => 'ffffff',
			'default-image' => '',
		] ) );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'custom-logo', [
			'height'      => 55,
			'width'       => 200,
			'flex-width'  => true,
			'flex-height' => true,
		] );
	}

	public static function set_content_width(): void {
		$GLOBALS['content_width'] = apply_filters( 'arqam_web_content_width', 640 );
	}

	public static function register_widgets(): void {
		register_sidebar( [
			'name'          => esc_html__( 'Sidebar', 'arqamweb' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'arqamweb' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		] );
	}

	public static function svg_upload_notice(): void {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$screen = function_exists( 'get_current_screen' ) ? get_current_screen() : null;

		if ( ! $screen || 'upload' !== $screen->id ) {
			return;
		}
		?>
		<div class="notice notice-warning">
			<p>
				<?php esc_html_e( 'SVG uploads are disabled in the theme for security. Install the Safe SVG plugin if you need sanitized SVG support.', 'arqamweb' ); ?>
			</p>
		</div>
		<?php
	}

	public static function set_image_threshold(): int {
		return 2560;
	}
}
