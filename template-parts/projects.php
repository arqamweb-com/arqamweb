<?php /* Template Name: Projects */ ?>
<?php
if (!defined('ABSPATH')) exit;

get_header();

/* ─── Data ─────────────────────────────────────────────────────────────── */
$project_categories = get_terms([
	'taxonomy' => 'project_category',
	'hide_empty' => true,
	'orderby' => 'name',
]);
$project_categories = ($project_categories && !is_wp_error($project_categories)) ? $project_categories : [];

$projects_query = new WP_Query([
	'post_type' => 'project',
	'posts_per_page' => -1,
	'post_status' => 'publish',
	'no_found_rows' => true,
	'orderby' => 'menu_order date',
	'order' => 'DESC',
]);

$card_gradients = [
	'from-[#1f4a7a] via-[#3474b4] to-[#3198d4]',
	'from-[#3198d4] via-[#3474b4] to-[#0f2e4f]',
	'from-[#0c1828] via-[#1f4a7a] to-[#3198d4]',
];
?>

<main>
	<section class="relative pt-28 lg:pt-36 pb-16 lg:pb-24 overflow-hidden">
		<div class="absolute inset-0 -z-10 bg-gradient-to-b from-secondary/40 via-background to-background"></div>
		<div class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
			<div class="absolute inset-0 opacity-[0.08]"
			     style="background: radial-gradient(80% 60% at 20% 40%, rgb(57, 158, 208) 0%, transparent 70%), radial-gradient(60% 50% at 80% 30%, rgb(54, 109, 176) 0%, transparent 70%);"></div>
			<div class="absolute rounded-full"
			     style="width: 280px; height: 280px; left: 5%; top: 10%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.18), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 14s ease-in-out 0s infinite normal none running glass-float-1; transform: translate(0px, 0px); will-change: transform; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);"></div>
			<div class="absolute rounded-full"
			     style="width: 200px; height: 200px; left: 70%; top: 55%; background: radial-gradient(circle at 30% 30%, rgba(54, 109, 176, 0.2), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 16s ease-in-out -4s infinite normal none running glass-float-2; transform: translate(0px, 0px); will-change: transform; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);"></div>
			<div class="absolute rounded-full"
			     style="width: 140px; height: 140px; left: 55%; top: 5%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.15), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 12s ease-in-out -8s infinite normal none running glass-float-3; transform: translate(0px, 0px); will-change: transform; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);"></div>
			<div class="absolute rounded-full"
			     style="width: 240px; height: 240px; left: 20%; top: 65%; background: radial-gradient(circle at 30% 30%, rgba(54, 109, 176, 0.16), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 15s ease-in-out -2s infinite normal none running glass-float-4; transform: translate(0px, 0px); will-change: transform; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);"></div>
			<div class="absolute rounded-full"
			     style="width: 110px; height: 110px; left: 82%; top: 25%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.19), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 11s ease-in-out -6s infinite normal none running glass-float-1; transform: translate(0px, 0px); will-change: transform; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);"></div>
		</div>
		<div class="absolute inset-0 -z-10 pointer-events-none opacity-[0.5]"
		     style="background-image: linear-gradient(to right, color-mix(in oklab, var(--border) 70%, transparent) 1px, transparent 1px), linear-gradient(to bottom, color-mix(in oklab, var(--border) 70%, transparent) 1px, transparent 1px); background-size: 100px 100px; mask-image: radial-gradient(at 50% 30%, black 30%, transparent 75%); transform: translate(1.11111px, -2.85057px); transition: transform 600ms cubic-bezier(0.22, 1, 0.36, 1);"></div>
		<div class="absolute inset-0 -z-10 pointer-events-none"><span
				class="absolute w-1 h-1 rounded-full bg-primary/60 animate-float-slow"
				style="top: 0%; left: 0%; opacity: 0.25; animation-delay: 0s; animation-duration: 7s;"></span><span
				class="absolute w-1 h-1 rounded-full bg-primary/60 animate-float-slow"
				style="top: 53%; left: 37%; opacity: 0.42; animation-delay: 0.7s; animation-duration: 8s;"></span><span
				class="absolute w-1 h-1 rounded-full bg-primary/60 animate-float-slow"
				style="top: 11%; left: 74%; opacity: 0.59; animation-delay: 1.4s; animation-duration: 9s;"></span><span
				class="absolute w-1 h-1 rounded-full bg-primary/60 animate-float-slow"
				style="top: 64%; left: 16%; opacity: 0.26; animation-delay: 2.1s; animation-duration: 10s;"></span><span
				class="absolute w-1 h-1 rounded-full bg-primary/60 animate-float-slow"
				style="top: 22%; left: 53%; opacity: 0.43; animation-delay: 2.8s; animation-duration: 11s;"></span><span
				class="absolute w-1 h-1 rounded-full bg-primary/60 animate-float-slow"
				style="top: 75%; left: 90%; opacity: 0.6; animation-delay: 3.5s; animation-duration: 7s;"></span><span
				class="absolute w-1 h-1 rounded-full bg-primary/60 animate-float-slow"
				style="top: 33%; left: 32%; opacity: 0.27; animation-delay: 0s; animation-duration: 8s;"></span><span
				class="absolute w-1 h-1 rounded-full bg-primary/60 animate-float-slow"
				style="top: 86%; left: 69%; opacity: 0.44; animation-delay: 0.7s; animation-duration: 9s;"></span><span
				class="absolute w-1 h-1 rounded-full bg-primary/60 animate-float-slow"
				style="top: 44%; left: 11%; opacity: 0.61; animation-delay: 1.4s; animation-duration: 10s;"></span><span
				class="absolute w-1 h-1 rounded-full bg-primary/60 animate-float-slow"
				style="top: 2%; left: 48%; opacity: 0.28; animation-delay: 2.1s; animation-duration: 11s;"></span><span
				class="absolute w-1 h-1 rounded-full bg-primary/60 animate-float-slow"
				style="top: 55%; left: 85%; opacity: 0.45; animation-delay: 2.8s; animation-duration: 7s;"></span><span
				class="absolute w-1 h-1 rounded-full bg-primary/60 animate-float-slow"
				style="top: 13%; left: 27%; opacity: 0.62; animation-delay: 3.5s; animation-duration: 8s;"></span><span
				class="absolute w-1 h-1 rounded-full bg-primary/60 animate-float-slow"
				style="top: 66%; left: 64%; opacity: 0.29; animation-delay: 0s; animation-duration: 9s;"></span><span
				class="absolute w-1 h-1 rounded-full bg-primary/60 animate-float-slow"
				style="top: 24%; left: 6%; opacity: 0.46; animation-delay: 0.7s; animation-duration: 10s;"></span></div>
		<div class="reveal container-x max-w-7xl mx-auto relative z-10 in">
			<div class="arqamweb-breadcrumb">
				<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
			</div>
			<div
				class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-border bg-background/70 backdrop-blur text-[11px] font-semibold tracking-[0.18em] uppercase text-muted-foreground mb-7">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
				     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
				     class="lucide lucide-sparkles w-3 h-3 text-primary" aria-hidden="true">
					<path
						d="M11.017 2.814a1 1 0 0 1 1.966 0l1.051 5.558a2 2 0 0 0 1.594 1.594l5.558 1.051a1 1 0 0 1 0 1.966l-5.558 1.051a2 2 0 0 0-1.594 1.594l-1.051 5.558a1 1 0 0 1-1.966 0l-1.051-5.558a2 2 0 0 0-1.594-1.594l-5.558-1.051a1 1 0 0 1 0-1.966l5.558-1.051a2 2 0 0 0 1.594-1.594z"></path>
					<path d="M20 2v4"></path>
					<path d="M22 4h-4"></path>
					<circle cx="4" cy="20" r="2"></circle>
				</svg>
				<?php esc_html_e('Selected work · 2023–2026', 'arqamweb'); ?>
			</div>
			<h1 class="text-5xl md:text-6xl lg:text-7xl xl:text-[6rem] font-semibold leading-[0.98] tracking-[-0.035em] max-w-6xl"
			    style="transform: translateY(1.42529px); transition: transform 700ms cubic-bezier(0.22, 1, 0.36, 1);">
				<?php esc_html_e('Selected digital', 'arqamweb'); ?> <span class="text-gradient"><?php esc_html_e('experiences', 'arqamweb'); ?></span> <?php esc_html_e('built for', 'arqamweb'); ?> <span class="text-gradient"><?php esc_html_e('growth.', 'arqamweb'); ?></span>
			</h1>
			<div class="mt-10 grid lg:grid-cols-12 gap-8 items-end">
				<p class="lg:col-span-6 text-lg md:text-xl text-muted-foreground max-w-2xl leading-relaxed"><?php esc_html_e('A small, considered collection. Websites, brands and platforms shipped with senior teams — measured in rankings, revenue and reputation.', 'arqamweb'); ?></p>
			</div>
		</div>
	</section>

	<!-- ── Filter bar ──────────────────────────────────────────────────────────── -->
	<div class="sticky top-[68px] z-20 py-4 backdrop-blur-xl bg-background/70 border-y border-border/60">
		<div class="container-x max-w-7xl mx-auto">
			<div class="flex items-center gap-2 overflow-x-auto no-scrollbar" id="projects-filter" role="tablist"
			     aria-label="<?php esc_attr_e('Filter projects by category', 'arqamweb'); ?>">
				<button
					data-filter="all"
					role="tab"
					aria-selected="true"
					class="relative shrink-0 px-5 py-2.5 rounded-full text-xs font-semibold tracking-[0.14em] uppercase transition-all duration-300 will-change-transform text-primary-foreground bg-gradient-primary shadow-glow">
					<?php esc_html_e('All', 'arqamweb'); ?>
				</button>
				<?php foreach ($project_categories as $cat) : ?>
					<button
						data-filter="<?php echo esc_attr($cat->slug); ?>"
						role="tab"
						aria-selected="false"
						class="relative shrink-0 px-5 py-2.5 rounded-full text-xs font-semibold tracking-[0.14em] uppercase transition-all duration-300 will-change-transform text-foreground/70 border border-border bg-background hover:text-foreground hover:border-primary/40">
						<?php echo esc_html($cat->name); ?>
					</button>
				<?php endforeach; ?>
			</div>
		</div>
	</div>

	<!-- ── Projects grid ───────────────────────────────────────────────────────── -->
	<section class="relative py-16 lg:py-24 bg-background">
		<div class="container-x max-w-7xl mx-auto">

			<?php if ($projects_query->have_posts()) : ?>

				<div
					class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-6 auto-rows-[minmax(400px,auto)]"
					id="projects-grid">
					<?php
					$card_i = 0;
					while ($projects_query->have_posts()) :
						$projects_query->the_post();
						$pid = get_the_ID();

						$title = get_the_title();
						$permalink = get_permalink();
						$year = get_the_date('Y');
						$category_text = ArqamWeb_Project::get_category($pid);
						$stat = ArqamWeb_Project::get_stat($pid);
						$is_featured = ArqamWeb_Project::get_is_featured($pid);

						$terms = get_the_terms($pid, 'project_category');
						$terms = ($terms && !is_wp_error($terms)) ? $terms : [];
						$term_slugs = implode(' ', array_map(fn($t) => $t->slug, $terms));

						$portfolio_img = ArqamWeb_Project::get_portfolio_image($pid);
						if (!$portfolio_img) {
							$thumb_id = get_post_thumbnail_id($pid);
							$thumb_src = $thumb_id ? wp_get_attachment_image_src($thumb_id, 'arqam-card') : false;
							if ($thumb_src) {
								$portfolio_img = [
									'url' => $thumb_src[0],
									'alt' => $title,
									'width' => (int)$thumb_src[1],
									'height' => (int)$thumb_src[2],
								];
							}
						}

						$grad = $card_gradients[$card_i % 3];
						$delay = ($card_i % 3) * 80;
						$card_i++;
						?>

						<div class="transition-all duration-700"
						     data-categories="<?php echo esc_attr($term_slugs); ?>"
						     style="transition-delay: <?php echo esc_attr($delay); ?>ms; opacity: 1; transform: translateY(0px);">

							<a href="<?php echo esc_url($permalink); ?>"
							   class="group relative block w-full h-full min-h-[400px] rounded-3xl overflow-hidden border border-border bg-background shadow-card hover:shadow-elevated will-change-transform"
							   style="transform: perspective(1400px) rotateX(0deg) rotateY(0deg); transition: transform 400ms cubic-bezier(0.22, 1, 0.36, 1);"
							   aria-label="<?php echo esc_attr(sprintf(__('View %s case study', 'arqamweb'), $title)); ?>">

								<!-- hover glow -->
								<div
									class="absolute -inset-6 -z-10 rounded-[2.5rem] bg-gradient-to-br from-primary/25 via-primary/5 to-transparent blur-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-700"
									aria-hidden="true"></div>

								<!-- background: image or gradient -->
								<div
									class="relative w-full h-full <?php echo $portfolio_img ? '' : 'bg-gradient-to-br ' . esc_attr($grad); ?>"
									<?php if ($portfolio_img) : ?>
										style="background: url('<?php echo esc_url($portfolio_img['url']); ?>') center/cover no-repeat;"
									<?php endif; ?>>

									<?php if ($portfolio_img) : ?>
										<!-- dark overlay for image-based cards -->
										<div class="absolute inset-0 bg-black/55" aria-hidden="true"></div>
									<?php endif; ?>

									<!-- content layer (always visible) -->
									<div
										class="absolute inset-0 transition-transform duration-[1200ms] group-hover:scale-[1.06]"
										aria-hidden="true">
										<div class="absolute inset-0 p-6 lg:p-8">
											<div class="flex items-center justify-between">
												<div class="flex items-center gap-1.5">
													<span class="w-2 h-2 rounded-full bg-white/50"></span>
													<span class="w-2 h-2 rounded-full bg-white/50"></span>
													<span class="w-2 h-2 rounded-full bg-white/50"></span>
												</div>
												<span
													class="text-[10px] font-mono tracking-[0.18em] uppercase text-white/50"><?php echo esc_html($year); ?></span>
											</div>
											<?php if ($category_text) : ?>
												<div
													class="mt-4 text-[10px] font-semibold tracking-[0.22em] uppercase text-white/60">
													<?php echo esc_html($category_text); ?>
												</div>
											<?php endif; ?>
											<div
												class="mt-3 text-3xl lg:text-4xl xl:text-5xl font-semibold tracking-[-0.025em] text-white leading-[0.98]">
												<?php echo esc_html($title); ?>
											</div>
											<!--										<div class="mt-6 hidden sm:grid grid-cols-3 gap-2">-->
											<!--											<div class="h-14 rounded-lg border border-white/15 bg-white/[0.06] backdrop-blur"></div>-->
											<!--											<div class="h-14 rounded-lg border border-white/15 bg-white/[0.06] backdrop-blur"></div>-->
											<!--											<div class="h-14 rounded-lg border border-white/15 bg-white/[0.06] backdrop-blur"></div>-->
											<!--										</div>-->
										</div>
										<!-- shimmer sweep -->
										<div
											class="absolute -top-1/2 -left-1/2 w-[200%] h-[200%] bg-gradient-to-br from-white/0 via-white/15 to-white/0 rotate-12 opacity-0 group-hover:opacity-100 group-hover:translate-x-1/4 group-hover:translate-y-1/4 transition-all duration-[1200ms]"
											aria-hidden="true"></div>
									</div>

									<?php if ($is_featured) : ?>
										<!-- featured badge -->
										<div
											class="absolute top-5 right-5 inline-flex items-center gap-1.5 px-2.5 py-1.5 rounded-full bg-white/15 backdrop-blur-xl border border-white/20 text-[10px] font-semibold tracking-[0.16em] uppercase text-white z-10">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
											     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
											     stroke-linecap="round" stroke-linejoin="round"
											     class="lucide lucide-award w-3 h-3" aria-hidden="true">
												<path
													d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"></path>
												<circle cx="12" cy="8" r="6"></circle>
											</svg>
											<?php esc_html_e('Featured', 'arqamweb'); ?>
										</div>
									<?php endif; ?>

									<!-- bottom gradient -->
									<div
										class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-black/70 via-black/30 to-transparent"
										aria-hidden="true"></div>

									<!-- stat badge -->
									<?php if ($stat['value'] !== '') : ?>
										<div
											class="absolute left-5 right-5 bottom-5 flex flex-wrap gap-1.5 transition-transform duration-500 group-hover:-translate-y-1 z-10">
											<div
												class="rounded-xl border border-white/15 bg-white/[0.1] backdrop-blur-xl px-2.5 py-1.5">
												<div
													class="text-sm lg:text-base font-semibold text-white leading-none"><?php echo esc_html($stat['value']); ?></div>
												<?php if ($stat['label'] !== '') : ?>
													<div
														class="mt-1 text-[9px] font-semibold tracking-[0.16em] uppercase text-white/70"><?php echo esc_html($stat['label']); ?></div>
												<?php endif; ?>
											</div>
										</div>
									<?php endif; ?>

									<!-- hover overlay -->
									<div
										class="absolute inset-0 p-6 lg:p-8 flex flex-col justify-end bg-gradient-to-t from-[#0c1828]/95 via-[#0c1828]/65 to-transparent transition-all duration-500 opacity-0 group-hover:opacity-100 z-10">
										<?php if ($terms) : ?>
											<div class="flex flex-wrap gap-1.5 mb-4">
												<?php foreach ($terms as $term) : ?>
													<span
														class="inline-flex items-center px-2.5 py-1 rounded-full text-[9px] font-semibold tracking-[0.16em] uppercase bg-white/10 border border-white/15 text-white/85">
											<?php echo esc_html($term->name); ?>
										</span>
												<?php endforeach; ?>
											</div>
										<?php endif; ?>

										<?php if ($category_text) : ?>
											<p class="mt-2 text-sm text-white/75 max-w-md"><?php echo esc_html($category_text); ?></p>
										<?php endif; ?>
										<div
											class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-white">
										<span
											class="inline-flex items-center justify-center w-9 h-9 rounded-full bg-white text-primary"
											aria-hidden="true">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
											     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
											     stroke-linecap="round" stroke-linejoin="round"
											     class="lucide lucide-arrow-up-right w-4 h-4"><path
													d="M7 7h10v10"></path><path d="M7 17 17 7"></path></svg>
										</span>
											<?php esc_html_e('View case study', 'arqamweb'); ?>
										</div>
									</div>

								</div>
							</a>
						</div>

					<?php endwhile;
					wp_reset_postdata(); ?>
				</div>

			<?php else : ?>

				<div class="text-center py-24">
					<div
						class="w-16 h-16 rounded-2xl bg-surface border border-border flex items-center justify-center mx-auto mb-6">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
						     stroke-width="1.5" class="text-muted-foreground" aria-hidden="true">
							<rect x="3" y="3" width="18" height="18" rx="2"/>
							<path d="M3 9h18M9 21V9"/>
						</svg>
					</div>
					<p class="text-lg text-muted-foreground"><?php esc_html_e('No projects found.', 'arqamweb'); ?></p>
				</div>

			<?php endif; ?>

		</div>
	</section>

	<!-- ── CTA ─────────────────────────────────────────────────────────────────── -->
	<section class="relative py-28 lg:py-36 bg-background overflow-hidden">
		<div class="reveal container-x max-w-6xl mx-auto in">
			<div
				class="relative overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-[#0c1828] via-[#0f2238] to-[#0c1828] text-white p-10 lg:p-20 shadow-elevated">
				<div
					class="absolute -top-40 -right-40 w-[36rem] h-[36rem] rounded-full bg-primary/40 blur-[120px] animate-float-slow"
					aria-hidden="true"></div>
				<div
					class="absolute -bottom-40 -left-40 w-[36rem] h-[36rem] rounded-full bg-primary/25 blur-[120px] animate-float-slow"
					style="animation-delay: 2s;" aria-hidden="true"></div>
				<div class="absolute inset-0 opacity-[0.06] pointer-events-none"
				     style="background-image: linear-gradient(to right, rgba(255, 255, 255, 0.6) 1px, transparent 1px), linear-gradient(rgba(255, 255, 255, 0.6) 1px, transparent 1px); background-size: 80px 80px;"
				     aria-hidden="true"></div>
				<div class="relative text-center">
					<div
						class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/10 border border-white/15 text-[11px] font-semibold tracking-[0.18em] uppercase text-white/80 mb-8">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						     class="lucide lucide-trending-up w-3 h-3" aria-hidden="true">
							<path d="M16 7h6v6"></path>
							<path d="m22 7-8.5 8.5-5-5L2 17"></path>
						</svg>
						<?php esc_html_e('Next chapter', 'arqamweb'); ?>
					</div>
					<h2 class="text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-semibold tracking-[-0.03em] leading-[1.02]">
						<?php esc_html_e("Let's build the next", 'arqamweb'); ?><br><span class="text-gradient"><?php esc_html_e('success story.', 'arqamweb'); ?></span></h2>
					<p class="mt-7 text-white/75 text-base lg:text-xl max-w-2xl mx-auto leading-relaxed"><?php esc_html_e('We take on a small number of new engagements each quarter. Tell us about yours.', 'arqamweb'); ?></p>
					<div class="mt-10 flex flex-wrap justify-center gap-4">
						<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_QUOTE_PAGE_SLUG)); ?>"
						   class="btn-primary">
							<?php esc_html_e('Start your project', 'arqamweb'); ?>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
							     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
							     stroke-linejoin="round" class="lucide lucide-arrow-right w-4 h-4" aria-hidden="true">
								<path d="M5 12h14"></path>
								<path d="m12 5 7 7-7 7"></path>
							</svg>
						</a>
						<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_SERVICES_PAGE_SLUG)); ?>"
						   class="inline-flex items-center gap-2 px-7 py-3.5 text-sm font-semibold text-white rounded-full border border-white/25 hover:bg-white/10 transition-all"><?php esc_html_e('Explore services', 'arqamweb'); ?>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
							     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
							     stroke-linejoin="round" class="lucide lucide-arrow-up-right w-4 h-4"
							     aria-hidden="true">
								<path d="M7 7h10v10"></path>
								<path d="M7 17 17 7"></path>
							</svg>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

