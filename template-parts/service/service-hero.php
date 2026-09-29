<?php
/**
 * Service page: hero.
 *
 * @package Arqam-Web
 */

$post_id = $args['post_id'];
$eyebrow = arqamweb_sp_text('sp_eyebrow', $post_id) ?: get_the_title($post_id);
$title = arqamweb_sp_text('sp_title', $post_id) ?: get_the_title($post_id);
$highlight = arqamweb_sp_text('sp_highlight', $post_id);
$intro = arqamweb_sp_text('sp_intro', $post_id) ?: get_the_excerpt($post_id);
$chip_a = arqamweb_sp_text('sp_chip_a', $post_id);
$chip_b = arqamweb_sp_text('sp_chip_b', $post_id);
$chip_b_label = arqamweb_sp_text('sp_chip_b_label', $post_id);
$trust = arqamweb_sp_lines('sp_trust', $post_id);
$metrics = arqamweb_sp_lines('sp_metrics', $post_id, 2);
$object = arqamweb_get_image_field('service_icon', $post_id);
$card = 'border border-slate-900/[0.07] shadow-[0_1px_2px_rgba(15,23,42,.04),0_18px_40px_-26px_rgba(15,23,42,.2)]';
?>
<section id="overview" class="relative overflow-hidden bg-[#f4f7fb] pt-28 lg:pt-36">
	<div aria-hidden="true" class="pointer-events-none absolute -right-40 top-0 h-[40rem] w-[40rem] rounded-full bg-primary/10 blur-[140px]"></div>
	<div aria-hidden="true" class="pointer-events-none absolute inset-0 opacity-[0.05] [background-size:60px_60px] [background-image:linear-gradient(to_right,rgba(15,23,42,.35)_1px,transparent_1px),linear-gradient(to_bottom,rgba(15,23,42,.35)_1px,transparent_1px)] [mask-image:radial-gradient(ellipse_at_center,black_30%,transparent_75%)]"></div>

	<div class="detail-reveal reveal container relative">
		<div class="detail-stagger arqamweb-breadcrumb">
			<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
		</div>

		<div class="grid min-w-0 items-center gap-8 xl:grid-cols-12 xl:gap-14">
			<div class="detail-stagger min-w-0 xl:col-span-7">
				<span class="inline-flex items-center gap-2 rounded-full border border-primary/20 bg-background/80 px-4 py-2 text-xs font-semibold text-primary"><?php echo arqamweb_sp_icon('sparkles'); ?><?php echo esc_html($eyebrow); ?></span>
				<h1 class="mt-7 max-w-3xl text-[2.7rem] font-semibold leading-[1.05] sm:text-5xl lg:text-[4rem]"><?php echo esc_html($title); ?><?php if ($highlight) : ?> <span class="text-gradient"><?php echo esc_html($highlight); ?></span><?php endif; ?></h1>
				<?php if ($intro) : ?>
					<p class="mt-6 max-w-xl text-base leading-relaxed text-muted-foreground lg:text-lg"><?php echo esc_html($intro); ?></p>
				<?php endif; ?>
				<div class="mt-8 flex flex-wrap gap-3">
					<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_QUOTE_PAGE_SLUG)); ?>" class="inline-flex min-h-11 items-center justify-center gap-2 rounded-full bg-gradient-primary px-6 py-3 text-sm font-semibold text-primary-foreground shadow-glow transition-transform motion-safe:hover:-translate-y-0.5"><?php esc_html_e('Get your quote', 'arqamweb'); ?> <?php echo arqamweb_sp_icon('arrow-right'); ?></a>
					<?php if ($args['has_work']) : ?>
						<a href="#work" class="inline-flex min-h-11 items-center justify-center gap-2 rounded-full border border-border px-6 py-3 text-sm font-semibold text-foreground transition-transform hover:border-primary/40 motion-safe:hover:-translate-y-0.5"><?php esc_html_e('See the work', 'arqamweb'); ?> <?php echo arqamweb_sp_icon('arrow-up-right'); ?></a>
					<?php endif; ?>
				</div>
				<?php if ($trust) : ?>
					<div class="mt-10 flex flex-wrap gap-2.5">
						<?php foreach ($trust as [$chip]) : ?>
							<span class="inline-flex items-center gap-2 rounded-full border border-slate-900/10 bg-background px-3.5 py-2 text-[13px] font-medium text-foreground/70"><?php echo arqamweb_sp_icon('check', 'h-4 w-4 text-primary'); ?><?php echo esc_html($chip); ?></span>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>

			<div data-service-hero-object class="detail-stagger relative mx-auto flex aspect-square w-full max-w-[540px] items-center justify-center xl:col-span-5" style="--stagger:80ms">
				<div aria-hidden="true" class="absolute bottom-[15%] h-[15%] w-[68%] rounded-[50%] bg-primary/25 blur-2xl"></div>
				<?php if ($object) : ?>
					<div class="detail-object relative w-[90%]">
						<?php
						$object_attrs = ['class' => 'w-full drop-shadow-[0_32px_36px_rgba(15,23,42,.22)]', 'alt' => '', 'loading' => 'eager', 'fetchpriority' => 'high', 'sizes' => '(min-width: 1280px) 490px, 90vw'];
						echo $object['id'] ? wp_get_attachment_image($object['id'], 'full', false, $object_attrs) : '<img src="' . esc_url($object['url']) . '" alt="" class="' . esc_attr($object_attrs['class']) . '">';
						?>
					</div>
				<?php endif; ?>
				<?php if ($chip_a) : ?>
					<div class="absolute left-1 top-[14%] flex items-center gap-3 rounded-2xl bg-background/80 p-3 backdrop-blur-xl sm:left-2 <?php echo esc_attr($card); ?>">
						<span class="grid h-9 w-9 place-items-center rounded-xl bg-gradient-primary text-primary-foreground"><?php echo arqamweb_sp_icon('zap'); ?></span>
						<span><span class="block text-[9px] font-semibold uppercase tracking-[0.16em] text-muted-foreground"><?php esc_html_e('Delivery', 'arqamweb'); ?></span><strong class="text-base font-semibold"><?php echo esc_html($chip_a); ?></strong></span>
					</div>
				<?php endif; ?>
				<?php if ($chip_b) : ?>
					<div class="absolute bottom-[12%] right-1 hidden items-center gap-3 rounded-2xl bg-background/80 p-3 backdrop-blur-xl sm:right-2 sm:flex <?php echo esc_attr($card); ?>">
						<span class="grid h-9 w-9 place-items-center rounded-xl bg-gradient-primary text-primary-foreground"><?php echo arqamweb_sp_icon('dollar-sign'); ?></span>
						<span><span class="block text-[9px] font-semibold uppercase tracking-[0.16em] text-muted-foreground"><?php echo esc_html($chip_b_label); ?></span><strong class="text-base font-semibold"><?php echo esc_html($chip_b); ?></strong></span>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<?php if ($metrics) : ?>
			<div class="detail-stagger mt-14 grid grid-cols-2 gap-y-2 border-t border-border/70 py-7 lg:grid-cols-4">
				<?php foreach ($metrics as [$value, $label]) : ?>
					<div class="px-3 py-3 first:pl-0 lg:px-6">
						<div class="text-3xl font-semibold text-gradient"><?php echo esc_html($value); ?></div>
						<div class="mt-1 text-[10px] font-semibold uppercase tracking-[0.18em] text-muted-foreground"><?php echo esc_html($label); ?></div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php else : ?>
			<div class="pb-16"></div>
		<?php endif; ?>
	</div>
</section>
