<?php
/**
 * Service page: final call to action with floating project and country bubbles.
 *
 * @package Arqam-Web
 */

$post_id = $args['post_id'];
$eyebrow = arqamweb_sp_text('sp_cta_eyebrow', $post_id) ?: __('Ready to get started?', 'arqamweb');
$title = arqamweb_sp_text('sp_cta_title', $post_id) ?: __("Let's build something", 'arqamweb');
$accent = arqamweb_sp_text('sp_cta_accent', $post_id) ?: __('that brings you business.', 'arqamweb');
$text = arqamweb_sp_text('sp_cta_text', $post_id) ?: __("Tell us about your project and we'll get back to you within 24 hours.", 'arqamweb');

$shots = get_template_directory_uri() . '/frontend/img/hero-shots/';
$bubbles = [
	['src' => $shots . 'masar.webp', 'label' => __('Masar Law', 'arqamweb')],
	['src' => $shots . 'kidana.webp', 'label' => __('Kidana Travel', 'arqamweb')],
	['src' => $shots . 'cid.webp', 'label' => __('CID Group', 'arqamweb')],
	['src' => $shots . 'sportreach.webp', 'label' => __('SportReach', 'arqamweb')],
	['src' => $shots . 'mrclone.webp', 'label' => __('Mr Clone', 'arqamweb')],
	['src' => $shots . 'rahati.webp', 'label' => __('Rahati Spa', 'arqamweb')],
	['src' => 'https://flagcdn.com/w80/sa.png', 'label' => __('Saudi Arabia', 'arqamweb'), 'flag' => true],
	['src' => 'https://flagcdn.com/w80/ae.png', 'label' => __('United Arab Emirates', 'arqamweb'), 'flag' => true],
	['src' => 'https://flagcdn.com/w80/eg.png', 'label' => __('Egypt', 'arqamweb'), 'flag' => true],
	['src' => 'https://flagcdn.com/w80/gb.png', 'label' => __('United Kingdom', 'arqamweb'), 'flag' => true],
];
// أماكن الفقاعات على الديسكتوب (نفس Lovable)، والموبايل بيتظبط في الـ CSS.
$positions = [
	'left:4%;top:16%;width:64px;height:64px',
	'left:14%;top:67%;width:50px;height:50px',
	'right:5%;top:18%;width:58px;height:58px',
	'right:15%;top:70%;width:46px;height:46px',
	'left:27%;top:8%;width:42px;height:42px',
	'right:28%;top:7%;width:48px;height:48px',
	'left:5%;top:48%;width:44px;height:44px',
	'right:5%;top:48%;width:48px;height:48px',
	'left:24%;bottom:7%;width:42px;height:42px',
	'right:24%;bottom:7%;width:44px;height:44px',
];
?>
<section id="cta" class="overflow-hidden bg-[#f4f7fb] py-20 lg:py-28">
	<div class="detail-reveal reveal container">
		<div class="detail-stagger relative overflow-hidden rounded-[32px] border border-slate-900/[0.07] bg-[linear-gradient(135deg,#ffffff,#f1f5fa)] px-6 pb-14 pt-32 text-center shadow-[0_1px_2px_rgba(15,23,42,.04),0_24px_60px_-35px_rgba(15,23,42,.28)] sm:px-12 lg:px-28 lg:py-24">
			<div aria-hidden="true" class="pointer-events-none absolute -right-20 -top-24 h-72 w-96 rotate-12 bg-[linear-gradient(135deg,transparent,rgba(255,255,255,.9),transparent)] blur-xl"></div>
			<?php foreach ($bubbles as $i => $bubble) : ?>
				<div class="cta-bubble group absolute z-10 <?php echo $i > 3 ? 'hidden lg:block' : ''; ?>" style="<?php echo esc_attr($positions[$i]); ?>;--bubble-delay:<?php echo esc_attr(-$i * 0.7); ?>s;--bubble-speed:<?php echo esc_attr(5 + $i % 4); ?>s">
					<img src="<?php echo esc_url($bubble['src']); ?>" alt="" loading="lazy" decoding="async" class="h-full w-full rounded-full <?php echo empty($bubble['flag']) ? 'object-cover' : 'object-contain p-2'; ?>">
					<span role="tooltip" class="pointer-events-none absolute left-1/2 top-full mt-2 -translate-x-1/2 whitespace-nowrap rounded-md bg-[#0f172a] px-2 py-1 text-[9px] text-primary-foreground opacity-0 transition-opacity group-hover:opacity-100"><?php echo esc_html($bubble['label']); ?></span>
				</div>
			<?php endforeach; ?>
			<div class="relative z-20 mx-auto max-w-2xl">
				<?php get_template_part('template-parts/service/service', 'eyebrow', ['text' => $eyebrow, 'centered' => true]); ?>
				<h2 class="mt-5 text-4xl font-semibold leading-[1.06] tracking-[-0.03em] lg:text-[52px]"><?php echo esc_html($title); ?><br><span class="text-gradient"><?php echo esc_html($accent); ?></span></h2>
				<p class="mx-auto mt-5 max-w-xl text-base leading-relaxed text-muted-foreground"><?php echo esc_html($text); ?></p>
				<div class="mt-8 flex flex-wrap justify-center gap-3">
					<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_QUOTE_PAGE_SLUG)); ?>" class="inline-flex items-center gap-2 rounded-full bg-[#0f172a] px-6 py-3 text-sm font-semibold text-primary-foreground"><?php esc_html_e('Get your quote', 'arqamweb'); ?> <?php echo arqamweb_sp_icon('arrow-right'); ?></a>
					<a href="https://wa.me/201118721404" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 rounded-full border border-slate-900/10 bg-background px-6 py-3 text-sm font-semibold text-foreground"><?php esc_html_e('Chat on WhatsApp', 'arqamweb'); ?> <?php echo arqamweb_sp_icon('message-circle'); ?></a>
				</div>
			</div>
		</div>
	</div>
</section>
