<?php
/**
 * WP OOP Settings API
 * Description: WP-OOP-Settings-API is a Settings API wrapper built with Object Oriented Programming practices.
 * Author: mrahmadawais, WPTie
 * Author URI: http://AhmadAwais.com/
 * Version: 1.0.0
 * License: GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package WPOSA
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * WP-OOP-Settings-API Initializer
 *
 * Initializes the WP-OOP-Settings-API.
 *
 * @since 	1.0.0
 */


/**
 * Class `WP_OSA_FBQ`.
 *
 * @since 1.0.0
 */
if ( file_exists( FBQ_DIR . '/assets/wposa/class-wposa.php' ) ) {
    require_once( FBQ_DIR . '/assets/wposa/class-wposa.php' );
}


/**
 * Actions/Filters
 *
 * Related to all settings API.
 *
 * @since  1.0.0
 */
if ( class_exists( 'WP_OSA_FBQ' ) ) {
	/**
	 * Object Instantiation.
	 *
	 * Object for the class `WP_OSA_FBQ`.
	 */
	$wposa_obj = new WP_OSA_FBQ();

    // Section: Basic Settings.
    $wposa_obj->add_section(
    	array(
			'id'    => 'fbq_settings',
			'title' => __( 'Settings', 'FBQ' ),
		)
    );

    // Posts.
	$wposa_obj->add_field(
		'fbq_settings',
		array(
			'id'      => 'fbq_is_posts',
			'type'    => 'checkbox',
			'name'    => __( 'Enable on Posts:', 'FBQ' ),
			'desc'    => __( '(Check to enable FB Quote Plugin on posts).', 'FBQ' ),
			'default' => 0
		)
	);


    // Pages.
	$wposa_obj->add_field(
		'fbq_settings',
		array(
			'id'      => 'fbq_is_pages',
			'type'    => 'checkbox',
			'name'    => __( 'Enable on Pages:', 'FBQ' ),
			'desc'    => __( '(Check to enable FB Quote Plugin on pages).', 'FBQ' ),
			'default' => 0
		)
	);


    // Shortcode.
    $shortcode_content  = '<h4>FB Quote Plugin Shortcode</h4>';
    $shortcode_content .= '<p>You can use <code>[fbq]</code> shortcode to add fb save button anywhere you want.</p>';
    $shortcode_content .= '<p><strong>Example Usage:</strong> <code>[fbq]</code></p>';
    $shortcode_content .= '<p>Wherever this shortcode gets included, users will be able to share the content of that area to Facebook with FB Quote Plugin. It can be used inside the content area where ever the shortcodes .</p>';

	$wposa_obj->add_field(
		'fbq_settings',
		array(
			'id'      => 'info',
			'type'    => 'html',
			'name'    => __( 'Shortcode [fbq]:', 'FBQ' ),
			'desc'    => $shortcode_content,
		)
	);

}
