<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<!-- Reviews -->
<div class="review__content grid grid-cols-1 gap-8 md:grid-cols-2 mt-8">
    <?php
	$args['postCount'] = 8;
    $args = array(
        'post_type' => 'review',
        'posts_per_page' => $args['postCount'],
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





<!-- Reviews -->
