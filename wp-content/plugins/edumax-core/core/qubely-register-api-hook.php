<?php 

if ( ! function_exists( 'edumax_core_rest_fields' ) ) {
    function edumax_core_rest_fields() {
        $post_types = get_post_types();
        register_rest_field( $post_types, 'post_excerpt_edumax_core',
            array(
                'get_callback'      => 'edumax_core_post_excerpt',
                'update_callback'   => null,
                'schema'            => array(
                    'description'   => __( 'Post excerpt' ),
                    'type'          => 'string',
                ),
            )
        );
        register_rest_field( 'portfolio', 'edumax_core_portfolio_cat_single',
            array(
                'get_callback'      => 'edumax_core_catlist',
                'update_callback'   => null,
                'schema'            => array(
                    'description'   => __( 'cat List' ),
                    'type'          => 'string',
                ),
            )
        );
        register_rest_field( 'courses', 'edumax_core_price_item',
            array(
                'get_callback'      => 'edumax_core_price',
                'update_callback'   => null,
                'schema'            => array(
                    'description'   => __( 'Course Price' ),
                    'type'          => 'string',
                ),
            )
        );
        register_rest_field( 'portfolio', 'edumax_core_portfolio_cat',
            array(
                'get_callback'      => 'edumax_core_portfolio_catlist',
                'update_callback'   => null,
                'schema'            => array(
                    'description'   => __( 'cat List' ),
                    'type'          => 'string',
                ),
            )
        );
        register_rest_field( $post_types, 'edumax_core_image_urls',
            array(
                'get_callback'          => 'edumax_core_featured_image_urls',
                'update_callback'       => null,
                'schema'                => array(
                    'description'       => __( 'Different sized featured images' ),
                    'type'              => 'array',
                ),
            )
        );

    }
}
add_action( 'rest_api_init', 'edumax_core_rest_fields' );




/* ----------------------------------
*           Post Excerpt 
------------------------------------- */
if ( ! function_exists( 'edumax_core_post_excerpt' ) ) {
    function edumax_core_post_excerpt( $post_id, $post = null ) {
        $post_content = apply_filters( 'the_content', get_post_field( 'post_content', $post_id ) );
        return apply_filters( 'the_excerpt', wp_trim_words( $post_content, 55 ) );
    }
}

if ( ! function_exists( 'edumax_core_catlist' ) ) {
    function edumax_core_catlist( $object ) {
        return get_the_term_list( $object['id'], 'portfolio-cat' );
    }
}

if ( ! function_exists( 'edumax_core_price' ) ) {
    function edumax_core_price( $object ) {
        //return tutor_course_loop_price( $object['id'], 'courses' );
        //$ssss = $price_html;
        //$ssss = tutor_course_loop_price();
        //return  $price_html;
    }
}

if ( ! function_exists( 'edumax_core_portfolio_catlist' ) ) {
    function edumax_core_portfolio_catlist( $object ) {
        return get_terms( 'portfolio-cat' );
    }
}

if ( ! function_exists( 'edumax_core_featured_image_urls' ) ) {
    function edumax_core_featured_image_urls( $object, $field_name, $request ) {
        $image = wp_get_attachment_image_src( $object['featured_media'], 'full', false );
        return array(
            'full'      => is_array( $image ) ? $image : '',
            'portrait'      => is_array( $image ) ? wp_get_attachment_image_src( $object['featured_media'], 'edumax-core-portrait', false ) : '',
            'portraitab'    => is_array( $image ) ? wp_get_attachment_image_src( $object['featured_media'], 'edumax-course-tab', false ) : '',
            'thumbnail'     => is_array( $image ) ? wp_get_attachment_image_src( $object['featured_media'], 'edumax-core-thumbnail', false ) : '',
        );
    }
}

if ( ! function_exists( 'edumax_core_blog_posts_image_sizes' ) ) {
    function edumax_core_blog_posts_image_sizes() {
        add_image_size( 'edumax-core-portrait', 700, 870, true );
        add_image_size( 'edumax-course-tab', 322, 300, true );
        add_image_size( 'edumax-core-thumbnail', 140, 100, true );
    }
    add_action( 'after_setup_theme', 'edumax_core_blog_posts_image_sizes' );
}

