<?php
/**
 * Blog posts index template.
 *
 * @package Arqam-Web
 */

get_header();

// ── Helpers ───────────────────────────────────────────────────────────────
$read_time_fn = function ($post_id) {
	$words = str_word_count(strip_tags(get_post_field('post_content', $post_id)));
	return max(1, round($words / 200)) . ' min';
};

$first_cat_fn = function ($post_id) {
	$cats = get_the_category($post_id);
	return !empty($cats) ? esc_html($cats[0]->name) : 'General';
};

// ── Counts / labels ───────────────────────────────────────────────────────
$total_posts = (int)wp_count_posts()->publish;
$issue_number = str_pad($total_posts, 3, '0', STR_PAD_LEFT);

// ── Transient: discover which post IDs to show (WPML: per-language key) ────
$home_cache_key = arqamweb_home_cache_key();
$home_cache = get_transient($home_cache_key);

if (false === $home_cache) {
	$sticky_ids = get_option('sticky_posts');

	// Featured ID (fields => ids avoids meta/term warm-up)
	$feat_id_args = !empty($sticky_ids)
		? ['post__in' => $sticky_ids, 'posts_per_page' => 1, 'no_found_rows' => true, 'fields' => 'ids', 'update_post_meta_cache' => false, 'update_post_term_cache' => false]
		: ['posts_per_page' => 1, 'no_found_rows' => true, 'fields' => 'ids', 'update_post_meta_cache' => false, 'update_post_term_cache' => false];
	$feat_id_q = new WP_Query($feat_id_args);
	$featured_id = !empty($feat_id_q->posts) ? (int)$feat_id_q->posts[0] : 0;
	wp_reset_postdata();

	$exclude = $featured_id ? [$featured_id] : [];

	// Grid IDs
	$grid_id_q = new WP_Query([
		'posts_per_page' => 6,
		'post__not_in' => $exclude,
		'no_found_rows' => true,
		'fields' => 'ids',
		'update_post_meta_cache' => false,
		'update_post_term_cache' => false,
	]);
	$grid_ids = array_map('intval', $grid_id_q->posts ?: []);
	wp_reset_postdata();

	// Trending IDs
	$trend_id_q = new WP_Query([
		'posts_per_page' => 3,
		'orderby' => 'comment_count',
		'order' => 'DESC',
		'post__not_in' => $exclude,
		'no_found_rows' => true,
		'fields' => 'ids',
		'update_post_meta_cache' => false,
		'update_post_term_cache' => false,
	]);
	$trend_ids = array_map('intval', $trend_id_q->posts ?: []);
	wp_reset_postdata();

	$home_cache = [
		'featured_id' => $featured_id,
		'grid_ids' => $grid_ids,
		'trend_ids' => $trend_ids,
	];
	set_transient($home_cache_key, $home_cache, 5 * MINUTE_IN_SECONDS);
}

$cached_featured_id = (int)($home_cache['featured_id'] ?? 0);
$cached_grid_ids = (array)($home_cache['grid_ids'] ?? []);
$cached_trend_ids = (array)($home_cache['trend_ids'] ?? []);

// ── Featured post ─────────────────────────────────────────────────────────
$exclude_ids = [];
$featured_data = null;

if ($cached_featured_id) {
	$featured_q = new WP_Query(['p' => $cached_featured_id, 'no_found_rows' => true]);
	if ($featured_q->have_posts()) {
		$featured_q->the_post();
		$fid = get_the_ID();
		$fcats = get_the_category($fid);
		$exclude_ids[] = $fid;
		$featured_data = [
			'id' => $fid,
			'url' => get_permalink(),
			'title' => get_the_title(),
			'excerpt' => get_the_excerpt(),
			'author' => get_the_author(),
			'date' => get_the_date('M j, Y'),
			'read_time' => $read_time_fn($fid),
			'thumb_id' => get_post_thumbnail_id($fid),
			'cat' => !empty($fcats) ? esc_html($fcats[0]->name) : 'General',
		];
		wp_reset_postdata();
	}
}

