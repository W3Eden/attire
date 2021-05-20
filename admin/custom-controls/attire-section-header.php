<?php
if (class_exists('WP_Customize_Control')) {

    class Attire_Section_Header_Custom_Control extends WP_Customize_Control
    {

        public $type = 'section-header';

        public function render_content()
        {
            ?>
            <div style="padding: 10px 15px;background: #fff;font-weight: 800;margin: 15px -15px 0;border-top: 1px solid #f9f9f9;border-bottom: 1px solid #f7f7f7;box-shadow: inset 0 0 1px   #888888;color: #4c69db;text-transform: uppercase;letter-spacing: 1px;"><?php echo esc_html($this->label); ?></div>
            <?php
        }
    }
}