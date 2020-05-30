<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://trendrevenue.us
 * @since      1.0.0
 *
 * @package    Trendrevenue
 * @subpackage Trendrevenue/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Trendrevenue
 * @subpackage Trendrevenue/admin
 * @author     TrendRevenue <dev@trendrevenue.us>
 */
class Trendrevenue_Admin {

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
	 * @param    string    $plugin_name       The name of this plugin.
	 * @param    string    $version    The version of this plugin.
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
		 * defined in Trendrevenue_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Trendrevenue_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/trendrevenue-admin.css', array(), $this->version, 'all' );

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
		 * defined in Trendrevenue_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Trendrevenue_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/trendrevenue-admin.js', array( 'jquery' ), $this->version, false );

	}

}

function trendrevenue_menu(){    
	$page_title = 'Trendrevenue Administration';   
	$menu_title = 'TrendRevenue';   
	$capability = 'manage_options';   
	$menu_slug  = 'trendrevenue-admin';   
	$function   = 'trendrevenue_admin_page';   
	$icon_url   = 'dashicons-media-code';   
	$position   = 4;    
		add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );  
		add_submenu_page($menu_slug, 'Affiliate Setup', 'Affiliate Setup', $capability, 'trendrevenue-administration-setup', 'trendrevenue_admin_sub_setup' );
		add_submenu_page($menu_slug, 'Product Lines', 'Products', $capability, 'trendrevenue-administration-products', 'trendrevenue_admin_sub_products' );
		add_submenu_page($menu_slug, 'Template Selection', 'Templates', $capability, 'trendrevenue-administration-template', 'trendrevenue_admin_sub_template' );
		add_submenu_page($menu_slug, 'Orders', 'Orders', $capability, 'trendrevenue-administration-orders', 'trendrevenue_admin_sub_orders' );
		add_submenu_page($menu_slug, 'Reports', 'Reporting', $capability, 'trendrevenue-administration-reporting', 'trendrevenue_admin_sub_reporting' );
}
add_action( 'admin_menu', 'trendrevenue_menu' );  

function trendrevenue_admin_page()
{
	echo '<div class="wrap">Welcome to the TrendRevenue Affiliate System.</div>';
}
function trendrevenue_admin_sub_setup()
{
	// This is were the affiliate will either login to the TrendRevenue.us Affiliate system, or
	// signup to be a new affiliate
	// Manage payout schedule company information etc
	echo '<div class="wrap">Welcome to the TrendRevenue Setup.</div>';
}
function trendrevenue_admin_sub_products()
{
	// Affiliates Can Look at and seachr the different product lines that are avaliable to them
	// If a product line has a maker "compatiable Line" then the affiliate can sell more that 1 product line
	// in thier template
	echo '<div class="wrap">Welcome to the TrendRevenue Products.</div>';
}
function trendrevenue_admin_sub_template()
{
	// The Affiliate will select a template to be installed
	// The template install will check for required plugins 
	// Add the products to the woocommerce database
	echo '<div class="wrap">TrendRevenue Template Selection and Import.</div>';
}
function trendrevenue_admin_sub_orders()
{
	// JSON calls to trendrevenue.us to see current order information and status
	echo '<div class="wrap">Order and Sales Detail</div>';
}
function trendrevenue_admin_sub_reporting()
{
	// This function places JSON calls to trendrevenue.us to get any reporting information
	echo '<div class="wrap">Reports</div>';
}
?>