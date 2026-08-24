<?php /* Template Name: Pricing */ ?>
<?php
if (!defined('ABSPATH')) exit;

get_header();
?>


<div class="min-h-screen bg-background text-foreground">
	<main>
		<section class="relative pt-28 lg:pt-36 pb-20 lg:pb-24 overflow-hidden">
			<div class="absolute inset-0 -z-10 bg-gradient-to-b from-secondary/40 via-background to-background"></div>
			<div class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
				<div class="absolute inset-0 opacity-[0.08]"
				     style="background:radial-gradient(ellipse 80% 60% at 20% 40%, hsl(200 62% 52%) 0%, transparent 70%), radial-gradient(ellipse 60% 50% at 80% 30%, hsl(213 53% 45%) 0%, transparent 70%)"></div>
				<div class="absolute rounded-full"
				     style="width:280px;height:280px;left:5%;top:10%;background:radial-gradient(circle at 30% 30%, hsla(200, 62%, 52%, 0.18), hsla(200, 62%, 52%, 0.03) 60%, transparent 80%);border:1px solid hsla(200, 62%, 52%, 0.12);backdrop-filter:blur(6px);-webkit-backdrop-filter:blur(6px);box-shadow:inset 0 0 40px hsla(200, 62%, 80%, 0.08), 0 0 60px hsla(200, 62%, 52%, 0.06);animation:glass-float-1 14s ease-in-out infinite;animation-delay:0s;transform:translate(0px, 0px);will-change:transform;transition:transform 0.6s cubic-bezier(0.16, 1, 0.3, 1)"></div>
				<div class="absolute rounded-full"
				     style="width:200px;height:200px;left:70%;top:55%;background:radial-gradient(circle at 30% 30%, hsla(213, 53%, 45%, 0.20), hsla(200, 62%, 52%, 0.03) 60%, transparent 80%);border:1px solid hsla(200, 62%, 52%, 0.12);backdrop-filter:blur(6px);-webkit-backdrop-filter:blur(6px);box-shadow:inset 0 0 40px hsla(200, 62%, 80%, 0.08), 0 0 60px hsla(200, 62%, 52%, 0.06);animation:glass-float-2 16s ease-in-out infinite;animation-delay:-4s;transform:translate(0px, 0px);will-change:transform;transition:transform 0.6s cubic-bezier(0.16, 1, 0.3, 1)"></div>
				<div class="absolute rounded-full"
				     style="width:140px;height:140px;left:55%;top:5%;background:radial-gradient(circle at 30% 30%, hsla(200, 62%, 52%, 0.15), hsla(200, 62%, 52%, 0.03) 60%, transparent 80%);border:1px solid hsla(200, 62%, 52%, 0.12);backdrop-filter:blur(6px);-webkit-backdrop-filter:blur(6px);box-shadow:inset 0 0 40px hsla(200, 62%, 80%, 0.08), 0 0 60px hsla(200, 62%, 52%, 0.06);animation:glass-float-3 12s ease-in-out infinite;animation-delay:-8s;transform:translate(0px, 0px);will-change:transform;transition:transform 0.6s cubic-bezier(0.16, 1, 0.3, 1)"></div>
				<div class="absolute rounded-full"
				     style="width:240px;height:240px;left:20%;top:65%;background:radial-gradient(circle at 30% 30%, hsla(213, 53%, 45%, 0.16), hsla(200, 62%, 52%, 0.03) 60%, transparent 80%);border:1px solid hsla(200, 62%, 52%, 0.12);backdrop-filter:blur(6px);-webkit-backdrop-filter:blur(6px);box-shadow:inset 0 0 40px hsla(200, 62%, 80%, 0.08), 0 0 60px hsla(200, 62%, 52%, 0.06);animation:glass-float-4 15s ease-in-out infinite;animation-delay:-2s;transform:translate(0px, 0px);will-change:transform;transition:transform 0.6s cubic-bezier(0.16, 1, 0.3, 1)"></div>
				<div class="absolute rounded-full"
				     style="width:110px;height:110px;left:82%;top:25%;background:radial-gradient(circle at 30% 30%, hsla(200, 62%, 52%, 0.19), hsla(200, 62%, 52%, 0.03) 60%, transparent 80%);border:1px solid hsla(200, 62%, 52%, 0.12);backdrop-filter:blur(6px);-webkit-backdrop-filter:blur(6px);box-shadow:inset 0 0 40px hsla(200, 62%, 80%, 0.08), 0 0 60px hsla(200, 62%, 52%, 0.06);animation:glass-float-1 11s ease-in-out infinite;animation-delay:-6s;transform:translate(0px, 0px);will-change:transform;transition:transform 0.6s cubic-bezier(0.16, 1, 0.3, 1)"></div>
			</div>
			<div class="reveal container-x max-w-6xl mx-auto relative z-10 in">

				<div class="arqamweb-breadcrumb">
					<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
				</div>
				<h1 class="text-5xl md:text-6xl lg:text-7xl xl:text-[5.25rem] font-semibold leading-[1.02] tracking-[-0.03em] max-w-5xl">
					<?php esc_html_e('Transparent pricing for', 'arqamweb'); ?><!-- --> <span
						class="text-gradient"><?php esc_html_e('ambitious brands.', 'arqamweb'); ?></span></h1>
				<p class="mt-8 text-lg md:text-xl text-muted-foreground max-w-2xl leading-relaxed"><?php esc_html_e('Senior-team execution. Honest, outcome-based pricing. Trusted by brands across Saudi Arabia, the Gulf, and beyond — with no lock-ins and no surprise invoices.', 'arqamweb'); ?></p>
				<div class="mt-10 flex flex-wrap items-center gap-4"><a href="#service-web"
				                                                        class="inline-flex items-center gap-2 px-7 py-3.5 text-sm font-semibold text-primary-foreground bg-gradient-primary rounded-full shadow-glow hover:-translate-y-0.5 transition-transform"><?php esc_html_e('See all plans', 'arqamweb'); ?>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						     class="lucide lucide-arrow-right w-4 h-4" aria-hidden="true">
							<path d="M5 12h14"></path>
							<path d="m12 5 7 7-7 7"></path>
						</svg>
					</a>
					<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_CONTACT_PAGE_SLUG)); ?>"
					   class="inline-flex items-center gap-2 px-7 py-3.5 text-sm font-semibold text-foreground rounded-full border border-border hover:bg-accent transition-all">
						<?php esc_html_e('Talk to a strategist', 'arqamweb'); ?>
					</a>
				</div>
			</div>
		</section>
		<section class="py-16 lg:py-20 border-y border-border/60 bg-surface/40 overflow-hidden">
			<div class="reveal container-x max-w-7xl mx-auto">
				<div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-10">
					<div>
						<div
							class="text-xs font-semibold tracking-[0.2em] uppercase text-primary mb-3"><?php esc_html_e('Trusted globally', 'arqamweb'); ?>
						</div>
						<h2 class="text-3xl lg:text-4xl font-semibold tracking-tight"><?php esc_html_e('Partnering with brands across', 'arqamweb'); ?>
							<span class="text-gradient"><?php esc_html_e('+10 countries', 'arqamweb'); ?></span></h2>
					</div>
					<p class="text-muted-foreground max-w-md text-sm"><?php esc_html_e('From Riyadh and Dubai to London, New York, Cairo and beyond — we ship websites that perform across every market we touch.', 'arqamweb'); ?></p>
				</div>
			</div>
			<div class="relative marquee-mask overflow-hidden">
				<div class="flex animate-marquee py-2" style="animation-duration:70s;width:max-content">
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/eg.png"
									     srcset="https://flagcdn.com/w160/eg.png 1x, https://flagcdn.com/w320/eg.png 2x"
									     alt="<?php esc_attr_e('Egypt flag', 'arqamweb'); ?>" width="72" height="48"
									     loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('Egypt', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/sa.png"
									     srcset="https://flagcdn.com/w160/sa.png 1x, https://flagcdn.com/w320/sa.png 2x"
									     alt="<?php esc_attr_e('Saudi Arabia flag', 'arqamweb'); ?>" width="72"
									     height="48" loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('Saudi Arabia', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/ae.png"
									     srcset="https://flagcdn.com/w160/ae.png 1x, https://flagcdn.com/w320/ae.png 2x"
									     alt="<?php esc_attr_e('United Arab Emirates flag', 'arqamweb'); ?>" width="72"
									     height="48" loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('United Arab Emirates', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/kw.png"
									     srcset="https://flagcdn.com/w160/kw.png 1x, https://flagcdn.com/w320/kw.png 2x"
									     alt="<?php esc_attr_e('Kuwait flag', 'arqamweb'); ?>" width="72" height="48"
									     loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('Kuwait', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/om.png"
									     srcset="https://flagcdn.com/w160/om.png 1x, https://flagcdn.com/w320/om.png 2x"
									     alt="<?php esc_attr_e('Oman flag', 'arqamweb'); ?>" width="72" height="48"
									     loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('Oman', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/qa.png"
									     srcset="https://flagcdn.com/w160/qa.png 1x, https://flagcdn.com/w320/qa.png 2x"
									     alt="<?php esc_attr_e('Qatar flag', 'arqamweb'); ?>" width="72" height="48"
									     loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('Qatar', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/us.png"
									     srcset="https://flagcdn.com/w160/us.png 1x, https://flagcdn.com/w320/us.png 2x"
									     alt="<?php esc_attr_e('United States flag', 'arqamweb'); ?>" width="72"
									     height="48" loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('United States', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/gb.png"
									     srcset="https://flagcdn.com/w160/gb.png 1x, https://flagcdn.com/w320/gb.png 2x"
									     alt="<?php esc_attr_e('United Kingdom flag', 'arqamweb'); ?>" width="72"
									     height="48" loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('United Kingdom', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/ie.png"
									     srcset="https://flagcdn.com/w160/ie.png 1x, https://flagcdn.com/w320/ie.png 2x"
									     alt="<?php esc_attr_e('Ireland flag', 'arqamweb'); ?>" width="72" height="48"
									     loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5">
										<?php esc_html_e('Ireland', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/de.png"
									     srcset="https://flagcdn.com/w160/de.png 1x, https://flagcdn.com/w320/de.png 2x"
									     alt="<?php esc_attr_e('Germany flag', 'arqamweb'); ?>" width="72" height="48"
									     loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5">
										<?php esc_html_e('Germany', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/es.png"
									     srcset="https://flagcdn.com/w160/es.png 1x, https://flagcdn.com/w320/es.png 2x"
									     alt="<?php esc_attr_e('Spain flag', 'arqamweb'); ?>" width="72" height="48"
									     loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('Spain', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/eg.png"
									     srcset="https://flagcdn.com/w160/eg.png 1x, https://flagcdn.com/w320/eg.png 2x"
									     alt="<?php esc_attr_e('Egypt flag', 'arqamweb'); ?>" width="72" height="48"
									     loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('Egypt', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/sa.png"
									     srcset="https://flagcdn.com/w160/sa.png 1x, https://flagcdn.com/w320/sa.png 2x"
									     alt="<?php esc_attr_e('Saudi Arabia flag', 'arqamweb'); ?>" width="72"
									     height="48" loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('Saudi Arabia', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/ae.png"
									     srcset="https://flagcdn.com/w160/ae.png 1x, https://flagcdn.com/w320/ae.png 2x"
									     alt="<?php esc_attr_e('United Arab Emirates flag', 'arqamweb'); ?>" width="72"
									     height="48" loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('United Arab Emirates', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/kw.png"
									     srcset="https://flagcdn.com/w160/kw.png 1x, https://flagcdn.com/w320/kw.png 2x"
									     alt="<?php esc_attr_e('Kuwait flag', 'arqamweb'); ?>" width="72" height="48"
									     loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('Kuwait', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/om.png"
									     srcset="https://flagcdn.com/w160/om.png 1x, https://flagcdn.com/w320/om.png 2x"
									     alt="<?php esc_attr_e('Oman flag', 'arqamweb'); ?>" width="72" height="48"
									     loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('Oman', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/qa.png"
									     srcset="https://flagcdn.com/w160/qa.png 1x, https://flagcdn.com/w320/qa.png 2x"
									     alt="<?php esc_attr_e('Qatar flag', 'arqamweb'); ?>" width="72" height="48"
									     loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('Qatar', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/us.png"
									     srcset="https://flagcdn.com/w160/us.png 1x, https://flagcdn.com/w320/us.png 2x"
									     alt="<?php esc_attr_e('United States flag', 'arqamweb'); ?>" width="72"
									     height="48" loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('United States', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/gb.png"
									     srcset="https://flagcdn.com/w160/gb.png 1x, https://flagcdn.com/w320/gb.png 2x"
									     alt="<?php esc_attr_e('United Kingdom flag', 'arqamweb'); ?>" width="72"
									     height="48" loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('United Kingdom', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/ie.png"
									     srcset="https://flagcdn.com/w160/ie.png 1x, https://flagcdn.com/w320/ie.png 2x"
									     alt="<?php esc_attr_e('Ireland flag', 'arqamweb'); ?>" width="72" height="48"
									     loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5">
										<?php esc_html_e('Ireland', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/de.png"
									     srcset="https://flagcdn.com/w160/de.png 1x, https://flagcdn.com/w320/de.png 2x"
									     alt="<?php esc_attr_e('Germany flag', 'arqamweb'); ?>" width="72" height="48"
									     loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5">
										<?php esc_html_e('Germany', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="group shrink-0 w-[360px] mr-7">
						<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
							<div class="relative flex items-center gap-5">
								<div
									class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted">
									<img src="https://flagcdn.com/w160/es.png"
									     srcset="https://flagcdn.com/w160/es.png 1x, https://flagcdn.com/w320/es.png 2x"
									     alt="<?php esc_attr_e('Spain flag', 'arqamweb'); ?>" width="72" height="48"
									     loading="lazy"
									     class="block w-full h-full object-cover"></div>
								<div class="min-w-0">
									<div
										class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium">
										<?php esc_html_e('Clients in', 'arqamweb'); ?>
									</div>
									<div
										class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php esc_html_e('Spain', 'arqamweb'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="service-web" data-pricing-section="<?php esc_attr_e('Web Development pricing', 'arqamweb'); ?>"
		         class="py-16 lg:py-24 bg-background">
			<div class="container-x max-w-7xl mx-auto">
				<div class="grid lg:grid-cols-12 gap-8 items-end mb-12">
					<div class="lg:col-span-7">
						<div class="inline-flex items-center gap-3 mb-4">
							<span class="text-[11px] font-mono font-semibold tracking-[0.22em] uppercase text-primary">01 / <?php esc_html_e('Website Design', 'arqamweb'); ?></span></div>
						<h2 class="text-4xl lg:text-5xl xl:text-[3.25rem] font-semibold tracking-[-0.025em] leading-[1.05]">
							<?php esc_html_e('Website Design &amp; Development', 'arqamweb'); ?></h2>
						<p class="mt-4 text-muted-foreground text-base lg:text-lg max-w-xl leading-relaxed"><?php esc_html_e('Fast, bilingual, conversion-tuned sites your competitors can\'t match.', 'arqamweb'); ?></p>
					</div>
					<div class="lg:col-span-5 lg:text-right">
						<div
							class="inline-flex flex-col gap-2 px-5 py-4 rounded-2xl bg-background border border-border shadow-card">
							<div class="flex items-center gap-2 text-primary">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
								     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
								     stroke-linejoin="round" class="lucide lucide-globe w-5 h-5" aria-hidden="true">
									<circle cx="12" cy="12" r="10"></circle>
									<path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
									<path d="M2 12h20"></path>
								</svg>
								<span
									class="text-xs font-bold tracking-[0.18em] uppercase"><?php esc_html_e('From', 'arqamweb'); ?> <!-- -->$1,305</span>
							</div>
							<span
								class="text-xs text-muted-foreground"><?php esc_html_e('Most projects ship in 1–7 weeks', 'arqamweb'); ?></span>
						</div>
					</div>
				</div>
				<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-7 auto-rows-fr">
					<?php if (function_exists('awp_service_has_packages') && awp_service_has_packages('web-development')) : awp_render_service_cards('web-development'); else : ?>
						<div
							class="group relative rounded-3xl p-8 lg:p-10 transition-all duration-500 flex flex-col h-full bg-background text-foreground shadow-card border border-border hover:shadow-elevated hover:-translate-y-1 ">
							<div class="relative"><h3 class="text-xl lg:text-2xl font-semibold tracking-tight ">
									<?php esc_html_e('Starter', 'arqamweb'); ?></h3>
								<p class="mt-2 text-sm leading-relaxed text-muted-foreground"><?php esc_html_e('5–10 page corporate site, bilingual, SEO-ready.', 'arqamweb'); ?></p>
								<div class="mt-6"><p
										class="mb-1.5 text-[11px] font-semibold tracking-[0.18em] uppercase text-primary/80">
										<?php esc_html_e('Starting from', 'arqamweb'); ?></p>
									<div class="flex items-baseline gap-2 flex-wrap"><span
											class="text-4xl lg:text-5xl font-semibold tracking-tight text-gradient">$1,305</span><span
											class="text-sm font-medium text-muted-foreground"><?php esc_html_e('one-time', 'arqamweb'); ?></span>
									</div>
								</div>
								<div class="mt-7 h-px bg-border"></div>
								<ul class="mt-7 space-y-3.5">
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('5–10 page corporate site', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Fully custom UI/UX', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('WordPress CMS + admin training', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Bilingual AR/EN', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Advanced on-page SEO + schema', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Blog setup', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('2 rounds of revisions', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('30-day post-launch support', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Additional language: +30% of plan price', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Delivery: 3–4 weeks', 'arqamweb'); ?></span>
									</li>
								</ul>
							</div>
							<div class="relative mt-8 pt-2 flex flex-col gap-3"><a
									href="/quote?plan=starter&amp;service=web"
									class="inline-flex items-center justify-center gap-2 px-6 py-3.5 text-sm font-semibold rounded-full transition-all hover:-translate-y-0.5 bg-gradient-primary text-primary-foreground shadow-soft hover:shadow-glow"><?php esc_html_e('Start with Starter', 'arqamweb'); ?>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
									     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
									     stroke-linejoin="round" class="lucide lucide-arrow-right w-4 h-4"
									     aria-hidden="true">
										<path d="M5 12h14"></path>
										<path d="m12 5 7 7-7 7"></path>
									</svg>
								</a><a
									href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_CONTACT_PAGE_SLUG)); ?>"
									class="inline-flex items-center justify-center gap-1.5 text-xs font-semibold transition-colors text-muted-foreground hover:text-primary"><?php esc_html_e('or talk to us →', 'arqamweb'); ?></a>
							</div>
						</div>
						<div
							class="group relative rounded-3xl p-8 lg:p-10 transition-all duration-500 flex flex-col h-full bg-[#124f85] text-white shadow-elevated hover:-translate-y-1.5 border border-white/10 ring-1 ring-primary/50 hover:scale-[1.015]">
							<div
								class="absolute -inset-px rounded-3xl bg-gradient-to-br from-primary/40 via-primary/0 to-primary/30 opacity-60 -z-10 blur-sm"></div>
							<div class="absolute -top-3 left-1/2 -translate-x-1/2"><span
									class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-gradient-primary text-primary-foreground text-[10px] font-bold tracking-[0.18em] uppercase shadow-glow"><svg
										xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
										fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
										stroke-linejoin="round" class="lucide lucide-sparkles w-3 h-3"
										aria-hidden="true"><path
											d="M11.017 2.814a1 1 0 0 1 1.966 0l1.051 5.558a2 2 0 0 0 1.594 1.594l5.558 1.051a1 1 0 0 1 0 1.966l-5.558 1.051a2 2 0 0 0-1.594 1.594l-1.051 5.558a1 1 0 0 1-1.966 0l-1.051-5.558a2 2 0 0 0-1.594-1.594l-5.558-1.051a1 1 0 0 1 0-1.966l5.558-1.051a2 2 0 0 0 1.594-1.594z"></path><path
											d="M20 2v4"></path><path d="M22 4h-4"></path><circle cx="4" cy="20"
							                                                                     r="2"></circle></svg><?php esc_html_e('Most Popular', 'arqamweb'); ?></span>
							</div>
							<div
								class="absolute -top-24 -right-24 w-64 h-64 rounded-full bg-primary/20 blur-3xl pointer-events-none"></div>
							<div class="relative"><h3
									class="text-xl lg:text-2xl font-semibold tracking-tight text-white">
									<?php esc_html_e('Business', 'arqamweb'); ?></h3>
								<p class="mt-2 text-sm leading-relaxed text-white/70"><?php esc_html_e('Custom build with animation + integrations.', 'arqamweb'); ?></p>
								<div class="mt-6"><p
										class="mb-1.5 text-[11px] font-semibold tracking-[0.18em] uppercase text-white/60">
										<?php esc_html_e('Starting from', 'arqamweb'); ?></p>
									<div class="flex items-baseline gap-2 flex-wrap"><span
											class="text-4xl lg:text-5xl font-semibold tracking-tight text-white">$3,440</span><span
											class="text-sm font-medium text-white/60"><?php esc_html_e('one-time', 'arqamweb'); ?></span>
									</div>
								</div>
								<div class="mt-7 h-px bg-white/15"></div>
								<ul class="mt-7 space-y-3.5">
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('Up to 20 fully custom pages', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('Advanced animations + micro-interactions', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('Headless or custom WordPress', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('CRM / HubSpot integrations', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('Sub-second loads on Saudi networks', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('3 rounds of revisions', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('60-day post-launch support', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('Additional language: +30% of plan price', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('Delivery: 5–7 weeks', 'arqamweb'); ?></span>
									</li>
								</ul>
							</div>
							<div class="relative mt-8 pt-2 flex flex-col gap-3"><a
									href="/quote?plan=business&amp;service=web"
									class="inline-flex items-center justify-center gap-2 px-6 py-3.5 text-sm font-semibold rounded-full transition-all hover:-translate-y-0.5 bg-white text-primary hover:shadow-glow"><?php esc_html_e('Start with Business', 'arqamweb'); ?>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
									     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
									     stroke-linejoin="round" class="lucide lucide-arrow-right w-4 h-4"
									     aria-hidden="true">
										<path d="M5 12h14"></path>
										<path d="m12 5 7 7-7 7"></path>
									</svg>
								</a><a
									href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_CONTACT_PAGE_SLUG)); ?>"
									class="inline-flex items-center justify-center gap-1.5 text-xs font-semibold transition-colors text-white/70 hover:text-white"><?php esc_html_e('or talk to us →', 'arqamweb'); ?></a>
							</div>
						</div>
						<div
							class="group relative rounded-3xl p-8 lg:p-10 transition-all duration-500 flex flex-col h-full bg-background text-foreground shadow-card border border-border hover:shadow-elevated hover:-translate-y-1 ">
							<div class="relative"><h3 class="text-xl lg:text-2xl font-semibold tracking-tight ">
									<?php esc_html_e('Premium', 'arqamweb'); ?></h3>
								<p class="mt-2 text-sm leading-relaxed text-muted-foreground"><?php esc_html_e('Custom Laravel web application engineered for scale.', 'arqamweb'); ?></p>
								<div class="mt-6"><p
										class="mb-1.5 text-[11px] font-semibold tracking-[0.18em] uppercase text-primary/80">
										<?php esc_html_e('Starting from', 'arqamweb'); ?></p>
									<div class="flex items-baseline gap-2 flex-wrap"><span
											class="text-4xl lg:text-5xl font-semibold tracking-tight text-gradient">$6,640</span><span
											class="text-sm font-medium text-muted-foreground"><?php esc_html_e('one-time', 'arqamweb'); ?></span>
									</div>
								</div>
								<div class="mt-7 h-px bg-border"></div>
								<ul class="mt-7 space-y-3.5">
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Custom web application built with Laravel', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Tailored backend architecture & database design', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Custom admin dashboard & role-based permissions', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Third-party integrations (payment, CRM, ERP)', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Bilingual AR/EN with full RTL support', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('90-day post-launch support', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Additional language: +30% of plan price', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Delivery: 8–12 weeks', 'arqamweb'); ?></span>
									</li>
								</ul>
							</div>
							<div class="relative mt-8 pt-2 flex flex-col gap-3"><a
									href="/quote?plan=premium&amp;service=web"
									class="inline-flex items-center justify-center gap-2 px-6 py-3.5 text-sm font-semibold rounded-full transition-all hover:-translate-y-0.5 bg-gradient-primary text-primary-foreground shadow-soft hover:shadow-glow"><?php esc_html_e('Start with Premium', 'arqamweb'); ?>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
									     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
									     stroke-linejoin="round" class="lucide lucide-arrow-right w-4 h-4"
									     aria-hidden="true">
										<path d="M5 12h14"></path>
										<path d="m12 5 7 7-7 7"></path>
									</svg>
								</a><a
									href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_CONTACT_PAGE_SLUG)); ?>"
									class="inline-flex items-center justify-center gap-1.5 text-xs font-semibold transition-colors text-muted-foreground hover:text-primary"><?php esc_html_e('or talk to us →', 'arqamweb'); ?></a>
							</div>
						</div>
					<?php endif; ?>
				</div>
				<div
					class="mt-8 rounded-2xl border border-border bg-secondary/40 px-5 py-4 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
					<p class="text-sm text-muted-foreground leading-relaxed"><?php esc_html_e('Need an e-commerce store or a custom platform? We scope both as a clean, outcome-priced quote.', 'arqamweb'); ?></p>
					<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_CONTACT_PAGE_SLUG)); ?>"
					   class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary hover:gap-2.5 transition-all whitespace-nowrap"><?php esc_html_e('Talk to us', 'arqamweb'); ?>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						     class="lucide lucide-arrow-right w-3.5 h-3.5" aria-hidden="true">
							<path d="M5 12h14"></path>
							<path d="m12 5 7 7-7 7"></path>
						</svg>
					</a></div>
				<div class="mt-6 text-center"><a href="/services/web-development"
				                                 class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary hover:gap-2.5 transition-all"><?php esc_html_e('Explore', 'arqamweb'); ?>
						<!-- -->
						<?php esc_html_e('Website Design & Development', 'arqamweb'); ?><!-- --> <?php esc_html_e('service page', 'arqamweb'); ?>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						     class="lucide lucide-arrow-right w-3.5 h-3.5" aria-hidden="true">
							<path d="M5 12h14"></path>
							<path d="m12 5 7 7-7 7"></path>
						</svg>
					</a></div>
			</div>
		</section>
		<section id="service-seo" data-pricing-section="<?php esc_attr_e('SEO pricing', 'arqamweb'); ?>"
		         class="py-16 lg:py-24 bg-secondary/30">
			<div class="container-x max-w-7xl mx-auto">
				<div class="grid lg:grid-cols-12 gap-8 items-end mb-12">
					<div class="lg:col-span-7">
						<div class="inline-flex items-center gap-3 mb-4"><span
								class="text-[11px] font-mono font-semibold tracking-[0.22em] uppercase text-primary">02
								<!-- --> / <!-- --><?php esc_html_e('Search Engine Optimization', 'arqamweb'); ?></span>
						</div>
						<h2 class="text-4xl lg:text-5xl xl:text-[3.25rem] font-semibold tracking-[-0.025em] leading-[1.05]">
							<?php esc_html_e('Search Engine Optimization', 'arqamweb'); ?></h2>
						<p class="mt-4 text-muted-foreground text-base lg:text-lg max-w-xl leading-relaxed"><?php esc_html_e('Rankings, traffic, and qualified leads — compounding month over month.', 'arqamweb'); ?></p>
					</div>
					<div class="lg:col-span-5 lg:text-right">
						<div
							class="inline-flex flex-col gap-2 px-5 py-4 rounded-2xl bg-background border border-border shadow-card">
							<div class="flex items-center gap-2 text-primary">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
								     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
								     stroke-linejoin="round" class="lucide lucide-search w-5 h-5" aria-hidden="true">
									<path d="m21 21-4.34-4.34"></path>
									<circle cx="11" cy="11" r="8"></circle>
								</svg>
								<span
									class="text-xs font-bold tracking-[0.18em] uppercase"><?php esc_html_e('From', 'arqamweb'); ?> <!-- -->$575</span>
							</div>
							<span
								class="text-xs text-muted-foreground"><?php esc_html_e('Results typically compound from month 3', 'arqamweb'); ?></span>
						</div>
					</div>
				</div>
				<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-7 auto-rows-fr">
					<?php if (function_exists('awp_service_has_packages') && awp_service_has_packages('seo')) : awp_render_service_cards('seo'); else : ?>
						<div
							class="group relative rounded-3xl p-8 lg:p-10 transition-all duration-500 flex flex-col h-full bg-background text-foreground shadow-card border border-border hover:shadow-elevated hover:-translate-y-1 ">
							<div class="relative"><h3
									class="text-xl lg:text-2xl font-semibold tracking-tight "><?php esc_html_e('Local SEO', 'arqamweb'); ?></h3>
								<p class="mt-2 text-sm leading-relaxed text-muted-foreground"><?php esc_html_e('Own one city. Dominate local search and Maps.', 'arqamweb'); ?></p>
								<div class="mt-6"><p
										class="mb-1.5 text-[11px] font-semibold tracking-[0.18em] uppercase text-primary/80">
										<?php esc_html_e('Starting from', 'arqamweb'); ?></p>
									<div class="flex items-baseline gap-2 flex-wrap"><span
											class="text-4xl lg:text-5xl font-semibold tracking-tight text-gradient">$575</span><span
											class="text-sm font-medium text-muted-foreground"><?php esc_html_e('/month', 'arqamweb'); ?></span>
									</div>
									<p class="mt-1.5 text-xs text-muted-foreground"><?php esc_html_e('3-month minimum', 'arqamweb'); ?></p>
								</div>
								<div class="mt-7 h-px bg-border"></div>
								<ul class="mt-7 space-y-3.5">
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Technical audit + fixes', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Google Business Profile optimization', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('10 keywords (single city)', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('2 blog posts/mo (800+ words)', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('5 backlinks/mo', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Monthly performance report', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Additional language: +30% of plan price', 'arqamweb'); ?></span>
									</li>
								</ul>
							</div>
							<div class="relative mt-8 pt-2 flex flex-col gap-3"><a
									href="/quote?plan=local&amp;service=seo"
									class="inline-flex items-center justify-center gap-2 px-6 py-3.5 text-sm font-semibold rounded-full transition-all hover:-translate-y-0.5 bg-gradient-primary text-primary-foreground shadow-soft hover:shadow-glow"><?php esc_html_e('Start Local SEO', 'arqamweb'); ?>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
									     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
									     stroke-linejoin="round" class="lucide lucide-arrow-right w-4 h-4"
									     aria-hidden="true">
										<path d="M5 12h14"></path>
										<path d="m12 5 7 7-7 7"></path>
									</svg>
								</a><a
									href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_CONTACT_PAGE_SLUG)); ?>"
									class="inline-flex items-center justify-center gap-1.5 text-xs font-semibold transition-colors text-muted-foreground hover:text-primary"><?php esc_html_e('or talk to us →', 'arqamweb'); ?></a>
							</div>
						</div>
						<div
							class="group relative rounded-3xl p-8 lg:p-10 transition-all duration-500 flex flex-col h-full bg-[#124f85] text-white shadow-elevated hover:-translate-y-1.5 border border-white/10 ring-1 ring-primary/50 hover:scale-[1.015]">
							<div
								class="absolute -inset-px rounded-3xl bg-gradient-to-br from-primary/40 via-primary/0 to-primary/30 opacity-60 -z-10 blur-sm"></div>
							<div class="absolute -top-3 left-1/2 -translate-x-1/2"><span
									class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-gradient-primary text-primary-foreground text-[10px] font-bold tracking-[0.18em] uppercase shadow-glow"><svg
										xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
										fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
										stroke-linejoin="round" class="lucide lucide-sparkles w-3 h-3"
										aria-hidden="true"><path
											d="M11.017 2.814a1 1 0 0 1 1.966 0l1.051 5.558a2 2 0 0 0 1.594 1.594l5.558 1.051a1 1 0 0 1 0 1.966l-5.558 1.051a2 2 0 0 0-1.594 1.594l-1.051 5.558a1 1 0 0 1-1.966 0l-1.051-5.558a2 2 0 0 0-1.594-1.594l-5.558-1.051a1 1 0 0 1 0-1.966l5.558-1.051a2 2 0 0 0 1.594-1.594z"></path><path
											d="M20 2v4"></path><path d="M22 4h-4"></path><circle cx="4" cy="20"
							                                                                     r="2"></circle></svg><?php esc_html_e('Most Popular', 'arqamweb'); ?></span>
							</div>
							<div
								class="absolute -top-24 -right-24 w-64 h-64 rounded-full bg-primary/20 blur-3xl pointer-events-none"></div>
							<div class="relative"><h3
									class="text-xl lg:text-2xl font-semibold tracking-tight text-white">
									<?php esc_html_e('National Growth', 'arqamweb'); ?></h3>
								<p class="mt-2 text-sm leading-relaxed text-white/70"><?php esc_html_e('KSA-wide visibility in AR + EN.', 'arqamweb'); ?></p>
								<div class="mt-6"><p
										class="mb-1.5 text-[11px] font-semibold tracking-[0.18em] uppercase text-white/60">
										<?php esc_html_e('Starting from', 'arqamweb'); ?></p>
									<div class="flex items-baseline gap-2 flex-wrap"><span
											class="text-4xl lg:text-5xl font-semibold tracking-tight text-white">$1,375</span><span
											class="text-sm font-medium text-white/60"><?php esc_html_e('/month', 'arqamweb'); ?></span>
									</div>
									<p class="mt-1.5 text-xs text-white/50"><?php esc_html_e('3-month minimum', 'arqamweb'); ?></p>
								</div>
								<div class="mt-7 h-px bg-white/15"></div>
								<ul class="mt-7 space-y-3.5">
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('Everything in Local SEO', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('30 keywords KSA-wide AR + EN', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('4 blog posts/mo (1,200+ words)', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('15 backlinks/mo', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('Schema + rich snippets', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('Bi-weekly strategy calls', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('Additional language: +30% of plan price', 'arqamweb'); ?></span>
									</li>
								</ul>
							</div>
							<div class="relative mt-8 pt-2 flex flex-col gap-3"><a
									href="/quote?plan=growth&amp;service=seo"
									class="inline-flex items-center justify-center gap-2 px-6 py-3.5 text-sm font-semibold rounded-full transition-all hover:-translate-y-0.5 bg-white text-primary hover:shadow-glow"><?php esc_html_e('Start National Growth', 'arqamweb'); ?>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
									     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
									     stroke-linejoin="round" class="lucide lucide-arrow-right w-4 h-4"
									     aria-hidden="true">
										<path d="M5 12h14"></path>
										<path d="m12 5 7 7-7 7"></path>
									</svg>
								</a><a
									href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_CONTACT_PAGE_SLUG)); ?>"
									class="inline-flex items-center justify-center gap-1.5 text-xs font-semibold transition-colors text-white/70 hover:text-white"><?php esc_html_e('or talk to us →', 'arqamweb'); ?></a>
							</div>
						</div>
						<div
							class="group relative rounded-3xl p-8 lg:p-10 transition-all duration-500 flex flex-col h-full bg-background text-foreground shadow-card border border-border hover:shadow-elevated hover:-translate-y-1 ">
							<div class="relative"><h3 class="text-xl lg:text-2xl font-semibold tracking-tight ">
									<?php esc_html_e('Authority', 'arqamweb'); ?></h3>
								<p class="mt-2 text-sm leading-relaxed text-muted-foreground"><?php esc_html_e('Category leader across Google + AI search.', 'arqamweb'); ?></p>
								<div class="mt-6"><p
										class="mb-1.5 text-[11px] font-semibold tracking-[0.18em] uppercase text-primary/80">
										<?php esc_html_e('Starting from', 'arqamweb'); ?></p>
									<div class="flex items-baseline gap-2 flex-wrap"><span
											class="text-4xl lg:text-5xl font-semibold tracking-tight text-gradient">$2,975</span><span
											class="text-sm font-medium text-muted-foreground"><?php esc_html_e('/month', 'arqamweb'); ?></span>
									</div>
									<p class="mt-1.5 text-xs text-muted-foreground"><?php esc_html_e('6-month minimum', 'arqamweb'); ?></p>
								</div>
								<div class="mt-7 h-px bg-border"></div>
								<ul class="mt-7 space-y-3.5">
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Everything in National Growth', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('80+ keywords', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('12 articles/mo', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('30 high-DR backlinks/mo', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Digital PR campaigns', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('AI search optimization (GEO / AEO)', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Dedicated strategist + weekly calls + Slack', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Additional language: +30% of plan price', 'arqamweb'); ?></span>
									</li>
								</ul>
							</div>
							<div class="relative mt-8 pt-2 flex flex-col gap-3"><a
									href="/quote?plan=authority&amp;service=seo"
									class="inline-flex items-center justify-center gap-2 px-6 py-3.5 text-sm font-semibold rounded-full transition-all hover:-translate-y-0.5 bg-gradient-primary text-primary-foreground shadow-soft hover:shadow-glow"><?php esc_html_e('Start Authority', 'arqamweb'); ?>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
									     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
									     stroke-linejoin="round" class="lucide lucide-arrow-right w-4 h-4"
									     aria-hidden="true">
										<path d="M5 12h14"></path>
										<path d="m12 5 7 7-7 7"></path>
									</svg>
								</a><a
									href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_CONTACT_PAGE_SLUG)); ?>"
									class="inline-flex items-center justify-center gap-1.5 text-xs font-semibold transition-colors text-muted-foreground hover:text-primary"><?php esc_html_e('or talk to us →', 'arqamweb'); ?></a>
							</div>
						</div>
					<?php endif; ?>
				</div>
				<div
					class="mt-8 rounded-2xl border border-border bg-secondary/40 px-5 py-4 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
					<p class="text-sm text-muted-foreground leading-relaxed"><?php esc_html_e('Multi-brand or multi-region SEO? We tailor a custom retainer.', 'arqamweb'); ?></p>
					<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_CONTACT_PAGE_SLUG)); ?>"
					   class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary hover:gap-2.5 transition-all whitespace-nowrap"><?php esc_html_e('Talk to us', 'arqamweb'); ?>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						     class="lucide lucide-arrow-right w-3.5 h-3.5" aria-hidden="true">
							<path d="M5 12h14"></path>
							<path d="m12 5 7 7-7 7"></path>
						</svg>
					</a></div>
				<div class="mt-6 text-center"><a href="/services/seo"
				                                 class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary hover:gap-2.5 transition-all"><?php esc_html_e('Explore', 'arqamweb'); ?>
						<!-- -->
						<?php esc_html_e('Search Engine Optimization', 'arqamweb'); ?><!-- --> <?php esc_html_e('service page', 'arqamweb'); ?>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						     class="lucide lucide-arrow-right w-3.5 h-3.5" aria-hidden="true">
							<path d="M5 12h14"></path>
							<path d="m12 5 7 7-7 7"></path>
						</svg>
					</a></div>
			</div>
		</section>
		<section id="service-brand" data-pricing-section="<?php esc_attr_e('Branding pricing', 'arqamweb'); ?>"
		         class="py-16 lg:py-24 bg-background">
			<div class="container-x max-w-7xl mx-auto">
				<div class="grid lg:grid-cols-12 gap-8 items-end mb-12">
					<div class="lg:col-span-7">
						<div class="inline-flex items-center gap-3 mb-4"><span
								class="text-[11px] font-mono font-semibold tracking-[0.22em] uppercase text-primary">03
								<!-- --> / <!-- --><?php esc_html_e('Brand Identity', 'arqamweb'); ?></span></div>
						<h2 class="text-4xl lg:text-5xl xl:text-[3.25rem] font-semibold tracking-[-0.025em] leading-[1.05]">
							<?php esc_html_e('Brand Identity', 'arqamweb'); ?></h2>
						<p class="mt-4 text-muted-foreground text-base lg:text-lg max-w-xl leading-relaxed"><?php esc_html_e('Strategy-led identities that scale across markets and languages.', 'arqamweb'); ?></p>
					</div>
					<div class="lg:col-span-5 lg:text-right">
						<div
							class="inline-flex flex-col gap-2 px-5 py-4 rounded-2xl bg-background border border-border shadow-card">
							<div class="flex items-center gap-2 text-primary">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
								     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
								     stroke-linejoin="round" class="lucide lucide-sparkles w-5 h-5" aria-hidden="true">
									<path
										d="M11.017 2.814a1 1 0 0 1 1.966 0l1.051 5.558a2 2 0 0 0 1.594 1.594l5.558 1.051a1 1 0 0 1 0 1.966l-5.558 1.051a2 2 0 0 0-1.594 1.594l-1.051 5.558a1 1 0 0 1-1.966 0l-1.051-5.558a2 2 0 0 0-1.594-1.594l-5.558-1.051a1 1 0 0 1 0-1.966l5.558-1.051a2 2 0 0 0 1.594-1.594z"></path>
									<path d="M20 2v4"></path>
									<path d="M22 4h-4"></path>
									<circle cx="4" cy="20" r="2"></circle>
								</svg>
								<span
									class="text-xs font-bold tracking-[0.18em] uppercase"><?php esc_html_e('From', 'arqamweb'); ?> <!-- -->$1,305</span>
							</div>
							<span
								class="text-xs text-muted-foreground"><?php esc_html_e('Most identities ship in 2–8 weeks', 'arqamweb'); ?></span>
						</div>
					</div>
				</div>
				<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-7 auto-rows-fr">
					<?php if (function_exists('awp_service_has_packages') && awp_service_has_packages('branding')) : awp_render_service_cards('branding'); else : ?>
						<div
							class="group relative rounded-3xl p-8 lg:p-10 transition-all duration-500 flex flex-col h-full bg-background text-foreground shadow-card border border-border hover:shadow-elevated hover:-translate-y-1 ">
							<div class="relative"><h3 class="text-xl lg:text-2xl font-semibold tracking-tight ">
									<?php esc_html_e('Essential Identity', 'arqamweb'); ?></h3>
								<p class="mt-2 text-sm leading-relaxed text-muted-foreground"><?php esc_html_e('Logo, palette, type — clean and ready to launch.', 'arqamweb'); ?></p>
								<div class="mt-6"><p
										class="mb-1.5 text-[11px] font-semibold tracking-[0.18em] uppercase text-primary/80">
										<?php esc_html_e('Starting from', 'arqamweb'); ?></p>
									<div class="flex items-baseline gap-2 flex-wrap"><span
											class="text-4xl lg:text-5xl font-semibold tracking-tight text-gradient">$1,305</span><span
											class="text-sm font-medium text-muted-foreground"><?php esc_html_e('one-time', 'arqamweb'); ?></span>
									</div>
								</div>
								<div class="mt-7 h-px bg-border"></div>
								<ul class="mt-7 space-y-3.5">
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('3 logo concepts', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Color palette', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Typography system (2 fonts)', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('1-page brand guidelines', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Business card design', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Social profile kit', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Light / dark / mono versions', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Additional language wordmark: +30% of plan price', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Delivery: 10–14 days', 'arqamweb'); ?></span>
									</li>
								</ul>
							</div>
							<div class="relative mt-8 pt-2 flex flex-col gap-3"><a
									href="/quote?plan=essential&amp;service=brand"
									class="inline-flex items-center justify-center gap-2 px-6 py-3.5 text-sm font-semibold rounded-full transition-all hover:-translate-y-0.5 bg-gradient-primary text-primary-foreground shadow-soft hover:shadow-glow"><?php esc_html_e('Start Essential', 'arqamweb'); ?>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
									     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
									     stroke-linejoin="round" class="lucide lucide-arrow-right w-4 h-4"
									     aria-hidden="true">
										<path d="M5 12h14"></path>
										<path d="m12 5 7 7-7 7"></path>
									</svg>
								</a><a
									href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_CONTACT_PAGE_SLUG)); ?>"
									class="inline-flex items-center justify-center gap-1.5 text-xs font-semibold transition-colors text-muted-foreground hover:text-primary"><?php esc_html_e('or talk to us →', 'arqamweb'); ?></a>
							</div>
						</div>
						<div
							class="group relative rounded-3xl p-8 lg:p-10 transition-all duration-500 flex flex-col h-full bg-[#124f85] text-white shadow-elevated hover:-translate-y-1.5 border border-white/10 ring-1 ring-primary/50 hover:scale-[1.015]">
							<div
								class="absolute -inset-px rounded-3xl bg-gradient-to-br from-primary/40 via-primary/0 to-primary/30 opacity-60 -z-10 blur-sm"></div>
							<div class="absolute -top-3 left-1/2 -translate-x-1/2"><span
									class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-gradient-primary text-primary-foreground text-[10px] font-bold tracking-[0.18em] uppercase shadow-glow"><svg
										xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
										fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
										stroke-linejoin="round" class="lucide lucide-sparkles w-3 h-3"
										aria-hidden="true"><path
											d="M11.017 2.814a1 1 0 0 1 1.966 0l1.051 5.558a2 2 0 0 0 1.594 1.594l5.558 1.051a1 1 0 0 1 0 1.966l-5.558 1.051a2 2 0 0 0-1.594 1.594l-1.051 5.558a1 1 0 0 1-1.966 0l-1.051-5.558a2 2 0 0 0-1.594-1.594l-5.558-1.051a1 1 0 0 1 0-1.966l5.558-1.051a2 2 0 0 0 1.594-1.594z"></path><path
											d="M20 2v4"></path><path d="M22 4h-4"></path><circle cx="4" cy="20"
							                                                                     r="2"></circle></svg><?php esc_html_e('Most Popular', 'arqamweb'); ?></span>
							</div>
							<div
								class="absolute -top-24 -right-24 w-64 h-64 rounded-full bg-primary/20 blur-3xl pointer-events-none"></div>
							<div class="relative"><h3
									class="text-xl lg:text-2xl font-semibold tracking-tight text-white">
									<?php esc_html_e('Brand System Pro', 'arqamweb'); ?></h3>
								<p class="mt-2 text-sm leading-relaxed text-white/70"><?php esc_html_e('Full visual system, ready for every touchpoint.', 'arqamweb'); ?></p>
								<div class="mt-6"><p
										class="mb-1.5 text-[11px] font-semibold tracking-[0.18em] uppercase text-white/60">
										<?php esc_html_e('Starting from', 'arqamweb'); ?></p>
									<div class="flex items-baseline gap-2 flex-wrap"><span
											class="text-4xl lg:text-5xl font-semibold tracking-tight text-white">$3,175</span><span
											class="text-sm font-medium text-white/60"><?php esc_html_e('one-time', 'arqamweb'); ?></span>
									</div>
								</div>
								<div class="mt-7 h-px bg-white/15"></div>
								<ul class="mt-7 space-y-3.5">
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('Everything in Essential', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('Logo lockups + variations', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('Full type scale', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('Iconography + patterns', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('30-page guidelines PDF', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('Letterhead + email signature', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('Presentation template (PPT/Keynote)', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('10 social templates (Canva)', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('Additional language wordmark: +30% of plan price', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('Delivery: 3–4 weeks', 'arqamweb'); ?></span>
									</li>
								</ul>
							</div>
							<div class="relative mt-8 pt-2 flex flex-col gap-3"><a
									href="/quote?plan=brand-system&amp;service=brand"
									class="inline-flex items-center justify-center gap-2 px-6 py-3.5 text-sm font-semibold rounded-full transition-all hover:-translate-y-0.5 bg-white text-primary hover:shadow-glow"><?php esc_html_e('Start Brand System', 'arqamweb'); ?>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
									     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
									     stroke-linejoin="round" class="lucide lucide-arrow-right w-4 h-4"
									     aria-hidden="true">
										<path d="M5 12h14"></path>
										<path d="m12 5 7 7-7 7"></path>
									</svg>
								</a><a
									href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_CONTACT_PAGE_SLUG)); ?>"
									class="inline-flex items-center justify-center gap-1.5 text-xs font-semibold transition-colors text-white/70 hover:text-white"><?php esc_html_e('or talk to us →', 'arqamweb'); ?></a>
							</div>
						</div>
						<div
							class="group relative rounded-3xl p-8 lg:p-10 transition-all duration-500 flex flex-col h-full bg-background text-foreground shadow-card border border-border hover:shadow-elevated hover:-translate-y-1 ">
							<div class="relative"><h3
									class="text-xl lg:text-2xl font-semibold tracking-tight "><?php esc_html_e('Strategy + Identity', 'arqamweb'); ?></h3>
								<p class="mt-2 text-sm leading-relaxed text-muted-foreground"><?php esc_html_e('Positioning, voice, and identity — built together.', 'arqamweb'); ?></p>
								<div class="mt-6"><p
										class="mb-1.5 text-[11px] font-semibold tracking-[0.18em] uppercase text-primary/80">
										<?php esc_html_e('Starting from', 'arqamweb'); ?></p>
									<div class="flex items-baseline gap-2 flex-wrap"><span
											class="text-4xl lg:text-5xl font-semibold tracking-tight text-gradient">$6,105</span><span
											class="text-sm font-medium text-muted-foreground"><?php esc_html_e('one-time', 'arqamweb'); ?></span>
									</div>
								</div>
								<div class="mt-7 h-px bg-border"></div>
								<ul class="mt-7 space-y-3.5">
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Everything in Brand System Pro', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('3 strategy workshops (90 min)', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Positioning + value prop', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Brand voice & tone', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Competitor & market analysis', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Naming / tagline (if needed)', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Persona definition', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Launch plan', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Additional language wordmark: +30% of plan price', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Delivery: 6–8 weeks', 'arqamweb'); ?></span>
									</li>
								</ul>
							</div>
							<div class="relative mt-8 pt-2 flex flex-col gap-3"><a
									href="/quote?plan=strategy&amp;service=brand"
									class="inline-flex items-center justify-center gap-2 px-6 py-3.5 text-sm font-semibold rounded-full transition-all hover:-translate-y-0.5 bg-gradient-primary text-primary-foreground shadow-soft hover:shadow-glow"><?php esc_html_e('Start Strategy + Identity', 'arqamweb'); ?>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
									     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
									     stroke-linejoin="round" class="lucide lucide-arrow-right w-4 h-4"
									     aria-hidden="true">
										<path d="M5 12h14"></path>
										<path d="m12 5 7 7-7 7"></path>
									</svg>
								</a><a
									href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_CONTACT_PAGE_SLUG)); ?>"
									class="inline-flex items-center justify-center gap-1.5 text-xs font-semibold transition-colors text-muted-foreground hover:text-primary"><?php esc_html_e('or talk to us →', 'arqamweb'); ?></a>
							</div>
						</div>
					<?php endif; ?>
				</div>
				<div
					class="mt-8 rounded-2xl border border-border bg-secondary/40 px-5 py-4 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
					<p class="text-sm text-muted-foreground leading-relaxed"><?php esc_html_e('Just need a logo? Our logo-only package starts at', 'arqamweb'); ?>
						<strong><?php esc_html_e('1,900 SAR', 'arqamweb'); ?></strong>.</p><a
						href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_CONTACT_PAGE_SLUG)); ?>"
						class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary hover:gap-2.5 transition-all whitespace-nowrap"><?php esc_html_e('Talk to us', 'arqamweb'); ?>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						     class="lucide lucide-arrow-right w-3.5 h-3.5" aria-hidden="true">
							<path d="M5 12h14"></path>
							<path d="m12 5 7 7-7 7"></path>
						</svg>
					</a></div>
				<div class="mt-6 text-center"><a href="/services/branding"
				                                 class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary hover:gap-2.5 transition-all"><?php esc_html_e('Explore', 'arqamweb'); ?>
						<!-- -->
						<?php esc_html_e('Brand Identity', 'arqamweb'); ?><!-- --> <?php esc_html_e('service page', 'arqamweb'); ?>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						     class="lucide lucide-arrow-right w-3.5 h-3.5" aria-hidden="true">
							<path d="M5 12h14"></path>
							<path d="m12 5 7 7-7 7"></path>
						</svg>
					</a></div>
			</div>
		</section>
		<section id="service-social" data-pricing-section="<?php esc_attr_e('Social pricing', 'arqamweb'); ?>"
		         class="py-16 lg:py-24 bg-secondary/30">
			<div class="container-x max-w-7xl mx-auto">
				<div class="grid lg:grid-cols-12 gap-8 items-end mb-12">
					<div class="lg:col-span-7">
						<div class="inline-flex items-center gap-3 mb-4"><span
								class="text-[11px] font-mono font-semibold tracking-[0.22em] uppercase text-primary">04
								<!-- --> / <!-- --><?php esc_html_e('Social Media Marketing', 'arqamweb'); ?></span>
						</div>
						<h2 class="text-4xl lg:text-5xl xl:text-[3.25rem] font-semibold tracking-[-0.025em] leading-[1.05]">
							<?php esc_html_e('Social Media Marketing', 'arqamweb'); ?></h2>
						<p class="mt-4 text-muted-foreground text-base lg:text-lg max-w-xl leading-relaxed"><?php esc_html_e('Bilingual content, real reels, paid ads, and community — done right.', 'arqamweb'); ?></p>
					</div>
					<div class="lg:col-span-5 lg:text-right">
						<div
							class="inline-flex flex-col gap-2 px-5 py-4 rounded-2xl bg-background border border-border shadow-card">
							<div class="flex items-center gap-2 text-primary">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
								     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
								     stroke-linejoin="round" class="lucide lucide-share2 lucide-share-2 w-5 h-5"
								     aria-hidden="true">
									<circle cx="18" cy="5" r="3"></circle>
									<circle cx="6" cy="12" r="3"></circle>
									<circle cx="18" cy="19" r="3"></circle>
									<line x1="8.59" x2="15.42" y1="13.51" y2="17.49"></line>
									<line x1="15.41" x2="8.59" y1="6.51" y2="10.49"></line>
								</svg>
								<span
									class="text-xs font-bold tracking-[0.18em] uppercase"><?php esc_html_e('From', 'arqamweb'); ?> <!-- -->$775</span>
							</div>
							<span
								class="text-xs text-muted-foreground"><?php esc_html_e('First content live within 7–10 days', 'arqamweb'); ?></span>
						</div>
					</div>
				</div>
				<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-7 auto-rows-fr">
					<?php if (function_exists('awp_service_has_packages') && awp_service_has_packages('social-media')) : awp_render_service_cards('social-media'); else : ?>
						<div
							class="group relative rounded-3xl p-8 lg:p-10 transition-all duration-500 flex flex-col h-full bg-background text-foreground shadow-card border border-border hover:shadow-elevated hover:-translate-y-1 ">
							<div class="relative"><h3 class="text-xl lg:text-2xl font-semibold tracking-tight ">
									<?php esc_html_e('Starter', 'arqamweb'); ?></h3>
								<p class="mt-2 text-sm leading-relaxed text-muted-foreground"><?php esc_html_e('2 platforms, organic-only. Build the rhythm.', 'arqamweb'); ?></p>
								<div class="mt-6"><p
										class="mb-1.5 text-[11px] font-semibold tracking-[0.18em] uppercase text-primary/80">
										<?php esc_html_e('Starting from', 'arqamweb'); ?></p>
									<div class="flex items-baseline gap-2 flex-wrap"><span
											class="text-4xl lg:text-5xl font-semibold tracking-tight text-gradient">$775</span><span
											class="text-sm font-medium text-muted-foreground"><?php esc_html_e('/month', 'arqamweb'); ?></span>
									</div>
									<p class="mt-1.5 text-xs text-muted-foreground"><?php esc_html_e('3-month minimum', 'arqamweb'); ?></p>
								</div>
								<div class="mt-7 h-px bg-border"></div>
								<ul class="mt-7 space-y-3.5">
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('2 platforms (e.g. Instagram + TikTok)', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('12 posts/mo (8 feed + 4 stories)', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('4 reels/mo (basic editing)', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Monthly content calendar', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('AR + EN captions', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Hashtag strategy', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('1 strategy call/mo + monthly report', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Additional language content: +30% of plan price', 'arqamweb'); ?></span>
									</li>
								</ul>
							</div>
							<div class="relative mt-8 pt-2 flex flex-col gap-3"><a
									href="/quote?plan=starter&amp;service=social"
									class="inline-flex items-center justify-center gap-2 px-6 py-3.5 text-sm font-semibold rounded-full transition-all hover:-translate-y-0.5 bg-gradient-primary text-primary-foreground shadow-soft hover:shadow-glow"><?php esc_html_e('Start Starter', 'arqamweb'); ?>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
									     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
									     stroke-linejoin="round" class="lucide lucide-arrow-right w-4 h-4"
									     aria-hidden="true">
										<path d="M5 12h14"></path>
										<path d="m12 5 7 7-7 7"></path>
									</svg>
								</a><a
									href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_CONTACT_PAGE_SLUG)); ?>"
									class="inline-flex items-center justify-center gap-1.5 text-xs font-semibold transition-colors text-muted-foreground hover:text-primary"><?php esc_html_e('or talk to us →', 'arqamweb'); ?></a>
							</div>
						</div>
						<div
							class="group relative rounded-3xl p-8 lg:p-10 transition-all duration-500 flex flex-col h-full bg-[#124f85] text-white shadow-elevated hover:-translate-y-1.5 border border-white/10 ring-1 ring-primary/50 hover:scale-[1.015]">
							<div
								class="absolute -inset-px rounded-3xl bg-gradient-to-br from-primary/40 via-primary/0 to-primary/30 opacity-60 -z-10 blur-sm"></div>
							<div class="absolute -top-3 left-1/2 -translate-x-1/2"><span
									class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-gradient-primary text-primary-foreground text-[10px] font-bold tracking-[0.18em] uppercase shadow-glow"><svg
										xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
										fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
										stroke-linejoin="round" class="lucide lucide-sparkles w-3 h-3"
										aria-hidden="true"><path
											d="M11.017 2.814a1 1 0 0 1 1.966 0l1.051 5.558a2 2 0 0 0 1.594 1.594l5.558 1.051a1 1 0 0 1 0 1.966l-5.558 1.051a2 2 0 0 0-1.594 1.594l-1.051 5.558a1 1 0 0 1-1.966 0l-1.051-5.558a2 2 0 0 0-1.594-1.594l-5.558-1.051a1 1 0 0 1 0-1.966l5.558-1.051a2 2 0 0 0 1.594-1.594z"></path><path
											d="M20 2v4"></path><path d="M22 4h-4"></path><circle cx="4" cy="20"
							                                                                     r="2"></circle></svg><?php esc_html_e('Most Popular', 'arqamweb'); ?></span>
							</div>
							<div
								class="absolute -top-24 -right-24 w-64 h-64 rounded-full bg-primary/20 blur-3xl pointer-events-none"></div>
							<div class="relative"><h3
									class="text-xl lg:text-2xl font-semibold tracking-tight text-white">
									<?php esc_html_e('Growth', 'arqamweb'); ?></h3>
								<p class="mt-2 text-sm leading-relaxed text-white/70"><?php esc_html_e('3 platforms + ad management. Scale what works.', 'arqamweb'); ?></p>
								<div class="mt-6"><p
										class="mb-1.5 text-[11px] font-semibold tracking-[0.18em] uppercase text-white/60">
										<?php esc_html_e('Starting from', 'arqamweb'); ?></p>
									<div class="flex items-baseline gap-2 flex-wrap"><span
											class="text-4xl lg:text-5xl font-semibold tracking-tight text-white">$1,840</span><span
											class="text-sm font-medium text-white/60"><?php esc_html_e('/month', 'arqamweb'); ?></span>
									</div>
									<p class="mt-1.5 text-xs text-white/50"><?php esc_html_e('3-month minimum', 'arqamweb'); ?></p>
								</div>
								<div class="mt-7 h-px bg-white/15"></div>
								<ul class="mt-7 space-y-3.5">
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('Everything in Starter', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('3 platforms (IG, TikTok, LinkedIn or X)', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('20 posts/mo + 8 reels (motion edits)', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('Paid ads management (up to 5,000 SAR spend)', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('Community management (<4h response)', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('A/B testing on ads', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('Bi-weekly strategy calls', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-white/10 text-primary-foreground"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-white/85"><?php esc_html_e('Additional language content: +30% of plan price', 'arqamweb'); ?></span>
									</li>
								</ul>
							</div>
							<div class="relative mt-8 pt-2 flex flex-col gap-3"><a
									href="/quote?plan=growth&amp;service=social"
									class="inline-flex items-center justify-center gap-2 px-6 py-3.5 text-sm font-semibold rounded-full transition-all hover:-translate-y-0.5 bg-white text-primary hover:shadow-glow"><?php esc_html_e('Start Growth', 'arqamweb'); ?>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
									     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
									     stroke-linejoin="round" class="lucide lucide-arrow-right w-4 h-4"
									     aria-hidden="true">
										<path d="M5 12h14"></path>
										<path d="m12 5 7 7-7 7"></path>
									</svg>
								</a><a
									href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_CONTACT_PAGE_SLUG)); ?>"
									class="inline-flex items-center justify-center gap-1.5 text-xs font-semibold transition-colors text-white/70 hover:text-white"><?php esc_html_e('or talk to us →', 'arqamweb'); ?></a>
							</div>
						</div>
						<div
							class="group relative rounded-3xl p-8 lg:p-10 transition-all duration-500 flex flex-col h-full bg-background text-foreground shadow-card border border-border hover:shadow-elevated hover:-translate-y-1 ">
							<div class="relative"><h3 class="text-xl lg:text-2xl font-semibold tracking-tight ">
									<?php esc_html_e('Authority', 'arqamweb'); ?></h3>
								<p class="mt-2 text-sm leading-relaxed text-muted-foreground"><?php esc_html_e('Full content production + paid + influencer.', 'arqamweb'); ?></p>
								<div class="mt-6"><p
										class="mb-1.5 text-[11px] font-semibold tracking-[0.18em] uppercase text-primary/80">
										<?php esc_html_e('Starting from', 'arqamweb'); ?></p>
									<div class="flex items-baseline gap-2 flex-wrap"><span
											class="text-4xl lg:text-5xl font-semibold tracking-tight text-gradient">$3,705</span><span
											class="text-sm font-medium text-muted-foreground"><?php esc_html_e('/month', 'arqamweb'); ?></span>
									</div>
									<p class="mt-1.5 text-xs text-muted-foreground"><?php esc_html_e('6-month minimum', 'arqamweb'); ?></p>
								</div>
								<div class="mt-7 h-px bg-border"></div>
								<ul class="mt-7 space-y-3.5">
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Everything in Growth', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('4 platforms (incl. YouTube Shorts)', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('30 posts/mo + 16 reels', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('1 monthly photoshoot day (Cairo/Riyadh)', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Up to 20,000 SAR ad spend managed', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Up to 3 influencer outreaches/mo', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Dedicated account manager + weekly calls', 'arqamweb'); ?></span>
									</li>
									<li class="flex items-start gap-3 text-sm leading-relaxed"><span
											class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 bg-primary/10 text-primary"><svg
												xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
												stroke-linecap="round" stroke-linejoin="round"
												class="lucide lucide-check w-3 h-3" aria-hidden="true"><path
													d="M20 6 9 17l-5-5"></path></svg></span><span
											class="text-foreground/85"><?php esc_html_e('Additional language content: +30% of plan price', 'arqamweb'); ?></span>
									</li>
								</ul>
							</div>
							<div class="relative mt-8 pt-2 flex flex-col gap-3"><a
									href="/quote?plan=authority&amp;service=social"
									class="inline-flex items-center justify-center gap-2 px-6 py-3.5 text-sm font-semibold rounded-full transition-all hover:-translate-y-0.5 bg-gradient-primary text-primary-foreground shadow-soft hover:shadow-glow"><?php esc_html_e('Start Authority', 'arqamweb'); ?>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
									     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
									     stroke-linejoin="round" class="lucide lucide-arrow-right w-4 h-4"
									     aria-hidden="true">
										<path d="M5 12h14"></path>
										<path d="m12 5 7 7-7 7"></path>
									</svg>
								</a><a
									href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_CONTACT_PAGE_SLUG)); ?>"
									class="inline-flex items-center justify-center gap-1.5 text-xs font-semibold transition-colors text-muted-foreground hover:text-primary"><?php esc_html_e('or talk to us →', 'arqamweb'); ?></a>
							</div>
						</div>
					<?php endif; ?>
				</div>
				<div
					class="mt-8 rounded-2xl border border-border bg-secondary/40 px-5 py-4 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
					<p class="text-sm text-muted-foreground leading-relaxed"><?php esc_html_e('Multi-brand or regional accounts? We build a custom plan.', 'arqamweb'); ?></p>
					<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_CONTACT_PAGE_SLUG)); ?>"
					   class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary hover:gap-2.5 transition-all whitespace-nowrap"><?php esc_html_e('Talk to us', 'arqamweb'); ?>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						     class="lucide lucide-arrow-right w-3.5 h-3.5" aria-hidden="true">
							<path d="M5 12h14"></path>
							<path d="m12 5 7 7-7 7"></path>
						</svg>
					</a></div>
				<div class="mt-6 text-center"><a href="/services/social-media"
				                                 class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary hover:gap-2.5 transition-all"><?php esc_html_e('Explore', 'arqamweb'); ?>
						<!-- -->
						<?php esc_html_e('Social Media Marketing', 'arqamweb'); ?><!-- --> <?php esc_html_e('service page', 'arqamweb'); ?>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						     class="lucide lucide-arrow-right w-3.5 h-3.5" aria-hidden="true">
							<path d="M5 12h14"></path>
							<path d="m12 5 7 7-7 7"></path>
						</svg>
					</a></div>
			</div>
		</section>
		<div class="container-x max-w-7xl mx-auto"><p
				class="mt-6 text-center text-xs text-muted-foreground max-w-2xl mx-auto leading-relaxed"><?php esc_html_e('Prices exclude VAT. 50% deposit to start, 50% on delivery (one-time services) or monthly upfront (retainers).', 'arqamweb'); ?></p>
		</div>
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
		<section class="py-24 lg:py-32 bg-secondary/30">
			<div class="container-x max-w-4xl mx-auto">
				<div class="mb-12 text-center">
					<div class="inline-flex items-center gap-3 mb-5"><span class="h-px w-10 bg-primary/60"></span><span
							class="text-[11px] font-semibold tracking-[0.22em] uppercase text-primary"><?php esc_html_e('FAQ', 'arqamweb'); ?></span><span
							class="h-px w-10 bg-primary/60"></span></div>
					<h2 class="text-4xl lg:text-5xl font-semibold tracking-[-0.025em] leading-[1.05]"><?php esc_html_e('Questions, answered.', 'arqamweb'); ?></h2>
				</div>

				<?php

				set_query_var('faq_category', 'pricing');

				get_template_part('/template-parts/faqs/custom-loop', 'faqs'); ?>

			</div>
		</section>
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
	</main>
</div>


<?php get_footer(); ?>
