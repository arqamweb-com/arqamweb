<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Arqam-Web
 */

get_header();

$post_id = get_the_ID();
$project_cta = ArqamWeb_Project::get_cta($post_id);
if ($project_cta['title'] === '') {
	$project_cta['title'] = __('Ready to Build a Website That Actually Makes You Money?', 'arqamweb');
}
if ($project_cta['description'] === '') {
	$project_cta['description'] = __('We build high-performance websites engineered for growth, revenue, and measurable business results.', 'arqamweb');
}
$has_project_cta = $project_cta['title'] !== '' || $project_cta['description'] !== '';

?>

<main class="bg-background overflow-x-hidden">

	<?php get_template_part('template-parts/projects/project-hero'); ?>

	<?php get_template_part('template-parts/projects/project-details'); ?>

	<?php get_template_part('template-parts/projects/project-gallery', null, ['post_id' => $post_id]); ?>

	<?php get_template_part('template-parts/projects/project-video'); ?>

	<?php get_template_part('template-parts/projects/project-content'); ?>

	<?php get_template_part('template-parts/projects/project-cta', null, ['project_cta' => $project_cta, 'has_project_cta' => $has_project_cta]); ?>

	<?php get_template_part('template-parts/projects/project-related'); ?>

</main>


<?php
get_footer();
?>
