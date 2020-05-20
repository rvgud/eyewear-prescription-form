<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.dugudlabs.com
 * @since      1.0.0
 *
 * @package    Eyewear_prescription_form
 * @subpackage Eyewear_prescription_form/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Eyewear_prescription_form
 * @subpackage Eyewear_prescription_form/admin
 * @author     dugudlabs <ravinstra5876@gmail.com>
 */
class Eyewear_prescription_form_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Eyewear_prescription_form_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Eyewear_prescription_form_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/eyewear_prescription_form-admin.css', array(), $this->version, 'all' );

	}
	
	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Eyewear_prescription_form_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Eyewear_prescription_form_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */


	

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/eyewear_prescription_form-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'load_core_fucntion_epf', plugin_dir_url( __FILE__ ) . 'js/load_core_function_epf.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'submitNewType_EPF', plugin_dir_url( __FILE__ ) . 'js/submitNewTypes.js', array( 'load_core_fucntion_epf' ), null, false );
		wp_localize_script( 'submitNewType_EPF', 'submitNewType_EPF_Ajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php') ));

	}

	public function add_epf_menu() {
		add_menu_page("DugudLabs_EPF","EPF", "manage_options", "eyewear_prescription_form",  'show_admin_menu_epf', $icon_url = '', $position = null );	
}
}

function show_admin_menu_epf() { 
	wp_enqueue_style( 'bootstrap_epf', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css', array(),'1.0.0' , 'all' );
	wp_enqueue_script( 'pooper_epf', plugin_dir_url( __FILE__ ) . 'js/popper.js', array( 'jquery' ),'1.0.0', false );
	wp_enqueue_script( 'bootstrap_epf', plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js', array( 'jquery' ),'1.0.0', false );
	include_once plugin_dir_path(__FILE__).'../languages/eyewear_prescription_form_lang.php';
	include_once plugin_dir_path(__FILE__)."partials/eyewear_prescription_form-admin-display.php";
}