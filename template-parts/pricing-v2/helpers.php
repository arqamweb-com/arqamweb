<?php
/**
 * Pricing V2 Helper Functions
 *
 * Shared utility functions for pricing-v2 template.
 *
 * @package Arqam-Web
 */

if (!defined('ABSPATH')) exit;

if (!function_exists('arqamweb_v2_icon')) {
	/**
	 * Inline lucide icon, matching the SVG conventions used in pricing.php.
	 */
	function arqamweb_v2_icon(string $name, string $classes = 'w-4 h-4'): string
	{
		static $paths = [
			'arrow-right'   => '<path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path>',
			'check'         => '<path d="M20 6 9 17l-5-5"></path>',
			'chevron-right' => '<path d="m9 18 6-6-6-6"></path>',
			'clapperboard'  => '<path d="M20.2 6 3 11l-.9-2.4c-.3-1.1.3-2.2 1.3-2.5l13.5-4c1.1-.3 2.2.3 2.5 1.3Z"></path><path d="m6.2 5.3 3.1 3.9"></path><path d="m12.4 3.4 3.1 4"></path><path d="M3 11h18v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Z"></path>',
			'info'          => '<circle cx="12" cy="12" r="10"></circle><path d="M12 16v-4"></path><path d="M12 8h.01"></path>',
			'life-buoy'     => '<circle cx="12" cy="12" r="10"></circle><path d="m4.93 4.93 4.24 4.24"></path><path d="m14.83 9.17 4.24-4.24"></path><path d="m14.83 14.83 4.24 4.24"></path><path d="m9.17 14.83-4.24 4.24"></path><circle cx="12" cy="12" r="4"></circle>',
			'rocket'        => '<path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91 0z"></path><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"></path><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"></path><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"></path>',
			'search'        => '<circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path>',
			'server'        => '<rect width="20" height="8" x="2" y="2" rx="2" ry="2"></rect><rect width="20" height="8" x="2" y="14" rx="2" ry="2"></rect><line x1="6" x2="6.01" y1="6" y2="6"></line><line x1="6" x2="6.01" y1="18" y2="18"></line>',
			'share-2'       => '<circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" x2="15.42" y1="13.51" y2="17.49"></line><line x1="15.41" x2="8.59" y1="6.51" y2="10.49"></line>',
			'shopping-cart' => '<circle cx="8" cy="21" r="1"></circle><circle cx="19" cy="21" r="1"></circle><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>',
			'smartphone'    => '<rect width="14" height="20" x="5" y="2" rx="2" ry="2"></rect><path d="M12 18h.01"></path>',
			'sparkles'      => '<path d="M11.017 2.814a1 1 0 0 1 1.966 0l1.051 5.558a2 2 0 0 0 1.594 1.594l5.558 1.051a1 1 0 0 1 0 1.966l-5.558 1.051a2 2 0 0 0-1.594 1.594l-1.051 5.558a1 1 0 0 1-1.966 0l-1.051-5.558a2 2 0 0 0-1.594-1.594l-5.558-1.051a1 1 0 0 1 0-1.966l5.558-1.051a2 2 0 0 0 1.594-1.594z"></path><path d="M20 2v4"></path><path d="M22 4h-4"></path><circle cx="4" cy="20" r="2"></circle>',
			'tag'           => '<path d="M12.586 2.586A2 2 0 0 0 11.172 2H4a2 2 0 0 0-2 2v7.172a2 2 0 0 0 .586 1.414l8.704 8.704a2.426 2.426 0 0 0 3.42 0l6.58-6.58a2.426 2.426 0 0 0 0-3.42z"></path><circle cx="7.5" cy="7.5" r=".5" fill="currentColor"></circle>',
			'target'        => '<circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle>',
			'trophy'        => '<path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"></path><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"></path><path d="M4 22h16"></path><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"></path><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"></path><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"></path>',
			'wrench'        => '<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>',
			'zap'           => '<path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"></path>',
		];

		if (!isset($paths[$name])) return '';

		return '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"'
			. ' stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"'
			. ' class="lucide lucide-' . esc_attr($name) . ' ' . esc_attr($classes) . '" aria-hidden="true">'
			. $paths[$name] . '</svg>';
	}
}

if (!function_exists('arqamweb_v2_price')) {
	/**
	 * Published price. USD is the single source of truth for every figure on
	 * this page; WPML/WCML handles presentation in other currencies.
	 */
	function arqamweb_v2_price(int $usd): string
	{
		return '$' . number_format_i18n($usd);
	}
}

