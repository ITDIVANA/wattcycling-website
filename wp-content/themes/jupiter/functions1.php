<?php
$theme = new Theme(true);
$theme->init(array(
    "theme_name" => "Jupiter",
    "theme_slug" => "JP",
));

if (!isset($content_width)) {
    $content_width = 1140;
}

class Theme
{

    public function __construct($check = false)
    {
        if ($check) {
            $this->theme_requirement_check();
        }
    }

    public function init($options)
    {
        $this->constants($options);
        $this->backward_compatibility();
        $this->post_types();
        $this->helpers();
        $this->functions();
        $this->menu_walkers();
        $this->admin();
        $this->theme_activated();

        add_action('admin_menu', array(&$this,
            'admin_menus',
        ));

        add_action('init', array(&$this,
            'language',
        ));

        add_action('init', array(&$this,
            'add_metaboxes',
        ));

        add_action('after_setup_theme', array(&$this,
            'supports',
        ));

        add_action('after_setup_theme', array(&$this,
            'mk_theme_setup',
        ));

        add_action('widgets_init', array(&$this,
            'widgets',
        ));

        $this->theme_dropins();
        
        $this->theme_options();
    }
    public function constants($options)
    {

        define("NEW_UI_LIBRARY", false);
        define("NEW_CUSTOM_ICON", false);
        define("V2ARTBEESAPI", 'http://artbees.net/api/v2/');
        define("THEME_DIR", get_template_directory());
        define("THEME_DIR_URI", get_template_directory_uri());
        define("THEME_NAME", $options["theme_name"]);

        $unify_theme_option = get_option('mk_unify_theme_options');

        if (defined("ICL_LANGUAGE_CODE") && !$unify_theme_option) {
            $lang = "_" . ICL_LANGUAGE_CODE;
        } else {
            $lang = "";
        }

        /* Use this constant in child theme functions.php to unify theme options across all languages in WPML
         *  add define('WPML_UNIFY_THEME_OPTIONS', true);
         */
        if (defined('WPML_UNIFY_THEME_OPTIONS')) {
            $lang = "";
        }

        define("THEME_OPTIONS", $options["theme_name"] . '_options' . $lang);

        define("THEME_OPTIONS_BUILD", $options["theme_name"] . '_options_build' . $lang);
        define("IMAGE_SIZE_OPTION", THEME_NAME . '_image_sizes');
        define("THEME_SLUG", $options["theme_slug"]);
        define("THEME_STYLES_SUFFIX", "/assets/stylesheet");
        define("THEME_STYLES", THEME_DIR_URI . THEME_STYLES_SUFFIX);
        define("THEME_JS", THEME_DIR_URI . "/assets/js");
        define("THEME_IMAGES", THEME_DIR_URI . "/assets/images");
        define('FONTFACE_DIR', THEME_DIR . '/fontface');
        define('FONTFACE_URI', THEME_DIR_URI . '/fontface');
        define("THEME_FRAMEWORK", THEME_DIR . "/framework");
        define("THEME_COMPONENTS", THEME_DIR_URI . "/components");
        define("THEME_ACTIONS", THEME_FRAMEWORK . "/actions");
        define("THEME_INCLUDES", THEME_FRAMEWORK . "/includes");
        define("THEME_INCLUDES_URI", THEME_DIR_URI . "/framework/includes");
        define("THEME_WIDGETS", THEME_FRAMEWORK . "/widgets");
        define("THEME_HELPERS", THEME_FRAMEWORK . "/helpers");
        define("THEME_FUNCTIONS", THEME_FRAMEWORK . "/functions");
        define("THEME_PLUGIN_INTEGRATIONS", THEME_FRAMEWORK . "/plugin-integrations");
        define('THEME_METABOXES', THEME_FRAMEWORK . '/metaboxes');
        define('THEME_POST_TYPES', THEME_FRAMEWORK . '/custom-post-types');

        define('THEME_ADMIN', THEME_FRAMEWORK . '/admin');
        define('THEME_FIELDS', THEME_ADMIN . '/theme-options/builder/fields');
        define('THEME_CONTROL_PANEL', THEME_ADMIN . '/control-panel');
        define('THEME_CONTROL_PANEL_ASSETS', THEME_DIR_URI . '/framework/admin/control-panel/assets');
        define('THEME_CONTROL_PANEL_ASSETS_DIR', THEME_DIR . '/framework/admin/control-panel/assets');
        define('THEME_GENERATORS', THEME_ADMIN . '/generators');
        define('THEME_ADMIN_URI', THEME_DIR_URI . '/framework/admin');
        define('THEME_ADMIN_ASSETS_URI', THEME_DIR_URI . '/framework/admin/assets');

        /**
         * This will point to the Theme Options version to use upon release. Use empty string ('')
         * to use the one in "framework/admin/theme-options/". Use "v2" to use the one
         * in "framework/admin/theme-options-v2/" and so on.
         *
         * If you set the value THEME_OPTIONS_VERSION to "v2", then
         * "wp-admin/admin.php?page=theme_options" will all the changes in "theme-options-v2" but still
         * keep "theme_options" as page slug.
         *
         * @since 5.6 Introduced.
         */
        define('THEME_OPTIONS_VERSION', '');

        /**
         * This value MUST be set to FALSE (or any falsy value) on Jupiter release candidates as this is for internal
         * developer use only.  By setting this to "v2", "v3", "v4" and so on, you are allowing
         * access to only a specific developement version of the theme options, as it does not make
         * sense to have access to all development versions.
         *
         * @since 5.6 Introduced.
         */
        define('THEME_OPTIONS_DEV_VERSION', '');

        // Just delete this constant before releasing Jupiter. This can be defined anywhere.
        //define('ARTBEES_HEADER_BUILDER', 'on');
    }
    public function backward_compatibility()
    {
        require_once THEME_HELPERS . "/php-backward-compatibility.php";
    }
    public function widgets()
    {
        include_once THEME_FUNCTIONS . '/widgets-filter.php';
        require_once locate_template("views/widgets/widgets-contact-form.php");
        require_once locate_template("views/widgets/widgets-contact-info.php");
        require_once locate_template("views/widgets/widgets-gmap.php");
        require_once locate_template("views/widgets/widgets-popular-posts.php");
        require_once locate_template("views/widgets/widgets-related-posts.php");
        require_once locate_template("views/widgets/widgets-recent-posts.php");
        require_once locate_template("views/widgets/widgets-social-networks.php");
        require_once locate_template("views/widgets/widgets-subnav.php");
        require_once locate_template("views/widgets/widgets-testimonials.php");
        require_once locate_template("views/widgets/widgets-twitter-feeds.php");
        require_once locate_template("views/widgets/widgets-video.php");
        require_once locate_template("views/widgets/widgets-flickr-feeds.php");
        require_once locate_template("views/widgets/widgets-instagram-feeds.php");
        require_once locate_template("views/widgets/widgets-news-slider.php");
        require_once locate_template("views/widgets/widgets-recent-portfolio.php");
        require_once locate_template("views/widgets/widgets-slideshow.php");
    }

