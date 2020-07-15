<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="archive-div post">
    <div class="row">
	<?php
	while ( have_posts() ): the_post();
		?>
        <div class="col-md-4 archive-item">
			<?php get_template_part( "content", "wpdmpro" ); ?>
            <div class="clear"></div>
        </div>
		<?php
	endwhile; ?>
    </div>
</div>
<?php
global $wp_query;
if ( $wp_query->max_num_pages > 1 ) :
	?>
    <div class="clear"></div>
    <div id="nav-below" class="navigation post box arc">
		<?php get_template_part( 'pagination' ); ?>
    </div>
<?php endif;
