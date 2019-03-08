<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Spa_and_Salon
 */
 
if( ! function_exists( 'spa_and_salon_slider_cb' ) ):

/**
 * Callback function for Home Page Slider
 */
function spa_and_salon_slider_cb (){
    $ed_caption    = get_theme_mod( 'spa_and_salon_slider_caption', '1' );
    $slider_readmore   = get_theme_mod( 'spa_and_salon_slider_readmore', __( 'Read More', 'spa-and-salon-pro' ) );
    $slider_type       = get_theme_mod( 'spa_and_salon_slider_type', 'post' );
    $slider_cat        = get_theme_mod( 'spa_and_salon_slider_cat' );
    $slider_post_one   = get_theme_mod( 'spa_and_salon_slider_post_one', 0 );
    $slider_post_two   = get_theme_mod( 'spa_and_salon_slider_post_two' );
    $slider_post_three = get_theme_mod( 'spa_and_salon_slider_post_three' );
    $slider_post_four  = get_theme_mod( 'spa_and_salon_slider_post_four' );
    $slider_post_five  = get_theme_mod( 'spa_and_salon_slider_post_five' );
    $slider_slides     = get_theme_mod( 'spa_and_salon_slider_slides' );
    $slider_full_size  = get_theme_mod( 'spa_and_salon_slider_size' );	
	
    $read_more   = get_theme_mod( 'spa_and_salon_read_more', __( 'Read Post', 'spa-and-salon-pro' ) );
    $sticky_post = get_option( 'sticky_posts' ); //get all sticky posts	

    $slider_posts = array( $slider_post_one, $slider_post_two, $slider_post_three, $slider_post_four, $slider_post_five );
	$slider_posts = array_diff( array_unique( $slider_posts ), array('') );
	
    if( $slider_full_size ){
        $img_size = 'full';
    }else{
        $img_size = 'spa-and-salon-slider';
    }	

    if( $slider_type == 'post' || $slider_type == 'cat' ){

        if( ( $slider_type == 'cat' ) && $slider_cat ){
            $qry = new WP_Query( array(
                'post_type'           => 'post',
                'post_status'         => 'publish',
                'posts_per_page'      => -1,
                'cat'                 => $slider_cat,
                'order'               => 'ASC',
                'ignore_sticky_posts' => true
            ));
            if( $qry->have_posts() ){ ?>
            	<div class="banner">
            		<div id="banner-slider" class="banner-carousel owl-carousel owl-theme">		
                        <?php
                        while( $qry->have_posts()){
                            $qry->the_post();                 
                            if( has_post_thumbnail() ){
            					?>
                                <div>
            						<?php the_post_thumbnail( $img_size, array( 'itemprop' => 'image' ) );?>                        
            						<?php if( $ed_caption ){ ?>                        
                                    <div class="banner-text">
                                        <div class="container">
                                            <div class="text">
                                                <strong class="title"><?php the_title(); ?></strong>
                                                <?php 
                                                    the_excerpt();

                                                    if( $slider_readmore ){ ?>
                                                        <a href="<?php the_permalink(); ?>" class="btn-green"><?php echo esc_html( $slider_readmore ); ?></a>
                                                    <?php 
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
            	                    <?php }?>                        
                                </div>                
                        <?php 
                            }
                        }
                        wp_reset_postdata();
                        ?>
            		</div>
            	</div>             
            <?php
            }
        }

        if( ( $slider_type == 'post' ) && $slider_posts ){
            $qry = new WP_Query( array(
                'post_type'           => array( 'post', 'page' ),
                'post_status'         => 'publish',
                'post__in'            => $slider_posts,
                'orderby'             => 'post__in',
                'posts_per_page'      => -1,
                'ignore_sticky_posts' => true
            ));
            if( $qry->have_posts() ){ ?>
            	<div class="banner">
            		<div id="banner-slider" class="banner-carousel owl-carousel owl-theme">	
                        <?php
                        while( $qry->have_posts()){
                            $qry->the_post();                 
                            if( has_post_thumbnail() ){
            					?>
                                <div>
            						<?php the_post_thumbnail( $img_size, array( 'itemprop' => 'image' ) );?>                        
            						<?php if( $ed_caption ){ ?>                        
                                    <div class="banner-text">
                                        <div class="container">
                                            <div class="text">
                                                <strong class="title"><?php the_title(); ?></strong>
                                                <?php 
                                                    the_excerpt();

                                                    if( $slider_readmore ){ ?>
                                                        <a href="<?php the_permalink(); ?>" class="btn-green"><?php echo esc_html( $slider_readmore ); ?></a>
                                                    <?php 
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
            	                    <?php }?>                        
                                </div>                                            
                        <?php 
                            }
                        }
                        wp_reset_postdata();
                        ?>
            		</div>
            	</div>     
            <?php
            }
        }

    }elseif( $slider_type == 'custom' && $slider_slides ){ ?>
	<div class="banner">
		<div id="banner-slider" class="banner-carousel owl-carousel owl-theme">	
            <?php
            foreach( $slider_slides as $slides ){
                if( $slides['thumbnail'] ){
                    $image = wp_get_attachment_image_src( $slides['thumbnail'], $img_size );
                    if( $image ){
                    ?>

                    <div>						
						<img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php esc_attr( $slides['title'] ); ?>" />                                            
	       				<?php if( $ed_caption && ( $slides['title'] || $slides['content'] || ( $slides['link'] && $slider_readmore ) ) ){ ?>                                                        
                        <div class="banner-text">
                            <div class="container">
                                <div class="text">
	                                <?php if( $slides['title'] ) echo '<strong class="title">' . esc_html( $slides['title'] ) . '</strong>'; ?>									
                                    <?php echo wpautop( wp_kses_post( $slides['desc'] ) ); ?>

                                    <?php if( $slides['link'] && $slider_readmore ){ ?>
                                        <a href="<?php echo esc_url( $slides['link'] ); ?>" class="btn-green"><?php echo esc_html( $slider_readmore ); ?></a>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
	                    <?php }?>                        
                    </div>                  
                    
                    <?php
                    }
                }
            }
            ?>
		</div>
	</div>
        <?php
    }

}

endif;
add_action( 'spa_and_salon_slider', 'spa_and_salon_slider_cb' ); 


/* Homepage Instagram Feed 

* https://gist.github.com/cosmocatalano/4544576
* returns a big old hunk of JSON from a non-private IG account page.

*/
if( ! function_exists( 'spa_and_salon_scrape_insta_home' ) ):

function spa_and_salon_scrape_insta_home($username) {
    $insta_source = file_get_contents('https://instagram.com/'.$username);
    $shards       = explode('window._sharedData = ', $insta_source);
    $insta_json   = explode(';</script>', $shards[1]); 
    $insta_array  = json_decode($insta_json[0], TRUE);
	return $insta_array;
}

endif;

/**
 * Function to populate list of social Icons
*/
function spa_and_salon_social_icons(){
    $social_icons = array();

    $social_icons['dribbble']      = __( 'Dribbble', 'spa-and-salon-pro' );
    $social_icons['facebook']      = __( 'Facebook', 'spa-and-salon-pro' );
    $social_icons['foursquare']    = __( 'Foursquare', 'spa-and-salon-pro' );
    $social_icons['flickr']        = __( 'Flickr', 'spa-and-salon-pro' );
    $social_icons['google-plus']   = __( 'Google Plus', 'spa-and-salon-pro' );
    $social_icons['instagram']     = __( 'Instagram', 'spa-and-salon-pro' );
    $social_icons['linkedin']      = __( 'LinkedIn', 'spa-and-salon-pro' );
    $social_icons['pinterest']     = __( 'Pinterest', 'spa-and-salon-pro' );
    $social_icons['reddit']        = __( 'Reddit', 'spa-and-salon-pro' );
    $social_icons['skype']         = __( 'Skype', 'spa-and-salon-pro' );
    $social_icons['stumbleupon']   = __( 'StumbleUpon', 'spa-and-salon-pro' );
    $social_icons['tumblr']        = __( 'Tumblr', 'spa-and-salon-pro' );
    $social_icons['twitter']       = __( 'Twitter', 'spa-and-salon-pro' );
    $social_icons['vimeo']         = __( 'Vimeo', 'spa-and-salon-pro' );
    $social_icons['youtube']       = __( 'YouTube', 'spa-and-salon-pro' );
    $social_icons['odnoklassniki'] = __( 'OK', 'spa-and-salon-pro' );
    $social_icons['vk']            = __( 'VK', 'spa-and-salon-pro' );
    $social_icons['xing']          = __( 'Xing', 'spa-and-salon-pro' );
    
    return $social_icons;
}

/**
* Callback for Social Links
*/
function spa_and_salon_social_cb(){
    $social_icons = get_theme_mod( 'spa_and_salon_social', array(
    		array(
    			'icon' => 'facebook',
    			'link' => 'https://facebook.com',
    		),
    		array(
    			'icon' => 'twitter',
    			'link' => 'https://twitter.com',
    		),
        ) );

    if( $social_icons ){
    ?>
    <ul class="social-networks">
		<?php
        foreach( $social_icons as $socials ){
            if( $socials['link'] ){ ?>
                <li><a href="<?php echo esc_url( $socials['link'] );?>" <?php if( $socials['icon'] != 'skype' ) echo 'target="_blank"'; ?> title="<?php echo  esc_html( $socials['icon'] ); ?>"><i class="fa fa-<?php echo esc_attr( $socials['icon'] );?>"></i></a></li>
        <?php
            }
        }?>
	</ul>
    <?php
    }
}
add_action( 'spa_and_salon_social_link', 'spa_and_salon_social_cb' );

/**
 *  Custom Pagination
*/
function spa_and_salon_pagination(){
    $pagination = get_theme_mod( 'spa_and_salon_pagination_type', 'default' );
    
    switch( $pagination ){
        case 'default': // Default Pagination
        
        the_posts_navigation();
        
        break;
        
        case 'numbered': // Numbered Pagination
        
        the_posts_pagination( array(
            'prev_text'          => __( 'Previous', 'spa-and-salon-pro' ),
            'next_text'          => __( 'Next', 'spa-and-salon-pro' ),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'spa-and-salon-pro' ) . ' </span>',
         ) );
        
        break;
        
        case 'load_more': // Load More Button
        case 'infinite_scroll': // Auto Infinite Scroll
        
        echo '<div class="pagination"></div>';
        
        break;
        
        default:
        
        the_posts_navigation();
        
        break;
    }   
} 

if( ! function_exists( 'spa_and_salon_excerpt' ) ) :
/**
 * spa_and_salon_excerpt can truncate a string up to a number of characters while preserving whole words and HTML tags
 *
 * @param string $text String to truncate.
 * @param integer $length Length of returned string, including ellipsis.
 * @param string $ending Ending to be appended to the trimmed string.
 * @param boolean $exact If false, $text will not be cut mid-word
 * @param boolean $considerHtml If true, HTML tags would be handled correctly
 *
 * @return string Trimmed string.
 * 
 * @link http://alanwhipple.com/2011/05/25/php-truncate-string-preserving-html-tags-words/
 */
function spa_and_salon_excerpt($text, $length = 100, $ending = '...', $exact = false, $considerHtml = true) {
    $text = strip_shortcodes( $text );
    $text = spa_and_salon_strip_single( 'img', $text );
    $text = spa_and_salon_strip_single( 'a', $text );
    
    if ($considerHtml) {
        // if the plain text is shorter than the maximum length, return the whole text
        if (strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
            return $text;
        }
        // splits all html-tags to scanable lines
        preg_match_all('/(<.+?>)?([^<>]*)/s', $text, $lines, PREG_SET_ORDER);
        $total_length = strlen($ending);
        $open_tags = array();
        $truncate = '';
        foreach ($lines as $line_matchings) {
            // if there is any html-tag in this line, handle it and add it (uncounted) to the output
            if (!empty($line_matchings[1])) {
                // if it's an "empty element" with or without xhtml-conform closing slash
                if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $line_matchings[1])) {
                    // do nothing
                // if tag is a closing tag
                } else if (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $line_matchings[1], $tag_matchings)) {
                    // delete tag from $open_tags list
                    $pos = array_search($tag_matchings[1], $open_tags);
                    if ($pos !== false) {
                    unset($open_tags[$pos]);
                    }
                // if tag is an opening tag
                } else if (preg_match('/^<\s*([^\s>!]+).*?>$/s', $line_matchings[1], $tag_matchings)) {
                    // add tag to the beginning of $open_tags list
                    array_unshift($open_tags, strtolower($tag_matchings[1]));
                }
                // add html-tag to $truncate'd text
                $truncate .= $line_matchings[1];
            }
            // calculate the length of the plain text part of the line; handle entities as one character
            $content_length = strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', ' ', $line_matchings[2]));
            if ($total_length+$content_length> $length) {
                // the number of characters which are left
                $left = $length - $total_length;
                $entities_length = 0;
                // search for html entities
                if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', $line_matchings[2], $entities, PREG_OFFSET_CAPTURE)) {
                    // calculate the real length of all entities in the legal range
                    foreach ($entities[0] as $entity) {
                        if ($entity[1]+1-$entities_length <= $left) {
                            $left--;
                            $entities_length += strlen($entity[0]);
                        } else {
                            // no more characters left
                            break;
                        }
                    }
                }
                $truncate .= substr($line_matchings[2], 0, $left+$entities_length);
                // maximum lenght is reached, so get off the loop
                break;
            } else {
                $truncate .= $line_matchings[2];
                $total_length += $content_length;
            }
            // if the maximum length is reached, get off the loop
            if($total_length>= $length) {
                break;
            }
        }
    } else {
        if (strlen($text) <= $length) {
            return $text;
        } else {
            $truncate = substr($text, 0, $length - strlen($ending));
        }
    }
    // if the words shouldn't be cut in the middle...
    if (!$exact) {
        // ...search the last occurance of a space...
        $spacepos = strrpos($truncate, ' ');
        if (isset($spacepos)) {
            // ...and cut the text in this position
            $truncate = substr($truncate, 0, $spacepos);
        }
    }
    // add the defined ending to the text
    $truncate .= $ending;
    if($considerHtml) {
        // close all unclosed html-tags
        foreach ($open_tags as $tag) {
            $truncate .= '</' . $tag . '>';
        }
    }
    return $truncate;
}
endif; // End function_exists 


