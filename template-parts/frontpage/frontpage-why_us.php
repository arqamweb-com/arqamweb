<?php
$whyItems = [
	['title' => 'Custom-built, never templated', 'copy' => 'Every line of code, every pixel of design — written for your business, not pulled from a theme library.', 'icon' => 'code'],
	['title' => 'SEO-ready from day one', 'copy' => 'Schema, semantic HTML, Core Web Vitals, indexable architecture — search-engine fundamentals are baked in, not bolted on.', 'icon' => 'search'],
	['title' => 'Conversion-focused UX', 'copy' => 'We design for the action, not just the aesthetic. Every section is engineered to move the user one step closer to yes.', 'icon' => 'spark'],
	['title' => 'Performance you can measure', 'copy' => 'Sub-second loads, 95+ Lighthouse scores, and infrastructure that scales — performance is a feature, not a luxury.', 'icon' => 'bolt'],
	['title' => 'Long-term growth mindset', 'copy' => "We're not a one-and-done vendor. We partner with clients for years, optimizing as the market — and your business — evolves.", 'icon' => 'growth'],
	['title' => 'Senior team, no hand-offs', 'copy' => 'The strategist who scopes your project also ships it. No junior shuffling, no broken telephone — direct access to expertise.', 'icon' => 'team'],
];
?>

<section id="why" class="py-24 lg:py-32">
	<div class="reveal container">
		<div class="grid lg:grid-cols-12 gap-12 lg:gap-10 items-start">
			<div class="lg:col-span-5 lg:sticky lg:top-28">
				<div class="text-xs font-semibold tracking-[0.2em] uppercase text-primary mb-3"><?php esc_html_e('Why Arqam Web', 'arqamweb'); ?></div>
				<h2 class="text-4xl lg:text-5xl font-semibold tracking-tight"><?php esc_html_e('The studio clients call when', 'arqamweb'); ?> <span
						class="text-gradient"><?php esc_html_e('it actually has to work.', 'arqamweb'); ?></span></h2>
				<p class="mt-5 text-muted-foreground text-lg"><?php esc_html_e("For 15+ years we've helped ambitious teams turn their websites from cost centers into their most reliable growth channel — across +10 countries.", 'arqamweb'); ?></p>
				<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_QUOTE_PAGE_SLUG)); ?>"
				   class="mt-8 inline-flex items-center gap-2 px-5 py-3 text-sm font-semibold text-primary-foreground bg-gradient-primary rounded-full shadow-glow hover:-translate-y-0.5 transition-transform"><?php esc_html_e('Start a project', 'arqamweb'); ?> <?php echo arqam_icon('arrow'); ?></a>
			</div>
			<div class="lg:col-span-7 grid sm:grid-cols-2 gap-4">
				<?php foreach ($whyItems as $item) : ?>
					<div
						class="group rounded-2xl border border-border bg-card p-6 hover:border-primary/40 hover:-translate-y-1 hover:scale-[1.02] transition-all duration-300 shadow-card">
						<div
							class="w-11 h-11 rounded-xl bg-primary/10 text-primary flex items-center justify-center mb-4 transition-all duration-300 group-hover:text-primary-foreground group-hover:scale-110 group-hover:shadow-glow group-hover:[background:#31415a]"><?php echo arqam_icon($item['icon']); ?></div>
						<h3 class="font-semibold text-base group-hover:text-primary transition-colors"><?php echo esc_html(__($item['title'], 'arqamweb')); ?></h3>
						<p class="mt-1.5 text-sm text-muted-foreground leading-relaxed"><?php echo esc_html(__($item['copy'], 'arqamweb')); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
