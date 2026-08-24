<?php
if (! defined('ABSPATH')) {
	exit;
}

$countries = [
	['name' => 'Egypt', 'code' => 'eg'],
	['name' => 'Saudi Arabia', 'code' => 'sa'],
	['name' => 'United Arab Emirates', 'code' => 'ae'],
	['name' => 'Kuwait', 'code' => 'kw'],
	['name' => 'Oman', 'code' => 'om'],
	['name' => 'Qatar', 'code' => 'qa'],
	['name' => 'United States', 'code' => 'us'],
	['name' => 'United Kingdom', 'code' => 'gb'],
	['name' => 'Ireland', 'code' => 'ie'],
	['name' => 'Germany', 'code' => 'de'],
	['name' => 'Spain', 'code' => 'es'],
];
?>

<section class="py-16 lg:py-20 border-y border-border/60 bg-surface/40 overflow-hidden">
	<div class="reveal container">
		<div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-10">
			<div>
				<div class="text-xs font-semibold tracking-[0.2em] uppercase text-primary mb-3"><?php esc_html_e('Trusted globally', 'arqamweb'); ?></div>
				<h2 class="text-3xl lg:text-4xl font-semibold tracking-tight"><?php esc_html_e('Partnering with brands across', 'arqamweb'); ?> <span class="text-gradient"><?php esc_html_e('+10 countries', 'arqamweb'); ?></span></h2>
			</div>
			<p class="text-muted-foreground max-w-md text-sm"><?php esc_html_e('From Riyadh and Dubai to London, New York, Cairo and beyond — we ship websites that perform across every market we touch.', 'arqamweb'); ?></p>
		</div>
	</div>
	<div class="relative marquee-mask overflow-hidden">
		<div class="flex animate-marquee py-2" style="animation-duration:70s;width:max-content">
			<?php foreach (array_merge($countries, $countries) as $country) : ?>
				<div class="group shrink-0 w-[360px] mr-7">
					<div class="relative overflow-hidden rounded-2xl border border-border bg-card px-8 py-7">
						<div class="relative flex items-center gap-5">
							<div class="w-[72px] h-12 rounded-md overflow-hidden ring-1 ring-border/80 shadow-sm shrink-0 bg-muted"><img src="https://flagcdn.com/w160/<?php echo $country['code']; ?>.png" srcset="https://flagcdn.com/w160/<?php echo $country['code']; ?>.png 1x, https://flagcdn.com/w320/<?php echo $country['code']; ?>.png 2x" alt="<?php echo $country['name']; ?> flag" width="72" height="48" loading="lazy" decoding="async" class="block w-full h-full object-cover"></div>
							<div class="min-w-0">
								<div class="text-[11px] uppercase tracking-[0.18em] text-muted-foreground/80 font-medium"><?php esc_html_e('Clients in', 'arqamweb'); ?></div>
								<div class="font-semibold text-foreground text-lg whitespace-nowrap mt-0.5"><?php echo $country['name']; ?></div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
