<?php
if (class_exists('WP_Customize_Control')) {
    class Attire_Image_Picker_Custom_Control extends WP_Customize_Control
    {

        public $type = 'image-picker';

        public function render_content()
        {
            ?>
            <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <div class="attire-image-picker">
                <?php foreach ($this->choices as $choice): ?>

                    <label>
                        <input type="radio" <?php $this->link(); ?> name="<?php echo esc_attr($this->id); ?>"
                               value="<?php echo esc_attr($choice['value']); ?>"/>
                        <div class="card">
                            <div class="card-header">
                                <?php echo esc_attr($choice['title']); ?>
                            </div>
                            <div class="card-body">
                                <img src="<?php echo esc_url($choice['src']); ?>"
                                     alt="<?php echo esc_attr($choice['title']); ?>"
                                     title="<?php echo esc_attr($choice['title']); ?>"/>
                            </div>
                        </div>
                    </label>

                <?php endforeach; ?>
            </div>
            <?php
        }
    }
}
