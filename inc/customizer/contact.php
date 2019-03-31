<?php

/********************
*  contact Settings *
*********************/

		$wp_customize->add_section( 'contact_section' , array(
			'title'      => __('Contact', 'the-business-wp' ),			
			'description'=>  __('First, create a page from home-page template, From Home page settings select the created page as static home page. Add all your contact details. Contact details will display in header, footer and contact section. Need Google map Go Pro Version.', 'the-business-wp' ),
			'panel' => 'theme_options',
		) );
		
		// contact section header show / hide
		$wp_customize->add_setting( 'the_business_wp_option[contact_section_hide_header]' , array(
		'default'    => false,
		'sanitize_callback' => 'the_business_wp_sanitize_checkbox',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[contact_section_hide_header]' , array(
		'label' => __('Hide Contact Mini Header','the-business-wp' ),
		'section' => 'contact_section',
		'type'=>'checkbox',
		) );		
		
		
		// contact section title
		$wp_customize->add_setting( 'the_business_wp_option[contact_section_title]' , array(
		'default'    => __('Contact','the-business-wp' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[contact_section_title]' , array(
		'label' => __('Section Title','the-business-wp' ),
		'section' => 'contact_section',
		'type'=>'text',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'the_business_wp_option[contact_section_title]', array(
			'selector' => '#contact .section-title',
		) );
		
		// contact Section Subtitle
		$wp_customize->add_setting( 'the_business_wp_option[contact_section_description]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));
		

		$wp_customize->add_control('the_business_wp_option[contact_section_description]' , array(
		'label' => __('Section Subtitle','the-business-wp' ),
		'section' => 'contact_section',
		'type'=>'text',
		) );			

		// address
		$wp_customize->add_setting( 'the_business_wp_option[contact_section_address]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[contact_section_address]' , array(
		'label' => __('Address:','the-business-wp' ),
		'section' => 'contact_section',
		'type'=>'text',
		) );
		
		// email
		$wp_customize->add_setting( 'the_business_wp_option[contact_section_email]' , array(
		'default'    => 'name@yourdomain.com',
		'sanitize_callback' => 'sanitize_email',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[contact_section_email]' , array(
		'label' => __('Email:','the-business-wp' ),
		'section' => 'contact_section',
		'type'=>'text',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'the_business_wp_option[contact_section_email]', array(
			'selector' => '.contact-list-top',
		) );		
		
		// phone
		$wp_customize->add_setting( 'the_business_wp_option[contact_section_phone]' , array(
		'default'    => '123456789',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[contact_section_phone]' , array(
		'label' => __('Phone:','the-business-wp' ),
		'section' => 'contact_section',
		'type'=>'text',
		) );
		
		// fax
		$wp_customize->add_setting( 'the_business_wp_option[contact_section_fax]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[contact_section_fax]' , array(
		'label' => __('Fax:','the-business-wp' ),
		'section' => 'contact_section',
		'type'=>'text',
		) );
		
		// work hours
		$wp_customize->add_setting( 'the_business_wp_option[contact_section_hours]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[contact_section_hours]' , array(
		'label' => __('Work Hours:','the-business-wp' ),
		'section' => 'contact_section',
		'type'=>'text',
		) );

	
		// background Alpha Color Picker setting
		$wp_customize->add_setting(
			'the_business_wp_option[contact_section_background_color]',
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
				'the_business_wp_option[contact_section_background_color]',
				array(
					'label'         =>  __('Section Background Color','the-business-wp' ),
					'section'       => 'contact_section',
					'settings'      => 'the_business_wp_option[contact_section_background_color]',
					'show_opacity'  => true, // Optional.
					'palette'	=> the_business_wp_color_codes(),
				)
			)
		);

	
		// contact section shortcode
		$wp_customize->add_setting( 'the_business_wp_option[contact_section_shortcode]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));	
		
		$wp_customize->add_control('the_business_wp_option[contact_section_shortcode]' , array(
		'label' => __('Contact Form 7 Shortcode','the-business-wp' ),
		'description' => sprintf('<a href="%1$s"> %2$s </a>',
						 esc_url(get_site_url().'/wp-admin/plugin-install.php?s=contact%20form%207&tab=search&type=term'),
						 esc_html__('Click here to install contact form plugin. Create a contact form and add shortcode','the-business-wp')),
		'section' => 'contact_section',
		'type'=>'text',
		) );
		