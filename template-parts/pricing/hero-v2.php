<?php
/**
 * Pricing V2 Hero Section
 *
 * Hero section unique to the pricing-v2 template, featuring the main heading,
 * introductory text, currency information, action buttons, and service navigation.
 *
 * @package Arqam-Web
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
			<?php esc_html_e('Clear prices where we can.', 'arqamweb'); ?><!-- --> <span
				class="text-gradient"><?php esc_html_e('Honest quotes where we should.', 'arqamweb'); ?></span></h1>

		<p class="mt-8 text-lg md:text-xl text-muted-foreground max-w-2xl leading-relaxed"><?php esc_html_e('Our productised services carry one published price worldwide — the same for a client in Cairo, Riyadh or London. Everything custom is scoped and quoted, because no two custom projects are the same.', 'arqamweb'); ?></p>

		<div class="mt-8 flex items-start gap-3 max-w-2xl rounded-2xl border border-border bg-secondary/40 px-5 py-4">
			<span class="text-primary shrink-0 mt-0.5"><?php echo arqamweb_v2_icon('info'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
			<p class="text-xs lg:text-sm text-muted-foreground leading-relaxed"><?php esc_html_e('All prices are shown in USD as a reference currency. You can pay in Egyptian Pounds, Saudi Riyal, UAE Dirham, Euro or US Dollar — whichever is easiest for you.', 'arqamweb'); ?></p>
		</div>

		<div class="mt-10 flex flex-wrap items-center gap-4">
			<a href="#service-websites"
			   class="inline-flex items-center gap-2 px-7 py-3.5 text-sm font-semibold text-primary-foreground bg-gradient-primary rounded-full shadow-glow hover:-translate-y-0.5 transition-transform"><?php esc_html_e('See all plans', 'arqamweb'); ?>
				<?php echo arqamweb_v2_icon('arrow-right'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</a>
			<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_CONTACT_PAGE_SLUG)); ?>"
			   class="inline-flex items-center gap-2 px-7 py-3.5 text-sm font-semibold text-foreground rounded-full border border-border hover:bg-accent transition-all">
				<?php esc_html_e('Talk to a strategist', 'arqamweb'); ?>
			</a>
		</div>

		<nav aria-label="<?php esc_attr_e('Pricing sections', 'arqamweb'); ?>" class="mt-12 flex flex-wrap gap-2.5">
			<?php
			// Services navigation - expects $aw_services to be defined in parent scope
			if (isset($aw_services) && is_array($aw_services)) :
				foreach ($aw_services as $aw_nav) :
					?>
					<a href="#service-<?php echo esc_attr($aw_nav['id']); ?>"
					   class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-border bg-background/70 backdrop-blur text-xs font-semibold text-muted-foreground hover:text-primary hover:border-primary/40 transition-all">
						<span class="font-mono text-[10px] text-primary/70"><?php echo esc_html($aw_nav['num']); ?></span>
						<?php echo esc_html($aw_nav['title']); ?>
					</a>
				<?php
				endforeach;
			endif;
			?>
		</nav>
	</div>
</section>
