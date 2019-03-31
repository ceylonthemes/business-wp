<?php

/********************
* Service Settings  *
********************/

		$wp_customize->add_section( 'service_section' , array(
			'title'      => __('Services', 'the-business-wp' ),			 
			'description'=> __('First, create a page from home-page template, From Home page settings select the created page as static home page. Create Posts with featured image (service), title and content and select from post dropdown list below. Need unlimited Services and more Service templates Go Pro Version.', 'the-business-wp' ),
			'panel' => 'theme_options',
		) );
			
	
		// background Alpha Color Picker setting
		$wp_customize->add_setting(
			'the_business_wp_option[service_section_background_color]',
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
				'the_business_wp_option[service_section_background_color]',
				array(
					'label'         =>  __('Section Background Color','the-business-wp' ),
					'section'       => 'service_section',
					'settings'      => 'the_business_wp_option[service_section_background_color]',
					'show_opacity'  => true, // Optional.
					'palette'	=> the_business_wp_color_codes(),
				)
			)
		);			
		
		// service section title
		$wp_customize->add_setting( 'the_business_wp_option[service_section_title]' , array(
		'default'    => __('Services', 'the-business-wp' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));
		
		$wp_customize->add_control('the_business_wp_option[service_section_title]' , array(
		'label' => __('Section Title','the-business-wp' ),
		'section' => 'service_section',
		'type'=>'text',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'the_business_wp_option[service_section_title]', array(
			'selector' => '#service .section-title',
		) );
		
		// service Section Subtitle
		$wp_customize->add_setting( 'the_business_wp_option[service_section_description]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));
		
		$wp_customize->add_control('the_business_wp_option[service_section_description]' , array(
		'label' => __('Section Subtitle','the-business-wp' ),
		'section' => 'service_section',
		'type'=>'text',
		) );
		
		//service settings
        $wp_customize->add_setting( 'service_label2', array(
			'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control( new the_business_wp_Label_Custom_control( $wp_customize, 'service_label2', array(
            'label'   => __('Select existing Posts with featured image (service), title and content','the-business-wp' ),
            'section' => 'service_section',
        ) ) );			
		
		global $the_business_wp_all_posts;
		
		// post 1
		$wp_customize->add_setting( 'the_business_wp_option[service_cat]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[service_cat]' , array(
		'label' => __('Select Post 1','the-business-wp' ),
		'section' => 'service_section',
		'type'=>'select',
		'choices'=> $the_business_wp_all_posts, 
		) );
		
		// post 2
		$wp_customize->add_setting( 'the_business_wp_option[service_cat2]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[service_cat2]' , array(
		'label' => __('Select Post 2','the-business-wp' ),
		'section' => 'service_section',
		'type'=>'select',
		'choices'=> $the_business_wp_all_posts, 
		) );
		
		// post 3
		$wp_customize->add_setting( 'the_business_wp_option[service_cat3]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[service_cat3]' , array(
		'label' => __('Select Post 3','the-business-wp' ),
		'section' => 'service_section',
		'type'=>'select',
		'choices'=> $the_business_wp_all_posts, 
		) );									
		
		// post 4
		$wp_customize->add_setting( 'the_business_wp_option[service_cat4]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[service_cat4]' , array(
		'label' => __('Select Post 4','the-business-wp' ),
		'section' => 'service_section',
		'type'=>'select',
		'choices'=> $the_business_wp_all_posts, 
		) );
		
		// post 5
		$wp_customize->add_setting( 'the_business_wp_option[service_cat5]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[service_cat5]' , array(
		'label' => __('Select Post 5','the-business-wp' ),
		'section' => 'service_section',
		'type'=>'select',
		'choices'=> $the_business_wp_all_posts, 
		) );
		
		// post 6
		$wp_customize->add_setting( 'the_business_wp_option[service_cat6]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[service_cat6]' , array(
		'label' => __('Select Post 6','the-business-wp' ),
		'section' => 'service_section',
		'type'=>'select',
		'choices'=> $the_business_wp_all_posts, 
		) );		

		// service section image
		$wp_customize->add_setting( 'the_business_wp_option[service_section_image]' , array(
		'default' => '',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type'=>'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'the_business_wp_option[service_section_image]' ,
		array(
		'label'          => __( 'Service Section Image', 'the-business-wp' ),
		'description'=> __('Upload your background image. Important! Uncompressed images will increase your site loading time.','the-business-wp'),
		'section'        => 'service_section',
		) )	);
		
		// service section repeater
		$wp_customize->add_setting( 'the_business_wp_option[service_section_image_repeat]', array(
			'default'        => 'no-repeat',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
		) );
		
		$wp_customize->add_control(
			'the_business_wp_option[service_section_image_repeat]', 
			array(
				'label'    => __( 'Background Repeat', 'the-business-wp' ),
				'section'  => 'service_section',
				'settings' => 'the_business_wp_option[service_section_image_repeat]',
				'type'     => 'select',
				'choices'  => the_business_wp_background_style(),
			)
		);
