<?php
/**
 * Service page: the post's own editor content, kept for its SEO value.
 *
 * @package Arqam-Web
 */

?>
<section id="details" class="bg-[#f4f7fb] py-24 lg:py-32">
	<div class="detail-reveal reveal container max-w-[820px]">
		<div class="detail-stagger detail-card rounded-[32px] bg-background p-6 sm:p-10 lg:p-14">
			<?php get_template_part('template-parts/service/service', 'eyebrow', ['text' => __('In detail', 'arqamweb')]); ?>
			<div class="prose prose-lg mt-6 max-w-none prose-headings:font-semibold prose-headings:tracking-tight prose-a:text-primary prose-a:no-underline hover:prose-a:underline prose-img:rounded-2xl">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</section>
