<?php
/*
 * Plugin Name:       WP Page Builder Pro
 * Plugin URI:        https://www.themeum.com/product/wp-pagebuilder/
 * Description:       This plugins is a pro version of WP Page Builder regular version
 * Version:           1.0.8
 * Author:            Themeum
 * Author URI:        https://themeum.com
 * Text Domain:       wp-pagebuilder-pro
 * Domain Path:       /languages
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Language Load
add_action( 'init', 'wppb_builder_pro_language_load');
function wppb_builder_pro_language_load(){
    $plugin_dir = basename(dirname(__FILE__))."/languages/";
    load_plugin_textdomain( 'wp-pagebuilder-pro', false, $plugin_dir );
}

//Defining WP Pagebuilder Pro Version
define('WPPB_PRO_VERSION', '1.0.8');

// Define Dir URL
define('WPPB_PRO_DIR_URL', plugin_dir_url(__FILE__));

// Define Physical Path
define('WPPB_PRO_DIR_PATH', plugin_dir_path(__FILE__));

//WP PageBuilder Base Name
define('WPPB_PRO_BASENAME', plugin_basename(__FILE__));

require_once WPPB_PRO_DIR_PATH.'classes/WPPB_Pro.php'; // Loading Page Builder Pro Main Files


add_action('wp_enqueue_scripts', 'wppb_enqueue_styles');
function wppb_enqueue_styles(){
    wp_enqueue_style( 'wppb-pro-addon', WPPB_PRO_DIR_URL . 'assets/css/wppb-pro-addon.css',false,'all');
}