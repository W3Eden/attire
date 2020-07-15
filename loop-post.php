<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="archive-div post row">
	<?php
	while ( have_posts() ): the_post();
		?>
        <div class="archive-item col-md-4">
			<?php get_template_part( "content", get_post_format() ); ?>
            <div class="clear"></div>
        </div>
		<?php
	endwhile; ?>
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
