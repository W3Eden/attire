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
    <div class="input-group">
        <input type="text" placeholder="<?php _e('Search...', 'attire'); ?>" name="s" class="form-control" />
        <div class="input-group-append">
            <button class="btn btn-success"><i class="fa fa-search"></i></button>
        </div>
    </div>
</form>
