<?php
/**
 * the-business-wpfunctions and definitions
 * @package the-business-wp
 * @since 1.0
 */

/**
 * Theme only works in WordPress 4.8 or later.
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define('THE_BUSINESS_WP_THEME_NAME','The Business WP');
define('THE_BUSINESS_WP_THEME_SLUG','the-business-wp');
define('THE_BUSINESS_WP_THEME_URL','https://www.ceylonthemes.com/product/business-wp-pro');
define('THE_BUSINESS_WP_THEME_DOC','https://www.ceylonthemes.com/the-business-wp-tutorial/');
define('THE_BUSINESS_WP_THEME_REVIEW_URL','https://wordpress.org/support/theme/'.THE_BUSINESS_WP_THEME_SLUG.'/reviews/');
define('THE_BUSINESS_WP_AUTHOR_URI','https://www.ceylonthemes.com/');
define('THE_BUSINESS_WP_TEMPLATE_DIR',get_template_directory());
define('THE_BUSINESS_WP_TEMPLATE_DIR_URI',get_template_directory_uri());

/**
* Custom settings for this theme.
*/
require get_parent_theme_file_path( '/inc/settings.php' );
//load settings
$the_business_wp_settings = new the_business_wp_settings();
$the_business_wp_option = wp_parse_args(  get_option( 'the_business_wp_option', array() ) , $the_business_wp_settings->default_data());

/**
 * Sets up theme defaults and registers support for various WordPress features.
**/
function the_business_wp_setup() {
	/*
	 * Make theme available for translation.
	 */
	
	load_theme_textdomain( 'the-business-wp', get_template_directory() . '/languages'  );
	
	if ( ! isset( $content_width ) ) $content_width = 1600; 

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	*/
	
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	 
	add_theme_support( 'post-thumbnails' );	

	$defaults = array(
		'default-color'          => '#ffffff',
		'default-image'          => '',
		'default-repeat'         => '',
		'default-position-x'     => '',
		'default-attachment'     => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	);
	
	add_theme_support( 'custom-background', $defaults );
	
	set_post_thumbnail_size( 200, 200 );
	
	// This theme uses wp_nav_menu()
	register_nav_menus(
		array(
			'top'    => __( 'Top Menu', 'the-business-wp' ),
			'footer'    => __( 'Footer Menu', 'the-business-wp' ),			
		)
	);
		
				
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	// Add theme support for Custom Logo.
	add_theme_support(
		'custom-logo', array(
			'width'      => 200,
			'height'     => 200,
			'flex-width' => true,			
		)
	);
	

	$args = array(
		'width'         => 1600,
		'flex-width'    => true,
		'default-image' => THE_BUSINESS_WP_TEMPLATE_DIR_URI.'/images/header.jpg',
		// Header text
		'uploads'         => true,
		'random-default'  => true,	
		'header-text'     => false,
		
	);
	
	add_theme_support( 'custom-header', $args );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );


	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets'     => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
			    'search',
				'categories',
				'archives',
			),

			// Add business info widget to the footer 1 area.
			'footer-sidebar-1' => array(
				'text_about',
			),

			// Put widgets in the footer 2 area.
			'footer-sidebar-2' => array(
				'recent-posts',				
			),
			// Putwidgets in the footer 3 area.
			'footer-sidebar-3' => array(
				'categories',				
			),
			// Put widgets in the footer 4 area.
			'footer-sidebar-4' => array(				
				'search',				
			),
											
		),
		
		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus'   => array(
			// Assign a menu to the "top" location.
			'top'    => array(
				'name'  => __( 'Top Menu', 'the-business-wp' ),
				'items' => array(
					'link_home', // "home" page is actually a link in case a static front page is not used.
				),
			),
		),
			// Assign a menu to the "footer" location.
			'footer'    => array(
				'name'  => __( 'Footer Menu', 'the-business-wp' ),
				'items' => array(
					'link_home', // "home" page is actually a link in case a static front page is not used.
				),
			),		
	);


	/**
	 * Filters the-business-wparray of starter content.
	 *
	 * @since the-business-wp 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'the_business_wp_starter_content', $starter_content );
	 
	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'the_business_wp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * 
 * Priority 0 to make it available to lower priority callbacks.
 *
 * $content_width = $GLOBALS['content_width'];
 */


/**
 * Register custom fonts.
 */
