<?php
/**
 * General Settings
 *
 * @package spa_and_salon
 */
 
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 */
function spa_and_salon_customize_register_general( $wp_customize ) {
    
    /* Option list of all categories */
    $args = array(
	   'type'                     => 'post',
	   'orderby'                  => 'name',
	   'order'                    => 'ASC',
	   'hide_empty'               => 1,
	   'hierarchical'             => 1,
	   'taxonomy'                 => 'category'
    ); 
    $option_categories = array();
    $category_lists = get_categories( $args );
    foreach( $category_lists as $category ){
        $option_categories[$category->term_id] = $category->name;
    }
    
    Kirki::add_config( 'spa_and_salon', array(
        'capability'    => 'edit_theme_options',
        'option_type'   => 'theme_mod',
        'disable_output'=> true,
    ) );
	
	Kirki::add_section( 'spa_and_salon_general_settings', array(
        'priority'   => 22,
        'capability' => 'edit_theme_options',
        'title'      => __( 'General Settings', 'spa-and-salon-pro' ),
    ) );
	
    /** Site Layout */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'select',
        'settings'    => 'spa_and_salon_layout_boxer',
        'label'       => __( 'Choose Layout', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_general_settings',
        'default'     => 'nochoice',
        'choices' => array(
                'nochoice' => __( 'Select Design Layout', 'spa-and-salon-pro' ),		
                'full-width' => __( 'Full Width', 'spa-and-salon-pro' ),
                'boxed' => __( 'Boxed', 'spa-and-salon-pro' ),
            )
    ) );	
    
    /** Lightbox */
    Kirki::add_field( 'spa_and_salon', array(
        'type'     => 'toggle',
        'settings' => 'spa_and_salon_ed_lightbox',
        'label'    => __( 'Enable/Disable Lightbox', 'spa-and-salon-pro' ),
        'tooltip'  => __( 'A lightbox is a stylized pop-up that allows your visitors to view larger versions of images without leaving the current page. You can enable or disable the lightbox here.', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_general_settings',
        'default'  => '0',
    ) );
	
    /** Enable/Disable Sticky Menu */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'toggle',
        'settings'    => 'spa_and_salon_ed_sticky_menu',
        'label'       => __( 'Enable/Disable Sticky Menu', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_general_settings',
        'default'     => '',
    ) );			
	        
    /** Pagination Type */
    Kirki::add_field( 'spa_and_salon', array(
        'type'     => 'radio',
        'settings' => 'spa_and_salon_pagination_type',
        'label'    => __( 'Pagination Type', 'spa-and-salon-pro' ),
        'tooltip'  => __( 'Select pagination type.', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_general_settings',
        'default'  => 'default',
        'choices'  => array(
            'default'         => __( 'Default (Next / Previous)', 'spa-and-salon-pro' ),
            'numbered'        => __( 'Numbered (1 2 3 4...)', 'spa-and-salon-pro' ),
            'load_more'       => __( 'AJAX (Load More Button)', 'spa-and-salon-pro' ),
            'infinite_scroll' => __( 'AJAX (Auto Infinite Scroll)', 'spa-and-salon-pro' ),
        )  
    ) );
    
    /** Load More Label*/
    Kirki::add_field( 'spa_and_salon', array(
        'type'     => 'text',
        'settings' => 'spa_and_salon_load_more_label',
        'label'    => __( 'Load More Label', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_general_settings',
        'default'  => __( 'Load More Posts', 'spa-and-salon-pro' ),
        'required'  => array(
            array(
                'setting'  => 'spa_and_salon_pagination_type',
                'operator' => '==',
                'value'    => 'load_more',
            )            
        )
    ) );
    
    /** Loading Label*/
    Kirki::add_field( 'spa_and_salon', array(
        'type'     => 'text',
        'settings' => 'spa_and_salon_loading_label',
        'label'    => __( 'Loading Label', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_general_settings',
        'default'  => __( 'Loading...', 'spa-and-salon-pro' ),
        'required'  => array(
            array(
                'setting'  => 'spa_and_salon_pagination_type',
                'operator' => '==',
                'value'    => 'load_more',
            )            
        )
    ) );
    
    Kirki::add_field( 'spa_and_salon', array(
        'settings'    => 'spa_and_salon_exclude_categories',
        'label'       => __( 'Exclude Categories', 'spa-and-salon-pro' ),
        'description' => __( 'Check multiple categories to exclude from blog and archive page.', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_general_settings',
        'type'        => 'multicheck',
        'choices'     => $option_categories
    ) ); 
 
}
add_action( 'init', 'spa_and_salon_customize_register_general' );