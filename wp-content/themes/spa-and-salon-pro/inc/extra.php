<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Spa_and_Salon
 */

if ( ! function_exists( 'spa_and_salon_excerpt_more' ) ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... * 
 */
function spa_and_salon_excerpt_more($more) {
  return is_admin() ? $more : ' &hellip; ';
}
endif;
add_filter( 'excerpt_more', 'spa_and_salon_excerpt_more' );


if ( ! function_exists( 'spa_and_salon_excerpt_length' ) ) :
/**
 * Changes the default 55 character in excerpt 
*/
function spa_and_salon_excerpt_length( $length ) {
  if( is_page_template('template-home.php') ){
    return 20;
  }else{  return 55;}
}
endif;
add_filter( 'excerpt_length', 'spa_and_salon_excerpt_length', 999 );

if( ! function_exists( 'spa_and_salon_banner_cb' ) ):
 /** CallBack function for Banner */
 function spa_and_salon_banner_cb(){
    $spa_and_salon_ed_banner_section = get_theme_mod( 'spa_and_salon_ed_banner_section' );
    $spa_and_salon_banner_post = get_theme_mod( 'spa_and_salon_banner_post' );
    $spa_and_salon_banner_read_more = get_theme_mod( 'spa_and_salon_banner_read_more',esc_html__( 'Get Started', 'spa-and-salon-pro' ) );
    $spa_and_salon_enabled_sections = spa_and_salon_get_sections();
    
    $banner_class = '';
    if( !is_page_template( 'template-home.php' ) || !$spa_and_salon_ed_banner_section ) $banner_class = ' banner-inner';
    
    ?>
    <div class="banner<?php echo $banner_class; ?>">
        <?php 
            if( $spa_and_salon_ed_banner_section && is_page_template( 'template-home.php') && ( true == $spa_and_salon_banner_post ) ){
              $banner_qry = new WP_Query( array( 'p' => $spa_and_salon_banner_post ) );
                if( $banner_qry->have_posts() ){
                  while( $banner_qry->have_posts() ){
                    $banner_qry->the_post();
                    $categories_list = get_the_category_list( esc_html__( ', ', 'spa-and-salon-pro' ) );
                    if( has_post_thumbnail() ){
                      the_post_thumbnail( 'spa-and-salon-banner', array( 'itemprop' => 'image' ) );
                      ?>
                      <div class="banner-text">
                        <div class="container">
                          <div class="text">
                            <strong class="title"><?php the_title(); ?></strong>
                              <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?> " class="btn-green"><?php echo esc_html( $spa_and_salon_banner_read_more ); ?></a>
                          </div>
                        </div>
                      </div>
                    
                      <?php
                          if( $spa_and_salon_enabled_sections ) echo '<div class="arrow-down"></div>';
                    }
                  }
                  wp_reset_postdata();
                }
                
            }
        ?>
    </div>
    <?php
 }

 endif;
 
 add_action( 'spa_and_salon_banner', 'spa_and_salon_banner_cb' );



if( ! function_exists( 'spa_and_salon_featured_cb' ) ):
/** CallBack function for featured Section */
function spa_and_salon_featured_cb(){
$spa_and_salon_featured_boxes  = get_theme_mod( 'spa_and_salon_featured_boxes' );

 ?>
  <div class= "promotional-block" id="promotional-section">
    <div class="container">
        <div class="row">

            <?php
            foreach( $spa_and_salon_featured_boxes as $box ){
                if( $box['thumbnail'] ){
                    $image = wp_get_attachment_image_src( $box['thumbnail'], 'spa-and-salon-featured-block' );
                    if( $image ){
                    ?>        

                         <div class="col">
                          <?php if( $image ){ ?>
                               <div class="img-holder">
								<a href="<?php echo esc_url( $box['link'] ) ?>">
									<img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php esc_attr( $box['title'] ); ?>" />                                                                                  
                                </a>                                      
								<?php if( $box['icon'] ) { ?>
                                    <div class="icon-holder">
                                      <span class="fa fa-<?php echo esc_html( $box['icon'] ); ?>"></span>
                                    </div>
                                <?php } ?>                                                                        
                               </div>
                          <?php } ?>     
                                   
                                <div class="text-holder">
                                    <?php if( $box['title'] ) echo '<strong class="title"><a href="' .esc_url( $box['link'] ). '">' . esc_html( $box['title'] ) . '</a></strong>'; ?>									                                  
                                    <?php if( $box['desc'] ) echo '<p>' . esc_html( $box['desc'] ) . '</p>'; ?>									                                                                      
                                </div>
                          </div> 
                          
                          
                    <?php
                    }
                }
            }
            ?>                          
              
        </div>        
    </div>
  </div>
<?php }
 
 endif;
 add_action( 'spa_and_salon_featured', 'spa_and_salon_featured_cb' ); 


if( ! function_exists( 'spa_and_salon_footer_credit' ) ) :
/**
 * Footer Credits
*/
function spa_and_salon_footer_credit(){
    $spa_and_salon_copyright_text = get_theme_mod( 'spa_and_salon_footer_copyright');
	$spa_and_salon_author_link = get_theme_mod( 'spa_and_salon_ed_author_link');
	$spa_and_salon_wp_link = get_theme_mod( 'spa_and_salon_ed_wp_link');

    $text  = '<div class="site-info"><div class="container"><span class="copyright">';
	if( $spa_and_salon_copyright_text ){
    $text  .=  wp_kses_post( spa_and_salon_pro_apply_footer_shortcode( $spa_and_salon_copyright_text ) );
	}
	else
	{
    $text .=  esc_html__( 'Copyright &copy; ', 'spa-and-salon-pro' ) . date('Y');
    $text .= ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>. ';
	}
    $text .= '</span><span class="by">';
	if( ! $spa_and_salon_author_link ){
    $text .= '<a href="' . esc_url( 'https://raratheme.com/wordpress-themes/spa-and-salon-pro' ) .'" rel="author" target="_blank">' . esc_html__( 'Theme Spa and Salon Pro by Rara Theme', 'spa-and-salon-pro' ) .'</a>. ';
	}
	if( ! $spa_and_salon_wp_link ){
    $text .= sprintf( esc_html__( 'Powered by %s', 'spa-and-salon-pro' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'spa-and-salon-pro' ) ) .'" target="_blank">WordPress</a>.' );
	}

    if ( function_exists( 'the_privacy_policy_link' ) ) {
        $privacy_policy_link = get_the_privacy_policy_link();
        $text .= '<span class="policy_link">'. wp_kses_post( $privacy_policy_link ) .'</span>';
    }

    $text .= '</span></div></div>';

    echo apply_filters( 'spa_and_salon_footer_text', $text );
}
endif;

