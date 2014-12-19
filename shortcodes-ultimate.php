<?php
/*
  Plugin Name: Shortcodes Ultimate
  Plugin URI: http://gndev.info/shortcodes-ultimate/
  Version: 4.9.2
  Author: Vladimir Anokhin
  Author URI: http://gndev.info/
  Description: Supercharge your WordPress theme with mega pack of shortcodes
  Text Domain: su
  Domain Path: /languages
  License: GPL
 */

// Define plugin constants
define( 'SU_PLUGIN_FILE', __FILE__ );
define( 'SU_PLUGIN_VERSION', '4.9.2' );
define( 'SU_ENABLE_CACHE', false );
define( 'SU_PLUGIN_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );

// Includes
require_once 'inc/vendor/sunrise.php';
require_once 'inc/core/admin-views.php';
require_once 'inc/core/requirements.php';
require_once 'inc/core/load.php';
require_once 'inc/core/assets.php';
// require_once 'inc/core/shortcodes.php';
require_once 'inc/core/cherry-shortcodes.php';
require_once 'inc/core/tools.php';
// require_once 'inc/core/data.php';
require_once 'inc/core/cherry-data.php';
// require_once 'inc/core/generator-views.php';
require_once 'inc/core/cherry-generator-views.php';
require_once 'inc/core/generator.php';
require_once 'inc/core/widget.php';
// require_once 'inc/core/vote.php'; // disable vote
require_once 'inc/core/counters.php';

/**
 * Default filters
 */
add_filter( 'su_tools_get_types', 'cherry_shortcodes_unset_type' );
function cherry_shortcodes_unset_type( $types ) {
	unset( $types['nav_menu_item'] );

	return $types;
}

add_filter( 'su_tools_get_taxonomies', 'cherry_shortcodes_unset_taxonomy' );
function cherry_shortcodes_unset_taxonomy( $taxes ) {
	unset( $taxes['nav_menu'] );
	unset( $taxes['link_category'] );

	return $taxes;
}

// add_filter( 'cherry_shortcodes_output', 'cherry_shortcodes_container_wrap', 10, 3 );
function cherry_shortcodes_container_wrap( $output, $atts, $shortcode ) {

	if ( !isset( $atts['type'] ) ) {
		return $output;
	}

	$container = sanitize_key( $atts['type'] );
	$container = ( 'fixed-width' === $container ) ? 'container' : 'container-fluid';
	$output    = sprintf( '<div class="%1$s">%2$s</div>', $container, $output );

	return $output;
}

/**
 * Not use `wptexturize` in content and excerpt.
 * Removed temporary.
 * @link  https://core.trac.wordpress.org/ticket/29557
 */
remove_filter( 'the_content', 'wptexturize' );
remove_filter( 'the_excerpt', 'wptexturize' );