<?php
/**
 * Template Name:About-Page
 * @package the-business-wp
 * @since 1.0

 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container">
			<?php
			while ( have_posts() ) :
				the_post();
            ?>
			
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
						<?php
							the_content();

						?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->

            <?php
			endwhile; // End of the loop.
			?>
			</div><!-- .container -->
			<?php
				//get options
				global $the_business_wp_option;	 
				if ( class_exists( 'WP_Customize_Control' ) ) {
				   $the_business_wp_settings = new the_business_wp_settings();
				   $the_business_wp_option = wp_parse_args(  get_option( 'the_business_wp_option', array() ) , $the_business_wp_settings->default_data());  
				}			
				the_business_wp_featured_area($the_business_wp_option['about_featured_area_1']);
				the_business_wp_featured_area($the_business_wp_option['about_featured_area_2']);
			?>			
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();