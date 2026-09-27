<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
?>
<section class="relative py-28 lg:py-40 overflow-hidden bg-gradient-dark text-primary-foreground">
	<div class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
		<div class="absolute inset-0 opacity-[0.08]"
		     style="background: radial-gradient(80% 60% at 20% 40%, rgb(57, 158, 208) 0%, transparent 70%), radial-gradient(60% 50% at 80% 30%, rgb(54, 109, 176) 0%, transparent 70%);"></div>
		<div class="absolute rounded-full"
		     style="width: 280px; height: 280px; left: 5%; top: 10%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.18), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 14s ease-in-out 0s infinite normal none running glass-float-1; transform: translate(0px, 0px); will-change: transform; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);"></div>
		<div class="absolute rounded-full"
		     style="width: 200px; height: 200px; left: 70%; top: 55%; background: radial-gradient(circle at 30% 30%, rgba(54, 109, 176, 0.2), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 16s ease-in-out -4s infinite normal none running glass-float-2; transform: translate(0px, 0px); will-change: transform; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);"></div>
		<div class="absolute rounded-full"
		     style="width: 140px; height: 140px; left: 55%; top: 5%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.15), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 12s ease-in-out -8s infinite normal none running glass-float-3; transform: translate(0px, 0px); will-change: transform; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);"></div>
		<div class="absolute rounded-full"
		     style="width: 240px; height: 240px; left: 20%; top: 65%; background: radial-gradient(circle at 30% 30%, rgba(54, 109, 176, 0.16), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 15s ease-in-out -2s infinite normal none running glass-float-4; transform: translate(0px, 0px); will-change: transform; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);"></div>
		<div class="absolute rounded-full"
		     style="width: 110px; height: 110px; left: 82%; top: 25%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.19), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 11s ease-in-out -6s infinite normal none running glass-float-1; transform: translate(0px, 0px); will-change: transform; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);"></div>
	</div>
	<div class="absolute inset-0 grid-bg opacity-[0.12]"></div>
	<div
		class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[900px] h-[900px] rounded-full bg-primary/20 blur-[160px]"></div>
	<div class="container-x max-w-5xl mx-auto relative text-center">
		<div
			class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-white/15 bg-white/5 backdrop-blur-md text-[11px] font-bold tracking-[0.22em] text-white/85 mb-8">
			<span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span><?php esc_html_e('NOW BOOKING Q2 PROJECTS', 'arqamweb'); ?>
		</div>
		<h2 class="text-5xl sm:text-6xl lg:text-7xl font-semibold tracking-[-0.04em] leading-[1.02]"><?php esc_html_e('Ready to become our', 'arqamweb'); ?> <span
				class="bg-gradient-to-r from-white via-white to-[color:var(--brand-primary)] bg-clip-text text-transparent"><?php esc_html_e('next success story?', 'arqamweb'); ?></span>
		</h2>
		<p class="mt-7 text-lg lg:text-xl text-primary-foreground/65 max-w-2xl mx-auto"><?php esc_html_e('A 30-minute call. Zero pressure. Walk away with a clear plan — whether you work with us or not.', 'arqamweb'); ?></p>
		<div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
			<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_QUOTE_PAGE_SLUG)); ?>"
			   class="group inline-flex items-center gap-2 px-8 py-4 text-base font-semibold text-primary-foreground bg-gradient-primary rounded-full shadow-glow hover:-translate-y-0.5 transition-all">
				<?php esc_html_e('Start your project', 'arqamweb'); ?>
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
				     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
				     class="lucide lucide-arrow-right w-4 h-4 group-hover:translate-x-1 transition-transform"
				     aria-hidden="true">
					<path d="M5 12h14"></path>
					<path d="m12 5 7 7-7 7"></path>
				</svg>
			</a>
			<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_PROJECTS_PAGE_SLUG)); ?>"
			   class="inline-flex items-center gap-2 px-8 py-4 text-base font-semibold text-white border border-white/20 rounded-full hover:bg-white/5 hover:border-white/40 transition-all">
				<?php esc_html_e('See our projects', 'arqamweb'); ?>
			</a>
		</div>
	</div>
</section>
