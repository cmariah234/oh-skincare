<?php
/**
 * Spa and Salon Theme Customizer.
 *
 * @package spa_and_salon 
 */
 	
 	function spa_and_salon_pro_modify_default_sections( $wp_customize ){

 		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

 		$wp_customize->get_section( 'custom_css' )->panel = 'spa_and_salon_custom_code_panel';
    
	    if ( version_compare( get_bloginfo('version'),'4.9', '>=') ) {
			$wp_customize->get_section( 'static_front_page' )->title = __( 'Static Front Page', 'spa-and-salon-pro' );
	    }

	}
	add_action( 'customize_register', 'spa_and_salon_pro_modify_default_sections' );

	/* Option list of all posts */	
	$spa_and_salon_options_posts = array();
	$spa_and_salon_options_posts_obj = get_posts( 'posts_per_page=-1' );
	$spa_and_salon_options_posts[''] = __( 'Choose Post', 'spa-and-salon-pro' );
	foreach ( $spa_and_salon_options_posts_obj as $spa_and_salon_posts ) {
		$spa_and_salon_options_posts[$spa_and_salon_posts->ID] = $spa_and_salon_posts->post_title;
	}
	
	/* Option list of all pages */	
	 $argspages = array(
		'posts_per_page'   => -1,
		'post_type' => array( 'page' ),		
	);		
	$spa_and_salon_options_pages = array();
	$spa_and_salon_options_pages_obj = get_posts( $argspages );
	$spa_and_salon_options_pages[''] = __( 'Choose Page', 'spa-and-salon-pro' );
	foreach ( $spa_and_salon_options_pages_obj as $spa_and_salon_pages ) {
		$spa_and_salon_options_pages[$spa_and_salon_pages->ID] = $spa_and_salon_pages->post_title;
	}

	/* Option list of all pages */	
	 $argsboth = array(
		'posts_per_page'   => -1,
		'post_type' => array( 'page','post' ),		
	);		
	$spa_and_salon_options_pages_posts = array();
	$spa_and_salon_options_pages_posts_obj = get_posts( $argsboth );
	$spa_and_salon_options_pages_posts[''] = __( 'Choose Posts/Page', 'spa-and-salon-pro' );
	foreach ( $spa_and_salon_options_pages_posts_obj as $spa_and_salon_pages_posts ) {
		$spa_and_salon_options_pages_posts[$spa_and_salon_pages_posts->ID] = $spa_and_salon_pages_posts->post_title;
	}
	
	/* Option list of all categories */
	$spa_and_salon_args = array(
	   'type'                     => 'post',
	   'orderby'                  => 'name',
	   'order'                    => 'ASC',
	   'hide_empty'               => 1,
	   'hierarchical'             => 1,
	   'taxonomy'                 => 'category'
	); 
	$spa_and_salon_option_categories = array();
	$spa_and_salon_category_lists = get_categories( $spa_and_salon_args );
	$spa_and_salon_option_categories[''] = __( 'Choose Category', 'spa-and-salon-pro' );
	foreach( $spa_and_salon_category_lists as $spa_and_salon_category ){
		$spa_and_salon_option_categories[$spa_and_salon_category->term_id] = $spa_and_salon_category->name;
	}
	
	/* Option list of all services */	
		 $argservices = array(
			'posts_per_page'   => -1,
			'post_type' => array( 'spa_services' ),		
		);		
	$spa_and_salon_options_services = array();
	$spa_and_salon_options_services_obj = get_posts( $argservices );
	$spa_and_salon_options_services[''] = __( 'Choose Service', 'spa-and-salon-pro' );
	foreach ( $spa_and_salon_options_services_obj as $spa_and_salon_services ) {
		$spa_and_salon_options_services[$spa_and_salon_services->ID] = $spa_and_salon_services->post_title;
	}
	
	/* Option list of all plans */	
		 $argplans = array(
			'posts_per_page'   => -1,
			'post_type' => array( 'spa_plans' ),		
		);		
	$spa_and_salon_options_plans = array();
	$spa_and_salon_options_plans_obj = get_posts( $argplans );
	$spa_and_salon_options_plans[''] = __( 'Choose Plan', 'spa-and-salon-pro' );
	foreach ( $spa_and_salon_options_plans_obj as $spa_and_salon_plans ) {
		$spa_and_salon_options_plans[$spa_and_salon_plans->ID] = $spa_and_salon_plans->post_title;
	}	
	

 
 

