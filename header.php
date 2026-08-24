<?php

/**
 * The header for our theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Arqam-Web
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> dir="<?php echo is_rtl() ? 'rtl' : 'ltr'; ?>" class="scroll-smooth">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#269bd9">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'arqamweb'); ?></a>

		<?php
		$quote_url         = arqamweb_get_page_permalink( ARQAM_QUOTE_PAGE_SLUG );
		$language_switcher = trim( arqamweb_get_language_switcher() );
		?>

		<header id="header" class="aw-header" data-state="closed">
			<div class="aw-header__inner">
				<?php if ( has_custom_logo() ) : ?>
					<div class="aw-logo-link aw-logo-link--custom">
						<?php the_custom_logo(); ?>
					</div>
				<?php else : ?>
					<a class="aw-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
						<?php echo arqamweb_get_logo_markup( 'header' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</a>
				<?php endif; ?>

				<nav class="aw-desktop-nav" role="navigation" aria-label="<?php esc_attr_e( 'Main menu', 'arqamweb' ); ?>" itemscope itemtype="https://schema.org/SiteNavigationElement">
					<?php
					wp_nav_menu(
						[
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'menu_class'     => 'custom-ul-class aw-desktop-menu',
							'container'      => false,
							'fallback_cb'    => false,
							'menu_style'     => 'desktop',
							'walker'         => new ArqamWeb_Walker_Nav_Menu(),
						]
					);
					?>
				</nav>

				<div class="aw-header__actions">
					<?php if ( '' !== $language_switcher ) : ?>
						<div class="aw-language-switcher" role="group" aria-label="<?php esc_attr_e( 'Language switcher', 'arqamweb' ); ?>">
							<?php echo $language_switcher; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</div>
					<?php endif; ?>

					<a href="<?php echo esc_url( $quote_url ); ?>" class="aw-quote-link aw-quote-link--desktop">
						<span><?php esc_html_e( 'Request a Quote', 'arqamweb' ); ?></span>
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
							<path d="M5 12h14"></path>
							<path d="m12 5 7 7-7 7"></path>
						</svg>
					</a>

					<button id="menu-btn" class="aw-menu-button" type="button" aria-label="<?php esc_attr_e( 'Toggle menu', 'arqamweb' ); ?>" aria-expanded="false" aria-controls="mobile-menu-panel">
						<span class="screen-reader-text"><?php esc_html_e( 'Toggle menu', 'arqamweb' ); ?></span>
						<span class="aw-menu-button__lines" aria-hidden="true">
							<span></span>
							<span></span>
							<span></span>
						</span>
					</button>
				</div>
			</div>

			<div class="aw-mobile-overlay" data-mobile-menu-close aria-hidden="true"></div>

			<aside id="mobile-menu-panel" class="aw-mobile-drawer" aria-hidden="true" aria-label="<?php esc_attr_e( 'Mobile menu', 'arqamweb' ); ?>">
				<div class="aw-mobile-drawer__header">
					<?php if ( has_custom_logo() ) : ?>
						<div class="aw-logo-link aw-logo-link--custom">
							<?php the_custom_logo(); ?>
						</div>
					<?php else : ?>
						<a class="aw-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
							<?php echo arqamweb_get_logo_markup( 'header' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</a>
					<?php endif; ?>

					<button class="aw-drawer-close" type="button" data-mobile-menu-close aria-label="<?php esc_attr_e( 'Close menu', 'arqamweb' ); ?>">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
							<path d="M18 6 6 18"></path>
							<path d="m6 6 12 12"></path>
						</svg>
					</button>
				</div>

				<nav class="aw-mobile-nav" role="navigation" aria-label="<?php esc_attr_e( 'Mobile navigation', 'arqamweb' ); ?>" itemscope itemtype="https://schema.org/SiteNavigationElement">
					<p class="aw-mobile-nav__eyebrow"><?php esc_html_e( 'Navigation', 'arqamweb' ); ?></p>
					<?php
					wp_nav_menu(
						[
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu-mobile',
							'menu_class'     => 'custom-ul-class aw-mobile-menu',
							'container'      => false,
							'fallback_cb'    => false,
							'menu_style'     => 'mobile',
							'walker'         => new ArqamWeb_Walker_Nav_Menu(),
						]
					);
					?>
				</nav>

				<div class="aw-mobile-drawer__footer">
					<?php if ( '' !== $language_switcher ) : ?>
						<div class="aw-language-switcher aw-language-switcher--mobile" role="group" aria-label="<?php esc_attr_e( 'Language switcher', 'arqamweb' ); ?>">
							<?php echo $language_switcher; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</div>
					<?php endif; ?>

					<a href="<?php echo esc_url( $quote_url ); ?>" class="aw-quote-link aw-quote-link--mobile">
						<span><?php esc_html_e( 'Request a Quote', 'arqamweb' ); ?></span>
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
							<path d="M5 12h14"></path>
							<path d="m12 5 7 7-7 7"></path>
						</svg>
					</a>
					<p><?php esc_html_e( 'Crafted by Arqam Web - Premium Digital Agency', 'arqamweb' ); ?></p>
				</div>
			</aside>
		</header>
