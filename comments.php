<?php
/**
 * Comments template.
 *
 * @package Arqam-Web
 */

if ( post_password_required() ) {
	return;
}

// ── Custom comment renderer ───────────────────────────────────────────────
function arqam_comment_callback( $comment, $args, $depth ) {
	$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
	?>
	<<?php echo esc_attr( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( 'not-prose', $comment ); ?>>

		<article class="flex gap-4 p-5 rounded-2xl border border-border bg-card">

			<!-- Avatar -->
			<div class="flex-shrink-0">
				<?php echo get_avatar( $comment, 40, '', esc_attr( get_comment_author( $comment ) ), [
					'class' => 'rounded-xl w-10 h-10 object-cover border border-border',
				] ); ?>
			</div>

			<!-- Body -->
			<div class="flex-1 min-w-0">

				<!-- Meta row -->
				<div class="flex items-center justify-between gap-3 flex-wrap mb-3">
					<div class="flex items-center gap-2">
						<span class="font-semibold text-sm text-foreground">
							<?php comment_author(); ?>
						</span>
						<?php if ( comment_author_url() ) : ?>
						<a href="<?php comment_author_url(); ?>"
						   target="_blank" rel="noopener noreferrer nofollow"
						   class="text-[10px] uppercase tracking-[0.15em] text-primary hover:opacity-70 transition-opacity">
							<?php esc_html_e( 'Website', 'arqamweb' ); ?>
						</a>
						<?php endif; ?>
					</div>
					<time datetime="<?php comment_date( 'c' ); ?>"
					      class="text-xs text-muted-foreground flex-shrink-0">
						<?php comment_date( 'M j, Y' ); ?>
					</time>
				</div>

				<!-- Moderation notice -->
				<?php if ( '0' === $comment->comment_approved ) : ?>
				<p class="text-xs text-muted-foreground italic mb-3">
					<?php esc_html_e( 'Your comment is awaiting moderation.', 'arqamweb' ); ?>
				</p>
				<?php endif; ?>

				<!-- Text -->
				<div class="text-sm text-muted-foreground leading-relaxed [&>p]:mb-2 [&>p:last-child]:mb-0">
					<?php comment_text(); ?>
				</div>

				<!-- Reply link -->
				<?php if ( $args['max_depth'] > 1 && $depth < $args['max_depth'] ) : ?>
				<div class="mt-3">
					<?php comment_reply_link( array_merge( $args, [
						'depth'      => $depth,
						'max_depth'  => $args['max_depth'],
						'reply_text' => '<span class="inline-flex items-center gap-1 text-xs font-semibold text-primary hover:opacity-70 transition-opacity">↩ ' . esc_html__( 'Reply', 'arqamweb' ) . '</span>',
						'before'     => '',
						'after'      => '',
					] ) ); ?>
				</div>
				<?php endif; ?>

			</div>
		</article>

	<?php
}
?>

<section id="comments" class="mt-16 pt-12 border-t border-border/60">

	<!-- ── Comment count header ──────────────────────────────────────────── -->
	<?php if ( have_comments() ) : ?>

	<div class="flex items-center justify-between gap-4 mb-8">
		<h2 class="text-2xl font-semibold tracking-tight">
			<?php
			$count = get_comments_number();
			printf(
				esc_html( _n( '%s response', '%s responses', $count, 'arqamweb' ) ),
				'<span class="text-primary">' . number_format_i18n( $count ) . '</span>'
			);
			?>
		</h2>

		<!-- Pagination (top) -->
		<?php if ( get_comment_pages_count() > 1 ) : ?>
		<div class="text-xs text-muted-foreground">
			<?php
			printf(
				/* translators: 1: current page, 2: total pages */
				esc_html__( 'Page %1$s of %2$s', 'arqamweb' ),
				get_query_var( 'cpage' ) ?: 1,
				get_comment_pages_count()
			);
			?>
		</div>
		<?php endif; ?>
	</div>

	<!-- ── Comments list ─────────────────────────────────────────────────── -->
	<ol class="comment-list space-y-4 list-none p-0 m-0">
		<?php
		wp_list_comments( [
			'style'      => 'ol',
			'short_ping' => true,
			'callback'   => 'arqam_comment_callback',
			'avatar_size' => 40,
		] );
		?>
	</ol>

	<!-- Pagination (bottom) -->
	<?php
	$comments_pagination = paginate_comments_links( [
		'prev_text' => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 12H5M11 5l-7 7 7 7"/></svg>',
		'next_text' => '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 5l7 7-7 7"/></svg>',
		'echo'      => false,
		'type'      => 'array',
	] );
	if ( $comments_pagination ) : ?>
	<nav class="mt-8 flex items-center justify-center gap-2" aria-label="<?php esc_attr_e( 'Comments navigation', 'arqamweb' ); ?>">
		<?php foreach ( $comments_pagination as $link ) :
			$is_current = strpos( $link, 'current' ) !== false;
			if ( $is_current ) : ?>
				<span class="relative inline-flex items-center justify-center w-9 h-9 rounded-full text-sm font-medium text-primary-foreground">
					<span class="absolute inset-0 rounded-full bg-gradient-primary shadow-glow"></span>
					<span class="relative"><?php echo wp_kses_post( strip_tags( $link, '<span>' ) ); ?></span>
				</span>
			<?php else : ?>
				<span class="[&>a]:inline-flex [&>a]:items-center [&>a]:justify-center [&>a]:w-9 [&>a]:h-9 [&>a]:rounded-full [&>a]:text-sm [&>a]:font-medium [&>a]:border [&>a]:border-border [&>a]:bg-card [&>a]:text-muted-foreground [&>a]:hover:text-foreground [&>a]:hover:border-primary/40 [&>a]:transition-colors">
					<?php echo wp_kses_post( $link ); ?>
				</span>
			<?php endif;
		endforeach; ?>
	</nav>
	<?php endif; ?>

	<!-- Comments closed notice -->
	<?php if ( ! comments_open() ) : ?>
	<p class="mt-8 text-sm text-muted-foreground text-center py-4 rounded-2xl border border-border bg-surface">
		<?php esc_html_e( 'Comments are closed.', 'arqamweb' ); ?>
	</p>
	<?php endif; ?>

	<?php endif; // have_comments() ?>

	<!-- ── Comment form ──────────────────────────────────────────────────── -->
	<?php
	$input_class    = 'w-full px-4 py-3 rounded-2xl bg-surface border border-border text-sm text-foreground placeholder:text-muted-foreground focus:outline-none focus:border-primary/50 transition-colors';
	$label_class    = 'block text-xs font-semibold uppercase tracking-[0.15em] text-muted-foreground mb-2';
	$required_star  = ' <span class="text-primary" aria-hidden="true">*</span>';

	comment_form( [
		'title_reply_before'   => '<h3 id="reply-title" class="text-2xl font-semibold tracking-tight mt-12 mb-8">',
		'title_reply_after'    => '</h3>',
		'title_reply'          => esc_html__( 'Leave a reply', 'arqamweb' ),
		'title_reply_to'       => esc_html__( 'Reply to %s', 'arqamweb' ),
		'cancel_reply_before'  => ' <span class="text-muted-foreground text-sm">—</span> ',
		'cancel_reply_link'    => esc_html__( 'Cancel reply', 'arqamweb' ),
		'comment_notes_before' => '',
		'comment_notes_after'  => '',
		'class_form'           => 'space-y-0',
		'fields'               => [
			'author'  => sprintf(
				'<div class="grid sm:grid-cols-2 gap-4 mt-0"><div><label for="author" class="%s">%s%s</label><input id="author" name="author" type="text" required autocomplete="name" placeholder="%s" class="%s"></div>',
				esc_attr( $label_class ),
				esc_html__( 'Name', 'arqamweb' ),
				$required_star,
				esc_attr__( 'Your name', 'arqamweb' ),
				esc_attr( $input_class )
			),
			'email'   => sprintf(
				'<div><label for="email" class="%s">%s%s</label><input id="email" name="email" type="email" required autocomplete="email" placeholder="%s" class="%s"></div></div>',
				esc_attr( $label_class ),
				esc_html__( 'Email', 'arqamweb' ),
				$required_star,
				esc_attr__( 'your@email.com', 'arqamweb' ),
				esc_attr( $input_class )
			),
			'url'     => sprintf(
				'<div class="mt-4"><label for="url" class="%s">%s</label><input id="url" name="url" type="url" autocomplete="url" placeholder="%s" class="%s"></div>',
				esc_attr( $label_class ),
				esc_html__( 'Website (optional)', 'arqamweb' ),
				esc_attr__( 'https://', 'arqamweb' ),
				esc_attr( $input_class )
			),
			'cookies' => sprintf(
				'<div class="mt-4 flex items-start gap-3"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes" class="mt-0.5 w-4 h-4 rounded border-border text-primary accent-primary"><label for="wp-comment-cookies-consent" class="text-xs text-muted-foreground leading-relaxed">%s</label></div>',
				esc_html__( 'Save my name and email in this browser for the next time I comment.', 'arqamweb' )
			),
		],
		'comment_field'        => sprintf(
			'<div class="mt-4"><label for="comment" class="%s">%s%s</label><textarea id="comment" name="comment" rows="5" required placeholder="%s" class="%s" style="resize:none;"></textarea></div>',
			esc_attr( $label_class ),
			esc_html__( 'Comment', 'arqamweb' ),
			$required_star,
			esc_attr__( 'Share your thoughts…', 'arqamweb' ),
			esc_attr( $input_class )
		),
		'submit_button'        => '<button type="%1$s" id="%2$s" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-full bg-gradient-primary text-primary-foreground font-semibold shadow-glow hover:opacity-90 active:scale-[0.97] transition-all text-sm">%4$s <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 5l7 7-7 7"/></svg></button>',
		'submit_field'         => '<div class="mt-6">%1$s %2$s</div>',
		'label_submit'         => esc_html__( 'Post comment', 'arqamweb' ),
		'logged_in_as'         => sprintf(
			'<p class="mb-6 text-sm text-muted-foreground">%s <a href="%s" class="text-primary hover:opacity-70 transition-opacity">%s</a></p>',
			sprintf( esc_html__( 'Logged in as %s.', 'arqamweb' ), '<strong>' . esc_html( wp_get_current_user()->display_name ) . '</strong>' ),
			esc_url( wp_logout_url( get_permalink() ) ),
			esc_html__( 'Log out?', 'arqamweb' )
		),
		'must_log_in'          => sprintf(
			'<p class="text-sm text-muted-foreground">%s <a href="%s" class="text-primary hover:opacity-70 transition-opacity">%s</a>.</p>',
			esc_html__( 'You must be', 'arqamweb' ),
			esc_url( wp_login_url( get_permalink() ) ),
			esc_html__( 'logged in to post a comment', 'arqamweb' )
		),
	] );
	?>

</section>
