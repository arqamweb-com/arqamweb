<?php
$testimonial_posts = get_posts([
	'post_type' => 'testimonial',
	'posts_per_page' => 3,
	'post_status' => 'publish',
	'orderby' => 'menu_order',
	'order' => 'ASC',
]);

$videoTestimonials = [];
foreach ($testimonial_posts as $t) {
	$videoTestimonials[] = [
		'id' => $t->ID,
		'video' => get_field('video_id', $t->ID),
		'is_short' => (bool)get_field('is_short', $t->ID),
		'category' => get_field('category', $t->ID),
		'snippet' => get_field('snippet', $t->ID),
		'client' => $t->post_title,
	];
}

if (empty($videoTestimonials)) {
	return;
}

?>


<section id="video-testimonials"
         class="aw-video-testimonials relative py-24 lg:py-32 overflow-hidden bg-[#05080f] text-white">
	<div class="pointer-events-none absolute inset-0" aria-hidden="true">
		<div class="aw-video-testimonials__orb aw-video-testimonials__orb--one"></div>
		<div class="aw-video-testimonials__orb aw-video-testimonials__orb--two"></div>
		<div class="aw-video-testimonials__orb aw-video-testimonials__orb--three"></div>
		<div class="aw-video-testimonials__grid"></div>
	</div>
	<div class="container relative">
		<div class="max-w-3xl mb-14 lg:mb-20">
			<div
				class="aw-video-testimonials__eyebrow inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-white/15 bg-white/5 backdrop-blur-md text-[11px] font-bold tracking-[0.22em] text-white/80 mb-6">
					<span class="relative flex h-1.5 w-1.5" aria-hidden="true">
						<span
							class="absolute inline-flex h-full w-full rounded-full bg-primary opacity-70 animate-ping"></span>
						<span class="relative inline-flex h-1.5 w-1.5 rounded-full bg-primary"></span>
					</span>
				<?php esc_html_e('VIDEO TESTIMONIALS', 'arqamweb'); ?>
			</div>
			<h2 class="text-4xl sm:text-5xl lg:text-[3.75rem] font-bold tracking-[-0.035em] leading-[1.05]">
				<?php esc_html_e('Trusted by Clients Across', 'arqamweb'); ?> <span
					class="bg-gradient-to-r from-white via-white to-[color:var(--brand-primary)] bg-clip-text text-transparent"><?php esc_html_e('Multiple Industries', 'arqamweb'); ?></span>
			</h2>
			<p class="mt-6 text-base lg:text-lg text-white/60 leading-relaxed max-w-2xl">
				<?php esc_html_e('Real feedback from business owners and brands that worked with Arqam Web on web design, SEO, branding, and digital growth.', 'arqamweb'); ?>
			</p>
		</div>

		<div class="grid lg:grid-cols-12 gap-5 lg:gap-6 lg:items-stretch">
			<?php
			$featured_video = $videoTestimonials[0];
			$stacked_videos = array_slice($videoTestimonials, 1);
			?>
			<div class="lg:col-span-5 aw-video-testimonials__item aw-video-testimonials__item--featured">
				<?php
				$video = $featured_video;
				$is_featured = true;
				?>

				<?php
				/**
				 * Video testimonial card used by the test front page.
				 *
				 * Expects $video and $is_featured from the parent template.
				 *
				 * @package Arqam-Web
				 */

				$youtube_id = $video['video'] ?? '';
				$snippet = $video['snippet'] ?? '';
				$category = $video['category'] ?? '';
				$client = $video['client'] ?? '';
				$is_short = !empty($video['is_short']);
				$thumb = 'https://i.ytimg.com/vi/' . rawurlencode($youtube_id) . '/maxresdefault.jpg';
				$fallback = 'https://i.ytimg.com/vi/' . rawurlencode($youtube_id) . '/hqdefault.jpg';
				?>

				<button
					type="button"
					class="aw-video-card group <?php echo $is_featured ? 'aw-video-card--featured aspect-[9/16]' : 'aw-video-card--stacked'; ?>"
					data-video-testimonial-open
					data-youtube-id="<?php echo esc_attr($youtube_id); ?>"
					data-video-short="<?php echo $is_short ? 'true' : 'false'; ?>"
					aria-label="<?php echo esc_attr(sprintf(__('Play testimonial: %s', 'arqamweb'), $snippet)); ?>"
				>
					<img
						src="<?php echo esc_url($thumb); ?>"
						alt=""
						loading="lazy"
						decoding="async"
						class="aw-video-card__image"
						onerror="this.onerror=null;this.src='<?php echo esc_url($fallback); ?>';"
					>

					<span class="aw-video-card__shade" aria-hidden="true"></span>
					<span class="aw-video-card__tint" aria-hidden="true"></span>
					<span class="aw-video-card__sweep" aria-hidden="true"></span>

					<span class="aw-video-card__meta">
		<span class="aw-video-card__verified">
			<?php echo arqam_icon('check'); ?>
			<?php esc_html_e('Verified Client', 'arqamweb'); ?>
		</span>
		<span class="aw-video-card__category"><?php echo esc_html($category); ?></span>
	</span>

					<span class="aw-video-card__play-wrap">
		<span class="aw-video-card__play <?php echo $is_featured ? 'aw-video-card__play--lg' : ''; ?>">
			<span class="aw-video-card__play-glow" aria-hidden="true"></span>
			<span class="aw-video-card__play-ping" aria-hidden="true"></span>
			<svg width="<?php echo $is_featured ? '28' : '20'; ?>" height="<?php echo $is_featured ? '28' : '20'; ?>"
			     viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
				<path d="M8 5v14l11-7z"></path>
			</svg>
		</span>
	</span>

					<span class="aw-video-card__copy">
		<span class="aw-video-card__client"><?php echo esc_html($client); ?></span>
		<span
			class="aw-video-card__quote <?php echo $is_featured ? 'aw-video-card__quote--featured' : ''; ?>">"<?php echo esc_html($snippet); ?>"</span>
	</span>

					<span class="aw-video-card__edge" aria-hidden="true"></span>
				</button>


			</div>
			<div class="lg:col-span-7 flex flex-col gap-5 lg:gap-6">
				<?php foreach ($stacked_videos as $stacked_index => $video) : ?>
					<div class="aw-video-testimonials__item aw-video-testimonials__item--stacked flex-1 min-h-0"
					     style="animation-delay: <?php echo esc_attr(0.9 + ($stacked_index * 0.2)); ?>s;">
						<?php
						$is_featured = false;
						?>


						<?php
						$youtube_id = $video['video'] ?? '';
						$snippet = $video['snippet'] ?? '';
						$category = $video['category'] ?? '';
						$client = $video['client'] ?? '';
						$is_short = !empty($video['is_short']);
						$thumb = 'https://i.ytimg.com/vi/' . rawurlencode($youtube_id) . '/maxresdefault.jpg';
						$fallback = 'https://i.ytimg.com/vi/' . rawurlencode($youtube_id) . '/hqdefault.jpg';
						?>

						<button
							type="button"
							class="aw-video-card group <?php echo $is_featured ? 'aw-video-card--featured aspect-[9/16]' : 'aw-video-card--stacked'; ?>"
							data-video-testimonial-open
							data-youtube-id="<?php echo esc_attr($youtube_id); ?>"
							data-video-short="<?php echo $is_short ? 'true' : 'false'; ?>"
							aria-label="<?php echo esc_attr(sprintf(__('Play testimonial: %s', 'arqamweb'), $snippet)); ?>">
							<img src="<?php echo esc_url($thumb); ?>"
							     alt=""
							     loading="lazy"
							     decoding="async"
							     class="aw-video-card__image"
							     onerror="this.onerror=null;this.src='<?php echo esc_url($fallback); ?>';">

							<span class="aw-video-card__shade" aria-hidden="true"></span>
							<span class="aw-video-card__tint" aria-hidden="true"></span>
							<span class="aw-video-card__sweep" aria-hidden="true"></span>

							<span class="aw-video-card__meta">
		<span class="aw-video-card__verified">
			<?php echo arqam_icon('check'); ?>
			<?php esc_html_e('Verified Client', 'arqamweb'); ?>
		</span>
		<span class="aw-video-card__category"><?php echo esc_html($category); ?></span>
	</span>

							<span class="aw-video-card__play-wrap">
		<span class="aw-video-card__play <?php echo $is_featured ? 'aw-video-card__play--lg' : ''; ?>">
			<span class="aw-video-card__play-glow" aria-hidden="true"></span>
			<span class="aw-video-card__play-ping" aria-hidden="true"></span>
			<svg width="<?php echo $is_featured ? '28' : '20'; ?>" height="<?php echo $is_featured ? '28' : '20'; ?>"
			     viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
				<path d="M8 5v14l11-7z"></path>
			</svg>
		</span>
	</span>

							<span class="aw-video-card__copy">
		<span class="aw-video-card__client"><?php echo esc_html($client); ?></span>
		<span
			class="aw-video-card__quote <?php echo $is_featured ? 'aw-video-card__quote--featured' : ''; ?>">"<?php echo esc_html($snippet); ?>"</span>
	</span>

							<span class="aw-video-card__edge" aria-hidden="true"></span>
						</button>


					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
<!--Model-->
<div class="aw-video-modal" data-video-testimonial-modal hidden>
	<div class="aw-video-modal__backdrop" data-video-testimonial-close></div>
	<button type="button" class="aw-video-modal__close" data-video-testimonial-close aria-label="<?php esc_attr_e('Close video', 'arqamweb'); ?>">
		<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
		     aria-hidden="true">
			<path d="M6 6l12 12M6 18L18 6"></path>
		</svg>
	</button>
	<div class="aw-video-modal__frame" data-video-testimonial-frame role="dialog" aria-modal="true"
	     aria-label="<?php esc_attr_e('Video testimonial', 'arqamweb'); ?>">
		<div class="aw-video-modal__glow"></div>
		<iframe data-video-testimonial-iframe title="<?php esc_attr_e('Video testimonial', 'arqamweb'); ?>"
		        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
		        allowfullscreen></iframe>
	</div>
</div>
