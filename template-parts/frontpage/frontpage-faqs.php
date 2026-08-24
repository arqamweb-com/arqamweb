<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>


<section class="py-24 lg:py-32">
	<div class="reveal container-x max-w-5xl mx-auto">
		<div class="text-center mb-14">
			<div class="text-xs font-semibold tracking-[0.2em] uppercase text-primary mb-3">
				<?php esc_html_e('Questions, answered', 'arqamweb'); ?>
			</div>
			<h2 class="text-4xl lg:text-5xl font-semibold tracking-tight">
				<?php esc_html_e('Frequently asked', 'arqamweb'); ?> <span class="text-gradient"><?php esc_html_e('questions', 'arqamweb'); ?></span>
			</h2>
		</div>
		<?php get_template_part('/template-parts/faqs/custom-loop', 'faqs'); ?>
	</div>
</section>


