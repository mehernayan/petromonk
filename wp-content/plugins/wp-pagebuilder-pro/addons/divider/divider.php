<?php
if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class WPPB_Addon_Divider
{
    public function get_name()
    {
      return 'wppb_divider';
    }
    public function get_title()
    {
      return 'Divider';
    }
    public function get_icon()
    {
      return 'wppb-font-divider';
    }
    public function get_category_name()
    {
      return 'Pro Addons';
    }

	// headline Settings Fields
	public function get_settings() {

		$settings = array(

      'div_position'  => array(
				'type'        => 'radioimage',
				'title'       => 'Layout',
				'values'      => array(
					'style1'    =>  WPPB_PRO_DIR_URL.'addons/divider/img/divider-img1.png',
					'style2'    =>  WPPB_PRO_DIR_URL.'addons/divider/img/divider-img2.png',
					'style3'    =>  WPPB_PRO_DIR_URL.'addons/divider/img/divider-img3.png',
					'style4'    =>  WPPB_PRO_DIR_URL.'addons/divider/img/divider-img4.png',
					'style5'    =>  WPPB_PRO_DIR_URL.'addons/divider/img/divider-img5.png',
					'style6'    =>  WPPB_PRO_DIR_URL.'addons/divider/img/divider-img6.png',
				),
				'std' => 'style1',
      ),

      'title' => array(
				'type' => 'textarea',
				'title' => __('Title','wp-pagebuilder'),
        'std' => 'This is Title',
        'section' => 'Title',
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
        'std' => 'h3',
        'section' => 'Title',
			),
			'title_link' => array(
				'type' => 'link',
				'title' => __('Link','wp-pagebuilder'),
        'std' =>   array('link'=>'','window'=>false,'nofolow'=>false),
        'section' => 'Title',
      ),

      'div_media_type' => array(
        'type' => 'select',
        'title' => __('Media Type', 'wp-pagebuilder-pro'),
        'values' => array(
            'none' => __('None', 'wp-pagebuilder-pro'),
            'image' => __('Image', 'wp-pagebuilder-pro'),
            'icon' => __('Icon', 'wp-pagebuilder-pro'),
            'border' => __('Border', 'wp-pagebuilder-pro'),
        ),
        'std' => 'border',
      ),
      'media_icon' => array(
        'type' => 'icon',
        'title' => __('Icon', 'wp-pagebuilder-pro'),
        'std' => 'wppb-font-heart',
        'depends' => array(array('div_media_type', '=', 'icon')),
      ),
      'media_image' => array(
        'type' => 'media',
        'title' => __('Image', 'wp-pagebuilder-pro'),
        'std' => array( 'url' =>  WPPB_DIR_URL.'assets/img/placeholder/wppb-small.jpg' ),
        'depends' => array(array('div_media_type', '=', 'image')),
      ),

      //1st style
      'border_width' => array(
        'type' => 'slider',
        'title' => __('Custom Width', 'wp-pagebuilder-pro'),
        'unit' => array( 'px','%','em' ),
        'range' => array(
            'em' => array(
                'min' => 0,
                'max' => 5,
                'step' => .1,
            ),
            'px' => array(
                'min' => 0,
                'max' => 400,
                'step' => 1,
            ),
            '%' => array(
              'min' => 0,
              'max' => 100,
              'step' => 1,
          ),
        ),
        'std' => array(
            'md' => '60px',
            'sm' => '',
            'xs' => '',
        ),
        'responsive' => true,
        'depends' => array(array('div_media_type', '=', 'border'),array('div_position', '=', array('style1'))),
        'selector' => array(
					'{{SELECTOR}} .wppb-divider-position-style1 .wppb-divider-border { width: {{data.border_width}}; }',
					'{{SELECTOR}} .wppb-divider-position-style1 .wppb-divider-border { right: -{{data.border_width}}; left: auto; }',
				)
      ),

      // 2nd and 3rd style
      'border_width_left' => array(
        'type' => 'slider',
        'title' => __('Custom Width', 'wp-pagebuilder-pro'),
        'unit' => array( 'px','%','em' ),
        'range' => array(
            'em' => array(
                'min' => 0,
                'max' => 5,
                'step' => .1,
            ),
            'px' => array(
                'min' => 0,
                'max' => 400,
                'step' => 1,
            ),
            '%' => array(
              'min' => 0,
              'max' => 100,
              'step' => 1,
          ),
        ),
        'std' => array(
            'md' => '60px',
            'sm' => '',
            'xs' => '',
        ),
        'responsive' => true,
        'depends' => array(array('div_media_type', '=', 'border'),array('div_position', '=', array('style2','style3'))),
        'selector' => array(
					'{{SELECTOR}} .wppb-divider-position-style2 .wppb-divider-border,{{SELECTOR}} .wppb-divider-position-style3 .wppb-divider-border { width: {{data.border_width_left}}; }',
					'{{SELECTOR}} .wppb-divider-position-style2 .wppb-divider-border ,{{SELECTOR}} .wppb-divider-position-style3 .wppb-divider-border { left: -{{data.border_width_left}}; right: auto; }',
				)
      ),

      //4th style
      'border_width_style4' => array(
        'type' => 'slider',
        'title' => __('Custom Width', 'wp-pagebuilder-pro'),
        'unit' => array( 'px','%','em' ),
        'range' => array(
            'em' => array(
                'min' => 0,
                'max' => 5,
                'step' => .1,
            ),
            'px' => array(
                'min' => 0,
                'max' => 400,
                'step' => 1,
            ),
            '%' => array(
              'min' => 0,
              'max' => 100,
              'step' => 1,
          ),
        ),
        'std' => array(
            'md' => '60px',
            'sm' => '',
            'xs' => '',
        ),
        'responsive' => true,
        'depends' => array(array('div_media_type', '=', 'border'),array('div_position', '=', array('style4','style5','style6'))),
        'selector' => array(
          '{{SELECTOR}} .wppb-divider-position-style4 .wppb-divider-border,{{SELECTOR}} .wppb-divider-position-style5 .wppb-divider-border,{{SELECTOR}} .wppb-divider-position-style6 .wppb-divider-border { width: {{data.border_width_style4}}; }',
          '{{SELECTOR}} .wppb-divider-position-style4 .wppb-divider-border,{{SELECTOR}} .wppb-divider-position-style5 .wppb-divider-border,{{SELECTOR}} .wppb-divider-position-style6 .wppb-divider-border { margin-left: calc( 50% - ({{data.border_width_style4}}) / 2); }',
        )
      ),

      //both
      'div_media_type2' => array(
        'type' => 'select',
        'title' => __('Media Type 2', 'wp-pagebuilder-pro'),
        'values' => array(
            'none2' => __('None', 'wp-pagebuilder-pro'),
            'image2' => __('Image', 'wp-pagebuilder-pro'),
            'icon2' => __('Icon', 'wp-pagebuilder-pro'),
            'border2' => __('Border', 'wp-pagebuilder-pro'),
        ),
        'std' => 'border2',
        'depends' => array(array('div_position', '=', array('style3','style6'))),
      ),
      'media_icon2' => array(
        'type' => 'icon',
        'title' => __('Icon 2', 'wp-pagebuilder-pro'),
        'std' => 'wppb-font-heart',
        'depends' => array(array('div_media_type2', '=', 'icon2'),array('div_position', '=', array('style3','style6'))),
      ),
      'media_image2' => array(
        'type' => 'media',
        'title' => __('Image 2', 'wp-pagebuilder-pro'),
        'std' => array( 'url' =>  WPPB_DIR_URL.'assets/img/placeholder/wppb-small.jpg' ),
        'depends' => array(array('div_media_type2', '=', 'image2'),array('div_position', '=', array('style3','style6'))),
      ),

      //1st style
      'border_width_style3' => array(
        'type' => 'slider',
        'title' => __('Border2 Custom Width', 'wp-pagebuilder-pro'),
        'unit' => array( 'px','%','em' ),
        'range' => array(
            'em' => array(
                'min' => 0,
                'max' => 5,
                'step' => .1,
            ),
            'px' => array(
                'min' => 0,
                'max' => 400,
                'step' => 1,
            ),
            '%' => array(
              'min' => 0,
              'max' => 100,
              'step' => 1,
          ),
        ),
        'std' => array(
            'md' => '60px',
            'sm' => '',
            'xs' => '',
        ),
        'responsive' => true,
        'depends' => array(array('div_media_type2', '=', 'border2'),array('div_position', '=', array('style3'))),
        'selector' => array(
          '{{SELECTOR}} .wppb-divider-border2 { width: {{data.border_width_style3}}; }',
          '{{SELECTOR}} .wppb-divider-border2 { right: -{{data.border_width_style3}}; }',
        )
      ),

      //4th style
      'border_width_style6' => array(
        'type' => 'slider',
        'title' => __('Border2 Custom Width', 'wp-pagebuilder-pro'),
        'unit' => array( 'px','%','em' ),
        'range' => array(
            'em' => array(
                'min' => 0,
                'max' => 5,
                'step' => .1,
            ),
            'px' => array(
                'min' => 0,
                'max' => 400,
                'step' => 1,
            ),
            '%' => array(
              'min' => 0,
              'max' => 100,
              'step' => 1,
          ),
        ),
        'std' => array(
            'md' => '60px',
            'sm' => '',
            'xs' => '',
        ),
        'responsive' => true,
        'depends' => array(array('div_media_type2', '=', 'border2'),array('div_position', '=', array('style6'))),
        'selector' => array(
          '{{SELECTOR}} .wppb-divider-position-style6 .wppb-divider-border2 { width: {{data.border_width_style6}}; }',
          '{{SELECTOR}} .wppb-divider-position-style6 .wppb-divider-border2 { margin-left: calc( 50% - ({{data.border_width_style6}}) / 2); }',
        )
      ),

			'align' => array(
				'type' => 'alignment',
				'title' => __('Alignment','wp-pagebuilder'),
        'responsive' => true,
        'section' => 'Alignment',
        'std' => 'center',
				'selector' => '{{SELECTOR}} .wppb-divider-position { text-align: {{data.align}}; }'
      ),

      //title
			'title_color' => array(
				'type' => 'color',
				'title' => __('Title Color','wp-pagebuilder'),
				'tab' => 'style',
        'selector' => '{{SELECTOR}} .wppb-addon-divider-title, {{SELECTOR}} .wppb-addon-divider-title a { color: {{data.title_color}}; }'
      ),
			'title_link_hcolor' => array(
				'type' => 'color',
				'title' => __('Title hover color','wp-pagebuilder'),
				'tab' => 'style',
				'selector' => '{{SELECTOR}} .wppb-addon-divider-title a:hover, {{SELECTOR}} .wppb-addon-divider-title-wrap:hover { color: {{data.title_link_hcolor}}; }'
			),
			'title_fontstyle' => array(
				'type' => 'typography',
				'title' => __('Title Typography','wp-pagebuilder'),
				'std' => array(
					'fontFamily' => '',
					'fontSize' => array( 'md'=>'28px', 'sm'=>'', 'xs'=>'' ),
					'lineHeight' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
					'fontWeight' => '700',
					'textTransform' => '',
					'fontStyle' => '',
					'letterSpacing' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
				),
				'selector' => '{{SELECTOR}} .wppb-addon-divider-title',
				'tab' => 'style',
      ),
      'title_margin' => array(
          'type' => 'dimension',
          'title' => __('Margin', 'wp-pagebuilder-pro'),
          'tab' => 'style',
          'responsive' => true,
          'std' => array(
              'md' => array( 'top' => '0px', 'right' => '0px', 'bottom' => '0px', 'left' => '0px' ),
              'sm' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
              'xs' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
          ),
          'unit' => array( 'px','em','%' ),
          'selector' => '{{SELECTOR}} .wppb-addon-divider-title { margin: {{data.title_margin}}; }',
          'tab' => 'style',
      ),
        'title_padding' => array(
            'type' => 'dimension',
            'title' => __('Padding', 'wp-pagebuilder-pro'),
            'tab' => 'style',
            'responsive' => true,
            'std' => array(
                'md' => array( 'top' => '10px', 'right' => '10px', 'bottom' => '10px', 'left' => '10px' ),
                'sm' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                'xs' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
            ),
            'unit' => array( 'px','em','%' ),
            'selector' => '{{SELECTOR}} .wppb-addon-divider-title { padding: {{data.title_padding}}; }',
            'tab' => 'style',
        ),

      //1st style
      'line_border' => array(
        'type' => 'slider',
        'title' => __('Border Height', 'wp-pagebuilder-pro'),
        'unit' => array( 'px','%','em' ),
        'range' => array(
            'em' => array(
                'min' => 0,
                'max' => 5,
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
            'md' => '1px',
            'sm' => '',
            'xs' => '',
        ),
        'responsive' => true,
        'tab' => 'style',
        'section' => 'Border 1',
        'depends' => array(array('div_media_type', '=', 'border')),
        'selector' => '{{SELECTOR}} .wppb-divider-border { border-width: {{data.line_border}} 0 0; }'
      ),

      //border 1
      'border_color1' => array(
        'type' => 'color',
        'title' => __('Border Color','wp-pagebuilder'),
        'tab' => 'style',
        'section' => 'Border 1',
        'std' => '#3452ff',
        'depends' => array(array('div_media_type', '=', 'border')),
        'selector' => '{{SELECTOR}} .wppb-divider-border { border-color: {{data.border_color1}}; }'
      ),

      'border_type1' => array(
        'type' => 'select',
        'title' => __('Border Style', 'wp-pagebuilder-pro'),
        'values' => array(
            'none' => __('None', 'wp-pagebuilder-pro'),
            'solid' => __('Solid', 'wp-pagebuilder-pro'),
            'dotted' => __('Dotted', 'wp-pagebuilder-pro'),
            'dashed' => __('Dashed', 'wp-pagebuilder-pro'),
            'double' => __('Doubled', 'wp-pagebuilder-pro'),
        ),
        'std' => 'solid',
        'tab' => 'style',
        'section' => 'Border 1',
        'depends' => array(array('div_media_type', '=', 'border')),
        'selector' => '{{SELECTOR}} .wppb-divider-border { border-style: {{data.border_type1}}; }'
      ),

      'line_border_vertical' => array(
        'type' => 'slider',
        'title' => __('Border position vertically', 'wp-pagebuilder-pro'),
        'unit' => array( 'px','%','em' ),
        'range' => array(
            'em' => array(
                'min' => -5,
                'max' => 5,
                'step' => .1,
            ),
            'px' => array(
                'min' => -200,
                'max' => 200,
                'step' => 1,
            ),
            '%' => array(
              'min' => -100,
              'max' => 100,
              'step' => 1,
          ),
        ),

        'responsive' => true,
        'tab' => 'style',
        'section' => 'Border 1',
        'depends' => array(array('div_media_type', '=', 'border')),
        'selector' => '{{SELECTOR}} .wppb-divider-border { top: {{data.line_border_vertical}}; }'
      ),

      'line_border_horizontal' => array(
        'type' => 'slider',
        'title' => __('Border position Horizontal', 'wp-pagebuilder-pro'),
        'unit' => array( 'px','%','em' ),
        'range' => array(
            'em' => array(
                'min' => -5,
                'max' => 5,
                'step' => .1,
            ),
            'px' => array(
                'min' => -400,
                'max' => 400,
                'step' => 1,
            ),
            '%' => array(
              'min' => -100,
              'max' => 100,
              'step' => 1,
          ),
        ),

        'responsive' => true,
        'tab' => 'style',
        'section' => 'Border 1',
        'depends' => array(array('div_media_type', '=', 'border')),
        'selector' => '{{SELECTOR}} .wppb-divider-position .wppb-divider-border { left: {{data.line_border_horizontal}}; }'
      ),

      'line_border2' => array(
        'type' => 'slider',
        'title' => __('Border Height 2', 'wp-pagebuilder-pro'),
        'unit' => array( 'px','%','em' ),
        'range' => array(
            'em' => array(
                'min' => 0,
                'max' => 5,
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
            'md' => '1px',
            'sm' => '',
            'xs' => '',
        ),
        'responsive' => true,
        'tab' => 'style',
        'section' => 'Border 2',
        'depends' => array(array('div_media_type2', '=', 'border2'),array('div_position', '=', array('style3','style6'))),
        'selector' => '{{SELECTOR}} .wppb-divider-border2 { border-width: {{data.line_border2}} 0 0; }'
      ),
      'border_color2' => array(
        'type' => 'color',
        'title' => __('Border Color 2','wp-pagebuilder'),
        'tab' => 'style',
        'std' => '#3452ff',
        'tab' => 'style',
        'section' => 'Border 2',
        'depends' => array(array('div_media_type2', '=', 'border2'),array('div_position', '=', array('style3','style6'))),
        'selector' => '{{SELECTOR}} .wppb-divider-border2 { border-color: {{data.border_color2}}; }'
      ),
      'border_type2' => array(
        'type' => 'select',
        'title' => __('Border Style 2', 'wp-pagebuilder-pro'),
        'values' => array(
            'none' => __('None', 'wp-pagebuilder-pro'),
            'solid' => __('Solid', 'wp-pagebuilder-pro'),
            'dotted' => __('Dotted', 'wp-pagebuilder-pro'),
            'dashed' => __('Dashed', 'wp-pagebuilder-pro'),
            'double' => __('Doubled', 'wp-pagebuilder-pro'),
        ),
        'std' => 'solid',
        'tab' => 'style',
        'section' => 'Border 2',
        'depends' => array(array('div_media_type2', '=', 'border2'),array('div_position', '=', array('style3','style6'))),
        'selector' => '{{SELECTOR}} .wppb-divider-border2 { border-style: {{data.border_type2}}; }'
      ),
      'line_border_vertical2' => array(
        'type' => 'slider',
        'title' => __('Border position vertically', 'wp-pagebuilder-pro'),
        'unit' => array( 'px','%','em' ),
        'range' => array(
            'em' => array(
                'min' => -5,
                'max' => 5,
                'step' => .1,
            ),
            'px' => array(
                'min' => -200,
                'max' => 200,
                'step' => 1,
            ),
            '%' => array(
              'min' => -100,
              'max' => 100,
              'step' => 1,
          ),
        ),

        'responsive' => true,
        'tab' => 'style',
        'section' => 'Border 2',
        'depends' => array(array('div_media_type2', '=', 'border2'),array('div_position', '=', array('style3','style6'))),
        'selector' => '{{SELECTOR}} .wppb-divider-border2 { top: {{data.line_border_vertical2}}; }'
      ),
      'line_border_horizontal2' => array(
        'type' => 'slider',
        'title' => __('Border position Horizontal', 'wp-pagebuilder-pro'),
        'unit' => array( 'px','%','em' ),
        'range' => array(
            'em' => array(
                'min' => -5,
                'max' => 5,
                'step' => .1,
            ),
            'px' => array(
                'min' => -400,
                'max' => 400,
                'step' => 1,
            ),
            '%' => array(
              'min' => -100,
              'max' => 100,
              'step' => 1,
          ),
        ),

        'responsive' => true,
        'tab' => 'style',
        'section' => 'Border 2',
        'depends' => array(array('div_media_type2', '=', 'border2'),array('div_position', '=', array('style3','style6'))),
        'selector' => '{{SELECTOR}} .wppb-divider-position .wppb-divider-border2 { left: {{data.line_border_horizontal2}}; }'
      ),
    
        // icon
        'icon_size' => array(
          'type' => 'slider',
          'title' => __('Icon Size', 'wp-pagebuilder-pro'),
          'unit' => array( 'px','%','em' ),
          'range' => array(
              'em' => array(
                  'min' => 0,
                  'max' => 25,
                  'step' => .1,
              ),
              'px' => array(
                  'min' => 0,
                  'max' => 250,
                  'step' => 1,
              ),
              '%' => array(
                  'min' => 0,
                  'max' => 100,
                  'step' => 1,
              ),
          ),
          'std' => array(
              'md' => '25px',
              'sm' => '',
              'xs' => '',
          ),
          'responsive' => true,
          'tab' => 'style',
          'section' => 'Icon',
          'selector' => '{{SELECTOR}} .wppb-divider-icon i { font-size: {{data.icon_size}}; }'
      ),
      'icon_line_height' => array(
          'type' => 'slider',
          'title' => __('Line Height', 'wp-pagebuilder-pro'),
          'unit' => array( 'px','%','em' ),
          'responsive' => true,
          'max' => 300,
          'section' => 'Icon',
          'tab' => 'style',
          'selector' =>'{{SELECTOR}} .wppb-divider-icon i { line-height: {{data.icon_line_height}}; }'
      ),
      'icon_width' => array(
          'type' => 'slider',
          'title' => __('Width', 'wp-pagebuilder-pro'),
          'unit' => array( 'px','%','em' ),
          'range' => array(
              'em' => array(
                  'min' => 0,
                  'max' => 25,
                  'step' => .1,
              ),
              'px' => array(
                  'min' => 0,
                  'max' => 300,
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
          'selector' => '{{SELECTOR}} .wppb-divider-icon { width: {{data.icon_width}}; }'
      ),
      'icon_height' => array(
          'type' => 'slider',
          'title' => __('Height', 'wp-pagebuilder-pro'),
          'unit' => array( 'px','%','em' ),
          'range' => array(
              'em' => array(
                  'min' => 0,
                  'max' => 25,
                  'step' => .1,
              ),
              'px' => array(
                  'min' => 0,
                  'max' => 300,
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
          'selector' => '{{SELECTOR}} .wppb-divider-icon { height: {{data.icon_height}}; }',
      ),
      'icon_vertical' => array(
        'type' => 'slider',
        'title' => __('Icon position vertically', 'wp-pagebuilder-pro'),
        'unit' => array( 'px','%','em' ),
        'range' => array(
            'em' => array(
                'min' => -5,
                'max' => 5,
                'step' => .1,
            ),
            'px' => array(
                'min' => -200,
                'max' => 200,
                'step' => 1,
            ),
            '%' => array(
              'min' => -100,
              'max' => 100,
              'step' => 1,
          ),
        ),

        'responsive' => true,
        'tab' => 'style',
        'section' => 'Icon',
        'selector' => '{{SELECTOR}} .wppb-divider-icon { top: {{data.icon_vertical}}; }'
      ),
      'icon_horizontal' => array(
        'type' => 'slider',
        'title' => __('Icon position horizontal', 'wp-pagebuilder-pro'),
        'unit' => array( 'px','%','em' ),
        'range' => array(
            'em' => array(
                'min' => -5,
                'max' => 5,
                'step' => .1,
            ),
            'px' => array(
                'min' => -200,
                'max' => 200,
                'step' => 1,
            ),
            '%' => array(
              'min' => -100,
              'max' => 100,
              'step' => 1,
          ),
        ),

        'responsive' => true,
        'tab' => 'style',
        'section' => 'Icon',
        'selector' => '{{SELECTOR}} .wppb-divider-icon { left: {{data.icon_horizontal}}; }'
      ),
      'icon_color' => array(
          'type' => 'color',
          'title' => __('Color','wp-pagebuilder-pro'),
          'clip' => true,
          'selector' => '{{SELECTOR}} .wppb-divider-icon i { color: {{data.icon_color}}; }',
          'tab' => 'style',
          'section' => 'Icon',
      ),
      'icon_hcolor' => array(
          'type' => 'color',
          'title' => __('Hover Color','wp-pagebuilder-pro'),
          'clip' => true,
          'selector' => '{{SELECTOR}} .wppb-addon-divider-title-wrap:hover .wppb-divider-icon i { color: {{data.icon_hcolor}}; }',
          'tab' => 'style',
          'section' => 'Icon',
      ),

      'icon_bg' => array(
          'type' => 'color',
          'title' => __('background','wp-pagebuilder-pro'),
          'clip' => false,
          'selector' => '{{SELECTOR}} .wppb-divider-icon { background: {{data.icon_bg}}; }',
          'tab' => 'style',
          'section' => 'Icon',
      ),

      'icon_hover_bg' => array(
          'type' => 'color',
          'title' => __('hover background','wp-pagebuilder-pro'),
          'clip' => false,
          'selector' => '{{SELECTOR}} .wppb-addon-divider-title-wrap:hover .wppb-divider-icon { background: {{data.icon_hover_bg}}; }',
          'tab' => 'style',
          'section' => 'Icon',
      ),

      'icon_border' => array(
          'type' => 'border',
          'title' => __('Border','wp-pagebuilder-pro'),
          'std' => array(
              'borderWidth' => array( 'top' => '2px', 'right' => '2px', 'bottom' => '2px', 'left' => '2px' ),
              'borderStyle' => 'solid',
              'borderColor' => '#cccccc'
          ),
          'tab' => 'style',
          'section' => 'Icon',
          'selector' => '{{SELECTOR}} .wppb-divider-icon'
      ),
      'icon_border_hcolor' => array(
          'type' => 'border',
          'title' => __('hover color','wp-pagebuilder-pro'),
          'std' => array(
              'borderWidth' => array( 'top' => '2px', 'right' => '2px', 'bottom' => '2px', 'left' => '2px' ),
              'borderStyle' => 'solid',
              'borderColor' => '#cccccc'
          ),
          'tab' => 'style',
          'section' => 'Icon',
          'selector' => '{{SELECTOR}} .wppb-addon-divider-title-wrap:hover .wppb-divider-icon'
      ),

      'icon_radius' => array(
          'type' => 'dimension',
          'title' => __('Border radius', 'wp-pagebuilder-pro'),
          'tab' => 'style',
          'section' => 'Icon',
          'responsive' => true,
          'std' => array(
              'md' => array( 'top' => '0px', 'right' => '0px', 'bottom' => '0px', 'left' => '0px' ),
              'sm' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
              'xs' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
          ),
          'unit' => array( 'px','em','%' ),
          'selector' => '{{SELECTOR}} .wppb-divider-icon { border-radius: {{data.icon_radius}}; }'
      ),
      
      //icon2
      'icon_size2' => array(
        'type' => 'slider',
        'title' => __('Icon2 Size', 'wp-pagebuilder-pro'),
        'unit' => array( 'px','%','em' ),
        'range' => array(
            'em' => array(
                'min' => 0,
                'max' => 25,
                'step' => .1,
            ),
            'px' => array(
                'min' => 0,
                'max' => 250,
                'step' => 1,
            ),
            '%' => array(
                'min' => 0,
                'max' => 100,
                'step' => 1,
            ),
        ),
        'std' => array(
            'md' => '25px',
            'sm' => '',
            'xs' => '',
        ),
        'responsive' => true,
        'tab' => 'style',
        'section' => 'Icon2',
        'depends' => array(array('div_position', '=', array('style3','style6'))),
        'selector' => '{{SELECTOR}} .wppb-divider-icon2 i { font-size: {{data.icon_size2}}; }'
    ),
      'icon_line_height2' => array(
        'type' => 'slider',
        'title' => __('Icon2 Line Height', 'wp-pagebuilder-pro'),
        'unit' => array( 'px','%','em' ),
        'responsive' => true,
        'max' => 300,
        'section' => 'Icon2',
        'tab' => 'style',
        'depends' => array(array('div_position', '=', array('style3','style6'))),
        'selector' =>'{{SELECTOR}} .wppb-divider-icon2 i { line-height: {{data.icon_line_height2}}; }'
      ),
      'icon_width2' => array(
        'type' => 'slider',
        'title' => __('Icon2 Width', 'wp-pagebuilder-pro'),
        'unit' => array( 'px','%','em' ),
        'range' => array(
            'em' => array(
                'min' => 0,
                'max' => 25,
                'step' => .1,
            ),
            'px' => array(
                'min' => 0,
                'max' => 300,
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
        'section' => 'Icon2',
        'depends' => array(array('div_position', '=', array('style3','style6'))),
        'selector' => '{{SELECTOR}} .wppb-divider-icon2 { width: {{data.icon_width2}}; }'
    ),
      'icon_height2' => array(
        'type' => 'slider',
        'title' => __('Icon2 Height', 'wp-pagebuilder-pro'),
        'unit' => array( 'px','%','em' ),
        'range' => array(
            'em' => array(
                'min' => 0,
                'max' => 25,
                'step' => .1,
            ),
            'px' => array(
                'min' => 0,
                'max' => 300,
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
        'section' => 'Icon2',
        'depends' => array(array('div_position', '=', array('style3','style6'))),
        'selector' => '{{SELECTOR}} .wppb-divider-icon2 { height: {{data.icon_height2}}; }',
      ),
      'icon_vertical2' => array(
        'type' => 'slider',
        'title' => __('Icon2 position vertically', 'wp-pagebuilder-pro'),
        'unit' => array( 'px','%','em' ),
        'range' => array(
            'em' => array(
                'min' => -5,
                'max' => 5,
                'step' => .1,
            ),
            'px' => array(
                'min' => -400,
                'max' => 400,
                'step' => 1,
            ),
            '%' => array(
              'min' => -100,
              'max' => 100,
              'step' => 1,
          ),
        ),
        'responsive' => true,
        'tab' => 'style',
        'section' => 'Icon2',
        'depends' => array(array('div_position', '=', array('style3','style6'))),
        'selector' => '{{SELECTOR}} .wppb-divider-icon2 { top: {{data.icon_vertical2}}; }'
      ),
      'icon_horizontal2' => array(
        'type' => 'slider',
        'title' => __('Icon2 position horizontal', 'wp-pagebuilder-pro'),
        'unit' => array( 'px','%','em' ),
        'range' => array(
            'em' => array(
                'min' => -5,
                'max' => 5,
                'step' => .1,
            ),
            'px' => array(
                'min' => -400,
                'max' => 400,
                'step' => 1,
            ),
            '%' => array(
              'min' => -100,
              'max' => 100,
              'step' => 1,
          ),
        ),
        'responsive' => true,
        'tab' => 'style',
        'section' => 'Icon2',
        'depends' => array(array('div_position', '=', array('style3','style6'))),
        'selector' => '{{SELECTOR}} .wppb-divider-icon2 { left: {{data.icon_horizontal2}}; }'
      ),
      'icon_color2' => array(
        'type' => 'color',
        'title' => __('Icon2 Color','wp-pagebuilder-pro'),
        'clip' => true,
        'selector' => '{{SELECTOR}} .wppb-divider-icon2 i { color: {{data.icon_color2}}; }',
        'tab' => 'style',
        'depends' => array(array('div_position', '=', array('style3','style6'))),
        'section' => 'Icon2',
      ),
      'icon_hcolor2' => array(
        'type' => 'color',
        'title' => __('Icon2 Hover Color','wp-pagebuilder-pro'),
        'clip' => true,
        'selector' => '{{SELECTOR}} .wppb-addon-divider-title-wrap:hover .wppb-divider-icon2 i { color: {{data.icon_hcolor2}}; }',
        'tab' => 'style',
        'depends' => array(array('div_position', '=', array('style3','style6'))),
        'section' => 'Icon2',
      ),
      'icon_bg2' => array(
        'type' => 'color',
        'title' => __('background','wp-pagebuilder-pro'),
        'clip' => false,
        'selector' => '{{SELECTOR}} .wppb-divider-icon2 { background: {{data.icon_bg2}}; }',
        'tab' => 'style',
        'depends' => array(array('div_position', '=', array('style3','style6'))),
        'section' => 'Icon2',
      ),
      'icon_hover_bg2' => array(
        'type' => 'color',
        'title' => __('Icon2 hover background','wp-pagebuilder-pro'),
        'clip' => false,
        'selector' => '{{SELECTOR}} .wppb-addon-divider-title-wrap:hover .wppb-divider-icon2 { background: {{data.icon_hover_bg2}}; }',
        'tab' => 'style',
        'depends' => array(array('div_position', '=', array('style3','style6'))),
        'section' => 'Icon2',
      ),
      'icon_border2' => array(
        'type' => 'border',
        'title' => __('Icon2 Border','wp-pagebuilder-pro'),
        'std' => array(
            'borderWidth' => array( 'top' => '2px', 'right' => '2px', 'bottom' => '2px', 'left' => '2px' ),
            'borderStyle' => 'solid',
            'borderColor' => '#cccccc'
        ),
        'tab' => 'style',
        'section' => 'Icon2',
        'depends' => array(array('div_position', '=', array('style3','style6'))),
        'selector' => '{{SELECTOR}} .wppb-divider-icon2'
      ),
      'icon_border_hcolor2' => array(
        'type' => 'border',
        'title' => __('Icon 2 Border hover color','wp-pagebuilder-pro'),
        'std' => array(
            'borderWidth' => array( 'top' => '2px', 'right' => '2px', 'bottom' => '2px', 'left' => '2px' ),
            'borderStyle' => 'solid',
            'borderColor' => '#cccccc'
        ),
        'tab' => 'style',
        'section' => 'Icon2',
        'depends' => array(array('div_position', '=', array('style3','style6'))),
        'selector' => '{{SELECTOR}} .wppb-addon-divider-title-wrap:hover .wppb-divider-icon2'
      ),
      'icon_radius2' => array(
        'type' => 'dimension',
        'title' => __('Icon2 Border radius', 'wp-pagebuilder-pro'),
        'tab' => 'style',
        'section' => 'Icon2',
        'responsive' => true,
        'std' => array(
            'md' => array( 'top' => '0px', 'right' => '0px', 'bottom' => '0px', 'left' => '0px' ),
            'sm' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
            'xs' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
        ),
        'unit' => array( 'px','em','%' ),
        'depends' => array(array('div_position', '=', array('style3','style6'))),
        'selector' => '.wppb-divider-icon2 { border-radius: {{data.icon_radius2}}; }'
      ),


      // Image
      'image_width' => array(
          'type' => 'slider',
          'title' => __('Width', 'wp-pagebuilder-pro'),
          'unit' => array( 'px','%','em' ),
          'range' => array(
            'em' => array(
                'min' => 0,
                'max' => 25,
                'step' => .1,
            ),
            'px' => array(
                'min' => 0,
                'max' => 300,
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
          'sm' => '',
          'xs' => '',
        ),
        'responsive' => true,
        'tab' => 'style',
        'section' => 'Image',
        'selector' => '{{SELECTOR}} .wppb-divider-img img { width: {{data.image_width}}; }'
      ),
      'image_height' => array(
          'type' => 'slider',
          'title' => __('Height', 'wp-pagebuilder-pro'),
          'unit' => array( 'px','%','em' ),
          'range' => array(
              'em' => array(
                  'min' => 0,
                  'max' => 50,
                  'step' => .1,
              ),
              'px' => array(
                  'min' => 0,
                  'max' => 500,
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
            'sm' => '',
            'xs' => '',
          ),
          'responsive' => true,
          'tab' => 'style',
          'section' => 'Image',
          'selector' => '{{SELECTOR}} .wppb-divider-img img { height: {{data.image_height}}; }',
      ),
      'image_vertical' => array(
        'type' => 'slider',
        'title' => __('Image position vertically', 'wp-pagebuilder-pro'),
        'unit' => array( 'px','%','em' ),
        'range' => array(
            'em' => array(
                'min' => -5,
                'max' => 5,
                'step' => .1,
            ),
            'px' => array(
                'min' => -200,
                'max' => 200,
                'step' => 1,
            ),
            '%' => array(
              'min' => -100,
              'max' => 100,
              'step' => 1,
          ),
        ),
        'responsive' => true,
        'tab' => 'style',
        'section' => 'Image',
        'selector' => array(
          '{{SELECTOR}} .wppb-divider-position-style1 .wppb-divider-img,{{SELECTOR}} .wppb-divider-position-style2 .wppb-divider-img,{{SELECTOR}} .wppb-divider-position-style3 .wppb-divider-img { top: {{data.image_vertical}};position:relative; }',
          '{{SELECTOR}} .wppb-divider-position-style4 .wppb-divider-img,{{SELECTOR}} .wppb-divider-position-style5 .wppb-divider-img,{{SELECTOR}} .wppb-divider-position-style6 .wppb-divider-img { top: {{data.image_vertical}}; }',
        )
      ),
      'image_horizontal' => array(
        'type' => 'slider',
        'title' => __('Image position horizontal', 'wp-pagebuilder-pro'),
        'unit' => array( 'px','%','em' ),
        'range' => array(
            'em' => array(
                'min' => -5,
                'max' => 5,
                'step' => .1,
            ),
            'px' => array(
                'min' => -400,
                'max' => 400,
                'step' => 1,
            ),
            '%' => array(
              'min' => -100,
              'max' => 100,
              'step' => 1,
          ),
        ),
        'responsive' => true,
        'tab' => 'style',
        'section' => 'Image',
        'selector' => array(
          '{{SELECTOR}} .wppb-divider-position-style1 .wppb-divider-img,{{SELECTOR}} .wppb-divider-position-style2 .wppb-divider-img,{{SELECTOR}} .wppb-divider-position-style3 .wppb-divider-img { left: {{data.image_horizontal}};position:relative; }',
          '{{SELECTOR}} .wppb-divider-position-style4 .wppb-divider-img,{{SELECTOR}} .wppb-divider-position-style5 .wppb-divider-img,{{SELECTOR}} .wppb-divider-position-style6 .wppb-divider-img { left: {{data.image_horizontal}}; }',
        )
      ),
      'image_border' => array(
          'type' => 'border',
          'title' => __('Border','wp-pagebuilder-pro'),
          'std' => array(
            'borderWidth' => array( 'top' => '2px', 'right' => '2px', 'bottom' => '2px', 'left' => '2px' ),
            'borderStyle' => 'solid',
            'borderColor' => '#cccccc'
          ),
          'tab' => 'style',
          'section' => 'Image',
          'selector' => '{{SELECTOR}} .wppb-divider-img img'
      ),
      'image_radius' => array(
        'type' => 'slider',
        'title' => __('Border radius', 'wp-pagebuilder-pro'),
        'unit' => array( '%','px','em' ),
        'responsive' => true,
        'tab' => 'style',
        'section' => 'Image',
        'selector' => '{{SELECTOR}} .wppb-divider-img img { border-radius: {{data.image_radius}}; }'
      ),

      //image 2
      'image_width2' => array(
        'type' => 'slider',
        'title' => __('Width', 'wp-pagebuilder-pro'),
        'unit' => array( 'px','%','em' ),
        'range' => array(
          'em' => array(
              'min' => 0,
              'max' => 25,
              'step' => .1,
          ),
          'px' => array(
              'min' => 0,
              'max' => 300,
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
        'sm' => '',
        'xs' => '',
      ),
      'responsive' => true,
      'tab' => 'style',
      'section' => 'Image2',
      'depends' => array(array('div_position', '=', array('style3','style6'))),
      'selector' => '{{SELECTOR}} .wppb-divider-img2 img { width: {{data.image_width2}}; }'
    ),
      'image_height2' => array(
        'type' => 'slider',
        'title' => __('Height', 'wp-pagebuilder-pro'),
        'unit' => array( 'px','%','em' ),
        'range' => array(
            'em' => array(
                'min' => 0,
                'max' => 50,
                'step' => .1,
            ),
            'px' => array(
                'min' => 0,
                'max' => 500,
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
          'sm' => '',
          'xs' => '',
        ),
        'responsive' => true,
        'tab' => 'style',
        'section' => 'Image2',
        'depends' => array(array('div_position', '=', array('style3','style6'))),
        'selector' => '{{SELECTOR}} .wppb-divider-img2 img { height: {{data.image_height2}}; }',
    ),
    'image_vertical2' => array(
      'type' => 'slider',
      'title' => __('Image position vertically', 'wp-pagebuilder-pro'),
      'unit' => array( 'px','%','em' ),
      'range' => array(
          'em' => array(
              'min' => -5,
              'max' => 5,
              'step' => .1,
          ),
          'px' => array(
              'min' => -200,
              'max' => 200,
              'step' => 1,
          ),
          '%' => array(
            'min' => -100,
            'max' => 100,
            'step' => 1,
        ),
      ),
      'responsive' => true,
      'tab' => 'style',
      'section' => 'Image2',
      'depends' => array(array('div_position', '=', array('style3','style6'))),
      'selector' => '{{SELECTOR}} .wppb-divider-img2 { top: {{data.image_vertical2}}; }'
    ),
    'image_horizontal2' => array(
      'type' => 'slider',
      'title' => __('Image position horizontal', 'wp-pagebuilder-pro'),
      'unit' => array( 'px','%','em' ),
      'range' => array(
          'em' => array(
              'min' => -5,
              'max' => 5,
              'step' => .1,
          ),
          'px' => array(
              'min' => -200,
              'max' => 200,
              'step' => 1,
          ),
          '%' => array(
            'min' => -100,
            'max' => 100,
            'step' => 1,
        ),
      ),
      'responsive' => true,
      'tab' => 'style',
      'section' => 'Image2',
      'depends' => array(array('div_position', '=', array('style3','style6'))),
      'selector' => '{{SELECTOR}} .wppb-divider-img2 { left: {{data.image_horizontal2}};position:relative; }'
    ),
      'image_border2' => array(
        'type' => 'border',
        'title' => __('Border','wp-pagebuilder-pro'),
        'std' => array(
          'borderWidth' => array( 'top' => '2px', 'right' => '2px', 'bottom' => '2px', 'left' => '2px' ),
          'borderStyle' => 'solid',
          'borderColor' => '#cccccc'
        ),
        'tab' => 'style',
        'section' => 'Image2',
        'depends' => array(array('div_position', '=', array('style3','style6'))),
        'selector' => '{{SELECTOR}} .wppb-divider-img2 img'
      ),
      'image_radius2' => array(
        'type' => 'slider',
        'title' => __('Border radius', 'wp-pagebuilder-pro'),
        'unit' => array( '%','px','em' ),
        'responsive' => true,
        'tab' => 'style',
        'section' => 'Image2',
        'depends' => array(array('div_position', '=', array('style3','style6'))),
        'selector' => '{{SELECTOR}} .wppb-divider-img2 img { border-radius: {{data.image_radius2}}; }'
      )

      
		);

		return $settings;
	}

	// Divider Render HTML
	public function render($data = null){
		$settings 		    = $data['settings']; 
		$title_selector   = isset($settings["title_selector"]) ? $settings["title_selector"] : 'h3';
    $title 			      = isset($settings["title"]) ? $settings["title"] : '';
    $title_link 	    = isset($settings["title_link"]) ? $settings["title_link"] : array();
		$div_position 		= isset($settings["div_position"]) ? $settings["div_position"] : '';
		$div_media_type 	= isset($settings["div_media_type"]) ? $settings["div_media_type"] : '';
		$media_icon 			= isset($settings["media_icon"]) ? $settings["media_icon"] : '';
		$media_image 			= isset($settings["media_image"]) ? $settings["media_image"] : '';
		$line_border 			= isset($settings["line_border"]) ? $settings["line_border"] : '';
		$div_media_type2 	= isset($settings["div_media_type2"]) ? $settings["div_media_type2"] : '';
		$media_icon2 			= isset($settings["media_icon2"]) ? $settings["media_icon2"] : '';
		$media_image2 		= isset($settings["media_image2"]) ? $settings["media_image2"] : '';
		$line_border2 		= isset($settings["line_border2"]) ? $settings["line_border2"] : '';
		
		$output = $alltop_media = $position = $titledata = $alltop_media2 = $top_media2 = '';

		$target = !empty($title_link['window']) ? "target=_blank" : "";
		$nofolow = !empty($title_link['nofolow']) ? "rel=nofolow" : "";


			$output  .= '<div class="wppb-divider-addon">';
        $output  .= '<div class="wppb-divider-content">';



          if( $div_media_type == 'image' ) {
            if (! empty($media_image["url"])) {
              $img_url = $media_image["url"];
              $top_media = $media_image["url"] ? '<span class="wppb-divider-img"><img src="'.esc_url($img_url).'"/></span>' : '';
            }
          } elseif( $div_media_type == 'icon' ){
            $top_media = $media_icon ? '<span class="wppb-divider-icon"><i class="' . esc_attr($media_icon) . '"></i></span>' : '';
          } elseif( $div_media_type == 'border' ){
            $top_media = $line_border ? '<span class="wppb-divider-border"></span>' : '';
          } else {
            $top_media = '';
          }
          if( $div_media_type != 'none' ) {
            $alltop_media .= $top_media;
          }

          //both
          if( $div_media_type2 == 'image2' ) {
            if (! empty($media_image2["url"])) {
              $img_url2 = $media_image2["url"];
              $top_media2 = $media_image2["url"] ? '<span class="wppb-divider-img2"><img src="'.esc_url($img_url2).'"/></span>' : '';
            }
          } elseif( $div_media_type2 == 'icon2' ){
            $top_media2 = $media_icon2 ? '<span class="wppb-divider-icon2"><i class="' . esc_attr($media_icon2) . '"></i></span>' : '';
          } elseif( $div_media_type2 == 'border2' ){
            $top_media2 = $line_border2 ? '<span class="wppb-divider-border2"></span>' : '';
          } else {
            $top_media2 = '';
          }
          if( $div_media_type2 != 'none2' ) {
            $alltop_media2 .= $top_media2;
          }

          if( !empty($title_link['link']) ){
            $titledata .= '<' .esc_attr($title_selector). ' class="wppb-addon-divider-title"><a '.esc_attr($nofolow).' href="'.esc_url($title_link['link']).'" '.esc_attr($target).'>' . wp_kses_post($title) .'</a></' . esc_attr($title_selector) . '>';
          } else {
            $titledata .= '<' .esc_attr($title_selector ). ' class="wppb-addon-divider-title">' . wp_kses_post($title) .'</' . esc_attr($title_selector) . '>';
          } 


          switch ($div_position) {
            case "style1":
            $position .= '<div class="wppb-addon-divider-title-wrap">'.$titledata.' '.$alltop_media.'</div>';
            break;
            case "style2":
              $position .= '<div class="wppb-addon-divider-title-wrap">'.$alltop_media.' '.$titledata.'</div>';
              break;
            case "style3":
              $position .= '<div class="wppb-addon-divider-title-wrap">'.$alltop_media.' '.$titledata.' '.$alltop_media2.'</div>';
              break;
            case "style4":
              $position .= '<div class="wppb-addon-divider-title-wrap">'.$alltop_media.' '.$titledata.'</div>';
              break;
            case "style5":
              $position .= '<div class="wppb-addon-divider-title-wrap">'.$titledata.' '.$alltop_media.'</div>';
              break;
            case "style6":
              $position .= '<div class="wppb-addon-divider-title-wrap">'.$alltop_media.' '.$titledata.' '.$alltop_media2.'</div>';
              break;
            default:
              $position .= '<div class="wppb-addon-divider-title-wrap">'.$titledata.' '.$alltop_media.'</div>';
          }

          $output .= '<div class="wppb-divider-position wppb-divider-position-'.$div_position.'">'.$position.'</div>';

				$output .= '</div>';
			$output .= '</div>';
		return $output;
	}

	//Divider Template
	public function getTemplate(){
		$output = '
    <# 
    var alltop_media = titledata = position = alltop_media2 = alltop_media = "";
    var title_selector = data.title_selector ? data.title_selector : "h3" #>
      <div class="wppb-divider-addon">
        <div class="wppb-divider-content">

          <#
          var div_media_type =  data.div_media_type ? data.div_media_type : ""
          if ( div_media_type == "image" ) {
            if ( data.media_image && data.media_image.url ) {
              var img_url = data.media_image.url;
              var top_media = data.media_image.url ? "<span class=\'wppb-divider-img\'><img src=\'"+img_url+"\'/></span>" : " ";
            } else {
              var top_media = " ";
            }
          } else if ( div_media_type == "icon" ) {
            var top_media =  data.media_icon ? "<span class=\'wppb-divider-icon\'><i class=\'"+data.media_icon+"\'></i></span>" : " ";
          } else if ( div_media_type == "border" ) {
            var top_media =  data.line_border ? "<span class=\'wppb-divider-border\'></span>" : " ";
          } else {
            var top_media = " ";
          }
          if ( div_media_type != "none" ) {
            alltop_media += top_media;
          }
          #>

          <#
          var div_media_type2 =  data.div_media_type2 ? data.div_media_type2 : ""
          if ( div_media_type2 == "image2" ) {
            if ( data.media_image2 && data.media_image2.url ) {
              var img_url2 = data.media_image2.url;
              var top_media2 = data.media_image2.url ? "<span class=\'wppb-divider-img2\'><img src=\'"+img_url2+"\'/></span>" : " ";
            } else {
              var top_media2 = " ";
            }
          } else if ( div_media_type2 == "icon2" ) {
            var top_media2 =  data.media_icon2 ? "<span class=\'wppb-divider-icon2\'><i class=\'"+data.media_icon2+"\'></i></span>" : " ";
          } else if ( div_media_type2 == "border2" ) {
            var top_media2 =  data.line_border2 ? "<span class=\'wppb-divider-border2\'></span>" : " ";
          } else {
            var top_media2 = " ";
          }
          if ( div_media_type2 != "none2" ) {
            alltop_media2 += top_media2;
          }
          #>

          <#
          if( !__.isEmpty(data.title_link) && data.title_link.link ){
              titledata += "<"+title_selector+" class=\'wppb-addon-divider-title\'><a>"+data.title+"</a></"+title_selector+">";
          } else {
            titledata += "<"+title_selector+" class=\'wppb-addon-divider-title\'>"+data.title+"</"+title_selector+">";
          }
          #>

          <#
            if ( data.div_position == "style1" ) {
              position += "<div class=\'wppb-addon-divider-title-wrap\'>"+titledata+ " " +alltop_media+"</div>";
            } else if ( data.div_position == "style2" ) {
              position += "<div class=\'wppb-addon-divider-title-wrap\'>"+alltop_media+ " " +titledata+"</div>";
            } else if ( data.div_position == "style3" ) {
              position += "<div class=\'wppb-addon-divider-title-wrap\'>"+alltop_media+ " " +titledata+ " " +alltop_media2+"</div>";
            }  else if ( data.div_position == "style4" ) {
              position += "<div class=\'wppb-addon-divider-title-wrap\'>"+alltop_media+ " " +titledata+"</div>";
            } else if ( data.div_position == "style5" ) {
              position += "<div class=\'wppb-addon-divider-title-wrap\'>"+titledata+ " " +alltop_media+"</div>";
            } else if ( data.div_position == "style6" ) {
              position += "<div class=\'wppb-addon-divider-title-wrap\'>"+alltop_media+ " " +titledata+ " " +alltop_media2+"</div>";
            } else {
              position += "<div class=\'wppb-addon-divider-title-wrap\'>"+titledata+ " " +alltop_media+"</div>";
            } 
          #>

          <div class="wppb-divider-position wppb-divider-position-{{data.div_position}}">{{{position}}}</div>

				</div>
			</div>
		';
		return $output;
	}

}
