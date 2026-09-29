<?php
/**
 * Service page: client reviews rail.
 *
 * @package Arqam-Web
 */

$post_id = $args['post_id'];
$reviews = arqamweb_sp_lines('sp_reviews', $post_id, 3);
?>
<section id="reviews" class="bg-[#f4f7fb] py-24 lg:py-32">
	<div class="detail-reveal reveal container min-w-0 overflow-hidden">
		<div class="detail-stagger mx-auto mb-10 max-w-3xl text-center">
			<?php get_template_part('template-parts/service/service', 'eyebrow', ['text' => __('Client voices', 'arqamweb'), 'centered' => true]); ?>
			<h2 class="mt-4 text-4xl font-semibold leading-[1.06] tracking-[-0.03em] lg:text-5xl"><?php esc_html_e('What clients say', 'arqamweb'); ?> <span class="text-gradient"><?php esc_html_e('after working with us.', 'arqamweb'); ?></span></h2>
		</div>
		<div data-reviews-rail class="flex snap-x snap-mandatory gap-4 overflow-x-auto scroll-smooth pb-4 lg:grid lg:grid-cols-[280px_repeat(3,minmax(0,1fr))] lg:overflow-visible">
			<div class="detail-stagger flex min-h-72 w-[280px] shrink-0 snap-start flex-col justify-between rounded-[22px] bg-gradient-to-br from-primary to-[#124f85] p-7 text-primary-foreground">
				<div>
					<div class="text-xl tracking-widest">★★★★★</div>
					<div class="mt-6 text-[44px] font-semibold leading-none">4.9</div>
					<p class="mt-3 text-sm text-primary-foreground/80"><?php esc_html_e('from 80+ client reviews', 'arqamweb'); ?></p>
				</div>
				<div class="flex -space-x-2 rtl:space-x-reverse">
					<?php foreach ($reviews as [, $name]) : ?>
						<span class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-background bg-[#e8f2fa] text-xs font-semibold text-[#124f85]"><?php echo esc_html(arqamweb_sp_initials($name)); ?></span>
					<?php endforeach; ?>
				</div>
			</div>
			<?php foreach ($reviews as $i => [$quote, $name, $role]) : ?>
				<article class="detail-stagger detail-card flex min-h-72 w-[290px] shrink-0 snap-start flex-col rounded-[22px] bg-background p-7 lg:w-auto" style="--stagger:<?php echo esc_attr(($i + 1) * 80); ?>ms">
					<span class="text-5xl font-semibold leading-none text-primary">“</span>
					<p class="mt-2 text-sm leading-relaxed"><?php echo esc_html($quote); ?></p>
					<div class="mt-auto flex items-center gap-3 pt-5">
						<span class="grid h-10 w-10 place-items-center rounded-full bg-[#e8f2fa] text-xs font-semibold text-[#124f85]"><?php echo esc_html(arqamweb_sp_initials($name)); ?></span>
						<span><strong class="block text-sm"><?php echo esc_html($name); ?></strong><small class="text-muted-foreground"><?php echo esc_html($role); ?></small></span>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
		<div class="mt-5 flex justify-center gap-2">
			<button type="button" data-reviews-go="-1" aria-label="<?php esc_attr_e('Previous reviews', 'arqamweb'); ?>" class="grid h-10 w-10 place-items-center rounded-full border border-border bg-background transition-colors hover:bg-surface"><?php echo arqamweb_sp_icon('chevron-left'); ?></button>
			<button type="button" data-reviews-go="1" aria-label="<?php esc_attr_e('Next reviews', 'arqamweb'); ?>" class="grid h-10 w-10 place-items-center rounded-full border border-border bg-background transition-colors hover:bg-surface"><?php echo arqamweb_sp_icon('chevron-right'); ?></button>
		</div>
	</div>
</section>
