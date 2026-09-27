<?php
/**
 * Template part for displaying related projects section
 *
 * @package Arqam-Web
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$related_query = ArqamWeb_Project::get_related_projects( get_the_ID() );

if ( ! $related_query->have_posts() ) {
	return;
}
?>

<section class="py-24 lg:py-32 border-t border-border/60">
	<div class="container-x max-w-7xl mx-auto">
		<div class="reveal mb-12 in">
			<div class="text-xs font-semibold tracking-[0.3em] uppercase text-primary mb-4">— <?php esc_html_e( 'More work', 'arqamweb' ); ?></div>
			<h2 class="text-3xl lg:text-4xl font-semibold tracking-tight">
				<?php esc_html_e( 'Related', 'arqamweb' ); ?> <span class="text-gradient"><?php esc_html_e( 'projects.', 'arqamweb' ); ?></span>
			</h2>
		</div>
		<div class="grid grid-cols-1 md:grid-cols-3 gap-5 lg:gap-7">
			<?php
			$ri = 0;
			while ( $related_query->have_posts() ) :
				$related_query->the_post();
				$rid       = get_the_ID();
				$rthumb_id = get_post_thumbnail_id( $rid );
				$rcat      = ArqamWeb_Project::get_category( $rid );
				?>
				<a href="<?php the_permalink(); ?>"
				   class="reveal group relative rounded-3xl border border-border bg-card overflow-hidden shadow-card hover:shadow-elevated transition-all duration-500 hover:-translate-y-1 in"
				   style="transition-delay: <?php echo esc_attr( $ri * 80 ); ?>ms">
					<div aria-hidden="true"
					     class="pointer-events-none absolute -inset-20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"
					     style="background: radial-gradient(40% 40% at 50% 0%, color-mix(in oklab, var(--primary) 35%, transparent), transparent 70%);"></div>
					<div class="relative aspect-[16/10] overflow-hidden">
						<?php if ( $rthumb_id ) : ?>
							<?php
							echo wp_get_attachment_image(
								$rthumb_id,
								'arqam-card-related',
								false,
								array(
									'class'    => 'w-full h-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.08]',
									'loading'  => 'lazy',
									'decoding' => 'async',
								)
							);
							?>
						<?php else : ?>
							<div class="w-full h-full bg-gradient-to-br from-primary/20 to-surface flex items-center justify-center">
								<span class="text-5xl font-bold text-primary/20"><?php echo esc_html( strtoupper( substr( get_the_title(), 0, 1 ) ) ); ?></span>
							</div>
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
					<div class="p-6 lg:p-7 flex items-center justify-between">
						<div>
							<h3 class="font-semibold text-lg leading-snug group-hover:text-primary transition-colors duration-300">
								<?php the_title(); ?>
							</h3>
							<?php if ( $rcat ) : ?>
							<p class="text-sm text-muted-foreground mt-1"><?php echo esc_html( $rcat ); ?></p>
							<?php endif; ?>
						</div>
						<span class="flex-shrink-0 text-muted-foreground group-hover:text-primary group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-all duration-200">
							<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
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
			<a href="<?php echo esc_url( home_url( '/projects' ) ); ?>"
			   class="inline-flex items-center gap-2 px-8 py-4 rounded-full border border-border bg-card font-semibold hover:bg-surface transition-colors">
				<?php esc_html_e( 'View all projects', 'arqamweb' ); ?>
				<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
					<path d="M5 12h14M13 5l7 7-7 7"/>
				</svg>
			</a>
		</div>
	</div>
</section>
