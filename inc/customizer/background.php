<?php

/*********************
* Background options *
**********************/

		$wp_customize->add_section( 'background_section' , array(
			'title'      => __('Background Image', 'the-business-wp' ),			
			'description'=> __('<p>Change background image or background color. Background image displayed in box layout mode and not intended to display in full width (default layout) mode.</p>', 'the-business-wp' ),
			
		) );
		
		//background image
		$wp_customize->add_setting( 'the_business_wp_option[background_image]' , array(
		'default' => '',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type'=>'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'the_business_wp_option[background_image]' ,
		array(
		'label'          => __( 'Site Background Image', 'the-business-wp' ),
		'description'=> __('Upload your background image.','the-business-wp'),
		'section'        => 'background_section',
		) )	);
		
		$wp_customize->add_setting( 'the_business_wp_option[background_image_repeat]', array(
			'default'        => 'repeat',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
		) );
		
		$wp_customize->add_control(
			'the_business_wp_option[background_image_repeat]', 
			array(
				'label'    => __( 'Background Repeat', 'the-business-wp' ),
				'section'  => 'background_section',
				'settings' => 'the_business_wp_option[background_image_repeat]',
				'type'     => 'select',
				'choices'  => the_business_wp_background_style(),
			)
		);
		
		
		// background Alpha Color Picker setting
		$wp_customize->add_setting(
			'the_business_wp_option[background_color]',
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
				'the_business_wp_option[background_color]',
				array(
					'label'         =>  __('Site Background Color','the-business-wp' ),
					'section'       => 'background_section',
					'settings'      => 'the_business_wp_option[background_color]',
					'show_opacity'  => true, // Optional.
					'palette'	=> the_business_wp_color_codes(),
				)
			)
		);		
						