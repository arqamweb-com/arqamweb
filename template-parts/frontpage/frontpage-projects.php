<?php
if (!defined('ABSPATH')) {
	exit;
}

$project_query_args = array(
	'post_type' => 'project',
	'posts_per_page' => 6,
	'order' => 'ASC',
	'no_found_rows' => true,
);

$project_query = new WP_Query($project_query_args);
$frontpage_projects = array();

if ($project_query->have_posts()) {
	while ($project_query->have_posts()) {
		$project_query->the_post();

		$project_id = get_the_ID();
		$category = '';
		$is_feature_project = false;

		if (function_exists('get_field')) {
			$is_feature_project = (bool)get_field('is_feature', $project_id);
			if (!$is_feature_project) {
				$is_feature_project = (bool)get_field('is_featured', $project_id);
			}
		}

		if (!$is_feature_project) {
			$is_feature_project = (bool)get_post_meta($project_id, 'is_feature', true);
		}

		if (!$is_feature_project && class_exists('ArqamWeb_Project')) {
			$is_feature_project = ArqamWeb_Project::get_is_featured($project_id);
		}

		if (class_exists('ArqamWeb_Project')) {
			$category = ArqamWeb_Project::get_category($project_id);
		}

		if ($category === '') {
			$category_terms = get_the_terms($project_id, 'project_category');
			if ($category_terms && !is_wp_error($category_terms)) {
				$category = implode(' · ', wp_list_pluck($category_terms, 'name'));
			}
		}

		$tags = array();
		$tag_terms = get_the_terms($project_id, 'project_tag');
		if ($tag_terms && !is_wp_error($tag_terms)) {
			$tags = wp_list_pluck($tag_terms, 'name');
		}

		$image = '';
		$image_alt = get_the_title($project_id);
		$image_width = 1280;
		$image_height = 800;

		if (has_post_thumbnail($project_id)) {
			$image_id = get_post_thumbnail_id($project_id);
			$image_src = wp_get_attachment_image_src($image_id, 'large');
			if ($image_src) {
				$image = $image_src[0];
				$image_width = (int)$image_src[1];
				$image_height = (int)$image_src[2];
			}
			$thumbnail_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
			if ($thumbnail_alt !== '') {
				$image_alt = $thumbnail_alt;
			}
		} elseif (class_exists('ArqamWeb_Project')) {
			$portfolio_image = ArqamWeb_Project::get_portfolio_image($project_id);
			if ($portfolio_image !== null) {
				$image = $portfolio_image['url'];
				$image_alt = $portfolio_image['alt'];
				$image_width = $portfolio_image['width'];
				$image_height = $portfolio_image['height'];
			}
		}

		$excerpt = get_the_excerpt($project_id);
		if ($excerpt === '') {
			$excerpt = wp_trim_words(wp_strip_all_tags(get_the_content(null, false, $project_id)), 24);
		}

		$frontpage_projects[] = array(
			'title' => get_the_title($project_id),
			'category' => $category !== '' ? $category : __('Project', 'arqamweb'),
			'copy' => $excerpt,
			'image' => $image,
			'imageAlt' => $image_alt,
			'width' => $image_width,
			'height' => $image_height,
			'tags' => array_slice($tags, 0, 3),
			'link' => get_permalink($project_id),
			'isFeature' => $is_feature_project,
		);
	}
	wp_reset_postdata();
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
$heroProject = $featured_projects[0];
$marquee_projects = array_values(array_filter($frontpage_projects, function ($project) {
	return empty($project['isFeature']);
}));

if (empty($marquee_projects)) {
	$marquee_projects = array_slice($frontpage_projects, 1);
}
?>

<section id="projects" class="py-28 lg:py-36 bg-secondary/60 overflow-hidden border-y border-border/60">
	<div class="container">
		<div class="reveal">
			<div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-14">
				<div class="max-w-2xl">
					<div
						class="text-xs font-semibold tracking-[0.2em] uppercase text-primary mb-3"><?php echo esc_html__('Featured work', 'arqamweb'); ?></div>
					<h2 class="text-4xl lg:text-5xl font-semibold tracking-tight"><?php echo esc_html__("Projects we're", 'arqamweb'); ?>
						<span class="text-gradient"><?php echo esc_html__('proud to ship', 'arqamweb'); ?></span></h2>
				</div>
			</div>
			<a href="<?php echo esc_url($heroProject['link']); ?>" data-frontpage-featured-project
			   class="group relative block overflow-hidden rounded-3xl border border-border/70 bg-card shadow-[0_4px_14px_-8px_rgba(15,23,42,0.10),0_1px_3px_-1px_rgba(15,23,42,0.06)] hover:shadow-[0_10px_28px_-14px_rgba(15,23,42,0.18),0_2px_6px_-2px_rgba(15,23,42,0.08)] transition-all duration-500 mb-12">
				<div class="grid lg:grid-cols-12">
					<div
						class="lg:col-span-7 relative overflow-hidden aspect-[16/10] lg:aspect-auto lg:min-h-[480px] bg-black/50">
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
						<div
							class="absolute inset-0 bg-gradient-to-t from-foreground/70 via-transparent to-transparent"></div>
						<div
							class="absolute top-5 left-5 inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-[11px] font-semibold bg-background/90 backdrop-blur text-foreground border border-border"><?php echo esc_html__('Featured', 'arqamweb'); ?></div>
						<?php if (count($featured_projects) > 1) : ?>
							<div class="absolute bottom-5 left-5 flex gap-1.5" aria-hidden="true">
								<?php foreach ($featured_projects as $index => $featured_project) : ?>
									<span data-frontpage-featured-project-dot
									      class="h-1.5 rounded-full transition-all duration-500 <?php echo $index === 0 ? 'w-8 bg-primary' : 'w-1.5 bg-white/50'; ?>"></span>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>
					<div data-frontpage-featured-project-copy
					     class="lg:col-span-5 p-8 lg:p-12 flex flex-col justify-center">
						<div class="relative" style="min-height:270px">
							<?php foreach ($featured_projects as $index => $featured_project) : ?>
								<article data-frontpage-featured-project-panel
								         data-project-link="<?php echo esc_url($featured_project['link']); ?>"
								         data-project-category="<?php echo esc_attr($featured_project['category']); ?>"
								         aria-hidden="<?php echo $index === 0 ? 'false' : 'true'; ?>"
								         class="<?php echo $index === 0 ? 'relative opacity-100 translate-y-0' : 'absolute inset-0 opacity-0 translate-y-2 pointer-events-none'; ?> transition-all duration-500 ease-out">
									<div
										class="text-xs font-semibold tracking-[0.18em] uppercase text-primary mb-3"><?php echo esc_html__('Case study', 'arqamweb'); ?></div>
									<h3 class="text-3xl lg:text-4xl font-semibold tracking-tight"><?php echo esc_html($featured_project['title']); ?></h3>
									<p class="mt-4 text-base text-muted-foreground leading-relaxed"><?php echo esc_html($featured_project['copy']); ?></p>
									<?php if (!empty($featured_project['tags'])) : ?>
										<div class="mt-5 flex flex-wrap gap-2">
											<?php foreach ($featured_project['tags'] as $tag) : ?>
												<span
													class="text-[11px] font-medium text-foreground/70 px-2.5 py-1 rounded-full bg-secondary"><?php echo esc_html($tag); ?></span>
											<?php endforeach; ?>
										</div>
									<?php endif; ?>
									<span
										class="mt-7 inline-flex items-center gap-2 px-5 py-3 text-sm font-semibold text-primary-foreground bg-gradient-primary rounded-full shadow-glow group-hover:-translate-y-0.5 transition-transform self-start"><?php echo esc_html__('View Project', 'arqamweb'); ?><?php echo arqam_icon('arrow'); ?></span>
								</article>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</a>
		</div>

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
