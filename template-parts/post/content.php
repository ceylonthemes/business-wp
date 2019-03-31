<?php
/**
 * Template part for displaying posts
 * @package the-business-wp
 * @since 1.0

 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header">
		<?php
		if ( 'post' === get_post_type() ) {		
			echo '<div class="entry-meta">';

			if ( is_single() ) {
				the_business_wp_posted_on();
			} else {
				echo the_business_wp_time_link();
				the_business_wp_edit_link();
			};
			if ( is_sticky() && is_home() ) :
				echo '&nbsp;'.the_business_wp_get_fo( array( 'icon' => 'thumb-tack' ) );
			endif;			
			echo '</div><!-- .entry-meta -->';
		};

		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} elseif ( is_front_page() && is_home() ) {
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
		?>
	</header><!-- .entry-header -->	
	
		<?php if( has_post_thumbnail() ): ?>
		<div class="post-thumbnail" >
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('full'); ?>
			</a>
		</div><!-- .post-thumbnail -->
		<?php endif; ?>		

	<div class="entry-container">

	
	<div class="entry-content">
		<?php		
		the_content(
			/* translators: %s: Name of current post */
			sprintf(__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'the-business-wp' ),
				esc_html(get_the_title())
			)
		);

		wp_link_pages(
			array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'the-business-wp' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);
		?>
	</div><!-- .entry-content -->
	</div>

	<?php
	if ( is_single() ) {
		the_business_wp_entry_footer();
	}
	?>

</article><!-- #post-## -->
