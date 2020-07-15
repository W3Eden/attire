<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<ul class="nav navbar-nav ul-search">
    <li class="mobile-search">
        <form class="navbar-left nav-search nav-search-form"
              action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search" method="get">
            <div class="form-inline">
                <input name="post_type[]" value="product"
                       type="hidden">
                <input name="post_type[]" value="page"
                       type="hidden">
                <input name="post_type[]" value="post"
                       type="hidden">
                <div class="input-group">
                    <input type="search" required="required"
                           class="search-field form-control"
                           value="" name="s" title="<?php esc_attr_e( 'Search for:', 'attire' ); ?>"/>

                    <span class="input-group-addon" id="mobile-search-icon">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </span>
                </div>
            </div>
        </form>
    </li>
    <li class="dropdown nav-item desktop-search">
        <a class="mk-search-trigger mk-fullscreen-trigger" href="#" data-toggle="modal" data-target="#attire-search-modal">
            <div id="search-button"><i class="fa fa-search"></i></div>
        </a>
    </li>
</ul>

