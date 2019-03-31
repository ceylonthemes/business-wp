<?php
/* Customizer Range Value Control 
 * Licenses: GNU General Public License 
 * Source:https://github.com/soderlind/class-customizer-range-value-control 
 */

if (!class_exists('The_Business_WP_Range_Value_Control')) {

class The_Business_WP_Range_Value_Control extends WP_Customize_Control {
	public $type = 'range-value';

	/**
	 * Enqueue scripts/styles.
	 *
	 */
	public function enqueue() {
		wp_enqueue_script( 'customizer-range-value-control', THE_BUSINESS_WP_TEMPLATE_DIR_URI.'/inc/range-value-control/js/customizer-range-value-control.js', array( 'jquery' ), rand(), true );
		wp_enqueue_style( 'customizer-range-value-control', THE_BUSINESS_WP_TEMPLATE_DIR_URI.'/inc/range-value-control/css/customizer-range-value-control.css', array(), rand() );
	}

	/**
	 * Render the control's content.
	 *
	 */
	public function render_content() {
		?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<div class="range-slider"  style="width:100%; display:flex;flex-direction: row;justify-content: flex-start;">
				<span  style="width:100%; flex: 1 0 0; vertical-align: middle;"><input class="range-slider__range" type="range" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->input_attrs(); $this->link(); ?>>
				<span class="range-slider__value">0</span></span>
			</div>
			<?php if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
			<?php endif; ?>
		</label>
		<?php
	}
  }
}