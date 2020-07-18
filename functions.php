<?php
/**
 * Theme functions
 *
 * Starter child theme for the default website management theme.
 *
 * @package    system
 * @subpackage AB_Child
 * @link       https://github.com/antibrand/child
 * @since      1.0.0
 */

// Namespace specificity for theme functions & filters.
namespace AB_Child\Functions;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme functions class
 *
 * @since  1.0.0
 * @access public
 */
final class Functions {

	/**
	 * Return the instance of the class
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {

			$instance = new self;

		}

		return $instance;
	}

	/**
	 * Constructor magic method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		// Frontend styles.
		add_action( 'wp_enqueue_scripts', [ $this, 'frontend_styles' ] );

	}

	/**
	 * Frontend styles
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function frontend_styles() {

		$parent_style = 'antibrand';
		wp_enqueue_style( $parent_style, get_parent_theme_file_uri( '/assets/css/style.min.css' ) );

		/**
		 * Theme sylesheet
		 *
		 * This enqueues the minified stylesheet compiled from SASS (.scss) files.
		 * The main stylesheet, in the root directory, only contains the theme header but
		 * it is necessary for theme activation. DO NOT delete the main stylesheet!
		 */
		wp_enqueue_style( 'antibrand-child', get_theme_file_uri( '/assets/css/style.min.css' ), [], '' );

	}

}

/**
 * Get an instance of the Functions class
 *
 * This function is useful for quickly grabbing data
 * used throughout the theme.
 *
 * @since  1.0.0
 * @access public
 * @return object
 */
function ab_child() {

	$ab_child = Functions::get_instance();

	return $ab_child;

}

// Run the Functions class.
ab_child();