# Register api hook
function register_api_hook(){

    register_rest_field(
        'courses',
        'price',
        array(
            'get_callback'      => 'edumax_course_get_price',
            'update_callback'   => null,
            'schema'            => array(
                'description'   => __('Course price'),
                'type'          => 'string',
            ),
        )
    );

    # Course Author name.
    register_rest_field(
        'courses',
        'edumax_author',
        array(
            'get_callback'    => 'edumax_tutor_get_author_info',
            'update_callback' => null,
            'schema'          => null,
        )
    );

    # Category List.
    register_rest_field(
        'courses',
        'edumax_category',
        array(
            'get_callback'      => 'edumax_get_category_list',
            'update_callback'   => null,
            'schema'            => array(
                'description'   => __('Category list links'),
                'type'          => 'string',
            ),
        )
    );

    # Course Rating
    register_rest_field(
        'courses',
        'rating',
        array(
            'get_callback'      => 'edumax_course_rating',
            'update_callback'   => null,
            'schema'            => array(
                'description'   => __('Course price'),
                'type'          => 'string',
            ),
        )
    );

    # edumax_duration_level
    register_rest_field(
        'courses',
        'duration',
        array(
            'get_callback'      => 'edumax_duration_level',
            'update_callback'   => null,
            'schema'            => array(
                'description'   => __('Course Duration'),
                'type'          => 'string',
            ),
        )
    );
}	
add_action('rest_api_init','register_api_hook');


# Callback functions: Author Name
function edumax_tutor_get_author_info($object) {
    global $authordata;

    $author['url']          = get_avatar_url(get_current_user_id(), 'thumbnail');
    $author['display_name'] = get_the_author_meta('display_name', $object->ID);
    $author['author_link']  = get_author_posts_url($object->ID);
    $author['edumax_best_selling'] = get_post_meta($object->ID, 'edumax_best_selling', true);

    if(function_exists('tutor_utils')){
        $author['tutor_author'] = tutor_utils()->get_tutor_avatar(get_current_user_id(), 'thumbnail');
        $author['profile_url']  = tutor_utils()->profile_url($authordata->ID);
    }else {
        $author['tutor_author'] = get_avatar_url(get_current_user_id(), 'thumbnail'); 
        $author['profile_url']  = tutor_utils()->profile_url($authordata->ID);
    }
    $author['author_name']      = get_the_author($authordata->ID);
    
    return $author;
}

# Callback functions: category list
if (!function_exists('edumax_get_category_list')) {
    function edumax_get_category_list($object) {
        $course_categories = get_tutor_course_categories();
        if(!empty($course_categories) && is_array($course_categories ) && count($course_categories)){
            $ind = 0;
            foreach ($course_categories as $course_category){
                $category_name['course_category'] = $course_category->name;
                $image_id = get_term_meta($course_category->term_id, 'thumbnail_id', true );
                $category_name['course_count'] = $course_category->count;
                $category_name['image_link'] = wp_get_attachment_image($image_id, 'edumax-large');
                $category_name['image_src'] = wp_get_attachment_url($image_id);
                $ind++;
            }
        }
        return $category_name;
    }
}

# Callback founction: Course Price.
function edumax_course_get_price($object) {
    $posts = get_posts( array(
        'numberposts'		=> 3,
        'post_type'		    => 'courses',
    ) );
    if ( empty( $posts ) ) { return null; }
    $price = [];
    foreach ( $posts as $post ) {
        ob_start();
        $price = tutor_course_price();
        $price = ob_get_clean();
    }
    return $price;
}
 
# Callback Functions: Rating.
function edumax_course_rating($object) {
    $rating = [];
    ob_start();
    $course_rating = tutor_utils()->get_course_rating();
    $rating = tutor_utils()->star_rating_generator($course_rating->rating_avg);
    $rating = ob_get_clean();
    return $rating;
}

# Callback Functions: Level.
function edumax_duration_level($object) {
    $level = [];
    $level['course_level']      = get_tutor_course_level();
    $level['course_duration']   = get_tutor_course_duration_context();
    $level['course_excerpt']    = get_the_excerpt();
    return $level;
} 

