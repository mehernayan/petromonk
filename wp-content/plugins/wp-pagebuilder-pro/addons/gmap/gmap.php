<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class WPPB_Addon_Gmap{

	public function get_name(){
		return 'wppb_gmap';
	}
	public function get_title(){
		return 'Google Map';
	}
	public function get_icon() {
		return 'wppb-font-map';
	}
	public function get_category_name(){
        return 'Pro Addons';
    }

	// Google map Settings Fields
	public function get_settings() {

		$settings = array(

			'gmap_address' => array(
				'type' => 'textarea',
				'title' => __('Address','wp-pagebuilder-pro'),
				'std' => 'Dhaka, Bangladesh',
			),

			//style
			'gmap_zoom' => array(
				'type' => 'slider',
				'title' => __('Map Zoom','wp-pagebuilder-pro'),
				'std' => '8',
				'range' => array(
					'min' => 0,
					'max' => 20,
				),
				'responsive' => false,
			),
			'gmap_height' => array(
				'type' => 'slider',
				'title' => __('Map Height','wp-pagebuilder-pro'),
				'unit' => array( 'px','%','em' ),
				'range' => array(
						'em' => array(
							'min' => 0,
							'max' => 250,
							'step' => .1,
						),
						'px' => array(
							'min' => 0,
							'max' => 1500,
							'step' => 1,
						),
						'%' => array(
							'min' => 0,
							'max' => 100,
							'step' => 1,
						),
					),
				'std' => array(
						'md' => '400px',
						'sm' => '',
						'xs' => '',
					),
				'responsive' => true,
				'selector' => '{{SELECTOR}} .wppb-gmap-canvas, {{SELECTOR}} .wppb-gmap-canvas iframe { height: {{data.gmap_height}}; }',
			),
			'gmap_width' => array(
				'type' => 'slider',
				'title' => __('Map Width','wp-pagebuilder-pro'),
				'unit' => array( 'px','%','em' ),
				'range' => array(
						'em' => array(
							'min' => 0,
							'max' => 350,
							'step' => .1,
						),
						'px' => array(
							'min' => 0,
							'max' => 2000,
							'step' => 1,
						),
						'%' => array(
							'min' => 0,
							'max' => 100,
							'step' => 1,
						),
					),
				'std' => array(
						'md' => '100%',
						'sm' => '',
						'xs' => '',
					),
				'responsive' => true,
				'selector' => '{{SELECTOR}} .wppb-gmap-canvas, {{SELECTOR}} .wppb-gmap-canvas iframe { width: {{data.gmap_width}}; }',
			),
			//style
			'gmap_filter' => array(
				'type' => 'filter',
				'title' => __('CSS filter','wp-pagebuilder-pro'),
				'tab' => 'style',
				'selector' => '{{SELECTOR}} .wppb-gmap-canvas iframe',
			),
		);
		return $settings;
	}

	// Google Map Simple Render HTML
	public function render($data = null){
		$settings 		    = $data['settings'];
		$gmap_address 		= isset($settings['gmap_address']) ? $settings['gmap_address'] : '';
		$gmap_zoom 		    = isset($settings['gmap_zoom']) ? $settings['gmap_zoom'] : '8';

		$output =  '';
			$output  .= '<div class="wppb-gmap-simple-addon">';
				$output  .= '<div class="wppb-gmap-simple-addon-content">';
					$output  .= '<div class="wppb-gmap-canvas"><iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q='.rawurlencode( $gmap_address ).'&amp;t=m&amp;z='.absint( $gmap_zoom ).'&amp;output=embed&amp;iwloc=near" aria-label="'.esc_attr( $gmap_address ).'"></iframe></div>';
				$output  .= '</div>';
			$output  .= '</div>';

		return $output;


	}

	// raw Template
	public function getTemplate(){
		$output = '
		<div class="wppb-gmap-simple-addon">
			<div class="wppb-gmap-simple-addon-content">
				<div class="wppb-gmap-canvas"><iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q={{data.gmap_address}}&amp;t=m&amp;z={{data.gmap_zoom}}&amp;output=embed&amp;iwloc=near" aria-label="{{data.gmap_address}}"></iframe></div>
			</div>
		</div>
		';
		return $output;
	}

}
	
