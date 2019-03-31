<?php
/**
 * The template for displaying woocomemrce pages
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

		<?php woocommerce_content(); ?>

		</main><!-- #main --> 

	</div><!-- #primary -->

			<div class="col-md-4 col-sm-4" style="float:right"> 
				<?php get_template_part('sidebar','woocommerce'); ?>			
			</div>

  </div>		
</div><!-- .container -->

<?php
get_footer();
