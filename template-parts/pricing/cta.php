<?php
if (!defined('ABSPATH')) exit;
?>
<section class="py-24 lg:py-32 bg-background">
	<div class="container-x max-w-5xl mx-auto">
		<div
			class="relative overflow-hidden rounded-[2rem] bg-[#124f85] text-white p-10 lg:p-16 shadow-elevated">
			<div
				class="absolute -top-32 -right-32 w-[28rem] h-[28rem] rounded-full bg-primary/30 blur-3xl"></div>
			<div
				class="absolute -bottom-32 -left-32 w-[28rem] h-[28rem] rounded-full bg-primary/20 blur-3xl"></div>
			<div class="relative text-center">
				<div
					class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/15 text-[11px] font-semibold tracking-[0.18em] uppercase text-white/80 mb-6">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
					     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
					     stroke-linejoin="round" class="lucide lucide-sparkles w-3 h-3" aria-hidden="true">
						<path
							d="M11.017 2.814a1 1 0 0 1 1.966 0l1.051 5.558a2 2 0 0 0 1.594 1.594l5.558 1.051a1 1 0 0 1 0 1.966l-5.558 1.051a2 2 0 0 0-1.594 1.594l-1.051 5.558a1 1 0 0 1-1.966 0l-1.051-5.558a2 2 0 0 0-1.594-1.594l-5.558-1.051a1 1 0 0 1 0-1.966l5.558-1.051a2 2 0 0 0 1.594-1.594z"></path>
						<path d="M20 2v4"></path>
						<path d="M22 4h-4"></path>
						<circle cx="4" cy="20" r="2"></circle>
					</svg>
					<?php esc_html_e('Let\'s talk', 'arqamweb'); ?>
				</div>
				<h2 class="text-4xl lg:text-5xl xl:text-6xl font-semibold tracking-[-0.025em] leading-[1.05]">
					<?php esc_html_e('Not sure which plan', 'arqamweb'); ?><br><span
						class="text-gradient"><?php esc_html_e('fits your brand?', 'arqamweb'); ?></span></h2>
				<p class="mt-6 text-white/75 text-base lg:text-lg max-w-2xl mx-auto"><?php esc_html_e('Book a free 30-minute strategy call. We\'ll recommend the right tier and a clear path forward.', 'arqamweb'); ?></p>
				<div class="mt-10 flex flex-wrap justify-center gap-4">
					<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_CONTACT_PAGE_SLUG)); ?>"
					   class="inline-flex items-center gap-2 px-7 py-3.5 text-sm font-semibold text-primary bg-white rounded-full shadow-glow hover:-translate-y-0.5 transition-transform"><?php esc_html_e('Book a free call', 'arqamweb'); ?>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
						     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
						     stroke-linejoin="round" class="lucide lucide-arrow-right w-4 h-4"
						     aria-hidden="true">
							<path d="M5 12h14"></path>
							<path d="m12 5 7 7-7 7"></path>
						</svg>
					</a>
					<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_QUOTE_PAGE_SLUG)); ?>"
					   class="inline-flex items-center gap-2 px-7 py-3.5 text-sm font-semibold text-white rounded-full border border-white/30 hover:bg-white/10 transition-all">
						<?php esc_html_e('Request a Quote', 'arqamweb'); ?>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
