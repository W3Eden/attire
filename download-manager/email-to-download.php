<?php
/**
 * Author: shahnuralam
 * Date: 2018-12-28
 * Time: 11:58
 */
if (!defined('ABSPATH')) die();

    $idl = 0;
    $form_id = "__wpdm_email_2download_{$params['id']}";
    $form_button_label = isset($params['btn_label']) ? $params['btn_label'] : __( "Subscribe", "download-manager" );
$section_id = "section_".uniqid();
$color = isset($params['btn']) ? $params['btn'] : 'success';
list($_color) = explode(" ", $color);
?>
<style>
    #<?php echo $form_id; ?>{
        max-width: 100%;
        width: 600px;
        margin: 0 auto !important;
    }
    #wpdm_submit_<?php echo $params['id']; ?>,
    #email_<?php echo $params['id']; ?>{
        border-radius: 500px;
    }
    #email_<?php echo $params['id']; ?>{
        border: 1px solid #aeb7bb;
        text-align: center;
        box-shadow: 0 0 4px rgba(174, 183, 187, 0.2);
        transition: all ease-in-out 400ms;
    }
    #email_<?php echo $params['id']; ?>:focus,
    #email_<?php echo $params['id']; ?>:hover{
        border: 1px solid var(--color-<?php echo $_color ?>);
        text-align: center;
        box-shadow: 0 0 15px rgba(var(--color-<?php echo $_color ?>-rgb), 0.4);
        transition: all ease-in-out 400ms;
    }
</style>
<div id="<?php echo $section_id;?>" class="<?php echo $section_id;?>">
<form id="<?php echo $form_id; ?>" class="<?php echo $form_id; ?>" method=post action="<?php echo esc_url(home_url('/')); ?>" style="font-weight:normal;font-size:12px;padding:0px;margin:0px">

        <div class="wpdm-email-to-download">
            <h3><?php echo isset($params['title']) ? $params['title'] : ''; ?></h3>
            <?php echo isset($params['intro']) ? $params['intro'] : ''; ?>

            <input type=hidden name="__wpdm_ID" value="<?php echo $params['id']; ?>" />
            <input type=hidden name="dataType" value="json" />
            <input type=hidden name="execute" value="wpdm_getlink" />
            <input type=hidden name="verify" value="email" />
            <input type=hidden name="action" value="wpdm_ajax_call" />

            <div class="media">
                <div class="media-body"><input type="email" required="required"  oninvalid="this.setCustomValidity('<?php echo __( "Please enter a valid email address" , "download-manager" ) ?>')" class="form-control form-control-lg group-item email-lock-mail" placeholder="<?php _e("Email Address", "download-manager"); ; ?>" size="20" id="email_<?php echo $params['id']; ?>" name="email" /></div>
                <div class="ml-3"><button id="wpdm_submit_<?php echo $params['id']; ?>" class="wpdm_submit btn btn-<?php echo $color; ?> btn-lg group-item"  type=submit><?php echo $form_button_label; ?></button></div>
            </div>

        </div>
</form>
</div>

<script type="text/javascript">
    jQuery(function($){
        var sname = localStorage.getItem("email_lock_name");
        var semail = localStorage.getItem("email_lock_mail");

        if(sname != "undefined")
            $(".email-lock-mail").val(semail);
        if(sname != "undefined")
            $(".email-lock-name").val(sname);

        $(".<?php echo $form_id; ?>").submit(function(){
            var paramObj = {};
            WPDM.blockUI('.<?php echo $section_id; ?>');
            $.each($(this).serializeArray(), function(_, kv) {
                paramObj[kv.name] = kv.value;
            });
            var nocache = new Date().getMilliseconds();

            $(this).ajaxSubmit({
                url: '<?php echo esc_url(home_url('/?__='));?>' + nocache,
                success:function(res){

                    WPDM.unblockUI('.<?php echo $section_id; ?>');
                    WPDM.notify(res.msg, res.type);
                }});

            return false;
        });
    });

</script>

