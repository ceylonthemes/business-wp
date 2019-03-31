<?php

/************************
* Woocommerce Settings  *
*************************/

		$wp_customize->add_section( 'woocommerce_section' , array(
			'title'      => __('Shop', 'the-business-wp' ),			 
			'description'=>  __('First, create a page from home-page template, From Home page settings select the created page as static home page. Show Products in your front page. First install woocommerce plugin, then add products. Need more product templates and sidebar Go Pro Version', 'the-business-wp' ),
			'panel' => 'theme_options',
		) );
			
	
        // woocommerce cart show/hide
		$wp_customize->add_setting( 'the_business_wp_option[woocommerce_header_cart_hide]' , array(
		'default'    => 0,
		'sanitize_callback' => 'the_business_wp_sanitize_checkbox',
		'type'=>'option'
		));
		
		
		// background Alpha Color Picker setting
		$wp_customize->add_setting(
			'the_business_wp_option[woocommerce_section_background_color]',
			array(
				'default'     => '#ffffff',
				'type'        => 'option',			
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		
		// background Alpha Color Picker control
		$wp_customize->add_control(
			new The_Business_WP_Color_Control(
				$wp_customize,
				'the_business_wp_option[woocommerce_section_background_color]',
				array(
					'label'         =>  __('Section Background Color','the-business-wp' ),
					'section'       => 'woocommerce_section',
					'settings'      => 'the_business_wp_option[woocommerce_section_background_color]',
					'show_opacity'  => true, // Optional.
					'palette'	=> the_business_wp_color_codes(),
				)
			)
		);		
		
		//hide cart
		$wp_customize->add_control('the_business_wp_option[woocommerce_header_cart_hide]' , array(
		'label' => __('Hide Mini Cart in Header','the-business-wp' ),
		'section' => 'woocommerce_section',
		'type'=>'checkbox',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'the_business_wp_option[woocommerce_header_cart_hide]', array(
			'selector' => '#cart-top .cart-container',
		) );
		
        // woocommerce free checkout
		$wp_customize->add_setting( 'the_business_wp_option[woocommerce_free_checkout_feelds]' , array(
		'default'    => 1,		
		'sanitize_callback' => 'the_business_wp_sanitize_checkbox',
		'type'=>'option'
		));
		
		$wp_customize->add_control('the_business_wp_option[woocommerce_free_checkout_feelds]' , array(
		'label' => __('(Disable Checkout Fields for Free products/Price=0)','the-business-wp' ),
		'section' => 'woocommerce_section',
		'type'=>'checkbox',
		) );		
		
		// woocommerce section title
		$wp_customize->add_setting( 'the_business_wp_option[woocommerce_section_title]' , array(
		'default'    => __('Shop','the-business-wp' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));
		
		$wp_customize->add_control('the_business_wp_option[woocommerce_section_title]' , array(
		'label' => __('Section Title','the-business-wp' ),
		'section' => 'woocommerce_section',
		'type'=>'text',
		) );		
		
		$wp_customize->selective_refresh->add_partial( 'the_business_wp_option[woocommerce_section_title]', array(
			'selector' => '#woocommerce .section-title',
		) );
		
		// woocommerce Section Subtitle
		$wp_customize->add_setting( 'the_business_wp_option[woocommerce_section_description]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));
		
		$wp_customize->add_control('the_business_wp_option[woocommerce_section_description]' , array(
		'label' => __('Section Subtitle','the-business-wp' ),
		'section' => 'woocommerce_section',
		'type'=>'text',
		) );
		
		// product type type
		$wp_customize->add_setting( 'the_business_wp_option[woocommerce_section_product_type]' , array(
		'default'    => 'all',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[woocommerce_section_product_type]' , array(
		'label' => __('Product Type to Show','the-business-wp' ),
		'section' => 'woocommerce_section',
		'type'=>'select',
		'choices'=>array(
			'featured'=>__('Featured Products','the-business-wp' ),
			'all'=>__('All products','the-business-wp' ),
		),
		) );		
		
		// no of products to show
		$wp_customize->add_setting( 'the_business_wp_option[woocommerce_products_show]' , array(
		'default'    => 8,
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[woocommerce_products_show]' , array(
		'label' => __('Number of Products to Show','the-business-wp' ),
		'section' => 'woocommerce_section',
		'type'=>'number',
		) );
		
		// woocommerce section image
		$wp_customize->add_setting( 'the_business_wp_option[woocommerce_section_image]' , array(
		'default' => '',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type'=>'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'the_business_wp_option[woocommerce_section_image]' ,
		array(
		'label'          => __( 'Shop Section Image', 'the-business-wp' ),
		'description'=> __('Upload your background image. Important! Uncompressed images will increase your site loading time.','the-business-wp'),
		'section'        => 'woocommerce_section',
		) )	);
		
		$wp_customize->add_setting( 'the_business_wp_option[woocommerce_section_image_repeat]', array(
			'default'        => 'no-repeat',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
		) );
		
		$wp_customize->add_control(
			'the_business_wp_option[woocommerce_section_image_repeat]', 
			array(
				'label'    => __( 'Background Repeat', 'the-business-wp' ),
				'section'  => 'woocommerce_section',
				'settings' => 'the_business_wp_option[woocommerce_section_image_repeat]',
				'type'     => 'select',
				'choices'  => the_business_wp_background_style(),
			)
		);
