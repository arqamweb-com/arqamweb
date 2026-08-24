<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$header_description = get_query_var( 'header_description' );
$title              = get_the_title();
$words              = preg_split( '/\s+/', trim( (string) $title ) );
$first_word         = $words[0] ?? '';
$remaining_words    = array_slice( $words, 1 );
?>
<section class="bg-gradient-to-br from-blue-50 to-white dark:from-gray-900 dark:to-gray-800 py-20">
	<div class="container mx-auto px-4 max-w-4xl text-center">
		<h1 class="entry-title text-5xl font-extrabold mb-6">
			<?php echo esc_html( $first_word ); ?>
			<?php if ( ! empty( $remaining_words ) ) : ?>
				<span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-cyan-400">
					<?php echo esc_html( implode( ' ', $remaining_words ) ); ?>
				</span>
			<?php endif; ?>
		</h1>
		<p class="text-xl text-gray-600 dark:text-gray-300 mb-8">
			<?php
			if ( ! empty( $header_description ) ) {
				echo esc_html( $header_description );
			} else {
				echo esc_html__( 'An Egyptian digital marketing company with over 14 years of experience, helping businesses achieve real numbers in sales since 2010.', 'arqamweb' );
			}
			?>
		</p>

		<div class="arqamweb-breadcrumbs mt-4">
			<?php arqamweb_get_breadcrumb(); ?>
		</div>
	</div>
</section>
