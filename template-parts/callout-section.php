<?php
// $the_business_wp_option array declared in functions.php
global $the_business_wp_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $the_business_wp_settings = new the_business_wp_settings();
   $the_business_wp_option = wp_parse_args(  get_option( 'the_business_wp_option', array() ) , $the_business_wp_settings->default_data());  
}

$the_business_wp_class = '';
if(($the_business_wp_option['callout_section_image']!='')){
	$the_business_wp_class = 'sectionoverlay';
}

$the_business_wp_color = $the_business_wp_option['callout_button_color'];

?>
<section id="callout" style="background:url('<?php echo esc_url( $the_business_wp_option['callout_section_image'] ); ?>') fixed center <?php echo esc_attr( $the_business_wp_option['callout_section_image_repeat'] ); ?> <?php echo esc_attr( $the_business_wp_option['callout_section_background_color'] ); ?>;">
<div class="svc-section-body <?php echo esc_attr( $the_business_wp_class );?>" >
<div class="container">
 <div class="row">
    <div class="col-md-12">
	
	 <div class="callout-area">
		<?php if($the_business_wp_option['callout_section_title']!=''): ?>
		<h2 class="callout-title text-center"><?php echo esc_html( $the_business_wp_option['callout_section_title'] ); ?></h2>
		<?php endif; ?>	
		<?php if($the_business_wp_option['callout_section_description']!=''): ?>
		<div class="callout-section-desc wow animated fadeInUp"><?php echo wp_kses_post(nl2br($the_business_wp_option['callout_section_description'])); ?></div>
		<?php endif; ?> 
			
		<?php if($the_business_wp_option['callout_section_button_text']!=''): ?>
		<a class="start-button" style="background-color:<?php echo esc_attr($the_business_wp_color); ?>" href="<?php echo esc_url( $the_business_wp_option['callout_section_url'] ); ?>"><?php echo esc_html($the_business_wp_option['callout_section_button_text']); ?></a>
		<?php endif; ?>

	 </div>	  
	 	  
    </div>
  </div>  
</div>
</section> 
