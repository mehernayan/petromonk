<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class WPPB_Addon_Shortcode{

	public function get_name(){
		return 'wppb_shortcode';
	}
	public function get_title(){
		return 'Shortcode';
	}
	public function get_icon() {
		return 'wppb-font-add-row';
	}
	public function get_category_name(){
        return 'Pro Addons';
    }

	// Shortcode Settings Fields
	public function get_settings() {
		$settings = array(
			'shortcode' => array(
				'type' => 'textarea',
				'title' => __('Shortcode','wp-pagebuilder-pro'),
				'placeholder' => __('Put here shortcode','wp-pagebuilder-pro'),
			)
		);
		return $settings;
	}

	// Video Render HTML
	public function render($data = null){
		$settings 		= $data['settings'];
		$shortcode 		= isset($settings['shortcode']) ? $settings['shortcode'] : '';
		return do_shortcode( stripslashes( $shortcode ) );
	}

}