/**
 * Function to get the post view count 
 */
function spa_and_salon_get_views( $post_id ){
    $count_key = '_spa_and_salon_view_count';
    $count = get_post_meta( $post_id, $count_key, true );
    if( $count == '' ){        
        return __( "0 View", 'spa-and-salon-pro' );
    }elseif($count<=1){
        return $count. __(' View', 'spa-and-salon-pro' );
    }else{
        return $count. __(' Views', 'spa-and-salon-pro' );    
    }    
}

/**
 * Function to add the post view count 
 */
function spa_and_salon_set_views( $post_id ) {
    $count_key = '_spa_and_salon_view_count';
    $count = get_post_meta( $post_id, $count_key, true );
    if( $count == '' ){
        $count = 0;
        delete_post_meta( $post_id, $count_key );
        add_post_meta( $post_id, $count_key, '1' );
    }else{
        $count++;
        update_post_meta( $post_id, $count_key, $count );
    }
} 

if( ! function_exists( 'spa_and_salon_exclude_cat' ) ) :
/**
 * Exclude post with Category from blog and archive page. 
*/
function spa_and_salon_exclude_cat( $query ){
    $cat = get_theme_mod( 'spa_and_salon_exclude_categories' );
    
    if( $cat && ! is_admin() && $query->is_main_query() ){
        $cat = array_diff( array_unique( $cat ), array('') );
        if( $query->is_home() || $query->is_archive() ) {
			$query->set( 'category__not_in', $cat );
		}
    }    
}
endif;
add_filter( 'pre_get_posts', 'spa_and_salon_exclude_cat' );

