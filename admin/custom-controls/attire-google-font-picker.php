<?php
if (class_exists('WP_Customize_Control')) {
    class Attire_Google_Font_Picker_Control extends WP_Customize_Control
    {
        public $type = 'google_font_picker';

        public function render_content()
        {


            ?>
            <label>
                <?php if (!empty($this->label)) : ?>
                    <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <?php endif; ?>
                <select id="<?php echo $this->id; ?>" <?php $this->link(); ?>
                        name="<?php echo esc_attr($this->id); ?>" <?php $this->input_attrs(); ?>>
                    <?php foreach ($this->choices as $key => $value) { ?>
                        <option value="<?php echo $key; ?>" <?php selected($this->value(), $key) ?> ><?php echo $value; ?></option>
                    <?php } ?>
                </select>

            </label>
            <?php /*
            <div style="display: flex">
                <div>
                    <label>
                        <span class="customize-control-title"><?php _e('Letter Spacing', 'attire'); ?></span>
                        <table class="wp_custom_range_table">
                            <tr>
                                <td style="width:65%;">
                                    <input data-input-type="range" type="range"
                                           value="<?php echo esc_attr($this->value($this->id."_letter_spacing")); ?>" <?php $this->link($this->id."_letter_spacing"); ?> />
                                </td>
                                <td style="width: 35%">
                                    <input class="cs-range-value"
                                           value="<?php echo esc_attr($this->value($this->id."_letter_spacing")); ?>" type="number"/>
                                </td>
                            </tr>
                        </table>
                    </label>
                </div>
                <div>
                    <label>
                        <span class="customize-control-title"><?php _e('Line Height', 'attire'); ?></span>
                        <table class="wp_custom_range_table">
                            <tr>
                                <td style="width:65%;">
                                    <input data-input-type="range" type="range" <?php $this->input_attrs(); ?>
                                           value="<?php echo esc_attr($this->value($this->id."_line_height")); ?>"  <?php $this->link($this->id."_line_height"); ?>  />
                                </td>
                                <td style="width: 35%">
                                    <input class="cs-range-value"
                                           value="<?php echo esc_attr($this->value($this->id."_line_height")); ?>" type="number"/>
                                </td>
                            </tr>
                        </table>
                    </label>
                </div>

            </div>
             */ ?>
            <script>
                jQuery(function ($) {
                    $('#<?php echo $this->id; ?>').chosen({width: "100%"});
                });
            </script>
            <?php
        }
    }
}
