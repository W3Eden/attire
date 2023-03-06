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
    <div class="welcome">
        <div class='container'>
        <div class='content'>
            <h1 class='text-white' style='font-weight: 700;'>Welcome to Attire</h1>
            <p  class='text-white' style="font-size: 1.3em; font-weight: 200; max-width: 800px">Here are some resources to help you make the Attire theme your SwissArmy Knife
            for WordPress design. You'll find more guides <a class="text-warning" href="https://wpattire.com/documentation/">here</a>.</p>
        </div>
    </div>
    </div>
    <div class="container">		
        <?php
		if ( ! file_exists( WP_CONTENT_DIR . '/plugins/attire-blocks/' ) ) {
			?>
            <div id="aitte-intro" class="row d-block">
                <div class="xcard" style="max-width: 100%!important; margin-top: -50px; border-radius: 5px; box-shadow: 0 13px 27px -5px rgb(50 50 93 / 25%), 0 8px 16px -8px rgb(0 0 0 / 30%), 0 -6px 16px -6px rgb(0 0 0 / 3%)" id="ab_notice">
                    <div class="xcontent" style="font-size: 16px !important;">
                        <h2 class='mt-0 rounded' style="font-size: 1.3em; font-weight: 700">Awesome! Your theme is ready</h2>
                        <p class='mb-0'>Now, let's install Attire Blocks to superpower your Gutenberg editor.</p>
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
        <div class="row">
            <div class="col-md-6 pl-0">
                <iframe class="xcard mb-0" width="100%" height="315" src="https://www.youtube.com/embed/7kLYaKPL-Zw"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
            </div>
            <div class="col-md-6 pr-0">
                <iframe class="xcard mb-0" width="100%" height="315" src="https://www.youtube.com/embed/FeCQW5cTTfY"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
            </div>
            <div class="col-md-6 pl-0">
                <iframe class="xcard mb-0" width="100%" height="315" src="https://www.youtube.com/embed/zJw8lAQh-2Y"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
            </div>

            <div class="col-md-6 pr-0">
                <iframe class="xcard mb-0" width="100%" height="315" src="https://www.youtube.com/embed/5i8S14BL9Ho"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
            </div>

        </div>

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&display=swap');

            #wpwrap {
                background-color: #F6F9FC;
                font-family: 'Sen', sans-serif !important;
            }
            #wpcontent {
                padding-left: 0;
            }
            .welcome .content p {
                font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
            }
            .welcome {
                background: linear-gradient(135deg, #492cdd 0%, #AD38E2 100%);
                padding: 3rem 0 6.5rem;
            }


            .xcard {
                padding: 20px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.20);
                margin: 20px 0;
                border: 0;
                display: flex;
                grid-template-columns: 1fr 150px;
                background: #ffffff;
                max-width: unset !important;
                width: 100% !important;
                border-radius: 6px
            }

            .xcontent {
                flex: 4;
                padding-left: 10px;
                position: relative;
            }

            .xbtn {
                width: 200px;
                min-width: 200px;
                align-content: center;
                display: grid;
            }

            .xcard h2 {
                margin: 5px 0 5px;
            }

            .xbtn .btx {
                padding: 15px 20px;
                color: #ffffff;
                font-weight: 600;
                text-decoration: none;
                display: block;
                text-align: center;
                position: relative;
                border-radius: 5px;
                background: linear-gradient(135deg, #ecc344 0%, #e42d7f 100%);
                border: 0;
                transition: all ease-in-out 300ms;
                box-shadow: 0 0 10px rgba(228, 45, 127, 0.3);
                margin: 0 5px;
                text-transform: uppercase;
                letter-spacing: 1px;
            }

            .xbtn .btx:hover {
                transition: all ease-in-out 300ms;
                background: linear-gradient(135deg, #ecc344 19%, #e42d7f 90%);
            }
        </style>

    </div>
	<?php
}
