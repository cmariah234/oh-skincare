<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Spa_and_Salon
 */

$sidebar_layout = spa_and_salon_sidebar_layout();
$body_classes = get_body_class();
$spa_and_salon_featured_image_ed = get_theme_mod('spa_and_salon_ed_featured_image', '1');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
	
	<?php if ($spa_and_salon_featured_image_ed) { ?>
		<div class="post-thumbnail">    
			<?php
            if (! in_array('full-width', $body_classes) ) { 
            $imgsize = "spa-and-salon-with-sidebar";
            }
            else {
            $imgsize = "spa-and-salon-without-sidebar";	
            }
            the_post_thumbnail( $imgsize, array( 'itemprop' => 'image' ) );
            ?>    
		</div>    
	<?php }?>
	
       	<?php

			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'spa-and-salon-pro' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'spa-and-salon-pro' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
