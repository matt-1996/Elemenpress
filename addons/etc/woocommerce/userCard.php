<?php 

class userCard {


    public function getCardItems()
    {
        global $woocommerce;
        
        $items = $woocommerce->cart->get_cart();

        return $items;
 
        // foreach($items as $item => $values) { 
        //     $ElementPressProduct =  wc_get_product( $values['data']->get_id()); 
        //    // echo "<b>".$ElementPressProduct->get_title().'</b>  <br> Quantity: '.$values['quantity'].'<br>'; 
        //     $price = get_post_meta($values['product_id'] , '_price', true);
        //    // echo "  Price: ".$price."<br>";
        // } 

    

        // var_dump($ElementPressProduct);
    }
}