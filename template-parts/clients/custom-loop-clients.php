<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<!-- Clients -->
<section class="grid grid-cols-2 gap-8 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 mt-8">
    <?php
    $args = array(
        'post_type'      => 'client',
        'posts_per_page' => isset($args['postCount']) ? $args['postCount'] : -1,
        'order'          => 'ASC',
    );
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) :
        while ($the_query->have_posts()) :
            $the_query->the_post(); ?>
            <article>
                <?php the_post_thumbnail('large', ['class' => 'post-image w-full h-full object-cover hover:opacity-80', 'alt' => esc_attr(get_the_title())]); ?>
            </article>
    <?php
        endwhile;
    endif;
    wp_reset_query();
    ?>
</section>
<!-- Clients -->