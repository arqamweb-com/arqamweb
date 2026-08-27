<?php
/**
 * Featured projects showcase — section heading + rotating hero card.
 *
 * Shared by the front page (template-parts/frontpage/frontpage-projects.php)
 * and the projects page (template-parts/projects.php). The rotation between
 * panels is driven by `[data-frontpage-featured-project]` in frontend/src/main.js.
 *
 * Expected $args:
 *   'projects'  array  Card arrays from arqamweb_get_project_card(). Required.
 *   'eyebrow'   string Small uppercase label above the heading.
 *   'heading'   string Heading text before the gradient span.
 *   'highlight' string Heading text rendered inside the gradient span.
 *
 * @package Arqam-Web
 */

if (!defined('ABSPATH')) {
	exit;
}

$featured_projects = isset($args['projects']) ? array_values(array_filter((array) $args['projects'])) : [];

if (empty($featured_projects)) {
	return;
}

$hero_project = $featured_projects[0];
$eyebrow      = $args['eyebrow']   ?? __('Featured work', 'arqamweb');
$heading      = $args['heading']   ?? __("Projects we're", 'arqamweb');
$highlight    = $args['highlight'] ?? __('proud to ship', 'arqamweb');
?>

<div class="reveal">
	<div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-14">
		<div class="max-w-2xl">
			<div class="text-xs font-semibold tracking-[0.2em] uppercase text-primary mb-3"><?php echo esc_html($eyebrow); ?></div>
			<h2 class="text-4xl lg:text-5xl font-semibold tracking-tight"><?php echo esc_html($heading); ?>
				<span class="text-gradient"><?php echo esc_html($highlight); ?></span></h2>
		</div>
	</div>
	<a href="<?php echo esc_url($hero_project['link']); ?>" data-frontpage-featured-project
	   class="group relative block overflow-hidden rounded-3xl border border-border/70 bg-card shadow-[0_4px_14px_-8px_rgba(15,23,42,0.10),0_1px_3px_-1px_rgba(15,23,42,0.06)] hover:shadow-[0_10px_28px_-14px_rgba(15,23,42,0.18),0_2px_6px_-2px_rgba(15,23,42,0.08)] transition-all duration-500 mb-12">
		<div class="grid lg:grid-cols-12">
			<div class="lg:col-span-7 relative overflow-hidden aspect-[16/10] lg:aspect-auto lg:min-h-[480px] bg-black/50">
				<?php foreach ($featured_projects as $index => $featured_project) : ?>
					<?php if ($featured_project['image'] !== '') : ?>
						<img data-frontpage-featured-project-image
						     src="<?php echo esc_url($featured_project['image']); ?>"
						     alt="<?php echo esc_attr($featured_project['imageAlt']); ?>" loading="lazy"
						     decoding="async" width="<?php echo esc_attr($featured_project['width']); ?>"
						     height="<?php echo esc_attr($featured_project['height']); ?>"
						     class="absolute inset-0 w-full h-full object-cover transition-all duration-[1200ms] ease-out <?php echo $index === 0 ? 'opacity-100 scale-100' : 'opacity-0 scale-105'; ?> group-hover:scale-[1.04]">
					<?php endif; ?>
				<?php endforeach; ?>
				<div class="absolute inset-0 bg-gradient-to-t from-foreground/70 via-transparent to-transparent"></div>
				<div class="absolute top-5 left-5 inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-[11px] font-semibold bg-background/90 backdrop-blur text-foreground border border-border"><?php echo esc_html__('Featured', 'arqamweb'); ?></div>
				<?php if (count($featured_projects) > 1) : ?>
					<div class="absolute bottom-5 left-5 flex gap-1.5" aria-hidden="true">
						<?php foreach ($featured_projects as $index => $featured_project) : ?>
							<span data-frontpage-featured-project-dot
							      class="h-1.5 rounded-full transition-all duration-500 <?php echo $index === 0 ? 'w-8 bg-primary' : 'w-1.5 bg-white/50'; ?>"></span>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
			<div data-frontpage-featured-project-copy class="lg:col-span-5 p-8 lg:p-12 flex flex-col justify-center">
				<div class="relative" style="min-height:270px">
					<?php foreach ($featured_projects as $index => $featured_project) : ?>
						<article data-frontpage-featured-project-panel
						         data-project-link="<?php echo esc_url($featured_project['link']); ?>"
						         data-project-category="<?php echo esc_attr($featured_project['category']); ?>"
						         aria-hidden="<?php echo $index === 0 ? 'false' : 'true'; ?>"
						         class="<?php echo $index === 0 ? 'relative opacity-100 translate-y-0' : 'absolute inset-0 opacity-0 translate-y-2 pointer-events-none'; ?> transition-all duration-500 ease-out">
							<div class="text-xs font-semibold tracking-[0.18em] uppercase text-primary mb-3"><?php echo esc_html__('Case study', 'arqamweb'); ?></div>
							<h3 class="text-3xl lg:text-4xl font-semibold tracking-tight"><?php echo esc_html($featured_project['title']); ?></h3>
							<p class="mt-4 text-base text-muted-foreground leading-relaxed"><?php echo esc_html($featured_project['copy']); ?></p>
							<?php if (!empty($featured_project['tags'])) : ?>
								<div class="mt-5 flex flex-wrap gap-2">
									<?php foreach ($featured_project['tags'] as $tag) : ?>
										<span class="text-[11px] font-medium text-foreground/70 px-2.5 py-1 rounded-full bg-secondary"><?php echo esc_html($tag); ?></span>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
							<span class="mt-7 inline-flex items-center gap-2 px-5 py-3 text-sm font-semibold text-primary-foreground bg-gradient-primary rounded-full shadow-glow group-hover:-translate-y-0.5 transition-transform self-start"><?php echo esc_html__('View Project', 'arqamweb'); ?><?php echo arqam_icon('arrow'); ?></span>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</a>
</div>
