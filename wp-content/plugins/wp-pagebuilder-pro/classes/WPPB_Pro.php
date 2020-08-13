<?php

class WPPB_Pro{
	public static $instance = null;

	public $wppb_updater;
	public $wppb_pro_general;
	public $wppb_pro_addons;

	/**
	 * WPPB constructor
	 */
	public function __construct() {
		$this->register_autoloader();
		add_action( 'init', array($this, 'init'), 0 );
	}

	public function init(){
		$this->init_components();
	}

	/**
	 * @return null|WPPB
	 *
	 * instance of WPPB Class
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
			do_action( 'wppb_pro_loaded' );
		}

		return self::$instance;
	}

	/**
	 * Auto load class
	 */
	private function register_autoloader() {
		require WPPB_PRO_DIR_PATH . 'classes/WPPB_Pro_Autoloader.php';
		\WPPB_Pro\WPPB_Pro_Autoloader::run();
	}

	/**
	 * Init all components
	 *
	 * @since v.1.0.0
	 */
	private function init_components(){
		$this->wppb_updater = new  WPPB_Updater();
		$this->wppb_pro_general = new  WPPB_Pro_General();
		$this->wppb_pro_addons = new WPPB_Pro_Addons();
	}
}

if ( ! function_exists('get_wppb_array_value_by_key')){
	function get_wppb_array_value_by_key($array = array(), $key = null){
		$value = null;
		if ( key_exists($key, $array)){
			$value = $array[$key];
		}
		return $value;
	}
}

if (! function_exists('wppb_pro_init')){
	function wppb_pro_init(){
		WPPB_Pro::instance();
	}
}
wppb_pro_init();

