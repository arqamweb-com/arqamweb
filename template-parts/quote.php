<?php /* Template Name: Request a Quote */ ?>
<?php
if (!defined('ABSPATH')) exit;

get_header();
?>

<main>

	<!-- ── Hero ────────────────────────────────────────────────────────────── -->
	<section class="relative pt-28 lg:pt-36 pb-16 lg:pb-24 overflow-hidden">
		<div class="absolute inset-0 -z-10 bg-gradient-to-b from-secondary/40 via-background to-background"></div>
		<div class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
			<div class="absolute inset-0 opacity-[0.08]"
			     style="background: radial-gradient(80% 60% at 20% 40%, rgb(57, 158, 208) 0%, transparent 70%), radial-gradient(60% 50% at 80% 30%, rgb(54, 109, 176) 0%, transparent 70%);"></div>
			<div class="absolute rounded-full"
			     style="width: 320px; height: 320px; right: 4%; top: 5%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.18), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 14s ease-in-out 0s infinite normal none running glass-float-1;"></div>
			<div class="absolute rounded-full"
			     style="width: 200px; height: 200px; left: 5%; top: 55%; background: radial-gradient(circle at 30% 30%, rgba(54, 109, 176, 0.2), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 16s ease-in-out -4s infinite normal none running glass-float-2;"></div>
			<div class="absolute rounded-full"
			     style="width: 140px; height: 140px; left: 50%; top: 5%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.15), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 12s ease-in-out -8s infinite normal none running glass-float-3;"></div>
			<div class="absolute rounded-full"
			     style="width: 100px; height: 100px; left: 30%; top: 70%; background: radial-gradient(circle at 30% 30%, rgba(54, 109, 176, 0.16), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 15s ease-in-out -2s infinite normal none running glass-float-4;"></div>
		</div>

		<div class="reveal container-x max-w-6xl mx-auto relative z-10 in">

			<div class="arqamweb-breadcrumb">
				<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
			</div>

			<!-- Label -->
			<div
				class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-border bg-background/70 backdrop-blur text-[11px] font-semibold tracking-[0.18em] uppercase text-muted-foreground mb-7">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
				     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
				     class="w-3 h-3 text-primary" aria-hidden="true">
					<path d="M5 12h14M12 5l7 7-7 7"></path>
				</svg>
				<?php esc_html_e('Start your project', 'arqamweb'); ?>
			</div>

			<h1 class="text-5xl md:text-6xl lg:text-7xl xl:text-[5.5rem] font-semibold leading-[1.02] tracking-[-0.03em] max-w-4xl">
				<?php esc_html_e('Tell us about', 'arqamweb'); ?><br><span class="text-gradient"><?php esc_html_e('your project.', 'arqamweb'); ?></span>
			</h1>
			<p class="mt-8 text-lg md:text-xl text-muted-foreground max-w-2xl leading-relaxed">
				<?php esc_html_e("Select your service, answer a few focused questions, and we'll come back with a clear plan, timeline and investment — usually within 24 hours.", 'arqamweb'); ?>
			</p>

			<!-- Trust signals -->
			<div
				class="mt-12 flex flex-wrap items-center gap-6 lg:gap-10 text-foreground/80 border-t border-border/60 pt-10">
				<div class="flex items-center gap-3">
					<div class="w-9 h-9 rounded-xl bg-primary/10 flex items-center justify-center flex-shrink-0">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						     class="w-4 h-4 text-primary" aria-hidden="true">
							<path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
							<path d="M12 6v6l4 2"></path>
						</svg>
					</div>
					<div>
						<div class="text-sm font-semibold tracking-tight"><?php esc_html_e('Response in 24h', 'arqamweb'); ?></div>
						<div class="text-xs text-muted-foreground"><?php esc_html_e('Business days', 'arqamweb'); ?></div>
					</div>
				</div>
				<div class="flex items-center gap-3">
					<div class="w-9 h-9 rounded-xl bg-primary/10 flex items-center justify-center flex-shrink-0">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						     class="w-4 h-4 text-primary" aria-hidden="true">
							<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
						</svg>
					</div>
					<div>
						<div class="text-sm font-semibold tracking-tight"><?php esc_html_e('No commitment', 'arqamweb'); ?></div>
						<div class="text-xs text-muted-foreground"><?php esc_html_e('Free consultation', 'arqamweb'); ?></div>
					</div>
				</div>
				<div class="flex items-center gap-3">
					<div class="w-9 h-9 rounded-xl bg-primary/10 flex items-center justify-center flex-shrink-0">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						     class="w-4 h-4 text-primary" aria-hidden="true">
							<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
							<circle cx="9" cy="7" r="4"></circle>
							<path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"></path>
						</svg>
					</div>
					<div>
						<div class="text-sm font-semibold tracking-tight"><?php esc_html_e('Senior team', 'arqamweb'); ?></div>
						<div class="text-xs text-muted-foreground"><?php esc_html_e('No juniors, no handoffs', 'arqamweb'); ?></div>
					</div>
				</div>
				<div class="flex items-center gap-3">
					<div class="w-9 h-9 rounded-xl bg-primary/10 flex items-center justify-center flex-shrink-0">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						     class="w-4 h-4 text-primary" aria-hidden="true">
							<circle cx="12" cy="12" r="10"></circle>
							<circle cx="12" cy="12" r="6"></circle>
							<circle cx="12" cy="12" r="2"></circle>
						</svg>
					</div>
					<div>
						<div class="text-sm font-semibold tracking-tight"><?php esc_html_e('120+ projects', 'arqamweb'); ?></div>
						<div class="text-xs text-muted-foreground"><?php esc_html_e('Across 32 countries', 'arqamweb'); ?></div>
					</div>
				</div>
			</div>

		</div>
	</section>

	<!-- ── Form section ─────────────────────────────────────────────────────── -->
	<section class="relative bg-background border-t border-border/60">

		<?php echo do_shortcode('[arqam_form]') ?>

	</section>

</main>


<?php get_footer(); ?>
