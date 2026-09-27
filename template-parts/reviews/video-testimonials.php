<?php
if (!defined('ABSPATH')) {
	exit;
}

$_video_testimonial_posts = get_posts([
	'post_type' => 'testimonial',
	'posts_per_page' => 3,
	'post_status' => 'publish',
	'orderby' => 'menu_order',
	'order' => 'ASC',
]);
$_videoTestimonials = [];
foreach ($_video_testimonial_posts as $_vt) {
	$_videoTestimonials[] = [
		'id' => $_vt->ID,
		'video' => get_field('video_id', $_vt->ID),
		'is_short' => (bool)get_field('is_short', $_vt->ID),
		'category' => get_field('category', $_vt->ID),
		'snippet' => get_field('snippet', $_vt->ID),
		'client' => $_vt->post_title,
	];
}

if (empty($_videoTestimonials)) {
	return;
}
?>
<section class="aw-video-testimonials relative py-28 lg:py-36 overflow-hidden bg-[#05080f] text-white">
	<div class="pointer-events-none absolute inset-0" aria-hidden="true">
		<div class="aw-video-testimonials__orb aw-video-testimonials__orb--one"></div>
		<div class="aw-video-testimonials__orb aw-video-testimonials__orb--two"></div>
		<div class="aw-video-testimonials__orb aw-video-testimonials__orb--three"></div>
		<div class="aw-video-testimonials__grid"></div>
	</div>
	<div class="container relative">
		<div class="max-w-3xl mb-14">
			<div class="text-xs font-semibold tracking-[0.22em] uppercase text-primary mb-4"><?php esc_html_e('Video Testimonials', 'arqamweb'); ?>
			</div>
			<h2 class="text-4xl lg:text-[3.5rem] font-semibold tracking-[-0.035em] leading-[1.05]"><?php esc_html_e('See clients tell the story', 'arqamweb'); ?> <span
					class="bg-gradient-to-r from-white via-white to-[color:var(--brand-primary)] bg-clip-text text-transparent"><?php esc_html_e('in their own words.', 'arqamweb'); ?></span>
			</h2>
			<p class="mt-5 text-white/60 text-lg max-w-2xl"><?php esc_html_e('Hover any card to preview silently. Click to watch the full conversation.', 'arqamweb'); ?></p>
		</div>
		<div class="grid lg:grid-cols-12 gap-6 lg:items-stretch">
			<?php
			$_vt_featured = $_videoTestimonials[0];
			$_vt_stacked = array_slice($_videoTestimonials, 1);
			?>
			<div class="lg:col-span-5 aw-video-testimonials__item aw-video-testimonials__item--featured">
				<?php
				$video = $_vt_featured;
				$is_featured = true;
				$youtube_id = $video['video'] ?? '';
				$snippet = $video['snippet'] ?? '';
				$category = $video['category'] ?? '';
				$client = $video['client'] ?? '';
				$is_short = !empty($video['is_short']);
				$thumb = 'https://i.ytimg.com/vi/' . rawurlencode($youtube_id) . '/maxresdefault.jpg';
				$fallback = 'https://i.ytimg.com/vi/' . rawurlencode($youtube_id) . '/hqdefault.jpg';
				?>
				<button type="button"
				        class="aw-video-card group aw-video-card--featured aspect-[9/16]"
				        data-video-testimonial-open
				        data-youtube-id="<?php echo esc_attr($youtube_id); ?>"
				        data-video-short="<?php echo $is_short ? 'true' : 'false'; ?>"
				        aria-label="<?php echo esc_attr(sprintf(__('Play testimonial: %s', 'arqamweb'), $snippet)); ?>">
					<img src="<?php echo esc_url($thumb); ?>" alt="" loading="lazy" decoding="async"
					     class="aw-video-card__image"
					     onerror="this.onerror=null;this.src='<?php echo esc_url($fallback); ?>';">
					<span class="aw-video-card__shade" aria-hidden="true"></span>
					<span class="aw-video-card__tint" aria-hidden="true"></span>
					<span class="aw-video-card__sweep" aria-hidden="true"></span>
					<span class="aw-video-card__meta">
					<span
						class="aw-video-card__verified"><?php echo arqam_icon('check'); ?> <?php esc_html_e('Verified Client', 'arqamweb'); ?></span>
					<span class="aw-video-card__category"><?php echo esc_html($category); ?></span>
				</span>
					<span class="aw-video-card__play-wrap">
					<span class="aw-video-card__play aw-video-card__play--lg">
						<span class="aw-video-card__play-glow" aria-hidden="true"></span>
						<span class="aw-video-card__play-ping" aria-hidden="true"></span>
						<svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path
								d="M8 5v14l11-7z"></path></svg>
					</span>
				</span>
					<span class="aw-video-card__copy">
					<span class="aw-video-card__client"><?php echo esc_html($client); ?></span>
					<span
						class="aw-video-card__quote aw-video-card__quote--featured">"<?php echo esc_html($snippet); ?>"</span>
				</span>
					<span class="aw-video-card__edge" aria-hidden="true"></span>
				</button>
			</div>
			<div class="lg:col-span-7 flex flex-col gap-6">
				<?php foreach ($_vt_stacked as $_stacked_index => $video) : ?>
					<div class="aw-video-testimonials__item aw-video-testimonials__item--stacked flex-1 min-h-0"
					     style="animation-delay: <?php echo esc_attr(0.9 + ($_stacked_index * 0.2)); ?>s;">
						<?php
						$youtube_id = $video['video'] ?? '';
						$snippet = $video['snippet'] ?? '';
						$category = $video['category'] ?? '';
						$client = $video['client'] ?? '';
						$is_short = !empty($video['is_short']);
						$thumb = 'https://i.ytimg.com/vi/' . rawurlencode($youtube_id) . '/maxresdefault.jpg';
						$fallback = 'https://i.ytimg.com/vi/' . rawurlencode($youtube_id) . '/hqdefault.jpg';
						?>
						<button type="button"
						        class="aw-video-card group aw-video-card--stacked"
						        data-video-testimonial-open
						        data-youtube-id="<?php echo esc_attr($youtube_id); ?>"
						        data-video-short="<?php echo $is_short ? 'true' : 'false'; ?>"
						        aria-label="<?php echo esc_attr(sprintf(__('Play testimonial: %s', 'arqamweb'), $snippet)); ?>">
							<img src="<?php echo esc_url($thumb); ?>" alt="" loading="lazy" decoding="async"
							     class="aw-video-card__image"
							     onerror="this.onerror=null;this.src='<?php echo esc_url($fallback); ?>';">
							<span class="aw-video-card__shade" aria-hidden="true"></span>
							<span class="aw-video-card__tint" aria-hidden="true"></span>
							<span class="aw-video-card__sweep" aria-hidden="true"></span>
							<span class="aw-video-card__meta">
							<span class="aw-video-card__verified"><?php echo arqam_icon('check'); ?> <?php esc_html_e('Verified Client', 'arqamweb'); ?></span>
							<span class="aw-video-card__category"><?php echo esc_html($category); ?></span>
						</span>
							<span class="aw-video-card__play-wrap">
							<span class="aw-video-card__play">
								<span class="aw-video-card__play-glow" aria-hidden="true"></span>
								<span class="aw-video-card__play-ping" aria-hidden="true"></span>
								<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"
								     aria-hidden="true"><path d="M8 5v14l11-7z"></path></svg>
							</span>
						</span>
							<span class="aw-video-card__copy">
							<span class="aw-video-card__client"><?php echo esc_html($client); ?></span>
							<span class="aw-video-card__quote">"<?php echo esc_html($snippet); ?>"</span>
						</span>
							<span class="aw-video-card__edge" aria-hidden="true"></span>
						</button>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
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
