<?php

/**************** 
* Team Settings *
****************/

			$wp_customize->add_section( 'team_section' , array(
				'title'      => __('Team', 'the-business-wp'),
				'description'=> __('First, create a page from home-page template, From Home page settings select the created page as static home page. Create Posts with featured image (team member), title and content and select from post dropdown list below. Need More team options, Go Pro Version.','the-business-wp'),
				'panel'  => 'theme_options'
			) );
			
			
			// background Alpha Color Picker setting
			$wp_customize->add_setting(
				'the_business_wp_option[team_section_background_color]',
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
					'the_business_wp_option[team_section_background_color]',
					array(
						'label'         =>  __('Section Background Color','the-business-wp' ),
						'section'       => 'team_section',
						'settings'      => 'the_business_wp_option[team_section_background_color]',
						'show_opacity'  => true, // Optional.
						'palette'	=> the_business_wp_color_codes(),
					)
				)
			);				

            $wp_customize->add_setting( 'the_business_wp_option[team_section_title]' , array(
                'default'    => __('Team','the-business-wp'),
                'sanitize_callback' => 'sanitize_text_field',
                'type'=>'option'
            ));
            $wp_customize->add_control('the_business_wp_option[team_section_title]' , array(
                'label' => __('Section Title','the-business-wp'),
                'section' => 'team_section',
                'type'=>'text',
            ) );
			
			$wp_customize->selective_refresh->add_partial( 'the_business_wp_option[team_section_title]', array(
				'selector' => '#team .section-title',
			) );		
			
            $wp_customize->add_setting( 'the_business_wp_option[team_section_description]' , array(
                'default'    => '',
                'sanitize_callback' => 'sanitize_text_field',
                'type'=>'option'
            ));
            $wp_customize->add_control('the_business_wp_option[team_section_description]' , array(
                'label' => __('Section Subtitle','the-business-wp'),
                'section' => 'team_section',
                'type'=>'text',
            ) );


        $wp_customize->add_setting( 'team_label2', array(
			'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control( new the_business_wp_Label_Custom_control( $wp_customize, 'team_label2', array(
            'label'   => __('Select existing Posts with featured image (team), title and content','the-business-wp' ),
            'section' => 'team_section',
        ) ) );		

		global $the_business_wp_all_posts;
		
		// post 1
		$wp_customize->add_setting( 'the_business_wp_option[team_cat]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[team_cat]' , array(
		'label' => __('Select Post 1','the-business-wp' ),
		'section' => 'team_section',
		'type'=>'select',
		'choices'=> $the_business_wp_all_posts, 
		) );
		
		// post 2
		$wp_customize->add_setting( 'the_business_wp_option[team_cat2]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[team_cat2]' , array(
		'label' => __('Select Post 2','the-business-wp' ),
		'section' => 'team_section',
		'type'=>'select',
		'choices'=> $the_business_wp_all_posts, 
		) );
		
		// post 3
		$wp_customize->add_setting( 'the_business_wp_option[team_cat3]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[team_cat3]' , array(
		'label' => __('Select Post 3','the-business-wp' ),
		'section' => 'team_section',
		'type'=>'select',
		'choices'=> $the_business_wp_all_posts, 
		) );									
		
		// post 4
		$wp_customize->add_setting( 'the_business_wp_option[team_cat4]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[team_cat4]' , array(
		'label' => __('Select Post 4','the-business-wp' ),
		'section' => 'team_section',
		'type'=>'select',
		'choices'=> $the_business_wp_all_posts, 
		) );
		
		// post 5
		$wp_customize->add_setting( 'the_business_wp_option[team_cat5]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[team_cat5]' , array(
		'label' => __('Select Post 5','the-business-wp' ),
		'section' => 'team_section',
		'type'=>'select',
		'choices'=> $the_business_wp_all_posts, 
		) );
		
		// post 6
		$wp_customize->add_setting( 'the_business_wp_option[team_cat6]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('the_business_wp_option[team_cat6]' , array(
		'label' => __('Select Post 6','the-business-wp' ),
		'section' => 'team_section',
		'type'=>'select',
		'choices'=> $the_business_wp_all_posts, 
		) );
		
		//team section content
		$wp_customize->add_setting( 'the_business_wp_option[team_section_image]' , array(
			'default' => '',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
			'type'=>'option'
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'the_business_wp_option[team_section_image]' ,
			array(
				'label'          => __( 'Background Image', 'the-business-wp' ),
				'section'        => 'team_section',
			) )	);

        $wp_customize->add_setting( 'the_business_wp_option[team_section_image_repeat]', array(
            'default'        => 'no-repeat',
            'sanitize_callback' => 'sanitize_text_field',
            'type'=>'option'
        ) );
		
        $wp_customize->add_control(
            'the_business_wp_option[team_section_image_repeat]',
            array(
                'label'    => __( 'Background Repeat', 'the-business-wp' ),
                'section'  => 'team_section',
                'settings' => 'the_business_wp_option[team_section_image_repeat]',
                'type'     => 'select',
                'choices'  => the_business_wp_background_style(),
            )
        );
		
