<?php

require_once DASHPRESSPATH . 'include/Enqueue_Manager.php';
require_once DASHPRESSPATH . 'addons/etc/weather/getForecast.php';
class ElementPressMain{

    public function __construct(){
        
        add_action( 'elementor/widgets/register', [$this,'register_name_widget'] );
        new ElementorPress_Enqueue_Manager();
        // $a = new getForecast('tehran');
        //  $a->isCelcius();        
        
    }

    function register_name_widget( $widgets_manager ) {

        require_once( DASHPRESSPATH . 'addons/user/UserName.php' );
        require_once( DASHPRESSPATH . 'addons/user/email.php' );
        require_once( DASHPRESSPATH . 'addons/user/firstname.php' );
        require_once( DASHPRESSPATH . 'addons/user/lastname.php' );
        require_once( DASHPRESSPATH . 'addons/user/avatar.php' );
        require_once(DASHPRESSPATH  . 'addons/auth/login.php');
        require_once(DASHPRESSPATH . 'addons/widgets/weather/weatherWidget.php');
    
        $widgets_manager->register( new UserName() );
        $widgets_manager->register( new ElementorPressEmailWidget() );
        //$widgets_manager->register( new ElementorPress_Firstname_Widget() );
        //$widgets_manager->register( new ElementorPress_Lastname_Widget() );
        $widgets_manager->register( new ElementorPress_Avatar_Widget() );
        $widgets_manager->register( new ElementorPress_Login() );
        $widgets_manager->register( new ElementorPressWeatherWidget() );
        
    
    }
}