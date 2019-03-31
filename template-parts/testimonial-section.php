<?php 	
/**
 * Displays testimonials
 * @package the-business-wp
 * @since 1.0

 */
the_business_wp_testimonial();
function the_business_wp_testimonial(){ 
// $the_business_wp_option array declared in functions.php
global $the_business_wp_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $the_business_wp_settings = new the_business_wp_settings();
   $the_business_wp_option = wp_parse_args(  get_option( 'the_business_wp_option', array() ) , $the_business_wp_settings->default_data());  
}

//set query args to show specified amount or show all posts from particular category. 
$post_ids = array();
if(absint($the_business_wp_option['testimonial_cat'])!=''){
	array_push($post_ids,absint($the_business_wp_option['testimonial_cat']));
}
if(absint($the_business_wp_option['testimonial_cat2'])!=''){
	array_push($post_ids,absint($the_business_wp_option['testimonial_cat2']));
}
if(absint($the_business_wp_option['testimonial_cat3'])!=''){
	array_push($post_ids,absint($the_business_wp_option['testimonial_cat3']));
}

$args = array( 'post_type' => 'post' , 'post__in' => $post_ids , 'orderby'   => 'post__in', 'order' => 'DESC') ;
$loop = array();
if (count($post_ids)!='0'){
	$loop = get_posts($args);
}

$the_business_wp_class = '';
if($the_business_wp_option['testimonial_section_image']!=''){
	$the_business_wp_class = 'sectionoverlay';
}

?>
<section id="testimonilas" style="background:url('<?php echo esc_url( $the_business_wp_option['testimonial_section_image'] ); ?>') fixed center  <?php echo esc_attr( $the_business_wp_option['testimonial_section_image_repeat'] ); ?> <?php echo esc_attr( $the_business_wp_option['testimonial_section_background_color'] ); ?>;">
<div class="svc-section-body section-padding  <?php echo esc_attr( $the_business_wp_class );?>" >  
<div class="container">
  <?php if($the_business_wp_option['testimonial_section_title']!=''): ?>  
  <h1 class="section-title wow animated fadeInUp"><?php echo esc_html( $the_business_wp_option['testimonial_section_title'] ); ?></h1>
  <?php endif; ?>
  <?php if($the_business_wp_option['testimonial_section_description'] !='' ): ?>
  <p class="section-desc wow animated fadeInUp"><?php echo esc_html( $the_business_wp_option['testimonial_section_description'] ); ?></p>
  <?php endif; ?>

  <div class="row">
     <?php 
		  $i = 0;
		  $count = count($loop);
		  for($i=0 ; $i < $count ; $i++):
		  $my_post = $loop[$i];		   
	?>
          <div class="col-sm-4 col-xs-12">           
              <table border="0" class="testimonial-container">
			   <tr class="no-border">			     
				 <td><?php echo('<p class="testimonial-title">'.esc_html($my_post->post_title).'</p>'); ?></td>
			   </tr>
			   <tr class="no-border">
			     <td class="text-center">
				 <?php 
					$thumb_id = get_post_thumbnail_id($my_post->ID);
					$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
					if($alt == ''){
						$alt = $my_post->post_title;
					}	
					if($thumb_id){					 
				 		echo "<img class='testimonial-image' src=".esc_url(get_the_post_thumbnail_url($my_post->ID, 'full'))." alt='".esc_attr($alt)."' />";
				 	}
				 ?>
				 </td>			   
			   </tr>
			   <tr class="no-border">
			     <td>
				 <?php 
				 $content = $my_post->post_content;
				 echo apply_filters('the_content', $content); 
				 ?>				 
				 </td>
			   </tr>
			   <tr class="no-border"  class="text-center">
			   	<td><img src="<?php echo esc_url(THE_BUSINESS_WP_TEMPLATE_DIR_URI.'/images/stars.png'); ?>" class="testimonial-stars" /></td>
			   </tr>
			  </table>
        
      </div>
	  <?php if(($i+1)%3 == 0) echo '<div class=clearfix></div>'; ?>
      <?php endfor; ?>
	</div>
	
 </div> <!--container-->
</div> 
</section>
<?php } ?>