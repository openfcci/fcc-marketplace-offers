<?php
/**
 * Plugin Name: FCC Marketplace Offers
 * Description: Marketplace Offers custom post type plugin for the AreaVoices theme.
 * Plugin URI:  https://github.com/openfcci/fcc-marketplace-offers
 * Author:      Forum Communications Company
 * Author URI:  http://www.forumcomm.com/
 * License:     GPL v2 or later
 * Version:     0.16.10.28
 */

# Exit if accessed directly
defined( 'ABSPATH' ) || exit;

# Declare Constants
define( 'FCCMPO__PLUGIN_PATH', plugin_dir_path( __FILE__ ) ); // directory poth
define( 'FCCMPO__PLUGIN_DIR',  plugin_dir_url( __FILE__ ) ); // full URL

/*--------------------------------------------------------------
# PLUGIN ACTIVATION/DEACTIVATION HOOKS
--------------------------------------------------------------*/

/**
 * Plugin Activation Hook
 */
function fccmpo_plugin_template_plugin_activation() {
	flush_rewrite_rules(); // Flush our rewrite rules on activation.
}
register_activation_hook( __FILE__, 'fccmpo_plugin_template_plugin_activation' );

/**
 * Plugin Deactivation Hook
 */
function fccmpo_plugin_template_plugin_deactivation() {
	flush_rewrite_rules(); // Flush our rewrite rules on deactivation.
}
register_deactivation_hook( __FILE__, 'fccmpo_plugin_template_plugin_deactivation' );


/*--------------------------------------------------------------
# Remove Dashboard Menu Items
--------------------------------------------------------------*/
add_action( 'admin_menu', 'my_remove_menu_pages', 999 );
function my_remove_menu_pages() {
	remove_menu_page( 'edit-comments.php' );
}

/*--------------------------------------------------------------
# LOAD INCLUDES FILES
--------------------------------------------------------------*/

# Register Custom Post Types & Taxonomies
require_once( plugin_dir_path( __FILE__ ) . '/includes/register-custom-post-types.php' );

# Hide ACF field group dashboard menu item
add_filter( 'acf/settings/show_admin', '__return_false' ); // TODO: uncomment for release

# Include ACF
include_once( plugin_dir_path( __FILE__ ) . 'includes/advanced-custom-fields-pro/acf.php' );

# Save Local JSON
add_filter( 'acf/settings/save_json', 'fccmpo_acf_json_save_point' );
function fccmpo_acf_json_save_point( $path ) {
	return FCCMPO__PLUGIN_PATH . 'includes/acf-json';
}

# Load Local JSON
add_filter( 'acf/settings/load_json', 'fccmpo_acf_json_load_point' );
function fccmpo_acf_json_load_point( $paths ) {
	$paths[] = FCCMPO__PLUGIN_PATH . 'includes/acf-json';
	return $paths;
}

/*------------------------------------------------------------------------------
# Remove Metaboxes
------------------------------------------------------------------------------*/

/*
 * Hide 'Tags' metabox from Post Editor
 */
function fccmpo_hide_publishing_actions() {

	global $post;
	if ( 'marketplace_campaign' == $post->post_type ) {
		echo '
			<style type="text/css">
					#tagsdiv-marketplace_client{
							display:none;
					}
			</style>
			';
	}
}
add_action( 'admin_head-post.php', 'fccmpo_hide_publishing_actions' );
add_action( 'admin_head-post-new.php', 'fccmpo_hide_publishing_actions' );

/*
 * Hide 'Tags' metabox from Post Editor
 */
function fccmpo_hide_client_term_fields() {
	$screen = get_current_screen();
	PC::debug( $screen, 'get_current_screen' );
		echo '
			<style type="text/css">
					.taxonomy-marketplace_client .term-slug-wrap,
					.taxonomy-marketplace_client .term-description-wrap,
					.taxonomy-marketplace_client .tagcloud {
							display: none !important;
					}
			</style>
			';
}
add_action( 'admin_head-edit-tags.php', 'fccmpo_hide_client_term_fields' );
add_action( 'admin_head-term.php', 'fccmpo_hide_client_term_fields' );
