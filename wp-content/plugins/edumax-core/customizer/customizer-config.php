<?php

$panel_to_section = array(
	'id'           => 'edumax_panel_options',
	'title'        => esc_html( 'Edumax Options', 'edumax-core' ),
	'description'  => esc_html__( 'Edumax Theme Options', 'edumax-core' ),
	'priority'     => 10,
	'sections'     => array(

		array(
			'id'              => 'header_setting',
			'title'           => esc_html__( 'Header Settings', 'edumax-core' ),
			'description'     => esc_html__( 'Header Settings', 'edumax-core' ),
			'priority'        => 10,
			'fields'         => array(
				array(
					'settings' => 'header_color',
					'label'    => esc_html__( 'Header background Color', 'edumax-core' ),
					'type'     => 'rgba',
					'priority' => 10,
					'default'  => '#ffffff',
				),
				array(
					'settings' => 'header_padding_top',
					'label'    => esc_html__( 'Header Top Padding', 'edumax-core' ),
					'type'     => 'number',
					'priority' => 10,
					'default'  => 20,
				),
				array(
					'settings' => 'header_padding_bottom',
					'label'    => esc_html__( 'Header Bottom Padding', 'edumax-core' ),
					'type'     => 'number',
					'priority' => 10,
					'default'  => 20,
				),
				array(
					'settings' => 'header_margin_bottom',
					'label'    => esc_html__( 'Header Bottom Margin', 'edumax-core' ),
					'type'     => 'number',
					'priority' => 10,
					'default'  => 0,
				),
				array(
					'settings' => 'header_fixed',
					'label'    => esc_html__( 'Sticky Header', 'edumax-core' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => false,
				),
				array(
					'settings' => 'sticky_header_color',
					'label'    => esc_html__( 'Sticky background Color', 'edumax-core' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#ffffff',
				),
				array(
					'settings' => 'header_transparent',
					'label'    => esc_html__( 'Header Transparent', 'edumax-core' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => false,
				),
                #category menu
                array(
                    'settings' => 'en_header_cat_menu',
                    'label'    => esc_html__( 'Header Category Menu', 'edumax-core' ),
                    'type'     => 'switch',
                    'priority' => 10,
                    'default'  => false,
                ),
                array(
                    'settings' => 'category_menu_label',
                    'label'    => esc_html__( 'Category Menu Label Text', 'edumax-core' ),
                    'type'     => 'text',
                    'priority' => 10,
                    'default'  => 'Category'
				),
				array(
                    'settings' => 'en_header_search',
                    'label'    => esc_html__( 'Header Search', 'edumax-core' ),
                    'type'     => 'switch',
                    'priority' => 10,
                    'default'  => false,
                ),
                array(
                    'settings' => 'header_login_btn',
                    'label'    => esc_html__( 'Header Login/Signup Button', 'edumax-core' ),
                    'type'     => 'switch',
                    'priority' => 10,
                    'default'  => true
                ),
                array(
                    'settings' => 'header_login_btn_text',
                    'label'    => esc_html__( 'Header login button text', 'edumax-core' ),
                    'type'     => 'text',
                    'priority' => 10,
                    'default'  => 'Login'
                ),
                array(
                    'settings' => 'header_reg_btn_text',
                    'label'    => esc_html__( 'Header signup button text', 'edumax-core' ),
                    'type'     => 'text',
                    'priority' => 10,
                    'default'  => 'Get Started'
                ),
                array(
                    'settings' => 'en_header_shopping_cart',
                    'label'    => esc_html__( 'Enable Header Shopping Cart', 'edumax-core' ),
                    'type'     => 'switch',
                    'priority' => 10,
                    'default'  => true
                ),

			)//fields
		),//header_setting


        array(
            'id'              => 'edumax_tutor_options',
            'title'           => esc_html__( 'Course Settings', 'edumax-core' ),
            'description'     => esc_html__( 'You can customize your course archive page from here.', 'edumax-core' ),
            'priority'        => 10,
            'fields'         => array(
                array(
                    'settings' => 'sidebar_filter',
                    'label'    => esc_html__( 'Archive Sidebar filter', 'edumax-core' ),
                    'type'     => 'switch',
                    'priority' => 10,
                    'default'  => true
                ),
                array(
                    'settings' => 'course_sidebar_position',
                    'label'    => esc_html__( 'Sidebar Position', 'edumax-core' ),
                    'type'     => 'select',
                    'priority' => 10,
                    'default'  => 'left',
                    'choices'  => array(
                        'left' => esc_html( 'Left', 'edumax-core' ),
                        'right' => esc_html( 'Right', 'edumax-core' ),
                    )
                ),
                array(
                    'settings' => 'top_filter_bar',
                    'label'    => esc_html__( 'Enable Course Sorting Bar', 'edumax-core' ),
                    'type'     => 'switch',
                    'priority' => 10,
                    'default'  => true
                ),
                array(
                    'settings' => 'course_per_page',
                    'label'    => esc_html__( 'Archive Course Per Page', 'edumax-core' ),
                    'type'     => 'number',
                    'priority' => 10,
                    'default'  => 9
                ),
                array(
                    'settings' => 'course_pagination',
                    'label'    => esc_html__( 'Archive Course Pagination', 'edumax-core' ),
                    'type'     => 'switch',
                    'priority' => 10,
                    'default'  => true
                ),
                array(
                    'settings' => 'course_column_count',
                    'label'    => esc_html__( 'Archive Course Column Count', 'edumax-core' ),
                    'type'     => 'select',
                    'priority' => 10,
                    'default'  => 3,
                    'choices'  => array(
                        1 => esc_html( 'One Column', 'edumax-core' ),
                        2 => esc_html( 'Two Column', 'edumax-core' ),
                        3 => esc_html( 'Three Column', 'edumax-core' ),
                        4 => esc_html( 'Four Column', 'edumax-core' ),
                        6 => esc_html( 'Six Column', 'edumax-core' )
                    )
                ),
            )//fields
        ),//logo_setting



        array(
            'id'              => 'edumax_login_options',
            'title'           => esc_html__( 'Social login', 'edumax-core' ),
            'description'     => esc_html__( 'Social login', 'edumax-core' ),
            'priority'        => 10,
            // 'active_callback' => 'is_front_page',
            'fields'         => array(
                array(
                    'settings' => 'en_social_login',
                    'label'    => esc_html__( 'Enable Social Login', 'edumax-core' ),
                    'type'     => 'switch',
                    'priority' => 10,
                    'default'  => true,
                ),
                array(
                    'settings' => 'google_client_ID',
                    'label'    => esc_html__( 'Google Login Client ID* (Leave empty to disable), ', 'edumax-core' ),
                    'type'     => 'text',
                    'priority' => 10,
                    'default'  => ''
                ),
                array(
                    'settings' => 'facebook_app_ID',
                    'label'    => esc_html__( 'Facebook login App ID* (Leave empty to disable), ', 'edumax-core' ),
                    'type'     => 'text',
                    'priority' => 10,
                    'default'  => ''
                ),
                array(
                    'settings' => 'twitter_consumer_key',
                    'label'    => esc_html__( 'Twitter Login Consumer Key* (Leave empty to disable), ', 'edumax-core' ),
                    'type'     => 'text',
                    'priority' => 10,
                    'default'  => ''
                ),
                array(
                    'settings' => 'twitter_consumer_secreat',
                    'label'    => esc_html__( 'Twitter Login Consumer Secret* ', 'edumax-core' ),
                    'type'     => 'text',
                    'priority' => 10,
                    'default'  => ''
                ),
                array(
                    'settings' => 'twitter_auth_callback_url',
                    'label'    => esc_html__( 'Twitter Login auth redirect URL* ', 'edumax-core' ),
                    'type'     => 'text',
                    'priority' => 10,
                    'default'  => ''
                ),
            )//fields
        ),//logo_setting


		array(
			'id'              => 'logo_setting',
			'title'           => esc_html__( 'All Logo', 'edumax-core' ),
			'description'     => esc_html__( 'All Logo', 'edumax-core' ),
			'priority'        => 10,
			// 'active_callback' => 'is_front_page',
			'fields'         => array(
                array(
                    'settings' => 'logo',
                    'label'    => esc_html__( 'Upload Logo', 'edumax-core' ),
                    'type'     => 'upload',
                    'priority' => 10,
                    'default' => get_template_directory_uri().'/images/logo.png',
                ),
				array(
					'settings' => 'logo_style',
					'label'    => esc_html__( 'Select Logo Style', 'edumax-core' ),
					'type'     => 'select',
					'priority' => 10,
					'default'  => 'logoimg',
					'choices'  => array(
						'logoimg' => esc_html( 'Logo image', 'edumax-core' ),
						'logotext' => esc_html( 'Logo text', 'edumax-core' ),
					)
				),
				array(
					'settings' => 'logo_width',
					'label'    => esc_html__( 'Logo Width (value 0 for auto width)', 'edumax-core' ),
					'type'     => 'number',
                    'default'  => 0,
					'priority' => 10,
				),
				array(
					'settings' => 'logo_height',
					'label'    => esc_html__( 'Logo Height (value 0 for auto height)', 'edumax-core' ),
					'type'     => 'number',
					'priority' => 10,
				),
				array(
					'settings' => 'logo_text',
					'label'    => esc_html__( 'Custom Logo Text', 'edumax-core' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => 'edumax-core',
				),
				array(
					'settings' => 'logo-404',
					'label'    => esc_html__( 'Coming Soon Logo', 'edumax-core' ),
					'type'     => 'upload',
					'priority' => 10,
					'default'  => get_template_directory_uri().'/images/logo-404.png',
				),
			)//fields
		),//logo_setting

		array(
			'id'              => 'sub_header_banner',
			'title'           => esc_html__( 'Sub Header Banner', 'edumax-core' ),
			'description'     => esc_html__( 'sub header banner', 'edumax-core' ),
			'priority'        => 10,
			// 'active_callback' => 'is_front_page',
			'fields'         => array(

				array(
					'settings' => 'sub_header_padding_top',
					'label'    => esc_html__( 'Sub-Header Padding Top', 'edumax-core' ),
					'type'     => 'number',
					'priority' => 10,
					'default'  => 90,
				),
				array(
					'settings' => 'sub_header_padding_bottom',
					'label'    => esc_html__( 'Sub-Header Padding Bottom', 'edumax-core' ),
					'type'     => 'number',
					'priority' => 10,
					'default'  => 90,
				),
				array(
					'settings' => 'sub_header_margin_bottom',
					'label'    => esc_html__( 'Sub-Header Margin Bottom', 'edumax-core' ),
					'type'     => 'number',
					'priority' => 10,
					'default'  => 80,
				),
				array(
					'settings' => 'sub_header_banner_img',
					'label'    => esc_html__( 'Sub-Header Background Image', 'edumax-core' ),
					'type'     => 'upload',
					'priority' => 10,
				),
				array(
					'settings' => 'sub_header_title',
					'label'    => esc_html__( 'Title Settings', 'edumax-core' ),
					'type'     => 'title',
					'priority' => 10,
				),
				array(
					'settings' => 'sub_header_title_size',
					'label'    => esc_html__( 'Header Title Font Size', 'edumax-core' ),
					'type'     => 'number',
					'priority' => 10,
					'default'  => '49',
				),
				array(
					'settings' => 'sub_header_title_color',
					'label'    => esc_html__( 'Header Title Color', 'edumax-core' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#ffffff',
				),
				array(
					'settings' => 'breadcrumb_link_color',
					'label'    => esc_html__( 'Breadcrumb Link Color', 'edumax-core' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#ffffff',
				),
				array(
					'settings' => 'breadcrumb_link_hover_color',
					'label'    => esc_html__( 'Breadcrumb Link Color', 'edumax-core' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#ffffff',
				),
			)//fields
		),//sub_header_banner


		array(
			'id'              => 'typo_setting',
			'title'           => esc_html__( 'Typography Setting', 'edumax-core' ),
			'description'     => esc_html__( 'Typography Setting', 'edumax-core' ),
			'priority'        => 10,
			'fields'         => array(

				array(
					'settings' => 'font_title_body',
					'label'    => esc_html__( 'Body Font Options', 'edumax-core' ),
					'type'     => 'title',
					'priority' => 10,
				),
				//body font
				array(
					'settings' => 'body_google_font',
					'label'    => esc_html__( 'Select Google Font', 'edumax-core' ),
					'type'     => 'select',
					'default'  => 'Muli',
					'choices'  => get_google_fonts(),
					'google_font' => true,
					'google_font_weight' => 'body_font_weight',
					'google_font_weight_default' => '400'
				),
				array(
					'settings' => 'body_font_size',
					'label'    => esc_html__( 'Body Font Size', 'edumax-core' ),
					'type'     => 'number',
					'default'  => '14',
				),
				array(
					'settings' => 'body_font_height',
					'label'    => esc_html__( 'Body Font Line Height', 'edumax-core' ),
					'type'     => 'number',
					'default'  => '24',
				),
				array(
					'settings' => 'body_font_weight',
					'label'    => esc_html__( 'Body Font Weight', 'edumax-core' ),
					'type'     => 'select',
					'priority' => 10,
					'default'  => '400',
					'choices'  => array(
						'' => esc_html( 'Select', 'edumax-core' ),
						'100' => esc_html( '100', 'edumax-core' ),
						'200' => esc_html( '200', 'edumax-core' ),
						'300' => esc_html( '300', 'edumax-core' ),
						'400' => esc_html( '400', 'edumax-core' ),
						'500' => esc_html( '500', 'edumax-core' ),
						'600' => esc_html( '600', 'edumax-core' ),
						'700' => esc_html( '700', 'edumax-core' ),
						'800' => esc_html( '800', 'edumax-core' ),
						'900' => esc_html( '900', 'edumax-core' ),
					)
				),
				array(
					'settings' => 'body_font_color',
					'label'    => esc_html__( 'Body Font Color', 'edumax-core' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#6d7382',
				),
				array(
					'settings' => 'font_title_menu',
					'label'    => esc_html__( 'Menu Font Options', 'edumax-core' ),
					'type'     => 'title',
					'priority' => 10,
				),

				array(
					'settings' => 'font_title_h1',
					'label'    => esc_html__( 'Heading 1 Font Options', 'edumax-core' ),
					'type'     => 'title',
					'priority' => 10,
				),
				//Heading 1
				array(
					'settings' => 'h1_google_font',
					'label'    => esc_html__( 'Google Font', 'edumax-core' ),
					'type'     => 'select',
					'default'  => 'Quicksand',
					'choices'  => get_google_fonts(),
					'google_font' => true,
					'google_font_weight' => 'h1_font_weight',
					'google_font_weight_default' => '500'
				),
				array(
					'settings' => 'h1_font_size',
					'label'    => esc_html__( 'Font Size', 'edumax-core' ),
					'type'     => 'number',
					'default'  => '42',
				),
				array(
					'settings' => 'h1_font_height',
					'label'    => esc_html__( 'Font Line Height', 'edumax-core' ),
					'type'     => 'number',
					'default'  => '48',
				),
				array(
					'settings' => 'h1_font_weight',
					'label'    => esc_html__( 'Font Weight', 'edumax-core' ),
					'type'     => 'select',
					'priority' => 10,
					'default'  => '500',
					'choices'  => array(
						'' => esc_html( 'Select', 'edumax-core' ),
						'100' => esc_html( '100', 'edumax-core' ),
						'200' => esc_html( '200', 'edumax-core' ),
						'300' => esc_html( '300', 'edumax-core' ),
						'400' => esc_html( '400', 'edumax-core' ),
						'500' => esc_html( '500', 'edumax-core' ),
						'600' => esc_html( '600', 'edumax-core' ),
						'700' => esc_html( '700', 'edumax-core' ),
						'800' => esc_html( '800', 'edumax-core' ),
						'900' => esc_html( '900', 'edumax-core' ),
					)
				),
//				array(
//					'settings' => 'h1_font_color',
//					'label'    => esc_html__( 'Font Color', 'edumax-core' ),
//					'type'     => 'color',
//					'priority' => 10,
//					'default'  => '#333',
//				),

				array(
					'settings' => 'font_title_h2',
					'label'    => esc_html__( 'Heading 2 Font Options', 'edumax-core' ),
					'type'     => 'title',
					'priority' => 10,
				),
				//Heading 2
				array(
					'settings' => 'h2_google_font',
					'label'    => esc_html__( 'Google Font', 'edumax-core' ),
					'type'     => 'select',
					'default'  => 'Quicksand',
					'choices'  => get_google_fonts(),
					'google_font' => true,
					'google_font_weight' => 'h2_font_weight',
					'google_font_weight_default' => '500'
				),
				array(
					'settings' => 'h2_font_size',
					'label'    => esc_html__( 'Font Size', 'edumax-core' ),
					'type'     => 'number',
					'default'  => '36',
				),
				array(
					'settings' => 'h2_font_height',
					'label'    => esc_html__( 'Font Line Height', 'edumax-core' ),
					'type'     => 'number',
					'default'  => '36',
				),
				array(
					'settings' => 'h2_font_weight',
					'label'    => esc_html__( 'Font Weight', 'edumax-core' ),
					'type'     => 'select',
					'priority' => 10,
					'default'  => '500',
					'choices'  => array(
						'' => esc_html( 'Select', 'edumax-core' ),
						'100' => esc_html( '100', 'edumax-core' ),
						'200' => esc_html( '200', 'edumax-core' ),
						'300' => esc_html( '300', 'edumax-core' ),
						'400' => esc_html( '400', 'edumax-core' ),
						'500' => esc_html( '500', 'edumax-core' ),
						'600' => esc_html( '600', 'edumax-core' ),
						'700' => esc_html( '700', 'edumax-core' ),
						'800' => esc_html( '800', 'edumax-core' ),
						'900' => esc_html( '900', 'edumax-core' ),
					)
				),
//				array(
//					'settings' => 'h2_font_color',
//					'label'    => esc_html__( 'Font Color', 'edumax-core' ),
//					'type'     => 'color',
//					'priority' => 10,
//					'default'  => '#4B5981',
//				),

				array(
					'settings' => 'font_title_h3',
					'label'    => esc_html__( 'Heading 3 Font Options', 'edumax-core' ),
					'type'     => 'title',
					'priority' => 10,
				),
				//Heading 3
				array(
					'settings' => 'h3_google_font',
					'label'    => esc_html__( 'Google Font', 'edumax-core' ),
					'type'     => 'select',
					'default'  => 'Quicksand',
					'choices'  => get_google_fonts(),
					'google_font' => true,
					'google_font_weight' => 'h3_font_weight',
					'google_font_weight_default' => '600'
				),
				array(
					'settings' => 'h3_font_size',
					'label'    => esc_html__( 'Font Size', 'edumax-core' ),
					'type'     => 'number',
					'default'  => '26',
				),
				array(
					'settings' => 'h3_font_height',
					'label'    => esc_html__( 'Font Line Height', 'edumax-core' ),
					'type'     => 'number',
					'default'  => '28',
				),
				array(
					'settings' => 'h3_font_weight',
					'label'    => esc_html__( 'Font Weight', 'edumax-core' ),
					'type'     => 'select',
					'priority' => 10,
					'default'  => '500',
					'choices'  => array(
						'' => esc_html( 'Select', 'edumax-core' ),
						'100' => esc_html( '100', 'edumax-core' ),
						'200' => esc_html( '200', 'edumax-core' ),
						'300' => esc_html( '300', 'edumax-core' ),
						'400' => esc_html( '400', 'edumax-core' ),
						'500' => esc_html( '500', 'edumax-core' ),
						'600' => esc_html( '600', 'edumax-core' ),
						'700' => esc_html( '700', 'edumax-core' ),
						'800' => esc_html( '800', 'edumax-core' ),
						'900' => esc_html( '900', 'edumax-core' ),
					)
				),


				array(
					'settings' => 'font_title_h4',
					'label'    => esc_html__( 'Heading 4 Font Options', 'edumax-core' ),
					'type'     => 'title',
					'priority' => 10,
				),
				//Heading 4
				array(
					'settings' => 'h4_google_font',
					'label'    => esc_html__( 'Heading4 Google Font', 'edumax-core' ),
					'type'     => 'select',
					'default'  => 'Quicksand',
					'choices'  => get_google_fonts(),
					'google_font' => true,
					'google_font_weight' => 'h4_font_weight',
					'google_font_weight_default' => '600'
				),
				array(
					'settings' => 'h4_font_size',
					'label'    => esc_html__( 'Heading4 Font Size', 'edumax-core' ),
					'type'     => 'number',
					'default'  => '18',
				),
				array(
					'settings' => 'h4_font_height',
					'label'    => esc_html__( 'Heading4 Font Line Height', 'edumax-core' ),
					'type'     => 'number',
					'default'  => '26',
				),
				array(
					'settings' => 'h4_font_weight',
					'label'    => esc_html__( 'Heading4 Font Weight', 'edumax-core' ),
					'type'     => 'select',
					'priority' => 10,
					'default'  => '500',
					'choices'  => array(
						'' => esc_html( 'Select', 'edumax-core' ),
						'100' => esc_html( '100', 'edumax-core' ),
						'200' => esc_html( '200', 'edumax-core' ),
						'300' => esc_html( '300', 'edumax-core' ),
						'400' => esc_html( '400', 'edumax-core' ),
						'500' => esc_html( '500', 'edumax-core' ),
						'600' => esc_html( '600', 'edumax-core' ),
						'700' => esc_html( '700', 'edumax-core' ),
						'800' => esc_html( '800', 'edumax-core' ),
						'900' => esc_html( '900', 'edumax-core' ),
					)
				),
//				array(
//					'settings' => 'h4_font_color',
//					'label'    => esc_html__( 'Heading4 Font Color', 'edumax-core' ),
//					'type'     => 'color',
//					'priority' => 10,
//					'default'  => '#4B5981',
//				),

				array(
					'settings' => 'font_title_h5',
					'label'    => esc_html__( 'Heading 5 Font Options', 'edumax-core' ),
					'type'     => 'title',
					'priority' => 10,
				),

				//Heading 5
				array(
					'settings' => 'h5_google_font',
					'label'    => esc_html__( 'Heading5 Google Font', 'edumax-core' ),
					'type'     => 'select',
					'default'  => 'Quicksand',
					'choices'  => get_google_fonts(),
					'google_font' => true,
					'google_font_weight' => 'h5_font_weight',
					'google_font_weight_default' => '600'
				),
				array(
					'settings' => 'h5_font_size',
					'label'    => esc_html__( 'Heading5 Font Size', 'edumax-core' ),
					'type'     => 'number',
					'default'  => '14',
				),
				array(
					'settings' => 'h5_font_height',
					'label'    => esc_html__( 'Heading5 Font Line Height', 'edumax-core' ),
					'type'     => 'number',
					'default'  => '24',
				),
				array(
					'settings' => 'h5_font_weight',
					'label'    => esc_html__( 'Heading5 Font Weight', 'edumax-core' ),
					'type'     => 'select',
					'priority' => 10,
					'default'  => '500',
					'choices'  => array(
						'' => esc_html( 'Select', 'edumax-core' ),
						'100' => esc_html( '100', 'edumax-core' ),
						'200' => esc_html( '200', 'edumax-core' ),
						'300' => esc_html( '300', 'edumax-core' ),
						'400' => esc_html( '400', 'edumax-core' ),
						'500' => esc_html( '500', 'edumax-core' ),
						'600' => esc_html( '600', 'edumax-core' ),
						'700' => esc_html( '700', 'edumax-core' ),
						'800' => esc_html( '800', 'edumax-core' ),
						'900' => esc_html( '900', 'edumax-core' ),
					)
				),


			)//fields
		),//typo_setting

		array(
			'id'              => 'layout_styling',
			'title'           => esc_html__( 'Layout & Styling', 'edumax-core' ),
			'description'     => esc_html__( 'Layout & Styling', 'edumax-core' ),
			'priority'        => 10,
			'fields'         => array(
				array(
					'settings' => 'boxfull_en',
					'label'    => esc_html__( 'Select BoxWidth of FullWidth', 'edumax-core' ),
					'type'     => 'select',
					'priority' => 10,
					'default'  => 'fullwidth',
					'choices'  => array(
						'boxwidth' => esc_html__( 'BoxWidth', 'edumax-core' ),
						'fullwidth' => esc_html__( 'FullWidth', 'edumax-core' ),
					)
				),
				array(
					'settings' => 'body_bg_color',
					'label'    => esc_html__( 'Body Background Color', 'edumax-core' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#F6FAFB',
				),

				array(
					'settings' => 'body_bg_img',
					'label'    => esc_html__( 'Body Background Image', 'edumax-core' ),
					'type'     => 'image',
					'priority' => 10,
				),
				array(
					'settings' => 'body_bg_attachment',
					'label'    => esc_html__( 'Body Background Attachment', 'edumax-core' ),
					'type'     => 'select',
					'priority' => 10,
					'default'  => 'fixed',
					'choices'  => array(
						'scroll' => esc_html__( 'Scroll', 'edumax-core' ),
						'fixed' => esc_html__( 'Fixed', 'edumax-core' ),
						'inherit' => esc_html__( 'Inherit', 'edumax-core' ),
					)
				),
				array(
					'settings' => 'body_bg_repeat',
					'label'    => esc_html__( 'Body Background Repeat', 'edumax-core' ),
					'type'     => 'select',
					'priority' => 10,
					'default'  => 'no-repeat',
					'choices'  => array(
						'repeat' => esc_html__( 'Repeat', 'edumax-core' ),
						'repeat-x' => esc_html__( 'Repeat Horizontally', 'edumax-core' ),
						'repeat-y' => esc_html__( 'Repeat Vertically', 'edumax-core' ),
						'no-repeat' => esc_html__( 'No Repeat', 'edumax-core' ),
					)
				),
				array(
					'settings' => 'body_bg_size',
					'label'    => esc_html__( 'Body Background Size', 'edumax-core' ),
					'type'     => 'select',
					'priority' => 10,
					'default'  => 'cover',
					'choices'  => array(
						'cover' => esc_html__( 'Cover', 'edumax-core' ),
						'contain' => esc_html__( 'Contain', 'edumax-core' ),
					)
				),
				array(
					'settings' => 'body_bg_position',
					'label'    => esc_html__( 'Body Background Position', 'edumax-core' ),
					'type'     => 'select',
					'priority' => 10,
					'default'  => 'left top',
					'choices'  => array(
						'left top' => esc_html__('left top', 'edumax-core'),
						'left center' => esc_html__('left center', 'edumax-core'),
						'left bottom' => esc_html__('left bottom', 'edumax-core'),
						'right top' => esc_html__('right top', 'edumax-core'),
						'right center' => esc_html__('right center', 'edumax-core'),
						'right bottom' => esc_html__('right bottom', 'edumax-core'),
						'center top' => esc_html__('center top', 'edumax-core'),
						'center center' => esc_html__('center center', 'edumax-core'),
						'center bottom' => esc_html__('center bottom', 'edumax-core'),
					)
				),
				array(
					'settings' => 'custom_preset_en',
					'label'    => esc_html__( 'Set Custom Color', 'edumax-core' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => true,
				),
				array(
					'settings' => 'major_color',
					'label'    => esc_html__( 'Major Color', 'edumax-core' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#008CC9',
				),
				array(
					'settings' => 'hover_color',
					'label'    => esc_html__( 'Hover Color', 'edumax-core' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#006fa0',
				),
                array(
					'settings' => 'heading_color',
					'label'    => esc_html__( 'Heading Color', 'edumax-core' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#4B5981',
				),
                array(
                    'settings' => 'text_color',
                    'label'    => esc_html__( 'Text Color', 'edumax-core' ),
                    'type'     => 'color',
                    'priority' => 10,
                    'default'  => '#6d7382',
                ),


			)//fields
		),//Layout & Styling


		array(
			'id'              => 'social_media_settings',
			'title'           => esc_html__( 'Social Media', 'edumax-core' ),
			'description'     => esc_html__( 'Social Media', 'edumax-core' ),
			'priority'        => 10,
			// 'active_callback' => 'is_front_page',
			'fields'         => array(
				array(
					'settings' => 'wp_facebook',
					'label'    => esc_html__( 'Add Facebook URL', 'edumax-core' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '#',
				),
				array(
					'settings' => 'wp_twitter',
					'label'    => esc_html__( 'Add Twitter URL', 'edumax-core' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '#',
				),
				array(
					'settings' => 'wp_google_plus',
					'label'    => esc_html__( 'Add Goole Plus URL', 'edumax-core' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '#',
				),
				array(
					'settings' => 'wp_pinterest',
					'label'    => esc_html__( 'Add Pinterest URL', 'edumax-core' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '#',
				),
				array(
					'settings' => 'wp_youtube',
					'label'    => esc_html__( 'Add Youtube URL', 'edumax-core' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '',
				),
				array(
					'settings' => 'wp_linkedin',
					'label'    => esc_html__( 'Add Linkedin URL', 'edumax-core' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '',
				),
				array(
					'settings' => 'wp_linkedin_user',
					'label'    => esc_html__( 'Linkedin Username( For Share )', 'edumax-core' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '',
				),

				array(
					'settings' => 'wp_instagram',
					'label'    => esc_html__( 'Add Instagram URL', 'edumax-core' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '#',
				),
				array(
					'settings' => 'wp_dribbble',
					'label'    => esc_html__( 'Add Dribbble URL', 'edumax-core' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '',
				),
				array(
					'settings' => 'wp_behance',
					'label'    => esc_html__( 'Add Behance URL', 'edumax-core' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '',
				),
				array(
					'settings' => 'wp_flickr',
					'label'    => esc_html__( 'Add Flickr URL', 'edumax-core' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '',
				),
				array(
					'settings' => 'wp_vk',
					'label'    => esc_html__( 'Add Vk URL', 'edumax-core' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '',
				),
				array(
					'settings' => 'wp_skype',
					'label'    => esc_html__( 'Add Skype URL', 'edumax-core' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '',
				),
			)//fields
		),//social_media

		array(
			'id'              => 'coming_soon',
			'title'           => esc_html__( 'Coming Soon', 'edumax-core' ),
			'description'     => esc_html__( 'Coming Soon', 'edumax-core' ),
			'priority'        => 10,
			// 'active_callback' => 'is_front_page',
			'fields'         => array(

				array(
					'settings' => 'comingsoon_en',
					'label'    => esc_html__( 'Enable Coming Soon', 'edumax-core' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => false,
				),

				array(
					'settings' => 'comingsoontitle',
					'label'    => esc_html__( 'Add Coming Soon Title', 'edumax-core' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => esc_html__( 'Coming Soon', 'edumax-core' ),
				),

				array(
					'settings' => 'comingsoon_date',
					'label'    => esc_html__( 'Coming Soon date', 'edumax-core' ),
					'type'     => 'date',
					'priority' => 10,
					'default'  => '2020-08-09',
				),
				array(
					'settings' => 'newsletter',
					'label'    => esc_html__( 'Add mailchimp Form Shortcode Here', 'edumax-core' ),
					'type'     => 'textarea',
					'priority' => 10,
					'default'  => '',
				),
				array(
					'settings' => 'coming_description',
					'label'    => esc_html__( 'Coming Soon Description', 'edumax-core' ),
					'type'     => 'textarea',
					'priority' => 10,
					'default'  => esc_html__('We are come back soon', 'edumax-core'),
				),
				array(
					'settings' => 'comingsoon_twitter',
					'label'    => esc_html__( 'Add Twitter URL', 'edumax-core' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '',
				),
				array(
					'settings' => 'comingsoon_google_plus',
					'label'    => esc_html__( 'Add Google Plus URL', 'edumax-core' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '',
				),
				array(
					'settings' => 'comingsoon_pinterest',
					'label'    => esc_html__( 'Add Pinterest URL', 'edumax-core' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '',
				),
				array(
					'settings' => 'comingsoon_youtube',
					'label'    => esc_html__( 'Add Youtube URL', 'edumax-core' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '',
				),
				array(
					'settings' => 'comingsoon_linkedin',
					'label'    => esc_html__( 'Add Linkedin URL', 'edumax-core' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '',
				),
				array(
					'settings' => 'comingsoon_dribbble',
					'label'    => esc_html__( 'Add Dribbble URL', 'edumax-core' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '',
				),
				array(
					'settings' => 'comingsoon_instagram',
					'label'    => esc_html__( 'Add Instagram URL', 'edumax-core' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '',
				),
			)//fields
		),//coming_soon
		array(
			'id'              => '404_settings',
			'title'           => esc_html__( '404 Page', 'edumax-core' ),
			'description'     => esc_html__( '404 page background and text settings', 'edumax-core' ),
			'priority'        => 10,
			// 'active_callback' => 'is_front_page',
			'fields'         => array(
				array(
					'settings' => '404_title',
					'label'    => esc_html__( '404 Page Title', 'edumax-core' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => esc_html__('The page doesn’t exist.', 'edumax-core')
				),
				array(
					'settings' => '404_description',
					'label'    => esc_html__( '404 Page Description', 'edumax-core' ),
					'type'     => 'textarea',
					'priority' => 10,
					'default'  => ''
				),
				array(
					'settings' => '404_btn_text',
					'label'    => esc_html__( '404 Button Text', 'edumax-core' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => esc_html__('Go Back', 'edumax-core')
				),
			)
		),

		array(
			'id'              => 'blog_setting',
			'title'           => esc_html__( 'Blog Setting', 'edumax-core' ),
			'description'     => esc_html__( 'Blog Setting', 'edumax-core' ),
			'priority'        => 10,
			'fields'         => array(
				array(
					'settings' => 'blog_column',
					'label'    => esc_html__( 'Select Blog Column', 'edumax-core' ),
					'type'     => 'select',
					'priority' => 10,
					'default'  => '6',
					'choices'  => array(
						'12' => esc_html( 'Column 1', 'edumax-core' ),
						'6' => esc_html( 'Column 2', 'edumax-core' ),
						'4' => esc_html( 'Column 3', 'edumax-core' ),
						'3' => esc_html( 'Column 4', 'edumax-core' ),
					)
				),
                array(
                    'settings' => 'enable_sidebar',
                    'label'    => esc_html__( 'Enable Blog Sidebar', 'edumax-core' ),
                    'type'     => 'switch',
                    'priority' => 10,
                    'default'  => true,
                ),
				array(
					'settings' => 'blog_date',
					'label'    => esc_html__( 'Enable Blog Date', 'edumax-core' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => false,
				),
				array(
					'settings' => 'blog_author',
					'label'    => esc_html__( 'Enable Blog Author', 'edumax-core' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => true,
				),
				array(
					'settings' => 'blog_category',
					'label'    => esc_html__( 'Enable Blog Category', 'edumax-core' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => true,
				),
				array(
					'settings' => 'blog_tags',
					'label'    => esc_html__( 'Enable Tags', 'edumax-core' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => false,
				),
				array(
					'settings' => 'blog_hit',
					'label'    => esc_html__( 'Enable Blog Hit Count', 'edumax-core' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => false,
				),
				array(
					'settings' => 'blog_intro_text_en',
					'label'    => esc_html__( 'Enable Intro Text', 'edumax-core' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => false,
				),
				array(
					'settings' => 'blog_continue_en',
					'label'    => esc_html__( 'Enable Blog Readmore', 'edumax-core' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => false,
				),
                /*array(
                    'settings' => 'blog_social_share',
                    'label'    => esc_html__( 'Enable Blog Social Share', 'edumax-core' ),
                    'type'     => 'switch',
                    'priority' => 10,
                    'default'  => false,
                ),*/
				array(
					'settings' => 'blog_comment',
					'label'    => esc_html__( 'Enable Comment', 'edumax-core' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => false,
				),
				array(
					'settings' => 'blog_post_text_limit',
					'label'    => esc_html__( 'Post character Limit', 'edumax-core' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => '220',
				),
				array(
					'settings' => 'blog_continue',
					'label'    => esc_html__( 'Continue Reading', 'edumax-core' ),
					'type'     => 'text',
					'priority' => 10,
					'default'  => 'Read More',
				),
			)//fields
		),//blog_setting



		array(
			'id'              => 'blog_single_setting',
			'title'           => esc_html__( 'Blog Single Page Setting', 'edumax-core' ),
			'description'     => esc_html__( 'Blog Single Page Setting', 'edumax-core' ),
			'priority'        => 10,
			'fields'         => array(

				array(
					'settings' => 'enable_sidebar_single',
					'label'    => esc_html__( 'Enable Blog Sidebar', 'edumax-core' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => true,
				),
				array(
					'settings' => 'blog_date_single',
					'label'    => esc_html__( 'Enable Blog Date', 'edumax-core' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => true,
				),
				array(
					'settings' => 'blog_author_single',
					'label'    => esc_html__( 'Enable Blog Author', 'edumax-core' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => true,
				),
				array(
					'settings' => 'blog_category_single',
					'label'    => esc_html__( 'Enable Blog Category', 'edumax-core' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => true,
				),
				array(
					'settings' => 'blog_tags_single',
					'label'    => esc_html__( 'Enable Tags', 'edumax-core' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => true,
				),
				array(
					'settings' => 'blog_hit_single',
					'label'    => esc_html__( 'Enable Blog Hit Count', 'edumax-core' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => true,
				),
				array(
					'settings' => 'blog_comment_single',
					'label'    => esc_html__( 'Enable Comment', 'edumax-core' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => true,
				),
                array(
					'settings' => 'blog_nav_link',
					'label'    => esc_html__( 'Enable Post Navigation', 'edumax-core' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => true,
				),

			) #fields
		),
		#blog_single_page_setting



		array(
			'id'              => 'bottom_setting',
			'title'           => esc_html__( 'Widget Area Setting', 'edumax-core' ),
			'description'     => esc_html__( 'Widget Area Setting', 'edumax-core' ),
			'priority'        => 10,
			'fields'         => array(
				array(
					'settings' => 'bottom_en',
					'label'    => esc_html__( 'Enable Bottom Area', 'edumax-core' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => true,
				),
				array(
					'settings' => 'bottom_column',
					'label'    => esc_html__( 'Select Bottom Column', 'edumax-core' ),
					'type'     => 'select',
					'priority' => 10,
					'default'  => '3',
					'choices'  => array(
						'12' => esc_html( 'Column 1', 'edumax-core' ),
						'6' => esc_html( 'Column 2', 'edumax-core' ),
						'4' => esc_html( 'Column 3', 'edumax-core' ),
						'3' => esc_html( 'Column 4', 'edumax-core' ),
					)
				),
				array(
					'settings' => 'bottom_color',
					'label'    => esc_html__( 'Bottom background Color', 'edumax-core' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#282836',
				),
				array(
					'settings' => 'bottom_text_color',
					'label'    => esc_html__( 'Bottom Text Color', 'edumax-core' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#B1B8C9',
				),
				array(
					'settings' => 'bottom_link_color',
					'label'    => esc_html__( 'Bottom Link Color', 'edumax-core' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#8C94A8',
				),
				array(
					'settings' => 'bottom_hover_color',
					'label'    => esc_html__( 'Bottom link hover color', 'edumax-core' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#50a2ff',
				),
				array(
					'settings' => 'bottom_padding_top',
					'label'    => esc_html__( 'Bottom Top Padding', 'edumax-core' ),
					'type'     => 'number',
					'priority' => 10,
					'default'  => 80,
				),
				array(
					'settings' => 'bottom_padding_bottom',
					'label'    => esc_html__( 'Bottom Padding Bottom', 'edumax-core' ),
					'type'     => 'number',
					'priority' => 10,
					'default'  => 45,
				),
			)//fields
		),//bottom_setting
		array(
			'id'              => 'footer_setting',
			'title'           => esc_html__( 'Footer Setting', 'edumax-core' ),
			'description'     => esc_html__( 'Footer Setting', 'edumax-core' ),
			'priority'        => 10,
			'fields'         => array(
				array(
					'settings' => 'footer_en',
					'label'    => esc_html__( 'Enable Footer', 'edumax-core' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => true,
				),
				array(
					'settings' => 'copyright_en',
					'label'    => esc_html__( 'Enable copyright text', 'edumax-core' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => true,
				),
				array(
					'settings' => 'bottom_footer_menu',
					'label'    => esc_html__( 'Enable Footer Menu', 'edumax-core' ),
					'type'     => 'switch',
					'priority' => 10,
					'default'  => true,
				),
				array(
					'settings' => 'copyright_text',
					'label'    => esc_html__( 'Copyright Text', 'edumax-core' ),
					'type'     => 'textarea',
					'priority' => 10,
					'default'  => esc_html__( '© 2017 Edumax. All Rights Reserved.', 'edumax-core' ),
				),
				array(
					'settings' => 'copyright_text_color',
					'label'    => esc_html__( 'Footer Text Color', 'edumax-core' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#8C94A8',
				),
				array(
					'settings' => 'copyright_link_color',
					'label'    => esc_html__( 'Footer Link Color', 'edumax-core' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#8C94A8',
				),
				array(
					'settings' => 'copyright_hover_color',
					'label'    => esc_html__( 'Footer link hover color', 'edumax-core' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#ffffff',
				),
				array(
					'settings' => 'copyright_bg_color',
					'label'    => esc_html__( 'Footer background color', 'edumax-core' ),
					'type'     => 'color',
					'priority' => 10,
					'default'  => '#333A4F',
				),
				array(
					'settings' => 'copyright_padding_top',
					'label'    => esc_html__( 'Footer Top Padding', 'edumax-core' ),
					'type'     => 'number',
					'priority' => 10,
					'default'  => 25,
				),
				array(
					'settings' => 'copyright_padding_bottom',
					'label'    => esc_html__( 'Footer Bottom Padding', 'edumax-core' ),
					'type'     => 'number',
					'priority' => 10,
					'default'  => 25,
				),
			)//fields
		),//footer_setting

	),
);//edumax_panel_options


$framework = new THM_Customize( $panel_to_section );
