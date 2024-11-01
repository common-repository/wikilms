<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly   

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://devthrow.com
 * @since      1.0.0
 *
 * @package    Wikilms
 * @subpackage Wikilms/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wikilms
 * @subpackage Wikilms/includes
 * @author     Devthrow <help.devthrow@gmail.com>
 */
class Wikilms_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wikilms',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
