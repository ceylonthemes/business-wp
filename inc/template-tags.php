<?php
/**
 * Custom template tags for this theme
 * @package the-business-wp
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
 
if ( ! function_exists( 'the_business_wp_featured_areas' ) ) : 
/**
 * the-business-wp featured areas
 * @package the-business-wp
 * @since 1.0 
 */
 
function the_business_wp_featured_areas(){
$featured = array(
	    'slider'=> __('Home Slider','the-business-wp'),
		'hero'=> __('Hero','the-business-wp'),
		'service'=> __('Service','the-business-wp'),
		'woocommerce'=> __('Shop','the-business-wp'),
		'callout'=> __('Callout','the-business-wp'),
		'team'=> __('Team','the-business-wp'),
		'skills'=> __('Skills','the-business-wp'),
		'testimonial'=> __('Testimonial','the-business-wp'),
		'news'=> __('News','the-business-wp'),
		'contact'=> __('Contact','the-business-wp'),
		'none'=> __('None','the-business-wp'),
	);
		
	return 	$featured;	
}

endif;

if ( ! function_exists( 'the_business_wp_color_codes' ) ) : 
/**
 * the-business-wp color codes
 * @package the-business-wp
 * @since 1.0 
 */
 
function the_business_wp_color_codes(){
	return array('#000000','#ffffff','#ED0A70','#e7ad24','#FFD700','#81d742','#0053f9','#8224e3');
}

endif;

if ( ! function_exists( 'the_business_wp_background_style' ) ) : 
/**
 * the-business-wp color codes
 * @package the-business-wp
 * @since 1.0 
 */
 
function the_business_wp_background_style(){
	return array(
					'no-repeat'  => __('No Repeat','the-business-wp'),
					'repeat'     => __('Tile','the-business-wp'),
					'repeat-x'   => __('Tile Horizontally','the-business-wp'),
					'repeat-y'   => __('Tile Vertically','the-business-wp'),
				);
}

endif;


/**
 * @Package twentyseventeen
 * @subpackage the-business-wp
 * @since the-business-wp 1.0
 */
if ( ! function_exists( 'the_business_wp_posted_on' ) ) : 
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function the_business_wp_posted_on() {
		
		$byline = sprintf(
			// Get the author name; wrap it in a link.
			esc_html_x( 'By %s', 'post author', 'the-business-wp' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);		

		// Finally, let's write all of this to the page.
		echo '<span class="posted-on">' . the_business_wp_time_link() . '</span><span class="byline"> ' . $byline . '</span>';
	}
endif;

/**
 * @Package twentyseventeen
 * @subpackage the-business-wp
 * @since the-business-wp 1.0
 */
if ( ! function_exists( 'the_business_wp_time_link' ) ) :
	/**
	 * Gets a nicely formatted string for the published date.
	 */
	function the_business_wp_time_link() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			get_the_date( DATE_W3C ),
			get_the_date(),
			get_the_modified_date( DATE_W3C ),
			get_the_modified_date()
		);
		
		$args = array( 'time'=> array('class'=> array(),'datetime'=>array()));
		
		$time_string = wp_kses($time_string, $args);
		// Wrap the time string in a link, and preface it with 'Posted on'.
		return sprintf(
			/* translators: %s: post date */
			__( '<span class="screen-reader-text">Posted on</span> %s', 'the-business-wp' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' .$time_string. '</a>'
		);
	}
endif;

/**
 * @Package twentyseventeen
 * @subpackage the-business-wp
 * @since the-business-wp 1.0
 */
if ( ! function_exists( 'the_business_wp_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function the_business_wp_entry_footer() {
	
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'the-business-wp' ) );
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'the-business-wp' ) );
				
		// We don't want to output .entry-footer if it will be empty, so make sure its not.
		if ( ( ( the_business_wp_categorized_blog() && $categories_list ) || $tags_list ) || get_edit_post_link() ) {

			echo '<footer class="entry-footer">';

			if ( 'post' === get_post_type() ) {

				
				if ( ( $categories_list && the_business_wp_categorized_blog() ) || $tags_list ) {
					echo '<span class="cat-tags-links">';

					// Make sure there's more than one category before displaying.
					if ( $categories_list && the_business_wp_categorized_blog() ) {
						
						echo '<span class="cat-links">' . the_business_wp_get_fo( array( 'icon' => 'folder-open' ) ) . '<span class="screen-reader-text">' . esc_html__( 'Categories', 'the-business-wp' ) . '</span>' .$categories_list. '</span>';
					}
					
					if ( $tags_list && ! is_wp_error( $tags_list ) ) {
					
						echo '<span class="tags-links">' . the_business_wp_get_fo( array( 'icon' => 'hashtag' ) ) . '<span class="screen-reader-text">' . esc_html__( 'Tags', 'the-business-wp' ) . '</span>' .$tags_list. '</span>';
					}

					echo '</span>';
				}
			}

			the_business_wp_edit_link();

			echo '</footer> <!-- .entry-footer -->';
		}
	}
endif;

