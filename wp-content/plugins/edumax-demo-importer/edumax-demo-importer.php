<?php
/**
 * Plugin Name: Edumax Demo Importer
 * Plugin URI: http://www.themeum.com
 * Description: Themeum Demo Importer is ultimate event plugins
 * Author: Themeum
 * Version: 1.0.2
 * Author URI: http://www.themeum.com
 *
 * Tested up to: 4.0
 * Text Domain: edumax-demo-importer
 *
 * @package Themeum Edumax
 * @category Core
 * @author Themeum
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
include_once( 'framework.php' );
include_once( 'import-functions.php' );
include_once( 'sample-config.php' );


function edumax_demo_importer_load_admin_assets() {
    wp_enqueue_style( 'edumax-demo-importer-css', plugins_url('assets/css/custom.css', __FILE__) );
}
add_action( 'admin_enqueue_scripts', 'edumax_demo_importer_load_admin_assets' );