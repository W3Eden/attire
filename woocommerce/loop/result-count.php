<?php
/**
 * Result Count
 *
 * Shows text: Showing x - x of x results.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     9.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="row mb-2">
    <div class="col-md-8">
        <p class="woocommerce-result-count mt-2 mb-2">
			<?php
			// phpcs:disable WordPress.Security
			if ( 1 === intval( $total ) ) {
				_e( 'Showing the single result', 'attire' );
			} elseif ( $total <= $per_page || - 1 === $per_page ) {
				$orderedby_placeholder = empty( $orderedby ) ? '%2$s' : '<span class="screen-reader-text">%2$s</span>';
				/* translators: 1: total results 2: sorted by */
				printf( _n( 'Showing all %1$d result', 'Showing all %1$d results', $total, 'attire' ) . $orderedby_placeholder, $total, esc_html( $orderedby ) );
			} else {
				$first                 = ( $per_page * $current ) - $per_page + 1;
				$last                  = min( $total, $per_page * $current );
				$orderedby_placeholder = empty( $orderedby ) ? '%4$s' : '<span class="screen-reader-text">%4$s</span>';
				/* translators: 1: first result 2: last result 3: total results 4: sorted by */
				printf( _nx( 'Showing %1$d&ndash;%2$d of %3$d result', 'Showing %1$d&ndash;%2$d of %3$d results', $total, 'with first and last result', 'attire' ) . $orderedby_placeholder, $first, $last, $total, esc_html( $orderedby ) );
			}
			// phpcs:enable WordPress.Security
			?>
        </p>
        <div style="clear: both"></div>
    </div>
