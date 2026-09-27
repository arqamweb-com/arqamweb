<?php
/**
 * Reviews Hero Section
 *
 * @package Arqamweb
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
?>
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