$panels   = array( 'home', 'slider', 'typography', 'custom' );
$sections = array( 'info', 'general', 'contact', 'breadcrumb', 'post-page', 'post-meta', 'styling', 'sidebar', 'social', 'custom', 'footer', 'testimonial','team', 'performance' );

foreach( $panels as $p ){
    require get_template_directory() . '/inc/customizer/panels/' . $p . '.php';
}

foreach( $sections as $s ){
    require get_template_directory() . '/inc/customizer/sections/' . $s . '.php';
}	

/**
 * Sanitization Functions
*/
require get_template_directory() . '/inc/customizer/sanitization-functions.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function spa_and_salon_customize_preview_js() {
	// Use minified libraries if SCRIPT_DEBUG is false
    $build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
    $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script( 'spa_and_salon_customizer', get_template_directory_uri() . '/js' . $build . '/customizer' . $suffix . '.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'spa_and_salon_customize_preview_js' );

function spa_and_salon_pro_customizer_js() {
      wp_enqueue_script( 'spa-and-salon-customizer-js', get_template_directory_uri() . '/inc/js/customizer.js', array('jquery'), '1.0.0', true  );
      //localizing for templates in the customizer
      $frontpage_url        = get_permalink( get_option( 'page_on_front' ) );
      $array = array(
          'frontpage'          => $frontpage_url,
      );

      wp_localize_script( 'spa-and-salon-customizer-js', 'spa_and_salon_pro_customizer_data', $array );
      
  }
add_action( 'customize_controls_enqueue_scripts', 'spa_and_salon_pro_customizer_js' );


/**
 * Configuration sample for the Kirki Customizer
 */
function spa_and_salon_configuration_sample_styling( $config ) {

    $config['logo_image']   = get_template_directory_uri() . '/images/logo.png';
    $config['description']  = __( 'Spa and Salon Pro : Theme For Spa and Salon.', 'spa-and-salon-pro');
    $config['color_accent'] = '#b16aab';
    $config['color_back']   = '#efe0ee';
    $config['disable_loader'] = true;

    return $config;

}
add_filter( 'kirki/config', 'spa_and_salon_configuration_sample_styling' );

/**
 * If you need to include Kirki in your theme,
 * then you may want to consider adding the translations here
 * using your textdomain.
 * 
 * If you're using Kirki as a plugin this is not needed.
 */
add_filter( 'kirki/spa_and_salon/l10n', function( $l10n ) {

	$l10n['background-color']      = esc_attr__( 'Background Color', 'spa-and-salon-pro' );
	$l10n['background-image']      = esc_attr__( 'Background Image', 'spa-and-salon-pro' );
	$l10n['no-repeat']             = esc_attr__( 'No Repeat', 'spa-and-salon-pro' );
	$l10n['repeat-all']            = esc_attr__( 'Repeat All', 'spa-and-salon-pro' );
	$l10n['repeat-x']              = esc_attr__( 'Repeat Horizontally', 'spa-and-salon-pro' );
	$l10n['repeat-y']              = esc_attr__( 'Repeat Vertically', 'spa-and-salon-pro' );
	$l10n['inherit']               = esc_attr__( 'Inherit', 'spa-and-salon-pro' );
	$l10n['background-repeat']     = esc_attr__( 'Background Repeat', 'spa-and-salon-pro' );
	$l10n['cover']                 = esc_attr__( 'Cover', 'spa-and-salon-pro' );
	$l10n['contain']               = esc_attr__( 'Contain', 'spa-and-salon-pro' );
	$l10n['background-size']       = esc_attr__( 'Background Size', 'spa-and-salon-pro' );
	$l10n['fixed']                 = esc_attr__( 'Fixed', 'spa-and-salon-pro' );
	$l10n['scroll']                = esc_attr__( 'Scroll', 'spa-and-salon-pro' );
	$l10n['background-attachment'] = esc_attr__( 'Background Attachment', 'spa-and-salon-pro' );
	$l10n['left-top']              = esc_attr__( 'Left Top', 'spa-and-salon-pro' );
	$l10n['left-center']           = esc_attr__( 'Left Center', 'spa-and-salon-pro' );
	$l10n['left-bottom']           = esc_attr__( 'Left Bottom', 'spa-and-salon-pro' );
	$l10n['right-top']             = esc_attr__( 'Right Top', 'spa-and-salon-pro' );
	$l10n['right-center']          = esc_attr__( 'Right Center', 'spa-and-salon-pro' );
	$l10n['right-bottom']          = esc_attr__( 'Right Bottom', 'spa-and-salon-pro' );
	$l10n['center-top']            = esc_attr__( 'Center Top', 'spa-and-salon-pro' );
	$l10n['center-center']         = esc_attr__( 'Center Center', 'spa-and-salon-pro' );
	$l10n['center-bottom']         = esc_attr__( 'Center Bottom', 'spa-and-salon-pro' );
	$l10n['background-position']   = esc_attr__( 'Background Position', 'spa-and-salon-pro' );
	$l10n['background-opacity']    = esc_attr__( 'Background Opacity', 'spa-and-salon-pro' );
	$l10n['on']                    = esc_attr__( 'ON', 'spa-and-salon-pro' );
	$l10n['off']                   = esc_attr__( 'OFF', 'spa-and-salon-pro' );
	$l10n['all']                   = esc_attr__( 'All', 'spa-and-salon-pro' );
	$l10n['cyrillic']              = esc_attr__( 'Cyrillic', 'spa-and-salon-pro' );
	$l10n['cyrillic-ext']          = esc_attr__( 'Cyrillic Extended', 'spa-and-salon-pro' );
	$l10n['devanagari']            = esc_attr__( 'Devanagari', 'spa-and-salon-pro' );
	$l10n['greek']                 = esc_attr__( 'Greek', 'spa-and-salon-pro' );
	$l10n['greek-ext']             = esc_attr__( 'Greek Extended', 'spa-and-salon-pro' );
	$l10n['khmer']                 = esc_attr__( 'Khmer', 'spa-and-salon-pro' );
	$l10n['latin']                 = esc_attr__( 'Latin', 'spa-and-salon-pro' );
	$l10n['latin-ext']             = esc_attr__( 'Latin Extended', 'spa-and-salon-pro' );
	$l10n['vietnamese']            = esc_attr__( 'Vietnamese', 'spa-and-salon-pro' );
	$l10n['hebrew']                = esc_attr__( 'Hebrew', 'spa-and-salon-pro' );
	$l10n['arabic']                = esc_attr__( 'Arabic', 'spa-and-salon-pro' );
	$l10n['bengali']               = esc_attr__( 'Bengali', 'spa-and-salon-pro' );
	$l10n['gujarati']              = esc_attr__( 'Gujarati', 'spa-and-salon-pro' );
	$l10n['tamil']                 = esc_attr__( 'Tamil', 'spa-and-salon-pro' );
	$l10n['telugu']                = esc_attr__( 'Telugu', 'spa-and-salon-pro' );
	$l10n['thai']                  = esc_attr__( 'Thai', 'spa-and-salon-pro' );
	$l10n['serif']                 = _x( 'Serif', 'font style', 'spa-and-salon-pro' );
	$l10n['sans-serif']            = _x( 'Sans Serif', 'font style', 'spa-and-salon-pro' );
	$l10n['monospace']             = _x( 'Monospace', 'font style', 'spa-and-salon-pro' );
	$l10n['font-family']           = esc_attr__( 'Font Family', 'spa-and-salon-pro' );
	$l10n['font-size']             = esc_attr__( 'Font Size', 'spa-and-salon-pro' );
	$l10n['font-weight']           = esc_attr__( 'Font Weight', 'spa-and-salon-pro' );
	$l10n['line-height']           = esc_attr__( 'Line Height', 'spa-and-salon-pro' );
	$l10n['font-style']            = esc_attr__( 'Font Style', 'spa-and-salon-pro' );
	$l10n['letter-spacing']        = esc_attr__( 'Letter Spacing', 'spa-and-salon-pro' );
	$l10n['top']                   = esc_attr__( 'Top', 'spa-and-salon-pro' );
	$l10n['bottom']                = esc_attr__( 'Bottom', 'spa-and-salon-pro' );
	$l10n['left']                  = esc_attr__( 'Left', 'spa-and-salon-pro' );
	$l10n['right']                 = esc_attr__( 'Right', 'spa-and-salon-pro' );
	$l10n['color']                 = esc_attr__( 'Color', 'spa-and-salon-pro' );
	$l10n['add-image']             = esc_attr__( 'Add Image', 'spa-and-salon-pro' );
	$l10n['change-image']          = esc_attr__( 'Change Image', 'spa-and-salon-pro' );
	$l10n['remove']                = esc_attr__( 'Remove', 'spa-and-salon-pro' );
	$l10n['no-image-selected']     = esc_attr__( 'No Image Selected', 'spa-and-salon-pro' );
	$l10n['select-font-family']    = esc_attr__( 'Select a font-family', 'spa-and-salon-pro' );
	$l10n['variant']               = esc_attr__( 'Variant', 'spa-and-salon-pro' );
	$l10n['subsets']               = esc_attr__( 'Subset', 'spa-and-salon-pro' );
	$l10n['size']                  = esc_attr__( 'Size', 'spa-and-salon-pro' );
	$l10n['height']                = esc_attr__( 'Height', 'spa-and-salon-pro' );
	$l10n['spacing']               = esc_attr__( 'Spacing', 'spa-and-salon-pro' );
	$l10n['ultra-light']           = esc_attr__( 'Ultra-Light 100', 'spa-and-salon-pro' );
	$l10n['ultra-light-italic']    = esc_attr__( 'Ultra-Light 100 Italic', 'spa-and-salon-pro' );
	$l10n['light']                 = esc_attr__( 'Light 200', 'spa-and-salon-pro' );
	$l10n['light-italic']          = esc_attr__( 'Light 200 Italic', 'spa-and-salon-pro' );
	$l10n['book']                  = esc_attr__( 'Book 300', 'spa-and-salon-pro' );
	$l10n['book-italic']           = esc_attr__( 'Book 300 Italic', 'spa-and-salon-pro' );
	$l10n['regular']               = esc_attr__( 'Normal 400', 'spa-and-salon-pro' );
	$l10n['italic']                = esc_attr__( 'Normal 400 Italic', 'spa-and-salon-pro' );
	$l10n['medium']                = esc_attr__( 'Medium 500', 'spa-and-salon-pro' );
	$l10n['medium-italic']         = esc_attr__( 'Medium 500 Italic', 'spa-and-salon-pro' );
	$l10n['semi-bold']             = esc_attr__( 'Semi-Bold 600', 'spa-and-salon-pro' );
	$l10n['semi-bold-italic']      = esc_attr__( 'Semi-Bold 600 Italic', 'spa-and-salon-pro' );
	$l10n['bold']                  = esc_attr__( 'Bold 700', 'spa-and-salon-pro' );
	$l10n['bold-italic']           = esc_attr__( 'Bold 700 Italic', 'spa-and-salon-pro' );
	$l10n['extra-bold']            = esc_attr__( 'Extra-Bold 800', 'spa-and-salon-pro' );
	$l10n['extra-bold-italic']     = esc_attr__( 'Extra-Bold 800 Italic', 'spa-and-salon-pro' );
	$l10n['ultra-bold']            = esc_attr__( 'Ultra-Bold 900', 'spa-and-salon-pro' );
	$l10n['ultra-bold-italic']     = esc_attr__( 'Ultra-Bold 900 Italic', 'spa-and-salon-pro' );
	$l10n['invalid-value']         = esc_attr__( 'Invalid Value', 'spa-and-salon-pro' );

	return $l10n;

} );

/**
 * Change the URL that will be used by Kirki
 * to load its assets in the customizer.
 */
if ( ! function_exists( 'spa_and_salon_kirki_update_url' ) ) {
    function spa_and_salon_kirki_update_url( $config ) {
        $config['url_path'] = get_template_directory_uri() . '/inc/kirki/';
        return $config;
    }
}
add_filter( 'kirki/config', 'spa_and_salon_kirki_update_url' );