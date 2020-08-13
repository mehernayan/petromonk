<?php
/*-------------------------------------------*
 *      Themeum Widget Registration
 *------------------------------------------*/
if(!function_exists('edumax_widdget_init')):

    function edumax_widdget_init()
    {

        register_sidebar(array(
                'name'          => esc_html__( 'Sidebar', 'edumax' ),
                'id'            => 'sidebar',
                'description'   => esc_html__( 'Widgets in this area will be shown on Sidebar.', 'edumax' ),
                'before_title'  => '<h3 class="widget_title">',
                'after_title'   => '</h3>',
                'before_widget' => '<div id="%1$s" class="widget %2$s" >',
                'after_widget'  => '</div>'
            )
        );

        register_sidebar(array(
                'name'          => esc_html__( 'Bottom 1', 'edumax' ),
                'id'            => 'bottom1',
                'description'   => esc_html__( 'Widgets in this area will be shown before Bottom 1.' , 'edumax'),
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
                'before_widget' => '<div class="bottom-widget"><div id="%1$s" class="widget %2$s" >',
                'after_widget'  => '</div></div>'
            )
        );

        register_sidebar(array(
                'name'          => esc_html__( 'Bottom 2', 'edumax' ),
                'id'            => 'bottom2',
                'description'   => esc_html__( 'Widgets in this area will be shown before Bottom 2.' , 'edumax'),
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
                'before_widget' => '<div class="bottom-widget"><div id="%1$s" class="widget %2$s" >',
                'after_widget'  => '</div></div>'
            )
        );

        register_sidebar(array(
                'name'          => esc_html__( 'Bottom 3', 'edumax' ),
                'id'            => 'bottom3',
                'description'   => esc_html__( 'Widgets in this area will be shown before Bottom 3.' , 'edumax'),
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
                'before_widget' => '<div class="bottom-widget"><div id="%1$s" class="widget %2$s" >',
                'after_widget'  => '</div></div>'
            )
        );
        register_sidebar(array(
                'name'          => esc_html__( 'Bottom 4', 'edumax' ),
                'id'            => 'bottom4',
                'description'   => esc_html__( 'Widgets in this area will be shown before Bottom 4.' , 'edumax'),
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
                'before_widget' => '<div class="bottom-widget"><div id="%1$s" class="widget %2$s" >',
                'after_widget'  => '</div></div>'
            )
        );
    }

    add_action('widgets_init','edumax_widdget_init');

endif;



/*-------------------------------------------*
 *      Themeum Style
 *------------------------------------------*/
if(!function_exists('edumax_style')):

    function edumax_style(){

        wp_enqueue_media();
        // CSS

        if(is_rtl()) {
            wp_enqueue_style( 'bootstrap-rtl', EDUMAX_CSS . 'bootstrap.rtl.min.css',false,'all');
        }else{
            wp_enqueue_style( 'bootstrap-min', EDUMAX_CSS . 'bootstrap.min.css',false,'all');
        }
        wp_enqueue_style( 'fontawesome.all.min', EDUMAX_CSS . 'fontawesome.all.min.css',false,'all');
        wp_enqueue_style( 'niceselect', EDUMAX_CSS . 'nice-select.css',false,'all');
        //wp_enqueue_style( 'magnific-popup', EDUMAX_CSS . 'magnific-popup.css',false,'all');
        wp_enqueue_style( 'edumax-main', EDUMAX_CSS . 'main.css',false,'all');
        wp_enqueue_style( 'edumax-woocommerce', EDUMAX_CSS . 'woocommerce.css',false,'all');
        wp_enqueue_style( 'edumax-google-font', '//fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i,800,800i,900%7cQuicksand:300,400,500,700',false,'all');
        wp_enqueue_style( 'edumax-style',get_stylesheet_uri());
        wp_add_inline_style( 'edumax-style', edumax_css_generator() );

        # JS
        wp_enqueue_script('main-tether','https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js',array(),false,true);
        wp_enqueue_script('bootstrap',EDUMAX_JS.'bootstrap.min.js',array(),false,true);
        wp_enqueue_script('niceselect',EDUMAX_JS.'jquery.nice-select.min.js',array(),false,true);
        wp_enqueue_script('loopcounter',EDUMAX_JS.'loopcounter.js',array(),false,true);

        if( get_theme_mod( "google_map_api" ) ){
            wp_enqueue_script('gmaps','https://maps.googleapis.com/maps/api/js?key='.get_theme_mod( "google_map_api" ),array(),false,true);
        }

        wp_enqueue_script('jquery.prettySocial',EDUMAX_JS.'jquery.prettySocial.min.js',array(),false,true);
        //wp_enqueue_script('jquery.isotope.min',EDUMAX_JS.'jquery.isotope.min.js',array(),false,true);
        //wp_enqueue_script('jquery.magnific-popup.min',EDUMAX_JS.'jquery.magnific-popup.min.js',array(),false,true);
        //wp_enqueue_script('jquery-slick',EDUMAX_JS.'slick.min.js',array(),false,true);

        wp_enqueue_script('edumax-main', EDUMAX_JS.'main.js',array(),false,true);

        // For Ajax URL
        global $wp;
        wp_localize_script( 'edumax-main', 'ajax_object', array(
            'ajaxurl'           => admin_url( 'admin-ajax.php' ),
            'redirecturl'       => home_url($wp->request),
            'loadingmessage'    => __('Sending user info, please wait...','edumax')
        ));

        // Single Comments
        if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
    }
    add_action('wp_enqueue_scripts','edumax_style');


endif;





