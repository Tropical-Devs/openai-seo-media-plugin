<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://yoviajocr.com
 * @since      1.0.0
 *
 * @package    Openai_Seo_Media_Plugin
 * @subpackage Openai_Seo_Media_Plugin/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Openai_Seo_Media_Plugin
 * @subpackage Openai_Seo_Media_Plugin/includes
 * @author     Dagoberto Medina <dagoberto.medina@tropicaldevs.com>
 */
class Openai_Seo_Media_Plugin_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'openai-seo-media-plugin',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
