<?php
if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class WPPB_Addon_Advanced_List
{
    public function get_name()
    {
        return 'wppb_advanced_list';
    }
    public function get_title()
    {
        return 'Advanced List';
    }
    public function get_icon()
    {
        return 'wppb-font-list-view';
    }
    public function get_category_name()
    {
        return 'Pro Addons';
    }

    // Advanced list Settings Fields
	// Settings Fields
	public function get_settings() {

		$settings = array(
					'advanced_list_items' => array(
						'title' => __('Advanced List', 'wp-pagebuilder-pro'),
						'type'  => 'repeatable',
						'label' => 'number_title',
						'std' => array(
							array(
								'list_content' => 'iconlist',
								'number_title' => __('Save listing agreement to client', 'wp-pagebuilder-pro'),
								'title_link' => array('link'=>'','window'=>true,'nofolow'=>false),
								'number' => '01',
								'icon' => 'fas fa-check',
								'media_image' => array( 'url' =>  WPPB_PRO_DIR_URL.'assets/img/placeholder/wppb-small.jpg' ),
								'title_selector' => 'h3',
							),
							array(
								'list_content' => 'iconlist',
								'number_title' => __('Drap and drop page builder', 'wp-pagebuilder-pro'),
								'title_link' => array('link'=>'','window'=>true,'nofolow'=>false),
								'number' => '02',
								'icon' => 'fas fa-check',
								'media_image' => array( 'url' =>  WPPB_PRO_DIR_URL.'assets/img/placeholder/wppb-small.jpg' ),
								'title_selector' => 'h3',
							),
							array(
								'list_content' => 'iconlist',
								'number_title' => __('Flexible column layout building', 'wp-pagebuilder-pro'),
								'title_link' => array('link'=>'','window'=>true,'nofolow'=>false),
								'number' => '02',
								'icon' => 'fas fa-check',
								'media_image' => array( 'url' =>  WPPB_PRO_DIR_URL.'assets/img/placeholder/wppb-small.jpg' ),
								'title_selector' => 'h3',
							),
						),
						'attr' => array(
							'list_content' => array(
								'type' => 'select',
								'title' => __('List Style', 'wp-pagebuilder-pro'),
								'values' => array(
									'numberlist' => __('Number', 'wp-pagebuilder-pro'),
									'iconlist' => __('Icon', 'wp-pagebuilder-pro'),
									'imglist' => __('Image', 'wp-pagebuilder-pro'),
								),
							),
							'number' => array(
								'type' => 'text',
								'title' => __('Number', 'wp-pagebuilder-pro'),
								'depends' => array(array('list_content', '=', 'numberlist')),
							),
							'icon' => array(
								'type' => 'icon',
								'title' => __('Icon', 'wp-pagebuilder-pro'),
								'depends' => array(array('list_content', '=', 'iconlist')),
							),
							'icon_hover' => array(
								'type' => 'icon',
								'title' => __('Icon Hover', 'wp-pagebuilder-pro'),
								'depends' => array(array('list_content', '=', 'iconlist')),
							),
							'media_image' => array(
							'type' => 'media',
							'title' => __('Image', 'wp-pagebuilder-pro'),
							'depends' => array(array('list_content', '=', 'imglist')),
							),
							'media_image_hover' => array(
								'type' => 'media',
								'title' => __('Image Hover', 'wp-pagebuilder-pro'),
								'depends' => array(array('list_content', '=', 'imglist')),
								),
							'number_title' => array(
								'type' => 'textarea',
								'title' => __('Title','wp-pagebuilder'),
							),
							'title_selector' => array(
								'type' => 'select',
								'title' => __('Title Tag','wp-pagebuilder'),
								'values' => array(
								'h1' => 'h1',
								'h2' => 'h2',
								'h3' => 'h3',
								'h4' => 'h4',
								'h5' => 'h5',
								'h6' => 'h6',
								'span' => 'span',
								'p' => 'p',
								'div' => 'div',
								),
								'std' => 'h2',
							),
							'title_link' => array(
								'type' => 'link',
								'title' => __('Link','wp-pagebuilder'),
								'std' =>   array('link'=>'','window'=>false,'nofolow'=>false),
							),
						),
					),
					'effect' => array(
						'type' => 'select',
						'title' => __('Icon/Image Hover Animation', 'wp-pagebuilder-pro'),
						'values' => array(
						'effectnone' => __('None', 'wp-pagebuilder-pro'),
						'effecttop' => __('Slide Top', 'wp-pagebuilder-pro'),
						'effectleft' => __('Slide Left', 'wp-pagebuilder-pro'),
						'effectright' => __('Slide Right', 'wp-pagebuilder-pro'),
						'effectbottom' => __('Slide Bottom', 'wp-pagebuilder-pro'),
						'effectfade' => __('Fade in', 'wp-pagebuilder-pro'),
						),
						'std' => 'effectnone',
					),
					'position' => array(
						'type' => 'select',
						'title' => __('Icon/Image Position', 'wp-pagebuilder-pro'),
						'values' => array(
						'positionleft' => __('Left', 'wp-pagebuilder-pro'),
						'positionright' => __('Right', 'wp-pagebuilder-pro'),
						),
						'std' => 'positionleft',
					),

					// number style	
					'number_color' => array(
						'type' => 'color',
						'title' => __('Number color','wp-pagebuilder'),
						'tab' => 'style',
						'std' => '#353535',
						'section' => 'Number',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-number { color: {{data.number_color}}; }'
					),
					'number_hover_color' => array(
						'type' => 'color',
						'title' => __('Number hover color','wp-pagebuilder'),
						'tab' => 'style',
						'section' => 'Number',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-item:hover .wppb-advanced-list-number { color: {{data.number_hover_color}}; }'
					),
					'number_bg' => array(
						'type' => 'color',
						'title' => __('Number background color','wp-pagebuilder'),
						'tab' => 'style',
						'section' => 'Number',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-number{ background: {{data.number_bg}}; }'
					),
					'number_hover_bg' => array(
						'type' => 'color',
						'title' => __('Number background hover color','wp-pagebuilder'),
						'tab' => 'style',
						'section' => 'Number',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-item:hover .wppb-advanced-list-number{ background: {{data.number_hover_bg}}; }'
					),
					'number_fontstyle' => array(
						'type' => 'typography',
						'title' => __('Typography','wp-pagebuilder'),
						'std' => array(
							'fontFamily' => '',
							'fontSize' => array( 'md'=>'16px', 'sm'=>'', 'xs'=>'' ),
							'lineHeight' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
							'fontWeight' => '600',
							'textTransform' => '',
							'fontStyle' => '',
							'letterSpacing' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
						),
						'section' => 'Number',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-number',
						'tab' => 'style',
					),
					'number_width' => array(
						'type' => 'slider',
						'title' => __('Number Width','wp-pagebuilder'),
						'unit' => array( 'px','%','em' ),
						'range' => array(
								'em' => array(
									'min' => 0,
									'max' => 15,
									'step' => .1,
								),
								'px' => array(
									'min' => 0,
									'max' => 200,
									'step' => 1,
								),
								'%' => array(
									'min' => 0,
									'max' => 100,
									'step' => 1,
								),
							),
						'responsive' => true,
						'tab' => 'style',
						'section' => 'Number',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-number { width: {{data.number_width}}; }'
					),
					'number_height' => array(
						'type' => 'slider',
						'title' => __('Number Height','wp-pagebuilder'),
						'unit' => array( 'px','%','em' ),
						'range' => array(
								'em' => array(
									'min' => 0,
									'max' => 25,
									'step' => .1,
								),
								'px' => array(
									'min' => 0,
									'max' => 200,
									'step' => 1,
								),
								'%' => array(
									'min' => 0,
									'max' => 100,
									'step' => 1,
								),
							),
						'responsive' => true,
						'tab' => 'style',
						'section' => 'Number',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-number { height: {{data.number_height}}; }',
					),
					'number_line_height' => array(
						'type' => 'slider',
						'title' => __('Number Line Height','wp-pagebuilder'),
						'unit' => array( 'px','%','em' ),
						'range' => array(
								'em' => array(
									'min' => 0,
									'max' => 25,
									'step' => .1,
								),
								'px' => array(
									'min' => 0,
									'max' => 200,
									'step' => 1,
								),
								'%' => array(
									'min' => 0,
									'max' => 100,
									'step' => 1,
								),
							),
						'responsive' => true,
						'tab' => 'style',
						'section' => 'Number',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-number { line-height: {{data.number_line_height}}; }',
					),
					'number_border' => array(
						'type' => 'border',
						'title' => 'Number Border',
						'std' => array(
							'borderWidth' => array( 'top' => '2px', 'right' => '2px', 'bottom' => '2px', 'left' => '2px' ), 
							'borderStyle' => 'solid', 
							'borderColor' => '#cccccc' 
						),
						'tab' => 'style',
						'section' => 'Number',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-number'
					),
					'number_border_hover' => array(
						'type' => 'border',
						'title' => 'Number hover Border',
						'std' => array(
							'borderWidth' => array( 'top' => '2px', 'right' => '2px', 'bottom' => '2px', 'left' => '2px' ), 
							'borderStyle' => 'solid', 
							'borderColor' => '#cccccc' 
						),
						'tab' => 'style',
						'section' => 'Number',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-item:hover .wppb-advanced-list-number'
					),
					'number_radius' => array(
						'type' => 'dimension',
						'title' => __('Number border radius','wp-pagebuilder'),
						'unit' => array( 'px','%','em' ),
						'responsive' => true,
						'tab' => 'style',
						'section' => 'Number',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-number { border-radius: {{data.number_radius}}; }'
					),
					'number_radius_hover' => array(
						'type' => 'dimension',
						'title' => __('Number hover border radius','wp-pagebuilder'),
						'unit' => array( 'px','%','em' ),
						'responsive' => true,
						'tab' => 'style',
						'section' => 'Number',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-item:hover .wppb-advanced-list-number { border-radius: {{data.number_radius_hover}}; }'
					),
					'number_padding' => array(
						'type' => 'dimension',
						'title' => __('Number Padding','wp-pagebuilder'),
						'unit' => array( 'px','%','em' ),
						'responsive' => true,
						'tab' => 'style',
						'section' => 'Number',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-number { padding: {{data.number_padding}}; }'
					),
					
					// icon style	
					'icon_color' => array(
						'type' => 'color',
						'title' => __('Icon color','wp-pagebuilder'),
						'tab' => 'style',
						'std' => '#3452ff',
						'section' => 'Icon',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-icon i { color: {{data.icon_color}}; }'
					),
					'icon_hover_color' => array(
						'type' => 'color',
						'title' => __('Icon hover color','wp-pagebuilder'),
						'tab' => 'style',
						'section' => 'Icon',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-item:hover .wppb-advanced-list-icon i { color: {{data.icon_hover_color}}; }'
					),
					'icon_bg' => array(
						'type' => 'color',
						'title' => __('Icon background color','wp-pagebuilder'),
						'tab' => 'style',
						'section' => 'Icon',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-icon{ background: {{data.icon_bg}}; }'
					),
					'icon_hover_bg' => array(
						'type' => 'color',
						'title' => __('icon background hover color','wp-pagebuilder'),
						'tab' => 'style',
						'section' => 'Icon',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-item:hover .wppb-advanced-list-icon { background: {{data.icon_hover_bg}}; }'
					),
					'icon_width' => array(
						'type' => 'slider',
						'title' => __('Icon Width','wp-pagebuilder'),
						'unit' => array( 'px','%','em' ),
						'range' => array(
								'em' => array(
									'min' => 0,
									'max' => 15,
									'step' => .1,
								),
								'px' => array(
									'min' => 0,
									'max' => 200,
									'step' => 1,
								),
								'%' => array(
									'min' => 0,
									'max' => 100,
									'step' => 1,
								),
							),
						'responsive' => true,
						'tab' => 'style',
						'section' => 'Icon',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-icon { width: {{data.icon_width}}; }'
					),
					'icon_height' => array(
						'type' => 'slider',
						'title' => __('Icon Height','wp-pagebuilder'),
						'unit' => array( 'px','%','em' ),
						'range' => array(
								'em' => array(
									'min' => 0,
									'max' => 25,
									'step' => .1,
								),
								'px' => array(
									'min' => 0,
									'max' => 200,
									'step' => 1,
								),
								'%' => array(
									'min' => 0,
									'max' => 100,
									'step' => 1,
								),
							),
						'responsive' => true,
						'tab' => 'style',
						'section' => 'Icon',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-icon { height: {{data.icon_height}}; }',
					),
					'icon_size' => array(
						'type' => 'slider',
						'title' => __('Icon Size','wp-pagebuilder'),
						'unit' => array( 'px','%','em' ),
						'range' => array(
								'em' => array(
									'min' => 0,
									'max' => 25,
									'step' => .1,
								),
								'px' => array(
									'min' => 0,
									'max' => 200,
									'step' => 1,
								),
								'%' => array(
									'min' => 0,
									'max' => 100,
									'step' => 1,
								),
							),
						'responsive' => true,
						'tab' => 'style',
						'section' => 'Icon',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-icon i { font-size: {{data.icon_size}}; }',
					),
					'icon_line_height' => array(
						'type' => 'slider',
						'title' => __('Icon Line Height','wp-pagebuilder'),
						'unit' => array( 'px','%','em' ),
						'range' => array(
								'em' => array(
									'min' => 0,
									'max' => 25,
									'step' => .1,
								),
								'px' => array(
									'min' => 0,
									'max' => 200,
									'step' => 1,
								),
								'%' => array(
									'min' => 0,
									'max' => 100,
									'step' => 1,
								),
							),
						'responsive' => true,
						'tab' => 'style',
						'section' => 'Icon',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-icon { line-height: {{data.icon_line_height}}; }',
					),
					'icon_border' => array(
						'type' => 'border',
						'title' => 'Icon Border',
						'std' => array(
							'borderWidth' => array( 'top' => '2px', 'right' => '2px', 'bottom' => '2px', 'left' => '2px' ), 
							'borderStyle' => 'solid', 
							'borderColor' => '#cccccc' 
						),
						'tab' => 'style',
						'section' => 'Icon',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-icon'
					),
					'icon_border_hover' => array(
						'type' => 'border',
						'title' => 'Icon hover Border',
						'std' => array(
							'borderWidth' => array( 'top' => '2px', 'right' => '2px', 'bottom' => '2px', 'left' => '2px' ), 
							'borderStyle' => 'solid', 
							'borderColor' => '#cccccc' 
						),
						'tab' => 'style',
						'section' => 'Icon',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-item:hover .wppb-advanced-list-icon'
					),
					'icon_radius' => array(
						'type' => 'dimension',
						'title' => __('Icon border radius','wp-pagebuilder'),
						'unit' => array( 'px','%','em' ),
						'responsive' => true,
						'tab' => 'style',
						'section' => 'Icon',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-icon { border-radius: {{data.icon_radius}}; }'
					),
					'icon_radius_hover' => array(
						'type' => 'dimension',
						'title' => __('Icon hover border radius','wp-pagebuilder'),
						'unit' => array( 'px','%','em' ),
						'responsive' => true,
						'tab' => 'style',
						'section' => 'Icon',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-item:hover .wppb-advanced-list-icon { border-radius: {{data.icon_radius_hover}}; }'
					),
					'icon_padding' => array(
						'type' => 'dimension',
						'title' => __('Icon Padding','wp-pagebuilder'),
						'unit' => array( 'px','%','em' ),
						'responsive' => true,
						'tab' => 'style',
						'section' => 'Icon',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-icon { padding: {{data.icon_padding}}; }'
					),
					
					//image
					'img_width' => array(
						'type' => 'slider',
						'title' => __('Image Width','wp-pagebuilder'),
						'unit' => array( 'px','%','em' ),
						'range' => array(
								'em' => array(
									'min' => 0,
									'max' => 15,
									'step' => .1,
								),
								'px' => array(
									'min' => 0,
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
								'md' => '16px',
								'sm' => '',
								'xs' => ''
							),
						'responsive' => true,
						'tab' => 'style',
						'section' => 'Image',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-img img { width: {{data.img_width}}; }'
					),
					'img_height' => array(
						'type' => 'slider',
						'title' => __('Image Height','wp-pagebuilder'),
						'unit' => array( 'px','%','em' ),
						'range' => array(
								'em' => array(
									'min' => 0,
									'max' => 25,
									'step' => .1,
								),
								'px' => array(
									'min' => 0,
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
								'md' => '16px',
								'sm' => '',
								'xs' => '',
							),
						'responsive' => true,
						'tab' => 'style',
						'section' => 'Image',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-img img { height: {{data.img_height}}; }',
					),
					'img_border' => array(
						'type' => 'border',
						'title' => 'Image Border',
						'std' => array(
							'borderWidth' => array( 'top' => '2px', 'right' => '2px', 'bottom' => '2px', 'left' => '2px' ), 
							'borderStyle' => 'solid', 
							'borderColor' => '#cccccc' 
						),
						'tab' => 'style',
						'section' => 'Image',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-img'
					),
					'img_border_hover' => array(
						'type' => 'border',
						'title' => 'Image hover Border',
						'std' => array(
							'borderWidth' => array( 'top' => '2px', 'right' => '2px', 'bottom' => '2px', 'left' => '2px' ), 
							'borderStyle' => 'solid', 
							'borderColor' => '#cccccc' 
						),
						'tab' => 'style',
						'section' => 'Image',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-item:hover .wppb-advanced-list-img'
					),
					'img_radius' => array(
						'type' => 'dimension',
						'title' => __('Image border radius','wp-pagebuilder'),
						'unit' => array( 'px','%','em' ),
						'responsive' => true,
						'tab' => 'style',
						'section' => 'Image',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-img { border-radius: {{data.img_radius}}; }'
					),
					'img_radius_hover' => array(
						'type' => 'dimension',
						'title' => __('Image hover border radius','wp-pagebuilder'),
						'unit' => array( 'px','%','em' ),
						'responsive' => true,
						'tab' => 'style',
						'section' => 'Image',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-item:hover .wppb-advanced-list-img { border-radius: {{data.img_radius_hover}}; }'
					),
					'img_padding' => array(
						'type' => 'dimension',
						'title' => __('Image Padding','wp-pagebuilder'),
						'unit' => array( 'px','%','em' ),
						'responsive' => true,
						'tab' => 'style',
						'section' => 'Image',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-img{ padding: {{data.img_padding}}; }'
					),

					//title
					'title_color' => array(
						'type' => 'color',
						'title' => __('Title Color','wp-pagebuilder'),
						'tab' => 'style',
						'section' => 'Title',
						'std'       => '#000000',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-title, {{SELECTOR}} .wppb-advanced-list-title a { color: {{data.title_color}}; }'
					),
					'title_hover_color' => array(
						'type' => 'color',
						'title' => __('Title Hover Color','wp-pagebuilder'),
						'tab' => 'style',
						'section' => 'Title',
						'std'       => '#000000',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-item:hover .wppb-advanced-list-title a, {{SELECTOR}} .wppb-advanced-list-item:hover .wppb-advanced-list-title { color: {{data.title_hover_color}}; }'
					),
					'title_fontstyle' => array(
						'type' => 'typography',
						'title' => __('Typography','wp-pagebuilder'),
						'std' => array(
							'fontFamily' => '',
							'fontSize' => array( 'md'=>'16px', 'sm'=>'', 'xs'=>'' ),
							'lineHeight' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
							'fontWeight' => '600',
							'textTransform' => '',
							'fontStyle' => '',
							'letterSpacing' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
						),
						'tab' => 'style',
						'section' => 'Title',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-title',
					),
					'title_margin' => array(
						'type' => 'dimension',
						'title' => __('Title margin','wp-pagebuilder'),
						'unit' => array( 'px','%','em' ),
						'std' => array(
							'md' => array( 'top' => '2px', 'right' => '0px', 'bottom' => '2px', 'left' => '12px' ),
							'sm' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
							'xs' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
						),
						'responsive' => true,
						'tab' => 'style',
						'section' => 'Title',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-title { margin: {{data.title_margin}}; }'
					),

					//wrapper and hover
					'wrap_bg' => array(
						'type' => 'background',
						'title' => __('Wrap background','wp-pagebuilder-pro'),
						'clip' => false,
						'selector' => '{{SELECTOR}} .wppb-advanced-list-item',
						'tab' => 'style',
						'section' => 'Wrapper',
					),
					'wrap_hover_bg' => array(
						'type' => 'background',
						'title' => __('Wrap hover background','wp-pagebuilder-pro'),
						'clip' => false,
						'selector' => '{{SELECTOR}} .wppb-advanced-list-item:hover',
						'tab' => 'style',
						'section' => 'Wrapper',
					),
					'wrapper_border' => array(
						'type' => 'border',
						'title' => __('Border','wp-pagebuilder-pro'),
						'std' => array(
							'borderWidth' => array( 'top' => '2px', 'right' => '2px', 'bottom' => '2px', 'left' => '2px' ),
							'borderStyle' => 'solid',
							'borderColor' => '#cccccc'
						),
						'tab' => 'style',
						'section' => 'Wrapper',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-item'
					),
					'wrap_border_hcolor' => array(
						'type' => 'border',
						'title' => __('Border Hover','wp-pagebuilder-pro'),
						'std' => array(
							'borderWidth' => array( 'top' => '2px', 'right' => '2px', 'bottom' => '2px', 'left' => '2px' ),
							'borderStyle' => 'solid',
							'borderColor' => '#cccccc'
						),
						'tab' => 'style',
						'section' => 'Wrapper',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-item:hover'
					),
					'wrap_border_radius' => array(
						'type' => 'dimension',
						'title' => __('Border Radius', 'wp-pagebuilder-pro'),
						'tab' => 'style',
						'section' => 'Wrapper',
						'responsive' => true,
						'unit' => array( 'px','em','%' ),
						'selector' => '{{SELECTOR}} .wppb-advanced-list-item { border-radius: {{data.wrap_border_radius}}; }'
					),
					'wrap_border_hover_radius' => array(
						'type' => 'dimension',
						'title' => __('Hover Border Radius', 'wp-pagebuilder-pro'),
						'tab' => 'style',
						'section' => 'Wrapper',
						'responsive' => true,
						'unit' => array( 'px','em','%' ),
						'selector' => '{{SELECTOR}} .wppb-advanced-list-item:hover { border-radius: {{data.wrap_border_hover_radius}}; }'
					),
					'wrap_boxshadow' => array(
						'type' => 'boxshadow',
						'title' => __('Box shadow','wp-pagebuilder-pro'),
						'std' => array(
							'shadowValue' => array( 'top' => '2px', 'right' => '2px', 'bottom' => '2px', 'left' => '2px' ),
							'shadowColor' => '#ffffff'
						),
						'selector' => '{{SELECTOR}} .wppb-advanced-list-item',
						'tab' => 'style',
						'section' => 'Wrapper',
					),
					'wrap_hboxshadow' => array(
						'type' => 'boxshadow',
						'title' => __('Hover box shadow','wp-pagebuilder-pro'),
						'std' => array(
							'shadowValue' => array( 'top' => '2px', 'right' => '2px', 'bottom' => '2px', 'left' => '2px' ),
							'shadowColor' => '#ffffff'
						),
						'tab' => 'style',
						'section' => 'Wrapper',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-item:hover',
					),
					'wrap_padding' => array(
						'type' => 'dimension',
						'title' => __('Wrapper Padding','wp-pagebuilder'),
						'unit' => array( 'px','%','em' ),
						'responsive' => true,
						'tab' => 'style',
						'section' => 'Wrapper',
						'selector' => '{{SELECTOR}} .wppb-advanced-list-item { padding: {{data.wrap_padding}}; }'
					),
					'wrap_margin' => array(
						'type' => 'dimension',
						'title' => __('Wrapper Margin','wp-pagebuilder'),
						'unit' => array( 'px','%','em' ),
						'responsive' => true,
						'tab' => 'style',
						'section' => 'Wrapper',
						'std' => array(
							'md' => array( 'top' => '0px', 'right' => '0px', 'bottom' => '3px', 'left' => '0px' ),
							'sm' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
							'xs' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
						),
						'selector' => '{{SELECTOR}} .wppb-advanced-list-item { margin: {{data.wrap_margin}}; }'
					),
			);
		return $settings;
	}

	// Block Number Render HTML
	public function render($data = null){
		$settings				= $data['settings'];
		$advanced_list_items	= isset($settings['advanced_list_items']) ? $settings['advanced_list_items'] : array();
		$effect					= isset($settings['effect']) ? $settings['effect'] : 'effectnone';
		$position				= isset($settings['position']) ? $settings['position'] : '';
	
		$output = $media = $mediahover = '';

		$output  .= '<div class="wppb-advanced-list-addon">';
			$output  .= '<ul class="wppb-advanced-list-content wppb-clearfix">';
				if ( count($advanced_list_items) ){
					foreach ($advanced_list_items as $key => $value) {
						if ( get_wppb_array_value_by_key($value, 'title_link')['link'] ){
							$target = get_wppb_array_value_by_key($value, 'title_link')['window'] ? "target=_blank" : "target=_self";
							$nofolow = get_wppb_array_value_by_key($value, 'title_link')['nofolow'] ? "rel=nofolow" : "";
							$_title = !empty($value["number_title"]) ? '<span class="wppb-advanced-list-title"><a '.esc_attr($nofolow).' href="'.esc_url($value['title_link']['link']).'" '.esc_attr($target).'>'.$value["number_title"].'</a></span>' : '';
						} else {
							$_title = !empty($value["number_title"]) ? '<span class="wppb-advanced-list-title">'.$value["number_title"].'</span>' : '';
						}
						$_list_content = !empty($value["list_content"]) ? $value["list_content"] : '';

						if ($_list_content == 'imglist') {
							if (! empty($value['media_image']['url'])) {
								$img_url = $value['media_image']['url'];
								$media = $value["media_image"]["url"] ? '<div class="wppb-advanced-list-media wppb-advanced-list-regular wppb-advanced-list-img"><img src="'.esc_url($img_url).'"/></div>' : '';
							}
							if (! empty($value['media_image_hover']['url'])) {
								$img_url_hover = $value['media_image_hover']['url'];
								$mediahover = $value["media_image_hover"]["url"] ? '<div class="wppb-advanced-list-media wppb-advanced-list-hover wppb-advanced-list-img"><img src="'.esc_url($img_url_hover).'"/></div>' : '';
							}
						} elseif ( $_list_content == 'iconlist' ) {
							if ( $value["icon"] ) {
								$media = $value["icon"] ? '<div class="wppb-advanced-list-media wppb-advanced-list-regular wppb-advanced-list-icon"><i class="' . esc_attr($value["icon"]) . '"></i></div>' : '';
							}
							if ( !empty($value["icon_hover"]) ) {
								$mediahover = $value["icon_hover"] ? '<div class="wppb-advanced-list-media wppb-advanced-list-hover wppb-advanced-list-icon"><i class="' . esc_attr($value["icon_hover"]) . '"></i></div>' : '';
							}
						} else {
							if ( !empty($value["number"]) ) {
								$media = $value["number"] ? '<span class="wppb-advanced-list-media wppb-advanced-list-number">'.esc_attr($value["number"]).'</span>' : '';
							}
						}
						$output  .= '<li class="wppb-advanced-list-item wppb-list-'.$position.' repeater-'.$key.'">';
							if( $position == 'positionright'){
								$output .= $_title;
							}
							$output  .= '<div class="wppb-advanced-list-items wppb-advanced-'.$effect.'">';
								$output  .= '<div class="wppb-advanced-media-wrap">';
									$output .= $media;
									if ( ($_list_content != 'numberlist') ) {
									$output .= $mediahover;
									}
								$output  .= '</div>';//wppb-advanced-media-wrap
							$output  .= '</div>';//wppb-advanced-list-items
							if( $position == 'positionleft'){
							$output .= $_title;
							}
						$output  .= '</li>';//wppb-advanced-list-item 
					}
				}
			$output .= '</ul>';//wwppb-advanced-list-content
		$output .= '</div>';//wppb-advanced-list-addon

		return $output;
  }
  
	// Advanced List Template
	public function getTemplate(){
		$output = '<div class="wppb-advanced-list-addon">
					<ul class="wppb-advanced-list-content wppb-clearfix">
						<#
						__.forEach(data.advanced_list_items, function(value, key) { 
							if( value.title_link && value.title_link.link ){
								var title =  value.number_title ? "<span class=\'wppb-advanced-list-title\'><a href=\'"+value.title_link.link+"\'>"+value.number_title+"</a></span>" : " " 
							} else {
								var title =  value.number_title ? "<span class=\'wppb-advanced-list-title\'>"+value.number_title+"</span>" : " "
							} 
							var list_content =  value.list_content ? value.list_content : ""
							if ( list_content == "imglist" ) {
								if ( value.media_image && value.media_image.url ) {
									var img_url = value.media_image.url;
									var media = value.media_image.url ? "<div class=\'wppb-advanced-list-media wppb-advanced-list-regular wppb-advanced-list-img\'><img src=\'"+img_url+"\'/></div>" : " ";
								}
								if ( value.media_image_hover && value.media_image_hover.url ) {
									var img_hover_url = value.media_image_hover.url;
									var mediahover = value.media_image_hover.url ? "<div class=\'wppb-advanced-list-media wppb-advanced-list-hover wppb-advanced-list-img\'><img src=\'"+img_hover_url+"\'/></div>" : " ";
								}
							} else if ( list_content == "iconlist" ) {
								if( value.icon ) {
									var media =  value.icon ? "<div class=\'wppb-advanced-list-media wppb-advanced-list-regular wppb-advanced-list-icon\'><i class=\'"+value.icon+"\'></i></div>" : " ";
								}
								if( value.icon_hover ) {
									var mediahover =  value.icon_hover ? "<div class=\'wppb-advanced-list-media wppb-advanced-list-hover wppb-advanced-list-icon\'><i class=\'"+value.icon_hover+"\'></i></div>" : " ";
								}
							} else { 
								if( value.number ) {
									var media = value.number ? "<span class=\'wppb-advanced-list-media wppb-advanced-list-number\'>"+value.number+"</span>" : " ";
								}
							}
							#>
							<li class="wppb-advanced-list-item wppb-list-{{data.position}} repeater-{{key}}">
								<# if(data.position == "positionright"){ #>
									{{{title}}}
								<# } #>
								<div class="wppb-advanced-list-items wppb-advanced-{{data.effect}}">
									<div class="wppb-advanced-media-wrap">
										{{{media}}}
										<# if( ( list_content != "numberlist" ) ){ #>
										{{{mediahover}}}
										<# } #>
									</div>
								</div>
								<# if(data.position == "positionleft"){ #>
									{{{title}}}
								<# } #>
							</li>
						<# }); #>
					</ul>
			</div>
		';
		return $output;
  }
  
}
