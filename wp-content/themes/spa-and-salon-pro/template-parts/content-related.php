<?php
/**
 * Template part for displaying related posts.
 *
 * @package Spa_And_Salon
 */

global $post;
 

$arg = array(
    'post_type'             => 'post',
    'post_status'           => 'publish',
    'posts_per_page'        => 3,
    'ignore_sticky_posts'   => true,
    'post__not_in'          => array( $post->ID ),
    'orderby'               => 'rand'
);

    $cats = get_the_category( $post->ID );
    if( $cats ){
        $c = array();
        foreach( $cats as $cat ){
            $c[] = $cat->term_id; 
        }
        $arg['category__in'] = $c;
        
        $qry = new WP_Query( $arg );
        ?>
        <section class="similar-posts">
            <h3><?php esc_html_e( 'Related Posts', 'spa-and-salon-pro' ); ?></h3>
       <div class="row">
        <?php 
        if( $qry->have_posts() ){
            while( $qry->have_posts() ){
                $qry->the_post();
                ?>
                <article class="post">
    				<?php if( has_post_thumbnail() ){ ?>
                    <a href="<?php the_permalink(); ?>" class="post-thumbnail"><?php the_post_thumbnail( 'spa-and-salon-related-post', array( 'itemprop' => 'image' ) );?></a>
                    <?php }
					else { ?>
                    <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                    <img src="<?php echo esc_url( get_template_directory_uri(). '/images/no-preview.png' ); ?>" alt="<?php the_title_attribute(); ?>" itemprop="image"/>
                    </a>
                    <?php } ?>                    
    				<div class="text-holder">
    					<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    					<div class="entry-meta">
    						<span class="posted-on"><a href="<?php the_permalink(); ?>"><?php printf( __( '%1$s', 'spa-and-salon-pro' ), get_the_date( 'F j, Y' ) ); ?></a></span>
    					</div>
    				</div>
    			</article>
                <?php
            }
            wp_reset_postdata();
        }
        ?>
            </div>
        </section>
        <?php                  
    }