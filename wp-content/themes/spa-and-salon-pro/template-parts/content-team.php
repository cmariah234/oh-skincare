<?php
/**
 * Template part for displaying team on template-team.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Spa_and_Salon
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('team'); ?>>
<div class="container">                         
		<?php
		if ( has_post_thumbnail() ) {
			echo '<div class="img-holder">';
            the_post_thumbnail('spa-and-salon-testmonial', array( 'itemprop' => 'image' ) );
			echo '</div>';								
		}
        ?>                                                   
        <div class="text-holder">
            <span class="designation"><?php echo esc_html(get_post_meta( get_the_ID(), 'member_detail_member_position', true ));?></span>
            <h3 class="name"><?php the_title(); ?></h3>
            <?php the_content(); ?>
        </div>
</div>
</article><!-- #post-## -->