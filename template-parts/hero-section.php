<?php
// $the_business_wp_option array declared in functions.php
the_business_wp_hero();
function the_business_wp_hero(){
global $the_business_wp_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $the_business_wp_settings = new the_business_wp_settings();
   $the_business_wp_option = wp_parse_args(  get_option( 'the_business_wp_option', array() ) , $the_business_wp_settings->default_data());  
}

?>
<section id="custom-page" style="background: <?php echo esc_attr( $the_business_wp_option['hero_section_background_color'] ); ?>;">
<div class="svc-section-body section-padding" >
<div class="container">
	 <div class="row">
		<?php if($the_business_wp_option['hero_section_title']!=''): ?>
		<h1 class="section-title text-center"><?php echo esc_html( $the_business_wp_option['hero_section_title'] ); ?></h1>
		<?php endif; ?>	
		<?php if($the_business_wp_option['hero_section_description']!=''): ?>
		<div class="section-desc wow animated fadeInUp"><?php echo  esc_html($the_business_wp_option['hero_section_description']); ?></div>
		<?php endif; ?>

	 </div>
	 
	 <div id="page-content" class="row">

		  <?php
		  if($the_business_wp_option['hero_section_page']!=''){
				$custom_page = $the_business_wp_option['hero_section_page'];
				$args = array( 'post_type' => 'page','ignore_sticky_posts' => 1 , 'post__in' => array($custom_page) );
				$result = new WP_Query($args);
				while ( $result->have_posts() ) :
					$result->the_post();
					the_content();
				endwhile; // End of the loop.
				wp_reset_postdata();
		   }
		  ?>

	 </div>
	  
	<div class="row text-center">
		<?php if($the_business_wp_option['hero_section_url']!=''): ?>
		<a class="more-btn" href="<?php echo esc_url( $the_business_wp_option['hero_section_url'] ); ?>"><?php echo esc_html($the_business_wp_option['hero_section_button_text']); ?></a>
		<?php endif; ?>	
	</div>
			  
</div>
</div>
</section>
<?php } ?>