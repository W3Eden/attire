<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
$cols  = 12 / esc_attr(wc_get_loop_prop('columns'));
$cols = in_array($cols, array(1,2,3,4)) ? $cols : 4;
// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div <?php wc_product_class( 'col-md-'.$cols, $product ); ?>>
    <div class="card woo-product-card mb-4 border-0">
        <a href="<?php the_permalink(); ?>">
        <?php do_action('woocommerce_before_shop_loop_item_title'); ?>
        <div class="card-body">
            <?php do_action( 'woocommerce_shop_loop_item_title' ); ?>
            <?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
        </div>
        </a>
        <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
    </div>

</div>
