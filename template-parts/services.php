<?php /* Template Name: Services */ ?>
<?php
if (! defined('ABSPATH')) exit;

get_header();

$services = get_posts([
	'post_type' => 'service',
	'posts_per_page' => -1,
	'post_status' => 'publish',
	'orderby' => 'menu_order date',
	'order' => 'ASC',
	'suppress_filters' => false,
]);

// كروت عريضة (عمودين) عشان صفوف الشبكة تتملى من غير فراغ: الأول، وأول كارت في آخر صف.
$count = count($services);
$wide_needed = (3 - $count % 3) % 3;
$wide = [];
if ($count === 1) {
	$wide = [0 => 'lg:col-span-3'];
} elseif ($wide_needed >= 1) {
	$wide[0] = 'lg:col-span-2';
	if ($wide_needed === 2) {
		$wide[$count - 2] = 'lg:col-span-2';
	}
}

$stats = [
	['+15', __('Years building websites', 'arqamweb')],
	['+30', __('Live projects', 'arqamweb')],
	['4.9★', __('From +80 reviews', 'arqamweb')],
	['+10', __('Countries served', 'arqamweb')],
];
$trust = [
	__('The people who scope it build it', 'arqamweb'),
	__('Published prices where we can', 'arqamweb'),
	__('Everything handed over in your name', 'arqamweb'),
];
$shots = get_template_directory_uri() . '/frontend/img/hero-shots/';
$bubbles = [
	['src' => $shots . 'masar.webp', 'label' => __('Masar Law', 'arqamweb')],
	['src' => $shots . 'kidana.webp', 'label' => __('Kidana Travel', 'arqamweb')],
	['src' => $shots . 'cid.webp', 'label' => __('CID Group', 'arqamweb')],
	['src' => $shots . 'sportreach.webp', 'label' => __('SportReach', 'arqamweb')],
	['src' => 'https://flagcdn.com/w80/sa.png', 'label' => __('Saudi Arabia', 'arqamweb'), 'flag' => true],
	['src' => 'https://flagcdn.com/w80/eg.png', 'label' => __('Egypt', 'arqamweb'), 'flag' => true],
];
$bubble_positions = ['lg:left-[5%] lg:top-[24%]', 'lg:right-[8%] lg:top-[69%]', 'lg:left-[13%] lg:top-[24%]', 'lg:right-[17%] lg:top-[69%]', 'lg:left-[21%] lg:top-[12%]', 'lg:right-[25%] lg:top-[77%]'];
?>

