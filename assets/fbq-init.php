<?php
/**
 * FB Quote Plugin Initializer
 *
 * Initializes everything for the plugin.
 *
 * @since 	1.0.0
 * @package FBQ
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WPOSA Settings Initializer.
 *
 * @since 1.0.0
 */
if ( file_exists( FBQ_DIR . '/assets/wposa/wposa-init.php' ) ) {
    require_once( FBQ_DIR . '/assets/wposa/wposa-init.php' );
}


/**
 * WP_FBQ Class.
 *
 * @since 1.0.0
 */
if ( file_exists( FBQ_DIR . '/assets/class-fbq.php' ) ) {
	require_once( FBQ_DIR . '/assets/class-fbq.php' );
}


/**
 * Actions/Filters.
 */

if ( class_exists( 'WP_FBQ' ) ) {
	/**
	 * Object for `WP_FBQ` class.
	 *
	 * @var 	object
	 * @since 	1.0.0
	 */
	$fbq_obj = new WP_FBQ();

	// Hook the fb-SDK to head.
	// add_action( 'wp_enqueue_scripts', array( $fbq_obj, 'fb_sdk' ) );
	add_action( 'wp_head', array( $fbq_obj, 'fb_sdk' ) );

	// Add Fb Save button.
	add_filter( 'the_content', array( $fbq_obj, 'add_fb_quote_plugin' ) );

	// Register the shortcode [fbq]
	add_action( 'init', array( $fbq_obj, 'shortcode' ) );


} // class_exits() ended.

