<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Arqam-Web
 */

get_header();

$post_id = get_the_ID();
$project_excerpt = trim(get_the_excerpt($post_id));
$project_thumb_id = get_post_thumbnail_id($post_id);
$portfolio_img = ArqamWeb_Project::get_portfolio_image($post_id);
$project_stats = ArqamWeb_Project::get_stats($post_id);
$has_project_media = $portfolio_img || $project_thumb_id;
$has_project_stats = !empty($project_stats);
$showcase_images = ArqamWeb_Project::get_showcase_images($post_id);
$project_cta = ArqamWeb_Project::get_cta($post_id);
if ($project_cta['title'] === '') {
	$project_cta['title'] = __('Ready to Build a Website That Actually Makes You Money?', 'arqamweb');
}
if ($project_cta['description'] === '') {
	$project_cta['description'] = __('We build high-performance websites engineered for growth, revenue, and measurable business results.', 'arqamweb');
}
$has_project_cta = $project_cta['title'] !== '' || $project_cta['description'] !== '';

?>

<main class="bg-background overflow-x-hidden">

	<!-- ── Project Hero ───────────────────────────────────────────────────── -->
	<section class="relative pt-32 pb-16 lg:pt-44 lg:pb-24 overflow-hidden bg-hero">
		<div class="absolute inset-0 grid-bg opacity-60" aria-hidden="true"></div>
		<div class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
			<div class="absolute inset-0 opacity-[0.08]"
			     style="background: radial-gradient(80% 60% at 20% 40%, rgb(57, 158, 208) 0%, transparent 70%), radial-gradient(60% 50% at 80% 30%, rgb(54, 109, 176) 0%, transparent 70%);"></div>
			<div class="absolute rounded-full"
			     style="width: 280px; height: 280px; left: 5%; top: 10%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.18), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 14s ease-in-out 0s infinite normal none running glass-float-1;"></div>
			<div class="absolute rounded-full"
			     style="width: 200px; height: 200px; left: 70%; top: 55%; background: radial-gradient(circle at 30% 30%, rgba(54, 109, 176, 0.2), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 16s ease-in-out -4s infinite normal none running glass-float-2;"></div>
			<div class="absolute rounded-full"
			     style="width: 140px; height: 140px; left: 55%; top: 5%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.15), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 12s ease-in-out -8s infinite normal none running glass-float-3;"></div>
			<div class="absolute rounded-full"
			     style="width: 240px; height: 240px; left: 20%; top: 65%; background: radial-gradient(circle at 30% 30%, rgba(54, 109, 176, 0.16), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 15s ease-in-out -2s infinite normal none running glass-float-4;"></div>
			<div class="absolute rounded-full"
			     style="width: 110px; height: 110px; left: 82%; top: 25%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.19), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 11s ease-in-out -6s infinite normal none running glass-float-1;"></div>
		</div>

		<div class="reveal container-x max-w-5xl mx-auto relative in">

			<div class="arqamweb-breadcrumb">
				<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
			</div>

			<?php
			$proj_category = ArqamWeb_Project::get_category( get_the_ID() );
			$proj_tags     = ArqamWeb_Project::get_tags( get_the_ID() );
			$proj_btn      = ArqamWeb_Project::get_action_button( get_the_ID() );
			?>

			<!-- Category badge -->
			<?php if ( $proj_category ) : ?>
			<div class="flex items-center gap-3 mb-6">
				<span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-[11px] font-semibold bg-primary/10 text-primary border border-primary/20">
					<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
					<?php echo esc_html( $proj_category ); ?>
				</span>
			</div>
			<?php endif; ?>

			<!-- Title -->
			<h1 class="text-4xl md:text-6xl lg:text-7xl font-semibold tracking-tight leading-[1.05] max-w-5xl mb-6">
				<?php echo ArqamWeb_Project::get_hero_title( get_the_ID() ); ?>
			</h1>

			<!-- Excerpt -->
			<?php if ( $project_excerpt !== '' ) : ?>
				<p class="text-lg md:text-xl text-muted-foreground max-w-2xl leading-relaxed mb-8">
					<?php echo esc_html( $project_excerpt ); ?>
				</p>
			<?php endif; ?>

			<!-- Tags -->
			<?php if ( $proj_tags ) : ?>
			<div class="flex flex-wrap gap-2 mb-8">
				<?php foreach ( $proj_tags as $tag ) : ?>
					<span class="px-4 py-1.5 text-xs font-medium tracking-wide uppercase rounded-full border border-border text-muted-foreground">
						<?php echo esc_html( $tag->name ); ?>
					</span>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>

			<!-- Action button -->
			<?php if ( $proj_btn ) : ?>
			<a href="<?php echo esc_url( $proj_btn['url'] ); ?>" target="_blank" rel="noopener noreferrer"
			   class="inline-flex items-center gap-2 px-8 py-4 rounded-full bg-gradient-primary text-primary-foreground font-semibold text-sm shadow-glow hover:scale-[1.02] active:scale-[0.97] transition-all duration-200">
				<span><?php echo esc_html( $proj_btn['text'] ); ?></span>
				<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
					<path d="M7 7h10v10M7 17 17 7"/>
				</svg>
			</a>
			<?php endif; ?>

		</div>
	</section>
	<!-- Project Stats -->
	<?php if ($has_project_media || $has_project_stats) : ?>
	<section class="section-padding py-20 border-y border-border/60 surface-elevated">
		<div class="container">
			<?php if ($has_project_media) : ?>
				<div class="-mt-[10%] mb-12 animate-float" style="animation-delay: 0.3s;">
					<div class="relative rounded-2xl overflow-hidden shadow-2xl shadow-foreground/5">
						<?php if ($portfolio_img) : ?>
							<img src="<?php echo esc_url($portfolio_img['url']); ?>"
								alt="<?php echo esc_attr($portfolio_img['alt']); ?>"
								width="<?php echo esc_attr($portfolio_img['width']); ?>"
								height="<?php echo esc_attr($portfolio_img['height']); ?>"
								loading="eager"
								fetchpriority="high"
								decoding="async"
								class="w-full object-cover">
						<?php else : ?>
							<?php the_post_thumbnail('full', [
								'class' => 'w-full object-cover',
								'alt' => esc_attr(get_the_title() . ' — portfolio image'),
								'loading' => 'eager',
								'fetchpriority' => 'high',
								'decoding' => 'async',
							]); ?>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
			<?php if ($has_project_stats) : ?>
				<div class="text-center mb-16 transition-all duration-700 translate-y-6">
					<h2 class="text-3xl md:text-5xl font-display font-bold"><?php esc_html_e('The numbers speak for themselves', 'arqamweb'); ?></h2>
				</div>
				<div class="grid grid-cols-2 md:grid-cols-4 gap-12 transition-all duration-700 translate-y-6">
					<?php foreach ($project_stats as $stat) : ?>
						<?php
						$stat_prefix = $stat['prefix'];
						$stat_number = $stat['value'];
						$stat_suffix = $stat['suffix'];
						$stat_is_numeric = preg_match('/^([^0-9.-]*)([0-9]+(?:\.[0-9]+)?)(.*)$/', $stat['value'], $stat_parts);
						if ($stat_is_numeric) {
							$stat_prefix = $stat_prefix !== '' ? $stat_prefix : $stat_parts[1];
							$stat_number = $stat_parts[2];
							$stat_suffix = $stat_suffix !== '' ? $stat_suffix : $stat_parts[3];
						}

						if ($stat_prefix !== '' && preg_match('/^(?:%|٪|s|sec|secs|ms)$/i', $stat_prefix)) {
							$stat_suffix = $stat_suffix !== '' ? $stat_suffix : $stat_prefix;
							$stat_prefix = '';
						}
						?>
						<div class="text-center space-y-1.5">
							<?php if ($stat_is_numeric) : ?>
								<div class="stat text-5xl md:text-6xl font-display font-bold tracking-tight tabular-nums text-foreground" data-value="<?php echo esc_attr($stat_number); ?>">
									<?php if ($stat_prefix !== '') : ?><span class="prefix text-primary"><?php echo esc_html($stat_prefix); ?></span><?php endif; ?><span class="number">0</span><?php if ($stat_suffix !== '') : ?><span class="suffix text-primary"><?php echo esc_html($stat_suffix); ?></span><?php endif; ?>
								</div>
							<?php else : ?>
								<div class="text-5xl md:text-6xl font-display font-bold tracking-tight tabular-nums text-foreground">
									<?php echo esc_html($stat['value']); ?>
								</div>
							<?php endif; ?>
							<p class="text-sm text-muted-foreground font-medium"><?php echo esc_html($stat['label']); ?></p>
						</div>
					<?php endforeach; ?>
				</div>
				<script>
					document.addEventListener("DOMContentLoaded", () => {
						const stats = document.querySelectorAll(".stat");

						const animate = (el) => {
							const value = parseFloat(el.dataset.value);
							const number = el.querySelector(".number");

							if (!number || Number.isNaN(value)) return;

							let current = 0;
							const duration = 1800;
							const steps = 50;
							const increment = value / steps;
							const hasDecimal = String(value).includes(".");
							let step = 0;

							const interval = setInterval(() => {
								step++;
								current = Math.min(increment * step, value);
								number.textContent = hasDecimal ? current.toFixed(1) : Math.round(current);

								if (step >= steps) clearInterval(interval);
							}, duration / steps);
						};

						const observer = new IntersectionObserver(entries => {
							entries.forEach(entry => {
								if (entry.isIntersecting) {
									animate(entry.target);
									observer.unobserve(entry.target);
								}
							});
						}, {
							threshold: 0.3
						});

						stats.forEach(stat => observer.observe(stat));
					});
				</script>
			<?php endif; ?>
		</div>

	</section>
	<?php endif; ?>
	<!-- Project Showcase -->
	<?php if ($showcase_images): ?>
		<section id="showcase-section" style="position: relative;">
			<div id="scroll-spacer" style="pointer-events: none;"></div>
			<div id="showcase-panel" style="position: absolute; top: 0; left: 0; width: 100%; height: 100vh;">
				<div style="height: 100%; display: flex; flex-direction: column; justify-content: center;">
					<div class="px-6 md:px-12 lg:px-24 mb-10">
						<p class="text-sm font-medium tracking-widest uppercase text-primary mb-4"><?php esc_html_e('Visual Showcase', 'arqamweb'); ?></p>
						<h2 class="text-3xl md:text-4xl font-bold max-w-xl"><?php esc_html_e('Crafted with precision, down to the pixel', 'arqamweb'); ?></h2>
					</div>
					<div style="overflow: hidden;">
						<div id="track" class="flex gap-6 px-6 md:px-12 lg:px-24" style="will-change: transform;">

							<?php foreach ($showcase_images as $image) : ?>
								<div class="flex-shrink-0" style="width: 42vw;">
									<div class="rounded-2xl overflow-hidden bg-white shadow-lg border border-gray-200">
										<div class="demo-img bg-gradient-to-br from-blue-500 to-purple-600">
											<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="w-full h-auto object-cover transition-transform duration-500 ease-out group-hover:scale-105" loading="lazy">
										</div>
										<?php if (!empty($image['alt'])) : ?>
											<div class="p-4">
												<p class="text-sm text-gray-500"><?php echo esc_html($image['alt']); ?></p>
											</div>
										<?php endif; ?>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>

			<script>
				(function() {
					const section = document.getElementById("showcase-section");
					const spacer = document.getElementById("scroll-spacer");
					const panel = document.getElementById("showcase-panel");
					const track = document.getElementById("track");

					if (!section || !spacer || !panel || !track) return;

					let overflowPX = 0;
					let current = 0;
					let target = 0;
					let rafId = null;

					// ────────────────────────────────────────
					// MEASURE: calculate how much horizontal overflow exists
					// and set the spacer height to create that much vertical scroll room
					// ────────────────────────────────────────
					function measure() {
						if (window.innerWidth < 768) {
							spacer.style.height = "auto";
							panel.style.position = "relative";
							panel.style.top = "";
							panel.style.bottom = "";
							track.style.transform = "none";
							section.style.height = "";
							return;
						}

						const trackW = track.scrollWidth;
						const vpW = window.innerWidth;
						const vpH = window.innerHeight;

						overflowPX = Math.max(trackW - vpW + 48, 0);

						// Spacer height = one full screen + the horizontal overflow
						// This is what makes the page scrollable through this section
						spacer.style.height = (vpH + overflowPX) + "px";
					}

					// ────────────────────────────────────────
					// PIN: manually manage fixed positioning
					// ────────────────────────────────────────
					function pin() {
						if (window.innerWidth < 768) return;

						const sTop = section.getBoundingClientRect().top;
						const sBottom = section.getBoundingClientRect().bottom;
						const vpH = window.innerHeight;

						if (sTop > 0) {
							// BEFORE: section hasn't reached viewport top yet
							// Panel sits at the top of the section, flows naturally
							panel.style.position = "absolute";
							panel.style.top = "0";
							panel.style.bottom = "";
						} else if (sBottom <= vpH) {
							// AFTER: section bottom has reached or passed viewport bottom
							// Panel anchors to section bottom so it scrolls away with the section
							panel.style.position = "absolute";
							panel.style.top = "";
							panel.style.bottom = "0";
						} else {
							// DURING: section top is above viewport, bottom is below
							// Panel is FIXED to viewport — this is the "pinned" state
							panel.style.position = "fixed";
							panel.style.top = "0";
							panel.style.bottom = "";
						}

						// Always keep these consistent
						panel.style.left = "0";
						panel.style.width = "100%";
					}

					// ────────────────────────────────────────
					// TRACK: calculate horizontal translation based on scroll progress
					// ────────────────────────────────────────
					function updateTarget() {
						if (window.innerWidth < 768 || overflowPX <= 0) return;

						const sTop = section.getBoundingClientRect().top;
						const scrollRange = spacer.offsetHeight - window.innerHeight;

						if (scrollRange <= 0) return;

						const scrolled = Math.max(0, -sTop);
						let progress = scrolled / scrollRange;
						progress = Math.max(0, Math.min(1, progress));

						target = -(overflowPX * progress);
					}

					// ────────────────────────────────────────
					// ANIMATE: smooth lerp
					// ────────────────────────────────────────
					function animate() {
						const diff = target - current;

						if (Math.abs(diff) < 0.5) {
							current = target;
							track.style.transform = "translate3d(" + current + "px,0,0)";
							rafId = null;
							return;
						}

						current += diff * 0.1;
						track.style.transform = "translate3d(" + current + "px,0,0)";
						rafId = requestAnimationFrame(animate);
					}

					function kick() {
						if (!rafId) rafId = requestAnimationFrame(animate);
					}

					// ────────────────────────────────────────
					// SCROLL HANDLER
					// ────────────────────────────────────────
					function onScroll() {
						pin();
						updateTarget();
						kick();
					}

					// ────────────────────────────────────────
					// INIT
					// ────────────────────────────────────────
					function init() {
						measure();
						onScroll();
					}

					// Wait for images (if any) before measuring
					var imgs = track.querySelectorAll("img");
					var total = imgs.length;
					var loaded = 0;

					function onImgReady() {
						loaded++;
						if (loaded >= total) init();
					}

					if (total === 0) {
						init();
					} else {
						for (var i = 0; i < total; i++) {
							if (imgs[i].complete) onImgReady();
							else imgs[i].addEventListener("load", onImgReady, {
								once: true
							});
						}
					}

					window.addEventListener("scroll", onScroll, {
						passive: true
					});
					window.addEventListener("resize", function() {
						measure();
						onScroll();
					});
				})();
			</script>
		</section>
	<?php endif; ?>

	<!-- Project Video -->
	<?php $video_id = ArqamWeb_Project::get_video_id(get_the_ID()); ?>

	<?php if ($video_id) : ?>
		<section class="relative py-28 md:py-36 overflow-hidden" style="background: rgb(12, 19, 29);">
			<div class="absolute inset-0 pointer-events-none overflow-hidden">
				<div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[700px] rounded-full opacity-[0.06]" style="background: radial-gradient(circle, hsl(var(--primary)), transparent 70%);"></div>
			</div>
			<div class="relative z-10 container">
				<div class="text-center mb-12 transition-all duration-700 opacity-100 translate-y-0">
					<p class="text-sm font-medium tracking-widest uppercase mb-4" style="color: rgb(94, 178, 237);"><?php esc_html_e('See It In Action', 'arqamweb'); ?></p>
					<h2 class="text-3xl md:text-5xl font-display font-bold mb-4 text-white" style="line-height: 1.1;"><?php esc_html_e('Watch the full project walkthrough', 'arqamweb'); ?></h2>
					<p class="max-w-lg mx-auto" style="color: rgb(148, 163, 184);"><?php esc_html_e('A detailed look at the design decisions, interactions, and results that brought this project to life.', 'arqamweb'); ?></p>
				</div>
				<div class="transition-all duration-700 delay-150 opacity-100 translate-y-0 scale-100 max-w-3xl mx-auto">
					<div class="relative rounded-2xl overflow-hidden shadow-2xl shadow-foreground/[0.08] border border-border/40 bg-foreground/5">


						<div class="aspect-video w-full relative" id="video-wrapper" data-video-id="<?php echo esc_attr($video_id); ?>">
							<button class="group absolute inset-0 w-full h-full cursor-pointer" aria-label="<?php esc_attr_e('Play video', 'arqamweb'); ?>">
								<img src="https://img.youtube.com/vi/<?php echo esc_attr($video_id); ?>/maxresdefault.jpg"
									alt="<?php echo esc_attr(get_the_title() . ' — project walkthrough video'); ?>"
									width="1280"
									height="720"
									loading="lazy"
									decoding="async"
									class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-[1.03]">
								<div class="absolute inset-0 bg-foreground/20 transition-colors duration-300 group-hover:bg-foreground/30"></div>
								<div class="absolute inset-0 flex items-center justify-center">
									<span class="flex items-center justify-center w-20 h-20 md:w-24 md:h-24 rounded-full bg-primary/90 text-primary-foreground shadow-xl backdrop-blur-sm animate-pulse-slow transition-transform duration-300 group-hover:scale-110 group-active:scale-95">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-play w-8 h-8 md:w-10 md:h-10 ml-1">
											<polygon points="6 3 20 12 6 21 6 3"></polygon>
										</svg>
									</span>
								</div>
							</button>
						</div>
					</div>
				</div>
			</div>


			<div id="video-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/80 backdrop-blur-sm">

				<!-- close button -->
				<button id="close-video" class="absolute top-6 right-6 text-white text-3xl z-50">
					✕
				</button>

				<!-- video container -->
				<div class="w-[90%] max-w-5xl aspect-video">
					<iframe
						id="video-iframe"
						class="w-full h-full rounded-xl"
						src=""
						frameborder="0"
						allow="autoplay; encrypted-media; picture-in-picture"
						allowfullscreen>
					</iframe>
				</div>
			</div>

			<script>
				document.addEventListener("DOMContentLoaded", () => {

					const wrapper = document.getElementById("video-wrapper");
					const videoId = wrapper.dataset.videoId;
					const button = wrapper.querySelector("button");

					const modal = document.getElementById("video-modal");
					const iframe = document.getElementById("video-iframe");
					const closeBtn = document.getElementById("close-video");

					// open modal
					button.addEventListener("click", () => {
						iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0`;
						modal.classList.remove("hidden");
						modal.classList.add("flex");

						document.body.style.overflow = "hidden"; // prevent scroll
					});

					// close modal
					const closeModal = () => {
						modal.classList.add("hidden");
						modal.classList.remove("flex");

						iframe.src = ""; // stop video
						document.body.style.overflow = "";
					};

					closeBtn.addEventListener("click", closeModal);

					// close on outside click
					modal.addEventListener("click", (e) => {
						if (e.target === modal) {
							closeModal();
						}
					});

					// ESC close
					document.addEventListener("keydown", (e) => {
						if (e.key === "Escape") {
							closeModal();
						}
					});

				});
			</script>
		</section>
	<?php endif; ?>
	<!-- Project Transformation -->
	<?php
	$transform_cards = ArqamWeb_Project::get_transform_cards(get_the_ID());
	if ($transform_cards) :
	?>
		<section class="section-padding py-32 surface-elevated">
			<div class="container">
				<p class="text-sm font-medium tracking-widest uppercase text-primary mb-4"><?php esc_html_e('Overview', 'arqamweb'); ?></p>
				<h2 class="text-3xl md:text-4xl font-display font-bold mb-16 max-w-2xl"><?php esc_html_e('How we transformed this business', 'arqamweb'); ?></h2>
				<div class="grid md:grid-cols-3 gap-8 lg:gap-12">

					<?php

					foreach ($transform_cards as $card) :
						$icon_url = $card['icon'];
						$icon_alt = sprintf( __( '%s icon', 'arqamweb' ), $card['title'] );
						$tag = $card['tag'];
						$title = $card['title'];
						$description = $card['desc'];
					?>

						<div class="space-y-5 p-8 rounded-2xl surface-elevated border border-border/40 transition-all duration-500 hover-lift translate-y-6" style="transition-delay: 100ms;">
							<?php if ($icon_url): ?>
								<div class="w-11 h-11 rounded-xl bg-primary/10 text-primary flex items-center justify-center">
									<img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($icon_alt); ?>">
								</div>
							<?php endif; ?>

							<div>
								<?php if ($tag): ?>
									<span class="text-[11px] font-bold tracking-widest uppercase text-primary">
										<?php echo esc_html($tag); ?>
									</span>
								<?php endif; ?>

								<h3 class="text-xl font-display font-semibold mt-1">
									<?php echo esc_html($title); ?>
								</h3>
							</div>

							<?php if ($description): ?>
								<p class="text-muted-foreground leading-relaxed text-[15px]">
									<?php echo esc_html($description); ?>
								</p>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>
	<!-- Project Phases -->
	<?php
	$phases = ArqamWeb_Project::get_project_phases(get_the_ID());

	if ($phases) :
	?>
		<section id="phases" class="section-padding py-32">
			<div class="container">
				<div class="mb-16 transition-all duration-700 translate-y-6">
					<p class="text-sm font-medium tracking-widest uppercase text-primary mb-4"><?php esc_html_e('Project Story', 'arqamweb'); ?></p>
					<h2 class="text-3xl md:text-4xl font-display font-bold max-w-xl"><?php esc_html_e('From vision to launch — every step, intentional', 'arqamweb'); ?></h2>
				</div>
				<div class="space-y-4">


					<?php
					$phases = ArqamWeb_Project::get_project_phases(get_the_ID());

					if ($phases) :

						$index = 1;

						foreach ($phases as $project_phase) :

							$title = get_the_title($project_phase->ID);
							$excerpt = get_the_excerpt($project_phase->ID);
							$content = get_post_field('post_content', $project_phase->ID);
					?>

							<div class="timeline-item transition-all duration-700 translate-y-8"
								style="transition-delay: <?php echo $index * 100; ?>ms;">

								<button
									class="w-full text-left group"
									aria-expanded="false">

									<div class="flex items-start gap-5 p-6 md:p-8 rounded-2xl surface-elevated border border-border/40 hover-lift cursor-pointer">

										<!-- icon -->
										<div class="flex-shrink-0 w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center mt-0.5">

											<?php if (has_post_thumbnail($project_phase->ID)) : ?>

												<?php echo get_the_post_thumbnail(
													$project_phase->ID,
													'thumbnail',
													['class' => 'w-5 h-5 object-contain']
												); ?>

											<?php else : ?>

												<!-- fallback -->
												<span class="text-primary text-sm font-bold">
													<?php echo $index; ?>
												</span>

											<?php endif; ?>

										</div>

										<!-- content -->
										<div class="flex-1 min-w-0">

											<span class="text-[11px] font-bold uppercase text-primary">
												<?php echo esc_html( sprintf( __( 'Phase %s', 'arqamweb' ), str_pad($index, 2, '0', STR_PAD_LEFT) ) ); ?>
											</span>

											<h3 class="text-xl md:text-2xl font-display font-bold mb-2">
												<?php echo esc_html(arqamweb_get_text_field('phase_title', $project_phase->ID)); ?>
											</h3>

											<p class="text-muted-foreground text-[15px] leading-relaxed">
												<?php echo esc_html($excerpt); ?>
											</p>

										</div>

										<!-- arrow -->
										<div class="flex-shrink-0 mt-1">
											<div class="arrow-icon w-8 h-8 rounded-full border border-border flex items-center justify-center transition-transform duration-300">
												<svg width="12" height="12" viewBox="0 0 12 12" fill="none" class="text-muted-foreground">
													<path d="M2 4L6 8L10 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
												</svg>
											</div>
										</div>

									</div>
								</button>

								<!-- content -->
								<div class="timeline-content overflow-hidden transition-all duration-500 ease-out max-h-0">

									<div class="pl-[4.75rem] pr-8 pb-4 pt-3">
										<?php echo wp_kses_post($content); ?>
									</div>

								</div>

							</div>

					<?php
							$index++;
						endforeach;

					endif;
					?>
				</div>
			</div>


			<script>
				document.querySelectorAll('.timeline-item').forEach((item) => {
					const button = item.querySelector('button');
					const content = item.querySelector('.timeline-content');
					const icon = item.querySelector('.arrow-icon');

					button.addEventListener('click', () => {
						const isOpen = content.classList.contains('open');

						// اقفل الكل (optional لو عايز accordion حقيقي)
						document.querySelectorAll('.timeline-content').forEach(c => {
							c.classList.remove('open');
							c.style.maxHeight = null;
						});

						document.querySelectorAll('.arrow-icon').forEach(i => {
							i.classList.remove('rotate-180');
						});

						if (!isOpen) {
							content.classList.add('open');
							content.style.maxHeight = content.scrollHeight + "px";
							icon.classList.add('rotate-180');
						}
					});
				});
			</script>
		</section>
	<?php endif; ?>
	<!-- Project Features -->
	<?php
	$features = ArqamWeb_Project::get_features(get_the_ID());

	if ($features) : ?>
		<section class="section-padding py-32 surface-elevated">
			<div class="container">
				<div class="mb-16 transition-all duration-700 translate-y-6">
					<p class="text-sm font-medium tracking-widest uppercase text-primary mb-4"><?php esc_html_e('What We Built', 'arqamweb'); ?></p>
					<h2 class="text-3xl md:text-4xl font-display font-bold max-w-xl"><?php esc_html_e('Performance', 'arqamweb'); ?> &amp; <?php esc_html_e('Delivery', 'arqamweb'); ?></h2>
				</div>
				<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

					<?php foreach ($features as $feature) : ?>

						<div class="flex gap-4 p-6 rounded-2xl bg-background border border-border/40 hover-lift transition-all duration-500 translate-y-6" style="transition-delay: 200ms;">
							<div class="flex-shrink-0 w-10 h-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center mt-0.5">
								<?php if (has_post_thumbnail($feature->ID)) : ?>

									<?php echo get_the_post_thumbnail(
										$feature->ID,
										'thumbnail',
										['class' => 'lucide lucide-gauge w-5 h-5', 'width' => 24, 'height' => 24]
									); ?>

								<?php endif; ?>
							</div>
							<div class="space-y-1.5">
								<h3 class="font-display font-semibold text-[15px]"><?php echo esc_html($feature->post_title); ?></h3>
								<p class="text-muted-foreground text-sm leading-relaxed"><?php echo esc_html(get_the_excerpt($feature->ID)); ?></p>
							</div>
						</div>
					<?php
					endforeach;

					?>

				</div>
			</div>
		</section>
	<?php endif; ?>
	<!-- Project Results -->
	<?php
	$features_results = ArqamWeb_Project::get_result_features(get_the_ID());

	if ($features_results) : ?>
		<section class="section-padding py-32">
			<div class="container">
				<div class="mb-16 transition-all duration-700 translate-y-6">
					<p class="text-sm font-medium tracking-widest uppercase text-primary mb-4"><?php esc_html_e('Behind the Results', 'arqamweb'); ?></p>
					<h2 class="text-3xl md:text-4xl font-display font-bold max-w-xl"><?php esc_html_e('Why this project succeeded', 'arqamweb'); ?></h2>
				</div>
				<div class="grid md:grid-cols-2 gap-6">

					<?php
					foreach ($features_results as $feature_result) :
					?>
						<div class="flex gap-5 p-8 rounded-2xl surface-elevated border border-border/40 hover-lift transition-all duration-500 translate-y-6" style="transition-delay: 150ms;">
							<div class="flex-shrink-0 w-11 h-11 rounded-xl bg-primary/10 text-primary flex items-center justify-center mt-0.5">
								<?php if (has_post_thumbnail($feature_result->ID)) : ?>

									<?php echo get_the_post_thumbnail(
										$feature_result->ID,
										'thumbnail',
										['class' => 'lucide lucide-gauge w-5 h-5', 'width' => 24, 'height' => 24]
									); ?>

								<?php endif; ?>
							</div>
							<div class="space-y-2">
								<h3 class="text-lg font-display font-semibold"><?php echo esc_html($feature_result->post_title); ?></h3>
								<p class="text-foreground font-medium text-[15px]"><?php echo esc_html(get_the_excerpt($feature_result->ID)); ?></p>
								<p class="text-muted-foreground text-[15px] leading-relaxed"><?php echo wp_kses_post(get_post_field('post_content', $feature_result->ID)); ?></p>
							</div>
						</div>
					<?php
					endforeach;

					?>
				</div>
			</div>
		</section>
	<?php endif; ?>
	<!-- Project Takeaways -->
	<section class="section-padding pt-32 pb-16 surface-elevated">
		<div class="container text-center">
			<div class="space-y-8 transition-all duration-700 translate-y-6">
				<p class="text-sm font-medium tracking-widest uppercase text-primary"><?php esc_html_e('Sound Familiar?', 'arqamweb'); ?></p>
				<h2 class="text-3xl md:text-5xl font-display font-bold"><?php esc_html_e('What This Means For You', 'arqamweb'); ?></h2>
				<ul class="space-y-4 text-left max-w-md mx-auto pt-4">
					<li class="flex items-start gap-3 text-muted-foreground text-[16px] leading-relaxed transition-all duration-500 -translate-x-4" style="transition-delay: 200ms;">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check w-5 h-5 text-primary mt-0.5 flex-shrink-0">
							<circle cx="12" cy="12" r="10"></circle>
							<path d="m9 12 2 2 4-4"></path>
						</svg><?php esc_html_e('Struggling with low traffic and zero visibility?', 'arqamweb'); ?>
					</li>
					<li class="flex items-start gap-3 text-muted-foreground text-[16px] leading-relaxed transition-all duration-500 -translate-x-4" style="transition-delay: 280ms;">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check w-5 h-5 text-primary mt-0.5 flex-shrink-0">
							<circle cx="12" cy="12" r="10"></circle>
							<path d="m9 12 2 2 4-4"></path>
						</svg><?php esc_html_e('Poor conversion rates despite good products?', 'arqamweb'); ?>
					</li>
					<li class="flex items-start gap-3 text-muted-foreground text-[16px] leading-relaxed transition-all duration-500 -translate-x-4" style="transition-delay: 360ms;">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check w-5 h-5 text-primary mt-0.5 flex-shrink-0">
							<circle cx="12" cy="12" r="10"></circle>
							<path d="m9 12 2 2 4-4"></path>
						</svg><?php esc_html_e('Slow, outdated website hurting your credibility?', 'arqamweb'); ?>
					</li>
					<li class="flex items-start gap-3 text-muted-foreground text-[16px] leading-relaxed transition-all duration-500 -translate-x-4" style="transition-delay: 440ms;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check w-5 h-5 text-primary mt-0.5 flex-shrink-0">
							<circle cx="12" cy="12" r="10"></circle>
							<path d="m9 12 2 2 4-4"></path>
						</svg>
						<span><?php esc_html_e('Competitors outranking you on every search?', 'arqamweb'); ?></span>
					</li>
				</ul>
				<p class="text-lg md:text-xl font-display font-semibold text-foreground pt-4 transition-all duration-700 translate-y-4" style="transition-delay: 600ms;"><?php esc_html_e("Let's achieve similar results for your business.", 'arqamweb'); ?></p>
			</div>
		</div>
	</section>
	<!-- Project CTA -->
	<?php if ($has_project_cta) : ?>
	<section class="section-padding pt-8 pb-32 surface-elevated">
		<div class="relative container rounded-3xl bg-primary text-white p-12 md:p-20 text-center space-y-8 transition-all duration-700 translate-y-6 scale-[0.98]">
			<div class="absolute inset-0 overflow-hidden rounded-3xl" style="z-index: 0;">
				<div class="glass-orb rounded-full" style="width: 180px; height: 180px; left: 8%; top: 15%; background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.12), transparent 70%); border: 1px solid rgba(255, 255, 255, 0.1); animation: 12s ease-in-out 0s infinite normal none running glass-float-1;"></div>
				<div class="glass-orb rounded-full" style="width: 120px; height: 120px; left: 75%; top: 60%; background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.15), transparent 70%); border: 1px solid rgba(255, 255, 255, 0.1); animation: 14s ease-in-out -3s infinite normal none running glass-float-2;"></div>
				<div class="glass-orb rounded-full" style="width: 90px; height: 90px; left: 60%; top: 10%; background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.1), transparent 70%); border: 1px solid rgba(255, 255, 255, 0.1); animation: 10s ease-in-out -7s infinite normal none running glass-float-3;"></div>
				<div class="glass-orb rounded-full" style="width: 150px; height: 150px; left: 25%; top: 70%; background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.13), transparent 70%); border: 1px solid rgba(255, 255, 255, 0.1); animation: 13s ease-in-out -5s infinite normal none running glass-float-4;"></div>
				<div class="glass-orb rounded-full" style="width: 70px; height: 70px; left: 85%; top: 20%; background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.14), transparent 70%); border: 1px solid rgba(255, 255, 255, 0.1); animation: 11s ease-in-out -2s infinite normal none running glass-float-1;"></div>
			</div>
			<div class="relative" style="z-index: 1;">
				<?php if ($project_cta['title'] !== '') : ?>
					<h2 class="text-3xl md:text-5xl lg:text-6xl font-display font-bold leading-[1.05] tracking-tight" style="line-height: 1.05;"><?php echo esc_html($project_cta['title']); ?></h2>
				<?php endif; ?>
				<?php if ($project_cta['description'] !== '') : ?>
					<p class="text-white/80 text-lg max-w-xl mx-auto leading-relaxed mt-8"><?php echo esc_html($project_cta['description']); ?></p>
				<?php endif; ?>
				<div class="flex flex-wrap gap-4 justify-center pt-6">
					<a href="<?php echo arqamweb_get_page_permalink(ARQAM_QUOTE_PAGE_SLUG); ?>" class="inline-flex items-center gap-2 px-10 py-4 rounded-full bg-background text-foreground font-semibold text-sm tracking-wide hover:opacity-90 active:scale-[0.97] transition-all duration-200 shadow-lg">
						<span><?php esc_html_e('Start Your Project', 'arqamweb'); ?></span>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-up-right w-4 h-4">
							<path d="M7 7h10v10"></path>
							<path d="M7 17 17 7"></path>
						</svg>
					</a>
					<a href="<?php echo arqamweb_get_page_permalink(ARQAM_QUOTE_PAGE_SLUG); ?>" class="inline-flex items-center gap-2 px-10 py-4 rounded-full border border-primary-foreground/30 font-semibold text-sm tracking-wide text-white hover:bg-primary-foreground/10 active:scale-[0.97] transition-all duration-200"><?php esc_html_e('Get a Proposal', 'arqamweb'); ?></a>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>
	<!-- Related Projects -->
	<?php
	$related_query = ArqamWeb_Project::get_related_projects(get_the_ID());
	?>

	<?php if ( $related_query->have_posts() ) : ?>
	<section class="py-24 lg:py-32 border-t border-border/60">
		<div class="container-x max-w-7xl mx-auto">
			<div class="reveal mb-12 in">
				<div class="text-xs font-semibold tracking-[0.3em] uppercase text-primary mb-4">— <?php esc_html_e( 'More work', 'arqamweb' ); ?></div>
				<h2 class="text-3xl lg:text-4xl font-semibold tracking-tight">
					<?php esc_html_e( 'Related', 'arqamweb' ); ?> <span class="text-gradient"><?php esc_html_e( 'projects.', 'arqamweb' ); ?></span>
				</h2>
			</div>
			<div class="grid grid-cols-1 md:grid-cols-3 gap-5 lg:gap-7">
				<?php
				$ri = 0;
				while ( $related_query->have_posts() ) :
					$related_query->the_post();
					$rid       = get_the_ID();
					$rthumb_id = get_post_thumbnail_id( $rid );
					$rcat      = ArqamWeb_Project::get_category( $rid );
					?>
					<a href="<?php the_permalink(); ?>"
					   class="reveal group relative rounded-3xl border border-border bg-card overflow-hidden shadow-card hover:shadow-elevated transition-all duration-500 hover:-translate-y-1 in"
					   style="transition-delay: <?php echo esc_attr( $ri * 80 ); ?>ms">
						<div aria-hidden="true"
						     class="pointer-events-none absolute -inset-20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"
						     style="background: radial-gradient(40% 40% at 50% 0%, color-mix(in oklab, var(--primary) 35%, transparent), transparent 70%);"></div>
						<div class="relative aspect-[16/10] overflow-hidden">
							<?php if ( $rthumb_id ) : ?>
								<?php echo wp_get_attachment_image( $rthumb_id, 'arqam-card-related', false, [
									'class'    => 'w-full h-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.08]',
									'loading'  => 'lazy',
									'decoding' => 'async',
								] ); ?>
							<?php else : ?>
								<div class="w-full h-full bg-gradient-to-br from-primary/20 to-surface flex items-center justify-center">
									<span class="text-5xl font-bold text-primary/20"><?php echo esc_html( strtoupper( substr( get_the_title(), 0, 1 ) ) ); ?></span>
								</div>
							<?php endif; ?>
							<div class="absolute inset-0 bg-gradient-to-t from-background/80 via-background/0 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
							<?php if ( $rcat ) : ?>
							<div class="absolute top-4 left-4">
								<span class="inline-flex items-center px-3 py-1.5 rounded-full text-[11px] font-semibold bg-background/90 backdrop-blur text-foreground border border-border">
									<?php echo esc_html( $rcat ); ?>
								</span>
							</div>
							<?php endif; ?>
						</div>
						<div class="p-6 lg:p-7 flex items-center justify-between">
							<div>
								<h3 class="font-semibold text-lg leading-snug group-hover:text-primary transition-colors duration-300">
									<?php the_title(); ?>
								</h3>
								<?php if ( $rcat ) : ?>
								<p class="text-sm text-muted-foreground mt-1"><?php echo esc_html( $rcat ); ?></p>
								<?php endif; ?>
							</div>
							<span class="flex-shrink-0 text-muted-foreground group-hover:text-primary group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-all duration-200">
								<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
									<path d="M7 7h10v10M7 17 17 7"/>
								</svg>
							</span>
						</div>
					</a>
					<?php
					$ri++;
				endwhile;
				wp_reset_postdata();
				?>
			</div>
			<div class="mt-12 text-center">
				<a href="<?php echo esc_url( home_url( '/projects' ) ); ?>"
				   class="inline-flex items-center gap-2 px-8 py-4 rounded-full border border-border bg-card font-semibold hover:bg-surface transition-colors">
					<?php esc_html_e( 'View all projects', 'arqamweb' ); ?>
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
						<path d="M5 12h14M13 5l7 7-7 7"/>
					</svg>
				</a>
			</div>
		</div>
	</section>
	<?php endif; ?>
</main>


<?php
get_footer();
?>
