<?php

$stats = [
	['value' => '15+', 'label' => 'Years of experience', 'note' => 'since 2010'],
	['value' => '10+', 'label' => 'Countries served', 'note' => 'GCC · MENA · UK · USA'],
	['value' => '92%', 'label' => 'Client retention', 'note' => 'long-term partnerships'],
	['value' => '4.9★', 'label' => 'Average client rating', 'note' => 'out of 5.0'],
];

?>


<section class="py-28 lg:py-40 bg-gradient-dark relative overflow-hidden" data-count-up-section>
	<div class="absolute inset-0 grid-bg opacity-25"></div>
	<div class="absolute -top-48 right-0 w-[640px] h-[640px] rounded-full bg-primary/30 blur-2xl"></div>
	<div class="container relative">
		<div class="max-w-3xl mb-16">
			<div
				class="inline-flex items-center gap-2 text-xs font-semibold tracking-[0.2em] uppercase text-primary-foreground/70 mb-4">
				<span class="w-8 h-px bg-primary-foreground/50"></span><?php esc_html_e('By the numbers', 'arqamweb'); ?>
			</div>
			<h2 class="text-4xl lg:text-6xl font-semibold tracking-[-0.03em] text-primary-foreground leading-[1.05]">
				<?php esc_html_e('Results that', 'arqamweb'); ?> <span class="text-gradient"><?php esc_html_e('compound', 'arqamweb'); ?></span>,<br><?php esc_html_e('year after year.', 'arqamweb'); ?></h2>
		</div>
		<div class="grid grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-6">
			<?php foreach ($stats as $index => $stat) : ?>
				<?php
				$stat_value = trim((string)$stat['value']);
				$stat_prefix = '';
				$stat_number = $stat_value;
				$stat_suffix = '';

				if (preg_match('/^([^0-9.-]*)([0-9]+(?:\.[0-9]+)?)(.*)$/', $stat_value, $stat_parts)) {
					$stat_prefix = $stat_parts[1];
					$stat_number = $stat_parts[2];
					$stat_suffix = $stat_parts[3];
				}

				$stat_decimals = strpos($stat_number, '.') !== false ? strlen(rtrim(substr(strrchr($stat_number, '.'), 1), '0')) : 0;
				?>
				<div class="relative group">
					<?php if ($index > 0) : ?>
						<div
							class="hidden lg:block absolute -left-3 top-2 bottom-2 w-px bg-white/10"></div><?php endif; ?>
					<div class="relative">
						<div
							class="absolute -inset-6 bg-primary/15 blur-2xl rounded-full opacity-60 pointer-events-none"></div>
						<div
							class="relative text-7xl lg:text-[6.5rem] font-semibold tracking-[-0.045em] text-primary-foreground tabular-nums leading-[0.95]">
							<?php echo esc_html($stat_prefix); ?><span data-count-up
							                                           data-count-up-value="<?php echo esc_attr($stat_number); ?>"
							                                           data-count-up-decimals="<?php echo esc_attr($stat_decimals); ?>"><?php echo esc_html($stat_number); ?></span><span
								class="bg-gradient-to-br from-[color:var(--brand-primary)] to-[color:var(--brand-secondary)] bg-clip-text text-transparent drop-shadow-[0_0_30px_rgba(49,152,212,0.5)]"><?php echo esc_html($stat_suffix); ?></span>
						</div>
						<div
							class="relative mt-5 text-base font-semibold text-primary-foreground"><?php echo esc_html(__($stat['label'], 'arqamweb')); ?></div>
						<div class="relative text-sm text-primary-foreground/55 mt-1"><?php echo esc_html(__($stat['note'], 'arqamweb')); ?></div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
