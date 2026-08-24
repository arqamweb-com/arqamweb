<?php

/**
 * Frontpage Slider Section
 *
 * @package Arqam Web
 */


$showcase_assets = get_template_directory_uri() . '/frontend/img/ascend/';
$heroSlides = [
	[
		'src' => $showcase_assets . 'gsc1.webp',
		'title' => 'Google Search Console',
		'path' => 'google-search-console',
		'caption' => __('Organic visibility growth across competitive markets', 'arqamweb'),
		'focus' => 'center 30%',
	],
	[
		'src' => $showcase_assets . 'ridge.webp',
		'title' => 'Ridge Labs',
		'path' => 'ridge-labs',
		'caption' => __('Custom UI/UX engineered for speed, precision, and product growth', 'arqamweb'),
		'focus' => 'center 25%',
	],
	[
		'src' => $showcase_assets . 'kidana.webp',
		'title' => 'Kidana Travel',
		'path' => 'kidana-travel',
		'caption' => __('Conversion-focused travel experience designed for global audiences', 'arqamweb'),
		'focus' => 'center 30%',
	],
	[
		'src' => $showcase_assets . 'dsgf.webp',
		'title' => "Don't Sit · Get Fit",
		'path' => 'don-t-sit-get-fit',
		'caption' => __('Bold branding and immersive web experience built for engagement', 'arqamweb'),
		'focus' => 'center 30%',
	],
	[
		'src' => $showcase_assets . 'gsc2.webp',
		'title' => 'Google Search Console',
		'path' => 'google-search-console',
		'caption' => __('Data-driven SEO campaigns focused on measurable business growth', 'arqamweb'),
		'focus' => 'center 30%',
	],
];
?>
<section id="home" class="relative pt-32 lg:pt-40 pb-24 lg:pb-32 bg-hero overflow-hidden">
	<div class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
		<div class="absolute inset-0 grid-bg opacity-50"></div>
		<canvas data-arqam-hero-canvas class="absolute inset-0 w-full h-full will-change-transform" width="1920" height="924"></canvas>
		<div class="absolute -top-40 -right-40 w-[640px] h-[640px] rounded-full bg-primary/20 blur-2xl"></div>
		<div class="absolute -bottom-48 -left-48 w-[640px] h-[640px] rounded-full bg-[color:var(--primary-deep)]/15 blur-2xl"></div>
		<div class="absolute inset-0 bg-gradient-to-r from-background/40 via-transparent to-background/10"></div>
	</div>

	<div class="container relative">
		<div class="grid lg:grid-cols-12 gap-12 lg:gap-10 items-center">
			<div class="lg:col-span-7">
				<div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-primary/25 bg-primary/10 backdrop-blur text-xs font-semibold mb-7" style="color:#5e646c">
					<span class="relative flex h-2 w-2"><span class="absolute inline-flex h-full w-full rounded-full bg-primary opacity-60 animate-ping"></span><span class="relative inline-flex h-2 w-2 rounded-full bg-primary"></span></span>
					<?php esc_html_e('Global Digital Agency · Est. 2010', 'arqamweb'); ?>
				</div>
				<h1 class="font-semibold tracking-[-0.035em] max-w-[760px]">
					<span class="block text-[2.5rem] sm:text-5xl lg:text-[4.25rem] leading-[1.04] font-bold text-foreground"><?php esc_html_e('Digital Marketing', 'arqamweb'); ?></span>
					<span class="block text-[2.5rem] sm:text-5xl lg:text-[4.25rem] leading-[1.04] font-bold text-foreground mt-1"><?php esc_html_e('Agency Helping', 'arqamweb'); ?></span>
					<span class="block text-[2.5rem] sm:text-5xl lg:text-[4.25rem] leading-[1.04] font-bold text-foreground mt-1"><?php esc_html_e('Brands', 'arqamweb'); ?> <span class="relative inline-flex items-baseline"><span data-arqam-hero-word data-words='<?php echo esc_attr(wp_json_encode([__('Grow.', 'arqamweb'), __('Scale.', 'arqamweb'), __('Convert.', 'arqamweb')])); ?>' class="hero-word-rotator text-gradient font-semibold"><?php esc_html_e('Grow.', 'arqamweb'); ?></span><span class="inline-block w-[3px] h-[0.78em] align-[-0.06em] ml-1 bg-primary animate-pulse"></span></span></span>
					<span class="block mt-4 text-[1.5rem] sm:text-2xl lg:text-[2rem] leading-[1.2] font-light text-muted-foreground tracking-[-0.02em]"><?php esc_html_e('across', 'arqamweb'); ?> <span class="text-foreground font-medium"><?php esc_html_e('+10 markets', 'arqamweb'); ?></span> <?php esc_html_e('worldwide.', 'arqamweb'); ?></span>
				</h1>
				<p class="mt-8 text-base lg:text-lg text-muted-foreground max-w-lg leading-relaxed"><?php esc_html_e('Arqam Web designs, develops, and optimizes high-performance websites built to rank, convert, and scale your business — from the Gulf to Europe and the Americas.', 'arqamweb'); ?></p>
				<div class="mt-9 flex flex-wrap items-center gap-3">
					<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_QUOTE_PAGE_SLUG)); ?>" class="group relative inline-flex items-center justify-center gap-2 whitespace-nowrap px-8 py-4 text-sm font-semibold leading-none text-primary-foreground bg-gradient-primary rounded-full overflow-hidden transition-[transform,box-shadow] duration-300 ease-out shadow-glow">
						<span aria-hidden="true" class="pointer-events-none absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-[900ms] ease-out bg-[linear-gradient(110deg,transparent_35%,rgba(255,255,255,0.45)_50%,transparent_65%)]"></span>
						<span class="relative inline-flex items-center gap-2"><?php esc_html_e('Request a Quote', 'arqamweb'); ?> <?php echo arqam_icon('arrow'); ?></span>
					</a>
					<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_PROJECTS_PAGE_SLUG)); ?>" class="group relative inline-flex items-center gap-2 px-7 py-4 text-sm font-semibold text-foreground bg-background/70 backdrop-blur border border-border rounded-full hover:border-primary/60 hover:text-primary transition-[color,border-color,box-shadow,transform] duration-300 ease-out"><?php esc_html_e('View Our Projects', 'arqamweb'); ?> <?php echo arqam_icon('arrow'); ?></a>
				</div>
				<div class="mt-12 grid grid-cols-2 sm:grid-cols-4 gap-5 max-w-2xl">
					<?php foreach ([['+15', 'Years experience'], ['+10', 'Countries served'], ['4.9★', 'Global client rating'], ['Web · SEO', 'Branding · Social']] as $metric) : ?>
						<div class="border-l-2 border-primary/40 pl-3.5">
							<div class="text-lg sm:text-xl font-semibold text-foreground tracking-tight"><?php echo $metric[0]; ?></div>
							<div class="text-xs text-muted-foreground leading-snug mt-0.5"><?php echo esc_html(__($metric[1], 'arqamweb')); ?></div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="lg:col-span-5 relative">
				<div class="relative lg:scale-[1.1] lg:origin-right lg:-ml-6 xl:-ml-10">
					<div class="relative animate-float">
						<div data-arqam-hero-mockup data-slide-images="<?php echo esc_attr(wp_json_encode($heroSlides)); ?>" class="hero-mockup-card relative rounded-3xl bg-gradient-to-br from-[oklch(0.19_0.03_250)] to-[oklch(0.11_0.025_250)] border border-white/[0.08] p-3 lg:p-4 overflow-hidden shadow-[0_50px_100px_-30px_rgba(0,0,0,0.85),0_25px_50px_-20px_rgba(0,0,0,0.6),inset_0_1px_0_0_rgba(255,255,255,0.08)]">
							<div aria-hidden="true" class="pointer-events-none absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-white/40 to-transparent"></div>
							<div aria-hidden="true" class="pointer-events-none absolute inset-0 rounded-3xl bg-[radial-gradient(ellipse_at_top,rgba(255,255,255,0.08),transparent_55%)]"></div>
							<div aria-hidden="true" class="pointer-events-none absolute -top-20 -right-16 w-72 h-72 rounded-full bg-[color:var(--brand-primary)]/15 blur-2xl"></div>
							<div aria-hidden="true" class="pointer-events-none absolute -bottom-24 -left-20 w-72 h-72 rounded-full bg-[oklch(0.55_0.18_280)]/10 blur-2xl"></div>
							<div aria-hidden="true" class="hero-noise pointer-events-none absolute inset-0 opacity-[0.06] mix-blend-overlay"></div>
							<div aria-hidden="true" class="pointer-events-none absolute inset-0 opacity-[0.08] overflow-hidden">
								<div class="hero-sweep absolute -inset-[100%] bg-[linear-gradient(115deg,transparent_30%,white_50%,transparent_70%)]"></div>
							</div>
							<div class="relative flex items-center justify-between mb-3 px-2">
								<div class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-[#ff5f57]"></span><span class="w-2.5 h-2.5 rounded-full bg-[#febc2e]"></span><span class="w-2.5 h-2.5 rounded-full bg-[#28c840]"></span></div>
								<div class="text-[10px] font-mono text-white/40 tracking-wider truncate max-w-[200px]">arqamweb.com / <span data-arqam-hero-path><?php echo esc_html($heroSlides[0]['path']); ?></span></div>
								<div class="flex items-center gap-1 px-2 py-0.5 rounded-full bg-emerald-500/15 border border-emerald-400/30"><span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span><span class="text-[10px] font-semibold text-emerald-300"><?php esc_html_e('LIVE', 'arqamweb'); ?></span></div>
							</div>
							<div class="relative aspect-[16/11] rounded-2xl overflow-hidden bg-black/40">
								<img data-arqam-hero-slide src="<?php echo esc_url($heroSlides[0]['src']); ?>" alt="<?php echo esc_attr($heroSlides[0]['title']); ?>" width="1280" height="896" loading="eager" decoding="async" fetchpriority="high" class="absolute inset-0 w-full h-full object-cover scale-110 duration-[6000ms]" style="object-position:<?php echo esc_attr($heroSlides[0]['focus']); ?>">
								<div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-black/30"></div>
								<div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,rgba(49,152,212,0.25),transparent_55%)]"></div>
								<div class="absolute left-3 right-3 bottom-3">
									<div data-arqam-hero-caption class="px-3 py-2 rounded-xl bg-black/55 backdrop-blur-md border border-white/10 text-white animate-fade-in">
										<div data-arqam-hero-title class="text-[10px] uppercase tracking-wider opacity-70"><?php echo esc_html($heroSlides[0]['title']); ?></div>
										<div data-arqam-hero-copy class="text-xs font-semibold leading-snug"><?php echo esc_html($heroSlides[0]['caption']); ?></div>
									</div>
									<div class="mt-2 flex gap-1.5 justify-end">
										<?php foreach ($heroSlides as $index => $slide) : ?>
											<span data-arqam-hero-dot class="relative h-1 rounded-full overflow-hidden bg-white/25" style="width:<?php echo $index === 0 ? '28px' : '8px'; ?>"><span class="absolute inset-y-0 left-0 <?php echo $index === 0 ? 'bg-[color:var(--brand-primary)] hero-slide-progress' : 'bg-white/15'; ?>" style="width:<?php echo $index === 0 ? '100%' : '100%'; ?>"></span></span>
										<?php endforeach; ?>
									</div>
								</div>
								<div aria-hidden="true" class="hero-ghost-cursor absolute pointer-events-none">
									<svg width="18" height="18" viewBox="0 0 24 24" class="drop-shadow-[0_2px_6px_rgba(0,0,0,0.6)]">
										<path d="M3 2l7 18 2.5-7.5L20 10z" fill="white" stroke="black" stroke-width="1"></path>
									</svg>
								</div>
							</div>
						</div>
						<div class="hidden md:flex absolute -left-6 top-10 items-center gap-2 px-3.5 py-2 rounded-full bg-gradient-primary text-primary-foreground shadow-glow text-xs font-semibold animate-float" style="animation-delay:-2s"><?php esc_html_e('Organic Growth', 'arqamweb'); ?></div>
						<div class="hidden md:block absolute -right-3 -bottom-3 rounded-xl p-2 pr-3 bg-background/90 backdrop-blur-xl border border-border shadow-elevated animate-float">
							<div class="flex items-center gap-2">
								<div class="w-7 h-7 rounded-lg bg-gradient-primary text-primary-foreground flex items-center justify-center shadow-glow">★</div>
								<div>
									<div class="text-[8px] text-muted-foreground uppercase tracking-wider leading-none"><?php esc_html_e('Client rating', 'arqamweb'); ?></div>
									<div class="text-[11px] font-semibold leading-tight mt-0.5"><?php esc_html_e('4.9 / 5 average', 'arqamweb'); ?></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
