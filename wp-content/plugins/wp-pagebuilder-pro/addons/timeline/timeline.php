<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class WPPB_Addon_Timeline{

	public function get_name(){
		return 'wppb_timeline';
	}
	public function get_title(){
		return 'Timeline';
	}
	public function get_icon() {
		return 'wppb-font-timeline';
	}
	public function get_category_name(){
        return 'Pro Addons';
    }

	// Timeline Settings Fields
	public function get_settings() {

		$settings = array(
			'connector_position' => array(
				'type' => 'select',
				'title' => __('Orientation','wp-pagebuilder-pro'),
				'placeholder' => __('Select Placeholder','wp-pagebuilder-pro'),
				'values' => array(
					'left' => 'Left',
					'center' => 'Center',
					'right' => 'Right',
				),
				'std' => 'center',
			),
			'timeline_list' => array(
				'title' => __('Timeline','wp-pagebuilder-pro'),
				'type'  => 'repeatable',
				'label' => 'title',
				'std' => array(
					array( 
						'title' => 'Readymade Blocks',
						'content' => 'Reprehenderit enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor',
						'time_line_date' => '28 Aug 2019'
					),
					array( 
						'title' => 'Pre-Made Sections',
						'content' => 'Anim pariatur cliche reprehenderit enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor',
						'time_line_date' => '22 May 2019'
					),
					array( 
						'title' => 'Layout Packs',
						'content' => 'Cliche reprehenderit enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor',
						'time_line_date' => '10 Mar 2019'
					),
				),
				'attr' => array(
					'enable_timeline_media' => array(
						'type' => 'switch',
						'title' => __('Enable Image','wp-pagebuilder-pro'),
						'std' => '0'
					),
					'timeline_media' => array(
						'type' => 'media',
						'depends' => array( array('enable_timeline_media', '=', 1 ) ),
						'title' => __('Media','wp-pagebuilder-pro'),
						'std' => array( 'url' => '')
					),
					'title' => array(
						'type' => 'text',
						'title' => __('Timeline title','wp-pagebuilder-pro'),
						'std' => 'Timeline Item Title',
					),
					'content' => array(
						'type' => 'textarea',
						'title' => __('Contents','wp-pagebuilder-pro'),
						'std' => 'Reprehenderit enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch',
					),
					'time_line_date' => array(
						'type' => 'text',
						'title' => __('Timeline Date','wp-pagebuilder-pro'),
						'std' => '20 Aug 2019',
					),
				),
			),
			'connector_icon' => array(
				'type' => 'icon',
				'title' => __('Connector Icon','wp-pagebuilder-pro'),
				'std' => 'fas fa-tags',
			),
			'icon_color'=> array(
				'type' => 'color',
				'depends' => array( array('connector_icon', '!=', '' ) ),
				'title' => 'Icon Color',
				'std' => '#fff',
				'selector' => '{{SELECTOR}} .wppb-block-timeline .wppb-timeline-connector-icon{ color: {{data.icon_color}}; }'
			),
			'connector_icon_size' => array(
				'type' => 'slider',
				'depends' => array( array('connector_icon', '!=', '' ) ),
				'title' => __('Icon Size','wp-pagebuilder-pro'),
				'responsive' => true,
				'range' => array(
							'em' => array(
							  'min' => 0,
							  'max' => 8,
							  'step' => 1,
							),
							'px' => array(
							  'min' => 15,
							  'max' => 50,
							  'step' => 1,
							),
							'%' => array(
							  'min' => 0,
							  'max' => 100,
							  'step' => 1,
							),
						  ),
				'std' => array(
							'md' => '18px',
							'sm' => '16px',
							'xs' => '16px',
						),
				'unit' => array( '%','px','em' ),
				'selector' => '{{SELECTOR}} .wppb-block-timeline .wppb-timeline-connector-icon{ font-size: {{data.connector_icon_size}}; }'
			),

			//style
			'enable_media_settings' => array(
				'type' => 'switch',
				'tab' => 'style',
				'section' => 'Content',
				'title' => __('Image Control','wp-pagebuilder-pro'),
				'std' => '0'
			),
			'timeline_img_radius' => array(
				'type' => 'slider',
				'tab' => 'style',
				'section' => 'Content',
				'depends' => array( array('enable_media_settings', '=', 1 ) ),
				'title' => __('Image Radius','wp-pagebuilder-pro'),
				'responsive' => true,
				'range' => array(
							'em' => array(
							  'min' => 0,
							  'max' => 8,
							  'step' => 1,
							),
							'px' => array(
							  'min' => 0,
							  'max' => 100,
							  'step' => 1,
							),
							'%' => array(
							  'min' => 0,
							  'max' => 100,
							  'step' => 1,
							),
						  ),
				'std' => array(
							'md' => '0px',
							'sm' => '0px',
							'xs' => '0px',
						),
				'unit' => array( '%','px','em' ),
				'selector' => '{{SELECTOR}} .wppb-timeline-image-container img{ border-radius: {{data.timeline_img_radius}}; }'
			),
			'timeline_img_spacing' => array(
				'type' => 'slider',
				'tab' => 'style',
				'section' => 'Content',
				'depends' => array( array('enable_media_settings', '=', 1 ) ),
				'title' => __('Image Spacing','wp-pagebuilder-pro'),
				'responsive' => true,
				'range' => array(
							'em' => array(
							  'min' => 0,
							  'max' => 8,
							  'step' => 1,
							),
							'px' => array(
							  'min' => 1,
							  'max' => 100,
							  'step' => 1,
							),
							'%' => array(
							  'min' => 0,
							  'max' => 100,
							  'step' => 1,
							),
						  ),
				'std' => array(
							'md' => '20px',
							'sm' => '0px',
							'xs' => '0px',
						),
				'unit' => array( '%','px','em' ),
				'selector' => '{{SELECTOR}} .wppb-timeline-image-container{ margin-bottom: {{data.timeline_img_spacing}}; }'
			),
			'title_color'=> array(
				'type' => 'color',
				'title' => 'Heading Color',
				'tab' => 'style',
				'section' => 'Content',
				'std' => '#3a3a3a',
				'selector' => '{{SELECTOR}} .wppb-block-timeline .wppb-timeline-title { color: {{data.title_color}}; }'
			),
			'title_style' => array(
				'type' => 'typography',
				'title' => __('Title Typography','wp-pagebuilder-pro'),
				'std' => array(
					'fontFamily' => '',
					'fontSize' => array( 'md'=>'18px', 'sm'=>'', 'xs'=>'' ),
					'lineHeight' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
					'fontWeight' => '700',
					'textTransform' => '',
					'fontStyle' => '',
					'letterSpacing' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
				),
				'tab' => 'style',
				'selector' => '{{SELECTOR}} .wppb-block-timeline .wppb-timeline-title',
				'section' => 'Content',
			),
			'date_color'=> array(
				'type' => 'color',
				'title' => 'Date Color',
				'tab' => 'style',
				'section' => 'Content',
				'std' => '#3a3a3a',
				'selector' => '{{SELECTOR}} .wppb-block-timeline .wppb-timeline-date-container { color: {{data.date_color}}; }'
			),
			'date_style' => array(
				'type' => 'typography',
				'title' => __('Date Typography','wp-pagebuilder-pro'),
				'std' => array(
					'fontFamily' => '',
					'fontSize' => array( 'md'=>'18px', 'sm'=>'', 'xs'=>'' ),
					'lineHeight' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
					'fontWeight' => '700',
					'textTransform' => '',
					'fontStyle' => '',
					'letterSpacing' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
				),
				'tab' => 'style',
				'selector' => '{{SELECTOR}} .wppb-block-timeline .wppb-timeline-date-container',
				'section' => 'Content',
			),
			'content_color'=> array(
				'type' => 'color',
				'title' => 'Content Color',
				'tab' => 'style',
				'section' => 'Content',
				'std' => '#3a3a3a',
				'selector' => '{{SELECTOR}} .wppb-timeline-content .wppb-timeline-description { color: {{data.content_color}}; }'
			),
			'content_style' => array(
				'type' => 'typography',
				'title' => __('Content Typography','wp-pagebuilder-pro'),
				'std' => array(
					'fontFamily' => '',
					'fontSize' => array( 'md'=>'18px', 'sm'=>'', 'xs'=>'' ),
					'lineHeight' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
					'fontWeight' => '700',
					'textTransform' => '',
					'fontStyle' => '',
					'letterSpacing' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
				),
				'tab' => 'style',
				'selector' => '{{SELECTOR}} .wppb-timeline-content .wppb-timeline-description',
				'section' => 'Content',
			),
			'content_bg_color'=> array(
				'type' => 'color',
				'title' => 'Content Background',
				'tab' => 'style',
				'section' => 'Content',
				'std' => '#F9F9F9',
				'selector' => '{{SELECTOR}} .wppb-block-timeline .wppb-timeline-content{ background-color: {{data.content_bg_color}}; border-color: {{data.content_bg_color}}; } 
				
				{{SELECTOR}} .wppb-block-timeline .wppb-timeline-left .wppb-timeline-content:before{ border-color: transparent transparent transparent {{data.content_bg_color}}; } 
				
				{{SELECTOR}} .wppb-block-timeline.wppb-timeline-orientation-center .wppb-timeline-right .wppb-timeline-content:before{ border-color: transparent {{data.content_bg_color}}  transparent transparent;} 
				
				{{SELECTOR}} .wppb-block-timeline.wppb-timeline-orientation-right .wppb-timeline-right .wppb-timeline-content:before{ border-color: transparent transparent transparent {{data.content_bg_color}};} 
				
				{{SELECTOR}} .wppb-block-timeline.wppb-timeline-orientation-left .wppb-timeline-right .wppb-timeline-content:before{ border-color: transparent {{data.content_bg_color}} transparent transparent ;} 
				
				{{SELECTOR}} .wppb-block-timeline.wppb-timeline-orientation-left .wppb-timeline-left .wppb-timeline-content:before{ border-color: transparent {{data.content_bg_color}} transparent transparent ;}'
			),
			'content_border' => array(
				'type' => 'border',
				'title' => __('Content Border','wp-pagebuilder-pro'),
				'tab' => 'style',
				'section' => 'Content',
				'std' => array(
					'borderWidth' => array( 'top' => '0px', 'right' => '0px', 'bottom' => '0px', 'left' => '0px' ), 
					'borderStyle' =>'solid', 
					'borderColor' => '#cccccc' 
				),
				'selector' => '{{SELECTOR}} .wppb-block-timeline .wppb-timeline-content, .wppb-block-timeline .wppb-timeline-content:before'
			),
			'content_radius' => array(
				'type' => 'slider',
				'tab' => 'style',
				'section' => 'Content',
				'title' => __('Content Radius','wp-pagebuilder-pro'),
				'range' => array(
							'min' => 0,
							'max' => 100,
							'step' => 1,
						),
				'std' => '5px',
				'unit' => array( '%','px','em' ),
				'selector' => '{{SELECTOR}} .wppb-block-timeline .wppb-timeline-content { border-radius: {{data.content_radius}}; }'
			),
			'content_padding' => array(
				'type' => 'dimension',
				'tab' => 'style',
				'section' => 'Content',
				'title'	=> __('Content Padding','wp-pagebuilder-pro'),
				'std' => array(
					'md' => array( 'top' => '30px', 'right' => '30px', 'bottom' => '30px', 'left' => '30px' ),
					'sm' => array( 'top' => '3px', 'right' => '30px', 'bottom' => '30px', 'left' => '30px' ),
					'xs' => array( 'top' => '20px', 'right' => '20px', 'bottom' => '20px', 'left' => '20px' ),
					),
				'unit' => array( 'px','em','%' ),
				'responsive' => true,
				'selector' => '{{SELECTOR}} .wppb-block-timeline .wppb-timeline-content{ padding: {{data.content_padding}}; }'
			),
			'content_box_shadow' => array(
				'type' => 'boxshadow',
				'tab' => 'style',
				'section' => 'Content',
				'title' => __('Content Boxshadow','wp-pagebuilder-pro'),
				'std' => array(
						'shadowValue'=> array( 'top' => '0px', 'right' => '3px', 'bottom' => '6px', 'left' => '0px' ), 
						'shadowColor' 	=> 'rgba(0,0,0,0.1)' 
					),
				'selector' => '{{SELECTOR}} .wppb-block-timeline .wppb-timeline-content'
			),
			

			//Connector
			'bar_width' => array(
				'type' => 'slider',
				'tab' => 'style',
				'section' => 'Connector',
				'title' => __('Bar Width','wp-pagebuilder-pro'),
				'range' => array(
							'min' => 0,
							'max' => 20,
							'step' => 1,
						),
				'std' => '5px',
				'unit' => array( '%','px','em' ),
				'selector' => '{{SELECTOR}} .wppb-block-timeline:after{ width: {{data.bar_width}}; }'
			),
			'bar_color'=> array(
				'type' => 'color',
				'title' => 'Bar Color',
				'tab' => 'style',
				'section' => 'Connector',
				'std' => '#0095eb',
				'selector' => '{{SELECTOR}} .wppb-block-timeline:after{ background: {{data.bar_color}}; }'
			),
			'connector_size' => array(
				'type' => 'slider',
				'title' => __('Connector Size','wp-pagebuilder-pro'),
				'tab' => 'style',
				'section' => 'Connector',
				'responsive' => true,
				'range' => array(
							'em' => array(
							  'min' => 0,
							  'max' => 8,
							  'step' => 1,
							),
							'px' => array(
							  'min' => 20,
							  'max' => 100,
							  'step' => 1,
							),
							'%' => array(
							  'min' => 0,
							  'max' => 100,
							  'step' => 1,
							),
						  ),
				'std' => array(
							'md' => '55px',
							'sm' => '40px',
							'xs' => '40px',
						),
				'unit' => array( '%','px','em' ),
				'selector' => '{{SELECTOR}} .wppb-block-timeline .wppb-timeline-connector{ width: {{data.connector_size}};height: {{data.connector_size}}; right: calc(-{{data.connector_size}}/2) } 
				
				{{SELECTOR}} .wppb-block-timeline .wppb-timeline-right .wppb-timeline-connector{ width: {{data.connector_size}};height: {{data.connector_size}}; left: calc(-{{data.connector_size}}/2) }
				
				{{SELECTOR}} .wppb-block-timeline.wppb-timeline-orientation-right .wppb-timeline-right .wppb-timeline-connector{ width: {{data.connector_size}}; left: auto; height: {{data.connector_size}}; right: calc(-{{data.connector_size}}/2) }
				
				{{SELECTOR}} .wppb-block-timeline.wppb-timeline-orientation-left .wppb-timeline-left .wppb-timeline-connector{ width: {{data.connector_size}}; height: {{data.connector_size}}; left: calc(-{{data.connector_size}}/2) }'
			),
			'connector_color'=> array(
				'type' => 'color',
				'title' => 'Background Color',
				'tab' => 'style',
				'section' => 'Connector',
				'std' => '#0095eb',
				'selector' => '{{SELECTOR}} .wppb-block-timeline .wppb-timeline-connector{ background-color: {{data.connector_color}}; }'
			),
			'connector_border' => array(
				'type' => 'border',
				'tab' => 'style',
				'section' => 'Connector',
				'title' => __('Border','wp-pagebuilder-pro'),
				'std' => array(
					'borderWidth' => array( 'top' => '0px', 'right' => '0px', 'bottom' => '0px', 'left' => '0px' ), 
					'borderStyle' =>'solid', 
					'borderColor' => '#cccccc' 
				),
				'selector' => '{{SELECTOR}} .wppb-block-timeline .wppb-timeline-connector'
			),
			'connector_boxshadow' => array(
				'type' => 'boxshadow',
				'title' => __('Boxshadow','wp-pagebuilder-pro'),
				'tab' => 'style',
				'section' => 'Connector',
				'std' => array(
						'shadowValue'=> array( 'top' => '0px', 'right' => '0px', 'bottom' => '0px', 'left' => '0px' ), 
						'shadowColor' 	=> '#ffffff' 
					),
				'selector' => '{{SELECTOR}} .wppb-block-timeline .wppb-timeline-connector'
			),
			'connector_radius' => array(
				'type' => 'slider',
				'tab' => 'style',
				'section' => 'Connector',
				'title' => __('Radius','wp-pagebuilder-pro'),
				'range' => array(
							'min' => 0,
							'max' => 100,
							'step' => 1,
						),
				'std' => '50px',
				'unit' => array( '%','px','em' ),
				'selector' => '{{SELECTOR}} .wppb-block-timeline .wppb-timeline-connector{ border-radius: {{data.connector_radius}}; }'
			),
			

			//Spacing
			'horizontal_space' => array(
				'type' => 'slider',
				'tab' => 'style',
				'section' => 'Spacing',
				'responsive' => true,
				'title' => __('Horizontal Spacing','wp-pagebuilder-pro'),
				'range' => array(
					'em' => array(
					  'min' => 0,
					  'max' => 8,
					  'step' => 1,
					),
					'px' => array(
					  'min' => 50,
					  'max' => 200,
					  'step' => 1,
					),
					'%' => array(
					  'min' => 0,
					  'max' => 100,
					  'step' => 1,
					),
				  ),
				'std' => array(
					'md' => '70px',
					'sm' => '70px',
					'xs' => '70px',
				),
				'unit' => array( '%','px','em' ),
				'selector' => '{{SELECTOR}} .wppb-block-timeline.wppb-timeline-orientation-center .wppb-timeline-left{ padding-right: {{data.horizontal_space}}; } 
				
				{{SELECTOR}} .wppb-block-timeline.wppb-timeline-orientation-center .wppb-timeline-right{ padding-left: {{data.horizontal_space}}; }
				
				{{SELECTOR}} .wppb-block-timeline.wppb-timeline-orientation-right .wppb-timeline-right, .wppb-block-timeline.wppb-timeline-orientation-right .wppb-timeline-left, .wppb-block-timeline.wppb-timeline-orientation-right .wppb-timeline-date-container{ padding-right: {{data.horizontal_space}}; }
				
				{{SELECTOR}} .wppb-block-timeline.wppb-timeline-orientation-left .wppb-timeline-right, .wppb-block-timeline.wppb-timeline-orientation-left .wppb-timeline-left, .wppb-block-timeline.wppb-timeline-orientation-left .wppb-timeline-date-container{ padding-left: {{data.horizontal_space}}; }'
			),
			'vertical_space' => array(
				'type' => 'slider',
				'tab' => 'style',
				'responsive' => true,
				'section' => 'Spacing',
				'title' => __('Vertical Spacing','wp-pagebuilder-pro'),
				'range' => array(
					'em' => array(
					  'min' => 0,
					  'max' => 8,
					  'step' => 1,
					),
					'px' => array(
					  'min' => 50,
					  'max' => 200,
					  'step' => 1,
					),
					'%' => array(
					  'min' => 0,
					  'max' => 100,
					  'step' => 1,
					),
				  ),
				'std' => array(
					'md' => '70px',
					'sm' => '50px',
					'xs' => '40px',
				),
				'unit' => array( '%','px','em' ),
				'selector' => '{{SELECTOR}} .wppb-block-timeline .wppb-timeline-item:not(:last-child){ margin-bottom: {{data.vertical_space}}; }'
			),

		);
		return $settings;
	}

	// Timeline Render HTML
	public function render($data = null){
		$settings 		    = $data['settings'];
		ob_start();
		$output = $timeline_position = '';
		$timeline_list 	= isset($settings["timeline_list"]) ? $settings["timeline_list"] : array();
		$connector_position 	= isset($settings["connector_position"]) ? $settings["connector_position"] : 'center';
		$connector_icon = isset($settings["connector_icon"]) ? $settings["connector_icon"] : 'fas fa-home';
		?>

		<div class="wp-block-wppb-timeline">
			<div class="wppb-block-timeline wppb-timeline-layout-vertical wppb-timeline-orientation-<?php echo $connector_position; ?>">
				<div class="wppb-timeline-items">
					<?php if (is_array($timeline_list) && count($timeline_list)){
						foreach ( $timeline_list as $key => $value ) {
						if($key%2 == 0){
							$timeline_position = 'wppb-timeline-left';
						}else{
							$timeline_position = 'wppb-timeline-right';
						}
					?>
					<div class="wppb-timeline-item <?php echo $timeline_position;?>">
						<div class="wppb-timeline-connector">
							<span class="wppb-timeline-connector-icon <?php echo $connector_icon; ?>"></span>
						</div>
						<div class="wppb-timeline-content">
						
							<?php  
							if(isset($value['enable_timeline_media'])) {?>
							<div class="wppb-timeline-image-container">
								<img src="<?php echo $value['timeline_media']['url']; ?>" alt="">
							</div>
							<?php }?>

							<div class="wppb-timeline-description">

								<?php if( get_wppb_array_value_by_key($value, 'title') ){ ?>
								<h4 class="wppb-timeline-title"><?php echo $value['title']; ?></h4>
								<?php }?>

								<?php if( get_wppb_array_value_by_key($value, 'content') ){ ?>
								<div class="wppb-timeline-description"><?php echo $value['content']; ?></div>
								<?php }?>

							</div><span class="wppb-timeline-indicator"></span>
						</div>
						
						<?php if($value['time_line_date']) { ?>
						<div class="wppb-timeline-date-container">
							<div class="wppb-timeline-date"><?php echo $value['time_line_date']; ?></div>
						</div>
						<?php }?>

					</div>
					<?php } } ?>

				</div>
			</div>
		</div>
		
		<?php
		$output = ob_get_contents();
		ob_end_clean(); 
		return $output;

	}

	// raw Template
	public function getTemplate(){
		$output = '
		<div class="wp-block-wppb-timeline">
			<div class="wppb-block-timeline wppb-timeline-layout-vertical wppb-timeline-orientation-{{data.connector_position}}">
				<div class="wppb-timeline-items">
					<#  __.forEach(data.timeline_list, function(value, key) { 
						var position = "left";
						if(key % 2 == 0){
							position = "left";
						}else{
							position = "right";
						}
					#>
					<div class="wppb-timeline-item wppb-timeline-{{position}}">
						<div class="wppb-timeline-connector"><span class="wppb-timeline-connector-icon {{data.connector_icon}}"></span></div>
						<div class="wppb-timeline-content">

							<# if(value.enable_timeline_media) { #>
							<div class="wppb-timeline-image-container">
								<img src="{{value.timeline_media.url}}" alt="">
							</div>
							<# } #>

							<div class="wppb-timeline-description">
								<h4 class="wppb-timeline-title">{{{value.title}}}</h4>
								<div class="wppb-timeline-description">{{{value.content}}}</div>
							</div><span class="wppb-timeline-indicator"></span>
						</div>
						<# if(value.time_line_date) { #>
						<div class="wppb-timeline-date-container">
							<div class="wppb-timeline-date">{{{value.time_line_date}}}</div>
						</div>
						<# } #>
					</div>
					<# }); #>
				</div>
			</div>
		</div>
		';
		return $output;
	}

}
	
