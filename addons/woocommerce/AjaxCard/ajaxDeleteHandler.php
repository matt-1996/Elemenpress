<?php 

add_action( 'wp_ajax_ElementPressAjaxCartDeleteItem', 'ElementPress_Ajax_Cart_Item_Remove' );
add_action( 'wp_ajax_nopriv_ElementPressAjaxCartDeleteItem', 'ElementPress_Ajax_Cart_Item_Remove' );

function ElementPress_Ajax_Cart_Item_Remove(){
    global $woocommerce; 
    $id = $_POST['ElementPressAjaxCartDeleteItemID'];
    $product_id = $id;
    
        global $woocommerce;

        // $items = $woocommerce->cart->get_cart();

        $product_cart_id = $woocommerce->cart->generate_cart_id( $product_id );

        $in_cart = $woocommerce->cart->find_product_in_cart( $product_cart_id );
        
        
        foreach ( WC()->cart->get_cart() as $item_key => $item ) {
            // If the targeted variation id is in cart
            if ( $item['variation_id'] == $product_id ) {
                WC()->cart->remove_cart_item( $item_key ); 
            }

            $woocommerce->cart->remove_cart_item($in_cart);
        }    
                

    return wp_send_json([
        'success' => true,
        'message' => 'Delete Success'
       ],
        200  );
}

function remove_product_from_cart(){
    $product_id = $_POST['ElementPressAjaxCartDeleteItem'];
	$product_cart_id = WC()->cart->generate_cart_id( $product_id );
	$cart_item_key = WC()->cart->find_product_in_cart( $product_cart_id );
	if ( $cart_item_key ) {
		WC()->cart->remove_cart_item( $cart_item_key );
	}
}