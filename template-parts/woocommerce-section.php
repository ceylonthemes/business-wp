<?php
// $the_business_wp_option array declared in functions.php
the_business_wp_woocommerce();
function the_business_wp_woocommerce(){
global $the_business_wp_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $the_business_wp_settings = new the_business_wp_settings();
   $the_business_wp_option = wp_parse_args(  get_option( 'the_business_wp_option', array() ) , $the_business_wp_settings->default_data());  
}

$the_business_wp_class = '';
if($the_business_wp_option['woocommerce_section_image']!=''){
	$the_business_wp_class = 'sectionoverlay';
}

$woocommerce_products_show = $the_business_wp_option['woocommerce_products_show'];
$woocommerce_products_type = $the_business_wp_option['woocommerce_section_product_type'];
?>
	<section id="woocommerce" style="background:url('<?php echo esc_url( $the_business_wp_option['woocommerce_section_image'] ); ?>') fixed center <?php echo esc_attr( $the_business_wp_option['woocommerce_section_image_repeat'] ); echo esc_attr( $the_business_wp_option['woocommerce_section_background_color'] ); ?>;">
		<div class="section-padding  <?php echo esc_attr( $the_business_wp_class );?>">
			<div class="container">
			
				<div class="row">
					<?php if($the_business_wp_option['woocommerce_section_title']!=''): ?>
					<h1 class="section-title wow animated fadeInUp"><?php echo esc_html( $the_business_wp_option['woocommerce_section_title'] ); ?></h1>
					<?php endif; ?>
					<?php if($the_business_wp_option['woocommerce_section_description']!=''): ?>
					<p class="section-desc wow animated fadeInUp"><?php echo esc_html( $the_business_wp_option['woocommerce_section_description'] ); ?></p>
					<?php endif; ?>
				</div>
				
				<div class="row">
					<div class="col-xs-12 col-sm-12">
			
					  <?php 				  
							the_business_wp_woo_products( $woocommerce_products_show, $woocommerce_products_type=='featured' );									  
					  ?>
					</div>
				</div>
				
			</div>
		</div>
	</section><!-- #woocommerce -->
<?php } ?>