<?php

class ElementorPress_Enqueue_Manager{

    public function __construct(){

        // $this->enqueueStyles();
        add_action('wp_enqueue_scripts', [$this , 'enqueueUserStyles']);
    }


    function enqueueUserStyles(){
        // wp_enqueue_style( 'dashlogin', DASHPATH . 'assets/css/login.css' );
        wp_register_script( 'ElementorpressLoginHandler', ElEMENTORPRESSURL . 'assets/js/elementorpress_Ajax_Login.js', ['jquery'], null, false );
        wp_enqueue_script('ElementorpressLoginHandler');

        wp_register_script( 'ElementPress_Ajax_Cart_Item_Remove', ElEMENTORPRESSURL . 'assets/js/Ajax_Delete_Cart_Item.js', ['jquery'], null, false );
        wp_enqueue_script('ElementPress_Ajax_Cart_Item_Remove');

        wp_register_script( 'ElementPress_Ajax_Cart_Set_Quantity', ElEMENTORPRESSURL . 'assets/js/Ajax_Cart_SetQuantity.js', ['jquery'], null, false );
        wp_enqueue_script('ElementPress_Ajax_Cart_Set_Quantity');

        wp_register_script( 'ElementPress_Ajax_Cart_Apply_Discount_Code', ElEMENTORPRESSURL . 'assets/js/Ajax_Apply_Discount_Code.js', ['jquery'], null, false );
        wp_enqueue_script('ElementPress_Ajax_Cart_Apply_Discount_Code');
      
        
    }
}