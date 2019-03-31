<?php
// $the_business_wp_option array declared in functions.php
global $the_business_wp_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $the_business_wp_settings = new the_business_wp_settings();
   $the_business_wp_option = wp_parse_args(get_option( 'the_business_wp_option', array() ) , $the_business_wp_settings->default_data());  
}

?>
<section id="contact" style="background:<?php echo esc_attr( $the_business_wp_option['contact_section_background_color'] ); ?>;" >
  <div class="svc-section-body section-padding">
    <div class="container">
      
		<?php if($the_business_wp_option['contact_section_title']!=''): ?>
		<div class="row">
		<h1 class="section-title wow animated fadeInUp"><?php echo esc_html( $the_business_wp_option['contact_section_title'] ); ?></h1>
		</div>
		<?php endif; ?>
      
      <?php if($the_business_wp_option['contact_section_description']!=''): ?>
      <p class="section-desc wow animated fadeInUp"><?php echo esc_html( $the_business_wp_option['contact_section_description'] ); ?></p>
      <?php endif; ?>
      <div class="row">
		
        <div class="col-md-8 col-sm-8">
		<?php if( $the_business_wp_option['contact_section_shortcode'] != '' ): ?>
		  <div class="contact-list-form">
          <?php echo do_shortcode( $the_business_wp_option['contact_section_shortcode'] ); ?>
		  </div>
		<?php endif; ?>
        </div>
		 
		 <div class="col-md-4 col-sm-4">
          <div class="row" >
		    
            <ul class="contact-list">
				<?php if( trim($the_business_wp_option['contact_section_phone'])!="" || trim($the_business_wp_option['contact_section_email'])!=""  || $the_business_wp_option['contact_section_address']!=""): ?>
			    <h4><?php esc_html_e('Contact Details','the-business-wp'); ?></h4>
				<?php endif; ?>
				<?php if(trim($the_business_wp_option['contact_section_phone'])!=""): ?>
				  <li><i class="fa fa-phone"></i><span><?php esc_html_e('Tel: ','the-business-wp'); echo esc_html($the_business_wp_option['contact_section_phone']); ?></span></li>
				<?php endif; ?> 
				<?php if($the_business_wp_option['contact_section_fax']!=""): ?>
				  <li><i class="fa fa-fax"></i><span><?php esc_html_e('Fax: ','the-business-wp'); echo esc_html($the_business_wp_option['contact_section_fax']); ?></span></li>
				<?php endif; ?>
				<?php if(trim($the_business_wp_option['contact_section_email'])!=""): ?>  
				  <li><i class="fa fa-envelope"></i><a href="mailto:<?php echo esc_attr( $the_business_wp_option['contact_section_email'] ); ?>"><span><?php esc_html_e('Email: ','the-business-wp'); echo esc_html($the_business_wp_option['contact_section_email']); ?></span></a></li>
				<?php endif; ?> 
				<?php if($the_business_wp_option['contact_section_address']!=""): ?> 
				  <li><i class="fa fa-map-marker"></i><a href="#map">
				  <span><?php esc_html_e('Address: ','the-business-wp'); echo esc_html($the_business_wp_option['contact_section_address']); ?></span></a></li>
				<?php endif; ?>
				<?php if($the_business_wp_option['contact_section_hours']!=""): ?>
				  <h4 style="margin-top:40px;"><?php esc_html_e('Work Hours','the-business-wp'); ?></h4> 
				  <li><i class="fa fa-clock-o"></i>				  
				  <span><?php echo esc_html($the_business_wp_option['contact_section_hours']); ?></span></li>
				<?php endif; ?>	
					  
            </ul>			
          </div>		 
		</div>
		 
	   </div>			
	</div>
  </div>  
 
</section>
<!-- #svc-contact -->
