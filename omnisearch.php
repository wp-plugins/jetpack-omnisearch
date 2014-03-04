<?php

/*
 * Plugin Name: Jetpack Omnisearch
 * Plugin URI: http://wordpress.org/plugins/jetpack-omnisearch/
 * Description: A single search box, that lets you search many different things.
 * Author: Anas H. Sulaiman
 * Version: 2.9
 * Author URI: http://ahs.pw/
 * Text Domain: jetpack-omnisearch
 * Domain Path: /languages/
 * License: GPL2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * Module Name: Omnisearch
 * Module Description: A single search box, that lets you search many different things.
 * Sort Order: 8
 * First Introduced: 2.3
 * Requires Connection: No
 * Auto Activate: Yes
 * Module Tags: Developers
 */

// Only do Jetpack Omnisearch if there isn't already a Core WP_Omnisearch Class.
if ( ! class_exists( 'WP_Omnisearch' ) )
	require_once( dirname( __FILE__ ) . '/omnisearch/omnisearch-core.php' );

// E-1 {
function jetpack_omnisearch_load_textdomain() {
	load_plugin_textdomain( 'jetpack-omnisearch', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'jetpack_omnisearch_load_textdomain' );
// }

// E-2 {
function jetpack_omnisearch_link($actions) {
	return array_merge(
		array( 'settings' => sprintf( '<a href="%s">%s</a>', 'admin.php?page=omnisearch', __( 'Search', 'jetpack-omnisearch' ) ) ),
		$actions
	);
	return $actions;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'jetpack_omnisearch_link' );
// }

/*
Edits by Anas H. Sulaiman:
E-1 : load text domain
E-2 : add search link
*/
