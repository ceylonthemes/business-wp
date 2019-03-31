<?php
// $the_business_wp_option array declared in functions.php
the_business_wp_news();
function the_business_wp_news(){
global $the_business_wp_option;
if ( class_exists( 'WP_Customize_Control' ) ) {
   $the_business_wp_settings = new the_business_wp_settings();
   $the_business_wp_option = wp_parse_args(  get_option( 'the_business_wp_option', array() ) , $the_business_wp_settings->default_data());  
}

$the_business_wp_class = '';
if($the_business_wp_option['news_section_image']!=''){
	$the_business_wp_class = 'sectionoverlay';
}

?>
	<section id="news" style="background:url('<?php echo esc_url( $the_business_wp_option['news_section_image'] ); ?>') fixed center <?php echo esc_attr( $the_business_wp_option['news_section_image_repeat'] ); ?> <?php echo esc_attr( $the_business_wp_option['news_section_background_color'] ); ?>;">
		<div class="svc-section-body section-padding  <?php echo esc_attr( $the_business_wp_class );?>" > 
			<div class="container">
			
				<div class="row">
					<?php if($the_business_wp_option['news_section_title']!=''): ?>
					<h1 class="section-title wow animated fadeInUp"><?php echo esc_html( $the_business_wp_option['news_section_title'] ); ?></h1>
					<?php endif; ?>
					<?php if($the_business_wp_option['news_section_description']!=''): ?>
					<p class="section-desc wow animated fadeInUp"><?php echo esc_html( $the_business_wp_option['news_section_description'] ); ?></p>
					<?php endif; ?>
				</div>
				
				<div class="row">
				<?php if( $the_business_wp_option['news_category_show'] != "" ) : ?> 
					<?php 
					$news_cat_id = $the_business_wp_option['news_category_show'];
					$news_no_of_show = $the_business_wp_option['news_no_of_show'];
					
					$args = array( 'post_type' => 'post','ignore_sticky_posts' => 1 , 'cat' =>  $news_cat_id , 'posts_per_page' => $news_no_of_show, 'numberposts' => $news_no_of_show );
					
					$news_query = new WP_Query($args);
					$i=1;
					while($news_query->have_posts() ) : $news_query->the_post();
					?>
					<div class="col-sm-3 col-xs-12 ">
						<div class="featured-news">
							<?php if( has_post_thumbnail() ): ?>
						    <div class="image-area">
								<a href="<?php the_permalink(); ?>">
									<?php 
									$thumb_id = get_post_thumbnail_id(get_the_ID());
									$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
									the_post_thumbnail('full',array( 'alt' => $alt )); 
									?>
								</a>							
							</div>
							<?php endif; ?>
							
							<div class="news-featured">
								<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								<span><?php echo esc_attr(  get_the_date( get_option('date_format') ) ); ?></span>
								<p>
								<?php
								$read_more = '... <p class=text-center><a class="more-link" href="'. esc_url( get_the_permalink() ).'">'.__('Read More','the-business-wp').'</a></p>';
								echo apply_filters( 'the_content', wp_trim_words( get_the_content(), 15, $read_more ) ); ?>
								</p>
							</div>
						</div>
					</div>
				
					<?php 
					if($i==4) { echo '<div class="clearfix"></div>'; $i=0; } $i++;
					endwhile;					
					wp_reset_postdata();
					?>
					<?php endif; ?>
				</div>
				
			</div>
		</div>
	</section><!-- #svc-home-news -->
<?php } ?>