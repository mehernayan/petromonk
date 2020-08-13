<?php

#Essential Shortcode

require_once (EDUMAX_DIR.'/lib/shortcode/course-archive.php');

/*-------------------------------------------------------
 *              Themeum Supports and Image Cut
 *-------------------------------------------------------*/
if(!function_exists('edumax_setup')):

    function edumax_setup(){
        load_theme_textdomain( 'edumax', get_template_directory() . '/languages' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_image_size( 'edumax-large', 1140, 570, true );
        add_image_size( 'edumax-medium', 362, 190, true );
        add_image_size( 'edumax-blog-medium', 352, 197, true );
        add_image_size( 'portfo-small', 82, 64, true );
        add_theme_support( 'post-formats', array( 'audio','gallery','image','link','quote','video' ) );
        add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form' ) );
        add_theme_support( 'automatic-feed-links' );


        # Add support for Block Styles.
        add_theme_support( 'wp-block-styles' );

        # Add support for full and wide align images.
        add_theme_support( 'align-wide' );

        # Add support for editor styles.
        add_theme_support( 'editor-styles' );

        # Enqueue editor styles.
        add_editor_style( 'style-editor.css' );

        # Add support for font size.
        add_theme_support( 'editor-font-sizes', array(
            array(
                'name' => __( 'small', 'edumax' ),
                'shortName' => __( 'S', 'edumax' ),
                'size' => 14,
                'slug' => 'small'
            ),
            array(
                'name' => __( 'regular', 'edumax' ),
                'shortName' => __( 'M', 'edumax' ),
                'size' => 16,
                'slug' => 'regular'
            ),
            array(
                'name' => __( 'large', 'edumax' ),
                'shortName' => __( 'L', 'edumax' ),
                'size' => 22,
                'slug' => 'large'
            ),
            array(
                'name' => __( 'larger', 'edumax' ),
                'shortName' => __( 'XL', 'edumax' ),
                'size' => 38,
                'slug' => 'larger'
            )
        ) );


        if ( ! isset( $content_width ) ){
            $content_width = 660;
        }
    }
    add_action('after_setup_theme','edumax_setup');

endif;


/* -------------------------------------------
*             License for Edumax Theme
* -------------------------------------------- */
require_once( EDUMAX_DIR . '/lib/license/class.edumax-theme-license.php');

/* -------------------------------------------
*        		Licence Code
* ------------------------------------------- */

if (is_user_logged_in() && user_can(get_current_user_id(), 'manage_options')) {
    add_action('admin_menu', 'edumax_options_menu');

    if (!function_exists('edumax_options_menu')) {
        function edumax_options_menu()
        {
            $personalblog_option_page = add_menu_page('Edumax Options', 'Edumax Options', 'manage_options', 'edumax-options', 'edumax_option_callback');
            add_action('load-' . $personalblog_option_page, 'edumax_option_page_check');
        }
    }
}
function edumax_option_callback(){}
function edumax_option_page_check(){
    global $current_screen;
    if ($current_screen->id === 'toplevel_page_edumax-options'){
        wp_redirect(admin_url('customize.php'));
    }
}

/*-------------------------------------------------------
*              Themeum Pagination
*-------------------------------------------------------*/
if(!function_exists('edumax_pagination')):

    function edumax_pagination( $page_numb , $max_page ){
        $big = 999999999;
        echo '<div class="edumax-pagination">';
        echo paginate_links( array(
            'base'          => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format'        => '?paged=%#%',
            'current'       => $page_numb,
            'prev_text'     => __('<i class="fas fa-angle-left" aria-hidden="true"></i>','edumax'),
            'next_text'     => __('<i class="fas fa-angle-right" aria-hidden="true"></i>','edumax'),
            'total'         => $max_page,
            'type'          => 'list',
        ) );
        echo '</div>';
    }

endif;


/*-------------------------------------------------------
 *              Themeum Comment
 *-------------------------------------------------------*/
if(!function_exists('edumax_comment')):

    function edumax_comment($comment, $args, $depth){
        $GLOBALS['comment'] = $comment;
        switch ( $comment->comment_type ) :
            case 'pingback' :
            case 'trackback' :
        ?>
        <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
        <?php
            break;
            default :
            global $post;
        ?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
            <div id="comment-<?php comment_ID(); ?>" class="comment-body row no-gutters">
                <div class="comment-avartar col-auto">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
                        </div>
                        <div class="comment-head col">
                            <?php echo '<div class="comment-author">' . get_the_author() . '</div>'; ?>
                            <div class="comment-date"><?php echo get_comment_date() ?></div>
                        </div>
                    </div>
                </div>
                <div class="comment-right col ">
                    <div class="comment-context">
                        <?php if ( '0' == $comment->comment_approved ) : ?>
                            <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'edumax' ); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="comment-content">
                        <?php comment_text(); ?>
                    </div>
                    <div class="comment-bottom-links">
                        <span class="comment-reply">
                            <?php comment_reply_link( array_merge( $args, array( 'reply_text' => '<i class="fas fa-reply-all"></i>'.esc_html__( 'Reply', 'edumax' ), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                        </span>
                        <?php edit_comment_link( esc_html__( 'Edit', 'edumax' ), '<span class="edit-link">', '</span>' ); ?>
                    </div>
                </div>
            </div>
        <?php
            break;
        endswitch;
    }

endif;



/*-------------------------------------------------------
*           Themeum Breadcrumb
*-------------------------------------------------------*/
if(!function_exists('edumax_breadcrumbs')):

    function edumax_breadcrumbs(){ ?>

        <ol class="breadcrumb">
            <li><a href="<?php echo esc_url(site_url()); ?>" class="breadcrumb_home"><i class="fas fa-home"></i></a></li>
            <li class="active">
                <?php if( is_tag() ) { ?>
                <?php esc_html_e('Posts Tagged ', 'edumax') ?><span class="raquo">/</span><?php single_tag_title(); echo('/'); ?>
                <?php } elseif (is_day()) { ?>
                <?php esc_html_e('Posts made in', 'edumax') ?> <?php the_time('F jS, Y'); ?>
                <?php } elseif (is_month()) { ?>
                <?php esc_html_e('Posts made in', 'edumax') ?> <?php the_time('F, Y'); ?>
                <?php } elseif (is_year()) { ?>
                <?php esc_html_e('Posts made in', 'edumax') ?> <?php the_time('Y'); ?>
                <?php } elseif (is_search()) { ?>
                <?php esc_html_e('Search results for', 'edumax') ?> <?php the_search_query() ?>
                <?php } elseif (is_single()) { ?>
                <?php $category = get_the_category();
                    if ( $category ) {
                        $catlink = get_category_link( $category[0]->cat_ID );
                        echo ('<a href="'.esc_url($catlink).'">'.esc_html($category[0]->cat_name).'</a> '.'<span class="raquo"></span> ');
                    } elseif (get_post_type() == 'product'){
                        echo get_the_title();
                    } ?>
                <?php } elseif (is_category()) { ?>
                <?php single_cat_title(); ?>
                <?php } elseif (is_tax()) { ?>
                <?php
                $themeum_taxonomy_links = array();
                $themeum_term = get_queried_object();
                $themeum_term_parent_id = $themeum_term->parent;
                $themeum_term_taxonomy = $themeum_term->taxonomy;
                while ( $themeum_term_parent_id ) {
                    $themeum_current_term = get_term( $themeum_term_parent_id, $themeum_term_taxonomy );
                    $themeum_taxonomy_links[] = '<a href="' . esc_url( get_term_link( $themeum_current_term, $themeum_term_taxonomy ) ) . '" title="' . esc_attr( $themeum_current_term->name ) . '">' . esc_html( $themeum_current_term->name ) . '</a>';
                    $themeum_term_parent_id = $themeum_current_term->parent;
                }
                if ( !empty( $themeum_taxonomy_links ) ) echo implode( ' <span class="raquo">/</span> ', array_reverse( $themeum_taxonomy_links ) ) . ' <span class="raquo">/</span> ';
                    echo esc_html( $themeum_term->name );
                } elseif (is_author()) {
                    global $wp_query;
                    $curauth = $wp_query->get_queried_object();
                    esc_html_e('Posts by ', 'edumax'); echo ' ',$curauth->nickname;
                } elseif (is_page()) {
                    echo get_the_title();
                } elseif (is_home()) {
                    esc_html_e('Blog', 'edumax');
                }elseif (is_archive()){
                    esc_html_e('Archive', 'edumax');
                } ?>

            </li>
        </ol>
    <?php
    }

endif;



/*-----------------------------------------------------
 *              Coming Soon Page Settings
 *----------------------------------------------------*/
if ( get_theme_mod( 'comingsoon_en', false ) ) {
    if(!function_exists('edumax_my_page_template_redirect')):
        function edumax_my_page_template_redirect()
        {
            if( is_page() || is_home() || is_category() || is_single() )
            {
                if( !is_super_admin( get_current_user_id() ) ){
                    get_template_part( 'coming','soon');
                    exit();
                }
            }
        }
        add_action( 'template_redirect', 'edumax_my_page_template_redirect' );
    endif;

    if(!function_exists('edumax_cooming_soon_wp_title')):
        function edumax_cooming_soon_wp_title(){
            return 'Coming Soon';
        }
        add_filter( 'wp_title', 'edumax_cooming_soon_wp_title' );
    endif;
}




/*-----------------------------------------------------
 *              CSS Generator
 *----------------------------------------------------*/
if(!function_exists('edumax_css_generator')){
    function edumax_css_generator(){

        $output = '';

        if( get_theme_mod( 'custom_preset_en', false ) ){
            $major_color = get_theme_mod('major_color', '#008CC9');
            $major_hover_color = get_theme_mod('hover_color', '#006fa0');
            $heading_color = get_theme_mod('heading_color', '#4B5981');
            $text_color = get_theme_mod('text_color', '#6d7382');
            $output = "
                body{
                    --edumax-major-color: $major_color;
                    --edumax-hover-color: $major_hover_color;
                    --edumax-heading-color: $heading_color;
                    --edumax-text-color: $text_color;
                }
            
            ";
        }

        $bstyle = $mstyle = $h1style = $h2style = $h3style = $h4style = $h5style = '';
        # body
        if ( get_theme_mod( 'body_font_size', '14' ) ) { $bstyle .= 'font-size:'.get_theme_mod( 'body_font_size', '14' ).'px;'; }
        if ( get_theme_mod( 'body_google_font', 'Muli' ) ) { $bstyle .= 'font-family:'.get_theme_mod( 'body_google_font', 'Muli' ).';'; }
        if ( get_theme_mod( 'body_font_weight', '400' ) ) { $bstyle .= 'font-weight: '.get_theme_mod( 'body_font_weight', '400' ).';'; }
        if ( get_theme_mod('body_font_height', '24') ) { $bstyle .= 'line-height: '.get_theme_mod('body_font_height', '24').'px;'; }
        if ( get_theme_mod('body_font_color', '#6d7382') ) { $bstyle .= 'color: '.get_theme_mod('body_font_color', '#6d7382').';'; }

        //menu
        $mstyle = '';
        if ( get_theme_mod( 'menu_font_size', '14' ) ) { $mstyle .= 'font-size:'.get_theme_mod( 'menu_font_size', '14' ).'px;'; }
        if ( get_theme_mod( 'menu_google_font', 'Quicksand' ) ) { $mstyle .= 'font-family:'.get_theme_mod( 'menu_google_font', 'Quicksand' ).';'; }
        if ( get_theme_mod( 'menu_font_weight', '300' ) ) { $mstyle .= 'font-weight: '.get_theme_mod( 'menu_font_weight', '500' ).';'; }
        if ( get_theme_mod('menu_font_height', '54') ) { $mstyle .= 'line-height: '.get_theme_mod('menu_font_height', '35').'px;'; }
//        if ( get_theme_mod('menu_font_color', '#191919') ) { $mstyle .= 'color: '.get_theme_mod('menu_font_color', '#4B5981').';'; }

        //heading1
        $h1style = '';
        if ( get_theme_mod( 'h1_font_size', '42' ) ) { $h1style .= 'font-size:'.get_theme_mod( 'h1_font_size', '42' ).'px;'; }
        if ( get_theme_mod( 'h1_google_font', 'Quicksand' ) ) { $h1style .= 'font-family:'.get_theme_mod( 'h1_google_font', 'Quicksand' ).';'; }
        if ( get_theme_mod( 'h1_font_weight', '600' ) ) { $h1style .= 'font-weight: '.get_theme_mod( 'h1_font_weight', '500' ).';'; }
        if ( get_theme_mod('h1_font_height', '42') ) { $h1style .= 'line-height: '.get_theme_mod('h1_font_height', '42').'px;'; }
//        if ( get_theme_mod('h1_font_color', '#333') ) { $h1style .= 'color: '.get_theme_mod('h1_font_color', '#4B5981').';'; }

        # heading2
        $h2style = '';
        if ( get_theme_mod( 'h2_font_size', '36' ) ) { $h2style .= 'font-size:'.get_theme_mod( 'h2_font_size', '36' ).'px;'; }
        if ( get_theme_mod( 'h2_google_font', 'Quicksand' ) ) { $h2style .= 'font-family:'.get_theme_mod( 'h2_google_font', 'Quicksand' ).';'; }
        if ( get_theme_mod( 'h2_font_weight', '600' ) ) { $h2style .= 'font-weight: '.get_theme_mod( 'h2_font_weight', '500' ).';'; }
        if ( get_theme_mod('h2_font_height', '36') ) { $h2style .= 'line-height: '.get_theme_mod('h2_font_height', '36').'px;'; }
//        if ( get_theme_mod('h2_font_color', '#4B5981') ) { $h2style .= 'color: '.get_theme_mod('h2_font_color', '#4B5981').';'; }

        //heading3
        $h3style = '';
        if ( get_theme_mod( 'h3_font_size', '26' ) ) { $h3style .= 'font-size:'.get_theme_mod( 'h3_font_size', '26' ).'px;'; }
        if ( get_theme_mod( 'h3_google_font', 'Quicksand' ) ) { $h3style .= 'font-family:'.get_theme_mod( 'h3_google_font', 'Quicksand' ).';'; }
        if ( get_theme_mod( 'h3_font_weight', '600' ) ) { $h3style .= 'font-weight: '.get_theme_mod( 'h3_font_weight', '500' ).';'; }
        if ( get_theme_mod('h3_font_height', '28') ) { $h3style .= 'line-height: '.get_theme_mod('h3_font_height', '28').'px;'; }
//        if ( get_theme_mod('h3_font_color', '#4B5981') ) { $h3style .= 'color: '.get_theme_mod('h3_font_color', '#4B5981').';'; }

        //heading4
        $h4style = '';
        if ( get_theme_mod( 'h4_font_size', '18' ) ) { $h4style .= 'font-size:'.get_theme_mod( 'h4_font_size', '18' ).'px;'; }
        if ( get_theme_mod( 'h4_google_font', 'Quicksand' ) ) { $h4style .= 'font-family:'.get_theme_mod( 'h4_google_font', 'Quicksand' ).';'; }
        if ( get_theme_mod( 'h4_font_weight', '600' ) ) { $h4style .= 'font-weight: '.get_theme_mod( 'h4_font_weight', '500' ).';'; }
        if ( get_theme_mod('h4_font_height', '26') ) { $h4style .= 'line-height: '.get_theme_mod('h4_font_height', '26').'px;'; }
//        if ( get_theme_mod('h4_font_color', '#4B5981') ) { $h4style .= 'color: '.get_theme_mod('h4_font_color', '#4B5981').';'; }

        //heading5
        $h5style = '';
        if ( get_theme_mod( 'h5_font_size', '14' ) ) { $h5style .= 'font-size:'.get_theme_mod( 'h5_font_size', '14' ).'px;'; }
        if ( get_theme_mod( 'h5_google_font', 'Quicksand' ) ) { $h5style .= 'font-family:'.get_theme_mod( 'h5_google_font', 'Quicksand' ).';'; }
        if ( get_theme_mod( 'h5_font_weight', '600' ) ) { $h5style .= 'font-weight: '.get_theme_mod( 'h5_font_weight', '500' ).';'; }
        if ( get_theme_mod('h5_font_height', '26') ) { $h5style .= 'line-height: '.get_theme_mod('h5_font_height', '26').'px;'; }
//        if ( get_theme_mod('h5_font_color', '#4B5981') ) { $h5style .= 'color: '.get_theme_mod('h5_font_color', '#4B5981').';'; }

        $output .= 'body{'.$bstyle.'}';
        $output .= '.common-menu-wrap li a, .header-cat-menu{'.$mstyle.'}';
        $output .= 'h1{'.$h1style.'}';
        $output .= 'h2{'.$h2style.'}';
        $output .= 'h3{'.$h3style.'}';
        $output .= 'h4{'.$h4style.'}';
        $output .= 'h5{'.$h5style.'}';


        //Header
        if ( get_theme_mod( 'header_color', '#4B5981' ) ) {
            $output .= '.site-header{ background-color: '.esc_attr( get_theme_mod( 'header_color', '#ffffff' ) ) .'; }';
        }
        $output .= '.site-header{ padding-top: '. (int) esc_attr( get_theme_mod( 'header_padding_top', '20' ) ) .'px; }';
        $output .= '.site-header{ padding-bottom: '. (int) esc_attr( get_theme_mod( 'header_padding_bottom', '20' ) ) .'px; }';
        $output .= '.site-header{ margin-bottom: '. (int) esc_attr( get_theme_mod( 'header_margin_bottom', '0' ) ) .'px; }';

        //sticky Header
        if ( get_theme_mod( 'header_fixed', true ) ){
            $output .= '.site-header.sticky{ position:fixed;top:0;left:auto; z-index:99999;margin:0 auto; width:100%;-webkit-animation: fadeInDown 300ms;animation: fadeInDown 300ms;}';
            $output .= '.admin-bar .site-header.sticky{top: 32px;}';
            $output .= '.site-header.sticky.header-transparent .main-menu-wrap{ margin-top: 0;}';
            if ( get_theme_mod( 'sticky_header_color', '#ffffff' ) ){
                $sticybg = get_theme_mod( 'sticky_header_color', '#ffffff');
                $output .= '.site-header.sticky{ background-color: '.$sticybg.';}';
            }
        }

        //Header Transparent
        if ( get_theme_mod( 'header_transparent', false ) ){
            $output .= '.site-header{ background-color: transparent;}';
        }

//        logo

        $logo_width = get_theme_mod( 'logo_width', 0 );
        $logo_height = get_theme_mod( 'logo_height', 0 );

        if($logo_width){
            $output .= '.themeum-navbar-header .themeum-navbar-brand img{width:'.get_theme_mod( 'logo_width', 145 ).'px; max-width:none;}';
        }

        if ($logo_height) {
            $output .= '.themeum-navbar-header .themeum-navbar-brand img{height:'.get_theme_mod( 'logo_height' ).'px;}';
        }



        // sub header
        $output .= '.subtitle-cover h2{font-size:'.get_theme_mod( 'sub_header_title_size', '49' ).'px;color:'.get_theme_mod( 'sub_header_title_color', '#ffffff' ).';}';
        $output .= '.breadcrumb>li+li:before, .subtitle-cover .breadcrumb, .subtitle-cover .breadcrumb>.active{color:'.get_theme_mod( 'sub_header_title_color', '#fff' ).';}';
        $output .= '.subtitle-cover .breadcrumb a{color:'.get_theme_mod( 'breadcrumb_link_color', '#fff' ).';}';
        $output .= '.subtitle-cover .breadcrumb a:hover{color:'.get_theme_mod( 'breadcrumb_link_hover_color', '#ffffff' ).';}';
        $output .= '.subtitle-cover{padding:'.get_theme_mod( 'sub_header_padding_top', '90' ).'px 0 '.get_theme_mod( 'sub_header_padding_bottom', '90' ).'px; margin-bottom: '.get_theme_mod( 'sub_header_margin_bottom', '80' ).'px;}';

        //body
        if (get_theme_mod( 'body_bg_img')) {
            $output .= 'html{ background-image: url("'.esc_attr( get_theme_mod( 'body_bg_img' ) ) .'");background-size: '.esc_attr( get_theme_mod( 'body_bg_size', 'cover' ) ) .';    background-position: '.esc_attr( get_theme_mod( 'body_bg_position', 'left top' ) ) .';background-repeat: '.esc_attr( get_theme_mod( 'body_bg_repeat', 'no-repeat' ) ) .';background-attachment: '.esc_attr( get_theme_mod( 'body_bg_attachment', 'fixed' ) ) .'; }';
        }
        $output .= 'html{ background-color: '.esc_attr( get_theme_mod( 'body_bg_color', '#F6FAFB' ) ) .'; }';

        //submenu color
        $output .= '.sub_menu_bg{ background-color: '.esc_attr( get_theme_mod( 'sub_menu_bg', '#fff' ) ) .'; }';
        $output .= '.sub_menu_text_color{ color: '.esc_attr( get_theme_mod( 'sub_menu_text_color', '#191919' ) ) .'; border-color: '.esc_attr( get_theme_mod( 'sub_menu_border', '#eef0f2' ) ) .'; }';
        $output .= '.sub_menu_text_color_hover:hover{ color: '.esc_attr( get_theme_mod( 'sub_menu_text_color_hover', '#50a2ff' ) ) .';}';
        $output .= '.common-menu-wrap .nav>li > ul::after{ border-color: transparent transparent '.esc_attr( get_theme_mod( 'sub_menu_bg', '#fff' ) ) .' transparent; }';



        //bottom
        $output .= '#bottom-wrap{ background-color: '.esc_attr( get_theme_mod( 'bottom_color', '#282836' ) ) .'; }';
        $output .= '#bottom-wrap,.bottom-widget .widget h3.widget-title{ color: '.esc_attr( get_theme_mod( 'bottom_text_color', '#B1B8C9' ) ) .'; }';
        $output .= '#bottom-wrap a{ color: '.esc_attr( get_theme_mod( 'bottom_link_color', '#8C94A8' ) ) .'; }';
        $output .= '#bottom-wrap a:hover{ color: '.esc_attr( get_theme_mod( 'bottom_hover_color', '#ffffff' ) ) .'; }';
        $output .= '#bottom-wrap{ padding-top: '. (int) esc_attr( get_theme_mod( 'bottom_padding_top', '80' ) ) .'px; }';
        $output .= '#bottom-wrap{ padding-bottom: '. (int) esc_attr( get_theme_mod( 'bottom_padding_bottom', '45' ) ) .'px; }';


        //footer
        $output .= '#footer-wrap{ background-color: '.esc_attr( get_theme_mod( 'copyright_bg_color', '#000000' ) ) .'; }';
        $output .= '.footer-copyright { color: '.esc_attr( get_theme_mod( 'copyright_text_color', '#8C94A8' ) ) .'; }';
        $output .= '.menu-footer-menu a{ color: '.esc_attr( get_theme_mod( 'copyright_link_color', '#8C94A8' ) ) .'; }';
        $output .= '.menu-footer-menu a:hover{ color: '.esc_attr( get_theme_mod( 'copyright_hover_color', '#ffffff' ) ) .'; }';
        $output .= '#footer-wrap{ padding-top: '. (int) esc_attr( get_theme_mod( 'copyright_padding_top', '25' ) ) .'px; }';
        $output .= '#footer-wrap{ padding-bottom: '. (int) esc_attr( get_theme_mod( 'copyright_padding_bottom', '25' ) ) .'px; }';

        // 404 Page
        $output .= "body.error404,body.page-template-404{ width: 100%; height: 100%; min-height: 100%; }";

        return $output;
    }
}