add_action( 'spa_and_salon_footer', 'spa_and_salon_footer_credit' );


/**
 * Return sidebar layouts for pages
*/
function spa_and_salon_sidebar_layout(){
    global $post;
    
    if( get_post_meta( $post->ID, 'spa_and_salon_sidebar_layout', true ) ){
        return get_post_meta( $post->ID, 'spa_and_salon_sidebar_layout', true );    
    }else{
        return 'right-sidebar';
    }
}

/**
 * Custom CSS
*/
if ( function_exists( 'wp_update_custom_css_post' ) ) {
    // Migrate any existing theme CSS to the core option added in WordPress 4.7.
    $css = get_theme_mod( 'spa_and_salon_custom_css' );
    if ( $css ) {
        $core_css = wp_get_custom_css(); // Preserve any CSS already added to the core option.
        $return = wp_update_custom_css_post( $core_css . $css );
        if ( ! is_wp_error( $return ) ) {
            // Remove the old theme_mod, so that the CSS is stored in only one place moving forward.
            remove_theme_mod( 'spa_and_salon_custom_css' );
        }
    }
} else {
    // Back-compat for WordPress < 4.7.    
    function spa_and_salon_custom_css(){
        $custom_css = get_theme_mod( 'spa_and_salon_custom_css' );
        if( !empty( $custom_css ) ){
        echo '<style type="text/css">';
        echo wp_strip_all_tags( $custom_css );
        echo '</style>';
      }
    }
    add_action( 'wp_head', 'spa_and_salon_custom_css', 101 );
}

/**
 * Cusotm Js
*/
function spa_and_salon_custom_js(){
    $custom_script = get_theme_mod( 'spa_and_salon_custom_script' );
    if( $custom_script ){
        echo '<script type="text/javascript">';
		echo wp_strip_all_tags( $custom_script );
		echo '</script>';
    }
}
add_action( 'wp_footer', 'spa_and_salon_custom_js' );

