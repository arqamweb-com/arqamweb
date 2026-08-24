<?php
/**
 * 404 template.
 *
 * @package Arqam-Web
 */

get_header();

// Recent posts for suggestions
$recent_q = new WP_Query( [
	'posts_per_page' => 3,
	'no_found_rows'  => true,
] );

$pop_cats = get_categories( [ 'hide_empty' => true, 'number' => 5, 'orderby' => 'count', 'order' => 'DESC' ] );
?>

<main class="bg-background min-h-screen">

	<!-- ── 404 Hero ──────────────────────────────────────────────────────── -->
	<section class="relative pt-32 pb-16 lg:pt-44 lg:pb-24 overflow-hidden bg-hero">
		<div class="absolute inset-0 grid-bg opacity-60" aria-hidden="true"></div>
		<div class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
			<div class="absolute inset-0 opacity-[0.08]"
			     style="background: radial-gradient(80% 60% at 20% 40%, rgb(57, 158, 208) 0%, transparent 70%), radial-gradient(60% 50% at 80% 30%, rgb(54, 109, 176) 0%, transparent 70%);"></div>
			<div class="absolute rounded-full"
			     style="width: 300px; height: 300px; right: 5%; top: 5%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.18), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 14s ease-in-out 0s infinite normal none running glass-float-1;"></div>
			<div class="absolute rounded-full"
			     style="width: 200px; height: 200px; left: 6%; top: 50%; background: radial-gradient(circle at 30% 30%, rgba(54, 109, 176, 0.2), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 16s ease-in-out -4s infinite normal none running glass-float-2;"></div>
			<div class="absolute rounded-full"
			     style="width: 120px; height: 120px; left: 50%; top: 10%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.15), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 12s ease-in-out -8s infinite normal none running glass-float-3;"></div>
		</div>

		<div class="reveal container-x max-w-3xl mx-auto relative in text-center">

			<!-- 404 number -->
			<div class="text-[10rem] lg:text-[14rem] font-semibold leading-none tracking-tight select-none"
			     style="background: linear-gradient(180deg, hsl(var(--primary)) 0%, hsl(var(--primary) / 0.15) 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
				404
			</div>

			<!-- Label -->
			<div class="text-[11px] font-semibold tracking-[0.3em] uppercase text-primary mb-4 -mt-4">
				— <?php esc_html_e( 'Page not found', 'arqamweb' ); ?>
			</div>

			<!-- Heading -->
			<h1 class="text-3xl md:text-5xl font-semibold tracking-tight leading-[1.05] mb-5">
				<?php esc_html_e( "This page took a wrong turn.", 'arqamweb' ); ?><br>
				<span class="text-gradient italic font-light"><?php esc_html_e( "Let's get you back.", 'arqamweb' ); ?></span>
			</h1>

			<!-- Description -->
			<p class="text-muted-foreground text-lg leading-relaxed max-w-md mx-auto mb-10">
				<?php esc_html_e( "The page you're looking for doesn't exist, was moved, or the URL might be mistyped.", 'arqamweb' ); ?>
			</p>

			<!-- CTA buttons -->
			<div class="flex flex-col sm:flex-row gap-4 items-center justify-center mb-10">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"
				   class="inline-flex items-center gap-2 px-8 py-4 rounded-full bg-gradient-primary text-primary-foreground font-semibold shadow-glow hover:scale-[1.02] transition-transform">
					<?php esc_html_e( 'Back to home', 'arqamweb' ); ?>
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
						<path d="M5 12h14M13 5l7 7-7 7"/>
					</svg>
				</a>
				<a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>"
				   class="inline-flex items-center gap-2 px-8 py-4 rounded-full border border-border bg-card font-semibold hover:bg-surface transition-colors">
					<?php esc_html_e( 'Contact support', 'arqamweb' ); ?>
				</a>
			</div>

			<!-- Search -->
			<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>"
			      class="flex items-center gap-2 p-1.5 rounded-full bg-card border border-border shadow-soft focus-within:border-primary/50 transition-colors max-w-sm mx-auto">
				<svg class="ml-4 flex-shrink-0 text-muted-foreground" width="15" height="15" viewBox="0 0 24 24"
				     fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
					<circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/>
				</svg>
				<input type="search" name="s"
				       placeholder="<?php esc_attr_e( 'Search…', 'arqamweb' ); ?>"
				       class="flex-1 bg-transparent px-3 py-2.5 text-sm text-foreground placeholder:text-muted-foreground focus:outline-none"
				       aria-label="<?php esc_attr_e( 'Search', 'arqamweb' ); ?>">
				<button type="submit"
				        class="inline-flex items-center px-5 py-2.5 rounded-full bg-gradient-primary text-primary-foreground text-sm font-semibold flex-shrink-0 hover:opacity-90 transition-opacity">
					<?php esc_html_e( 'Search', 'arqamweb' ); ?>
				</button>
			</form>

		</div>
	</section>

	<!-- ── Quick links ───────────────────────────────────────────────────── -->
	<section class="py-16 border-t border-border/60">
		<div class="container-x max-w-5xl mx-auto">

			<div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-16">
				<a href="<?php echo esc_url( home_url( '/blog' ) ); ?>"
				   class="group flex items-center gap-4 p-5 rounded-2xl border border-border bg-card hover:border-primary/40 hover:shadow-card transition-all duration-300">
					<div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center flex-shrink-0">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary" aria-hidden="true">
							<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/>
						</svg>
					</div>
					<div>
						<p class="font-semibold text-sm group-hover:text-primary transition-colors"><?php esc_html_e( 'Journal', 'arqamweb' ); ?></p>
						<p class="text-xs text-muted-foreground mt-0.5"><?php esc_html_e( 'Essays & insights', 'arqamweb' ); ?></p>
					</div>
					<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
					     class="ml-auto text-muted-foreground group-hover:text-primary group-hover:translate-x-0.5 transition-all" aria-hidden="true">
						<path d="M5 12h14M13 5l7 7-7 7"/>
					</svg>
				</a>

				<a href="<?php echo esc_url( home_url( '/projects' ) ); ?>"
				   class="group flex items-center gap-4 p-5 rounded-2xl border border-border bg-card hover:border-primary/40 hover:shadow-card transition-all duration-300">
					<div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center flex-shrink-0">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary" aria-hidden="true">
							<rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/>
						</svg>
					</div>
					<div>
						<p class="font-semibold text-sm group-hover:text-primary transition-colors"><?php esc_html_e( 'Projects', 'arqamweb' ); ?></p>
						<p class="text-xs text-muted-foreground mt-0.5"><?php esc_html_e( 'Our portfolio', 'arqamweb' ); ?></p>
					</div>
					<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
					     class="ml-auto text-muted-foreground group-hover:text-primary group-hover:translate-x-0.5 transition-all" aria-hidden="true">
						<path d="M5 12h14M13 5l7 7-7 7"/>
					</svg>
				</a>

				<a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>"
				   class="group flex items-center gap-4 p-5 rounded-2xl border border-border bg-card hover:border-primary/40 hover:shadow-card transition-all duration-300">
					<div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center flex-shrink-0">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary" aria-hidden="true">
							<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
						</svg>
					</div>
					<div>
						<p class="font-semibold text-sm group-hover:text-primary transition-colors"><?php esc_html_e( 'Contact', 'arqamweb' ); ?></p>
						<p class="text-xs text-muted-foreground mt-0.5"><?php esc_html_e( 'Get in touch', 'arqamweb' ); ?></p>
					</div>
					<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
					     class="ml-auto text-muted-foreground group-hover:text-primary group-hover:translate-x-0.5 transition-all" aria-hidden="true">
						<path d="M5 12h14M13 5l7 7-7 7"/>
					</svg>
				</a>
			</div>

			<!-- Popular categories -->
			<?php if ( $pop_cats ) : ?>
			<div class="mb-16 text-center">
				<p class="text-xs font-semibold tracking-[0.2em] uppercase text-muted-foreground mb-5">
					<?php esc_html_e( 'Browse by topic', 'arqamweb' ); ?>
				</p>
				<div class="flex flex-wrap gap-2 justify-center">
					<?php foreach ( $pop_cats as $pop_cat ) : ?>
					<a href="<?php echo esc_url( get_category_link( $pop_cat->term_id ) ); ?>"
					   class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full bg-primary/10 text-primary border border-primary/20 text-xs font-semibold hover:bg-primary/20 transition-colors">
						<span class="w-1 h-1 rounded-full bg-primary"></span>
						<?php echo esc_html( $pop_cat->name ); ?>
					</a>
					<?php endforeach; ?>
				</div>
			</div>
			<?php endif; ?>

		</div>
	</section>

	<!-- ── Recent posts ──────────────────────────────────────────────────── -->
	<?php if ( $recent_q->have_posts() ) : ?>
	<section class="py-16 lg:py-24 bg-surface border-t border-border/60">
		<div class="container-x max-w-7xl mx-auto">
			<div class="reveal mb-10 in">
				<div class="text-xs font-semibold tracking-[0.3em] uppercase text-primary mb-4">— <?php esc_html_e( 'While you\'re here', 'arqamweb' ); ?></div>
				<h2 class="text-3xl lg:text-4xl font-semibold tracking-tight">
					<?php esc_html_e( 'Latest from the', 'arqamweb' ); ?> <span class="text-gradient"><?php esc_html_e( 'studio.', 'arqamweb' ); ?></span>
				</h2>
			</div>
			<div class="grid grid-cols-1 md:grid-cols-3 gap-5 lg:gap-7">
				<?php
				$ri = 0;
				while ( $recent_q->have_posts() ) :
					$recent_q->the_post();
					$rid   = get_the_ID();
					$rthumb_id = get_post_thumbnail_id( $rid );
					$rcats = get_the_category( $rid );
					$rcat  = ! empty( $rcats ) ? esc_html( $rcats[0]->name ) : '';
					$words = str_word_count( strip_tags( get_post_field( 'post_content', $rid ) ) );
					$rtime = max( 1, round( $words / 200 ) ) . ' min';
					?>
					<a href="<?php the_permalink(); ?>"
					   class="reveal group relative rounded-3xl border border-border bg-card overflow-hidden shadow-card hover:shadow-elevated transition-all duration-500 hover:-translate-y-1 in"
					   style="transition-delay: <?php echo esc_attr( $ri * 80 ); ?>ms">
						<div aria-hidden="true"
						     class="pointer-events-none absolute -inset-20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"
						     style="background: radial-gradient(40% 40% at 50% 0%, color-mix(in oklab, var(--primary) 35%, transparent), transparent 70%);"></div>
						<div class="relative aspect-[16/10] overflow-hidden">
							<?php if ( $rthumb_id ) : ?>
								<?php echo wp_get_attachment_image( $rthumb_id, 'arqam-card-related', false, [
									'class'    => 'w-full h-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.08]',
									'loading'  => 'lazy',
									'decoding' => 'async',
								] ); ?>
							<?php else : ?>
								<div class="w-full h-full bg-gradient-to-br from-primary/20 to-surface"></div>
							<?php endif; ?>
							<div class="absolute inset-0 bg-gradient-to-t from-background/80 via-background/0 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
							<?php if ( $rcat ) : ?>
							<div class="absolute top-4 left-4">
								<span class="inline-flex items-center px-3 py-1.5 rounded-full text-[11px] font-semibold bg-background/90 backdrop-blur text-foreground border border-border">
									<?php echo esc_html( $rcat ); ?>
								</span>
							</div>
							<?php endif; ?>
						</div>
						<div class="p-6 lg:p-7">
							<div class="text-xs text-muted-foreground flex items-center gap-2">
								<span><?php echo esc_html( get_the_date( 'M Y' ) ); ?></span>
								<span class="w-1 h-1 rounded-full bg-muted-foreground/50"></span>
								<span><?php echo esc_html( $rtime ); ?></span>
							</div>
							<h3 class="mt-3 text-xl font-semibold leading-snug tracking-tight group-hover:text-primary transition-colors duration-300">
								<?php the_title(); ?>
							</h3>
							<div class="mt-5 inline-flex items-center gap-1.5 text-sm font-semibold text-primary transition-transform duration-300 group-hover:translate-x-1">
								<?php esc_html_e( 'Read', 'arqamweb' ); ?>
								<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
									<path d="M5 12h14M13 5l7 7-7 7"/>
								</svg>
							</div>
						</div>
					</a>
					<?php
					$ri++;
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</section>
	<?php endif; ?>

</main>

<?php get_footer(); ?>
