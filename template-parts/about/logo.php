<?php
if (!defined('ABSPATH')) {
	exit;
}
?>
<section class="relative py-28 lg:py-36 bg-background overflow-hidden">
	<div class="container-x max-w-7xl mx-auto">
		<div class="max-w-3xl mb-16">
			<div class="text-xs font-semibold tracking-[0.22em] uppercase text-primary mb-4"><?php esc_html_e('The logo', 'arqamweb'); ?></div>
			<h2 class="text-4xl lg:text-6xl font-semibold tracking-[-0.035em] leading-[1.05]"><?php esc_html_e('Built on a', 'arqamweb'); ?> <span
					class="text-gradient"><?php esc_html_e('grid.', 'arqamweb'); ?></span></h2>
			<p class="mt-5 text-muted-foreground text-lg max-w-2xl"><?php esc_html_e('Every curve, every angle, every proportion is intentional.', 'arqamweb'); ?></p></div>
		<div class="grid lg:grid-cols-12 gap-10 lg:gap-14 items-center">
			<div class="lg:col-span-6">
				<div
					class="relative aspect-square rounded-3xl border border-border bg-gradient-to-br from-card via-surface to-background p-12 lg:p-16 shadow-card overflow-hidden">
					<svg viewBox="0 0 100 100" class="absolute inset-0 w-full h-full text-primary/15"
					     preserveAspectRatio="none">
						<defs>
							<pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
								<path d="M 10 0 L 0 0 0 10" fill="none" stroke="currentColor"
								      stroke-width="0.2"></path>
							</pattern>
						</defs>
						<rect width="100" height="100" fill="url(#grid)"></rect>
						<circle cx="50" cy="50" r="35" fill="none" stroke="currentColor" stroke-width="0.3"
						        stroke-dasharray="2 2"></circle>
						<circle cx="50" cy="50" r="25" fill="none" stroke="currentColor" stroke-width="0.3"
						        stroke-dasharray="2 2"></circle>
						<line x1="0" y1="50" x2="100" y2="50" stroke="currentColor" stroke-width="0.2"
						      stroke-dasharray="3 3"></line>
						<line x1="50" y1="0" x2="50" y2="100" stroke="currentColor" stroke-width="0.2"
						      stroke-dasharray="3 3"></line>
					</svg>
					<div class="absolute w-6 h-6 text-primary/40"
					     style="top: 4px; left: 4px; transform: rotate(0deg);"><span
							class="absolute top-0 left-0 w-3 h-px bg-current"></span><span
							class="absolute top-0 left-0 h-3 w-px bg-current"></span></div>
					<div class="absolute w-6 h-6 text-primary/40"
					     style="top: 4px; right: 4px; transform: rotate(90deg);"><span
							class="absolute top-0 left-0 w-3 h-px bg-current"></span><span
							class="absolute top-0 left-0 h-3 w-px bg-current"></span></div>
					<div class="absolute w-6 h-6 text-primary/40"
					     style="bottom: 4px; right: 4px; transform: rotate(180deg);"><span
							class="absolute top-0 left-0 w-3 h-px bg-current"></span><span
							class="absolute top-0 left-0 h-3 w-px bg-current"></span></div>
					<div class="absolute w-6 h-6 text-primary/40"
					     style="bottom: 4px; left: 4px; transform: rotate(270deg);"><span
							class="absolute top-0 left-0 w-3 h-px bg-current"></span><span
							class="absolute top-0 left-0 h-3 w-px bg-current"></span></div>
					<div class="relative h-full w-full grid place-items-center">
						<img alt="Arqam Web logo"
						     class="w-2/3 max-w-[260px] drop-shadow-[0_20px_60px_color-mix(in_oklab,var(--primary)_40%,transparent)]"
						     src="<?php echo get_template_directory_uri(); ?>/frontend/img/Arqam-Web-Logo.png">
					</div>
					<div
						class="absolute top-6 right-6 text-[10px] font-mono uppercase tracking-wider text-primary/70">
						1.618 · φ
					</div>
					<div
						class="absolute bottom-6 left-6 text-[10px] font-mono uppercase tracking-wider text-primary/70">
						grid · 8pt
					</div>
				</div>
			</div>
			<div class="lg:col-span-6 space-y-8">
				<div class="group relative pl-6 border-l border-border hover:border-primary transition-colors">
					<div class="text-[10px] font-bold tracking-[0.22em] uppercase text-primary mb-2"><?php esc_html_e('Geometry', 'arqamweb'); ?>
					</div>
					<h3 class="text-2xl font-semibold tracking-tight"><?php esc_html_e('Mathematical balance', 'arqamweb'); ?></h3>
					<p class="mt-2 text-muted-foreground leading-relaxed"><?php esc_html_e('Constructed on an 8-point grid with golden-ratio proportions. The mark reads as one shape from any distance — billboard or favicon.', 'arqamweb'); ?></p></div>
				<div class="group relative pl-6 border-l border-border hover:border-primary transition-colors">
					<div class="text-[10px] font-bold tracking-[0.22em] uppercase text-primary mb-2"><?php esc_html_e('Symbolism', 'arqamweb'); ?>
					</div>
					<h3 class="text-2xl font-semibold tracking-tight"><?php esc_html_e('Numbers, made visual', 'arqamweb'); ?></h3>
					<p class="mt-2 text-muted-foreground leading-relaxed"><?php esc_html_e('The mark abstracts the Arabic word', 'arqamweb'); ?> أرقام — <?php esc_html_e('a quiet nod to measurement, the soul of our work.', 'arqamweb'); ?></p></div>
				<div class="group relative pl-6 border-l border-border hover:border-primary transition-colors">
					<div class="text-[10px] font-bold tracking-[0.22em] uppercase text-primary mb-2"><?php esc_html_e('Motion', 'arqamweb'); ?>
					</div>
					<h3 class="text-2xl font-semibold tracking-tight"><?php esc_html_e('Built to move', 'arqamweb'); ?></h3>
					<p class="mt-2 text-muted-foreground leading-relaxed"><?php esc_html_e('Designed to flex across formats — animated intros, dark/light themes, single-color print. One identity, infinite contexts.', 'arqamweb'); ?></p></div>
			</div>
		</div>
	</div>
</section>
