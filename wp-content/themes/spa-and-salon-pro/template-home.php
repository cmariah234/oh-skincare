<?php
/**
 * Template Name: Home Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Spa_and_Salon
 */
get_header();
$spa_and_salon_ed_slider_section    = get_theme_mod('spa_and_salon_ed_slider', '0');
$spa_and_salon_ed_featured_section  = get_theme_mod('spa_and_salon_ed_banner_section', '0');
$spa_and_salon_ed_instagram_section = get_theme_mod('spa_and_salon_ed_instagram_section', '0');

if( $spa_and_salon_ed_slider_section ) do_action( 'spa_and_salon_slider' ); 

if( $spa_and_salon_ed_featured_section ) do_action( 'spa_and_salon_featured' ); 

?>

<div class="wrapper">
    <div class="blank"></div>
	<?php
    
	$sections = get_theme_mod( 'spa_and_salon_sorter', array( 'welcome-note', 'services', 'cta', 'plan', 'testimonial', 'contact') );
           
    foreach( $sections as $section ){ ?>
        <section class="<?php echo esc_attr( $section ); ?>" id="<?php echo esc_attr( $section ); ?>">
            <?php get_template_part( 'sections/section', esc_attr( $section ) ); ?>            
		</section>			
        
	<?php } ?>

</div>




<?php if( $spa_and_salon_ed_instagram_section ) get_template_part( 'sections/section', 'instagram' ); ?>

<?php get_footer();