if( ! function_exists( 'spa_and_salon_custom_category_widget' ) ) :
/** 
 * Exclude Categories from Category Widget 
*/ 
function spa_and_salon_custom_category_widget( $arg ) {
	$cat = get_theme_mod( 'spa_and_salon_exclude_categories' );
    
    if( $cat ){
        $cat = array_diff( array_unique( $cat ), array('') );
        $arg["exclude"] = $cat;
    }
	return $arg;
}
endif;
add_filter( "widget_categories_args", "spa_and_salon_custom_category_widget" );
add_filter( "widget_categories_dropdown_args", "spa_and_salon_custom_category_widget" );

if( ! function_exists( 'spa_and_salon_exclude_posts_from_recentPostWidget_by_cat' ) ) :
/**
 * Exclude post from recent post widget of excluded catergory
 * 
 * @link http://blog.grokdd.com/exclude-recent-posts-by-category/
*/
function spa_and_salon_exclude_posts_from_recentPostWidget_by_cat( $arg ){
    
    $cat = get_theme_mod( 'spa_and_salon_exclude_categories' );
   
    if( $cat ){
        $cat = array_diff( array_unique( $cat ), array('') );
        $arg["category__not_in"] = $cat;
    }
    
    return $arg;   
}
endif;
add_filter( "widget_posts_args", "spa_and_salon_exclude_posts_from_recentPostWidget_by_cat" );


