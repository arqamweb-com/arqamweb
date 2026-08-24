<?php

/**
 * ArqamWeb_Project — ACF data access layer for project post type.
 * All methods return raw unescaped values. Templates escape at render time.
 *
 * @package Arqam-Web
 */

if (! defined('ABSPATH')) exit;

class ArqamWeb_Project
{

	/**
	 * Get hero title, falling back to post title.
	 */
	public static function get_hero_title(int $post_id): string
	{
		$title = arqamweb_get_text_field('hero_title', $post_id);
		return $title !== '' ? $title : get_the_title($post_id);
	}

	/**
	 * Get project category label.
	 */
	public static function get_category(int $post_id): string
	{
		return arqamweb_get_text_field('project_category', $post_id);
	}

	/**
	 * Get project tags as WP_Term array.
	 *
	 * @return WP_Term[]
	 */
	public static function get_tags(int $post_id): array
	{
		$tags = get_the_terms($post_id, 'project_tag');
		return ($tags && ! is_wp_error($tags)) ? $tags : [];
	}

	/**
	 * Get action button data or null if no button text set.
	 *
	 * @return array{text:string,url:string}|null
	 */
	public static function get_action_button(int $post_id): ?array
	{
		$text = arqamweb_get_text_field('action_button_text', $post_id);
		if ($text === '') return null;
		$url = arqamweb_get_url_field('website_link', $post_id, '#');
		return ['text' => $text, 'url' => $url];
	}

	/**
	 * Get portfolio image as normalized array or null.
	 *
	 * @return array{url:string,alt:string,width:int,height:int}|null
	 */
	public static function get_portfolio_image(int $post_id): ?array
	{
		$img = arqamweb_get_image_field('portfolio_image', $post_id);
		if ($img === null) return null;

		return [
			'url'    => $img['url'],
			'alt'    => $img['alt'] !== '' ? $img['alt'] : sprintf(__('%s project preview', 'arqamweb'), get_the_title($post_id)),
			'width'  => $img['width']  ?: 1200,
			'height' => $img['height'] ?: 675,
		];
	}

	/**
	 * Get project stat value and label.
	 *
	 * @return array{value:string,label:string}
	 */
	public static function get_stat(int $post_id): array
	{
		return [
			'value' => arqamweb_get_text_field('project_stat_value', $post_id),
			'label' => arqamweb_get_text_field('project_stat_label', $post_id),
		];
	}

	/**
	 * Get project stats from value_1/label_1 through value_4/label_4.
	 * Optional prefix_1 through prefix_4 fields can override a prefix embedded in value.
	 * Optional suffix_1 through suffix_4 fields can override a suffix embedded in value.
	 * Incomplete pairs are excluded so empty dashboard fields do not render.
	 *
	 * @return array<int,array{value:string,label:string,prefix:string,suffix:string,index:int}>
	 */
	public static function get_stats(int $post_id): array
	{
		$stats = [];

		for ($i = 1; $i <= 4; $i++) {
			$value = arqamweb_get_text_field('value_' . $i, $post_id);
			$label = arqamweb_get_text_field('label_' . $i, $post_id);
			$prefix = arqamweb_get_text_field('prefix_' . $i, $post_id);
			$suffix = arqamweb_get_text_field('suffix_' . $i, $post_id);

			if ($value === '' || $label === '') {
				continue;
			}

			$stats[] = [
				'value' => $value,
				'label' => $label,
				'prefix' => $prefix,
				'suffix' => $suffix,
				'index' => $i,
			];
		}

		return $stats;
	}

	/**
	 * Get showcase images (image_1 through image_4).
	 * Each element: ['url'=>string,'alt'=>string,'width'=>int,'height'=>int]
	 * Null results excluded.
	 *
	 * @return array[]
	 */
	public static function get_showcase_images(int $post_id): array
	{
		$images = [];
		for ($i = 1; $i <= 8; $i++) {
			$img = arqamweb_get_image_field("image_$i", $post_id);
			if ($img !== null) {
				$images[] = $img;
			}
		}
		return $images;
	}

