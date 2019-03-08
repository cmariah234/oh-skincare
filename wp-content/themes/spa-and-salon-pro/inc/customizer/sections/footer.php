<?php
/**
 * Footer Settings
 *
 * @package spa_and_salon
 */
 
function spa_and_salon_customize_register_typograph( ) {
    
    /** Footer Settings */
    Kirki::add_section( 'spa_and_salon_footer_settings', array(
        'title' => __( 'Footer Settings', 'spa-and-salon-pro' ),
        'priority' => 140,
        'capability' => 'edit_theme_options',
    ) );
    
    /** Footer Copyright*/
    Kirki::add_field( 'spa_and_salon', array(
        'type'              => 'textarea',
        'settings'          => 'spa_and_salon_footer_copyright',
        'label'             => __( 'Footer Copyright', 'spa-and-salon-pro' ),
        'description'       => sprintf( __( 'Add %1$s[the-year],[the-site-link]%2$s shortcode to display current Year and Site Link.', 'spa-and-salon-pro' ), '<b>', '</b>' ),
        'tooltip'           => __( 'You can change footer copyright and use your own custom text from here.', 'spa-and-salon-pro' ),
        'section'           => 'spa_and_salon_footer_settings',
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    
    /** Hide Author Link */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'toggle',
        'settings'    => 'spa_and_salon_ed_author_link',
        'label'       => __( 'Hide Author Link', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_footer_settings',
        'default'     => '',
    ) );
    
    /** Hide WordPress Link */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'toggle',
        'settings'    => 'spa_and_salon_ed_wp_link',
        'label'       => __( 'Hide WordPress Link', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_footer_settings',
        'default'     => '',
    ) );
    /** Footer Settings Ends */
}
add_action( 'init', 'spa_and_salon_customize_register_typograph' );