// function edumax_customize_control_js() {
//     wp_enqueue_script( 'thmc-customizer', edumax_URI.'lib/customizer/assets/js/customizer.js', array('jquery', 'jquery-ui-datepicker'), '1.0', true );
// }
// add_action( 'customize_controls_enqueue_scripts', 'edumax_customize_control_js' );


add_action('enqueue_block_editor_assets', 'edumax_action_enqueue_block_editor_assets');
function edumax_action_enqueue_block_editor_assets() {
    wp_enqueue_style( 'bootstrap-grid.min', EDUMAX_CSS . 'bootstrap-grid.min.css',false,'all');
    wp_enqueue_style( 'edumax-style', get_stylesheet_uri() );
    wp_enqueue_style( 'edumax-gutenberg-editor-styles', get_template_directory_uri() . '/css/style-editor.css', null, 'all' );
    wp_add_inline_style( 'edumax-style', edumax_css_generator() );
}
/*-------------------------------------------------------
*           Backend Style for Metabox
*-------------------------------------------------------*/
if(!function_exists('edumax_admin_style')):

    function edumax_admin_style(){
        wp_enqueue_media();
        wp_register_script('thmpostmeta', get_template_directory_uri() .'/js/admin/post-meta.js');
        wp_enqueue_script('thmpostmeta');
    }
    add_action('admin_enqueue_scripts','edumax_admin_style');

endif;


/*-------------------------------------------------------
*           Include the TGM Plugin Activation class
*-------------------------------------------------------*/
add_action( 'tgmpa_register', 'edumax_plugins_include');

if(!function_exists('edumax_plugins_include')):

    function edumax_plugins_include()
    {
        $plugins = array(
            array(
                'name'                  => esc_html__( 'WP Pagebuilder', 'edumax' ),
                'slug'                  => 'wp-pagebuilder',
                'required'              => true,
                'version'               => '',
                'force_activation'      => false,
                'force_deactivation'    => false,
                'external_url'          => esc_url('https://downloads.wordpress.org/plugin/wp-pagebuilder.zip'),
            ),
            array(
                'name'                  => esc_html__( 'WP Pagebuilder Pro', 'edumax' ),
                'slug'                  => 'wp-pagebuilder-pro',
                'required'              => false,
                'version'               => '',
                'force_activation'      => false,
                'force_deactivation'    => false,
                'source'                => get_template_directory_uri().'/lib/plugins/wp-pagebuilder-pro.zip'
            ),

            # Qubely
            array(
                'name'                  => esc_html__( 'Qubely', 'edumax' ),
                'slug'                  => 'qubely',
                'required'              => true,
                'version'               => '',
                'force_activation'      => false,
                'force_deactivation'    => false,
                'external_url'          => esc_url('https://downloads.wordpress.org/plugin/qubely.1.3.5.zip'),
            ),
            array(
                'name'                  => esc_html__( 'Qubely Pro', 'edumax' ),
                'slug'                  => 'qubely-pro',
                'required'              => false,
                'version'               => '',
                'force_activation'      => false,
                'force_deactivation'    => false,
                'source'                => get_template_directory_uri().'/lib/plugins/qubely-pro.zip'
            ),

            array(
                'name'                  => esc_html__( 'Tutor – Ultimate WordPress LMS plugin', 'edumax' ),
                'slug'                  => 'tutor',
                'required'              => true,
                'version'               => '',
                'force_activation'      => false,
                'force_deactivation'    => false,
                'external_url'          => esc_url('https://downloads.wordpress.org/plugin/tutor.zip'),
            ),
            array(
                'name'                  => esc_html__( 'Edumax Core', 'edumax' ),
                'slug'                  => 'edumax-core',
                'source'                => 'https://demo.themeum.com/wordpress/plugins/edumax/edumax-core.zip',
                'required'              => true,
                'version'               => '',
                'force_activation'      => false,
                'force_deactivation'    => false,
                'external_url'          => '',
            ),
            array(
                'name'                  => 'Woocoomerce',
                'slug'                  => 'woocommerce',
                'required'              => false,
                'version'               => '',
                'force_activation'      => false,
                'force_deactivation'    => false,
            ),
            array(
                'name'                  => esc_html__( 'Edumax Demo Importer', 'edumax' ),
                'slug'                  => 'edumax-demo-importer',
                'source'                => 'https://demo.themeum.com/wordpress/plugins/edumax/edumax-demo-importer.zip',
                'required'              => false,
                'version'               => '',
                'force_activation'      => false,
                'force_deactivation'    => false,
                'external_url'          => '',
            ),
        );
        $config = array(
            'domain'            => 'edumax',
            'default_path'      => '',
            'parent_menu_slug'  => 'themes.php',
            'parent_url_slug'   => 'themes.php',
            'menu'              => 'install-required-plugins',
            'has_notices'       => true,
            'is_automatic'      => false,
            'message'           => '',
            'strings'           => array(
                'page_title'                                => esc_html__( 'Install Required Plugins', 'edumax' ),
                'menu_title'                                => esc_html__( 'Install Plugins', 'edumax' ),
                'installing'                                => esc_html__( 'Installing Plugin: %s', 'edumax' ),
                'oops'                                      => esc_html__( 'Something went wrong with the plugin API.', 'edumax'),
                'return'                                    => esc_html__( 'Return to Required Plugins Installer', 'edumax'),
                'plugin_activated'                          => esc_html__( 'Plugin activated successfully.','edumax'),
                'complete'                                  => esc_html__( 'All plugins installed and activated successfully. %s', 'edumax' )
            )
        );
        tgmpa( $plugins, $config );
    }
endif;

