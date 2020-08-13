<?php

class Addons_Search_Form{
    public function get_name(){
        return 'searchform';
    }
    public function get_title(){
        return 'Search Form';
    }
    public function get_icon() {
        return 'wppb-font-search';
    }
    public function get_category_name(){
        return 'Edumax';

    }

    // Textarea Settings Fields
    public function get_settings() {
        $settings = array(
            'placeholder' => array(
                'type' => 'text',
                'title' => __('Search Placeholder text','edumax-core'),
                'placeholder' => __('Search here','edumax-core'),
                'std' => __('Search here','edumax-core')
            )
        );

        return $settings;
    }

    public function render($data = null){
        $settings = $data['settings'];
        $placeholder = isset($settings['placeholder']) ? $settings['placeholder'] : __('Search here...', 'edumax-core');


        return do_shortcode("[course_search placeholder='$placeholder']");
    }
}