if( ! function_exists( 'spa_and_salon_page_attribute_post' ) ):
/**
 * Add Page attribute in post for post ordering
*/
function spa_and_salon_page_attribute_post(){
    $cpts = array( 'spa_testimonials', 'spa_team' );
    foreach ($cpts as $cpt) {
       add_post_type_support( $cpt , 'page-attributes' );
    }
}
endif;
add_action( 'init', 'spa_and_salon_page_attribute_post' );

if( ! function_exists( 'spa_and_salon_columns_head' ) ) :
/**
 * Adds a `Order` column header in the item list admin page.
 *
 * @param array $defaults
 * @return array
 */
function spa_and_salon_columns_head( $defaults ){

     $post_types = array( 'spa_testimonials', 'spa_team' );
     foreach ( $post_types as $post_type ) {
         if( get_post_type() === $post_type ){
             $defaults['menu_order'] = __( 'Order', 'spa-and-salon-pro' );
        }
     }

    return $defaults;
}
endif;
add_filter( 'manage_posts_columns', 'spa_and_salon_columns_head' );

if( ! function_exists( 'spa_and_salon_columns_content' ) ) :
/**
 * @param string $column_name The name of the column to display.
 * @param int $post_ID The ID of the current post.
 */
function spa_and_salon_columns_content( $column_name, $post_ID ){
    global $post;
    
    if( $column_name == 'menu_order' ){
        echo $post->menu_order;
    } 
 
}
endif;
add_action( 'manage_posts_custom_column', 'spa_and_salon_columns_content', 10, 2 );

