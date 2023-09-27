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
      
        
    }
}