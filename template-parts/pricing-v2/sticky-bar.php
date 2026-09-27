<?php
/**
 * Pricing V2 Sticky Currency Bar
 *
 * Sticky bar with currency switcher (WCML integration).
 *
 * @package Arqam-Web
 */

if (!defined('ABSPATH')) exit;

/**
 * Sticky bar. In the design this hosts the currency switcher; here it is
 * rendered only when WooCommerce Multilingual (WCML) is active, so the
 * switcher is WPML's own. Without WCML the bar stays out of the markup.
 */
if (has_action('wcml_currency_switcher')) :
	?>
	<div class="sticky top-[var(--aw-header-height,4rem)] z-40 bg-background/80 backdrop-blur-xl border-b border-border/60 shadow-soft">
		<div class="container-x max-w-7xl mx-auto py-2.5 flex items-center justify-between gap-4">
			<div class="flex items-center gap-2 min-w-0">
				<span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-primary/10 text-primary shrink-0">
					<?php echo arqamweb_v2_icon('tag', 'w-3 h-3'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</span>
				<span class="text-[11px] font-semibold tracking-[0.18em] uppercase text-muted-foreground truncate">
					<?php esc_html_e('Pricing', 'arqamweb'); ?>
				</span>
			</div>
			<div class="flex items-center gap-2">
				<span class="text-[10px] font-medium text-muted-foreground shrink-0"><?php esc_html_e('Prices in', 'arqamweb'); ?></span>
				<?php do_action('wcml_currency_switcher', ['format' => '%name% (%symbol%)']); ?>
			</div>
		</div>
	</div>
<?php endif; ?>
