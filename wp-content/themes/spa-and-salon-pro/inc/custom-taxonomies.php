<?php
/**
 * Theme Dependent Custom Post Taxonomoies
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Spa_and_Salon
 * 
 * @param spa_service_category 
 * @param spa_plan_category 
 *  
 *    
 */
 
if ( ! function_exists( 'spa_and_salon_service_category' ) ) {

// Register Service Category Taxonomy
function spa_and_salon_service_category() {

	$labels = array(
		'name'                       => _x( 'Service Categories', 'Taxonomy General Name', 'spa-and-salon-pro' ),
		'singular_name'              => _x( 'Service Category', 'Taxonomy Singular Name', 'spa-and-salon-pro' ),
		'menu_name'                  => __( 'Service Categories', 'spa-and-salon-pro' ),
		'all_items'                  => __( 'All Service Categories', 'spa-and-salon-pro' ),
		'parent_item'                => __( 'Parent Service Category', 'spa-and-salon-pro' ),
		'parent_item_colon'          => __( 'Parent Item:', 'spa-and-salon-pro' ),
		'new_item_name'              => __( 'New Service Category', 'spa-and-salon-pro' ),
		'add_new_item'               => __( 'Add New Service Category', 'spa-and-salon-pro' ),
		'edit_item'                  => __( 'Edit Service Category', 'spa-and-salon-pro' ),
		'update_item'                => __( 'Update Service Category', 'spa-and-salon-pro' ),
		'view_item'                  => __( 'View Service Category', 'spa-and-salon-pro' ),
		'separate_items_with_commas' => __( 'Separate service categories with commas', 'spa-and-salon-pro' ),
		'add_or_remove_items'        => __( 'Add or remove service categories', 'spa-and-salon-pro' ),
		'choose_from_most_used'      => __( 'Choose from the most used service categories', 'spa-and-salon-pro' ),
		'popular_items'              => __( 'Popular Service Categories', 'spa-and-salon-pro' ),
		'search_items'               => __( 'Search Service Categories', 'spa-and-salon-pro' ),
		'not_found'                  => __( 'Not Found', 'spa-and-salon-pro' ),
		'no_terms'                   => __( 'No Service Category', 'spa-and-salon-pro' ),
		'items_list'                 => __( 'Items Service Category', 'spa-and-salon-pro' ),
		'items_list_navigation'      => __( 'Service Categories list navigation', 'spa-and-salon-pro' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'spa_service_category', array( 'spa_services' ), $args );

}
add_action( 'init', 'spa_and_salon_service_category', 0 );

}

// Register Plan Category Taxonomy
if ( ! function_exists( 'spa_and_salon_plan_category' ) ) {

function spa_and_salon_plan_category() {

	$labels = array(
		'name'                       => _x( 'Plan Categories', 'Taxonomy General Name', 'spa-and-salon-pro' ),
		'singular_name'              => _x( 'Plan Category', 'Taxonomy Singular Name', 'spa-and-salon-pro' ),
		'menu_name'                  => __( 'Plan Categories', 'spa-and-salon-pro' ),
		'all_items'                  => __( 'All Plan Categories', 'spa-and-salon-pro' ),
		'parent_item'                => __( 'Parent Plan Category', 'spa-and-salon-pro' ),
		'parent_item_colon'          => __( 'Parent Item:', 'spa-and-salon-pro' ),
		'new_item_name'              => __( 'New Plan Category', 'spa-and-salon-pro' ),
		'add_new_item'               => __( 'Add New Plan Category', 'spa-and-salon-pro' ),
		'edit_item'                  => __( 'Edit Plan Category', 'spa-and-salon-pro' ),
		'update_item'                => __( 'Update Plan Category', 'spa-and-salon-pro' ),
		'view_item'                  => __( 'View Plan Category', 'spa-and-salon-pro' ),
		'separate_items_with_commas' => __( 'Separate plan categories with commas', 'spa-and-salon-pro' ),
		'add_or_remove_items'        => __( 'Add or remove plan categories', 'spa-and-salon-pro' ),
		'choose_from_most_used'      => __( 'Choose from the most used plan categories', 'spa-and-salon-pro' ),
		'popular_items'              => __( 'Popular plan Categories', 'spa-and-salon-pro' ),
		'search_items'               => __( 'Search plan Categories', 'spa-and-salon-pro' ),
		'not_found'                  => __( 'Not Found', 'spa-and-salon-pro' ),
		'no_terms'                   => __( 'No plan Category', 'spa-and-salon-pro' ),
		'items_list'                 => __( 'Items plan Category', 'spa-and-salon-pro' ),
		'items_list_navigation'      => __( 'plan Categories list navigation', 'spa-and-salon-pro' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'spa_plan_category', array( 'spa_plans' ), $args );

}
add_action( 'init', 'spa_and_salon_plan_category', 0 );

}