</main>

<script>
	(function () {
		var filter = document.getElementById('projects-filter');
		var grid = document.getElementById('projects-grid');
		if (!filter || !grid) return;

		var btns = filter.querySelectorAll('[data-filter]');
		var cards = grid.querySelectorAll('[data-categories]');

		var activeClasses = ['text-primary-foreground', 'bg-gradient-primary', 'shadow-glow'];
		var inactiveClasses = ['text-foreground/70', 'border', 'border-border', 'bg-background'];

		function setActive(btn) {
			btns.forEach(function (b) {
				b.classList.remove.apply(b.classList, activeClasses);
				b.classList.add.apply(b.classList, inactiveClasses);
				b.setAttribute('aria-selected', 'false');
			});
			btn.classList.remove.apply(btn.classList, inactiveClasses);
			btn.classList.add.apply(btn.classList, activeClasses);
			btn.setAttribute('aria-selected', 'true');
		}

		btns.forEach(function (btn) {
			btn.addEventListener('click', function () {
				var slug = btn.getAttribute('data-filter');
				setActive(btn);
				cards.forEach(function (card) {
					var cats = (card.getAttribute('data-categories') || '').split(' ');
					var show = slug === 'all' || cats.indexOf(slug) !== -1;
					card.style.display = show ? '' : 'none';
				});
			});
		});
	}());
</script>

<?php get_footer(); ?>
