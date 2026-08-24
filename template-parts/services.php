<?php /* Template Name: Services */ ?>
<?php
if ( ! defined( 'ABSPATH' ) ) exit;

get_header();

/* ─── Data ─────────────────────────────────────────────────────────────── */
$service_categories = taxonomy_exists( 'service_category' )
	? get_terms( [ 'taxonomy' => 'service_category', 'hide_empty' => true, 'orderby' => 'name' ] )
	: [];
$service_categories = ( $service_categories && ! is_wp_error( $service_categories ) ) ? $service_categories : [];

$services_query = new WP_Query( [
	'post_type'      => 'service',
	'posts_per_page' => -1,
	'post_status'    => 'publish',
	'no_found_rows'  => true,
	'orderby'        => 'menu_order date',
	'order'          => 'ASC',
] );

?>

<main>

	<!-- ── Hero ────────────────────────────────────────────────────────────── -->
	<section class="relative pt-28 lg:pt-36 pb-24 lg:pb-32 overflow-hidden">
		<div class="absolute inset-0 -z-10 bg-gradient-to-b from-secondary/40 via-background to-background"></div>
		<div class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
			<div class="absolute inset-0 opacity-[0.08]"
			     style="background: radial-gradient(80% 60% at 20% 40%, rgb(57, 158, 208) 0%, transparent 70%), radial-gradient(60% 50% at 80% 30%, rgb(54, 109, 176) 0%, transparent 70%);"></div>
			<div class="absolute rounded-full"
			     style="width: 280px; height: 280px; left: 5%; top: 10%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.18), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 14s ease-in-out 0s infinite normal none running glass-float-1; transform: translate(0px, 0px); will-change: transform; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);"></div>
			<div class="absolute rounded-full"
			     style="width: 200px; height: 200px; left: 70%; top: 55%; background: radial-gradient(circle at 30% 30%, rgba(54, 109, 176, 0.2), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 16s ease-in-out -4s infinite normal none running glass-float-2; transform: translate(0px, 0px); will-change: transform; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);"></div>
			<div class="absolute rounded-full"
			     style="width: 140px; height: 140px; left: 55%; top: 5%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.15), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 12s ease-in-out -8s infinite normal none running glass-float-3; transform: translate(0px, 0px); will-change: transform; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);"></div>
			<div class="absolute rounded-full"
			     style="width: 240px; height: 240px; left: 20%; top: 65%; background: radial-gradient(circle at 30% 30%, rgba(54, 109, 176, 0.16), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 15s ease-in-out -2s infinite normal none running glass-float-4; transform: translate(0px, 0px); will-change: transform; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);"></div>
			<div class="absolute rounded-full"
			     style="width: 110px; height: 110px; left: 82%; top: 25%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.19), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 11s ease-in-out -6s infinite normal none running glass-float-1; transform: translate(0px, 0px); will-change: transform; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);"></div>
		</div>
		<div class="reveal container-x max-w-6xl mx-auto relative z-10 in">
			<div class="arqamweb-breadcrumb">
				<?php if ( function_exists( 'rank_math_the_breadcrumbs' ) ) rank_math_the_breadcrumbs(); ?>
			</div>
			<h1 class="text-5xl md:text-6xl lg:text-7xl xl:text-[5.25rem] font-semibold leading-[1.02] tracking-[-0.03em] max-w-5xl">
				<?php esc_html_e('Services that', 'arqamweb'); ?> <span class="text-gradient"><?php esc_html_e('grow', 'arqamweb'); ?></span> <?php esc_html_e('your business', 'arqamweb'); ?> &amp; <span class="text-gradient"><?php esc_html_e('define', 'arqamweb'); ?></span> <?php esc_html_e('your brand.', 'arqamweb'); ?>
			</h1>
			<p class="mt-8 text-lg md:text-xl text-muted-foreground max-w-2xl leading-relaxed"><?php esc_html_e('Web design, SEO, brand identity and social media — engineered by senior teams for ambitious brands across SA, UAE, UK and USA.', 'arqamweb'); ?></p>
			<div class="mt-10 flex flex-wrap items-center gap-4">
				<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_QUOTE_PAGE_SLUG)); ?>" class="btn-primary"><?php esc_html_e('Start your project', 'arqamweb'); ?> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right w-4 h-4" aria-hidden="true"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg></a>
				<a href="#services-grid" class="inline-flex items-center gap-2 px-7 py-3.5 text-sm font-semibold text-foreground rounded-full border border-border hover:bg-accent transition-all"><?php esc_html_e('Explore services', 'arqamweb'); ?></a>
			</div>
			<div class="mt-16 grid grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8 border-t border-border/60 pt-10">
				<div class="group">
					<div class="text-4xl lg:text-5xl font-semibold tracking-tight text-gradient">14+</div>
					<div class="mt-2 text-xs font-semibold tracking-[0.18em] uppercase text-muted-foreground"><?php esc_html_e('Years of craft', 'arqamweb'); ?></div>
				</div>
				<div class="group">
					<div class="text-4xl lg:text-5xl font-semibold tracking-tight text-gradient">120+</div>
					<div class="mt-2 text-xs font-semibold tracking-[0.18em] uppercase text-muted-foreground"><?php esc_html_e('Projects shipped', 'arqamweb'); ?></div>
				</div>
				<div class="group">
					<div class="text-4xl lg:text-5xl font-semibold tracking-tight text-gradient">32</div>
					<div class="mt-2 text-xs font-semibold tracking-[0.18em] uppercase text-muted-foreground"><?php esc_html_e('Countries served', 'arqamweb'); ?></div>
				</div>
				<div class="group">
					<div class="text-4xl lg:text-5xl font-semibold tracking-tight text-gradient">98%</div>
					<div class="mt-2 text-xs font-semibold tracking-[0.18em] uppercase text-muted-foreground"><?php esc_html_e('Client retention', 'arqamweb'); ?></div>
				</div>
			</div>
		</div>
	</section>

	<!-- ── Divider ─────────────────────────────────────────────────────────── -->
	<div class="container-x max-w-7xl mx-auto">
		<div class="flex items-center gap-4" aria-hidden="true">
			<span class="h-px flex-1 bg-gradient-to-r from-transparent via-border to-transparent"></span>
			<span class="w-1.5 h-1.5 rounded-full bg-primary/60"></span>
			<span class="h-px flex-1 bg-gradient-to-r from-transparent via-border to-transparent"></span>
		</div>
	</div>

	<!-- ── Services grid ───────────────────────────────────────────────────── -->
	<section id="services-grid" class="py-24 lg:py-32 bg-background relative">
		<div class="reveal container-x max-w-7xl mx-auto">

			<!-- Section header -->
			<div class="grid lg:grid-cols-12 gap-10 items-end mb-10">
				<div class="lg:col-span-7">
					<div class="inline-flex items-center gap-3 mb-5">
						<span class="h-px w-10 bg-primary/60"></span>
						<span class="text-[11px] font-semibold tracking-[0.22em] uppercase text-primary"><?php esc_html_e('What we do', 'arqamweb'); ?></span>
					</div>
					<h2 class="text-4xl lg:text-5xl xl:text-[3.5rem] font-semibold tracking-[-0.025em] leading-[1.05]">
						<?php esc_html_e('Four disciplines.', 'arqamweb'); ?><br><span class="text-gradient"><?php esc_html_e('One growth engine.', 'arqamweb'); ?></span>
					</h2>
				</div>
				<div class="lg:col-span-5">
					<p class="text-muted-foreground text-base lg:text-lg leading-relaxed border-l-2 border-primary/30 pl-5">
						<?php esc_html_e('Each service has a dedicated page with full deliverables, process and case studies — click any card to dive in.', 'arqamweb'); ?>
					</p>
				</div>
			</div>

			<!-- Category filter bar -->
			<?php if ( $service_categories ) : ?>
			<div class="flex items-center gap-2 overflow-x-auto no-scrollbar mb-8" id="services-filter" role="tablist" aria-label="<?php esc_attr_e('Filter services by category', 'arqamweb'); ?>">
				<button
					data-filter="all"
					role="tab"
					aria-selected="true"
					class="relative shrink-0 px-5 py-2.5 rounded-full text-xs font-semibold tracking-[0.14em] uppercase transition-all duration-300 text-primary-foreground bg-gradient-primary shadow-glow">
					<?php esc_html_e('All', 'arqamweb'); ?>
				</button>
				<?php foreach ( $service_categories as $cat ) : ?>
				<button
					data-filter="<?php echo esc_attr( $cat->slug ); ?>"
					role="tab"
					aria-selected="false"
					class="relative shrink-0 px-5 py-2.5 rounded-full text-xs font-semibold tracking-[0.14em] uppercase transition-all duration-300 text-foreground/70 border border-border bg-background hover:text-foreground hover:border-primary/40">
					<?php echo esc_html( $cat->name ); ?>
				</button>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>

			<!-- Cards -->
			<?php if ( $services_query->have_posts() ) : ?>

			<div class="group/grid grid sm:grid-cols-2 gap-5 lg:gap-6" id="services-grid-list">
				<?php
				$card_i = 0;
				while ( $services_query->have_posts() ) :
					$services_query->the_post();
					$pid = get_the_ID();

					$title    = get_the_title();
					$permalink = get_permalink();
					$tagline  = ArqamWeb_Project::get_category( $pid );
					$excerpt  = get_the_excerpt();
					$card_num = sprintf( '%02d', $card_i + 1 );
					$service_icon = arqamweb_get_image_field( 'service_icon', $pid );

					$svc_terms  = taxonomy_exists( 'service_category' ) ? get_the_terms( $pid, 'service_category' ) : [];
					$svc_terms  = ( $svc_terms && ! is_wp_error( $svc_terms ) ) ? $svc_terms : [];
					$term_slugs = implode( ' ', array_map( fn( $t ) => $t->slug, $svc_terms ) );

					$tag_terms = taxonomy_exists( 'service_tag' ) ? get_the_terms( $pid, 'service_tag' ) : [];
					$tag_terms = ( $tag_terms && ! is_wp_error( $tag_terms ) ) ? $tag_terms : [];

					$card_i++;
				?>

				<div data-categories="<?php echo esc_attr( $term_slugs ); ?>">
					<a href="<?php echo esc_url( $permalink ); ?>"
					   class="group/card relative overflow-hidden rounded-3xl border border-white/10 bg-[#124f85] text-white p-8 lg:p-10 shadow-card transition-all duration-500 hover:shadow-elevated hover:border-primary/40 hover:-translate-y-1.5 hover:scale-[1.015] group-hover/grid:opacity-50 hover:!opacity-100 block"
					   aria-label="<?php echo esc_attr( sprintf( __( 'View %s service', 'arqamweb' ), $title ) ); ?>">

						<!-- hover glow blob -->
						<div class="absolute -top-24 -right-24 w-64 h-64 rounded-full bg-primary/0 group-hover/card:bg-primary/25 blur-3xl transition-all duration-700" aria-hidden="true"></div>
						<!-- inner gradient overlay -->
						<div class="absolute inset-0 bg-gradient-to-br from-white/[0.03] to-transparent group-hover/card:from-primary/[0.08] group-hover/card:to-transparent transition-all duration-500" aria-hidden="true"></div>

						<div class="relative">

							<!-- Icon row -->
							<div class="flex items-start justify-between">
								<div class="w-14 h-14 rounded-2xl bg-white/[0.06] text-white flex items-center justify-center transition-all duration-500 group-hover/card:[background:#31415a] group-hover/card:text-primary-foreground group-hover/card:scale-110 group-hover/card:rotate-[-4deg] group-hover/card:shadow-glow group-hover/card:ring-1 group-hover/card:ring-white/20">
									<?php if ( $service_icon ) : ?>
									<img
										src="<?php echo esc_url( $service_icon['url'] ); ?>"
										alt="<?php echo esc_attr( $service_icon['alt'] ?: sprintf( __( '%s icon', 'arqamweb' ), $title ) ); ?>"
										loading="lazy"
										width="24"
										height="24"
										class="h-6 w-6 object-contain"
									>
									<?php endif; ?>
								</div>
								<span class="text-xs font-mono text-white/40"><?php echo esc_html( $card_num ); ?></span>
							</div>

							<!-- Text content -->
							<div class="mt-7">
								<?php if ( $tagline ) : ?>
								<div class="text-[11px] font-semibold tracking-[0.18em] uppercase text-white/60">
									<?php echo esc_html( $tagline ); ?>
								</div>
								<?php endif; ?>
								<h3 class="mt-2 text-xl lg:text-2xl font-semibold tracking-tight text-white">
									<?php echo esc_html( $title ); ?>
								</h3>
								<?php if ( $excerpt ) : ?>
								<p class="mt-3 text-sm lg:text-base text-white/70 leading-relaxed">
									<?php echo esc_html( $excerpt ); ?>
								</p>
								<?php endif; ?>
							</div>

							<!-- Tag pills (expand on hover) -->
							<?php if ( $tag_terms ) : ?>
							<div class="grid grid-rows-[0fr] group-hover/card:grid-rows-[1fr] transition-[grid-template-rows] duration-500 ease-out">
								<div class="overflow-hidden">
									<div class="mt-6 flex flex-wrap gap-2 opacity-0 -translate-y-1 group-hover/card:opacity-100 group-hover/card:translate-y-0 transition-all duration-500 delay-100">
										<?php foreach ( $tag_terms as $tag ) : ?>
										<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-medium bg-white/[0.06] text-white/80">
											<span class="w-1 h-1 rounded-full bg-white/70"></span>
											<?php echo esc_html( $tag->name ); ?>
										</span>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
							<?php endif; ?>

							<!-- CTA row -->
							<div class="mt-7 inline-flex items-center gap-1.5 text-sm font-semibold text-white transition-all duration-500 group-hover/card:gap-3">
								<?php esc_html_e('Learn more', 'arqamweb'); ?>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right w-3.5 h-3.5" aria-hidden="true"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
							</div>

						</div>
					</a>
				</div>

				<?php endwhile; wp_reset_postdata(); ?>
			</div>

			<?php else : ?>

			<div class="text-center py-24">
				<div class="w-16 h-16 rounded-2xl bg-surface border border-border flex items-center justify-center mx-auto mb-6">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-muted-foreground" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
				</div>
				<p class="text-lg text-muted-foreground"><?php esc_html_e('No services found.', 'arqamweb'); ?></p>
			</div>

			<?php endif; ?>

		</div>
	</section>

	<!-- ── Why Arqam ───────────────────────────────────────────────────────── -->
	<section class="py-20 lg:py-24 bg-secondary/30">
		<div class="container-x max-w-7xl mx-auto">
			<div class="grid lg:grid-cols-12 gap-10 items-end mb-16">
				<div class="lg:col-span-7">
					<div class="inline-flex items-center gap-3 mb-5">
						<span class="h-px w-10 bg-primary/60"></span>
						<span class="text-[11px] font-semibold tracking-[0.22em] uppercase text-primary"><?php esc_html_e('Why Arqam', 'arqamweb'); ?></span>
					</div>
					<h2 class="text-4xl lg:text-5xl xl:text-[3.5rem] font-semibold tracking-[-0.025em] leading-[1.05]">
						<?php esc_html_e('Built differently.', 'arqamweb'); ?><br><span class="text-gradient"><?php esc_html_e('For brands that mean it.', 'arqamweb'); ?></span>
					</h2>
				</div>
				<div class="lg:col-span-5">
					<p class="text-muted-foreground text-base lg:text-lg leading-relaxed border-l-2 border-primary/30 pl-5">
						<?php esc_html_e("Three principles shape every engagement — from the first call to the day we hand over the keys. They're why our clients stay with us for years, not sprints.", 'arqamweb'); ?>
					</p>
				</div>
			</div>
			<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
				<div class="p-7 rounded-3xl border border-border bg-background">
					<div class="inline-flex items-center justify-center w-11 h-11 rounded-2xl bg-gradient-primary text-primary-foreground shadow-soft">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trophy w-5 h-5" aria-hidden="true"><path d="M10 14.66v1.626a2 2 0 0 1-.976 1.696A5 5 0 0 0 7 21.978"></path><path d="M14 14.66v1.626a2 2 0 0 0 .976 1.696A5 5 0 0 1 17 21.978"></path><path d="M18 9h1.5a1 1 0 0 0 0-5H18"></path><path d="M4 22h16"></path><path d="M6 9a6 6 0 0 0 12 0V3a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1z"></path><path d="M6 9H4.5a1 1 0 0 1 0-5H6"></path></svg>
					</div>
					<h3 class="mt-5 text-lg font-semibold tracking-tight"><?php esc_html_e('Senior teams only', 'arqamweb'); ?></h3>
					<p class="mt-2 text-sm text-muted-foreground leading-relaxed"><?php esc_html_e('No juniors, no handoffs. The team that pitches you ships your project.', 'arqamweb'); ?></p>
				</div>
				<div class="p-7 rounded-3xl border border-border bg-background">
					<div class="inline-flex items-center justify-center w-11 h-11 rounded-2xl bg-gradient-primary text-primary-foreground shadow-soft">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-zap w-5 h-5" aria-hidden="true"><path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"></path></svg>
					</div>
					<h3 class="mt-5 text-lg font-semibold tracking-tight"><?php esc_html_e('Built for speed', 'arqamweb'); ?></h3>
					<p class="mt-2 text-sm text-muted-foreground leading-relaxed"><?php esc_html_e('Performance is a design decision — not a final-week cleanup task.', 'arqamweb'); ?></p>
				</div>
				<div class="p-7 rounded-3xl border border-border bg-background">
					<div class="inline-flex items-center justify-center w-11 h-11 rounded-2xl bg-gradient-primary text-primary-foreground shadow-soft">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-target w-5 h-5" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>
					</div>
					<h3 class="mt-5 text-lg font-semibold tracking-tight"><?php esc_html_e('Outcomes, not outputs', 'arqamweb'); ?></h3>
					<p class="mt-2 text-sm text-muted-foreground leading-relaxed"><?php esc_html_e('Every engagement is tied to KPIs your CFO actually cares about.', 'arqamweb'); ?></p>
				</div>
			</div>
		</div>
	</section>

	<!-- ── CTA ─────────────────────────────────────────────────────────────── -->
	<section class="py-24 lg:py-32 bg-background">
		<div class="reveal container-x max-w-5xl mx-auto">
			<div class="relative overflow-hidden rounded-[2rem] bg-[#124f85] text-white p-10 lg:p-16 shadow-elevated">
				<div class="absolute -top-32 -right-32 w-[28rem] h-[28rem] rounded-full bg-primary/30 blur-3xl" aria-hidden="true"></div>
				<div class="absolute -bottom-32 -left-32 w-[28rem] h-[28rem] rounded-full bg-primary/20 blur-3xl" aria-hidden="true"></div>
				<div class="relative text-center">
					<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/15 text-[11px] font-semibold tracking-[0.18em] uppercase text-white/80 mb-6">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sparkles w-3 h-3" aria-hidden="true"><path d="M11.017 2.814a1 1 0 0 1 1.966 0l1.051 5.558a2 2 0 0 0 1.594 1.594l5.558 1.051a1 1 0 0 1 0 1.966l-5.558 1.051a2 2 0 0 0-1.594 1.594l-1.051 5.558a1 1 0 0 1-1.966 0l-1.051-5.558a2 2 0 0 0-1.594-1.594l-5.558-1.051a1 1 0 0 1 0-1.966l5.558-1.051a2 2 0 0 0 1.594-1.594z"></path><path d="M20 2v4"></path><path d="M22 4h-4"></path><circle cx="4" cy="20" r="2"></circle></svg>
						<?php esc_html_e("Let's talk", 'arqamweb'); ?>
					</div>
					<h2 class="text-4xl lg:text-5xl xl:text-6xl font-semibold tracking-[-0.025em] leading-[1.05]"><?php esc_html_e('Ready to build something', 'arqamweb'); ?><br><span class="text-gradient"><?php esc_html_e('worth shipping?', 'arqamweb'); ?></span></h2>
					<p class="mt-6 text-white/75 text-base lg:text-lg max-w-2xl mx-auto"><?php esc_html_e("Tell us about your goals. We'll come back with a clear plan, timeline and investment.", 'arqamweb'); ?></p>
					<div class="mt-10 flex flex-wrap justify-center gap-4">
						<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_QUOTE_PAGE_SLUG)); ?>" class="inline-flex items-center gap-2 px-7 py-3.5 text-sm font-semibold text-primary bg-white rounded-full shadow-glow hover:-translate-y-0.5 transition-transform"><?php esc_html_e('Request a Quote', 'arqamweb'); ?> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right w-4 h-4" aria-hidden="true"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg></a>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-flex items-center gap-2 px-7 py-3.5 text-sm font-semibold text-white rounded-full border border-white/30 hover:bg-white/10 transition-all"><?php esc_html_e('Back to Home', 'arqamweb'); ?></a>
					</div>
				</div>
			</div>
		</div>
	</section>

