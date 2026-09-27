<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$posts_page_id = (int) get_option( 'page_for_posts' );
$blog_url      = $posts_page_id ? get_permalink( $posts_page_id ) : home_url( '/blog/' );
?>

<section id="blog" class="py-24 lg:py-32 bg-surface border-t border-border/60">
	<div class="reveal container">
		<div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-12">
			<div class="max-w-2xl">
				<div class="text-xs font-semibold tracking-[0.2em] uppercase text-primary mb-3"><?php esc_html_e('Field notes', 'arqam-web'); ?>
				</div>
				<h2 class="text-4xl lg:text-5xl font-semibold tracking-tight">
					<?php esc_html_e('Latest from the', 'arqam-web'); ?> <span class="text-gradient"><?php esc_html_e('studio.', 'arqam-web'); ?></span>
				</h2>
			</div>
			<a href="<?php echo esc_url( $blog_url ); ?>" class="inline-flex items-center gap-2 text-sm font-semibold text-primary hover:gap-3 transition-all">
				<?php esc_html_e('All articles', 'arqam-web'); ?> <?php echo arqam_icon('arrow'); ?>
			</a>
		</div>
		<?php get_template_part('/template-parts/blog/custom', 'loop-blog', array('postCount' => 3)); ?>
		<div class="mt-12 flex justify-center">
			<a href="<?php echo esc_url( $blog_url ); ?>" class="btn-primary">
				<?php esc_html_e( 'View All Blogs', 'arqam-web' ); ?> <?php echo arqam_icon( 'arrow' ); ?>
			</a>
		</div>
	</div>
</section>
