<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.6.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="col-md-4">
	<form method="get" class="woocommerce-ordering">
		<select name="orderby" class="orderby custom-select">
			<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
				<option
					value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
			<?php endforeach; ?>
		</select>
		<?php wc_query_string_form_fields( null, array( 'orderby', 'submit' ) ); ?>
	</form>
	<div style="clear: both"></div>
</div>
</div>

