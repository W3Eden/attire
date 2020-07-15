
<div class="media attire-mbl-header stickable">
    <div class="mr-3">
        <a class="gn-icon gn-icon-menu attire-mbl-menu-trigger">
            <i class="fas fa-bars"></i>
        </a>
    </div>
    <div class="media-body">
        <a class="mbl-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php echo AttireThemeEngine::SiteLogo(); ?>
        </a>
    </div>
</div>
<section id="attire-mbl-menu">
    <div id="dismiss">
        <i class="fas fa-arrow-left"></i>
    </div>
    <div class="middle-logo logo-div p-5 text-center">
        <a class="site-logo navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo AttireThemeEngine::FooterLogo(); ?></a>
    </div>
    <div class="p-3" style="background: rgba(0,0,0,0.2); ?>">
        <?php get_template_part("templates/parts/mobile", "search"); ?>
    </div>
    <nav class="attire-mbl-menu-wrapper">
        <div class="gn-scroller">
            <?php
            if ( ! class_exists( 'wp_bootstrap_navwalker' ) ) {
                require get_template_directory() . '/libs/wp_bootstrap_navwalker.php';
            }
            wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'depth'          => 0,
                    'container'      => false,
                    'menu_class'     => 'attire-mbl-menu navbar-nav',
                    'fallback_cb'    => 'wp_bootstrap_navwalker::fallback',
                    'walker'         => new wp_bootstrap_navwalker()
                )
            );
            ?>
        </div><!-- /gn-scroller -->
    </nav>
</section>
<div class="overlay"></div>


<script type="text/javascript">
    jQuery(function ($) {

        $('#dismiss, .overlay').on('click', function () {
            $('#attire-mbl-menu').removeClass('active');
            $('.overlay').removeClass('active');
        });

        $('.attire-mbl-menu-trigger').on('click', function () {
            $('#attire-mbl-menu').addClass('active');
            $('.overlay').addClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
        $('body').on('click', '#attire-mbl-menu .dropdown-toggler', function () {
            $(this).parent('.dropdown').toggleClass('active');
        });
    });
</script>
