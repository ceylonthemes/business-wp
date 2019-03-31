<?php

/********************** 
* Testimonial section *
**********************/

		/* Testimonial Settings */
		$wp_customize->add_section( 'testimonial_section' , array(
			'title'      => __('Testimonials', 'the-business-wp' ),			
			'description'=> __('First, create a page from home-page template, From Home page settings select the created page as static home page. Create Posts with featured image (testimonial), title and content and select from post dropdown list below. ', 'the-business-wp' ),
			'panel' => 'theme_options',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'the_business_wp_option[testimonial_section_title]', array(
			'selector' => '#testimonilas h1.section-title',
		) );		
	
	
		// background Alpha Color Picker setting
		$wp_customize->add_setting(
			'the_business_wp_option[testimonial_section_background_color]',
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
				'the_business_wp_option[testimonial_section_background_color]',
				array(
					'label'         =>  __('Section Background Color','the-business-wp' ),
					'section'       => 'testimonial_section',
					'settings'      => 'the_business_wp_option[testimonial_section_background_color]',
					'show_opacity'  => true, // Optional.
					'palette'	=> the_business_wp_color_codes(),
				)
			)
		);			

	
		// testimonial section title
		$wp_customize->add_setting( 'the_business_wp_option[testimonial_section_title]' , array(
		'default'    => __('Testimonials','the-business-wp' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));
		
		$wp_customize->add_control('the_business_wp_option[testimonial_section_title]' , array(
		'label' => __('Section Title','the-business-wp' ),
		'section' => 'testimonial_section',
		'type'=>'text',
		) );	
		
		// testimonial Section Subtitle
		$wp_customize->add_setting( 'the_business_wp_option[testimonial_section_description]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));
		
		$wp_customize->add_control('the_business_wp_option[testimonial_section_description]' , array(
		'label' => __('Section Subtitle','the-business-wp' ),
		'section' => 'testimonial_section',
		'type'=>'text',
		) );			
		
		// Testimonial slider animation type
		$wp_customize->add_setting( 'the_business_wp_option[testimonial_animation_type]' , array(
		'default'    => 'slide',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[testimonial_animation_type]' , array(
		'label' => __('Testimonial effects','the-business-wp' ),
		'section' => 'testimonial_section',
		'type'=>'select',
		'choices'=>array(
			'slide'=>__('Slide','the-business-wp' ),
			'fade'=>__('Fade','the-business-wp' ),
		),
		) );
		
		// Testimonial slider speed
		$wp_customize->add_setting( 'the_business_wp_option[testimonial_speed]' , array(
		'default'    => 3000,
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[testimonial_speed]' , array(
		'label' => __('Testimonial animation speed (ms for slide)','the-business-wp' ),
		'section' => 'testimonial_section',
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
		
        $wp_customize->add_setting( 'slider_label2', array(
			'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control( new the_business_wp_Label_Custom_control( $wp_customize, 'slider_label2', array(
            'label'   => __('Select existing Posts with featured image(testimonial), title and description.','the-business-wp' ),
            'section' => 'testimonial_section',
        ) ) );

		global $the_business_wp_all_posts;
		
		// post 1
		$wp_customize->add_setting( 'the_business_wp_option[testimonial_cat]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[testimonial_cat]' , array(
		'label' => __('Select Post 1','the-business-wp' ),
		'section' => 'testimonial_section',
		'type'=>'select',
		'choices'=> $the_business_wp_all_posts, 
		) );
		
		// post 2
		$wp_customize->add_setting( 'the_business_wp_option[testimonial_cat2]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[testimonial_cat2]' , array(
		'label' => __('Select Post 2','the-business-wp' ),
		'section' => 'testimonial_section',
		'type'=>'select',
		'choices'=> $the_business_wp_all_posts, 
		) );
		
		// post 3
		$wp_customize->add_setting( 'the_business_wp_option[testimonial_cat3]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[testimonial_cat3]' , array(
		'label' => __('Select Post 3','the-business-wp' ),
		'section' => 'testimonial_section',
		'type'=>'select',
		'choices'=> $the_business_wp_all_posts, 
		) );									
		
		// section image
		$wp_customize->add_setting( 'the_business_wp_option[testimonial_section_image]' , array(
		'default' => '',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type'=>'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'the_business_wp_option[testimonial_section_image]' ,
		array(
		'label'          => __( 'Background Image', 'the-business-wp' ),
		'description'=> __('Upload your background image. Important! Uncompressed images will increase your site loading time.','the-business-wp'),
		'section'        => 'testimonial_section',
		) )	);
		
		$wp_customize->add_setting( 'the_business_wp_option[testimonial_section_image_repeat]', array(
			'default'        => 'no-repeat',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
		) );
		$wp_customize->add_control(
			'the_business_wp_option[testimonial_section_image_repeat]', 
			array(
				'label'    => __( 'Background Repeat', 'the-business-wp' ),
				'section'  => 'testimonial_section',
				'settings' => 'the_business_wp_option[testimonial_section_image_repeat]',
				'type'     => 'select',
				'choices'  => the_business_wp_background_style(),
			)
		);			
