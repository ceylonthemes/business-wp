<?php
/**
 * Displays home slider
 * @package the-business-wp
 * @since 1.0
 */
the_business_wp_slider();
function the_business_wp_slider(){
global $the_business_wp_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $the_business_wp_settings = new the_business_wp_settings();
   $the_business_wp_option = wp_parse_args(  get_option( 'the_business_wp_option', array() ) , $the_business_wp_settings->default_data());  
}

//set query args to show specified amount or show all posts from particular category. 
$post_ids = array();
$count = 0;
if(absint($the_business_wp_option['slider_cat'])!=''){
	array_push($post_ids,absint($the_business_wp_option['slider_cat']));
	$count++;
}
if(absint($the_business_wp_option['slider_cat2'])!=''){
	array_push($post_ids,absint($the_business_wp_option['slider_cat2']));
	$count++;
}
if(absint($the_business_wp_option['slider_cat3'])!=''){
	array_push($post_ids,absint($the_business_wp_option['slider_cat3']));
	$count++;
}
$args = array( 'post_type' => 'post' , 'post__in' => $post_ids , 'orderby'   => 'post__in', 'order' => 'DESC') ;
$loop = new WP_Query($args);

if($count==0): ?>
<div id="main_Carousel" class="carousel slide" >

<img class="carousel-no-image" src="<?php echo esc_url(THE_BUSINESS_WP_TEMPLATE_DIR_URI.'/images/header.jpg'); ?>" alt="<?php esc_html_e('No Image','the-business-wp'); ?>" style="height:<?php echo absint($the_business_wp_option['slider_image_height']); ?>px;">
			<div class="carousel-caption custom-caption">
				<h1 class="slider-title"><?php esc_html_e('Wellcome to the business wp theme','the-business-wp'); ?></h1>
				<p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit','the-business-wp'); ?></p>
				<a class="start-button" href="#service"><?php esc_html_e('Click Here to Begin','the-business-wp'); ?></a>
			</div>
<div class="no-z-index ">
</div>

			
<?php else: ?>

<div id="main_Carousel" class="carousel slide <?php if( $the_business_wp_option['slider_animation_type']=='fade' ){ echo 'carousel-' . esc_attr( $the_business_wp_option['slider_animation_type'] ); } ?>" data-ride="carousel"  data-interval="<?php echo absint( $the_business_wp_option['slider_speed']); ?>">
	<div class="no-z-index">
	<?php if($count>1): ?>
	  <ol class="carousel-indicators">
		<?php 
				$j = 0;			
				for ($j = 0; $j < $count; $j++):							
		?>
		<li data-target="#main_Carousel" data-slide-to="<?php echo absint($j); ?>" class="<?php if($j==0){ echo 'active'; }  ?>"></li>
		<?php								
				endfor;
		?>
	  </ol>
	 <?php endif; ?>
    </div>

  <div class="carousel-inner" role="listbox">
    <?php 
		  $i = 0;
		  while( $loop->have_posts() ) : $loop->the_post();		  
			
    ?>
    <div class="item <?php if($i==0){ echo 'active'; } $i++; ?> "> 
	<?php 
	$thumb_id = $url = $my_title = '';
	$alt = '';
	if( has_post_thumbnail() ):
		$thumb_id = get_post_thumbnail_id(get_the_ID());	
		$url = esc_url(get_the_post_thumbnail_url(get_the_ID(),'full'));
		$my_title = esc_html(get_the_title());
		$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
		if($alt==''){
			$alt = $my_title;
		}
	endif;
	?>
	<div style="background:url(<?php echo esc_url($url); ?>) no-repeat;background-position:center-center;background-size:cover;height:<?php echo absint($the_business_wp_option['slider_image_height']); ?>px;" alt="<?php echo esc_attr($alt); ?>" ></div>	     
	  <div class="svc-section-body sectionoverlay" >
	  <div class="carousel-caption custom-caption">
        <?php
						
			echo ('<p class="slider-title">'.esc_html($my_title).'</p>');
			the_content(__('See More','the-business-wp'));
			echo '<a class="start-button" href="'.esc_url($the_business_wp_option['slider_button_url']).'" >'.esc_html($the_business_wp_option['slider_button_text']).'</a>';
						
		?>
      </div>
	  </div>	
    </div>
    <?php
		 
		endwhile;
		wp_reset_postdata(); 
	?>
</div>
	<?php if($count>1): ?>
			<ul class="carousel-navigation">
				<li><a class="carousel-prev" href="#main_Carousel" data-slide="prev"></a></li>
				<li><a class="carousel-next" href="#main_Carousel" data-slide="next"></a></li>
			</ul>
	<?php endif; ?> 
<?php endif; }?>
</div>

