<?php
if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class WPPB_Addon_Animated_Heading
{
	public function get_name()
	{
		return 'wppb_animated_heading';
	}
	public function get_title()
	{
		return 'Animated Heading';
	}
	public function get_icon()
	{
		return 'wppb-font-heading';
	}
	public function get_category_name()
	{
		return 'Pro Addons';
	}

	public function __construct() {
		add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
		add_action('wppb_enqueue_scripts', array($this, 'enqueue_scripts'));
	}

	public function register_required_script(){
		wp_register_script('thm.animated.heading', WPPB_PRO_DIR_URL.'addons/animated_heading/assets/js/thm-animated-heading.js', array('jquery'), false, true);
		wp_register_style('thm.animated.heading.style', WPPB_PRO_DIR_URL.'addons/animated_heading/assets/css/thm-animated-heading.css');
	}
	public function enqueue_scripts(){
		wp_enqueue_script('thm.animated.heading', WPPB_PRO_DIR_URL.'addons/animated_heading/assets/js/thm-animated-heading.js', array('jquery'), false, true);
		wp_enqueue_style('thm.animated.heading.style', WPPB_PRO_DIR_URL.'addons/animated_heading/assets/css/thm-animated-heading.css');
	}
	public function get_enqueue_script(){
		return array( 'thm.animated.heading' );
	}
	public function get_enqueue_style(){
		return array( 'thm.animated.heading.style' );
	}

	// Animated Heading Settings Fields
	public function get_settings()
	{
		$settings = array(
			'heading_style' => array(
				'type' => 'select',
				'title' => __('Choose Animation Style', 'wp-pagebuilder-pro'),
				'values' => array(
					'text_animation' => __('Text Animation', 'wp-pagebuilder-pro'),
					'highlighted' => __('Highlighted Animation', 'wp-pagebuilder-pro'),
				),
				'std' => 'text_animation',
			),
			'heading_selector' => array(
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
			'heading_before_part' => array(
				'type' => 'text',
				'title' => __('Animated/Highlighted Before Text', 'wp-pagebuilder-pro'),
				'std' => 'This heading is',
			),
			'highlighted_text' => array(
				'type' => 'text',
				'title' => __('Highlighted Text', 'wp-pagebuilder-pro'),
				'std' => 'Awesome',
				'depends' => array(array('heading_style', '=', array('highlighted'))),
			),
			'highlighted_shape' => array(
				'type' => 'select',
				'title' => __('Choose Highlighting Shape', 'wp-pagebuilder-pro'),
				'values' => array(
					'bg-fill'=> __('Background Fill', 'wp-pagebuilder-pro'),
					'circle'=> __('Circle', 'wp-pagebuilder-pro'),
					'cross'=> __('Cross(X)', 'wp-pagebuilder-pro'),
					'diagonal'=> __('Diagonal', 'wp-pagebuilder-pro'),
					'strikethrough'=> __('Strikethrough', 'wp-pagebuilder-pro'),
					'square'=> __('Rectangle', 'wp-pagebuilder-pro'),
					'top-botm-line'=> __('Top Bottom Line', 'wp-pagebuilder-pro'),
					'underline'=> __('Underline', 'wp-pagebuilder-pro'),
					'dubl-underline'=> __('Dubble Underline', 'wp-pagebuilder-pro'),
					'zigzag-underline'=> __('Scribble Underline', 'wp-pagebuilder-pro'),
					'sharpe-zigzag'=> __('Sharpe Zigzag Underline', 'wp-pagebuilder-pro'),
					'wave'=> __('Wave', 'wp-pagebuilder-pro'),
				),
				'std' => 'circle',
				'depends' => array(array('heading_style', '=', array('highlighted'))),
			),
			'text_animation_name' => array(
				'type' => 'select',
				'title' => __('Choose text animation type', 'wp-pagebuilder-pro'),
				'values' => array(
					'blinds'=> __('Background Blinds', 'wp-pagebuilder-pro'),
					'clip'=> __('Clip', 'wp-pagebuilder-pro'),
					'delete-typing'=> __('Typing', 'wp-pagebuilder-pro'),
					'flip'=> __('Flip', 'wp-pagebuilder-pro'),
					'fade-in'=> __('Fade In', 'wp-pagebuilder-pro'),
					'loading-bar'=> __('Loading Bar', 'wp-pagebuilder-pro'),
					'scale'=> __('Scale', 'wp-pagebuilder-pro'),
					'slide'=> __('Swirl', 'wp-pagebuilder-pro'),
					'dubl-underline'=> __('Dubble Underline', 'wp-pagebuilder-pro'),
					'push'=> __('Push', 'wp-pagebuilder-pro'),
					'sharpe-zigzag'=> __('Sharpe Zigzag Underline', 'wp-pagebuilder-pro'),
					'wave'=> __('Twist', 'wp-pagebuilder-pro'),
				),
				'std' => 'slide',
				'depends' => array(array('heading_style', '=', array('text_animation'))),
			),

			'highlighted_style_color' => array(
				'type' => 'color',
				'title' => __('Highlighted color', 'wp-pagebuilder-pro'),
				'depends' => array(array('heading_style', '=', array('highlighted'))),
				'selector' => '{{SELECTOR}} .wppb-animated-heading-highlighted-wrap svg path { stroke: {{data.highlighted_style_color}}; }'
			),

			'shape_width' => array(
				'type' => 'slider',
				'title' => __('Shape Width', 'wp-pagebuilder-pro'),
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
				'depends' => array(array('heading_style', '=', array('highlighted'))),
				'selector' => '{{SELECTOR}} .wppb-animated-heading-highlighted-wrap svg path { stroke-width: {{data.shape_width}}; }'
			),

			'shape_radius' => array(
				'type' => 'switch',
				'title' => __('Shape Round', 'wp-pagebuilder-pro'),
				'depends' => array(array('heading_style', '=', array('highlighted'))),
				'std' => '0'
			),

			'animated_text' => array(
				'type' => 'textarea',
				'title' => __('Shortcode','wp-pagebuilder-pro'),
				'std' => __('headline 
              header 
              heading','wp-pagebuilder-pro'),
				'depends' => array(array('heading_style', '=', array('text_animation'))),
			),

			'heading_after_part' => array(
				'type' => 'text',
				'title' => __('Animated/Highlighted After Text', 'wp-pagebuilder-pro'),
				'std' => 'from the beginning.',
			),

			'content_align' => array(
				'type' => 'select',
				'title' => __('Content alignment','wp-pagebuilder'),
				'responsive' => true,
				'values' => array(
					'left' => __('Left','wp-pagebuilder'),
					'center' => __('Center','wp-pagebuilder'),
					'right' => __('Right','wp-pagebuilder'),
				),
				'std' => 'center',
			),

			//title
			'heading_color' => array(
				'type' => 'color2',
				'title' => __('Heading color', 'wp-pagebuilder-pro'),
				'tab' => 'style',
				'clip' => true,
				'selector' => '{{SELECTOR}} .wppb-animated-heading-before-part, {{SELECTOR}} .wppb-animated-heading-after-part'
			),
			'heading_fontstyle' => array(
				'type' => 'typography',
				'title' => __('Heading Typography', 'wp-pagebuilder-pro'),
				'std' => array(
					'fontFamily' => '',
					'fontSize' => array( 'md'=>'20px', 'sm'=>'', 'xs'=>'' ),
					'lineHeight' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
					'fontWeight' => '500',
					'textTransform' => '',
					'fontStyle' => '',
					'letterSpacing' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
				),
				'selector' => '{{SELECTOR}} .wppb-animated-heading-before-part, {{SELECTOR}} .wppb-animated-heading-after-part',
				'tab' => 'style',
			),

			//highlighted
			'highlighted_color' => array(
				'type' => 'color2',
				'title' => __('Heading color', 'wp-pagebuilder-pro'),
				'tab' => 'style',
				'section' => 'Highlighted',
				'clip' => true,
				'depends' => array(array('heading_style', '=', array('highlighted'))),
				'selector' => '{{SELECTOR}} .wppb-animated-heading-highlighted-text'
			),
			'animated_color' => array(
				'type' => 'color',
				'title' => __('Heading color', 'wp-pagebuilder-pro'),
				'tab' => 'style',
				'section' => 'Highlighted',
				'depends' => array(array('heading_style', '=', array('text_animation'))),
				'selector' => '{{SELECTOR}} .wppb-animated-text { color: {{data.animated_color}}; }'
			),
			'highlighted_fontstyle' => array(
				'type' => 'typography',
				'title' => __('Highlighted Typography', 'wp-pagebuilder-pro'),
				'std' => array(
					'fontFamily' => '',
					'fontSize' => array( 'md'=>'16px', 'sm'=>'', 'xs'=>'' ),
					'lineHeight' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
					'fontWeight' => '600',
					'textTransform' => '',
					'fontStyle' => '',
					'letterSpacing' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
				),
				'selector' => '{{SELECTOR}} .wppb-animated-heading-highlighted-text, {{SELECTOR}} .wppb-animated-text',
				'tab' => 'style',
				'section' => 'Highlighted',
			),
			'highlighted_loading_bg' => array(
				'type' => 'color',
				'title' => __('Loading Background', 'wp-pagebuilder-pro'),
				'depends' => array(array('heading_style', '=', array('text_animation'))),
				'tab' => 'style',
				'section' => 'Highlighted',
				'selector' => '{{SELECTOR}} .wppb-animated-heading-text.loading-bar .wppb-animated-text-words-wrapper::after { background: {{data.highlighted_loading_bg}}; }'
			),
			'highlighted_margin' => array(
				'type' => 'dimension',
				'title' => __('Margin', 'wp-pagebuilder-pro'),
				'tab' => 'style',
				'section' => 'Highlighted',
				'responsive' => true,
				'std' => array(
					'md' => array( 'top' => '0px', 'right' => '0px', 'bottom' => '0px', 'left' => '0px' ),
					'sm' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
					'xs' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
				),
				'unit' => array( 'px','em','%' ),
				'selector' => '{{SELECTOR}} .wppb-animated-heading-highlighted-wrap, {{SELECTOR}} .wppb-animated-text-words-wrapper { margin: {{data.highlighted_margin}}; }'
			),
			'highlighted_padding' => array(
				'type' => 'dimension',
				'title' => __('Padding', 'wp-pagebuilder-pro'),
				'tab' => 'style',
				'section' => 'Highlighted',
				'responsive' => true,
				'std' => array(
					'md' => array( 'top' => '0px', 'right' => '0px', 'bottom' => '0px', 'left' => '0px' ),
					'sm' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
					'xs' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
				),
				'unit' => array( 'px','em','%' ),
				'selector' => '{{SELECTOR}} .wppb-animated-text-words-wrapper, {{SELECTOR}} .wppb-animated-heading-title .wppb-animated-heading-highlighted-text { padding: {{data.highlighted_padding}}; }'
			),

		);
		return $settings;
	}

	// Animated Heading Render HTML
	public function render($data = null)
	{
		$settings 	           = $data['settings'];
		$heading_style 		     = isset($settings['heading_style']) ? $settings['heading_style'] : 'text_animation';
		$heading_before_part 	 = isset($settings['heading_before_part']) ? $settings['heading_before_part'] : '';
		$highlighted_text 		 = isset($settings['highlighted_text']) ? $settings['highlighted_text'] : '';
		$highlighted_shape 		 = isset($settings['highlighted_shape']) ? $settings['highlighted_shape'] : '';
		$text_animation_name 	 = isset($settings['text_animation_name']) ? $settings['text_animation_name'] : '';
		$animated_text 		     = isset($settings['animated_text']) ? $settings['animated_text'] : '';
		$heading_after_part 	 = isset($settings['heading_after_part']) ? $settings['heading_after_part'] : '';
		$heading_selector 		 = isset($settings['heading_selector']) ? $settings['heading_selector'] : 'h2';
		$shape_radius 		     = isset($settings['shape_radius']) ? $settings['shape_radius'] : '';
		$content_align 		     = isset($settings['content_align']) ? $settings['content_align'] : '';

		$output	= $animated_text_chunk = $animated_text_class = $content_alignment = '';

		if( isset($content_align['md']) && $content_align['md'] ){
			$content_alignment .=  ( isset($content_align['md'] ) && $content_align['md'] ) ? 'md'.$content_align['md'].' '  : 'mdcenter';
		}
		if( isset($content_align['sm']) && $content_align['sm'] ){
			$content_alignment .=  ( isset($content_align['sm'] ) && $content_align['sm'] ) ? 'sm'.$content_align['sm'].' '  : ' smcenter';
		}
		if( isset($content_align['xs']) && $content_align['xs'] ){
			$content_alignment .=  ( isset($content_align['xs'] ) && $content_align['xs'] ) ? 'xs'.$content_align['xs'].' '  : ' xscenter';
		}
		if($animated_text){
			$animated_text_chunk = explode("\n", $animated_text);
		}

		if($animated_text && $text_animation_name){
			$animated_text_class = 'wppb-animated-heading-text ';
			switch($text_animation_name){
				case($text_animation_name == 'blinds'):
					$animated_text_class .= 'letters animation-blinds';
					break;
				case($text_animation_name == 'delete-typing'):
					$animated_text_class .= 'letters type';
					break;
				case($text_animation_name == 'flip'):
					$animated_text_class .= 'wppb-text-animation-flip';
					break;
				case($text_animation_name == 'fade-in'):
					$animated_text_class .= 'zoom';
					break;
				case($text_animation_name == 'loading-bar'):
					$animated_text_class .= 'loading-bar';
					break;
				case($text_animation_name == 'scale'):
					$animated_text_class .= 'letters scale';
					break;
				case($text_animation_name == 'slide'):
					$animated_text_class .= 'letters scale';
					break;
				case($text_animation_name == 'push'):
					$animated_text_class .= 'push';
					break;
				case($text_animation_name == 'wave'):
					$animated_text_class .= 'letters animation-wave';
					break;
				default:
					$animated_text_class .= 'text-clip is-full-width';
			}
		}
		$output .= '<div class="wppb-animated-heading-addon">';
		$output .= '<div class="wppb-animated-heading-addon-content">';
		$output .= '<'.$heading_selector.' class="wppb-animated-heading-title '.esc_attr($content_alignment).' '.($heading_style !== 'highlighted' ? $animated_text_class : '').'">';
		$output .= ($heading_before_part) ? '<span class="wppb-animated-heading-before-part">'.$heading_before_part.'</span>' : '';
		if($heading_style == 'highlighted'){
			if($highlighted_text){
				$wppb_shape_radius = ($shape_radius ? 'wppb-shape-radius-'.$shape_radius : '');
				$output .= '<span class="wppb-animated-heading-highlighted-wrap '.$wppb_shape_radius.'">';
				$output .= '<span class="wppb-animated-heading-highlighted-text '.($highlighted_shape ? 'wppb-shape-'.$highlighted_shape : '').'">';
				$output .= $highlighted_text;
				$output .= '</span>';
				if($highlighted_shape == 'cross'){
					$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                            <path d="M497.4,23.9C301.6,40,155.9,80.6,4,144.4"></path>
                            <path d="M14.1,27.6c204.5,20.3,393.8,74,467.3,111.7"></path>
                        </svg>';
				} elseif ($highlighted_shape == 'bg-fill') {
					$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                        <path fill="none" stroke="#020202" stroke-width="150" stroke-miterlimit="10" d="M0 75h500"/>
                      </svg>';
				} elseif ($highlighted_shape == 'square') {
					$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                        <path d="M44.22 0c2.46 51.77-2.05 99.72-13.51 143.84 50.37-7.64 316.96-30.55 469.29-5.09-16.41-40.58-21.99-71.11-23.34-127.29C378.38 22.92 97.06 34.37 0 22.92"/>
                      </svg>';
				} elseif ($highlighted_shape == 'sharpe-zigzag') {
					$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                        <path d="M.23 139.83l28.27-19.78 25.43 19.79 28.27-19.77 22.6 19.79 29.68-19.78 25.44 19.79 25.44-19.78 28.27 19.79 26.85-19.77 26.84 19.8 24.04-19.79 24.01 19.8 22.62-19.78 22.61 19.8 22.61-19.78 24.02 19.79 24.03-19.78 24.02 19.8 22.62-19.79 21.19 19.79"/>
                      </svg>';
				} elseif ($highlighted_shape == 'diagonal') {
					$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                            <path d="M13.5,15.5c131,13.7,289.3,55.5,475,125.5"></path>
                        </svg>';
				}
				elseif ($highlighted_shape == 'top-botm-line') {
					$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                            <path d="M8.4,143.1c14.2-8,97.6-8.8,200.6-9.2c122.3-0.4,287.5,7.2,287.5,7.2"></path>
                            <path d="M8,19.4c72.3-5.3,162-7.8,216-7.8c54,0,136.2,0,267,7.8"></path>
                        </svg>';
				}
				elseif ($highlighted_shape == 'strikethrough') {
					$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                            <path d="M3,75h493.5"></path>
                        </svg>';
				} elseif ($highlighted_shape == 'underline') {
					$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                            <path d="M7.7,145.6C109,125,299.9,116.2,401,121.3c42.1,2.2,87.6,11.8,87.3,25.7"></path>
                        </svg>';
				} elseif ($highlighted_shape == 'dubl-underline') {
					$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                            <path d="M5,125.4c30.5-3.8,137.9-7.6,177.3-7.6c117.2,0,252.2,4.7,312.7,7.6"></path>
                            <path d="M26.9,143.8c55.1-6.1,126-6.3,162.2-6.1c46.5,0.2,203.9,3.2,268.9,6.4"></path>
                        </svg>';
				} elseif ($highlighted_shape == 'zigzag-underline') {
					$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                            <path d="M9.3,127.3c49.3-3,150.7-7.6,199.7-7.4c121.9,0.4,189.9,0.4,282.3,7.2C380.1,129.6,181.2,130.6,70,139 c82.6-2.9,254.2-1,335.9,1.3c-56,1.4-137.2-0.3-197.1,9"></path>
                        </svg>';
				} elseif ($highlighted_shape == 'wave') {
					$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                            <path d="M3,146.1c17.1-8.8,33.5-17.8,51.4-17.8c15.6,0,17.1,18.1,30.2,18.1c22.9,0,36-18.6,53.9-18.6 c17.1,0,21.3,18.5,37.5,18.5c21.3,0,31.8-18.6,49-18.6c22.1,0,18.8,18.8,36.8,18.8c18.8,0,37.5-18.6,49-18.6c20.4,0,17.1,19,36.8,19 c22.9,0,36.8-20.6,54.7-18.6c17.7,1.4,7.1,19.5,33.5,18.8c17.1,0,47.2-6.5,61.1-15.6"></path>
                        </svg>';
				} else {
					$output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                            <path d="M325,18C228.7-8.3,118.5,8.3,78,21C22.4,38.4,4.6,54.6,5.6,77.6c1.4,32.4,52.2,54,142.6,63.7 c66.2,7.1,212.2,7.5,273.5-8.3c64.4-16.6,104.3-57.6,33.8-98.2C386.7-4.9,179.4-1.4,126.3,20.7">
                            </path>
                        </svg>';
				}
				$output .= '</span>';
			}
		} else {
			$output .= '<span class="wppb-animated-text-words-wrapper">';
			if(is_array($animated_text_chunk)){
				foreach($animated_text_chunk as $key => $item){
					$output .= '<span class="wppb-animated-text '.($key==0 ? 'is-visible' : '').'">'.$item.'</span>';
				}
			}
			$output .= '</span>';
		}
		$output .= ($heading_after_part) ? '<span class="wppb-animated-heading-after-part">'.$heading_after_part.'</span>' : '';
		$output .= '</'.$heading_selector.'>';
		$output .= '</div>';//wppb-animated-heading-addon-content
		$output .= '</div>';//wppb-animated-heading-addon

		return $output;
	}

	//Animated Heading Template
	public function getTemplate()
	{
		$output = '
    <# var heading_selector = data.heading_selector ? data.heading_selector : "h2" #>
    <# 
    

		var content_alignment = "";
    if(data.content_align["md"]){
      content_alignment +=  data.content_align["md"] ? "md"+data.content_align["md"]+" " : "mdcenter";
    }
    if(data.content_align["sm"]){
      content_alignment +=  data.content_align["sm"] ? "sm"+data.content_align["sm"]+" " : " smcenter";
    }
    if(data.content_align["xs"]){
      content_alignment +=  data.content_align["xs"] ? "xs"+data.content_align["xs"]+" " : " xscenter";
    }

    let animated_text = (!_.isEmpty(data.animated_text) && data.animated_text) ? data.animated_text : "";
    let animated_text_chunk = "";
    if(animated_text){
        animated_text_chunk = _.split(animated_text, "\n");
    }
    let animated_text_class = "";
    if(animated_text && data.text_animation_name){
        animated_text_class = "wppb-animated-heading-text ";
        if(data.text_animation_name == "blinds"){
            animated_text_class += "letters animation-blinds";
        } else if(data.text_animation_name == "delete-typing"){
            animated_text_class += "letters type";
        } else if(data.text_animation_name == "flip"){
            animated_text_class += "wppb-text-animation-flip";
        } else if(data.text_animation_name == "fade-in"){
            animated_text_class += "zoom";
        } else if(data.text_animation_name == "loading-bar"){
            animated_text_class += "loading-bar";
        } else if(data.text_animation_name == "scale"){
            animated_text_class += "letters scale";
        } else if(data.text_animation_name == "slide"){
            animated_text_class += "letters scale";
        } else if(data.text_animation_name == "push"){
            animated_text_class += "push";
        } else if(data.text_animation_name == "wave"){
            animated_text_class += "letters animation-wave";
        } else {
            animated_text_class += "text-clip is-full-width";
        }
    }
    #>
      <div class="wppb-animated-heading-addon">
        <div class="wppb-animated-heading-addon-content">
          <{{data.heading_selector}} class="wppb-animated-heading-title {{content_alignment}} {{animated_text_class}}">
          <# if(data.heading_before_part) { #>
            <span class="wppb-animated-heading-before-part">{{data.heading_before_part}}</span>
          <# }
          if(data.heading_style == "highlighted"){ #>
            <span class="wppb-animated-heading-highlighted-wrap wppb-shape-radius-{{data.shape_radius}}">
              <span class="wppb-animated-heading-highlighted-text wppb-shape-{{data.highlighted_shape}}">
                  {{data.highlighted_text}}
              </span>
              <# if(data.highlighted_shape == "cross"){ #>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                      <path d="M497.4,23.9C301.6,40,155.9,80.6,4,144.4"></path>
                      <path d="M14.1,27.6c204.5,20.3,393.8,74,467.3,111.7"></path>
                  </svg>
              <# } else if (data.highlighted_shape == "diagonal") { #>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                      <path d="M13.5,15.5c131,13.7,289.3,55.5,475,125.5"></path>
                  </svg>
              <# } else if (data.highlighted_shape == "strikethrough") { #>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                      <path d="M3,75h493.5"></path>
                  </svg>
              <# } else if (data.highlighted_shape == "top-botm-line") { #>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                      <path d="M8.4,143.1c14.2-8,97.6-8.8,200.6-9.2c122.3-0.4,287.5,7.2,287.5,7.2"></path>
                      <path d="M8,19.4c72.3-5.3,162-7.8,216-7.8c54,0,136.2,0,267,7.8"></path>
                  </svg>
              <# } else if (data.highlighted_shape == "underline") { #>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                      <path d="M7.7,145.6C109,125,299.9,116.2,401,121.3c42.1,2.2,87.6,11.8,87.3,25.7"></path>
                  </svg>
              <# } else if (data.highlighted_shape == "dubl-underline") { #>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                      <path d="M5,125.4c30.5-3.8,137.9-7.6,177.3-7.6c117.2,0,252.2,4.7,312.7,7.6"></path>
                      <path d="M26.9,143.8c55.1-6.1,126-6.3,162.2-6.1c46.5,0.2,203.9,3.2,268.9,6.4"></path>
                  </svg>
              <# } else if (data.highlighted_shape == "zigzag-underline") { #>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                      <path d="M9.3,127.3c49.3-3,150.7-7.6,199.7-7.4c121.9,0.4,189.9,0.4,282.3,7.2C380.1,129.6,181.2,130.6,70,139 c82.6-2.9,254.2-1,335.9,1.3c-56,1.4-137.2-0.3-197.1,9"></path>
                  </svg>
              <# } else if (data.highlighted_shape == "wave") { #>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                      <path d="M3,146.1c17.1-8.8,33.5-17.8,51.4-17.8c15.6,0,17.1,18.1,30.2,18.1c22.9,0,36-18.6,53.9-18.6 c17.1,0,21.3,18.5,37.5,18.5c21.3,0,31.8-18.6,49-18.6c22.1,0,18.8,18.8,36.8,18.8c18.8,0,37.5-18.6,49-18.6c20.4,0,17.1,19,36.8,19 c22.9,0,36.8-20.6,54.7-18.6c17.7,1.4,7.1,19.5,33.5,18.8c17.1,0,47.2-6.5,61.1-15.6"></path>
                  </svg>
              <# } else if (data.highlighted_shape == "bg-fill") { #>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                      <path fill="none" stroke="#020202" stroke-width="150" stroke-miterlimit="10" d="M0 75h500"/>
                  </svg>
              <# } else if (data.highlighted_shape == "square") { #>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                      <path d="M44.22 0c2.46 51.77-2.05 99.72-13.51 143.84 50.37-7.64 316.96-30.55 469.29-5.09-16.41-40.58-21.99-71.11-23.34-127.29C378.38 22.92 97.06 34.37 0 22.92"/>
                </svg>
              <# } else if (data.highlighted_shape == "sharpe-zigzag") { #>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                      <path d="M.23 139.83l28.27-19.78 25.43 19.79 28.27-19.77 22.6 19.79 29.68-19.78 25.44 19.79 25.44-19.78 28.27 19.79 26.85-19.77 26.84 19.8 24.04-19.79 24.01 19.8 22.62-19.78 22.61 19.8 22.61-19.78 24.02 19.79 24.03-19.78 24.02 19.8 22.62-19.79 21.19 19.79"/>
                </svg>
              <# } else { #>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none">
                      <path d="M325,18C228.7-8.3,118.5,8.3,78,21C22.4,38.4,4.6,54.6,5.6,77.6c1.4,32.4,52.2,54,142.6,63.7 c66.2,7.1,212.2,7.5,273.5-8.3c64.4-16.6,104.3-57.6,33.8-98.2C386.7-4.9,179.4-1.4,126.3,20.7">
                      </path>
                  </svg>
              <# } #>
          </span>
          <# } else {
              #>
              <span class="wppb-animated-text-words-wrapper">
              <# if(_.isArray(animated_text_chunk)){
                  _.each(animated_text_chunk, function(item, key){
                      let visibleClass = "";
                      if(key==0){
                          visibleClass = "is-visible";
                      }
              #>
                      <span class="wppb-animated-text {{visibleClass}}">{{item}}</span>
                  <# })
              } #>
              </span>
          <# }
          if(data.heading_after_part) {
          #>
              <span class="wppb-animated-heading-after-part">{{data.heading_after_part}}</span>
          <# } #>
          </{{data.heading_selector}}>
        </div>
      </div>
		';
		return $output;
	}
}
