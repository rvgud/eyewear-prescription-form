<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.dugudlabs.com/specfit/eyewear-prescription-form
 * @since             1.0.0
 * @package           Eyewear_prescription_form
 *
 * @wordpress-plugin
 * Plugin Name:       Eyewear Prescription Form
 * Plugin URI:        https://www.dugudlabs.com/eyewear_prescription_form
 * Description:       Eyewear prescription form plugin enabled you to add as many as lens, glasses and lens coatings to your products.
 * Version:           1.0.0
 * Author:            dugudlabs
 * Author URI:        https://www.dugudlabs.com/specfit/eyewear-prescription-form
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       eyewear_prescription_form
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'EYEWEAR_PRESCRIPTION_FORM_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-eyewear_prescription_form-activator.php
 */
function activate_eyewear_prescription_form() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-eyewear_prescription_form-activator.php';
	Eyewear_prescription_form_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-eyewear_prescription_form-deactivator.php
 */
function deactivate_eyewear_prescription_form() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-eyewear_prescription_form-deactivator.php';
	Eyewear_prescription_form_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_eyewear_prescription_form' );
register_deactivation_hook( __FILE__, 'deactivate_eyewear_prescription_form' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-eyewear_prescription_form.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_eyewear_prescription_form() {

	$plugin = new Eyewear_prescription_form();
	$plugin->run();

}
run_eyewear_prescription_form();