/**
 * @Package twentyseventeen
 * @subpackage the-business-wp
 * @since the-business-wp 1.0
 */
if ( ! function_exists( 'the_business_wp_edit_link' ) ) :
	/**
	 * Returns an accessibility-friendly link to edit a post or page.
	 * Helpful when/if the single-page
	 * layout with multiple posts/pages shown gets confusing.
	 */
	function the_business_wp_edit_link() {
		edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'the-business-wp' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
		);
	}
endif;


if ( ! function_exists( 'the_business_wp_woo_products' ) ){
/**
 * Displays list of woocommerce products in front page
 *
 */
function the_business_wp_woo_products( $products_show, $show_featured=false ) {
	
	if(!class_exists( 'WooCommerce' )){return;}
	//woocommerce products are custom posts named product
	$args = array(
		'post_type' => 'product',
	);
	
	if (empty( $products_show )){ 
	    $args['posts_per_page']= $products_show ;
	}
	else{ 
	    $args['posts_per_page']= 4 ;
	}	
	
	
	//if show featured pages
	if($show_featured){
	$args = array(
		'post_type' => 'product',
		'posts_per_page' => $args['posts_per_page'],
		'tax_query' => array(
				array(
					'taxonomy' => 'product_visibility',
					'field'    => 'name',
					'terms'    => 'featured',
				),
			),
		);
	}
	
	$loop = new WP_Query( $args );
	if ( $loop->have_posts() ) :
	$i = 1;
	
		while ( $loop->have_posts() ) :
			$loop->the_post();
			global $product;
			global $post;
			?>
			<div class="col-md-3 col-sm-3 col-xs-12 ">
				<div class="featured-woo">
					<?php if ( has_post_thumbnail() ) : ?>
					<div class="image-area">
						<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail('full', array( 'alt' => esc_html(get_the_title()) )); ?>
						</a>
					</div>
					<?php endif; ?>		
							
					<div class="woo-featured">
					<?php
					$categories = "";
						if ( function_exists( 'wc_get_product_category_list' ) ) {
								$prod_id = get_the_ID();
								$categories = wc_get_product_category_list( $prod_id );
							} else {
								$categories = $product->get_categories();
							}
					 ?>					
					<span>
					<?php
						$args = array(
							//links
								'a'    => array(
								'href' => array(),
								'target' => array(),
								'rel' => array(),
							)
						);						
						echo wp_kses($categories,$args); 
					?></span>					
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<h4><?php esc_html( the_title() ); ?></h4>
					</a>
					
					<?php if ( $post->post_excerpt ) : ?>
					<div class="woo-product-description">
						<?php echo wp_kses((apply_filters( 'woocommerce_short_description', $post->post_excerpt )), array('p'=> array())); ?>
					</div>
					<?php endif; ?>
							<?php
							
							$price = $product->get_price_html();
							
							if ( ! empty( $price ) ) {

								echo '<h4>';

								echo wp_kses(
									$price, array(
										'span' => array(
											'class' => array(),
										),
										'del' => array(),
									)
								);

								echo '</h4>';

							}
							?>
					
										
					<div class="start-add-to-cart woocommerce button">
						<?php the_business_wp_add_to_cart(); ?>
					</div>										
				</div>
			  </div>				
			</div>
			<?php
			if ( $i % 4 == 0 ) {
				echo '<div class="clearfix"></div>';				
			}
				$i++;
				
		endwhile;
		wp_reset_postdata();
	endif;
 } 
 
}


if ( ! function_exists( 'the_business_wp_free_checkout_fields' ) ) :
/**
 * Removes coupon form, order notes, and several billing fields if the checkout doesn't require payment.
 */
function the_business_wp_free_checkout_fields() {
 	if (!class_exists( 'WooCommerce' ) ) {return;}
	// first, bail if the cart needs payment, we don't want to do anything
	if ( WC()->cart && WC()->cart->needs_payment() ) {
		return;	
	}
	// now continue only if we're at checkout
	// is_checkout() was broken as of WC 3.2 in ajax context, double-check for is_ajax
	if ( function_exists( 'is_checkout' ) && ( is_checkout() || is_ajax() ) ) {
		// remove coupon forms since why would you want a coupon for a free cart??
		remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
		// Remove the "Additional Info" order notes
		add_filter( 'woocommerce_enable_order_notes_field', '__return_false' );
		// Unset the fields we don't want in a free checkout
		function the_business_wp_unset_unwanted_checkout_fields( $fields ) {
			// add or remove billing fields you do not want
			// fields: http://docs.woothemes.com/document/tutorial-customising-checkout-fields-using-actions-and-filters/#section-2
			$billing_keys = array(
				'billing_first_name',
				'billing_last_name',
				'billing_email',
				'billing_company',
				'billing_company',
				'billing_phone',
				'billing_address_1',
				'billing_address_2',
				'billing_city',
				'billing_postcode',
				'billing_country',
				'billing_state',
			);
			// unset each of those unwanted fields
			foreach( $billing_keys as $key ) {
				unset( $fields['billing'][ $key ] );
			}
			return $fields;
		}
		add_filter( 'woocommerce_checkout_fields', 'the_business_wp_unset_unwanted_checkout_fields' );
	}
}
endif;

