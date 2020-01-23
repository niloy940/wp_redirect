<?php
/**
 * Plugin Name: Redirect
 * Description: Set cart item & Redirect to checkout page
 * Author: Niloy Quazi
 * Author URI: #
 */

/**
 * Set cart item quantity
 */
add_action('woocommerce_add_to_cart', 'custome_add_to_cart');
function custome_add_to_cart()
{
    global $woocommerce;
    foreach ($woocommerce->cart->get_cart() as $cart_item_key => $cart_item) {
        $woocommerce->cart->set_quantity($cart_item_key, '1');
    }
}

/**
 * Redirect subscription add to cart to checkout page
 *
 * @param none
 */
function add_to_cart_checkout_redirect()
{
    wp_safe_redirect(get_permalink(get_option('woocommerce_checkout_page_id')));
    die();
}
add_action('woocommerce_add_to_cart', 'add_to_cart_checkout_redirect', 11);
