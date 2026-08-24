<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Arqam-Web
 */

?>

<article id="post-<?php the_ID(); ?>" class="my-8">

	<?php arqam_web_post_thumbnail(); ?>

	<?php the_content(); ?>
</article><!-- #post-<?php the_ID(); ?> -->

<style>
	p {
		margin-bottom: 1.5em;
	}
</style>