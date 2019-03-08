<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Spa_and_Salon
 */

get_header(); 
$spa_and_salon_ed_comment = get_theme_mod('spa_and_salon_ed_comments', '1');
$author_bio     = get_theme_mod( 'spa_and_salon_ed_bio', '1' );
$related_post   = get_theme_mod( 'spa_and_salon_ed_related_post', '1' );
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		
		get_sidebar( 'beforepost' ); //Before Post Widget									
		
		while ( have_posts() ) : the_post();

			//Add and Increase Post View Count
			spa_and_salon_set_views( get_the_ID() );							
		

			get_template_part( 'template-parts/content', 'single' );
			
			/**  Author Bio **/
			if( $author_bio ) do_action( 'spa_and_salon_author_bio' ); 						
			
			the_post_navigation();
						
            if( $related_post ) get_template_part( 'template-parts/content', 'related' );			
			
			get_sidebar( 'afterpost' );  // After Post Widget													

			// If comments are open or we have at least one comment, load up the comment template.
			if ($spa_and_salon_ed_comment == '1') {			
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			}

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
