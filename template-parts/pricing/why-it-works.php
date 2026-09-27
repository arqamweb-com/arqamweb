<?php
/**
 * Pricing Page Why It Works Section
 *
 * @package ArqamWeb
 */

if (!defined('ABSPATH')) exit;
?>

<section class="py-20 lg:py-28 bg-secondary/30">
	<div class="reveal container-x max-w-7xl mx-auto">
		<div class="text-center mb-14">
			<div class="inline-flex items-center gap-3 mb-5"><span class="h-px w-10 bg-primary/60"></span><span
					class="text-[11px] font-semibold tracking-[0.22em] uppercase text-primary"><?php esc_html_e('Why it works', 'arqamweb'); ?></span><span
					class="h-px w-10 bg-primary/60"></span></div>
			<h2 class="text-4xl lg:text-5xl xl:text-[3.5rem] font-semibold tracking-[-0.025em] leading-[1.05] max-w-3xl mx-auto">
				<?php esc_html_e('Why this pricing works for', 'arqamweb'); ?><!-- --> <span
					class="text-gradient"><?php esc_html_e('Saudi & Gulf brands.', 'arqamweb'); ?></span>
			</h2></div>
		<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
			<div class="p-7 rounded-3xl border border-border bg-background shadow-card">
				<div
					class="inline-flex items-center justify-center w-11 h-11 rounded-2xl bg-gradient-primary text-primary-foreground shadow-soft">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
					     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
					     stroke-linejoin="round" class="lucide lucide-trophy w-5 h-5" aria-hidden="true">
						<path d="M10 14.66v1.626a2 2 0 0 1-.976 1.696A5 5 0 0 0 7 21.978"></path>
						<path d="M14 14.66v1.626a2 2 0 0 0 .976 1.696A5 5 0 0 1 17 21.978"></path>
						<path d="M18 9h1.5a1 1 0 0 0 0-5H18"></path>
						<path d="M4 22h16"></path>
						<path d="M6 9a6 6 0 0 0 12 0V3a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1z"></path>
						<path d="M6 9H4.5a1 1 0 0 1 0-5H6"></path>
					</svg>
				</div>
				<h3 class="mt-5 text-lg font-semibold tracking-tight"><?php esc_html_e('Senior team. Local-market rates.', 'arqamweb'); ?></h3>
				<p class="mt-2 text-sm text-muted-foreground leading-relaxed"><?php esc_html_e('You get a senior-led team without paying agency-of-record retainers — 30–40% below comparable Riyadh and Jeddah studios.', 'arqamweb'); ?></p>
			</div>
			<div class="p-7 rounded-3xl border border-border bg-background shadow-card">
				<div
					class="inline-flex items-center justify-center w-11 h-11 rounded-2xl bg-gradient-primary text-primary-foreground shadow-soft">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
					     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
					     stroke-linejoin="round" class="lucide lucide-target w-5 h-5" aria-hidden="true">
						<circle cx="12" cy="12" r="10"></circle>
						<circle cx="12" cy="12" r="6"></circle>
						<circle cx="12" cy="12" r="2"></circle>
					</svg>
				</div>
				<h3 class="mt-5 text-lg font-semibold tracking-tight"><?php esc_html_e('Outcome-priced, not hour-priced.', 'arqamweb'); ?></h3>
				<p class="mt-2 text-sm text-muted-foreground leading-relaxed"><?php esc_html_e('Plans are scoped around what you ship, not how many hours we logged. No timesheets. No surprise invoices, ever.', 'arqamweb'); ?></p>
			</div>
			<div class="p-7 rounded-3xl border border-border bg-background shadow-card">
				<div
					class="inline-flex items-center justify-center w-11 h-11 rounded-2xl bg-gradient-primary text-primary-foreground shadow-soft">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
					     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
					     stroke-linejoin="round" class="lucide lucide-zap w-5 h-5" aria-hidden="true">
						<path
							d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"></path>
					</svg>
				</div>
				<h3 class="mt-5 text-lg font-semibold tracking-tight"><?php esc_html_e('Built to scale, not to lock you in.', 'arqamweb'); ?></h3>
				<p class="mt-2 text-sm text-muted-foreground leading-relaxed"><?php esc_html_e('3-month retainers, not 12-month contracts. Upgrade, downgrade, or pause anytime after the minimum term.', 'arqamweb'); ?></p>
			</div>
		</div>
	</div>
</section>
