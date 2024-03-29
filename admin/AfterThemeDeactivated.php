<?php
add_action( 'admin_enqueue_scripts', 'attire_uninstall_feedback' );

function attire_uninstall_feedback( $hook ) {
	if ( 'themes.php' != $hook ) {
		return;
	}
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'attire-feedback', get_template_directory_uri() . '/admin/js/feedback.js', array( 'jquery' ), '1.0', true );
}
