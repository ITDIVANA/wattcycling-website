<?php
function wpdocs_dequeue_script() {
    wp_dequeue_script( 'theme-scripts' );
}
//add_action( 'wp_print_scripts', 'wpdocs_dequeue_script', 100 );

function wpdocs_jupiter_child_scripts() {
    //wp_enqueue_style( 'style-name', get_stylesheet_uri() );
    wp_enqueue_script( 'jupiter-child-scripts', get_stylesheet_directory_uri() . '/assets/js/core-scripts.js');
}
//add_action( 'wp_enqueue_scripts', 'wpdocs_jupiter_child_scripts' );

//**
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
    
    global $woocommerce;
    
    
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

    // Email admin with new order email
    $notification_email = get_post_meta($product_id,'notification_email',true); 
    if(!empty($notification_email)){

        $mailer = $woocommerce->mailer();
        $adminEmail = $mailer->emails['WC_Email_New_Order'];
        $adminEmail->recipient = $notification_email;
        $adminEmail->trigger( $order_id );  
    }
    
   

    $isOn = get_post_meta($product_variation_id, 'tt_on', true );
    $fields = array(    
        '%PROEFTRAINING_DATUM%,0' => get_post_meta($product_variation_id, 'tt_date', true ),
        '%PROEFTRAINING_TEKST%,0' => get_post_meta($product_variation_id, 'tt_text', true ),
        '%TIJDSDUUR_PROEFTRAINING%,0' => get_post_meta($product_variation_id, 'tt_from_to', true ),
        '%BEGINTIJD_PROEFTRAINING%,0' => get_post_meta($product_variation_id, 'tt_start_time', true ),
        
      );
    if($isOn == 'yes'){
       $tag =  get_post_meta($product_variation_id, 'tt_tag', true );
       submit_active_campaign(23, $naam, $email, $telefoonnummer, $fields,$tag);  // send data to active campaign
    }

   
    
}

function submit_active_campaign($list, $naam, $email, $telefoonnummer, $fields,$tag=''){

    $key = '6b63499f41e755d003f7da682fdb94058fa99e0af0c5f9661dda3c1067a7ac40a5f1d9ab';
    $url = 'https://wattcyclingamstel.api-us1.com';

    $params = [
        'api_key' => $key,
        'api_action' => 'contact_sync',
        'api_output' => 'json'
    ];
    
    $post = array(
        'email' => $email,
        'first_name' => $naam,
        'phone' => $telefoonnummer,
        'tags' => $tag,

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
  
add_action( 'woocommerce_product_after_variable_attributes', 'bbloomer_add_custom_field_to_variations', 10, 3 ); 
 
function bbloomer_add_custom_field_to_variations( $loop, $variation_data, $variation ) {

    woocommerce_wp_checkbox( array( 
    'id' => 'tt_on[' . $loop . ']', 
    'class' => 'short', 
    'label' => __( 'Trial training on/off ', 'woocommerce' ),
    'value' => get_post_meta( $variation->ID, 'tt_on', true )
        ) 
    ); 

    woocommerce_wp_text_input( array( 
    'id' => 'tt_date[' . $loop . ']', 
    'class' => 'short datepicker', 
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

     woocommerce_wp_text_input( array( 
    'id' => 'tt_tag[' . $loop . ']', 
    'class' => 'short', 
    'label' => __( 'Training Tag', 'woocommerce' ),
    'value' => get_post_meta( $variation->ID, 'tt_tag', true )
        ) 
    );   
}
  
// -----------------------------------------
// 2. Save custom field on product variation save
 
add_action( 'woocommerce_save_product_variation', 'bbloomer_save_custom_field_variations', 10, 2 );
  
function bbloomer_save_custom_field_variations( $variation_id, $i ) {
    $tt_date = $_POST['tt_date'][$i];
    $tt_text = $_POST['tt_text'][$i];
    $tt_from_to = $_POST['tt_from_to'][$i];
    $tt_start_time = $_POST['tt_start_time'][$i];
    $tt_tag = $_POST['tt_tag'][$i];
    $tt_on = $_POST['tt_on'][$i];

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

     if ( ! empty( $tt_tag ) ) {
        update_post_meta( $variation_id, 'tt_tag', esc_attr( $tt_tag ) );
    } else delete_post_meta( $variation_id, 'tt_tag' );

     if ( ! empty( $tt_on ) ) {
        update_post_meta( $variation_id, 'tt_on', esc_attr( $tt_on ) );
    } else delete_post_meta( $variation_id, 'tt_on' );
}
  
// -----------------------------------------
// 3. Store custom field value into variation data
  
add_filter( 'woocommerce_available_variation', 'bbloomer_add_custom_field_variation_data' );
 
function bbloomer_add_custom_field_variation_data( $variations ) {
    $variations['tt_date'] = '<div class="woocommerce_tt_date">Trial training (date): <span>' . get_post_meta( $variations[ 'variation_id' ], 'tt_date', true ) . '</span></div>';

    $variations['tt_text'] = '<div class="woocommerce_tt_text">Trial training (date text): <span>' . get_post_meta( $variations[ 'variation_id' ], 'tt_text', true ) . '</span></div>';

    $variations['tt_from_to'] = '<div class="woocommerce_tt_from_to">Trial training (duration: from> to): <span>' . get_post_meta( $variations[ 'variation_id' ], 'tt_from_to', true ) . '</span></div>';

    $variations['tt_start_time'] = '<div class="woocommerce_tt_start_time">Trial training (start time): <span>' . get_post_meta( $variations[ 'variation_id' ], 'tt_start_time', true ) . '</span></div>';

     $variations['tt_tag'] = '<div class="woocommerce_tt_tag">Tag: <span>' . get_post_meta( $variations[ 'variation_id' ], 'tt_tag', true ) . '</span></div>';

      $variations['tt_on'] = '<div class="woocommerce_tt_on">Trial training on/off: <span>' . get_post_meta( $variations[ 'variation_id' ], 'tt_on', true ) . '</span></div>';

    return $variations;
}



add_filter( 'woocommerce_email_recipient_new_order', 'your_email_recipient_filter_function', 10, 2);

function your_email_recipient_filter_function($recipient, $object) {
        
    if(!empty($object)){
         $items = $object->get_items();
         $id = 0;

        foreach ( $items as $item ) {
             $id =  $item['product_id'];
        } 
        $notification_email = get_post_meta($id,'notification_email',true);

         if(!empty($notification_email)){

            $recipient = $notification_email;
         }
    }

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

add_action('admin_footer', 'my_admin_add_js');
function my_admin_add_js() {
    echo '<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">';
    echo '<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>';
    echo  '<script> $( function() { $(".datepicker").live("click", function() { $(this).datepicker("destroy").datepicker({ dateFormat: "mm/dd/yy" }).focus(); }); }); </script>';
}

/*function add_expedited_order_woocommerce_email( $email_classes ) {
print_r($email_classes['WC_Email_New_Order']->recipient);
}
add_filter( 'woocommerce_email_classes', 'add_expedited_order_woocommerce_email' );*/
