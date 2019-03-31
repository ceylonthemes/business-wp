<?php

/************************
*     Page Settings     *
*************************/

$wp_customize->add_panel( 'pages_section', array(
  'title' => __( 'Manage Pages*','the-business-wp' ),
  'description' => __( 'Settings related to templates.','the-business-wp'), 
  'priority' => 3, // Mixed with top-level-section hierarchy.
));
	
$wp_customize->add_section( 'home_area' , array(
		'title'      => __('Home Page', 'the-business-wp' ),			 
		'description'=> __('Display featured areas related to Home page. You can use customizer partial shortcut buttons to go each section settings. More 17 featured areas, Add any Custom created pages and more customizations Go Pro version', 'the-business-wp' ),
		'panel' => 'pages_section',
) );

// featured area 0
$wp_customize->add_setting( 'the_business_wp_option[home_featured_area_0]' , array(
	'default'    => 'slider',
	'sanitize_callback' => 'sanitize_text_field',
	'type'=>'option'
));

$wp_customize->add_control('the_business_wp_option[home_featured_area_0]' , array(
	'label' => __('Select Featured Area','the-business-wp' ),
	'section' => 'home_area',
	'type'=>'select',
	'choices'=> the_business_wp_featured_areas(),
) );

// featured area 1
$wp_customize->add_setting( 'the_business_wp_option[home_featured_area_1]' , array(
	'default'    =>  'service',
	'sanitize_callback' => 'sanitize_text_field',
	'type'=>'option'
));

$wp_customize->add_control('the_business_wp_option[home_featured_area_1]' , array(
	'label' => __('Select Featured Area','the-business-wp' ),
	'section' => 'home_area',
	'type'=>'select',
	'choices'=> the_business_wp_featured_areas(),
) );

// featured area 2
$wp_customize->add_setting( 'the_business_wp_option[home_featured_area_2]' , array(
	'default'    => 'woocommerce',
	'sanitize_callback' => 'sanitize_text_field',
	'type'=>'option'
));

$wp_customize->add_control('the_business_wp_option[home_featured_area_2]' , array(
	'label' => __('Select Featured Area','the-business-wp' ),
	'section' => 'home_area',
	'type'=>'select',
	'choices'=> the_business_wp_featured_areas(),
) );

// featured area 3
$wp_customize->add_setting( 'the_business_wp_option[home_featured_area_3]' , array(
	'default'    => 'callout',
	'sanitize_callback' => 'sanitize_text_field',
	'type'=>'option'
));

$wp_customize->add_control('the_business_wp_option[home_featured_area_3]' , array(
	'label' => __('Select Featured Area','the-business-wp' ),
	'section' => 'home_area',
	'type'=>'select',
	'choices'=> the_business_wp_featured_areas(),
) );

// featured area 4
$wp_customize->add_setting( 'the_business_wp_option[home_featured_area_4]' , array(
	'default'    => 'testimonial',
	'sanitize_callback' => 'sanitize_text_field',
	'type'=>'option'
));

$wp_customize->add_control('the_business_wp_option[home_featured_area_4]' , array(
	'label' => __('Select Featured Area','the-business-wp' ),
	'section' => 'home_area',
	'type'=>'select',
	'choices'=> the_business_wp_featured_areas(),
) );

// featured area 5
$wp_customize->add_setting( 'the_business_wp_option[home_featured_area_5]' , array(
	'default'    => 'news',
	'sanitize_callback' => 'sanitize_text_field',
	'type'=>'option'
));

$wp_customize->add_control('the_business_wp_option[home_featured_area_5]' , array(
	'label' => __('Select Featured Area','the-business-wp' ),
	'section' => 'home_area',
	'type'=>'select',
	'choices'=> the_business_wp_featured_areas(),
) );

// featured area 6
$wp_customize->add_setting( 'the_business_wp_option[home_featured_area_6]' , array(
	'default'    => 'contact',
	'sanitize_callback' => 'sanitize_text_field',
	'type'=>'option'
));