function the_business_wp_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by "Raleway", sans-serif;, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$typography = _x( 'on', 'Raleway font: on or off', 'the-business-wp' );

	if ( 'off' !== $typography ) {
		$font_families = array();
		
		if( 'default' == get_theme_mod('fontsscheme','default') ){
		
		    $font_families[] = 'Raleway:300,300i,400,400i,600,600i,800,800i';
			$font_families[] = 'Oswald:300,300i,400,400i,600,600i,800,800i';
			
		}else {
		
		    $font_families[] = get_theme_mod('body_fontfamily','Raleway').':300,300i,400,400i,600,600i,800,800i';
			$font_families[] = get_theme_mod('header_fontfamily','Oswald').':300,300i,400,400i,600,600i,800,800i';
		
		}
		
		//print_r($font_families);
		 
		$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
		);
        
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		
	}
   
	return esc_url_raw( $fonts_url );
}

/**
 * Display custom font CSS.
 */
function the_business_wp_fonts_css_container() {   
       
	if ( 'custom' !== get_theme_mod( 'fontsscheme' ) && ! is_customize_preview() ) {
		return;
	}

	require( get_parent_theme_file_path( '/inc/custom-fonts.php' ) );

?>
	<style type="text/css" id="custom-fonts" >
		<?php echo the_business_wp_custom_fonts_css(); ?>
	</style>
<?php
}
add_action( 'wp_head', 'the_business_wp_fonts_css_container' );

/**
 * Add preconnect for Google Fonts.
 *
 * @since the-business-wp 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function the_business_wp_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'the-business-wp-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'the_business_wp_resource_hints', 10, 2 );

/**
 * display notice 
 * @since the-business-wp 1.0
 */
function the_business_wp_general_admin_notice(){
    global $pagenow;   
	if($pagenow == 'index.php'){
         $msg = sprintf('<div data-dismissible="disable-done-notice-forever" class="notice notice-info is-dismissible" >
             	<p> %1$s '.THE_BUSINESS_WP_THEME_NAME.' %2$s <span style="color:#F8C516">&#9733;</span><span style="color:#F8C516">&#9733;</span><span style="color:#F8C516">&#9733;</span><span style="color:#F8C516">&#9733;</span><span style="color:#F8C516">&#9733;</span> %3$s <span style="color:red">&hearts;</span> %4$s <a href='.THE_BUSINESS_WP_THEME_REVIEW_URL.' target="_blank"  style="text-decoration: none; margin-left:10px;" class="button button-primary"> %5$s </a>
			 	<a href='.esc_url(THE_BUSINESS_WP_THEME_URL).' target="_blank"  style="text-decoration: none; margin-left:10px;" class="button button-primary">%6$s</a>
			 	<a href='.esc_url(THE_BUSINESS_WP_THEME_DOC).' target="_blank"  style="text-decoration: none; margin-left:10px;" class="button button-primary">%7$s</a>
			 	<a href="?the_business_wp_notice_dismissed" target="_self"  style="text-decoration: none; margin-left:10px;" class="button button-secondary">%8$s</a>
			 	</p></div>',
				esc_html__(' If you like ','the-business-wp'),
				esc_html__(' theme, please leave us a ','the-business-wp'),
				esc_html__(' Rating, A huge thanks ','the-business-wp'),
				esc_html__(' in advance ','the-business-wp'),
				esc_html__('Review','the-business-wp'),
				esc_html__('Go Pro Version','the-business-wp'),	
				esc_html__('Tutorials','the-business-wp'),
				esc_html__('Dismiss','the-business-wp') );
		 echo wp_kses_post($msg);
	}   
}

//show, hide notice
//update_option('the_business_wp_notice', 1);
if ( isset( $_GET['the_business_wp_notice_dismissed'] ) ){
	update_option('the_business_wp_notice',0);
}

$the_business_wp_notice = get_option('the_business_wp_notice',1);
if($the_business_wp_notice){
	add_action('admin_notices', 'the_business_wp_general_admin_notice');
}

