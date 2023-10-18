<?php 

add_action( 'wp_ajax_ElementPressAjaxCartApplyDiscountCode', 'ElementPress_Ajax_Cart_Apply_Discount_Code' );
add_action( 'wp_ajax_nopriv_ElementPressAjaxCartApplyDiscountCode', 'ElementPress_Ajax_Cart_Apply_Discount_Code' );

function ElementPress_Ajax_Cart_Apply_Discount_Code(){

    $discount_code = $_POST["ElementPressAjaxCartDiscountCode"];

    $res = WC()->cart->apply_coupon( $discount_code );

    return wp_send_json( ["success" => true] , 200 );

}