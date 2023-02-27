<?php
function add_attire_admin_page() {
	add_theme_page(
		'Attire Guides',
		'Attire Guides',
		'manage_options',
		'attire-next-steps',
		'render_attire_admin_page',
	);
//	remove_menu_page( 'attire-next-steps' );

}

add_action( 'admin_menu', 'add_attire_admin_page' );
function redirect_to_admin() {
	if ( is_admin() && isset( $_GET['activated'] ) && $_GET['activated'] == 'true' ) {
		wp_redirect( admin_url( 'admin.php?page=attire-next-steps' ) );
		exit;
	}
}

add_action( 'admin_init', 'redirect_to_admin' );
function load_bootstrap_admin() {
	$screen = get_current_screen();
	// check if we're on the specific admin page where you want to load Bootstrap

	if ( $screen->id === 'appearance_page_attire-next-steps' ) {
		wp_register_style( 'bootstrap', ATTIRE_TEMPLATE_URL . '/bootstrap/css/bootstrap.min.css' );
		wp_enqueue_style( 'bootstrap' );
		wp_register_script( 'bootstrap', ATTIRE_TEMPLATE_URL . '/bootstrap/css/bootstrap.bundle.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'bootstrap' );
	}
}

add_action( 'admin_enqueue_scripts', 'load_bootstrap_admin' );

// Render admin page
function render_attire_admin_page() {

	?>
    <div class="container">
		<?php
		if ( ! file_exists( WP_CONTENT_DIR . '/plugins/attire-blocks/' ) ) {
			?>
            <div id="aitte-intro">
                <div class="xcard" style="max-width: 100%!important;" id="ab_notice">
                    <div class="xcontent" style="font-size: 13px;">
                        <h2 style="font-size: 1.3em;">Awesome! Your theme is ready</h2>
                        Now, let's install Attire Blocks to superpower your gutenberg editor.
                    </div>
                    <div class="xbtn">
                        <a href="<?php echo esc_url( admin_url( '/plugin-install.php?s=Attire+Blocks&tab=search&type=tag' ) ); ?>"
                           class="btx">
                            Install now
                        </a>
                    </div>
                </div>
            </div>
			<?php
		}

		?>
        <h2 style="font-size: 1.15em;">Here are some resources to help you make the Attire theme your Swiss Army Knife
            for WordPress design.</h2>
        <div class="row">
            <div class="col-md-6 mb-3">
                <iframe width="100%" height="300" src="https://www.youtube.com/embed/b6frQutbc6M"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
            </div>
            <div class="col-md-6 mb-3">
                <iframe width="100%" height="300" src="https://www.youtube.com/embed/7kLYaKPL-Zw"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
            </div>
            <div class="col-md-6">
                <iframe width="100%" height="300" src="https://www.youtube.com/embed/5i8S14BL9Ho"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
            </div>

        </div>
        <h4 class="mt-3"><em>You'll find more guides <a class="text-info" href="https://wpattire.com/documentation/">here</a>.</em>
        </h4>
    </div>
	<?php
}