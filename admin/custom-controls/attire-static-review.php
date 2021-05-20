<?php
if (class_exists('WP_Customize_Control')) {

    class Attire_Static_Review_Text_Control extends WP_Customize_Control
    {
        public $type = 'static-text';

        protected function render_content()
        {
            ?>
            <div class="customize-control-description"><?php

                if (is_array($this->description)) {
                    echo '<p>' . implode('</p><p>', $this->description) . '</p>';
                } else {
                    echo $this->description;
                }

                ?>
                <h2><?php esc_html_e('Write a Review', 'attire') ?></h2>
                <p style="text-align:left;">
                    We highly appreciate it if you kindly take a few minutes to give us your impression of the theme and any suggestions you may have. It will help us improve the ability to serve you and other users better.
                </p>
                <p>
                    <a href="<?php echo esc_url('https://wordpress.org/support/theme/attire/reviews/#new-post'); ?>"
                       target="_blank"><?php esc_html_e('Write Your Review', 'attire'); ?></a>
                </p>
                <h3><?php esc_html_e('Support', 'attire') ?></h3>
                <p><?php esc_html_e('Need help? You can reach us at', 'attire') ?> </p>

                <p>
                    <a href="<?php echo esc_url('https://wordpress.org/support/theme/attire'); ?>"
                       target="_blank"><?php esc_html_e('@Wordpress', 'attire'); ?></a>
                    or
                    <a href="<?php echo esc_url('http://wpattire.com/support/support/'); ?>"
                       target="_blank"><?php esc_html_e('@Our website', 'attire'); ?></a>
                </p>

            </div>

            <?php

        }

    }
}
