<?php
/**
 * Template part for displaying service on template-services.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Spa_and_Salon
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col'); ?>>
	<a href="<?php the_permalink(); ?>" class="img-holder">
		<?php
		if ( has_post_thumbnail() ) {
            the_post_thumbnail('spa-and-salon-service', array( 'itemprop' => 'image' ) );
		}
        ?> 
    </a>
	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
</article><!-- #post-## -->