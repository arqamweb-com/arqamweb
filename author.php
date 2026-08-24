<?php
/**
 * Author archive template.
 * Person schema is emitted via ArqamWeb_Schema::person_author() hooked into wp_head.
 *
 * @package Arqam-Web
 */

get_header();

$author_id    = (int) get_queried_object_id();
$author_name  = get_the_author_meta( 'display_name', $author_id );
$author_bio   = get_the_author_meta( 'description', $author_id );
$author_url   = get_author_posts_url( $author_id );
$total_posts  = (int) $GLOBALS['wp_query']->found_posts;

$read_time_fn = function ( $post_id ) {
	$words = str_word_count( strip_tags( get_post_field( 'post_content', $post_id ) ) );
	return max( 1, round( $words / 200 ) ) . ' min';
};
?>

<main class="bg-background" aria-label="<?php echo esc_attr( sprintf( __( 'Posts by %s', 'arqamweb' ), $author_name ) ); ?>">

	<!-- ── Author Hero ───────────────────────────────────────────────────── -->
	<section class="relative pt-32 pb-16 lg:pt-44 lg:pb-24 overflow-hidden bg-hero">
		<div class="absolute inset-0 grid-bg opacity-60" aria-hidden="true"></div>
		<div class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
			<div class="absolute inset-0 opacity-[0.08]"
			     style="background: radial-gradient(80% 60% at 20% 40%, rgb(57, 158, 208) 0%, transparent 70%), radial-gradient(60% 50% at 80% 30%, rgb(54, 109, 176) 0%, transparent 70%);"></div>
			<div class="absolute rounded-full"
			     style="width: 300px; height: 300px; right: 5%; top: 5%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.18), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 14s ease-in-out 0s infinite normal none running glass-float-1;"></div>
			<div class="absolute rounded-full"
			     style="width: 180px; height: 180px; left: 6%; top: 55%; background: radial-gradient(circle at 30% 30%, rgba(54, 109, 176, 0.2), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 16s ease-in-out -4s infinite normal none running glass-float-2;"></div>
		</div>

		<div class="reveal container-x max-w-7xl mx-auto relative in">

			<div class="arqamweb-breadcrumb">
				<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
			</div>

			<div class="flex flex-col lg:flex-row lg:items-end gap-10">

				<!-- Author identity -->
				<div class="flex-1">
					<div class="text-[11px] font-semibold tracking-[0.3em] uppercase text-primary mb-6">
						— <?php esc_html_e( 'Author', 'arqamweb' ); ?>
					</div>

					<div class="flex items-center gap-5 mb-6">
						<div class="relative flex-shrink-0">
							<?php echo get_avatar( $author_id, 80, '', esc_attr( $author_name ), [
								'class' => 'rounded-2xl ring-2 ring-border',
							] ); ?>
						</div>
						<div>
							<h1 class="text-4xl md:text-5xl lg:text-6xl font-semibold tracking-tight leading-[1.05]">
								<span class="text-gradient"><?php echo esc_html( $author_name ); ?></span>
							</h1>
							<div class="mt-2 text-xs uppercase tracking-[0.2em] text-muted-foreground">
								<?php
								echo esc_html( $total_posts );
								echo ' ';
								echo esc_html( _n( 'essay', 'essays', $total_posts, 'arqamweb' ) );
								?>
							</div>
						</div>
					</div>

					<?php if ( $author_bio ) : ?>
					<p class="text-base text-muted-foreground leading-relaxed max-w-xl">
						<?php echo wp_kses_post( $author_bio ); ?>
					</p>
					<?php endif; ?>
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
					$pid       = get_the_ID();
					$pthumb_id = get_post_thumbnail_id( $pid );
					$pcats     = get_the_category( $pid );
					$pcat      = ! empty( $pcats ) ? esc_html( $pcats[0]->name ) : '';
					$ptime     = $read_time_fn( $pid );
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
							<?php if ( $pcat ) : ?>
							<div class="absolute top-4 left-4">
								<span class="inline-flex items-center px-3 py-1.5 rounded-full text-[11px] font-semibold bg-background/90 backdrop-blur text-foreground border border-border">
									<?php echo esc_html( $pcat ); ?>
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
								<span class="w-1 h-1 rounded-full bg-muted-foreground/50"></span>
								<span><?php echo esc_html( $ptime ); ?></span>
							</div>
							<h2 class="mt-3 text-xl lg:text-2xl font-semibold leading-snug tracking-tight group-hover:text-primary transition-colors duration-300">
								<?php the_title(); ?>
							</h2>
							<p class="mt-3 text-sm text-muted-foreground leading-relaxed line-clamp-2">
								<?php echo esc_html( get_the_excerpt() ); ?>
							</p>
							<div class="mt-5 inline-flex items-center gap-1.5 text-sm font-semibold text-primary transition-transform duration-300 group-hover:translate-x-1">
								<?php esc_html_e( 'Read', 'arqamweb' ); ?>
								<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
									<path d="M5 12h14M13 5l7 7-7 7"/>
								</svg>
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
			<nav class="mt-16 flex items-center justify-center gap-2" aria-label="<?php esc_attr_e( 'Author posts navigation', 'arqamweb' ); ?>">
				<?php foreach ( $pagination as $page_link ) :
					$is_current = strpos( $page_link, 'current' ) !== false;
					$is_dots    = strpos( $page_link, 'dots' )    !== false;
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
				<div class="w-16 h-16 rounded-2xl bg-surface border border-border flex items-center justify-center mx-auto mb-6">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-muted-foreground" aria-hidden="true">
						<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/>
					</svg>
				</div>
				<h2 class="text-2xl font-semibold mb-3">
					<?php
					printf(
						/* translators: %s: author name */
						esc_html__( '%s hasn\'t published anything yet.', 'arqamweb' ),
						esc_html( $author_name )
					);
					?>
				</h2>
				<a href="<?php echo esc_url( home_url( '/blog' ) ); ?>"
				   class="inline-flex items-center gap-2 px-8 py-4 rounded-full border border-border bg-card font-semibold hover:bg-surface transition-colors mt-6">
					<?php esc_html_e( 'Browse Journal', 'arqamweb' ); ?>
				</a>
			</div>

			<?php endif; ?>

		</div>
	</section>

</main>

<?php get_footer(); ?>
