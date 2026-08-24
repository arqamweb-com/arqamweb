<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<!-- Blog -->
<div class="grid md:grid-cols-3 gap-5 lg:gap-7">
    <?php
	$postCount = 3;
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => $postCount,
        'order'          => 'ASC',
    );

    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) :
        while ($the_query->have_posts()) :
            $the_query->the_post(); ?>
			<article
		        class="group rounded-3xl border border-border bg-card overflow-hidden shadow-card hover:shadow-elevated hover:-translate-y-1 transition-all duration-300">

				<div class="relative aspect-[16/10] overflow-hidden">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover transition-transform duration-700 group-hover:scale-105', 'alt' => esc_attr(get_the_title())]); ?>
					</a>
					<div
						class="absolute top-4 left-4 inline-flex items-center px-3 py-1.5 rounded-full text-[11px] font-semibold bg-background/85 backdrop-blur text-foreground border border-border">
						<?php
						$categories = get_the_category();
						if (!empty($categories)) {
							foreach ($categories as $category) {
								echo '<span class="category-name text-[#3d79b8] font-extralight">' . esc_html($category->name) . '</span> ';
							}
						}
						?>
					</div>
				</div>
				<div class="p-6">
					<div class="text-xs text-muted-foreground flex items-center gap-2">
							<span>
								<time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
									<?php echo esc_html(get_the_date()); ?>
								</time>
							</span>
						<span class="w-1 h-1 rounded-full bg-muted-foreground/50"></span>
						<span>#<?php echo esc_html(get_the_ID()); ?></span>
					</div>
					<h3 class="mt-3 text-lg font-semibold leading-snug group-hover:text-primary transition-colors">
						<a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 7, '...'); ?></a>
					</h3>
					<p class="mt-3 text-sm text-muted-foreground leading-relaxed line-clamp-2"><?php echo esc_html( get_the_excerpt() ); ?></p>
					<a href="<?php the_permalink(); ?>" class="mt-5 inline-flex items-center gap-1.5 text-sm font-semibold text-primary">
						<?php esc_html_e('Read article', 'arqamweb'); ?> <?php echo arqam_icon('arrow'); ?>
					</a>
				</div>

			</article>

    <?php
        endwhile;
    endif;
    wp_reset_postdata(); // Ensure this is outside the if block
    ?>
</div>
<!-- Blog -->
