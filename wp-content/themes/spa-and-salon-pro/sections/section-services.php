<?php
/**
 * Service Section
 * 
 * @package Spa_and_Salon
 */
 
 $spa_and_salon_service_title = get_theme_mod( 'spa_and_salon_service_post_title');
 $spa_and_salon_service_content = get_theme_mod( 'spa_and_salon_service_post_content' );
 $spa_and_salon_service_btn_text = get_theme_mod( 'spa_and_salon_services_btn_text' ); 
 $spa_and_salon_service_btn_url = get_theme_mod( 'spa_and_salon_services_btn_url' );  

 $spa_and_salon_service_post_one = get_theme_mod( 'spa_and_salon_service_post_one' );
 $spa_and_salon_service_post_two = get_theme_mod( 'spa_and_salon_service_post_two' );
 $spa_and_salon_service_post_three = get_theme_mod( 'spa_and_salon_service_post_three' );
 $spa_and_salon_service_post_four = get_theme_mod( 'spa_and_salon_service_post_four' );
 $spa_and_salon_service_post_five = get_theme_mod( 'spa_and_salon_service_post_five' );
 $spa_and_salon_service_post_six = get_theme_mod( 'spa_and_salon_service_post_six' );
 
 echo '<div class="container">';
 if( $spa_and_salon_service_title || $spa_and_salon_service_content ){
    echo '<header class="header">' ;
		echo '<div class="left">';
			if( $spa_and_salon_service_title ) echo '<h2>' . esc_html( $spa_and_salon_service_title ) . '</h2>';
			if( $spa_and_salon_service_content ) echo wpautop( esc_html( $spa_and_salon_service_content ) ); 
		echo '</div>';			
		if ($spa_and_salon_service_btn_text) {
		echo'<a href="' .esc_url($spa_and_salon_service_btn_url). '" class="btn-green">' .esc_html($spa_and_salon_service_btn_text). '</a>';
		}
    echo '</header>';
 } 
 

 if( $spa_and_salon_service_post_one || $spa_and_salon_service_post_two || $spa_and_salon_service_post_three || $spa_and_salon_service_post_four || $spa_and_salon_service_post_five || $spa_and_salon_service_post_six ){
     $spa_and_salon_service_posts = array( $spa_and_salon_service_post_one, $spa_and_salon_service_post_two, $spa_and_salon_service_post_three, $spa_and_salon_service_post_four, $spa_and_salon_service_post_five, $spa_and_salon_service_post_six );
     $spa_and_salon_service_posts = array_filter( $spa_and_salon_service_posts );

    
     $service_qry = new WP_Query( array( 
        'post_type'             => 'spa_services',
        'posts_per_page'        => 6,
        'post__in'              => $spa_and_salon_service_posts,
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
    			    <a href="<?php the_permalink(); ?>"  class="img-holder">
    				    <?php the_post_thumbnail( 'spa-and-salon-service', array( 'itemprop' => 'image' ) ); ?>	
    			    </a>
                    <h3><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h3>
                </div>
            <?php
                 }
             }  
            ?>

        </div>
        <?php
             wp_reset_postdata(); 
    }
 }		
 echo '</div>';