if( ! function_exists( 'spa_and_salon_order_column_sortable' ) ) :
/**
* make column sortable
*/
function spa_and_salon_order_column_sortable( $columns ){
    $columns['menu_order'] = 'menu_order';
    return $columns;
}
endif;
add_filter( 'manage_edit-cpt_sortable_columns', 'spa_and_salon_order_column_sortable' );

if( ! function_exists( 'spa_and_salon_pro_change_comment_form_default_fields' ) ) :
/**
 * Change Comment form default fields i.e. author, email & url.
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
 */
    function spa_and_salon_pro_change_comment_form_default_fields( $fields ){
        
        // get the current commenter if available
        $commenter = wp_get_current_commenter();
     
        // core functionality
        $req = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );    
     
        // Change just the author field
        $fields['author'] = '<p class="comment-form-author"><input id="author" name="author" placeholder="' . esc_attr__( 'Name*', 'spa-and-salon-pro' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
            '" size="30"' . $aria_req . ' /></p>';
        
        $fields['email'] = '<p class="comment-form-email"><input id="email" name="email" placeholder="' . esc_attr__( 'Email*', 'spa-and-salon-pro' ) . '" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
            '" size="30"' . $aria_req . ' /></p>';
        
        $fields['url'] = '<p class="comment-form-url"><input id="url" name="url" placeholder="' . esc_attr__( 'Website', 'spa-and-salon-pro' ) . '" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
            '" size="30" /></p>'; 
        
        return $fields;
        
    }
endif;
add_filter( 'comment_form_default_fields', 'spa_and_salon_pro_change_comment_form_default_fields' );


if( ! function_exists( 'spa_and_salon_pro_change_comment_form_defaults' ) ) :
/**
 * Change Comment Form defaults
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function spa_and_salon_pro_change_comment_form_defaults( $defaults ){
    
    $defaults['comment_field'] = '<p class="comment-form-comment"><label for="comment">
            </label><textarea id="comment" name="comment" placeholder="' . esc_attr__( 'Comment', 'spa-and-salon-pro' ) . '" cols="45" rows="8" aria-required="true">' .
            '</textarea></p>';
    
    return $defaults;
    
}
endif;
add_filter( 'comment_form_defaults', 'spa_and_salon_pro_change_comment_form_defaults' );

if( ! function_exists( 'spa_and_salon_pro_single_post_schema' ) ) :
/**
 * Single Post Schema
 *
 * @return string
 */
