<?php
/**
 * Plan Section
 * 
 * @package Spa_and_Salon
 */
 
$spa_and_salon_plan_title = get_theme_mod( 'spa_and_salon_plans_title' );
$spa_and_salon_plan_content = get_theme_mod( 'spa_and_salon_plans_desc' );
$spa_and_salon_plan_btn_text = get_theme_mod( 'spa_and_salon_plans_btn_text' ); 
$spa_and_salon_plan_btn_url = get_theme_mod( 'spa_and_salon_plans_btn_url' );  

$spa_and_salon_plan_post_one = get_theme_mod( 'spa_and_salon_plans_section_plan_one' );
$spa_and_salon_plan_post_two = get_theme_mod( 'spa_and_salon_plans_section_plan_two' );
$spa_and_salon_plan_post_three = get_theme_mod( 'spa_and_salon_plans_section_plan_three' );
$spa_and_salon_plan_post_four = get_theme_mod( 'spa_and_salon_plans_section_plan_four' ); 
   
			echo '<div class="container">';
                 if( $spa_and_salon_plan_title || $spa_and_salon_plan_content ){
                    echo '<header class="header">' ;
                        echo '<div class="left">';
                            if( $spa_and_salon_plan_title ) echo '<h2>' . esc_html( $spa_and_salon_plan_title ) . '</h2>';
                            if( $spa_and_salon_plan_content ) echo wpautop( esc_html( $spa_and_salon_plan_content ) ); 
                        echo '</div>';			
                        if ($spa_and_salon_plan_btn_text) {
                        echo'<a href="' .esc_url($spa_and_salon_plan_btn_url). '" class="btn-green">' .esc_html($spa_and_salon_plan_btn_text). '</a>';
                        }
                    echo '</header>';
                 } 


		 if( $spa_and_salon_plan_post_one || $spa_and_salon_plan_post_two || $spa_and_salon_plan_post_three || $spa_and_salon_plan_post_four ){
			 $spa_and_salon_plan_posts = array( $spa_and_salon_plan_post_one, $spa_and_salon_plan_post_two, $spa_and_salon_plan_post_three, $spa_and_salon_plan_post_four );
			 $spa_and_salon_plan_posts = array_filter( $spa_and_salon_plan_posts );
		
			
			 $service_qry = new WP_Query( array( 
				'post_type'             => 'spa_plans',
				'posts_per_page'        => 4,
				'post__in'              => $spa_and_salon_plan_posts,
				'orderby'               => 'post__in',
				'ignore_sticky_posts'   => true 
			 ) );
			 if( $service_qry->have_posts() ){ 
				?>
                
                    <div class="row">
						<?php
                             while( $service_qry->have_posts() ){
                             $service_qry->the_post();
                                if( has_post_thumbnail() ){
                        ?>                        
                            <div class="col">
                                <div class="img-holder">
                                	<a href="<?php the_permalink(); ?>">
	                                    <?php the_post_thumbnail( 'thumbnail', array( 'itemprop' => 'image' ) ); ?>	
                                    </a>
                                </div>
                                <div class="text-holder">
				                    <h3 class="title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h3>                                    
                                    <span class="price"><?php echo esc_html(get_post_meta( get_the_ID(), 'plan_options_price', true ));?></span>
                                    <?php echo the_excerpt(); ?>
                                </div>
                            </div>
					 <?php
                             }
                         }  
                        ?>                        
                    </div> <!-- row -->
				<?php
    	        	 wp_reset_postdata(); 
				    }
				 }		
				?>
			</div> <!-- container -->