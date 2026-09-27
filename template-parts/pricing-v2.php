<?php /* Template Name: Pricing V2 */ ?>
<?php
/**
 * Pricing V2 — WordPress implementation of the `pricing-v3` design.
 *
 * Mirrors the structure of template-parts/pricing.php: a self-contained page
 * template that opens with get_header(), renders the same section skeleton
 * (hero + glass orbs, trusted-globally marquee, service sections, why-block,
 * dynamic FAQ loop, closing CTA) and ends with get_footer(). Markup uses the
 * same Tailwind utilities, the same `container-x max-w-*` wrappers and the
 * same inline lucide SVGs as pricing.php.
 *
 * Deliberate differences from pricing.php:
 *   - Seven services instead of four, and no bundles section.
 *   - Cards are static for now. pricing.php pulls its cards from WooCommerce
 *     through the arqam-woo-pricing plugin; the per-section grids below are
 *     the drop-in points for awp_service_has_packages() /
 *     awp_render_service_cards() once products exist for these services.
 *   - Prices are published in USD. Currency switching is left to WPML/WCML:
 *     the sticky bar renders WooCommerce Multilingual's own currency switcher
 *     when that plugin is active and stays hidden otherwise. No custom
 *     currency JavaScript is shipped by this template.
 *
 * @package Arqam-Web
 */

if (!defined('ABSPATH')) exit;

// Load helper functions
require_once get_template_directory() . '/template-parts/pricing-v2/helpers.php';

// Load services data
require_once get_template_directory() . '/template-parts/pricing-v2/data.php';

get_header();
?>

<div class="min-h-screen bg-background text-foreground">
	<main>
		<?php
		/**
		 * Sticky currency switcher bar (WCML integration)
		 */
		get_template_part('template-parts/pricing-v2/sticky-bar');

		/**
		 * Hero section with breadcrumbs, heading, intro text and service navigation
		 * Expects $aw_services to be defined
		 */
		get_template_part('template-parts/pricing/hero-v2');

		/**
		 * Trusted globally marquee section
		 */
		get_template_part('template-parts/pricing/trusted-globally');

		/**
		 * All service sections (websites, SEO, hosting, care, video, apps, social)
		 * Expects $aw_services and $aw_contact_url to be defined
		 */
		get_template_part('template-parts/pricing-v2/services');

		/**
		 * Pricing disclaimer
		 */
		get_template_part('template-parts/pricing-v2/disclaimer');

		/**
		 * Why it works section
		 */
		get_template_part('template-parts/pricing-v2/why-it-works');

		/**
		 * FAQ section
		 */
		get_template_part('template-parts/pricing/faqs');

		/**
		 * CTA section
		 */
		get_template_part('template-parts/pricing-v2/cta');

		/**
		 * Client partnership program section
		 */
		get_template_part('template-parts/pricing-v2/partnership');
		?>
	</main>
</div>

<?php get_footer(); ?>
