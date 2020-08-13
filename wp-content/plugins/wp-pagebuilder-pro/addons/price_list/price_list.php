<?php
if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class WPPB_Addon_Price_List
{
    public function get_name()
    {
        return 'wppb_price_list';
    }
    public function get_title()
    {
        return 'Price List';
    }
    public function get_icon()
    {
        return 'wppb-font-list-view';
    }
    public function get_category_name()
    {
        return 'Pro Addons';
    }

    // Pricing list Settings Fields
    public function get_settings()
    {
        $settings = array(
            'list_items' => array(
                'title' => __('Price List', 'wp-pagebuilder-pro'),
                'type'  => 'repeatable',
                'label' => 'title',
                'std' => array(
                    array(
                        'pricing_position' => 'with_right',
                        'title' => __('Franks Gourmet Grille', 'wp-pagebuilder-pro'),
                        'title_link' => array('link'=>'','window'=>true,'nofolow'=>false),
                        'sub_title' => 'mozarella / garden basil / sea salt / olive oil',
                        'price' => '$25',
                        'discount' => '7$',
                        'add_media' => '0',
                        'alignment' => 'left',
                    ),
                    array(
                      'pricing_position' => 'with_right',
                      'title' => __('Terky Special Grille', 'wp-pagebuilder-pro'),
                      'title_link' => array('link'=>'','window'=>true,'nofolow'=>false),
                      'sub_title' => 'apple / banana basil / coral / nutco',
                      'price' => '$35',
                      'discount' => '10$',
                      'add_media' => '0',
                      'alignment' => 'left',
                    ),
                    array(
                      'pricing_position' => 'with_right',
                      'title' => __('Vegetable and tomato salad', 'wp-pagebuilder-pro'),
                      'title_link' => array('link'=>'','window'=>true,'nofolow'=>false),
                      'sub_title' => 'tomato / carrot basil / chilly / nutco',
                      'price' => '$35',
                      'discount' => '10$',
                      'add_media' => '0',
                      'alignment' => 'left',
                    ),
                ),
                'attr' => array(
                    'pricing_position' => array(
                        'type' => 'select',
                        'title' => __('Pricing Position', 'wp-pagebuilder-pro'),
                        'values' => array(
                            'with_right' => __('Right of title', 'wp-pagebuilder-pro'),
                            'with_left' => __('Left of title', 'wp-pagebuilder-pro'),
                            'with_bottom' => __('Bottom of content', 'wp-pagebuilder-pro'),
                        ),
                        'std' => 'with_right',
                    ),

                    'title' => array(
                        'type' => 'textarea',
                        'title' => __('Item title', 'wp-pagebuilder-pro'),
                        'std' => '1 year customer support',
                    ),
                    'title_link' => array(
                        'type' => 'link',
                        'title' => __('Title URL', 'wp-pagebuilder-pro'),
                        'std' =>   array('link'=>'','window'=>true,'nofolow'=>false),
                    ),
                    'sub_title' => array(
                        'type' => 'textarea',
                        'title' => __('Content', 'wp-pagebuilder-pro'),
                        'std' => '1 year customer support',
                    ),
                    'price' => array(
                        'type' => 'text',
                        'title' => __('Regular Price', 'wp-pagebuilder-pro'),
                        'std' => '$25',
                    ),
                    'discount' => array(
                        'type' => 'text',
                        'title' => __('Discount Price', 'wp-pagebuilder-pro'),
                        'std' => '8$',
                    ),
                    //media
                    'add_media' => array(
                        'type' => 'switch',
                        'title' => __('Add image/icon/number', 'wp-pagebuilder-pro'),
                        'std' => '0',
                    ),
                    'alignment' => array(
                        'type' => 'select',
                        'title' => __('Media Position', 'wp-pagebuilder-pro'),
                        'values' => array(
                            'left' => __('Left', 'wp-pagebuilder-pro'),
                            'right' => __('Right', 'wp-pagebuilder-pro'),
                        ),
                        'std' => 'left',
                        'depends' => array(array('add_media', '=', '1')),
                    ),
                    'media_type' => array(
                        'type' => 'select',
                        'title' => __('Media Type', 'wp-pagebuilder-pro'),
                        'values' => array(
                            'image' => __('Image', 'wp-pagebuilder-pro'),
                            'number' => __('Number', 'wp-pagebuilder-pro'),
                            'icon' => __('Icon', 'wp-pagebuilder-pro'),
                        ),
                        'std' => '',
                        'depends' => array(array('add_media', '=', '1')),
                    ),
                    'media_number' => array(
                        'type' => 'text',
                        'title' => __('Number', 'wp-pagebuilder-pro'),
                        'std' => '1',
                        'depends' => array(array('media_type', '=', 'number')),
                    ),
                    'media_image' => array(
                        'type' => 'media',
                        'title' => __('Image', 'wp-pagebuilder-pro'),
                        'std' => array( 'url' =>  WPPB_PRO_DIR_URL.'assets/img/placeholder/wppb-small.jpg' ),
                        'depends' => array(array('media_type', '=', 'image')),
                    ),
                    'trending_text' => array(
                        'type' => 'text',
                        'title' => __('Treding Batch text', 'wp-pagebuilder-pro'),
                        'std' => 'Hot',
                        'depends' => array(array('media_type', '=', 'image')),
                    ),
                    'media_icon' => array(
                        'type' => 'icon',
                        'title' => __('Icon', 'wp-pagebuilder-pro'),
                        'std' => 'wppb-font-bolt',
                        'depends' => array(array('media_type', '=', 'icon')),
                    ),
                ),
            ),
            'line' => array(
                'type' => 'switch',
                'title' => __('Title Line', 'wp-pagebuilder-pro'),
                'std' => '1'
            ),
            'content_align' => array(
                'type' => 'alignment',
                'title' => __('Content Alignment', 'wp-pagebuilder-pro'),
                'responsive' => true,
                'selector' => '{{SELECTOR}} .wppb-price-list-wrap{ text-align: {{data.content_align}}; }',
            ),

            //title
            'price_list_title_color' => array(
                'type' => 'color',
                'title' => __('Title color', 'wp-pagebuilder-pro'),
                'tab' => 'style',
                'section' => 'Title',
                'selector' => '{{SELECTOR}} .wppb-price-list-title, {{SELECTOR}} .wppb-price-list-title a { color: {{data.price_list_title_color}}; }'
            ),
            'price_list_title_hcolor' => array(
                'type' => 'color',
                'title' => __('Title hover color', 'wp-pagebuilder-pro'),
                'tab' => 'style',
                'section' => 'Title',
                'selector' => '{{SELECTOR}} .wppb-price-list-title:hover, {{SELECTOR}} .wppb-price-list-title a:hover { color: {{data.price_list_title_hcolor}}; }'
            ),
            'price_list_title_fontstyle' => array(
                'type' => 'typography',
                'title' => __('Title Typography', 'wp-pagebuilder-pro'),
                'std' => array(
                    'fontFamily' => '',
                    'fontSize' => array( 'md'=>'20px', 'sm'=>'', 'xs'=>'' ),
                    'lineHeight' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
                    'fontWeight' => '500',
                    'textTransform' => '',
                    'fontStyle' => '',
                    'letterSpacing' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
                ),
                'selector' => '{{SELECTOR}} .wppb-price-list-title',
                'section' => 'Title',
                'tab' => 'style',
            ),
            'title_margin' => array(
                'type' => 'dimension',
                'title' => __('Margin', 'wp-pagebuilder-pro'),
                'tab' => 'style',
                'section' => 'Title',
                'responsive' => true,
                'std' => array(
                    'md' => array( 'top' => '0px', 'right' => '0px', 'bottom' => '0px', 'left' => '0px' ),
                    'sm' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                    'xs' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                ),
                'unit' => array( 'px','em','%' ),
                'selector' => '{{SELECTOR}} .wppb-price-list-head { margin: {{data.title_margin}}; }'
            ),
            'title_padding' => array(
                'type' => 'dimension',
                'title' => __('Padding', 'wp-pagebuilder-pro'),
                'tab' => 'style',
                'section' => 'Title',
                'responsive' => true,
                'std' => array(
                    'md' => array( 'top' => '0px', 'right' => '0px', 'bottom' => '0px', 'left' => '0px' ),
                    'sm' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                    'xs' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                ),
                'unit' => array( 'px','em','%' ),
                'selector' => '{{SELECTOR}} .wppb-price-list-title { padding: {{data.title_padding}}; }'
            ),

            //content
            'price_list_content_color' => array(
                'type' => 'color',
                'title' => __('Content color', 'wp-pagebuilder-pro'),
                'tab' => 'style',
                'section' => 'Content',
                'selector' => '{{SELECTOR}} .wppb-price-list-body { color: {{data.price_list_content_color}}; }'
            ),
            'price_list_content_fontstyle' => array(
                'type' => 'typography',
                'title' => __('Content Typography', 'wp-pagebuilder-pro'),
                'std' => array(
                    'fontFamily' => '',
                    'fontSize' => array( 'md'=>'20px', 'sm'=>'', 'xs'=>'' ),
                    'lineHeight' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
                    'fontWeight' => '500',
                    'textTransform' => '',
                    'fontStyle' => '',
                    'letterSpacing' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
                ),
                'selector' => '{{SELECTOR}} .wppb-price-list-body',
                'section' => 'Content',
                'tab' => 'style',
            ),
            'content_margin' => array(
                'type' => 'dimension',
                'title' => __('Margin', 'wp-pagebuilder-pro'),
                'tab' => 'style',
                'section' => 'Content',
                'responsive' => true,
                'std' => array(
                    'md' => array( 'top' => '0px', 'right' => '0px', 'bottom' => '0px', 'left' => '0px' ),
                    'sm' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                    'xs' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                ),
                'unit' => array( 'px','em','%' ),
                'selector' => '{{SELECTOR}} .wppb-price-list-body { margin: {{data.content_margin}}; }'
            ),
            'content_padding' => array(
                'type' => 'dimension',
                'title' => __('Content Padding', 'wp-pagebuilder-pro'),
                'tab' => 'style',
                'section' => 'Content',
                'responsive' => true,
                'std' => array(
                    'md' => array( 'top' => '0px', 'right' => '0px', 'bottom' => '0px', 'left' => '0px' ),
                    'sm' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                    'xs' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                ),
                'unit' => array( 'px','em','%' ),
                'selector' => '{{SELECTOR}} .wppb-price-list-body { padding: {{data.content_padding}}; }'
            ),
            'content_wrap_padding' => array(
                'type' => 'dimension',
                'title' => __('Content wrapper Padding', 'wp-pagebuilder-pro'),
                'tab' => 'style',
                'section' => 'Content',
                'responsive' => true,
                'std' => array(
                    'md' => array( 'top' => '0px', 'right' => '0px', 'bottom' => '0px', 'left' => '0px' ),
                    'sm' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                    'xs' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                ),
                'unit' => array( 'px','em','%' ),
                'selector' => '{{SELECTOR}} .wppb-price-list-content { padding: {{data.content_wrap_padding}}; }'
            ),

            //Line style
            'line_size' => array(
                'type' => 'slider',
                'title' => __('Line Border Height', 'wp-pagebuilder-pro'),
                'unit' => array( 'px','%','em' ),
                'range' => array(
                    'em' => array(
                        'min' => 0,
                        'max' => 5,
                        'step' => .1,
                    ),
                    'px' => array(
                        'min' => 0,
                        'max' => 30,
                        'step' => 1,
                    ),
                ),
                'std' => array(
                    'md' => '2px',
                    'sm' => '',
                    'xs' => '',
                ),
                'responsive' => true,
                'tab' => 'style',
                'section' => 'Line',
                'depends' => array(array('line', '=', '1')),
                'selector' => '{{SELECTOR}} .wppb-price-list-line { border-bottom-width: {{data.line_size}}; }'
            ),
            'line_type' => array(
                'type' => 'select',
                'title' => __('Line Type', 'wp-pagebuilder-pro'),
                'values' => array(
                    'dotted' => __('Dotted', 'wp-pagebuilder-pro'),
                    'dashed' => __('Dashed', 'wp-pagebuilder-pro'),
                    'groove' => __('Groove', 'wp-pagebuilder-pro'),
                    'double' => __('Double', 'wp-pagebuilder-pro'),
                    'ridge' => __('Ridge', 'wp-pagebuilder-pro'),
                    'solid' => __('Solid', 'wp-pagebuilder-pro'),
                ),
                'std' => 'dashed',
                'section' => 'Line',
                'tab' => 'style',
                'depends' => array(array('line', '=', '1')),
                'selector' => '{{SELECTOR}} .wppb-price-list-line { border-bottom-style: {{data.line_type}}; }'
            ),
            'line_color' => array(
                'type' => 'color',
                'title' => 'Line Color',
                'selector' => '{{SELECTOR}} .wppb-price-list-line { border-bottom-color: {{data.line_color}}; }',
                'tab' => 'style',
                'section' => 'Line',
                'depends' => array(array('line', '=', '1')),
            ),
            'line_margin' => array(
                'type' => 'dimension',
                'title' => __('Line Margin', 'wp-pagebuilder-pro'),
                'tab' => 'style',
                'section' => 'Line',
                'responsive' => true,
                'std' => array(
                    'md' => array( 'top' => '0px', 'right' => '10px', 'bottom' => '0px', 'left' => '10px' ),
                    'sm' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                    'xs' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                ),
                'unit' => array( 'px','em','%' ),
                'depends' => array(array('line', '=', '1')),
                'selector' => '{{SELECTOR}} .wppb-price-list-line { margin: {{data.line_margin}}; }'
            ),
            'line_padding' => array(
                'type' => 'dimension',
                'title' => __('Padding', 'wp-pagebuilder-pro'),
                'tab' => 'style',
                'section' => 'Line',
                'responsive' => true,
                'std' => array(
                    'md' => array( 'top' => '0px', 'right' => '0px', 'bottom' => '0px', 'left' => '0px' ),
                    'sm' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                    'xs' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                ),
                'unit' => array( 'px','em','%' ),
                'depends' => array(array('line', '=', '1')),
                'selector' => '{{SELECTOR}} .wppb-price-list-line { padding: {{data.line_padding}}; }'
            ),

            //price
            'price_list_color' => array(
                'type' => 'color',
                'title' => __('Pricing button color','wp-pagebuilder-pro'),
                'clip' => true,
                'selector' => '{{SELECTOR}} .wppb-price-list-price { color: {{data.price_list_color}}; }',
                'tab' => 'style',
                'section' =>'Price',
            ),
            'pricing_fontstyle' => array(
                'type' => 'typography',
                'title' => __('Pricing Typography', 'wp-pagebuilder-pro'),
                'std' => array(
                    'fontFamily' => '',
                    'fontSize' => array( 'md'=>'16px', 'sm'=>'', 'xs'=>'' ),
                    'lineHeight' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
                    'fontWeight' => '600',
                    'textTransform' => '',
                    'fontStyle' => '',
                    'letterSpacing' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
                ),
                'selector' => '{{SELECTOR}} .wppb-price-list-price',
                'tab' => 'style',
                'section' =>'Price',
            ),
            'price_margin' => array(
                'type' => 'dimension',
                'title' => __('Margin','wp-pagebuilder-pro'),
                'tab' => 'style',
                'section' => 'Price',
                'responsive' => true,
                'std' => array(
                    'md' => array( 'top' => '0px', 'right' => '0px', 'bottom' => '0px', 'left' => '5px' ),
                    'sm' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                    'xs' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                ),
                'unit' => array( 'px','em','%' ),
                'selector' => '{{SELECTOR}} .wppb-price-list-price { margin: {{data.price_margin}}; }'
            ),

            //Discount
            'dis_price_list_color' => array(
                'type' => 'color',
                'title' => __('Discount price color','wp-pagebuilder-pro'),
                'clip' => true,
                'selector' => '{{SELECTOR}} .wppb-price-list-discount { color: {{data.dis_price_list_color}}; }',
                'tab' => 'style',
                'section' =>'Discount Price',
            ),
            'dis_pricing_fontstyle' => array(
                'type' => 'typography',
                'title' => __('Discount Price Typography', 'wp-pagebuilder-pro'),
                'std' => array(
                    'fontFamily' => '',
                    'fontSize' => array( 'md'=>'16px', 'sm'=>'', 'xs'=>'' ),
                    'lineHeight' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
                    'fontWeight' => '600',
                    'textTransform' => '',
                    'fontStyle' => '',
                    'letterSpacing' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
                ),
                'selector' => '{{SELECTOR}} .wppb-price-list-discount',
                'tab' => 'style',
                'section' =>'Discount Price',
            ),
            'dis_price_margin' => array(
                'type' => 'dimension',
                'title' => __('Margin', 'wp-pagebuilder-pro'),
                'tab' => 'style',
                'section' => 'Discount Price',
                'responsive' => true,
                'std' => array(
                    'md' => array( 'top' => '0px', 'right' => '5px', 'bottom' => '0px', 'left' => '0px' ),
                    'sm' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                    'xs' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                ),
                'unit' => array( 'px','em','%' ),
                'selector' => '{{SELECTOR}} .wppb-price-list-discount { margin: {{data.dis_price_margin}}; }'
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
                    'md' => '48px',
                    'sm' => '',
                    'xs' => '',
                ),
                'responsive' => true,
                'tab' => 'style',
                'section' => 'Icon',
                'selector' => '{{SELECTOR}} .wppb-price-list-icon i { font-size: {{data.icon_size}}; }'
            ),
            'icon_line_height' => array(
                'type' => 'slider',
                'title' => __('Line Height', 'wp-pagebuilder-pro'),
                'unit' => array( 'px','%','em' ),
                'responsive' => true,
                'max' => 300,
                'section' => 'Icon',
                'tab' => 'style',
                'selector' =>'{{SELECTOR}} .wppb-price-list-icon i { line-height: {{data.icon_line_height}}; }'
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
                'selector' => '{{SELECTOR}} .wppb-price-list-icon { width: {{data.icon_width}}; }'
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
                'selector' => '{{SELECTOR}} .wppb-price-list-icon { height: {{data.icon_height}}; }',
            ),
            'icon_color' => array(
                'type' => 'color',
                'title' => __('Color','wp-pagebuilder-pro'),
                'clip' => true,
                'selector' => '{{SELECTOR}} .wppb-price-list-icon i { color: {{data.icon_color}}; }',
                'tab' => 'style',
                'section' => 'Icon',
            ),
            'icon_hcolor' => array(
                'type' => 'color',
                'title' => __('Hover Color','wp-pagebuilder-pro'),
                'clip' => true,
                'selector' => '{{SELECTOR}} .wppb-price-list-wrap:hover .wppb-price-list-icon i { color: {{data.icon_hcolor}}; }',
                'tab' => 'style',
                'section' => 'Icon',
            ),

            'icon_bg' => array(
                'type' => 'color',
                'title' => __('background','wp-pagebuilder-pro'),
                'clip' => false,
                'selector' => '{{SELECTOR}} .wppb-price-list-icon { background: {{data.icon_bg}}; }',
                'tab' => 'style',
                'section' => 'Icon',
            ),

            'icon_hover_bg' => array(
                'type' => 'color',
                'title' => __('hover background','wp-pagebuilder-pro'),
                'clip' => false,
                'selector' => '{{SELECTOR}} .wppb-price-list-wrap:hover .wppb-price-list-icon { background: {{data.icon_hover_bg}}; }',
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
                'selector' => '{{SELECTOR}} .wppb-price-list-icon'
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
                'selector' => '{{SELECTOR}} .wppb-price-list-wrap:hover .wppb-price-list-icon'
            ),
            'icon_boxshadow' => array(
                'type' => 'boxshadow',
                'title' => __('Box shadow','wp-pagebuilder-pro'),
                'std' => array(
                    'shadowValue' => array( 'top' => '2px', 'right' => '2px', 'bottom' => '2px', 'left' => '2px' ),
                    'shadowColor' => '#ffffff'
                ),
                'selector' => '{{SELECTOR}} .wppb-price-list-icon',
                'tab' => 'style',
                'section' => 'Icon',
            ),
            'icon_hboxshadow' => array(
                'type' => 'boxshadow',
                'title' => __('Hover box shadow','wp-pagebuilder-pro'),
                'std' => array(
                    'shadowValue' => array( 'top' => '2px', 'right' => '2px', 'bottom' => '2px', 'left' => '2px' ),
                    'shadowColor' => '#ffffff'
                ),
                'selector' => '{{SELECTOR}} .wppb-price-list-wrap:hover .wppb-price-list-icon',
                'tab' => 'style',
                'section' => 'Icon',
            ),

            'icon_radius' => array(
                'type' => 'dimension',
                'title' => __('Border radius', 'wp-pagebuilder-pro'),
                'tab' => 'style',
                'section' => 'Icon',
                'responsive' => true,
                'std' => array(
                    'md' => array( 'top' => '0px', 'right' => '15px', 'bottom' => '0px', 'left' => '0px' ),
                    'sm' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                    'xs' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                ),
                'unit' => array( 'px','em','%' ),
                'selector' => '{{SELECTOR}} .wppb-price-list-icon { border-radius: {{data.icon_radius}}; }'
            ),
            'icon_margin' => array(
                'type' => 'dimension',
                'title' => __('Margin', 'wp-pagebuilder-pro'),
                'tab' => 'style',
                'section' => 'Icon',
                'responsive' => true,
                'std' => array(
                    'md' => array( 'top' => '0px', 'right' => '15px', 'bottom' => '0px', 'left' => '0px' ),
                    'sm' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                    'xs' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                ),
                'unit' => array( 'px','em','%' ),
                'selector' => '{{SELECTOR}} .wppb-price-list-icon { margin: {{data.icon_margin}}; }'
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
                'responsive' => true,
                'tab' => 'style',
                'section' => 'Image',
                'selector' => '{{SELECTOR}} .wppb-price-list-img img { width: {{data.image_width}}; }'
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
                'responsive' => true,
                'tab' => 'style',
                'section' => 'Image',
                'selector' => '{{SELECTOR}} .wppb-price-list-img img { height: {{data.image_height}}; }',
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
                'selector' => '{{SELECTOR}} .wppb-price-list-img img'
            ),
            'image_border_hcolor' => array(
                'type' => 'border',
                'title' => __('hover color','wp-pagebuilder-pro'),
                'std' => array(
                    'borderWidth' => array( 'top' => '2px', 'right' => '2px', 'bottom' => '2px', 'left' => '2px' ),
                    'borderStyle' => 'solid',
                    'borderColor' => '#cccccc'
                ),
                'tab' => 'style',
                'section' => 'Image',
                'selector' => '{{SELECTOR}} .wppb-price-list-wrap:hover .wppb-price-list-img img'
            ),
            'image_boxshadow' => array(
                'type' => 'boxshadow',
                'title' => __('Box shadow','wp-pagebuilder-pro'),
                'std' => array(
                    'shadowValue' => array( 'top' => '2px', 'right' => '2px', 'bottom' => '2px', 'left' => '2px' ),
                    'shadowColor' => '#ffffff'
                ),
                'selector' => '{{SELECTOR}} .wppb-price-list-img img',
                'tab' => 'style',
                'section' => 'Image',
            ),
            'image_hboxshadow' => array(
                'type' => 'boxshadow',
                'title' => __('Hover box shadow','wp-pagebuilder-pro'),
                'std' => array(
                    'shadowValue' => array( 'top' => '2px', 'right' => '2px', 'bottom' => '2px', 'left' => '2px' ),
                    'shadowColor' => '#ffffff'
                ),
                'selector' => '{{SELECTOR}} .wppb-price-list-wrap:hover .wppb-price-list-img img',
                'tab' => 'style',
                'section' => 'Image',
            ),
            'image_radius' => array(
                'type' => 'slider',
                'title' => __('Border radius', 'wp-pagebuilder-pro'),
                'unit' => array( '%','px','em' ),
                'responsive' => true,
                'tab' => 'style',
                'section' => 'Image',
                'selector' => '{{SELECTOR}} .wppb-price-list-img img { border-radius: {{data.image_radius}}; }'
            ),
            'image_margin' => array(
                'type' => 'dimension',
                'title' => __('Margin', 'wp-pagebuilder-pro'),
                'tab' => 'style',
                'section' => 'Image',
                'responsive' => true,
                'std' => array(
                    'md' => array( 'top' => '0px', 'right' => '15px', 'bottom' => '0px', 'left' => '0px' ),
                    'sm' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                    'xs' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                ),
                'unit' => array( 'px','em','%' ),
                'selector' => '{{SELECTOR}} .wppb-price-list-img { margin: {{data.image_margin}}; }'
            ),


            // number
            'number_fontstyle' => array(
                'type' => 'typography',
                'title' => __('Typography', 'wp-pagebuilder-pro'),
                'std' => array(
                    'fontFamily' => '',
                    'fontSize' => array( 'md'=>'16px', 'sm'=>'', 'xs'=>'' ),
                    'lineHeight' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
                    'fontWeight' => '600',
                    'textTransform' => '',
                    'fontStyle' => '',
                    'letterSpacing' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
                ),
                'selector' => '{{SELECTOR}} .wppb-price-list-number span',
                'tab' => 'style',
                'section' => 'Number',
            ),
            'number_width' => array(
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
                'section' => 'Number',
                'selector' => '{{SELECTOR}} .wppb-price-list-number span { width: {{data.number_width}}; }'
            ),
            'number_height' => array(
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
                'section' => 'Number',
                'selector' => '{{SELECTOR}} .wppb-price-list-number span { height: {{data.number_height}}; }',
            ),
            'number_color' => array(
                'type' => 'color',
                'title' => 'Color',
                'clip' => true,
                'selector' => '{{SELECTOR}} .wppb-price-list-number span { color: {{data.number_color}}; }',
                'tab' => 'style',
                'section' => 'Number',
            ),
            'number_hcolor' => array(
                'type' => 'color',
                'title' => __('Hover Color','wp-pagebuilder-pro'),
                'clip' => true,
                'selector' => '{{SELECTOR}} .wppb-price-list-wrap:hover .wppb-price-list-number span { color: {{data.number_hcolor}}; }',
                'tab' => 'style',
                'section' => 'Number',
            ),

            'number_bg' => array(
                'type' => 'color',
                'title' => __('Background','wp-pagebuilder-pro'),
                'clip' => false,
                'selector' => '{{SELECTOR}} .wppb-price-list-number span { background: {{data.number_bg}}; }',
                'tab' => 'style',
                'section' => 'Number',
            ),

            'number_hover_bg' => array(
                'type' => 'color',
                'title' => __('Hover Background','wp-pagebuilder-pro'),
                'clip' => false,
                'selector' => '{{SELECTOR}} .wppb-price-list-wrap:hover .wppb-price-list-number span { background: {{data.number_hover_bg}}; }',
                'tab' => 'style',
                'section' => 'Number',
            ),

            'number_border' => array(
                'type' => 'border',
                'title' => __('Border','wp-pagebuilder-pro'),
                'std' => array(
                    'borderWidth' => array( 'top' => '2px', 'right' => '2px', 'bottom' => '2px', 'left' => '2px' ),
                    'borderStyle' => 'solid',
                    'borderColor' => '#cccccc'
                ),
                'tab' => 'style',
                'section' => 'Number',
                'selector' => '{{SELECTOR}} .wppb-price-list-number span'
            ),
            'number_border_hcolor' => array(
                'type' => 'border',
                'title' => __('hover color','wp-pagebuilder-pro'),
                'std' => array(
                    'borderWidth' => array( 'top' => '2px', 'right' => '2px', 'bottom' => '2px', 'left' => '2px' ),
                    'borderStyle' => 'solid',
                    'borderColor' => '#cccccc'
                ),
                'tab' => 'style',
                'section' => 'Number',
                'selector' => '{{SELECTOR}} .wppb-price-list-wrap:hover .wppb-price-list-number span'
            ),
            'number_boxshadow' => array(
                'type' => 'boxshadow',
                'title' => __('Box shadow','wp-pagebuilder-pro'),
                'std' => array(
                    'shadowValue' => array( 'top' => '2px', 'right' => '2px', 'bottom' => '2px', 'left' => '2px' ),
                    'shadowColor' => '#ffffff'
                ),
                'selector' => '{{SELECTOR}} .wppb-price-list-number span',
                'tab' => 'style',
                'section' => 'Number',
            ),
            'number_hboxshadow' => array(
                'type' => 'boxshadow',
                'title' => __('Hover box shadow','wp-pagebuilder-pro'),
                'std' => array(
                    'shadowValue' => array( 'top' => '2px', 'right' => '2px', 'bottom' => '2px', 'left' => '2px' ),
                    'shadowColor' => '#ffffff'
                ),
                'selector' => '{{SELECTOR}} .wppb-price-list-wrap:hover .wppb-price-list-number span',
                'tab' => 'style',
                'section' => 'Number',
            ),
            'number_radius' => array(
                'type' => 'dimension',
                'title' => __('Border radius', 'wp-pagebuilder-pro'),
                'tab' => 'style',
                'section' => 'Number',
                'responsive' => true,
                'std' => array(
                    'md' => array( 'top' => '0px', 'right' => '0px', 'bottom' => '0px', 'left' => '0px' ),
                    'sm' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                    'xs' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                ),
                'unit' => array( 'px','em','%' ),
                'selector' => '{{SELECTOR}} .wppb-price-list-number span { border-radius: {{data.number_radius}}; }'
            ),
            'number_margin' => array(
                'type' => 'dimension',
                'title' => __('Margin', 'wp-pagebuilder-pro'),
                'tab' => 'style',
                'section' => 'Number',
                'responsive' => true,
                'std' => array(
                    'md' => array( 'top' => '0px', 'right' => '15px', 'bottom' => '0px', 'left' => '0px' ),
                    'sm' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                    'xs' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                ),
                'unit' => array( 'px','em','%' ),
                'selector' => '{{SELECTOR}} .wppb-price-list-number span { margin: {{data.number_margin}}; }'
            ),

            //trending
            'trending_fontstyle' => array(
                'type' => 'typography',
                'title' => __('Typography', 'wp-pagebuilder-pro'),
                'std' => array(
                    'fontFamily' => '',
                    'fontSize' => array( 'md'=>'16px', 'sm'=>'', 'xs'=>'' ),
                    'lineHeight' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
                    'fontWeight' => '600',
                    'textTransform' => '',
                    'fontStyle' => '',
                    'letterSpacing' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
                ),
                'selector' => '{{SELECTOR}} .wppb-price-trending',
                'tab' => 'style',
                'section' => 'Trending',
            ),
            'trending_color' => array(
                'type' => 'color',
                'title' => __('Trending Color','wp-pagebuilder-pro'),
                'selector' => '{{SELECTOR}} .wppb-price-trending { color: {{data.trending_color}}; }',
                'tab' => 'style',
                'std' => '#fff',
                'section' => 'Trending',
            ),
            'trending_bg' => array(
                'type' => 'color',
                'title' => __('Trending Background','wp-pagebuilder-pro'),
                'std' => '#dc0f0f',
                'selector' => '{{SELECTOR}} .wppb-price-trending { background: {{data.trending_bg}}; }',
                'tab' => 'style',
                'section' => 'Trending',
            ),
            'trending_radius' => array(
                'type'      => 'dimension',
                'title'     => __('Border Radius', 'wp-pagebuilder-pro'),
                'tab'       => 'style',
                'section'   => 'Trending',
                'responsive' => true,
                'unit'      => array( 'px','em','%' ),
                'std' => array(
                    'md' => array( 'top' => '2px', 'right' => '2px', 'bottom' => '2px', 'left' => '2px' ),
                    'sm' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                    'xs' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                ),
                'selector'  => '{{SELECTOR}} .wppb-price-trending { border-radius: {{data.trending_radius}}; }'
            ),
            'trending_padding' => array(
                'type'      => 'dimension',
                'title'     => __('Padding', 'wp-pagebuilder-pro'),
                'tab'       => 'style',
                'section'   => 'Trending',
                'responsive' => true,
                'unit'      => array( 'px','em','%' ),
                'std' => array(
                    'md' => array( 'top' => '2px', 'right' => '10px', 'bottom' => '2px', 'left' => '10px' ),
                    'sm' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                    'xs' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                ),
                'selector'  => '{{SELECTOR}} .wppb-price-trending { padding: {{data.trending_padding}}; }'
            ),

            // wrapper
            'wrap_list_btn_bg' => array(
                'type' => 'background',
                'title' => __('Wrap background','wp-pagebuilder-pro'),
                'clip' => false,
                'selector' => '{{SELECTOR}} .wppb-price-list-wrap',
                'tab' => 'style',
                'section' => 'Wrapper',
            ),
            'wrap_border_radius' => array(
                'type' => 'dimension',
                'title' => __('Border Radius', 'wp-pagebuilder-pro'),
                'tab' => 'style',
                'section' => 'Wrapper',
                'responsive' => true,
                'unit' => array( 'px','em','%' ),
                'selector' => '{{SELECTOR}} .wppb-price-list-wrap { border-radius: {{data.wrap_border_radius}}; }'
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
                'selector' => '{{SELECTOR}} .wppb-price-list-wrap'
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
                'selector' => '{{SELECTOR}} .wppb-price-list-wrap:hover'
            ),
            'wrap_boxshadow' => array(
                'type' => 'boxshadow',
                'title' => __('Box shadow','wp-pagebuilder-pro'),
                'std' => array(
                    'shadowValue' => array( 'top' => '2px', 'right' => '2px', 'bottom' => '2px', 'left' => '2px' ),
                    'shadowColor' => '#ffffff'
                ),
                'selector' => '{{SELECTOR}} .wppb-price-list-wrap',
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
                'selector' => '{{SELECTOR}} .wppb-price-list-wrap:hover',
                'tab' => 'style',
                'section' => 'Wrapper',
            ),
            'wrap_margin' => array(
                'type'      => 'dimension',
                'title'     => __('Margin', 'wp-pagebuilder-pro'),
                'tab'       => 'style',
                'section'   => 'Wrapper',
                'responsive' => true,
                'unit'      => array( 'px','em','%' ),
                'std' => array(
                  'md' => array( 'top' => '0px', 'right' => '0px', 'bottom' => '20px', 'left' => '0px' ),
                  'sm' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                  'xs' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ), 
                ),
                'selector'  => '{{SELECTOR}} .wppb-price-list-wrap { margin: {{data.wrap_margin}}; }'
            ),
            'wrap_padding' => array(
                'type'      => 'dimension',
                'title'     => __('Padding', 'wp-pagebuilder-pro'),
                'tab'       => 'style',
                'section'   => 'Wrapper',
                'responsive' => true,
                'unit'      => array( 'px','em','%' ),
                'selector'  => '{{SELECTOR}} .wppb-price-list-wrap { padding: {{data.wrap_padding}}; }'
            ),

        );
        return $settings;
    }

    // pricing list Render HTML
    public function render($data = null)
    {
        $settings 	= $data['settings'];
        $line 		  = isset($settings['line']) ? $settings['line'] : '';
        $list_items = isset($settings["list_items"]) ? $settings["list_items"] : array();
        $output	= $media = $line_style_output = '';

        $output  .= '<div class="wppb-price-list-addon">';
        $output  .= '<div class="wppb-price-list-addon-content">';
        if (is_array($list_items) && count($list_items)) {
            foreach ($list_items as $key => $value) {

                //title url
                if (get_wppb_array_value_by_key($value, 'title_link')['link']) {
                    $target = get_wppb_array_value_by_key($value, 'title_link')['window'] ? "target=_blank" : "target=_self";
                    $nofolow = get_wppb_array_value_by_key($value, 'title_link')['nofolow'] ? "rel=nofolow" : "";
                }
                if ( get_wppb_array_value_by_key($value, 'title_link')['link']) {
                    $_title = $value["title"] ? '<span class="wppb-price-list-title"><a '.esc_attr($nofolow).' href="'.esc_url($value['title_link']['link']).'" '.esc_attr($target).'>'.$value["title"].'</a></span>' : '';
                } else {
                    $_title = $value["title"] ? '<span class="wppb-price-list-title">'.$value["title"].'</span>' : '';
                }

                $_sub_title  = ! empty($value["sub_title"]) ? '<div class="wppb-price-list-body">'.$value["sub_title"].'</div>' : '';
                $_price  = ! empty($value["price"]) ? '<span class="wppb-price-list-price">'.$value["price"].'</span>' : '';
                $_discount  = ! empty($value["discount"]) ? '<span class="wppb-price-list-discount">'.$value["discount"].'</span>' : '';
                $_pricing_position  = ! empty($value["pricing_position"]) ? $value["pricing_position"] : 'with_right';
                $_alignment  = $value["alignment"] ? $value["alignment"] : 'left';
                $_media_type  = ! empty($value["media_type"]) ? $value["media_type"] : '';

                //media
                if ($_media_type == 'image') {
                    if (! empty($value['media_image']['url'])) {
                        $img_url = $value['media_image']['url'];
                        if (! empty($value["trending_text"])) {
                            $media = $value["media_image"]["url"] ? '<div class="wppb-price-list-media wppb-price-list-img"><span class="wppb-price-trending">'.$value["trending_text"].'</span><img src="'.esc_url($img_url).'"/></div>' : '';
                        } else {
                            $media = $value["media_image"]["url"] ? '<div class="wppb-price-list-media wppb-price-list-img"><img src="'.esc_url($img_url).'"/></div>' : '';
                        }
                    }
                } elseif ($_media_type == 'icon') {
                    if (! empty($value["media_icon"])) {
                        $media = $value["media_icon"] ? '<div class="wppb-price-list-media wppb-price-list-icon"><i class="' . esc_attr($value["media_icon"]) . '"></i></div>' : '';
                    }
                } else {
                    if (! empty($value["media_number"])) {
                        $media = $value["media_number"] ? '<div class="wppb-price-list-media wppb-price-list-number"><span>'.esc_attr($value["media_number"]).'</span></div>' : '';
                    }
                }

                // line
                if ($line) {
                    if ($_pricing_position == 'with_bottom') {
                        $line_style_output  = $line ? '<span class="wppb-price-list-line wppb-line-title-bottom"></span>' : '';
                    } else {
                        $line_style_output  = $line ? '<span class="wppb-price-list-line"></span>' : '';
                    }
                }

                $output  .= '<div class="wppb-price-list-item repeater-'.$key.'">';

                $output  .= '<div class="wppb-price-list-wrap wppb-price-align-'.$_alignment.' wppb-price-list-'.$_pricing_position.'">';
                if (($_alignment == 'left')) {
                    $output  .= $media;
                }
                $output  .= '<div class="wppb-price-list-content">';
                $output  .= '<div class="wppb-price-list-head">';
                if ($_pricing_position == 'with_right') {
                    $output  .= $_title;
                    $output  .= $line_style_output;
                    $output  .= '<span class="wppb-pricelist-price-content">'.$_discount.$_price.'</span>';
                }
                if ($_pricing_position == 'with_left') {
                    $output  .= '<span class="wppb-pricelist-price-content">'.$_discount.$_price.'</span>';
                    $output  .= $line_style_output;
                    $output  .= $_title;
                }
                $output  .= '</div>';//wppb-price-list-head
                if ($_pricing_position != 'with_bottom') {
                    $output  .= $_sub_title;
                }
                if ($_pricing_position == 'with_bottom') {
                    $output  .= $_title;
                    $output  .= $line_style_output;
                    $output  .= $_sub_title;
                    $output  .= '<span class="wppb-pricelist-price-content">'.$_discount.$_price.'</span>';
                }
                $output  .= '</div>';//wppb-price-list-content
                if ($_alignment == 'right') {
                    $output  .= $media;
                }
                $output  .= '</div>';//wppb-price-list-wrap

                $output  .= '</div>';//wppb-price-list-item
            }
        }
        $output  .= '</div>'; //wppb-price-list-addon-content
        $output  .= '</div>';//wppb-price-list-addon

        return $output;
    }


    // Price List Template
    public function getTemplate()
    {
        $output = '
    <div class="wppb-price-list-addon">
      <div class="wppb-price-list-addon-content">
        <#  __.forEach(data.list_items, function(value, key) { #>
          <div class="wppb-price-list-item repeater-{{key}}">

              <# if( value.title_link && value.title_link.link ){
                var title =  value.title ? "<span class=\'wppb-price-list-title\'><a href=\'"+value.title_link.link+"\'>"+value.title+"</a></span>" : " " 
                } else {
                	var title =  value.title ? "<span class=\'wppb-price-list-title\'>"+value.title+"</span>" : " "
              } 
              var sub_title =  value.sub_title ? "<div class=\'wppb-price-list-body\'>"+value.sub_title+"</div>" : " "
              var price =  value.price ? "<span class=\'wppb-price-list-price\'>"+value.price+"</span>" : " "
              var discount = value.discount ? "<span class=\'wppb-price-list-discount\'>"+value.discount+"</span>" : " "
              var pricing_position =  value.pricing_position ? value.pricing_position : "with_right"
              var alignment =  value.alignment ? value.alignment : "left"
              var media_type =  value.media_type ? value.media_type : ""

              if ( media_type == "image" ) {
                if ( value.media_image && value.media_image.url ) {
                  var img_url = value.media_image.url;
                  if( value.trending_text ) {
                    var media = value.media_image.url ? "<div class=\'wppb-price-list-media wppb-price-list-img\'><span class=\'wppb-price-trending\'>"+value.trending_text+"</span><img src=\'"+img_url+"\'/></div>" : " ";
                  } else {
                    var media = value.media_image.url ? "<div class=\'wppb-price-list-media wppb-price-list-img\'><img src=\'"+img_url+"\'/></div>" : " ";
                  }
                }

              } else if ( media_type == "icon" ) {
                if( value.media_icon ) {
                  var media =  value.media_icon ? "<div class=\'wppb-price-list-media wppb-price-list-icon\'><i class=\'"+value.media_icon+"\'></i></div>" : " ";
                }
              } else { 
                if( value.media_number ) {
                  var media = value.media_number ? "<div class=\'wppb-price-list-media wppb-price-list-number\'><span>"+value.media_number+"</span></div>" : " ";
                }
              }

              if(  data.line  ){
                if( pricing_position == "with_bottom" ) {
                  var line_style_output  = data.line ? "<span class=\'wppb-price-list-line wppb-line-title-bottom\'></span>" : " ";
                } else{
                  var line_style_output  = data.line ? "<span class=\'wppb-price-list-line\'></span>" : " ";
                }
              }
              #>

              <div class="wppb-price-list-wrap wppb-price-align-{{alignment}} wppb-price-list-{{pricing_position}}">

                  <# if( ( alignment == "left" ) ){ #>
                    {{{media}}}
                  <# } #>
                  <div class="wppb-price-list-content">
                      <div class="wppb-price-list-head">
                          <# if( pricing_position == "with_right" ) { #>
                            {{{title}}}
                            {{{line_style_output}}}
                              <span class="wppb-pricelist-price-content">{{{discount}}}{{{price}}}</span>
                          <# } #>
                          <# if( pricing_position == "with_left" ) { #>
                            <span class="wppb-pricelist-price-content">{{{discount}}}{{{price}}}</span>
                            {{{line_style_output}}}
                            {{{title}}}
                          <# } #>
                      </div>
                      <# if( pricing_position != "with_bottom" ) { #>
                        {{{sub_title}}}
                      <# } #>
                      <# if( pricing_position == "with_bottom" ) { #>
                        {{{title}}}
                        {{{line_style_output}}}
                        {{{sub_title}}}
                          <span class="wppb-pricelist-price-content">{{{discount}}}{{{price}}}</span>
                      <# } #>
                  </div>
                  <# if( alignment == "right" ){ #>
                    {{{media}}}
                  <# } #>
              </div>
          </div>
        <# }); #>
      </div>
    </div>
		';
        return $output;
    }
}
