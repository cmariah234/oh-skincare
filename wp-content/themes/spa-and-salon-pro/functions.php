<?php
/**
 * Spa and Salon functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Spa_and_Salon
 */

if ( ! function_exists( 'spa_and_salon_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function spa_and_salon_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Spa and Salon, use a find and replace
	 * to change 'spa-and-salon-pro' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'spa-and-salon-pro', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	// Custom Image Size
	set_post_thumbnail_size( 571, 373, true );
	add_image_size( 'spa-and-salon-slider', 1920, 967, true );
    add_image_size( 'spa-and-salon-blog', 780, 437, true );
    add_image_size( 'spa-and-salon-with-sidebar', 846, 515, true );
    add_image_size( 'spa-and-salon-without-sidebar', 1170, 610, true );
    add_image_size( 'spa-and-salon-featured-block', 380, 226, true );
    add_image_size( 'spa-and-salon-recent-post', 65, 65, true );
    add_image_size( 'spa-and-salon-testmonial', 380, 481, true);
    add_image_size( 'spa-and-salon-testmonial-thumb', 160, 160, true);
    add_image_size( 'spa-and-salon-service', 380, 225, true);	
    add_image_size( 'spa-and-salon-welcome-note',547, 293, true );	
    add_image_size( 'spa-and-salon-related-post',380, 225, true );			
    add_image_size( 'spa-and-salon-schema',600, 60, true );			

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'spa-and-salon-pro' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
        'status',
        'audio', 
        'chat'
	) );

	/* Custom Logo */
    add_theme_support( 'custom-logo', array(    	
		'flex-height' => true,
		'flex-width'  => true,	
		'header-text' => array( 'site-title', 'site-description' ),
    ) );


}
endif;
add_action( 'after_setup_theme', 'spa_and_salon_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function spa_and_salon_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'spa_and_salon_content_width', 780 );
}
add_action( 'after_setup_theme', 'spa_and_salon_content_width', 0 );