    public function supports()
    {

        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('menus');
        add_theme_support('automatic-feed-links');
        add_theme_support('editor-style');
        add_theme_support('post-thumbnails');
        add_theme_support('yoast-seo-breadcrumbs');

        register_nav_menus(array(
            'primary-menu'        => __('Primary Navigation', "mk_framework"),
            'second-menu'         => __('Second Navigation', "mk_framework"),
            'third-menu'          => __('Third Navigation', "mk_framework"),
            'fourth-menu'         => __('Fourth Navigation', "mk_framework"),
            'fifth-menu'          => __('Fifth Navigation', "mk_framework"),
            'sixth-menu'          => __('Sixth Navigation', "mk_framework"),
            "seventh-menu"        => __('Seventh Navigation', "mk_framework"),
            "eighth-menu"         => __('Eighth Navigation', "mk_framework"),
            "ninth-menu"          => __('Ninth Navigation', "mk_framework"),
            "tenth-menu"          => __('Tenth Navigation', "mk_framework"),
            'footer-menu'         => __('Footer Navigation', "mk_framework"),
            'toolbar-menu'        => __('Header Toolbar Navigation', "mk_framework"),
            'side-dashboard-menu' => __('Side Dashboard Navigation', "mk_framework"),
            'fullscreen-menu'     => __('Full Screen Navigation', "mk_framework"),
        ));

    }
    public function post_types()
    {
        require_once THEME_POST_TYPES . '/custom_post_types.helpers.class.php';
        require_once THEME_POST_TYPES . '/register_post_type.class.php';
        require_once THEME_POST_TYPES . '/register_taxonomy.class.php';
        require_once THEME_POST_TYPES . '/config.php';
    }
    public function functions()
    {
        include_once ABSPATH . 'wp-admin/includes/plugin.php';

        require_once THEME_INCLUDES . "/sftp/sftp-init.php";

        include_once THEME_ADMIN . '/general/general-functions.php';

        if (!class_exists('phpQuery')) {
            require_once THEME_INCLUDES . "/phpquery/phpQuery.php";
        }

        require_once THEME_INCLUDES . "/otf-regen-thumbs/otf-regen-thumbs.php";

        require_once THEME_FUNCTIONS . "/general-functions.php";
        require_once THEME_FUNCTIONS . "/ajax-search.php";
        require_once THEME_FUNCTIONS . "/post-pagination.php";

        require_once THEME_FUNCTIONS . "/enqueue-front-scripts.php";
        require_once THEME_GENERATORS . '/sidebar-generator.php';
        require_once THEME_FUNCTIONS . "/dynamic-styles.php";

        require_once THEME_PLUGIN_INTEGRATIONS . "/woocommerce/init.php";
        require_once THEME_PLUGIN_INTEGRATIONS . "/visual-composer/init.php";

        require_once locate_template("framework/helpers/love-post.php");
        require_once locate_template("framework/helpers/load-more.php");
        require_once locate_template("framework/helpers/subscribe-mailchimp.php");
        require_once locate_template("components/shortcodes/mk_portfolio/ajax.php");
        require_once locate_template("components/shortcodes/mk_products/quick-view-ajax.php");
    }
    public function helpers()
    {
        require_once THEME_HELPERS . "/class-mk-fs.php";
        require_once THEME_HELPERS . "/class-logger.php";
        require_once THEME_HELPERS . "/survey-management.php";
        require_once THEME_HELPERS . "/db-management.php";
        require_once THEME_HELPERS . "/logic-helpers.php";
        require_once THEME_HELPERS . "/svg-icons.php";
        require_once THEME_HELPERS . "/image-resize.php";
        require_once THEME_HELPERS . "/template-part-helpers.php";
        require_once THEME_HELPERS . "/global.php";
        require_once THEME_HELPERS . "/wp_head.php";
        require_once THEME_HELPERS . "/wp_footer.php";
        require_once THEME_HELPERS . "/schema-markup.php";
        require_once THEME_HELPERS . "/wp_query.php";
        require_once THEME_HELPERS . "/send-email.php";
        require_once THEME_HELPERS . "/captcha.php";
    }

