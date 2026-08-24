<?php
if (!defined('ABSPATH')) {
	exit;
}
?>
<section id="reviews" class="py-24 lg:py-32 bg-surface border-t border-border/60 overflow-hidden">
	<div class="container">
		<div class="reveal mb-12">
			<div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 ">
				<div class="max-w-2xl">
					<div class="text-xs font-semibold tracking-[0.2em] uppercase text-primary mb-3"><?php esc_html_e('Client voices', 'arqamweb'); ?></div>
					<h2 class="text-4xl lg:text-5xl font-semibold tracking-tight"><?php esc_html_e("The reviews we're", 'arqamweb'); ?> <span
							class="text-gradient"><?php esc_html_e('most proud of.', 'arqamweb'); ?></span></h2>
				</div>
				<div class="flex items-center gap-3 text-sm text-muted-foreground">
					<div class="flex items-center gap-1.5">
						<div class="flex gap-0.5 text-primary"><?php echo arqam_stars(); ?></div>
						<span class="font-semibold text-foreground">4.9 / 5</span>
					</div>
					<span>·</span><span><?php esc_html_e('Based on 80+ reviews', 'arqamweb'); ?></span>
				</div>
			</div>
		</div>

		<?php get_template_part('/template-parts/reviews/custom', 'loop-reviews', ['postCount' => 10]); ?>

		<div class="flex justify-center mt-12">
			<a href="<?php echo arqamweb_get_page_permalink(ARQAM_REVIEWS_PAGE_SLUG); ?>"
			   class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-primary-foreground bg-gradient-primary rounded-full shadow-soft hover:shadow-glow transition-all hover:-translate-y-0.5">
				<?php esc_html_e('View All Reviews', 'arqamweb'); ?> <?php echo arqam_icon('arrow'); ?>
			</a>
		</div>
	</div>
</section>




