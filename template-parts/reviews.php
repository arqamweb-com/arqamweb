<?php /* Template Name: Reviews */ ?>
<?php

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
get_header();

?>
<main>
	<?php get_template_part('template-parts/reviews/hero'); ?>
	<?php get_template_part('template-parts/reviews/video-testimonials'); ?>
	<?php get_template_part('template-parts/reviews/statistics'); ?>
	<?php get_template_part('template-parts/reviews/global-footprint'); ?>
	<?php get_template_part('template-parts/reviews/marquee-reviews'); ?>
	<?php get_template_part('template-parts/reviews/review-grid'); ?>
	<?php get_template_part('template-parts/reviews/cta'); ?>
</main>


<?php get_footer(); ?>
