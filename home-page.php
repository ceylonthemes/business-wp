<?php
/*  
Template Name:Home-Page
Home page template the site
*/

get_header();

//get options
global $the_business_wp_option;	 
if ( class_exists( 'WP_Customize_Control' ) ) {
   $the_business_wp_settings = new the_business_wp_settings();
   $the_business_wp_option = wp_parse_args(  get_option( 'the_business_wp_option', array() ) , $the_business_wp_settings->default_data());  
} 
?>
<main id="main" class="site-main" role="main">
<?php

if(($the_business_wp_option['home_featured_area_0'])!='none'){
	the_business_wp_featured_area($the_business_wp_option['home_featured_area_0']);
}

if(($the_business_wp_option['home_featured_area_1'])!='none'){
	the_business_wp_featured_area($the_business_wp_option['home_featured_area_1']);
}

if(($the_business_wp_option['home_featured_area_2'])!='none'){
	the_business_wp_featured_area($the_business_wp_option['home_featured_area_2']);
}

if(($the_business_wp_option['home_featured_area_3'])!='none'){
	the_business_wp_featured_area($the_business_wp_option['home_featured_area_3']);
}

if(($the_business_wp_option['home_featured_area_4'])!='none'){
	the_business_wp_featured_area($the_business_wp_option['home_featured_area_4']);
}

if(($the_business_wp_option['home_featured_area_5'])!='none'){
	the_business_wp_featured_area($the_business_wp_option['home_featured_area_5']);
}

if(($the_business_wp_option['home_featured_area_6'])!='none'){
	the_business_wp_featured_area($the_business_wp_option['home_featured_area_6']);
}
?>

</main>
<!-- #main -->
<?php 
get_footer();
