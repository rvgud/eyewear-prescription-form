<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.dugudlabs.com
 * @since      1.0.0
 *
 * @package    Eyewear_prescription_form
 * @subpackage Eyewear_prescription_form/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Eyewear_prescription_form
 * @subpackage Eyewear_prescription_form/public
 * @author     dugudlabs <ravinstra5876@gmail.com>
 */

class Eyewear_prescription_form_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		
	}
	public function start(){
		//add_filter( 'woocommerce_add_cart_item_data', array( $this, 'update_prescription_price' ), 35, 3 );
		//add_action( 'woocommerce_before_add_to_cart_button', 'add_gift_wrap_field' );
		//add_action( 'woocommerce_before_calculate_totals', 'add_prescription_price_into_cart', 36, 1 );
		add_action('woocommerce_before_add_to_cart_button','epc_specfit_add_custom_fields');
		add_filter('woocommerce_add_cart_item_data','epc_specfit_wdm_add_item_data',10,3);
		add_filter('woocommerce_get_item_data','epc_specfit_wdm_add_item_meta',10,2);
		add_action( 'woocommerce_checkout_create_order_line_item', 'epc_specfit_wdm_add_custom_order_line_item_meta',10,4 );	
		add_action( 'woocommerce_before_add_to_cart_button', 'epc_specfit_show_prescription_button', 32 ,0 );
		add_action( 'woocommerce_before_calculate_totals', 'add_prescription_price_into_cart', 10, 1 );

		//add_action( 'woocommerce_after_shop_loop_item', 'show_loop_button', 10);
			//add_action( 'woocommerce_after_shop_loop', 'show_try_on_popup', 10);
	}
	
	
	/**
	 * Register the stylesheets for the public-facing side of the site.
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
		
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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
		
	}
}
function load_script_and_styles_epf_dugudlabs(){
		wp_enqueue_style('jquery');
		wp_enqueue_style( 'epf_dugudlabs', plugin_dir_url( __FILE__ ) . 'css/eyewear_prescription_form-public.css', array(), '1.0.0', 'all' );
		wp_enqueue_script( 'epf_dugudlabs'.'corefunctions', plugin_dir_url( __FILE__ ) . 'js/load_core_functions.js');
		//Delete from here
		wp_enqueue_style( 'epf'.'jquery', plugin_dir_url( __FILE__ ) . 'css/jquery-ui.css', array(), '1.0.4', 'all' );
		wp_enqueue_style('epfbootstrap', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css', array(), '1.0.0', 'all' );
		wp_enqueue_script('jquery');
		wp_enqueue_script( 'epfpopper', plugin_dir_url( __FILE__ ) . 'js/popper.js');
		wp_enqueue_script( 'epfbootstrapjs', plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-widget');
		wp_enqueue_script('jquery-ui-mouse');
		wp_enqueue_script('jquery-ui-draggable');
		wp_enqueue_script('jquery-ui-droppable');
		wp_enqueue_script('jquery-ui-resizable');
		wp_enqueue_script('jquery-ui-tooltip');
		wp_enqueue_script( 'epfjqueryuitouchjs', plugin_dir_url( __FILE__ ) . 'js/jquery.ui.touch-punch.min.js',array( 'jquery-ui-mouse','jquery-ui-widget' ));	
		//Till Here
		wp_enqueue_script( 'epf_dugudlabs', plugin_dir_url( __FILE__ ) . 'js/eyewear_prescription_form-public.js', array( 'jquery' ), '1.0.0', false );
		wp_enqueue_script( 'epf_dugudlabs_jquery_rotatable', plugin_dir_url( __FILE__ ) . 'js/jquery.ui.rotatable.min.js', array( 'jquery-ui-mouse' ), '1.0.0', false );
		wp_enqueue_script( 'epf_dugudlabs_measure_my_pd', plugin_dir_url( __FILE__ ) . 'js/measure_my_pd.js', array( 'jquery' ), '1.0.0', false );

}
function epc_specfit_show_prescription_button(){
	load_script_and_styles_epf_dugudlabs();
	include plugin_dir_path(__FILE__).'../languages/eyewear_prescription_form_lang.php';
	include_once plugin_dir_path(__FILE__).'partials/eyewear_prescription_form-public-advanced.php'; 
}


function epc_specfit_wdm_add_item_data($cart_item_data, $product_id, $variation_id)
{

	$request_item = sanitize_text_field($_REQUEST[$item]);
	global $wpdb;
	include plugin_dir_path(__FILE__).'../languages/eyewear_prescription_form_lang.php';
	$epc_items = array("prescription_type","RIGHT-PD","LEFT-PD","SINGLE-PD","MEASURED-PD");
	$custom_items=array("GlassType","LensType","LensCoating",);
	$prescription_items= array("RIGHT-SPH","RIGHT-CYL","RIGHT-AXIS","RIGHT-ADD","LEFT-SPH","LEFT-CYL","LEFT-AXIS");
	$words_epf_dugudlabs_lng = $words_epf_dugudlabs[get_locale()];
	if($words_epf_dugudlabs_lng == null){
		$words_epf_dugudlabs_lng = $words_epf_dugudlabs["en_US"];
	}
	foreach($custom_items as $item){
		if(isset($request_item) && $request_item !='' )
		{
			$tableName= $wpdb->prefix."glasses";
			if($item == "LensType")
				$tableName= $wpdb->prefix."lens";
			else if($item == "LensCoating")
				$tableName= $wpdb->prefix."coatings";
			$data = $wpdb->get_row("SELECT name,price FROM $tableName WHERE id = $request_item");
			$data = json_encode($data);
			if($data != NULL)
				$cart_item_data[$item] = sanitize_text_field($data);
		}
	}
	foreach($epc_items as $item){
		if(isset($request_item) && $request_item != $words_epf_dugudlabs_lng["select"] )
		{
			$cart_item_data[$item] = sanitize_text_field($request_item);

			
		}
	}
	foreach($prescription_items as $item){
		if(isset($request_item) && $request_item != $words_epf_dugudlabs_lng["select"] )
		{
			$initial_propertPriceString = get_option( 'epc_property_string');
			$initial_propertPriceString = str_replace("\\","",$initial_propertPriceString);
			$initial_propertPrice=json_decode($initial_propertPriceString,true);
			$itemArray = explode("-",$item);
			$str='{"'.$request_item.'":{"price":"'.$initial_propertPrice[$itemArray[0]][$itemArray[1]][$request_item]['price'].'"}}';
			$cart_item_data[$item] = sanitize_text_field($str);
		}
	}
	require_once( ABSPATH . 'wp-admin/includes/admin.php' );
	require_once( ABSPATH . 'wp-admin/includes/file.php' );

;
	if($_FILES){
		$prescriptin_file = sanitize_file_name($_FILES['prescription_file']);
		$uploaded_file = wp_handle_upload( $prescriptin_file, array( 'test_form' => false ) );

		if( $uploaded_file && ! isset( $uploaded_file['error'] ) ) {
			$response['response'] = "SUCCESS";
			$response['filename'] = basename( $uploaded_file['url'] );
			$response['url'] = $uploaded_file['url'];
			$response['type'] = $uploaded_file['type'];
		} else {
			$response['response'] = "ERROR";
			$response['error'] = $uploaded_file['error'];
		}
		$cart_item_data['prescription_file'] = $uploaded_file['url'];
	}
	
    return $cart_item_data;
}
function epc_specfit_wdm_add_item_meta($item_data, $cart_item)
{
	$initial_propertPriceString = get_option( 'epc_property_string');
	$priscription= true;
	$epc_items = array("GlassType","LensType","LensCoating");
	foreach($epc_items as $item){
		if(array_key_exists($item, $cart_item) && $cart_item[$item]!='')
		{
			$custom_details = str_replace("\\","",$cart_item[$item]);
			$custom_details = json_decode($custom_details, true);
				if($type =='no_priscription'){
					$priscription= false;
					$new_item = array(
						"key"=>$item.":".$custom_details['name'].",Price",
						"value"=>$custom_details["price"]
					);
				}
				else{
					$new_item = array(
						"key"=>$item.":".$custom_details['name'].",Price",
						"value"=>$custom_details["price"]
					);
				}
			array_push($item_data,$new_item);
		}
	}
	$pd_items = array("RIGHT-PD","LEFT-PD","SINGLE-PD","MEASURED-PD");
	foreach($pd_items as $item){
		
		if(array_key_exists($item, $cart_item) && $cart_item[$item]!='')
		{
			$new_item = array(
				"key"=>$item,
				"value"=> $cart_item[$item]
			);
			array_push($item_data,$new_item);
		}
	}
	if($priscription){
		if(array_key_exists('prescription_type', $cart_item) && $cart_item['prescription_type']=='manual')
			{
				$epc_items = array("RIGHT-SPH","RIGHT-CYL","RIGHT-AXIS","RIGHT-ADD","LEFT-SPH","LEFT-CYL","LEFT-AXIS");
				foreach($epc_items as $item){
					
					if(array_key_exists($item, $cart_item) && $cart_item[$item]!='')
					{
						$custom_details = json_decode($cart_item[$item], true);
						foreach($custom_details as $type=>$type_value){
								$new_item = array(
									"key"=>$item.":".$type.",Price",
									"value"=>$type_value["price"].get_woocommerce_currency_symbol()
								);
						}
						array_push($item_data,$new_item);
					}
				}
			}
		
		else{
			$new_item = array(
				"key"=>'prescription_file',
				"value"=>$cart_item['prescription_file']
			);
			array_push($item_data,$new_item);
		}
	}
    return $item_data;
}


  function epc_specfit_add_custom_fields()
{

    global $product;

    ob_start();
    ?>
        <div class="wdm-custom-fields">
			<?php 
			$epc_items = array("GlassType","RIGHT-SPH","RIGHT-CYL","RIGHT-AXIS","RIGHT-ADD","RIGHT-PD","LEFT-SPH","LEFT-CYL","LEFT-AXIS","LEFT-ADD","LEFT-PD","LensType","LensCoating");
			foreach($epc_items as $item){
				echo '<input style="display: none !important;" id="'.$item.'" type="text" name="'.$item.'">';
			}
            ?>
           
        </div>
        <div class="clear"></div>

    <?php

    $content = ob_get_contents();
    ob_end_flush();

    return $content;
} 

function epc_specfit_wdm_add_custom_order_line_item_meta($item, $cart_item_key, $values, $order)
{
	$epc_items = array("prescription_file","GlassType","RIGHT-SPH","RIGHT-CYL","RIGHT-AXIS","RIGHT-ADD","RIGHT-PD","LEFT-SPH","LEFT-CYL","LEFT-AXIS","LEFT-ADD","LEFT-PD","LensType","LensCoating");
	foreach($epc_items as $item1){
		if(array_key_exists($item1, $values) && $values[$item1]!='')
		{
		$item->add_meta_data($item1,$values[$item1]);
		}
		}
}

function add_prescription_price_into_cart( $cart_obj ) {
	
	// Iterate through each cart item
	$epc_string = get_option( 'epc_string', '{"GlassType":{"distance":{"price":"0","disabled":"disabled"},"nearvision":{"price":"0","disabled":"disabled"},"bifocal":{"price":"0","disabled":"disabled"},"progressive":{"price":"0","disabled":"disabled"}},"LensType":{"BASICLENSES":{"price":"0","disabled":"disabled"},"MIDINDEX":{"price":"0","disabled":"disabled"},"HIGHINDEX":{"price":"0","disabled":"disabled"},"74_HIGHINDEX":{"price":"0","disabled":"disabled"}},"LensCoating":{"STANDARD":{"price":"0","disabled":"disabled"},"MULTICOATING":{"price":"0","disabled":"disabled"},"POLARIZED":{"price":"0","disabled":"disabled"},"PHOTOCHROMIC":{"price":"0","disabled":"disabled"},"COMPUTERLENS":{"price":"0","disabled":"disabled"},"ANTIREFLECTIVE":{"price":"0","disabled":"disabled"}}}' );
	$epc_price=json_decode($epc_string,true);
	$initial_propertPrice=json_decode($initial_propertPriceString,true);
	foreach($cart_obj->get_cart() as $key=>$value){
		$epc_items = array("GlassType","LensType","LensCoating");
		$initial_propert_items = array("RIGHT-SPH","RIGHT-CYL","RIGHT-AXIS","RIGHT-ADD","LEFT-SPH","LEFT-CYL","LEFT-AXIS");
		$price=$value['data']->get_price();
		foreach($epc_items as $item1){
		if(array_key_exists($item1, $value) && $value[$item1]!='')
			{
				$json_details = str_replace("\\","",$value[$item1]);
				$details= json_decode($json_details);
					$propPrice=$details->price;
					$basePrice=str_replace(get_woocommerce_currency_symbol(),"",$propPrice);
					$price=$price+intval($basePrice);
			}
		}
		foreach($initial_propert_items as $item1){
			if(array_key_exists($item1, $value) && $value[$item1]!='')
				{
					$json_details = str_replace("\\","",$value[$item1]);
					$details= json_decode($json_details,true);
					$initial_propertPriceString = get_option( 'epc_property_string');
					$initial_propertPriceString = str_replace("\\","",$initial_propertPriceString);
					$initial_propertPrice=json_decode($initial_propertPriceString,true);
					$itemArray = explode("-",$item1);
					foreach($details as $detkey=>$detvalue){
						$propprice= $initial_propertPrice[$itemArray[0]][$itemArray[1]][$detkey]['price'];
						$basePrice=str_replace(get_woocommerce_currency_symbol(),"",$propprice);
						$price=$price+intval($basePrice);
					}
				}
			}
		$value['data']->set_price( ( $price ) );
	}
  }
