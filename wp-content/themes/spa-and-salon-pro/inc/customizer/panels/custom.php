<?php
/**
 * Custom Code Settings
 *
 * @package spa_and_salon
 */

function spa_and_salon_customize_register_custom_panel( ) {
    
    if ( version_compare( $GLOBALS['wp_version'], '4.7', '>=' ) ) {
    
        Kirki::add_panel( 'spa_and_salon_custom_code_panel', array(
            'title' => __( 'Custom Codes', 'spa-and-salon-pro' ),
            'priority' => 130,
            'capability' => 'edit_theme_options',
        ) );
        
        Kirki::add_section( 'spa_and_salon_custom_code_settings', array(
            'title' => __( 'Custom Codes', 'spa-and-salon-pro' ),
            'priority' => 10,
            'capability' => 'edit_theme_options',
            'panel' => 'spa_and_salon_custom_code_panel'
        ) );
        
        /** Custom Script */
        Kirki::add_field( 'spa_and_salon', array(
            'type'     => 'code',
            'settings' => 'spa_and_salon_custom_script',
            'label'    => __( 'Custom Script', 'spa-and-salon-pro' ),
            'tooltip'  => __( 'Put the script like anlytics or any other here.', 'spa-and-salon-pro' ),
            'section'  => 'spa_and_salon_custom_code_settings',
            'choices'  => array(
                'language' => 'javascript',
                'theme'    => 'monokai',
                'height'   => 250,
            ),
        ) );
        
    }
    
}
add_action( 'init', 'spa_and_salon_customize_register_custom_panel' );