<main class="service-detail overflow-x-clip bg-[#f4f7fb] text-foreground">

	<!-- ── Hero ────────────────────────────────────────────────────────────── -->
	<section class="relative overflow-hidden pb-24 pt-28 lg:pb-32 lg:pt-36">
		<div aria-hidden="true" class="pointer-events-none absolute -left-40 -top-44 h-[650px] w-[650px] rounded-full bg-primary/10 blur-[140px]"></div>
		<div aria-hidden="true" class="pointer-events-none absolute inset-0 opacity-[.05] [background-size:60px_60px] [background-image:linear-gradient(to_right,rgba(15,23,42,.35)_1px,transparent_1px),linear-gradient(to_bottom,rgba(15,23,42,.35)_1px,transparent_1px)] [mask-image:radial-gradient(ellipse_at_center,black_30%,transparent_75%)]"></div>
		<div class="detail-reveal reveal container relative">
			<div class="detail-stagger arqamweb-breadcrumb">
				<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
			</div>
			<h1 class="detail-stagger max-w-5xl text-[2.8rem] font-semibold leading-[1.04] sm:text-6xl lg:text-[4.6rem]"><?php esc_html_e('Seven services.', 'arqamweb'); ?><br><span class="text-gradient"><?php esc_html_e('One team that builds, ranks and grows your business.', 'arqamweb'); ?></span></h1>
			<p class="detail-stagger mt-7 max-w-2xl text-lg leading-relaxed text-muted-foreground" style="--stagger:80ms"><?php esc_html_e('Websites, search, social, identity, video, apps and care, planned together and handed over in your name.', 'arqamweb'); ?></p>
			<div class="detail-stagger mt-9 flex flex-wrap gap-3" style="--stagger:160ms">
				<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_QUOTE_PAGE_SLUG)); ?>" class="inline-flex items-center gap-2 rounded-full bg-gradient-primary px-7 py-3.5 text-sm font-semibold text-primary-foreground shadow-glow"><?php esc_html_e('Get your quote', 'arqamweb'); ?> <?php echo arqamweb_sp_icon('arrow-right'); ?></a>
				<a href="#services-grid" class="rounded-full border border-border bg-background px-7 py-3.5 text-sm font-semibold"><?php esc_html_e('Explore services', 'arqamweb'); ?></a>
			</div>
			<div class="detail-stagger mt-16 grid grid-cols-2 gap-4 border-t border-border/70 pt-8 lg:grid-cols-4" style="--stagger:240ms">
				<?php foreach ($stats as [$value, $label]) : ?>
					<div>
						<strong class="text-3xl text-gradient lg:text-4xl"><?php echo esc_html($value); ?></strong>
						<p class="mt-2 text-[10px] font-semibold uppercase tracking-[.15em] text-muted-foreground"><?php echo esc_html($label); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- ── Services grid ───────────────────────────────────────────────────── -->
	<section id="services-grid" class="bg-background py-24 lg:py-32">
		<div class="detail-reveal reveal container">
			<div class="detail-stagger mb-14 max-w-2xl">
				<p class="text-[11px] font-semibold uppercase tracking-[.22em] text-primary"><?php esc_html_e('What we do', 'arqamweb'); ?></p>
				<h2 class="mt-4 text-4xl font-semibold lg:text-5xl"><?php esc_html_e('Everything your business needs to', 'arqamweb'); ?> <span class="text-gradient"><?php esc_html_e('grow online.', 'arqamweb'); ?></span></h2>
			</div>
			<div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
				<?php foreach ($services as $i => $service) :
					$sid = $service->ID;
					$price = arqamweb_sp_text('sp_card_price', $sid);
					$object = arqamweb_get_image_field('service_icon', $sid);
				?>
					<a href="<?php echo esc_url(get_permalink($sid)); ?>" class="detail-stagger group relative min-h-[310px] overflow-hidden rounded-[22px] border border-white/[0.08] bg-[linear-gradient(160deg,#15305a_0%,#0b1a33_100%)] p-7 shadow-[0_24px_50px_-28px_rgba(11,26,51,.55)] transition-all hover:-translate-y-1 hover:border-primary/40 hover:shadow-[0_30px_70px_-30px_rgba(49,152,212,.55)] <?php echo esc_attr($wide[$i] ?? ''); ?>" style="--stagger:<?php echo esc_attr($i * 80); ?>ms">
						<?php if ($price) : ?>
							<span class="relative z-10 inline-flex rounded-full border border-white/15 bg-white/10 px-3 py-1.5 text-[10px] font-semibold text-[#7cc4ef]"><?php echo esc_html($price); ?></span>
						<?php endif; ?>
						<div class="relative z-10 mt-5 max-w-[58%]">
							<h3 class="text-xl font-semibold text-white"><?php echo esc_html(arqamweb_sp_text('sp_eyebrow', $sid) ?: get_the_title($sid)); ?></h3>
							<p class="mt-2 text-sm leading-relaxed text-white/65"><?php echo esc_html(arqamweb_sp_text('sp_summary', $sid) ?: get_the_excerpt($sid)); ?></p>
							<span class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-[#7cc4ef] transition-colors group-hover:text-white"><?php esc_html_e('Learn more', 'arqamweb'); ?> <?php echo arqamweb_sp_icon('arrow-right', 'h-4 w-4 transition-transform group-hover:translate-x-1 rtl:group-hover:-translate-x-1'); ?></span>
						</div>
						<div aria-hidden="true" class="absolute -bottom-16 -right-10 h-64 w-64 rounded-full bg-primary/25 blur-3xl"></div>
						<?php if ($object) :
							$object_attrs = ['class' => 'absolute -bottom-10 -right-12 w-[58%] max-w-[260px] object-contain drop-shadow-[0_24px_35px_rgba(0,0,0,0.45)] transition-transform group-hover:scale-105', 'alt' => '', 'loading' => $i < 2 ? 'eager' : 'lazy', 'sizes' => '260px'];
							echo $object['id'] ? wp_get_attachment_image($object['id'], 'medium_large', false, $object_attrs) : '<img src="' . esc_url($object['url']) . '" alt="" class="' . esc_attr($object_attrs['class']) . '">';
						endif; ?>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- ── Trust ───────────────────────────────────────────────────────────── -->
	<section class="border-y border-border/70 bg-[#f4f7fb] py-16">
		<div class="container grid gap-5 md:grid-cols-3">
			<?php foreach ($trust as $point) : ?>
				<div class="flex items-center gap-3 rounded-2xl border border-slate-900/[.07] bg-background p-5 text-sm font-semibold shadow-sm">
					<span class="grid h-8 w-8 shrink-0 place-items-center rounded-full bg-primary text-primary-foreground"><?php echo arqamweb_sp_icon('check'); ?></span>
					<?php echo esc_html($point); ?>
				</div>
			<?php endforeach; ?>
		</div>
	</section>

	<!-- ── CTA ─────────────────────────────────────────────────────────────── -->
	<section class="bg-[#f4f7fb] py-20 lg:py-28">
		<div class="detail-reveal reveal container">
			<div class="detail-stagger relative overflow-hidden rounded-[32px] border border-slate-900/[.07] bg-[linear-gradient(135deg,#fff,#f1f5fa)] px-6 py-14 text-center shadow-[0_24px_60px_-35px_rgba(15,23,42,.28)] lg:px-28 lg:py-24">
				<div class="mb-9 flex items-center justify-center -space-x-2 rtl:space-x-reverse lg:mb-0">
					<?php foreach ($bubbles as $i => $bubble) :
						$size = 44 + ($i % 3) * 8;
					?>
						<span title="<?php echo esc_attr($bubble['label']); ?>" class="relative z-10 overflow-hidden rounded-full border-[3px] border-background bg-background shadow-xl lg:absolute <?php echo esc_attr($bubble_positions[$i]); ?> <?php echo $i > 3 ? 'hidden lg:block' : ''; ?>" style="width:<?php echo esc_attr($size); ?>px;height:<?php echo esc_attr($size); ?>px">
							<img src="<?php echo esc_url($bubble['src']); ?>" alt="" loading="lazy" decoding="async" class="h-full w-full rounded-full <?php echo empty($bubble['flag']) ? 'object-cover' : 'object-contain p-2'; ?>">
						</span>
					<?php endforeach; ?>
				</div>
				<div class="relative z-20 mx-auto max-w-2xl">
					<div class="inline-flex items-center gap-2 text-[11px] font-semibold uppercase tracking-[.2em] text-primary"><?php echo arqamweb_sp_icon('sparkles'); ?><?php esc_html_e('Not sure where to start?', 'arqamweb'); ?></div>
					<h2 class="mt-5 text-4xl font-semibold leading-[1.06] lg:text-[52px]"><?php esc_html_e('Tell us what you need.', 'arqamweb'); ?><br><span class="text-gradient"><?php esc_html_e("We'll map the right mix.", 'arqamweb'); ?></span></h2>
					<p class="mx-auto mt-5 max-w-xl text-muted-foreground"><?php esc_html_e('One conversation, then a written scope and a clear price.', 'arqamweb'); ?></p>
					<div class="mt-8 flex flex-wrap justify-center gap-3">
						<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_QUOTE_PAGE_SLUG)); ?>" class="inline-flex items-center gap-2 rounded-full bg-[#0f172a] px-6 py-3 text-sm font-semibold text-primary-foreground"><?php esc_html_e('Get your quote', 'arqamweb'); ?> <?php echo arqamweb_sp_icon('arrow-right'); ?></a>
						<a href="https://wa.me/201118721404" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 rounded-full border border-border bg-background px-6 py-3 text-sm font-semibold"><?php esc_html_e('Chat on WhatsApp', 'arqamweb'); ?> <?php echo arqamweb_sp_icon('message-circle'); ?></a>
					</div>
				</div>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
