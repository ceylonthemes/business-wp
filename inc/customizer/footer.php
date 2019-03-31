<?php

/*********************** 
* Footer customization *
***********************/

		$wp_customize->add_section( 'footer_section' , array(
			'title'      => __('Footer Customizer', 'the-business-wp' ),			
			'description'=> __('Customize footer. Footer bottom text. Add widgets, goto Customizer->Widgets section. Customize Footer background image, background colors Go Pro versio.', 'the-business-wp' ),
		    'panel' => 'theme_options',
		) );
		

		// footer section footer foreground color - return with only get_theme_mod('footer_foreground_color') !important 
		$wp_customize->add_setting( 'footer_foreground_color' , array(
		'default'    => '#fff',
		'sanitize_callback' => 'sanitize_text_field',
	
		));
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize , 'footer_foreground_color' , array(
		'label' => __('Footer Text Color','the-business-wp' ),
		'section' => 'footer_section',
		'settings'=>'footer_foreground_color'
		) ) );		
			
			
		// footer section bottom background text
		$wp_customize->add_setting( 'the_business_wp_option[footer_section_bottom_text]' , array(
		'default'    => __('Theme by Ceylon Themes','the-business-wp' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));	
		
		$wp_customize->add_control('the_business_wp_option[footer_section_bottom_text]' , array(
		'label' => __('Footer Bottom Text','the-business-wp' ),
		'section' => 'footer_section',
		'type'=>'text',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'the_business_wp_option[footer_section_bottom_text]', array(
			'selector' => '.site-info',
		) );			
				
