<?php
/*
Plugin Name: WattCycling Pricing Table
Plugin URI: http://www.indiasan.com
Description: WattCycling Pricing Table
Version: 1.0.0
Author: IndiaSan
Author URI: http://www.indiasan.com
*/

/**
 * Basic plugin definitions 
 * 
 * @package WattCycling Pricing Table
 * @since 1.0.0
 */
if( !defined( 'WPT_DIR' ) ) {
  define( 'WPT_DIR', dirname( __FILE__ ) );      // Plugin dir
}
if( !defined( 'WPT_URL' ) ) {
  define( 'WPT_URL', plugin_dir_url( __FILE__ ) );   // Plugin url
}
if( !defined( 'WPT_INC_DIR' ) ) {
  define( 'WPT_INC_DIR', WPT_DIR.'/includes' );   // Plugin include dir
}
if( !defined( 'WPT_INC_URL' ) ) {
  define( 'WPT_INC_URL', WPT_URL.'includes' );    // Plugin include url
}
if( !defined( 'WPT_ADMIN_DIR' ) ) {
  define( 'WPT_ADMIN_DIR', WPT_INC_DIR.'/admin' );  // Plugin admin dir
}
if(!defined('WPT_PREFIX')) {
  define('WPT_PREFIX', 'wpt'); // Plugin Prefix
}
if(!defined('WPT_VAR_PREFIX')) {
  define('WPT_VAR_PREFIX', '_wpt_'); // Variable Prefix
}

/**
 * Load Text Domain
 *
 * This gets the plugin ready for translation.
 *
 * @package WattCycling Pricing Table
 * @since 1.0.0
 */
load_plugin_textdomain( 'wpt', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

/**
 * Activation Hook
 *
 * Register plugin activation hook.
 *
 * @package WattCycling Pricing Table
 * @since 1.0.0
 */
register_activation_hook( __FILE__, 'wpt_install' );

function wpt_install(){
	
}

/**
 * Deactivation Hook
 *
 * Register plugin deactivation hook.
 *
 * @package WattCycling Pricing Table
 * @since 1.0.0
 */
register_deactivation_hook( __FILE__, 'wpt_uninstall');

function wpt_uninstall(){
  
}

// Global variables
global $wpt_scripts, $wpt_models, $wpt_admin;

// Script class handles most of script functionalities of plugin
include_once( WPT_INC_DIR.'/class-wattcycling-pricing-table-scripts.php' );
$wpt_scripts = new Wpt_Scripts();
$wpt_scripts->add_hooks();

// Model class handles most of model functionalities of plugin
include_once( WPT_INC_DIR.'/class-wattcycling-pricing-table-model.php' );
$wpt_model = new Wpt_Model();

// Admin class handles most of admin panel functionalities of plugin
include_once( WPT_ADMIN_DIR.'/class-wattcycling-pricing-table-admin.php' );
$wpt_admin = new Wpt_Admin();
$wpt_admin->add_hooks();
?>