<?php
/**
 * Post Meta Options
 *
 * @package Spa_And_Salon
 */

function spa_and_salon_customize_register_postmeta( ) {

    Kirki::add_section( 'spa_and_salon_post_meta_settings', array(
        'title' => __( 'Post Meta Settings', 'spa-and-salon-pro' ),
        'priority' => 28,
        'capability' => 'edit_theme_options',
    ));
    
    /** No. of Character */
    Kirki::add_field( 'spa_and_salon', array(
        'label'     => __( 'No. of Character of Post Excerpt', 'spa-and-salon-pro' ),
        'section'   => 'spa_and_salon_post_meta_settings',
        'settings'  => 'spa_and_salon_post_no_of_char',
        'type'      => 'slider',
        'default'   => 200,
        'choices'   => array(
            'min'   => 50,
            'max'   => 500,
            'step'  => 10
        ),
    ) );
    
    /** Read More Text */
    Kirki::add_field( 'spa_and_salon', array(
        'label'     => __( 'Post Read More Text', 'spa-and-salon-pro' ),
        'section'   => 'spa_and_salon_post_meta_settings',
        'settings'  => 'spa_and_salon_post_read_more',
        'type'      => 'text',
        'default'   => __( 'Read More', 'spa-and-salon-pro' ),
    ) );
}
add_action( 'init', 'spa_and_salon_customize_register_postmeta' );

function spa_and_salon_customize_register_custom_control_postmeta( $wp_customize ) {

    /** Post Meta Single Page */
    $wp_customize->add_setting(
        'spa_and_salon_post_meta_single',
        array(
            'default'           => array( 'date', 'author', 'comment', 'cat' ),
            'sanitize_callback' => 'spa_and_salon_sanitize_select'
        )
    );
    
    $wp_customize->add_control(
        new Rara_Controls_Select_Control(
            $wp_customize,
            'spa_and_salon_post_meta_single',
            array(
                'label'       => __( 'Post Meta Single Post', 'spa-and-salon-pro' ),
                'description' => __( 'You can rearrange the order you want.', 'spa-and-salon-pro' ),
                'section'     => 'spa_and_salon_post_meta_settings',
                'multiple'    => 4,
                'choices'     => array(
                    'date'    => __( 'Date', 'spa-and-salon-pro' ),
                    'author'  => __( 'Author', 'spa-and-salon-pro' ),
                    'comment' => __( 'Comment', 'spa-and-salon-pro' ),                      
                    'cat'     => __( 'Category', 'spa-and-salon-pro' ),
                ),            
            )
        )
    );

    /** Categories and Tags */
    $wp_customize->add_setting(
        'spa_and_salon_post_meta_other',
        array(
            'default'           => array( 'date', 'author', 'comment', 'cat' ),
            'sanitize_callback' => 'spa_and_salon_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new Rara_Controls_Select_Control(
            $wp_customize,
            'spa_and_salon_post_meta_other',
            array(
                'label'       => __( 'Post Meta Other Pages', 'spa-and-salon-pro' ),
                'description' => __( 'You can rearrange the order you want.', 'spa-and-salon-pro' ),
                'section'     => 'spa_and_salon_post_meta_settings',
                'multiple'    => 4,
                'choices'  => array(
                    'date'    => __( 'Date', 'spa-and-salon-pro' ),
                    'author'  => __( 'Author', 'spa-and-salon-pro' ),
                    'comment' => __( 'Comment', 'spa-and-salon-pro' ),                      
                    'cat'     => __( 'Category', 'spa-and-salon-pro' ),
                ),                  
            )
        )
    );
}
add_action( 'customize_register', 'spa_and_salon_customize_register_custom_control_postmeta' );