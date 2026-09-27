<?php
/**
 * Template part for displaying project showcase gallery
 *
 * @package Arqam-Web
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

$post_id = $post_id ?? get_the_ID();
$showcase_images = ArqamWeb_Project::get_showcase_images($post_id);

if (!$showcase_images) {
	return;
}
?>

<!-- Project Showcase -->
<style>
	/* Visual Showcase. The cards hold full-page screenshots (natural size is
	   roughly 500-1080 x 2560), so they have to be clipped to a fixed card
	   height, otherwise they overflow the pinned panel and paint on top of
	   the section below. */
	#showcase-panel { overflow: hidden; }

	/* Clear the fixed site header (and the admin bar, when it is showing) so
	   the eyebrow and the H2 are not cut off in the pinned state. */
	#showcase-inner { padding-top: calc(var(--aw-header-top, 0px) + 5rem); }

	#showcase-viewport { overflow: hidden; }

	#track { align-items: flex-start; }
	#track > div { height: 62vh; }
	#track > div > div { height: 100%; display: flex; flex-direction: column; }
	#track .demo-img { flex: 1 1 auto; min-height: 0; overflow: hidden; }
	#track .demo-img img {
		width: 100%;
		height: 100%;
		object-fit: cover;
		object-position: top center;
	}

	/* Below md the script un-pins the panel (position: relative, spacer height
	   auto, no transform), so the track has to be swipeable on its own. */
	@media (max-width: 767px) {
		#showcase-panel { position: relative; height: auto !important; }
		#showcase-inner { padding-top: 2.5rem; padding-bottom: 2.5rem; }
		#showcase-viewport { overflow-x: auto; -webkit-overflow-scrolling: touch; }
		#track > div { height: 55vh; width: 80vw !important; }
	}
</style>
<section id="showcase-section" style="position: relative;">
	<div id="scroll-spacer" style="pointer-events: none;"></div>
	<div id="showcase-panel" style="position: absolute; top: 0; left: 0; width: 100%; height: 100vh;">
		<div id="showcase-inner" style="height: 100%; display: flex; flex-direction: column; justify-content: center;">
			<div class="px-6 md:px-12 lg:px-24 mb-10">
				<p class="text-sm font-medium tracking-widest uppercase text-primary mb-4"><?php esc_html_e('Visual Showcase', 'arqamweb'); ?></p>
				<h2 class="text-3xl md:text-4xl font-bold max-w-xl"><?php esc_html_e('Crafted with precision, down to the pixel', 'arqamweb'); ?></h2>
			</div>
			<div id="showcase-viewport">
				<div id="track" class="flex gap-6 px-6 md:px-12 lg:px-24" style="will-change: transform;">

					<?php foreach ($showcase_images as $index => $image) : ?>
						<div class="flex-shrink-0" style="width: 42vw;">
							<div class="rounded-2xl overflow-hidden bg-white shadow-lg border border-gray-200">
								<div class="demo-img bg-gradient-to-br from-blue-500 to-purple-600">
									<img src="<?php echo esc_url($image['url']); ?>"
										alt="<?php echo esc_attr($image['alt']); ?>"
										<?php if (!empty($image['width']) && !empty($image['height'])) : ?>width="<?php echo esc_attr($image['width']); ?>" height="<?php echo esc_attr($image['height']); ?>"<?php endif; ?>
										decoding="async"
										<?php if ($index >= 2) : ?>loading="lazy"<?php endif; ?>
										class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-105">
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

			// The cards now have a fixed CSS height, so the track is already the
			// right size at first paint. Measure straight away instead of waiting
			// on the images, which is what left the spacer at 0px until scroll.
			init();

			function remeasure() {
				measure();
				onScroll();
			}

			// Still re-measure as each image resolves, in case a decoded image
			// changes the layout (a failed load, a differently sized swap).
			var imgs = track.querySelectorAll("img");
			for (var i = 0; i < imgs.length; i++) {
				if (imgs[i].complete) continue;
				imgs[i].addEventListener("load", remeasure, {
					once: true
				});
				imgs[i].addEventListener("error", remeasure, {
					once: true
				});
			}

			// Catch anything else that changes the track's size (font swap,
			// zoom, a card being added by an editor preview).
			if (typeof ResizeObserver !== "undefined") {
				new ResizeObserver(remeasure).observe(track);
			}

			window.addEventListener("load", remeasure);

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
