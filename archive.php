<?php
/**
 * Archive template (categories, tags, authors, dates).
 *
 * @package Arqam-Web
 */

get_header();

// ── Archive meta ──────────────────────────────────────────────────────────
$archive_title = get_the_archive_title();
$archive_desc  = get_the_archive_description();
$total_posts   = $GLOBALS['wp_query']->found_posts;

// Clean label prefix ("Category: Strategy" → "Strategy")
$archive_label = $archive_title;
if ( is_category() )  $archive_label = single_term_title( '', false );
if ( is_tag() )       $archive_label = single_term_title( '', false );
if ( is_author() )    $archive_label = get_the_author_meta( 'display_name', get_queried_object_id() );
if ( is_year() )      $archive_label = get_query_var( 'year' );
if ( is_month() )     $archive_label = get_the_date( 'F Y', get_queried_object_id() );

// Archive type badge
$archive_type = '';
if ( is_category() )   $archive_type = __( 'Category',   'arqamweb' );
elseif ( is_tag() )    $archive_type = __( 'Tag',        'arqamweb' );
elseif ( is_author() ) $archive_type = __( 'Author',     'arqamweb' );
elseif ( is_date() )   $archive_type = __( 'Archive',    'arqamweb' );
else                   $archive_type = __( 'Archive',    'arqamweb' );

// Read-time helper
$read_time_fn = function ( $post_id ) {
	$words = str_word_count( strip_tags( get_post_field( 'post_content', $post_id ) ) );
	return max( 1, round( $words / 200 ) ) . ' min';
};
?>

<main class="bg-background" aria-label="<?php echo esc_attr( wp_strip_all_tags( $archive_title ) ); ?>">

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
			     style="width: 130px; height: 130px; left: 50%; top: 8%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.15), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 12s ease-in-out -8s infinite normal none running glass-float-3;"></div>
		</div>

		<div class="reveal container-x max-w-7xl mx-auto relative in">

			<div class="arqamweb-breadcrumb">
				<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
			</div>

			<div class="grid lg:grid-cols-12 gap-10 items-end">
				<div class="lg:col-span-8">
					<!-- Archive type badge -->
					<div class="text-[11px] font-semibold tracking-[0.3em] uppercase text-primary mb-6">
						— <?php echo esc_html( $archive_type ); ?>
					</div>
					<!-- Archive title -->
					<h1 class="text-5xl md:text-7xl lg:text-[5.5rem] font-semibold tracking-tight leading-[0.95]">
						<span class="text-gradient"><?php echo esc_html( $archive_label ); ?></span>
					</h1>
				</div>
				<div class="lg:col-span-4">
					<?php if ( $archive_desc ) : ?>
					<p class="text-lg text-muted-foreground leading-relaxed max-w-md mb-6">
						<?php echo wp_kses_post( $archive_desc ); ?>
					</p>
					<?php endif; ?>
					<div class="flex items-center gap-4 text-xs uppercase tracking-[0.2em] text-muted-foreground">
						<span>
							<?php echo esc_html( $total_posts ); ?>
							<?php echo esc_html( _n( 'essay', 'essays', $total_posts, 'arqamweb' ) ); ?>
						</span>
						<?php if ( is_author() ) : ?>
							<span class="w-1 h-1 rounded-full bg-muted-foreground/50"></span>
							<span><?php esc_html_e( 'Author', 'arqamweb' ); ?></span>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ── Posts grid ─────────────────────────────────────────────────────── -->
	<section class="py-16 lg:py-24 border-t border-border/60">
		<div class="container-x max-w-7xl mx-auto">

			<?php if ( have_posts() ) : ?>

			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-7">
				<?php
				$loop_i = 0;
				while ( have_posts() ) :
					the_post();
					$pid    = get_the_ID();
					$pthumb_id = get_post_thumbnail_id( $pid );
					$pcats  = get_the_category( $pid );
					$pcat   = ! empty( $pcats ) ? esc_html( $pcats[0]->name ) : '';
					$ptime  = $read_time_fn( $pid );
					$sticky = in_array( $pid, get_option( 'sticky_posts', [] ), true );
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
							<div class="absolute top-4 left-4 flex items-center gap-2">
								<?php if ( $pcat ) : ?>
								<span class="inline-flex items-center px-3 py-1.5 rounded-full text-[11px] font-semibold bg-background/90 backdrop-blur text-foreground border border-border">
									<?php echo esc_html( $pcat ); ?>
								</span>
								<?php endif; ?>
								<?php if ( $sticky ) : ?>
								<span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-[11px] font-semibold bg-primary/10 text-primary border border-primary/20">
									<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
									<?php esc_html_e( 'Trending', 'arqamweb' ); ?>
								</span>
								<?php endif; ?>
							</div>
							<div aria-hidden="true"
							     class="absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-[1400ms] ease-out"
							     style="background: linear-gradient(110deg, transparent 30%, color-mix(white 25%, transparent) 50%, transparent 70%);"></div>
						</div>

						<!-- Content -->
						<div class="p-6 lg:p-7">
							<div class="text-xs text-muted-foreground flex items-center gap-2">
								<span><?php echo esc_html( get_the_date( 'M Y' ) ); ?></span>
								<span class="w-1 h-1 rounded-full bg-muted-foreground/50"></span>
								<span><?php echo esc_html( $ptime ); ?></span>
							</div>
							<h2 class="mt-3 text-xl lg:text-2xl font-semibold leading-snug tracking-tight group-hover:text-primary transition-colors duration-300">
								<?php the_title(); ?>
							</h2>
							<p class="mt-3 text-sm text-muted-foreground leading-relaxed line-clamp-2">
								<?php echo esc_html( get_the_excerpt() ); ?>
							</p>
							<div class="mt-5 flex items-center justify-between">
								<span class="text-xs uppercase tracking-[0.15em] text-muted-foreground">
									<?php esc_html_e( 'By', 'arqamweb' ); ?> <?php the_author(); ?>
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

			<!-- ── Pagination ─────────────────────────────────────────────── -->
			<?php
			$pagination = paginate_links( [
				'prev_text' => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 12H5M11 5l-7 7 7 7"/></svg>',
				'next_text' => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 5l7 7-7 7"/></svg>',
				'type'      => 'array',
			] );

			if ( $pagination ) : ?>
			<nav class="mt-16 flex items-center justify-center gap-2" aria-label="<?php esc_attr_e( 'Posts navigation', 'arqamweb' ); ?>">
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

			<!-- ── Empty state ────────────────────────────────────────────── -->
			<div class="text-center py-24">
				<div class="text-6xl mb-6">📭</div>
				<h2 class="text-2xl font-semibold mb-3"><?php esc_html_e( 'No posts found', 'arqamweb' ); ?></h2>
				<p class="text-muted-foreground mb-8"><?php esc_html_e( 'Nothing published here yet. Check back soon.', 'arqamweb' ); ?></p>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"
				   class="inline-flex items-center gap-2 px-8 py-4 rounded-full border border-border bg-card font-semibold hover:bg-surface transition-colors">
					<?php esc_html_e( 'Back to home', 'arqamweb' ); ?>
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
						<path d="M5 12h14M13 5l7 7-7 7"/>
					</svg>
				</a>
			</div>

			<?php endif; ?>

		</div>
	</section>

</main>

<?php get_footer(); ?>