    public function menu_walkers()
    {
        require_once locate_template("framework/custom-nav-walker/fallback-navigation.php");
        require_once locate_template("framework/custom-nav-walker/main-navigation.php");
        require_once locate_template("framework/custom-nav-walker/menu-with-icon.php");
        require_once locate_template("framework/custom-nav-walker/responsive-navigation.php");
    }

    public function add_metaboxes()
    {
        include_once THEME_GENERATORS . '/metabox-generator.php';
    }

    public function theme_activated()
    {
        if ('themes.php' == basename($_SERVER['PHP_SELF']) && isset($_GET['activated']) && $_GET['activated'] == 'true') {
            flush_rewrite_rules();
            update_option(THEME_OPTIONS_BUILD, uniqid());
            wp_redirect(admin_url('admin.php?page=' . THEME_NAME));

        }
    }

    public function admin()
    {
        global $abb_phpunit;
        if (is_admin() || (empty($abb_phpunit) == false && $abb_phpunit == true)) {
            require_once THEME_DIR . "/vendor/autoload.php";
            require_once THEME_CONTROL_PANEL . "/logic/validator-class.php";
            require_once THEME_CONTROL_PANEL . "/logic/system-messages/js-messages-lib.php";
            require_once THEME_CONTROL_PANEL . "/logic/system-messages/logic-messages-lib.php";
            require_once THEME_CONTROL_PANEL . "/logic/compatibility.php";
            require_once THEME_CONTROL_PANEL . "/logic/functions.php";
            require_once THEME_CONTROL_PANEL . "/logic/addon-management.php";
            require_once THEME_CONTROL_PANEL . "/logic/plugin-management.php";
            require_once THEME_CONTROL_PANEL . "/logic/template-management.php";
            require_once THEME_CONTROL_PANEL . "/logic/updates-class.php";
            require_once THEME_CONTROL_PANEL . "/logic/icon-selector.php";
            require_once THEME_ADMIN . "/menus-custom-fields/menu-item-custom-fields.php";
            include_once THEME_ADMIN . '/theme-options/options-check.php';
            include_once THEME_ADMIN . '/general/mega-menu.php';
            include_once THEME_ADMIN . '/general/enqueue-assets.php';
            include_once THEME_ADMIN . '/theme-options/options-save.php';
            require_once THEME_INCLUDES . "/tgm-plugin-activation/request-plugins.php";

        }
        require_once THEME_CONTROL_PANEL . "/logic/tracking.php";
        require_once THEME_CONTROL_PANEL . "/logic/tracking-control-panel.php";
    }
    public function language()
    {

        load_theme_textdomain('mk_framework', get_stylesheet_directory() . '/languages');
    }

