<?php
if (!defined('ABSPATH')) {
	exit;
}

$_marquee_reviews = get_posts([
	'post_type' => 'review',
	'posts_per_page' => -1,
	'post_status' => 'publish',
	'orderby' => 'menu_order',
	'order' => 'ASC',
]);

if (empty($_marquee_reviews)) {
	return;
}

$_marquee_double = array_merge($_marquee_reviews, $_marquee_reviews);
$_marquee_duration = count($_marquee_reviews) * 8;
?>
<section class="py-24 lg:py-28 bg-background border-t border-b border-border/60 overflow-hidden">
	<div class="container-x max-w-7xl mx-auto mb-12">
		<div class="text-xs font-semibold tracking-[0.22em] uppercase text-primary mb-3"><?php esc_html_e('In motion', 'arqamweb'); ?></div>
		<h2 class="text-3xl lg:text-4xl font-semibold tracking-[-0.025em]"><?php esc_html_e('A constant stream of', 'arqamweb'); ?> <span
				class="text-gradient"><?php esc_html_e('kind words.', 'arqamweb'); ?></span></h2></div>
	<div class="marquee-mask">
		<div class="flex gap-5 animate-drift"
		     style="animation-duration:<?php echo $_marquee_duration; ?>s;width:fit-content">
			<?php foreach ($_marquee_double as $_mr) :
				$_mr_excerpt = !empty($_mr->post_excerpt) ? $_mr->post_excerpt : wp_trim_words(strip_tags($_mr->post_content), 30);
				$_mr_role = get_field('role_location', $_mr->ID);
				?>
				<article
					class="w-[380px] shrink-0 rounded-2xl border border-border bg-card/60 backdrop-blur-sm p-6 shadow-card">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
					     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
					     stroke-linejoin="round" class="lucide lucide-quote w-5 h-5 text-primary/50 mb-3"
					     aria-hidden="true">
						<path
							d="M16 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z"></path>
						<path
							d="M5 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z"></path>
					</svg>
					<p class="text-foreground/85 leading-relaxed text-[15px]">
						"<?php echo esc_html($_mr_excerpt); ?>"</p>
					<div class="mt-5 pt-4 border-t border-border flex items-center justify-between">
						<div>
							<div class="font-semibold text-sm"><?php echo esc_html($_mr->post_title); ?></div>
							<?php if ($_mr_role) : ?>
								<div
									class="text-xs text-muted-foreground"><?php echo esc_html($_mr_role); ?></div>
							<?php endif; ?>
						</div>
						<div class="flex gap-0.5 text-primary"><?php echo arqam_stars(); ?></div>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
