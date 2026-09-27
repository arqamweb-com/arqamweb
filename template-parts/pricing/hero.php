<?php
/**
 * Pricing Page Hero Section
 *
 * @package ArqamWeb
 */

if (!defined('ABSPATH')) exit;
?>

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