function spa_and_salon_pro_single_post_schema() {
    if ( is_singular( 'post' ) ) {
        global $post;
        $custom_logo_id = get_theme_mod( 'custom_logo' );

        $site_logo   = wp_get_attachment_image_src( $custom_logo_id , 'spa-and-salon-schema' );
        $images      = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
        $excerpt     = spa_and_salon_pro_escape_text_tags( $post->post_excerpt );
        $content     = $excerpt === "" ? mb_substr( spa_and_salon_pro_escape_text_tags( $post->post_content ), 0, 110 ) : $excerpt;
        $schema_type = ! empty( $custom_logo_id ) && has_post_thumbnail( $post->ID ) ? "BlogPosting" : "Blog";

        $args = array(
            "@context"  => "http://schema.org",
            "@type"     => $schema_type,
            "mainEntityOfPage" => array(
                "@type" => "WebPage",
                "@id"   => get_permalink( $post->ID )
            ),
            "headline"  => get_the_title( $post->ID ),
            "image"     => array(
                "@type"  => "ImageObject",
                "url"    => $images[0],
                "width"  => $images[1],
                "height" => $images[2]
            ),
            "datePublished" => get_the_time( DATE_ISO8601, $post->ID ),
            "dateModified"  => get_post_modified_time(  DATE_ISO8601, __return_false(), $post->ID ),
            "author"        => array(
                "@type"     => "Person",
                "name"      => spa_and_salon_pro_escape_text_tags( get_the_author_meta( 'display_name', $post->post_author ) )
            ),
            "publisher" => array(
                "@type"       => "Organization",
                "name"        => get_bloginfo( 'name' ),
                "description" => get_bloginfo( 'description' ),
                "logo"        => array(
                    "@type"   => "ImageObject",
                    "url"     => $site_logo[0],
                    "width"   => $site_logo[1],
                    "height"  => $site_logo[2]
                )
            ),
            "description" => ( class_exists('WPSEO_Meta') ? WPSEO_Meta::get_value( 'metadesc' ) : $content )
        );

        if ( has_post_thumbnail( $post->ID ) ) :
            $args['image'] = array(
                "@type"  => "ImageObject",
                "url"    => $images[0],
                "width"  => $images[1],
                "height" => $images[2]
            );
        endif;

        if ( ! empty( $custom_logo_id ) ) :
            $args['publisher'] = array(
                "@type"       => "Organization",
                "name"        => get_bloginfo( 'name' ),
                "description" => get_bloginfo( 'description' ),
                "logo"        => array(
                    "@type"   => "ImageObject",
                    "url"     => $site_logo[0],
                    "width"   => $site_logo[1],
                    "height"  => $site_logo[2]
                )
            );
        endif;

        echo '<script type="application/ld+json">' , PHP_EOL;
        if ( version_compare( PHP_VERSION, '5.4.0' , '>=' ) ) {
            echo wp_json_encode( $args, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) , PHP_EOL;
        } else {
            echo wp_json_encode( $args ) , PHP_EOL;
        }
        echo '</script>' , PHP_EOL;
    }
}
endif;
add_action( 'wp_head', 'spa_and_salon_pro_single_post_schema' );

if( ! function_exists( 'spa_and_salon_pro_escape_text_tags' ) ) :
/**
 * Remove new line tags from string
 *
 * @param $text
 * @return string
 */
function spa_and_salon_pro_escape_text_tags( $text ) {
    return (string) str_replace( array( "\r", "\n" ), '', strip_tags( $text ) );
}
endif;