if (!function_exists('arqamweb_v2_card')) {
	/**
	 * One pricing card. The "popular" variant uses the same dark treatment as
	 * the highlighted cards in pricing.php (bg-[#124f85] + ring-primary/50).
	 *
	 * A tier without a 'price' renders the "Quoted to scope" pill instead.
	 *
	 * Every card CTA — both the "Buy …" checkout button and the "Request a
	 * Quote" button — points at the contact page, carrying the tier id in a
	 * `plan` query arg so the contact form knows which package was clicked.
	 */
	function arqamweb_v2_card(array $tier, string $contact_url): void
	{
		$dark   = !empty($tier['popular']);
		$quoted = !isset($tier['price']);
		?>
		<div class="group relative rounded-3xl p-8 lg:p-10 transition-all duration-500 flex flex-col h-full <?php echo $dark
			? 'bg-[#124f85] text-white shadow-elevated hover:-translate-y-1.5 border border-white/10 ring-1 ring-primary/50'
			: 'bg-background text-foreground shadow-card border border-border hover:shadow-elevated hover:-translate-y-1'; ?>">
			<?php if ($dark) : ?>
				<div class="absolute -inset-px rounded-3xl bg-gradient-to-br from-primary/40 via-primary/0 to-primary/30 opacity-60 -z-10 blur-sm"></div>
				<div class="absolute -top-3 left-1/2 -translate-x-1/2 whitespace-nowrap">
					<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-gradient-primary text-primary-foreground text-[10px] font-bold tracking-[0.18em] uppercase shadow-glow">
						<?php echo arqamweb_v2_icon('sparkles', 'w-3 h-3'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						<?php echo esc_html($tier['badge'] ?? __('Most Popular', 'arqamweb')); ?>
					</span>
				</div>
				<div class="absolute -top-24 -right-24 w-64 h-64 rounded-full bg-primary/20 blur-3xl pointer-events-none"></div>
			<?php endif; ?>

			<div class="relative flex-1">
				<?php if (!empty($tier['audience'])) : ?>
					<p class="mb-2 text-[10px] font-bold tracking-[0.22em] uppercase <?php echo $dark ? 'text-white/55' : 'text-muted-foreground'; ?>">
						<?php echo esc_html($tier['audience']); ?>
					</p>
				<?php endif; ?>

				<h3 class="text-xl lg:text-2xl font-semibold tracking-tight <?php echo $dark ? 'text-white' : ''; ?>">
					<?php echo esc_html($tier['name']); ?>
				</h3>
				<p class="mt-2 text-sm leading-relaxed <?php echo $dark ? 'text-white/70' : 'text-muted-foreground'; ?>">
					<?php echo esc_html($tier['tagline']); ?>
				</p>

				<div class="mt-6">
					<?php if ($quoted) : ?>
						<span class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-semibold tracking-tight <?php echo $dark
							? 'bg-white/10 text-white border border-white/20'
							: 'bg-primary/[0.06] text-primary border border-primary/25'; ?>">
							<?php esc_html_e('Quoted to scope', 'arqamweb'); ?>
						</span>
					<?php else : ?>
						<p class="mb-1.5 text-[11px] font-semibold tracking-[0.18em] uppercase <?php echo $dark ? 'text-white/60' : 'text-primary/80'; ?>">
							<?php esc_html_e('Starting from', 'arqamweb'); ?>
						</p>
						<div class="flex items-baseline gap-2 flex-wrap">
							<span class="text-4xl lg:text-5xl font-semibold tracking-tight <?php echo $dark ? 'text-white' : 'text-gradient'; ?>">
								<?php echo esc_html(arqamweb_v2_price((int) $tier['price'])); ?>
							</span>
							<span class="text-sm font-medium <?php echo $dark ? 'text-white/60' : 'text-muted-foreground'; ?>">
								<?php echo esc_html($tier['period'] ?? ''); ?>
							</span>
						</div>
						<?php if (!empty($tier['price_note'])) : ?>
							<p class="mt-1.5 text-xs <?php echo $dark ? 'text-white/50' : 'text-muted-foreground'; ?>">
								<?php echo esc_html($tier['price_note']); ?>
							</p>
						<?php endif; ?>
					<?php endif; ?>
				</div>

				<div class="mt-7 h-px <?php echo $dark ? 'bg-white/15' : 'bg-border'; ?>"></div>

				<ul class="mt-7 space-y-3.5">
					<?php foreach ($tier['features'] as $feature) : ?>
						<li class="flex items-start gap-3 text-sm leading-relaxed">
							<span class="inline-flex items-center justify-center w-5 h-5 rounded-full shrink-0 mt-0.5 <?php echo $dark ? 'bg-white/10 text-primary-foreground' : 'bg-primary/10 text-primary'; ?>">
								<?php echo arqamweb_v2_icon('check', 'w-3 h-3'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							</span>
							<span class="<?php echo $dark ? 'text-white/85' : 'text-foreground/85'; ?>"><?php echo esc_html($feature); ?></span>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="relative mt-8 pt-2 flex flex-col gap-3">
				<?php
				$cta_classes = $dark
					? 'bg-white text-primary hover:shadow-glow'
					: 'bg-gradient-primary text-primary-foreground shadow-soft hover:shadow-glow';
				?>
				<?php if (!empty($tier['checkout'])) : ?>
					<a href="<?php echo esc_url(add_query_arg('plan', $tier['id'], $contact_url)); ?>"
					   class="inline-flex items-center justify-center gap-2 px-6 py-3.5 text-sm font-semibold rounded-full transition-all hover:-translate-y-0.5 <?php echo esc_attr($cta_classes); ?>">
						<?php echo arqamweb_v2_icon('shopping-cart'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						<?php echo esc_html($tier['checkout_label'] ?? __('Get started', 'arqamweb')); ?>
					</a>
				<?php else : ?>
					<a href="<?php echo esc_url(add_query_arg('plan', $tier['id'], $contact_url)); ?>"
					   class="inline-flex items-center justify-center gap-2 px-6 py-3.5 text-sm font-semibold rounded-full transition-all hover:-translate-y-0.5 <?php echo esc_attr($cta_classes); ?>">
						<?php esc_html_e('Request a Quote', 'arqamweb'); ?>
						<?php echo arqamweb_v2_icon('arrow-right'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</a>
				<?php endif; ?>

				<a href="<?php echo esc_url($contact_url); ?>"
				   class="inline-flex items-center justify-center gap-1.5 text-xs font-semibold transition-colors <?php echo $dark ? 'text-white/70 hover:text-white' : 'text-muted-foreground hover:text-primary'; ?>">
					<?php esc_html_e('or talk to us', 'arqamweb'); ?>
					<?php echo arqamweb_v2_icon('arrow-right', 'w-3 h-3'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</a>
			</div>
		</div>
		<?php
	}
}

if (!function_exists('arqamweb_v2_reassure')) {
	/**
	 * The calm "you probably need more than this" block under each section.
	 * $stacked lays it out vertically for the narrow column beside a single card.
	 */
	function arqamweb_v2_reassure(array $block, bool $stacked = false, string $margin = 'mt-8'): void
	{
		?>
		<div class="<?php echo esc_attr($margin); ?> rounded-3xl border border-primary/25 bg-primary/[0.04] p-7 lg:p-9 shadow-card">
			<div class="<?php echo $stacked ? 'flex flex-col gap-6' : 'grid lg:grid-cols-12 gap-6 lg:gap-8 items-center'; ?>">
				<div class="<?php echo $stacked ? '' : 'lg:col-span-8'; ?>">
					<div class="flex items-start gap-3">
						<span class="inline-flex items-center justify-center w-10 h-10 rounded-2xl bg-gradient-primary text-primary-foreground shadow-soft shrink-0">
							<?php echo arqamweb_v2_icon('wrench'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</span>
						<div class="min-w-0">
							<h3 class="text-lg lg:text-xl font-semibold tracking-tight"><?php echo esc_html($block['heading']); ?></h3>
							<p class="mt-2.5 text-sm text-muted-foreground leading-relaxed"><?php echo esc_html($block['body']); ?></p>
						</div>
					</div>
				</div>
				<div class="<?php echo $stacked ? '' : 'lg:col-span-4 lg:text-right'; ?>">
					<a href="<?php echo esc_url($block['href']); ?>"
					   class="inline-flex items-center justify-center gap-2 px-6 py-3.5 text-sm font-semibold rounded-full bg-gradient-primary text-primary-foreground shadow-soft hover:shadow-glow hover:-translate-y-0.5 transition-all">
						<?php echo esc_html($block['cta']); ?>
						<?php echo arqamweb_v2_icon('arrow-right'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</a>
				</div>
			</div>
		</div>
		<?php
	}
}

if (!function_exists('arqamweb_v2_note')) {
	/**
	 * Closing note for a section: a highlighted blue band when 'note_highlight'
	 * is set, otherwise the subtle strip with an optional service-page link.
	 */
	function arqamweb_v2_note(array $svc): void
	{
		if (!empty($svc['note_highlight'])) :
			?>
			<div class="mt-8 rounded-3xl border border-primary/25 bg-primary/[0.05] px-6 py-5 flex items-start gap-3 shadow-card">
				<span class="text-primary shrink-0 mt-0.5"><?php echo arqamweb_v2_icon('info'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
				<p class="text-sm text-foreground/80 leading-relaxed"><?php echo esc_html($svc['note']); ?></p>
			</div>
			<?php
			return;
		endif;
		?>
		<div class="mt-8 rounded-2xl border border-border bg-secondary/40 px-5 py-4 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
			<p class="text-sm text-muted-foreground leading-relaxed"><?php echo esc_html($svc['note']); ?></p>
			<?php if (!empty($svc['service_slug'])) : ?>
				<a href="<?php echo esc_url(home_url('/services/' . $svc['service_slug'])); ?>"
				   class="shrink-0 inline-flex items-center gap-1.5 text-xs font-semibold text-primary hover:gap-2.5 transition-all">
					<?php
					/* translators: %s: service name, e.g. "SEO / AEO". */
					printf(esc_html__('Explore the %s page', 'arqamweb'), esc_html($svc['title']));
					?>
					<?php echo arqamweb_v2_icon('arrow-right', 'w-3.5 h-3.5'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</a>
			<?php endif; ?>
		</div>
		<?php
	}
}