// ── Grid posts — fetch by cached IDs (fast post__in lookup) ───────────────
$grid_q = !empty($cached_grid_ids)
	? new WP_Query([
		'post__in' => $cached_grid_ids,
		'orderby' => 'post__in',
		'posts_per_page' => count($cached_grid_ids),
		'no_found_rows' => true,
	])
	: new WP_Query(['post__in' => [0], 'no_found_rows' => true]);

// ── Trending posts — fetch by cached IDs ──────────────────────────────────
$trending_q = !empty($cached_trend_ids)
	? new WP_Query([
		'post__in' => $cached_trend_ids,
		'orderby' => 'post__in',
		'posts_per_page' => count($cached_trend_ids),
		'no_found_rows' => true,
	])
	: new WP_Query(['post__in' => [0], 'no_found_rows' => true]);

// ── Category nav ──────────────────────────────────────────────────────────
$nav_cats = get_categories(['hide_empty' => true, 'number' => 5]);

// ── Grid layout matrix (position 0–5) ─────────────────────────────────────
$grid_layouts = [
	['aspect' => 'aspect-[4/3]', 'delay' => '0ms'],
	['aspect' => 'aspect-[4/3]', 'delay' => '60ms'],
	['aspect' => 'aspect-[4/3]', 'delay' => '120ms'],
	['aspect' => 'aspect-[4/3]', 'delay' => '180ms'],
	['aspect' => 'aspect-[4/3]', 'delay' => '240ms'],
	['aspect' => 'aspect-[4/3]', 'delay' => '300ms'],
];
?>

