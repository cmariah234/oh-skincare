<?php
/**
 * Slider Settings
 *
 * @package spa_and_salon
 */

function spa_and_salon_customize_register_slider( ) {

    global $spa_and_salon_options_pages_posts, $spa_and_salon_option_categories;
  
    /** 4. Slider/ Hero Area Settings */
    Kirki::add_panel( 'spa_and_salon_slider_settings', array(
        'title'          => __( 'Slider Settings', 'spa-and-salon-pro' ),
        'priority'       => 23,
        'capability'     => 'edit_theme_options',
    ) );

    /** Slider Options */
    Kirki::add_section( 'spa_and_salon_slider_options', array(
        'title' => __( 'Slider Options', 'spa-and-salon-pro' ),
        'priority' => 20,
        'panel' => 'spa_and_salon_slider_settings',
    ) );

    /** Enable/Disable Slider */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'toggle',
        'settings'    => 'spa_and_salon_ed_slider',
        'label'       => __( 'Enable/Disable Slider', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_slider_options',
        'default'     => '',
    ) );
	
    /** Enable/Disable Slider Auto Transition */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'toggle',
        'settings'    => 'spa_and_salon_slider_auto',
        'label'       => __( 'Enable Slider Auto Transition', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_slider_options',
        'default'     => '1',
    ) );

    /** Enable/Disable Slider Control */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'toggle',
        'settings'    => 'spa_and_salon_slider_control',
        'label'       => __( 'Enable Slider Control', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_slider_options',
        'default'     => '1',
    ) );
	
    /** Enable/Disable Slider Loop */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'toggle',
        'settings'    => 'spa_and_salon_slider_loop',
        'label'       => __( 'Enable Slider Loop', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_slider_options',
        'default'     => '',
    ) );
    
    /** Enable/Disable Slider Caption */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'toggle',
        'settings'    => 'spa_and_salon_slider_caption',
        'label'       => __( 'Enable Slider Caption', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_slider_options',
        'default'     => '1',
    ) );
	
    /** Slider Image Size */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'toggle',
        'settings'    => 'spa_and_salon_slider_size',
        'label'       => __( 'Use Full Size Image', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_slider_options',
        'default'     => '',
    ) );	

    /** Enable/Disable Slider Loop */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'slider',
        'settings'    => 'spa_and_salon_slider_speed',
        'label'       => __( 'Slider Speed', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_slider_options',
        'default'     => 400,
        'choices' => array(
                'min' => 100,
                'max' => 5000,
                'step'=> 100
            )
    ) );

    /** Slider Transition */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'select',
        'settings'    => 'spa_and_salon_slider_transition',
        'label'       => __( 'Choose Slider Transition', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_slider_options',
        'default'     => 'slide',
        'choices' => array(                
                'slide'          => __( 'Slide', 'spa-and-salon-pro' ),
                'bounceOut'      => __( 'Bounce Out', 'spa-and-salon-pro' ),
                'bounceOutLeft'  => __( 'Bounce Out Left', 'spa-and-salon-pro' ),
                'bounceOutRight' => __( 'Bounce Out Right', 'spa-and-salon-pro' ),
                'bounceOutUp'    => __( 'Bounce Out Up', 'spa-and-salon-pro' ),
                'bounceOutDown'  => __( 'Bounce Out Down', 'spa-and-salon-pro' ),
                'fade'           => __( 'Fade', 'spa-and-salon-pro' ),
                'fadeOutLeft'    => __( 'Fade Out Left', 'spa-and-salon-pro' ),
                'fadeOutRight'   => __( 'Fade Out Right', 'spa-and-salon-pro' ),
                'fadeOutUp'      => __( 'Fade Out Up', 'spa-and-salon-pro' ),
                'fadeOutDown'    => __( 'Fade Out Down', 'spa-and-salon-pro' ),
                'flipOutX'       => __( 'Flip OutX', 'spa-and-salon-pro' ),
                'flipOutY'       => __( 'Flip OutY', 'spa-and-salon-pro' ),
                'hinge'          => __( 'Hinge', 'spa-and-salon-pro' ),
                'pulse'          => __( 'Pulse', 'spa-and-salon-pro' ),
                'rollOut'        => __( 'Roll Out', 'spa-and-salon-pro' ),
                'rollOutLeft'    => __( 'Roll Out Left', 'spa-and-salon-pro' ),
                'rollOutRight'   => __( 'Roll Out Right', 'spa-and-salon-pro' ),
                'rollOutUp'      => __( 'Roll Out Up', 'spa-and-salon-pro' ),
                'rollOutDown'    => __( 'Roll Out Down', 'spa-and-salon-pro' ),
                'rotateOut'      => __( 'Rotate Out', 'spa-and-salon-pro' ),
                'rotateOutLeft'  => __( 'Rotate Out Left', 'spa-and-salon-pro' ),
                'rotateOutRight' => __( 'Rotate Out Right', 'spa-and-salon-pro' ),
                'rotateOutUp'    => __( 'Rotate Out Up', 'spa-and-salon-pro' ),
                'rotateOutDown'  => __( 'Rotate Out Down', 'spa-and-salon-pro' ),
                'rubberBand'     => __( 'Rubber Band', 'spa-and-salon-pro' ),
                'shake'          => __( 'Shake', 'spa-and-salon-pro' ),
                'slideOutLeft'   => __( 'Slide Out Left', 'spa-and-salon-pro' ),
                'slideOutRight'  => __( 'Slide Out Right', 'spa-and-salon-pro' ),
                'slideOutUp'     => __( 'Slide Out Up', 'spa-and-salon-pro' ),
                'slideOutDown'   => __( 'Slide Out Down', 'spa-and-salon-pro' ),
                'swing'          => __( 'Swing', 'spa-and-salon-pro' ),
                'tada'           => __( 'Tada', 'spa-and-salon-pro' ),
                'zoomOut'        => __( 'Zoom Out', 'spa-and-salon-pro' ),
                'zoomOutLeft'    => __( 'Zoom Out Left', 'spa-and-salon-pro' ),
                'zoomOutRight'   => __( 'Zoom Out Right', 'spa-and-salon-pro' ),
                'zoomOutUp'      => __( 'Zoom Out Up', 'spa-and-salon-pro' ),
                'zoomOutDown'    => __( 'Zoom Out Down', 'spa-and-salon-pro' ),
            )
    ) );

    /** Slider Contents */
    Kirki::add_section( 'spa_and_salon_slider_contents', array(
        'title' => __( 'Slider Contents', 'spa-and-salon-pro' ),
        'priority' => 30,
        'panel' => 'spa_and_salon_slider_settings',
    ) );

    /** Select Slider Type */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'select',
        'settings'    => 'spa_and_salon_slider_type',
        'label'       => __( 'Choose Slider Type', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_slider_contents',
        'default'     => 'post',
        'choices'     => array(
                'post' => __( 'Post/Page', 'spa-and-salon-pro' ),
                'cat' => __( 'Category', 'spa-and-salon-pro' ),
                'custom' => __( 'Custom', 'spa-and-salon-pro' ),
            )
    ) );

    /** Select Post One */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'select',
        'settings'    => 'spa_and_salon_slider_post_one',
        'label'       => __( 'Choose Post One', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_slider_contents',
        'default'     => '',
        'choices'     => $spa_and_salon_options_pages_posts,
        'required'  => array(
            array(
                'setting'  => 'spa_and_salon_slider_type',
                'operator' => '==',
                'value'    => 'post',
            )
        )
    ) );

    /** Select Post Two */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'select',
        'settings'    => 'spa_and_salon_slider_post_two',
        'label'       => __( 'Choose Post Two', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_slider_contents',
        'default'     => '',
        'choices'     => $spa_and_salon_options_pages_posts,
        'required'  => array(
            array(
                'setting'  => 'spa_and_salon_slider_type',
                'operator' => '==',
                'value'    => 'post',
            )
        )
    ) );
    /** Select Post Three */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'select',
        'settings'    => 'spa_and_salon_slider_post_three',
        'label'       => __( 'Choose Post Three', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_slider_contents',
        'default'     => '',
        'choices'     => $spa_and_salon_options_pages_posts,
        'required'  => array(
            array(
                'setting'  => 'spa_and_salon_slider_type',
                'operator' => '==',
                'value'    => 'post',
            )
        )
    ) );

    /** Select Post Four */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'select',
        'settings'    => 'spa_and_salon_slider_post_four',
        'label'       => __( 'Choose Post Four', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_slider_contents',
        'default'     => '',
        'choices'     => $spa_and_salon_options_pages_posts,
        'required'  => array(
            array(
                'setting'  => 'spa_and_salon_slider_type',
                'operator' => '==',
                'value'    => 'post',
            )
        )
    ) );

    /** Select Post Five */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'select',
        'settings'    => 'spa_and_salon_slider_post_five',
        'label'       => __( 'Choose Post Five', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_slider_contents',
        'default'     => '',
        'choices'     => $spa_and_salon_options_pages_posts,
        'required'  => array(
            array(
                'setting'  => 'spa_and_salon_slider_type',
                'operator' => '==',
                'value'    => 'post',
            )
        )
    ) );

    /** Select Category */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'select',
        'settings'    => 'spa_and_salon_slider_cat',
        'label'       => __( 'Choose Slider Category', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_slider_contents',
        'default'     => '',
        'choices'     => $spa_and_salon_option_categories,
        'required'  => array(
            array(
                'setting'  => 'spa_and_salon_slider_type',
                'operator' => '==',
                'value'    => 'cat',
            )
        )
    ) );

    /** Add Slides */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'repeater',
        'settings'    => 'spa_and_salon_slider_slides',
        'label'       => __( 'Add Slides', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_slider_contents',
        'default'     => '',
        'fields'     => array(
            'thumbnail' => array(
                'type'  => 'image',
                'label' => __( 'Add Image', 'spa-and-salon-pro' ),
            ),
            'title'     => array(
                'type'  => 'text',
                'label' => __( 'Title', 'spa-and-salon-pro' ),
            ),
            'desc'     => array(
                'type'  => 'textarea',
                'label' => __( 'Description', 'spa-and-salon-pro' ),
            ),			
            'link'     => array(
                'type'  => 'text',
                'label' => __( 'Link', 'spa-and-salon-pro' ),
            )
        ),
        'required'  => array(
            array(
                'setting'  => 'spa_and_salon_slider_type',
                'operator' => '==',
                'value'    => 'custom',
            )
        ),
        'row_label' => array(
            'type' => 'field', // [default 'text']
            'value' => __( 'slides', 'spa-and-salon-pro' ),
            'field' => 'title',// [only used if type = field, the field-id must exist in fields and be a text field]
        ),
    ) );

    /** Slider Readmore */
    Kirki::add_field( 'spa_and_salon', array(
        'type'      => 'text',
        'settings'  => 'spa_and_salon_slider_readmore',
        'label'     => __( 'Readmore Text', 'spa-and-salon-pro' ),
        'section'   => 'spa_and_salon_slider_contents',
        'default'   => __( 'Read More', 'spa-and-salon-pro' ),
    ) );

    /** Slider Settings Ends */     

    
}
add_action( 'init', 'spa_and_salon_customize_register_slider' );