//remove some free checkout feelds for free products
global $the_business_wp_option;
if(class_exists( 'WooCommerce' ) && $the_business_wp_option['woocommerce_free_checkout_feelds']){
	add_action( 'wp', 'the_business_wp_free_checkout_fields' );
}

/**
 * Woocommerce Custom add to cart button
 *
 */
if ( ! function_exists( 'the_business_wp_add_to_cart' ) ) {
	function the_business_wp_add_to_cart() {
		
		if(!class_exists( 'WooCommerce' )){return;}
		global $product;

		if ( function_exists( 'method_exists' ) && method_exists( $product, 'get_type' ) ) {
			$prod_type = $product->get_type();
		} else {
			$prod_type = $product->product_type;
		}

		if ( function_exists( 'method_exists' ) && method_exists( $product, 'get_stock_status' ) ) {
			$prod_in_stock = $product->get_stock_status();
		} else {
			$prod_in_stock = $product->is_in_stock();
		}

		if ( $product ) {
			$args = array();
			$defaults = array(
				'quantity' => 1,
				'class'    => implode(
					' ', array_filter(
						array(
							'button',
							'product_type_' . $prod_type,
							$product->is_purchasable() && $prod_in_stock ? 'add_to_cart_button' : '',
							$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
						)
					)
				),
			);

			$args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );

			wc_get_template( 'woocommerce/add-to-cart.php', $args );
		}
	}
}

if ( ! function_exists( 'the_business_wp_wc_custom_get_price_html' ) ) :
/* when price empty return 0$ */
function the_business_wp_wc_custom_get_price_html( $price, $product ) {
	if(!class_exists( 'WooCommerce' )){return;}
	if ( $product->get_price() == 0 ) {
		if ( $product->is_on_sale() && $product->get_regular_price() ) {
			$regular_price = wc_get_price_to_display( $product, array( 'qty' => 1, 'price' => $product->get_regular_price() ) );
			$price = wc_format_price_range( $regular_price, __( 'Free!', 'the-business-wp' ) );
		} else {
			$price = '<span class="amount">' . __( 'Free!', 'the-business-wp' ) . '</span>';
		}
	}

	return $price;
}
endif;

add_filter( 'woocommerce_get_price_html', 'the_business_wp_wc_custom_get_price_html', 10, 2 );

/**
 * Add Cart icon and count to header if WC is active
 */
function the_business_wp_wc_cart_count() {
 
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
 
        //$count = WC()->cart->cart_contents_count;
		$count = WC()->cart->get_cart_total();
        ?><a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('View your shopping cart','the-business-wp' ); ?>">
            <span class="cart-contents-count"><?php echo absint($count); ?></span>
           </a>
		<?php
    } else {
	?>
	<span class="cart-contents-count">0</span>
    </a>	
	<?php
	}
 
}
add_action( 'the_business_wp_woocommerce_cart_top', 'the_business_wp_wc_cart_count' );

if ( ! function_exists( 'the_business_wp_add_to_cart_fragment' ) ) :
/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
function the_business_wp_add_to_cart_fragment( $fragments ) {
 
    ob_start();
    $count = WC()->cart->cart_contents_count;
    ?><a class="cart-contents" href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>" title="<?php esc_attr_e( 'View your shopping cart','the-business-wp' ); ?>">
	<span class="cart-contents-count"><?php echo absint($count); ?></span>
    </a><?php
 
    $fragments['a.cart-contents'] = ob_get_clean(); 
     
    return $fragments;
}
endif;

add_filter( 'woocommerce_add_to_cart_fragments', 'the_business_wp_add_to_cart_fragment' );

/**
 *Returns true if a blog has more than 1 category.
 * @Package twentyseventeen
 * @subpackage the-business-wp
 * @since the-business-wp 1.0
 */
function the_business_wp_categorized_blog() {
	$category_count = get_transient( 'the_business_wp_categories' );

	if ( false === $category_count ) {
		// Create an array of all the categories that are attached to posts.
		$categories = get_categories(
			array(
				'fields'     => 'ids',
				'hide_empty' => 1,
				// We only need to know if there is more than one category.
				'number'     => 2,
			)
		);

		// Count the number of categories that are attached to the posts.
		$category_count = count( $categories );

		set_transient( 'the_business_wp_categories', $category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $category_count > 1;
}



/**
 * Flush out the transients used in the_business_wp_categorized_blog.
 * @Package twentyseventeen
 * @subpackage the-business-wp
 * @since the-business-wp 1.0
 */

function the_business_wp_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'the_business_wp_categories' );
}
add_action( 'edit_category', 'the_business_wp_category_transient_flusher' );
add_action( 'save_post', 'the_business_wp_category_transient_flusher' );

