<?php
/**
 * Template Name: Blog-Page
 * The template for displaying blog pages
 *
 * @package the-business-wp
 * @since 1.0

 */

get_header();

//get settings
global $the_business_wp_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $the_business_wp_settings = new the_business_wp_settings();
   $the_business_wp_option = wp_parse_args(  get_option( 'the_business_wp_option', array() ) , $the_business_wp_settings->default_data());  
}

?>
<div class="container background">

	<?php if ( have_posts() ) : ?>
	<?php endif; ?>
    <div class="row">
		<?php if($the_business_wp_option['blog_sidebar_position']=='left'): ?>
		<div class="col-md-4 col-sm-4 floateleft" > 
		<?php get_sidebar(); ?>
		</div>
	<?php endif; ?>
	<div id="primary" class="col-md-8 col-sm-8 content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) :
		?>
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				if ( is_archive() ) {
				    
					get_template_part( 'template-parts/post/content', 'excerpt' );
					
				} else {
					
					get_template_part( 'template-parts/post/content', get_post_format() );
					
				}
			endwhile;

			the_posts_pagination(
				array(
				'mid_size' => 0,
					'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'the-business-wp' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'the-business-wp' ) . '</span> <span class="nav-title"><span>' . '<i class="fa fa-arrow-left" aria-hidden="true" ></i>' . '<span class="nav-title nav-margin-left" >'.__( 'View', 'the-business-wp' ).'</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'the-business-wp' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'the-business-wp' ) . '</span> <span class="nav-title">'.__( 'View', 'the-business-wp' ).'<span class="nav-margin-right"></span>' . '<i class="fa fa-arrow-right" aria-hidden="true"></i>'  . '</span>',
					
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