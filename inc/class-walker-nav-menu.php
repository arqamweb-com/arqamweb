<?php
/**
 * Custom Walker Nav Menu.
 *
 * Renders the same WordPress menu as a polished desktop pill navigation and
 * an accessible mobile drawer navigation with multi-level child menus.
 *
 * @package Arqam-Web
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ArqamWeb_Walker_Nav_Menu extends Walker_Nav_Menu {

	/**
	 * Top-level counter used to assign calm, predictable mobile icons.
	 *
	 * @var int
	 */
	private int $top_level_index = 0;

	/**
	 * Opening <ul> for every submenu level.
	 */
	public function start_lvl( &$output, $depth = 0, $args = null ): void {
		$style = $this->get_menu_style( $args );
		$level = $depth + 1;

		if ( 'mobile' === $style ) {
			$output .= '<ul class="custom-submenu-class aw-mobile-submenu aw-mobile-submenu--level-' . esc_attr( (string) $level ) . ' hidden">';
			return;
		}

		$submenu_class = 0 === $depth ? 'submenu-lvl-1 aw-desktop-submenu aw-desktop-submenu--drop' : 'submenu-lvl-2 aw-desktop-submenu aw-desktop-submenu--flyout';
		$output       .= '<ul class="custom-submenu-class ' . esc_attr( $submenu_class ) . ' hidden">';
	}

	/**
	 * Each <li> and its direct interactive row.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ): void {
		$style        = $this->get_menu_style( $args );
		$classes      = ! empty( $item->classes ) && is_array( $item->classes ) ? $item->classes : [];
		$classes[]    = 'custom-li-class';
		$classes[]    = 'desktop' === $style ? 'aw-desktop-menu__item' : 'aw-mobile-menu__item';
		$class_names  = implode( ' ', array_filter( $classes ) );
		$has_children = (bool) $this->has_children;
		$title        = apply_filters( 'the_title', $item->title, $item->ID );

		$atts = [
			'href'     => ! empty( $item->url ) ? esc_url( $item->url ) : '',
			'itemprop' => 'url',
		];

		if ( $item->current ) {
			$atts['aria-current'] = 'page';
		}

		if ( ! empty( $item->target ) ) {
			$atts['target'] = $item->target;
		}

		if ( ! empty( $item->xfn ) ) {
			$atts['rel'] = $item->xfn;
		}

		if ( $has_children ) {
			$atts['aria-haspopup'] = 'true';
		}

		$output .= '<li class="' . esc_attr( $class_names ) . '">';

		if ( 'mobile' === $style ) {
			$output .= $this->render_mobile_item( $item, $depth, $atts, $title, $has_children );
			return;
		}

		$output .= $this->render_desktop_item( $depth, $atts, $title, $has_children );
	}

	/**
	 * Closing </li>.
	 */
	public function end_el( &$output, $item, $depth = 0, $args = null ): void {
		$output .= '</li>';
	}

	/**
	 * Render a desktop nav row.
	 */
	private function render_desktop_item( int $depth, array $atts, string $title, bool $has_children ): string {
		$link_class = 0 === $depth ? 'custom-a-class aw-nav-link' : 'custom-a-class aw-submenu-link';

		$html  = '<div class="aw-menu-row">';
		$html .= '<a class="' . esc_attr( $link_class ) . '"' . $this->build_attributes( $atts ) . '>';
		$html .= '<span class="aw-menu-label" itemprop="name">' . wp_kses_post( $title ) . '</span>';

		if ( $has_children ) {
			$html .= '<span class="aw-menu-chevron" aria-hidden="true">' . ( 0 === $depth ? $this->icon( 'chevron-down' ) : $this->icon( 'chevron-right' ) ) . '</span>';
		}

		$html .= '</a>';
		$html .= '</div>';

		return $html;
	}

	/**
	 * Render a mobile drawer nav row.
	 */
	private function render_mobile_item( $item, int $depth, array $atts, string $title, bool $has_children ): string {
		$is_top_level = 0 === $depth;

		if ( $is_top_level ) {
			$this->top_level_index++;
		}

		$html  = '<div class="aw-mobile-menu__row">';
		$html .= '<span class="aw-mobile-menu__icon" aria-hidden="true">' . $this->icon( $is_top_level ? $this->get_mobile_icon_name( $this->top_level_index, $item ) : 'chevron-right' ) . '</span>';
		$html .= '<a class="custom-a-class aw-mobile-menu__link"' . $this->build_attributes( $atts ) . '>';
		$html .= '<span itemprop="name">' . wp_kses_post( $title ) . '</span>';
		$html .= '</a>';

		if ( $has_children ) {
			$html .= '<button class="submenu-toggle aw-submenu-toggle" type="button" aria-expanded="false" aria-label="' . esc_attr__( 'Toggle submenu', 'arqamweb' ) . '">';
			$html .= $this->icon( 'chevron-down' );
			$html .= '</button>';
		} else {
			$html .= '<span class="aw-mobile-menu__arrow" aria-hidden="true">' . $this->icon( 'arrow-right' ) . '</span>';
		}

		$html .= '</div>';

		return $html;
	}

	/**
	 * Build HTML attributes.
	 */
	private function build_attributes( array $atts ): string {
		$attributes = '';

		foreach ( $atts as $attr => $value ) {
			if ( '' === $value || null === $value ) {
				continue;
			}

			$attributes .= ' ' . esc_attr( $attr ) . '="' . esc_attr( $value ) . '"';
		}

		return $attributes;
	}

	/**
	 * Resolve walker rendering mode.
	 */
	private function get_menu_style( $args ): string {
		return isset( $args->menu_style ) && 'mobile' === $args->menu_style ? 'mobile' : 'desktop';
	}

	/**
	 * Pick a relevant icon for top-level drawer items.
	 */
	private function get_mobile_icon_name( int $index, $item ): string {
		$slug = sanitize_title( (string) $item->title );

		if ( str_contains( $slug, 'home' ) ) {
			return 'home';
		}

		if ( str_contains( $slug, 'service' ) ) {
			return 'sparkles';
		}

		if ( str_contains( $slug, 'project' ) ) {
			return 'folder';
		}

		if ( str_contains( $slug, 'review' ) ) {
			return 'star';
		}

		if ( str_contains( $slug, 'about' ) ) {
			return 'info';
		}

		if ( str_contains( $slug, 'blog' ) ) {
			return 'book';
		}

		if ( str_contains( $slug, 'contact' ) ) {
			return 'mail';
		}

		$icons = [ 'home', 'sparkles', 'folder', 'star', 'info', 'book', 'mail' ];
		return $icons[ ( $index - 1 ) % count( $icons ) ];
	}

	/**
	 * Inline SVG icon set.
	 */
	private function icon( string $name ): string {
		$icons = [
			'arrow-right'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>',
			'book'          => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 7v14"></path><path d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z"></path></svg>',
			'chevron-down'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"></path></svg>',
			'chevron-right' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"></path></svg>',
			'folder'        => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13c0 1.1.9 2 2 2Z"></path><path d="M8 10v4"></path><path d="M12 10v2"></path><path d="M16 10v6"></path></svg>',
			'home'          => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"></path><path d="M3 10a2 2 0 0 1 .709-1.528l7-6a2 2 0 0 1 2.582 0l7 6A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path></svg>',
			'info'          => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M12 16v-4"></path><path d="M12 8h.01"></path></svg>',
			'mail'          => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"></path><rect x="2" y="4" width="20" height="16" rx="2"></rect></svg>',
			'sparkles'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11.017 2.814a1 1 0 0 1 1.966 0l1.051 5.558a2 2 0 0 0 1.594 1.594l5.558 1.051a1 1 0 0 1 0 1.966l-5.558 1.051a2 2 0 0 0-1.594 1.594l-1.051 5.558a1 1 0 0 1-1.966 0l-1.051-5.558a2 2 0 0 0-1.594-1.594l-5.558-1.051a1 1 0 0 1 0-1.966l5.558-1.051a2 2 0 0 0 1.594-1.594z"></path><path d="M20 2v4"></path><path d="M22 4h-4"></path><circle cx="4" cy="20" r="2"></circle></svg>',
			'star'          => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path></svg>',
		];

		return $icons[ $name ] ?? $icons['chevron-right'];
	}
}
