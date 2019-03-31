<?php
/**
 * The template for displaying the footer
 * Contains the closing of the #content div and all content after.
 * @package the-business-wp

 */

$the_business_wp_settings = new the_business_wp_settings();
$the_business_wp_option = wp_parse_args(  get_option( 'the_business_wp_option', array() ) , $the_business_wp_settings->default_data());

$the_business_wp_class = '';
$the_business_wp_bottom_color = esc_attr( $the_business_wp_option['footer_section_bottom_background_color'] );
$the_business_wp_class = $the_business_wp_class. ' footer-foreground';

?>

<footer id="colophon" role="contentinfo" class="site-footer  <?php echo esc_attr( $the_business_wp_class );?>" style="background:<?php echo esc_attr( $the_business_wp_option['footer_section_background_color'] ); ?>">
  <div class="footer-section <?php echo esc_attr( $the_business_wp_class );?>" >
    <div class="container">
      <?php
		get_template_part( 'template-parts/footer/footer', 'widgets' );
		?>
      <div class="col-md-12">
        <center>
          <ul id="footer-social" class="header-social-icon animate fadeInRight" >
            <?php if($the_business_wp_option['social_facebook_link']!=''){?>
            <li><a href="<?php echo esc_url($the_business_wp_option['social_facebook_link']); ?>" target="<?php if($the_business_wp_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="facebook" data-toggle="tooltip" title="<?php esc_attr_e('Facebook','the-business-wp'); ?>"><i class="fa fa-facebook"></i></a></li>
            <?php } ?>
            <?php if($the_business_wp_option['social_twitter_link']!=''){?>
            <li><a href="<?php echo esc_url($the_business_wp_option['social_twitter_link']); ?>" target="<?php if($the_business_wp_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="twitter" data-toggle="tooltip" title="<?php esc_attr_e('Twitter','the-business-wp'); ?>"><i class="fa fa-twitter"></i></a></li>
            <?php } ?>
            <?php if($the_business_wp_option['social_skype_link']!=''){?>
            <li><a href="<?php echo esc_url($the_business_wp_option['social_skype_link']); ?>" target="<?php if($the_business_wp_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="skype" data-toggle="tooltip" title="<?php esc_attr_e('Skype','the-business-wp'); ?>"><i class="fa fa-skype"></i></a></li>
            <?php } ?>
            <?php if($the_business_wp_option['social_pinterest_link']!=''){?>
            <li><a href="<?php echo esc_url($the_business_wp_option['social_pinterest_link']); ?>" target="<?php if($the_business_wp_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="pinterest" data-toggle="tooltip" title="<?php esc_attr_e('Pinterest','the-business-wp'); ?>"><i class="fa fa-pinterest-p"></i></a></li>
            <?php } ?>				
          </ul>
        </center>
      </div>
      <div class="col-md-12 bottom-menu">
        <center>         
		  	<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer',
					'menu_id'        => 'footer-menu',
					'container_class' => 'bottom-menu',
					'depth'          => 1,
				)
			);
			?>
        </center>
      </div>
	  
    <!-- bottom footer -->
    <div class="col-md-12 site-info" style="background:<?php echo esc_attr($the_business_wp_bottom_color); ?>">
      <p align="center" > <a href="<?php echo esc_url(THE_BUSINESS_WP_AUTHOR_URI); ?>"> <?php echo esc_html($the_business_wp_option['footer_section_bottom_text']); ?> </a> </p>
    </div>
    <!-- end of bottom footer -->	
	  
    </div>
    <!-- .container -->

  </div>
  <a href="#" class="scroll-top"><i class="fa fa-arrow-up"></i></a>
</footer>
<!-- #colophon -->
<?php 
global $the_business_wp_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $the_business_wp_settings = new the_business_wp_settings();
   $the_business_wp_option = wp_parse_args(  get_option( 'the_business_wp_option', array() ) , $the_business_wp_settings->default_data());  
}
if($the_business_wp_option['box_layout']){
	// end of wrapper div
	echo '</div>';
}
?>
<?php wp_footer(); ?>
</body>
</html>