/**
* Adjust content_width value according to template.
*
* @return void
*/
function spa_and_salon_template_redirect_content_width() {

	// Full Width in the absence of sidebar.
	if( is_page() ){
	   $sidebar_layout = spa_and_salon_sidebar_layout();
       if( ( $sidebar_layout == 'no-sidebar' ) || ! ( is_active_sidebar( 'right-sidebar' ) ) ) $GLOBALS['content_width'] = 1170;
        
	}elseif ( ! ( is_active_sidebar( 'right-sidebar' ) ) ) {
		$GLOBALS['content_width'] = 1170;
	}

}
add_action( 'template_redirect', 'spa_and_salon_template_redirect_content_width' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function spa_and_salon_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'spa-and-salon-pro' ),
		'id'            => 'sidebar',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'spa-and-salon-pro' ),
		'id'            => 'footer-one',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'spa-and-salon-pro' ),
		'id'            => 'footer-two',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'spa-and-salon-pro' ),
		'id'            => 'footer-three',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
    if( is_woocommerce_activated() ) {	
    register_sidebar( array(
		'name'          => esc_html__( 'Woocommerce Sidebar', 'spa-and-salon-pro' ),
		'id'            => 'shop-sidebar',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );	
	}
	
	/** Dynamic sidebars */
    $sidebars = spa_and_salon_get_dynamnic_sidebar();
    foreach( $sidebars as $k => $v ){
        register_sidebar( array(
    		'name'          => esc_html( $v ),
    		'id'            => esc_attr( $k ),
    		'description'   => '',
    		'before_widget' => '<section id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</section>',
    		'before_title'  => '<h2 class="widget-title">',
    		'after_title'   => '</h2>',
    	) );
    }			
	

}
add_action( 'widgets_init', 'spa_and_salon_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function spa_and_salon_scripts() {

    // Use minified libraries if SCRIPT_DEBUG is false
    $build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
    $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	$my_theme = wp_get_theme();
    $version = $my_theme['Version'];
	$query_args = array(
		'family' => 'Marcellus|Lato:400,700',
		);
	wp_enqueue_style( 'spa-and-salon-pro-google-fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ) );
	wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/css' . $build . '/slick' . $suffix . '.css' );
    wp_enqueue_style( 'animate', get_template_directory_uri(). '/css' . $build . '/animate' . $suffix . '.css' );
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css' . $build . '/owl.carousel' . $suffix . '.css' );	
	wp_enqueue_style( 'owl-theme-default', get_template_directory_uri() . '/css' . $build . '/owl.theme.default' . $suffix . '.css' );		
	wp_enqueue_style( 'meanmenu', get_template_directory_uri().'/css' . $build . '/meanmenu' . $suffix . '.css' );
	wp_enqueue_style( 'mCustomScrollbar', get_template_directory_uri().'/css' . $build . '/jquery.mCustomScrollbar' . $suffix . '.css' );
	wp_enqueue_style( 'spa-and-salon-style', get_stylesheet_uri(), array(), $version );

    //Fancy Box
    if( get_theme_mod( 'spa_and_salon_ed_lightbox', '0' ) ){
        wp_enqueue_style( 'jquery-fancybox', get_template_directory_uri() . '/css' . $build . '/jquery.fancybox' . $suffix . '.css', array(), '3.5.2' );
        wp_enqueue_script( 'jquery-fancybox', get_template_directory_uri() . '/js' . $build . '/jquery.fancybox' . $suffix . '.js', array('jquery'), '3.5.2', true );
    }			
	
	wp_enqueue_script( 'all', get_template_directory_uri() . '/js' . $build . '/all' . $suffix . '.js', array( 'jquery' ), '5.6.3', true );
    wp_enqueue_script( 'v4-shims', get_template_directory_uri() . '/js' . $build . '/v4-shims' . $suffix . '.js', array( 'jquery' ), '5.6.3', true );

    if( is_active_widget( false, false, 'spa_and_salon_flickr_widget' ) )
    wp_enqueue_script( 'flickr', get_template_directory_uri() . '/js' . $build . '/jflickrfeed' . $suffix . '.js', array('jquery'), $version, true );
	
	if( get_theme_mod( 'ed_lazy_load', false ) || get_theme_mod( 'ed_lazy_load_cimage', false ) ) {
        wp_enqueue_script( 'layzr', get_template_directory_uri() . '/js' . $build . '/layzr' . $suffix . '.js', array('jquery'), '2.0.4', true );
    }
    
	// woocommerce css	
    if( is_woocommerce_activated() )
    wp_enqueue_style( 'spa-and-salon-woocommerce-style', get_template_directory_uri(). '/css' . $build . '/woocommerce' . $suffix . '.css', $version );	
	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/js' . $build . '/slick' . $suffix . '.js', array('jquery'), '2.6.0', true );
	wp_enqueue_script( 'meanmenu', get_template_directory_uri() . '/js' . $build . '/jquery.meanmenu' . $suffix . '.js', array('jquery'), $version, true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js' . $build . '/owl.carousel' . $suffix . '.js', array('jquery'), '2.2.1', true );	
	wp_enqueue_script( 'equalheight', get_template_directory_uri() . '/js' . $build . '/equal-height' . $suffix . '.js', array('jquery'), $version, true );
	wp_enqueue_script( 'mCustomScrollbar-js', get_template_directory_uri(). '/js' . $build . '/jquery.mCustomScrollbar' . $suffix . '.js', array('jquery'), $version, true  );

	wp_enqueue_script( 'jquery-isotopes', get_template_directory_uri() . '/js' . $build . '/isotope.pkgd' . $suffix . '.js', array('jquery'), $version, true );		
	wp_enqueue_script( 'spa-and-salon-custom-js', get_template_directory_uri() . '/js' . $build . '/custom' . $suffix . '.js', array('jquery'), $version, true );
	wp_register_script( 'spa-and-salon-ajax', get_template_directory_uri() . '/js' . $build . '/ajax' . $suffix . '.js', array('jquery'), $version, true );			
	
    $slider_auto       = get_theme_mod( 'spa_and_salon_slider_auto', '1' );
    $slider_control    = get_theme_mod( 'spa_and_salon_slider_control', '1' );
    $slider_loop       = get_theme_mod( 'spa_and_salon_slider_loop' );
    $slider_speed      = get_theme_mod( 'spa_and_salon_slider_speed', 400 );
    $slider_transition = get_theme_mod( 'spa_and_salon_slider_transition', 'slide' );    
    $ed_sticky_menu    = get_theme_mod( 'spa_and_salon_ed_sticky_menu' );
    
    $translation_array = array(
		'auto'     => esc_attr( $slider_auto ),
		'control'  => esc_attr( $slider_control ),
		'mode'     => esc_attr( $slider_transition ),
		'loop'     => absint( $slider_loop ),
		'speed'    => absint( $slider_speed ),
		'lightbox' => esc_attr( get_theme_mod( 'spa_and_salon_ed_lightbox', '0' )),
		'sticky'   => esc_attr( $ed_sticky_menu ),
		'rtl'      => is_rtl(),
		);
		
    wp_localize_script( 'spa-and-salon-custom-js', 'spa_and_salon_data', $translation_array );
    wp_enqueue_script( 'spa-and-salon-custom-js' );	
	
	// custom paginations
    $pagination = get_theme_mod( 'spa_and_salon_pagination_type', 'default' );	
	$loadmore   = get_theme_mod( 'spa_and_salon_load_more_label', __( 'Load More Posts', 'spa-and-salon-pro' ) );
    $loading    = get_theme_mod( 'spa_and_salon_loading_label', __( 'Loading...', 'spa-and-salon-pro' ) );
    
	if( $pagination == 'load_more' || $pagination == 'infinite_scroll' ){
        
        // Add parameters for the JS
        global $wp_query;
        $max = $wp_query->max_num_pages;
        $paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
        
        wp_enqueue_script( 'spa-and-salon-ajax' );
        
        wp_localize_script( 
            'spa-and-salon-ajax', 
            'spa_and_salon_ajax',
            array(
                'url'           => admin_url( 'admin-ajax.php' ),
                'startPage'     => $paged,
                'maxPages'      => $max,
                'nextLink'      => next_posts( $max, false ),
                'autoLoad'      => $pagination,
                'loadmore'      => $loadmore,
                'loading'       => $loading,
                'nomore'        => __( 'No more posts.', 'spa-and-salon-pro' ),
                'jet_gal'       => is_jetpack_activated( true ),
                'plugin_url'    => plugins_url()
             )
        );
        
        if ( is_jetpack_activated( true ) ) {
            wp_enqueue_style( 'tiled-gallery', plugins_url() . '/jetpack/modules/tiled-gallery/tiled-gallery/tiled-gallery.css' );            
        }
    }		
	// custom paginations ends			


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'spa_and_salon_scripts' );

/**
 * Enqueue google fonts
*/
function spa_and_salon_scripts_styles() {
    wp_enqueue_style( 'spa_and_salon-google-fonts', spa_and_salon_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'spa_and_salon_scripts_styles' );


/**
 * Enqueue admin scripts and styles.
 */
function spa_and_salon_admin_scripts(){
    if( function_exists( 'wp_enqueue_media' ) )
    wp_enqueue_media();
    
    wp_enqueue_style( 'spa-and-salon-admin-style', get_template_directory_uri() . '/inc/css/admin.css', '', '20160712' );
    
    wp_register_script( 'spa-and-salon-media-uploader', get_template_directory_uri() . '/inc/js/media-uploader.js' );
    wp_localize_script( 'spa-and-salon-media-uploader', 'spa_and_salon_uploader', array(
        'upload' => __( 'Upload', 'spa-and-salon-pro' ),
        'change' => __( 'Change', 'spa-and-salon-pro' ),
        'msg'    => __( 'Please upload valid image file.', 'spa-and-salon-pro' )
    ));
    
    wp_enqueue_script( 'spa-and-salon-media-uploader' );
}

add_action( 'admin_enqueue_scripts', 'spa_and_salon_admin_scripts' );

function spa_and_salon_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'spa_and_salon_woocommerce_support' );



/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Extra functions for theme
 */
require get_template_directory() . '/inc/extra.php';

/**
 * Custom functions mostly for pro version of theme
 *  
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Theme specific functions - sliders, banner, social links
 *  
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Metabox
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Custom Post Types
 */
require get_template_directory() . '/inc/custom-posts.php';

/**
 * Custom Post Taxonomies
 */
require get_template_directory() . '/inc/custom-taxonomies.php';

/**
 * Add Custom Controls
 */
require get_template_directory() . '/inc/custom-controls/custom-control.php';

/**
* If Kirki is not already installed, use the included version
*/
if ( ! class_exists( 'Kirki' ) ) {    
    require get_template_directory() . '/inc/kirki/kirki.php';
}

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Dynamic Styles
 */
require get_template_directory() . '/css/style.php';

/**
 * Kirki Typography Functions
 */
require get_template_directory() . '/inc/typography-functions.php';

/**
 * Custom Widgets
 */
require get_template_directory() . '/inc/widgets/widgets.php';

/**
 * Shortcodes
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Load theme updater functions.
 * Action is used so that child themes can easily disable.
 */
function spa_and_salon_theme_updater() {
    require( get_template_directory() . '/updater/theme-updater.php' );
}
add_action( 'after_setup_theme', 'spa_and_salon_theme_updater' );

/**
 * Plugin Recomendation
*/
require_once get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

/**
 * Demo Import
*/
require get_template_directory() . '/inc/import-hooks.php';

/**
 * Performance
*/
require get_template_directory() . '/inc/performance.php';