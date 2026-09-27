<?php
/**
 * Pricing Page Bundles Section
 *
 * @package ArqamWeb
 */

if (!defined('ABSPATH')) exit;
?>

<section class="py-24 lg:py-32 bg-background">
	<div class="container-x max-w-7xl mx-auto">
		<div class="text-center mb-14">
			<div class="inline-flex items-center gap-3 mb-5"><span class="h-px w-10 bg-primary/60"></span><span
					class="text-[11px] font-semibold tracking-[0.22em] uppercase text-primary inline-flex items-center gap-1.5"><svg
						xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
						fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
						stroke-linejoin="round" class="lucide lucide-badge-percent w-3.5 h-3.5"
						aria-hidden="true"><path
							d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"></path><path
							d="m15 9-6 6"></path><path d="M9 9h.01"></path><path
							d="M15 15h.01"></path></svg> <?php esc_html_e('Bundles', 'arqamweb'); ?></span><span
					class="h-px w-10 bg-primary/60"></span></div>
			<h2 class="text-4xl lg:text-5xl xl:text-[3.5rem] font-semibold tracking-[-0.025em] leading-[1.05]">
				<?php esc_html_e('Save when you', 'arqamweb'); ?><br><span
					class="text-gradient"><?php esc_html_e('combine services.', 'arqamweb'); ?></span></h2>
			<p class="mt-6 text-muted-foreground text-base lg:text-lg max-w-2xl mx-auto"><?php esc_html_e('Three combos our clients pick most often. Same senior team, locked-in savings.', 'arqamweb'); ?></p>
		</div>
		<div class="grid gap-6 lg:gap-8 md:grid-cols-2 lg:grid-cols-3">
			<?php if (function_exists('awp_render_bundle_cards') && awp_service_has_packages('bundles')) : awp_render_bundle_cards('bundles'); else : ?>
				<div
					class="group relative overflow-hidden rounded-3xl bg-[#124f85] text-white p-8 lg:p-10 shadow-elevated border border-white/10 transition-all duration-500 hover:-translate-y-1.5 flex flex-col h-full">
					<div
						class="absolute -top-24 -right-24 w-72 h-72 rounded-full bg-primary/25 blur-3xl pointer-events-none"></div>
					<div class="relative flex-1">
						<div
							class="text-[10px] font-bold tracking-[0.22em] uppercase text-white/50"><?php esc_html_e('Brand Identity + Website', 'arqamweb'); ?>
						</div>
						<h3 class="mt-3 text-2xl lg:text-3xl font-semibold tracking-tight"><?php esc_html_e('Launch Bundle', 'arqamweb'); ?></h3>
						<p class="mt-2 text-sm text-white/65 leading-relaxed"><?php esc_html_e('Brand-new businesses going to market.', 'arqamweb'); ?></p>
						<div class="mt-7">
							<div class="flex items-baseline gap-3 flex-wrap"><span
									class="text-4xl lg:text-5xl font-semibold tracking-tight">$4,240</span><span
									class="text-sm text-white/40 line-through">$4,745</span></div>
							<div
								class="mt-3 inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-500/15 text-emerald-300 border border-emerald-500/25 text-[11px] font-bold tracking-wide">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
								     viewBox="0 0 24 24"
								     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
								     stroke-linejoin="round" class="lucide lucide-badge-percent w-3 h-3"
								     aria-hidden="true">
									<path
										d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"></path>
									<path d="m15 9-6 6"></path>
									<path d="M9 9h.01"></path>
									<path d="M15 15h.01"></path>
								</svg>
								<?php esc_html_e('Save', 'arqamweb'); ?> <!-- -->$505
							</div>
						</div>
						<p class="mt-6 text-sm text-white/75 leading-relaxed border-l border-white/15 pl-4">
							<?php esc_html_e('Essential Identity + Business Website — bundled & shipped together.', 'arqamweb'); ?></p>
					</div>
					<a href="/quote?plan=launch&amp;service=bundle"
					   class="relative mt-8 inline-flex items-center justify-center gap-2 px-6 py-3.5 text-sm font-semibold text-primary bg-white rounded-full transition-all hover:-translate-y-0.5 hover:shadow-glow"><?php esc_html_e('Get', 'arqamweb'); ?>
						<!-- --><?php esc_html_e('Launch Bundle', 'arqamweb'); ?>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
						     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
						     stroke-linejoin="round" class="lucide lucide-arrow-right w-4 h-4"
						     aria-hidden="true">
							<path d="M5 12h14"></path>
							<path d="m12 5 7 7-7 7"></path>
						</svg>
					</a></div>
				<div
					class="group relative overflow-hidden rounded-3xl bg-[#124f85] text-white p-8 lg:p-10 shadow-elevated border border-white/10 transition-all duration-500 hover:-translate-y-1.5 flex flex-col h-full">
					<div
						class="absolute -top-24 -right-24 w-72 h-72 rounded-full bg-primary/25 blur-3xl pointer-events-none"></div>
					<div
						class="absolute top-5 right-5 inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-white/10 border border-white/20 text-[10px] font-bold tracking-[0.18em] uppercase text-white/90">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
						     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
						     stroke-linejoin="round" class="lucide lucide-sparkles w-3 h-3" aria-hidden="true">
							<path
								d="M11.017 2.814a1 1 0 0 1 1.966 0l1.051 5.558a2 2 0 0 0 1.594 1.594l5.558 1.051a1 1 0 0 1 0 1.966l-5.558 1.051a2 2 0 0 0-1.594 1.594l-1.051 5.558a1 1 0 0 1-1.966 0l-1.051-5.558a2 2 0 0 0-1.594-1.594l-5.558-1.051a1 1 0 0 1 0-1.966l5.558-1.051a2 2 0 0 0 1.594-1.594z"></path>
							<path d="M20 2v4"></path>
							<path d="M22 4h-4"></path>
							<circle cx="4" cy="20" r="2"></circle>
						</svg>
						<?php esc_html_e('Popular', 'arqamweb'); ?>
					</div>
					<div class="relative flex-1">
						<div
							class="text-[10px] font-bold tracking-[0.22em] uppercase text-white/50"><?php esc_html_e('Website + SEO (3 months)', 'arqamweb'); ?>
						</div>
						<h3 class="mt-3 text-2xl lg:text-3xl font-semibold tracking-tight"><?php esc_html_e('Growth Bundle', 'arqamweb'); ?></h3>
						<p class="mt-2 text-sm text-white/65 leading-relaxed"><?php esc_html_e('Brands that want traffic from day one.', 'arqamweb'); ?></p>
						<div class="mt-7">
							<div class="flex items-baseline gap-3 flex-wrap"><span
									class="text-4xl lg:text-5xl font-semibold tracking-tight">$7,440</span><span
									class="text-sm text-white/40 line-through">$8,160</span></div>
							<div
								class="mt-3 inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-500/15 text-emerald-300 border border-emerald-500/25 text-[11px] font-bold tracking-wide">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
								     viewBox="0 0 24 24"
								     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
								     stroke-linejoin="round" class="lucide lucide-badge-percent w-3 h-3"
								     aria-hidden="true">
									<path
										d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"></path>
									<path d="m15 9-6 6"></path>
									<path d="M9 9h.01"></path>
									<path d="M15 15h.01"></path>
								</svg>
								<?php esc_html_e('Save', 'arqamweb'); ?> <!-- -->$720
							</div>
						</div>
						<p class="mt-6 text-sm text-white/75 leading-relaxed border-l border-white/15 pl-4">
							<?php esc_html_e('Business Website + 3 months National Growth SEO.', 'arqamweb'); ?></p>
					</div>
					<a href="/quote?plan=growth&amp;service=bundle"
					   class="relative mt-8 inline-flex items-center justify-center gap-2 px-6 py-3.5 text-sm font-semibold text-primary bg-white rounded-full transition-all hover:-translate-y-0.5 hover:shadow-glow"><?php esc_html_e('Get', 'arqamweb'); ?>
						<!-- --><?php esc_html_e('Growth Bundle', 'arqamweb'); ?>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
						     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
						     stroke-linejoin="round" class="lucide lucide-arrow-right w-4 h-4"
						     aria-hidden="true">
							<path d="M5 12h14"></path>
							<path d="m12 5 7 7-7 7"></path>
						</svg>
					</a></div>
				<div
					class="group relative overflow-hidden rounded-3xl bg-[#124f85] text-white p-8 lg:p-10 shadow-elevated border border-white/10 transition-all duration-500 hover:-translate-y-1.5 flex flex-col h-full">
					<div
						class="absolute -top-24 -right-24 w-72 h-72 rounded-full bg-primary/25 blur-3xl pointer-events-none"></div>
					<div class="relative flex-1">
						<div
							class="text-[10px] font-bold tracking-[0.22em] uppercase text-white/50"><?php esc_html_e('Brand + Social (3 months)', 'arqamweb'); ?>
						</div>
						<h3 class="mt-3 text-2xl lg:text-3xl font-semibold tracking-tight"><?php esc_html_e('Brand Presence Bundle', 'arqamweb'); ?></h3>
						<p class="mt-2 text-sm text-white/65 leading-relaxed"><?php esc_html_e('Existing businesses needing a refresh + visibility.', 'arqamweb'); ?></p>
						<div class="mt-7">
							<div class="flex items-baseline gap-3 flex-wrap"><span
									class="text-4xl lg:text-5xl font-semibold tracking-tight">$7,975</span><span
									class="text-sm text-white/40 line-through">$8,695</span></div>
							<div
								class="mt-3 inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-500/15 text-emerald-300 border border-emerald-500/25 text-[11px] font-bold tracking-wide">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
								     viewBox="0 0 24 24"
								     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
								     stroke-linejoin="round" class="lucide lucide-badge-percent w-3 h-3"
								     aria-hidden="true">
									<path
										d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"></path>
									<path d="m15 9-6 6"></path>
									<path d="M9 9h.01"></path>
									<path d="M15 15h.01"></path>
								</svg>
								<?php esc_html_e('Save', 'arqamweb'); ?> <!-- -->$720
							</div>
						</div>
						<p class="mt-6 text-sm text-white/75 leading-relaxed border-l border-white/15 pl-4">
							<?php esc_html_e('Brand System Pro + 3 months Growth Social Media.', 'arqamweb'); ?></p>
					</div>
					<a href="/quote?plan=brand-presence&amp;service=bundle"
					   class="relative mt-8 inline-flex items-center justify-center gap-2 px-6 py-3.5 text-sm font-semibold text-primary bg-white rounded-full transition-all hover:-translate-y-0.5 hover:shadow-glow"><?php esc_html_e('Get', 'arqamweb'); ?>
						<!-- --><?php esc_html_e('Brand Presence Bundle', 'arqamweb'); ?>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
						     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
						     stroke-linejoin="round" class="lucide lucide-arrow-right w-4 h-4"
						     aria-hidden="true">
							<path d="M5 12h14"></path>
							<path d="m12 5 7 7-7 7"></path>
						</svg>
					</a></div>
			<?php endif; ?>
		</div>
	</div>
</section>
