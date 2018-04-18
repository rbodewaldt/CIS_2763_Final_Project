<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       rbodewaldt1.example.com
 * @since      1.0.0
 *
 * @package    Directforstaff
 * @subpackage Directforstaff/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Directforstaff
 * @subpackage Directforstaff/includes
 * @author     Robert Bodewaldt <rbodewaldt1@cnm.edu>
 */
class Directforstaff_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'directforstaff',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
