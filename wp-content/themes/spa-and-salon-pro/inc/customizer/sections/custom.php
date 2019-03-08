<?php
/**
 * Custom Code Settings
 *
 * @package spa_and_salon
 */

function spa_and_salon_customize_register_custom( ) {
    
    if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
        
        /** Custom Codes */
        Kirki::add_section( 'spa_and_salon_custom_code_settings', array(
            'title' => __( 'Custom Codes', 'spa-and-salon-pro' ),
            'priority' => 130,
            'capability' => 'edit_theme_options',
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
        
        /** Custom CSS */
        Kirki::add_field( 'spa_and_salon', array(
            'type'     => 'code',
            'settings' => 'spa_and_salon_custom_css',
            'label'    => __( 'Custom CSS', 'spa-and-salon-pro' ),
            'tooltip'  => __( 'Put your custom css here.', 'spa-and-salon-pro' ),
            'section'  => 'spa_and_salon_custom_code_settings',
            'choices'  => array(
                'language' => 'css',
                'theme'    => 'monokai',
                'height'   => 250,
            ),
        ) );
        /** Custom Codes Ends */
        
    }
}
add_action( 'init', 'spa_and_salon_customize_register_custom' );