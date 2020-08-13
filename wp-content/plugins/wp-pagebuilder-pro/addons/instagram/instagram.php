<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class WPPB_Addon_Instagram{
	public function get_name(){
		return 'wppb_instagram';
	}
	public function get_title(){
		return 'Instagram';
	}
	public function get_icon(){
		return 'wppb-font-instagram';
	}
	public function get_category_name(){
    return 'Pro Addons';
  }

	// instagram Settings Fields
	public function get_settings(){
		$settings = array(
			'get_images_by' => array(
				'type' => 'select',
				'title' => __('Get images by','wp-pagebuilder-pro'),
				'values' => array(
					'username' => __('Username','wp-pagebuilder-pro'),
					'hashtag' => __('Hashtag','wp-pagebuilder-pro'),
				),
				'std' => 'username',
			),
			'username' => array(
				'type' => 'text',
				'title' => __('User ID','wp-pagebuilder-pro'),
				'depends' => array(array('get_images_by', '=', 'username')),
				'desc' => 'You can get your Instagram user id from here: https://codeofaninja.com/tools/find-instagram-user-id'
			),
			'hashtag' => array(
				'type' => 'text',
				'title' => __('Hashtag','wp-pagebuilder-pro'),
				'depends' => array(array('get_images_by', '=', 'hashtag' )),
      ),
      'access_token' => array(
				'type' => 'text',
				'title' => __('Access Token','wp-pagebuilder-pro'),
				'desc'=> 'You can get your access token from here: http://instagram.pixelunion.net/'
			),
			'number_of_items' => array(
				'type' => 'number',
				'title' => __('Number of Items','wp-pagebuilder-pro'),
				'std' => '8'
      ),
      'show_like' => array(
				'type' => 'switch',
        'title' => __('Show Like','wp-pagebuilder-pro'),
        'std' => '0',
      ),
      'show_comment' => array(
        'type' => 'switch',
        'title' => __('Show Comment','wp-pagebuilder-pro'),
        'std' => '0',
      ),
      'show_text' => array(
        'type' => 'switch',
        'title' => __('Show Text','wp-pagebuilder-pro'),
        'std' => '0',
      ),
      'text_limit' => array(
        'type' => 'text',
        'title' => __('Text Limit','wp-pagebuilder-pro'),
        'std' => '',
        'depends' => array(array('show_text', '!=', '0')),
      ),
    'show_full_profile' => array(
      'type' => 'switch',
      'title' => __('Show full profile','wp-pagebuilder-pro'),
      'std' => '0',
      'section' => 'Profile Info',
    ),
    'show_profile_img' => array(
      'type' => 'switch',
      'title' => __('Show profile image','wp-pagebuilder-pro'),
      'std' => '0',
      'section' => 'Profile Info',
      'depends' => array(array('show_full_profile', '!=', '0')),
    ),
    'show_profile_user' => array(
      'type' => 'switch',
      'title' => __('Show user name','wp-pagebuilder-pro'),
      'std' => '0',
      'section' => 'Profile Info',
      'depends' => array(array('show_full_profile', '!=', '0')),
    ),
    'show_profile_name' => array(
      'type' => 'switch',
      'title' => __('Show full name','wp-pagebuilder-pro'),
      'std' => '0',
      'section' => 'Profile Info',
      'depends' => array(array('show_full_profile', '!=', '0')),
    ),

    //follow
    'show_follow' => array(
      'type' => 'switch',
      'title' => __('Show Follow Us','wp-pagebuilder-pro'),
      'std' => '0',
      'section' => 'Follow Info',
    ),
    'follow_text' => array(
      'type' => 'text',
      'title' => __('Follow text','wp-pagebuilder-pro'),
      'std'=> 'Follow us',
      'section' => 'Follow Info',
      'depends' => array(array('show_follow', '!=', '0')),
    ),
      
    'layout' => array(
      'type' => 'select',
      'title' => __('Layout Style','wp-pagebuilder-pro'),
      'values' => array(
        'default' => __('Default','wp-pagebuilder-pro'),
        'img_overlay' => __('Image Overlay','wp-pagebuilder-pro'),
      ),
      'std' => 'img_overlay',
    ),
    'img_column' => array(
      'type'      => 'slider',
      'title'     => __('Column','wp-pagebuilder'),
      'responsive' => true,
      'std' => array(
        'md' => '4',
        'sm' => '2',
        'xs' => '1',
      ),
      'step' => 1,
      'max' => 50,
      'min' => 1,
    ),
    'column_space' => array(
      'type' => 'slider',
      'title' => 'Column Space',
      'unit' => array( 'px','em','%' ),
      'range' => array(
        'em' => array(
          'min' => 0,
          'max' => 10,
          'step' => .1,
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
        'md' => '15px',
        'sm' => '',
        'xs' => '',
      ),
      'responsive' => true,
      'selector' => array(
        '{{SELECTOR}} .wppb-instagram-grid { margin-left: -{{data.column_space}}; }',
        '{{SELECTOR}} .wppb-instagram-grid { margin-right: -{{data.column_space}}; }',
        '{{SELECTOR}} .wppb-instagram-grid-col { padding-right: {{data.column_space}}; }',
        '{{SELECTOR}} .wppb-instagram-grid-col { padding-left: {{data.column_space}}; }',
      )
    ),
    'column_margin_bottom' => array(
      'type' => 'slider',
      'title' => 'Margin Bottom',
      'unit' => array( 'px','em','%' ),
      'range' => array(
        'em' => array(
          'min' => 0,
          'max' => 10,
          'step' => .1,
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
        'md' => '30px',
        'sm' => '',
        'xs' => '',
      ),
      'responsive' => true,
      'selector' => array(
        '{{SELECTOR}} .wppb-instagram-grid-col { margin-bottom: {{data.column_margin_bottom}}; }'
      )
    ),
      
    'image_size' => array(
      'type' => 'select',
      'title' => __('Choose Image Size','wp-pagebuilder-pro'),
      'values' => array(
        'small_size' => __('Small Size','wp-pagebuilder-pro'),
        'medium_size' => __('Medium Size','wp-pagebuilder-pro'),
        'large_size' => __('Large Size','wp-pagebuilder-pro'),
      ),
      'std' => 'large_size',
    ),
      
      //text
      'text_color' => array(
        'type' => 'color',
        'title' => __('Text Color','wp-pagebuilder-pro'),
        'clip' => true,
        'selector' => '{{SELECTOR}} .wppb-instagram-text a,{{SELECTOR}} .wppb-instagram-text { color: {{data.text_color}}; }',
        'tab' => 'style',
        'section' => 'Text',
      ),
      'text_fontstyle' => array(
        'type' => 'typography',
        'title' => __('Text typography', 'wp-pagebuilder-pro'),
        'std' => array(
            'fontFamily' => '',
            'fontSize' => array( 'md'=>'16px', 'sm'=>'', 'xs'=>'' ),
            'lineHeight' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
            'fontWeight' => '600',
            'textTransform' => '',
            'fontStyle' => '',
            'letterSpacing' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
        ),
        'selector' => '{{SELECTOR}} .wppb-instagram-text',
        'tab' => 'style',
        'section' => 'Text',
      ),
      'text_margin' => array(
        'type'      => 'dimension',
        'title'     => __('Margin', 'wp-pagebuilder-pro'),
        'tab'       => 'style',
        'section'   => 'Text',
        'responsive' => true,
        'unit'      => array( 'px','em','%' ),
        'std' => array(
            'md' => array( 'top' => '0px', 'right' => '0px', 'bottom' => '0px', 'left' => '0px' ),
            'sm' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
            'xs' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
        ),
        'selector'  => '{{SELECTOR}} .wppb-instagram-text { margin: {{data.text_margin}}; }'
      ),

      //like/comment
      'like_comment_text' => array(
        'type' => 'color',
        'title' => __('Like/comment text','wp-pagebuilder-pro'),
        'selector' => '{{SELECTOR}} .wppb-instagram-comment,{{SELECTOR}} .wppb-instagram-like { color: {{data.like_comment_text}}; }',
        'tab' => 'style',
        'section' => 'Like/comment',
      ),
      'like_fontstyle' => array(
        'type' => 'typography',
        'title' => __('Text typography', 'wp-pagebuilder-pro'),
        'std' => array(
            'fontFamily' => '',
            'fontSize' => array( 'md'=>'16px', 'sm'=>'', 'xs'=>'' ),
            'lineHeight' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
            'fontWeight' => '600',
            'textTransform' => '',
            'fontStyle' => '',
            'letterSpacing' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
        ),
        'selector' => '{{SELECTOR}} .wppb-instagram-comment,{{SELECTOR}} .wppb-instagram-like',
        'tab' => 'style',
        'section' => 'Like/comment',
      ),
      'like_comment_icon' => array(
        'type' => 'color',
        'title' => __('Like/comment icon','wp-pagebuilder-pro'),
        'selector' => '{{SELECTOR}} .wppb-instagram-comment i,{{SELECTOR}} .wppb-instagram-like i { color: {{data.like_comment_icon}}; }',
        'tab' => 'style',
        'section' => 'Like/comment',
      ),
      'like_comment_icon_size' => array(
        'type' => 'slider',
        'title' => __('Icon Size', 'wp-pagebuilder-pro'),
        'unit' => array( 'px','%','em' ),
        'range' => array(
            'em' => array(
                'min' => 0,
                'max' => 20,
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
        'section' => 'Like/comment',
        'selector' => '{{SELECTOR}} .wppb-instagram-comment i,{{SELECTOR}} .wppb-instagram-like i { font-size: {{data.like_comment_icon_size}}; }',
      ),
      'like_margin' => array(
        'type'      => 'dimension',
        'title'     => __('Margin', 'wp-pagebuilder-pro'),
        'tab'       => 'style',
        'section'   => 'Like/comment',
        'responsive' => true,
        'unit'      => array( 'px','em','%' ),
        'selector'  => '{{SELECTOR}} .wppb-instagram-meta { margin: {{data.like_margin}}; }'
      ),

      //profile info
      'profile_text' => array(
        'type' => 'color',
        'title' => __('Profile text color','wp-pagebuilder-pro'),
        'selector' => '{{SELECTOR}} .wppb-instagram-full-name { color: {{data.profile_text}}; }',
        'tab' => 'style',
        'section' => 'Profile Info',
        'depends' => array(array('show_full_profile', '!=', '0')),
      ),
      'profile_link' => array(
        'type' => 'color',
        'title' => __('Profile link color','wp-pagebuilder-pro'),
        'selector' => '{{SELECTOR}} .wppb-instagram-link-username { color: {{data.profile_link}}; }',
        'tab' => 'style',
        'section' => 'Profile Info',
        'depends' => array(array('show_full_profile', '!=', '0')),
      ),
      'profile_hover_link' => array(
        'type' => 'color',
        'title' => __('Profile link hover color','wp-pagebuilder-pro'),
        'selector' => '{{SELECTOR}} .wppb-instagram-link-username:hover { color: {{data.profile_hover_link}}; }',
        'tab' => 'style',
        'section' => 'Profile Info',
        'depends' => array(array('show_full_profile', '!=', '0')),
      ),
      'profile_fontstyle' => array(
        'type' => 'typography',
        'title' => __('Profile typography', 'wp-pagebuilder-pro'),
        'std' => array(
            'fontFamily' => '',
            'fontSize' => array( 'md'=>'16px', 'sm'=>'', 'xs'=>'' ),
            'lineHeight' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
            'fontWeight' => '600',
            'textTransform' => '',
            'fontStyle' => '',
            'letterSpacing' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
        ),
        'selector' => '{{SELECTOR}} .wppb-instagram-full-name, {{SELECTOR}} .wppb-instagram-link-username',
        'tab' => 'style',
        'section' => 'Profile Info',
        'depends' => array(array('show_full_profile', '!=', '0')),
      ),

      //follow info
      'follow_text_color' => array(
        'type' => 'color',
        'title' => __('Follow text color','wp-pagebuilder-pro'),
        'selector' => '{{SELECTOR}} .wppb-instagram-follow { color: {{data.follow_text_color}}; }',
        'tab' => 'style',
        'section' => 'Follow Info',
        'depends' => array(array('show_follow', '!=', '0')),
      ),
      'follow_link' => array(
        'type' => 'color',
        'title' => __('Follow link color','wp-pagebuilder-pro'),
        'selector' => '{{SELECTOR}} .wppb-instagram-follow-link { color: {{data.follow_link}}; }',
        'tab' => 'style',
        'section' => 'Follow Info',
        'depends' => array(array('show_follow', '!=', '0')),
      ),
      'follow_hover_link' => array(
        'type' => 'color',
        'title' => __('Follow link hover color','wp-pagebuilder-pro'),
        'selector' => '{{SELECTOR}} .wppb-instagram-follow-link:hover { color: {{data.follow_hover_link}}; }',
        'tab' => 'style',
        'section' => 'Follow Info',
        'depends' => array(array('show_follow', '!=', '0')),
      ),
      'follow_fontstyle' => array(
        'type' => 'typography',
        'title' => __('Follow typography', 'wp-pagebuilder-pro'),
        'std' => array(
            'fontFamily' => '',
            'fontSize' => array( 'md'=>'16px', 'sm'=>'', 'xs'=>'' ),
            'lineHeight' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
            'fontWeight' => '600',
            'textTransform' => '',
            'fontStyle' => '',
            'letterSpacing' => array( 'md'=>'', 'sm'=>'', 'xs'=>'' ),
        ),
        'selector' => '{{SELECTOR}} .wppb-instagram-follow, {{SELECTOR}} .wppb-instagram-follow-link',
        'tab' => 'style',
        'section' => 'Follow Info',
        'depends' => array(array('show_follow', '!=', '0')),
      ),
      'follow_bg' => array(
        'type' => 'color',
        'title' => __('Follow Background','wp-pagebuilder-pro'),
        'selector' => '{{SELECTOR}} .wppb-instagram-follow { background: {{data.follow_bg}}; }',
        'tab' => 'style',
        'section' => 'Follow Info',
        'depends' => array(array('show_follow', '!=', '0')),
      ),
      //vertical
			'vertical_position' => array(
				'type' => 'slider',
				'title' => __('Vertial Position','wp-pagebuilder'),
				'unit' => array( '%','px','em' ),
				'range' => array(
						'em' => array(
							'min' => 0,
							'max' => 55,
							'step' => .1,
						),
						'px' => array(
							'min' => 0,
							'max' => 550,
							'step' => 1,
						),
						'%' => array(
							'min' => 0,
							'max' => 100,
							'step' => 1,
						),
					),
				'std' => array(
						'md' => '50%',
						'sm' => '',
						'xs' => '',
					),
				'responsive' => true,
				'tab' => 'style',
        'section' => 'Follow Info',
        'depends' => array(array('show_follow', '!=', '0')),
				'selector' => '{{SELECTOR}} .wppb-instagram-follow { top: {{data.vertical_position}}; }',
      ),
      'horizontal_position' => array(
				'type' => 'slider',
				'title' => __('Vertial Position','wp-pagebuilder'),
				'unit' => array( '%','px','em' ),
				'range' => array(
						'em' => array(
							'min' => 0,
							'max' => 55,
							'step' => .1,
						),
						'px' => array(
							'min' => 0,
							'max' => 550,
							'step' => 1,
						),
						'%' => array(
							'min' => 0,
							'max' => 100,
							'step' => 1,
						),
					),
				'std' => array(
						'md' => '50%',
						'sm' => '',
						'xs' => '',
					),
				'responsive' => true,
				'tab' => 'style',
        'section' => 'Follow Info',
        'depends' => array(array('show_follow', '!=', '0')),
				'selector' => '{{SELECTOR}} .wppb-instagram-follow { left: {{data.horizontal_position}}; }',
			),
      'follow_border' => array(
				'type' => 'border',
				'title' => 'Content Border',
				'std' => array(
					'borderWidth' => array( 'top' => '2px', 'right' => '2px', 'bottom' => '2px', 'left' => '2px' ),
					'borderStyle' => 'solid',
					'borderColor' => '#cccccc'
				),
				'tab' => 'style',
				'section' => 'Follow Info',
        'selector' => '{{SELECTOR}} .wppb-instagram-follow',
        'depends' => array(array('show_follow', '!=', '0')),
			),
      'follow_radius' => array(
				'type' => 'dimension',
				'title' => __('Follow radius','wp-pagebuilder'),
				'unit' => array( 'px','%','em' ),
				'responsive' => true,
				'tab' => 'style',
        'section' => 'Follow Info',
        'depends' => array(array('show_follow', '!=', '0')),
				'selector' => '{{SELECTOR}} .wppb-instagram-follow { border-radius: {{data.follow_radius}}; }'
      ),
      'follow_boxshadow' => array(
				'type' => 'boxshadow',
				'title' => 'Box shadow',
				'std' => array(
					'shadowValue' => array( 'top' => '0px', 'right' => '0px', 'bottom' => '0px', 'left' => '0px' ), 
					'shadowColor' => '#ffffff' 
				),
				'tab' => 'style',
        'section' => 'Follow Info',
        'depends' => array(array('show_follow', '!=', '0')),
				'selector' => '{{SELECTOR}} .wppb-instagram-follow'
      ),
      'follow_padding' => array(
        'type'      => 'dimension',
        'title'     => __('Padding', 'wp-pagebuilder-pro'),
        'tab'       => 'style',
        'section'   => 'Follow Info',
        'responsive' => true,
        'unit'      => array( 'px','em','%' ),
        'depends' => array(array('show_follow', '!=', '0')),
        'std' => array(
            'md' => array( 'top' => '20px', 'right' => '20px', 'bottom' => '20px', 'left' => '20px' ),
            'sm' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
            'xs' => array( 'top' => '', 'right' => '', 'bottom' => '', 'left' => '' ),
        ),
        'selector'  => '{{SELECTOR}} .wppb-instagram-follow { padding: {{data.follow_padding}}; }'
      ),

      //wrap
      'content_background' => array(
				'type' => 'background',
				'title' => __('Content Background Color','wp-pagebuilder'),
        'tab' => 'style',
        'clip' => false,
				'section' => 'Content wrap',
				'selector' => '{{SELECTOR}} .wppb-instagram-content-wrap'
      ),
      'content_overlay_bg' => array(
        'type' => 'color',
        'title' => __('Overlay Background','wp-pagebuilder-pro'),
        'selector' => '{{SELECTOR}} .wppb-instagram-img_overlay .wppb-instagram-content { background: {{data.content_overlay_bg}}; }',
        'tab' => 'style',
        'section' => 'Content wrap',
        'depends' => array(array('layout', '=', array('img_overlay'))),
      ),
      'content_border' => array(
				'type' => 'border',
				'title' => 'Content Border',
				'std' => array(
					'borderWidth' => array( 'top' => '2px', 'right' => '2px', 'bottom' => '2px', 'left' => '2px' ),
					'borderStyle' => 'solid',
					'borderColor' => '#cccccc'
				),
				'tab' => 'style',
				'section' => 'Content wrap',
				'selector' => '{{SELECTOR}} .wppb-instagram-content-wrap'
			),
			'content_border_hover' => array(
				'type' => 'border',
				'title' => 'Content hover Border',
				'std' => array(
					'borderWidth' => array( 'top' => '2px', 'right' => '2px', 'bottom' => '2px', 'left' => '2px' ),
					'borderStyle' => 'solid',
					'borderColor' => '#cccccc'
				),
				'tab' => 'style',
				'section' => 'Content wrap',
				'selector' => '{{SELECTOR}} .wppb-instagram-content-wrap:hover'
      ),
      'content_radius' => array(
				'type' => 'dimension',
				'title' => __('Content radius','wp-pagebuilder'),
				'unit' => array( 'px','%','em' ),
				'responsive' => true,
				'tab' => 'style',
				'section' => 'Content wrap',
				'selector' => '{{SELECTOR}} .wppb-instagram-content-wrap { border-radius: {{data.content_radius}}; }'
      ),
      'content_hover_radius' => array(
				'type' => 'dimension',
				'title' => __('Content hover radius','wp-pagebuilder'),
				'unit' => array( 'px','%','em' ),
				'responsive' => true,
				'tab' => 'style',
				'section' => 'Content wrap',
				'selector' => '{{SELECTOR}} .wppb-instagram-content-wrap:hover { border-radius: {{data.content_hover_radius}}; }'
      ),
			'content_boxshadow' => array(
				'type' => 'boxshadow',
				'title' => 'Box shadow',
				'std' => array(
					'shadowValue' => array( 'top' => '0px', 'right' => '0px', 'bottom' => '0px', 'left' => '0px' ), 
					'shadowColor' => '#ffffff' 
				),
				'tab' => 'style',
				'section' => 'Content wrap',
				'selector' => '{{SELECTOR}} .wppb-instagram-content-wrap'
			),
			'content_hover_boxshadow' => array(
				'type' => 'boxshadow',
				'title' => 'Hover Box shadow',
				'std' => array(
					'shadowValue' => array( 'top' => '0px', 'right' => '0px', 'bottom' => '0px', 'left' => '0px' ), 
					'shadowColor' => '#ffffff' 
				),
				'tab' => 'style',
				'section' => 'Content wrap',
				'selector' => '{{SELECTOR}} .wppb-instagram-content-wrap:hover'
			),
			'content_wrap' => array(
				'type' => 'dimension',
				'title' => 'Content Padding',
				'unit' => array( 'px','em','%' ),
				'responsive' => true,
				'tab' => 'style',
				'selector' => '{{SELECTOR}} .wppb-instagram-content-wrap { padding: {{data.content_wrap}}; }',
				'section' => 'Content wrap',
			),

		);
		return $settings;
	}

	private function curl($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}

	private function getImages( $type , $access_token , $username , $hashtag ) {
		$images = $json = '';
		$file_path = trailingslashit( wp_upload_dir()['basedir'] ) . 'wp-pagebuilder/cache/instagram.json';

		if ( file_exists( $file_path ) && ( filemtime($file_path) > (time() - 60 * 30 ) ) ){
			$images = file_get_contents($file_path);
			$json = json_decode($images);
		} else {
			if( $type == 'hashtag' ) {
				$api = "https://api.instagram.com/v1/tags/". $hashtag  ."/media/recent/?access_token=" . $access_token . "&count=50";
			} else {
				$api = "https://api.instagram.com/v1/users/". $username ."/media/recent/?access_token=" . $access_token . "&count=50";
			}
			
			if( ini_get('allow_url_fopen') ) {
				$images = file_get_contents($api);
				file_put_contents( $file_path, $images, LOCK_EX );
			} else {
				$images = $this->curl($api);
			}
			$json = json_decode($images);
		}

		if(isset($json->data)){
			return $json->data;
		}
		return array();
  }

	// Video popup Render HTML
	public function render($data = null){
	$settings 		    = $data['settings'];
	$access_token 	    = $settings['access_token'] ? $settings['access_token'] : '7583938101.1677ed0.99f074be46624ffa97f1eb27d690f657';
	$get_images_by 	    = $settings['get_images_by'] ? $settings['get_images_by'] : 'username';
	$username 		    = $settings['username'] ? $settings['username'] : '7583938101';
	$hashtag 		    = $settings['hashtag'] ? $settings['hashtag'] : '#football';
	$number_of_items    = $settings['number_of_items'] ? $settings['number_of_items'] : '';
	$layout 		    = $settings['layout'] ? $settings['layout'] : '';
    $image_size 		= $settings['image_size'] ? $settings['image_size'] : '';
    $show_full_profile 	= $settings['show_full_profile'] ? $settings['show_full_profile'] : '';
    $show_profile_img 	= $settings['show_profile_img'] ? $settings['show_profile_img'] : '';
    $show_profile_user 	= $settings['show_profile_user'] ? $settings['show_profile_user'] : '';
    $show_profile_name 	= $settings['show_profile_name'] ? $settings['show_profile_name'] : '';
    $show_follow 	    = $settings['show_follow'] ? $settings['show_follow'] : '';
    $show_like 	        = $settings['show_like'] ? $settings['show_like'] : '';
    $show_comment 	    = $settings['show_comment'] ? $settings['show_comment'] : '';
    $show_text 	        = $settings['show_text'] ? $settings['show_text'] : '';
    $text_limit   	    = $settings['text_limit'] ? $settings['text_limit'] : '120';
    $img_column      	= $settings['img_column'] ? $settings['img_column'] : '4';
    $follow_text      	= $settings['follow_text'] ? $settings['follow_text'] : '4';

		$output = $img = $profile = '';

	$items = $this->getImages( $get_images_by , $access_token, $username, $hashtag );

		$output .= '<div class="wppb-addon-instagram">';
      $output .= '<div class="wppb-instagram-content">';
      if ( !$items ) {
        $output .= '<p class="alert alert-warning">No data found!!!</p>';
      } else {
        //Profile Info
        if( ($show_full_profile == 1) || ($show_follow == 1) ){
          $accounts = array_slice( $items, 0, 1 );
          foreach( $accounts as $account ){
            if($show_full_profile == 1){
              $profile .= '<div class="wppb-instagram-profile wppb-clearfix">';
                if( $show_profile_img ==1 ) {
                  $profile .= '<img src="'.$account->user->profile_picture.'" alt="'.$account->user->username.'">';
                }
                if( $show_profile_name == 1 ) {
                $profile .= '<p class="wppb-instagram-full-name">'.$account->user->full_name.'</p>';
                }
                if( $show_profile_user == 1 ) {
                $profile .= '<a class="wppb-instagram-link-username" href="https://www.instagram.com/'.$account->user->username.'"><span>'.$account->user->username.'</span></a>';
                }
              $profile .= '</div>';//wppb-instagram-profile
              $output .= $profile;
            }
            if( $show_follow == 1 ){
              $output .= '<div class="wppb-instagram-follow">';
              if( $follow_text ){
                $output .= '<p>'.$follow_text.'</p>';
              }
              $output .= '<a class="wppb-instagram-follow-link" href="https://www.instagram.com/'.$account->user->username.'"><span>@ '.$account->user->username.'</span></a>';
              $output .= '</div>';
            }
          }
        }
          
        $output .= '<div class="wppb-addons-col wppb-instagram-grid">';
        $i = 1;
        foreach( $items as $item ){

          if( $i <= $number_of_items ){

            if( $image_size == 'small_size' ){
              $img = $item->images->thumbnail->url;
            } else if( $image_size ==  'medium_size' ) {
              $img = $item->images->low_resolution->url;
            } else {
              $img = $item->images->standard_resolution->url;
            }
            $output .= '<div class="wppb-instagram-grid-col wppb-addons-col-md'.$img_column["md"].' wppb-addons-col-sm'.$img_column["sm"].' wppb-addons-col-xs'.$img_column["xs"].'">';
              $output .= '<div class="wppb-instagram-content-wrap wppb-instagram-'.$layout.'">';
                $output .= '<div class="wppb-instagram-content-out">';
                    if( $img ) {
                      $output .= '<div class="wppb-instagram-image"><a href="'.$item->link.'" class="wppb-instagram-link-content">';
                        $output .='<img src="'.$img.'" alt="'.$item->user->username.'">';
                      $output .= '</a></div>';//wppb-instagram-profile
                    }
                    $output .= '<a href="'.$item->link.'" target="_blank" class="wppb-instagram-link-content"><div class="wppb-instagram-content">';
                    $output .= '<div class="wppb-instagram-content-in">';
                      $output .= '<div class="wppb-instagram-content-inner">';
                        if( ($show_like == 1) || ($show_comment == 1) ) {
                          $output .= '<div class="wppb-instagram-meta">';
                          if( $show_like == 1 ) {
                            if( $item->likes->count >= 1000 ) {
                              $count = $item->likes->count/1000 . "k"; 
                              } else {
                              $count = $item->likes->count;
                            }
                            $output .= '<span class="wppb-instagram-like"><i class="wppb-font-heart-thick"></i>'.$count.'</span>';
                          }
                          if( $show_comment == 1 ) {
                            if( $item->comments->count >= 1000 ) {
                              $comments = $item->comments->count/1000 . "k";
                              } else {
                              $comments = $item->comments->count;
                            }
                            $output .= '<span class="wppb-instagram-comment"><i class="wppb-font-comment"></i>'.$comments.'</span>';
                          }
                          $output .='</div>';
                        }
                        if( $show_text == 1 ){
                          if( isset($item->caption->text) ){
                            $output .= '<div class="wppb-instagram-text">'.substr($item->caption->text,0,$text_limit).'</div>';
                          }
                        }
                      $output .= '</div>';//ppb-instagram-content-in
                    $output .= '</div>';//ppb-instagram-content-in
                    $output .= '</div></a>';//ppb-instagram-content

                $output .= '</div>';//wppb-instagram-content-out
              $output .= '</div>';//wppb-instagram-content-wrap
            $output .= '</div>';//.wppb-addons-col-md
          }
          $i++;
        }
        $output .= '</div>';//wppb-addons-col
      }
      $output .= '</div>';//wppb-addon-instagram
		$output .= '</div>';//wppb-addon-instagram
		return $output;
	}
}