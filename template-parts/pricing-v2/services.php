<?php
/**
 * Pricing V2 Services Sections
 *
 * Loops through all service sections and renders pricing cards.
 *
 * @package Arqam-Web
 */

if (!defined('ABSPATH')) exit;

// Expect $aw_services and $aw_contact_url to be defined in parent scope
if (empty($aw_services) || !is_array($aw_services)) {
	return;
}

foreach ($aw_services as $aw_index => $aw_svc) :
	$aw_tiers  = $aw_svc['tiers'];
	$aw_single = 1 === count($aw_tiers);
	$aw_eyebrow_title = trim(explode('&', $aw_svc['title'])[0]);
	?>
	<section id="service-<?php echo esc_attr($aw_svc['id']); ?>"
	         data-pricing-section="<?php echo esc_attr($aw_svc['label']); ?>"
	         class="py-16 lg:py-24 scroll-mt-28 <?php echo 0 === $aw_index % 2 ? 'bg-background' : 'bg-secondary/30'; ?>">
		<div class="container-x max-w-7xl mx-auto">

			<div class="grid lg:grid-cols-12 gap-8 items-end mb-12">
				<div class="lg:col-span-7">
					<div class="inline-flex items-center gap-3 mb-4">
						<span class="text-[11px] font-mono font-semibold tracking-[0.22em] uppercase text-primary">
							<?php echo esc_html($aw_svc['num']); ?><!-- --> / <!-- --><?php echo esc_html($aw_eyebrow_title); ?>
						</span>
					</div>
					<h2 class="text-4xl lg:text-5xl xl:text-[3.25rem] font-semibold tracking-[-0.025em] leading-[1.05]">
						<?php echo esc_html($aw_svc['title']); ?>
					</h2>
					<p class="mt-4 text-muted-foreground text-base lg:text-lg max-w-xl leading-relaxed">
						<?php echo esc_html($aw_svc['subtitle']); ?>
					</p>
				</div>
				<div class="lg:col-span-5 lg:text-right">
					<div class="inline-flex flex-col gap-2 px-5 py-4 rounded-2xl bg-background border border-border shadow-card">
						<div class="flex items-center gap-2 text-primary">
							<?php echo arqamweb_v2_icon($aw_svc['icon'], 'w-5 h-5'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							<span class="text-xs font-bold tracking-[0.18em] uppercase">
								<?php
								if (null !== $aw_svc['from_usd']) {
									/* translators: %s: lowest published price for the service. */
									printf(esc_html__('From %s', 'arqamweb'), esc_html(arqamweb_v2_price((int) $aw_svc['from_usd'])));
								} else {
									esc_html_e('Quoted to scope', 'arqamweb');
								}
								?>
							</span>
						</div>
						<span class="text-xs text-muted-foreground"><?php echo esc_html($aw_svc['ships_in']); ?></span>
					</div>
				</div>
			</div>

			<?php if ($aw_single) : ?>
				<div class="grid lg:grid-cols-12 gap-8 lg:gap-10 items-start">
					<div class="lg:col-span-5">
						<?php
						// Drop-in point for the WooCommerce cards, matching pricing.php:
						// if (awp_service_has_packages('<slug>')) awp_render_service_cards('<slug>'); else …
						arqamweb_v2_card($aw_tiers[0], $aw_contact_url);
						?>
					</div>
					<div class="lg:col-span-7 flex flex-col justify-center lg:self-stretch">
						<?php arqamweb_v2_reassure($aw_svc['reassure'], true, 'mt-0'); ?>
						<?php if (!empty($aw_svc['extra_note'])) : ?>
							<p class="mt-6 max-w-2xl text-sm text-muted-foreground leading-relaxed"><?php echo esc_html($aw_svc['extra_note']); ?></p>
						<?php endif; ?>
						<?php arqamweb_v2_note($aw_svc); ?>
					</div>
				</div>
			<?php else : ?>
				<?php if (!empty($aw_tiers)) : ?>
					<div class="grid gap-6 lg:gap-7 auto-rows-fr <?php echo 2 === count($aw_tiers) ? 'md:grid-cols-2 max-w-4xl mx-auto' : 'md:grid-cols-2 lg:grid-cols-3'; ?>">
						<?php foreach ($aw_tiers as $aw_tier) : ?>
							<?php arqamweb_v2_card($aw_tier, $aw_contact_url); ?>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
				<?php if (!empty($aw_svc['extra_note'])) : ?>
					<p class="mt-6 max-w-2xl text-sm text-muted-foreground leading-relaxed"><?php echo esc_html($aw_svc['extra_note']); ?></p>
				<?php endif; ?>
				<?php arqamweb_v2_reassure($aw_svc['reassure']); ?>
				<?php arqamweb_v2_note($aw_svc); ?>
			<?php endif; ?>

		</div>
	</section>
<?php endforeach; ?>
