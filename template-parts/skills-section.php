<?php
// $the_business_wp_option array declared in functions.php
the_business_wp_skills();
function the_business_wp_skills(){
global $the_business_wp_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $the_business_wp_settings = new the_business_wp_settings();
   $the_business_wp_option = wp_parse_args(  get_option( 'the_business_wp_option', array() ) , $the_business_wp_settings->default_data());  
}

$the_business_wp_color=$the_business_wp_option['skill_section_skill_color'];
if(get_theme_mod( 'colorscheme')!='blue'){
   $the_business_wp_color=get_theme_mod( 'colorscheme_color','#2d89ef');
}

?>

<section id="skills" >
<div class="svc-section-body section-padding"   style="background:<?php echo esc_attr( $the_business_wp_option['skill_section_background_color'] ); ?>;" >
<div class="container">
  <div class="row">
    <?php if($the_business_wp_option['skill_section_title']!=''): ?>
    <h1 class="section-title wow animated fadeInUp"><?php echo esc_html( $the_business_wp_option['skill_section_title'] ); ?></h1>
    <?php endif; ?>
  </div>
  <div class="row" style="padding:20px 0 20px;">
    <div class="col-md-6 col-sm-6">
      <?php if($the_business_wp_option['skill_section_description']!=''): ?>
      <p class="skill-section-desc wow animated fadeInUp"><?php echo wp_kses_post( nl2br($the_business_wp_option['skill_section_description']),'br' ); ?></p>
      <?php endif; ?>
    </div>
    <div class="col-md-6 col-sm-6">
	
      <?php if($the_business_wp_option['skill_section_skill1']!=''): ?>
      <p class="skillbar-title"><?php echo esc_html( $the_business_wp_option['skill_section_skill1'] ); ?></p>
	  <p class="skillbar-title floateright"><?php echo esc_html( $the_business_wp_option['skill_section_skill1_progress'].'%' ); ?>&nbsp;</p>
      <div class="skill-container">
        <div class="skills" style="width:<?php echo absint( $the_business_wp_option['skill_section_skill1_progress'] ).'%'; ?>;background: <?php echo esc_attr($the_business_wp_color); ?>;">&nbsp;</div>
      </div>
      <?php endif; ?>
	  
	  <?php if($the_business_wp_option['skill_section_skill2']!=''): ?>	  
      <p class="skillbar-title"><?php echo esc_html( $the_business_wp_option['skill_section_skill2'] ); ?></p>
	  <p class="skillbar-title floateright"><?php echo esc_html( $the_business_wp_option['skill_section_skill2_progress'].'%' ); ?></p>
      <div class="skill-container">
        <div class="skills" style="width:<?php echo absint( $the_business_wp_option['skill_section_skill2_progress'] ).'%'; ?>;background: <?php echo esc_attr($the_business_wp_color); ?>;">&nbsp;</div>
      </div>
	  <?php endif; ?>
	  
	  <?php if($the_business_wp_option['skill_section_skill3']!=''): ?>
      <p class="skillbar-title"><?php echo esc_html( $the_business_wp_option['skill_section_skill3'] ); ?></p>
	  <p class="skillbar-title floateright"><?php echo esc_html( $the_business_wp_option['skill_section_skill3_progress'].'%' ); ?>&nbsp;</p>
      <div class="skill-container">
        <div class="skills" style="width:<?php echo absint( $the_business_wp_option['skill_section_skill3_progress'] ).'%'; ?>;background: <?php echo esc_attr($the_business_wp_color); ?>;">&nbsp;</div>
      </div>
	  <?php endif; ?>
	  
	  <?php if($the_business_wp_option['skill_section_skill4']!=''): ?>
      <p class="skillbar-title"><?php echo esc_html( $the_business_wp_option['skill_section_skill4'] ); ?></p>
	  <p class="skillbar-title floateright"><?php echo esc_html( $the_business_wp_option['skill_section_skill4_progress'].'%' ); ?>&nbsp;</p>
      <div class="skill-container">
        <div class="skills" style="width:<?php echo absint( $the_business_wp_option['skill_section_skill4_progress'] ).'%'; ?>;background: <?php echo esc_attr($the_business_wp_color); ?>;">&nbsp;</div>
      </div>
	  <?php endif; ?>	  
  
    </div>
  </div>
</div>
</section>
<?php } ?>