    public function admin_menus()
    {

        add_menu_page(THEME_NAME, THEME_NAME, 'edit_theme_options', THEME_NAME, array(&$this,
            'control_panel',
        ), 'dashicons-star-filled', 3);

        add_submenu_page(THEME_NAME, __('Control Panel', 'mk_framework'), __('Control Panel', 'mk_framework'), 'edit_theme_options', THEME_NAME, array(&$this,
            'control_panel',
        ));

        if (NEW_UI_LIBRARY) {
            add_submenu_page(THEME_NAME, __('New UI', 'mk_framework'), __('New UI', 'mk_framework'), 'edit_posts', 'ui-library', array(&$this,
                'ui_library',
            ));
            add_submenu_page(THEME_NAME, __('UI Page Options', 'mk_framework'), __('UI Page Options', 'mk_framework'), 'edit_posts', 'ui-page-options', array(&$this,
                'ui_page_options',
            ));
        }
    }


    public function ui_page_options()
    {
        include_once THEME_CONTROL_PANEL . '/logic/ui-page-options.php';
    }
    public function ui_library()
    {
        include_once THEME_CONTROL_PANEL . '/logic/ui-library.php';
    }


    public function control_panel()
    {
        include_once THEME_CONTROL_PANEL . '/v2/layout/master.php';
    }


    /**
     * This function maintains the table for actively used theme components.
     *
     * @author      UÄur Mirza ZEYREK
     * @copyright   Artbees LTD (c)
     * @link        http://artbees.net
     * @since       Version 5.0
     */
    public function mk_theme_setup()
    {
        global $wpdb;
        global $jupiter_db_version;
        global $jupiter_table_name;

        $wp_get_theme          = wp_get_theme();
        $current_theme_version = $wp_get_theme->get('Version');
        $jupiter_db_version    = $current_theme_version;
        $jupiter_table_name    = $wpdb->prefix . "mk_components";

        if ($jupiter_db_version != get_option('jupiter_db_version')) {
            $charset_collate = $wpdb->get_charset_collate();
            $sql             = " CREATE TABLE IF NOT EXISTS $jupiter_table_name (id bigint(20) NOT NULL primary key AUTO_INCREMENT,
                type varchar(20) NOT NULL,
                status tinyint(1) NOT NULL,
                name varchar(40) NOT NULL,
                added_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
                last_update datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
                KEY {$jupiter_table_name}_type (type),
                KEY {$jupiter_table_name}_status (status),
                KEY {$jupiter_table_name}_name (name)
                ) $charset_collate;";

            require_once ABSPATH . 'wp-admin/includes/upgrade.php';
            dbDelta($sql);
            update_option('jupiter_db_version', $jupiter_db_version);
        }
    }

    /**
     * Compatibility check for hosting php version.
     * Returns error if php version is below v5.4
     * @author      Bob ULUSOY & Ugur Mirza ZEYREK
     * @copyright   Artbees LTD (c)
     * @link        http://artbees.net
     * @since       Version 5.0.5
     * @last_update Version 5.0.7
     */
    public function theme_requirement_check()
    {
        if (!in_array($GLOBALS['pagenow'], array('admin-ajax.php'))) {
            if (version_compare(phpversion(), '5.4', '<')) {
                echo '<h2>As stated in <a href="http://demos.artbees.net/jupiter5/jupiter-v5-migration/">Jupiter V5.0 Migration Note</a> your PHP version must be above V5.4. We no longer support php legacy versions (v5.2.X, v5.3.X).</h2>';
                echo 'Read more about <a href="https://wordpress.org/about/requirements/">WordPress environment requirements</a>. <br><br> Please contact with your hosting provider or server administrator for php version update. <br><br> Your current PHP version is <b>' . phpversion() . '</b>';
                wp_die();
            }
        }
    }

    public function theme_dropins()
    {
        include_once THEME_FUNCTIONS . '/dropins.php';
    }
    
    public function theme_options()
    {
        require_once THEME_ADMIN . '/theme-options/class-theme-options.php';
    }
}




// /**
//  * Check if a specific product ID is in the cart
//  */
 function wc_ninja_product_is_in_the_cart($id) {
	// Add your special product IDs here
		$ids = array( $id );

	// Products currently in the cart
		$cart_ids = array();

	// Find each product in the cart and add it to the $cart_ids array
		foreach( WC()->cart->get_cart() as $cart_item_key => $values ) {
			$cart_product = $values['data'];
			$cart_ids[]   = $cart_product->id;
		}

	// If one of the special products are in the cart, return true.
		if ( ! empty( array_intersect( $ids, $cart_ids ) ) ) {
			return true;
		} else {
			return false;
		}
 }

