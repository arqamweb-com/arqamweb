<?php
/**
 * Service page: the next three services after this one.
 *
 * @package Arqam-Web
 */

$post_id = $args['post_id'];
$all_services = get_posts([
	'post_type' => 'service',
	'posts_per_page' => -1,
	'order' => 'ASC',
	'fields' => 'ids',
	'suppress_filters' => false,
]);
$current = array_search($post_id, $all_services, true);
$others = array_values(array_diff($all_services, [$post_id]));
if (! $others) {
	return;
}
// نبدأ من الخدمة اللي بعد الحالية ونلف، زي ترتيب Lovable.
$start = $current === false ? 0 : $current % count($others);
$related = [];
for ($i = 0; $i < min(3, count($others)); $i++) {
	$related[] = $others[($start + $i) % count($others)];
}
?>
<section id="related" class="bg-[#f4f7fb] py-24 lg:py-32">
	<div class="detail-reveal reveal container">
		<div class="detail-stagger">
			<?php get_template_part('template-parts/service/service', 'eyebrow', ['text' => __('Other services', 'arqamweb')]); ?>
			<h2 class="mt-4 text-4xl font-semibold leading-[1.06] tracking-[-0.03em] lg:text-5xl"><?php esc_html_e('Work that fits together.', 'arqamweb'); ?></h2>
		</div>
		<div class="mt-10 grid gap-4 md:grid-cols-3">
			<?php foreach ($related as $i => $related_id) :
				$object = arqamweb_get_image_field('service_icon', $related_id);
			?>
				<a href="<?php echo esc_url(get_permalink($related_id)); ?>" class="detail-stagger detail-card group relative h-[220px] overflow-hidden rounded-[22px] bg-[linear-gradient(160deg,#ffffff_0%,#eef3f9_100%)] p-6 transition-all hover:-translate-y-1 hover:border-primary/30" style="--stagger:<?php echo esc_attr($i * 80); ?>ms">
					<div aria-hidden="true" class="pointer-events-none absolute -bottom-12 -right-8 h-40 w-40 rounded-full bg-primary/20 blur-3xl transition-colors group-hover:bg-primary/30"></div>
					<div class="relative z-10 max-w-[62%]">
						<h3 class="text-xl font-semibold"><?php echo esc_html(arqamweb_sp_text('sp_eyebrow', $related_id) ?: get_the_title($related_id)); ?></h3>
						<p class="mt-2 text-sm text-muted-foreground"><?php echo esc_html(arqamweb_sp_text('sp_summary', $related_id) ?: wp_trim_words(get_the_excerpt($related_id), 12)); ?></p>
						<span class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-primary"><?php esc_html_e('Learn more', 'arqamweb'); ?> <?php echo arqamweb_sp_icon('arrow-right', 'h-4 w-4 transition-transform group-hover:translate-x-1 rtl:group-hover:-translate-x-1'); ?></span>
					</div>
					<?php if ($object) :
						$object_attrs = ['class' => 'pointer-events-none absolute -bottom-[26px] -right-5 w-[170px] object-contain drop-shadow-[0_20px_25px_rgba(15,23,42,.18)] transition-transform group-hover:scale-105', 'alt' => '', 'loading' => 'lazy', 'sizes' => '170px'];
						echo $object['id'] ? wp_get_attachment_image($object['id'], 'medium', false, $object_attrs) : '<img src="' . esc_url($object['url']) . '" alt="" loading="lazy" class="' . esc_attr($object_attrs['class']) . '">';
					endif; ?>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
