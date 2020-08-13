<?php
/*
* Plugin Name: Edumax Core
* Plugin URI: http://www.themeum.com/item/core
* Author: Themeum
* Author URI: http://www.themeum.com
* License - GNU/GPL V2 or Later
* Description: Edumax Core is a required plugin for this theme.
* Version: 2.0.2
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; # Exit if accessed directly
}
define('EDUMAX_CORE_VERSION', '2.0.2');
define( 'EDUMAX_CORE_URL', plugin_dir_url(__FILE__) );
define('PLUGIN_DIR', plugin_dir_path( __FILE__ ));

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

# language
add_action( 'init', 'edumax_core_language_load' );
function edumax_core_language_load(){
    $plugin_dir = basename(dirname(__FILE__))."/languages/";
    load_plugin_textdomain( 'edumax-core', false, $plugin_dir );
}

# Custom Customizer
include_once( 'customizer/libs/googlefonts.php' );
include_once( 'customizer/customizer.php' );
require_once( 'lib/auto-update.php');
/* ------------------------------------------
*               Customizer
* ------------------------------------------- */
function edumax_customize_control_js() {
    wp_enqueue_script( 'color-preset-control', plugins_url('assets/js/color-scheme-control.js', __FILE__));
}
add_action( 'customize_controls_enqueue_scripts', 'edumax_customize_control_js' );

# wp load login modal
function load_login_modal() {
    include_once( 'lib/login-modal.php' );
}
add_action( 'wp_footer', 'load_login_modal' );


# Add CSS for Frontend
add_action( 'wp_enqueue_scripts', 'edumax_core_style' );
if(!function_exists('edumax_core_style')):
function edumax_core_style(){
    wp_enqueue_style('plugin-core-css',plugins_url('assets/css/themeum-core.css',__FILE__));
    # JS
    wp_enqueue_script('themeumcore-main',plugins_url('assets/js/main.js',__FILE__), array('jquery'));
}
endif;

function themeum_load_admin_assets() {
    wp_enqueue_script( 'themeum-admin', plugins_url('assets/js/admin.js', __FILE__), array('jquery') );
    wp_enqueue_style('plugin-core-css',plugins_url('assets/css/themeum-core.css',__FILE__));
    wp_enqueue_style('plugin-core-css',plugins_url('assets/css/tutor-front.min.css',__FILE__));

    
}
add_action( 'admin_enqueue_scripts', 'themeum_load_admin_assets' );


# Metabox Include
include_once( 'post-type/meta_box.php' );
include_once( 'post-type/meta-box/meta-box.php' );
# End ... Themeum Core.

if(is_plugin_active('tutor/tutor.php')){
    # course container class
    function edumax_course_container_class($arg) {
        $arg[] = 'container';
        return $arg;
    }
    add_filter('tutor_post_class', 'edumax_course_container_class');
    add_filter('tutor_container_classes', 'edumax_course_container_class');

}

# Course Search Shortcode
require_once('shortcode/search.php');
# WP Pagebuilder Widget
include_once( PLUGIN_DIR . 'thm-wppb/thm_wppb.php' );

/* -------------------------------------------
* 				login system
* -------------------------------------------- */
require_once( PLUGIN_DIR . '/lib/login/login.php' );

# Qubely Blocks are enable.
require_once( PLUGIN_DIR . 'core/Base.php' );
require_once( PLUGIN_DIR . 'core/qubely-register-api-hook.php' );