if ( ! function_exists( 'the_business_wp_font_family' ) ) :
function the_business_wp_font_family(){

	$google_fonts = array("Times New Roman, Sans Serif" => "Times New Roman, Sans Serif","ABeeZee" => "ABeeZee","Abel" => "Abel","Abril Fatface" => "Abril Fatface","Aclonica" => "Aclonica","Acme" => "Acme","Actor" => "Actor","Adamina" => "Adamina","Advent Pro" => "Advent Pro","Aguafina Script" => "Aguafina Script","Akronim" => "Akronim","Aladin" => "Aladin","Aldrich" => "Aldrich","Alegreya" => "Alegreya","Alegreya SC" => "Alegreya SC","Alex Brush" => "Alex Brush","Alfa Slab One" => "Alfa Slab One","Alice" => "Alice","Alike" => "Alike","Alike Angular" => "Alike Angular","Allan" => "Allan","Allerta" => "Allerta","Allerta Stencil" => "Allerta Stencil","Allura" => "Allura","Almendra" => "Almendra","Almendra Display" => "Almendra Display","Almendra SC" => "Almendra SC","Amarante" => "Amarante","Amaranth" => "Amaranth","Amatic SC" => "Amatic SC","Amethysta" => "Amethysta","Anaheim" => "Anaheim","Andada" => "Andada","Andika" => "Andika","Angkor" => "Angkor","Annie Use Your Telescope" => "Annie Use Your Telescope","Anonymous Pro" => "Anonymous Pro","Antic" => "Antic","Antic Didone" => "Antic Didone","Antic Slab" => "Antic Slab","Anton" => "Anton","Arapey" => "Arapey","Arbutus" => "Arbutus","Arbutus Slab" => "Arbutus Slab","Architects Daughter" => "Architects Daughter","Archivo Black" => "Archivo Black","Archivo Narrow" => "Archivo Narrow","Arimo" => "Arimo","Arizonia" => "Arizonia","Armata" => "Armata","Artifika" => "Artifika","Arvo" => "Arvo","Asap" => "Asap","Asset" => "Asset","Astloch" => "Astloch","Asul" => "Asul","Atomic Age" => "Atomic Age","Aubrey" => "Aubrey","Audiowide" => "Audiowide","Autour One" => "Autour One","Average" => "Average","Average Sans" => "Average Sans","Averia Gruesa Libre" => "Averia Gruesa Libre","Averia Libre" => "Averia Libre","Averia Sans Libre" => "Averia Sans Libre","Averia Serif Libre" => "Averia Serif Libre","Bad Script" => "Bad Script","Balthazar" => "Balthazar","Bangers" => "Bangers","Basic" => "Basic","Battambang" => "Battambang","Baumans" => "Baumans","Bayon" => "Bayon","Belgrano" => "Belgrano","Belleza" => "Belleza","BenchNine" => "BenchNine","Bentham" => "Bentham","Berkshire Swash" => "Berkshire Swash","Bevan" => "Bevan","Bigelow Rules" => "Bigelow Rules","Bigshot One" => "Bigshot One","Bilbo" => "Bilbo","Bilbo Swash Caps" => "Bilbo Swash Caps","Bitter" => "Bitter","Black Ops One" => "Black Ops One","Bokor" => "Bokor","Bonbon" => "Bonbon","Boogaloo" => "Boogaloo","Bowlby One" => "Bowlby One","Bowlby One SC" => "Bowlby One SC","Brawler" => "Brawler","Bree Serif" => "Bree Serif","Bubblegum Sans" => "Bubblegum Sans","Bubbler One" => "Bubbler One","Buda" => "Buda","Buenard" => "Buenard","Butcherman" => "Butcherman","Butterfly Kids" => "Butterfly Kids","Cabin" => "Cabin","Cabin Condensed" => "Cabin Condensed","Cabin Sketch" => "Cabin Sketch","Caesar Dressing" => "Caesar Dressing","Cagliostro" => "Cagliostro","Calligraffitti" => "Calligraffitti","Cambo" => "Cambo","Candal" => "Candal","Cantarell" => "Cantarell","Cantata One" => "Cantata One","Cantora One" => "Cantora One","Capriola" => "Capriola","Cardo" => "Cardo","Carme" => "Carme","Carrois Gothic" => "Carrois Gothic","Carrois Gothic SC" => "Carrois Gothic SC","Carter One" => "Carter One","Caudex" => "Caudex","Cedarville Cursive" => "Cedarville Cursive","Ceviche One" => "Ceviche One","Changa One" => "Changa One","Chango" => "Chango","Chau Philomene One" => "Chau Philomene One","Chela One" => "Chela One","Chelsea Market" => "Chelsea Market","Chenla" => "Chenla","Cherry Cream Soda" => "Cherry Cream Soda","Cherry Swash" => "Cherry Swash","Chewy" => "Chewy","Chicle" => "Chicle","Chivo" => "Chivo","Cinzel" => "Cinzel","Cinzel Decorative" => "Cinzel Decorative","Clicker Script" => "Clicker Script","Coda" => "Coda","Coda Caption" => "Coda Caption","Codystar" => "Codystar","Combo" => "Combo","Comfortaa" => "Comfortaa","Coming Soon" => "Coming Soon","Concert One" => "Concert One","Condiment" => "Condiment","Content" => "Content","Contrail One" => "Contrail One","Convergence" => "Convergence","Cookie" => "Cookie","Copse" => "Copse","Corben" => "Corben","Courgette" => "Courgette","Cousine" => "Cousine","Coustard" => "Coustard","Covered By Your Grace" => "Covered By Your Grace","Crafty Girls" => "Crafty Girls","Creepster" => "Creepster","Crete Round" => "Crete Round","Crimson Text" => "Crimson Text","Croissant One" => "Croissant One","Crushed" => "Crushed","Cuprum" => "Cuprum","Cutive" => "Cutive","Cutive Mono" => "Cutive Mono","Damion" => "Damion","Dancing Script" => "Dancing Script","Dangrek" => "Dangrek","Dawning of a New Day" => "Dawning of a New Day","Days One" => "Days One","Delius" => "Delius","Delius Swash Caps" => "Delius Swash Caps","Delius Unicase" => "Delius Unicase","Della Respira" => "Della Respira","Denk One" => "Denk One","Devonshire" => "Devonshire","Didact Gothic" => "Didact Gothic","Diplomata" => "Diplomata","Diplomata SC" => "Diplomata SC","Domine" => "Domine","Donegal One" => "Donegal One","Doppio One" => "Doppio One","Dorsa" => "Dorsa","Dosis" => "Dosis","Dr Sugiyama" => "Dr Sugiyama","Droid Sans" => "Droid Sans","Droid Sans Mono" => "Droid Sans Mono","Droid Serif" => "Droid Serif","Duru Sans" => "Duru Sans","Dynalight" => "Dynalight","EB Garamond" => "EB Garamond","Eagle Lake" => "Eagle Lake","Eater" => "Eater","Ek Mukta"=>"Ek Mukta","Economica" => "Economica","Electrolize" => "Electrolize","Elsie" => "Elsie","Elsie Swash Caps" => "Elsie Swash Caps","Emblema One" => "Emblema One","Emilys Candy" => "Emilys Candy","Engagement" => "Engagement","Englebert" => "Englebert","Enriqueta" => "Enriqueta","Erica One" => "Erica One","Esteban" => "Esteban","Euphoria Script" => "Euphoria Script","Ewert" => "Ewert","Exo" => "Exo","Expletus Sans" => "Expletus Sans","Fanwood Text" => "Fanwood Text","Fascinate" => "Fascinate","Fascinate Inline" => "Fascinate Inline","Faster One" => "Faster One","Fasthand" => "Fasthand","Federant" => "Federant","Federo" => "Federo","Felipa" => "Felipa","Fenix" => "Fenix","Finger Paint" => "Finger Paint","Fjalla One" => "Fjalla One","Fjord One" => "Fjord One","Flamenco" => "Flamenco","Flavors" => "Flavors","Fondamento" => "Fondamento","Fontdiner Swanky" => "Fontdiner Swanky","Forum" => "Forum","Francois One" => "Francois One","Freckle Face" => "Freckle Face","Fredericka the Great" => "Fredericka the Great","Fredoka One" => "Fredoka One","Freehand" => "Freehand","Fresca" => "Fresca","Frijole" => "Frijole","Fruktur" => "Fruktur","Fugaz One" => "Fugaz One","GFS Didot" => "GFS Didot","GFS Neohellenic" => "GFS Neohellenic","Gabriela" => "Gabriela","Gafata" => "Gafata","Galdeano" => "Galdeano","Galindo" => "Galindo","Gentium Basic" => "Gentium Basic","Gentium Book Basic" => "Gentium Book Basic","Geo" => "Geo","Geostar" => "Geostar","Geostar Fill" => "Geostar Fill","Germania One" => "Germania One","Gilda Display" => "Gilda Display","Give You Glory" => "Give You Glory","Glass Antiqua" => "Glass Antiqua","Glegoo" => "Glegoo","Gloria Hallelujah" => "Gloria Hallelujah","Goblin One" => "Goblin One","Gochi Hand" => "Gochi Hand","Gorditas" => "Gorditas","Goudy Bookletter 1911" => "Goudy Bookletter 1911","Graduate" => "Graduate","Grand Hotel" => "Grand Hotel","Gravitas One" => "Gravitas One","Great Vibes" => "Great Vibes","Griffy" => "Griffy","Gruppo" => "Gruppo","Gudea" => "Gudea","Habibi" => "Habibi","Hammersmith One" => "Hammersmith One","Hanalei" => "Hanalei","Hanalei Fill" => "Hanalei Fill","Handlee" => "Handlee","Hanuman" => "Hanuman","Happy Monkey" => "Happy Monkey","Headland One" => "Headland One","Henny Penny" => "Henny Penny","Herr Von Muellerhoff" => "Herr Von Muellerhoff","Holtwood One SC" => "Holtwood One SC","Homemade Apple" => "Homemade Apple","Homenaje" => "Homenaje","IM Fell DW Pica" => "IM Fell DW Pica","IM Fell DW Pica SC" => "IM Fell DW Pica SC","IM Fell Double Pica" => "IM Fell Double Pica","IM Fell Double Pica SC" => "IM Fell Double Pica SC","IM Fell English" => "IM Fell English","IM Fell English SC" => "IM Fell English SC","IM Fell French Canon" => "IM Fell French Canon","IM Fell French Canon SC" => "IM Fell French Canon SC","IM Fell Great Primer" => "IM Fell Great Primer","IM Fell Great Primer SC" => "IM Fell Great Primer SC","Iceberg" => "Iceberg","Iceland" => "Iceland","Imprima" => "Imprima","Inconsolata" => "Inconsolata","Inder" => "Inder","Indie Flower" => "Indie Flower","Inika" => "Inika","Irish Grover" => "Irish Grover","Istok Web" => "Istok Web","Italiana" => "Italiana","Italianno" => "Italianno","Jacques Francois" => "Jacques Francois","Jacques Francois Shadow" => "Jacques Francois Shadow","Jim Nightshade" => "Jim Nightshade","Jockey One" => "Jockey One","Jolly Lodger" => "Jolly Lodger","Josefin Sans" => "Josefin Sans","Josefin Slab" => "Josefin Slab","Joti One" => "Joti One","Judson" => "Judson","Julee" => "Julee","Julius Sans One" => "Julius Sans One","Junge" => "Junge","Jura" => "Jura","Just Another Hand" => "Just Another Hand","Just Me Again Down Here" => "Just Me Again Down Here","Kameron" => "Kameron","Karla" => "Karla","Kaushan Script" => "Kaushan Script","Kavoon" => "Kavoon","Keania One" => "Keania One","Kelly Slab" => "Kelly Slab","Kenia" => "Kenia","Khmer" => "Khmer","Kite One" => "Kite One","Knewave" => "Knewave","Kotta One" => "Kotta One","Koulen" => "Koulen","Kranky" => "Kranky","Kreon" => "Kreon","Kristi" => "Kristi","Krona One" => "Krona One","La Belle Aurore" => "La Belle Aurore","Lancelot" => "Lancelot","Lato" => "Lato","League Script" => "League Script","Leckerli One" => "Leckerli One","Ledger" => "Ledger","Lekton" => "Lekton","Lemon" => "Lemon","Libre Baskerville" => "Libre Baskerville","Life Savers" => "Life Savers","Lilita One" => "Lilita One","Limelight" => "Limelight","Linden Hill" => "Linden Hill","Lobster" => "Lobster","Lobster Two" => "Lobster Two","Londrina Outline" => "Londrina Outline","Londrina Shadow" => "Londrina Shadow","Londrina Sketch" => "Londrina Sketch","Londrina Solid" => "Londrina Solid","Lora" => "Lora","Love Ya Like A Sister" => "Love Ya Like A Sister","Loved by the King" => "Loved by the King","Lovers Quarrel" => "Lovers Quarrel","Luckiest Guy" => "Luckiest Guy","Lusitana" => "Lusitana","Lustria" => "Lustria","Macondo" => "Macondo","Macondo Swash Caps" => "Macondo Swash Caps","Magra" => "Magra","Maiden Orange" => "Maiden Orange","Mako" => "Mako","Marcellus" => "Marcellus","Marcellus SC" => "Marcellus SC","Marck Script" => "Marck Script","Margarine" => "Margarine","Marko One" => "Marko One","Marmelad" => "Marmelad","Marvel" => "Marvel","Mate" => "Mate","Mate SC" => "Mate SC","Maven Pro" => "Maven Pro","McLaren" => "McLaren","Meddon" => "Meddon","MedievalSharp" => "MedievalSharp","Medula One" => "Medula One","Megrim" => "Megrim","Meie Script" => "Meie Script","Merienda" => "Merienda","Merienda One" => "Merienda One","Merriweather" => "Merriweather","Merriweather Sans" => "Merriweather Sans","Metal" => "Metal","Metal Mania" => "Metal Mania","Metamorphous" => "Metamorphous","Metrophobic" => "Metrophobic","Michroma" => "Michroma","Milonga" => "Milonga","Miltonian" => "Miltonian","Miltonian Tattoo" => "Miltonian Tattoo","Miniver" => "Miniver","Miss Fajardose" => "Miss Fajardose","Modern Antiqua" => "Modern Antiqua","Molengo" => "Molengo","Molle" => "Molle","Monda" => "Monda","Monofett" => "Monofett","Monoton" => "Monoton","Monsieur La Doulaise" => "Monsieur La Doulaise","Montaga" => "Montaga","Montez" => "Montez","Montserrat" => "Montserrat","Montserrat Alternates" => "Montserrat Alternates","Montserrat Subrayada" => "Montserrat Subrayada","Moul" => "Moul","Moulpali" => "Moulpali","Mountains of Christmas" => "Mountains of Christmas","Mouse Memoirs" => "Mouse Memoirs","Mr Bedfort" => "Mr Bedfort","Mr Dafoe" => "Mr Dafoe","Mr De Haviland" => "Mr De Haviland","Mrs Saint Delafield" => "Mrs Saint Delafield","Mrs Sheppards" => "Mrs Sheppards","Muli" => "Muli","Mystery Quest" => "Mystery Quest","Neucha" => "Neucha","Neuton" => "Neuton","New Rocker" => "New Rocker","News Cycle" => "News Cycle","Niconne" => "Niconne","Nixie One" => "Nixie One","Nobile" => "Nobile","Nokora" => "Nokora","Norican" => "Norican","Nosifer" => "Nosifer","Nothing You Could Do" => "Nothing You Could Do","Noticia Text" => "Noticia Text","Nova Cut" => "Nova Cut","Nova Flat" => "Nova Flat","Nova Mono" => "Nova Mono","Nova Oval" => "Nova Oval","Nova Round" => "Nova Round","Nova Script" => "Nova Script","Nova Slim" => "Nova Slim","Nova Square" => "Nova Square","Numans" => "Numans","Nunito" => "Nunito","Odor Mean Chey" => "Odor Mean Chey","Offside" => "Offside","Old Standard TT" => "Old Standard TT","Oldenburg" => "Oldenburg","Oleo Script" => "Oleo Script","Oleo Script Swash Caps" => "Oleo Script Swash Caps","Open Sans" => "Open Sans","Open Sans Condensed" => "Open Sans Condensed","Oranienbaum" => "Oranienbaum","Orbitron" => "Orbitron","Oregano" => "Oregano","Orienta" => "Orienta","Original Surfer" => "Original Surfer","Oswald" => "Oswald","Over the Rainbow" => "Over the Rainbow","Overlock" => "Overlock","Overlock SC" => "Overlock SC","Ovo" => "Ovo","Oxygen" => "Oxygen","Oxygen Mono" => "Oxygen Mono","PT Mono" => "PT Mono","PT Sans" => "PT Sans","PT Sans Caption" => "PT Sans Caption","PT Sans Narrow" => "PT Sans Narrow","PT Serif" => "PT Serif","PT Serif Caption" => "PT Serif Caption","Pacifico" => "Pacifico","Paprika" => "Paprika","Parisienne" => "Parisienne","Passero One" => "Passero One","Passion One" => "Passion One","Patrick Hand" => "Patrick Hand","Patrick Hand SC" => "Patrick Hand SC","Patua One" => "Patua One","Paytone One" => "Paytone One","Peralta" => "Peralta","Permanent Marker" => "Permanent Marker","Petit Formal Script" => "Petit Formal Script","Petrona" => "Petrona","Philosopher" => "Philosopher","Piedra" => "Piedra","Pinyon Script" => "Pinyon Script","Pirata One" => "Pirata One","Plaster" => "Plaster","Play" => "Play","Playball" => "Playball","Playfair Display" => "Playfair Display","Playfair Display SC" => "Playfair Display SC","Podkova" => "Podkova","Poiret One" => "Poiret One","Poller One" => "Poller One","Poly" => "Poly","Pompiere" => "Pompiere","Pontano Sans" => "Pontano Sans","Port Lligat Sans" => "Port Lligat Sans","Port Lligat Slab" => "Port Lligat Slab","Prata" => "Prata","Preahvihear" => "Preahvihear","Press Start 2P" => "Press Start 2P","Princess Sofia" => "Princess Sofia","Prociono" => "Prociono","Prosto One" => "Prosto One","Puritan" => "Puritan","Purple Purse" => "Purple Purse","Quando" => "Quando","Quantico" => "Quantico","Quattrocento" => "Quattrocento","Quattrocento Sans" => "Quattrocento Sans","Questrial" => "Questrial","Quicksand" => "Quicksand","Quintessential" => "Quintessential","Qwigley" => "Qwigley","Racing Sans One" => "Racing Sans One","Radley" => "Radley","Raleway" => "Raleway","Raleway Dots" => "Raleway Dots","Rambla" => "Rambla","Rammetto One" => "Rammetto One","Ranchers" => "Ranchers","Rancho" => "Rancho","Rationale" => "Rationale","Redressed" => "Redressed","Reenie Beanie" => "Reenie Beanie","Revalia" => "Revalia","Ribeye" => "Ribeye","Ribeye Marrow" => "Ribeye Marrow","Righteous" => "Righteous","Risque" => "Risque","Roboto" => "Roboto","Roboto Slab" => "Roboto Slab","Roboto Condensed" => "Roboto Condensed","Rochester" => "Rochester","Rock Salt" => "Rock Salt","Rokkitt" => "Rokkitt","Romanesco" => "Romanesco","Ropa Sans" => "Ropa Sans","Rosario" => "Rosario","Rosarivo" => "Rosarivo","Rouge Script" => "Rouge Script","Ruda" => "Ruda","Rufina" => "Rufina","Ruge Boogie" => "Ruge Boogie","Ruluko" => "Ruluko","Rum Raisin" => "Rum Raisin","Ruslan Display" => "Ruslan Display","Russo One" => "Russo One","Ruthie" => "Ruthie","Rye" => "Rye","Sacramento" => "Sacramento","Sail" => "Sail","Salsa" => "Salsa","Sanchez" => "Sanchez","Sancreek" => "Sancreek","Sansita One" => "Sansita One","Sarina" => "Sarina","Satisfy" => "Satisfy","Scada" => "Scada","Schoolbell" => "Schoolbell","Seaweed Script" => "Seaweed Script","Sevillana" => "Sevillana","Seymour One" => "Seymour One","Shadows Into Light" => "Shadows Into Light","Shadows Into Light Two" => "Shadows Into Light Two","Shanti" => "Shanti","Share" => "Share","Share Tech" => "Share Tech","Share Tech Mono" => "Share Tech Mono","Shojumaru" => "Shojumaru","Short Stack" => "Short Stack","Siemreap" => "Siemreap","Sigmar One" => "Sigmar One","Signika" => "Signika","Signika Negative" => "Signika Negative","Simonetta" => "Simonetta","Sintony" => "Sintony","Sirin Stencil" => "Sirin Stencil","Six Caps" => "Six Caps","Skranji" => "Skranji","Slackey" => "Slackey","Smokum" => "Smokum","Smythe" => "Smythe","Sniglet" => "Sniglet","Snippet" => "Snippet","Snowburst One" => "Snowburst One","Sofadi One" => "Sofadi One","Sofia" => "Sofia","Sonsie One" => "Sonsie One","Sorts Mill Goudy" => "Sorts Mill Goudy","Source Code Pro" => "Source Code Pro","Source Sans Pro" => "Source Sans Pro","Special Elite" => "Special Elite","Spicy Rice" => "Spicy Rice","Spinnaker" => "Spinnaker","Spirax" => "Spirax","Squada One" => "Squada One","Stalemate" => "Stalemate","Stalinist One" => "Stalinist One","Stardos Stencil" => "Stardos Stencil","Stint Ultra Condensed" => "Stint Ultra Condensed","Stint Ultra Expanded" => "Stint Ultra Expanded","Stoke" => "Stoke","Strait" => "Strait","Sue Ellen Francisco" => "Sue Ellen Francisco","Sunshiney" => "Sunshiney","Supermercado One" => "Supermercado One","Suwannaphum" => "Suwannaphum","Swanky and Moo Moo" => "Swanky and Moo Moo","Syncopate" => "Syncopate","Tangerine" => "Tangerine","Taprom" => "Taprom","Tauri" => "Tauri","Telex" => "Telex","Tenor Sans" => "Tenor Sans","Text Me One" => "Text Me One","The Girl Next Door" => "The Girl Next Door","Tienne" => "Tienne","Tinos" => "Tinos","Titan One" => "Titan One","Titillium Web" => "Titillium Web","Trade Winds" => "Trade Winds","Trocchi" => "Trocchi","Trochut" => "Trochut","Trykker" => "Trykker","Tulpen One" => "Tulpen One","Ubuntu" => "Ubuntu","Ubuntu Condensed" => "Ubuntu Condensed","Ubuntu Mono" => "Ubuntu Mono","Ultra" => "Ultra","Uncial Antiqua" => "Uncial Antiqua","Underdog" => "Underdog","Unica One" => "Unica One","UnifrakturCook" => "UnifrakturCook","UnifrakturMaguntia" => "UnifrakturMaguntia","Unkempt" => "Unkempt","Unlock" => "Unlock","Unna" => "Unna","VT323" => "VT323","Vampiro One" => "Vampiro One","Varela" => "Varela","Varela Round" => "Varela Round","Vast Shadow" => "Vast Shadow","Vibur" => "Vibur","Vidaloka" => "Vidaloka","Viga" => "Viga","Voces" => "Voces","Volkhov" => "Volkhov","Vollkorn" => "Vollkorn","Voltaire" => "Voltaire","Waiting for the Sunrise" => "Waiting for the Sunrise","Wallpoet" => "Wallpoet","Walter Turncoat" => "Walter Turncoat","Warnes" => "Warnes","Wellfleet" => "Wellfleet","Wendy One" => "Wendy One","Wire One" => "Wire One","Yanone Kaffeesatz" => "Yanone Kaffeesatz","Yellowtail" => "Yellowtail","Yeseva One" => "Yeseva One","Yesteryear" => "Yesteryear","Zeyada" => "Zeyada",
		);
	return $google_fonts;
}
endif;

function the_business_wp_footer_foreground_css(){

	$color =  esc_attr(get_theme_mod( 'footer_foreground_color','#fff')) ;
	$theme_color = '#2d89ef';
	
	if ( 'default' == get_theme_mod( 'colorscheme','default' )) {
    	$theme_color = esc_attr(get_theme_mod( 'colorscheme_color','#2d89ef')) ;
	}
	
	/**
	 *
	 * @since business-wp 1.0
	 *
	 */

$css                = '

.footer-foreground {}
.footer-foreground .widget-title, 
.footer-foreground a, 
.footer-foreground p, 
.footer-foreground li,
.footer-foreground table,
.footer-foreground .widget
{
  color:'.$color.';
}

.footer-foreground a:hover, .footer-foreground a:active {color:'.$theme_color.';}

';

return $css;

}