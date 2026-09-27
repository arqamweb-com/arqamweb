<?php /* Template Name: Pricing */ ?>
<?php
if (!defined('ABSPATH')) exit;

get_header();
?>

<div class="min-h-screen bg-background text-foreground">
	<main>
		<?php get_template_part('template-parts/pricing/hero'); ?>
		<?php get_template_part('template-parts/pricing/trusted-globally'); ?>
		<?php get_template_part('template-parts/pricing/service-plans'); ?>
		<?php get_template_part('template-parts/pricing/bundles'); ?>
		<?php get_template_part('template-parts/pricing/why-it-works'); ?>
		<?php get_template_part('template-parts/pricing/faqs'); ?>
		<?php get_template_part('template-parts/pricing/cta'); ?>
	</main>
</div>

<?php get_footer(); ?>
