<?php
if ( class_exists( 'WP_Customize_Control' ) ) {

	class Attire_Customize_Range_Control extends WP_Customize_Control {
		public $type = 'custom_range';

		public function render_content() {
			?>
            <label>
				<?php if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php endif; ?>
                <table class="wp_custom_range_table">
                    <tr>
                        <td style="width:80%;">
                            <input data-input-type="range" type="range" <?php $this->input_attrs(); ?>
                                   value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
                        </td>
                        <td style="width: 20%">
                            <input class="cs-range-value"
                                   value="<?php echo esc_attr( $this->value() ); ?>" type="number"/>
                        </td>

                    </tr>
                </table>
				<?php if ( $this->description ) : ?>
                    <em class="customize-control-description"><?php echo esc_html( $this->description ); ?></em>
				<?php endif; ?>
            </label>
			<?php
		}
	}
}