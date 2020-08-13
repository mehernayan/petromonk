<?php

function edumax_course_function($atts, $content, $tag) {

    global $wp_query;
    $sidebar_filter = get_theme_mod('sidebar_filter', true);
    $top_filter_bar = get_theme_mod('top_filter_bar', true);
    $course_per_page = get_theme_mod('course_per_page', 9);
    $course_pagination = get_theme_mod('course_pagination', true);
    $course_column_count = get_theme_mod('course_column_count', 3);
    $course_category_count = get_theme_mod('course_category_count', 1);
//    $course_title_length = get_theme_mod('course_title_length', 0);
    $course_sidebar_position = get_theme_mod('course_sidebar_position', 'left');

    $atts = extract(shortcode_atts( array(
        'sidebar' => $sidebar_filter,
        'top_filter' => $top_filter_bar,
        'count' => $course_per_page,
        'pagination' => $course_pagination,
        'column' => $course_column_count,
        'category_count' => $course_category_count,
//        'title_length'  => $course_title_length,
        'sidebar_position'  => $course_sidebar_position
    ), $atts,  $tag
    ));

    if($sidebar === 'false' || $sidebar === 0) $sidebar = false;

    switch ($column){
        case 1:
            $column = 12;
            break;
        case 2:
            $column = 6;
            break;
        case 3:
            $column = 4;
            break;
        case 4:
            $column = 3;
            break;
        case 6:
            $column = 2;
            break;
        case 12:
            $column = 1;
            break;
        default:
            $column = 3;
    }

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    if( get_query_var( 'paged' ) )
    $paged = get_query_var( 'paged' );
    else {
    if( get_query_var( 'page' ) )
        $paged = get_query_var( 'page' );
    else
    $paged = 1;
    set_query_var( 'paged', $paged );
    $paged = $paged;
    }

    $selected_cat = !empty($_GET['course_category']) ? (array) $_GET['course_category'] : array();
    $selected_cat = array_map( 'sanitize_text_field', $selected_cat );
    $selected_cat = array_map('intval', $selected_cat);
    $is_queried_object = false;
    if(isset($wp_query->queried_object->term_id)){
        $is_queried_object = true;
        $selected_cat = array($wp_query->queried_object->term_id);
    }


    $selected_tag = !empty($_GET['course_tag']) ? (array) $_GET['course_tag'] : array();
    $selected_tag = array_map( 'sanitize_text_field', $selected_tag );
    $selected_tag = array_map('intval', $selected_tag);

    $selected_level = !empty($_GET['course_level']) ? (array) $_GET['course_level'] : array('all_levels');
    $selected_level = array_map( 'sanitize_text_field', $selected_level );

    $course_terms_cat = get_terms(array(
        'taxonomy' => 'course-category',
        'hide_empty' => true,
        'parent' => 0
    ));

    $course_terms_tag = get_terms(array(
        'taxonomy' => 'course-tag',
        'hide_empty' => true
    ));

    $course_levels = tutor_utils()->course_levels();

    $course_level_filter = !empty($selected_level) && !in_array('all_levels', $selected_level) ? array(
        'key'     => '_tutor_course_level',
        'value'   => $selected_level,
        'compare'  => 'IN'
    ) : array();

    $args = array(
        'post_type' => tutor()->course_post_type,
        'post_status'   => 'publish',
        'paged' => $paged,
        'posts_per_page' => $count,
        's' => get_search_query(),
        'meta_query' => array(
            $course_level_filter
        ),
        'tax_query' => array(
            'relation' => 'OR',
            array(
                'taxonomy' => 'course-category',
                'field'    => 'term_id',
                'terms'    => $selected_cat,
                'operator'  => !empty($selected_cat) ? 'IN' : 'NOT IN'
            ),
            array(
                'taxonomy' => 'course-tag',
                'field'    => 'term_id',
                'terms'    => $selected_tag,
                'operator'  => !empty($selected_tag) ? 'IN' : 'NOT IN'
            )
        )
    );

    $course_filter = 'newest_first';
    if ( ! empty($_GET['tutor_course_filter'])){
        $course_filter = sanitize_text_field($_GET['tutor_course_filter']);
    }
    switch ($course_filter){
        case 'newest_first':
            $args['orderby'] = 'ID';
            $args['order'] = 'desc';
            break;
        case 'oldest_first':
            $args['orderby'] = 'ID';
            $args['order'] = 'asc';
            break;
        case 'course_title_az':
            $args['orderby'] = 'post_title';
            $args['order'] = 'asc';
            break;
        case 'course_title_za':
            $args['orderby'] = 'post_title';
            $args['order'] = 'desc';
            break;
    }


    $query_data = new WP_Query($args);


    ob_start(); ?>
    <?php if($top_filter) { ?>
        <div class="edumax-course-filter-wrap row align-items-center">
            <div class="edumax-course-archive-results-wrap col">
                <?php
                $courseCount = tutor_utils()->get_archive_page_course_count();
                printf(__('%s Course', 'edumax'), "<strong>{$query_data->post_count}</strong>");
                ?>
            </div>

            <div class="edumax-course-archive-filters-wrap col-auto">
                <form class="edumax-course-filter-form" method="get">
                    <select name="tutor_course_filter" class="small">
                        <option value="newest_first" <?php if (isset($_GET["tutor_course_filter"]) ? selected("newest_first",$_GET["tutor_course_filter"]) : "" ); ?> ><?php _e("Release Date (newest first)", 'edumax'); ?></option>
                        <option value="oldest_first" <?php if (isset($_GET["tutor_course_filter"]) ? selected("oldest_first",$_GET["tutor_course_filter"]) : "" ); ?>><?php _e("Release Date (oldest first)", 'edumax'); ?></option>
                        <option value="course_title_az" <?php if (isset($_GET["tutor_course_filter"]) ? selected("course_title_az",$_GET["tutor_course_filter"]) : "" ); ?>><?php _e("Course Title (a-z)", 'edumax'); ?></option>
                        <option value="course_title_za" <?php if (isset($_GET["tutor_course_filter"]) ? selected("course_title_za",$_GET["tutor_course_filter"]) : "" ); ?>><?php _e("Course Title (z-a)", 'edumax'); ?></option>
                    </select>
                </form>
            </div>
        </div>
    <?php } ?>
    <div class="row">
        <?php if($sidebar) : ?>

            <?php
            $current_url = get_post_type_archive_link('course');
            ?>
            <div class="col-12 col-md-4 col-lg-3 order-2 order-sm-<?php echo $sidebar_position == 'right' ? 2: 1; ?> mb-4 md-lg-0">
                <form class="edumax-sidebar-filter" action="<?php echo esc_url($current_url); ?>" method="get">
                    <input type="hidden" name="s" value="<?php echo get_search_query(); ?>">
                    <!--<div class="single-filter filter-submit">
                        <a href="<?php /*echo esc_url($current_url); */?>"><i class="fas fa-times"></i> <?php /*esc_html_e('Reset', 'edumax') */?></a>
                        <button type="submit"><i class="fas fa-check"></i> <?php /*esc_html_e('Apply Filter', 'edumax'); */?></button>
                    </div>-->

                    <div class="single-filter">
                        <h4><?php esc_html_e('Level', 'edumax'); ?></h4>
                        <?php

                        foreach ($course_levels as $key => $course_level){
                            if($key == 'all_levels') continue;
                            ?>
                            <label for="<?php echo esc_attr($key); ?>">
                                <input
                                    type="checkbox"
                                    name="course_level[]"
                                    value="<?php echo esc_attr($key); ?>"
                                    id="<?php echo esc_attr($key); ?>"
                                    <?php echo in_array($key, $selected_level) ? 'checked="checked"' : ''; ?>
                                >
                                <span class="filter-checkbox"></span>
                                <?php echo esc_html($course_level); ?>
                            </label>
                            <?php
                        }

                        ?>
                    </div>

                    <?php if( is_array($course_terms_cat) && count($course_terms_cat)) : ?>
                        <div class="single-filter">
                            <h4><?php esc_html_e('Category', 'edumax'); ?></h4>
                            <?php
                            foreach ($course_terms_cat as $course_term){
                                $childern = get_categories(
                                    array(
                                        'parent' => $course_term->term_id,
                                        'taxonomy' => 'course-category'
                                    )
                                );
                                ?>
                                <div class="edumax-archive-single-cat">
                                    <label for="cat-<?php echo esc_attr($course_term->slug) ?>">
                                        <input
                                                type="checkbox"
                                                name="course_category[]"
                                                value="<?php echo esc_attr($course_term->term_id) ?>"
                                                id="cat-<?php echo esc_attr($course_term->slug) ?>"
                                            <?php echo in_array($course_term->term_id, $selected_cat) ? 'checked="checked"' : ''; ?>
                                        >
                                        <span class="filter-checkbox"></span>
                                        <?php
                                        echo esc_attr($course_term->name);
                                        ?>
                                    </label>
                                    <?php
                                        if(count($childern)){
                                            echo "<i class='category-toggle fas fa-plus'></i>";
                                        }
                                    ?>
                                    <?php if(count($childern)) : ?>
                                        <div class="edumax-archive-childern"  style="display: none;">
                                            <?php foreach ($childern as $child){ ?>
                                                <label for="cat-<?php echo esc_attr($child->slug) ?>">
                                                    <input
                                                            type="checkbox"
                                                            name="course_category[]"
                                                            value="<?php echo esc_attr($child->term_id) ?>"
                                                            id="cat-<?php echo esc_attr($child->slug) ?>"
                                                        <?php echo in_array($child->term_id, $selected_cat) ? 'checked="checked"' : ''; ?>
                                                    >
                                                    <span class="filter-checkbox"></span>
                                                    <?php echo esc_attr($child->name) ?>
                                                </label>
                                            <?php } ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                            <?php  } ?>
                        </div>
                    <?php endif; ?>

                    <?php if(is_array($course_terms_tag) && count($course_terms_tag)) : ?>
                        <div class="single-filter">
                            <h4><?php esc_html_e('Topics', 'edumax'); ?></h4>
                            <?php
                            foreach ($course_terms_tag as $course_tag){
                                ?>
                                <label for="tag-<?php echo esc_attr($course_tag->slug) ?>">
                                    <input
                                        type="checkbox"
                                        name="course_tag[]"
                                        value="<?php echo esc_attr($course_tag->term_id) ?>"
                                        id="tag-<?php echo esc_attr($course_tag->slug) ?>"
                                        <?php echo in_array($course_tag->term_id, $selected_tag) ? 'checked="checked"' : ''; ?>
                                    >
                                    <span class="filter-checkbox"></span>
                                    <?php echo esc_html($course_tag->name) ?>
                                </label>
                                <?php
                            }
                            ?>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
        <?php endif; ?>
        <div class="col order-1 order-sm-<?php echo $sidebar_position == 'right' ? 1: 2; ?>">
            <div class="edumax-courses-wrap row">
                <?php
                    if($query_data->have_posts()){
                        while ($query_data->have_posts()) {
                            $query_data->the_post();
                            $idd = get_the_ID();
                            global $authordata;
                            
                            $profile_url = tutor_utils()->profile_url($authordata->ID)
                            ?>
                            <div class="col-lg-<?php echo $column; ?> col-sm-6 edumax-course-col">
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
                    }else{
                        ?>

                        <div class="col-12">
                            <?php
                                echo "<h2>".__('Nothing found!', 'edumax')."</h2>";
                                echo "<div>".__('Sorry, but nothing matched your search terms. Please try again with different keywords.', 'edumax')."</div>";
                            ?>
                        </div>

                        <?php
                    }
                ?>
            </div>
            <?php if($pagination) { ?>
                <div class="course-pagination">
                    <?php
                    $page_numb = max( 1, get_query_var('paged') );
                    $max_page = $query_data->max_num_pages;
                    edumax_pagination( $page_numb, $max_page );
                    ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php

    wp_reset_query();
    $output = ob_get_contents();
    ob_end_clean();
    echo $output;
}

add_shortcode('edumax-course', 'edumax_course_function');