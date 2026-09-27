<?php /* Template Name: About */ ?>
<?php

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
get_header();

?>

<main>
	<?php get_template_part('template-parts/about/hero'); ?>
	<?php get_template_part('template-parts/about/story'); ?>
	<?php get_template_part('template-parts/about/name-meaning'); ?>
	<?php get_template_part('template-parts/about/logo'); ?>
	<?php get_template_part('template-parts/about/values'); ?>
	<?php get_template_part('template-parts/about/team'); ?>
	<?php get_template_part('template-parts/about/links'); ?>
	<?php get_template_part('template-parts/about/reviews'); ?>
	<?php get_template_part('template-parts/about/cta'); ?>
</main>

<?php get_footer(); ?>