/**
 * Register widget area.
 *
 * @since the-business-wp 1.0
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function the_business_wp_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Blog Sidebar', 'the-business-wp' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'the-business-wp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 1', 'the-business-wp' ),
			'id'            => 'footer-sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'the-business-wp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 2', 'the-business-wp' ),
			'id'            => 'footer-sidebar-2',
			'description'   => __( 'Add widgets here to appear in your footer.', 'the-business-wp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => __( 'Footer 3', 'the-business-wp' ),
			'id'            => 'footer-sidebar-3',
			'description'   => __( 'Add widgets here to appear in your footer.', 'the-business-wp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);	
	
	register_sidebar(
		array(
			'name'          => __( 'Footer 4', 'the-business-wp' ),
			'id'            => 'footer-sidebar-4',
			'description'   => __( 'Add widgets here to appear in your footer.', 'the-business-wp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => __( 'Woocommerce Sidebar', 'the-business-wp' ),
			'id'            => 'sidebar-woocommerce',
			'description'   => __( 'Add widgets here to appear in your woocommerce shop, single product... pages.', 'the-business-wp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'the_business_wp_widgets_init' );

/**
 * Replaces "[...]" with ... a 'Continue reading' link.
 *
 * @Package twentyseventeen
 * @subpackage the-business-wp
 * @since the-business-wp 1.0
 */
function the_business_wp_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf(
		'<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'the-business-wp' ), esc_html(get_the_title( get_the_ID() )) )
	);

	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'the_business_wp_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 * @Package twentyseventeen
 * @subpackage the-business-wp
 * @since the-business-wp 1.0
 */
function the_business_wp_wp_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'the_business_wp_wp_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function the_business_wp_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url(get_bloginfo( 'pingback_url' )) );
	}
}
add_action( 'wp_head', 'the_business_wp_pingback_header' );


/**
 * Enqueue scripts and styles.
 *
 * @since the-business-wp 1.0 
 */
function the_business_wp_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'the-business-wp-fonts', the_business_wp_fonts_url(), array(), null );

	wp_enqueue_style( 'boostrap-css', get_theme_file_uri( '/css/bootstrap.min.css' ), array(), '3.3.6'); 
	
	// Theme stylesheet.
	wp_enqueue_style( 'the-business-wp-style', get_stylesheet_uri() );	

	//fonsawesome
	wp_enqueue_style( 'fontawesome-css', get_theme_file_uri( '/fonts/font-awesome/css/font-awesome.css' ), array(), '4.7'); 

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'the-business-wp-skip-link-focus-fix', get_theme_file_uri( '/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	wp_enqueue_script( 'boostrap-js', get_theme_file_uri( '/js/bootstrap.min.js' ), array( 'jquery' ), '3.3.7', true);
		
	$the_business_wp_l10n = array(
		'quote' => the_business_wp_get_fo( array( 'icon' => 'quote-right' ) ),
	);

	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'the-business-wp-navigation', get_theme_file_uri( '/js/navigation.js' ), array( 'jquery' ), '1.0', true );
		$the_business_wp_l10n['expand']   = esc_html__( 'Expand child menu', 'the-business-wp' );
		$the_business_wp_l10n['collapse'] = esc_html__( 'Collapse child menu', 'the-business-wp' );
		$the_business_wp_l10n['icon']     = the_business_wp_get_fo(
			array(
				'icon'     => 'angle-down',
				'fallback' => true,
			)
		);
	}

	wp_localize_script( 'the-business-wp-skip-link-focus-fix', 'theBusinessWPScreenReader', $the_business_wp_l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


}
add_action( 'wp_enqueue_scripts', 'the_business_wp_scripts' );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @Package twentyseventeen
 * @subpackage the-business-wp
 * @since the-business-wp 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function the_business_wp_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'the_business_wp_header_image_tag', 10, 3 );



/*
 * business sanitize html and return new line character with text
 *
 * @since the-business-wp 1.0
 */
function the_business_wp_sanitize_html( $input ) {
    return  wp_kses_post($input)  ;
}

/**
 * Return rgb value of a $hex - hexadecimal color value with given $a - alpha value
 *
 * @since the-business-wp 1.0 
 * Ex:- the_business_wp_rgba('#11ffee',15) // return rgba(17,255,238,15)
**/
 
function the_business_wp_rgba($hex,$a){
 
	$r = hexdec(substr($hex,1,2));
	$g = hexdec(substr($hex,3,2));
	$b = hexdec(substr($hex,5,2));
	$result = 'rgba('.$r.','.$g.','.$b.','.$a.')';
	
	return $result;
}

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @Package twentyseventeen
 * @subpackage the-business-wp
 * @since the-business-wp 1.0
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function the_business_wp_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'the_business_wp_widget_tag_cloud_args' );

