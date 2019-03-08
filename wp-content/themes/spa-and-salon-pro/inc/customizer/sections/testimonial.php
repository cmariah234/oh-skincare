<?php
/**
 * Testimonial Options
 *
 * @package Spa_And_Aalon
 */

function spa_and_salon_customize_register_testimonial_order( ) {

    Kirki::add_section( 'spa_and_salon_testimonial_page_setting', array(
        'title'      => __( 'Testimonial Settings', 'spa-and-salon-pro' ),
        'priority'   => 25,
    ) );
   
    /** Testimonial Order */
    Kirki::add_field( 'spa_and_salon', array(
        'type'     => 'radio',
        'settings' => 'spa_and_salon_testimonial_order',
        'label'    => __( 'Testimonial Order', 'spa-and-salon-pro' ),
        'tooltip'  => __( 'Choose testimonial order for testimonial page.', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_testimonial_page_setting',
        'default'  => 'date',
        'choices'  => array(
            'date'       => __( 'Post Date', 'spa-and-salon-pro' ),
            'menu_order' => __( 'Menu Order', 'spa-and-salon-pro' ),
        )  
    ) );
    
}
add_action( 'init', 'spa_and_salon_customize_register_testimonial_order' );