<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Scripts Class
 *
 * Handles adding scripts functionality to the admin pages
 * as well as the front pages.
 *
 * @package WattCycling Pricing Table
 * @since 1.0.0
 */

class Wpt_Scripts {

	//class constructor
	function __construct()
	{
		
	}
	
	/**
	 * Enqueue Scripts on Public Side
	 * 
	 * @package WattCycling Pricing Table
	 * @since 1.0.0
	 */
	public function wpt_public_scripts(){
	
		wp_register_style( 'wpt-public-style', WPT_URL . 'includes/css/wpt-public.css', array(), '30' );
		wp_enqueue_style( 'wpt-public-style' );
		
		wp_enqueue_script('jquery');
		
		wp_register_script( 'wpt-public-script', WPT_URL.'includes/js/wpt-public.js', array(), '35', true );
		wp_enqueue_script( 'wpt-public-script' );
	}
	
	/**
	 * Adding Hooks
	 *
	 * Adding hooks for the styles and scripts.
	 *
	 * @package WattCycling Pricing Table
	 * @since 1.0.0
	 */
	function add_hooks(){
		
		//add public scripts
		add_action('wp_enqueue_scripts', array($this, 'wpt_public_scripts'));
	}
}
?>