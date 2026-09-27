<?php
/**
 * Template part for displaying project details/stats section
 *
 * @package Arqam-Web
 */

// Security check
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get project data
$post_id           = get_the_ID();
$project_thumb_id  = get_post_thumbnail_id( $post_id );
$portfolio_img     = ArqamWeb_Project::get_portfolio_image( $post_id );
$project_stats     = ArqamWeb_Project::get_stats( $post_id );
$has_project_media = $portfolio_img || $project_thumb_id;
$has_project_stats = ! empty( $project_stats );
?>

<!-- Project Stats -->
<?php if ( $has_project_media || $has_project_stats ) : ?>
<section class="section-padding py-20 border-y border-border/60 surface-elevated">
	<div class="container">
		<?php if ( $has_project_media ) : ?>
			<div class="-mt-[10%] mb-12 animate-float" style="animation-delay: 0.3s;">
				<div class="relative rounded-2xl overflow-hidden shadow-2xl shadow-foreground/5">
					<?php if ( $portfolio_img ) : ?>
						<img src="<?php echo esc_url( $portfolio_img['url'] ); ?>"
							alt="<?php echo esc_attr( $portfolio_img['alt'] ); ?>"
							width="<?php echo esc_attr( $portfolio_img['width'] ); ?>"
							height="<?php echo esc_attr( $portfolio_img['height'] ); ?>"
							loading="eager"
							fetchpriority="high"
							decoding="async"
							class="w-full object-cover">
					<?php else : ?>
						<?php
						the_post_thumbnail(
							'full',
							array(
								'class'         => 'w-full object-cover',
								'alt'           => esc_attr( get_the_title() . ' — portfolio image' ),
								'loading'       => 'eager',
								'fetchpriority' => 'high',
								'decoding'      => 'async',
							)
						);
						?>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if ( $has_project_stats ) : ?>
			<div class="text-center mb-16 transition-all duration-700 translate-y-6">
				<h2 class="text-3xl md:text-5xl font-display font-bold"><?php esc_html_e( 'The numbers speak for themselves', 'arqamweb' ); ?></h2>
			</div>
			<div class="grid grid-cols-2 md:grid-cols-4 gap-12 transition-all duration-700 translate-y-6">
				<?php foreach ( $project_stats as $stat ) : ?>
					<?php
					$stat_prefix     = $stat['prefix'];
					$stat_number     = $stat['value'];
					$stat_suffix     = $stat['suffix'];
					$stat_is_numeric = preg_match( '/^([^0-9.-]*)([0-9]+(?:\.[0-9]+)?)(.*)$/', $stat['value'], $stat_parts );
					if ( $stat_is_numeric ) {
						$stat_prefix = $stat_prefix !== '' ? $stat_prefix : $stat_parts[1];
						$stat_number = $stat_parts[2];
						$stat_suffix = $stat_suffix !== '' ? $stat_suffix : $stat_parts[3];
					}

					if ( $stat_prefix !== '' && preg_match( '/^(?:%|٪|s|sec|secs|ms)$/i', $stat_prefix ) ) {
						$stat_suffix = $stat_suffix !== '' ? $stat_suffix : $stat_prefix;
						$stat_prefix = '';
					}
					?>
					<div class="text-center space-y-1.5">
						<?php if ( $stat_is_numeric ) : ?>
							<div class="stat text-5xl md:text-6xl font-display font-bold tracking-tight tabular-nums text-foreground" data-value="<?php echo esc_attr( $stat_number ); ?>">
								<?php if ( $stat_prefix !== '' ) : ?><span class="prefix text-primary"><?php echo esc_html( $stat_prefix ); ?></span><?php endif; ?><span class="number">0</span><?php if ( $stat_suffix !== '' ) : ?><span class="suffix text-primary"><?php echo esc_html( $stat_suffix ); ?></span><?php endif; ?>
							</div>
						<?php else : ?>
							<div class="text-5xl md:text-6xl font-display font-bold tracking-tight tabular-nums text-foreground">
								<?php echo esc_html( $stat['value'] ); ?>
							</div>
						<?php endif; ?>
						<p class="text-sm text-muted-foreground font-medium"><?php echo esc_html( $stat['label'] ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
			<script>
				document.addEventListener("DOMContentLoaded", () => {
					const stats = document.querySelectorAll(".stat");

					const animate = (el) => {
						const value = parseFloat(el.dataset.value);
						const number = el.querySelector(".number");

						if (!number || Number.isNaN(value)) return;

						let current = 0;
						const duration = 1800;
						const steps = 50;
						const increment = value / steps;
						const hasDecimal = String(value).includes(".");
						let step = 0;

						const interval = setInterval(() => {
							step++;
							current = Math.min(increment * step, value);
							number.textContent = hasDecimal ? current.toFixed(1) : Math.round(current);

							if (step >= steps) clearInterval(interval);
						}, duration / steps);
					};

					const observer = new IntersectionObserver(entries => {
						entries.forEach(entry => {
							if (entry.isIntersecting) {
								animate(entry.target);
								observer.unobserve(entry.target);
							}
						});
					}, {
						threshold: 0.3
					});

					stats.forEach(stat => observer.observe(stat));
				});
			</script>
		<?php endif; ?>
	</div>

</section>
<?php endif; ?>