$wp_customize->add_control('the_business_wp_option[home_featured_area_6]' , array(
	'label' => __('Select Featured Area','the-business-wp' ),
	'section' => 'home_area',
	'type'=>'select',
	'choices'=> the_business_wp_featured_areas(),
) );

/******************************************* end of home section settings *******************************************************/
$wp_customize->add_section( 'about_area' , array(
		'title'      => __('About Page', 'the-business-wp' ),			 
		'description'=> __('Display featured areas related to About Page Template. You can use customizer partial shortcut buttons to go each section settings. More featured areas, Add any Custom created pages and more customizations Go Pro version. ', 'the-business-wp' ),
		'panel' => 'pages_section',
) );

// featured area 1
$wp_customize->add_setting( 'the_business_wp_option[about_featured_area_1]' , array(
	'default'    =>  __('team', 'the-business-wp' ),
	'sanitize_callback' => 'sanitize_text_field',
	'type'=>'option'
));


$wp_customize->add_control('the_business_wp_option[about_featured_area_1]' , array(
	'label' => __('Select Featured Area','the-business-wp' ),
	'section' => 'about_area',
	'type'=>'select',
	'choices'=> the_business_wp_featured_areas(),
) );

// featured area 2
$wp_customize->add_setting( 'the_business_wp_option[about_featured_area_2]' , array(
	'default'    => __('skills', 'the-business-wp' ),
	'sanitize_callback' => 'sanitize_text_field',
	'type'=>'option'
));


$wp_customize->add_control('the_business_wp_option[about_featured_area_2]' , array(
	'label' => __('Select Featured Area','the-business-wp' ),
	'section' => 'about_area',
	'type'=>'select',
	'choices'=> the_business_wp_featured_areas(),
) );

/******************************************* end of section settings *******************************************************/
$wp_customize->add_section( 'contact_area' , array(
		'title'      => __('Contact Page', 'the-business-wp' ),			 
		'description'=> __('Display featured areas related to Contact Page Template. You can use customizer partial shortcut buttons to go each section settings. More featured areas, Add any Custom created pages and more customizations Go Pro version. ', 'the-business-wp' ),
		'panel' => 'pages_section',
) );

// featured area 1
$wp_customize->add_setting( 'the_business_wp_option[contact_featured_area_1]' , array(
	'default'    => __('contact', 'the-business-wp' ),
	'sanitize_callback' => 'sanitize_text_field',
	'type'=>'option'
));


$wp_customize->add_control('the_business_wp_option[contact_featured_area_1]' , array(
	'label' => __('Select Featured Area','the-business-wp' ),
	'section' => 'contact_area',
	'type'=>'select',
	'choices'=> the_business_wp_featured_areas(),
) );


/******************************************* end of section settings *******************************************************/
$wp_customize->add_section( 'service_area' , array(
		'title'      => __('Service Page', 'the-business-wp' ),			 
		'description'=>  __('Display featured areas related to Service Page Template. You can use customizer partial shortcut buttons to go each section settings. More featured areas, Add any Custom created pages and more customizations Go Pro version.', 'the-business-wp' ),
		'panel' => 'pages_section',
) );

// featured area 1
$wp_customize->add_setting( 'the_business_wp_option[service_featured_area_1]' , array(
	'default'    =>  __('hero', 'the-business-wp' ),
	'sanitize_callback' => 'sanitize_text_field',
	'type'=>'option'
));


$wp_customize->add_control('the_business_wp_option[service_featured_area_1]' , array(
	'label' => __('Select Featured Area','the-business-wp' ),
	'section' => 'service_area',
	'type'=>'select',
	'choices'=> the_business_wp_featured_areas(),
) );

// featured area 2
$wp_customize->add_setting( 'the_business_wp_option[service_featured_area_2]' , array(
	'default'    => __('service', 'the-business-wp' ),
	'sanitize_callback' => 'sanitize_text_field',
	'type'=>'option'
));


$wp_customize->add_control('the_business_wp_option[service_featured_area_2]' , array(
	'label' => __('Select Featured Area','the-business-wp' ),
	'section' => 'service_area',
	'type'=>'select',
	'choices'=> the_business_wp_featured_areas(),
) );
/******************************************* end of section settings *******************************************************/					
