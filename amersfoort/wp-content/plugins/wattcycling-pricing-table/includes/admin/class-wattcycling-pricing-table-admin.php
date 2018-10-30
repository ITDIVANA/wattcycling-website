<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Admin Class
 *
 * Manage Admin Panel Class
 *
 * @package WattCycling Pricing Table
 * @since 1.0.0
 */

class Wpt_Admin {

	public $model, $scripts;

	//class constructor
	function __construct() {

		global $wpt_model, $wpt_scripts;

		$this->scripts = $wpt_scripts;
		$this->model = $wpt_model;
	}
	
	public function wpt_pricing_table(){
		include_once WPT_ADMIN_DIR . '/forms/wpt-pricing-table.php';
		
		return $return;
	}
	
	/**
	 * Adding Hooks
	 *
	 * @package WattCycling Pricing Table
	 * @since 1.0.0
	 */
	function add_hooks(){
		add_shortcode( 'wpt_pricing_table', array( $this, 'wpt_pricing_table' ) );
	}
}
?>