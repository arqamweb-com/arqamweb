<?php
/**
 * Video testimonial card used by the test front page.
 *
 * Expects $video and $is_featured from the parent template.
 *
 * @package Arqam-Web
 */

if (!defined('ABSPATH')) {
	exit;
}

$youtube_id = $video['video'] ?? '';
$snippet    = $video['snippet'] ?? '';
$category   = $video['category'] ?? '';
$client     = $video['client'] ?? '';
$is_short   = !empty($video['is_short']);
$thumb      = 'https://i.ytimg.com/vi/' . rawurlencode($youtube_id) . '/maxresdefault.jpg';
$fallback   = 'https://i.ytimg.com/vi/' . rawurlencode($youtube_id) . '/hqdefault.jpg';
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
			<svg width="<?php echo $is_featured ? '28' : '20'; ?>" height="<?php echo $is_featured ? '28' : '20'; ?>" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
				<path d="M8 5v14l11-7z"></path>
			</svg>
		</span>
	</span>

	<span class="aw-video-card__copy">
		<span class="aw-video-card__client"><?php echo esc_html($client); ?></span>
		<span class="aw-video-card__quote <?php echo $is_featured ? 'aw-video-card__quote--featured' : ''; ?>">"<?php echo esc_html($snippet); ?>"</span>
	</span>

	<span class="aw-video-card__edge" aria-hidden="true"></span>
</button>
