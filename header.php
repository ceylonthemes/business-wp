<?php
/**
 * The header
 * @package the-business-wp
 * @since 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php 
wp_head();
//get settings array 
global $the_business_wp_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $the_business_wp_settings = new the_business_wp_settings();
   $the_business_wp_option = wp_parse_args(  get_option( 'the_business_wp_option', array() ) , $the_business_wp_settings->default_data());  
}
?>
</head>
<body <?php body_class(); ?> >

<!-- The Search Modal Dialog -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span id="search-close" class="close">&times;</span>
	<br/> <br/>
    <?php get_search_form(); ?>
	<br/> 
  </div>
</div><!-- end search model-->

<div id="page" class="site">

<?php 
if($the_business_wp_option['box_layout']){
  echo '<div class="wrap-box">';
}
$the_business_wp_menu_width = 'col-md-7 col-sm-7';
$the_business_wp_show_cart = false;
if (!class_exists( 'WooCommerce' ) || $the_business_wp_option['woocommerce_header_cart_hide']){
	//if woocommerce not available or cart not shown increase main menu width
	$the_business_wp_menu_width = 'col-md-8 col-sm-8';
} else {
	$the_business_wp_show_cart = true;
}
?>

<a class="skip-link screen-reader-text" href="#main">
<?php esc_html_e( 'Skip to content', 'the-business-wp' ); ?>
</a>
<header id="masthead" class="site-header" role="banner">

	<!-- start of mini header -->
	<?php if(!$the_business_wp_option['contact_section_hide_header']): ?>	      
			<div class="mini-header hidden-xs">
				<div class="container">
					
						<div class="col-md-6 col-sm-6 header-contact-section" >
						 
							<ul class="contact-list-top">
							<?php if($the_business_wp_option['contact_section_phone']!=''): ?>					  
								<li><i class="fa fa-phone "></i><span ><?php echo esc_html($the_business_wp_option['contact_section_phone']); ?></span></li>
							<?php endif; ?>
							<?php if($the_business_wp_option['contact_section_email']!=''): ?>
								<li><i class="fa fa-envelope"></i><a href="mailto:<?php echo esc_attr($the_business_wp_option['contact_section_email'] ); ?>"><span><?php echo esc_html($the_business_wp_option['contact_section_email']); ?></span></a></li>
							<?php endif; ?>
							</ul>
						 
						</div>
						<div class="col-md-6 col-sm-6">			
							<ul class="mimi-header-social-icon pull-right animate fadeInRight" >							
								<?php if($the_business_wp_option['social_facebook_link']!=''){?> <li><a href="<?php echo esc_url($the_business_wp_option['social_facebook_link']); ?>" target="<?php if($the_business_wp_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="facebook" data-toggle="tooltip" title="<?php esc_attr_e('Facebook','the-business-wp'); ?>"><i class="fa fa-facebook"></i></a></li><?php } ?>
								<?php if($the_business_wp_option['social_twitter_link']!=''){?> <li><a href="<?php echo esc_url($the_business_wp_option['social_twitter_link']); ?>" target="<?php if($the_business_wp_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="twitter" data-toggle="tooltip" title="<?php esc_attr_e('Twitter','the-business-wp'); ?>"><i class="fa fa-twitter"></i></a></li><?php } ?>
								<?php if($the_business_wp_option['social_skype_link']!=''){?> <li><a href="<?php echo esc_url($the_business_wp_option['social_skype_link']); ?>" target="<?php if($the_business_wp_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="skype" data-toggle="tooltip" title="<?php esc_attr_e('Skype','the-business-wp'); ?>"><i class="fa fa-skype"></i></a></li><?php } ?>
								<?php if($the_business_wp_option['social_pinterest_link']!=''){?> <li><a href="<?php echo esc_url($the_business_wp_option['social_pinterest_link']); ?>" target="<?php if($the_business_wp_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="pinterest" data-toggle="tooltip" title="<?php esc_attr_e('Pinterest','the-business-wp'); ?>"><i class="fa fa-pinterest-p"></i></a></li><?php } ?>
							</ul>
						</div>	
					
				</div>	
			</div>
		<?php endif; ?>		
	 <!-- .end of contacts mini header -->  
	 
  <!--top menu, site branding-->
 <div id="sticky-nav" >
   <div class="container vertical-center"> 
    <div class="col-md-4 col-sm-4 site-branding" >
	<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
    <?php the_custom_logo(); ?>
    <?php endif; ?>
      <div class="site-branding-text">
        <?php if ( is_front_page() ) : ?>
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
          <?php bloginfo( 'name' ); ?>
          </a></h1>
        <?php else : ?>
        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
        <?php endif; ?>
        <?php
						$the_business_wp_description = get_bloginfo( 'description', 'display' );
			
						if ( $the_business_wp_description || is_customize_preview() ) :
		?>
        <p class="site-description"><?php echo esc_html($the_business_wp_description); ?></p>
        <?php endif; ?>
      </div>
      <!-- .site-branding-text -->
    </div>
    <!-- .end of site-branding -->
	
	<!-- start of navigation menu -->
    <div class="<?php echo esc_attr($the_business_wp_menu_width); ?> " >	
      <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>	  
    </div>  
	<!-- end of navigation menu --> 
	
	<?php if($the_business_wp_show_cart) : ?>
	<div id="cart-top" class="col-md-1 col-sm-1 cart-top hide-cart">
		  <div class="cart-container">
			  <?php do_action( 'the_business_wp_woocommerce_cart_top' ); ?>
		  </div>		
    </div>
	<?php endif; ?>
		
   </div>
   <!-- .container -->	
  </div>
  <!-- #masthead -->
  
</header>

<?php get_template_part( 'template-parts/header/breadcrumbs');
