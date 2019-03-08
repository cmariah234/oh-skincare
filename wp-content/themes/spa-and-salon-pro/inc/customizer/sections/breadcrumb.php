<?php
/**
 * BreadCrumb Options
 *
 * @package Spa_And_Salon
 */

function spa_and_salon_customize_register_breadcrumb( ) {

    Kirki::add_section( 'spa_and_salon_breadcrumb_settings', array(
        'priority'   => 31,
        'capability' => 'edit_theme_options',
        'title'      => __( 'BreadCrumb Settings', 'spa-and-salon-pro' ),
    ) );
    
    /** Enable/Disable BreadCrumb */
    Kirki::add_field( 'spa_and_salon', array(
        'label'     => __( 'Enable Breadcrumb', 'spa-and-salon-pro' ),
        'section'   => 'spa_and_salon_breadcrumb_settings',
        'settings'  => 'spa_and_salon_ed_breadcrumb',
        'type'      => 'toggle',
        'default'   => '',
    ) );
    
    /** Home Text */
    Kirki::add_field( 'spa_and_salon', array(
        'label'     => __( 'Breadcrumb Home Text', 'spa-and-salon-pro' ),
        'section'   => 'spa_and_salon_breadcrumb_settings',
        'settings'  => 'spa_and_salon_breadcrumb_home_text',
        'type'      => 'text',
        'default'   => __( 'Home', 'spa-and-salon-pro' ),
    ) );
    
    /** Breadcrumb Separator */
    Kirki::add_field( 'spa_and_salon', array(
        'label'     => __( 'Breadcrumb Separator', 'spa-and-salon-pro' ),
        'section'   => 'spa_and_salon_breadcrumb_settings',
        'settings'  => 'spa_and_salon_breadcrumb_separator',
        'type'      => 'text',
        'default'   => __( '>', 'spa-and-salon-pro' ),
        'sanitize_callback' => 'spa_and_salon_sanitize_text',
    ) );

}
add_action( 'init', 'spa_and_salon_customize_register_breadcrumb' );