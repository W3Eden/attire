<?php
/**
 * Base: wpdmpro
 * Developer: shahjada
 * Team: W3 Eden
 * Date: 20/1/20 18:59
 */

if(!defined("ABSPATH")) die();
?>
<form action="<?php echo esc_url(home_url('/')); ?>">
    <div class="input-group input-group-lg">
        <input type="text" placeholder="<?php _e('Search...', 'attire'); ?>" name="s" class="form-control border-0 shadow-none" />
        <div class="input-group-append">
            <button class="btn btn-whilte"><i class="fa fa-search"></i></button>
        </div>
    </div>
</form>
