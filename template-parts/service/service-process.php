<?php
/**
 * Service page: how we work (timeline that fills as you scroll).
 *
 * @package Arqam-Web
 */

$post_id = $args['post_id'];
$steps = arqamweb_sp_lines('sp_process', $post_id, 2);
$title = arqamweb_sp_text('sp_process_title', $post_id) ?: __('Six steps. No surprises.', 'arqamweb');
$lead = arqamweb_sp_text('sp_process_lead', $post_id) ?: __('Six clear steps, from the first brief to a handover in your name.', 'arqamweb');
?>
<section id="process" class="bg-background py-24 lg:py-32">
	<div class="detail-reveal reveal container">
		<div class="detail-card rounded-[32px] bg-background px-6 py-12 sm:px-10 lg:px-16 lg:py-20">
			<div class="detail-stagger mx-auto max-w-xl text-center">
				<?php get_template_part('template-parts/service/service', 'eyebrow', ['text' => __('How we work', 'arqamweb'), 'centered' => true]); ?>
				<h2 class="mt-4 text-4xl font-semibold leading-[1.06] tracking-[-0.03em] lg:text-5xl"><?php echo arqamweb_sp_split_at_period($title, false); ?></h2>
				<p class="mt-4 text-muted-foreground"><?php echo esc_html($lead); ?></p>
			</div>
			<div data-service-process class="relative mx-auto mt-14 max-w-4xl">
				<div class="absolute bottom-5 left-5 top-5 w-0.5 -translate-x-1/2 bg-border lg:left-1/2">
					<div data-process-fill class="w-full bg-primary motion-reduce:!h-full" style="height:0%"></div>
				</div>
				<?php foreach ($steps as $i => [$step_title, $step_text]) : ?>
					<div data-process-step class="detail-stagger relative mb-9 grid min-h-28 grid-cols-[40px_1fr] items-start gap-4 last:mb-0 lg:grid-cols-[1fr_56px_1fr] lg:gap-0" style="--stagger:<?php echo esc_attr($i * 80); ?>ms">
						<div data-process-tile class="process-tile relative z-10 col-start-1 row-start-1 mt-0 flex h-10 w-10 items-center justify-center justify-self-center rounded-xl bg-[#0f172a] text-primary-foreground ring-4 ring-background transition-all lg:col-start-2">
							<span class="text-xs font-semibold"><?php echo esc_html(sprintf('%02d', $i + 1)); ?></span>
						</div>
						<div class="col-start-2 row-start-1 <?php echo $i % 2 === 0 ? 'lg:col-start-1 lg:pr-6 lg:text-right' : 'lg:col-start-3 lg:pl-6 lg:text-left'; ?>">
							<h3 class="text-lg font-semibold leading-10"><?php echo esc_html($step_title); ?></h3>
							<p class="text-sm leading-relaxed text-muted-foreground"><?php echo esc_html($step_text); ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
