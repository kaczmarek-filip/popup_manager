<?php
/**
* Plugin Name: Wordpress Popup Manager
* Plugin URI: https://github.com/kaczmarek-filip
* Description: Add custom popups to your site
* Version: 1.0
* Author: Filip Kaczmarek
* Author URI: https://github.com/kaczmarek-filip
**/

include_once( plugin_dir_path( __FILE__ ) . 'popup/includes/include.php');
include_once( plugin_dir_path( __FILE__ ) . 'popup/includes/delete.php');
include_once( plugin_dir_path( __FILE__ ) . 'popup/public/create_popup.php');
// include_once( plugin_dir_path( __FILE__ ) . 'popup/css/popup_menu_page.css');
function wpse_enqueue_custom_script() {
    // Dodawanie pliku JavaScript
    wp_enqueue_script('create_popup_js', plugins_url('popup/js/popup.js', __FILE__));
}
add_action( 'wp_enqueue_scripts', 'wpse_enqueue_custom_script' );