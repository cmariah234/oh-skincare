<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package Spa_and_Salon
 */

function spa_and_salon_body_classes( $classes ) {
	global $post;

    $bg_color   = get_theme_mod( 'spa_and_salon_bg_color', '#e9e9e9' );
    $bg_image   = get_theme_mod( 'spa_and_salon_bg_image' );
    $bg_pattern = get_theme_mod( 'spa_and_salon_bg_pattern', 'nobg' );
    $bg         = get_theme_mod( 'spa_and_salon_body_bg', 'image' );

    $blog_layout = get_theme_mod( 'spa_and_salon_blog_page_layout');
    $slider_ed = get_theme_mod( 'spa_and_salon_ed_slider', '0'); 

	$medical_spa = get_theme_mod( 'spa_and_salon_ed_child_style', 'spa_and_salon' );		
	
    if( !is_page_template( 'template-home.php' ) ){
    $classes[] = 'inner';
    	// Adds a class of group-blog to blogs with more than 1 published author.
    }	

    // Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	
	if ( ! $slider_ed ) {
		$classes[] = 'no-slider';	
	}	

    // Adds a class for custom background Color
    if( $bg_color != '#e9e9e9' ){
        $classes[] = 'custom-background custom-background-color';
    }
	
    // Adds a class for custom background Color
    if( ( $bg == 'image' && $bg_image ) || (  $bg == 'pattern' && $bg_pattern != 'nobg' ) ){
        $classes[] = 'custom-background custom-background-image';
    }

    $classes[] = spa_and_salon_sidebar( false, true );
	
	if( is_woocommerce_activated() && ( is_shop() || is_product_category() || is_product_tag() || 'product' === get_post_type() ) && ! is_active_sidebar( 'shop-sidebar' ) ){
		$classes[] = 'full-width';
	}		
    //Child theme compatiblility CSS
    if ( $medical_spa === 'medical_spa' ) {
        $classes[] = 'medical-spa';
    }

    if( $blog_layout === 'wide-image' ){
        $classes[] = 'blog-full-image';
    }

	return $classes;
}
add_filter( 'body_class', 'spa_and_salon_body_classes' );

/**
 * Adds custom classes to the array of post classes.
 *
 * @param array $classes Classes for the post element.
 * @return array
 */
function spa_and_salon_post_classes( $classes ) {
    global $post;

    $classes[] = 'latest_post';

    if( ! has_post_thumbnail( $post->ID ) ){
        $classes[] = 'no_image';
    }

    return $classes;
}
add_filter( 'post_class', 'spa_and_salon_post_classes' );

