<?php
if (! defined('ABSPATH')) {
	exit;
}
?>

<!-- Services -->
<div class="group/grid grid sm:grid-cols-2 gap-5 lg:gap-6">
	<?php
	$args = array(
		'post_type'      => 'service',
		'posts_per_page' => isset($args['postCount']) ? $args['postCount'] : -1,
		'order'          => 'ASC',
	);

	$index = 0;

	$the_query = new WP_Query($args);
	if ($the_query->have_posts()) :
		while ($the_query->have_posts()) :
			$the_query->the_post();

	?>

			<article href="<?php echo get_permalink(); ?>" class="group/card relative overflow-hidden rounded-3xl border border-white/10 bg-[#124f85] text-white p-8 lg:p-10 shadow-card transition-all duration-500 hover:shadow-elevated hover:border-primary/40 hover:-translate-y-1.5 hover:scale-[1.015] group-hover/grid:opacity-50 hover:!opacity-100">
				<div class="absolute -top-24 -right-24 w-64 h-64 rounded-full bg-primary/0 group-hover/card:bg-primary/25 blur-2xl transition-all duration-700"></div>
				<div class="relative">
					<div class="flex items-start justify-between">
						<div class="w-14 h-14 rounded-2xl bg-white/[0.06] text-white flex items-center justify-center transition-all duration-500 group-hover/card:[background:#31415a] group-hover/card:text-primary-foreground group-hover/card:scale-110 group-hover/card:rotate-[-4deg] group-hover/card:shadow-glow group-hover/card:ring-1 group-hover/card:ring-white/20">
							<?php
							// Display service icon
							$service_icon = arqamweb_get_image_field('service_icon', get_the_ID());
							if ($service_icon) {
								echo '<img src="' . esc_url($service_icon['url']) . '" alt="' . esc_attr($service_icon['alt']) . '" loading="lazy" width="24" height="24" class="h-6 w-6 object-contain">';
							}
							?>
						</div>
						<span class="text-xs font-mono text-white/40"><?php echo sprintf('%02d', $index + 1); ?></span>
					</div>
					<div class="mt-7">
						<div class="text-[11px] font-semibold tracking-[0.18em] uppercase text-white/60">

							<?php

							$categories = get_the_terms(get_the_ID(), 'service_category');

							if ($categories && ! is_wp_error($categories)) {
								echo esc_html($categories[0]->name);
							}
							?>
						</div>

						<h3 class="mt-2 text-xl lg:text-2xl font-semibold tracking-tight text-white">
							<a class="hover:text-primary" href="<?php echo get_permalink(); ?>">
								<?php echo esc_html(get_the_title()); ?>
							</a>
						</h3>

						<p class="mt-3 text-sm lg:text-base text-white/70 leading-relaxed">
							<?php echo esc_html(get_the_excerpt()); ?>
						</p>
					</div>
					<div class="grid grid-rows-[0fr] group-hover/card:grid-rows-[1fr] transition-[grid-template-rows] duration-500 ease-out">
						<div class="overflow-hidden">
							<div class="mt-6 flex flex-wrap gap-2 opacity-0 -translate-y-1 group-hover/card:opacity-100 group-hover/card:translate-y-0 transition-all duration-500 delay-100">
								<?php
								$tags = get_the_terms(get_the_ID(), 'service_tag');

								if ($tags && ! is_wp_error($tags)) :
									foreach ($tags as $tag) :
								?>
										<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-medium bg-white/[0.06] text-white/80">
											<span class="w-1 h-1 rounded-full bg-white/70"></span>
											<?php echo esc_html($tag->name); ?>
										</span>
								<?php
									endforeach;
								endif;
								?>
							</div>
						</div>
					</div>
					<a href="<?php echo get_permalink(); ?>">
						<div class="mt-7 inline-flex items-center gap-1.5 text-sm font-semibold text-white transition-all duration-500 group-hover/card:gap-3"><?php esc_html_e('Learn more', 'arqamweb'); ?> <?php echo arqam_icon('arrow'); ?></div>
					</a>
				</div>
			</article>

	<?php
			$index++;
		endwhile;
	endif;
	wp_reset_postdata();
	?>
</div>
<!-- Services -->
