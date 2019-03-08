<?php
/**
 * Contact Options
 *
 * @package Spa_And_Aalon
 */

function spa_and_salon_customize_register_contact( ) {

    Kirki::add_section( 'spa_and_salon_contact_panel', array(
        'priority'   => 24,
        'capability' => 'edit_theme_options',
        'title'      => __( 'Contact Settings', 'spa-and-salon-pro' ),
    ) );

    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'textarea',
        'settings'    => 'spa_and_salon_map_code',
        'label'       => __( 'Enter Google Map Iframe code', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_contact_panel',
        'default'     => '',
        'sanitize_callback' => 'spa_and_salon_sanitize_iframe'		
    ) );		
	

    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'text',
        'settings'    => 'spa_and_salon_contact_phone',
        'label'       => __( 'Enter Phone', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_contact_panel',
        'default'     => '',
    ) );

    Kirki::add_field( 'spa_and_salon', array(
        'type'     => 'toggle',
        'settings' => 'spa_and_salon_contact_phone_on_header',
        'label'    => __( 'Phone number in header', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_contact_panel',
        'tooltip'  => __( 'Disable to hide phone number on header', 'spa-and-salon-pro' ),
        'default'  => '1',
    ) );    	
	
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'text',
        'settings'    => 'spa_and_salon_contact_email',
        'label'       => __( 'Enter Email Address', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_contact_panel',
        'default'     => '',
    ) );			
    
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'text',
        'settings'    => 'spa_and_salon_contact_address_label',
        'label'       => __( 'Enter Address Label', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_contact_panel',
        'default'     => '',
    ) );	

    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'textarea',
        'settings'    => 'spa_and_salon_contact_address',
        'label'       => __( 'Enter Address', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_contact_panel',
        'default'     => '',
    ) );	
	
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'text',
        'settings'    => 'spa_and_salon_contact_hours_label',
        'label'       => __( 'Enter Working Hours Label', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_contact_panel',
        'default'     => '',
    ) );		
	
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'textarea',
        'settings'    => 'spa_and_salon_contact_hours',
        'label'       => __( 'Enter Working Hours', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_contact_panel',
        'default'     => '',
    ) );					
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'text',
        'settings'    => 'spa_and_salon_contact_title',
        'label'       => __( 'Enter Contact Form Title', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_contact_panel',
        'default'     => '',
    ) );		
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'textarea',
        'settings'    => 'spa_and_salon_contact_desc',
        'label'       => __( 'Enter Contact Form Description', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_contact_panel',
        'default'     => '',
    ) );			
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'text',
        'settings'    => 'spa_and_salon_contact_code',
        'label'       => __( 'Enter Contact Form Shortcode', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_contact_panel',
        'default'     => '',
        'sanitize_callback' => 'spa_and_salon_sanitize_iframe'		
    ) );		
    /** Homepage Contact Section Ends */       	
    

}
add_action( 'init', 'spa_and_salon_customize_register_contact' );