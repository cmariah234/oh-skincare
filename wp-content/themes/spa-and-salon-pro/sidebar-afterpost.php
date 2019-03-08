<?php
/**
 * 
 * @package Spa_and_Salon
 */

$after_post_widget = get_theme_mod( 'spa_and_salon_after_post_widget', 'no-sidebar' );

if ( ! is_active_sidebar( $after_post_widget ) ) {
	return;
}
?>
<div class="widget-area" id="widget-after-post">
    <?php dynamic_sidebar( $after_post_widget ); ?>
</div>