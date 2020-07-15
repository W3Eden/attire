<?php

if (!defined('ABSPATH')) {
    exit;
}
?>
<div class="col-md-4">
    <form method="get" class="woocommerce-ordering">
        <select name="orderby" class="orderby custom-select">
            <?php foreach ($catalog_orderby_options as $id => $name) : ?>
                <option value="<?php echo esc_attr($id); ?>" <?php selected($orderby, $id); ?>><?php echo esc_html($name); ?></option>
            <?php endforeach; ?>
        </select>
        <?php wc_query_string_form_fields(null, array('orderby', 'submit')); ?>
    </form>
    <div style="clear: both"></div>
</div>
</div>

