<?php
if (! defined('ABSPATH')) {
	exit;
}

$services = [
	[
		'title' => 'Website Design & Development',
		'eyebrow' => 'Custom-built. Performance-obsessed.',
		'copy' => 'Bespoke websites and platforms — engineered on a clean, scalable codebase that loads fast, ranks well, and converts.',
		'tags' => ['UX & visual design', 'Headless / WordPress / custom', 'Core Web Vitals tuned'],
		'icon' => 'website',
	],
	[
		'title' => 'Search Engine Optimization',
		'eyebrow' => 'Rank where buying happens.',
		'copy' => 'Technical SEO, content architecture and authority building — engineered for both Google and the new AI search surfaces.',
		'tags' => ['Technical audit & fixes', 'Keyword & topic strategy', 'Authority & links'],
		'icon' => 'search',
	],
	[
		'title' => 'Brand Identity',
		'eyebrow' => 'Brands worth remembering.',
		'copy' => 'Logo systems, typography and the full visual language — across digital, print and packaging — that defines how the world sees you.',
		'tags' => ['Logo & marks', 'Type & color systems', 'Brand guidelines'],
		'icon' => 'brand',
	],
	[
		'title' => 'Social Media Marketing',
		'eyebrow' => 'Audiences that convert.',
		'copy' => 'Strategy, creative production, paid social and community management across Instagram, TikTok, LinkedIn, X and YouTube.',
		'tags' => ['Content strategy', 'Creative production', 'Paid social'],
		'icon' => 'social',
	],
];
?>

<section id="services" class="py-28 lg:py-36 bg-background relative">
	<div class="reveal container">
		<div class="grid lg:grid-cols-12 gap-10 items-end mb-16">
			<div class="lg:col-span-7">
				<div class="inline-flex items-center gap-3 mb-5"><span class="h-px w-10 bg-primary/60"></span><span class="text-[11px] font-semibold tracking-[0.22em] uppercase text-primary"><?php esc_html_e('What we do', 'arqamweb'); ?></span></div>
				<h2 class="text-4xl lg:text-5xl xl:text-[3.5rem] font-semibold tracking-[-0.025em] leading-[1.05]"><?php esc_html_e('Four disciplines.', 'arqamweb'); ?><br><span class="text-gradient"><?php esc_html_e('One growth engine.', 'arqamweb'); ?></span></h2>
			</div>
			<div class="lg:col-span-5">
				<p class="text-muted-foreground text-base lg:text-lg leading-relaxed border-l-2 border-primary/30 pl-5"><?php esc_html_e("We don't sell deliverables — we ship outcomes. Every engagement is a senior team obsessing over how design, code, search and social work together.", 'arqamweb'); ?></p>
			</div>
		</div>

		<?php get_template_part('/template-parts/services/custom', 'loop-services', array('postCount' => 4)); ?>

		<div class="mt-12 flex justify-center"><a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_SERVICES_PAGE_SLUG)); ?>" class="btn-primary"><?php esc_html_e('View All Services', 'arqamweb'); ?> <?php echo arqam_icon('arrow'); ?></a></div>
	</div>
	<div class="mt-24 lg:mt-32 py-6 overflow-hidden">
		<div class="flex animate-marquee whitespace-nowrap" style="animation-duration:42s;width:max-content">
			<?php for ($i = 0; $i < 4; $i++) : foreach ($services as $service) : ?>
					<span class="flex items-center gap-10 pr-10"><span class="text-5xl lg:text-7xl xl:text-8xl font-semibold tracking-[-0.025em] text-[#4674b0]"><?php echo esc_html(__($service['title'], 'arqamweb')); ?></span><span class="text-5xl lg:text-7xl xl:text-8xl" style="color:#30415a">·</span></span>
			<?php endforeach;
			endfor; ?>
		</div>
	</div>
</section>
