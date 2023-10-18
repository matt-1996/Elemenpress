<?php
/*
Plugin Name: ElementPress
Plugin URI: licence
Description: licence
Author: Matin Lahijani
Author URI: https://www.linkedin.com/in/matt-lahijani-48858b113/
License: GPLv2 or later
Text Domain:DashPress
Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define('DASHPRESSPATH', plugin_dir_path( __FILE__ ));
define('ElEMENTORPRESSURL' , plugin_dir_url( __FILE__ ));
include DASHPRESSPATH . 'addons/auth/DashPressAjaxLoginHandler.php';
include DASHPRESSPATH . 'addons/woocommerce/AjaxCard/ajaxDeleteHandler.php';
include DASHPRESSPATH . 'addons/woocommerce/AjaxCard/AjaxGetCart.php';
include DASHPRESSPATH . 'addons/woocommerce/AjaxCard/ajaxSetQuantity.php';
include DASHPRESSPATH . 'addons/woocommerce/AjaxCard/ajaxApplyDiscountCode.php';
require_once 'ElementPressMain.php';
new ElementPressMain();
