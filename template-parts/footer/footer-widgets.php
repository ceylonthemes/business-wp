<?php
/**
 * Displays footer widgets if assigned
 *
 * @package the-business-wp
 * @since 1.0

 */

?>

	<aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'the-business-wp' ); ?>">
		<?php
		if ( is_active_sidebar( 'footer-sidebar-1' ) ) {
		?>
			<div class="col-md-3 col-sm-3 footer-widget">
				<?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
			</div>
		<?php
		}
		if ( is_active_sidebar( 'footer-sidebar-2' ) ) {
		?>
			<div class="col-md-3 col-sm-3 footer-widget">
				<?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
			</div>			
		<?php
		}
		if ( is_active_sidebar( 'footer-sidebar-3' ) ) {
		?>
			<div class="col-md-3 col-sm-3 footer-widget">
				<?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
			</div>
		<?php
		}
		if ( is_active_sidebar( 'footer-sidebar-4' ) ) {
		?>
			<div class="col-md-3 col-sm-3 footer-widget">
				<?php dynamic_sidebar( 'footer-sidebar-4' ); ?>
			</div>
        <?php }	?>
	</aside><!-- .widget-area -->



