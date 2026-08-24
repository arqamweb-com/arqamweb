<?php
/**
 * Single post template.
 *
 * @package Arqam-Web
 */

get_header();

$post_id      = get_the_ID();
$date_iso     = get_the_date( 'c' );
$date_display = get_the_date( 'M j, Y' );
$modified_iso = get_the_modified_date( 'c' );

// Read time
$words     = str_word_count( strip_tags( get_post_field( 'post_content', $post_id ) ) );
$read_time = max( 1, round( $words / 200 ) ) . ' min';

// Categories & first cat
$cats = get_the_category( $post_id );
$cat  = ! empty( $cats ) ? $cats[0] : null;

// Featured image
$thumb_id = get_post_thumbnail_id( $post_id );

// Schema meta
$author_name    = get_the_author();
$blog_name      = get_bloginfo( 'name' );
$post_permalink = get_permalink();

// Related posts (same category → fallback to latest)
$cat_ids   = ! empty( $cats ) ? wp_list_pluck( $cats, 'term_id' ) : [];
$related_q = new WP_Query( [
	'posts_per_page' => 3,
	'post__not_in'   => [ $post_id ],
	'category__in'   => $cat_ids,
	'orderby'        => 'rand',
	'no_found_rows'  => true,
] );
if ( ! $related_q->have_posts() ) {
	$related_q = new WP_Query( [
		'posts_per_page' => 3,
		'post__not_in'   => [ $post_id ],
		'no_found_rows'  => true,
	] );
}

$read_time_fn = function ( $pid ) {
	$w = str_word_count( strip_tags( get_post_field( 'post_content', $pid ) ) );
	return max( 1, round( $w / 200 ) ) . ' min';
};
?>

