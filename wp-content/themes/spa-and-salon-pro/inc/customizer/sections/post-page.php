<?php
/**
 * Post Page Options
 *
 * @package Benevolent
 */

function spa_and_salon_customize_register_postpage( ) {

    Kirki::add_section( 'spa_and_salon_post_page_settings', array(
        'priority'   => 28,
        'capability' => 'edit_theme_options',
        'title'      => __( 'Post Page Settings', 'spa-and-salon-pro' ),
    ) );
    
    /** Featured Image */
    Kirki::add_field( 'spa_and_salon', array(
        'label'     => __( 'Show Featured Image', 'spa-and-salon-pro' ),
        'section'   => 'spa_and_salon_post_page_settings',
        'settings'  => 'spa_and_salon_ed_featured_image',
        'type'      => 'toggle',
        'default'   => '1',
    ) );
	
    /** Related Posts */
    Kirki::add_field( 'spa_and_salon', array(
        'label'     => __( 'Show Related Posts', 'spa-and-salon-pro' ),
        'section'   => 'spa_and_salon_post_page_settings',
        'settings'  => 'spa_and_salon_ed_related_post',
        'type'      => 'toggle',
        'default'   => '1',
    ) );	
	
    /** Author Bio */
    Kirki::add_field( 'spa_and_salon', array(
        'label'     => __( 'Show Author Bio', 'spa-and-salon-pro' ),
        'section'   => 'spa_and_salon_post_page_settings',
        'settings'  => 'spa_and_salon_ed_bio',
        'type'      => 'toggle',
        'default'   => '1',
    ) );		
    
    /** Comments */
    Kirki::add_field( 'spa_and_salon', array(
        'label'     => __( 'Show Comments', 'spa-and-salon-pro' ),
        'section'   => 'spa_and_salon_post_page_settings',
        'settings'  => 'spa_and_salon_ed_comments',
        'type'      => 'toggle',
        'default'   => '1',
    ) );
    
    /** Highlight Author Comment */
    Kirki::add_field( 'spa_and_salon', array(
        'label'     => __( 'Highlight Author Comment', 'spa-and-salon-pro' ),
        'section'   => 'spa_and_salon_post_page_settings',
        'settings'  => 'spa_and_salon_ed_auth_comments',
        'type'      => 'toggle',
        'default'   => '',
    ) ); 
	
    /** Before Post Widget */
    Kirki::add_field( 'spa_and_salon', array(
        'label'    => __( 'Before Post Widget', 'spa-and-salon-pro' ),
        'tooltip'  => __( 'Add Sidebar from Sidebar Settings', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_post_page_settings',
        'settings' => 'spa_and_salon_before_post_widget',
        'type'     => 'select',
        'default'  => 'no-sidebar',
        'choices'  => spa_and_salon_get_dynamnic_sidebar( true ),
    ) );
    
    /** After Post Widget */
    Kirki::add_field( 'spa_and_salon', array(
        'label'    => __( 'After Post Widget', 'spa-and-salon-pro' ),
        'tooltip'  => __( 'Add Sidebar from Sidebar Settings', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_post_page_settings',
        'settings' => 'spa_and_salon_after_post_widget',
        'type'     => 'select',
        'default'  => 'no-sidebar',
        'choices'  => spa_and_salon_get_dynamnic_sidebar( true ),
    ) );
	
}
add_action( 'init', 'spa_and_salon_customize_register_postpage' );