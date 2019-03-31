<?php
/**
 * The main template file
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package the-business-wp
 * @since 1.0
 */

get_header(); 
//get options
global $the_business_wp_option;	 
if ( class_exists( 'WP_Customize_Control' ) ) {
   $the_business_wp_settings = new the_business_wp_settings();
   $the_business_wp_option = wp_parse_args(  get_option( 'the_business_wp_option', array() ) , $the_business_wp_settings->default_data());  
}
?>

<div class="container background"  >
    <div class="row">
		<?php if($the_business_wp_option['blog_sidebar_position']=='left'): ?>
		<div class="col-md-4 col-sm-4 floateleft"> 
		<?php get_sidebar(); ?>
		</div>
		<?php endif; ?>	
	<div id="primary" class="col-sm-8 content-area">
		<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/post/content', get_post_format() );

				endwhile;

				the_posts_pagination(
					array(
						'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'the-business-wp' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'the-business-wp' ) . '</span> <span class="nav-title"><span>' . '<i class="fa fa-arrow-left" aria-hidden="true" ></i>' . '<span class="nav-title nav-margin-left">'.__( 'View', 'the-business-wp' ).'</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'the-business-wp' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'the-business-wp' ) . '</span> <span class="nav-title">'.__( 'View', 'the-business-wp' ).'<span class="nav-margin-right"></span>' . '<i class="fa fa-arrow-right" aria-hidden="true"></i>'  . '</span>',
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'the-business-wp' ) . ' </span>',
					)
				);

			else :

				get_template_part( 'template-parts/post/content', 'none' );

			endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php if($the_business_wp_option['blog_sidebar_position']=='right'): ?>
		<div class="col-md-4 col-sm-4 floateright" > 
		<?php get_sidebar(); ?>
		</div>
	<?php endif; ?>
	</div>
</div><!-- .container -->

<?php
get_footer();
