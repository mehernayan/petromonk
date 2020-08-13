<?php

class Addon_Course_New{
    public function get_name(){
        return 'new_course';
    }
    public function get_title(){
        return 'Edumax Course';
    }
    public function get_icon() {
        return 'wppb-font-bullseye';
    }
    public function get_category_name(){
        return 'Edumax';
    }
    /*
    public function get_enqueue_script(){
        return array( 'script-name' );
    }
    public function get_enqueue_style(){
	return array( 'style-name' );
    }
    */

    // Textarea Settings Fields
    public function get_settings() {
        $terms = get_terms( array(
            'taxonomy' => 'course-category',
            'hide_empty' => true
        ));
        $cat_list = array();
        foreach ($terms as $term){
            $cat_list[$term->slug] = $term->name;
        }

        $settings = array(
            'layout_style' => array(
                'type' => 'select',
                'title' => __('Layout Style','edumax-core'),
                'placeholder' => __('Select Layout','edumax-core'),
                'values' => array(
                    'with_filter'   => 'With Filter',
                    'no_filter'     => 'No Filter',
                ),
                'std' => 'with_filter',
            ),
            'category_list' => array(
                'type' => 'select',
                'title' => __('Select course category','edumax-core'),
                'multiple' => true,
                'values' => $cat_list,
                'depends' => array( array('layout_style', '!=', 'no_filter' ) )
            ),
            'post_order' => array(
                'type' => 'select',
                'title' => __('Course Order','edumax-core'),
                'placeholder' => __('Select Post Order','edumax-core'),
                'values' => array(
                    'desc'   => 'DESC',
                    'asc'     => 'ASC',
                ),
                'std' => 'with_filter',
            ),
            'post_order_by' => array(
                'type' => 'select',
                'title' => __('Course Order By','edumax-core'),
                'placeholder' => __('Select Post Order By','edumax-core'),
                'values' => array(
                    'name'   => 'Name',
                    'id'     => 'ID',
                    'slug'     => 'Slug',
                ),
                'std' => '',
            ),
            'post_count' => array(
                'type' => 'number',
                'title' => __('Course Count','edumax-core'),
                'range' => array(
                            'min' => 0,
                            'max' => 30,
                            'step' => 1,
                        ),
                'std' => '8',
            ),
            'post_column' => array(
				'type' => 'select',
				'title' => __('Course Column','edumax-core'),
				'placeholder' => __('Number of Column','edumax-core'),
				'values' => array(
                    '6' 	=> __( 'Two Column', 'edumax-core' ),
                    '4' 	=> __( 'Three Column', 'edumax-core' ),
                    '3' 	=> __( 'Four Column', 'edumax-core' ),
                    '2' 	=> __( 'Six Column', 'edumax-core' ),
                ),
                'std' => '4'
			),
        );
        return $settings;
    }

