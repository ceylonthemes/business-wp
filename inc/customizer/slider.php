<?php

/* Slider Settings */
		$wp_customize->add_section( 'slider_section' , array(
			'title'      => __('Featured Slider', 'the-business-wp' ),			
			'description'=> __('First, create a page from home-page template, From Home page settings select the created page as static home page. Create posts with featured image title and text, and select from post dropdown list below. Need Unlimited sliders and customizations Go Pro version.', 'the-business-wp' ),
			'panel' => 'theme_options',
		) );
	
	
		// slider default animation type !default value not seen by user !should not translate
		$wp_customize->add_setting( 'the_business_wp_option[slider_animation_type]' , array(
		'default'    => 'fade',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[slider_animation_type]' , array(
		'label' => __('Slider Effects','the-business-wp' ),
		'section' => 'slider_section',
		'type'=>'select',
		'choices'=>array(
			'slide'=>__('Slide','the-business-wp'),
			'fade'=>__('Fade','the-business-wp'),
		),
		) );
		
		// slider speed
		$wp_customize->add_setting( 'the_business_wp_option[slider_speed]' , array(
		'default'    => 3000,
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[slider_speed]' , array(
		'label' => __('Slider animation speed(ms)','the-business-wp' ),
		'section' => 'slider_section',
		'type'=>'select',
		'choices'=>array(
			500 => 500,
			1000 => 1000,
			2000 => 2000,
			3000 => 3000,
			4000 => 4000,
			5000 => 5000,
			6000 => 6000,
			7000 => 7000,
			8000 => 8000,
			9000 => 9000,
			10000 => 10000,
			20000 => 20000,
			40000 => 40000,
			80000 => 80000,
			120000 => 120000,
		),
		) );
		
	
		// service button title
		$wp_customize->add_setting( 'the_business_wp_option[slider_button_text]' , array(
		'default'    => __('Click Here to Begin','the-business-wp' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[slider_button_text]' , array(
		'label' => __('Featured Button text','the-business-wp' ),
		'section' => 'slider_section',
		'type'=>'text',
		) );		
		
		// service button url
		$wp_customize->add_setting( 'the_business_wp_option[slider_button_url]' , array(
		'default'    => '#service',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[slider_button_url]' , array(
		'label' => __('Featured Button URL','the-business-wp' ),
		'section' => 'slider_section',
		'type'=>'text',
		) );			

        $wp_customize->add_setting( 'slider_label1', array(
			'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control( new the_business_wp_Label_Custom_control( $wp_customize, 'slider_label1', array(
            'label'   => __('Select existing Posts with featured image, title and a short description.','the-business-wp' ),
            'section' => 'slider_section',
        ) ) );		
	
		//posts  object
		global $the_business_wp_all_posts;
	
		// post 1
		$wp_customize->add_setting( 'the_business_wp_option[slider_cat]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[slider_cat]' , array(
		'label' => __('Select Post 1','the-business-wp' ),
		'section' => 'slider_section',
		'type'=>'select',
		'choices'=> $the_business_wp_all_posts,
		) );
		
	
		$wp_customize->selective_refresh->add_partial( 'the_business_wp_option[slider_cat]', array(
			'selector' => '#main_Carousel .carousel-caption',
		) );
		
		// post 2
		$wp_customize->add_setting( 'the_business_wp_option[slider_cat2]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[slider_cat2]' , array(
		'label' => __('Select Post 2','the-business-wp' ),
		'section' => 'slider_section',
		'type'=>'select',
		'choices'=> $the_business_wp_all_posts, 
		) );
		
		// post 3
		$wp_customize->add_setting( 'the_business_wp_option[slider_cat3]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[slider_cat3]' , array(
		'label' => __('Select Post 3','the-business-wp' ),
		'section' => 'slider_section',
		'type'=>'select',
		'choices'=> $the_business_wp_all_posts, 
		) );						
