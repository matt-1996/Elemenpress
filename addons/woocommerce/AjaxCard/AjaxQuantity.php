<?php 

global $woocommerce;

$cart = $woocommerce->cart->get_cart();

$product_cart_id = $woocommerce->cart->generate_cart_id( $product_id );

$in_cart = $woocommerce->cart->find_product_in_cart( $product_cart_id );

var_dump($in_cart);