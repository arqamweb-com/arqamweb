<?php
if (!defined('ABSPATH')) {
	exit;
}
?>
<section class="relative py-24 lg:py-32 bg-background border-t border-b border-border/60">
	<div class="container-x max-w-7xl mx-auto">
		<div class="max-w-3xl mb-14">
			<div class="text-xs font-semibold tracking-[0.22em] uppercase text-primary mb-4"><?php esc_html_e('In their words', 'arqamweb'); ?>
			</div>
			<h2 class="text-3xl lg:text-5xl font-semibold tracking-[-0.03em] leading-[1.1]"><?php esc_html_e('The most honest', 'arqamweb'); ?>
				<span class="text-gradient"><?php esc_html_e('version of us', 'arqamweb'); ?></span> <?php esc_html_e('is told by clients.', 'arqamweb'); ?></h2></div>
		<?php
		$about_reviews = get_posts([
			'post_type' => 'review',
			'posts_per_page' => 6,
			'post_status' => 'publish',
			'orderby' => 'menu_order',
			'order' => 'ASC',
		]);
		?>
		<?php if ($about_reviews) : ?>
			<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
				<?php foreach ($about_reviews as $about_review) :
					$review_excerpt = !empty($about_review->post_excerpt) ? $about_review->post_excerpt : wp_trim_words(strip_tags($about_review->post_content), 38);
					$review_role = function_exists('get_field') ? get_field('role_location', $about_review->ID) : '';
					$review_initials = function_exists('get_field') ? get_field('initials', $about_review->ID) : '';

					if (!$review_initials) {
						$name_parts = preg_split('/\s+/', trim($about_review->post_title));
						$review_initials = strtoupper(substr($name_parts[0] ?? '', 0, 1) . substr($name_parts[1] ?? '', 0, 1));
					}
					?>
					<article
						class="relative rounded-3xl border border-border bg-card p-7 lg:p-8 shadow-card hover:border-primary/30 hover:-translate-y-1 transition-all duration-500">
						<div class="flex gap-0.5 text-primary mb-4"><?php echo arqam_stars(); ?></div>
						<p class="text-foreground/85 leading-relaxed text-[15px]">
							"<?php echo esc_html($review_excerpt); ?>"</p>
						<div class="mt-6 pt-5 border-t border-border flex items-center gap-3">
							<div
								class="w-11 h-11 rounded-full bg-gradient-primary text-primary-foreground flex items-center justify-center font-semibold text-sm">
								<?php echo esc_html($review_initials); ?>
							</div>
							<div>
								<div
									class="font-semibold text-sm"><?php echo esc_html($about_review->post_title); ?></div>
								<?php if ($review_role) : ?>
									<div
										class="text-xs text-muted-foreground"><?php echo esc_html($review_role); ?></div>
								<?php endif; ?>
							</div>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
		<div class="mt-10 flex justify-center">
			<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_REVIEWS_PAGE_SLUG)); ?>"
			   class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold rounded-full border border-border hover:border-primary/40 hover:bg-accent transition-all">
				<?php esc_html_e('Read all reviews', 'arqamweb'); ?>
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
				     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
				     class="lucide lucide-arrow-right w-3.5 h-3.5" aria-hidden="true">
					<path d="M5 12h14"></path>
					<path d="m12 5 7 7-7 7"></path>
				</svg>
			</a></div>
	</div>
</section>
