<?php
/**
 * Service page: featured work carousel.
 *
 * @package Arqam-Web
 */

$post_id = $args['post_id'];
$projects = arqamweb_sp_lines('sp_projects', $post_id, 7);
$hosted = arqamweb_sp_text('sp_work_style', $post_id) === 'hosted';
foreach ($projects as &$project) {
	$project[3] = arqamweb_sp_image_url($project[3]);
}
unset($project);
$count = count($projects);
?>
<section id="work" class="relative overflow-hidden bg-[linear-gradient(180deg,#1b2638_0%,#0c1828_30%)] py-24 text-primary-foreground lg:py-32">
	<div aria-hidden="true" class="pointer-events-none absolute inset-x-0 top-0 h-28 bg-gradient-to-b from-primary-foreground/10 to-transparent"></div>
	<div class="detail-reveal reveal container relative">
		<div class="detail-stagger mb-12 text-center">
			<?php get_template_part('template-parts/service/service', 'eyebrow', ['text' => __('Featured work', 'arqamweb'), 'centered' => true, 'dark' => true]); ?>
			<h2 class="mt-4 text-4xl font-semibold leading-[1.06] tracking-[-0.03em] lg:text-5xl"><?php echo $hosted ? esc_html__('Sites we host & look after', 'arqamweb') : esc_html__("What we've built", 'arqamweb'); ?></h2>
		</div>

		<div data-service-work tabindex="0" aria-label="<?php esc_attr_e('Case studies carousel', 'arqamweb'); ?>" aria-roledescription="carousel" class="detail-stagger relative min-w-0 outline-none focus-visible:ring-2 focus-visible:ring-primary" style="--stagger:80ms">
			<div class="relative mx-auto max-w-[820px]">
				<?php if ($count > 1) : ?>
					<?php foreach (['prev' => '-left-[31%]', 'next' => '-right-[31%]'] as $side => $position) : ?>
						<div aria-hidden="true" class="pointer-events-none absolute top-[10%] hidden h-[80%] w-[48%] scale-90 overflow-hidden rounded-[22px] bg-background p-3 opacity-45 lg:block <?php echo esc_attr($position); ?>">
							<img data-work-peek="<?php echo esc_attr($side); ?>" src="<?php echo esc_url($projects[$side === 'prev' ? $count - 1 : 1][3]); ?>" alt="" loading="lazy" decoding="async" class="h-full w-full rounded-2xl object-cover object-top opacity-70">
						</div>
					<?php endforeach; ?>
				<?php endif; ?>

				<?php foreach ($projects as $i => [$name, $country, $tag, $image, $url, $description, $metrics_raw]) :
					$domain = preg_replace('/^www\./', '', (string) wp_parse_url($url, PHP_URL_HOST)) ?: 'project';
					$metrics = [];
					foreach (array_filter(array_map('trim', explode(';', $metrics_raw))) as $metric) {
						$metrics[] = array_map('trim', array_pad(explode('=', $metric, 2), 2, ''));
					}
				?>
					<article data-work-slide="<?php echo esc_attr($i); ?>" data-work-image="<?php echo esc_url($image); ?>" class="relative overflow-hidden rounded-[28px] bg-background text-foreground shadow-elevated lg:grid lg:grid-cols-[1.15fr_1fr] <?php echo $i === 0 ? 'animate-fade-in' : ''; ?>" <?php echo $i > 0 ? 'hidden' : ''; ?>>
						<div class="m-4 flex flex-col overflow-hidden rounded-2xl bg-[#0f172a] lg:mr-0">
							<div class="flex h-9 items-center gap-1.5 px-3" dir="ltr">
								<i class="h-2 w-2 rounded-full bg-red-400"></i><i class="h-2 w-2 rounded-full bg-amber-300"></i><i class="h-2 w-2 rounded-full bg-green-400"></i>
								<span class="ml-3 truncate font-mono text-[10px] text-primary-foreground/55"><?php echo esc_html($domain); ?></span>
							</div>
							<?php if ($image) : ?>
								<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr(sprintf(__('%s project', 'arqamweb'), $name)); ?>" loading="lazy" decoding="async" class="aspect-[16/12] w-full flex-1 object-cover object-top lg:aspect-auto lg:min-h-0">
							<?php endif; ?>
						</div>
						<div class="flex flex-col p-7 lg:p-9">
							<?php get_template_part('template-parts/service/service', 'eyebrow', ['text' => $hosted ? $tag : sprintf(__('Case study · %02d', 'arqamweb'), $i + 1)]); ?>
							<h3 class="mt-4 text-[28px] font-semibold"><?php echo esc_html($name); ?></h3>
							<p class="mt-1 text-sm text-muted-foreground"><?php echo esc_html($country); ?></p>
							<?php if ($description) : ?>
								<p class="mt-6 text-sm leading-relaxed text-muted-foreground"><?php echo esc_html($description); ?></p>
							<?php endif; ?>
							<?php if ($metrics) : ?>
								<div class="mt-6 grid grid-cols-1 gap-2 min-[420px]:grid-cols-3">
									<?php foreach (array_slice($metrics, 0, 3) as [$value, $label]) : ?>
										<div class="rounded-xl border border-slate-900/[0.07] p-3">
											<div class="text-sm font-semibold text-primary"><?php echo esc_html($value); ?></div>
											<div class="mt-1 text-[9px] leading-tight text-muted-foreground"><?php echo esc_html($label); ?></div>
										</div>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
							<?php if ($url) : ?>
								<a class="mt-auto inline-flex items-center gap-2 pt-7 text-sm font-semibold text-primary" href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener noreferrer"><?php echo $hosted ? esc_html__('Visit live site', 'arqamweb') : esc_html__('View case study', 'arqamweb'); ?> <?php echo arqamweb_sp_icon('arrow-right'); ?></a>
							<?php endif; ?>
						</div>
					</article>
				<?php endforeach; ?>
			</div>

			<?php if ($count > 1) : ?>
				<div class="mt-7 flex items-center justify-center gap-5">
					<button type="button" data-work-go="-1" aria-label="<?php esc_attr_e('Previous project', 'arqamweb'); ?>" class="grid h-10 w-10 place-items-center rounded-full border border-primary-foreground/25 text-primary-foreground transition-colors hover:bg-primary-foreground/10"><?php echo arqamweb_sp_icon('chevron-left'); ?></button>
					<div class="flex gap-2">
						<?php foreach ($projects as $i => $project) : ?>
							<button type="button" data-work-dot="<?php echo esc_attr($i); ?>" aria-label="<?php echo esc_attr(sprintf(__('Show %s', 'arqamweb'), $project[0])); ?>" <?php echo $i === 0 ? 'aria-current="true"' : ''; ?> class="grid h-8 w-8 place-items-center rounded-full"><span class="work-dot h-2 w-2 rounded-full <?php echo $i === 0 ? 'bg-primary' : 'bg-primary-foreground/40'; ?>"></span></button>
						<?php endforeach; ?>
					</div>
					<button type="button" data-work-go="1" aria-label="<?php esc_attr_e('Next project', 'arqamweb'); ?>" class="grid h-10 w-10 place-items-center rounded-full border border-primary-foreground/25 text-primary-foreground transition-colors hover:bg-primary-foreground/10"><?php echo arqamweb_sp_icon('chevron-right'); ?></button>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
