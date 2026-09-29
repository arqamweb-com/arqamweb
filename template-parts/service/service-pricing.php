<?php
/**
 * Service page: pricing plans from WooCommerce (Arqam Woo Pricing plugin).
 *
 * @package Arqam-Web
 */

$post_id = $args['post_id'];
$title = arqamweb_sp_text('sp_pricing_title', $post_id) ?: __('Clear prices. Honest quotes.', 'arqamweb');
$plans = array_map(['AWP_Render', 'card_context'], AWP_Query::get_packages($args['pricing_service']));
$columns = count($plans) >= 3 ? 'md:grid-cols-2 lg:grid-cols-3' : 'md:grid-cols-2';
?>
<section id="pricing" class="bg-background py-24 lg:py-32">
	<div class="detail-reveal reveal container <?php echo count($plans) >= 3 ? 'max-w-6xl' : 'max-w-[960px]'; ?>">
		<div class="detail-stagger mx-auto mb-12 max-w-3xl text-center">
			<?php get_template_part('template-parts/service/service', 'eyebrow', ['text' => __('Pricing', 'arqamweb'), 'centered' => true]); ?>
			<h2 class="mt-4 text-4xl font-semibold leading-[1.06] tracking-[-0.03em] lg:text-5xl"><?php echo arqamweb_sp_split_at_period($title); ?></h2>
		</div>
		<div class="grid gap-5 <?php echo esc_attr($columns); ?>">
			<?php foreach ($plans as $i => $plan) : ?>
				<article class="detail-stagger detail-card flex flex-col rounded-[24px] p-[30px] <?php echo $plan['highlighted'] ? 'border-[1.5px] border-primary/45 bg-[linear-gradient(145deg,#ffffff,#f1f7fd)]' : 'bg-background'; ?>" style="--stagger:<?php echo esc_attr($i * 80); ?>ms">
					<div class="flex flex-col items-start gap-3 sm:flex-row sm:justify-between">
						<h3 class="text-xl font-semibold"><?php echo esc_html($plan['title']); ?></h3>
						<?php if ($plan['highlighted'] || $plan['badge']) : ?>
							<span class="shrink-0 rounded-full bg-primary/[0.12] px-2.5 py-1 text-[10px] font-semibold uppercase tracking-[0.12em] text-primary"><?php echo esc_html($plan['badge'] ?: __('Most popular', 'arqamweb')); ?></span>
						<?php endif; ?>
					</div>
					<p class="mt-5">
						<?php if ($plan['has_price']) : ?>
							<span class="text-[40px] font-semibold leading-none text-foreground"><?php echo esc_html($plan['price']); ?></span>
							<?php if ($plan['on_sale']) : ?>
								<del class="ml-2 text-sm text-muted-foreground"><?php echo esc_html($plan['regular']); ?></del>
							<?php endif; ?>
							<?php if ($plan['suffix']) : ?>
								<span class="ml-2 text-sm text-muted-foreground"><?php echo esc_html($plan['suffix']); ?></span>
							<?php endif; ?>
						<?php else : ?>
							<span class="break-words text-2xl font-semibold leading-tight text-foreground sm:text-[30px]"><?php esc_html_e('Quoted to scope', 'arqamweb'); ?></span>
						<?php endif; ?>
					</p>
					<?php if ($plan['subtitle']) : ?>
						<p class="mt-2 text-sm text-muted-foreground"><?php echo esc_html($plan['subtitle']); ?></p>
					<?php endif; ?>
					<ul class="my-8 space-y-4">
						<?php foreach ($plan['features'] as $feature) : ?>
							<li class="flex items-start gap-3 text-sm"><?php echo arqamweb_sp_icon('check', 'mt-0.5 h-4 w-4 shrink-0 text-primary'); ?><?php echo esc_html($feature); ?></li>
						<?php endforeach; ?>
					</ul>
					<a href="<?php echo esc_url($plan['checkout_url']); ?>" class="mt-auto inline-flex min-h-11 w-full items-center justify-center gap-2 rounded-full px-5 py-3 text-sm font-semibold text-primary-foreground <?php echo $plan['highlighted'] ? 'bg-gradient-primary shadow-glow' : 'bg-[#0f172a]'; ?>"><?php echo esc_html($plan['cta_label']); ?> <?php echo arqamweb_sp_icon('arrow-right'); ?></a>
				</article>
			<?php endforeach; ?>
		</div>
		<div class="detail-stagger mt-5 flex flex-col items-start justify-between gap-6 rounded-[22px] bg-[radial-gradient(circle_at_15%_20%,#cfe6f7,transparent_38%),radial-gradient(circle_at_62%_15%,#e1d9fb,transparent_38%),radial-gradient(circle_at_85%_80%,#d8f1ff,transparent_42%),#f7faff] p-7 sm:flex-row sm:items-center lg:p-9">
			<div class="flex items-center gap-4">
				<div class="grid h-12 w-12 shrink-0 place-items-center rounded-full bg-primary text-primary-foreground"><?php echo arqamweb_sp_icon('help-circle', 'h-6 w-6'); ?></div>
				<div>
					<h3 class="text-lg font-semibold"><?php esc_html_e('Not sure what fits your business?', 'arqamweb'); ?></h3>
					<p class="mt-1 text-sm text-muted-foreground"><?php esc_html_e('A free 30-minute call, then a written scope and price.', 'arqamweb'); ?></p>
				</div>
			</div>
			<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_CONTACT_PAGE_SLUG)); ?>" class="inline-flex shrink-0 items-center gap-2 rounded-full bg-[#0f172a] px-6 py-3 text-sm font-semibold text-primary-foreground"><?php esc_html_e('Book a free call', 'arqamweb'); ?> <?php echo arqamweb_sp_icon('arrow-right'); ?></a>
		</div>
	</div>
</section>
