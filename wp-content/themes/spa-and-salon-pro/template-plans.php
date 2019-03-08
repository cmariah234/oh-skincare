<?php
/**
 * Template Name: Plans Template
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Spa_and_Salon
 */
get_header();
?>
<div class="wrapper">
		<div class="plan-page">
			<div class="container">
				<?php while ( have_posts() ) { the_post(); ?>
					<header class="heading">
						<h2 class="title"><?php the_title(); ?></h2>
						<?php the_content(); ?>
					</header>
				<?php } // End of the loop.	?>                   
                
				<div class="plan-holder">
					<div class="button-holder">
						<?php
						 $args = array(
				            'taxonomy'      => 'spa_plan_category',
				            'orderby'       => 'name', 
				            'order'         => 'ASC',
				        );                
				        $terms = get_terms( $args );
				        if( $terms ){ ?>
								<div class="button-group filters-button-group">
									<button class="button is-checked" data-filter="*"><?php echo esc_html__( 'All Classes', 'spa-and-salon-pro' );?></button>
									<?php foreach( $terms as $t ){
										echo '<button class="button" data-filter=".' . esc_attr( $t->slug ) .  '">' . esc_html( $t->name ) . '</button>';   
									}
									 ?>
								</div>
								<?php
				        } ?>
			   		</div>
			        <?php      
						// custom loop       
		                $query_args = array(
							'post_type'      => 'spa_plans',
							'posts_per_page' => -1,
							'order'          =>'desc',
							'status'         =>'publish',
		                );                            
		                $the_query = new WP_Query( $query_args ); ?>   
		                <?php if ( $the_query->have_posts() ) { ?>   
			        	 <div class="grid" id="plan-filter">
			         		<?php while ( $the_query->have_posts() ) { $the_query->the_post();      
				               $tax_args = array(
				                    'orderby' => 'name', 
				                    'order'   => 'ASC', 
				                    'fields'  => 'all'
				                    );
				                $taxonomy = 'spa_plan_category';
				                $terms    = wp_get_post_terms( get_the_ID(), $taxonomy, $tax_args ); 
				                $term_slug = '';
				                $term_name = '';
				                if ( $terms ){
				                    foreach ( $terms as $term ){
				                       $term_slug =  $term->slug;  
				                       $term_name =  $term->name; 
				                    }
				                }  
				                ?>
								<div class="col element-item <?php if ( ! empty( $terms ) ) echo esc_attr( $term_slug ); ?>" data-category="<?php if ( ! empty( $terms ) ) echo esc_attr( $term_slug ); ?>">
									<?php if ( has_post_thumbnail() ) { ?>                        
		                                <div class="img-holder">                            
		                                    <a href="<?php the_permalink(); ?>" class="img-holder">
		                                        <?php the_post_thumbnail('thumbnail', array( 'itemprop' => 'image' ) ); ?>
		                                    </a>
		                                 </div>
		                             <?php } ?>                             
									<div class="text-holder">
										<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										<span class="price"><?php echo esc_html(get_post_meta( get_the_ID(), 'plan_options_price', true ));?></span>                                
										<?php 
										if( has_excerpt() ){
											the_excerpt(); 
										}
										else {
											echo wp_trim_words( get_the_content(), 10, '...' ); 
										}
										?>                                
									</div>
								</div>
							<?php }
							wp_reset_postdata();
							 ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
</div>
<?php get_footer();