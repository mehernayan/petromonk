<?php
function course_search_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
        'class' => '',
        'placeholder' => __('Search Course', 'edumax-core')
    ), $atts));
    ob_start();

    $action = function_exists('tutor_utils') ? tutor_utils()->course_archive_page_url() : site_url('/');

    ?>
    <form class="<?php echo esc_attr($class); ?> search_form_shortcode" role="search" action="<?php echo esc_url($action); ?>" method="get">
        <input class="edumax-ajax-search" data-url="<?php echo plugin_dir_url('', __FILE__).'edumax-core/lib/search-data.php'; ?>" type="text" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr($placeholder); ?>"/>
        <button type="submit"><i class="fas fa-search"></i></button>
        <div class="edumax-course-search-results"></div>
    </form>
    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}
add_shortcode('course_search', 'course_search_shortcode');