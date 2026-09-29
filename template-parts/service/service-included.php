<?php
/**
 * Service page: what's included.
 *
 * @package Arqam-Web
 */

$post_id = $args['post_id'];
$title = arqamweb_sp_text('sp_included_title', $post_id);
$items = arqamweb_sp_lines('sp_included', $post_id, 3);
$callout = arqamweb_sp_text('sp_included_callout', $post_id);
$note = arqamweb_sp_text('sp_included_note', $post_id);
?>
<section id="included" class="bg-background py-24 lg:py-32">
	<div class="detail-reveal reveal container">
		<div class="detail-stagger mx-auto mb-14 max-w-3xl text-center">
			<?php get_template_part('template-parts/service/service', 'eyebrow', ['text' => __("What's included", 'arqamweb'), 'centered' => true]); ?>
			<?php if ($title) : ?>
				<h2 class="mt-4 text-4xl font-semibold leading-[1.06] tracking-[-0.03em] lg:text-5xl"><?php echo arqamweb_sp_gradient_last_words($title); ?></h2>
			<?php endif; ?>
		</div>
		<div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
			<?php foreach ($items as $i => [$item_title, $item_text, $visual]) : ?>
				<article class="detail-stagger detail-card rounded-[22px] bg-background p-6 transition-all hover:-translate-y-[3px] hover:border-primary/30 <?php echo ($i === 0 || $i === 3) ? 'lg:col-span-2' : ''; ?>" style="--stagger:<?php echo esc_attr($i * 80); ?>ms">
					<?php echo arqamweb_service_illustration($visual); ?>
					<h3 class="text-lg font-semibold"><?php echo esc_html($item_title); ?></h3>
					<p class="mt-2 text-sm leading-relaxed text-muted-foreground"><?php echo esc_html($item_text); ?></p>
				</article>
			<?php endforeach; ?>
			<?php if ($callout) : ?>
				<article class="detail-stagger flex min-h-[220px] items-center justify-center rounded-[22px] border border-primary/20 bg-[linear-gradient(145deg,#0f2a4a,#0a1626)] p-8 text-center text-primary-foreground shadow-[0_18px_40px_-26px_rgba(15,23,42,.5)]">
					<div>
						<p class="text-2xl font-light leading-tight"><?php echo esc_html($callout); ?></p>
						<?php if ($note) : ?>
							<p class="mt-4 text-sm text-primary-foreground/60"><?php echo esc_html($note); ?></p>
						<?php endif; ?>
					</div>
				</article>
			<?php endif; ?>
		</div>
	</div>
</section>
