<?php
/**
 * Plugin Name: OpenAI SEO Media Generator
 * Description: Genera títulos, descripciones, alt, SEO-friendly para los archivos multimedia usando la API de OpenAI.
 * Version: 1.0
 * Author: Dagoberto Medina
 * Author URI: https://tropicaldevs.com
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'OPENAI_SEO_MEDIA_PLUGIN_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-openai-seo-media-plugin-activator.php
 */
function activate_openai_seo_media_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-openai-seo-media-plugin-activator.php';
	Openai_Seo_Media_Plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-openai-seo-media-plugin-deactivator.php
 */
function deactivate_openai_seo_media_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-openai-seo-media-plugin-deactivator.php';
	Openai_Seo_Media_Plugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_openai_seo_media_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_openai_seo_media_plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-openai-seo-media-plugin.php';

/**
 * Add settings link to plugin action links
 */
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'add_plugin_action_links');

function add_plugin_action_links($links) {
    $settings_link = '<a href="options-general.php?page=openai-seo-media-generator">Configuraciones</a>';
    array_unshift($links, $settings_link);
    return $links;
}

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_openai_seo_media_plugin() {

	$plugin = new Openai_Seo_Media_Plugin();
	$plugin->run();

}
run_openai_seo_media_plugin();
