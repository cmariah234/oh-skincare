<?php
/**
 * Call To Action Section
 * 
 * @package Spa_and_Salon
 */

$spa_and_salon_ed_cta       = get_theme_mod( 'spa_and_salon_ed_cta_section' ); 
$spa_and_salon_cta_image    = get_theme_mod( 'spa_and_salon_home_cta_image' ); 
$spa_and_salon_cta_text     = get_theme_mod( 'spa_and_salon_home_cta_text' ); 
$spa_and_salon_cta_desc     = get_theme_mod( 'spa_and_salon_home_cta_desc' ); 
$spa_and_salon_cta_btn_text = get_theme_mod( 'spa_and_salon_home_cta_button_text' ); 
$spa_and_salon_cta_btn_url  = get_theme_mod( 'spa_and_salon_home_cta_button_url' ); 
?>

	<?php if($spa_and_salon_cta_text) { ?>
		<div class="promotional-block2" style="background-image:url(<?php echo esc_url($spa_and_salon_cta_image); ?>);">
			<div class="container">
				<div class="text">
					<?php if($spa_and_salon_cta_text) { ?>
                    <h2><?php echo esc_html($spa_and_salon_cta_text); ?></h2>
                    <?php } ?>
					<?php if($spa_and_salon_cta_desc) { ?>                    
					<p><?php echo wpautop(esc_html($spa_and_salon_cta_desc)); ?></p>
                    <?php } ?>                    
					<?php if($spa_and_salon_cta_btn_text) { ?>                                        
					<a href="<?php echo esc_url($spa_and_salon_cta_btn_url); ?>" class="btn-more"><?php echo esc_html($spa_and_salon_cta_btn_text); ?></a>
                    <?php } ?>                                                            
				</div>
			</div>
		</div>
	<?php }