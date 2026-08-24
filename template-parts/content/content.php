<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<article id="post-<?php the_ID(); ?>" class="bg-white shadow-lg rounded-lg overflow-hidden">
	<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail(
				'medium',
				[
					'class'    => 'w-full h-48 object-cover',
					'loading'  => 'lazy',
					'decoding' => 'async',
					'alt'      => the_title_attribute( [ 'echo' => false ] ),
					'sizes'    => '(max-width: 640px) 100vw, (max-width: 1024px) 50vw, 33vw',
				]
			);
			?>
		</a>
	<?php endif; ?>

	<div class="p-6">
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title text-xl font-semibold text-gray-900">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title text-xl font-semibold text-gray-900"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>
		</header>

		<p class="text-gray-600 text-sm mt-2"><?php the_excerpt(); ?></p>
		<a href="<?php the_permalink(); ?>" class="text-blue-500 font-medium mt-4 inline-block">
			<?php esc_html_e( 'اقرأ المزيد', 'arqamweb' ); ?> &larr;
		</a>
	</div>
</article>