/**
 * Custom template tags for this theme.
*/
require get_parent_theme_file_path( '/inc/template-tags.php' );

/* load default data, default settings are stored in template-tags.php */


/**
* Additional features to allow styling of the templates.
*/
require THE_BUSINESS_WP_TEMPLATE_DIR.'/inc/template-functions.php';

if ( class_exists( 'WP_Customize_Control' ) ) {
	require THE_BUSINESS_WP_TEMPLATE_DIR.'/inc/range-value-control/class-customizer-range-value-control.php' ;
   	
	// Inlcude the Alpha Color Picker control file.
	require THE_BUSINESS_WP_TEMPLATE_DIR.'/inc/color-picker/alpha-color-picker.php';
	 
}

/**
 * fontawesome icons functions and filters.
 */
require THE_BUSINESS_WP_TEMPLATE_DIR.'/inc/icon-functions.php';

/**
 * Customizer additions.
 */
 
require THE_BUSINESS_WP_TEMPLATE_DIR.'/inc/customizer.php';
 
/**
 * Display footer custom color CSS.
 */
function the_business_wp_footer_css_container() {

?>
	<style type="text/css" id="custom-footer-colors" >
		<?php echo the_business_wp_footer_foreground_css(); ?>
	</style>
<?php
}
add_action( 'wp_head', 'the_business_wp_footer_css_container' );

/**
 * This function adds some styles to the WordPress Customizer
 */
function the_business_wp_customizer_styles() { ?>
	<style>
		#customize-theme-controls .accordion-section-title {
			font-weight:500;
			background-color:white;
			color: #353030;
		}
		#customize-controls .wp-full-overlay-sidebar-content, .wp-full-overlay-main {background-color:rgb(233, 239, 243);}
		#customize-footer-actions, .wp-full-overlay-footer .devices {background-color:rgb(233, 239, 243);}
		.wp-full-overlay-sidebar .wp-full-overlay-header, .customize-controls-close, .customize-section-back, .customize-section-back:focus {background-color: #fff;}
		.customize-controls-close { border-top:4px solid #FFF;}
		#accordion-section-the_business_wp .accordion-section-title {color: rgb(0, 157, 255);}
		#accordion-section-the_business_wp .accordion-section-title:after {color: rgb(0, 157, 255);}
    
		.help-label {
		width: 100%;
		text-align: center;
		font-weight: 500;
		margin: 6px 0px 0px;
		padding: 2px;
		border: 1px solid rgb(16, 231, 18);
		background-color: white;
		text-align:center;
		}

		
	</style>
	<?php
}
add_action( 'customize_controls_print_styles', 'the_business_wp_customizer_styles', 999 );


/* add search form to top menu */
add_theme_support( 'html5', array( 'search-form' ) );
add_filter('wp_nav_menu_items', 'the_business_wp_add_search_form_to_menu', 10, 2);
function the_business_wp_add_search_form_to_menu($items, $args) {
  // If this isn't the main navbar menu, do nothing
  if(  !($args->theme_location == 'top') ) // with Customizr Pro 1.2+ and Cusomizr 3.4+ you can chose to display the saerch box to the secondary menu, just replacing 'main' with 'secondary'
    return $items;
  // On main menu: put styling around search and append it to the menu items
  return $items . '<li style="color:#eee;" class="my-nav-menu-search"><a id="myBtn" href="#"><i class="fa fa-search" style="font-size:18px;"></i>
  </a></li>';
}


/** 
 *Display template by name. Available template sections are as follows, 
 *slider, news,portfolio, questions,service, skills, stats, team, testimonials, woocommerce, callout
 *
 * @since the-business-wp 1.0
 */
function the_business_wp_featured_area($args, $featured_div = true){
    if($featured_div==true) {
	   echo '<div class="featured-section">';
	   get_template_part( '/template-parts/'.$args, 'section' );
	   echo '</div>';
	}else{
       get_template_part( '/template-parts/'.$args, 'section' );
	}                
}


/* Load widgets */
require  THE_BUSINESS_WP_TEMPLATE_DIR.'/inc/widgets/posts.php';

/**
 * Add woocommerce theme support
 */

add_action( 'after_setup_theme', 'the_business_wp_woocommerce_support' );
function the_business_wp_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

/* Sert defaultimage size selection */
function the_business_custom_image_size() {
    update_option('image_default_size', 'large' );

}
add_action('after_setup_theme', 'the_business_custom_image_size');