<main class="bg-background">

	<!-- ── Post Hero ──────────────────────────────────────────────────────── -->
	<section class="relative pt-32 pb-16 lg:pt-44 lg:pb-24 overflow-hidden bg-hero">
		<div class="absolute inset-0 grid-bg opacity-60" aria-hidden="true"></div>
		<div class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
			<div class="absolute inset-0 opacity-[0.08]"
			     style="background: radial-gradient(80% 60% at 20% 40%, rgb(57, 158, 208) 0%, transparent 70%), radial-gradient(60% 50% at 80% 30%, rgb(54, 109, 176) 0%, transparent 70%);"></div>
			<div class="absolute rounded-full"
			     style="width: 300px; height: 300px; right: 5%; top: 5%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.18), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 14s ease-in-out 0s infinite normal none running glass-float-1;"></div>
			<div class="absolute rounded-full"
			     style="width: 180px; height: 180px; left: 8%; top: 55%; background: radial-gradient(circle at 30% 30%, rgba(54, 109, 176, 0.2), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 16s ease-in-out -4s infinite normal none running glass-float-2;"></div>
		</div>

		<div class="reveal container-x max-w-4xl mx-auto relative in">

			<div class="arqamweb-breadcrumb">
				<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
			</div>

			<!-- Category + read time -->
			<div class="flex items-center gap-3 mb-6">
				<?php if ( $cat ) : ?>
					<a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"
					   class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-[11px] font-semibold bg-primary/10 text-primary border border-primary/20">
						<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
						<?php echo esc_html( $cat->name ); ?>
					</a>
				<?php endif; ?>
				<span class="text-xs text-muted-foreground"><?php echo esc_html( $read_time ); ?> <?php esc_html_e( 'read', 'arqamweb' ); ?></span>
			</div>

			<!-- Title -->
			<h1 class="text-4xl md:text-5xl lg:text-6xl font-semibold tracking-tight leading-[1.05] mb-8"
			    itemprop="headline">
				<?php the_title(); ?>
			</h1>

			<!-- Meta row -->
			<div class="flex flex-wrap items-center gap-x-6 gap-y-3 text-sm text-muted-foreground border-t border-border/60 pt-6">
				<div class="flex items-center gap-2">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 32, '', esc_attr( $author_name ), [ 'class' => 'w-8 h-8 rounded-full object-cover border border-border' ] ); ?>
					<span class="font-medium text-foreground"><?php echo esc_html( $author_name ); ?></span>
				</div>
				<span class="w-1 h-1 rounded-full bg-muted-foreground/50 hidden sm:block"></span>
				<time datetime="<?php echo esc_attr( $date_iso ); ?>">
					<?php echo esc_html( $date_display ); ?>
				</time>
				<?php if ( $date_iso !== $modified_iso ) : ?>
					<span class="w-1 h-1 rounded-full bg-muted-foreground/50 hidden sm:block"></span>
					<span>
						<?php
						printf(
							/* translators: %s: date */
							esc_html__( 'Updated %s', 'arqamweb' ),
							esc_html( get_the_modified_date( 'M j, Y' ) )
						);
						?>
					</span>
				<?php endif; ?>
			</div>

		</div>
	</section>

	<!-- ── Featured image ─────────────────────────────────────────────────── -->
	<?php if ( $thumb_id ) : ?>
	<div class="container-x max-w-5xl mx-auto -mt-8 relative z-10 px-4">
		<div class="rounded-3xl overflow-hidden border border-border shadow-elevated aspect-[16/9]"
		     itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
			<?php echo wp_get_attachment_image( $thumb_id, 'arqam-hero', false, [
				'class'         => 'w-full h-full object-cover',
				'loading'       => 'eager',
				'decoding'      => 'async',
				'fetchpriority' => 'high',
				'itemprop'      => 'url',
			] ); ?>
		</div>
	</div>
	<?php endif; ?>

	<!-- ── Article body ───────────────────────────────────────────────────── -->
	<article
		id="post-<?php the_ID(); ?>"
		class="py-16 lg:py-24"
		itemscope
		itemtype="https://schema.org/Article">

		<meta itemprop="datePublished"  content="<?php echo esc_attr( $date_iso ); ?>">
		<meta itemprop="dateModified"   content="<?php echo esc_attr( $modified_iso ); ?>">
		<meta itemprop="author"         content="<?php echo esc_attr( $author_name ); ?>">
		<meta itemprop="publisher"      content="<?php echo esc_attr( $blog_name ); ?>">

		<div class="container-x max-w-3xl mx-auto">
			<div class="prose prose-lg max-w-none
			            prose-headings:font-semibold prose-headings:tracking-tight
			            prose-h2:text-3xl prose-h3:text-2xl
			            prose-a:text-primary prose-a:no-underline hover:prose-a:underline
			            prose-img:rounded-2xl prose-img:shadow-card
			            prose-blockquote:border-primary prose-blockquote:not-italic
			            prose-code:text-primary prose-code:bg-surface prose-code:px-1.5 prose-code:py-0.5 prose-code:rounded prose-code:text-sm prose-code:before:content-none prose-code:after:content-none
			            dark:prose-invert"
			     itemprop="articleBody">
				<?php the_content(); ?>
			</div>

			<!-- Tags -->
			<?php
			$tags = get_the_tags();
			if ( $tags ) :
			?>
			<div class="mt-10 pt-8 border-t border-border/60 flex flex-wrap gap-2">
				<?php foreach ( $tags as $tag ) : ?>
					<a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"
					   class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-medium bg-surface border border-border text-muted-foreground hover:text-foreground hover:border-primary/40 transition-colors">
						#<?php echo esc_html( $tag->name ); ?>
					</a>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>

			<!-- Share -->
			<div class="mt-10 pt-8 border-t border-border/60">
				<p class="text-xs font-semibold tracking-[0.2em] uppercase text-muted-foreground mb-4">
					<?php esc_html_e( 'Share this essay', 'arqamweb' ); ?>
				</p>
				<div class="flex items-center gap-3">
					<a href="https://twitter.com/intent/tweet?url=<?php echo rawurlencode( $post_permalink ); ?>&text=<?php echo rawurlencode( get_the_title() ); ?>"
					   target="_blank" rel="noopener noreferrer"
					   class="inline-flex items-center gap-2 px-4 py-2.5 rounded-full border border-border bg-card text-sm font-medium hover:border-primary/40 hover:text-primary transition-colors">
						<svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.747l7.73-8.835L1.254 2.25H8.08l4.259 5.632L18.244 2.25zM17.083 20.187h1.833L6.988 4.13H5.021L17.083 20.187z"/></svg>
						X / Twitter
					</a>
					<a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo rawurlencode( $post_permalink ); ?>"
					   target="_blank" rel="noopener noreferrer"
					   class="inline-flex items-center gap-2 px-4 py-2.5 rounded-full border border-border bg-card text-sm font-medium hover:border-primary/40 hover:text-primary transition-colors">
						<svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
						LinkedIn
					</a>
					<button
						onclick="navigator.clipboard.writeText('<?php echo esc_js( $post_permalink ); ?>').then(()=>{ this.textContent = '✓ Copied'; setTimeout(()=>{ this.innerHTML = '<svg width=\'14\' height=\'14\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'currentColor\' stroke-width=\'2\' aria-hidden=\'true\'><rect x=\'9\' y=\'9\' width=\'13\' height=\'13\' rx=\'2\'/><path d=\'M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1\'/></svg> Copy link'; }, 2000) })"
						class="inline-flex items-center gap-2 px-4 py-2.5 rounded-full border border-border bg-card text-sm font-medium hover:border-primary/40 hover:text-primary transition-colors">
						<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
							<rect x="9" y="9" width="13" height="13" rx="2"/>
							<path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"/>
						</svg>
						<?php esc_html_e( 'Copy link', 'arqamweb' ); ?>
					</button>
				</div>
			</div>

			<!-- Author box -->
			<div class="mt-12 p-6 lg:p-8 rounded-3xl border border-border bg-card flex gap-5 items-start">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 64, '', esc_attr( $author_name ), [ 'class' => 'w-16 h-16 rounded-2xl object-cover border border-border flex-shrink-0' ] ); ?>
				<div>
					<p class="text-[11px] font-semibold tracking-[0.2em] uppercase text-muted-foreground mb-1">
						<?php esc_html_e( 'Written by', 'arqamweb' ); ?>
					</p>
					<p class="font-semibold text-foreground"><?php echo esc_html( $author_name ); ?></p>
					<?php
					$bio = get_the_author_meta( 'description' );
					if ( $bio ) :
					?>
					<p class="mt-2 text-sm text-muted-foreground leading-relaxed"><?php echo esc_html( $bio ); ?></p>
					<?php endif; ?>
				</div>
			</div>

			<!-- Prev / Next navigation -->
			<nav class="mt-12 grid grid-cols-2 gap-4" aria-label="<?php esc_attr_e( 'Post navigation', 'arqamweb' ); ?>">
				<?php
				$prev = get_previous_post();
				$next = get_next_post();
				?>
				<?php if ( $prev ) : ?>
				<a href="<?php echo esc_url( get_permalink( $prev ) ); ?>"
				   class="group flex flex-col gap-1 p-4 rounded-2xl border border-border bg-card hover:border-primary/40 transition-colors col-span-1">
					<span class="text-[11px] uppercase tracking-[0.2em] text-muted-foreground flex items-center gap-1">
						<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 12H5M11 5l-7 7 7 7"/></svg>
						<?php esc_html_e( 'Previous', 'arqamweb' ); ?>
					</span>
					<span class="text-sm font-medium leading-snug group-hover:text-primary transition-colors line-clamp-2">
						<?php echo esc_html( get_the_title( $prev ) ); ?>
					</span>
				</a>
				<?php else : ?>
				<div></div>
				<?php endif; ?>

				<?php if ( $next ) : ?>
				<a href="<?php echo esc_url( get_permalink( $next ) ); ?>"
				   class="group flex flex-col gap-1 p-4 rounded-2xl border border-border bg-card hover:border-primary/40 transition-colors col-span-1 text-right">
					<span class="text-[11px] uppercase tracking-[0.2em] text-muted-foreground flex items-center justify-end gap-1">
						<?php esc_html_e( 'Next', 'arqamweb' ); ?>
						<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
					</span>
					<span class="text-sm font-medium leading-snug group-hover:text-primary transition-colors line-clamp-2">
						<?php echo esc_html( get_the_title( $next ) ); ?>
					</span>
				</a>
				<?php endif; ?>
			</nav>

		</div>
	</article>

	<!-- ── Related posts ──────────────────────────────────────────────────── -->
	<?php if ( $related_q->have_posts() ) : ?>
	<section class="py-24 lg:py-32 bg-surface border-t border-border/60">
		<div class="container-x max-w-7xl mx-auto">
			<div class="reveal mb-12 in">
				<div class="text-xs font-semibold tracking-[0.3em] uppercase text-primary mb-4">— <?php esc_html_e( 'More from the studio', 'arqamweb' ); ?></div>
				<h2 class="text-3xl lg:text-4xl font-semibold tracking-tight">
					<?php esc_html_e( 'Keep', 'arqamweb' ); ?> <span class="text-gradient"><?php esc_html_e( 'reading.', 'arqamweb' ); ?></span>
				</h2>
			</div>
			<div class="grid grid-cols-1 md:grid-cols-3 gap-5 lg:gap-7">
				<?php
				$ri = 0;
				while ( $related_q->have_posts() ) :
					$related_q->the_post();
					$rid       = get_the_ID();
					$rthumb_id = get_post_thumbnail_id( $rid );
					$rcats     = get_the_category( $rid );
					$rcat  = ! empty( $rcats ) ? esc_html( $rcats[0]->name ) : '';
					$rtime = $read_time_fn( $rid );
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
							<div aria-hidden="true"
							     class="absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-[1400ms] ease-out"
							     style="background: linear-gradient(110deg, transparent 30%, color-mix(white 25%, transparent) 50%, transparent 70%);"></div>
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
							<p class="mt-3 text-sm text-muted-foreground leading-relaxed line-clamp-2">
								<?php echo esc_html( get_the_excerpt() ); ?>
							</p>
							<div class="mt-5 inline-flex items-center gap-1.5 text-sm font-semibold text-primary transition-transform duration-300 group-hover:translate-x-1">
								<?php esc_html_e( 'Read', 'arqamweb' ); ?>
								<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
									<path d="M5 12h14M13 5l7 7-7 7"></path>
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
			<div class="mt-12 text-center">
				<a href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ?: home_url( '/blog' ) ); ?>"
				   class="inline-flex items-center gap-2 px-8 py-4 rounded-full border border-border bg-card font-semibold hover:bg-surface transition-colors">
					<?php esc_html_e( 'Back to Journal', 'arqamweb' ); ?>
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
						<path d="M5 12h14M13 5l7 7-7 7"></path>
					</svg>
				</a>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<!-- ── Comments ─────────────────────────────────────────────────────── -->
	<?php if ( comments_open() || get_comments_number() ) : ?>
	<section class="py-0 pb-24">
		<div class="container-x max-w-3xl mx-auto">
			<?php comments_template(); ?>
		</div>
	</section>
	<?php endif; ?>

</main>

<?php get_footer(); ?>
