<?php 

add_action( 'wp_ajax_ElementPressAjaxCartSetQuantity', 'ElementPress_Ajax_Set_Quantity' );
add_action( 'wp_ajax_nopriv_ElementPressAjaxCartSetQuantity', 'ElementPress_Ajax_Set_Quantity' );

function ElementPress_Ajax_Set_Quantity(){
    global $woocommerce; 

    $product_id = $_POST["ElementPress_cart_product_id"];

    $quantity = $_POST["ElementPress_cart_quantity"];

    foreach ( $woocommerce->cart->get_cart() as $item_key => $item ) {
        // If the targeted variation id is in cart
        if ( $item['variation_id'] == $product_id ) {
            WC()->cart->set_quantity($item_key, $quantity);
           
            return wp_send_json([
                'success' => true
            ],200);
        }

        if($item['product_id'] == $product_id){
            WC()->cart->set_quantity($item_key, $quantity);
            
            return wp_send_json([
                'success' => true
            ],200);
        }
    }    
}