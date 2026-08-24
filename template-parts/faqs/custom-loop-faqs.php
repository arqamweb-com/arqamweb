<?php
/**
 * FAQ accordion loop.
 *
 * Optional context (set via set_query_var before get_template_part):
 *   - faq_category : a `faqs_category` term slug. When provided, only FAQs in
 *                    that category are shown. When empty, all FAQs are shown.
 *   - faq_count    : posts_per_page override. Defaults to -1 (all matching).
 *
 * FAQ data comes from the `faq` CPT (title = question, content = answer).
 *
 * @package Arqam-Web
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faq_category = sanitize_title( (string) get_query_var( 'faq_category' ) );

$faq_count = get_query_var( 'faq_count' );
$faq_count = ( '' === $faq_count || null === $faq_count ) ? -1 : (int) $faq_count;

$args = array(
	'post_type'      => 'faq',
	'posts_per_page' => $faq_count,
	'order'          => 'ASC',
	'no_found_rows'  => true,
);

// Filter by category only when one was passed and the taxonomy exists.
if ( '' !== $faq_category && taxonomy_exists( 'faqs_category' ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'faqs_category',
			'field'    => 'slug',
			'terms'    => $faq_category,
		),
	);
}

$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) : ?>
	<div class="space-y-3">
		<?php
		while ( $the_query->have_posts() ) :
			$the_query->the_post();
			?>
			<details class="rounded-2xl border bg-card overflow-hidden transition-all duration-300">
				<summary
					class="w-full flex items-center justify-between gap-4 text-left px-6 py-5 hover:bg-accent/40 transition-colors cursor-pointer list-none">
					<span class="font-semibold text-base lg:text-lg"><?php the_title(); ?></span>
					<span
						class="shrink-0 w-9 h-9 rounded-full flex items-center justify-center transition-all bg-secondary text-foreground"><?php echo arqam_icon( 'plus' ); ?></span>
				</summary>
				<div class="p-6 text-muted-foreground leading-relaxed"><?php the_content(); ?></div>
			</details>
		<?php endwhile; ?>
	</div>
	<?php
endif;

wp_reset_postdata();
