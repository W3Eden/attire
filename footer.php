<?php
if (!defined('ABSPATH')) {
    exit;
}

do_action(ATTIRE_THEME_PREFIX . "body_content_after");

$canshow = AttireThemeEngine::NextGetOption('attire_back_to_top_visibility', 'show');
$canshow = $canshow === 'show' ? ' canshow' : '';

$meta = get_post_meta( get_the_ID(), 'attire_post_meta', true );
// For page specific settings
$hide_site_footer = !isset($meta['hide_site_footer']) || (int)$meta['hide_site_footer'] === 0 ? 0 : (int)$meta['hide_site_footer'];

?>

</div> <!-- END: attire-content div -->
<a href="#" class="back-to-top <?php echo esc_attr($canshow); ?>" rel="nofollow">
    <i class="fas fa-angle-up"></i>
</a>
<?php
if(!$hide_site_footer){
$num_widget = (int)AttireThemeEngine::NextGetOption('footer_widget_number', '3');
if ($num_widget !== 0) {
    do_action(ATTIRE_THEME_PREFIX . "before_footer_widget_area");
    ?>
    <div class="footer-widgets-area">
        <div class="<?php echo esc_attr(AttireThemeEngine::NextGetOption('footer_widget_content_layout_type', 'container')); ?> footer-widgets-outer">
            <div class="row footer-widgets">
                <?php
                $col = 12 / $num_widget;
                for ($i = 1; $i <= (int)$num_widget; $i++) {
                    echo '<div class="col-lg">';
                    dynamic_sidebar("footer" . $i);
                    echo '</div>';
                    if ($i < (int)$num_widget) {
                        do_action(ATTIRE_THEME_PREFIX . "between_footer_widgets");
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    do_action(ATTIRE_THEME_PREFIX . "after_footer_widget_area");
}
do_action(ATTIRE_THEME_PREFIX . "before_footer");

?>

<div class="footer-div">
    <?php AttireThemeEngine::FooterStyle(); ?>
</div>
<?php } ?>
<div class="modal fade" id="attire-search-modal" tabindex="-1" role="dialog" aria-labelledby="attire-search-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered border-0" role="document">
        <div class="modal-content bg-transparent border-0">

            <form action="<?php echo esc_url(home_url('/')) ?>">
                <div class="form-group text-white">
                    <div class="custom-control custom-switch custom-control-inline">
                        <input checked="checked" type="checkbox" id="spost" name="post_type[]" value="post" class="custom-control-input">
                        <label class="custom-control-label" for="spost"><?php _e('Post', 'attire'); ?></label>
                    </div>
                    <div class="custom-control custom-switch custom-control-inline">
                        <input type="checkbox" id="spage" name="post_type[]" value="page" class="custom-control-input">
                        <label class="custom-control-label" for="spage"><?php _e('Page', 'attire'); ?></label>
                    </div>
                    <?php if(post_type_exists('wpdmpro')){ ?>
                        <div class="custom-control custom-switch custom-control-inline">
                            <input type="checkbox" id="wpdmpro" name="post_type[]" value="wpdmpro" class="custom-control-input">
                            <label class="custom-control-label" for="wpdmpro"><?php _e('Downloads', 'attire'); ?></label>
                        </div>
                    <?php } ?>
                    <?php if(post_type_exists('product')){ ?>
                        <div class="custom-control custom-switch custom-control-inline">
                            <input type="checkbox" id="product" name="post_type[]" value="product" class="custom-control-input">
                            <label class="custom-control-label" for="product"><?php _e('Products', 'attire'); ?></label>
                        </div>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-lg">
                        <input type="search" class="form-control input-lg input-search p-4" placeholder="<?php _e('Search...', 'attire'); ?>" name="s" value="" />
                        <div class="input-group-append">
                            <button type="submit" class="btn bg-white text-primary"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<?php
wp_footer(); ?>
</div><!-- #Mainframe-->
</body>
</html>
