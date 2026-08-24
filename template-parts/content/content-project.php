<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php
// grep result: zero callers found for get_template_part('content/content-project') across all PHP files. Not called by any active template.

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Arqam-Web
 */

?>



<!-- Project 1 -->
<article id="post-<?php the_ID(); ?>" class=" p-6 rounded-xl bg-white shadow-lg">
	<div class="image">
		<a href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr(get_the_title()); ?>">
			<?php the_post_thumbnail('latest-project', array('class' => 'project-img w-full h-48 object-cover rounded-lg mb-4', 'loading' => 'lazy', 'alt' => esc_attr(get_the_title()))); ?>
		</a>
	</div>
	<h3 class="text-xl font-bold mb-2"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
	<div class="text-gray-600 dark:text-gray-300 mb-4"><?php the_excerpt() ?></div>
	<a href="<?php the_permalink(); ?>" class="block text-center px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 mb-4">
		<?php echo __('View Project', 'arqamweb'); ?> <i class="fas fa-arrow-right"></i>
	</a>
	<div class="categories flex flex-wrap gap-2">
		<?php
		$categories = get_the_terms(get_the_ID(), 'project_category');
		if ($categories && !is_wp_error($categories)) {
			$total_categories = count($categories);
			$counter = 0;

			foreach ($categories as $category) {

				$category_link = get_term_link($category); // Get category link

				echo "<a href='" . esc_url($category_link) . "' class='category px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm'>" . esc_html($category->name) . "</a>";
			}
		}
		?>
	</div>
</article>