<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<ul class="comment-list">
			<?php wp_list_comments( 'callback=themerain_list_comments' ); ?>
		</ul>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav class="comments-pagination">
				<?php paginate_comments_links( array( 'prev_text' => '&larr;', 'next_text' => '&rarr;' ) ); ?>
			</nav>
		<?php endif; ?>
	<?php endif; ?>

	<?php
	comment_form( array(
		'title_reply' => '<span>' . esc_html__( 'Leave a Reply', 'themerain' ) . '</span>',
		'title_reply_before' => '<h2 class="comment-reply-title">',
		'title_reply_after' => '</h2>',
		'label_submit' => esc_html__( 'Post', 'themerain' ),
		'comment_notes_before' => ''
	) );
	?>
</div>
