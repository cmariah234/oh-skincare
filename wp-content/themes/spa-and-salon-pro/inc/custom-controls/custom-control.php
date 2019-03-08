<?php
/**
 * Register Custom Controls
*/
function rara_register_custom_controls( $wp_customize ){
    
    // Load our custom control.
    require_once get_template_directory() . '/inc/custom-controls/select/class-select-control.php';
    require_once get_template_directory() . '/inc/custom-controls/radioimg/class-radio-image-control.php';
    require_once get_template_directory() . '/inc/custom-controls/toggle/class-toggle-control.php';
    require_once get_template_directory() . '/inc/custom-controls/radiobtn/class-radio-buttonset-control.php';
    require_once get_template_directory() . '/inc/custom-controls/slider/class-slider-control.php';
    require_once get_template_directory() . '/inc/custom-controls/multicheck/class-multicheck-control.php';
    require_once get_template_directory() . '/inc/custom-controls/sortable/class-sortable-control.php';
    require_once get_template_directory() . '/inc/custom-controls/typography/class-fonts.php';
    require_once get_template_directory() . '/inc/custom-controls/typography/class-typography-control.php';
    
    //repeater from kirki
    require_once get_template_directory() . '/inc/custom-controls/repeater/class-repeater-setting.php';
    require_once get_template_directory() . '/inc/custom-controls/repeater/class-control-repeater.php';
    
    //repeater from hash
    require_once get_template_directory() . '/inc/custom-controls/rara-repeater/class-repeater.php';
    
    // Register the control type.
    $wp_customize->register_control_type( 'Rara_Controls_Select_Control' );
    $wp_customize->register_control_type( 'Rara_Controls_Radio_Image_Control' );
    $wp_customize->register_control_type( 'Rara_Controls_Toggle_Control' );
    $wp_customize->register_control_type( 'Rara_Controls_Radio_Buttonset_Control' );
    $wp_customize->register_control_type( 'Rara_Controls_Slider_Control' );
    $wp_customize->register_control_type( 'Rara_Controls_MultiCheck_Control' );
    $wp_customize->register_control_type( 'Rara_Control_Sortable' );
    $wp_customize->register_control_type( 'Rara_Typography_Control' );
    
    require_once get_template_directory() . '/inc/custom-controls/note/class-rara-note.php';
}
add_action( 'customize_register', 'rara_register_custom_controls' );