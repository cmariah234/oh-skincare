<?php
/**
 * Slider Settings
 *
 * @package spa_and_salon
 */

function spa_and_salon_customize_register_homepage( ) {
  
    global $spa_and_salon_options_pages, $spa_and_salon_options_services, $spa_and_salon_options_plans;

    Kirki::add_panel( 'spa_and_salon_home_options', array(	
        'title'          => esc_html__( 'Home Page Settings', 'spa-and-salon-pro' ),
        'priority'       => 24,
        'capability'     => 'edit_theme_options',
    ) );    

    /** Home Drag and Drop */
    Kirki::add_section( 'spa_and_salon_drag_and_drop_section', array(
        'title'    => __( 'Homepage Drag and Drop', 'spa-and-salon-pro' ),
        'priority' => 30,
        'panel'    => 'spa_and_salon_home_options',
    ) );
	
	Kirki::add_field( 'spa_and_salon', array(
		'type'        => 'sortable',
		'settings'    => 'spa_and_salon_sorter',
		'label'       => __( 'Drag and drop arrangement of homepage sections', 'spa-and-salon-pro' ),
		'section'     => 'spa_and_salon_drag_and_drop_section',
		'default'     => array(
			'welcome-note',
			'services',
			'cta',
			'plan',
			'testimonial',
			'contact',
		),
		'choices'     => array(
			'welcome-note' => esc_attr__( 'About Us Section', 'spa-and-salon-pro' ),
			'services' => esc_attr__( 'Services Section', 'spa-and-salon-pro' ),
			'cta' => esc_attr__( 'Call to Action Section', 'spa-and-salon-pro' ),
			'plan' => esc_attr__( 'Plans Section', 'spa-and-salon-pro' ),
			'testimonial' => esc_attr__( 'Testimonials  Section', 'spa-and-salon-pro' ),
			'contact' => esc_attr__( 'Contact Section', 'spa-and-salon-pro' ),
		),
		'priority'    => 10,
	) );		
	 

    /** Featured Section */
    Kirki::add_section( 'spa_and_salon_header_featured_section', array(
        'title'    => __( 'Featured Section', 'spa-and-salon-pro' ),
        'priority' => 30,
        'panel'    => 'spa_and_salon_home_options',
    ) );
	
    /** Homepage Features Section Ed */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'toggle',
        'settings'    => 'spa_and_salon_ed_banner_section',
        'label'       => __( 'Enable Features Section', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_header_featured_section',
        'default'     => '0',
    ) );   				

    /** Add Featured Section Boxes */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'repeater',
        'settings'    => 'spa_and_salon_featured_boxes',
        'label'       => __( 'Add Features', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_header_featured_section',
        'default'     => '',
		'choices' => array(
			'limit' => 3
		),		
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
            ),
            'icon'     => array(
                'type'  => 'text',
				'description' => __( 'Use Fontawesome font name here', 'spa-and-salon-pro' ),
                'label' => __( 'Icons', 'spa-and-salon-pro' ),
            ),			
        ),
        'row_label' => array(
            'type' => 'field', // [default 'text']
            'value' => __( 'Features', 'spa-and-salon-pro' ),
            'field' => 'title',// [only used if type = field, the field-id must exist in fields and be a text field]
        ),
    ) );	
	
    /** Featured Section Ends */		
	
   /** About Section */
    Kirki::add_section( 'spa_and_salon_about_section', array(
        'title'    => __( 'About Section ', 'spa-and-salon-pro' ),
        'priority' => 30,
        'panel'    => 'spa_and_salon_home_options',
    ) );		
	

    /** About Section Image */
    Kirki::add_field( 'spa_and_salon', array(
        'label'     => __( 'About Section Image', 'spa-and-salon-pro' ),
        'section'   => 'spa_and_salon_about_section',
        'settings'  => 'spa_and_salon_about_image',
        'type'      => 'image',
        'default'   => '',
    ) );		
	
    /** About Section Title */
    Kirki::add_field( 'spa_and_salon', array(
        'label'     => __( 'About Section Title', 'spa-and-salon-pro' ),
        'section'   => 'spa_and_salon_about_section',
        'settings'  => 'spa_and_salon_about_title',
        'type'      => 'text',
        'default'   => '',
    ) );		
	
    /** About Section Description */
    Kirki::add_field( 'spa_and_salon', array(
        'label'     => __( 'About Section Description', 'spa-and-salon-pro' ),
        'section'   => 'spa_and_salon_about_section',
        'settings'  => 'spa_and_salon_about_content',
        'type'      => 'textarea',
        'default'   => '',
    ) );			
	
    /** About Section Button */
    Kirki::add_field( 'spa_and_salon', array(
        'label'     => __( 'About Section Button Text', 'spa-and-salon-pro' ),
        'section'   => 'spa_and_salon_about_section',
        'settings'  => 'spa_and_salon_about_read_more',
        'type'      => 'text',
        'default'   => '',
    ) );				
	
    /** About Section Button URL */
    Kirki::add_field( 'spa_and_salon', array(
        'label'     => __( 'About Section Button URL', 'spa-and-salon-pro' ),
        'section'   => 'spa_and_salon_about_section',
        'settings'  => 'spa_and_salon_about_read_more_url',
        'type'      => 'text',
        'default'   => '',
    ) );					
    /** About Section Ends */		
	

   /** Services Section */
    Kirki::add_section( 'spa_and_salon_services_section', array(
        'title'    => __( 'Services Section ', 'spa-and-salon-pro' ),
        'priority' => 30,
        'panel'    => 'spa_and_salon_home_options',
    ) );	
	

	Kirki::add_field( 'spa_and_salon', array(
		'type'        => 'custom',
		'settings'    => 'spa_and_salon_service_detail',
		'label'       => __( '', 'spa-and-salon-pro' ),
		'section'     => 'spa_and_salon_services_section',
		'default'     => '<div style="padding: 10px;background-color: #f1f1f1; color: #252525; border-radius: 0px;">' . esc_html__( 'Create services from the Dashboard >> Services and select the once you want to feature on Homepage here.', 'spa-and-salon-pro' ) . '</div>',
		'priority'    => 10,
	) );	

    /** Services Section Title */
    Kirki::add_field( 'spa_and_salon', array(
        'label'     => __( 'Services Section Title', 'spa-and-salon-pro' ),
        'section'   => 'spa_and_salon_services_section',
        'settings'  => 'spa_and_salon_service_post_title',
        'type'      => 'text',
        'default'   => '',
    ) );		
	
    /** Services Section Description */
    Kirki::add_field( 'spa_and_salon', array(
        'label'     => __( 'Services Section Description', 'spa-and-salon-pro' ),
        'section'   => 'spa_and_salon_services_section',
        'settings'  => 'spa_and_salon_service_post_content',
        'type'      => 'textarea',
        'default'   => '',
    ) );			
	
    /** Services Section Button */
    Kirki::add_field( 'spa_and_salon', array(
        'label'     => __( 'Services Section Button Text', 'spa-and-salon-pro' ),
        'section'   => 'spa_and_salon_services_section',
        'settings'  => 'spa_and_salon_services_btn_text',
        'type'      => 'text',
        'default'   => '',
    ) );				
	
    /** Services Section Button URL */
    Kirki::add_field( 'spa_and_salon', array(
        'label'     => __( 'Services Section Button URL', 'spa-and-salon-pro' ),
        'section'   => 'spa_and_salon_services_section',
        'settings'  => 'spa_and_salon_services_btn_url',
        'type'      => 'text',
        'default'   => '',
    ) );		


    /** Select Home Services One */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'select',
        'settings'    => 'spa_and_salon_service_post_one',
        'label'       => __( 'Select Service One', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_services_section',
        'default'     => '',
        'choices'     => $spa_and_salon_options_services,	
    ) );		
	
    /** Select Home Services Two */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'select',
        'settings'    => 'spa_and_salon_service_post_two',
        'label'       => __( 'Select Service Two', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_services_section',
        'default'     => '',
        'choices'     => $spa_and_salon_options_services,		
    ) );		


    /** Select Home Services Three */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'select',
        'settings'    => 'spa_and_salon_service_post_three',
        'label'       => __( 'Select Service Three', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_services_section',
        'default'     => '',
        'choices'     => $spa_and_salon_options_services,		
    ) );		


    /** Select Home Services Four */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'select',
        'settings'    => 'spa_and_salon_service_post_four',
        'label'       => __( 'Select Service Four', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_services_section',
        'default'     => '',
        'choices'     => $spa_and_salon_options_services,		
    ) );		


    /** Select Home Services Five */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'select',
        'settings'    => 'spa_and_salon_service_post_five',
        'label'       => __( 'Select Service Five', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_services_section',
        'default'     => '',
        'choices'     => $spa_and_salon_options_services,		
    ) );		


    /** Select Home Services Six */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'select',
        'settings'    => 'spa_and_salon_service_post_six',
        'label'       => __( 'Select Service Six', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_services_section',
        'default'     => '',
        'choices'     => $spa_and_salon_options_services,	
    ) );		
	

    /** Services Section Ends */		
	
    /** Homepage CTA Banner */
    Kirki::add_section( 'spa_and_salon_homepage_cta', array(
        'title'    => __( 'Call to Action Section', 'spa-and-salon-pro' ),
        'priority' => 30,
        'panel'    => 'spa_and_salon_home_options',
    ) );
    
	
    /** Homepage Top CTA Banner Image */
    Kirki::add_field( 'spa_and_salon', array(
        'label'     => __( 'Call to Action Background Image', 'spa-and-salon-pro' ),
        'section'   => 'spa_and_salon_homepage_cta',
        'settings'  => 'spa_and_salon_home_cta_image',
        'type'      => 'image',
        'default'   => '',
    ) );	
	
    /** Homepage CTA Banner Title */
    Kirki::add_field( 'spa_and_salon', array(
        'type'     => 'text',
        'settings' => 'spa_and_salon_home_cta_text',
        'label'    => __( 'Call To Action Title', 'spa-and-salon-pro' ),
        'tooltip'  => __( 'Enter CTA Title', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_homepage_cta',
        'default'  => '',
    ) );		

    /** Homepage CTA Banner Desc */
    Kirki::add_field( 'spa_and_salon', array(
        'type'     => 'textarea',
        'settings' => 'spa_and_salon_home_cta_desc',
        'label'    => __( 'Call To Action Description', 'spa-and-salon-pro' ),
        'tooltip'  => __( 'Enter CTA Description', 'spa-and-salon-pro' ),
        'section'  => 'spa_and_salon_homepage_cta',
        'default'  => '',
    ) );			
	
    /** Homepage CTA Button Text */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'text',
        'settings'    => 'spa_and_salon_home_cta_button_text',
        'label'       => __( 'Button Text', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_homepage_cta',
        'default'     => '',
    ) );			
	
    /** Homepage CTA Button URL */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'text',
        'settings'    => 'spa_and_salon_home_cta_button_url',
        'label'       => __( 'Buttom URL', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_homepage_cta',
        'default'     => '',
    ) );		
    /** Homepage CTA Banner */  	 	
	
 /** Plans Section */
    Kirki::add_section( 'spa_and_salon_plans_section', array(
        'title'    => __( 'Plans Section ', 'spa-and-salon-pro' ),
        'priority' => 30,
        'panel'    => 'spa_and_salon_home_options',
    ) );	
	
	Kirki::add_field( 'spa_and_salon', array(
		'type'        => 'custom',
		'settings'    => 'spa_and_salon_plan_detail',
		'label'       => __( '', 'spa-and-salon-pro' ),
		'section'     => 'spa_and_salon_plans_section',
		'default'     => '<div style="padding: 10px;background-color: #f1f1f1; color: #252525; border-radius: 0px;">' . esc_html__( 'Create plans from the Dashboard >> Plans and select the once you want to feature on Homepage here.', 'spa-and-salon-pro' ) . '</div>',
		'priority'    => 10,
	) );		
	
    /** Plans Section Title */
    Kirki::add_field( 'spa_and_salon', array(
        'label'     => __( 'Plans Section Title', 'spa-and-salon-pro' ),
        'section'   => 'spa_and_salon_plans_section',
        'settings'  => 'spa_and_salon_plans_title',
        'type'      => 'text',
    ) );		
	
    /** Plans Section Description */
    Kirki::add_field( 'spa_and_salon', array(
        'label'     => __( 'Plans Section Description', 'spa-and-salon-pro' ),
        'section'   => 'spa_and_salon_plans_section',
        'settings'  => 'spa_and_salon_plans_desc',
        'type'      => 'textarea',
        'default'   => '',
    ) );			
	
    /** Plans Section Button */
    Kirki::add_field( 'spa_and_salon', array(
        'label'     => __( 'Plans Section Button Text', 'spa-and-salon-pro' ),
        'section'   => 'spa_and_salon_plans_section',
        'settings'  => 'spa_and_salon_plans_btn_text',
        'type'      => 'text',
        'default'   => '',
    ) );				
	
    /** Plans Section Button URL */
    Kirki::add_field( 'spa_and_salon', array(
        'label'     => __( 'Plans Section Button URL', 'spa-and-salon-pro' ),
        'section'   => 'spa_and_salon_plans_section',
        'settings'  => 'spa_and_salon_plans_btn_url',
        'type'      => 'text',
        'default'   => '',
    ) );						

    /** Select Home Plans One */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'select',
        'settings'    => 'spa_and_salon_plans_section_plan_one',
        'label'       => __( 'Select Plan One', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_plans_section',
        'default'     => '',
        'choices'     => $spa_and_salon_options_plans,	
    ) );		
	
    /** Select Home Plans Two */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'select',
        'settings'    => 'spa_and_salon_plans_section_plan_two',
        'label'       => __( 'Select Plan Two', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_plans_section',
        'default'     => '',
        'choices'     => $spa_and_salon_options_plans,		
    ) );		


    /** Select Home Plans Three */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'select',
        'settings'    => 'spa_and_salon_plans_section_plan_three',
        'label'       => __( 'Select Plan Three', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_plans_section',
        'default'     => '',
        'choices'     => $spa_and_salon_options_plans,		
    ) );		


    /** Select Home Plans Four */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'select',
        'settings'    => 'spa_and_salon_plans_section_plan_four',
        'label'       => __( 'Select Plan Four', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_plans_section',
        'default'     => '',
        'choices'     => $spa_and_salon_options_plans,		
    ) );		

    /** Plans Section Ends */		
	
    /** Testimonials Section */
    Kirki::add_section( 'spa_and_salon_testimonials_section', array(
        'title'    => __( 'Testimonials Section ', 'spa-and-salon-pro' ),
        'priority' => 30,
        'panel'    => 'spa_and_salon_home_options',
    ) );	

    /** Testimonials Section Title */
    Kirki::add_field( 'spa_and_salon', array(
        'label'     => __( 'Testimonials Section Title', 'spa-and-salon-pro' ),
        'section'   => 'spa_and_salon_testimonials_section',
        'settings'  => 'spa_and_salon_testimonial_section_title',
        'type'      => 'text',
		'default' 	=> '',
    ) );		
	
    /** Testimonials Section Description */
    Kirki::add_field( 'spa_and_salon', array(
        'label'     => __( 'Testimonials Section Description', 'spa-and-salon-pro' ),
        'section'   => 'spa_and_salon_testimonials_section',
        'settings'  => 'spa_and_salon_testimonial_section_content',
        'type'      => 'textarea',
        'default'   => '',
    ) );				


    /** Testimonials Section Number */
    Kirki::add_field( 'spa_and_salon', array(
        'label'     => __( 'No. of Testimonials to show', 'spa-and-salon-pro' ),
        'section'   => 'spa_and_salon_testimonials_section',
        'settings'  => 'spa_and_salon_testimonials_number',
        'type'      => 'number',
        'default'   => '',
		'choices'     => array(
				'min'  => 0,
				'max'  => 9,
				'step' => 1,
			),		
    ) );				

    /** Testimonials Section Ends */				


    /** Instagram Gallery Section */
    Kirki::add_section( 'spa_and_salon_homepage_instagram', array(
        'title'    => __( 'Instagram Gallery Section', 'spa-and-salon-pro' ),
        'priority' => 30,
        'panel'    => 'spa_and_salon_home_options',
    ) );
    
    /** Instagram Gallery Section Ed */
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'toggle',
        'settings'    => 'spa_and_salon_ed_instagram_section',
        'label'       => __( 'Enable Instagram Gallery Section', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_homepage_instagram',
        'default'     => '0',
    ) );   		
	
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'text',
        'settings'    => 'spa_and_salon_instagram_username',
        'label'       => __( 'Enter Instagram Username', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_homepage_instagram',
        'default'     => '',
        'required'  => array(
            array(
                'setting'  => 'spa_and_salon_ed_instagram_section',
                'operator' => '==',
                'value'    => '1',
            )
        )		
    ) );		
	
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'text',
        'settings'    => 'spa_and_salon_instagram_title',
        'label'       => __( 'Enter Instagram Section Title', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_homepage_instagram',
        'default'     => '',
        'required'  => array(
            array(
                'setting'  => 'spa_and_salon_ed_instagram_section',
                'operator' => '==',
                'value'    => '1',
            )
        )		
    ) );			
	
    Kirki::add_field( 'spa_and_salon', array(
        'type'        => 'textarea',
        'settings'    => 'spa_and_salon_instagram_desc',
        'label'       => __( 'Enter Instagram Section Description', 'spa-and-salon-pro' ),
        'section'     => 'spa_and_salon_homepage_instagram',
        'default'     => __( 'Follow us on Instagram', 'spa-and-salon-pro' ),
        'required'  => array(
            array(
                'setting'  => 'spa_and_salon_ed_instagram_section',
                'operator' => '==',
                'value'    => '1',
            )
        )		
    ) );				
	
    /** Instagram Gallery Section Ends */					
    
}
add_action( 'init', 'spa_and_salon_customize_register_homepage' );