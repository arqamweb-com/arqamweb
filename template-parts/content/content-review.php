<?php
if (!defined('ABSPATH')) {
	exit;
}

$rating = (float)get_post_meta(get_the_ID(), 'rating', true);
$rating = max(0, min(5, $rating));
?>


<article id="post-<?php the_ID(); ?>"
         class="w-[340px] sm:w-[420px] shrink-0 rounded-3xl border border-border bg-card p-7 shadow-card">
	<div class="flex gap-0.5 text-primary"><?php echo arqam_stars(); ?></div>
	<p class="mt-4 text-foreground/85 leading-relaxed text-[15px]">
		<?php echo get_the_excerpt(); ?>
	</p>
	<div class="mt-6 flex items-center gap-3 pt-5 border-t border-border">
		<div
			class="w-11 h-11 rounded-full bg-gradient-primary text-primary-foreground flex items-center justify-center font-semibold">
			sw
		</div>
		<div>
			<h3 class="font-semibold text-sm"><?php the_title(); ?></h3>
			<div class="text-xs text-muted-foreground">
				<?php esc_html_e('CEO · Riyadh, Saudi Arabia', 'arqamweb'); ?>
			</div>
		</div>
	</div>
</article>