if( ! function_exists( 'spa_and_salon_breadcrumbs_cb' ) ) :
/**
 * Breadcrumb 
*/
function spa_and_salon_breadcrumbs_cb(){
    
    global $post;
    $post_page  = get_option( 'page_for_posts' ); //The ID of the page that displays posts.
    $show_front = get_option( 'show_on_front' ); //What to show on the front page    
    $home       = get_theme_mod( 'spa_and_salon_breadcrumb_home_text', __( 'Home', 'spa-and-salon-pro' ) ); // text for the 'Home' link
    $delimiter  = get_theme_mod( 'spa_and_salon_breadcrumb_separator', __( '>', 'spa-and-salon-pro' ) ); // delimiter between crumbs
    $before     = '<span class="current">'; // tag before the current crumb
    $after      = '</span>'; // tag after the current crumb
    
    if( get_theme_mod( 'spa_and_salon_ed_breadcrumb' ) && ! is_front_page() ){
        
        echo '<div class="page-header"><div class="container"><div id="crumbs"><a href="' . esc_url( home_url() ) . '">' . esc_html( $home ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
        
        if( is_home() ){
            
            echo $before . esc_html( single_post_title( '', false ) ) . $after;
            
        }elseif( is_category() ){
            
            $thisCat = get_category( get_query_var( 'cat' ), false );
            
            if( $show_front === 'page' && $post_page ){ //If static blog post page is set
                $p = get_post( $post_page );
                echo ' <a href="' . esc_url( get_permalink( $post_page ) ) . '">' . esc_html( $p->post_title ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';  
            }
            
            if ( $thisCat->parent != 0 ) echo get_category_parents( $thisCat->parent, TRUE, ' <span class="separator">' . $delimiter . '</span> ' );
            echo $before .  esc_html( single_cat_title( '', false ) ) . $after;
        
        }elseif( is_woocommerce_activated() && ( is_product_category() || is_product_tag() ) ){ //For Woocommerce archive page
        
            $current_term = $GLOBALS['wp_query']->get_queried_object();
            
            if ( wc_get_page_id( 'shop' ) ) { //Displaying Shop link in woocommerce archive page
    			$_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
                if ( ! $_name ) {
        			$product_post_type = get_post_type_object( 'product' );
        			$_name = $product_post_type->labels->singular_name;
        		}
                echo ' <a href="' . esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ) . '">' . esc_html( $_name ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
    		}
                        
            if( is_product_category() ){
                $ancestors = get_ancestors( $current_term->term_id, 'product_cat' );
                $ancestors = array_reverse( $ancestors );
        		foreach ( $ancestors as $ancestor ) {
        			$ancestor = get_term( $ancestor, 'product_cat' );    
        			if ( ! is_wp_error( $ancestor ) && $ancestor ) {
        				echo ' <a href="' . esc_url( get_term_link( $ancestor ) ) . '">' . esc_html( $ancestor->name ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
        			}
        		}
            }           
            echo $before . esc_html( $current_term->name ) . $after;
            
        } elseif( is_woocommerce_activated() && is_shop() ){ //Shop Archive page
            if ( get_option( 'page_on_front' ) == wc_get_page_id( 'shop' ) ) {
    			return;
    		}
    		$_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
    
    		if ( ! $_name ) {
    			$product_post_type = get_post_type_object( 'product' );
    			$_name = $product_post_type->labels->singular_name;
    		}
            echo $before . esc_html( $_name ) . $after;
            
        }elseif( is_tag() ){
            
            echo $before . esc_html( single_tag_title( '', false ) ) . $after;
     
        }elseif( is_author() ){
            
            global $author;
            $userdata = get_userdata( $author );
            echo $before . esc_html( $userdata->display_name ) . $after;
     
        }elseif( is_search() ){
            
            echo $before . esc_html__( 'Search Results for "', 'spa-and-salon-pro' ) . esc_html( get_search_query() ) . esc_html__( '"', 'spa-and-salon-pro' ) . $after;
        
        }elseif( is_day() ){
            
            echo '<a href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'spa-and-salon-pro' ) ) ) ) . '">' . esc_html( get_the_time( __( 'Y', 'spa-and-salon-pro' ) ) ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
            echo '<a href="' . esc_url( get_month_link( get_the_time( __( 'Y', 'spa-and-salon-pro' ) ), get_the_time( __( 'm', 'spa-and-salon-pro' ) ) ) ) . '">' . esc_html( get_the_time( __( 'F', 'spa-and-salon-pro' ) ) ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
            echo $before . esc_html( get_the_time( __( 'd', 'spa-and-salon-pro' ) ) ) . $after;
        
        }elseif( is_month() ){
            
            echo '<a href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'spa-and-salon-pro' ) ) ) ) . '">' . esc_html( get_the_time( __( 'Y', 'spa-and-salon-pro' ) ) ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
            echo $before . esc_html( get_the_time( __( 'F', 'spa-and-salon-pro' ) ) ) . $after;
        
        }elseif( is_year() ){
            
            echo $before . esc_html( get_the_time( __( 'Y', 'spa-and-salon-pro' ) ) ) . $after;
    
        }elseif( is_single() && !is_attachment() ){
            
            if( is_woocommerce_activated() && 'product' === get_post_type() ){ //For Woocommerce single product
        		
                if ( wc_get_page_id( 'shop' ) ) { //Displaying Shop link in woocommerce archive page
        			$_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
                    if ( ! $_name ) {
            			$product_post_type = get_post_type_object( 'product' );
            			$_name = $product_post_type->labels->singular_name;
            		}
                    echo ' <a href="' . esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ) . '">' . esc_html( $_name ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
        		}
            
                if ( $terms = wc_get_product_terms( $post->ID, 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) ) ) {
        			$main_term = apply_filters( 'woocommerce_breadcrumb_main_term', $terms[0], $terms );
        			$ancestors = get_ancestors( $main_term->term_id, 'product_cat' );
                    $ancestors = array_reverse( $ancestors );
            		foreach ( $ancestors as $ancestor ) {
            			$ancestor = get_term( $ancestor, 'product_cat' );    
            			if ( ! is_wp_error( $ancestor ) && $ancestor ) {
            				echo ' <a href="' . esc_url( get_term_link( $ancestor ) ) . '">' . esc_html( $ancestor->name ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
            			}
            		}
        			echo ' <a href="' . esc_url( get_term_link( $main_term ) ) . '">' . esc_html( $main_term->name ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
        		}
                
                echo $before . esc_html( get_the_title() ) . $after;
                
            }elseif ( get_post_type() != 'post' ){
                
                $post_type = get_post_type_object( get_post_type() );
                
                if( $post_type->has_archive == true ){// For CPT Archive Link
                   
                   // Add support for a non-standard label of 'archive_title' (special use case).
                   $label = !empty( $post_type->labels->archive_title ) ? $post_type->labels->archive_title : $post_type->labels->name;
                   printf( '<a href="%1$s">%2$s</a>', esc_url( get_post_type_archive_link( get_post_type() ) ), $label );
                   echo '<span class="separator">' . esc_html( $delimiter ) . '</span> ';
    
                }
                echo $before . esc_html( get_the_title() ) . $after;
                
            }else{ //For Post
                
                $cat_object       = get_the_category();
                $potential_parent = 0;
                
                if( $show_front === 'page' && $post_page ){ //If static blog post page is set
                    $p = get_post( $post_page );
                    echo ' <a href="' . esc_url( get_permalink( $post_page ) ) . '">' . esc_html( $p->post_title ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';  
                }
                
                if( is_array( $cat_object ) ){ //Getting category hierarchy if any
        
        			//Now try to find the deepest term of those that we know of
        			$use_term = key( $cat_object );
        			foreach( $cat_object as $key => $object )
        			{
        				//Can't use the next($cat_object) trick since order is unknown
        				if( $object->parent > 0  && ( $potential_parent === 0 || $object->parent === $potential_parent ) ){
        					$use_term = $key;
        					$potential_parent = $object->term_id;
        				}
        			}
                    
        			$cat = $cat_object[$use_term];
              
                    $cats = get_category_parents( $cat, TRUE, ' <span class="separator">' . esc_html( $delimiter ) . '</span> ' );
                    $cats = preg_replace( "#^(.+)\s$delimiter\s$#", "$1", $cats ); //NEED TO CHECK THIS
                    echo $cats;
                }
    
                echo $before . esc_html( get_the_title() ) . $after;
                
            }
        
        }elseif( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ){
            
            $post_type = get_post_type_object(get_post_type());
            if( get_query_var('paged') ){
                echo '<a href="' . esc_url( get_post_type_archive_link( $post_type->name ) ) . '">' . esc_html( $post_type->label ) . '</a>';
                echo ' <span class="separator">' . esc_html( $delimiter ) . '</span> ' . $before . sprintf( __('Page %s', 'spa-and-salon-pro'), get_query_var('paged') ) . $after;
            }else{
                echo $before . esc_html( $post_type->label ) . $after;
            }
    
        }elseif( is_attachment() ){
            
            $parent = get_post( $post->post_parent );
            $cat = get_the_category( $parent->ID ); 
            if( $cat ){
                $cat = $cat[0];
                echo get_category_parents( $cat, TRUE, ' <span class="separator">' . esc_html( $delimiter ) . '</span> ');
                echo '<a href="' . esc_url( get_permalink( $parent ) ) . '">' . esc_html( $parent->post_title ) . '</a>' . ' <span class="separator">' . esc_html( $delimiter ) . '</span> ';
            }
            echo  $before . esc_html( get_the_title() ) . $after;
        
        }elseif( is_page() && !$post->post_parent ){
            
            echo $before . esc_html( get_the_title() ) . $after;
    
        }elseif( is_page() && $post->post_parent ){
            
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            
            while( $parent_id ){
                $page = get_post( $parent_id );
                $breadcrumbs[] = '<a href="' . esc_url( get_permalink( $page->ID ) ) . '">' . esc_html( get_the_title( $page->ID ) ) . '</a>';
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse( $breadcrumbs );
            for ( $i = 0; $i < count( $breadcrumbs) ; $i++ ){
                echo $breadcrumbs[$i];
                if ( $i != count( $breadcrumbs ) - 1 ) echo ' <span class="separator">' . esc_html( $delimiter ) . '</span> ';
            }
            echo ' <span class="separator">' . esc_html( $delimiter ) . '</span> ' . $before . esc_html( get_the_title() ) . $after;
        
        }elseif( is_404() ){
            echo $before . esc_html__( 'Error 404', 'spa-and-salon-pro' ) . $after;
        }
        
        if( get_query_var('paged') ) echo __( ' (Page', 'spa-and-salon-pro' ) . ' ' . get_query_var('paged') . __( ')', 'spa-and-salon-pro' );
        
        echo '</div></div></div>';
        
    }
}
endif;
add_action( 'spa_and_salon_breadcrumbs', 'spa_and_salon_breadcrumbs_cb' );


if( ! function_exists( 'spa_and_salon_get_the_archive_title' ) ) :
/**
 * Filter Archive Title
*/
function spa_and_salon_get_the_archive_title( $title ){

    if( is_category() ){
        $title = single_cat_title( '', false );
    }elseif ( is_tag() ){
        $title = single_tag_title( '', false );
    }elseif( is_author() ){
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    }elseif ( is_year() ) {
        $title = get_the_date( __( 'Y', 'spa-and-salon-pro' ) );
    }elseif ( is_month() ) {
        $title = get_the_date( __( 'F Y', 'spa-and-salon-pro' ) );
    }elseif ( is_day() ) {
        $title = get_the_date( __( 'F j, Y', 'spa-and-salon-pro' ) );
    }
    return $title;
}

endif;

add_filter( 'get_the_archive_title', 'spa_and_salon_get_the_archive_title' );


if( ! function_exists( 'spa_and_salon_pro_apply_footer_shortcode' ) ) :
    /**
     * Function to add shortcode in footer content
     */
    function spa_and_salon_pro_apply_footer_shortcode( $string ) {
        if ( empty( $string ) ) {
            return $string;
        }
        $search = array( '[the-year]', '[the-site-link]' );
        $replace = array(
            date_i18n( __( 'Y', 'spa-and-salon-pro' ) ),
            '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_html( get_bloginfo( 'name', 'display' ) ) . '</a>',
        );
        $string = str_replace( $search, $replace, $string );
        return $string;
    }
endif;