<?php

// Custom Post Types and Structures

// Register Problems as a Custom Post Type
function cds_problems_post_type() {

	$labels = array(
		'name'                  => _x( 'Problems', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Problem', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Problems', 'text_domain' ),
		'name_admin_bar'        => __( 'Problem', 'text_domain' ),
		'archives'              => __( 'Problem Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Problem:', 'text_domain' ),
		'all_items'             => __( 'All Problems', 'text_domain' ),
		'add_new_item'          => __( 'Add New Problems', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Problem', 'text_domain' ),
		'edit_item'             => __( 'Edit Problem', 'text_domain' ),
		'update_item'           => __( 'Update Problem', 'text_domain' ),
		'view_item'             => __( 'View Problem', 'text_domain' ),
		'search_items'          => __( 'Search Problems', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Problem', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Problem', 'text_domain' ),
		'items_list'            => __( 'Problems list', 'text_domain' ),
		'items_list_navigation' => __( 'Problems list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Problems list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'problems',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Problem', 'text_domain' ),
		'description'           => __( 'Problem Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'revisions', 'custom-fields', 'page-attributes','post-formats' ),
		'taxonomies'			=> array('category'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-list-view',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'cds_problem_single', $args );

}
add_action( 'init', 'cds_problems_post_type', 0 ); 


// Register Problem Status Taxonomy
function cds_problem_status_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Problem Statuses', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Problem Status', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Problem Statuses', 'text_domain' ),
		'all_items'                  => __( 'All Problem Statuses', 'text_domain' ),
		'parent_item'                => __( 'Problem Status', 'text_domain' ),
		'parent_item_colon'          => __( 'Problem Status:', 'text_domain' ),
		'new_item_name'              => __( 'New Problem Status', 'text_domain' ),
		'add_new_item'               => __( 'Add New Problem Status', 'text_domain' ),
		'edit_item'                  => __( 'Edit Problem Status', 'text_domain' ),
		'update_item'                => __( 'Update Problem Status', 'text_domain' ),
		'view_item'                  => __( 'View Problem Status', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate problem statuses with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove problem statuses', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used problem statuses', 'text_domain' ),
		'popular_items'              => __( 'Popular Problem Statuses', 'text_domain' ),
		'search_items'               => __( 'Search problem statuses', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No problem statuses', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'cds_problem_status', array( 'cds_problem_single' ), $args );

}
add_action( 'init', 'cds_problem_status_taxonomy', 0 );

// Register Sponsors as a Custom Post Type
function cds_sponsors_post_type() {

	$labels = array(
		'name'                  => _x( 'Sponsors', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Sponsor', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Sponsors', 'text_domain' ),
		'name_admin_bar'        => __( 'Sponsor', 'text_domain' ),
		'archives'              => __( 'Sponsor Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Sponsor:', 'text_domain' ),
		'all_items'             => __( 'All Sponsors', 'text_domain' ),
		'add_new_item'          => __( 'Add New Sponsors', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Sponsor', 'text_domain' ),
		'edit_item'             => __( 'Edit Sponsor', 'text_domain' ),
		'update_item'           => __( 'Update Sponsor', 'text_domain' ),
		'view_item'             => __( 'View Sponsor', 'text_domain' ),
		'search_items'          => __( 'Search Sponsors', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Sponsor', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Sponsor', 'text_domain' ),
		'items_list'            => __( 'Sponsors list', 'text_domain' ),
		'items_list_navigation' => __( 'Sponsors list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Sponsors list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'sponsors',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Sponsor', 'text_domain' ),
		'description'           => __( 'Sponsor Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'revisions', 'custom-fields', 'page-attributes','post-formats' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-users',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'cds_sponsor_single', $args );

}
add_action( 'init', 'cds_sponsors_post_type', 0 ); 

?>