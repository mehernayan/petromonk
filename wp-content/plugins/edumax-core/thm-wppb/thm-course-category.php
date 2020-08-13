<?php

class Addons_Course_Category{
    public function get_name(){
        return 'course-category';
    }
    public function get_title(){
        return 'Category Course';
    }
    public function get_icon() {
        return 'wppb-font-price-tag';
    }
    public function get_category_name(){
        return 'Edumax';
    }

    // Textarea Settings Fields
    public function get_settings() {
        $catlist = get_terms(array(
            'taxonomy' => 'course-category',
            'hide_empty' => true
        ));

        $catlist_arr = [];

        foreach ($catlist as $cat){
            $catlist_arr[$cat->term_taxonomy_id] = $cat->name;
        }

        $settings = array(
            'category_column' => array(
                'type' => 'select',
                'title' => __('Category Column','edumax-core'),
                'placeholder' => __('Select Post Column','edumax-core'),
                'values' => array(
                    '12' => 'One Column',
                    '6' => 'Two Column',
                    '4' => 'Three Column',
                    '3' => 'Four Column',
                    '2' => 'Six Column'
                ),
                'std' => '3'
            ),
            'category_list' => array(
                'type' => 'select',
                'title' => __('Select Category','edumax-core'),
                'placeholder' => __('Select Placeholder','edumax-core'),
                'multiple' => true,
                'values' => $catlist_arr,
            ),
            'category_count' => array(
                'type' => 'number',
                'title' => __('Category Per Page','edumax-core'),
                'range' => array(
                    'min' => 0,
                    'max' => 20,
                    'step' => 1
                ),
                'std' => '6'
            ),
            'pagination' => array(
                'type' => 'switch',
                'title' => __('Pagination','edumax-core'),
                'std' => 0
            )
        );
        return $settings;
    }

    public function render($data = null){
        $settings = $data['settings'];
        $category_column = !empty($settings['category_column']) ? $settings['category_column'] : '3';
        $category_count = !empty($settings['category_count']) ? $settings['category_count'] : '6';
        $pagination = !empty($settings['pagination']) ? $settings['pagination'] : 0;
        $category_list = !empty($settings['category_list']) ? $settings['category_list'] : array();
        $page_numb =  get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

        ob_start();

        $category_list_ids = array();

        if(count($category_list)){
            foreach ($category_list as $category){
                $category_list_ids[] = (int) $category;
            }
            $edumax_course_cateories = get_terms(array(
                'taxonomy' => 'course-category',
                'hide_empty' => false,
                'include' => $category_list_ids,
                'number'    => 9,
                'orderby' => 'include'
            ));
        }else{
            $edumax_course_cateories = get_terms(array(
                'taxonomy' => 'course-category',
                'hide_empty' => true
            ));
        } 

        $max_page = ceil(count($edumax_course_cateories) / $category_count);
        $edumax_course_cateories = array_slice($edumax_course_cateories, (($page_numb - 1) * $category_count), $category_count)

        ?>
        <div class="course-category-wraper row">
            <?php
                foreach ($edumax_course_cateories as $edumax_course_cateory) {
                    $image_id = get_term_meta($edumax_course_cateory->term_id,'thumbnail_id', true );
                    $dummy_cat_image = get_parent_theme_file_uri(). '/images/dummy-category.jpg';
                    $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'large') : $dummy_cat_image;

                    ?>
                        <div class="category-col col-sm-6 col-md-<?php echo esc_attr($category_column); ?>">
                            <div style="background-image: url(<?php echo esc_url($image_url); ?>)" class="single-course-categories-two">
                                <div class="category-content">
                                    <h3><?php echo esc_html($edumax_course_cateory->name); ?></h3>
                                    <span class="course-count">
                                            <?php
                                            echo esc_html($edumax_course_cateory->count);
                                            esc_html_e(' Courses', 'edumax-core');
                                            ?>
                                        </span>
                                    <a href="<?php echo get_term_link($edumax_course_cateory->term_id); ?>"><?php esc_html_e('View Category', 'edumax-core') ?></a>
                                </div>
                            </div>
                        </div>
                    <?php
                }
            ?>

        </div>
        <?php if($pagination !== 0) : ?>
        <div class="row">
            <div class="col-12">
                <?php
                    edumax_pagination( $page_numb, $max_page );
                ?>
            </div>
        </div>
        <?php endif; ?>


        <?php
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