<main class="bg-background">

	<!-- ── Hero ──────────────────────────────────────────────────────────── -->
	<section class="relative pt-32 pb-16 lg:pt-44 lg:pb-24 overflow-hidden bg-hero">
		<div class="absolute inset-0 grid-bg opacity-60" aria-hidden="true"></div>
		<div class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
			<div class="absolute inset-0 opacity-[0.08]"
			     style="background: radial-gradient(80% 60% at 20% 40%, rgb(57, 158, 208) 0%, transparent 70%), radial-gradient(60% 50% at 80% 30%, rgb(54, 109, 176) 0%, transparent 70%);"></div>
			<div class="absolute rounded-full"
			     style="width: 280px; height: 280px; left: 5%; top: 10%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.18), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 14s ease-in-out 0s infinite normal none running glass-float-1; transform: translate(0px, 0px); will-change: transform; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);"></div>
			<div class="absolute rounded-full"
			     style="width: 200px; height: 200px; left: 70%; top: 55%; background: radial-gradient(circle at 30% 30%, rgba(54, 109, 176, 0.2), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 16s ease-in-out -4s infinite normal none running glass-float-2; transform: translate(0px, 0px); will-change: transform; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);"></div>
			<div class="absolute rounded-full"
			     style="width: 140px; height: 140px; left: 55%; top: 5%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.15), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 12s ease-in-out -8s infinite normal none running glass-float-3; transform: translate(0px, 0px); will-change: transform; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);"></div>
			<div class="absolute rounded-full"
			     style="width: 240px; height: 240px; left: 20%; top: 65%; background: radial-gradient(circle at 30% 30%, rgba(54, 109, 176, 0.16), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 15s ease-in-out -2s infinite normal none running glass-float-4; transform: translate(0px, 0px); will-change: transform; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);"></div>
			<div class="absolute rounded-full"
			     style="width: 110px; height: 110px; left: 82%; top: 25%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.19), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 11s ease-in-out -6s infinite normal none running glass-float-1; transform: translate(0px, 0px); will-change: transform; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);"></div>
		</div>
		<div class="reveal container-x max-w-7xl mx-auto relative in">
			<nav class="flex items-center gap-2 text-xs font-medium text-muted-foreground mb-10">
				<a href="<?php echo esc_url(home_url('/')); ?>"
				   class="hover:text-primary transition-colors"><?php esc_html_e('Home', 'arqamweb'); ?></a>
				<span>/</span>
				<span class="text-foreground"><?php esc_html_e('Journal', 'arqamweb'); ?></span>
			</nav>
			<div class="grid lg:grid-cols-12 gap-10 items-end">
				<div class="lg:col-span-8">
					<div class="text-[11px] font-semibold tracking-[0.3em] uppercase text-primary mb-6">
						<?php esc_html_e('Issue', 'arqamweb'); ?> <?php echo esc_html($issue_number); ?> &middot; <?php esc_html_e('Field Notes', 'arqamweb'); ?>
					</div>
					<h1 class="text-5xl md:text-7xl lg:text-[5.5rem] font-semibold tracking-tight leading-[0.95]"><?php esc_html_e('The', 'arqamweb'); ?>
						<span class="italic font-light"><?php esc_html_e('Journal', 'arqamweb'); ?></span>.<br><?php esc_html_e('Ideas worth', 'arqamweb'); ?> <span class="text-gradient"><?php esc_html_e('building on.', 'arqamweb'); ?></span>
					</h1>
				</div>
				<div class="lg:col-span-4">
					<p class="text-lg text-muted-foreground leading-relaxed max-w-md"><?php esc_html_e('Essays, breakdowns and field reports from the studio — on design that converts, SEO that compounds, and brands that age well.', 'arqamweb'); ?></p>
					<div class="mt-6 flex items-center gap-4 text-xs uppercase tracking-[0.2em] text-muted-foreground">
						<span><?php echo esc_html($total_posts); ?><?php esc_html_e('essays', 'arqamweb'); ?></span>
						<span class="w-1 h-1 rounded-full bg-muted-foreground/50"></span>
						<span><?php esc_html_e('Weekly', 'arqamweb'); ?></span>
						<span class="w-1 h-1 rounded-full bg-muted-foreground/50"></span>
						<span>EN / AR</span>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ── Featured story ─────────────────────────────────────────────────── -->
	<?php if ($featured_data) : ?>
		<section class="py-16 lg:py-24 border-t border-border/60">
			<div class="container-x max-w-7xl mx-auto">
				<div class="flex items-end justify-between mb-8">
					<div class="text-xs font-semibold tracking-[0.3em] uppercase text-muted-foreground">
						— <?php esc_html_e('Featured story', 'arqamweb'); ?></div>
					<div
						class="hidden md:block text-xs text-muted-foreground"><?php echo esc_html($featured_data['date']); ?></div>
				</div>
				<a href="<?php echo esc_url($featured_data['url']); ?>"
				   class="reveal group grid lg:grid-cols-12 gap-8 lg:gap-12 items-center in">
					<div
						class="lg:col-span-7 relative overflow-hidden rounded-3xl border border-border bg-card shadow-elevated">
						<div class="aspect-[16/10] overflow-hidden">
							<?php if ($featured_data['thumb_id']) : ?>
								<?php echo wp_get_attachment_image($featured_data['thumb_id'], 'arqam-hero', false, [
									'class' => 'w-full h-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.06]',
									'loading' => 'lazy',
									'decoding' => 'async',
								]); ?>
							<?php else : ?>
								<div class="w-full h-full bg-gradient-to-br from-primary/20 to-surface"></div>
							<?php endif; ?>
						</div>
						<div
							class="absolute inset-0 bg-gradient-to-tr from-primary/0 via-primary/0 to-primary/0 group-hover:from-primary/20 transition-colors duration-700 pointer-events-none"></div>
						<div
							class="absolute top-5 left-5 inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-[11px] font-semibold bg-background/90 backdrop-blur border border-border">
							<span class="w-1.5 h-1.5 rounded-full bg-primary pulse-green"></span>
							<?php echo esc_html($featured_data['cat']); ?>
						</div>
					</div>
					<div class="lg:col-span-5">
						<div class="text-xs uppercase tracking-[0.2em] text-muted-foreground mb-4">
							<?php echo esc_html($featured_data['read_time']); ?> read &middot;
							By <?php echo esc_html($featured_data['author']); ?>
						</div>
						<h2 class="text-3xl md:text-4xl lg:text-5xl font-semibold tracking-tight leading-[1.05] group-hover:text-primary transition-colors duration-500">
							<?php echo esc_html($featured_data['title']); ?>
						</h2>
						<p class="mt-5 text-base lg:text-lg text-muted-foreground leading-relaxed">
							<?php echo esc_html($featured_data['excerpt']); ?>
						</p>
						<div class="mt-7 inline-flex items-center gap-2 text-sm font-semibold text-primary">
							<?php esc_html_e('Read the essay', 'arqamweb'); ?>
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
							     stroke-width="2.5" class="transition-transform duration-300 group-hover:translate-x-1">
								<path d="M5 12h14M13 5l7 7-7 7"></path>
							</svg>
						</div>
					</div>
				</a>
			</div>
		</section>
	<?php endif; ?>

	<!-- ── Library grid ───────────────────────────────────────────────────── -->
	<section id="grid" class="relative py-24 lg:py-32 bg-surface border-t border-border/60">
		<div class="container-x max-w-7xl mx-auto">
			<div class="reveal max-w-3xl mb-12 in">
				<div class="text-xs font-semibold tracking-[0.3em] uppercase text-primary mb-4">
					— <?php esc_html_e('The library', 'arqamweb'); ?></div>
				<h2 class="text-4xl lg:text-5xl font-semibold tracking-tight"><?php esc_html_e('Latest from the', 'arqamweb'); ?>
					<span class="text-gradient"><?php esc_html_e('studio.', 'arqamweb'); ?></span></h2>
				<p class="mt-4 text-muted-foreground text-lg leading-relaxed"><?php esc_html_e('A growing archive of essays, teardowns and frameworks from fifteen years of shipping high-performance digital work.', 'arqamweb'); ?></p>
			</div>

			<!-- Category filter tabs -->
			<div class="relative mb-12 -mx-2 px-2 overflow-x-auto no-scrollbar">
				<div class="inline-flex items-center gap-2 p-1.5 rounded-full bg-card border border-border shadow-soft">
					<a href="<?php echo esc_url(get_post_type_archive_link('post') ?: home_url('/')); ?>"
					   class="relative px-5 py-2.5 rounded-full text-sm font-medium transition-all duration-300 text-primary-foreground">
						<span class="absolute inset-0 rounded-full bg-gradient-primary shadow-glow"></span>
						<span class="relative"><?php esc_html_e('All', 'arqamweb'); ?></span>
					</a>
					<?php foreach ($nav_cats as $nav_cat) : ?>
						<a href="<?php echo esc_url(get_category_link($nav_cat->term_id)); ?>"
						   class="relative px-5 py-2.5 rounded-full text-sm font-medium transition-all duration-300 text-muted-foreground hover:text-foreground">
							<span class="relative"><?php echo esc_html($nav_cat->name); ?></span>
						</a>
					<?php endforeach; ?>
				</div>
			</div>

			<!-- Grid -->
			<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-7">
				<?php
				$loop_index = 0;
				while ($grid_q->have_posts()) :
					$grid_q->the_post();
					$gid = get_the_ID();
					$layout = $grid_layouts[$loop_index] ?? $grid_layouts[0];
					$gthumb_id = get_post_thumbnail_id($gid);
					$gcats = get_the_category($gid);
					$gcat = !empty($gcats) ? esc_html($gcats[0]->name) : 'General';
					$gsticky = in_array($gid, get_option('sticky_posts', []), true);
					$gtime = $read_time_fn($gid);
					?>
					<a href="<?php the_permalink(); ?>"
					   class="reveal group relative h-full flex flex-col rounded-3xl border border-border bg-card overflow-hidden shadow-card hover:shadow-elevated transition-all duration-500 hover:-translate-y-1 in"
					   style="transition-delay: <?php echo esc_attr($layout['delay']); ?>">
						<div aria-hidden="true"
						     class="pointer-events-none absolute -inset-20 opacity-0 group-hover:opacity-100 transition-opacity duration-700"
						     style="background: radial-gradient(40% 40% at 50% 0%, color-mix(in oklab, var(--primary) 35%, transparent), transparent 70%);"></div>
						<div class="relative <?php echo esc_attr($layout['aspect']); ?> overflow-hidden">
							<?php if ($gthumb_id) : ?>
								<?php echo wp_get_attachment_image($gthumb_id, 'arqam-card', false, [
									'class' => 'w-full h-full object-cover transition-transform duration-[1200ms] ease-out group-hover:scale-[1.08]',
									'loading' => 'lazy',
									'decoding' => 'async',
								]); ?>
							<?php else : ?>
								<div class="w-full h-full bg-gradient-to-br from-primary/20 to-surface"></div>
							<?php endif; ?>
							<div
								class="absolute inset-0 bg-gradient-to-t from-background/80 via-background/0 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
							<div class="absolute top-4 left-4 flex items-center gap-2">
								<span
									class="inline-flex items-center px-3 py-1.5 rounded-full text-[11px] font-semibold bg-background/90 backdrop-blur text-foreground border border-border">
									<?php echo esc_html($gcat); ?>
								</span>
								<?php if ($gsticky) : ?>
									<span
										class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-[11px] font-semibold bg-primary/10 text-primary border border-primary/20">
										<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
										<?php esc_html_e('Trending', 'arqamweb'); ?>
									</span>
								<?php endif; ?>
							</div>
							<div aria-hidden="true"
							     class="absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-[1400ms] ease-out"
							     style="background: linear-gradient(110deg, transparent 30%, color-mix(white 25%, transparent) 50%, transparent 70%);">
							</div>
						</div>
						<div class="p-6 lg:p-7 flex flex-col flex-1">
							<div class="text-xs text-muted-foreground flex items-center gap-2">
								<span><?php echo esc_html(get_the_date('M Y')); ?></span>
								<span class="w-1 h-1 rounded-full bg-muted-foreground/50"></span>
								<span><?php echo esc_html($gtime); ?></span>
							</div>
							<h3 class="mt-3 text-xl lg:text-2xl font-semibold leading-snug tracking-tight group-hover:text-primary transition-colors duration-300">
								<?php the_title(); ?>
							</h3>
							<p class="mt-3 text-sm text-muted-foreground leading-relaxed line-clamp-2">
								<?php echo esc_html(get_the_excerpt()); ?>
							</p>
							<div class="mt-auto pt-5 flex items-center justify-between gap-4">
								<span class="text-xs uppercase tracking-[0.15em] text-muted-foreground">
									<?php esc_html_e('By', 'arqamweb'); ?><?php the_author(); ?>
								</span>
								<span
									class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary transition-transform duration-300 group-hover:translate-x-1">
									<?php esc_html_e('Read', 'arqamweb'); ?>
									<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
									     stroke-width="2.5">
										<path d="M5 12h14M13 5l7 7-7 7"></path>
									</svg>
								</span>
							</div>
						</div>
					</a>
					<?php
					$loop_index++;
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</section>

	<!-- ── Trending this month ────────────────────────────────────────────── -->
	<section class="py-24 lg:py-32 border-t border-border/60">
		<div class="reveal container-x max-w-7xl mx-auto in">
			<div class="flex items-end justify-between mb-10">
				<div>
					<div class="text-xs font-semibold tracking-[0.3em] uppercase text-primary mb-3">
						— <?php esc_html_e('Trending this month', 'arqamweb'); ?></div>
					<h2 class="text-3xl lg:text-5xl font-semibold tracking-tight"><?php esc_html_e('What the studio is', 'arqamweb'); ?>
						<span class="italic font-light"><?php esc_html_e('reading.', 'arqamweb'); ?></span></h2>
				</div>
			</div>
			<ol class="divide-y divide-border border-y border-border">
				<?php
				$trend_index = 1;
				while ($trending_q->have_posts()) :
					$trending_q->the_post();
					$tid = get_the_ID();
					$tcats = get_the_category($tid);
					$tcat = !empty($tcats) ? esc_html($tcats[0]->name) : 'General';
					$ttime = $read_time_fn($tid);
					$tthumb_id = get_post_thumbnail_id($tid);
					?>
					<li>
						<a href="<?php the_permalink(); ?>"
						   class="group grid grid-cols-12 gap-6 items-center py-7 lg:py-9 hover:bg-surface/60 transition-colors duration-300 -mx-4 px-4 rounded-2xl">
							<div
								class="col-span-2 lg:col-span-1 text-2xl lg:text-4xl font-light text-muted-foreground group-hover:text-primary transition-colors">
								<?php echo esc_html(str_pad($trend_index, 2, '0', STR_PAD_LEFT)); ?>
							</div>
							<div class="col-span-7 lg:col-span-8">
								<div class="text-[11px] uppercase tracking-[0.2em] text-muted-foreground mb-2">
									<?php echo esc_html($tcat); ?> &middot; <?php echo esc_html($ttime); ?>
								</div>
								<h3 class="text-xl lg:text-2xl font-semibold tracking-tight leading-snug group-hover:text-primary transition-colors">
									<?php the_title(); ?>
								</h3>
							</div>
							<div class="col-span-3 lg:col-span-3 flex justify-end">
								<div class="w-20 h-20 lg:w-28 lg:h-28 rounded-2xl overflow-hidden border border-border">
									<?php if ($tthumb_id) : ?>
										<?php echo wp_get_attachment_image($tthumb_id, 'arqam-card-related', false, [
											'class' => 'w-full h-full object-cover transition-transform duration-700 group-hover:scale-110',
											'loading' => 'lazy',
											'decoding' => 'async',
										]); ?>
									<?php else : ?>
										<div class="w-full h-full bg-gradient-to-br from-primary/20 to-surface"></div>
									<?php endif; ?>
								</div>
							</div>
						</a>
					</li>
					<?php
					$trend_index++;
				endwhile;
				wp_reset_postdata();
				?>
			</ol>
		</div>
	</section>

	<!-- ── Newsletter dispatch ────────────────────────────────────────────── -->
	<section class="py-24 lg:py-32 bg-surface border-t border-border/60">
		<div class="reveal container-x max-w-5xl mx-auto in">
			<div
				class="relative overflow-hidden rounded-[2rem] border border-border bg-gradient-dark text-white p-10 lg:p-16 shadow-elevated">
				<div class="absolute -top-32 -right-32 w-[28rem] h-[28rem] rounded-full bg-primary/30 blur-3xl"
				     aria-hidden="true"></div>
				<div class="absolute -bottom-40 -left-20 w-[24rem] h-[24rem] rounded-full bg-primary-deep/40 blur-3xl"
				     aria-hidden="true"></div>
				<div class="relative grid lg:grid-cols-12 gap-10 items-center">
					<div class="lg:col-span-7">
						<div class="text-[11px] font-semibold tracking-[0.3em] uppercase text-white/60 mb-4">
							— <?php esc_html_e('The dispatch', 'arqamweb'); ?></div>
						<h2 class="text-3xl lg:text-5xl font-semibold tracking-tight leading-[1.05]">
							<?php esc_html_e('One essay. Every Sunday.', 'arqamweb'); ?><br>
							<span
								class="text-white/70 font-light italic"><?php esc_html_e('Nothing else.', 'arqamweb'); ?></span>
						</h2>
						<p class="mt-5 text-white/70 text-base lg:text-lg leading-relaxed max-w-lg">
							<?php esc_html_e('Join 8,400+ founders, designers and operators reading the quietest, sharpest newsletter on digital craft.', 'arqamweb'); ?>
						</p>
					</div>
					<div class="lg:col-span-5">
						<form class="flex flex-col gap-3">
							<div
								class="flex items-center gap-2 p-1.5 rounded-full bg-white/10 border border-white/15 backdrop-blur-xl">
								<input required
								       placeholder="<?php esc_attr_e('you@studio.com', 'arqamweb'); ?>"
								       class="flex-1 bg-transparent px-5 py-3 text-white placeholder:text-white/40 focus:outline-none text-sm"
								       type="email" value="">
								<button type="submit"
								        class="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-white text-foreground text-sm font-semibold hover:bg-white/90 transition-colors">
									<?php esc_html_e('Subscribe', 'arqamweb'); ?>
								</button>
							</div>
							<p class="text-xs text-white/50 px-2">
								<?php esc_html_e('No spam. Unsubscribe in one click. Read by teams at Aramco, Noon and STC.', 'arqamweb'); ?>
							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ── CTA ───────────────────────────────────────────────────────────── -->
	<section class="py-28 lg:py-40 border-t border-border/60 relative overflow-hidden">
		<div class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
			<div class="absolute inset-0 opacity-[0.08]"
			     style="background: radial-gradient(80% 60% at 20% 40%, rgb(57, 158, 208) 0%, transparent 70%), radial-gradient(60% 50% at 80% 30%, rgb(54, 109, 176) 0%, transparent 70%);"></div>
			<div class="absolute rounded-full"
			     style="width: 280px; height: 280px; left: 5%; top: 10%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.18), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 14s ease-in-out 0s infinite normal none running glass-float-1; transform: translate(0px, 0px); will-change: transform; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);"></div>
			<div class="absolute rounded-full"
			     style="width: 200px; height: 200px; left: 70%; top: 55%; background: radial-gradient(circle at 30% 30%, rgba(54, 109, 176, 0.2), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 16s ease-in-out -4s infinite normal none running glass-float-2; transform: translate(0px, 0px); will-change: transform; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);"></div>
			<div class="absolute rounded-full"
			     style="width: 140px; height: 140px; left: 55%; top: 5%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.15), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 12s ease-in-out -8s infinite normal none running glass-float-3; transform: translate(0px, 0px); will-change: transform; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);"></div>
			<div class="absolute rounded-full"
			     style="width: 240px; height: 240px; left: 20%; top: 65%; background: radial-gradient(circle at 30% 30%, rgba(54, 109, 176, 0.16), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 15s ease-in-out -2s infinite normal none running glass-float-4; transform: translate(0px, 0px); will-change: transform; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);"></div>
			<div class="absolute rounded-full"
			     style="width: 110px; height: 110px; left: 82%; top: 25%; background: radial-gradient(circle at 30% 30%, rgba(57, 158, 208, 0.19), rgba(57, 158, 208, 0.03) 60%, transparent 80%); border: 1px solid rgba(57, 158, 208, 0.12); backdrop-filter: blur(6px); box-shadow: rgba(172, 215, 236, 0.08) 0px 0px 40px inset, rgba(57, 158, 208, 0.06) 0px 0px 60px; animation: 11s ease-in-out -6s infinite normal none running glass-float-1; transform: translate(0px, 0px); will-change: transform; transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);"></div>
		</div>
		<div class="reveal container-x max-w-5xl mx-auto text-center relative in">
			<div class="text-xs font-semibold tracking-[0.3em] uppercase text-primary mb-6">
				— <?php esc_html_e('Beyond the essay', 'arqamweb'); ?></div>
			<h2 class="text-4xl md:text-6xl lg:text-7xl font-semibold tracking-tight leading-[1.02]">
				<?php esc_html_e('Ideas are easy.', 'arqamweb'); ?><br>
				<span
					class="text-gradient italic font-light"><?php esc_html_e('Execution is the craft.', 'arqamweb'); ?></span>
			</h2>
			<p class="mt-7 text-lg text-muted-foreground max-w-2xl mx-auto leading-relaxed">
				<?php esc_html_e('If something here sparked an idea for your brand, let\'s turn it into a system that ships, ranks and converts.', 'arqamweb'); ?>
			</p>
			<div class="mt-10 flex flex-col sm:flex-row gap-4 items-center justify-center">
				<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_QUOTE_PAGE_SLUG)); ?>"
				   class="inline-flex items-center gap-2 px-8 py-4 rounded-full bg-gradient-primary text-primary-foreground font-semibold shadow-glow hover:scale-[1.02] transition-transform">
					<?php esc_html_e('Start a project', 'arqamweb'); ?>
					<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
					     stroke-width="2.5">
						<path d="M5 12h14M13 5l7 7-7 7"></path>
					</svg>
				</a>
				<a href="<?php echo esc_url(arqamweb_get_page_permalink(ARQAM_PROJECTS_PAGE_SLUG)); ?>"
				   class="inline-flex items-center gap-2 px-8 py-4 rounded-full border border-border bg-card font-semibold hover:bg-surface transition-colors">
					<?php esc_html_e('View our projects', 'arqamweb'); ?>
				</a>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