if ( ! function_exists( 'spa_and_salon_category_list' ) ) :
/**
 * Prints Categories lists
*/
function spa_and_salon_category_list(){
    // Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'spa-and-salon-pro' ) );
		if ( $categories_list && spa_and_salon_categorized_blog() ) {
			printf( '<span class="category">' . esc_html__( '%1$s', 'spa-and-salon-pro' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}		
	}
}
endif;

if ( ! function_exists( 'spa_and_salon_tag_list' ) ) :
/**
 * Prints Tag lists
*/
function spa_and_salon_tag_list(){
    // Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'spa-and-salon-pro' ) );
		if ( $tags_list ) {
			printf( '<span class="tags">' . esc_html__( 'Tags: %1$s ', 'spa-and-salon-pro' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}
}
endif;

if ( ! function_exists( 'spa_and_salon_entry_footer' ) ) :
/**
 * post edit links
*/
function spa_and_salon_entry_footer() {
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( ' Edit %s', 'spa-and-salon-pro' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Callback function for Comment List
 * 
 * @link https://codex.wordpress.org/Function_Reference/wp_list_comments 
 */
function spa_and_salon_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body" itemscope itemtype="http://schema.org/UserComments">
    <?php endif; ?>
    <div class="comment-author vcard">
    <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
    <?php printf( __( '<b class="fn" itemprop="creator" itemscope itemtype="http://schema.org/Person">%s</b>', 'spa-and-salon-pro' ), get_comment_author_link() ); ?>
    </div>
    <?php if ( $comment->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'spa-and-salon-pro' ); ?></em>
        <br />
    <?php endif; ?>

    <div class="comment-metadata commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
        <?php
            /* translators: 1: date, 2: time */
            printf( __('%1$s', 'spa-and-salon-pro' ), get_comment_date() ); ?></a><?php edit_comment_link( __( 'Edit', 
            'spa-and-salon-pro' ), '  ', '' );
        ?>
    </div>
    
    <div class="comment-content">
       <?php comment_text(); ?>
    </div>
    
    <div class="reply">
    <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    </div>
    
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
<?php
}

/**
 * Function to retrive page specific sidebar and corresponding body class
 * 
 * @param boolean $sidebar
 * @param boolean $class
 * 
 * @return string dynamic sidebar id / classname
*/
function spa_and_salon_sidebar( $sidebar = false, $class = false ){
    
    global $post;
    $return = false;
    
    if( ( is_front_page() && is_home() ) || is_home() ){
        //blog/home page 
        $home_sidebar = get_theme_mod( 'spa_and_salon_home_page_sidebar', 'sidebar' );
        $home_layout       = get_theme_mod( 'spa_and_salon_layout_style', 'right-sidebar' );		

			if( ( $home_sidebar == 'no-sidebar' ) || ( ( $home_sidebar == 'default-sidebar' ) && ( $page_sidebar == 'no-sidebar' ) ) ){
				if( $sidebar ) $return = false; //Fullwidth
				if( $class ) $return = 'full-width';
			}elseif( $home_sidebar == 'default-sidebar' && $page_sidebar != 'no-sidebar' && is_active_sidebar( $page_sidebar ) ){
				if( $sidebar ) $return = $page_sidebar;
				if( $class && ( ( $home_layout == 'default-sidebar' && $layout == 'right-sidebar' ) || ( $home_layout == 'right-sidebar' ) ) ) $return = 'rightsidebar';
				if( $class && ( ( $home_layout == 'default-sidebar' && $layout == 'left-sidebar' ) || ( $home_layout == 'left-sidebar' ) ) ) $return = 'leftsidebar';
			}elseif( is_active_sidebar( $home_sidebar ) ){
				if( $sidebar ) $return = $home_sidebar;
				if( $class && ( ( $home_layout == 'default-sidebar' && $layout == 'right-sidebar' ) || ( $home_layout == 'right-sidebar' ) ) ) $return = 'rightsidebar';
				if( $class && ( ( $home_layout == 'default-sidebar' && $layout == 'left-sidebar' ) || ( $home_layout == 'left-sidebar' ) ) ) $return = 'leftsidebar';
			}else{
				if( $sidebar ) $return = false; //Fullwidth
				if( $class ) $return = 'full-width';
			}
        
    }
    
    if( is_archive() ){
        //archive page
        $archive_sidebar = get_theme_mod( 'spa_and_salon_archive_page_sidebar', 'sidebar' );
        $cat_sidebar     = get_theme_mod( 'spa_and_salon_cat_archive_page_sidebar', 'sidebar' );
        $tag_sidebar     = get_theme_mod( 'spa_and_salon_tag_archive_page_sidebar', 'sidebar' );
        $date_sidebar    = get_theme_mod( 'spa_and_salon_date_archive_page_sidebar', 'sidebar' );
        $author_sidebar  = get_theme_mod( 'spa_and_salon_author_archive_page_sidebar', 'sidebar' );
        $layout          = get_theme_mod( 'spa_and_salon_layout_style', 'right-sidebar' );			
        
        if( is_category() ){
            
            if( $cat_sidebar == 'no-sidebar' || ( $cat_sidebar == 'default-sidebar' && $archive_sidebar == 'no-sidebar' ) ){
                if( $sidebar ) $return = false; //Fullwidth
                if( $class ) $return = 'full-width';
            }elseif( $cat_sidebar == 'default-sidebar' && $archive_sidebar != 'no-sidebar' && is_active_sidebar( $archive_sidebar ) ){
                if( $sidebar ) $return = $archive_sidebar;
                if( $class && $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                if( $class && $layout == 'left-sidebar' ) $return = 'leftsidebar';
            }elseif( is_active_sidebar( $cat_sidebar ) ){
                if( $sidebar ) $return = $cat_sidebar;
                if( $class && $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                if( $class && $layout == 'left-sidebar' ) $return = 'leftsidebar';
            }else{
                if( $sidebar ) $return = false; //Fullwidth
                if( $class ) $return = 'full-width';
            }
                
        }elseif( is_tag() ){
            
            if( $tag_sidebar == 'no-sidebar' || ( $tag_sidebar == 'default-sidebar' && $archive_sidebar == 'no-sidebar' ) ){
                if( $sidebar ) $return = false; //Fullwidth
                if( $class ) $return = 'full-width';
            }elseif( ( $tag_sidebar == 'default-sidebar' && $archive_sidebar != 'no-sidebar' && is_active_sidebar( $archive_sidebar ) ) ){
                if( $sidebar ) $return = $archive_sidebar;
                if( $class && $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                if( $class && $layout == 'left-sidebar' ) $return = 'leftsidebar';
            }elseif( is_active_sidebar( $tag_sidebar ) ){
                if( $sidebar ) $return = $tag_sidebar;
                if( $class && $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                if( $class && $layout == 'left-sidebar' ) $return = 'leftsidebar';              
            }else{
                if( $sidebar ) $return = false; //Fullwidth
                if( $class ) $return = 'full-width';
            }
            
        }elseif( is_author() ){
            
            if( $author_sidebar == 'no-sidebar' || ( $author_sidebar == 'default-sidebar' && $archive_sidebar == 'no-sidebar' ) ){
                if( $sidebar ) $return = false; //Fullwidth
                if( $class ) $return = 'full-width';
            }elseif( ( $author_sidebar == 'default-sidebar' && $archive_sidebar != 'no-sidebar' && is_active_sidebar( $archive_sidebar ) ) ){
                if( $sidebar ) $return = $archive_sidebar;
                if( $class && $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                if( $class && $layout == 'left-sidebar' ) $return = 'leftsidebar';
            }elseif( is_active_sidebar( $author_sidebar ) ){
                if( $sidebar ) $return = $author_sidebar;
                if( $class && $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                if( $class && $layout == 'left-sidebar' ) $return = 'leftsidebar';
            }else{
                if( $sidebar ) $return = false; //Fullwidth
                if( $class ) $return = 'full-width';
            }
            
        }elseif( is_date() ){
            
            if( $date_sidebar == 'no-sidebar' || ( $date_sidebar == 'default-sidebar' && $archive_sidebar == 'no-sidebar' ) ){
                if( $sidebar ) $return = false; //Fullwidth
                if( $class ) $return = 'full-width';
            }elseif( ( $date_sidebar == 'default-sidebar' && $archive_sidebar != 'no-sidebar' && is_active_sidebar( $archive_sidebar ) ) ){
                if( $sidebar ) $return = $archive_sidebar;
                if( $class && $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                if( $class && $layout == 'left-sidebar' ) $return = 'leftsidebar';
            }elseif( is_active_sidebar( $date_sidebar ) ){
                if( $sidebar ) $return = $date_sidebar;
                if( $class && $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                if( $class && $layout == 'left-sidebar' ) $return = 'leftsidebar';
            }else{
                if( $sidebar ) $return = false; //Fullwidth
                if( $class ) $return = 'full-width';
            }                         
            
        }else{
            if( $archive_sidebar != 'no-sidebar' && is_active_sidebar( $archive_sidebar ) ){
                if( $sidebar ) $return = $archive_sidebar;
                if( $class && $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
                if( $class && $layout == 'left-sidebar' ) $return = 'leftsidebar';
            }                      
        }
        
    }
    
    if( is_singular() ){
        $post_sidebar = get_theme_mod( 'spa_and_salon_single_post_sidebar', 'sidebar' );
        $page_sidebar = get_theme_mod( 'spa_and_salon_single_page_sidebar', 'sidebar' );
        $layout       = get_theme_mod( 'spa_and_salon_layout_style', 'right-sidebar' );
        
        if( get_post_meta( $post->ID, '_spa_and_salon_sidebar', true ) ){
            $single_sidebar = get_post_meta( $post->ID, '_spa_and_salon_sidebar', true );
        }else{
            $single_sidebar = 'default-sidebar';
        }

        if( get_post_meta( $post->ID, '_spa_and_salon_sidebar_layout', true ) ){
            $sidebar_layout = get_post_meta( $post->ID, '_spa_and_salon_sidebar_layout', true );
        }else{
            $sidebar_layout = 'default-sidebar';
        }
        
        if( is_page() ){
            
            if( ( $single_sidebar == 'no-sidebar' ) || ( ( $single_sidebar == 'default-sidebar' ) && ( $page_sidebar == 'no-sidebar' ) ) ){
                if( $sidebar ) $return = false; //Fullwidth
                if( $class ) $return = 'full-width';
            }elseif( $single_sidebar == 'default-sidebar' && $page_sidebar != 'no-sidebar' && is_active_sidebar( $page_sidebar ) ){
                if( $sidebar ) $return = $page_sidebar;
                if( $class && ( ( $sidebar_layout == 'default-sidebar' && $layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ) ) $return = 'rightsidebar';
                if( $class && ( ( $sidebar_layout == 'default-sidebar' && $layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ) ) $return = 'leftsidebar';
            }elseif( is_active_sidebar( $single_sidebar ) ){
                if( $sidebar ) $return = $single_sidebar;
                if( $class && ( ( $sidebar_layout == 'default-sidebar' && $layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ) ) $return = 'rightsidebar';
                if( $class && ( ( $sidebar_layout == 'default-sidebar' && $layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ) ) $return = 'leftsidebar';
            }else{
                if( $sidebar ) $return = false; //Fullwidth
                if( $class ) $return = 'full-width';
            }
        }
        
        if( is_single() ){
            
            if( ( $single_sidebar == 'no-sidebar' ) || ( ( $single_sidebar == 'default-sidebar' ) && ( $post_sidebar == 'no-sidebar' ) ) ){
                if( $sidebar ) $return = false; //Fullwidth
                if( $class ) $return = 'full-width';
            }elseif( $single_sidebar == 'default-sidebar' && $post_sidebar != 'no-sidebar' && is_active_sidebar( $post_sidebar ) ){
                if( $sidebar ) $return = $post_sidebar;
                if( $class && ( ( $sidebar_layout == 'default-sidebar' && $layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ) ) $return = 'rightsidebar';
                if( $class && ( ( $sidebar_layout == 'default-sidebar' && $layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ) ) $return = 'leftsidebar';
            }elseif( is_active_sidebar( $single_sidebar ) ){
                if( $sidebar ) $return = $single_sidebar;
                if( $class && ( ( $sidebar_layout == 'default-sidebar' && $layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ) ) $return = 'rightsidebar';
                if( $class && ( ( $sidebar_layout == 'default-sidebar' && $layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ) ) $return = 'leftsidebar';
            }else{
                if( $sidebar ) $return = false; //Fullwidth
                if( $class ) $return = 'full-width';
            }
        }
    }
    
    if( is_search() ){
        $search_sidebar = get_theme_mod( 'spa_and_salon_search_page_sidebar', 'sidebar' );
        $layout         = get_theme_mod( 'spa_and_salon_layout_style', 'right-sidebar' );
        
        if( $search_sidebar != 'no-sidebar' && is_active_sidebar( $search_sidebar ) ){
            if( $sidebar ) $return = $search_sidebar;
            if( $class && $layout == 'right-sidebar' ) $return = 'rightsidebar'; //With Sidebar
            if( $class && $layout == 'left-sidebar' ) $return = 'leftsidebar';
        }else{
            if( $sidebar ) $return = false; //Fullwidth
            if( $class ) $return = 'full-width';
        }        
    }
    
    return $return;        
}

/**
 * Function to list dynamic sidebar
*/
function spa_and_salon_get_dynamnic_sidebar( $nosidebar = false, $sidebar = false, $default = false ){
    $sidebar_arr = array();
    $sidebars = get_theme_mod( 'spa_and_salon_sidebar' );
    
    if( $default ) $sidebar_arr['default-sidebar'] = __( 'Default Sidebar', 'spa-and-salon-pro');
    if( $sidebar ) $sidebar_arr['sidebar'] = __( 'Sidebar', 'spa-and-salon-pro');
    
    if( $sidebars ){
        foreach( $sidebars as $sidebar ){
            $sidebar_arr[$sidebar['id']] = $sidebar['name'];
        }
    }
    
    if( $nosidebar ) $sidebar_arr['no-sidebar'] = __( 'No Sidebar', 'spa-and-salon-pro');
    
    return $sidebar_arr;
}



/**
 * Function to list Custom Pattern
*/
function spa_and_salon_get_patterns(){
    $patterns = array();
    $patterns['nobg'] = get_template_directory_uri() . '/images/patterns_thumb/' . 'nobg.png';
    for( $i=0; $i<38; $i++ ){
        $patterns['pattern'.$i] = get_template_directory_uri() . '/images/patterns_thumb/' . 'pattern' . $i .'.png';
    }
    for( $j=1; $j<26; $j++ ){
        $patterns['hbg'.$j] = get_template_directory_uri() . '/images/patterns_thumb/' . 'hbg' . $j . '.png';
    }
    return $patterns;
}


/**
 * Helper Function for Image widget
*/
function spa_and_salon_get_image_field( $id, $name, $image, $label ){
    
    $output = '';
    
    $output .= '<div class="widget-upload">';
    $output .= '<label for="' . $id . '">' . esc_html( $label ) . '</label><br/>';
    $output .= '<input id="' . $id . '" class="rara-upload" type="text" name="' . $name . '" value="' . $image . '" placeholder="' . __('No file chosen', 'spa-and-salon-pro') . '" />' . "\n";
    if ( function_exists( 'wp_enqueue_media' ) ) {
        if ( $image == '' ) {
            $output .= '<input id="upload-' . $id . '" class="rara-upload-button button" type="button" value="' . __('Upload', 'spa-and-salon-pro') . '" />' . "\n";
        } else {
            $output .= '<input id="upload-' . $id . '" class="rara-upload-button button" type="button" value="' . __('Change', 'spa-and-salon-pro') . '" />' . "\n";
        }
    } else {
        $output .= '<p><i>' . __('Upgrade your version of WordPress for full media support.', 'spa-and-salon-pro') . '</i></p>';
    }

    $output .= '<div class="rara-screenshot" id="' . $id . '-image">' . "\n";

    if ( $image != '' ) {
        $remove = '<a class="rara-remove-image"></a>';
        $attachment_id = spa_and_salon_get_image_id( $image );
        $image_array = wp_get_attachment_image_src( $attachment_id, 'full');
        $image = preg_match('/(^.*\.jpg|jpeg|png|gif|ico*)/i', $image);
        if ( $image ) {
            $output .= '<img src="' . esc_url( $image_array[0] ) . '" alt="" />' . $remove;
        } else {
            // Standard generic output if it's not an image.
            $output .= '<small>' . __( 'Please upload valid image file.', 'spa-and-salon-pro' ) . '</small>';
        }     
    }
    $output .= '</div></div>' . "\n";
    
    echo $output;
}

/**
 * Retrieves the Attachment ID from the file URL
 *  
 * @link https://pippinsplugins.com/retrieve-attachment-id-from-image-url/
 */
function spa_and_salon_get_image_id( $image_url ){
	global $wpdb;
	$attachment = $wpdb->get_col( $wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ) ); 
    if( $attachment ) return $attachment[0]; 
}

if( ! function_exists( 'spa_and_salon_mobile_menu' ) ) :
/**
 * prints mobile menu
*/
function spa_and_salon_mobile_menu(){
    ?>
    <div id="mobile-header">
	    <a id="responsive-menu-button" href="#sidr-main">
	    	<span></span>
	    	<span></span>
	    	<span></span>
	    </a>
	</div>
    <?php    
}
endif;

/**
 * 
 * @link http://www.altafweb.com/2011/12/remove-specific-tag-from-php-string.html
*/
function spa_and_salon_strip_single( $tag, $string ){
    $string=preg_replace('/<'.$tag.'[^>]*>/i', '', $string);
    $string=preg_replace('/<\/'.$tag.'>/i', '', $string);
    return $string;
} 

/**
 * convert hex to rgb
 * @link http://bavotasan.com/2011/convert-hex-color-to-rgb-using-php/
*/
function spa_and_salon_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}

/**
 * Query WooCommerce activation
 */
function is_woocommerce_activated() {
	return class_exists( 'woocommerce' ) ? true : false;
}

/**
 * Query Jetpack activation
*/
function is_jetpack_activated( $gallery = false ){
	if( $gallery ){
        return ( class_exists( 'jetpack' ) && Jetpack::is_module_active( 'tiled-gallery' ) ) ? true : false;
	}else{
        return class_exists( 'jetpack' ) ? true : false;
    }           
}

if ( ! function_exists( 'spa_and_salon_entry_tags' ) ) :
function spa_and_salon_entry_tags(){
    
    /* translators: used between list items, there is a space after the comma */
	$tags_list = get_the_tag_list( '', esc_html__( '', 'spa-and-salon-pro' ) );
	if ( $tags_list ) {
		printf( '<span class="tags">' . esc_html__( '%1$s', 'spa-and-salon-pro' ) . '</span>', $tags_list ); // WPCS: XSS OK.
	}
}
endif;

if( ! function_exists( 'spa_and_salon_author_bio_cb' ) ) :
/**
 * Author Bio 
*/
function spa_and_salon_author_bio_cb(){	
    if( get_the_author_meta( 'description' ) ){ ?>
        <div class="author-section">
                 <div class="img-holder">
	                <?php echo get_avatar( get_the_author_meta( 'ID' ), 135 ); ?>
                </div>
                <div class="text-holder">
            		<strong class="name"><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?></strong>
                    <?php echo wpautop( wp_kses_data( get_the_author_meta( 'description' ) ) ); ?>
            	</div>
        </div><!-- .author-section -->
    <?php
    }
}
endif;
add_action( 'spa_and_salon_author_bio', 'spa_and_salon_author_bio_cb' );

/**
 * Return Striptags from the content.
*/
function spa_and_salon_truncate( $content, $letter_count ){
	$striped_content = strip_shortcodes( $content );
	$striped_content = strip_tags( $striped_content );	
	$excerpt         = mb_substr( $striped_content, 0, $letter_count );

    if( $striped_content > $excerpt ){
		$excerpt .= '...';
	}

    return $excerpt;
}

// Social Protocols.
add_filter( 'kses_allowed_protocols' , 'spa_and_salon_allowed_social_protocols' );
/**
 * List of allowed social protocols in HTML attributes.
 * @param  array $protocols Array of allowed protocols.
 * @return array
 */
function spa_and_salon_allowed_social_protocols( $protocols ) {
    $social_protocols = array(
        'skype'
    );
    return array_merge( $protocols, $social_protocols );
}

/**
 * Callback to add Facebook Page Plugin JS
*/
function spa_and_salon_fb_page_box_cb(){
    if( is_active_widget( false, false, 'spa_and_salon_facebook_page_widget' ) ){ ?>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <?php }	
}

add_action( 'spa_and_salon_fb_page_box', 'spa_and_salon_fb_page_box_cb' );