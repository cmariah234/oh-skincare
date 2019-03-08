<?php
/**
 * Contact Section
 * 
 * @package Spa_and_Salon
 */

$spa_and_salon_ed_contact = get_theme_mod( 'spa_and_salon_ed_contact_section' ); 
$spa_and_salon_contact_address_label = get_theme_mod( 'spa_and_salon_contact_address_label', 'Address' ); 
$spa_and_salon_contact_address = get_theme_mod( 'spa_and_salon_contact_address' ); 
$spa_and_salon_contact_hours_label = get_theme_mod( 'spa_and_salon_contact_hours_label', 'Working Hours' ); 
$spa_and_salon_contact_hours = get_theme_mod( 'spa_and_salon_contact_hours' ); 
$spa_and_salon_contact_form_title = get_theme_mod( 'spa_and_salon_contact_title' ); 
$spa_and_salon_contact_form_desc = get_theme_mod( 'spa_and_salon_contact_desc' ); 
$spa_and_salon_contact_form_code = get_theme_mod( 'spa_and_salon_contact_code' ); 
$spa_and_salon_contact_map_code = get_theme_mod( 'spa_and_salon_map_code' ); 
?>

			<div class="container">
				<div class="row">
					<div class="left">
						<div class="holder">
							<?php 
                                if ($spa_and_salon_contact_map_code) {
                                echo '<div class="map-holder">';
                                    echo $spa_and_salon_contact_map_code;
                                echo '</div>';
                                }
                            ?>                             
							<div class="address-holder">
								<?php if ($spa_and_salon_contact_address) { ?>
								<div class="address">
									<div class="icon-holder">
										<span class="fa fa-map-marker"></span>
									</div>
									<div class="text">
										<h3 class="title"><?php echo esc_html($spa_and_salon_contact_address_label); ?></h3>
										<p><?php echo esc_html($spa_and_salon_contact_address); ?></p>
									</div>
								</div>
                                <?php } ?>
								<?php if ($spa_and_salon_contact_hours) { ?>                                
								<div class="working-hours">
									<div class="icon-holder">
										<span class="fa fa-users"></span>
									</div>
									<div class="text">
										<h3 class="title"><?php echo esc_html($spa_and_salon_contact_hours_label); ?></h3>
										<p><?php echo wpautop($spa_and_salon_contact_hours); ?></p>
									</div>
								</div>
                                <?php } ?>                                
							</div>
						</div>
					</div>
					<div class="right">
						<div class="holder">
								<?php if (($spa_and_salon_contact_form_title) || ($spa_and_salon_contact_form_desc)) { ?>
                                    <header class="header">
                                        <?php if ($spa_and_salon_contact_form_title) { ?><h2><?php echo esc_html($spa_and_salon_contact_form_title); ?></h2><?php } ?>
                                        <?php if ($spa_and_salon_contact_form_desc) { ?><p><?php echo esc_html($spa_and_salon_contact_form_desc); ?></p><?php } ?>
                                    </header>                                    
                                <?php } ?>                                  
                            
								<?php if ($spa_and_salon_contact_form_code) { ?>                                
                                    <div class="form">                                
	                                    <?php echo do_shortcode( $spa_and_salon_contact_form_code );	?>
                                    </div>                                    
                                <?php } ?>                                                                                            
						</div>
					</div>
				</div>
			</div>