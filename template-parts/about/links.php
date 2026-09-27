<?php
if (!defined('ABSPATH')) {
	exit;
}
?>
<section class="relative py-28 lg:py-36 bg-surface overflow-hidden">
	<div class="container-x max-w-7xl mx-auto">
		<div class="grid lg:grid-cols-2 gap-6 lg:gap-8">
			<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_SERVICES_PAGE_SLUG)); ?>"
			   class="group relative aspect-[4/3] lg:aspect-[16/11] rounded-3xl overflow-hidden border border-border bg-background shadow-card hover:shadow-[0_40px_120px_-30px_color-mix(in_oklab,var(--primary)_50%,transparent)] transition-all duration-700"><img
					alt="" loading="lazy"
					class="absolute inset-0 w-full h-full object-cover scale-105 transition-transform duration-[1400ms] group-hover:scale-110"
					src="<?php echo get_template_directory_uri(); ?>/frontend/img/about-office-4.jpg">
				<div
					class="absolute inset-0 bg-gradient-to-t from-[#0c1828]/95 via-[#0c1828]/65 to-[#0c1828]/20 group-hover:from-[#0c1828] transition-colors duration-700"></div>
				<div
					class="absolute inset-0 bg-gradient-to-br from-primary/0 via-transparent to-primary/0 group-hover:from-primary/20 group-hover:to-primary/5 transition-all duration-700"></div>
				<div
					class="pointer-events-none absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-[1400ms] ease-out bg-[linear-gradient(110deg,transparent_40%,rgba(255,255,255,0.08)_50%,transparent_60%)]"></div>
				<div class="relative h-full flex flex-col justify-end p-8 lg:p-12 text-white">
					<div class="text-[11px] font-bold tracking-[0.22em] uppercase text-primary mb-4"><?php esc_html_e('Our Services', 'arqamweb'); ?>
					</div>
					<h3 class="text-3xl lg:text-5xl font-semibold tracking-[-0.025em] leading-[1.05] max-w-md">
						<?php esc_html_e('Web · SEO · Branding · Social', 'arqamweb'); ?>
					</h3>
					<p class="mt-3 text-white/70 text-base lg:text-lg">
						<?php esc_html_e('Senior teams shipping growth systems.', 'arqamweb'); ?>
					</p>
					<div class="mt-8 inline-flex items-center gap-2 text-sm font-semibold text-white">
						<span><?php esc_html_e('Explore', 'arqamweb'); ?></span>
						<span class="relative grid place-items-center w-10 h-10 rounded-full bg-gradient-primary text-primary-foreground transition-transform duration-500 group-hover:scale-110 group-hover:rotate-45"><svg
								xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
								fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
								stroke-linejoin="round" class="lucide lucide-arrow-up-right w-4 h-4"
								aria-hidden="true"><path d="M7 7h10v10"></path><path
										d="M7 17 17 7">
								</path>
							</svg></span>
					</div>
				</div>
			</a>
			<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_PROJECTS_PAGE_SLUG)); ?>"
			   class="group relative aspect-[4/3] lg:aspect-[16/11] rounded-3xl overflow-hidden border border-border bg-background shadow-card hover:shadow-[0_40px_120px_-30px_color-mix(in_oklab,var(--primary)_50%,transparent)] transition-all duration-700"><img
					alt="" loading="lazy"
					class="absolute inset-0 w-full h-full object-cover scale-105 transition-transform duration-[1400ms] group-hover:scale-110"
					src="<?php echo get_template_directory_uri(); ?>/frontend/img/about-office-1.jpg">
				<div
					class="absolute inset-0 bg-gradient-to-t from-[#0c1828]/95 via-[#0c1828]/65 to-[#0c1828]/20 group-hover:from-[#0c1828] transition-colors duration-700"></div>
				<div
					class="absolute inset-0 bg-gradient-to-br from-primary/0 via-transparent to-primary/0 group-hover:from-primary/20 group-hover:to-primary/5 transition-all duration-700"></div>
				<div
					class="pointer-events-none absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-[1400ms] ease-out bg-[linear-gradient(110deg,transparent_40%,rgba(255,255,255,0.08)_50%,transparent_60%)]"></div>
				<div class="relative h-full flex flex-col justify-end p-8 lg:p-12 text-white">
					<div class="text-[11px] font-bold tracking-[0.22em] uppercase text-primary mb-4"><?php esc_html_e('Our Projects', 'arqamweb'); ?>
					</div>
					<h3 class="text-3xl lg:text-5xl font-semibold tracking-[-0.025em] leading-[1.05] max-w-md">
						<?php esc_html_e('320+ shipped, 10+ countries.', 'arqamweb'); ?></h3>
					<p class="mt-3 text-white/70 text-base lg:text-lg"><?php esc_html_e('A portfolio that travels.', 'arqamweb'); ?></p>
					<div class="mt-8 inline-flex items-center gap-2 text-sm font-semibold text-white">
						<span><?php esc_html_e('Explore', 'arqamweb'); ?></span><span
							class="relative grid place-items-center w-10 h-10 rounded-full bg-gradient-primary text-primary-foreground transition-transform duration-500 group-hover:scale-110 group-hover:rotate-45"><svg
									xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
									fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
									stroke-linejoin="round" class="lucide lucide-arrow-up-right w-4 h-4"
									aria-hidden="true"><path d="M7 7h10v10"></path><path
										d="M7 17 17 7"></path></svg></span></div>
				</div>
			</a></div>
	</div>
</section>
