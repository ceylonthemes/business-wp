<?php

/******************
*   News Section  *
******************/

		$wp_customize->add_section( 'news_section' , array(
			'title'      => __('News', 'the-business-wp' ),			
			'description'=> __('First, create a page from home-page template, From Home page settings select the created page as static home page. Show your news/events. Please, create posts and add a category to posts. Select this category given below News Category list.', 'the-business-wp' ),
		    'panel' => 'theme_options',
		) );

	
		// background Alpha Color Picker setting
		$wp_customize->add_setting(
			'the_business_wp_option[news_section_background_color]',
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
				'the_business_wp_option[news_section_background_color]',
				array(
					'label'         =>  __('Section Background Color','the-business-wp' ),
					'section'       => 'news_section',
					'settings'      => 'the_business_wp_option[news_section_background_color]',
					'show_opacity'  => true, // Optional.
					'palette'	=> the_business_wp_color_codes(),
				)
			)
		);			
			
		// news section title
		$wp_customize->add_setting( 'the_business_wp_option[news_section_title]' , array(
		'default'    => __('News/Events','the-business-wp' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[news_section_title]' , array(
		'label' => __('Section Title','the-business-wp' ),
		'section' => 'news_section',
		'type'=>'text',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'the_business_wp_option[news_section_title]', array(
			'selector' => '#news .section-title',
		) );
		
		// news Section Subtitle
		$wp_customize->add_setting( 'the_business_wp_option[news_section_description]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[news_section_description]' , array(
		'label' => __('Section Subtitle','the-business-wp' ),
		'section' => 'news_section',
		'type'=>'text',
		) );
		
		// Max no of news 
		$wp_customize->add_setting( 'the_business_wp_option[news_no_of_show]' , array(
		'default'    => 4,
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[news_no_of_show]' , array(
		'label' => __('No of news to show','the-business-wp' ),
		'section' => 'news_section',
		'type'=>'select',
		'choices'=> array('4'=>'4','3'=>'3','2'=>'2','1'=>'1'),
		) );
		
		// news category show
		$wp_customize->add_setting( 'the_business_wp_option[news_category_show]' , array(
		'default'    => "",
		'sanitize_callback' => 'sanitize_text_field',		 
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[news_category_show]' , array(
		'label' => __('News Category Show','the-business-wp' ),
		'section' => 'news_section',
		'type'=>'select',
		'choices'=> the_business_wp_get_post_categories(), 
		) );
		
		
		// News section image
		$wp_customize->add_setting( 'the_business_wp_option[news_section_image]' , array(
		'default' => '',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type'=>'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'the_business_wp_option[news_section_image]' ,
		array(
		'label'          => __( 'News Section Image', 'the-business-wp' ),
		'description'=> __('Upload your background image. Important! Uncompressed images will increase your site loading time.','the-business-wp'),
		'section'        => 'news_section',
		) )	);
		
		$wp_customize->add_setting( 'the_business_wp_option[news_section_image_repeat]', array(
			'default'        => 'no-repeat',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
		) );
		$wp_customize->add_control(
			'the_business_wp_option[news_section_image_repeat]', 
			array(
				'label'    => __( 'Background Repeat', 'the-business-wp' ),
				'section'  => 'news_section',
				'settings' => 'the_business_wp_option[news_section_image_repeat]',
				'type'     => 'select',
				'choices'  => the_business_wp_background_style(),
			)
		);
