<?php
/**
 * Template part for displaying project CTA section
 *
 * @package Arqam-Web
 */

$project_cta = $args['project_cta'] ?? [];
$has_project_cta = $args['has_project_cta'] ?? false;

?>
<!-- Project CTA -->
<?php if ($has_project_cta) : ?>
<section class="section-padding pt-8 pb-32 surface-elevated">
	<div class="relative container rounded-3xl bg-primary text-white p-12 md:p-20 text-center space-y-8 transition-all duration-700 translate-y-6 scale-[0.98]">
		<div class="absolute inset-0 overflow-hidden rounded-3xl" style="z-index: 0;">
			<div class="glass-orb rounded-full" style="width: 180px; height: 180px; left: 8%; top: 15%; background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.12), transparent 70%); border: 1px solid rgba(255, 255, 255, 0.1); animation: 12s ease-in-out 0s infinite normal none running glass-float-1;"></div>
			<div class="glass-orb rounded-full" style="width: 120px; height: 120px; left: 75%; top: 60%; background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.15), transparent 70%); border: 1px solid rgba(255, 255, 255, 0.1); animation: 14s ease-in-out -3s infinite normal none running glass-float-2;"></div>
			<div class="glass-orb rounded-full" style="width: 90px; height: 90px; left: 60%; top: 10%; background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.1), transparent 70%); border: 1px solid rgba(255, 255, 255, 0.1); animation: 10s ease-in-out -7s infinite normal none running glass-float-3;"></div>
			<div class="glass-orb rounded-full" style="width: 150px; height: 150px; left: 25%; top: 70%; background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.13), transparent 70%); border: 1px solid rgba(255, 255, 255, 0.1); animation: 13s ease-in-out -5s infinite normal none running glass-float-4;"></div>
			<div class="glass-orb rounded-full" style="width: 70px; height: 70px; left: 85%; top: 20%; background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.14), transparent 70%); border: 1px solid rgba(255, 255, 255, 0.1); animation: 11s ease-in-out -2s infinite normal none running glass-float-1;"></div>
		</div>
		<div class="relative" style="z-index: 1;">
			<?php if ($project_cta['title'] !== '') : ?>
				<h2 class="text-3xl md:text-5xl lg:text-6xl font-display font-bold leading-[1.05] tracking-tight" style="line-height: 1.05;"><?php echo esc_html($project_cta['title']); ?></h2>
			<?php endif; ?>
			<?php if ($project_cta['description'] !== '') : ?>
				<p class="text-white/80 text-lg max-w-xl mx-auto leading-relaxed mt-8"><?php echo esc_html($project_cta['description']); ?></p>
			<?php endif; ?>
			<div class="flex flex-wrap gap-4 justify-center pt-6">
				<a href="<?php echo arqamweb_get_page_permalink(ARQAM_QUOTE_PAGE_SLUG); ?>" class="inline-flex items-center gap-2 px-10 py-4 rounded-full bg-background text-foreground font-semibold text-sm tracking-wide hover:opacity-90 active:scale-[0.97] transition-all duration-200 shadow-lg">
					<span><?php esc_html_e('Start Your Project', 'arqamweb'); ?></span>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-up-right w-4 h-4">
						<path d="M7 7h10v10"></path>
						<path d="M7 17 17 7"></path>
					</svg>
				</a>
				<a href="<?php echo arqamweb_get_page_permalink(ARQAM_QUOTE_PAGE_SLUG); ?>" class="inline-flex items-center gap-2 px-10 py-4 rounded-full border border-primary-foreground/30 font-semibold text-sm tracking-wide text-white hover:bg-primary-foreground/10 active:scale-[0.97] transition-all duration-200"><?php esc_html_e('Get a Proposal', 'arqamweb'); ?></a>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
