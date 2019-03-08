<?php
/**
 * Sidebar Settings
 *
 * @package spa_and_salon
 */
 
function spa_and_salon_customize_register_sidebar( ) {
    
    /** Sidebar Settings */
    Kirki::add_section( 'spa_and_salon_sidebar_settings', array(
        'title' => __( 'Sidebar Settings', 'spa-and-salon-pro' ),
        'priority' => 31,
        'capability' => 'edit_theme_options',
        'description' => __( 'Add custom sidebars. You need to save the changes and reload the customizer to use the sidebars in the dropdowns below.
You can add content to the sidebars in Appearance / Widgets.', 'spa-and-salon-pro' ),
    ) );
    
    /** Custom Sidebars */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'repeater',
        'settings'    => 'spa_and_salon_sidebar',
        'label'       => __( 'Add Sidebar', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_sidebar_settings',
        'default'     => '',
        'fields'     => array(
            'name'     => array(
                'type'  => 'text',
                'label' => __( 'Name', 'spa-and-salon-pro' ),
                'description'  => __( 'Example: Homepage Sidebar', 'spa-and-salon-pro' ),
            ),
            'id'     => array(
                'type'  => 'text',
                'label' => __( 'ID', 'spa-and-salon-pro' ),
                'description'  => __( 'Enter a unique ID for the sidebar. Use only alphanumeric characters, underscores (_) and dashes (-), eg. "sidebar-home"', 'spa-and-salon-pro' ),
            )
        ),
        'row_label' => array(
            'type' => 'field',
            'value' => __( 'sidebar', 'spa-and-salon-pro' ),
            'field' => 'name'
        ),        
    ) );
    
    /** Home Page */
    Kirki::add_field( 'spa_and_salon', array(
        'type'     => 'select',
        'settings' => 'spa_and_salon_home_page_sidebar',
        'label'    => __( 'Home Page Sidebar', 'spa-and-salon-pro' ),
        'tooltip'  => __( 'Select a sidebar for the homepage.', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_sidebar_settings',
        'default'  => 'sidebar',
        'choices'  => spa_and_salon_get_dynamnic_sidebar( true, true ),
    ) );
    
    /** Single Page */
    Kirki::add_field( 'spa_and_salon', array(
        'type'     => 'select',
        'settings' => 'spa_and_salon_single_page_sidebar',
        'label'    => __( 'Single Page Sidebar', 'spa-and-salon-pro' ),
        'tooltip'  => __( 'Select a sidebar for the single pages. If a page has a custom sidebar set, it will override this.', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_sidebar_settings',
        'default'  => 'sidebar',
        'choices'  => spa_and_salon_get_dynamnic_sidebar( true, true ),
    ) );
    
    /** Single Post */
    Kirki::add_field( 'spa_and_salon', array(
        'type'     => 'select',
        'settings' => 'spa_and_salon_single_post_sidebar',
        'label'    => __( 'Single Post Sidebar', 'spa-and-salon-pro' ),
        'tooltip'  => __( 'Select a sidebar for the single posts. If a post has a custom sidebar set, it will override this.', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_sidebar_settings',
        'default'  => 'sidebar',
        'choices'  => spa_and_salon_get_dynamnic_sidebar( true, true ),
    ) );
    
    /** Archive Page */
    Kirki::add_field( 'spa_and_salon', array(
        'type'     => 'select',
        'settings' => 'spa_and_salon_archive_page_sidebar',
        'label'    => __( 'Archive Page Sidebar', 'spa-and-salon-pro' ),
        'tooltip'  => __( 'Select a sidebar for the archives. Specific archive sidebars will override this setting (see below).', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_sidebar_settings',
        'default'  => 'sidebar',
        'choices'  => spa_and_salon_get_dynamnic_sidebar( true, true ),
    ) );
    
    /** Category Archive Page */
    Kirki::add_field( 'spa_and_salon', array(
        'type'     => 'select',
        'settings' => 'spa_and_salon_cat_archive_page_sidebar',
        'label'    => __( 'Category Archive Page Sidebar', 'spa-and-salon-pro' ),
        'tooltip'  => __( 'Select a sidebar for the category archives.', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_sidebar_settings',
        'default'  => 'default-sidebar',
        'choices'  => spa_and_salon_get_dynamnic_sidebar( true, true, true ),
    ) );
    
    /** Tag Archive Page */
    Kirki::add_field( 'spa_and_salon', array(
        'type'     => 'select',
        'settings' => 'spa_and_salon_tag_archive_page_sidebar',
        'label'    => __( 'Tag Archive Page Sidebar', 'spa-and-salon-pro' ),
        'tooltip'  => __( 'Select a sidebar for the tag archives.', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_sidebar_settings',
        'default'  => 'default-sidebar',
        'choices'  => spa_and_salon_get_dynamnic_sidebar( true, true, true ),
    ) );
    
    /** Date Archive Page */
    Kirki::add_field( 'spa_and_salon', array(
        'type'     => 'select',
        'settings' => 'spa_and_salon_date_archive_page_sidebar',
        'label'    => __( 'Date Archive Page Sidebar', 'spa-and-salon-pro' ),
        'tooltip'  => __( 'Select a sidebar for the date archives.', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_sidebar_settings',
        'default'  => 'default-sidebar',
        'choices'  => spa_and_salon_get_dynamnic_sidebar( true, true, true ),
    ) );
    
    /** Author Archive Page */
    Kirki::add_field( 'spa_and_salon', array(
        'type'     => 'select',
        'settings' => 'spa_and_salon_author_archive_page_sidebar',
        'label'    => __( 'Author Archive Page Sidebar', 'spa-and-salon-pro' ),
        'tooltip'  => __( 'Select a sidebar for the author archives.', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_sidebar_settings',
        'default'  => 'default-sidebar',
        'choices'  => spa_and_salon_get_dynamnic_sidebar( true, true, true ),
    ) );
    
    /** Search Page */
    Kirki::add_field( 'spa_and_salon', array(
        'type'     => 'select',
        'settings' => 'spa_and_salon_search_page_sidebar',
        'label'    => __( 'Search Page Sidebar', 'spa-and-salon-pro' ),
        'tooltip'  => __( 'Select a sidebar for the search results.', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_sidebar_settings',
        'default'  => 'sidebar',
        'choices'  => spa_and_salon_get_dynamnic_sidebar( true, true ),
    ) );
    /** Sidebar Settings Ends */
}
add_action( 'init', 'spa_and_salon_customize_register_sidebar' );