<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<article <?php post_class( 'post' ); ?>>
	<?php do_action( ATTIRE_THEME_PREFIX . 'before_content' ); ?>
    <div class="card wpdm-card">
        <a href="<?php the_permalink(); ?>"><?php wpdm_post_thumb(array(600, 400), true, array('class' => 'card-img-top', 'crop' => true)); ?></a>
        <!-- /.post-thumb -->
        <div class="card-body">
            <?php do_action( ATTIRE_THEME_PREFIX . 'before_post_title' ); ?>
            <h3 class="card-title wpdm-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php do_action( ATTIRE_THEME_PREFIX . 'after_post_title' ); ?>
            <div class="post-content card-text">
                <ul class="list-group mb-3">
                    <li class="list-group-item wpdm-product-price">
                        <span class="label pull-right"><?php if(function_exists("wpdmpp_price_range")) echo wpdmpp_price_range(get_the_ID()); ?></span>
                        Price
                    </li>
                    <li class="list-group-item">
                        <span class="label pull-right"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a></span>
                        Author
                    </li>
                    <li class="list-group-item">
                        <span class="label pull-right"><?php echo get_the_date(); ?></span>
                        Publish Date
                    </li>
                    <li class="list-group-item">
                        <span class="label pull-right"><?php echo (int)get_post_meta(get_the_ID(), '__wpdm_download_count', true); ?></span>
                        Download Count
                    </li>
                </ul>
                <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-block">
                    <?php
                        $label =  get_post_meta(get_the_ID(), '__wpdm_link_label', true);
                        $label = $label ? $label : __('More Details', 'attire');
                        //if(function_exists("wpdmpp_product_price") && wpdmpp_product_price (get_the_ID()) > 0)
                        //    $label = __('Buy Now', 'attire');
                        echo $label;
                    ?>

                </a>

            </div>
            <!-- /.post-content -->
        </div>

        <!-- /.post-meta -->
    </div>

	<?php do_action( ATTIRE_THEME_PREFIX . 'after_content' ); ?>
</article>