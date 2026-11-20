<?php
if (! defined('ABSPATH')) {
	exit;
}

// أماكن الكروت في شبكة الـ bento بالترتيب (نفس توزيعة Lovable)، الكارت رقم 1 ياخد a والتاني b وهكذا.
$serviceSlots = [
	['area' => 'lg:[grid-area:a]', 'size' => 'large', 'copy' => 'mt-auto max-w-[19rem]', 'object' => '-left-16 -top-20 h-[68%] w-[125%] md:-left-10 md:-top-16 lg:h-[64%] lg:w-[130%]'],
	['area' => 'lg:[grid-area:b]', 'size' => 'large', 'copy' => 'max-w-[56%] sm:max-w-[52%]', 'object' => '-bottom-24 -right-8 h-[145%] w-[58%] md:-bottom-28 md:right-2 lg:-bottom-24 lg:right-3 lg:h-[150%] lg:w-[52%]'],
	['area' => 'lg:[grid-area:c]', 'size' => 'small', 'copy' => 'max-w-[67%] lg:max-w-[62%]', 'object' => '-bottom-16 -right-12 h-[78%] w-[65%] md:-bottom-10 md:-right-10 lg:-bottom-12 lg:-right-8 lg:h-[72%]'],
	['area' => 'lg:[grid-area:d]', 'size' => 'small', 'copy' => 'max-w-[62%]', 'object' => '-bottom-16 -right-12 h-[76%] w-[66%] md:-bottom-12 md:-right-10 lg:-bottom-14 lg:-right-9 lg:h-[75%]'],
	['area' => 'lg:[grid-area:e]', 'size' => 'large', 'copy' => 'mt-auto max-w-[56%] sm:max-w-[52%]', 'object' => '-bottom-24 right-0 h-[145%] w-[57%] md:-bottom-28 md:right-3 lg:-bottom-24 lg:right-3 lg:h-[150%] lg:w-[52%]'],
	['area' => 'lg:[grid-area:f]', 'size' => 'small', 'copy' => 'max-w-[62%]', 'object' => '-bottom-24 -right-14 h-[110%] w-[63%] md:-bottom-20 md:-right-12 lg:-bottom-20 lg:-right-9 lg:h-[108%]'],
];

// شكل الشبكة على الديسكتوب حسب عدد الخدمات المنشورة، عشان متفضلش خانات فاضية.
$gridLayouts = [
	1 => ["'a a a'"],
	2 => ["'a b b'"],
	3 => ["'a b b'", "'a c c'"],
	4 => ["'a b b'", "'a c d'"],
	5 => ["'a b b'", "'a c d'", "'e e e'"],
	6 => ["'a b b'", "'a c d'", "'e e f'"],
];

$the_query = new WP_Query(array(
	'post_type'      => 'service',
	'posts_per_page' => min(isset($args['postCount']) ? (int) $args['postCount'] : 6, count($serviceSlots)),
	'order'          => 'ASC',
));

if (! $the_query->have_posts()) {
	return;
}

$gridRows = $gridLayouts[$the_query->post_count];
?>

<!-- Services -->
<div class="services-v3-grid mx-auto grid max-w-6xl gap-4 md:grid-cols-2 lg:grid-cols-3" style="--services-areas:<?php echo esc_attr(implode(' ', $gridRows)); ?>;--services-rows:<?php echo count($gridRows); ?>">
	<?php
	$index = 0;
	while ($the_query->have_posts()) :
		$the_query->the_post();
		$slot = $serviceSlots[$index];
		$isLarge = $slot['size'] === 'large';
		$service_icon = arqamweb_get_image_field('service_icon', get_the_ID());
	?>
		<a href="<?php echo esc_url(get_permalink()); ?>" data-services-card class="services-v3-card group/card relative flex overflow-hidden rounded-2xl border border-white/[0.08] bg-[linear-gradient(160deg,#15305a_0%,#0b1a33_100%)] p-6 shadow-[0_24px_50px_-28px_rgba(11,26,51,.55)] transition-[transform,border-color,opacity,box-shadow] duration-500 hover:z-10 hover:-translate-y-1 hover:border-primary/40 hover:shadow-[0_30px_70px_-30px_rgba(49,152,212,.55)] min-h-[220px] md:min-h-[240px] lg:min-h-0 <?php echo esc_attr($slot['area']); ?>" style="animation-delay:<?php echo esc_attr($index * 80); ?>ms;--float-delay:<?php echo esc_attr(-0.8 * $index); ?>s">
			<div aria-hidden="true" class="pointer-events-none absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-white/15 to-transparent"></div>
			<div aria-hidden="true" class="services-v3-spotlight pointer-events-none absolute inset-0 opacity-0 transition-opacity duration-500 group-hover/card:opacity-100"></div>
			<?php if ($service_icon) : ?>
				<div aria-hidden="true" class="services-v3-object pointer-events-none absolute <?php echo esc_attr($slot['object']); ?>">
					<div class="absolute inset-[12%] rounded-full bg-primary/25 blur-[42px] transition-[opacity,transform,background-color] duration-500 group-hover/card:scale-110 group-hover/card:bg-primary/40"></div>
					<?php
					/* translators: %s: service name, e.g. "Hosting & Care". */
					$service_icon_alt = sprintf(__('%s service icon', 'arqamweb'), get_the_title());
					$service_image_attrs = array('class' => 'relative h-full w-full object-contain drop-shadow-[0_24px_35px_rgba(0,0,0,0.45)]', 'alt' => $service_icon_alt, 'loading' => 'lazy', 'decoding' => 'async', 'sizes' => '(min-width: 1024px) 480px, 70vw');
					if ($service_icon['id']) {
						echo wp_get_attachment_image($service_icon['id'], 'medium_large', false, $service_image_attrs);
					} else {
						echo '<img src="' . esc_url($service_icon['url']) . '" alt="' . esc_attr($service_icon_alt) . '" loading="lazy" decoding="async" width="1024" height="1024" class="' . esc_attr($service_image_attrs['class']) . '">';
					}
					?>
				</div>
			<?php endif; ?>
			<div class="relative z-10 flex flex-col <?php echo esc_attr($slot['copy']); ?>">
				<h3 class="<?php echo $isLarge ? 'text-xl lg:text-2xl' : 'text-[17px]'; ?> font-semibold leading-tight text-white"><?php echo esc_html(get_the_title()); ?></h3>
				<p class="mt-2 text-[13px] leading-relaxed text-white/65"><?php echo esc_html(arqamweb_sp_text('sp_summary', get_the_ID()) ?: get_the_excerpt()); ?></p>
				<span class="mt-3 inline-flex items-center gap-1 text-[13px] font-medium text-[#7cc4ef] transition-colors group-hover/card:text-white"><?php esc_html_e('Learn more', 'arqamweb'); ?> <span class="transition-transform duration-300 <?php echo is_rtl() ? 'group-hover/card:-translate-x-1' : 'group-hover/card:translate-x-1'; ?>" aria-hidden="true"><?php echo is_rtl() ? '←' : '→'; ?></span></span>
			</div>
		</a>
	<?php
		$index++;
	endwhile;
	wp_reset_postdata();
	?>
</div>
<!-- Services -->
