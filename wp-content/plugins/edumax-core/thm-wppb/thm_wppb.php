<?php 

add_action( 'init', 'edumax_core_wppb_shortcode' );
function edumax_core_wppb_shortcode(){
    require_once( PLUGIN_DIR . 'thm-wppb/thm-searchform.php' );
    require_once( PLUGIN_DIR . 'thm-wppb/thm-buttons.php' );
    require_once( PLUGIN_DIR . 'thm-wppb/thm-timeline.php' );

    if(is_plugin_active('tutor/tutor.php')){
        require_once( PLUGIN_DIR . 'thm-wppb/thm-course-category.php' );
        require_once( PLUGIN_DIR . 'thm-wppb/thm-course-new.php' );
    }
}

//Hook for WPPB
add_filter( 'wppb_available_addons', 'add_random_number_addon_func' );
if ( ! function_exists('add_random_number_addon_func')){
    function add_random_number_addon_func($addons){
        $addons[] = 'Addons_Search_Form';
        $addons[] = 'Addons_Buttons';
        $addons[] = 'Addons_Timeline';
        if(is_plugin_active('tutor/tutor.php')){
            $addons[] = 'Addons_Course_Category';
            $addons[] = 'Addon_Course_New';
        }
        return $addons;
    }
}