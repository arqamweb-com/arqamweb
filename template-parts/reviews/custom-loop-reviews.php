<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$postCount = $args['postCount'];

?>
<!-- Reviews -->
<div class="marquee-mask">

	<div class="flex gap-5 animate-drift" style="animation-duration:60s;width:fit-content">
		<?php
		$args = array(
			'post_type' => 'review',
			'posts_per_page' => $postCount,
			'order' => 'ASC',
		);
		$the_query = new WP_Query($args);
		if ($the_query->have_posts()) :
			while ($the_query->have_posts()) :
				$the_query->the_post();

				get_template_part('template-parts/content/content', get_post_type());

			endwhile;
		endif;
		wp_reset_postdata();
		?>
	</div>
</div>


<!-- Reviews -->
