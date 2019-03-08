<?php
/**
 * 
 * @package Spa_and_Salon
 */

$before_post_widget = get_theme_mod( 'spa_and_salon_before_post_widget', 'no-sidebar' );

if ( ! is_active_sidebar( $before_post_widget ) ) {
	return;
}
?>
<div class="widget-area" id="widget-before-post">
    <?php dynamic_sidebar( $before_post_widget ); ?>
</div>