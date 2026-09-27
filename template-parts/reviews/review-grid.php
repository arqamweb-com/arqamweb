<?php
/**
 * Review Grid Section
 *
 * Displays written reviews in a grid layout.
 *
 * @package ArqamWeb
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
?>
<section class="py-28 lg:py-36 bg-surface">
	<div class="container-x max-w-7xl mx-auto">
		<div class="max-w-3xl mb-14">
			<div class="text-xs font-semibold tracking-[0.22em] uppercase text-primary mb-4"><?php esc_html_e('Written reviews', 'arqamweb'); ?></div>
			<h2 class="text-4xl lg:text-5xl font-semibold tracking-[-0.03em] leading-[1.05]"><?php esc_html_e("The reviews we're", 'arqamweb'); ?> <span
					class="text-gradient"><?php esc_html_e('most proud of.', 'arqamweb'); ?></span></h2>
			<p class="mt-5 text-muted-foreground text-lg max-w-2xl"><?php esc_html_e('Verified clients. Unedited words. Real outcomes.', 'arqamweb'); ?></p></div>
		<?php
		$_grid_reviews = get_posts([
			'post_type' => 'review',
			'posts_per_page' => -1,
			'post_status' => 'publish',
			'orderby' => 'menu_order',
			'order' => 'ASC',
		]);
		?>
		<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
			<?php foreach ($_grid_reviews as $_gi => $_gr) :
				$_gr_excerpt = !empty($_gr->post_excerpt) ? $_gr->post_excerpt : wp_trim_words(strip_tags($_gr->post_content), 55);
				$_gr_role = get_field('role_location', $_gr->ID);
				$_gr_tag = get_field('service_tag', $_gr->ID);
				$_gr_initials = get_field('initials', $_gr->ID);
				if (!$_gr_initials) {
					$_words = explode(' ', $_gr->post_title);
					$_gr_initials = strtoupper(substr($_words[0], 0, 1) . (isset($_words[1]) ? substr($_words[1], 0, 1) : ''));
				}
				$_gr_delay = $_gi * 80;
				?>
				<article
					class="group relative rounded-3xl border border-border bg-gradient-to-br from-card to-background p-7 lg:p-8 shadow-card hover:shadow-[0_30px_80px_-30px_color-mix(in_oklab,var(--primary)_40%,transparent)] hover:border-primary/30 transition-all duration-500 animate-[fade-in_0.6s_ease-out_both]"
					style="transform:perspective(1200px) rotateY(0deg) rotateX(0deg);transform-style:preserve-3d;animation-delay:<?php echo esc_attr($_gr_delay); ?>ms;">
					<div
						class="absolute inset-0 rounded-3xl bg-gradient-to-br from-primary/[0.03] via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
					<?php if ($_gr_tag) : ?>
						<div class="absolute top-6 right-6">
							<span
								class="px-2.5 py-1 rounded-full text-[10px] font-bold tracking-wide bg-primary/10 text-primary border border-primary/20"><?php echo esc_html($_gr_tag); ?></span>
						</div>
					<?php endif; ?>
					<div class="flex gap-0.5 text-primary"><?php echo arqam_stars(); ?></div>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
					     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
					     class="lucide lucide-quote w-6 h-6 text-primary/30 mt-5" aria-hidden="true">
						<path
							d="M16 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z"></path>
						<path
							d="M5 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z"></path>
					</svg>
					<p class="mt-3 text-foreground/85 leading-relaxed text-[15px] lg:text-base">
						"<?php echo esc_html($_gr_excerpt); ?>"</p>
					<div class="mt-7 pt-6 border-t border-border flex items-center gap-3">
						<div
							class="w-11 h-11 rounded-full bg-gradient-primary text-primary-foreground flex items-center justify-center font-semibold text-sm">
							<?php echo esc_html($_gr_initials); ?>
						</div>
						<div>
							<div class="font-semibold text-sm"><?php echo esc_html($_gr->post_title); ?></div>
							<?php if ($_gr_role) : ?>
								<div class="text-xs text-muted-foreground"><?php echo esc_html($_gr_role); ?></div>
							<?php endif; ?>
						</div>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
