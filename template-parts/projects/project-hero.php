<?php
/**
 * Template part for displaying project hero section
 *
 * @package Arqam-Web
 */

// Get project data
$post_id         = get_the_ID();
$project_excerpt = trim( get_the_excerpt( $post_id ) );
$proj_category   = ArqamWeb_Project::get_category( $post_id );
$proj_tags       = ArqamWeb_Project::get_tags( $post_id );
$proj_btn        = ArqamWeb_Project::get_action_button( $post_id );
?>

<!-- ── Project Hero ───────────────────────────────────────────────────── -->
<section class="relative pt-32 pb-16 lg:pt-44 lg:pb-24 overflow-hidden bg-hero">
	<div class="absolute inset-0 grid-bg opacity-60" aria-hidden="true"></div>
	<div class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
		<div class="absolute inset-0 opacity-[0.08]"
		     style="background: radial-gradient(80% 60% at 20% 40%, rgb(57, 158, 208) 0%, transparent 70%), radial-gradient(60% 50% at 80% 30%, rgb(54, 109, 176) 0%, transparent 70%);"></div>
		<div class="absolute rounded-full"
		     style="width: 280px; height: 280px; left: 5%; top: 10%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.18), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 14s ease-in-out 0s infinite normal none running glass-float-1;"></div>
		<div class="absolute rounded-full"
		     style="width: 200px; height: 200px; left: 70%; top: 55%; background: radial-gradient(circle at 30% 30%, rgba(54, 109, 176, 0.2), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 16s ease-in-out -4s infinite normal none running glass-float-2;"></div>
		<div class="absolute rounded-full"
		     style="width: 140px; height: 140px; left: 55%; top: 5%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.15), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 12s ease-in-out -8s infinite normal none running glass-float-3;"></div>
		<div class="absolute rounded-full"
		     style="width: 240px; height: 240px; left: 20%; top: 65%; background: radial-gradient(circle at 30% 30%, rgba(54, 109, 176, 0.16), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 15s ease-in-out -2s infinite normal none running glass-float-4;"></div>
		<div class="absolute rounded-full"
		     style="width: 110px; height: 110px; left: 82%; top: 25%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.19), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 11s ease-in-out -6s infinite normal none running glass-float-1;"></div>
	</div>

	<div class="reveal container-x max-w-5xl mx-auto relative in">

		<div class="arqamweb-breadcrumb">
			<?php if ( function_exists( 'rank_math_the_breadcrumbs' ) ) rank_math_the_breadcrumbs(); ?>
		</div>

		<!-- Category badge -->
		<?php if ( $proj_category ) : ?>
		<div class="flex items-center gap-3 mb-6">
			<span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-[11px] font-semibold bg-primary/10 text-primary border border-primary/20">
				<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
				<?php echo esc_html( $proj_category ); ?>
			</span>
		</div>
		<?php endif; ?>

		<!-- Title -->
		<h1 class="text-4xl md:text-6xl lg:text-7xl font-semibold tracking-tight leading-[1.05] max-w-5xl mb-6">
			<?php echo ArqamWeb_Project::get_hero_title( get_the_ID() ); ?>
		</h1>

		<!-- Excerpt -->
		<?php if ( $project_excerpt !== '' ) : ?>
			<p class="text-lg md:text-xl text-muted-foreground max-w-2xl leading-relaxed mb-8">
				<?php echo esc_html( $project_excerpt ); ?>
			</p>
		<?php endif; ?>

		<!-- Tags -->
		<?php if ( $proj_tags ) : ?>
		<div class="flex flex-wrap gap-2 mb-8">
			<?php foreach ( $proj_tags as $tag ) : ?>
				<span class="px-4 py-1.5 text-xs font-medium tracking-wide uppercase rounded-full border border-border text-muted-foreground">
					<?php echo esc_html( $tag->name ); ?>
				</span>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>

		<!-- Action button -->
		<?php if ( $proj_btn ) : ?>
		<a href="<?php echo esc_url( $proj_btn['url'] ); ?>" target="_blank" rel="noopener noreferrer"
		   class="inline-flex items-center gap-2 px-8 py-4 rounded-full bg-gradient-primary text-primary-foreground font-semibold text-sm shadow-glow hover:scale-[1.02] active:scale-[0.97] transition-all duration-200">
			<span><?php echo esc_html( $proj_btn['text'] ); ?></span>
			<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
				<path d="M7 7h10v10M7 17 17 7"/>
			</svg>
		</a>
		<?php endif; ?>

	</div>
</section>
