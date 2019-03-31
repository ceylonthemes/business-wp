<?php
/**
 * Template for displaying search forms
 *
 * @package the-business-wp
 * @since 1.0

 */

?>

<?php $the_business_wp_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr($the_business_wp_id); ?>">
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'the-business-wp' ); ?></span>
	</label>
	<input type="search" id="<?php echo esc_attr($the_business_wp_id); ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'the-business-wp' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit"><?php echo the_business_wp_get_fo( array( 'icon' => 'search' ) ); ?><span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'the-business-wp' ); ?></span></button>
</form>
