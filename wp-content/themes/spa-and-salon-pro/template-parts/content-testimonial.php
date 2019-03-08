<?php
/**
 * Template part for displaying testimonial on template-testimonial.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Spa_and_Salon
 */
$clientdetail = get_post_meta( get_the_ID(), 'client_detail_enter_client_designation', true );
?>
                   
<article id="post-<?php the_ID(); ?>" <?php post_class('testimonials'); ?>>
    <div class="container">
            <?php
            if ( has_post_thumbnail() ) {
                echo '<div class="img-holder">';
                the_post_thumbnail('spa-and-salon-testmonial-thumb', array( 'itemprop' => 'image' ) );
                echo '</div>';								
            }
            ?>                 
        <div class="text-holder">
            <div class="info">
                <span><?php the_title(); ?></span>
                <?php if ($clientdetail) { ?><span class="designation"><?php echo esc_html($clientdetail);?></span><?php } ?>
            </div>
             <?php the_content(); ?>
        </div>
    </div>
</article><!-- #post-## -->
                    
                    