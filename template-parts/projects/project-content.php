	<?php
	/**
	 * Template part for displaying project content sections
	 *
	 * @package Arqam-Web
	 */

	if (!defined('ABSPATH')) exit; // Exit if accessed directly

	$transform_cards = ArqamWeb_Project::get_transform_cards(get_the_ID());
	if ($transform_cards) :
	?>
		<section class="section-padding py-32 surface-elevated">
			<div class="container">
				<p class="text-sm font-medium tracking-widest uppercase text-primary mb-4"><?php esc_html_e('Overview', 'arqamweb'); ?></p>
				<h2 class="text-3xl md:text-4xl font-display font-bold mb-16 max-w-2xl"><?php esc_html_e('How we transformed this business', 'arqamweb'); ?></h2>
				<div class="grid md:grid-cols-3 gap-8 lg:gap-12">

					<?php

					foreach ($transform_cards as $card) :
						$icon_url = $card['icon'];
						$icon_alt = sprintf( __( '%s icon', 'arqamweb' ), $card['title'] );
						$tag = $card['tag'];
						$title = $card['title'];
						$description = $card['desc'];
					?>

						<div class="space-y-5 p-8 rounded-2xl surface-elevated border border-border/40 transition-all duration-500 hover-lift translate-y-6" style="transition-delay: 100ms;">
							<?php if ($icon_url): ?>
								<div class="w-11 h-11 rounded-xl bg-primary/10 text-primary flex items-center justify-center">
									<img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($icon_alt); ?>">
								</div>
							<?php endif; ?>

							<div>
								<?php if ($tag): ?>
									<span class="text-[11px] font-bold tracking-widest uppercase text-primary">
										<?php echo esc_html($tag); ?>
									</span>
								<?php endif; ?>

								<h3 class="text-xl font-display font-semibold mt-1">
									<?php echo esc_html($title); ?>
								</h3>
							</div>

							<?php if ($description): ?>
								<p class="text-muted-foreground leading-relaxed text-[15px]">
									<?php echo esc_html($description); ?>
								</p>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>
	<!-- Project Phases -->
	<?php
	$phases = ArqamWeb_Project::get_project_phases(get_the_ID());

	if ($phases) :
	?>
		<section id="phases" class="section-padding py-32">
			<div class="container">
				<div class="mb-16 transition-all duration-700 translate-y-6">
					<p class="text-sm font-medium tracking-widest uppercase text-primary mb-4"><?php esc_html_e('Project Story', 'arqamweb'); ?></p>
					<h2 class="text-3xl md:text-4xl font-display font-bold max-w-xl"><?php esc_html_e('From vision to launch — every step, intentional', 'arqamweb'); ?></h2>
				</div>
				<div class="space-y-4">


					<?php
					$phases = ArqamWeb_Project::get_project_phases(get_the_ID());

					if ($phases) :

						$index = 1;

						foreach ($phases as $project_phase) :

							$title = get_the_title($project_phase->ID);
							$excerpt = get_the_excerpt($project_phase->ID);
							$content = get_post_field('post_content', $project_phase->ID);
					?>

							<div class="timeline-item transition-all duration-700 translate-y-8"
								style="transition-delay: <?php echo $index * 100; ?>ms;">

								<button
									class="w-full text-left group"
									aria-expanded="false">

									<div class="flex items-start gap-5 p-6 md:p-8 rounded-2xl surface-elevated border border-border/40 hover-lift cursor-pointer">

										<!-- icon -->
										<div class="flex-shrink-0 w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center mt-0.5">

											<?php if (has_post_thumbnail($project_phase->ID)) : ?>

												<?php echo get_the_post_thumbnail(
													$project_phase->ID,
													'thumbnail',
													['class' => 'w-5 h-5 object-contain']
												); ?>

											<?php else : ?>

												<!-- fallback -->
												<span class="text-primary text-sm font-bold">
													<?php echo $index; ?>
												</span>

											<?php endif; ?>

										</div>

										<!-- content -->
										<div class="flex-1 min-w-0">

											<span class="text-[11px] font-bold uppercase text-primary">
												<?php echo esc_html( sprintf( __( 'Phase %s', 'arqamweb' ), str_pad($index, 2, '0', STR_PAD_LEFT) ) ); ?>
											</span>

											<h3 class="text-xl md:text-2xl font-display font-bold mb-2">
												<?php echo esc_html(arqamweb_get_text_field('phase_title', $project_phase->ID)); ?>
											</h3>

											<p class="text-muted-foreground text-[15px] leading-relaxed">
												<?php echo esc_html($excerpt); ?>
											</p>

										</div>

										<!-- arrow -->
										<div class="flex-shrink-0 mt-1">
											<div class="arrow-icon w-8 h-8 rounded-full border border-border flex items-center justify-center transition-transform duration-300">
												<svg width="12" height="12" viewBox="0 0 12 12" fill="none" class="text-muted-foreground">
													<path d="M2 4L6 8L10 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
												</svg>
											</div>
										</div>

									</div>
								</button>

								<!-- content -->
								<div class="timeline-content overflow-hidden transition-all duration-500 ease-out max-h-0">

									<div class="pl-[4.75rem] pr-8 pb-4 pt-3">
										<?php echo wp_kses_post($content); ?>
									</div>

								</div>

							</div>

					<?php
							$index++;
						endforeach;

					endif;
					?>
				</div>
			</div>


			<script>
				document.querySelectorAll('.timeline-item').forEach((item) => {
					const button = item.querySelector('button');
					const content = item.querySelector('.timeline-content');
					const icon = item.querySelector('.arrow-icon');

					button.addEventListener('click', () => {
						const isOpen = content.classList.contains('open');

						// اقفل الكل (optional لو عايز accordion حقيقي)
						document.querySelectorAll('.timeline-content').forEach(c => {
							c.classList.remove('open');
							c.style.maxHeight = null;
						});

						document.querySelectorAll('.arrow-icon').forEach(i => {
							i.classList.remove('rotate-180');
						});

						if (!isOpen) {
							content.classList.add('open');
							content.style.maxHeight = content.scrollHeight + "px";
							icon.classList.add('rotate-180');
						}
					});
				});
			</script>
		</section>
	<?php endif; ?>
	<!-- Project Features -->
	<?php
	$features = ArqamWeb_Project::get_features(get_the_ID());

	if ($features) : ?>
		<section class="section-padding py-32 surface-elevated">
			<div class="container">
				<div class="mb-16 transition-all duration-700 translate-y-6">
					<p class="text-sm font-medium tracking-widest uppercase text-primary mb-4"><?php esc_html_e('What We Built', 'arqamweb'); ?></p>
					<h2 class="text-3xl md:text-4xl font-display font-bold max-w-xl"><?php esc_html_e('Performance', 'arqamweb'); ?> &amp; <?php esc_html_e('Delivery', 'arqamweb'); ?></h2>
				</div>
				<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

					<?php foreach ($features as $feature) : ?>

						<div class="flex gap-4 p-6 rounded-2xl bg-background border border-border/40 hover-lift transition-all duration-500 translate-y-6" style="transition-delay: 200ms;">
							<div class="flex-shrink-0 w-10 h-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center mt-0.5">
								<?php if (has_post_thumbnail($feature->ID)) : ?>

									<?php echo get_the_post_thumbnail(
										$feature->ID,
										'thumbnail',
										['class' => 'lucide lucide-gauge w-5 h-5', 'width' => 24, 'height' => 24]
									); ?>

								<?php endif; ?>
							</div>
							<div class="space-y-1.5">
								<h3 class="font-display font-semibold text-[15px]"><?php echo esc_html($feature->post_title); ?></h3>
								<p class="text-muted-foreground text-sm leading-relaxed"><?php echo esc_html(get_the_excerpt($feature->ID)); ?></p>
							</div>
						</div>
					<?php
					endforeach;

					?>

				</div>
			</div>
		</section>
	<?php endif; ?>
	<!-- Project Results -->
	<?php
	$features_results = ArqamWeb_Project::get_result_features(get_the_ID());

	if ($features_results) : ?>
		<section class="section-padding py-32">
			<div class="container">
				<div class="mb-16 transition-all duration-700 translate-y-6">
					<p class="text-sm font-medium tracking-widest uppercase text-primary mb-4"><?php esc_html_e('Behind the Results', 'arqamweb'); ?></p>
					<h2 class="text-3xl md:text-4xl font-display font-bold max-w-xl"><?php esc_html_e('Why this project succeeded', 'arqamweb'); ?></h2>
				</div>
				<div class="grid md:grid-cols-2 gap-6">

					<?php
					foreach ($features_results as $feature_result) :
					?>
						<div class="flex gap-5 p-8 rounded-2xl surface-elevated border border-border/40 hover-lift transition-all duration-500 translate-y-6" style="transition-delay: 150ms;">
							<div class="flex-shrink-0 w-11 h-11 rounded-xl bg-primary/10 text-primary flex items-center justify-center mt-0.5">
								<?php if (has_post_thumbnail($feature_result->ID)) : ?>

									<?php echo get_the_post_thumbnail(
										$feature_result->ID,
										'thumbnail',
										['class' => 'lucide lucide-gauge w-5 h-5', 'width' => 24, 'height' => 24]
									); ?>

								<?php endif; ?>
							</div>
							<div class="space-y-2">
								<h3 class="text-lg font-display font-semibold"><?php echo esc_html($feature_result->post_title); ?></h3>
								<p class="text-foreground font-medium text-[15px]"><?php echo esc_html(get_the_excerpt($feature_result->ID)); ?></p>
								<p class="text-muted-foreground text-[15px] leading-relaxed"><?php echo wp_kses_post(get_post_field('post_content', $feature_result->ID)); ?></p>
							</div>
						</div>
					<?php
					endforeach;

					?>
				</div>
			</div>
		</section>
	<?php endif; ?>
	<!-- Project Takeaways -->
	<section class="section-padding pt-32 pb-16 surface-elevated">
		<div class="container text-center">
			<div class="space-y-8 transition-all duration-700 translate-y-6">
				<p class="text-sm font-medium tracking-widest uppercase text-primary"><?php esc_html_e('Sound Familiar?', 'arqamweb'); ?></p>
				<h2 class="text-3xl md:text-5xl font-display font-bold"><?php esc_html_e('What This Means For You', 'arqamweb'); ?></h2>
				<ul class="space-y-4 text-left max-w-md mx-auto pt-4">
					<li class="flex items-start gap-3 text-muted-foreground text-[16px] leading-relaxed transition-all duration-500 -translate-x-4" style="transition-delay: 200ms;">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check w-5 h-5 text-primary mt-0.5 flex-shrink-0">
							<circle cx="12" cy="12" r="10"></circle>
							<path d="m9 12 2 2 4-4"></path>
						</svg><?php esc_html_e('Struggling with low traffic and zero visibility?', 'arqamweb'); ?>
					</li>
					<li class="flex items-start gap-3 text-muted-foreground text-[16px] leading-relaxed transition-all duration-500 -translate-x-4" style="transition-delay: 280ms;">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check w-5 h-5 text-primary mt-0.5 flex-shrink-0">
							<circle cx="12" cy="12" r="10"></circle>
							<path d="m9 12 2 2 4-4"></path>
						</svg><?php esc_html_e('Poor conversion rates despite good products?', 'arqamweb'); ?>
					</li>
					<li class="flex items-start gap-3 text-muted-foreground text-[16px] leading-relaxed transition-all duration-500 -translate-x-4" style="transition-delay: 360ms;">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check w-5 h-5 text-primary mt-0.5 flex-shrink-0">
							<circle cx="12" cy="12" r="10"></circle>
							<path d="m9 12 2 2 4-4"></path>
						</svg><?php esc_html_e('Slow, outdated website hurting your credibility?', 'arqamweb'); ?>
					</li>
					<li class="flex items-start gap-3 text-muted-foreground text-[16px] leading-relaxed transition-all duration-500 -translate-x-4" style="transition-delay: 440ms;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check w-5 h-5 text-primary mt-0.5 flex-shrink-0">
							<circle cx="12" cy="12" r="10"></circle>
							<path d="m9 12 2 2 4-4"></path>
						</svg>
						<span><?php esc_html_e('Competitors outranking you on every search?', 'arqamweb'); ?></span>
					</li>
				</ul>
				<p class="text-lg md:text-xl font-display font-semibold text-foreground pt-4 transition-all duration-700 translate-y-4" style="transition-delay: 600ms;"><?php esc_html_e("Let's achieve similar results for your business.", 'arqamweb'); ?></p>
			</div>
		</div>
	</section>
