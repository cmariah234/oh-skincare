<?php
/**
 * Performance Settings
 *
 * @package Spa_And_Salon_Pro
 */

function spa_and_salon_pro_customize_register_general_performance() {
     

    /** Performance Settings */
    Kirki::add_section( 'spa_and_salon_pro_performance_settings', array(
        'title' => __( 'Performance Settings', 'spa-and-salon-pro' ),
        'priority' => 70,
        'capability' => 'edit_theme_options',
    ) );
    
    /** Lazy Load */
    Kirki::add_field( 'spa_and_salon_pro', array(
        'label'     => __( 'Lazy Load', 'spa-and-salon-pro' ),
        'description'   => __( 'Enable lazy loading of featured images.', 'spa-and-salon-pro' ),
        'section'   => 'spa_and_salon_pro_performance_settings',
        'settings'  => 'ed_lazy_load',
        'type'      => 'toggle',
        'default'   => '0',
    ) );

    /** Lazy Load Content Images */
    Kirki::add_field( 'spa_and_salon_pro', array(
        'label'     => __( 'Lazy Load Content Images', 'spa-and-salon-pro' ),
        'description'   => __( 'Enable lazy loading of images inside page/post content.', 'spa-and-salon-pro' ),
        'section'   => 'spa_and_salon_pro_performance_settings',
        'settings'  => 'ed_lazy_load_cimage',
        'type'      => 'toggle',
        'default'   => '0',
    ) );

    /** Defer JavaScript */
    Kirki::add_field( 'spa_and_salon_pro', array(
        'label'     => __( 'Defer JavaScript', 'spa-and-salon-pro' ),
        'description'   => __( 'Adds "defer" attribute to sript tags to improve page download speed.', 'spa-and-salon-pro' ),
        'section'   => 'spa_and_salon_pro_performance_settings',
        'settings'  => 'ed_defer',
        'type'      => 'toggle',
        'default'   => '0',
    ) );

    /** Remove ver parameters */
    Kirki::add_field( 'spa_and_salon_pro', array(
        'label'     => __( 'Remove ver parameters', 'spa-and-salon-pro' ),
        'description'   => __( 'Enable to remove "ver" parameter from CSS and JS file calls.', 'spa-and-salon-pro' ),
        'section'   => 'spa_and_salon_pro_performance_settings',
        'settings'  => 'ed_ver',
        'type'      => 'toggle',
        'default'   => '0',
    ) );
}
add_action( 'init', 'spa_and_salon_pro_customize_register_general_performance' );