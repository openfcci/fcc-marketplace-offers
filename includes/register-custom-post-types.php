<?php

/**
 * Register the Custom Post Types & Custom Taxonomies
 *
 * @since 10.28.2016
 */

/*--------------------------------------------------------------
 # Marketplace Campaign CUSTOM POST TYPE. (Slug: 'marketplace_campaign')
 --------------------------------------------------------------*/

 add_action( 'init', 'fccmpo_register_my_cpts' );
 function fccmpo_register_my_cpts() {
 	$labels = array(
 		"name" => __( 'Marketplace Campaigns', 'areavoices' ),
 		"singular_name" => __( 'Marketplace Campaign', 'areavoices' ),
 		"menu_name" => __( 'Marketplace Campaigns', 'areavoices' ),
 		"all_items" => __( 'All Marketplace Campaigns', 'areavoices' ),
 		"add_new" => __( 'Add New Campaign', 'areavoices' ),
 		"add_new_item" => __( 'Add New Marketplace Campaign', 'areavoices' ),
 		"edit_item" => __( 'Edit Marketplace Campaign', 'areavoices' ),
 		"new_item" => __( 'New Marketplace Campaign', 'areavoices' ),
 		"view_item" => __( 'View Marketplace Campaign', 'areavoices' ),
 		"search_items" => __( 'Search Marketplace Campaign', 'areavoices' ),
 		"not_found" => __( 'No Marketplace Campaigns Found', 'areavoices' ),
 		"not_found_in_trash" => __( 'No Marketplace Campaigns found in Trash', 'areavoices' ),
 		"parent_item_colon" => __( 'Parent Marketplace Campaign', 'areavoices' ),
 		"featured_image" => __( 'Featured Image for Marketplace Campaign', 'areavoices' ),
 		"set_featured_image" => __( 'Set featured image for this Marketplace Campaign', 'areavoices' ),
 		"remove_featured_image" => __( 'Remove featured image for this Marketplace Campaign', 'areavoices' ),
 		"use_featured_image" => __( 'Use as featured image for this Marketplace Campaign', 'areavoices' ),
 		"archives" => __( 'Marketplace Campaigns Archive', 'areavoices' ),
 		"insert_into_item" => __( 'Insert into Marketplace Campaign', 'areavoices' ),
 		"uploaded_to_this_item" => __( 'Upload to this Marketplace Campaign', 'areavoices' ),
 		"filter_items_list" => __( 'Filter Marketplace Campaigns List', 'areavoices' ),
 		"items_list_navigation" => __( 'Marketplace Campaigns list navigation', 'areavoices' ),
 		"items_list" => __( 'Marketplace Campaigns List', 'areavoices' ),
 		"parent_item_colon" => __( 'Parent Marketplace Campaign', 'areavoices' ),
 		);

 	$args = array(
 		"label" => __( 'Marketplace Campaigns', 'areavoices' ),
 		"labels" => $labels,
 		"description" => "Marketplace Offers campaign post type.",
 		"public" => true,
 		"publicly_queryable" => true,
 		"show_ui" => true,
 		"show_in_rest" => true,
 		"rest_base" => "marketplace_campaign",
 		"has_archive" => true,
 		"show_in_menu" => true,
 				"exclude_from_search" => false,
 		"capability_type" => "post",
 		"map_meta_cap" => true,
 		"hierarchical" => false,
 		"rewrite" => array( "slug" => "marketplace-campaign", "with_front" => true ),
 		"query_var" => true,
 		"menu_icon" => "dashicons-store",
 		"supports" => array( "title", "editor", "thumbnail" ),
 		"taxonomies" => array( "marketplace_client" ),
 			);
 	register_post_type( "marketplace_campaign", $args );

 // End of fccmpo_register_my_cpts()
 }


 /*--------------------------------------------------------------
  # Marketplace Campaign CUSTOM POST TYPE. (Slug: 'marketplace_campaign')
  --------------------------------------------------------------*/

	add_action( 'init', 'fccmpo_register_my_taxes' );
	function fccmpo_register_my_taxes() {
		$labels = array(
			"name" => __( 'Clients', 'areavoices' ),
			"singular_name" => __( 'Marketplace Client', 'areavoices' ),
			"menu_name" => __( 'Marketplace Clients', 'areavoices' ),
			"all_items" => __( 'All Clients', 'areavoices' ),
			"edit_item" => __( 'Edit Client', 'areavoices' ),
			"view_item" => __( 'View Client', 'areavoices' ),
			"update_item" => __( 'Update Client Name', 'areavoices' ),
			"add_new_item" => __( 'Add New Client', 'areavoices' ),
			"new_item_name" => __( 'New Client Name', 'areavoices' ),
			"parent_item" => __( 'Parent Client', 'areavoices' ),
			"parent_item_colon" => __( 'Parent Client:', 'areavoices' ),
			"search_items" => __( 'Search Marketplace Clients', 'areavoices' ),
			"popular_items" => __( 'Popular Marketplace Clients', 'areavoices' ),
			"separate_items_with_commas" => __( 'Separate Clients with commas', 'areavoices' ),
			"add_or_remove_items" => __( 'Add or remove Clients', 'areavoices' ),
			"choose_from_most_used" => __( 'Choose from the most used Clients', 'areavoices' ),
			"not_found" => __( 'No Clients found', 'areavoices' ),
			"no_terms" => __( 'No Clients', 'areavoices' ),
			"items_list_navigation" => __( 'Client list navigation', 'areavoices' ),
			"items_list" => __( 'Clients list', 'areavoices' ),
			);

		$args = array(
			"label" => __( 'Clients', 'areavoices' ),
			"labels" => $labels,
			"public" => true,
			"hierarchical" => false,
			"label" => "Clients",
			"show_ui" => true,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"query_var" => true,
			"rewrite" => array( 'slug' => 'marketplace-client', 'with_front' => true, ),
			"show_admin_column" => true,
			"show_in_rest" => true,
			"rest_base" => "",
			"show_in_quick_edit" => false,
		);
		register_taxonomy( "marketplace_client", array( "marketplace_campaign" ), $args );

	// End fccmpo_register_my_taxes()
	}
