<?php

/************************
*    Hero Settings      *
*************************/
	
		$wp_customize->add_section( 'page_section' , array(
			'title'      => __('Hero Section', 'the-business-wp' ),			 
			'description'=> __('First, create a page from home-page template, From Home page settings select the created page as static home page. Add hero contents and add a button with a Navigation link.', 'the-business-wp' ),
			'panel' => 'theme_options',
		) );
			
	
		// background Alpha Color Picker setting
		$wp_customize->add_setting(
			'the_business_wp_option[hero_section_background_color]',
			array(
				'default'     => '#fff',
				'type'        => 'option',				
				'transport'   => 'refresh',
				'sanitize_callback' => 'sanitize_text_field',
				
			)
		);
		
		// background Alpha Color Picker control
		$wp_customize->add_control(
			new The_Business_WP_Color_Control(
				$wp_customize,
				'the_business_wp_option[hero_section_background_color]',
				array(
					'label'         =>  __('Section Background Color','the-business-wp' ),
					'section'       => 'page_section',
					'settings'      => 'the_business_wp_option[hero_section_background_color]',
					'show_opacity'  => true, // Optional.
					'palette'	=> the_business_wp_color_codes(),
				)
			)
		);				
		
		// page section title
		$wp_customize->add_setting( 'the_business_wp_option[hero_section_title]' , array(
		'default'    => 'Hero Section',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));
		
		$wp_customize->add_control('the_business_wp_option[hero_section_title]' , array(
		'label' => __('Section Title','the-business-wp' ),
		'section' => 'page_section',
		'type'=>'text',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'the_business_wp_option[hero_section_title]', array(
			'selector' => '#custom-page .section-title',
		) );
		
		//description
		$wp_customize->add_setting( 'the_business_wp_option[hero_section_description]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));
		
		$wp_customize->add_control('the_business_wp_option[hero_section_description]' , array(
		'label' => __('Section Subtitle','the-business-wp' ),
		'section' => 'page_section',
		'type'=>'text',
		) );
	
		// page
		$wp_customize->add_setting( 'the_business_wp_option[hero_section_page]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[hero_section_page]' , array(
		'label' => __('Select a Page to Display','the-business-wp' ),
		'section' => 'page_section',
		'type'=>'select',
		'choices'=> the_business_wp_get_all_pages(), 
		) );
				
		// read more button text
		$wp_customize->add_setting( 'the_business_wp_option[hero_section_button_text]' , array(
		'default'    => __('View More','the-business-wp' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[hero_section_button_text]' , array(
		'label' => __('View More Button Text','the-business-wp' ),
		'section' => 'page_section',
		'type'=>'text',
		) );
					
		// read more button url
		$wp_customize->add_setting( 'the_business_wp_option[hero_section_url]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[hero_section_url]' , array(
		'label' => __('View More Button URL','the-business-wp' ),
		'description' => __('(Hide button - keep the URL balnk)','the-business-wp' ),
		'section' => 'page_section',
		'type'=>'text',
		) );
		
		$wp_customize->add_control(
			'the_business_wp_option[hero_section_image_repeat]', 
			array(
				'label'    => __( 'Background Repeat', 'the-business-wp' ),
				'section'  => 'page_section',
				'settings' => 'the_business_wp_option[hero_section_image_repeat]',
				'type'     => 'select',
				'choices'  => the_business_wp_background_style(),
			)
		);		
