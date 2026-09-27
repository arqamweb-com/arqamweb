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
					<span class="w-3 h-3"><?php get_template_part('template-parts/icons/sparkles'); ?></span>
					<?php esc_html_e('Let\'s talk', 'arqamweb'); ?>
				</div>
				<h2 class="text-4xl lg:text-5xl xl:text-6xl font-semibold tracking-[-0.025em] leading-[1.05]">
					<?php esc_html_e('Not sure which plan', 'arqamweb'); ?><br><span
						class="text-gradient"><?php esc_html_e('fits your brand?', 'arqamweb'); ?></span></h2>
				<p class="mt-6 text-white/75 text-base lg:text-lg max-w-2xl mx-auto"><?php esc_html_e('Book a free 30-minute strategy call. We\'ll recommend the right tier and a clear path forward.', 'arqamweb'); ?></p>
				<div class="mt-10 flex flex-wrap justify-center gap-4">
					<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_CONTACT_PAGE_SLUG)); ?>"
					   class="inline-flex items-center gap-2 px-7 py-3.5 text-sm font-semibold text-primary bg-white rounded-full shadow-glow hover:-translate-y-0.5 transition-transform"><?php esc_html_e('Book a free call', 'arqamweb'); ?>
						<span class="w-4 h-4"><?php get_template_part('template-parts/icons/arrow-right'); ?></span>
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
