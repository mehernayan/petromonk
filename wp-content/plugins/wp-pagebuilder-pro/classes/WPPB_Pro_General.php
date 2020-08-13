<?php

if ( ! class_exists('WPPB_Pro_General')){

	class WPPB_Pro_General{

		public function __construct() {
			add_filter('wppb_api_request_body', array($this, 'wppb_api_request_body'), 10);
			add_filter('wppb_page_data', array($this, 'get_wppb_page_data'));
		}

		/**
		 * @param $arr
		 *
		 * @return mixed
		 */
		public function wppb_api_request_body($arr){
			$arr['wppb_pro_request_version'] = WPPB_PRO_VERSION;
			return $arr;
		}

		public function get_wppb_page_data($page_data){
			$page_data['WPPB_PRO_VERSION'] = WPPB_PRO_VERSION;
			return $page_data;
		}
	}
}