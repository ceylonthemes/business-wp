<?php

/*
 * default settings 
 */
if( !class_exists('the_business_wp_settings') ){
	
	class the_business_wp_settings {

		function default_data(){
			return array(
			//featured area names used to identify, with(php code)  
			//not displayed to user. !should not translate
			'home_featured_area_0' => 'slider',
			'home_featured_area_1' => 'service',
			'home_featured_area_2' => 'woocommerce',
			'home_featured_area_3' => 'callout',
			'home_featured_area_4' => 'news',
			'home_featured_area_5' => 'testimonial',
			'home_featured_area_6' => 'contact',
			
					
			'service_featured_area_1' => 'hero',
			'service_featured_area_2' => 'service',	
			'about_featured_area_1' => 'team',			
			'about_featured_area_2' => 'skills',						
			'contact_featured_area_1' => 'contact',
								
			'home_header_section_disable' => true,
			
			'blog_sidebar_position' => 'right',
					
			//hero section
			'hero_section_enable' => 1,
			'hero_section_background_color' => '#fff',
			'hero_section_title' =>  __('Hero','the-business-wp'),
			'hero_section_description' => '',	
			'hero_section_url' => '',
			'hero_section_button_text' => __('Read More','the-business-wp'),		
			'hero_section_page' => '',	
				
			'callout_section_enable' => 1,
			'callout_section_background_color' => 'rgba(0, 157, 255, 0.88)',	
			'callout_section_title' => __('Callout','the-business-wp'),	
			'callout_section_description' =>'',
			'callout_section_url' => '#',	
			'callout_section_button_text' => '',				
			'callout_section_image' => '',	
			'callout_section_image_repeat' => 'no-repeat',	
			'callout_button_color' => '#2d89ef',			
							
			'slider_animation_type' => 'fade',
			'slider_cat' => '',
			'slider_cat2' => '',
			'slider_cat3' => '',
			'slider_image_height' => 500,
			'slider_button_text' => __('Click Here to Begin','the-business-wp'),
			'slider_button_url' => "#service",
			'slider_speed' => 3000,		
			'slider_enable' => true,		
			
			'layout_section_post_one_column' => 0 ,	
			'box_layout' => 0 ,	
			
			'questions_section_enable'	=> true ,
			'questions_section_description_title'	=> __('Section Title','the-business-wp'),
			'questions_section_title'	=> __('Section Title','the-business-wp'),
			'questions_section_description'	=> '' ,			
			'questions_section_background_color'	=> '#fff' ,		
			
			'social_facebook_link' => '',
			'social_twitter_link' => '',
			'social_skype_link' => '',
			'social_pinterest_link' => '',
			'social_open_new_tab' => 1,
			
			'woocommerce_section_enable' => 1,
			'woocommerce_section_title' => __('Shop','the-business-wp'),
			'woocommerce_section_description' =>'',
			'woocommerce_section_image' => '',
			'woocommerce_products_show' => 4,
			'woocommerce_section_product_type' => 'all',
			'woocommerce_section_layout' => 'detail',
			'woocommerce_section_background_color' => '#ffffff',
			'woocommerce_section_image_repeat' => 'no-repeat',
			'woocommerce_header_cart_hide' => 0,	
			'woocommerce_free_checkout_feelds' => 1,					
			
			'testimonial_section_enable' => 1,
			'testimonial_section_title' => __('Testimonials','the-business-wp'),
			'testimonial_animation_type' => 'slide',
			'testimonial_speed' => '3000',
			'testimonial_cat' => "",
			'testimonial_cat2' => "",
			'testimonial_cat3' => "",
			'testimonial_section_background_color' => '#ffffff',
			'testimonial_section_image' => '',
			'testimonial_section_image_repeat' => 'no-repeat',
			'testimonial_section_description' => '',
			
			'contact_section_enable' => 1,
			'contact_section_hide_header' => 0,
			'contact_section_description' => '',
			'contact_section_title' =>  __('Contact','the-business-wp'),
			'contact_section_background_color' => '#ffffff',
			'contact_section_shortcode' => '',
			'contact_section_address' => '',
			'contact_section_email' => '',
			'contact_section_fax' => '',
			'contact_section_phone' => '',
			'contact_section_hours' => '',
			
			'service_section_enable' => 1,
			'service_section_description' => '',
			'service_section_title' => __('Services','the-business-wp'),
			'service_section_background_color' => '#ffffff',    
			'service_section_image' => '',
			'service_section_image_repeat' => 'no-repeat',
			'service_section_style' => 'default',
			'service_cat' => 0,
			'service_cat2' => 0,
			'service_cat3' => 0,
			'service_cat4' => 0,			
			'service_cat5' => 0,
			'service_cat6' => 0,
			
			'team_section_enable' => 1,
			'team_section_description' => '',
			'team_section_title' => __('Our Team','the-business-wp'),
			'team_section_background_color' => '#ffffff',    
			'team_section_image' => '',
			'team_section_image_repeat' => 'no-repeat',	
			'team_no_of_show' => 4,
			'team_cat' => 0,	
			'team_cat2' => 0,
			'team_cat3' => 0,
			'team_cat4' => 0,
			'team_cat5' => 0,	
			'team_cat6' => 0,
									
			'news_section_enable' => 1, 			
			'news_section_title' => __('News/Events','the-business-wp'),
			'news_category_show' => "",
			'news_section_background_color' => '#ffffff',
			'news_section_image' => '',
			'news_section_image_repeat' => 'no-repeat',
			'news_no_of_show' => 4,			   
			'news_section_description' => '',
		
			
			'stats_section_enable' => 1,
			'stats_section_title' => __('Stats','the-business-wp'),
			'stats_section_description' => '',
			'stats_section_background_color' => '#000',
			'stats_section_image' => '',
			'stats_section_image_repeat' => 'no-repeat',	
			'stats_page_1' => '',	
			'stats_page_2' => '',	
			'stats_page_3' => '',	
			'stats_page_4' => '',			
			
			'skill_section_enable' => 1,
			'skill_section_title' => __('Skills','the-business-wp'),
			'skill_section_description' => '',			
			'skill_section_background_color' => '#fff',
			'skill_section_skill1_progress' => 90,
			'skill_section_skill2_progress' => 75,
			'skill_section_skill3_progress' => 90,
			'skill_section_skill4_progress' => 60,
			'skill_section_skill1' => '',
			'skill_section_skill2' => '',
			'skill_section_skill3' => '',
			'skill_section_skill4' => '',
			'skill_section_skill_color' => '#2d89ef',	
			
			'footer_section_background_color' => '#080f2e',	
			'footer_section_image' => '',
			'footer_section_image_repeat' => 'no-repeat',	
			'footer_section_bottom_background_color' => '#0f193f',	
			'footer_foreground_color' => '#fff',		
            'footer_section_bottom_text' => __('Theme by Ceylon Themes','the-business-wp'),
			'footer_section_bottom_text_link' => '',	
			
				
			);
		}
	}	

}
