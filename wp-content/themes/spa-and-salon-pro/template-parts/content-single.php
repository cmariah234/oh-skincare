<?php
/**
 * Template part for displaying posts in single.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Spa_and_Salon
 */

$body_classes = get_body_class();
$spa_and_salon_featured_image_ed = get_theme_mod('spa_and_salon_ed_featured_image', '1');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php spa_and_salon_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->
    
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

	<div class="entry-content" itemprop="text">
		<?php
		if( is_single()){
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'spa-and-salon-pro' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
			}else{
			the_excerpt();
			}
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'spa-and-salon-pro' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->


	
    <footer class="entry-footer">
    	<?php if( !is_single() ){ ?>
		<a href="<?php the_permalink(); ?>" class="btn-green"><?php esc_html_e( 'Read More', 'spa-and-salon-pro' ); ?></a>
		<?php }?>
		<?php spa_and_salon_entry_footer(); ?>
	</footer><!-- .entry-footer -->


</article><!-- #post-## -->
