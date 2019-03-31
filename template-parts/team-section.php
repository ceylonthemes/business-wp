<?php 	
/**
 * Displays team
 * @package the-business-wp
 * @since 1.0

 */
the_business_wp_team();
function the_business_wp_team(){ 
// $the_business_wp_option array declared in functions.php
global $the_business_wp_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $the_business_wp_settings = new the_business_wp_settings();
   $the_business_wp_option = wp_parse_args(  get_option( 'the_business_wp_option', array() ) , $the_business_wp_settings->default_data());  
}

//set query args to show specified amount or show all posts from particular category. 
$post_ids = array();
if(absint($the_business_wp_option['team_cat'])!=''){
	array_push($post_ids,absint($the_business_wp_option['team_cat']));
}
if(absint($the_business_wp_option['team_cat2'])!=''){
	array_push($post_ids,absint($the_business_wp_option['team_cat2']));
}
if(absint($the_business_wp_option['team_cat3'])!=''){
	array_push($post_ids,absint($the_business_wp_option['team_cat3']));
}
if(absint($the_business_wp_option['team_cat4'])!=''){
	array_push($post_ids,absint($the_business_wp_option['team_cat4']));
}
if(absint($the_business_wp_option['team_cat5'])!=''){
	array_push($post_ids,absint($the_business_wp_option['team_cat5']));
}
if(absint($the_business_wp_option['team_cat6'])!=''){
	array_push($post_ids,absint($the_business_wp_option['team_cat6']));
}

$args = array( 'post_type' => 'post' , 'post__in' => $post_ids , 'orderby'   => 'post__in', 'order' => 'DESC') ;

$loop = array();
if (count($post_ids)!='0'){
	$loop = get_posts($args);
}

$the_business_wp_class = '';
if($the_business_wp_option['team_section_image']!=''){
	$the_business_wp_class = 'sectionoverlay';
}

?>
<section id="team" style="background:url('<?php echo esc_url( $the_business_wp_option['team_section_image'] ); ?>') fixed center  <?php echo esc_attr( $the_business_wp_option['team_section_image_repeat'] ); ?> <?php echo esc_attr( $the_business_wp_option['team_section_background_color'] ); ?>;">
<div class="svc-section-body section-padding  <?php echo esc_attr( $the_business_wp_class );?>" >  
  <div class="container">
  <?php if($the_business_wp_option['team_section_title']!=''): ?>  
  <h1 class="section-title wow animated fadeInUp"><?php echo esc_html( $the_business_wp_option['team_section_title'] ); ?></h1>
  <?php endif; ?>
  <?php if($the_business_wp_option['team_section_description'] !='' ): ?>
  <p class="section-desc wow animated fadeInUp"><?php echo esc_html( $the_business_wp_option['team_section_description'] ); ?></p>
  <?php endif; ?>

  <div class="row">
  <!-- first slide-->
      <?php 
		$i = 0;
		$count = count($loop);
		
		for($i=0 ; $i < $count ; $i++):
		$my_post = $loop[$i];
		
		$my_title = $my_post->post_title;
		$text = $my_post->post_content;
		$thumb_id = get_post_thumbnail_id($my_post->ID);
		$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
		$image = get_the_post_thumbnail_url($my_post->ID, 'full');
		$my_link = get_the_permalink($my_post->ID);
		if($alt==''){
			$alt = $my_title;
		}		   
	?>
		<div class="col-sm-4 col-xs-12">
		   <div class="featured-team">
			<?php if ( ! empty( $image ) ) : ?>
				<div class="image-area">
				<div class="image-background" ></div>
				<cite>
				<img class="img" src="<?php echo esc_url( $image ); ?>"  alt="<?php echo esc_attr( $alt ); ?>" />			 				
				</cite>
				</div>
			<?php endif; ?>
			
				<div class="team-featured">
						<a href="<?php echo esc_url( $my_link ); ?>"><h4><?php echo esc_html( $my_title );?></h4></a>	
						<p>
						<?php
						echo apply_filters('the_content', $text);
						?>
						</p>
				</div>
			</div>
		</div>	
	  <?php if(($i+1)%3 == 0) echo '<div class=clearfix></div>'; ?>
      <?php endfor; ?>		
	</div>		
  </div> <!--container-->
 </div> 
</section>
<?php } ?>