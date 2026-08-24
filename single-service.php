<?php
/**
 * Single service template.
 *
 * @package Arqam-Web
 */

get_header();

$post_id = get_the_ID();
$thumb_id = get_post_thumbnail_id($post_id);
$service_content = trim(get_post_field('post_content', $post_id));

// Service type from taxonomy (only if registered to avoid WP_Error)
$service_terms = taxonomy_exists('service_type') ? get_the_terms($post_id, 'service_type') : false;
$service_type = (!empty($service_terms) && !is_wp_error($service_terms))
	? esc_html($service_terms[0]->name)
	: '';

// Related projects (latest 3)
$related_q = new WP_Query([
	'post_type' => 'project',
	'posts_per_page' => 3,
	'no_found_rows' => true,
]);
?>

<main class="bg-background">

	<!-- ── Hero ──────────────────────────────────────────────────────────── -->
	<section class="relative pt-32 pb-16 lg:pt-44 lg:pb-24 overflow-hidden bg-hero">
		<div class="absolute inset-0 grid-bg opacity-60" aria-hidden="true"></div>
		<div class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
			<div class="absolute inset-0 opacity-[0.08]"
			     style="background: radial-gradient(80% 60% at 20% 40%, rgb(57, 158, 208) 0%, transparent 70%), radial-gradient(60% 50% at 80% 30%, rgb(54, 109, 176) 0%, transparent 70%);"></div>
			<div class="absolute rounded-full"
			     style="width: 300px; height: 300px; right: 5%; top: 5%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.18), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 14s ease-in-out 0s infinite normal none running glass-float-1;"></div>
			<div class="absolute rounded-full"
			     style="width: 180px; height: 180px; left: 8%; top: 55%; background: radial-gradient(circle at 30% 30%, rgba(54, 109, 176, 0.2), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 16s ease-in-out -4s infinite normal none running glass-float-2;"></div>
			<div class="absolute rounded-full"
			     style="width: 130px; height: 130px; left: 55%; top: 8%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.15), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 12s ease-in-out -8s infinite normal none running glass-float-3;"></div>
		</div>

		<div class="reveal container-x max-w-4xl mx-auto relative in">

			<div class="arqamweb-breadcrumb">
				<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
			</div>

			<!-- Service type badge -->
			<?php if ($service_type) : ?>
				<div class="flex items-center gap-3 mb-6">
				<span
					class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-[11px] font-semibold bg-primary/10 text-primary border border-primary/20">
					<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
					<?php echo esc_html($service_type); ?>
				</span>
				</div>
			<?php endif; ?>

			<!-- Title -->
			<h1 class="text-4xl md:text-5xl lg:text-6xl font-semibold tracking-tight leading-[1.05] mb-6">
				<?php the_title(); ?>
			</h1>

			<!-- Excerpt -->
			<?php if (has_excerpt()) : ?>
				<p class="text-lg lg:text-xl text-muted-foreground leading-relaxed max-w-2xl mb-8">
					<?php echo esc_html(get_the_excerpt()); ?>
				</p>
			<?php endif; ?>

			<!-- CTA button -->
			<div class="flex flex-wrap gap-4">
				<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_QUOTE_PAGE_SLUG)); ?>"
				   class="inline-flex items-center gap-2 px-7 py-3.5 rounded-full bg-gradient-primary text-primary-foreground font-semibold shadow-glow hover:scale-[1.02] transition-transform text-sm">
					<?php esc_html_e('Start a project', 'arqamweb'); ?>
					<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
					     aria-hidden="true">
						<path d="M5 12h14M13 5l7 7-7 7"/>
					</svg>
				</a>
				<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_PROJECTS_PAGE_SLUG)); ?>"
				   class="inline-flex items-center gap-2 px-7 py-3.5 rounded-full border border-border bg-card font-semibold hover:bg-surface transition-colors text-sm">
					<?php esc_html_e('View our work', 'arqamweb'); ?>
				</a>
			</div>

		</div>
	</section>

	<!-- ── Featured image ─────────────────────────────────────────────────── -->
	<?php if ($thumb_id) : ?>
		<div class="container-x max-w-5xl mx-auto -mt-8 relative z-10 px-4">
			<div class="rounded-3xl overflow-hidden border border-border shadow-elevated aspect-[16/9]">
				<?php echo wp_get_attachment_image($thumb_id, 'arqam-hero', false, [
					'class' => 'w-full h-full object-cover',
					'loading' => 'eager',
					'decoding' => 'async',
					'fetchpriority' => 'high',
				]); ?>
			</div>
		</div>
	<?php endif; ?>

	<!-- ── Service content ────────────────────────────────────────────────── -->
	<?php if ($service_content !== '') : ?>
		<article id="post-<?php the_ID(); ?>" class="py-16 lg:py-24">
			<div class="container-x max-w-3xl mx-auto">
				<div class="prose prose-lg max-w-none
				            prose-headings:font-semibold prose-headings:tracking-tight
				            prose-h2:text-3xl prose-h3:text-2xl
				            prose-a:text-primary prose-a:no-underline hover:prose-a:underline
				            prose-img:rounded-2xl prose-img:shadow-card
				            prose-blockquote:border-primary prose-blockquote:not-italic
				            prose-code:text-primary prose-code:bg-surface prose-code:px-1.5 prose-code:py-0.5 prose-code:rounded prose-code:text-sm prose-code:before:content-none prose-code:after:content-none
				            dark:prose-invert">
					<?php the_content(); ?>
				</div>
			</div>
		</article>
	<?php endif; ?>

	<!-- ── CTA ───────────────────────────────────────────────────────────── -->
	<section class="py-24 lg:py-32 bg-surface border-t border-border/60">
		<div class="reveal container-x max-w-5xl mx-auto in">
			<div
				class="relative overflow-hidden rounded-[2rem] border border-border bg-gradient-dark text-white p-10 lg:p-16 shadow-elevated">
				<div class="absolute -top-32 -right-32 w-[28rem] h-[28rem] rounded-full bg-primary/30 blur-3xl"
				     aria-hidden="true"></div>
				<div class="absolute -bottom-40 -left-20 w-[24rem] h-[24rem] rounded-full bg-primary-deep/40 blur-3xl"
				     aria-hidden="true"></div>
				<div class="relative grid lg:grid-cols-12 gap-10 items-center">
					<div class="lg:col-span-7">
						<div class="text-[11px] font-semibold tracking-[0.3em] uppercase text-white/60 mb-4">
							— <?php esc_html_e('Ready to get started?', 'arqamweb'); ?></div>
						<h2 class="text-3xl lg:text-5xl font-semibold tracking-tight leading-[1.05]">
							<?php esc_html_e("Let's build something", 'arqamweb'); ?><br>
							<span
								class="text-white/70 font-light italic"><?php esc_html_e('remarkable together.', 'arqamweb'); ?></span>
						</h2>
						<p class="mt-5 text-white/70 text-base lg:text-lg leading-relaxed max-w-lg">
							<?php esc_html_e("Tell us about your project and we'll get back to you within 24 hours.", 'arqamweb'); ?>
						</p>
					</div>
					<div class="lg:col-span-5 flex flex-col gap-4">
						<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_QUOTE_PAGE_SLUG)); ?>"
						   class="inline-flex items-center justify-center gap-2 px-8 py-4 rounded-full bg-white text-foreground font-semibold hover:bg-white/90 transition-colors">
							<?php esc_html_e('Start a project', 'arqamweb'); ?>
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
							     stroke-width="2.5" aria-hidden="true">
								<path d="M5 12h14M13 5l7 7-7 7"/>
							</svg>
						</a>
						<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_PROJECTS_PAGE_SLUG)); ?>"
						   class="inline-flex items-center justify-center gap-2 px-8 py-4 rounded-full border border-white/20 text-white font-semibold hover:bg-white/10 transition-colors">
							<?php esc_html_e('View our portfolio', 'arqamweb'); ?>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ── Related projects ───────────────────────────────────────────────── -->
	<?php if ($related_q->have_posts()) : ?>
		<section class="py-24 lg:py-32 border-t border-border/60">
			<div class="container-x max-w-7xl mx-auto">
				<div class="reveal mb-12 in">
					<div class="text-xs font-semibold tracking-[0.3em] uppercase text-primary mb-4">
						— <?php esc_html_e('Our work', 'arqamweb'); ?></div>
					<h2 class="text-3xl lg:text-4xl font-semibold tracking-tight">
						<?php esc_html_e('See it in', 'arqamweb'); ?> <span
							class="text-gradient"><?php esc_html_e('action.', 'arqamweb'); ?></span>
					</h2>
				</div>
				<div class="grid grid-cols-1 md:grid-cols-3 gap-5 lg:gap-7">
					<?php
					$ri = 0;
					while ($related_q->have_posts()) :
						$related_q->the_post();
						$rid = get_the_ID();
						$rthumb_id = get_post_thumbnail_id($rid);
						$rcat = ArqamWeb_Project::get_category($rid);
						?>
						<a href="<?php the_permalink(); ?>"
						   class="reveal group relative rounded-3xl border border-border bg-card overflow-hidden shadow-card hover:shadow-elevated transition-all duration-500 hover:-translate-y-1 in"
						   style="transition-delay: <?php echo esc_attr($ri * 80); ?>ms">
							<div aria-hidden="true"
							     class="pointer-events-none absolute -inset-20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"
							     style="background: radial-gradient(40% 40% at 50% 0%, color-mix(in oklab, var(--primary) 35%, transparent), transparent 70%);"></div>
							<div class="relative aspect-[16/10] overflow-hidden">
								<?php if ($rthumb_id) : ?>
									<?php echo wp_get_attachment_image($rthumb_id, 'arqam-card-related', false, [
										'class' => 'w-full h-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.08]',
										'loading' => 'lazy',
										'decoding' => 'async',
									]); ?>
								<?php else : ?>
									<div class="w-full h-full bg-gradient-to-br from-primary/20 to-surface"></div>
								<?php endif; ?>
								<div
									class="absolute inset-0 bg-gradient-to-t from-background/80 via-background/0 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
								<?php if ($rcat) : ?>
									<div class="absolute top-4 left-4">
								<span
									class="inline-flex items-center px-3 py-1.5 rounded-full text-[11px] font-semibold bg-background/90 backdrop-blur text-foreground border border-border">
									<?php echo esc_html($rcat); ?>
								</span>
									</div>
								<?php endif; ?>
							</div>
							<div class="p-6 lg:p-7 flex items-center justify-between">
								<div>
									<h3 class="font-semibold text-lg leading-snug group-hover:text-primary transition-colors duration-300">
										<?php the_title(); ?>
									</h3>
									<?php if ($rcat) : ?>
										<p class="text-sm text-muted-foreground mt-1"><?php echo esc_html($rcat); ?></p>
									<?php endif; ?>
								</div>
								<span
									class="flex-shrink-0 inline-flex items-center gap-1 text-sm font-semibold text-primary transition-transform duration-300 group-hover:translate-x-1">
								<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
								     stroke-width="2.5" aria-hidden="true">
									<path d="M7 7h10v10M7 17 17 7"/>
								</svg>
							</span>
							</div>
						</a>
						<?php
						$ri++;
					endwhile;
					wp_reset_postdata();
					?>
				</div>
				<div class="mt-12 text-center">
					<a href="<?php echo esc_url(home_url('/projects')); ?>"
					   class="inline-flex items-center gap-2 px-8 py-4 rounded-full border border-border bg-card font-semibold hover:bg-surface transition-colors">
						<?php esc_html_e('View all projects', 'arqamweb'); ?>
						<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
						     stroke-width="2.5" aria-hidden="true">
							<path d="M5 12h14M13 5l7 7-7 7"/>
						</svg>
					</a>
				</div>
			</div>
		</section>
	<?php endif; ?>

</main>

<?php get_footer(); ?>