// /**
//  * Conditionally remove a checkout field based on products in the cart
//  */
function wc_ninja_remove_checkout_field( $fields ) {

		if ( wc_ninja_product_is_in_the_cart(701) ) {
			// unset( $fields['billing']['billing_company'] );
			//unset( $fields['billing']['billing_address_1'] );
			//unset( $fields['billing']['billing_address_2'] );
			unset( $fields['billing']['billing_country'] );
			//unset( $fields['billing']['billing_state'] );
			unset( $fields['billing']['billing_postcode'] );
			//unset( $fields['billing']['billing_phone'] );
			unset( $fields['billing']['billing_city'] );
			//unset( $fields['billing']['billing_date_of_birth']);
			unset( $fields['billing']['adres']);
		}
//     if(wc_ninja_product_is_in_the_cart(390) || wc_ninja_product_is_in_the_cart(378) ){
//         unset( $fields['billing']['billing_company'] );
//     }

    unset($fields['order']['order_comments']);


     return $fields;
 }
add_filter( 'woocommerce_checkout_fields' , 'wc_ninja_remove_checkout_field' );


// // Skip the cart and redirect to check out url when clicking on Add to cart
// add_filter ( 'add_to_cart_redirect', 'redirect_to_checkout' );
// function redirect_to_checkout() {
    
//     global $woocommerce;
//     // Remove the default `Added to cart` message
//     wc_clear_notices();
//     return $woocommerce->cart->get_checkout_url();
    
// }

/**
 * Need the jQuery UI library for dialogs.
 **/
function ttp_scripts() {
    wp_enqueue_script('jquery-ui-dialog');
}
add_action('wp_enqueue_scripts', 'ttp_scripts');

/**
 * Processing before the checkout form to:
 * 1. Hide the existing Click here link at the top of the page.
 * 2. Instantiate the jQuery dialog with contents of 
 *    form.checkout_coupon which is in checkout/form-coupon.php.
 * 3. Bind the Click here link to toggle the dialog.
 **/
function ttp_wc_show_coupon_js() {
    /* Hide the Have a coupon? Click here to enter your code section                                                
     * Note that this flashes when the page loads and then disappears.                                                
     * Alternatively, you can add a filter on                                                                       
     * woocommerce_checkout_coupon_message to remove the html. */
    wc_enqueue_js('$("a.showcoupon").parent().hide();');

    /* Use jQuery UI's dialog feature to load the coupon html code                                                  
     * into the anchor div. The width controls the width of the                                                     
     * modal dialog window. Check here for all the dialog options:                                                         
     * http://api.jqueryui.com/dialog/ */
    wc_enqueue_js('dialog = $("form.checkout_coupon").dialog({                                                      
                       autoOpen: false,                                                                             
						minHeight: 0,                                                                                
                       modal: false,                                                                                
                       appendTo: "#coupon-anchor",                                                                  
                       position: { my: "left", at: "left", of: "#coupon-anchor"},                                   
                       draggable: false,                                                                            
                       resizable: false,                                                                            
                       dialogClass: "coupon-special",                                                               
                       closeText: "Close",                                                                          
                       buttons: {}});');

    /* Bind the Click here to enter coupon link to load the                                                         
     * jQuery dialog with the coupon code. Note that this                                                               
     * implementation is a toggle. Click on the link again                                                          
     * and the coupon field will be hidden. This works in                                                           
     * conjunction with the hidden close button in the                                                               
     * optional CSS in style.css shown below. */
    wc_enqueue_js('$("#show-coupon-form").click( function() {                                                       
                       if (dialog.dialog("isOpen")) {                                                               
                           $(".checkout_coupon").hide();                                                            
                           dialog.dialog( "close" );                                                                
                       } else {                                                                                     
                           $(".checkout_coupon").show();                                                            
                           dialog.dialog( "open" );                                                                 
                       }                                                                                            
                       return false;});');
}
add_action('woocommerce_before_checkout_form', 'ttp_wc_show_coupon_js', 10);
/**                                                                                                                 
 * Show a coupon link above the order details section.                                                                                                      
 * This is the 'coupon-anchor' div which the modal dialog
 * window will attach to.
 **/
function ttp_wc_show_coupon() {
    global $woocommerce;

    if ($woocommerce->cart->needs_payment()) {
        echo '<span class="show_coupon_div"> Heb je een kortingsbon? <a href="#" id="show-coupon-form">Klik hier om je code in te vullen</a>.</span><div id="coupon-anchor"></div>';
    }
}
add_action('woocommerce_checkout_after_customer_details', 'ttp_wc_show_coupon', 10);

