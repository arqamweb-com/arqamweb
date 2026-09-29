<?php
/**
 * Service page: FAQ accordion.
 *
 * @package Arqam-Web
 */

$post_id = $args['post_id'];
$faq = arqamweb_sp_lines('sp_faq', $post_id, 2);
?>
<section id="faq" class="bg-background py-24 lg:py-32">
	<div class="detail-reveal reveal container max-w-[820px]">
		<div class="detail-card rounded-[32px] bg-background p-6 sm:p-10 lg:p-14">
			<div class="detail-stagger text-center">
				<?php get_template_part('template-parts/service/service', 'eyebrow', ['text' => __('FAQ', 'arqamweb'), 'centered' => true]); ?>
				<h2 class="mt-4 text-4xl font-semibold leading-[1.06] tracking-[-0.03em] lg:text-5xl"><?php esc_html_e('Common questions', 'arqamweb'); ?></h2>
			</div>
			<div class="mt-10" data-service-faq>
				<?php foreach ($faq as $i => [$question, $answer]) : ?>
					<div class="detail-stagger mt-2.5 rounded-2xl border border-slate-900/[0.07] bg-background px-5" style="--stagger:<?php echo esc_attr($i * 80); ?>ms">
						<button type="button" id="faq-trigger-<?php echo esc_attr($i); ?>" aria-expanded="<?php echo $i === 0 ? 'true' : 'false'; ?>" aria-controls="faq-panel-<?php echo esc_attr($i); ?>" data-faq-trigger class="flex min-h-20 w-full items-center justify-between gap-4 rounded-2xl py-5 text-start text-base font-semibold">
							<span class="min-w-0 pr-2"><?php echo esc_html($question); ?></span>
							<span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#0f172a] text-primary-foreground">
								<?php echo arqamweb_sp_icon('plus', 'faq-plus h-4 w-4'); ?><?php echo arqamweb_sp_icon('minus', 'faq-minus h-4 w-4'); ?>
							</span>
						</button>
						<div id="faq-panel-<?php echo esc_attr($i); ?>" role="region" aria-labelledby="faq-trigger-<?php echo esc_attr($i); ?>" class="pb-6 text-sm leading-relaxed text-muted-foreground" <?php echo $i > 0 ? 'hidden' : ''; ?>><?php echo esc_html($answer); ?></div>
					</div>
				<?php endforeach; ?>
			</div>
			<p class="detail-stagger mt-9 text-center text-sm text-muted-foreground"><?php esc_html_e('Have more questions?', 'arqamweb'); ?> <a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_CONTACT_PAGE_SLUG)); ?>" class="font-semibold text-primary"><?php esc_html_e('Contact us', 'arqamweb'); ?> <?php echo arqamweb_sp_icon('arrow-up-right', 'inline h-4 w-4'); ?></a></p>
		</div>
	</div>
</section>
