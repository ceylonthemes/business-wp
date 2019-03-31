<?php

function the_business_wp_custom_fonts_css(){
    $header_font =  esc_html(get_theme_mod( 'header_fontfamily','Oswald')) ;
	$body_font =  esc_html(get_theme_mod('body_fontfamily','Raleway'));
    $css='
	
.custom-fonts  h1 ,
.custom-fonts  h2 ,
.custom-fonts  h3 ,
.custom-fonts  h4 ,
.custom-fonts  h5 ,
.custom-fonts  h6 {
    font-family:'.$header_font.',sans serif;
}

html .custom-fonts{
    font-family:'.$body_font.',sans serif;
}

.custom-fonts  .main-navigation {
    font-family:'.$header_font.',sans serif;
}

.custom-fonts  .site-title, .custom-fonts .testimonial-title {
    font-family:'.$header_font.',sans serif;
}

.custom-fonts #main_Carousel .slider-title {
    font-family:'.$header_font.',sans serif;
}

';

return $css;
}
