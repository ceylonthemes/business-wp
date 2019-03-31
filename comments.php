<?php
/**
 * The template for displaying comments
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 * @package the-business-wp
 * @since 1.0
 *
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
	?>
		<h2 class="comments-title">
			<?php
			$the_business_wp_cnumber = get_comments_number();
			if ( '1' === $the_business_wp_cnumber ) {
				/* translators: %s: post title */
				printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'the-business-wp' ), esc_html(get_the_title()) );
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					_nx(
						'%1$s Reply to &ldquo;%2$s&rdquo;',
						'%1$s Replies to &ldquo;%2$s&rdquo;',
						$the_business_wp_cnumber,
						'comments title',
						'the-business-wp'
					),
					number_format_i18n( $the_business_wp_cnumber ),
					esc_html(get_the_title())
				);
			}
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments(
					array(
						'avatar_size' => 100,
						'style'       => 'ol',
						'short_ping'  => true,
						'reply_text'  => '<i class="fa fa-mail-reply" aria-hidden="true" >&nbsp;&nbsp;</i>'. __( 'Reply', 'the-business-wp' ),
					)
				);
			?>
		</ol>

		<?php
		the_comments_pagination(
			array(
						'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'the-business-wp' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'the-business-wp' ) . '</span> <span class="nav-title"><span>' . '<i class="fa fa-arrow-left" aria-hidden="true" ></i>' . '<span class="nav-title nav-margin-left" >%title</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'the-business-wp' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'the-business-wp' ) . '</span> <span class="nav-title">%title<span class="nav-margin-right"></span>' . '<i class="fa fa-arrow-right" aria-hidden="true"></i>'  . '</span>',
			)
		);

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'the-business-wp' ); ?></p>
	<?php
	endif;

	comment_form();
	?>

</div><!-- #comments -->
