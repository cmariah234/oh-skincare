<?php
/**
 * Team Options
 *
 * @package Spa_And_Aalon
 */

function spa_and_salon_customize_register_team_order( ) {

    Kirki::add_section( 'spa_and_salon_team_page_setting', array(
        'title'      => __( 'Team Settings', 'spa-and-salon-pro' ),
        'priority'   => 26,
    ) );
   
    /** Testimonial Order */
    Kirki::add_field( 'spa_and_salon', array(
        'type'     => 'radio',
        'settings' => 'spa_and_salon_team_order',
        'label'    => __( 'Team Order', 'spa-and-salon-pro' ),
        'tooltip'  => __( 'Choose team order for team page.', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_team_page_setting',
        'default'  => 'date',
        'choices'  => array(
            'date'       => __( 'Post Date', 'spa-and-salon-pro' ),
            'menu_order' => __( 'Menu Order', 'spa-and-salon-pro' ),
        )  
    ) );

}
add_action( 'init', 'spa_and_salon_customize_register_team_order' );