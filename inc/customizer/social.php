<?php

/******************** 
*   Social options  *
********************/		

		$wp_customize->add_section( 'social_section' , array(
			'title'      => __('Social', 'the-business-wp' ),			
			'description'=> __('Display social icons and links in site header and footer. Need more social networks, Go Pro Version ', 'the-business-wp' ),
			'panel' => 'theme_options',
		) );
		
		
		$wp_customize->add_setting( 'the_business_wp_option[social_open_new_tab]' , array(
		'default'    => 1,
		'sanitize_callback' => 'the_business_wp_sanitize_checkbox',
		'type'=>'option'
		));
		
		$wp_customize->add_control('the_business_wp_option[social_open_new_tab]' , array(
		'label' => __('Open Social Link in New Tab','the-business-wp' ),
		'section' => 'social_section',
		'type'=>'checkbox',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'the_business_wp_option[social_open_new_tab]', array(
			'selector' => '.mimi-header-social-icon',
		) );


		$wp_customize->add_setting( 'the_business_wp_option[social_facebook_link]' , array(
		'default'    => '#',
		'sanitize_callback' => 'esc_url_raw',
		'type'=>'option'
		));
		
		$wp_customize->selective_refresh->add_partial( 'the_business_wp_option[social_facebook_link]', array(
			'selector' => '#footer-social',
		) );
		
		$wp_customize->add_control('the_business_wp_option[social_facebook_link]' , array(
		'label' => __('Facebook Link','the-business-wp' ),
		'section' => 'social_section',
		'type'=>'text',
		) );

		$wp_customize->add_setting( 'the_business_wp_option[social_twitter_link]' , array(
		'default'    => '#',
		'sanitize_callback' => 'esc_url_raw',
		'type'=>'option'
		));	
		
		$wp_customize->add_control('the_business_wp_option[social_twitter_link]' , array(
		'label' => __('Twitter Link','the-business-wp' ),
		'section' => 'social_section',
		'type'=>'text',
		) );


		$wp_customize->add_setting( 'the_business_wp_option[social_skype_link]' , array(
		'default'    =>  '',
		'sanitize_callback' => 'esc_url_raw',
		'type'=>'option'
		));	
		
		$wp_customize->add_control('the_business_wp_option[social_skype_link]' , array(
		'label' => __('Skype Link','the-business-wp' ),
		'section' => 'social_section',
		'type'=>'text',
		) );							

		$wp_customize->add_setting( 'the_business_wp_option[social_pinterest_link]' , array(
		'default'    => '#',
		'sanitize_callback' => 'esc_url_raw',
		'type'=>'option'
		));	
		
		$wp_customize->add_control('the_business_wp_option[social_pinterest_link]' , array(
		'label' => __('Pinterest Link','the-business-wp' ),
		'section' => 'social_section',
		'type'=>'text',
		) );			
