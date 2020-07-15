<div class="w3eden author-dashbboard">
    <?php if (is_user_logged_in()) {

        $menu_url = get_permalink(get_the_ID()).$sap.'adb_page=%s';

        if(isset($params['flaturl']) && $params['flaturl'] == 1)
            $menu_url = rtrim(get_permalink(get_the_ID()), '/').'/%s/';

        $store = get_user_meta(get_current_user_id(), '__wpdm_public_profile', true);


    ?>
<div class="row">
    <div id="wpdm-dashboard-sidebar" class="col-md-3">

    <div id="tabs" style="margin: 0;">
        <?php if(isset($store['logo']) && $store['logo'] != ''){ ?>
            <div id="logo-block">
                <img style="margin-bottom: 10px;border-radius: 4px" class="thumbnail shop-logo" id="shop-logo" src="<?php echo $store['logo']; ?>"/>
            </div>
        <?php } ?>
        <?php foreach ($tabs as $tid => $tab): ?>
            <a class="adp-item <?php if ($task == $tid) { ?>active<?php } ?>" href="<?php echo $tid != ''?sprintf("$menu_url", $tid):get_permalink(get_the_ID()); ?>"><i class="<?php echo $default_icons[$tid]; ?> mr-3"></i><?php echo $tab['label']; ?></a>
        <?php endforeach; ?>
        
        <a class="adp-item <?php if ($task == 'edit-profile') { ?>active<?php } ?>" href="<?php echo sprintf("$menu_url", "edit-profile"); ?>"><i class="fas fa-user-edit mr-3"></i><?php _e( "Edit Profile" , "attire" ); ?></a>

        <a class="adp-item <?php if ($task == 'settings') { ?>active<?php } ?>" href="<?php echo sprintf("$menu_url", "settings"); ?>"><i class="fas fa-tools mr-3"></i><?php _e( "Settings" , "attire" ); ?></a>
        <a class="adp-item" href="<?php echo wpdm_logout_url(); ?>"><i class="fas fa-sign-out-alt color-danger mr-3"></i><?php _e( "Logout" , "attire" ); ?></a>
    </div>

    </div>
    <div id="wpdm-dashboard-content" class="col-md-9">

<?php

    if ($task == 'add-new' || $task == 'edit-package')
        include(wpdm_tpl_path('wpdm-add-new-file-front.php'));
    else if ($task == 'edit-profile')
        include(wpdm_tpl_path('wpdm-edit-user-profile.php'));
    else if ($task == 'settings')
       echo do_shortcode("[wpdm_author_settings]");
    else if ($task != '' && isset($tabs[$task]['callback']) && $tabs[$task]['callback'] != '')
        call_user_func($tabs[$task]['callback']);
    else if ($task != '' && isset($tabs[$task]['shortcode']) && $tabs[$task]['shortcode'] != '')
        echo do_shortcode($tabs[$task]['shortcode']);
    //else
        //include(wpdm_tpl_path('list-packages-table.php'));
?>

    </div>
    </div>
        <?php
} else {

    include(wpdm_tpl_path('wpdm-be-member.php'));
}
?>

    <script>jQuery(function($){ $("#tabs > li > a").click(function(){ location.href=this.href; });  });</script>

<?php if (is_user_logged_in()) echo "</div>";

