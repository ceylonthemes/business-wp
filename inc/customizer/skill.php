<?php

/****************** 
*  skill Settings *
******************/

		$wp_customize->add_section( 'skill_section' , array(
			'title'      => __('Skills', 'the-business-wp' ),			
			'description'=> __('First, create a page from home-page template, From Home page settings select the created page as static home page. Add section title, description and Specify progress under each skill. Neeed more Skills Go Pro version.', 'the-business-wp' ),
			'panel' => 'theme_options',
		) );

	
		// background Alpha Color Picker setting
		$wp_customize->add_setting(
			'the_business_wp_option[skill_section_background_color]',
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
				'the_business_wp_option[skill_section_background_color]',
				array(
					'label'         =>  __('Section Background Color','the-business-wp' ),
					'section'       => 'skill_section',
					'settings'      => 'the_business_wp_option[skill_section_background_color]',
					'show_opacity'  => true, // Optional.
					'palette'	=> the_business_wp_color_codes(),
				)
			)
		);			
	
		// skill section title
		$wp_customize->add_setting( 'the_business_wp_option[skill_section_title]' , array(
		'default'    => __('Skills','the-business-wp' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[skill_section_title]' , array(
		'label' => __('Section Title','the-business-wp' ),
		'section' => 'skill_section',
		'type'=>'text',
		) );		
		
		$wp_customize->selective_refresh->add_partial( 'the_business_wp_option[skill_section_title]', array(
			'selector' => '#skills .section-title',
		) );
		
		// skill Section Subtitle
		$wp_customize->add_setting( 'the_business_wp_option[skill_section_description]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_textarea_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[skill_section_description]' , array(
		'label' => __('Section Description','the-business-wp' ),
		'section' => 'skill_section',
		'type'=>'textarea',
		) );
		
	
		// skill section skill 1
		$wp_customize->add_setting( 'the_business_wp_option[skill_section_skill1]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));
		

		$wp_customize->add_control('the_business_wp_option[skill_section_skill1]' , array(
		'label' => __('Skill 1 Name','the-business-wp' ),
		'section' => 'skill_section',
		'type'=>'text',
		) );	
		
		
		// skill section skill 1 progress
		$wp_customize->add_setting( 'the_business_wp_option[skill_section_skill1_progress]' , array(
		'default'    => '80',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));
		
		$wp_customize->add_control( new The_Business_WP_Range_Value_Control(
			$wp_customize, 'the_business_wp_option[skill_section_skill1_progress]', array(
				'label' => __('Skill 1 Percentage (%)','the-business-wp' ),
				'section' => 'skill_section',
				'type' => 'range-value',
				'input_attr' => array(
					'min' => 10,
					'max' => 100,
					'step' => 1,					 
				),
			)
		) );		

	
		
		// skill section skill 2
		$wp_customize->add_setting( 'the_business_wp_option[skill_section_skill2]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[skill_section_skill2]' , array(
		'label' => __('Skill 2 Name','the-business-wp' ),
		'section' => 'skill_section',
		'type'=>'text',
		) );	
		
		// skill section skill 2 progress
		$wp_customize->add_setting( 'the_business_wp_option[skill_section_skill2_progress]' , array(
		'default'    => '90',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control( new The_Business_WP_Range_Value_Control(
			$wp_customize, 'the_business_wp_option[skill_section_skill2_progress]', array(
				'label' => __('Skill 2 Percentage (%)','the-business-wp' ),
				'section' => 'skill_section',
				'type' => 'range-value',
				'input_attr' => array(
					'min' => 10,
					'max' => 100,
					'step' => 1,					 
				),
			)
		) );			
		
		// skill section skill 3
		$wp_customize->add_setting( 'the_business_wp_option[skill_section_skill3]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[skill_section_skill3]' , array(
		'label' => __('Skill 3 Name','the-business-wp' ),
		'section' => 'skill_section',
		'type'=>'text',
		) );	
		
		// skill section skill 3 progress
		$wp_customize->add_setting( 'the_business_wp_option[skill_section_skill3_progress]' , array(
		'default'    => '80',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control( new The_Business_WP_Range_Value_Control(
			$wp_customize, 'the_business_wp_option[skill_section_skill3_progress]', array(
				'label' => __('Skill Percentage (%)','the-business-wp' ),
				'section' => 'skill_section',
				'type' => 'range-value',
				'input_attr' => array(
					'min' => 10,
					'max' => 100,
					'step' => 1,					 
				),
			)
		) );	
		
		// skill section skill 4
		$wp_customize->add_setting( 'the_business_wp_option[skill_section_skill4]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[skill_section_skill4]' , array(
		'label' => __('Skill 4 Name','the-business-wp' ),
		'section' => 'skill_section',
		'type'=>'text',
		) );	
		
		// skill section skill 4 progress
		$wp_customize->add_setting( 'the_business_wp_option[skill_section_skill4_progress]' , array(
		'default'    => '60',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control( new The_Business_WP_Range_Value_Control(
			$wp_customize, 'the_business_wp_option[skill_section_skill4_progress]', array(
				'label' => __('Skill 4 Percentage (%)','the-business-wp' ),
				'section' => 'skill_section',
				'type' => 'range-value',
				'input_attr' => array(
					'min' => 10,
					'max' => 100,
					'step' => 1,					 
				),
			)
		) );	
		