if( ! function_exists( 'spa_and_salon_pro_filter_post_gallery' ) ) :
/**
 * Filter the output of the gallery. 
*/ 
function spa_and_salon_pro_filter_post_gallery( $output, $attr, $instance ){
    global $post, $wp_locale;

    $html5 = current_theme_supports( 'html5', 'gallery' );
    $atts = shortcode_atts( array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post ? $post->ID : 0,
        'itemtag'    => $html5 ? 'figure'     : 'dl',
        'icontag'    => $html5 ? 'div'        : 'dt',
        'captiontag' => $html5 ? 'figcaption' : 'dd',
        'columns'    => 3,
        'size'       => 'thumbnail',
        'include'    => '',
        'exclude'    => '',
        'link'       => ''
    ), $attr, 'gallery' );
    
    $id = intval( $atts['id'] );
    
    if ( ! empty( $atts['include'] ) ) {
        $_attachments = get_posts( array( 'include' => $atts['include'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
    
        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( ! empty( $atts['exclude'] ) ) {
        $attachments = get_children( array( 'post_parent' => $id, 'exclude' => $atts['exclude'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
    } else {
        $attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
    }
    
    if ( empty( $attachments ) ) {
        return '';
    }
    
    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment ) {
            $output .= wp_get_attachment_link( $att_id, $atts['size'], true ) . "\n";
        }
        return $output;
    }
    
    $itemtag = tag_escape( $atts['itemtag'] );
    $captiontag = tag_escape( $atts['captiontag'] );
    $icontag = tag_escape( $atts['icontag'] );
    $valid_tags = wp_kses_allowed_html( 'post' );
    if ( ! isset( $valid_tags[ $itemtag ] ) ) {
        $itemtag = 'dl';
    }
    if ( ! isset( $valid_tags[ $captiontag ] ) ) {
        $captiontag = 'dd';
    }
    if ( ! isset( $valid_tags[ $icontag ] ) ) {
        $icontag = 'dt';
    }
    
    $columns = intval( $atts['columns'] );
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';
    
    $selector = "gallery-{$instance}";
    
    $gallery_style = '';
    
    /**
     * Filter whether to print default gallery styles.
     *
     * @since 3.1.0
     *
     * @param bool $print Whether to print default gallery styles.
     *                    Defaults to false if the theme supports HTML5 galleries.
     *                    Otherwise, defaults to true.
     */
    if ( apply_filters( 'use_default_gallery_style', ! $html5 ) ) {
        $gallery_style = "
        <style type='text/css'>
            #{$selector} {
                margin: auto;
            }
            #{$selector} .gallery-item {
                float: {$float};
                margin-top: 10px;
                text-align: center;
                width: {$itemwidth}%;
            }
            #{$selector} img {
                border: 2px solid #cfcfcf;
            }
            #{$selector} .gallery-caption {
                margin-left: 0;
            }
            /* see gallery_shortcode() in wp-includes/media.php */
        </style>\n\t\t";
    }
    
    $size_class = sanitize_html_class( $atts['size'] );
    $gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
    
    /**
     * Filter the default gallery shortcode CSS styles.
     *
     * @since 2.5.0
     *
     * @param string $gallery_style Default CSS styles and opening HTML div container
     *                              for the gallery shortcode output.
     */
    $output = apply_filters( 'gallery_style', $gallery_style . $gallery_div );
    
    $i = 0; 
    foreach ( $attachments as $id => $attachment ) {
            
        $attr = ( trim( $attachment->post_excerpt ) ) ? array( 'aria-describedby' => "$selector-$id" ) : '';
        if ( ! empty( $atts['link'] ) && 'file' === $atts['link'] ) {
            //$image_output = wp_get_attachment_link( $id, $atts['size'], false, false, false, $attr ); // for attachment url 
            $image_output = "<a href='" . wp_get_attachment_url( $id ) . "' data-fancybox='group{$columns}' data-caption='" . esc_attr( $attachment->post_excerpt ) . "'>";
            $image_output .= wp_get_attachment_image( $id, $atts['size'], false, $attr );
            $image_output .= "</a>";
        } elseif ( ! empty( $atts['link'] ) && 'none' === $atts['link'] ) {
            $image_output = wp_get_attachment_image( $id, $atts['size'], false, $attr );
        } else {
            $image_output = wp_get_attachment_link( $id, $atts['size'], true, false, false, $attr ); //for attachment page
        }
        $image_meta  = wp_get_attachment_metadata( $id );
    
        $orientation = '';
        if ( isset( $image_meta['height'], $image_meta['width'] ) ) {
            $orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';
        }
        $output .= "<{$itemtag} class='gallery-item'>";
        $output .= "
            <{$icontag} class='gallery-icon {$orientation}'>
                $image_output
            </{$icontag}>";
        if ( $captiontag && trim($attachment->post_excerpt) ) {
            $output .= "
                <{$captiontag} class='wp-caption-text gallery-caption' id='$selector-$id'>
                " . wptexturize($attachment->post_excerpt) . "
                </{$captiontag}>";
        }
        $output .= "</{$itemtag}>";
        if ( ! $html5 && $columns > 0 && ++$i % $columns == 0 ) {
            $output .= '<br style="clear: both" />';
        }
    }
    
    if ( ! $html5 && $columns > 0 && $i % $columns !== 0 ) {
        $output .= "
            <br style='clear: both' />";
    }
    
    $output .= "
        </div>\n";
    
    return $output;
}
endif;
add_filter( 'post_gallery', 'spa_and_salon_pro_filter_post_gallery', 10, 3 );