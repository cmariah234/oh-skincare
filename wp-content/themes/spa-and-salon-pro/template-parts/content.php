<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Spa_and_Salon
 */

$body_classes = get_body_class();

$char      = get_theme_mod( 'spa_and_salon_post_no_of_char', '200' );
$read_more = get_theme_mod( 'spa_and_salon_post_read_more', __( 'Read More', 'spa-and-salon-pro' ) );

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
	 <?php echo ( !is_single() ) ? '<a href="' . esc_url( get_the_permalink() ) . '" class="post-thumbnail">' : '<div class="post-thumbnail">'; ?>
 			<?php ( is_active_sidebar( 'right-sidebar' ) ) ? the_post_thumbnail( 'spa-and-salon-with-sidebar', array( 'itemprop' => 'image' ) ) : the_post_thumbnail( 'spa-and-salon-without-sidebar', array( 'itemprop' => 'image' ) ) ; ?>
    <?php echo ( !is_single() ) ? '</a>' : '</div>' ;?>

<div class="entry-content" itemprop="text">
		<?php
			$format = get_post_format();
				if( false === $format ){
					if( has_excerpt() ){
						the_excerpt(); 
						?>
					<?php 
					}else{
						echo wpautop( wp_kses_post( force_balance_tags( spa_and_salon_truncate( get_the_content(), $char ) ) ) ); ?>
					<?php 
					}
             }   
			                       
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'spa-and-salon-pro' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->


	
    <footer class="entry-footer">
    	<?php if( !is_single() ){ ?>
		<a href="<?php the_permalink(); ?>" class="btn-green"><?php echo esc_html( $read_more ); ?></a>
		<?php }?>
		<?php spa_and_salon_entry_footer(); ?>
	</footer><!-- .entry-footer -->


</article><!-- #post-## -->