//remove coupon form
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 ); 

// Skip the cart and redirect to check out url when clicking on Add to cart
add_filter ( 'add_to_cart_redirect', 'redirect_to_checkout' );
function redirect_to_checkout() {
    
    global $woocommerce;
    // Remove the default `Added to cart` message
    wc_clear_notices();
    return $woocommerce->cart->get_checkout_url();
    
}

add_action('template_redirect', 'redirection_function');
 
function redirection_function(){
    global $woocommerce;
 
    if( is_checkout() && 0 == sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count) && !isset($_GET['key']) ) {
        wp_redirect( home_url() ); 
        exit;
    }
}

//Empty cart when leave the checkout page.
add_filter( 'woocommerce_add_cart_item_data', 'wdm_empty_cart', 10,  3);

function wdm_empty_cart( $cart_item_data, $product_id, $variation_id ) 
{
    global $woocommerce;
    $woocommerce->cart->empty_cart();
    // Do nothing with the data and return
    return $cart_item_data;
}

// Add Custom Meta Box on product page.
add_action( 'woocommerce_product_options_general_product_data', 'my_custom_field' );

function my_custom_field() {

woocommerce_wp_text_input( 
    array( 
        'id'          => '_subtitle', 
        'label'       => __( 'Subtitle', 'woocommerce' ), 
        'placeholder' => 'Subtitle....',
        'description' => __( 'Enter the subtitle.', 'woocommerce' ) 
    )
);

}
// Save Custom Meta Box on product page.
add_action( 'woocommerce_process_product_meta', 'my_custom_field_save' );

function my_custom_field_save( $post_id ){  

	$subtitle = $_POST['_subtitle'];
	update_post_meta( $post_id, '_subtitle', esc_attr( $subtitle ) );

}
// Change Shipping Method Text
add_filter( 'woocommerce_shipping_package_name', 'custom_shipping_package_name' );
function custom_shipping_package_name( $name ) {
  return '<h3>Bezorgen of afhalen</h3>';
}

add_filter( 'woocommerce_shipping_chosen_method', '__return_false', 99);
add_filter('woocommerce_checkout_get_value','__return_empty_string',10);

add_action( 'woocommerce_review_order_before_order_total', 'custom_cart_total' );
add_action( 'woocommerce_before_cart_totals', 'custom_cart_total' );
function custom_cart_total() {
global $woocommerce;
		if ( is_admin() && ! defined( 'DOING_AJAX' ) )
		return;
    $items = $woocommerce->cart->get_cart();

			foreach($items as $item => $values) { 
				if($values['product_id'] == 701){
					$price = get_post_meta($values['product_id'] , '_price', true);
					WC()->cart->total = $price;
				}
			}
    //var_dump( WC()->cart->total);
}

add_filter( 'woocommerce_package_rates', 'hide_shipping_when_free_is_available', 10, 2 );
 
/**
 * Hide shipping rates when free shipping is available
 *
 * @param array $rates Array of rates found for the package
 * @param array $package The package array/object being shipped
 * @return array of modified rates
 */
function hide_shipping_when_free_is_available( $rates, $package ) {
 	global $woocommerce;
		if ( is_admin() && ! defined( 'DOING_AJAX' ) )
		return;
    $items = $woocommerce->cart->get_cart();

			foreach($items as $item => $values) { 
				$_product =  wc_get_product( $values['data']->get_id()); 
				if($values['product_id'] == 701){
					// Only modify rates if free_shipping is present
					if ( isset( $rates['free_shipping:5'] ) ) {
					unset( $rates['flat_rate:9'] );
						unset( $rates['flat_rate:7'] );						
						// To unset all methods except for free_shipping, do the following
						$free_shipping          = $rates['free_shipping:5'];
						$rates                  = array();
						$rates['free_shipping:5'] = $free_shipping;
					}	
				}
			}

	return $rates;
}
add_action( 'woocommerce_before_checkout_form', 'bbloomer_disable_shipping_local_pickup' );
 
