<?php
if (!defined('ABSPATH')) exit;
?>

<section class="py-24 lg:py-32 bg-secondary/30">
	<div class="container-x max-w-4xl mx-auto">
		<div class="mb-12 text-center">
			<div class="inline-flex items-center gap-3 mb-5"><span class="h-px w-10 bg-primary/60"></span><span
					class="text-[11px] font-semibold tracking-[0.22em] uppercase text-primary"><?php esc_html_e('FAQ', 'arqamweb'); ?></span><span
					class="h-px w-10 bg-primary/60"></span></div>
			<h2 class="text-4xl lg:text-5xl font-semibold tracking-[-0.025em] leading-[1.05]"><?php esc_html_e('Questions, answered.', 'arqamweb'); ?></h2>
		</div>

		<?php

		set_query_var('faq_category', 'pricing');

		get_template_part('/template-parts/faqs/custom-loop', 'faqs'); ?>

	</div>
</section>
