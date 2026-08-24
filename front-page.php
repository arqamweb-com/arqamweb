<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Arqam-Web
 */


if (!defined('ABSPATH')) {
	exit;
}

get_header();

?>

	<main id="primary" class="arqam-front-page" itemscope itemtype="https://schema.org/WebPage">
		<?php get_template_part('template-parts/frontpage/frontpage', 'slider'); ?>

		<?php get_template_part('template-parts/frontpage/frontpage', 'find_us'); ?>

		<?php get_template_part('template-parts/frontpage/frontpage', 'services'); ?>

		<?php get_template_part('template-parts/frontpage/frontpage', 'projects'); ?>

		<?php get_template_part('template-parts/frontpage/frontpage', 'numbers'); ?>

		<?php get_template_part('template-parts/frontpage/frontpage', 'why_us'); ?>

		<?php get_template_part('template-parts/frontpage/frontpage', 'testimonials'); ?>

		<?php get_template_part('template-parts/frontpage/frontpage', 'reviews'); ?>

		<?php get_template_part('template-parts/frontpage/frontpage', 'founder'); ?>

		<?php get_template_part('template-parts/frontpage/frontpage', 'faqs'); ?>

		<?php get_template_part('template-parts/frontpage/frontpage', 'partners'); ?>

		<?php get_template_part('template-parts/frontpage/frontpage', 'blog'); ?>

		<?php get_template_part('template-parts/frontpage/frontpage', 'contact'); ?>
	</main>
<?php

get_footer();
