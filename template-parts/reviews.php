<?php /* Template Name: Reviews */ ?>
<?php

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
get_header();

?>
<main>
	<section class="relative pt-40 lg:pt-56 pb-24 lg:pb-36 overflow-hidden bg-gradient-dark text-primary-foreground">
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
		<div class="absolute inset-0 grid-bg opacity-[0.15]"></div>
		<div
			class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-primary/50 to-transparent"></div>
		<div
			class="absolute inset-x-0 bottom-0 h-px bg-gradient-to-r from-transparent via-primary/30 to-transparent"></div>
		<div class="container-x max-w-7xl mx-auto relative">
			<div class="arqamweb-breadcrumb arqamweb-breadcrumb--dark">
				<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
			</div>
			<div class="grid lg:grid-cols-12 gap-10 lg:gap-14 items-center">
				<div class="lg:col-span-7">
					<div
						class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full border border-white/15 bg-white/5 backdrop-blur-md text-[11px] font-bold tracking-[0.22em] text-white/85 mb-7 animate-[fade-in_0.6s_ease-out]">
						<span class="relative flex h-1.5 w-1.5"><span
								class="absolute inline-flex h-full w-full rounded-full bg-primary opacity-70 animate-ping"></span><span
								class="relative inline-flex h-1.5 w-1.5 rounded-full bg-primary"></span></span><?php esc_html_e('CLIENT VOICES · VERIFIED', 'arqamweb'); ?>
					</div>
					<h1 class="text-5xl sm:text-6xl lg:text-[5.5rem] font-semibold tracking-[-0.04em] leading-[0.98]">
						<?php esc_html_e('Real words from', 'arqamweb'); ?> <span class="relative inline-block"><span
								class="bg-gradient-to-r from-white via-white to-[color:var(--brand-primary)] bg-clip-text text-transparent"><?php esc_html_e('real clients.', 'arqamweb'); ?></span><span
								class="absolute -bottom-2 left-0 right-0 h-px bg-gradient-to-r from-transparent via-primary to-transparent"></span></span>
					</h1>
					<p class="mt-7 text-lg lg:text-xl text-primary-foreground/65 max-w-2xl leading-relaxed"><?php esc_html_e('Fifteen years. Ten countries. Three hundred brands. Every review on this page is verified, unedited, and earned the slow way — through work that actually moved the needle.', 'arqamweb'); ?></p>
					<div class="mt-10 flex flex-wrap items-center gap-x-8 gap-y-5">
						<div class="flex items-center gap-3">
							<div class="relative">
								<div class="flex gap-0.5 text-primary">
									<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
									     fill="currentColor" stroke="currentColor" stroke-width="1.5"
									     stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star"
									     aria-hidden="true">
										<path
											d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
									</svg>
									<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
									     fill="currentColor" stroke="currentColor" stroke-width="1.5"
									     stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star"
									     aria-hidden="true">
										<path
											d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
									</svg>
									<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
									     fill="currentColor" stroke="currentColor" stroke-width="1.5"
									     stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star"
									     aria-hidden="true">
										<path
											d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
									</svg>
									<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
									     fill="currentColor" stroke="currentColor" stroke-width="1.5"
									     stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star"
									     aria-hidden="true">
										<path
											d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
									</svg>
									<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
									     fill="currentColor" stroke="currentColor" stroke-width="1.5"
									     stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star"
									     aria-hidden="true">
										<path
											d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
									</svg>
								</div>
								<div class="absolute -inset-2 bg-primary/30 blur-xl rounded-full -z-10"></div>
							</div>
							<div>
								<div class="text-2xl font-semibold tabular-nums">4.9 / 5</div>
								<div class="text-xs text-primary-foreground/55"><?php esc_html_e('80+ verified reviews', 'arqamweb'); ?></div>
							</div>
						</div>
						<div class="h-12 w-px bg-white/10"></div>
						<div class="flex items-center gap-3">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
							     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
							     stroke-linejoin="round" class="lucide lucide-circle-check w-5 h-5 text-primary"
							     aria-hidden="true">
								<circle cx="12" cy="12" r="10"></circle>
								<path d="m9 12 2 2 4-4"></path>
							</svg>
							<div>
								<div class="text-2xl font-semibold tabular-nums">98%</div>
								<div class="text-xs text-primary-foreground/55"><?php esc_html_e('client retention', 'arqamweb'); ?></div>
							</div>
						</div>
						<div class="h-12 w-px bg-white/10 hidden sm:block"></div>
						<div class="flex items-center gap-3">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
							     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
							     stroke-linejoin="round" class="lucide lucide-map-pin w-5 h-5 text-primary"
							     aria-hidden="true">
								<path
									d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
								<circle cx="12" cy="10" r="3"></circle>
							</svg>
							<div>
								<div class="text-2xl font-semibold tabular-nums">10+</div>
								<div class="text-xs text-primary-foreground/55"><?php esc_html_e('countries served', 'arqamweb'); ?></div>
							</div>
						</div>
					</div>
				</div>
				<div class="lg:col-span-5 relative h-[460px] hidden lg:block">
					<div
						class="absolute w-[280px] rounded-2xl border border-white/15 bg-white/[0.04] backdrop-blur-xl p-5 shadow-[0_30px_80px_-30px_rgba(0,0,0,0.8)] animate-float-slow"
						style="top: 0%; left: 10%; transform: rotate(-4deg); animation-delay: 0s;">
						<div class="flex gap-0.5 text-primary">
							<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
							     fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
							     stroke-linejoin="round" class="lucide lucide-star" aria-hidden="true">
								<path
									d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
							</svg>
							<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
							     fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
							     stroke-linejoin="round" class="lucide lucide-star" aria-hidden="true">
								<path
									d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
							</svg>
							<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
							     fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
							     stroke-linejoin="round" class="lucide lucide-star" aria-hidden="true">
								<path
									d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
							</svg>
							<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
							     fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
							     stroke-linejoin="round" class="lucide lucide-star" aria-hidden="true">
								<path
									d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
							</svg>
							<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
							     fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
							     stroke-linejoin="round" class="lucide lucide-star" aria-hidden="true">
								<path
									d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
							</svg>
						</div>
						<p class="mt-3 text-sm text-white/90 leading-relaxed">"<?php esc_html_e('Traffic tripled in 6 months.', 'arqamweb'); ?>"</p>
						<div class="mt-4 flex items-center gap-2 text-xs text-white/60"><span
								class="text-lg leading-none">🇸🇦</span><span class="font-semibold text-white/85">Khalid A.</span><span>·</span><span><?php esc_html_e('Marketing Dir.', 'arqamweb'); ?></span>
						</div>
					</div>
					<div
						class="absolute w-[280px] rounded-2xl border border-white/15 bg-white/[0.04] backdrop-blur-xl p-5 shadow-[0_30px_80px_-30px_rgba(0,0,0,0.8)] animate-float-slow"
						style="top: 22%; left: 45%; transform: rotate(3deg); animation-delay: 0.4s;">
						<div class="flex gap-0.5 text-primary">
							<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
							     fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
							     stroke-linejoin="round" class="lucide lucide-star" aria-hidden="true">
								<path
									d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
							</svg>
							<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
							     fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
							     stroke-linejoin="round" class="lucide lucide-star" aria-hidden="true">
								<path
									d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
							</svg>
							<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
							     fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
							     stroke-linejoin="round" class="lucide lucide-star" aria-hidden="true">
								<path
									d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
							</svg>
							<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
							     fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
							     stroke-linejoin="round" class="lucide lucide-star" aria-hidden="true">
								<path
									d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
							</svg>
							<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
							     fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
							     stroke-linejoin="round" class="lucide lucide-star" aria-hidden="true">
								<path
									d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
							</svg>
						</div>
						<p class="mt-3 text-sm text-white/90 leading-relaxed">"<?php esc_html_e("Best agency we've worked with.", 'arqamweb'); ?>"</p>
						<div class="mt-4 flex items-center gap-2 text-xs text-white/60"><span
								class="text-lg leading-none">🇬🇧</span><span
								class="font-semibold text-white/85">Sarah W.</span><span>·</span><span><?php esc_html_e('Founder', 'arqamweb'); ?></span>
						</div>
					</div>
					<div
						class="absolute w-[280px] rounded-2xl border border-white/15 bg-white/[0.04] backdrop-blur-xl p-5 shadow-[0_30px_80px_-30px_rgba(0,0,0,0.8)] animate-float-slow"
						style="top: 52%; left: 5%; transform: rotate(2deg); animation-delay: 0.8s;">
						<div class="flex gap-0.5 text-primary">
							<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
							     fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
							     stroke-linejoin="round" class="lucide lucide-star" aria-hidden="true">
								<path
									d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
							</svg>
							<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
							     fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
							     stroke-linejoin="round" class="lucide lucide-star" aria-hidden="true">
								<path
									d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
							</svg>
							<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
							     fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
							     stroke-linejoin="round" class="lucide lucide-star" aria-hidden="true">
								<path
									d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
							</svg>
							<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
							     fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
							     stroke-linejoin="round" class="lucide lucide-star" aria-hidden="true">
								<path
									d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
							</svg>
							<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
							     fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
							     stroke-linejoin="round" class="lucide lucide-star" aria-hidden="true">
								<path
									d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
							</svg>
						</div>
						<p class="mt-3 text-sm text-white/90 leading-relaxed">"<?php esc_html_e('Charging 30% more, closing faster.', 'arqamweb'); ?>"</p>
						<div class="mt-4 flex items-center gap-2 text-xs text-white/60"><span
								class="text-lg leading-none">🇺🇸</span><span class="font-semibold text-white/85">Jennifer P.</span><span>·</span><span><?php esc_html_e('Co-founder', 'arqamweb'); ?></span>
						</div>
					</div>
					<div
						class="absolute w-[280px] rounded-2xl border border-white/15 bg-white/[0.04] backdrop-blur-xl p-5 shadow-[0_30px_80px_-30px_rgba(0,0,0,0.8)] animate-float-slow"
						style="top: 72%; left: 40%; transform: rotate(-3deg); animation-delay: 1.2s;">
						<div class="flex gap-0.5 text-primary">
							<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
							     fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
							     stroke-linejoin="round" class="lucide lucide-star" aria-hidden="true">
								<path
									d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
							</svg>
							<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
							     fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
							     stroke-linejoin="round" class="lucide lucide-star" aria-hidden="true">
								<path
									d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
							</svg>
							<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
							     fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
							     stroke-linejoin="round" class="lucide lucide-star" aria-hidden="true">
								<path
									d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
							</svg>
							<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
							     fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
							     stroke-linejoin="round" class="lucide lucide-star" aria-hidden="true">
								<path
									d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
							</svg>
							<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
							     fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
							     stroke-linejoin="round" class="lucide lucide-star" aria-hidden="true">
								<path
									d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
							</svg>
						</div>
						<p class="mt-3 text-sm text-white/90 leading-relaxed">"<?php esc_html_e('Senior, strategic, honest.', 'arqamweb'); ?>"</p>
						<div class="mt-4 flex items-center gap-2 text-xs text-white/60"><span
								class="text-lg leading-none">🇦🇪</span><span class="font-semibold text-white/85">Mohammed H.</span><span>·</span><span><?php esc_html_e('CEO', 'arqamweb'); ?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
	$_video_testimonial_posts = get_posts([
		'post_type' => 'testimonial',
		'posts_per_page' => 3,
		'post_status' => 'publish',
		'orderby' => 'menu_order',
		'order' => 'ASC',
	]);
	$_videoTestimonials = [];
	foreach ($_video_testimonial_posts as $_vt) {
		$_videoTestimonials[] = [
			'id' => $_vt->ID,
			'video' => get_field('video_id', $_vt->ID),
			'is_short' => (bool)get_field('is_short', $_vt->ID),
			'category' => get_field('category', $_vt->ID),
			'snippet' => get_field('snippet', $_vt->ID),
			'client' => $_vt->post_title,
		];
	}
	?>
	<?php if (!empty($_videoTestimonials)) : ?>
		<section class="aw-video-testimonials relative py-28 lg:py-36 overflow-hidden bg-[#05080f] text-white">
			<div class="pointer-events-none absolute inset-0" aria-hidden="true">
				<div class="aw-video-testimonials__orb aw-video-testimonials__orb--one"></div>
				<div class="aw-video-testimonials__orb aw-video-testimonials__orb--two"></div>
				<div class="aw-video-testimonials__orb aw-video-testimonials__orb--three"></div>
				<div class="aw-video-testimonials__grid"></div>
			</div>
			<div class="container relative">
				<div class="max-w-3xl mb-14">
					<div class="text-xs font-semibold tracking-[0.22em] uppercase text-primary mb-4"><?php esc_html_e('Video Testimonials', 'arqamweb'); ?>
					</div>
					<h2 class="text-4xl lg:text-[3.5rem] font-semibold tracking-[-0.035em] leading-[1.05]"><?php esc_html_e('See clients tell the story', 'arqamweb'); ?> <span
							class="bg-gradient-to-r from-white via-white to-[color:var(--brand-primary)] bg-clip-text text-transparent"><?php esc_html_e('in their own words.', 'arqamweb'); ?></span>
					</h2>
					<p class="mt-5 text-white/60 text-lg max-w-2xl"><?php esc_html_e('Hover any card to preview silently. Click to watch the full conversation.', 'arqamweb'); ?></p>
				</div>
				<div class="grid lg:grid-cols-12 gap-6 lg:items-stretch">
					<?php
					$_vt_featured = $_videoTestimonials[0];
					$_vt_stacked = array_slice($_videoTestimonials, 1);
					?>
					<div class="lg:col-span-5 aw-video-testimonials__item aw-video-testimonials__item--featured">
						<?php
						$video = $_vt_featured;
						$is_featured = true;
						$youtube_id = $video['video'] ?? '';
						$snippet = $video['snippet'] ?? '';
						$category = $video['category'] ?? '';
						$client = $video['client'] ?? '';
						$is_short = !empty($video['is_short']);
						$thumb = 'https://i.ytimg.com/vi/' . rawurlencode($youtube_id) . '/maxresdefault.jpg';
						$fallback = 'https://i.ytimg.com/vi/' . rawurlencode($youtube_id) . '/hqdefault.jpg';
						?>
						<button type="button"
						        class="aw-video-card group aw-video-card--featured aspect-[9/16]"
						        data-video-testimonial-open
						        data-youtube-id="<?php echo esc_attr($youtube_id); ?>"
						        data-video-short="<?php echo $is_short ? 'true' : 'false'; ?>"
						        aria-label="<?php echo esc_attr(sprintf(__('Play testimonial: %s', 'arqamweb'), $snippet)); ?>">
							<img src="<?php echo esc_url($thumb); ?>" alt="" loading="lazy" decoding="async"
							     class="aw-video-card__image"
							     onerror="this.onerror=null;this.src='<?php echo esc_url($fallback); ?>';">
							<span class="aw-video-card__shade" aria-hidden="true"></span>
							<span class="aw-video-card__tint" aria-hidden="true"></span>
							<span class="aw-video-card__sweep" aria-hidden="true"></span>
							<span class="aw-video-card__meta">
							<span
								class="aw-video-card__verified"><?php echo arqam_icon('check'); ?> <?php esc_html_e('Verified Client', 'arqamweb'); ?></span>
							<span class="aw-video-card__category"><?php echo esc_html($category); ?></span>
						</span>
							<span class="aw-video-card__play-wrap">
							<span class="aw-video-card__play aw-video-card__play--lg">
								<span class="aw-video-card__play-glow" aria-hidden="true"></span>
								<span class="aw-video-card__play-ping" aria-hidden="true"></span>
								<svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path
										d="M8 5v14l11-7z"></path></svg>
							</span>
						</span>
							<span class="aw-video-card__copy">
							<span class="aw-video-card__client"><?php echo esc_html($client); ?></span>
							<span
								class="aw-video-card__quote aw-video-card__quote--featured">"<?php echo esc_html($snippet); ?>"</span>
						</span>
							<span class="aw-video-card__edge" aria-hidden="true"></span>
						</button>
					</div>
					<div class="lg:col-span-7 flex flex-col gap-6">
						<?php foreach ($_vt_stacked as $_stacked_index => $video) : ?>
							<div class="aw-video-testimonials__item aw-video-testimonials__item--stacked flex-1 min-h-0"
							     style="animation-delay: <?php echo esc_attr(0.9 + ($_stacked_index * 0.2)); ?>s;">
								<?php
								$youtube_id = $video['video'] ?? '';
								$snippet = $video['snippet'] ?? '';
								$category = $video['category'] ?? '';
								$client = $video['client'] ?? '';
								$is_short = !empty($video['is_short']);
								$thumb = 'https://i.ytimg.com/vi/' . rawurlencode($youtube_id) . '/maxresdefault.jpg';
								$fallback = 'https://i.ytimg.com/vi/' . rawurlencode($youtube_id) . '/hqdefault.jpg';
								?>
								<button type="button"
								        class="aw-video-card group aw-video-card--stacked"
								        data-video-testimonial-open
								        data-youtube-id="<?php echo esc_attr($youtube_id); ?>"
								        data-video-short="<?php echo $is_short ? 'true' : 'false'; ?>"
								        aria-label="<?php echo esc_attr(sprintf(__('Play testimonial: %s', 'arqamweb'), $snippet)); ?>">
									<img src="<?php echo esc_url($thumb); ?>" alt="" loading="lazy" decoding="async"
									     class="aw-video-card__image"
									     onerror="this.onerror=null;this.src='<?php echo esc_url($fallback); ?>';">
									<span class="aw-video-card__shade" aria-hidden="true"></span>
									<span class="aw-video-card__tint" aria-hidden="true"></span>
									<span class="aw-video-card__sweep" aria-hidden="true"></span>
									<span class="aw-video-card__meta">
									<span class="aw-video-card__verified"><?php echo arqam_icon('check'); ?> <?php esc_html_e('Verified Client', 'arqamweb'); ?></span>
									<span class="aw-video-card__category"><?php echo esc_html($category); ?></span>
								</span>
									<span class="aw-video-card__play-wrap">
									<span class="aw-video-card__play">
										<span class="aw-video-card__play-glow" aria-hidden="true"></span>
										<span class="aw-video-card__play-ping" aria-hidden="true"></span>
										<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"
										     aria-hidden="true"><path d="M8 5v14l11-7z"></path></svg>
									</span>
								</span>
									<span class="aw-video-card__copy">
									<span class="aw-video-card__client"><?php echo esc_html($client); ?></span>
									<span class="aw-video-card__quote">"<?php echo esc_html($snippet); ?>"</span>
								</span>
									<span class="aw-video-card__edge" aria-hidden="true"></span>
								</button>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</section>
		<div class="aw-video-modal" data-video-testimonial-modal hidden>
			<div class="aw-video-modal__backdrop" data-video-testimonial-close></div>
			<button type="button" class="aw-video-modal__close" data-video-testimonial-close aria-label="<?php esc_attr_e('Close video', 'arqamweb'); ?>">
				<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
				     aria-hidden="true">
					<path d="M6 6l12 12M6 18L18 6"></path>
				</svg>
			</button>
			<div class="aw-video-modal__frame" data-video-testimonial-frame role="dialog" aria-modal="true"
			     aria-label="<?php esc_attr_e('Video testimonial', 'arqamweb'); ?>">
				<div class="aw-video-modal__glow"></div>
				<iframe data-video-testimonial-iframe title="<?php esc_attr_e('Video testimonial', 'arqamweb'); ?>"
				        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
				        allowfullscreen></iframe>
			</div>
		</div>
	<?php endif; ?>
	<section class="relative py-24 lg:py-32 bg-gradient-dark text-white overflow-hidden">
		<div class="absolute inset-0 grid-bg opacity-20"></div>
		<div class="absolute -top-40 right-0 w-[600px] h-[600px] rounded-full bg-primary/20 blur-3xl"></div>
		<div class="container-x max-w-7xl mx-auto relative">
			<div class="max-w-3xl mb-16">
				<div class="text-xs font-semibold tracking-[0.22em] uppercase text-primary mb-4"><?php esc_html_e('Trust by the numbers', 'arqamweb'); ?>
				</div>
				<h2 class="text-4xl lg:text-6xl font-semibold tracking-[-0.035em] leading-[1.05]"><?php esc_html_e("Reputation isn't claimed.", 'arqamweb'); ?> <span
						class="bg-gradient-to-r from-white to-[color:var(--brand-primary)] bg-clip-text text-transparent"><?php esc_html_e("It's measured.", 'arqamweb'); ?></span>
				</h2></div>
			<div class="grid grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-6">
				<div class="relative">
					<div class="relative group">
						<div
							class="absolute -inset-6 bg-primary/15 blur-3xl rounded-full opacity-50 group-hover:opacity-80 transition-opacity"></div>
						<div class="relative">
							<div
								class="text-6xl lg:text-7xl font-semibold tracking-[-0.045em] tabular-nums leading-[0.95]">
								4.9<span
									class="bg-gradient-to-br from-[color:var(--brand-primary)] to-[color:var(--brand-secondary)] bg-clip-text text-transparent">★</span>
							</div>
							<div class="mt-4 text-base font-semibold"><?php esc_html_e('Average rating', 'arqamweb'); ?></div>
							<div class="text-sm text-white/55 mt-1"><?php esc_html_e('out of 5.0 — 80+ reviews', 'arqamweb'); ?></div>
						</div>
					</div>
				</div>
				<div class="relative">
					<div class="hidden lg:block absolute -left-3 top-2 bottom-2 w-px bg-white/10"></div>
					<div class="relative group">
						<div
							class="absolute -inset-6 bg-primary/15 blur-3xl rounded-full opacity-50 group-hover:opacity-80 transition-opacity"></div>
						<div class="relative">
							<div
								class="text-6xl lg:text-7xl font-semibold tracking-[-0.045em] tabular-nums leading-[0.95]">
								98<span
									class="bg-gradient-to-br from-[color:var(--brand-primary)] to-[color:var(--brand-secondary)] bg-clip-text text-transparent">%</span>
							</div>
							<div class="mt-4 text-base font-semibold"><?php esc_html_e('Client retention', 'arqamweb'); ?></div>
							<div class="text-sm text-white/55 mt-1"><?php esc_html_e('long-term partnerships', 'arqamweb'); ?></div>
						</div>
					</div>
				</div>
				<div class="relative">
					<div class="hidden lg:block absolute -left-3 top-2 bottom-2 w-px bg-white/10"></div>
					<div class="relative group">
						<div
							class="absolute -inset-6 bg-primary/15 blur-3xl rounded-full opacity-50 group-hover:opacity-80 transition-opacity"></div>
						<div class="relative">
							<div
								class="text-6xl lg:text-7xl font-semibold tracking-[-0.045em] tabular-nums leading-[0.95]">
								10<span
									class="bg-gradient-to-br from-[color:var(--brand-primary)] to-[color:var(--brand-secondary)] bg-clip-text text-transparent">+</span>
							</div>
							<div class="mt-4 text-base font-semibold"><?php esc_html_e('Countries served', 'arqamweb'); ?></div>
							<div class="text-sm text-white/55 mt-1"><?php esc_html_e('GCC · MENA · UK · USA', 'arqamweb'); ?></div>
						</div>
					</div>
				</div>
				<div class="relative">
					<div class="hidden lg:block absolute -left-3 top-2 bottom-2 w-px bg-white/10"></div>
					<div class="relative group">
						<div
							class="absolute -inset-6 bg-primary/15 blur-3xl rounded-full opacity-50 group-hover:opacity-80 transition-opacity"></div>
						<div class="relative">
							<div
								class="text-6xl lg:text-7xl font-semibold tracking-[-0.045em] tabular-nums leading-[0.95]">
								320<span
									class="bg-gradient-to-br from-[color:var(--brand-primary)] to-[color:var(--brand-secondary)] bg-clip-text text-transparent">+</span>
							</div>
							<div class="mt-4 text-base font-semibold"><?php esc_html_e('Projects delivered', 'arqamweb'); ?></div>
							<div class="text-sm text-white/55 mt-1"><?php esc_html_e('since 2010', 'arqamweb'); ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="relative py-28 lg:py-36 bg-surface overflow-hidden">
		<div class="container-x max-w-7xl mx-auto">
			<div class="max-w-3xl mb-14">
				<div class="text-xs font-semibold tracking-[0.22em] uppercase text-primary mb-4"><?php esc_html_e('Global footprint', 'arqamweb'); ?></div>
				<h2 class="text-4xl lg:text-5xl font-semibold tracking-[-0.03em] leading-[1.05]"><?php esc_html_e('Clients across', 'arqamweb'); ?> <span
						class="text-gradient"><?php esc_html_e('three continents.', 'arqamweb'); ?></span></h2>
				<p class="mt-5 text-muted-foreground text-lg max-w-2xl"><?php esc_html_e('From Riyadh to New York — Arqam Web ships work that travels.', 'arqamweb'); ?>
					</p></div>
			<div
				class="relative rounded-3xl border border-border bg-gradient-to-br from-card via-card to-background p-6 lg:p-10 shadow-card">
				<div class="absolute inset-0 rounded-3xl overflow-hidden pointer-events-none">
					<div
						class="absolute inset-0 opacity-[0.04] [background-image:linear-gradient(to_right,currentColor_1px,transparent_1px),linear-gradient(to_bottom,currentColor_1px,transparent_1px)] [background-size:40px_40px]"></div>
				</div>
				<div class="relative aspect-[2/1] w-full overflow-visible">
					<svg viewBox="0 0 100 50" class="absolute inset-0 w-full h-full" preserveAspectRatio="none">
						<defs>
							<pattern id="dots" x="0" y="0" width="1.2" height="1.2" patternUnits="userSpaceOnUse">
								<circle cx="0.6" cy="0.6" r="0.18" fill="currentColor"
								        class="text-foreground/15"></circle>
							</pattern>
							<mask id="worldmask">
								<rect width="100" height="50" fill="black"></rect>
								<ellipse cx="22" cy="22" rx="11" ry="9" fill="white"></ellipse>
								<ellipse cx="28" cy="35" rx="6" ry="9" fill="white"></ellipse>
								<ellipse cx="50" cy="22" rx="9" ry="10" fill="white"></ellipse>
								<ellipse cx="55" cy="38" rx="7" ry="6" fill="white"></ellipse>
								<ellipse cx="70" cy="28" rx="14" ry="11" fill="white"></ellipse>
								<ellipse cx="82" cy="42" rx="5" ry="4" fill="white"></ellipse>
							</mask>
						</defs>
						<rect width="100" height="50" fill="url(#dots)" mask="url(#worldmask)"></rect>
					</svg>
					<div class="absolute -translate-x-1/2 -translate-y-1/2 group cursor-pointer hover:z-[999]"
					     style="left: 60%; top: 45%;"><span
							class="absolute inset-0 w-4 h-4 rounded-full bg-primary/40 animate-ping"></span><span
							class="relative block w-3 h-3 rounded-full bg-gradient-primary shadow-[0_0_20px_color-mix(in_oklab,var(--primary)_70%,transparent)] ring-2 ring-background"></span>
						<div
							class="absolute left-1/2 -translate-x-1/2 -top-2 -translate-y-full whitespace-nowrap rounded-xl border border-border bg-card px-3 py-2 shadow-card transition-all duration-300 opacity-0 pointer-events-none group-hover:opacity-100 z-[999]">
							<div class="text-xs font-bold text-foreground"><?php esc_html_e('Riyadh', 'arqamweb'); ?></div>
							<div class="text-[10px] text-muted-foreground"><?php esc_html_e('Saudi Arabia · 42 clients', 'arqamweb'); ?></div>
						</div>
					</div>
					<div class="absolute -translate-x-1/2 -translate-y-1/2 group cursor-pointer hover:z-[999]"
					     style="left: 64%; top: 47%;"><span
							class="absolute inset-0 w-4 h-4 rounded-full bg-primary/40 animate-ping"></span><span
							class="relative block w-3 h-3 rounded-full bg-gradient-primary shadow-[0_0_20px_color-mix(in_oklab,var(--primary)_70%,transparent)] ring-2 ring-background"></span>
						<div
							class="absolute left-1/2 -translate-x-1/2 -top-2 -translate-y-full whitespace-nowrap rounded-xl border border-border bg-card px-3 py-2 shadow-card transition-all duration-300 opacity-0 pointer-events-none group-hover:opacity-100 z-[999]">
							<div class="text-xs font-bold text-foreground"><?php esc_html_e('Dubai', 'arqamweb'); ?></div>
							<div class="text-[10px] text-muted-foreground"><?php esc_html_e('UAE · 38 clients', 'arqamweb'); ?></div>
						</div>
					</div>
					<div class="absolute -translate-x-1/2 -translate-y-1/2 group cursor-pointer hover:z-[999]"
					     style="left: 58%; top: 47%;"><span
							class="absolute inset-0 w-4 h-4 rounded-full bg-primary/40 animate-ping"></span><span
							class="relative block w-3 h-3 rounded-full bg-gradient-primary shadow-[0_0_20px_color-mix(in_oklab,var(--primary)_70%,transparent)] ring-2 ring-background"></span>
						<div
							class="absolute left-1/2 -translate-x-1/2 -top-2 -translate-y-full whitespace-nowrap rounded-xl border border-border bg-card px-3 py-2 shadow-card transition-all duration-300 opacity-0 pointer-events-none group-hover:opacity-100 z-[999]">
							<div class="text-xs font-bold text-foreground"><?php esc_html_e('Jeddah', 'arqamweb'); ?></div>
							<div class="text-[10px] text-muted-foreground"><?php esc_html_e('KSA · 21 clients', 'arqamweb'); ?></div>
						</div>
					</div>
					<div class="absolute -translate-x-1/2 -translate-y-1/2 group cursor-pointer hover:z-[999]"
					     style="left: 55%; top: 42%;"><span
							class="absolute inset-0 w-4 h-4 rounded-full bg-primary/40 animate-ping"></span><span
							class="relative block w-3 h-3 rounded-full bg-gradient-primary shadow-[0_0_20px_color-mix(in_oklab,var(--primary)_70%,transparent)] ring-2 ring-background"></span>
						<div
							class="absolute left-1/2 -translate-x-1/2 -top-2 -translate-y-full whitespace-nowrap rounded-xl border border-border bg-card px-3 py-2 shadow-card transition-all duration-300 opacity-0 pointer-events-none group-hover:opacity-100 z-[999]">
							<div class="text-xs font-bold text-foreground"><?php esc_html_e('Cairo', 'arqamweb'); ?></div>
							<div class="text-[10px] text-muted-foreground"><?php esc_html_e('Egypt · 29 clients', 'arqamweb'); ?></div>
						</div>
					</div>
					<div class="absolute -translate-x-1/2 -translate-y-1/2 group cursor-pointer hover:z-[999]"
					     style="left: 47%; top: 30%;"><span
							class="absolute inset-0 w-4 h-4 rounded-full bg-primary/40 animate-ping"></span><span
							class="relative block w-3 h-3 rounded-full bg-gradient-primary shadow-[0_0_20px_color-mix(in_oklab,var(--primary)_70%,transparent)] ring-2 ring-background"></span>
						<div
							class="absolute left-1/2 -translate-x-1/2 -top-2 -translate-y-full whitespace-nowrap rounded-xl border border-border bg-card px-3 py-2 shadow-card transition-all duration-300 opacity-0 pointer-events-none group-hover:opacity-100 z-[999]">
							<div class="text-xs font-bold text-foreground"><?php esc_html_e('London', 'arqamweb'); ?></div>
							<div class="text-[10px] text-muted-foreground"><?php esc_html_e('UK · 14 clients', 'arqamweb'); ?></div>
						</div>
					</div>
					<div class="absolute -translate-x-1/2 -translate-y-1/2 group cursor-pointer hover:z-[999]"
					     style="left: 26%; top: 38%;"><span
							class="absolute inset-0 w-4 h-4 rounded-full bg-primary/40 animate-ping"></span><span
							class="relative block w-3 h-3 rounded-full bg-gradient-primary shadow-[0_0_20px_color-mix(in_oklab,var(--primary)_70%,transparent)] ring-2 ring-background"></span>
						<div
							class="absolute left-1/2 -translate-x-1/2 -top-2 -translate-y-full whitespace-nowrap rounded-xl border border-border bg-card px-3 py-2 shadow-card transition-all duration-300 opacity-0 pointer-events-none group-hover:opacity-100 z-[999]">
							<div class="text-xs font-bold text-foreground"><?php esc_html_e('New York', 'arqamweb'); ?></div>
							<div class="text-[10px] text-muted-foreground"><?php esc_html_e('USA · 11 clients', 'arqamweb'); ?></div>
						</div>
					</div>
					<div class="absolute -translate-x-1/2 -translate-y-1/2 group cursor-pointer hover:z-[999]"
					     style="left: 62%; top: 46%;"><span
							class="absolute inset-0 w-4 h-4 rounded-full bg-primary/40 animate-ping"></span><span
							class="relative block w-3 h-3 rounded-full bg-gradient-primary shadow-[0_0_20px_color-mix(in_oklab,var(--primary)_70%,transparent)] ring-2 ring-background"></span>
						<div
							class="absolute left-1/2 -translate-x-1/2 -top-2 -translate-y-full whitespace-nowrap rounded-xl border border-border bg-card px-3 py-2 shadow-card transition-all duration-300 opacity-0 pointer-events-none group-hover:opacity-100 z-[999]">
							<div class="text-xs font-bold text-foreground"><?php esc_html_e('Doha', 'arqamweb'); ?></div>
							<div class="text-[10px] text-muted-foreground"><?php esc_html_e('Qatar · 9 clients', 'arqamweb'); ?></div>
						</div>
					</div>
					<div class="absolute -translate-x-1/2 -translate-y-1/2 group cursor-pointer hover:z-[999]"
					     style="left: 61%; top: 43%;"><span
							class="absolute inset-0 w-4 h-4 rounded-full bg-primary/40 animate-ping"></span><span
							class="relative block w-3 h-3 rounded-full bg-gradient-primary shadow-[0_0_20px_color-mix(in_oklab,var(--primary)_70%,transparent)] ring-2 ring-background"></span>
						<div
							class="absolute left-1/2 -translate-x-1/2 -top-2 -translate-y-full whitespace-nowrap rounded-xl border border-border bg-card px-3 py-2 shadow-card transition-all duration-300 opacity-0 pointer-events-none group-hover:opacity-100 z-[999]">
							<div class="text-xs font-bold text-foreground"><?php esc_html_e('Kuwait City', 'arqamweb'); ?></div>
							<div class="text-[10px] text-muted-foreground"><?php esc_html_e('Kuwait · 7 clients', 'arqamweb'); ?></div>
						</div>
					</div>
				</div>
				<div class="mt-8 grid grid-cols-2 sm:grid-cols-4 gap-4 pt-8 border-t border-border">
					<div>
						<div class="text-2xl font-semibold tracking-tight text-foreground tabular-nums">10+</div>
						<div class="text-xs text-muted-foreground mt-1"><?php esc_html_e('Countries', 'arqamweb'); ?></div>
					</div>
					<div>
						<div class="text-2xl font-semibold tracking-tight text-foreground tabular-nums">3</div>
						<div class="text-xs text-muted-foreground mt-1"><?php esc_html_e('Continents', 'arqamweb'); ?></div>
					</div>
					<div>
						<div class="text-2xl font-semibold tracking-tight text-foreground tabular-nums">320+</div>
						<div class="text-xs text-muted-foreground mt-1"><?php esc_html_e('Projects', 'arqamweb'); ?></div>
					</div>
					<div>
						<div class="text-2xl font-semibold tracking-tight text-foreground tabular-nums">24/7</div>
						<div class="text-xs text-muted-foreground mt-1"><?php esc_html_e('Support', 'arqamweb'); ?></div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="py-24 lg:py-28 bg-background border-t border-b border-border/60 overflow-hidden">
		<div class="container-x max-w-7xl mx-auto mb-12">
			<div class="text-xs font-semibold tracking-[0.22em] uppercase text-primary mb-3"><?php esc_html_e('In motion', 'arqamweb'); ?></div>
			<h2 class="text-3xl lg:text-4xl font-semibold tracking-[-0.025em]"><?php esc_html_e('A constant stream of', 'arqamweb'); ?> <span
					class="text-gradient"><?php esc_html_e('kind words.', 'arqamweb'); ?></span></h2></div>
		<?php
		$_marquee_reviews = get_posts([
			'post_type' => 'review',
			'posts_per_page' => -1,
			'post_status' => 'publish',
			'orderby' => 'menu_order',
			'order' => 'ASC',
		]);
		if ($_marquee_reviews) :
			$_marquee_double = array_merge($_marquee_reviews, $_marquee_reviews);
			$_marquee_duration = count($_marquee_reviews) * 8;
			?>
			<div class="marquee-mask">
				<div class="flex gap-5 animate-drift"
				     style="animation-duration:<?php echo $_marquee_duration; ?>s;width:fit-content">
					<?php foreach ($_marquee_double as $_mr) :
						$_mr_excerpt = !empty($_mr->post_excerpt) ? $_mr->post_excerpt : wp_trim_words(strip_tags($_mr->post_content), 30);
						$_mr_role = get_field('role_location', $_mr->ID);
						?>
						<article
							class="w-[380px] shrink-0 rounded-2xl border border-border bg-card/60 backdrop-blur-sm p-6 shadow-card">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
							     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
							     stroke-linejoin="round" class="lucide lucide-quote w-5 h-5 text-primary/50 mb-3"
							     aria-hidden="true">
								<path
									d="M16 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z"></path>
								<path
									d="M5 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z"></path>
							</svg>
							<p class="text-foreground/85 leading-relaxed text-[15px]">
								"<?php echo esc_html($_mr_excerpt); ?>"</p>
							<div class="mt-5 pt-4 border-t border-border flex items-center justify-between">
								<div>
									<div class="font-semibold text-sm"><?php echo esc_html($_mr->post_title); ?></div>
									<?php if ($_mr_role) : ?>
										<div
											class="text-xs text-muted-foreground"><?php echo esc_html($_mr_role); ?></div>
									<?php endif; ?>
								</div>
								<div class="flex gap-0.5 text-primary"><?php echo arqam_stars(); ?></div>
							</div>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>
	</section>
	<section class="py-28 lg:py-36 bg-surface">
		<div class="container-x max-w-7xl mx-auto">
			<div class="max-w-3xl mb-14">
				<div class="text-xs font-semibold tracking-[0.22em] uppercase text-primary mb-4"><?php esc_html_e('Written reviews', 'arqamweb'); ?></div>
				<h2 class="text-4xl lg:text-5xl font-semibold tracking-[-0.03em] leading-[1.05]"><?php esc_html_e("The reviews we're", 'arqamweb'); ?> <span
						class="text-gradient"><?php esc_html_e('most proud of.', 'arqamweb'); ?></span></h2>
				<p class="mt-5 text-muted-foreground text-lg max-w-2xl"><?php esc_html_e('Verified clients. Unedited words. Real outcomes.', 'arqamweb'); ?></p></div>
			<?php
			$_grid_reviews = get_posts([
				'post_type' => 'review',
				'posts_per_page' => -1,
				'post_status' => 'publish',
				'orderby' => 'menu_order',
				'order' => 'ASC',
			]);
			?>
			<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
				<?php foreach ($_grid_reviews as $_gi => $_gr) :
					$_gr_excerpt = !empty($_gr->post_excerpt) ? $_gr->post_excerpt : wp_trim_words(strip_tags($_gr->post_content), 55);
					$_gr_role = get_field('role_location', $_gr->ID);
					$_gr_tag = get_field('service_tag', $_gr->ID);
					$_gr_initials = get_field('initials', $_gr->ID);
					if (!$_gr_initials) {
						$_words = explode(' ', $_gr->post_title);
						$_gr_initials = strtoupper(substr($_words[0], 0, 1) . (isset($_words[1]) ? substr($_words[1], 0, 1) : ''));
					}
					$_gr_delay = $_gi * 80;
					?>
					<article
						class="group relative rounded-3xl border border-border bg-gradient-to-br from-card to-background p-7 lg:p-8 shadow-card hover:shadow-[0_30px_80px_-30px_color-mix(in_oklab,var(--primary)_40%,transparent)] hover:border-primary/30 transition-all duration-500 animate-[fade-in_0.6s_ease-out_both]"
						style="transform:perspective(1200px) rotateY(0deg) rotateX(0deg);transform-style:preserve-3d;animation-delay:<?php echo esc_attr($_gr_delay); ?>ms;">
						<div
							class="absolute inset-0 rounded-3xl bg-gradient-to-br from-primary/[0.03] via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
						<?php if ($_gr_tag) : ?>
							<div class="absolute top-6 right-6">
								<span
									class="px-2.5 py-1 rounded-full text-[10px] font-bold tracking-wide bg-primary/10 text-primary border border-primary/20"><?php echo esc_html($_gr_tag); ?></span>
							</div>
						<?php endif; ?>
						<div class="flex gap-0.5 text-primary"><?php echo arqam_stars(); ?></div>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						     class="lucide lucide-quote w-6 h-6 text-primary/30 mt-5" aria-hidden="true">
							<path
								d="M16 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z"></path>
							<path
								d="M5 3a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2 1 1 0 0 1 1 1v1a2 2 0 0 1-2 2 1 1 0 0 0-1 1v2a1 1 0 0 0 1 1 6 6 0 0 0 6-6V5a2 2 0 0 0-2-2z"></path>
						</svg>
						<p class="mt-3 text-foreground/85 leading-relaxed text-[15px] lg:text-base">
							"<?php echo esc_html($_gr_excerpt); ?>"</p>
						<div class="mt-7 pt-6 border-t border-border flex items-center gap-3">
							<div
								class="w-11 h-11 rounded-full bg-gradient-primary text-primary-foreground flex items-center justify-center font-semibold text-sm">
								<?php echo esc_html($_gr_initials); ?>
							</div>
							<div>
								<div class="font-semibold text-sm"><?php echo esc_html($_gr->post_title); ?></div>
								<?php if ($_gr_role) : ?>
									<div class="text-xs text-muted-foreground"><?php echo esc_html($_gr_role); ?></div>
								<?php endif; ?>
							</div>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
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
</main>


<?php get_footer(); ?>
