<?php
/**
 * About Section
 * 
 * @package Spa_and_Salon
 */

$spa_and_salon_about_image = get_theme_mod( 'spa_and_salon_about_image' );
$spa_and_salon_about_title = get_theme_mod( 'spa_and_salon_about_title' );
$spa_and_salon_about_content = get_theme_mod( 'spa_and_salon_about_content' );
$spa_and_salon_about_read_more = get_theme_mod( 'spa_and_salon_about_read_more' );
$spa_and_salon_about_read_more_url = get_theme_mod( 'spa_and_salon_about_read_more_url' );
?>
       
          <?php if ($spa_and_salon_about_title) { ?>       
			<div class="container">
				<div class="row">
					<div class="col left-col">
						<img src="<?php echo esc_url($spa_and_salon_about_image); ?>" alt="<?php echo esc_html($spa_and_salon_about_title); ?>">
					</div>
					<div class="col">
						<h2 class="title"><?php echo esc_html($spa_and_salon_about_title); ?></h2>
						<p><?php echo wpautop( esc_html($spa_and_salon_about_content)); ?></p>
                        <?php if ($spa_and_salon_about_read_more) { ?>
						<a href="<?php echo esc_url($spa_and_salon_about_read_more_url); ?>" class="btn-green"><?php echo esc_html($spa_and_salon_about_read_more); ?></a>
                        <?php } ?>
					</div>
				</div>
			</div>
		<?php }