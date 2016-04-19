<?php
/**
 * WP_FBQ class
 *
 * Class for working of this plugin.
 *
 * @since 	1.0.0
 * @package FBQ
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WP_FBQ.
 *
 * Class for FB save button.
 *
 * @since 1.0.0
 */

if ( ! class_exists( 'WP_FBQ' ) ) :

class WP_FBQ {

	/**
	 * Settings.
	 *
	 * @var 	array
	 * @since 	1.0.0
	 */
	private $fbq_settings;


	/**
	 * Is Posts.
	 *
	 * @var 	int
	 * @since 	1.0.0
	 */
	private $is_posts;


	/**
	 * Is Pages.
	 *
	 * @var 	int
	 * @since 	1.0.0
	 */
	private $is_pages;


	/**
	 * Content hodler.
	 *
	 * @var 	mixed
	 * @since 	1.0.0
	 */
	private $fbq_content;


	/**
	 * Constructor.
	 *
	 * @since  1.0.0
	 */
	public function __construct() {
		// Initialize settings.
		$this->fbq_settings = get_option( 'fbq_settings' );
		$this->fbq_settings = isset( $this->fbq_settings ) && is_array( $this->fbq_settings ) ? $this->fbq_settings : false;

		// Get is_posts.
		$this->is_posts     = $this->fbq_settings['fbq_is_posts'];
		$this->is_posts     = isset( $this->is_posts ) ? $this->is_posts : 'off';

		// Get is_pages.
		$this->is_pages     = $this->fbq_settings['fbq_is_pages'];
		$this->is_pages     = isset( $this->is_pages ) ? $this->is_pages : 'off';
	}


	/**
	 * Enqueue Script.
	 *
	 * @since 1.0.0
	 */
	public function fb_sdk() {
		if ( 'on' == $this->is_posts || 'on' == $this->is_pages || shortcode_exists( 'fbq' ) ) {
			?>
				<script>
					(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=119899291446416";
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));

				</script>
			<?php
		}
	} // fb_sdk() ended.


	/**
	 * Add Fb Quote Plugin.
	 *
	 * @since 1.0.0
	 */
	public function add_fb_quote_plugin( $content ) {
		// Get the $post.
		global $post;

		// For posts.
		if ( 'on' == $this->is_posts && is_single( $post->ID ) ) {
			// $this->fbq_content  = 'FBQ Posts working <br>';
			// $this->fbq_content .= $this->is_posts;
			$this->fbq_content  = '<div id="fb-root"></div>';
			$this->fbq_content .= '<div class="fb-quote"></div>';
			$this->fbq_content .= $content;
			return $this->fbq_content;
		}

		// For pages.
		if ( 'on' == $this->is_pages && is_page( $post->ID ) ) {
			// $this->fbq_content  = 'FBQ Pages working<br>';
			// $this->fbq_content .= $this->is_pages;
			$this->fbq_content  = '<div id="fb-root"></div>';
			$this->fbq_content .= '<div class="fb-quote"></div>';
			$this->fbq_content .= $content;
			return $this->fbq_content;
		}

		// If nothing from both of the check then simply return the content.
		return $content;

	} // add_fb_quote_plugin() ended.


	/**
	 * [fbq] Shortcode.
	 *
	 * @since 1.0.0
	 */
	public function shortcode() {
		/**
		 * Shortcode: `[fbq]`.
		 *
		 * @since 1.0.0
		 */
		add_shortcode( 'fbq', function () {
			return '<div id="fb-root"></div><div class="fb-quote"></div>';
		} );// annonymous function and action ended.

	}


} // Class WP_FBQ ended.

endif;
