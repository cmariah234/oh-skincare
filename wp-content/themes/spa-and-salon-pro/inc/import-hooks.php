<?php
/**
 * Spa And Salon Pro Import Hooks.
 *
 * @package Spa_and_Salon 
 */
 
/** Import content data*/
if ( ! function_exists( 'spa_and_salon_pro_import_files' ) ) :
function spa_and_salon_pro_import_files() {
    return array(
        array(
            'import_file_name'             => 'Default Layout',
            'import_file_url'              => 'https://raratheme.com/wp-content/uploads/2018/06/spaandsalonpro.xml',
            'import_widget_file_url'       => 'https://raratheme.com/wp-content/uploads/2018/06/spaandsalonpro.wie',
            'import_customizer_file_url'   => 'https://raratheme.com/wp-content/uploads/2018/06/spaandsalonpro.dat',
            'import_preview_image_url'     => get_template_directory_uri() . '/screenshot.png',
            'import_notice'                => __( 'Please wait for about 10 - 15 minutes. Do not close or refresh the page until the import is complete.', 'spa-and-salon-pro' ),
        ),
    );       
}
add_filter( 'rrdi/import_files', 'spa_and_salon_pro_import_files' );
endif;

/** Programmatically set the front page and menu */
if ( ! function_exists( 'spa_and_salon_pro_after_import' ) ) :
function spa_and_salon_pro_after_import( $selected_import ) {
 
    if ( 'Default Layout' === $selected_import['import_file_name'] ) {
        //Set Menu
        $primary = get_term_by('name', 'Main Menu', 'nav_menu');
        set_theme_mod( 'nav_menu_locations' , array( 
              'primary' => $primary->term_id, 
             ) 
        );  
    }
     
    /** Set Front page */
    $page = get_page_by_path('home'); /** This need to be slug of the page that is assigned as Front page */
        if ( isset( $page->ID ) ) {
        update_option( 'page_on_front', $page->ID );
        update_option( 'show_on_front', 'page' );
    }
    
    /** Blog Page */
    $postpage = get_page_by_path('blog'); /** This need to be slug of the page that is assigned as Posts page */
    if( $postpage ){
        $post_pgid = $postpage->ID;        
        update_option( 'page_for_posts', $post_pgid );
    }
}
add_action( 'rrdi/after_import', 'spa_and_salon_pro_after_import' );
endif;

function spa_and_salon_pro_import_msg(){
    return __( 'Before you begin, make sure all the recommended plugins are activated.', 'spa-and-salon-pro' );
}
add_filter( 'rrdi_before_import_msg', 'spa_and_salon_pro_import_msg' );