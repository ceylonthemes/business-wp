<?php

/************************
* Callout Settings *
*************************/
	
		$wp_customize->add_section( 'callout_section' , array(
			'title'      => __('Callout', 'the-business-wp' ),			 
			'description'=> __('First, create a page from home-page template, From Home page settings select the created page as static home page. This section provide callout description and a button with a navigation link. Need to More buttonds and colour Formatting Go Pro version', 'the-business-wp' ),
			'panel' => 'theme_options',
		) );
			
		
		// background Alpha Color Picker setting
		$wp_customize->add_setting(
			'the_business_wp_option[callout_section_background_color]',
			array(
				'default'     => 'rgba(0, 157, 255, 0.88)',
				'type'        => 'option',				
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field',
				
			)
		);
		
		// background Alpha Color Picker control
		$wp_customize->add_control(
			new The_Business_WP_Color_Control(
				$wp_customize,
				'the_business_wp_option[callout_section_background_color]',
				array(
					'label'         =>  __('Section Background Color','the-business-wp' ),
					'section'       => 'callout_section',
					'settings'      => 'the_business_wp_option[callout_section_background_color]',
					'show_opacity'  => true, // Optional.
					'palette'	=> the_business_wp_color_codes(),
				)
			)
		);				
		
		// callout section title
		$wp_customize->add_setting( 'the_business_wp_option[callout_section_title]' , array(
		'default'    => __('Callout Section','the-business-wp' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));
		
		$wp_customize->add_control('the_business_wp_option[callout_section_title]' , array(
		'label' => __('Section Title','the-business-wp' ),
		'section' => 'callout_section',
		'type'=>'text',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'the_business_wp_option[callout_section_title]', array(
			'selector' => '#callout .callout-title',
		) );		
	
		// description
		$wp_customize->add_setting( 'the_business_wp_option[callout_section_description]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_textarea_field',
		'type'=>'option'
		));
		
		$wp_customize->add_control('the_business_wp_option[callout_section_description]' , array(
		'label' => __('Section Description','the-business-wp' ),
		'section' => 'callout_section',
		'type'=>'textarea',
		) );
				
		// callout button text
		$wp_customize->add_setting( 'the_business_wp_option[callout_section_button_text]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[callout_section_button_text]' , array(
		'label' => __('Callout Button 1 Text','the-business-wp' ),
		'section' => 'callout_section',
		'type'=>'text',
		) );
		
		// callout button 1 url
		$wp_customize->add_setting( 'the_business_wp_option[callout_section_url]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[callout_section_url]' , array(
		'label' => __('Button URL','the-business-wp' ),
		'section' => 'callout_section',
		'type'=>'text',
		) );
		
	
		// callout section image
		$wp_customize->add_setting( 'the_business_wp_option[callout_section_image]' , array(
		'default' => '',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type'=>'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'the_business_wp_option[callout_section_image]' ,
		array(
		'label'          => __( 'Background Image', 'the-business-wp' ),
		'description'=> __('Upload an Image.','the-business-wp'),
		'section'        => 'callout_section',
		) )	);
		
		//image repeat
		$wp_customize->add_setting( 'the_business_wp_option[callout_section_image_repeat]', array(
			'default'        => 'no-repeat',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
		) );
		
		$wp_customize->add_control(
			'the_business_wp_option[callout_section_image_repeat]', 
			array(
				'label'    => __( 'Background Repeat', 'the-business-wp' ),
				'section'  => 'callout_section',
				'settings' => 'the_business_wp_option[callout_section_image_repeat]',
				'type'     => 'select',
				'choices'  => the_business_wp_background_style(),
			)
		);		
					
