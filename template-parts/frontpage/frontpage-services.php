<?php
if (! defined('ABSPATH')) {
	exit;
}

$servicesStrip = [
	__('Website Design', 'arqamweb'),
	__('Search Engine Optimization', 'arqamweb'),
	__('Brand Identity', 'arqamweb'),
	__('Social Media Marketing', 'arqamweb'),
];
?>

<section id="services" class="relative overflow-hidden py-28 lg:py-36 bg-[#f4f7fb]">
	<div class="pointer-events-none absolute inset-0" aria-hidden="true">
		<div class="absolute -left-32 -top-32 h-[640px] w-[640px] rounded-full bg-primary/10 blur-[140px]"></div>
		<div class="absolute inset-0 opacity-[0.05] [background-size:60px_60px] [background-image:linear-gradient(to_right,rgba(15,23,42,0.35)_1px,transparent_1px),linear-gradient(to_bottom,rgba(15,23,42,0.35)_1px,transparent_1px)] [mask-image:radial-gradient(ellipse_at_center,black_30%,transparent_75%)]"></div>
	</div>

	<div class="reveal container relative">
		<div class="mx-auto mb-14 max-w-3xl text-center lg:mb-16">
			<div class="mb-5 inline-flex items-center gap-3">
				<span class="h-px w-10 bg-primary/60"></span>
				<span class="text-[11px] font-semibold uppercase tracking-[0.22em] text-primary"><?php esc_html_e('What we do', 'arqamweb'); ?></span>
				<span class="h-px w-10 bg-primary/60"></span>
			</div>
			<h2 class="text-4xl font-semibold leading-[1.05] text-foreground lg:text-[3.5rem]"><?php esc_html_e('What we do best', 'arqamweb'); ?></h2>
			<p class="mx-auto mt-5 max-w-xl text-sm leading-relaxed text-muted-foreground sm:text-base"><?php esc_html_e('From the first line of code to the monthly report: six services, one team, and everything handed over in your name.', 'arqamweb'); ?></p>
		</div>

		<?php get_template_part('/template-parts/services/custom', 'loop-services', array('postCount' => 6)); ?>

		<div class="mt-12 flex justify-center">
			<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_SERVICES_PAGE_SLUG)); ?>" class="inline-flex items-center gap-2 rounded-full bg-gradient-primary px-7 py-3.5 text-sm font-semibold text-primary-foreground shadow-glow transition-transform hover:-translate-y-0.5"><?php esc_html_e('View All Services', 'arqamweb'); ?> <?php echo arqam_icon('arrow'); ?></a>
		</div>
	</div>

	<div class="mt-24 overflow-hidden py-6 lg:mt-32" aria-hidden="true">
		<div class="flex animate-marquee whitespace-nowrap" style="animation-duration:42s;width:max-content">
			<?php for ($i = 0; $i < 4; $i++) : foreach ($servicesStrip as $label) : ?>
					<span class="flex items-center gap-10 pr-10"><span class="text-5xl font-semibold tracking-[-0.025em] text-[#4674b0] lg:text-7xl xl:text-8xl"><?php echo esc_html($label); ?></span><span class="text-5xl text-slate-300 lg:text-7xl xl:text-8xl">·</span></span>
			<?php endforeach;
			endfor; ?>
		</div>
	</div>
</section>
