<?php
if (! defined('ABSPATH')) {
	exit;
}

$services = [
	[
		'title' => __('Website Design & Development', 'arqam-web'),
		'eyebrow' => __('Custom-built. Performance-obsessed.', 'arqam-web'),
		'copy' => __('Bespoke websites and platforms — engineered on a clean, scalable codebase that loads fast, ranks well, and converts.', 'arqam-web'),
		'tags' => [__('UX & visual design', 'arqam-web'), __('Headless / WordPress / custom', 'arqam-web'), __('Core Web Vitals tuned', 'arqam-web')],
		'icon' => 'website',
	],
	[
		'title' => __('Search Engine Optimization', 'arqam-web'),
		'eyebrow' => __('Rank where buying happens.', 'arqam-web'),
		'copy' => __('Technical SEO, content architecture and authority building — engineered for both Google and the new AI search surfaces.', 'arqam-web'),
		'tags' => [__('Technical audit & fixes', 'arqam-web'), __('Keyword & topic strategy', 'arqam-web'), __('Authority & links', 'arqam-web')],
		'icon' => 'search',
	],
	[
		'title' => __('Brand Identity', 'arqam-web'),
		'eyebrow' => __('Brands worth remembering.', 'arqam-web'),
		'copy' => __('Logo systems, typography and the full visual language — across digital, print and packaging — that defines how the world sees you.', 'arqam-web'),
		'tags' => [__('Logo & marks', 'arqam-web'), __('Type & color systems', 'arqam-web'), __('Brand guidelines', 'arqam-web')],
		'icon' => 'brand',
	],
	[
		'title' => __('Social Media Marketing', 'arqam-web'),
		'eyebrow' => __('Audiences that convert.', 'arqam-web'),
		'copy' => __('Strategy, creative production, paid social and community management across Instagram, TikTok, LinkedIn, X and YouTube.', 'arqam-web'),
		'tags' => [__('Content strategy', 'arqam-web'), __('Creative production', 'arqam-web'), __('Paid social', 'arqam-web')],
		'icon' => 'social',
	],
];
?>

<section id="services" class="py-28 lg:py-36 bg-background relative">
	<div class="reveal container">
		<div class="grid lg:grid-cols-12 gap-10 items-end mb-16">
			<div class="lg:col-span-7">
				<div class="inline-flex items-center gap-3 mb-5"><span class="h-px w-10 bg-primary/60"></span><span class="text-[11px] font-semibold tracking-[0.22em] uppercase text-primary"><?php esc_html_e('What we do', 'arqam-web'); ?></span></div>
				<h2 class="text-4xl lg:text-5xl xl:text-[3.5rem] font-semibold tracking-[-0.025em] leading-[1.05]"><?php esc_html_e('Four disciplines.', 'arqam-web'); ?><br><span class="text-gradient"><?php esc_html_e('One growth engine.', 'arqam-web'); ?></span></h2>
			</div>
			<div class="lg:col-span-5">
				<p class="text-muted-foreground text-base lg:text-lg leading-relaxed border-l-2 border-primary/30 pl-5"><?php esc_html_e("We don't sell deliverables — we ship outcomes. Every engagement is a senior team obsessing over how design, code, search and social work together.", 'arqam-web'); ?></p>
			</div>
		</div>

		<?php get_template_part('/template-parts/services/custom', 'loop-services', array('postCount' => 4)); ?>

		<div class="mt-12 flex justify-center"><a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_SERVICES_PAGE_SLUG)); ?>" class="btn-primary"><?php esc_html_e('View All Services', 'arqam-web'); ?> <?php echo arqam_icon('arrow'); ?></a></div>
	</div>
	<div class="mt-24 lg:mt-32 py-6 overflow-hidden">
		<div class="flex animate-marquee whitespace-nowrap" style="animation-duration:42s;width:max-content">
			<?php for ($i = 0; $i < 4; $i++) : foreach ($services as $service) : ?>
					<span class="flex items-center gap-10 pr-10"><span class="text-5xl lg:text-7xl xl:text-8xl font-semibold tracking-[-0.025em] text-[#4674b0]"><?php echo esc_html(__($service['title'], 'arqam-web')); ?></span><span class="text-5xl lg:text-7xl xl:text-8xl" style="color:#30415a">·</span></span>
			<?php endforeach;
			endfor; ?>
		</div>
	</div>
</section>