    public function render($data = null){


        $terms = get_terms( array(
            'taxonomy' => 'course-category',
            'hide_empty' => true
        ));
        $cat_list = array();
        foreach ($terms as $term){
            $cat_list[] = $term->slug;
        }

        $settings = $data['settings'];
        $category_list = !empty($settings['category_list']) ? $settings['category_list'] : array();
        $layout_style  = !empty($settings['layout_style']) ? $settings['layout_style'] : 'with_filter';
        $post_count    = !empty($settings['post_count']) ? $settings['post_count'] : 8;
        $post_col       = !empty($settings['post_column']) ? $settings['post_column'] : 3;
        $post_order    = !empty($settings['post_order']) ? $settings['post_order'] : 'DESC';
        $post_order_by = !empty($settings['post_order_by']) ? $settings['post_order_by'] : '';

        if(empty($category_list)){
            $category_list = $cat_list;
        };

        ob_start();

        if($layout_style == 'no_filter'){
            $q = new WP_Query(array(
                'post_type'      => tutor()->course_post_type,
                'posts_per_page' => $post_count,
                'order'          => $post_order,
                'orderby'        => $post_order_by
            ));
        }

        echo "<div class='edumax-course-custom-tab'>";
        if(count($category_list) && $layout_style == 'with_filter'){
            echo "<ul class='course-tab-menu'>";
            $index = 0;
            foreach ($category_list as $category){
                $category = get_term_by('slug' ,$category, 'course-category');
                $index++;
                $active = $index == 1 ? 'active' : '';
                echo "<li><button class='$active' data-tab-toggle='tab-$index'>$category->name</button></li>";
            }
            echo "</ul>";
        }
        if(count($category_list) && $layout_style == 'with_filter'){
            $index = 0;
            foreach ($category_list as $key){
                $index++;
                $style = $index == 1 ? '' : 'display: none';

                if($layout_style == 'with_filter'){
                    $q = new WP_Query(array(
                        'post_type'        => tutor()->course_post_type,
                        'posts_per_page' => $post_count,
                        'order'          => $post_order,
                        'orderby'        => $post_order_by,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'course-category',
                                'field'    => 'slug',
                                'terms'    => $key
                            )
                        )
                    ));
                }

                if($q->have_posts()){
                    ?> <div class="row" data-tab-content="tab-<?php echo $index; ?>" style="<?php echo $style ?>"><?php
                        while ($q->have_posts()) {
                            $q->the_post();
                            $idd = get_the_ID();
                            global $authordata;
                            $profile_url = tutor_utils()->profile_url($authordata->ID)
                            ?>
                            <div class="col-lg-<?php echo esc_attr($post_col); ?> col-sm-6 edumax-course-col">
                                <div class="edumax-course">
                                    <div class="edumax-course-header">
                                        <?php tutor_course_loop_thumbnail(); ?>
                                        <div class="tutor-course-loop-header-meta">
                                            <?php
                                            $is_wishlisted = tutor_utils()->is_wishlisted($idd);
                                            $has_wish_list = '';
                                            if ($is_wishlisted){
                                                $has_wish_list = 'has-wish-listed';
                                            }

                                            echo '<span class="tutor-course-loop-level">'.get_tutor_course_level().'</span>';
                                            echo '<span class="tutor-course-wishlist"><a href="javascript:;" class="tutor-icon-fav-line tutor-course-wishlist-btn '.$has_wish_list.' " data-course-id="'.$idd.'"></a> </span>';
                                            ?>
                                        </div>
                                    </div>
                                    <div class="edumax-course-body">
                                        <h3>
                                            <a href="<?php the_permalink(); ?>">
                                                <?php echo get_the_title(); ?>
                                            </a>
                                        </h3>
                                        <a href="<?php echo esc_url($profile_url); ?>" class="edumax-course-author"><?php the_author(); ?></a>
                                        <?php $course_rating = tutor_utils()->get_course_rating(); ?>
                                        <div class="tutor-loop-rating-wrap <?php echo !$course_rating->rating_count ? 'no-rating' : ''; ?>">
                                            <?php  tutor_utils()->star_rating_generator($course_rating->rating_avg); ?>
                                            <span class="tutor-rating-count">
                                                <?php
                                                    echo $course_rating->rating_avg;
                                                    echo '<i>('.$course_rating->rating_count.')</i>';
                                                ?>
                                            </span>
                                        </div>

                                        <div class="edumax-course-pricing clearfix">
                                            <?php echo tutor_course_loop_price(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    ?></div> <?php
                }
                wp_reset_query();
            }
        }else{
            if($q->have_posts()){
                ?> <div class="row"><?php
                    while ($q->have_posts()) {
                        $q->the_post();
                        $idd = get_the_ID();
                        global $authordata;
                        $profile_url = tutor_utils()->profile_url($authordata->ID)
                        ?>
                        <div class="col-lg-<?php echo esc_attr($post_col); ?> col-sm-6 edumax-course-col">
                            <div class="edumax-course">
                                <div class="edumax-course-header">
                                    <?php tutor_course_loop_thumbnail(); ?>
                                    <div class="tutor-course-loop-header-meta">
                                        <?php
                                        $is_wishlisted = tutor_utils()->is_wishlisted($idd);
                                        $has_wish_list = '';
                                        if ($is_wishlisted){
                                            $has_wish_list = 'has-wish-listed';
                                        }

                                        echo '<span class="tutor-course-loop-level">'.get_tutor_course_level().'</span>';
                                        echo '<span class="tutor-course-wishlist"><a href="javascript:;" class="tutor-icon-fav-line tutor-course-wishlist-btn '.$has_wish_list.' " data-course-id="'.$idd.'"></a> </span>';
                                        ?>
                                    </div>
                                </div>
                                <div class="edumax-course-body">
                                    <h3>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php echo get_the_title(); ?>
                                        </a>
                                    </h3>
                                    <a href="<?php echo esc_url($profile_url); ?>" class="edumax-course-author"><?php the_author(); ?></a>
                                    <?php $course_rating = tutor_utils()->get_course_rating(); ?>
                                    <div class="tutor-loop-rating-wrap <?php echo !$course_rating->rating_count ? 'no-rating' : ''; ?>">
                                        <?php  tutor_utils()->star_rating_generator($course_rating->rating_avg); ?>
                                        <span class="tutor-rating-count">
                                            <?php
                                                echo $course_rating->rating_avg;
                                                echo '<i>('.$course_rating->rating_count.')</i>';
                                            ?>
                                        </span>
                                    </div>

                                    <div class="edumax-course-pricing clearfix">
                                        <?php echo tutor_course_loop_price(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                ?></div> <?php
            }
            wp_reset_query();
        }
        echo "</div>";
        return ob_get_clean();
    }
}