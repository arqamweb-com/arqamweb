<?php
if (!defined('ABSPATH')) {
	exit;
}
?>

<section id="contact" class="py-24 lg:py-32 relative overflow-hidden">
	<div class="container">
		<div
			class="relative rounded-[2rem] lg:rounded-[2.5rem] bg-gradient-primary p-10 lg:p-20 overflow-hidden shadow-glow ring-1 ring-white/10">
			<div class="absolute inset-0 grid-bg opacity-20"></div>
			<div class="absolute -top-40 -right-20 w-[520px] h-[520px] rounded-full bg-white/20 blur-2xl"></div>
			<div
				class="absolute -bottom-40 -left-20 w-[520px] h-[520px] rounded-full bg-[color:var(--primary-deep)]/50 blur-2xl"></div>
			<div class="relative grid lg:grid-cols-12 gap-10 items-center">
				<div class="lg:col-span-7 text-primary-foreground">
					<div
						class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/15 backdrop-blur text-xs font-semibold border border-white/20">
								<span class="relative flex h-2.5 w-2.5"><span
										class="absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75 animate-ping"></span><span
										class="relative inline-flex h-2.5 w-2.5 rounded-full bg-emerald-400 pulse-green"></span></span><?php esc_html_e("We're online — usually reply in under a minute", 'arqamweb'); ?>
					</div>
					<h2 class="mt-6 text-4xl lg:text-6xl font-semibold tracking-tight leading-[1.05]"><?php esc_html_e('Chat with Us', 'arqamweb'); ?><br><?php esc_html_e("We're here to help.", 'arqamweb'); ?></h2>
					<p class="mt-5 text-primary-foreground/85 text-lg max-w-xl"><?php esc_html_e("Whether it's a quick question or a full project brief — our team is ready to help you all week. Tell us what you're trying to grow.", 'arqamweb'); ?></p>
					<div class="mt-8 flex flex-wrap items-center gap-3">
						<a href="https://wa.me/201118721404" target="_blank" rel="noopener noreferrer"
						   class="group inline-flex items-center gap-2.5 px-6 py-3.5 text-sm font-semibold text-foreground bg-background rounded-full shadow-lg hover:-translate-y-0.5 transition-all"><?php esc_html_e('Chat via WhatsApp', 'arqamweb'); ?></a>
						<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_CONTACT_PAGE_SLUG)); ?>"
						   class="inline-flex items-center gap-2.5 px-6 py-3.5 text-sm font-semibold text-primary-foreground bg-white/10 backdrop-blur border border-white/25 rounded-full hover:bg-white/15 transition-colors">
							<?php esc_html_e('Contact Us', 'arqamweb'); ?>
						</a>
					</div>
				</div>
				<div class="lg:col-span-5">
					<div class="grid grid-cols-2 gap-3">
						<?php foreach ([['< 1m', 'Avg. response time'], ['7 days', 'Available all week'], ['AR · EN', 'Bilingual team'], ['Free', 'Discovery call']] as $contactStat) : ?>
							<div
								class="rounded-2xl bg-white/10 backdrop-blur border border-white/15 p-5 text-primary-foreground">
								<div
									class="text-2xl lg:text-3xl font-semibold"><?php echo $contactStat[0]; ?></div>
								<div
									class="text-xs text-primary-foreground/75 mt-0.5"><?php echo $contactStat[1]; ?></div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
