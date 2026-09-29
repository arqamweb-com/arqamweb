<?php
/**
 * Single service template (Lovable service detail design).
 *
 * Content comes from the "Service Page" ACF group (inc/acf/service-page-fields.php);
 * each section renders only when its fields have data.
 *
 * @package Arqam-Web
 */

get_header();

the_post();
$post_id = get_the_ID();
$pricing_service = arqamweb_sp_text('sp_pricing_service', $post_id);

// الأقسام اللي عندها داتا بس هي اللي بتظهر، وبنفس الترتيب ده في القايمة الجانبية.
$sections = [
	'overview' => ['label' => __('Overview', 'arqamweb'), 'part' => 'hero', 'show' => true],
	'problem' => ['label' => __('Problem', 'arqamweb'), 'part' => 'problem', 'show' => (bool) arqamweb_sp_lines('sp_problem_points', $post_id)],
	'included' => ['label' => __('Included', 'arqamweb'), 'part' => 'included', 'show' => (bool) arqamweb_sp_lines('sp_included', $post_id)],
	'details' => ['label' => __('Details', 'arqamweb'), 'part' => 'content', 'show' => trim((string) get_post_field('post_content', $post_id)) !== ''],
	'compare' => ['label' => __('Compare', 'arqamweb'), 'part' => 'compare', 'show' => (bool) arqamweb_sp_lines('sp_compare_1_us', $post_id)],
	'process' => ['label' => __('Process', 'arqamweb'), 'part' => 'process', 'show' => (bool) arqamweb_sp_lines('sp_process', $post_id)],
	'work' => ['label' => __('Work', 'arqamweb'), 'part' => 'work', 'show' => (bool) arqamweb_sp_lines('sp_projects', $post_id)],
	'pricing' => ['label' => __('Pricing', 'arqamweb'), 'part' => 'pricing', 'show' => $pricing_service !== '' && function_exists('awp_service_has_packages') && awp_service_has_packages($pricing_service)],
	'reviews' => ['label' => __('Reviews', 'arqamweb'), 'part' => 'reviews', 'show' => (bool) arqamweb_sp_lines('sp_reviews', $post_id)],
	'faq' => ['label' => __('FAQ', 'arqamweb'), 'part' => 'faq', 'show' => (bool) arqamweb_sp_lines('sp_faq', $post_id)],
	'cta' => ['label' => __('Start', 'arqamweb'), 'part' => 'cta', 'show' => true],
	'related' => ['label' => __('More services', 'arqamweb'), 'part' => 'related', 'show' => true],
];
$sections = array_filter($sections, function ($section) {
	return $section['show'];
});
$part_args = [
	'post_id' => $post_id,
	'has_work' => isset($sections['work']),
	'pricing_service' => $pricing_service,
];
?>

<main class="service-detail overflow-x-clip bg-background text-foreground" data-service-detail>
	<aside class="group fixed left-2 top-1/2 z-30 hidden -translate-y-1/2 min-[1560px]:block" aria-label="<?php esc_attr_e('Page sections', 'arqamweb'); ?>">
		<nav class="flex flex-col items-start gap-3">
			<?php foreach ($sections as $id => $section) : ?>
				<a href="#<?php echo esc_attr($id); ?>" data-service-nav="<?php echo esc_attr($id); ?>" class="flex items-center gap-2 text-[10px] font-semibold uppercase text-muted-foreground">
					<span class="service-nav-line h-px w-[10px] bg-slate-300 transition-all"></span>
					<span class="pointer-events-none max-w-0 overflow-hidden whitespace-nowrap opacity-0 transition-all group-hover:max-w-24 group-hover:opacity-100"><?php echo esc_html($section['label']); ?></span>
				</a>
			<?php endforeach; ?>
		</nav>
	</aside>

	<?php
	foreach ($sections as $section) {
		get_template_part('template-parts/service/service', $section['part'], $part_args);
	}
	?>
</main>

<?php
get_footer();
