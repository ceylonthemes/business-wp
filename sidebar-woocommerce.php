<?php
/**
 * The sidebar containing the main widget area
 *
 * @package the-business-wp
 * @since 1.0

 */

if ( ! is_active_sidebar( 'sidebar-woocommerce' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Woocommerce Sidebar', 'the-business-wp' ); ?>">
	<?php dynamic_sidebar( 'sidebar-woocommerce' ); ?>
</aside><!-- #secondary -->
