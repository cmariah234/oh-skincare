<?php
/**
 * Typography Settings
 * 
 * @package spa_and_salon
 */

function spa_and_salon_customize_register_typography( ) {

    /** Typography */
    Kirki::add_panel( 'spa_and_salon_typography_section', array(
        'title' => __( 'Typography Settings', 'spa-and-salon-pro' ),
        'priority' => 29,
        'capability' => 'edit_theme_options'
    ) );

    /** Site Title Settings */
    Kirki::add_section( 'spa_and_salon_typography_site_title_section', array(
        'title'      => __( 'Site title Settings', 'spa-and-salon-pro' ),
        'priority'   => 9,
        'capability' => 'edit_theme_options',
        'panel'      => 'spa_and_salon_typography_section'
    ) );

    /** Site Title Font */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'typography',
        'settings'    => 'spa_and_salon_site_title_font',
        'label'       => __( 'Site Title Font', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_typography_site_title_section',
        'default'     => array(
            'font-family'    => 'Marcellus',
            'variant'        => 'regular',
        ),
    ) );

    /** Site Title Font Size */
    Kirki::add_field( 'spa_and_salon', array(
        'settings' => 'spa_and_salon_site_title_font_size',
        'label'    => __( 'Site Title Font Size', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_typography_site_title_section',
        'default'  => '22',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 14,
                        'max'  => 50,
                        'step' => 1,
                    )
    ) );

    /** Body Settings */
    Kirki::add_section( 'spa_and_salon_typography_body_section', array(
        'title' => __( 'Body Settings', 'spa-and-salon-pro' ),
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'panel'     => 'spa_and_salon_typography_section'
    ) );

    /** Body Font */
    Kirki::add_field( 'spa_and_salon', array(
    	'type'        => 'typography',
    	'settings'    => 'spa_and_salon_body_font',
    	'label'       => __( 'Body Font', 'spa-and-salon-pro' ),
    	'section'     => 'spa_and_salon_typography_body_section',
    	'default'     => array(
    		'font-family'    => 'Lato',
    		'variant'        => 'regular',
    	),
    ) );

    /** Body Font Size */
    Kirki::add_field( 'spa_and_salon', array(
        'settings' => 'spa_and_salon_body_font_size',
        'label'    => __( 'Body Font Size', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_typography_body_section',
        'default'  => '20',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 14,
                        'max'  => 35,
                        'step' => 1,
                    )
    ) );

    /** Body Line Height */
    Kirki::add_field( 'spa_and_salon', array(
        'settings' => 'spa_and_salon_body_line_height',
        'label'    => __( 'Body Line Height', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_typography_body_section',
        'default'  => '32',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 17,
                        'max'  => 50,
                        'step' => 1,
                    )
    ) );

    /** Body Color */
    Kirki::add_field( 'spa_and_salon', array(
        'settings' => 'spa_and_salon_body_color',
        'label'    => __( 'Body Color', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_typography_body_section',
        'type'     => 'color',
        'default'  => '#444444',
    ) );

    /** Post Title Settings */
    Kirki::add_section( 'spa_and_salon_post_title_section', array(
        'title' => __( 'Post Title Settings', 'spa-and-salon-pro' ),
        'priority' => 11,
        'capability' => 'edit_theme_options',
        'panel'     => 'spa_and_salon_typography_section'
    ) );

    /** Post Title Font */
    Kirki::add_field( 'spa_and_salon', array(
    	'type'        => 'typography',
    	'settings'    => 'spa_and_salon_post_title_font',
    	'label'       => __( 'Post Title Font', 'spa-and-salon-pro' ),
    	'section'     => 'spa_and_salon_post_title_section',
    	'default'     => array(
    		'font-family'    => 'Marcellus',
    		'variant'        => 'Marcellus',
    	),
    ) );

    /** Post Title Font Size */
    Kirki::add_field( 'spa_and_salon', array(
        'settings' => 'spa_and_salon_post_title_font_size',
        'label'    => __( 'Post Title Font Size', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_post_title_section',
        'default'  => '30',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 20,
                        'max'  => 50,
                        'step' => 1,
                    )
    ) );

    /** Post Title Line Height */
    Kirki::add_field( 'spa_and_salon', array(
        'settings' => 'spa_and_salon_post_title_line_height',
        'label'    => __( 'Post Title Line Height', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_post_title_section',
        'default'  => '36',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 25,
                        'max'  => 65,
                        'step' => 1,
                    )
    ) );

    /** Post Title Color */
    Kirki::add_field( 'spa_and_salon', array(
        'settings' => 'spa_and_salon_post_title_color',
        'label'    => __( 'Post Title Color', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_post_title_section',
        'type'     => 'color',
        'default'  => '#333333',
    ) );
    /** Post Title Settings Ends */
	
  /** Page Title Settings */
    Kirki::add_section( 'spa_and_salon_page_title_section', array(
        'title' => __( 'Page Title Settings', 'spa-and-salon-pro' ),
        'priority' => 11,
        'capability' => 'edit_theme_options',
        'panel'     => 'spa_and_salon_typography_section'
    ) );

    /** Page Title Font */
    Kirki::add_field( 'spa_and_salon', array(
    	'type'        => 'typography',
    	'settings'    => 'spa_and_salon_page_title_font',
    	'label'       => __( 'Page Title Font', 'spa-and-salon-pro' ),
    	'section'     => 'spa_and_salon_page_title_section',
    	'default'     => array(
    		'font-family'    => 'Marcellus',
    		'variant'        => 'regular',
    	),
    ) );

    /** Page Title Font Size */
    Kirki::add_field( 'spa_and_salon', array(
        'settings' => 'spa_and_salon_page_title_font_size',
        'label'    => __( 'Page Title Font Size', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_page_title_section',
        'default'  => '48',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 20,
                        'max'  => 50,
                        'step' => 1,
                    )
    ) );

    /** Page Title Line Height */
    Kirki::add_field( 'spa_and_salon', array(
        'settings' => 'spa_and_salon_page_title_line_height',
        'label'    => __( 'Page Title Line Height', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_page_title_section',
        'default'  => '56',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 25,
                        'max'  => 65,
                        'step' => 1,
                    )
    ) );

    /** Page Title Color */
    Kirki::add_field( 'spa_and_salon', array(
        'settings' => 'spa_and_salon_page_title_color',
        'label'    => __( 'Page Title Color', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_page_title_section',
        'type'     => 'color',
        'default'  => '#72466a',
    ) );
    /** Page Title Settings Ends */	




    /** H1 Typography Settings */
    Kirki::add_section( 'spa_and_salon_h1_section', array(
        'title' => __( 'H1 Settings (Content)', 'spa-and-salon-pro' ),
        'priority' => 14,
        'capability' => 'edit_theme_options',
        'panel'     => 'spa_and_salon_typography_section'
    ) );

    /** H1 Font */
    Kirki::add_field( 'spa_and_salon', array(
    	'type'        => 'typography',
    	'settings'    => 'spa_and_salon_h1_font',
    	'label'       => __( 'H1 Font', 'spa-and-salon-pro' ),
    	'section'     => 'spa_and_salon_h1_section',
    	'default'     => array(
    		'font-family'    => 'Lato',
    		'variant'        => '700',
    	),
    ) );

    /** H1 Font Size */
    Kirki::add_field( 'spa_and_salon', array(
        'settings' => 'spa_and_salon_h1_font_size',
        'label'    => __( 'H1 Font Size', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_h1_section',
        'default'  => '48',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 20,
                        'max'  => 50,
                        'step' => 1,
                    )
    ) );

    /** H1 Line Height */
    Kirki::add_field( 'spa_and_salon', array(
        'settings' => 'spa_and_salon_h1_line_height',
        'label'    => __( 'H1 Line Height', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_h1_section',
        'default'  => '52',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 30,
                        'max'  => 60,
                        'step' => 1,
                    )
    ) );

    /** H1 Color */
    Kirki::add_field( 'spa_and_salon', array(
        'settings' => 'spa_and_salon_h1_color',
        'label'    => __( 'H1 Color', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_h1_section',
        'type'     => 'color',
        'default'  => '#1f262c',
    ) );

    /** H2 Typography Settings */
    Kirki::add_section( 'spa_and_salon_h2_section', array(
        'title' => __( 'H2 Settings (Content)', 'spa-and-salon-pro' ),
        'priority' => 15,
        'capability' => 'edit_theme_options',
        'panel'     => 'spa_and_salon_typography_section'
    ) );

    /** H2 Font */
    Kirki::add_field( 'spa_and_salon', array(
    	'type'        => 'typography',
    	'settings'    => 'spa_and_salon_h2_font',
    	'label'       => __( 'H2 Font', 'spa-and-salon-pro' ),
    	'section'     => 'spa_and_salon_h2_section',
    	'default'     => array(
    		'font-family'    => 'Lato',
    		'variant'        => '700',
    	),
    ) );

    /** H2 Font Size */
    Kirki::add_field( 'spa_and_salon', array(
        'settings' => 'spa_and_salon_h2_font_size',
        'label'    => __( 'H2 Font Size', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_h2_section',
        'default'  => '36',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 20,
                        'max'  => 50,
                        'step' => 1,
                    )
    ) );

    /** H2 Line Height */
    Kirki::add_field( 'spa_and_salon', array(
        'settings' => 'spa_and_salon_h2_line_height',
        'label'    => __( 'H2 Line Height', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_h2_section',
        'default'  => '40',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 30,
                        'max'  => 60,
                        'step' => 1,
                    )
    ) );

    /** H2 Color */
    Kirki::add_field( 'spa_and_salon', array(
        'settings' => 'spa_and_salon_h2_color',
        'label'    => __( 'H2 Color', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_h2_section',
        'type'     => 'color',
        'default'  => '#1f262c',
    ) );

    /** H3 Typography Settings */
    Kirki::add_section( 'spa_and_salon_h3_section', array(
        'title' => __( 'H3 Settings (Content)', 'spa-and-salon-pro' ),
        'priority' => 16,
        'capability' => 'edit_theme_options',
        'panel'     => 'spa_and_salon_typography_section'
    ) );

    /** H3 Font */
    Kirki::add_field( 'spa_and_salon', array(
    	'type'        => 'typography',
    	'settings'    => 'spa_and_salon_h3_font',
    	'label'       => __( 'H3 Font', 'spa-and-salon-pro' ),
    	'section'     => 'spa_and_salon_h3_section',
    	'default'     => array(
    		'font-family'    => 'Lato',
    		'variant'        => '700',
    	),
    ) );

    /** H3 Font Size */
    Kirki::add_field( 'spa_and_salon', array(
        'settings' => 'spa_and_salon_h3_font_size',
        'label'    => __( 'H3 Font Size', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_h3_section',
        'default'  => '28',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 15,
                        'max'  => 40,
                        'step' => 1,
                    )
    ) );

    /** H3 Line Height */
    Kirki::add_field( 'spa_and_salon', array(
        'settings' => 'spa_and_salon_h3_line_height',
        'label'    => __( 'H3 Line Height', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_h3_section',
        'default'  => '32',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 20,
                        'max'  => 50,
                        'step' => 1,
                    )
    ) );

    /** H3 Color */
    Kirki::add_field( 'spa_and_salon', array(
        'settings' => 'spa_and_salon_h3_color',
        'label'    => __( 'H3 Color', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_h3_section',
        'type'     => 'color',
        'default'  => '#1f262c',
    ) );

    /** H4 Typography Settings */
    Kirki::add_section( 'spa_and_salon_h4_section', array(
        'title' => __( 'H4 Settings (Content)', 'spa-and-salon-pro' ),
        'priority' => 17,
        'capability' => 'edit_theme_options',
        'panel'     => 'spa_and_salon_typography_section'
    ) );

    /** H4 Font */
    Kirki::add_field( 'spa_and_salon', array(
    	'type'        => 'typography',
    	'settings'    => 'spa_and_salon_h4_font',
    	'label'       => __( 'H4 Font', 'spa-and-salon-pro' ),
    	'section'     => 'spa_and_salon_h4_section',
    	'default'     => array(
    		'font-family'    => 'Lato',
    		'variant'        => '700',
    	),
    ) );

    /** H4 Font Size */
    Kirki::add_field( 'spa_and_salon', array(
        'settings' => 'spa_and_salon_h4_font_size',
        'label'    => __( 'H4 Font Size', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_h4_section',
        'default'  => '26',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 10,
                        'max'  => 30,
                        'step' => 1,
                    )
    ) );

    /** H4 Line Height */
    Kirki::add_field( 'spa_and_salon', array(
        'settings' => 'spa_and_salon_h4_line_height',
        'label'    => __( 'H4 Line Height', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_h4_section',
        'default'  => '35',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 15,
                        'max'  => 40,
                        'step' => 1,
                    )
    ) );

    /** H4 Color */
    Kirki::add_field( 'spa_and_salon', array(
        'settings' => 'spa_and_salon_h4_color',
        'label'    => __( 'H4 Color', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_h4_section',
        'type'     => 'color',
        'default'  => '#1f262c',
    ) );

    /** H5 Typography Settings */
    Kirki::add_section( 'spa_and_salon_h5_section', array(
        'title' => __( 'H5 Settings (Content)', 'spa-and-salon-pro' ),
        'priority' => 18,
        'capability' => 'edit_theme_options',
        'panel'     => 'spa_and_salon_typography_section'
    ) );

    /** H5 Font */
    Kirki::add_field( 'spa_and_salon', array(
    	'type'        => 'typography',
    	'settings'    => 'spa_and_salon_h5_font',
    	'label'       => __( 'H5 Font', 'spa-and-salon-pro' ),
    	'section'     => 'spa_and_salon_h5_section',
    	'default'     => array(
    		'font-family'    => 'Lato',
    		'variant'        => '700',
    	),
    ) );

    /** H5 Font Size */
    Kirki::add_field( 'spa_and_salon', array(
        'settings' => 'spa_and_salon_h5_font_size',
        'label'    => __( 'H5 Font Size', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_h5_section',
        'default'  => '24',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 10,
                        'max'  => 30,
                        'step' => 1,
                    )
    ) );

    /** H5 Line Height */
    Kirki::add_field( 'spa_and_salon', array(
        'settings' => 'spa_and_salon_h5_line_height',
        'label'    => __( 'H5 Line Height', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_h5_section',
        'default'  => '28',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 10,
                        'max'  => 35,
                        'step' => 1,
                    )
    ) );

    /** H5 Color */
    Kirki::add_field( 'spa_and_salon', array(
        'settings' => 'spa_and_salon_h5_color',
        'label'    => __( 'H5 Color', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_h5_section',
        'type'     => 'color',
        'default'  => '#1f262c',
    ) );

    /** H6 Typography Settings */
    Kirki::add_section( 'spa_and_salon_h6_section', array(
        'title' => __( 'H6 Settings (Content)', 'spa-and-salon-pro' ),
        'priority' => 19,
        'capability' => 'edit_theme_options',
        'panel'     => 'spa_and_salon_typography_section'
    ) );

    /** H6 Font */
    Kirki::add_field( 'spa_and_salon', array(
    	'type'        => 'typography',
    	'settings'    => 'spa_and_salon_h6_font',
    	'label'       => __( 'H6 Font', 'spa-and-salon-pro' ),
    	'section'     => 'spa_and_salon_h6_section',
    	'default'     => array(
    		'font-family'    => 'Lato',
    		'variant'        => '700',
    	),
    ) );

    /** H6 Font Size */
    Kirki::add_field( 'spa_and_salon', array(
        'settings' => 'spa_and_salon_h6_font_size',
        'label'    => __( 'H6 Font Size', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_h6_section',
        'default'  => '21',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 10,
                        'max'  => 30,
                        'step' => 1,
                    )
    ) );

    /** H6 Line Height */
    Kirki::add_field( 'spa_and_salon', array(
        'settings' => 'spa_and_salon_h6_line_height',
        'label'    => __( 'H6 Line Height', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_h6_section',
        'default'  => '25',
        'type'     => 'slider',
        'choices'  => array(
                        'min'  => 10,
                        'max'  => 35,
                        'step' => 1,
                    )
    ) );

    /** H6 Color */
    Kirki::add_field( 'spa_and_salon', array(
        'settings' => 'spa_and_salon_h6_color',
        'label'    => __( 'H6 Color', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_h6_section',
        'type'     => 'color',
        'default'  => '#1f262c',
    ) );
    /** Typography Ends */
}
add_action( 'init', 'spa_and_salon_customize_register_typography' );
