<?php
/**
 * Pricing V2 Why It Works Section
 *
 * @package Arqam-Web
 */

if (!defined('ABSPATH')) exit;
?>

<section class="py-20 lg:py-28 bg-secondary/30">
	<div class="reveal container-x max-w-7xl mx-auto in">
		<div class="text-center mb-14">
			<div class="inline-flex items-center gap-3 mb-5"><span class="h-px w-10 bg-primary/60"></span><span
					class="text-[11px] font-semibold tracking-[0.22em] uppercase text-primary"><?php esc_html_e('Why it works', 'arqamweb'); ?></span><span
					class="h-px w-10 bg-primary/60"></span></div>
			<h2 class="text-4xl lg:text-5xl xl:text-[3.5rem] font-semibold tracking-[-0.025em] leading-[1.05] max-w-3xl mx-auto">
				<?php esc_html_e('Priced on scope,', 'arqamweb'); ?><!-- --> <span
					class="text-gradient"><?php esc_html_e('confirmed in writing.', 'arqamweb'); ?></span></h2>
		</div>

		<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
			<?php
			$aw_why = [
				[
					'icon'  => 'trophy',
					'title' => __('Senior team on every engagement.', 'arqamweb'),
					'body'  => __('The people who scope your project are the ones who build it — no hand-off to a junior bench after the kickoff call.', 'arqamweb'),
				],
				[
					'icon'  => 'target',
					'title' => __('Scope-priced, not hour-priced.', 'arqamweb'),
					'body'  => __('We count the units of work — templates, languages, integrations, roles — and quote the exact figure before anything starts.', 'arqamweb'),
				],
				[
					'icon'  => 'zap',
					'title' => __('Built to scale, not to lock you in.', 'arqamweb'),
					'body'  => __('Short minimum terms, published task pricing, and accounts and source code that stay in your name.', 'arqamweb'),
				],
			];
			foreach ($aw_why as $aw_item) :
				?>
				<div class="p-7 rounded-3xl border border-border bg-background shadow-card">
					<div class="inline-flex items-center justify-center w-11 h-11 rounded-2xl bg-gradient-primary text-primary-foreground shadow-soft">
						<?php echo arqamweb_v2_icon($aw_item['icon'], 'w-5 h-5'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</div>
					<h3 class="mt-5 text-lg font-semibold tracking-tight"><?php echo esc_html($aw_item['title']); ?></h3>
					<p class="mt-2 text-sm text-muted-foreground leading-relaxed"><?php echo esc_html($aw_item['body']); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
