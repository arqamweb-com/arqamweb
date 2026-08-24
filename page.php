<?php
/**
 * Generic page template.
 *
 * @package Arqam-Web
 */

get_header();

the_post();

$post_id = get_the_ID();
$thumb_id = get_post_thumbnail_id( $post_id );
$parent  = wp_get_post_parent_id( $post_id );
?>

<main class="bg-background">

	<!-- ── Page Hero ─────────────────────────────────────────────────────── -->
	<section class="relative pt-32 pb-16 lg:pt-44 lg:pb-24 overflow-hidden bg-hero">
		<div class="absolute inset-0 grid-bg opacity-60" aria-hidden="true"></div>
		<div class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
			<div class="absolute inset-0 opacity-[0.08]"
			     style="background: radial-gradient(80% 60% at 20% 40%, rgb(57, 158, 208) 0%, transparent 70%), radial-gradient(60% 50% at 80% 30%, rgb(54, 109, 176) 0%, transparent 70%);"></div>
			<div class="absolute rounded-full"
			     style="width: 300px; height: 300px; right: 5%; top: 5%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.18), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 14s ease-in-out 0s infinite normal none running glass-float-1;"></div>
			<div class="absolute rounded-full"
			     style="width: 180px; height: 180px; left: 6%; top: 55%; background: radial-gradient(circle at 30% 30%, rgba(54, 109, 176, 0.2), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 16s ease-in-out -4s infinite normal none running glass-float-2;"></div>
			<div class="absolute rounded-full"
			     style="width: 120px; height: 120px; left: 50%; top: 8%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.15), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 12s ease-in-out -8s infinite normal none running glass-float-3;"></div>
		</div>

		<div class="reveal container-x max-w-4xl mx-auto relative in">

			<div class="arqamweb-breadcrumb">
				<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
			</div>

			<!-- Title -->
			<h1 class="text-4xl md:text-5xl lg:text-6xl font-semibold tracking-tight leading-[1.05] mb-6">
				<?php the_title(); ?>
			</h1>

			<!-- Excerpt as subtitle -->
			<?php if ( has_excerpt() ) : ?>
			<p class="text-lg lg:text-xl text-muted-foreground leading-relaxed max-w-2xl">
				<?php echo esc_html( get_the_excerpt() ); ?>
			</p>
			<?php endif; ?>

		</div>
	</section>

	<!-- ── Featured image ─────────────────────────────────────────────────── -->
	<?php if ( $thumb_id ) : ?>
	<div class="container-x max-w-5xl mx-auto -mt-8 relative z-10 px-4">
		<div class="rounded-3xl overflow-hidden border border-border shadow-elevated aspect-[16/9]">
			<?php echo wp_get_attachment_image( $thumb_id, 'arqam-hero', false, [
				'class'         => 'w-full h-full object-cover',
				'loading'       => 'eager',
				'decoding'      => 'async',
				'fetchpriority' => 'high',
			] ); ?>
		</div>
	</div>
	<?php endif; ?>

	<!-- ── Page content ───────────────────────────────────────────────────── -->
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

			<!-- Child pages -->
			<?php
			$children = get_pages( [ 'parent' => $post_id, 'sort_column' => 'menu_order', 'sort_order' => 'ASC' ] );
			if ( $children ) :
			?>
			<div class="mt-16 pt-10 border-t border-border/60">
				<p class="text-xs font-semibold tracking-[0.2em] uppercase text-muted-foreground mb-6">
					<?php esc_html_e( 'In this section', 'arqamweb' ); ?>
				</p>
				<div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
					<?php foreach ( $children as $child ) : ?>
					<a href="<?php echo esc_url( get_permalink( $child->ID ) ); ?>"
					   class="group flex items-center justify-between gap-4 p-4 rounded-2xl border border-border bg-card hover:border-primary/40 hover:shadow-card transition-all duration-300">
						<span class="font-medium text-sm group-hover:text-primary transition-colors">
							<?php echo esc_html( $child->post_title ); ?>
						</span>
						<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
						     stroke-width="2.5" class="flex-shrink-0 text-muted-foreground group-hover:text-primary group-hover:translate-x-0.5 transition-all" aria-hidden="true">
							<path d="M5 12h14M13 5l7 7-7 7"/>
						</svg>
					</a>
					<?php endforeach; ?>
				</div>
			</div>
			<?php endif; ?>

		</div>
	</article>

</main>

<?php get_footer(); ?>