function bbloomer_disable_shipping_local_pickup( $available_gateways ) {
    $packages = WC()->cart->get_shipping_packages();
    foreach ($packages as $key => $value) {
		foreach (WC()->session->cart as $cart_key => $cart_value) {
				if($cart_value['product_id'] != 701){
						$shipping_session = "shipping_for_package_".$key;
						unset(WC()->session->chosen_shipping_methods);
						unset(WC()->session->previous_shipping_methods);
						//unset(WC()->session->$shipping_session);		
						/*  echo "<pre />";
						print_r($cart_value); die;   */
				} else {		
					WC()->session->set('chosen_shipping_methods', array( 'free_shipping:5' ) );
					/* echo "<pre />";
					print_r(WC()->session); die;   */
				}
		}
    }
}
add_action('woocommerce_thankyou', 'wdm_send_order_to_ext'); 
function wdm_send_order_to_ext( $order_id ){

    $order = new WC_Order( $order_id );
    $naam = $order->billing_first_name.' '.$order->billing_last_name;
    $email = $order->billing_email;
    $telefoonnummer = $order->billing_phone;
    $items = $order->get_items();

    foreach ( $items as $item ) {
        $product_name = $item['name'];
        $product_id = $item['product_id'];
        $product_variation_id = $item['variation_id'];
    }
    

    $fields = array(
        '%PROEFTRAINING_DATUM%,0' => get_post_meta($product_variation_id, 'tt_date', true ),
        '%PROEFTRAINING_TEKST%,0' => get_post_meta($product_variation_id, 'tt_text', true ),
        '%TIJDSDUUR_PROEFTRAINING%,0' => get_post_meta($product_variation_id, 'tt_from_to', true ),
        '%BEGINTIJD_PROEFTRAINING%,0' => get_post_meta($product_variation_id, 'tt_start_time', true ),
        
      );

    submit_active_campaign(23, $naam, $email, $telefoonnummer, $fields);
}

function submit_active_campaign($list, $naam, $email, $telefoonnummer, $fields){

    $key = '6b63499f41e755d003f7da682fdb94058fa99e0af0c5f9661dda3c1067a7ac40a5f1d9ab';
    $url = 'https://wattcyclingamstel.api-us1.com';

    $params = [
        'api_key' => $key,
        'api_action' => 'contact_add',
        'api_output' => 'json'
    ];
    
    $post = array(
        'email' => $email,
        'first_name' => $naam,
        'phone' => $telefoonnummer,
        '%PROEFTRAINING_DATUM,0%'=>'02/10/2018',
        'tags' => '',

        "p[${list}]" => $list,  // example list ID (REPLACE '123' WITH ACTUAL LIST ID, IE: p[5] = 5)
        "status[${list}]" => 1       // 1: active, 2: unsubscribed (REPLACE '123' WITH ACTUAL LIST ID, IE: status[5] = 1)
    );

    foreach ($fields as $key => $value) {
        $post["field[%${key}%,0]"] = $value;
    }

    function as_query_string($array)
    {
        return implode('&', array_map(function ($k, $v) {
            return urlencode($k) . '=' . urlencode($v);
        }, array_keys($array), $array));
    }

    $query = as_query_string($params);
    $data = as_query_string($post);

    // define a final API request - GET
    $api = $url . '/admin/api.php?' . $query;

    $request = curl_init($api); // initiate curl object

    curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
    curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
    curl_setopt($request, CURLOPT_POSTFIELDS, $data); // use HTTP POST to send form data
    curl_setopt($request, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false);

    $response = (string)curl_exec($request); // execute curl post and store results in $response

    if (!curl_errno($request)) {
        $info = curl_getinfo($request);

    } else {
        (curl_error($request));
    }

    curl_close($request); // close curl object

    
}

/**
 * @snippet       Add Custom Field to Product Variations - WooCommerce
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode    https://businessbloomer.com/?p=73545
 * @author        Rodolfo Melogli
 * @compatible    Woo 3.3.4
 */
 
// -----------------------------------------
// 1. Add custom field input @ Product Data > Variations > Single Variation
  
add_action( 'woocommerce_variation_options_pricing', 'bbloomer_add_custom_field_to_variations', 10, 3 ); 
 
function bbloomer_add_custom_field_to_variations( $loop, $variation_data, $variation ) {
    woocommerce_wp_text_input( array( 
    'id' => 'tt_date[' . $loop . ']', 
    'class' => 'short', 
    'label' => __( 'Trial training (date)', 'woocommerce' ),
    'value' => get_post_meta( $variation->ID, 'tt_date', true )
        ) 
    );  

    woocommerce_wp_text_input( array( 
    'id' => 'tt_text[' . $loop . ']', 
    'class' => 'short', 
    'label' => __( 'Trial training (date text)', 'woocommerce' ),
    'value' => get_post_meta( $variation->ID, 'tt_text', true )
        ) 
    );  

    woocommerce_wp_text_input( array( 
    'id' => 'tt_from_to[' . $loop . ']', 
    'class' => 'short', 
    'label' => __( 'Trial training (duration: from> to)', 'woocommerce' ),
    'value' => get_post_meta( $variation->ID, 'tt_from_to', true )
        ) 
    );   

    woocommerce_wp_text_input( array( 
    'id' => 'tt_start_time[' . $loop . ']', 
    'class' => 'short', 
    'label' => __( 'Trial training (start time)', 'woocommerce' ),
    'value' => get_post_meta( $variation->ID, 'tt_start_time', true )
        ) 
    );   
}
  
