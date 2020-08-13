<?php
namespace WPPB_Pro;

if ( ! defined( 'ABSPATH' ) ) exit;

class WPPB_Pro_Autoloader {

	private static $classes_map = array(
		'WPPB_Updater'          => 'classes/WPPB_Updater.php',
		'WPPB_Pro_General'      => 'classes/WPPB_Pro_General.php',
		'WPPB_Pro_Addons'       => 'classes/WPPB_Pro_Addons.php',
	);

	public static function run() {
		spl_autoload_register([ __CLASS__, 'loader' ]);
	}

	private static function loader($className) {
		if ( ! class_exists($className)){
			$file_name = '';
			if ( ! empty( self::$classes_map[$className] )){
				$file_name = WPPB_PRO_DIR_PATH.self::$classes_map[$className];
			}else{
				$className = strtolower(
					preg_replace(
						[ '/([a-z])([A-Z])/', '/_/', '/\\\/' ],
						[ '$1-$2', '-', DIRECTORY_SEPARATOR ],
						$className
					)
				);

				$file_name = WPPB_PRO_DIR_PATH.'classes/'.$className.'.php';
			}

			if ( is_readable( $file_name ) ) {
				require_once $file_name;
			}
		}
	}

}