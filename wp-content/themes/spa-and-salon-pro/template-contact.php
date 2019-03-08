<?php
/**
 * Template Name: Contact Template
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Spa_and_Salon
 */
get_header();

$spa_and_salon_contact_address    = get_theme_mod( 'spa_and_salon_contact_address' ); 
$spa_and_salon_contact_phone      = get_theme_mod( 'spa_and_salon_contact_phone' ); 
$spa_and_salon_contact_email      = get_theme_mod( 'spa_and_salon_contact_email' ); 
$spa_and_salon_contact_form_title = get_theme_mod( 'spa_and_salon_contact_title' ); 
$spa_and_salon_contact_form_desc  = get_theme_mod( 'spa_and_salon_contact_desc' ); 
$spa_and_salon_contact_form_code  = get_theme_mod( 'spa_and_salon_contact_code' ); 
$spa_and_salon_contact_map_code   = get_theme_mod( 'spa_and_salon_map_code' ); 
?>

<div class="wrapper">
		<div class="contact-page">
			<div class="container">

			<?php while ( have_posts() ) : the_post(); ?>
				<header class="heading">
					<h2 class="title"><?php the_title(); ?></h2>
					<?php the_content(); ?>
				</header>
			<?php endwhile; // End of the loop.	?>                  
                
				<div class="contact-info">
					<div class="row">
						<?php if($spa_and_salon_contact_address) { ?>
                        <div class="col">
							<div class="holder">
								<div class="table-row">
									<div class="table-cell">
										<div class="icon-holder"><i class="fa fa-map-marker"></i></div>
										<div class="text-holder">
											<h3 class="title"><?php echo esc_html('Address', 'spa-and-salon-pro') ?></h3>
											<address><?php echo esc_html($spa_and_salon_contact_address); ?></address>
										</div>
									</div>
								</div>
							</div>
						</div>
                        <?php } ?>
						<?php if($spa_and_salon_contact_phone) { ?>                        
						<div class="col">
							<div class="holder">
								<div class="table-row">
									<div class="table-cell">
										<div class="icon-holder"><i class="fa fa-phone"></i></div>
										<div class="text-holder">
											<h3 class="title"><?php echo esc_html('Phone', 'spa-and-salon-pro') ?></h3>
											<a href="tel:<?php echo esc_html($spa_and_salon_contact_phone); ?>" class="tel-link"><?php echo esc_html($spa_and_salon_contact_phone); ?></a>
										</div>
									</div>
								</div>
							</div>
						</div>
                        <?php } ?>                        
						<?php if($spa_and_salon_contact_email) { ?>                                                
						<div class="col">
							<div class="holder">
								<div class="table-row">
									<div class="table-cell">
										<div class="icon-holder"><i class="fa fa-envelope"></i></div>
										<div class="text-holder">
											<h3 class="title"><?php echo esc_html('Email', 'spa-and-salon-pro') ?></h3>
											<a href="mailto:<?php echo esc_html($spa_and_salon_contact_email); ?>" class="email-link"><?php echo esc_html($spa_and_salon_contact_email); ?></a>
										</div>
									</div>
								</div>
							</div>
						</div>
                        <?php } ?>                                                
					</div>
				</div>
				<section class="form-section">
					<?php if (($spa_and_salon_contact_form_title) || ($spa_and_salon_contact_form_desc)) { ?>
                        <header class="heading">
                            <?php if ($spa_and_salon_contact_form_title) { ?><h3 class="title"><?php echo esc_html($spa_and_salon_contact_form_title); ?></h3><?php } ?>
                            <?php if ($spa_and_salon_contact_form_desc) { ?><p><?php echo esc_html($spa_and_salon_contact_form_desc); ?></p><?php } ?>
                        </header>                                    
                    <?php } ?>                                                                                                        
					<?php if ($spa_and_salon_contact_form_code) { ?>                                                    
						<div class="form-holder">
									<?php echo do_shortcode( $spa_and_salon_contact_form_code );	?>
						</div>	
                    <?php } ?>                                                                                                                                
				</section>
                    <?php 
                        if ($spa_and_salon_contact_map_code) {
                        echo '<div class="map-holder">';
							echo $spa_and_salon_contact_map_code;
                        echo '</div>';
                        }
                    ?> 
			</div>
		</div>
	</div>	
<?php get_footer();