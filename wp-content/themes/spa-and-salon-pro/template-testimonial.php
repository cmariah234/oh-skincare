<?php
/**
 * Template Name: Testimonial Template
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Spa_and_Salon
 */
get_header();
$testimonial_order = get_theme_mod( 'spa_and_salon_testimonial_order', 'date' );

?>

<div class="wrapper">
		<div class="testimonial-page">            
			<?php while ( have_posts() ) : the_post(); ?>
				<header class="heading">
                    <div class="container">                
                        <h2 class="title"><?php the_title(); ?></h2>
                        <?php the_content(); ?>
                    </div>                    
				</header>
			<?php endwhile; // End of the loop.	?>
                        
			<div class="testimonial-holder">
				
				<?php      
				// custom loop       
                $query_args = array(
	                'post_type' => 'spa_testimonials',
	                'posts_per_page' => -1,
                ); 
                if( $testimonial_order == 'menu_order' ){
			        $query_args['orderby'] = 'menu_order title';            
			        $query_args['order']   = 'ASC';
		    	}

                $the_query = new WP_Query( $query_args );
                if ( $the_query->have_posts() ) : 
                while ( $the_query->have_posts() ) : $the_query->the_post(); 
                    
				/*
				 * If you want to override this in a child theme, then include a file
				 * called content-testimonial.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'testimonial' );
                    

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
<?php get_footer();