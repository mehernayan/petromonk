<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class WPPB_Addon_Table{

    public function get_name(){
        return 'wppb_table';
    }
    public function get_title(){
        return 'Table';
    }
    public function get_icon() {
        return 'wppb-font-blog-template';
    }
    public function get_category_name(){
        return 'Pro Addons';
    }

    // Table Settings Fields
    public function get_settings() {
        $settings = array(
            'table_items' => array(
                'title' => __('Table Items','wp-pagebuilder-pro'),
                'labelDefault' => 'Row',
                'type'  => 'repeatable',
                'std' => array(
                    array(
                        'column' => array(
                            array( 'title' => 'Head 1' ),
                            array( 'title' => 'Head 2' ),
                            array( 'title' => 'Head 3' ),
                        )
                    ),
                    array(
                        'column' => array(
                            array( 'title' => 'Column 11' ),
                            array( 'title' => 'Column 12' ),
                            array( 'title' => 'Column 13' ),
                        )
                    ),
                    array(
                        'column' => array(
                            array( 'title' => 'Column 21' ),
                            array( 'title' => 'Column 22' ),
                            array( 'title' => 'Column 23' ),
                        )
                    ),
                ),
                'attr' => array(
                    'column' => array(
                        'title' => __('Column Text', 'wp-pagebuilder-pro'),
                        'type' => 'repeatable',
                        'label' => 'title',
                        'attr' => array(
                            'title' => array(
                                'type' => 'text',
                                'title' => __('Title','wp-pagebuilder-pro'),
                                'std' => '',
                            ),
                            'title_link' => array(
                                'type' => 'link',
                                'title' => __('Title URL','wp-pagebuilder-pro'),
                                'std' =>   array('link'=>'','window'=>true,'nofolow'=>false),
                            ),
                            'sub_title' => array(
                                'type' => 'textarea',
                                'title' => __('Sub Title','wp-pagebuilder-pro'),
                                'std' => '',
                            ),
                            'span' => array(
                                'type' => 'switch',
                                'title' => __('Span','wp-pagebuilder-pro'),
                                'std' => 0,
                            ),
                            'col_span' => array(
                                'type' => 'number',
                                'title' => __('Column Span','wp-pagebuilder-pro'),
                                'std' => 1,
                                'depends' => array(array('span', '=', '1' )),
                            ),
                            'row_span' => array(
                                'type' => 'number',
                                'title' => __('Row Span','wp-pagebuilder-pro'),
                                'std' => 1,
                                'depends' => array(array('span', '=', '1' )),
                            ),
                            'custom_style' => array(
                                'type' => 'switch',
                                'title' => __('Custom Style','wp-pagebuilder-pro'),
                                'std' => 0,
                            ),
                            'custom_color' => array(
                                'type' => 'color',
                                'title' => __('Custom color','wp-pagebuilder-pro'),
                                'depends' => array(array('custom_style', '=', '1' )),
                                'selector' => '{{SELECTOR}}.wppb-table-title-wrap .wppb-table-title,{{SELECTOR}}.wppb-table-title-wrap .wppb-table-title a, {{SELECTOR}}.wppb-table-title-wrap .wppb-table-subtitle { color: {{data.custom_color}}; }'
                            ),
                            'custom_background' => array(
                                'type' => 'color',
                                'title' => __('Custom background','wp-pagebuilder-pro'),
                                'depends' => array(array('custom_style', '=', '1' )),
                                'selector' => '{{SELECTOR}}.wppb-table-title-wrap  { background: {{data.custom_background}} !important; }'
                            ),
                            'custom_hover_background' => array(
                                'type' => 'color',
                                'title' => __('Custom hover background','wp-pagebuilder-pro'),
                                'depends' => array(array('custom_style', '=', '1' )),
                                'selector' => '{{SELECTOR}}.wppb-table-title-wrap:hover  { background: {{data.custom_hover_background}} !important; }'
                            ),
                        ),
                    ),
                ),
            ),

            'content_head_align' => array(
                'type' => 'alignment',
                'title' => __('Head Content Alignment','wp-pagebuilder-pro'),
                'responsive' => true,
                'selector' => '{{SELECTOR}} .wppb-table-item-wrap .wppb-table-item th { text-align: {{data.content_head_align}} !important; }',
            ),
            'content_body_align' => array(
                'type' => 'alignment',
                'title' => __('Body Content Alignment','wp-pagebuilder-pro'),
                'responsive' => true,
                'selector' => '{{SELECTOR}} .wppb-table-item-wrap .wppb-table-item td { text-align: {{data.content_body_align}} !important; }',
            ),


            //Head
            'head_title_color' => array(
                'type' => 'color',
                'title' => __('Title color','wp-pagebuilder-pro'),
                'tab' => 'style',
                'section' => 'Head',
                'selector' => '{{SELECTOR}} .wppb-table-item-head tr .wppb-table-title, {{SELECTOR}} .wppb-table-item-head tr .wppb-table-title a { color: {{data.head_title_color}}; }'
            ),
            'head_title_hover_color' => array(
                'type' => 'color',
                'title' => __('Title hover color','wp-pagebuilder-pro'),
                'tab' => 'style',
                'section' => 'Head',
                'selector' => '{{SELECTOR}} .wppb-table-item-head tr .wppb-table-title a:hover, {{SELECTOR}} .wppb-table-item-head tr .wppb-table-title:hover { color: {{data.head_title_hover_color}}; }'
            ),
            'sub_head_title_color' => array(
                'type' => 'color',
                'title' => __('Sub title color','wp-pagebuilder-pro'),
                'tab' => 'style',
                'section' => 'Head',
                'selector' => '{{SELECTOR}} .wppb-table-item-head tr .wppb-table-subtitle { color: {{data.sub_head_title_color}}; }'
            ),
            'head_background_color' => array(
                'type' => 'color',
                'title' => __('Background color','wp-pagebuilder-pro'),
                'tab' => 'style',
                'section' => 'Head',
                'selector' => '{{SELECTOR}} .wppb-table-item-head tr th { background: {{data.head_background_color}}; }'
            ),
            'head_background_hover_color' => array(
                'type' => 'color',
                'title' => __('Background hover color','wp-pagebuilder-pro'),
                'tab' => 'style',
                'section' => 'Head',
                'selector' => '{{SELECTOR}} .wppb-table-item-head tr th:hover { background: {{data.head_background_hover_color}}; }'
            ),
            'head_title_style' => array(
                'type' => 'typography',
                'title' => __('Title Typography','wp-pagebuilder-pro'),
                'std' => array(
                    'fontFamily' => '',
                    'fontSize' => array( 'md'=>'14px', 'sm'=>'', 'xs'=>'' ),
                    'lineHeight' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
                    'fontWeight' => '700',
                    'textTransform' => '',
                    'fontStyle' => '',
                    'letterSpacing' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
                ),
                'tab' => 'style',
                'selector' => '{{SELECTOR}} .wppb-table-item-head .wppb-table-title',
                'section' => 'Head',
            ),
            'sub_head_title_style' => array(
                'type' => 'typography',
                'title' => __('Sub Title Typography','wp-pagebuilder-pro'),
                'std' => array(
                    'fontFamily' => '',
                    'fontSize' => array( 'md'=>'14px', 'sm'=>'', 'xs'=>'' ),
                    'lineHeight' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
                    'fontWeight' => '700',
                    'textTransform' => '',
                    'fontStyle' => '',
                    'letterSpacing' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
                ),
                'tab' => 'style',
                'selector' => '{{SELECTOR}} .wppb-table-item-head tr .wppb-table-subtitle',
                'section' => 'Head',
            ),
            'header_border' => array(
                'type' => 'border',
                'title' => __('Head Border','wp-pagebuilder-pro'),
                'std' => array(
                    'itemOpenBorder' => 1,
                    'borderWidth' => array( 'top' => '1px', 'right' => '1px', 'bottom' => '1px', 'left' => '1px' ),
                    'borderStyle' => 'solid',
                    'borderColor' => '#e5e5e5'
                ),
                'tab' => 'style',
                'section' => 'Head',
                'selector' => '{{SELECTOR}} th.wppb-table-title-wrap'
            ),
            'head_padding' => array(
                'type'      => 'dimension',
                'title'     => __('Padding','wp-pagebuilder-pro'),
                'tab'       => 'style',
                'section'   => 'Head',
                'responsive' => true,
                'std' => array(
                    'md' => array( 'top' => '10px', 'right' => '15px', 'bottom' => '10px', 'left' => '15px' ),
                    'sm' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                    'xs' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                ),
                'unit'      => array( 'px','em','%' ),
                'selector'  => '{{SELECTOR}} th.wppb-table-title-wrap { padding: {{data.head_padding}}; }'
            ),

            //Body
            'body_title_color' => array(
                'type' => 'color',
                'title' => __('Title color','wp-pagebuilder-pro'),
                'tab' => 'style',
                'section' => 'Body',
                'selector' => '{{SELECTOR}} .wppb-table-item-body tr .wppb-table-title, {{SELECTOR}} .wppb-table-item-body tr .wppb-table-title a { color: {{data.body_title_color}}; }'
            ),
            'body_title_hover_color' => array(
                'type' => 'color',
                'title' => __('Title hover color','wp-pagebuilder-pro'),
                'tab' => 'style',
                'section' => 'Body',
                'selector' => '{{SELECTOR}} .wppb-table-item-body tr .wppb-table-title a:hover, {{SELECTOR}} .wppb-table-item-body tr .wppb-table-title:hover { color: {{data.body_title_hover_color}}; }',
            ),
            'sub_body_title_color' => array(
                'type' => 'color',
                'title' => __('Sub title color','wp-pagebuilder-pro'),
                'tab' => 'style',
                'section' => 'Body',
                'selector' => '{{SELECTOR}} .wppb-table-item-body tr .wppb-table-subtitle { color: {{data.sub_body_title_color}}; }'
            ),
            'body_background_color' => array(
                'type' => 'color',
                'title' => __('Background color','wp-pagebuilder-pro'),
                'tab' => 'style',
                'section' => 'Body',
                'selector' => '{{SELECTOR}} .wppb-table-item-body tr td { background: {{data.body_background_color}}; }'
            ),
            'body_background_hover_color' => array(
                'type' => 'color',
                'title' => __('Background hover color','wp-pagebuilder-pro'),
                'tab' => 'style',
                'section' => 'Body',
                'selector' => '{{SELECTOR}} .wppb-table-item-body tr td:hover { background: {{data.body_background_hover_color}}; }'
            ),
            'body_title_style' => array(
                'type' => 'typography',
                'title' => __('Title Typography','wp-pagebuilder-pro'),
                'std' => array(
                    'fontFamily' => '',
                    'fontSize' => array( 'md'=>'14px', 'sm'=>'', 'xs'=>'' ),
                    'lineHeight' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
                    'fontWeight' => '700',
                    'textTransform' => '',
                    'fontStyle' => '',
                    'letterSpacing' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
                ),
                'tab' => 'style',
                'selector' => '{{SELECTOR}} .wppb-table-item-body .wppb-table-title, {{SELECTOR}} .wppb-table-item-body .wppb-table-title a',
                'section' => 'Body',
            ),
            'sub_body_title_style' => array(
                'type' => 'typography',
                'title' => __('Sub Title Typography','wp-pagebuilder-pro'),
                'std' => array(
                    'fontFamily' => '',
                    'fontSize' => array( 'md'=>'14px', 'sm'=>'', 'xs'=>'' ),
                    'lineHeight' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
                    'fontWeight' => '700',
                    'textTransform' => '',
                    'fontStyle' => '',
                    'letterSpacing' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
                ),
                'tab' => 'style',
                'selector' => '{{SELECTOR}} .wppb-table-item-body tr .wppb-table-subtitle',
                'section' => 'Body',
            ),
            'body_border' => array(
                'type' => 'border',
                'title' => 'Body Border',
                'std' => array(
                    'itemOpenBorder' => 1,
                    'borderWidth' => array( 'top' => '1px', 'right' => '1px', 'bottom' => '1px', 'left' => '1px' ),
                    'borderStyle' => 'solid',
                    'borderColor' => '#e5e5e5'
                ),
                'tab' => 'style',
                'section' => 'Body',
                'selector' => '{{SELECTOR}} td.wppb-table-title-wrap'
            ),
            'body_padding' => array(
                'type'      => 'dimension',
                'title'     => __('Padding','wp-pagebuilder-pro'),
                'tab'       => 'style',
                'section'   => 'Body',
                'responsive' => true,
                'std' => array(
                    'md' => array( 'top' => '10px', 'right' => '15px', 'bottom' => '10px', 'left' => '15px' ),
                    'sm' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                    'xs' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
                ),
                'unit'      => array( 'px','em','%' ),
                'selector'  => '{{SELECTOR}} td.wppb-table-title-wrap { padding: {{data.body_padding}}; }'
            ),

            'odd_background_color' => array(
                'type' => 'color',
                'title' => __('Odd Background color','wp-pagebuilder-pro'),
                'tab' => 'style',
                'section' => 'Odd and Even Background',
                'selector' => '{{SELECTOR}} .wppb-table-item-body tr:nth-child(odd) td.wppb-table-title-wrap { background: {{data.odd_background_color}}; }'
            ),

            'even_background_color' => array(
                'type' => 'color',
                'title' => __('Even Background color','wp-pagebuilder-pro'),
                'tab' => 'style',
                'section' => 'Odd and Even Background',
                'selector' => '{{SELECTOR}} .wppb-table-item-body tr:nth-child(even) td.wppb-table-title-wrap { background: {{data.even_background_color}}; }'
            ),

        );

        return $settings;
    }


    public function getCellData( $tag, $table_items ){
        $output = '';
        foreach ( $table_items as $key => $value ){
            if( $tag == 'th' ){
                if ( $key > 0 ){ break; }
            }else{
                if ( $key == 0 ){ continue; }
            }
            if( isset($value['column']) && is_array($value['column']) ){
                $output  .= '<tr class="wppb-table-item repeater-'.$key.'">';
                foreach( $value['column'] as $k => $val ) {
                    if( get_wppb_array_value_by_key($val, 'title_link')['link'] ) {
                        $target = get_wppb_array_value_by_key($val, 'title_link')['window'] ? "target=_blank" : "target=_self";
                        $nofolow = get_wppb_array_value_by_key($val, 'title_link')['nofolow'] ? "rel=nofolow" : "";
                    }
                    $span = '';
                    if( isset($val["span"]) && $val["span"] == 1 ){
                        $span = ( isset($val["col_span"]) && $val["col_span"] > 1 ) ? ' colspan="'.$val["col_span"].'"' : '';
                        $span .= ( isset($val["row_span"]) && $val["row_span"] > 1 ) ? ' rowspan="'.$val["row_span"].'"' : '';
                    }
                    $output  .= '<'.$tag.$span.' class="wppb-table-title-wrap repeater-'.$k.'">';
                    if( get_wppb_array_value_by_key($val, 'title_link')['link'] ){
                        $output  .= isset($val["title"]) ? '<div class="wppb-table-title"><a '.esc_attr($nofolow).' href="'.esc_url($val['title_link']['link']).'" '.esc_attr($target).'>'.$val["title"].'</a></div>' : '' ;
                    } else {
                        $output  .= isset($val["title"]) ? '<div class="wppb-table-title">'.$val["title"].'</div>' : '' ;
                    }
                    $output  .= isset($val["sub_title"]) ?'<div class="wppb-table-subtitle">'.$val["sub_title"].'</div>' : '';
                    $output  .= '</'.$tag.'>';
                }
                $output  .= '</tr>';
            }
        }
        return $output;
    }


    // Video Render HTML
    public function render($data = null){
        $settings 	= $data['settings'];
        $line 		= isset($settings['line']) ? $settings['line'] : '';
        $table_items= isset($settings["table_items"]) ? $settings["table_items"] : array();
        $output 	= '';

        $output  .= '<div class="wppb-table-addon">';
        $output  .= '<div class="wppb-table-addon-content">';
        $output .= '<div class="wppb-table-items">';
        if (is_array($table_items) && count($table_items)){
            $output .= '<table class="wppb-table-item-wrap">';
            $output .= '<thead class="wppb-table-item-head">';
            $output .= $this->getCellData( 'th', $table_items );
            $output .= '</thead>';
            $output .= '<tbody class="wppb-table-item-body">';
            $output .= $this->getCellData( 'td', $table_items );
            $output .= '</tbody>';
            $output .= '</table>';
        }
        $output .= '</div>'; //wppb-table-items
        $output .= '</div>'; //wppb-table-addon-content
        $output .= '</div>'; //wppb-table-addon

        return $output;
    }


    // headline Template
    public function getTemplate(){
        $output = '
		<#
		function getCellData( tag , table_items ){
			let output = "";
			__.forEach( table_items , function(value, key) {
				if(typeof value != "undefined") {
					if( value["column"] && ( ( tag == "th" && key < 1 ) || ( tag == "td" && key > 0 ) ) ){
					output  += "<tr class=\'wppb-table-item repeater-"+key+"\'>";
						__.forEach( value["column"] , function(val, k) {
							let span = "";
							if( val["span"] ){
								span = val["col_span"] > 1 ? "colspan=\'"+val["col_span"]+"\'" : "";
								span += ( val["row_span"] > 1 ) ? "rowspan=\'"+val["row_span"]+"\'" : "";
							}
	              output  += "<"+tag+" "+span+" class=\'wppb-table-title-wrap repeater-"+k+"\'>";
	              if( val.title_link && val.title_link.link ){
	                output  += val["title"] ? "<div class=\'wppb-table-title\'><a href=\'"+val.title_link.link+"\'>"+val["title"]+"</a></div>" : "";
	              } else {
	                output  += val["title"] ? "<div class=\'wppb-table-title\'>"+val["title"]+"</div>" : "";
	              }
	                output  += val["sub_title"] ? "<div class=\'wppb-table-subtitle\'>"+val["sub_title"]+"</div>" : "";
								output  += "</"+tag+">";
							})
						output  += "</tr>";
					}
				}

			})
			return output;
		}
		#>

		<div class="wppb-table-addon">
			<div class="wppb-table-addon-content">
				<div class="wppb-table-items">
					<# if( data.table_items && data.table_items.length > 0 ){ #>
						<table class="wppb-table-item-wrap">
							<thead class="wppb-table-item-head">
								{{{ getCellData( "th", data.table_items ) }}}
							</thead>
							<tbody class="wppb-table-item-body">
								{{{ getCellData( "td", data.table_items ) }}}
							</tbody>
						</table>
					<# } #>
				</div>
			</div>
  		</div>
		';
        return $output;
    }
}