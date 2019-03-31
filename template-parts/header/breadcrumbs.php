<?php
global $the_business_wp_option;
if(!$the_business_wp_option['home_header_section_disable']){
	the_business_wp_breadcrumbs();
} elseif ((!is_front_page() )){ 
	the_business_wp_breadcrumbs();
} elseif ('posts' == get_option( 'show_on_front' )){
	the_business_wp_breadcrumbs();
}
function the_business_wp_breadcrumbs() {		
	global $post;
	$url='';
	$homeLink = esc_url( home_url() );
?> 	
	<div class="sub-header" style="background:url('<?php echo esc_url(get_header_image()); ?>');">
	
	<div class="sub-header-inner sectionoverlay">
	<?php 
	if(is_search()){
		echo '<div class="title">'. esc_html__('Search Results','the-business-wp').'</div>';
	} else if( is_404() ){
		echo '<div class="title">'. esc_html__('Page not Found','the-business-wp').'</div>';
	} else if( is_category() ){
		echo '<div class="title">'. esc_html__('Category','the-business-wp').'</div>';
	} else if( is_archive() ){
		echo '<div class="title">'. esc_html__('Archive','the-business-wp').'</div>';
	} else {
	    echo '<div class="title">'.esc_html(get_the_title()).'</div>';
	}
	?>
		<ul>
			<li class="home" ><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home','the-business-wp' ); ?></a></li>
			<?php 
			
			if (is_home() || is_front_page()) :			
				echo '<li>'. esc_html( get_bloginfo( 'name' ) ).'</li>';				
			else:
				
				// Blog Category
				if ( is_category() ) { 
					the_archive_title( '<li>', '</li>' ); 
				// Blog Day
				} else if ( is_search() ) {		
				echo '<li>'. esc_attr( get_search_query() ) .'</li>';		
				} else if ( is_day() ) {
					echo '<li>'. esc_html( get_the_time('Y') ) .'';
					echo '<li>'. esc_html( get_the_time('F') ) .'';
					echo '<li>'. esc_html( get_the_time('d') ) .'</li>';

				// Blog Month
				} else if ( is_month() ) {
					echo '<li>' . esc_html( get_the_time('Y') ) . '';
					echo '<li>'. esc_html( get_the_time('F') ) .'</li>';

				// Blog Year
				} else if ( is_year() ) {
					echo '<li>'. esc_html( get_the_time('Y') ) .'</li>';

				// Single Post
				} 
				else if( is_archive() ){
					the_archive_title( '<li>', '</li>' );
				}
				else if ( is_single() && !is_attachment() ) {
										
					if( get_post_type() == 'post' ){
						$cat = get_the_category();
						$cat = $cat[0];
						if($cat){
							echo '<li>';
							$args = array(
								//links
								'a'     => array(
									'href' => array()
								)
							);
							echo wp_kses(get_category_parents( $cat , TRUE, ''), $args );
							echo '</li>';
							the_title('<li>','</li>');
						}
					}
				}  
				else if ( is_page() && $post->post_parent ) {
					$parent_id  = $post->post_parent;
					$breadcrumbs = array();
					while ($parent_id) {
						$page = get_page($parent_id);
						$breadcrumbs[] = '<li>' . esc_html( get_the_title($page->ID) ) . '';
						$parent_id  = $page->post_parent;
					}
					$breadcrumbs = array_reverse($breadcrumbs);
					foreach ($breadcrumbs as $crumb) {					
							$args = array(
								//links
								'a'     => array(
									'href' => array()
								)
							);						
							echo wp_kses($crumb,$args);
					}
					
					the_title('<li>','</li>');
				}
				elseif( is_404() ){
					echo '<li>' . esc_html__('404 Error','the-business-wp' ) . '</li>';
				}
				else { 
					the_title('<li>','</li>'); 
				}
			endif; 
			?>
		</ul>
	</div>
</div><!-- .sub-header -->
<?php 
}