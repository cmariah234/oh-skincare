<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Spa_and_Salon
 */

if ( ! function_exists( 'spa_and_salon_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function spa_and_salon_posted_on() {
	
    $post_meta = ( is_single() ) ? get_theme_mod( 'spa_and_salon_post_meta_single', array( 'date', 'author', 'comment' ) ) : get_theme_mod( 'spa_and_salon_post_meta_other', array( 'date', 'author', 'comment' ) );
    if( $post_meta ){
    ?>
    <div class="entry-meta">
        <?php  
            foreach( $post_meta as $meta ){
                spa_and_salon_post_meta( $meta );
            }
        ?> 
    </div>
    <?php
    }
}
endif;

if( ! function_exists( 'spa_and_salon_post_meta' ) ) :
function spa_and_salon_post_meta( $meta ){

    switch( $meta ){
        
        case 'date': //Date        
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);		
		echo sprintf(
		esc_html_x( '%s', 'post date', 'spa-and-salon-pro' ),
		'<span class="posted-on"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a></span>'
		);
        break;
        		
        case 'author': //Author        
        echo sprintf(
		esc_html_x( '%s', 'post author', 'spa-and-salon-pro' ),
		'<span class="byline" itemprop="author" itemscope itemtype="https://schema.org/Person"><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);
        break;
        
        case 'cat': //Categories        
        $categories_list = get_the_category_list( esc_html__( ', ', 'spa-and-salon-pro' ) );
        if ( $categories_list && spa_and_salon_categorized_blog() ) {
            echo '<span class="cat">' . $categories_list . '</span>'; 
        }
        break;
        
        case 'tag': //Tags        
        $tags_list = get_the_tag_list( '', esc_html__( ', ', 'spa-and-salon-pro' ) );
        if ( $tags_list ) {
            echo '<span class="tags">' . $tags_list . '</span>';
        }
        break;    
		
        case 'comment': //Comments
			if ( ! is_singular( 'page' ) && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				echo '<span class="comments-link">';
				comments_popup_link( esc_html__( 'Leave a comment', 'spa-and-salon-pro' ), esc_html__( '1 Comment', 'spa-and-salon-pro' ), esc_html__( '% Comments', 'spa-and-salon-pro' ) );
				echo '</span>';
			}		
        break;    		
    }
}
endif;

if ( ! function_exists( 'spa_and_salon_entry_categories' ) ) :
function spa_and_salon_entry_categories(){
    
    $categories_lists = get_the_category();
    
    if( $categories_lists && spa_and_salon_categorized_blog() ){
        echo '<span class="category">';
        foreach( $categories_lists as $category ){
            echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html__( '[ ', 'spa-and-salon-pro' ) . $category->name . esc_html__( ' ]', 'spa-and-salon-pro') . '</a>';
        }
        echo '</span>';
    }    
}
endif;

if ( ! function_exists( 'spa_and_salon_entry_tags' ) ) :
function spa_and_salon_entry_tags(){
    
    /* translators: used between list items, there is a space after the comma */
	$tags_list = get_the_tag_list( '', esc_html__( ', ', 'spa-and-salon-pro' ) );
	if ( $tags_list ) {
		printf( '<span class="tags">' . esc_html__( 'Tags: %1$s', 'spa-and-salon-pro' ) . '</span>', $tags_list ); // WPCS: XSS OK.
	}
}
endif;

if ( ! function_exists( 'spa_and_salon_comment_byline' ) ) :
function spa_and_salon_comment_byline(){
    
    $byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html_x( '', 'post author', 'spa-and-salon-pro' ) . esc_html( get_the_author() ) . '</a></span>';
    echo '<span class="byline"> ' . $byline . '</span>';
    
    if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo ' &sol; ';
        echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'spa-and-salon-pro' ), esc_html__( '1 Comment', 'spa-and-salon-pro' ), esc_html__( '% Comments', 'spa-and-salon-pro' ) );
		echo '</span>';
	}
}
endif;

if ( ! function_exists( 'spa_and_salon_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function spa_and_salon_entry_footer() {
	
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'spa-and-salon-pro' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function spa_and_salon_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'spa_and_salon_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'spa_and_salon_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so spa_and_salon_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so spa_and_salon_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in spa_and_salon_categorized_blog.
 */
function spa_and_salon_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'spa_and_salon_categories' );
}
add_action( 'edit_category', 'spa_and_salon_category_transient_flusher' );
add_action( 'save_post',     'spa_and_salon_category_transient_flusher' );
