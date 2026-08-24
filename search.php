<?php
/**
 * Search results template.
 *
 * @package Arqam-Web
 */

get_header();

$search_query = get_search_query();
$total_results = $GLOBALS['wp_query']->found_posts;

$read_time_fn = function ( $post_id ) {
	$words = str_word_count( strip_tags( get_post_field( 'post_content', $post_id ) ) );
	return max( 1, round( $words / 200 ) ) . ' min';
};
?>

<main class="bg-background">

	<!-- ── Hero / Search bar ─────────────────────────────────────────────── -->
	<section class="relative pt-32 pb-16 lg:pt-44 lg:pb-24 overflow-hidden bg-hero">
		<div class="absolute inset-0 grid-bg opacity-60" aria-hidden="true"></div>
		<div class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
			<div class="absolute inset-0 opacity-[0.08]"
			     style="background: radial-gradient(80% 60% at 20% 40%, rgb(57, 158, 208) 0%, transparent 70%), radial-gradient(60% 50% at 80% 30%, rgb(54, 109, 176) 0%, transparent 70%);"></div>
			<div class="absolute rounded-full"
			     style="width: 300px; height: 300px; right: 5%; top: 5%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.18), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 14s ease-in-out 0s infinite normal none running glass-float-1;"></div>
			<div class="absolute rounded-full"
			     style="width: 180px; height: 180px; left: 6%; top: 50%; background: radial-gradient(circle at 30% 30%, rgba(54, 109, 176, 0.2), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 16s ease-in-out -4s infinite normal none running glass-float-2;"></div>
		</div>

		<div class="reveal container-x max-w-4xl mx-auto relative in">

			<div class="arqamweb-breadcrumb">
				<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
			</div>

			<!-- Label -->
			<div class="text-[11px] font-semibold tracking-[0.3em] uppercase text-primary mb-6">
				— <?php esc_html_e( 'Search results', 'arqamweb' ); ?>
			</div>

			<!-- Title -->
			<?php if ( $search_query ) : ?>
			<h1 class="text-4xl md:text-5xl lg:text-6xl font-semibold tracking-tight leading-[1.05] mb-3">
				<?php
				printf(
					/* translators: %s: search query */
					esc_html__( 'Results for "%s"', 'arqamweb' ),
					'<span class="text-gradient">' . esc_html( $search_query ) . '</span>'
				);
				?>
			</h1>
			<?php else : ?>
			<h1 class="text-4xl md:text-5xl lg:text-6xl font-semibold tracking-tight leading-[1.05] mb-3">
				<?php esc_html_e( 'Search the journal', 'arqamweb' ); ?>
			</h1>
			<?php endif; ?>

			<!-- Result count -->
			<?php if ( have_posts() ) : ?>
			<p class="text-muted-foreground text-base mb-10">
				<?php
				printf(
					esc_html( _n( '%d result found', '%d results found', $total_results, 'arqamweb' ) ),
					$total_results
				);
				?>
			</p>
			<?php endif; ?>

			<!-- Search form -->
			<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>"
			      class="flex items-center gap-2 p-1.5 rounded-full bg-card border border-border shadow-soft focus-within:border-primary/50 transition-colors">
				<svg class="ml-4 flex-shrink-0 text-muted-foreground" width="16" height="16" viewBox="0 0 24 24"
				     fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
					<circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/>
				</svg>
				<input type="search"
				       name="s"
				       value="<?php echo esc_attr( $search_query ); ?>"
				       placeholder="<?php esc_attr_e( 'Search essays, topics, authors…', 'arqamweb' ); ?>"
				       class="flex-1 bg-transparent px-3 py-3 text-sm text-foreground placeholder:text-muted-foreground focus:outline-none"
				       aria-label="<?php esc_attr_e( 'Search', 'arqamweb' ); ?>">
				<button type="submit"
				        class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-gradient-primary text-primary-foreground text-sm font-semibold shadow-glow hover:opacity-90 transition-opacity flex-shrink-0">
					<?php esc_html_e( 'Search', 'arqamweb' ); ?>
				</button>
			</form>

		</div>
	</section>

	<!-- ── Results ───────────────────────────────────────────────────────── -->
	<section class="py-16 lg:py-24 border-t border-border/60">
		<div class="container-x max-w-7xl mx-auto">

			<?php if ( have_posts() ) : ?>

			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-7">
				<?php
				$loop_i = 0;
				while ( have_posts() ) :
					the_post();
					$pid   = get_the_ID();
					$ptype = get_post_type();
					$pthumb_id = get_post_thumbnail_id( $pid );
					$ptime = $read_time_fn( $pid );

					// Category / type badge
					$pcats = get_the_category( $pid );
					$pbadge = '';
					if ( ! empty( $pcats ) ) {
						$pbadge = esc_html( $pcats[0]->name );
					} elseif ( $ptype !== 'post' ) {
						$post_type_obj = get_post_type_object( $ptype );
						$pbadge = $post_type_obj ? esc_html( $post_type_obj->labels->singular_name ) : '';
					}
					?>
					<a href="<?php the_permalink(); ?>"
					   class="reveal group relative rounded-3xl border border-border bg-card overflow-hidden shadow-card hover:shadow-elevated transition-all duration-500 hover:-translate-y-1 in"
					   style="transition-delay: <?php echo esc_attr( ( $loop_i % 3 ) * 80 ); ?>ms">

						<div aria-hidden="true"
						     class="pointer-events-none absolute -inset-20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"
						     style="background: radial-gradient(40% 40% at 50% 0%, color-mix(in oklab, var(--primary) 35%, transparent), transparent 70%);"></div>

						<!-- Image -->
						<div class="relative aspect-[16/10] overflow-hidden">
							<?php if ( $pthumb_id ) : ?>
								<?php echo wp_get_attachment_image( $pthumb_id, 'arqam-card', false, [
									'class'    => 'w-full h-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.08]',
									'loading'  => 'lazy',
									'decoding' => 'async',
								] ); ?>
							<?php else : ?>
								<div class="w-full h-full bg-gradient-to-br from-primary/20 to-surface"></div>
							<?php endif; ?>
							<div class="absolute inset-0 bg-gradient-to-t from-background/80 via-background/0 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
							<?php if ( $pbadge ) : ?>
							<div class="absolute top-4 left-4">
								<span class="inline-flex items-center px-3 py-1.5 rounded-full text-[11px] font-semibold bg-background/90 backdrop-blur text-foreground border border-border">
									<?php echo esc_html( $pbadge ); ?>
								</span>
							</div>
							<?php endif; ?>
							<div aria-hidden="true"
							     class="absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-[1400ms] ease-out"
							     style="background: linear-gradient(110deg, transparent 30%, color-mix(white 25%, transparent) 50%, transparent 70%);"></div>
						</div>

						<!-- Content -->
						<div class="p-6 lg:p-7">
							<div class="text-xs text-muted-foreground flex items-center gap-2">
								<span><?php echo esc_html( get_the_date( 'M Y' ) ); ?></span>
								<?php if ( get_post_type() === 'post' ) : ?>
								<span class="w-1 h-1 rounded-full bg-muted-foreground/50"></span>
								<span><?php echo esc_html( $ptime ); ?></span>
								<?php endif; ?>
							</div>
							<h2 class="mt-3 text-xl font-semibold leading-snug tracking-tight group-hover:text-primary transition-colors duration-300">
								<?php the_title(); ?>
							</h2>
							<p class="mt-3 text-sm text-muted-foreground leading-relaxed line-clamp-2">
								<?php echo esc_html( get_the_excerpt() ); ?>
							</p>
							<div class="mt-5 flex items-center justify-between">
								<span class="text-xs uppercase tracking-[0.15em] text-muted-foreground">
									<?php the_author(); ?>
								</span>
								<span class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary transition-transform duration-300 group-hover:translate-x-1">
									<?php esc_html_e( 'Read', 'arqamweb' ); ?>
									<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
										<path d="M5 12h14M13 5l7 7-7 7"/>
									</svg>
								</span>
							</div>
						</div>
					</a>
					<?php
					$loop_i++;
				endwhile;
				?>
			</div>

			<!-- Pagination -->
			<?php
			$pagination = paginate_links( [
				'prev_text' => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 12H5M11 5l-7 7 7 7"/></svg>',
				'next_text' => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 5l7 7-7 7"/></svg>',
				'type'      => 'array',
			] );
			if ( $pagination ) : ?>
			<nav class="mt-16 flex items-center justify-center gap-2" aria-label="<?php esc_attr_e( 'Search results navigation', 'arqamweb' ); ?>">
				<?php foreach ( $pagination as $page_link ) :
					$is_current = strpos( $page_link, 'current' ) !== false;
					$is_dots    = strpos( $page_link, 'dots' ) !== false;
					if ( $is_current ) : ?>
						<span class="relative inline-flex items-center justify-center w-10 h-10 rounded-full text-sm font-medium text-primary-foreground">
							<span class="absolute inset-0 rounded-full bg-gradient-primary shadow-glow"></span>
							<span class="relative"><?php echo wp_kses_post( strip_tags( $page_link, '<span>' ) ); ?></span>
						</span>
					<?php elseif ( $is_dots ) : ?>
						<span class="inline-flex items-center justify-center w-10 h-10 text-muted-foreground text-sm">…</span>
					<?php else : ?>
						<span class="[&>a]:inline-flex [&>a]:items-center [&>a]:justify-center [&>a]:w-10 [&>a]:h-10 [&>a]:rounded-full [&>a]:text-sm [&>a]:font-medium [&>a]:border [&>a]:border-border [&>a]:bg-card [&>a]:text-muted-foreground [&>a]:hover:text-foreground [&>a]:hover:border-primary/40 [&>a]:transition-colors">
							<?php echo wp_kses_post( $page_link ); ?>
						</span>
					<?php endif;
				endforeach; ?>
			</nav>
			<?php endif; ?>

			<?php else : ?>

			<!-- No results -->
			<div class="text-center py-24 max-w-lg mx-auto">
				<div class="w-16 h-16 rounded-2xl bg-surface border border-border flex items-center justify-center mx-auto mb-6">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
					     stroke-width="1.5" class="text-muted-foreground" aria-hidden="true">
						<circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/>
					</svg>
				</div>

				<?php if ( $search_query ) : ?>
				<h2 class="text-2xl font-semibold mb-3">
					<?php
					printf(
						/* translators: %s: search query */
						esc_html__( 'No results for "%s"', 'arqamweb' ),
						esc_html( $search_query )
					);
					?>
				</h2>
				<p class="text-muted-foreground mb-8">
					<?php esc_html_e( 'Try different keywords or browse the journal below.', 'arqamweb' ); ?>
				</p>
				<?php else : ?>
				<h2 class="text-2xl font-semibold mb-3"><?php esc_html_e( 'What are you looking for?', 'arqamweb' ); ?></h2>
				<p class="text-muted-foreground mb-8"><?php esc_html_e( 'Type a keyword above to search essays, projects and more.', 'arqamweb' ); ?></p>
				<?php endif; ?>

				<!-- Suggested links -->
				<div class="flex flex-wrap gap-3 justify-center mb-10">
					<a href="<?php echo esc_url( home_url( '/blog' ) ); ?>"
					   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full border border-border bg-card text-sm font-medium hover:border-primary/40 hover:text-primary transition-colors">
						<?php esc_html_e( 'Browse Journal', 'arqamweb' ); ?>
					</a>
					<a href="<?php echo esc_url( home_url( '/projects' ) ); ?>"
					   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full border border-border bg-card text-sm font-medium hover:border-primary/40 hover:text-primary transition-colors">
						<?php esc_html_e( 'View Projects', 'arqamweb' ); ?>
					</a>
					<a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>"
					   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full border border-border bg-card text-sm font-medium hover:border-primary/40 hover:text-primary transition-colors">
						<?php esc_html_e( 'Contact Us', 'arqamweb' ); ?>
					</a>
				</div>

				<!-- Popular categories -->
				<?php
				$pop_cats = get_categories( [ 'hide_empty' => true, 'number' => 5, 'orderby' => 'count', 'order' => 'DESC' ] );
				if ( $pop_cats ) : ?>
				<div>
					<p class="text-xs font-semibold tracking-[0.2em] uppercase text-muted-foreground mb-4">
						<?php esc_html_e( 'Popular topics', 'arqamweb' ); ?>
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

			<?php endif; ?>

		</div>
	</section>

</main>

<?php get_footer(); ?>
