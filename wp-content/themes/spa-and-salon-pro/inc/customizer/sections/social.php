<?php
/**
 * Social Settings
 *
 * @package spa_and_salon
 */

function spa_and_salon_customize_register_social( ) {
    
    /** Social Settings */
    Kirki::add_section( 'spa_and_salon_social_settings', array(
        'title' => __( 'Social Settings', 'spa-and-salon-pro' ),
        'priority' => 32,
        'capability' => 'edit_theme_options',
    ) );
    
    /** Enable/Disable Social in Header */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'toggle',
        'settings'    => 'spa_and_salon_ed_social_header',
        'label'       => __( 'Enable Social Links in Header', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_social_settings',
        'default'     => '',
    ) );
	
    /** Enable/Disable Social in Footer */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'toggle',
        'settings'    => 'spa_and_salon_social_ed_footer',
        'label'       => __( 'Enable Social Links in Footer', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_social_settings',
        'default'     => '',
    ) );	
	
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'text',
        'settings'    => 'spa_and_salon_social_info',
        'label'       => __( 'Footer Social Icons Label', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_social_settings',		
        'default'     => __( 'Follow Us On', 'spa-and-salon-pro' ),
        'required'  => array(
            array(
                'setting'  => 'spa_and_salon_social_ed_footer',
                'operator' => '==',
                'value'    => '1',
            )
        )				
    ) );	
	
    
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'repeater',
        'settings'    => 'spa_and_salon_social',
        'label'       => __( 'Add Social Links', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_social_settings',
        'default'     => array(
    		array(
    			'icon' => 'facebook',
    			'link' => 'https://facebook.com',
    		),
    		array(
    			'icon' => 'twitter',
    			'link' => 'https://twitter.com',
    		),
        ),
        'fields'     => array(
            'icon'     => array(
                'type'     => 'select',
                'label'    => __( 'Social Icon', 'spa-and-salon-pro' ),
                'choices'  => spa_and_salon_social_icons(),
                'default'  => 'dribbble'
            ),
            'link'     => array(
                'type'  => 'text',
                'label' => __( 'Link', 'spa-and-salon-pro' ),
                'description'  => __( 'Leave blank if you do not want to show.', 'spa-and-salon-pro' ),
            )
        ),
        'row_label' => array(
            'type' => 'field',
            'value' => __( 'link', 'spa-and-salon-pro' ),
            'field' => 'icon'
        ),        
    ) );    
    /** Social Settings Ends */
}
add_action( 'init', 'spa_and_salon_customize_register_social' );