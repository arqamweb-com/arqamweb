<?php
$partners = [
	['name' => 'Google', 'image' => 'https://www.arqamweb.com/wp-content/uploads/2026/05/Google.png'],
	['name' => 'Meta', 'image' => 'https://www.arqamweb.com/wp-content/uploads/2026/05/Meta.png'],
	['name' => 'Stripe', 'image' => 'https://www.arqamweb.com/wp-content/uploads/2026/05/Stripe.png'],
	['name' => 'Google Cloud', 'image' => 'https://www.arqamweb.com/wp-content/uploads/2026/05/Google-Cloud.png'],
	['name' => 'WordPress', 'image' => 'https://www.arqamweb.com/wp-content/uploads/2026/05/WordPress.png'],
	['name' => 'Shopify', 'image' => 'https://www.arqamweb.com/wp-content/uploads/2026/05/Shopify.png'],
	['name' => 'Cloudflare', 'image' => 'https://www.arqamweb.com/wp-content/uploads/2026/05/Cloud-Flare.png'],
	['name' => 'HubSpot', 'image' => 'https://www.arqamweb.com/wp-content/uploads/2026/05/HubSpot.png'],
	['name' => 'Hostinger', 'image' => 'https://www.arqamweb.com/wp-content/uploads/2026/05/Hostinger.png'],
	['name' => 'cPanel', 'image' => 'https://www.arqamweb.com/wp-content/uploads/2026/05/CPanel.png'],
	['name' => 'Rank Math', 'image' => 'https://www.arqamweb.com/wp-content/uploads/2026/05/Rank-Math.png'],
	['name' => 'Fawry', 'image' => 'https://www.arqamweb.com/wp-content/uploads/2026/05/Fawry.png'],
];
?>

<section class="relative py-24 lg:py-28 bg-background overflow-hidden">
	<div
		class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-border to-transparent"></div>
	<div class="reveal container">
		<div class="text-center max-w-2xl mx-auto mb-14">
			<div class="text-xs font-semibold tracking-[0.2em] uppercase text-primary mb-3">
				<?php esc_html_e('Our success partners', 'arqamweb'); ?>
			</div>
			<h2 class="text-3xl lg:text-4xl font-semibold tracking-tight">
				<?php esc_html_e('Powered by the platforms that', 'arqamweb'); ?> <span class="text-gradient"><?php esc_html_e('scale the modern web', 'arqamweb'); ?></span>
			</h2>
			<p class="mt-4 text-muted-foreground">
				<?php esc_html_e('We build, ship and grow on the same stack trusted by world-class brands — from payments and infrastructure to commerce and search.', 'arqamweb'); ?>
			</p>
		</div>
		<div
			class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-px bg-border/60 rounded-3xl overflow-hidden border border-border shadow-card">
			<?php foreach ($partners as $partner) : ?>
				<div
					class="group relative bg-card bg-white aspect-[5/3] flex items-center justify-center p-6 transition-all duration-500 hover:bg-background hover:shadow-elevated hover:z-10 hover:scale-[1.04]"
					title="<?php echo esc_attr($partner['name']); ?>">
					<img src="<?php echo esc_url($partner['image']); ?>"
					     alt="<?php echo esc_attr($partner['name']); ?> logo" loading="lazy" decoding="async"
					     width="160" height="80"
					     class="max-h-12 w-auto object-contain opacity-80 transition-all duration-500 group-hover:opacity-100 group-hover:scale-105">
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
