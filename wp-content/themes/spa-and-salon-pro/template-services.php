<?php
/**
 * Template Name: Services Template
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Spa_and_Salon
 */
get_header();
?>
<div class="wrapper">
		<div class="services-page">
			<div class="container">

			<?php while ( have_posts() ) : the_post(); ?>
				<header class="heading">
					<h2 class="title"><?php the_title(); ?></h2>
					<?php the_content(); ?>
				</header>
			<?php endwhile; // End of the loop.	?>                
                
				<div class="row">
				<?php      
				// custom loop       
                $query_args = array(
                'post_type' => 'spa_services',
                'posts_per_page' => -1,
                );                            
                $the_query = new WP_Query( $query_args );
                if ( $the_query->have_posts() ) : 
                while ( $the_query->have_posts() ) : $the_query->the_post(); 
                    
				/*
				 * If you want to override this in a child theme, then include a file
				 * called content-service.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'service' );
                    

                endwhile; 
                ?>
                <!-- end of the loop -->                            
                <?php wp_reset_postdata(); ?>                            
                <?php else:  ?>
                <p><center><?php esc_html_e( 'Sorry, no services matched your criteria.', 'spa-and-salon-pro' ); ?></center></p>
                <?php endif; ?>                          
				</div>
			</div>
		</div>
</div>
<?php get_footer();