<?php
/**
 * Customizer
 *
 * @package the-business-wp
 * @since 1.0
 */

add_action( 'customize_register', 'the_business_wp_customizer_settings' ); 
function the_business_wp_customizer_settings( $wp_customize ) {

// Go pro control
$wp_customize->add_section( 'the_business_wp' , array(
			'title'      	=> __( 'Go Business WP Premium', 'the-business-wp' ),
			'priority' => 1,
		) );

		$wp_customize->add_setting( 'the_business_wp', array(
			'default'    		=> null,
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( new The_business_wp_more_Control( $wp_customize, 'the_business_wp', array(
			'label'    => __( 'Business WP Premium', 'the-business-wp' ),
			'section'  => 'the_business_wp',
			'settings' => 'the_business_wp',
			'priority' => 1,
		) ) );

/*******************
 * Layout options. *
 *******************/

		$wp_customize->add_section( 'layout_section' , array(
			'title'      => __('Layout*', 'the-business-wp' ),
			'description'=> __('Change site layout. Change Single Post display layout, Default is two columns (with sidebar). In pages - use full width template to hide sidebar', 'the-business-wp' ),	
			
		) );
		
		// site layout default / box layout 
		$wp_customize->add_setting( 'the_business_wp_option[box_layout]' , array(
		'default'    => 0,
		'sanitize_callback' => 'the_business_wp_sanitize_checkbox',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[box_layout]' , array(
		'label' => __('Enable box layout mode','the-business-wp' ),
		'description' => __('Enable or disable Box layout mode. Default is fluid layout', 'the-business-wp' ),
		'section' => 'layout_section',
		'type'=>'checkbox',
		) );
	
		// layout 
		$wp_customize->add_setting( 'the_business_wp_option[layout_section_post_one_column]' , array(
		'default'    => 0,
		'sanitize_callback' => 'the_business_wp_sanitize_checkbox',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[layout_section_post_one_column]' , array(
		'label' => __('One Column Single Post Layout','the-business-wp' ),
		'description' => __('Display single post in one column (No Sidebar)','the-business-wp' ),
		'section' => 'layout_section',
		'type'=>'checkbox',
		) );
		



/*****************
 * Theme options.*
*****************/
 
$wp_customize->add_panel( 'theme_options', array(
  'title' => __( 'Theme Options*','the-business-wp' ),
  'description' => __( 'First, create a page from home-page template, So create service, about, blog, contact pages from relevant templates. From Customizer -> Home page settings select the created page as static home page','the-business-wp' ),
  'priority' => 2,
) );

// page customizer
require THE_BUSINESS_WP_TEMPLATE_DIR.'/inc/customizer/pages.php';
// load customizer settings
require THE_BUSINESS_WP_TEMPLATE_DIR.'/inc/customizer/slider.php';
require THE_BUSINESS_WP_TEMPLATE_DIR.'/inc/customizer/hero.php';			
require THE_BUSINESS_WP_TEMPLATE_DIR.'/inc/customizer/service.php';	
require THE_BUSINESS_WP_TEMPLATE_DIR.'/inc/customizer/contact.php';	
require THE_BUSINESS_WP_TEMPLATE_DIR.'/inc/customizer/social.php';	
require THE_BUSINESS_WP_TEMPLATE_DIR.'/inc/customizer/shop.php';
	
require THE_BUSINESS_WP_TEMPLATE_DIR.'/inc/customizer/team.php';
require THE_BUSINESS_WP_TEMPLATE_DIR.'/inc/customizer/callout.php';

require THE_BUSINESS_WP_TEMPLATE_DIR.'/inc/customizer/news.php';
require THE_BUSINESS_WP_TEMPLATE_DIR.'/inc/customizer/testimonials.php';

require THE_BUSINESS_WP_TEMPLATE_DIR.'/inc/customizer/skill.php';
require THE_BUSINESS_WP_TEMPLATE_DIR.'/inc/customizer/fonts.php';

//require THE_BUSINESS_WP_TEMPLATE_DIR.'/inc/customizer/background.php';
require THE_BUSINESS_WP_TEMPLATE_DIR.'/inc/customizer/footer.php';
	
/****************************
default customizer settings *
*****************************/		

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->selective_refresh->add_partial(
		'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'the_business_wp_customize_partial_blogname',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'the_business_wp_customize_partial_blogdescription',
		)
	);
	
	// home header section enable/disable
	$wp_customize->add_setting( 'the_business_wp_option[home_header_section_disable]' , array(
	'default'    => true,	
	'sanitize_callback' => 'the_business_wp_sanitize_checkbox',
	'type'=>'option'
	));
	
	$wp_customize->add_control('the_business_wp_option[home_header_section_disable]' , array(
	'label' => __('Disable home header image.','the-business-wp' ),
	'description'    => __('(Hide header in front page, When home slider enabled)','the-business-wp' ),
	'section' => 'header_image',
	'type'=>'checkbox',
	) );
	
	$wp_customize->add_setting( 'color_label2', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new the_business_wp_Label_Custom_control( $wp_customize, 'color_label2', array(
		'label'   => __('Unlimited theme color schemes, Go Pro version','the-business-wp' ),
		'section' => 'colors',
	) ) );		
	

/************ 
blog settings
*************/						
		$wp_customize->add_section( 'blog_section' , array(
			'title'      => __('Blog*', 'the-business-wp' ),			
			'description'=> __('Blog/Archive settings. Create a new page and select blog-page as the template. Go Settings-> Reading-> Select created page as Post page', 'the-business-wp' ),
		) );
		
	
		// sidebar position
		$wp_customize->add_setting( 'the_business_wp_option[blog_sidebar_position]' , array(
		'default'    => 'right',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[blog_sidebar_position]' , array(
		'label' => __('Blog/Archive Sidebar position','the-business-wp' ),
		'section' => 'blog_section',
		'type'=>'select',
		'choices'=>array(
			'right'=>__('Right Sidebar','the-business-wp' ),
			'left'=>__('Left Sidebar','the-business-wp' ),
		),
		) );				
		

}

/**
 * Sanitize the colorscheme.
 *
 * @param string $input Color scheme.
 */
function the_business_wp_sanitize_colorscheme( $input ) {
	$valid = array( 'blue', 'custom' );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'blue';
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since business-wp 1.0
 * @see the_business_wp_customize_register()
 *
 * @return void
 */
function the_business_wp_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since business-wp 1.0
 * @see the_business_wp_customize_register()
 *
 * @return void
 */
function the_business_wp_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Return whether we're previewing the front page and it's a static page.
 */
function the_business_wp_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}


/**
 * Bind JS handlers to instantly live-preview changes.
 */
function the_business_wp_customize_preview_js() {
	wp_enqueue_script( 'the-business-wp-customize-preview', get_theme_file_uri( '/js/customize-preview.js' ), array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'the_business_wp_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function the_business_wp_panels_js() {
	wp_enqueue_script( 'the-business-wp-customize-controls', get_theme_file_uri( '/js/customize-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'the_business_wp_panels_js' );


function the_business_wp_slider_sanitize( $value ) {
    if ( ! in_array( $value, array( 'Uncategorized','category' ) ) )    
    return $value;
}
 
/*
 * the-business-wp sanitize text function
 */
function the_business_wp_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/*
 * the-business-wp sanitize checkbox function
 */ 
function the_business_wp_sanitize_checkbox( $checked ) {
    // Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}


/*
 * the-business-wp get post categories
 */

function the_business_wp_get_post_categories(){
	$cats = get_categories();
	$arr = array();
	$arr[''] = 'None';
	foreach($cats as $cat){
		$arr[$cat->term_id] = $cat->name;
	}
	return $arr;
}

/*
 * the-business-wp get all published pages
 */
$the_business_wp_all_posts = the_business_wp_get_all_posts();

function the_business_wp_get_all_pages(){

	$args = array(
		'post_type' => 'page',
		'sort_order' => 'desc',
		'sort_column' => 'post_title',
		'post_status' => 'publish'
	); 

	$pages = get_pages($args);
	$arr = array();
	$arr[''] = 'None';
	foreach($pages as $page){
		$arr[$page->ID] = $page->post_title;
	}
	return $arr;
}

/*
 * the-business-wp get all published posts
 */
 
function the_business_wp_get_all_posts(){

	$args = array(
		'post_type' => 'post',
		'sort_order' => 'desc',
		'sort_column' => 'post_title',
		'post_status' => 'publish'
	); 

	$posts = get_posts($args);
	$arr = array();
	$arr[''] = 'None';
	foreach($posts as $post){
		$arr[$post->ID] = $post->post_title;
	}
	return $arr;
}

/* label control */
if (class_exists('WP_Customize_Control'))
{
     class the_business_wp_Label_Custom_control extends WP_Customize_Control
     {
          public function render_content()
           {

                ?>
                    <p class="help-label">
                      <span class="customize-category-select-control"><?php echo esc_html( $this->label ); ?></span>                      
                    </p>
                <?php
           }
     }
}


if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'The_business_wp_more_Control' ) ) :
class The_business_wp_more_Control extends WP_Customize_Control {

	/**
	* Render the content on the theme customizer page
	*/
	public function render_content() {
		?>
		<label style="overflow: hidden; zoom: 1;">
			<div class="col-md-2 col-sm-6">					
					<a class="button" style="margin-bottom:20px;margin-left:20px" href="<?php echo esc_url(THE_BUSINESS_WP_THEME_URL); ?>" target="blank" class="btn pro-btn-success btn"><?php esc_html_e('Upgrade to Business WP Premium','the-business-wp'); ?> </a>
			</div>
			
			<div class="col-md-4 col-sm-6" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);padding:3px; background-color:#FFF">
				<img  src="<?php echo esc_url(THE_BUSINESS_WP_TEMPLATE_DIR_URI .'/screenshot.png'); ?>">
			</div>			
			<div class="col-md-3 col-sm-6" style="font-weight:500;">
				<table class="theme-features" cellspacing="0" align="left">
				<tbody>
				<tr>
				<th scope="col" align="center"><h2><?php esc_html_e('Business WP Pro','the-business-wp'); ?></h2></th>
				</tr>				
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('1. 6 months customer support, and one year free updates for each theme purchase for single domain','the-business-wp'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('2. 5-10 Widgets (News/events, Accordian, Quicklinks, Advanced recent posts, Contact... )','the-business-wp'); ?></div></td>
				</tr>			
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i><?php esc_html_e('3. Unlimited services','the-business-wp'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('4. Unlimited News/Events','the-business-wp'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('5. Unlimited Testimonials/Sliders','the-business-wp'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('6. Unlimited Portfolio','the-business-wp'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('7. Unlimited Team members','the-business-wp'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('8. More Call to action options and customization','the-business-wp'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('9. Custom Page selection in featured areas on all templates, any page design with default editor, site orign, elementor ect: can be added to featured sections.','the-business-wp'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('10. Stats Section with animations','the-business-wp'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('11. Skills/Progress section','the-business-wp'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('12. Unlimited Color Schemes','the-business-wp'); ?></div></td>
				</tr>								
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('13. Pricing table','the-business-wp'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('14. More footer customizations','the-business-wp'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('15. 500 + Google Fonts','the-business-wp'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('16. Translation Ready','the-business-wp'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('17. Featured section selectors','the-business-wp'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('18. All templates customization','the-business-wp'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i><?php esc_html_e('19. Team Template','the-business-wp'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('20. Contact Template','the-business-wp'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('21. 2 Service Templates','the-business-wp'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('22. Stats, Skills/Progress with animations','the-business-wp'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('23. 2 Portfolio/Recent Work Templates','the-business-wp'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i><?php esc_html_e('24. More accessibility features','the-business-wp'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i><?php esc_html_e('25. One page home template','the-business-wp'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i><?php esc_html_e('26. Sticky navigation','the-business-wp'); ?></div></td>
				</tr>				
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i><?php esc_html_e('27. Site content, Header and footer width adjustment','the-business-wp'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i><?php esc_html_e('28. Drag and Drop page design and Page builder template','the-business-wp'); ?></div></td>
				</tr>										
				</tbody>
			  </table>

			</div>
			
			<br />
			<div class="col-md-2 col-sm-6">					
					<a class="button"  style="margin-bottom:20px;margin-left:20px;" href="<?php echo esc_url(THE_BUSINESS_WP_AUTHOR_URI); ?>" target="blank" class="btn pro-btn-success btn"><strong><?php esc_html_e('Go Premium or Donate','the-business-wp'); ?></strong></a>
			</div>

		</label>
		<?php
	}
}
endif;