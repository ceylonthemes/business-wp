<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package the-business-wp
 * @since 1.0

 */
//get default options
global $the_business_wp_option;
get_header(); 
?>

<div class="container background">
   <div class="row">
	<div id="primary" class="col-md-8 col-sm-8 content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/page/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main --> 

	</div><!-- #primary -->
	<div class="col-md-4 col-sm-4 floateright" > 
	<?php get_sidebar(); ?>
	</div>
  </div>		
</div><!-- .container -->

<?php
get_footer();