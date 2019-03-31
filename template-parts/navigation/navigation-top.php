<?php
/**
 * Displays top navigation
 *
 * @package the-business-wp
 * @since 1.0

 */

if ( has_nav_menu( 'top' ) ) : ?>
<div class="navigation-top" style="font-size:<?php  echo absint(get_theme_mod( 'navigation_font_size','15')); ?>px">
<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'the-business-wp' ); ?>">
	<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
		<?php
		echo the_business_wp_get_fo( array( 'icon' => 'bars' ) );
		echo the_business_wp_get_fo( array( 'icon' => 'close' ) );
		esc_html_e( 'Menu', 'the-business-wp' );
		?>
	</button>

	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'top',
			'menu_id'        => 'top-menu',
		)
	);
	?>

</nav><!-- #site-navigation -->

</div>	  

<!-- .navigation-top -->
<?php endif; ?>
