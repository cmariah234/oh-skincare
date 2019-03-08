<?php
/**
 * Theme Dependent Custom Post type
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Spa_and_Salon
 * 
 * Post Types
 *  
 * spa_service / service
 * spa_testimonials / testimonials
 * spa_plans / plan
 * 
 *   
 */
 
if ( ! function_exists('spa_and_salon_post_type') ) { 
 
 	function all_custom_post_types() {

 		$types = array(
					array(
						'the_type' => 'spa_services',
						'single' => 'Service',
						'plural' => 'Services',
						'desc' => 'Spa and Salon Services',						
						'icon' => 'dashicons-cart',
						'slug' => 'service',						
					),
					array(
						'the_type' => 'spa_testimonials',
						'single' => 'Testimonial',
						'plural' => 'Testimonials',
						'desc' => 'Spa and Salon Testimonials',						
						'icon' => 'dashicons-awards',
						'slug' => 'testimonial'
					),		
					array(
						'the_type' => 'spa_plans',
						'single' => 'Plan',
						'plural' => 'Plans',
						'desc' => 'Spa and Salon Plans',
						'icon' => 'dashicons-chart-bar',
						'slug' => 'plan'
					),				
					array(
						'the_type' => 'spa_team',
						'single' => 'Team',
						'plural' => 'Teams',
						'desc' => 'Spa and Salon Team',
						'icon' => 'dashicons-networking',
						'slug' => 'team'
					),												
 		);

		foreach ($types as $type) {
			$the_type = $type['the_type'];
			$single = $type['single'];
			$plural = $type['plural'];
			$desc = $type['desc'];			
			$icon = $type['icon'];						
			$slug = $type['slug'];									
	
			$labels = array(
				'name' => $plural,
				'singular_name' => $single,
				'add_new' => sprintf( __('Add New %s', 'spa-and-salon-pro'), $single ),
				'add_new_item' => sprintf( __('Add New %s', 'spa-and-salon-pro'), $single ),
				'edit_item' => sprintf( __('Edit %s', 'spa-and-salon-pro'), $single ),
				'new_item' => sprintf( __('New %s', 'spa-and-salon-pro'), $single ),
				'view_item' => sprintf( __('View %s', 'spa-and-salon-pro'), $single ),
				'search_items' => sprintf( __('Search %s', 'spa-and-salon-pro'), $plural ),
				'not_found' =>  __('No Item found', 'spa-and-salon-pro'),
				'not_found_in_trash' => __('No Items found in Trash', 'spa-and-salon-pro'),
				'parent_item_colon' => ''
			  );
			  
			$rewrite = array(
				'slug'                  => $slug,
				'with_front'            => true,
				'pages'                 => true,
				'feeds'                 => true,
			);			  
	
			  $args = array(
				'labels' => $labels,
				'description' => $desc,				
				'menu_icon'   => $icon,				
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'query_var' => true,
				'capability_type' => 'post',
				'hierarchical' => false,
				'menu_position' => 20,
				'can_export' => true,				
				'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail' ),
//				'taxonomies' => array( 'post_tag'),
				'rewrite'  => $rewrite,
			  );
			  register_post_type($the_type, $args);
		}
 	}
	
	add_action('init', 'all_custom_post_types');	
	
}	