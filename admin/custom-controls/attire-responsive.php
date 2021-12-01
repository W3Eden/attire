<?php
if ( class_exists( 'WP_Customize_Control' ) ) {

	class Attire_Customize_Responsive_Control extends WP_Customize_Control {
		public $type = 'attire_responsive_input';

		public function render_content() {
			?>
            <label class=" w-100">
				<?php if ( ! empty( $this->label ) ) : ?>
                    <table class="customize-control-title w-100">
                        <tbody style="display: table;width: 100%">
                        <tr>
                            <td style="width:80%;">
								<?php echo esc_html( $this->label ); ?>
                            </td>
                            <td style="width: 15%">
                                <span class="float-right attire-responsive-icons">
                                    <i class="fas fa-desktop at-show-desktop-option active"></i>&nbsp;
                                    <i class="fas fa-tablet-alt at-show-tablet-option"></i>&nbsp;
                                    <i class="fas fa-mobile-alt at-show-mobile-option"></i>
                                </span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
				<?php endif; ?>
                <div class="attire-responsive-inputs">
					<?php
					$classes = [ 'desktop', 'tablet', 'mobile' ];
					foreach ( $this->settings as $key => $setting ) {
//                      $this->build_field_html($key, $value);
						$field_value = $this->value( $key );
						?>
                        <table class="wp_custom_range_table attire-responsive-wrapper attire-responsive-<?php echo $classes[ $key ];
						echo( $classes[ $key ] == 'desktop' ? ' active' : ' ' ) ?>">
                            <tr>
                                <td style="width:80%;">
                                    <input <?php $this->input_attrs(); ?> class="attire-responsive-input"
                                                                          data-input-type="range" type="range"
                                                                          value="<?php echo $field_value; ?>" <?php $this->link( $key ); ?>/>
                                </td>
                                <td style="width: 20%">
                                    <input <?php $this->input_attrs(); ?> class="attire-responsive-input cs-range-value"
                                                                          value="<?php echo $field_value; ?>"
                                                                          type="number"/>
                                </td>
                            </tr>
                        </table>
						<?php
					}
					?>
                </div>
            </label>
			<?php
		}

		public function build_field_html( $key, $setting ) {
			$classes = [ 'desktop', 'tablet', 'mobile' ];
			$value   = '';
			if ( isset( $this->settings[ $key ] ) ) {
				$value = $this->settings[ $key ]->value();
			}
			ob_start();
			$this->input_attrs();
			$attrs = ob_get_clean();

			echo '<table class="wp_custom_range_table attire-responsive-wrapper attire-responsive-' . $classes[ $key ] . ' ' . ( $classes[ $key ] == 'desktop' ? 'active' : '' ) . '">
                    <tr>
                        <td style="width:80%;">
                            <input ' . $attrs . ' class="attire-responsive-input" data-input-type="range" type="range" value="' . $value . '" ' . $this->get_link( $key ) . ' />
                        </td>
                        <td style="width: 20%">
                            <input ' . $attrs . ' class="attire-responsive-input cs-range-value" value="' . $value . '" type="number"/>
                        </td>
                    </tr>
                </table>';
		}
	}
}