</main>

<script>
(function () {
	var filter = document.getElementById('services-filter');
	var grid   = document.getElementById('services-grid-list');
	if (!filter || !grid) return;

	var btns  = filter.querySelectorAll('[data-filter]');
	var cards = grid.querySelectorAll('[data-categories]');

	var activeClasses   = ['text-primary-foreground', 'bg-gradient-primary', 'shadow-glow'];
	var inactiveClasses = ['text-foreground/70', 'border', 'border-border', 'bg-background'];

	function setActive(btn) {
		btns.forEach(function (b) {
			b.classList.remove.apply(b.classList, activeClasses);
			b.classList.add.apply(b.classList, inactiveClasses);
			b.setAttribute('aria-selected', 'false');
		});
		btn.classList.remove.apply(btn.classList, inactiveClasses);
		btn.classList.add.apply(btn.classList, activeClasses);
		btn.setAttribute('aria-selected', 'true');
	}

	btns.forEach(function (btn) {
		btn.addEventListener('click', function () {
			var slug = btn.getAttribute('data-filter');
			setActive(btn);
			cards.forEach(function (card) {
				var cats = (card.getAttribute('data-categories') || '').split(' ');
				card.style.display = (slug === 'all' || cats.indexOf(slug) !== -1) ? '' : 'none';
			});
		});
	});
}());
</script>

<?php get_footer(); ?>
