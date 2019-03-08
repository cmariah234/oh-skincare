<?php
/**
 * Styling Settings
 *
 * @package spa_and_salon
 */
 
function spa_and_salon_customize_register_styling( ) {
    
    /** Styling Options */
    Kirki::add_section( 'spa_and_salon_styling_settings', array(
        'title' => __( 'Styling Options', 'spa-and-salon-pro' ),
        'priority' => 30,
        'capability' => 'edit_theme_options',
    ) );
        
    /** Layout Style */
    Kirki::add_field( 'spa_and_salon', array(
        'label'    => __( 'Layout Style', 'spa-and-salon-pro' ),
        'tooltip'  => __( 'Choose the default sidebar position for your site. The position of the sidebar for individual posts can be set in the post editor.', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_styling_settings',
        'settings' => 'spa_and_salon_layout_style',
        'type'     => 'radio-image',
        'default'  => 'right-sidebar',
        'choices'  => array(
            'left-sidebar'  => get_template_directory_uri() . '/images/left-sidebar.png',
            'right-sidebar' => get_template_directory_uri() . '/images/right-sidebar.png',
        )
    ) );
    
    /** Primary Color */
    Kirki::add_field( 'spa_and_salon', array(
        'label'    => __( 'Primary Color', 'spa-and-salon-pro' ),
        'tooltip'  => __( 'Choose primary color for your site .', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_styling_settings',
        'settings' => 'spa_and_salon_primary_color',
        'type'     => 'color',
        'default'  => '#7fa200',
        'required' => array(
            array(
                'setting'  => 'spa_and_salon_ed_child_style',
                'operator' => '==',
                'value'    => 'spa_and_salon',
            )
        ),
    ) );

    /** Medical Spa Primary Color */
    Kirki::add_field( 'spa_and_salon', array(
        'label'    => __( 'Primary Color', 'spa-and-salon-pro' ),
        'tooltip'  => __( 'Choose primary color for your site .', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_styling_settings',
        'settings' => 'medical_spa_primary_color',
        'type'     => 'color',
        'default'  => '#e74497',
        'required' => array(
            array(
                'setting'  => 'spa_and_salon_ed_child_style',
                'operator' => '==',
                'value'    => 'medical_spa',
            )
        ),
    ) );
	 /** Medical Spa Primary Color Ends */

    /** Secondary Color */
    Kirki::add_field( 'spa_and_salon', array(
        'label'    => __( 'Secondary Color', 'spa-and-salon-pro' ),
        'tooltip'  => __( 'Choose secondary color for your site .', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_styling_settings',
        'settings' => 'spa_and_salon_secondary_color',
        'type'     => 'color',
        'default'  => '#ab5da5',
        'required' => array(
            array(
                'setting'  => 'spa_and_salon_ed_child_style',
                'operator' => '==',
                'value'    => 'spa_and_salon',
            )
        ),
    ) );	

    /** Medical Spa Secondary Color */
     Kirki::add_field( 'spa_and_salon', array(
        'label'    => __( 'Secondary Color', 'spa-and-salon-pro' ),
        'tooltip'  => __( 'Choose secondary color for your site .', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_styling_settings',
        'settings' => 'medical_spa_secondary_color',
        'type'     => 'color',
        'default'  => '#95bf6b',
        'required' => array(
            array(
                'setting'  => 'spa_and_salon_ed_child_style',
                'operator' => '==',
                'value'    => 'medical_spa',
            )
        ),
    ) );    
    /** Medical Spa Secondary Color Ends */
    
    /** Background Color */
    Kirki::add_field( 'spa_and_salon', array(
        'label'    => __( 'Background Color', 'spa-and-salon-pro' ),
        'tooltip'  => __( 'Pick a color for site background.', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_styling_settings',
        'settings' => 'spa_and_salon_bg_color',
        'type'     => 'color',
        'default'  => '#e9e9e9',
    ) );
    
    /** Body Background */
    Kirki::add_field( 'spa_and_salon', array(
        'label'    => __( 'Body Background', 'spa-and-salon-pro' ),
        'tooltip'  => __( 'Choose body background as image or pattern.', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_styling_settings',
        'settings' => 'spa_and_salon_body_bg',
        'type'     => 'radio-buttonset',
        'default'  => 'image',
        'choices'     => array(
            'image'   => __( 'Image', 'spa-and-salon-pro' ),
            'pattern' => __( 'Pattern', 'spa-and-salon-pro' ),
        ),
    ) );
    
    /** Background Image */
    Kirki::add_field( 'spa_and_salon', array(
        'label'    => __( 'Background Image', 'spa-and-salon-pro' ),
        'tooltip'  => __( 'Upload your own custom background image or pattern.', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_styling_settings',
        'settings' => 'spa_and_salon_bg_image',
        'type'     => 'image',
        'default'  => '',
        'required' => array(
            array(
                'setting'  => 'spa_and_salon_body_bg',
                'operator' => '==',
                'value'    => 'image',
            )
        )
    ) );
    
    /** Background Pattern */
    Kirki::add_field( 'spa_and_salon', array(
        'label'    => __( 'Background Pattern', 'spa-and-salon-pro' ),
        'tooltip'  => __( 'Choose from any of 63 awesome background patterns for your site background.', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_styling_settings',
        'settings' => 'spa_and_salon_bg_pattern',
        'type'     => 'radio-image',
        'default'  => 'nobg',
        'choices'  => spa_and_salon_get_patterns(),
        'required' => array(
            array(
                'setting'  => 'spa_and_salon_body_bg',
                'operator' => '==',
                'value'    => 'pattern',
            )
        )
    ) );

    /** Enable/Disable Slider */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'select',
        'settings'    => 'spa_and_salon_ed_child_style',
        'label'       => __( 'Select Child Theme Style', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_styling_settings',
        'default'     => 'spa_and_salon',
        'choices'     => array(
            'spa_and_salon' => __( 'Spa and Salon Default Style','spa-and-salon-pro' ),
            'medical_spa'   => __( 'Medical Spa Style','spa-and-salon-pro' ),
        )
    ) );

    /** Styling Options Ends */
}
add_action( 'init', 'spa_and_salon_customize_register_styling' );