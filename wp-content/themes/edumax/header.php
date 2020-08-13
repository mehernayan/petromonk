<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php echo esc_url(bloginfo( 'pingback_url' )); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
$layout = get_theme_mod( 'boxfull_en', 'fullwidth' );
$headerlayout = get_theme_mod( 'head_style', 'solid' );
$header_fixed = get_theme_mod( 'header_fixed', false ) ? 'fixed_header' : '';
$header_class = $headerlayout.' '.$header_fixed;
?>
<div id="page" class="hfeed site <?php echo esc_attr($layout); ?>">
    <header id="masthead" class="site-header header header-<?php echo esc_attr($header_class);?>  ">
        <div class="container">
            <div class="main-menu-wrap row align-items-center no-gutters">
                <div class="col col-lg-auto order-1">
                    <div class="themeum-navbar-header">
                        <div class="logo-wrapper">
                            <a class="themeum-navbar-brand" href="<?php echo esc_url(site_url()); ?>">
                                <?php
                                $logoimg   = get_theme_mod( 'logo', get_parent_theme_file_uri().'/images/logo.png' );
                                $logotext  = get_theme_mod( 'logo_text', 'edumax' );
                                $logotype  = get_theme_mod( 'logo_style', 'logoimg' );

                                if($logotype == 'logoimg') {
                                    if(!empty($logoimg)){
                                        echo '<img 
                                              class="enter-logo img-responsive" 
                                              src="'.esc_url($logoimg).'" 
                                              alt="'.esc_html('Logo', 'edumax').'"
                                              title="'.esc_html('Logo', 'edumax').'"
                                        />';
                                    }else{
                                        echo get_bloginfo('name');
                                    }
                                }else{
                                    if(!empty($logotext)){
                                        echo esc_html($logotext);
                                    }else{
                                        echo get_bloginfo('name');
                                    }
                                }
                                ?>
                            </a>
                        </div>
                    </div><!--/#themeum-navbar-header-->
                </div><!--/.col-sm-2-->

                <?php

                if( ! class_exists('wp_megamenu_initial_setup')) { ?>
                    <div class="col-auto d-lg-none order-lg-2 order-4">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><i class="fas fa-bars"></i></button>
                    </div>
                    <div id="mobile-menu" class="d-lg-none thm-mobile-menu order-lg-2 order-3">
                        <div class="collapse navbar-collapse">
                            <?php
                            if ( has_nav_menu( 'primary' ) ) {
                                wp_nav_menu(
                                    array(
                                        'theme_location'    => 'primary',
                                        'container'      => false,
                                        'menu_class'      => 'nav navbar-nav',
                                        'fallback_cb'    => 'wp_page_menu',
                                        'depth'        => 3,
                                        'walker'        => new wp_bootstrap_mobile_navwalker()
                                    )
                                );
                            } ?>
                        </div>
                    </div><!--/.#mobile-menu-->
                <?php } ?>

                <div class="d-lg-none col-12 order-lg-3 order-5 header-empty-column"></div>

                <div class="col-auto thm-cat-col order-lg-4 order-5">
                    <?php
                    $en_header_cat_menu = get_theme_mod('en_header_cat_menu', false);
                    $category_menu_label = get_theme_mod('category_menu_label', 'Category');
                    if($en_header_cat_menu && taxonomy_exists('course-category')) :
                        ?>
                        <div class="header-cat-menu">
                            <div>
                                <?php echo esc_html($category_menu_label); ?>
                                <i class="fas fa-caret-down"></i>
                            </div>
                            <ul>
                                <?php
                                wp_list_categories(
                                    array(
                                        'taxonomy' => 'course-category',
                                        'title_li' => ''
                                    )
                                );

                                ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div><!--/.thm-cat-col-->

                <?php

                if( ! class_exists('wp_megamenu_initial_setup') ) { ?>
                <div class="col common-menu d-none d-lg-block order-lg-7">
                    <?php } else { ?>
                    <div class="col common-menu order-lg-5">
                        <?php } ?>
                        <?php if ( has_nav_menu( 'primary' ) ) { ?>
                            <div id="main-menu" class="common-menu-wrap">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'primary',
                                        'container'	  => '',
                                        'menu_class'	 => 'navigation-menu',
                                        'fallback_cb'	=> 'wp_page_menu',
                                        'depth'		  => 4,
                                    )
                                );
                                ?>
                            </div><!--/.col-sm-9-->
                        <?php  } ?>
                    </div><!--/#main-menu-->
                    
                    <?php if(get_theme_mod('en_header_search', true)) {?>
                    <div class="col col-lg-auto order-lg-6 order-6 header-search-wrap">
                        <?php
                            if(shortcode_exists('course_search')) echo do_shortcode('[course_search class="edumax-header-search"]');
                        ?>
                    </div>
                    <?php }?>

                    <?php
                        $en_header_shopping_cart = get_theme_mod('en_header_shopping_cart', true);
                        if($en_header_shopping_cart){
                    ?>
                        <div class="col-auto order-lg-7 order-3">
                            <?php echo edumax_header_cart(); ?>
                        </div>
                    <?php
                        }
                    ?>


                    <?php
                        $header_login_btn = get_theme_mod('header_login_btn', true);
                        $header_login_btn_text = get_theme_mod('header_login_btn_text', 'Log in');
                        $header_reg_btn_text = get_theme_mod('header_reg_btn_text', 'Get Started');

                    if(!is_user_logged_in() && $header_login_btn) { ?>
                        <div class="col-auto order-lg-7 order-2">
                            <div class="header_btn_group">
                                <?php

                                if(function_exists('edumax_core_language_load')) : ?>
                                    <a  class="login-popup edumax-login-tab-toggle" href='#tab-1'><?php echo esc_html($header_login_btn_text) ?></a>
                                    <a  class="edumax_btn btn-fill btn_sm login-popup edumax-login-tab-toggle"  href='#tab-2'>
                                        <?php echo esc_html($header_reg_btn_text); ?>
                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo esc_url(wp_login_url(home_url())); ?>" class="edumax_btn btn-fill btn_sm">
                                        <?php
                                            esc_html_e('Login | Sign Up', 'edumax');
                                        ?>
                                        <span class="d-md-none"><i class="fas fa-lock"></i></span>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php }
                        if(is_user_logged_in()){ ?>
                            <div class="col-auto order-lg-7 order-2">
                                <div class="header_profile_menu">
                                    <div class="edumax_header_profile_photo">
                                        <?php
                                            if(function_exists('tutor_utils')){
                                                echo tutor_utils()->get_tutor_avatar(get_current_user_id(), 'thumbnail');
                                            }else{
                                                $get_avatar_url = get_avatar_url(get_current_user_id(), 'thumbnail');
                                                echo "<img alt='' src='$get_avatar_url' />";
                                            }
                                        ?>
                                    </div>
                                    <ul>
                                        <?php
                                            if(function_exists('tutor_utils')) {
                                                $dashboard_page_id = tutor_utils()->get_option('tutor_dashboard_page_id');
                                                $dashboard_pages = tutor_utils()->tutor_dashboard_pages();
                        
                                                foreach ($dashboard_pages as $dashboard_key => $dashboard_page){
                                                    $menu_title = $dashboard_page;
                                                    $menu_link = tutils()->get_tutor_dashboard_page_permalink($dashboard_key);
                                                    $separator = false;
                                                    if (is_array($dashboard_page)){
                                                        if(!current_user_can(tutor()->instructor_role)) continue;
                                                        $menu_title = tutor_utils()->array_get('title', $dashboard_page);
                                                        /**
                                                         * Add new menu item property "url" for custom link
                                                         */
                                                        if (isset($dashboard_page['url'])){
                                                            $menu_link = $dashboard_page['url'];
                                                        }
                                                        if (isset($dashboard_page['type']) && $dashboard_page['type'] == 'separator'){
                                                            $separator = true;
                                                        }
                                                    }
                                                    if ($separator) {
                                                        echo '<li class="tutor-dashboard-menu-divider"></li>';
                                                        if ($menu_title) {
                                                            echo "<li class='tutor-dashboard-menu-divider-header'>{$menu_title}</li>";
                                                        }
                                                    } else {
                                                        if ($dashboard_key === 'index') $dashboard_key = '';
                                                        echo "<li><a href='".esc_url($menu_link)."'>".esc_html($menu_title)." </a> </li>";
                                                    }
                                                }
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <?php
                        }

                    ?>

                </div><!--/.main-menu-wrap-->
            </div><!--/.container-->
    </header><!--/.header-->