	/**
	 * Extract YouTube video ID from video_url field.
	 * Returns null if field is empty or URL is not a valid YouTube URL.
	 */
	// public static function get_video_id(int $post_id): ?string
	// {
	// 	$url = arqamweb_get_url_field('video_url', $post_id, '');
	// 	if (empty($url) || $url === '#') return null;
	// 	preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $url, $matches);
	// 	return isset($matches[1]) ? $matches[1] : null;
	// }
	public static function get_video_id(int $post_id): ?string
	{
		$url = arqamweb_get_url_field('video_url', $post_id, '');

		if (empty($url) || $url === '#') {
			return null;
		}

		// دعم كل أنواع روابط يوتيوب
		preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([^&\n?#]+)/', $url, $matches);

		return !empty($matches[1]) ? $matches[1] : null;
	}





	/**
	 * Get transform cards (up to 3). Each card has icon, tag, title, desc.
	 * Cards with empty title are excluded.
	 *
	 * @return array[]
	 */
	public static function get_transform_cards(int $post_id): array
	{
		$cards = [];
		for ($i = 1; $i <= 3; $i++) {
			$title = arqamweb_get_text_field('transform_title_' . $i, $post_id);
			if ($title === '') continue;
			$cards[] = [
				'icon'  => arqamweb_get_image_field('transform_icon_'  . $i, $post_id)['url'] ?? '',
				'tag'   => arqamweb_get_text_field('transform_tag_'   . $i, $post_id),
				'title' => $title,
				'desc'  => arqamweb_get_text_field('transform_description_'  . $i, $post_id),
			];
		}
		return $cards;
	}

	/**
	 * Get project phases from relation field.
	 *
	 * @return array
	 */
	public static function get_project_phases(int $post_id): array
	{
		return arqamweb_get_relation_field('project_phases', $post_id);
	}

	/**
	 * Get features relation field posts.
	 *
	 * @return array
	 */
	public static function get_features(int $post_id): array
	{
		return arqamweb_get_relation_field('arqamweb_features', $post_id);
	}

	/**
	 * Get result features relation field posts.
	 *
	 * @return array
	 */
	public static function get_result_features(int $post_id): array
	{
		return arqamweb_get_relation_field('arqamweb_results_features', $post_id);
	}

	/**
	 * Get CTA title and description.
	 *
	 * @return array{title:string,description:string}
	 */
	public static function get_cta(int $post_id): array
	{
		return [
			'title'       => arqamweb_get_text_field('calltoaction_title',       $post_id),
			'description' => arqamweb_get_text_field('calltoaction_description', $post_id),
		];
	}

	/**
	 * Get is_featured meta value.
	 */
	public static function get_is_featured(int $post_id): bool
	{
		return (bool) get_post_meta($post_id, 'is_featured', true);
	}

	/**
	 * Get related projects WP_Query (excludes current post).
	 */
	public static function get_related_projects(int $post_id, int $limit = 3): WP_Query
	{
		return new WP_Query([
			'post_type'      => 'project',
			'posts_per_page' => $limit,
			'post__not_in'   => [$post_id],
			'no_found_rows'  => true,
		]);
	}

	/**
	 * Get featured projects WP_Query.
	 */
	public static function get_featured_projects(int $limit): WP_Query
	{
		return new WP_Query([
			'post_type'      => 'project',
			'posts_per_page' => $limit,
			'no_found_rows'  => true,
			'meta_query'     => [['key' => 'is_featured', 'value' => '1']],
		]);
	}

	/**
	 * Get all projects WP_Query with pagination.
	 */
	public static function get_all_projects(int $per_page, int $paged): WP_Query
	{
		return new WP_Query([
			'post_type'      => 'project',
			'posts_per_page' => $per_page,
			'paged'          => $paged,
			'no_found_rows'  => false,
		]);
	}
}
