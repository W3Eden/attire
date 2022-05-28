<?php
if (class_exists('WP_Customize_Control')) {
    class Attire_Layout_Picker_Custom_Control extends WP_Customize_Control
    {

        public $type = 'layout';

        public function render_content()
        {
            $imageDir = '/images/layouts/';
            $imguri = ATTIRE_TEMPLATE_URL . $imageDir;
            ?>
            <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <div class="attire-sb-layout">
                <label>
                    <input type="radio" <?php $this->link(); ?> name="<?php echo esc_attr($this->id); ?>"
                           value="no-sidebar"/>
                    <img src="<?php echo esc_url($imguri); ?>no-sidebar.png"
                         alt="<?php _e('Full Width', 'attire'); ?>"
                         title="<?php _e('Full Width', 'attire'); ?>"/>
                </label>
                <label>
                    <input type="radio" <?php $this->link(); ?> name="<?php echo esc_attr($this->id); ?>"
                           value="left-sidebar-1"/>
                    <img src="<?php echo esc_url($imguri); ?>left-sidebar.png"
                         alt="<?php _e('Left Sidebar', 'attire'); ?>"
                         title="<?php _e('Left Sidebar', 'attire'); ?>"/>
                </label>
                <label>
                    <input type="radio" <?php $this->link(); ?> name="<?php echo esc_attr($this->id); ?>"
                           value="right-sidebar-1"/>
                    <img src="<?php echo esc_url($imguri); ?>right-sidebar.png"
                         alt="<?php _e('Right Sidebar', 'attire'); ?>"
                         title="<?php _e('Right Sidebar', 'attire'); ?>"/>
                </label>
                <label>
                    <input type="radio" <?php $this->link(); ?> name="<?php echo esc_attr($this->id); ?>"
                           value="sidebar-2"/>
                    <img src="<?php echo esc_url($imguri); ?>sidebar-2.png"
                         alt="<?php _e('Sidebar | Content | Sidebar', 'attire'); ?>"
                         title="<?php _e('Sidebar | Content | Sidebar', 'attire'); ?>"/>
                </label>
                <label>
                    <input type="radio" <?php $this->link(); ?> name="<?php echo esc_attr($this->id); ?>"
                           value="left-sidebar-2"/>
                    <img src="<?php echo esc_url($imguri); ?>left-sidebar-2.png"
                         alt="<?php _e('Two Left Sidebar', 'attire'); ?>"
                         title="<?php _e('Two Left Sidebar', 'attire'); ?>"/>
                </label>
                <label>
                    <input type="radio" <?php $this->link(); ?> name="<?php echo esc_attr($this->id); ?>"
                           value="right-sidebar-2"/>
                    <img src="<?php echo esc_url($imguri); ?>right-sidebar-2.png"
                         alt="<?php _e('Two Right Sidebar', 'attire'); ?>"
                         title="<?php _e('Two Right Sidebar', 'attire'); ?>"/>
                </label>
            </div>
	        <?php
	        if ( $this->description ) :?>
                <em class="customize-control-description"><?php echo esc_html( $this->description ); ?></em>
	        <?php endif; ?>
            <?php
        }
    }
}