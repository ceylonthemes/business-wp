<?php

/*****************
 * Custom fonts. *
 *****************/

	$wp_customize->add_section( 'font_section' , array(
		'title'      => __('Fonts*', 'the-business-wp' ),			
		'description'=> '',
		 
	) ); 
	
	$wp_customize->add_setting(
		'navigation_font_size', array(
			'default'           => '16px',	//font-size		
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',  
		)
	);		

	$wp_customize->add_control('navigation_font_size' , array(
	'label' => __('Top Menu Font Size(px)','the-business-wp' ),
	'section' => 'font_section',
	'type'=>'select',
	'choices'=>array(
		'14px' => '14',
		'15px' => '15',
		'16px' => '16',
		'17px' => '17',
		'18px' => '18',
		'19px' => '19',
	),
	) );	
	 
	$wp_customize->add_setting(
		'fontsscheme', array(
			'default'           => 'default',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_setting(
		'header_fontfamily', array(
			'default'           => 'Oswald',			
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',  
		)
	);
	
	$wp_customize->add_setting(
		'body_fontfamily', array(
			'default'           => 'Raleway',			
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',  
		)
	);	
	
	
	$wp_customize->add_control(
		'fontsscheme', array(
			'type'     => 'radio',
			'label'    => __( 'Font Scheme', 'the-business-wp' ),
			'choices'  => array(
				'default'  => __( 'Default', 'the-business-wp' ),				 
				'custom' => __( 'Custom', 'the-business-wp' ),
			),
			'section'  => 'font_section',
			'description' =>  __('If changes do not effect, Please, save and preview.', 'the-business-wp' ),
		)
	);
	
	$wp_customize->add_control( 'header_fontfamily' , array(
	'label' => __('Headings Font Family','the-business-wp'),
	'section' => 'font_section',
	'type'=>'select',
	'choices'=> the_business_wp_font_family(),
	) );
	
	$wp_customize->add_control( 'body_fontfamily' , array(
	'label' => __('Body Font Family','the-business-wp'),
	'section' => 'font_section',
	'type'=>'select',
	'choices'=> the_business_wp_font_family(),
	) );
	