// -----------------------------------------
// 2. Save custom field on product variation save
 
add_action( 'woocommerce_save_product_variation', 'bbloomer_save_custom_field_variations', 12, 2 );
  
function bbloomer_save_custom_field_variations( $variation_id, $i ) {
    $tt_date = $_POST['tt_date'][$i];
    $tt_text = $_POST['tt_text'][$i];
    $tt_from_to = $_POST['tt_from_to'][$i];
    $tt_start_time = $_POST['tt_start_time'][$i];

    if ( ! empty( $tt_date ) ) {
        update_post_meta( $variation_id, 'tt_date', esc_attr( $tt_date ) );
    } else delete_post_meta( $variation_id, 'tt_date' );

    if ( ! empty( $tt_text ) ) {
        update_post_meta( $variation_id, 'tt_text', esc_attr( $tt_text ) );
    } else delete_post_meta( $variation_id, 'tt_text' );


    if ( ! empty( $tt_from_to ) ) {
        update_post_meta( $variation_id, 'tt_from_to', esc_attr( $tt_from_to ) );
    } else delete_post_meta( $variation_id, 'tt_from_to' );


    if ( ! empty( $tt_start_time ) ) {
        update_post_meta( $variation_id, 'tt_start_time', esc_attr( $tt_start_time ) );
    } else delete_post_meta( $variation_id, 'tt_start_time' );
}
  
// -----------------------------------------
// 3. Store custom field value into variation data
  
add_filter( 'woocommerce_available_variation', 'bbloomer_add_custom_field_variation_data' );
 
function bbloomer_add_custom_field_variation_data( $variations ) {
    $variations['tt_date'] = '<div class="woocommerce_tt_date">Trial training (date): <span>' . get_post_meta( $variations[ 'variation_id' ], 'tt_date', true ) . '</span></div>';

    $variations['tt_text'] = '<div class="woocommerce_tt_text">Trial training (date text): <span>' . get_post_meta( $variations[ 'variation_id' ], 'tt_text', true ) . '</span></div>';

    $variations['tt_from_to'] = '<div class="woocommerce_tt_from_to">Trial training (duration: from> to): <span>' . get_post_meta( $variations[ 'variation_id' ], 'tt_from_to', true ) . '</span></div>';

    $variations['tt_start_time'] = '<div class="woocommerce_tt_start_time">Trial training (start time): <span>' . get_post_meta( $variations[ 'variation_id' ], 'tt_start_time', true ) . '</span></div>';

    return $variations;
}


function product_create_custom_field() {
     $args = array(
         'id' => 'notification_email',
         'label' => __( 'Notification Email', 'cfwc' ),
         'class' => 'notification_email',
         'type' => 'email',
         'placeholder' => 'Email',
         'desc_tip' => true,
         'description' => __( '', 'ctwc' ),
     );
     woocommerce_wp_text_input( $args );
}
add_action( 'woocommerce_product_options_general_product_data', 'product_create_custom_field' );


add_action( 'woocommerce_process_product_meta', 'wc_custom_save_custom_fields' );
function wc_custom_save_custom_fields( $post_id ) {
    if ( ! empty( $_POST['notification_email'] ) ) {
        update_post_meta( $post_id, 'notification_email', esc_attr( $_POST['notification_email'] ) );
    }
}




add_filter( 'woocommerce_email_recipient_new_order', 'your_email_recipient_filter_function', 10, 2);

function your_email_recipient_filter_function($recipient, $object) {
   
    $recipient ='quintdeveloper@gmail.com';
    return $recipient;
}

function product_create_custom_field() {
     $args = array(
         'id' => 'notification_email',
         'label' => __( 'Notification Email', 'cfwc' ),
         'class' => 'notification_email',
         'type' => 'email',
         'placeholder' => 'Email',
         'desc_tip' => true,
         'description' => __( '', 'ctwc' ),
     );
     woocommerce_wp_text_input( $args );
}
add_action( 'woocommerce_product_options_general_product_data', 'product_create_custom_field' );


add_action( 'woocommerce_process_product_meta', 'wc_custom_save_custom_fields' );
function wc_custom_save_custom_fields( $post_id ) {
    if ( ! empty( $_POST['notification_email'] ) ) {
        update_post_meta( $post_id, 'notification_email', esc_attr( $_POST['notification_email'] ) );
    }
}