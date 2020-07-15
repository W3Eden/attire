<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
    <div class="row">

		<?php
		AttireFramework::DynamicSidebars( 'left' );
		?>

        <section id="primary" class="content-area <?php AttireFramework::ContentAreaWidth(); ?> attire-shop">
            <main id="main" class="site-main" role="main">

				<?php woocommerce_content(); ?>

            </main><!-- #main -->
        </section><!-- #primary -->

		<?php
		AttireFramework::DynamicSidebars( 'right' );
		?>
    </div>
<?php
get_footer();
