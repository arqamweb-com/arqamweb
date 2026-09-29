<?php
/**
 * Service page: the problem.
 *
 * @package Arqam-Web
 */

$post_id = $args['post_id'];
$title = arqamweb_sp_text('sp_problem_title', $post_id);
$lead = arqamweb_sp_text('sp_problem_lead', $post_id);
$points = arqamweb_sp_lines('sp_problem_points', $post_id, 2);
?>
<section id="problem" class="bg-[#0c1828] py-24 text-primary-foreground lg:py-32">
	<div class="detail-reveal reveal container">
		<div class="grid gap-8 lg:grid-cols-2 lg:items-end">
			<div class="detail-stagger">
				<?php get_template_part('template-parts/service/service', 'eyebrow', ['text' => __('The problem', 'arqamweb'), 'dark' => true]); ?>
				<?php if ($title) : ?>
					<h2 class="mt-5 text-4xl font-semibold leading-[1.04] lg:text-[3.9rem]"><?php echo esc_html($title); ?></h2>
				<?php endif; ?>
			</div>
			<?php if ($lead) : ?>
				<p class="detail-stagger max-w-xl border-l border-primary/50 pl-5 text-lg leading-relaxed text-primary-foreground/70" style="--stagger:80ms"><?php echo esc_html($lead); ?></p>
			<?php endif; ?>
		</div>
		<div class="mt-14 grid gap-px overflow-hidden rounded-[24px] bg-primary-foreground/10 sm:grid-cols-2">
			<?php foreach ($points as $i => [$point_title, $point_text]) : ?>
				<div class="detail-stagger bg-[#0c1828] p-7 lg:p-9" style="--stagger:<?php echo esc_attr($i * 80); ?>ms">
					<span class="font-mono text-xs text-primary/80"><?php echo esc_html(sprintf('%02d', $i + 1)); ?></span>
					<h3 class="mt-5 text-xl font-semibold"><?php echo esc_html($point_title); ?></h3>
					<p class="mt-3 text-sm leading-relaxed text-primary-foreground/60"><?php echo esc_html($point_text); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
