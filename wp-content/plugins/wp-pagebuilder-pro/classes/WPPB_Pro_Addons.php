<?php

if ( ! class_exists('WPPB_Pro_Addons')){
	class WPPB_Pro_Addons{

		public function __construct() {
			$this->load_pro_addons();
			$this->add_hook();
		}

		public function load_pro_addons(){
			$pro_addons_path = WPPB_PRO_DIR_PATH.'addons/';
			$addons_arr = glob($pro_addons_path.'*');

			foreach ($addons_arr as $addons_dir){
				$addon_name = str_replace(trailingslashit(dirname($addons_dir)), '', $addons_dir);
				$addon_name_file_path = trailingslashit($addons_dir).$addon_name.'.php';

				if (file_exists($addon_name_file_path)){
					include $addon_name_file_path;
				}
			}
		}

		/**
		 * Add hook
		 *
		 * @since v.1.0.0
		 */
		public function add_hook(){
			add_filter('wppb_available_addons', array($this, 'load_default_pro_addons'), 10,1);
		}

		/**
		 * @param $addons
		 *
		 * @return array
		 *
		 * Add default pro addons
		 */
		public function load_default_pro_addons($addons){
			$addons[] = 'WPPB_Addon_Gmap';
        	$addons[] = 'WPPB_Addon_Shortcode';
        	$addons[] = 'WPPB_Addon_Price_List';
        	$addons[] = 'WPPB_Addon_Table';
        	$addons[] = 'WPPB_Addon_Instagram';
        	$addons[] = 'WPPB_Addon_Animated_Heading';
        	$addons[] = 'WPPB_Addon_Advanced_List';
        	$addons[] = 'WPPB_Addon_Divider';
        	$addons[] = 'WPPB_Addon_Timeline';
			return $addons;
		}
	}
}