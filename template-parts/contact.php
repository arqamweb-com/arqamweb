<?php /* Template Name: Contact Us */ ?>
<?php

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
get_header();

// get_template_part('template-parts/headers/header', 'page');

?>

<main class="bg-background">
	<section class="relative pt-32 lg:pt-44 pb-16 lg:pb-24 overflow-hidden bg-hero">
		<div class="absolute inset-0 grid-bg opacity-50" aria-hidden="true"></div>
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
		<div class="reveal container-x max-w-7xl mx-auto relative in">
			<div class="arqamweb-breadcrumb">
				<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
			</div>
			<div class="grid lg:grid-cols-12 gap-10 items-end">
				<div class="lg:col-span-8">
					<div
						class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-[11px] font-semibold bg-primary/10 text-primary border border-primary/20 mb-6">
						<span class="w-1.5 h-1.5 rounded-full bg-emerald-500 pulse-green"></span><?php esc_html_e('Studio open · Replies within 1 business day', 'arqamweb'); ?>
					</div>
					<h1 class="text-5xl md:text-7xl lg:text-[5.5rem] font-semibold tracking-tight leading-[0.95]"><?php esc_html_e("Let's build something", 'arqamweb'); ?> <br><span class="text-gradient italic font-light"><?php esc_html_e('worth scaling.', 'arqamweb'); ?></span></h1>
				</div>
				<div class="lg:col-span-4"><p class="text-lg text-muted-foreground leading-relaxed max-w-md"><?php esc_html_e("Whether you're scoping a new flagship site, replatforming, or chasing a market — we'd love to hear what you're building.", 'arqamweb'); ?></p></div>
			</div>
		</div>
	</section>
	<section class="py-16 lg:py-24 border-t border-border/60">
		<div class="reveal container-x max-w-7xl mx-auto grid lg:grid-cols-12 gap-10 lg:gap-16 in">
			<div class="lg:col-span-5 flex flex-col gap-8">
				<div>
					<div class="text-xs font-semibold tracking-[0.3em] uppercase text-primary mb-4"><?php esc_html_e('— Reach the studio', 'arqamweb'); ?>
					</div>
					<h2 class="text-3xl lg:text-4xl font-semibold tracking-tight leading-[1.1]"><?php esc_html_e('Four ways in.', 'arqamweb'); ?> <span
							class="italic font-light text-muted-foreground"><?php esc_html_e('Pick yours.', 'arqamweb'); ?></span></h2></div>
				<ul class="space-y-3">
					<li><a href="mailto:info@arqamweb.com"
					       class="group relative flex items-start gap-4 p-5 rounded-2xl border border-border bg-card hover:border-primary/40 hover:shadow-elevated hover:-translate-y-0.5 transition-all duration-300 overflow-hidden">
							<div aria-hidden="true"
							     class="absolute -inset-px rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"
							     style="background: radial-gradient(60% 60% at 0% 0%, color-mix(in oklab, var(--primary) 18%, transparent), transparent 70%);"></div>
							<div
								class="relative flex-none w-11 h-11 rounded-xl bg-gradient-primary text-primary-foreground flex items-center justify-center shadow-glow">
								<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"
								     class="w-5 h-5">
									<rect x="3" y="5" width="18" height="14" rx="2"></rect>
									<path d="m3 7 9 6 9-6"></path>
								</svg>
							</div>
							<div class="relative flex-1 min-w-0">
								<div class="text-[11px] uppercase tracking-[0.2em] text-muted-foreground"><?php esc_html_e('Email the studio', 'arqamweb'); ?>
								</div>
								<div class="mt-1 font-semibold truncate">info@arqamweb.com</div>
							</div>
							<svg
								class="relative w-4 h-4 text-muted-foreground group-hover:text-primary group-hover:translate-x-1 transition-all"
								viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
								<path d="M5 12h14M13 5l7 7-7 7"></path>
							</svg>
						</a></li>
					<li><a href="tel:+201118721404"
					       class="group relative flex items-start gap-4 p-5 rounded-2xl border border-border bg-card hover:border-primary/40 hover:shadow-elevated hover:-translate-y-0.5 transition-all duration-300 overflow-hidden">
							<div aria-hidden="true"
							     class="absolute -inset-px rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"
							     style="background: radial-gradient(60% 60% at 0% 0%, color-mix(in oklab, var(--primary) 18%, transparent), transparent 70%);"></div>
							<div
								class="relative flex-none w-11 h-11 rounded-xl bg-gradient-primary text-primary-foreground flex items-center justify-center shadow-glow">
								<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"
								     class="w-5 h-5">
									<path
										d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.93.37 1.83.72 2.69a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.39-1.29a2 2 0 0 1 2.11-.45c.86.35 1.76.59 2.69.72A2 2 0 0 1 22 16.92Z"></path>
								</svg>
							</div>
							<div class="relative flex-1 min-w-0">
								<div class="text-[11px] uppercase tracking-[0.2em] text-muted-foreground"><?php esc_html_e('Call us directly', 'arqamweb'); ?>
								</div>
								<div class="mt-1 font-semibold truncate">+201118721404</div>
							</div>
							<svg
								class="relative w-4 h-4 text-muted-foreground group-hover:text-primary group-hover:translate-x-1 transition-all"
								viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
								<path d="M5 12h14M13 5l7 7-7 7"></path>
							</svg>
						</a></li>
					<li><a href="https://wa.me/201118721404" target="_blank" rel="noopener noreferrer"
					       class="group relative flex items-start gap-4 p-5 rounded-2xl border border-border bg-card hover:border-primary/40 hover:shadow-elevated hover:-translate-y-0.5 transition-all duration-300 overflow-hidden">
							<div aria-hidden="true"
							     class="absolute -inset-px rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"
							     style="background: radial-gradient(60% 60% at 0% 0%, color-mix(in oklab, var(--primary) 18%, transparent), transparent 70%);"></div>
							<div
								class="relative flex-none w-11 h-11 rounded-xl bg-gradient-primary text-primary-foreground flex items-center justify-center shadow-glow">
								<svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
									<path
										d="M20 3.5A11.5 11.5 0 0 0 3.7 19.6L2 22l2.5-1.6A11.5 11.5 0 1 0 20 3.5Zm-8 19a9.5 9.5 0 0 1-4.8-1.3l-.3-.2-2.7.9.9-2.6-.2-.3a9.5 9.5 0 1 1 7.1 3.5Zm5.4-7.1c-.3-.1-1.7-.8-2-.9-.3-.1-.5-.1-.7.2-.2.3-.7.9-.9 1.1-.2.2-.3.2-.6.1-.3-.1-1.3-.5-2.4-1.5-.9-.8-1.5-1.7-1.7-2-.2-.3 0-.5.1-.6l.5-.6c.2-.2.2-.4.3-.6.1-.2 0-.4 0-.6 0-.2-.7-1.7-1-2.3-.3-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.4s1.1 2.8 1.2 3c.2.2 2.1 3.2 5 4.5 1.7.7 2.4.8 3.2.7.5-.1 1.7-.7 1.9-1.4.2-.7.2-1.3.2-1.4-.1-.1-.3-.2-.6-.3Z"></path>
								</svg>
							</div>
							<div class="relative flex-1 min-w-0">
								<div class="text-[11px] uppercase tracking-[0.2em] text-muted-foreground"><?php esc_html_e('WhatsApp', 'arqamweb'); ?></div>
								<div class="mt-1 font-semibold truncate">+201118721404</div>
							</div>
							<svg
								class="relative w-4 h-4 text-muted-foreground group-hover:text-primary group-hover:translate-x-1 transition-all"
								viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
								<path d="M5 12h14M13 5l7 7-7 7"></path>
							</svg>
						</a></li>
					<li><a href="#map"
					       class="group relative flex items-start gap-4 p-5 rounded-2xl border border-border bg-card hover:border-primary/40 hover:shadow-elevated hover:-translate-y-0.5 transition-all duration-300 overflow-hidden">
							<div aria-hidden="true"
							     class="absolute -inset-px rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"
							     style="background: radial-gradient(60% 60% at 0% 0%, color-mix(in oklab, var(--primary) 18%, transparent), transparent 70%);"></div>
							<div
								class="relative flex-none w-11 h-11 rounded-xl bg-gradient-primary text-primary-foreground flex items-center justify-center shadow-glow">
								<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"
								     class="w-5 h-5">
									<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 1 1 18 0Z"></path>
									<circle cx="12" cy="10" r="3"></circle>
								</svg>
							</div>
							<div class="relative flex-1 min-w-0">
								<div class="text-[11px] uppercase tracking-[0.2em] text-muted-foreground"><?php esc_html_e('Visit the studio', 'arqamweb'); ?>
								</div>
								<div class="mt-1 font-semibold truncate">44 Al Mehwar Al Markazy, Al Saraya Mall, Sheikh
									Zayed, Giza, Egypt
								</div>
							</div>
							<svg
								class="relative w-4 h-4 text-muted-foreground group-hover:text-primary group-hover:translate-x-1 transition-all"
								viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
								<path d="M5 12h14M13 5l7 7-7 7"></path>
							</svg>
						</a></li>
				</ul>
				<div class="grid grid-cols-2 gap-px bg-border rounded-2xl overflow-hidden border border-border">
					<div class="bg-card p-5 text-center">
						<div class="text-2xl font-semibold tracking-tight text-gradient">&lt;1 day</div>
						<div class="mt-1 text-[11px] uppercase tracking-[0.2em] text-muted-foreground"><?php esc_html_e('Average reply', 'arqamweb'); ?>
						</div>
					</div>
					<div class="bg-card p-5 text-center">
						<div class="text-2xl font-semibold tracking-tight text-gradient">120+</div>
						<div class="mt-1 text-[11px] uppercase tracking-[0.2em] text-muted-foreground"><?php esc_html_e('Projects shipped', 'arqamweb'); ?>
						</div>
					</div>
					<div class="bg-card p-5 text-center">
						<div class="text-2xl font-semibold tracking-tight text-gradient">4.9</div>
						<div class="mt-1 text-[11px] uppercase tracking-[0.2em] text-muted-foreground"><?php esc_html_e('Client rating', 'arqamweb'); ?>
						</div>
					</div>
					<div class="bg-card p-5 text-center">
						<div class="text-2xl font-semibold tracking-tight text-gradient">14 yrs</div>
						<div class="mt-1 text-[11px] uppercase tracking-[0.2em] text-muted-foreground"><?php esc_html_e('In market', 'arqamweb'); ?></div>
					</div>
				</div>
				<div class="rounded-2xl border border-border bg-surface p-5">
					<div class="text-[11px] uppercase tracking-[0.2em] text-muted-foreground"><?php esc_html_e('Studio hours', 'arqamweb'); ?></div>
					<div class="mt-2 text-sm"><?php esc_html_e('Sun – Thu · 10:00 – 19:00', 'arqamweb'); ?> <span class="text-muted-foreground"><?php esc_html_e('(GMT+2, Cairo)', 'arqamweb'); ?></span>
					</div>
				</div>
			</div>
			<div class="lg:col-span-7">
				<div class="relative rounded-[2rem] p-px overflow-hidden">
					<div aria-hidden="true" class="absolute inset-0 rounded-[2rem]"
					     style="background: conic-gradient(from 140deg, color-mix(in oklab, var(--primary) 60%, transparent), color-mix(in oklab, var(--primary-deep) 60%, transparent), transparent 60%, color-mix(in oklab, var(--primary) 50%, transparent));"></div>
					<div
						class="relative rounded-[calc(2rem-1px)] bg-card/95 backdrop-blur-xl border border-white/10 p-8 lg:p-10 shadow-elevated">
						<div class="flex items-center justify-between gap-4 mb-7">
							<div>
								<div class="text-xs font-semibold tracking-[0.3em] uppercase text-primary mb-2"><?php esc_html_e('— Start a brief', 'arqamweb'); ?>
								</div>
								<h3 class="text-2xl lg:text-3xl font-semibold tracking-tight"><?php esc_html_e('Tell us about the project.', 'arqamweb'); ?></h3></div>
							<div class="hidden md:flex items-center gap-2 text-xs text-muted-foreground"><span
									class="w-1.5 h-1.5 rounded-full bg-emerald-500 pulse-green"></span> <?php esc_html_e('Encrypted', 'arqamweb'); ?>
							</div>
						</div>
						<?php echo do_shortcode('[contact-form-7 id="4f85ced" title="Contact Us"]'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="map" class="py-24 lg:py-32 bg-surface border-t border-border/60">
		<div class="reveal container-x max-w-7xl mx-auto in">
			<div class="flex items-end justify-between mb-10">
				<div>
					<div class="text-xs font-semibold tracking-[0.3em] uppercase text-primary mb-3"><?php esc_html_e('— Find the studio', 'arqamweb'); ?>
					</div>
					<h2 class="text-3xl lg:text-5xl font-semibold tracking-tight"><?php esc_html_e('Sheikh Zayed,', 'arqamweb'); ?> <span
							class="italic font-light"><?php esc_html_e('Giza.', 'arqamweb'); ?></span></h2></div>
				<a href="https://maps.google.com/?q=44%20Al%20Mehwar%20Al%20Markazy%2C%20Al%20Saraya%20Mall%2C%20Sheikh%20Zayed%2C%20Giza%2C%20Egypt"
				   target="_blank" rel="noopener noreferrer"
				   class="hidden md:inline-flex items-center gap-2 text-sm font-semibold text-primary hover:gap-3 transition-all"><?php esc_html_e('Open in Google Maps', 'arqamweb'); ?>
					<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
					     stroke-width="2.5">
						<path d="M5 12h14M13 5l7 7-7 7"></path>
					</svg>
				</a></div>
			<div
				class="relative rounded-[2rem] overflow-hidden border border-border shadow-elevated aspect-[16/10] lg:aspect-[21/9] bg-gradient-dark">
				<iframe title="<?php esc_attr_e('Arqam Web studio location', 'arqamweb'); ?>"
				        src="https://www.google.com/maps?q=44%20Al%20Mehwar%20Al%20Markazy%2C%20Al%20Saraya%20Mall%2C%20Sheikh%20Zayed%2C%20Giza%2C%20Egypt&amp;output=embed"
				        class="absolute inset-0 w-full h-full grayscale-[20%] contrast-110 saturate-90" loading="lazy"
				        referrerpolicy="no-referrer-when-downgrade"></iframe>
				<div
					class="pointer-events-none absolute inset-0 bg-gradient-to-tr from-background/30 via-transparent to-transparent"></div>
				<div class="absolute bottom-6 left-6 right-6 sm:right-auto sm:max-w-sm pointer-events-auto">
					<div class="relative rounded-2xl p-px overflow-hidden">
						<div aria-hidden="true" class="absolute inset-0 rounded-2xl"
						     style="background: linear-gradient(135deg, color-mix(in oklab, var(--primary) 60%, transparent), transparent 60%);"></div>
						<div
							class="relative rounded-[calc(1rem-1px)] bg-card/90 backdrop-blur-xl border border-white/10 p-5 shadow-elevated">
							<div class="flex items-start gap-4">
								<div
									class="flex-none w-10 h-10 rounded-xl bg-gradient-primary text-primary-foreground flex items-center justify-center shadow-glow">
									<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"
									     class="w-5 h-5">
										<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 1 1 18 0Z"></path>
										<circle cx="12" cy="10" r="3"></circle>
									</svg>
								</div>
								<div class="flex-1">
									<div class="text-[11px] uppercase tracking-[0.2em] text-muted-foreground"><?php esc_html_e('Arqam Web · HQ', 'arqamweb'); ?>
									</div>
									<div class="mt-1 text-sm font-semibold leading-snug">44 Al Mehwar Al Markazy, Al
										Saraya Mall, Sheikh Zayed, Giza, Egypt
									</div>
								</div>
							</div>
							<a href="https://maps.google.com/?q=44%20Al%20Mehwar%20Al%20Markazy%2C%20Al%20Saraya%20Mall%2C%20Sheikh%20Zayed%2C%20Giza%2C%20Egypt"
							   target="_blank" rel="noopener noreferrer"
							   class="mt-4 inline-flex items-center gap-2 text-xs font-semibold text-primary"><?php esc_html_e('Get directions', 'arqamweb'); ?>
								<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
								     stroke-width="2.5">
									<path d="M5 12h14M13 5l7 7-7 7"></path>
								</svg>
							</a></div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="py-28 lg:py-40 border-t border-border/60 relative overflow-hidden">
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
		<div class="reveal container-x max-w-5xl mx-auto text-center relative in">
			<div class="text-xs font-semibold tracking-[0.3em] uppercase text-primary mb-6"><?php esc_html_e('— One more step', 'arqamweb'); ?></div>
			<h2 class="text-4xl md:text-6xl lg:text-7xl font-semibold tracking-tight leading-[1.02]"><?php esc_html_e('The next great brand', 'arqamweb'); ?> <br><span class="text-gradient italic font-light"><?php esc_html_e('starts with a message.', 'arqamweb'); ?></span></h2>
			<p class="mt-7 text-lg text-muted-foreground max-w-2xl mx-auto leading-relaxed"><?php esc_html_e("Send a brief, jump on WhatsApp, or pick up the phone. However you want to start — we're a reply away.", 'arqamweb'); ?></p>
			<div class="mt-10 flex flex-col sm:flex-row gap-4 items-center justify-center"><a
					href="mailto:info@arqamweb.com"
					class="inline-flex items-center gap-2 px-8 py-4 rounded-full bg-gradient-primary text-primary-foreground font-semibold shadow-glow hover:scale-[1.02] transition-transform">
					<?php esc_html_e('Email the studio', 'arqamweb'); ?>
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
					     stroke-width="2.5">
						<path d="M5 12h14M13 5l7 7-7 7"></path>
					</svg>
				</a>
				<a href="https://wa.me/201118721404" target="_blank" rel="noopener noreferrer"
				   class="inline-flex items-center gap-2 px-8 py-4 rounded-full border border-border bg-card font-semibold hover:bg-surface transition-colors">
					<?php esc_html_e('Chat on WhatsApp', 'arqamweb'); ?>
				</a>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>
