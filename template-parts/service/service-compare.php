<?php
/**
 * Service page: how we compare (two tabs).
 *
 * @package Arqam-Web
 */

$post_id = $args['post_id'];
$tabs = [];
foreach ([1, 2] as $n) {
	$us = arqamweb_sp_lines("sp_compare_{$n}_us", $post_id);
	if (! $us) {
		continue;
	}
	$tabs[] = [
		'label' => arqamweb_sp_text("sp_compare_{$n}_label", $post_id),
		'other' => arqamweb_sp_text("sp_compare_{$n}_other", $post_id),
		'us' => array_column($us, 0),
		'them' => array_column(arqamweb_sp_lines("sp_compare_{$n}_them", $post_id), 0),
	];
}
?>
<section id="compare" class="bg-[#f4f7fb] py-24 lg:py-32">
	<div class="detail-reveal reveal container grid gap-12 lg:grid-cols-[.8fr_1.2fr]">
		<div class="detail-stagger">
			<?php get_template_part('template-parts/service/service', 'eyebrow', ['text' => __('Why Arqam Web', 'arqamweb')]); ?>
			<h2 class="mt-4 text-4xl font-semibold leading-[1.06] tracking-[-0.03em] lg:text-5xl"><?php esc_html_e('How we', 'arqamweb'); ?><br><span class="text-gradient"><?php esc_html_e('compare.', 'arqamweb'); ?></span></h2>
			<p class="mt-5 max-w-md text-lg leading-relaxed text-muted-foreground"><?php esc_html_e('The honest difference between hiring us, a freelancer, or a typical agency.', 'arqamweb'); ?></p>
		</div>
		<div class="detail-stagger min-w-0" style="--stagger:80ms" data-service-compare>
			<?php if (count($tabs) > 1) : ?>
				<div role="tablist" aria-label="<?php esc_attr_e('Compare Arqam Web', 'arqamweb'); ?>" class="relative mb-4 grid w-full grid-cols-2 rounded-full bg-[#eef3f9] p-1 sm:inline-grid sm:w-auto">
					<span data-compare-thumb class="compare-thumb absolute inset-y-1 left-1 w-[calc(50%-4px)] rounded-full bg-background shadow-sm transition-transform duration-300"></span>
					<?php foreach ($tabs as $i => $tab) : ?>
						<button type="button" role="tab" id="compare-tab-<?php echo esc_attr($i); ?>" aria-selected="<?php echo $i === 0 ? 'true' : 'false'; ?>" aria-controls="compare-panel-<?php echo esc_attr($i); ?>" data-compare-tab="<?php echo esc_attr($i); ?>" class="relative z-10 min-h-10 rounded-full px-3 py-2 text-xs font-semibold sm:px-4 sm:text-sm"><?php echo esc_html($tab['label']); ?></button>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			<?php foreach ($tabs as $i => $tab) : ?>
				<div id="compare-panel-<?php echo esc_attr($i); ?>" role="tabpanel" aria-labelledby="compare-tab-<?php echo esc_attr($i); ?>" data-compare-panel="<?php echo esc_attr($i); ?>" class="detail-card grid gap-0 rounded-[22px] bg-background p-5 sm:grid-cols-2 sm:gap-6 sm:p-7" <?php echo $i > 0 ? 'hidden' : ''; ?>>
					<?php foreach ([['title' => __('Arqam Web', 'arqamweb'), 'items' => $tab['us'], 'ours' => true], ['title' => $tab['other'], 'items' => $tab['them'], 'ours' => false]] as $col) : ?>
						<div class="border-t border-dashed border-slate-200 pt-5 first:border-t-0 first:pb-5 sm:border-t-0 sm:pt-0 sm:first:border-r sm:first:pb-0 sm:first:pr-6">
							<h3 class="mb-2 text-lg font-semibold <?php echo $col['ours'] ? 'text-primary' : 'text-muted-foreground'; ?>"><?php echo esc_html($col['title']); ?></h3>
							<ul>
								<?php foreach ($col['items'] as $item) : ?>
									<li class="flex gap-3 border-b border-dashed border-slate-200 py-3 text-sm leading-relaxed last:border-0">
										<span class="mt-0.5 grid h-5 w-5 shrink-0 place-items-center rounded-full <?php echo $col['ours'] ? 'bg-primary text-primary-foreground' : 'bg-[#e2e8f0] text-slate-500'; ?>"><?php echo arqamweb_sp_icon($col['ours'] ? 'check' : 'x', 'h-3 w-3'); ?></span>
										<?php echo esc_html($item); ?>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
