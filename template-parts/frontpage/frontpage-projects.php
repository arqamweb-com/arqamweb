<?php
if (!defined('ABSPATH')) {
	exit;
}

$project_query_args = array(
	'post_type' => 'project',
	'posts_per_page' => 50,
	'orderby' => 'date',
	'order' => 'DESC',
	'no_found_rows' => true,
);

$project_query = new WP_Query($project_query_args);
$frontpage_projects = array();

if ($project_query->have_posts()) {
	foreach ($project_query->posts as $project_post) {
		$frontpage_projects[] = arqamweb_get_project_card((int)$project_post->ID);
	}
}

if (empty($frontpage_projects)) {
	return;
}

$featured_projects = array_values(array_filter($frontpage_projects, function ($project) {
	return !empty($project['isFeature']);
}));

if (empty($featured_projects)) {
	$featured_projects = $frontpage_projects;
}

$featured_projects = array_slice($featured_projects, 0, min(3, count($featured_projects)));
$marquee_projects = array_values(array_filter($frontpage_projects, function ($project) {
	return empty($project['isFeature']);
}));

if (empty($marquee_projects)) {
	$marquee_projects = array_slice($frontpage_projects, 1);
}

$marquee_projects = array_slice($marquee_projects, 0, 6);
?>

<section id="projects" class="py-28 lg:py-36 bg-secondary/60 overflow-hidden border-y border-border/60">
	<div class="container">
		<?php get_template_part('template-parts/partials/featured-projects-hero', null, array(
			'projects' => $featured_projects,
		)); ?>

		<?php if (!empty($marquee_projects)) : ?>
			<div class="relative marquee-mask overflow-hidden">
				<div class="flex animate-marquee py-2 pl-6" style="animation-duration:60s;width:max-content">
					<?php foreach (array_merge($marquee_projects, $marquee_projects) as $project) : ?>
						<a href="<?php echo esc_url($project['link']); ?>"
						   class="group relative block overflow-hidden rounded-3xl border border-border/70 bg-card transition-all duration-500 hover:-translate-y-0.5 w-[520px] shrink-0 mr-6 shadow-[0_4px_14px_-8px_rgba(15,23,42,0.10),0_1px_3px_-1px_rgba(15,23,42,0.06)]">
							<div class="relative overflow-hidden aspect-[16/10] bg-black/50">
								<?php if ($project['image'] !== '') : ?>
									<img src="<?php echo esc_url($project['image']); ?>"
									     alt="<?php echo esc_attr($project['imageAlt']); ?>" loading="lazy"
									     decoding="async" width="<?php echo esc_attr($project['width']); ?>"
									     height="<?php echo esc_attr($project['height']); ?>"
									     class="w-full h-full object-cover transition-transform duration-[1400ms] ease-out group-hover:scale-110">
								<?php endif; ?>
								<div
									class="absolute inset-0 bg-gradient-to-t from-foreground/85 via-foreground/15 to-transparent"></div>
								<div
									class="absolute top-4 left-4 inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-[11px] font-semibold bg-background/85 backdrop-blur text-foreground border border-border"><?php echo esc_html($project['category']); ?></div>
							</div>
							<div class="p-7">
								<h3 class="text-xl font-semibold group-hover:text-primary transition-colors"><?php echo esc_html($project['title']); ?></h3>
								<p class="mt-2 text-sm text-muted-foreground leading-relaxed"><?php echo esc_html($project['copy']); ?></p>
								<?php if (!empty($project['tags'])) : ?>
									<div class="mt-4 flex flex-wrap gap-2">
										<?php foreach ($project['tags'] as $tag) : ?>
											<span
												class="text-[11px] font-medium text-foreground/70 px-2.5 py-1 rounded-full bg-secondary"><?php echo esc_html($tag); ?></span>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
							</div>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>

		<div class="mt-14 flex justify-center">
			<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_PROJECTS_PAGE_SLUG)); ?>"
			   class="btn-primary"><?php echo esc_html__('View All Projects', 'arqamweb'); ?><?php echo arqam_icon('arrow'); ?></a>
		</div>
	</div>
</section>
