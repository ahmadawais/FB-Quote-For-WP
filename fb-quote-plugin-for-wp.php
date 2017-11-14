<?php
/**
 * Plugin Name: FB Quote Plugin for WP
 * Plugin URI: https://github.com/WPTie/FB-Quote-Plugin-For-WP
 * Description: It lets people select text on your page and add it to their share on FB, so they can tell a more expressive story.
 * Author: WPCouple(Ahmad Awais & Maedah Batool)
 * Author URI: https://WPCouple.com/
 * Version: 1.0.0
 * License: GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package FBQ
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Define global constants.
 *
 * @since 1.0.0
 */
// Plugin version.
if ( ! defined( 'FBQ_VERSION' ) ) {
    define( 'FBQ_VERSION', '1.0.0' );
}

if ( ! defined( 'FBQ_NAME' ) ) {
    define( 'FBQ_NAME', trim( dirname( plugin_basename( __FILE__ ) ), '/' ) );
}

if ( ! defined('FBQ_DIR' ) ) {
    define( 'FBQ_DIR', WP_PLUGIN_DIR . '/' . FBQ_NAME );
}

if ( ! defined('FBQ_URL' ) ) {
    define( 'FBQ_URL', WP_PLUGIN_URL . '/' . FBQ_NAME );
}


/**
 * Plugin Initializer.
 *
 * @since 1.0.0
 */
if ( file_exists( FBQ_DIR . '/assets/fbq-init.php' ) ) {
    require_once( FBQ_DIR . '/assets/fbq-init.php' );
}
