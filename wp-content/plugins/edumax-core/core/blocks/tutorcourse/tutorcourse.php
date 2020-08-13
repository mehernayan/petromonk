<?php
defined( 'ABSPATH' ) || exit;

if (! class_exists('Edumax_Core_Tutor_Course')) {
    class Edumax_Core_Tutor_Course{
        protected static $_instance = null;
        public static function instance(){
            if(is_null(self::$_instance)){
                self::$_instance = new self();
            }
            return self::$_instance;
        } 
        public function __construct(){
			register_block_type(
                'qubely/edumax-tutor-course',
                array(
                    'attributes' => array(
                        # common settings
                        'uniqueId' => array(
                            'type'      => 'string',
                            'default'   => '',
                        ),
                        'layout'   => array(
                            'type'      => 'string',
                            'default'   => 1
                        ),
                        'postTypes'         => array(
                            'type'          => 'string',
                            'default'       => 'courses'
                        ),
                        'selectedCategory' => array (
                            'type'         => 'string',
                            'default'      => 'all',
                        ),
                        'order'             => array(
                            'type'          => 'string',
                            'default'       => 'desc'
                        ),
                        'disFilter'         => array(
                            'type'          => 'boolean',
                            'default'       => true
                        ),
                        'numbers'           => array(
                            'type'          => 'number',
                            'default'       => 6,
                        ),
                        'columns'           => array(
                            'type'          => 'string',
                            'default'       => '4',
                        ),

                        # Title
                        'enableTitle' => array (
                            'type'         => 'boolean',
                            'default'      => true,
                        ),
                        'typographyTitle' => array(
                            'type' => 'object',
                            'default' => (object) [
                                'openTypography' => 0,
                                'family' => "Quicksand",
                                'type' => "sans-serif",
                                'size' => (object) ['md' => '', 'unit' => 'px'],
                            ],
                            'style' => [(object) [
                                'selector' => '{{QUBELY}} .edumax-course-col .edumax-course-body h3 a'
                            ]]
                        ),
                        'titleColor' => array(
                            'type'    => 'string',
                            'default' => '',
                            'style' => [(object) [
                                'selector' => '{{QUBELY}} .edumax-course-col .edumax-course-body h3 a {color: {{titleColor}};}'
                            ]]
                        ),
                        'titleHoverColor' => array(
                            'type'    => 'string',
                            'default' => '',
                            'style' => [(object) [
                                'selector' => '{{QUBELY}} .edumax-course-col .edumax-course-body h3 a:hover {color: {{titleHoverColor}};}'
                            ]]
                        ),

                        # Tab syle.
                        'typographyTab' => array(
                            'type' => 'object',
                            'default' => (object) [
                                'openTypography' => 0,
                                'family' => "Muli",
                                'type' => "sans-serif",
                                'size' => (object) ['md' => '', 'unit' => 'px'],
                            ],
                            'style' => [(object) [
                                'selector' => '{{QUBELY}} .edumax-course-custom-tab .course-tab-menu li button'
                            ]]
                        ),
                        'tabColor' => array(
                            'type'    => 'string',
                            'default' => '',
                            'style' => [(object) [
                                'selector' => '{{QUBELY}} .edumax-course-custom-tab .course-tab-menu li button {color: {{tabColor}};}'
                            ]]
                        ),
                        'tabActiveColor' => array(
                            'type'      => 'string',
                            'default'   => '',
                            'style'     => [(object) [
                                'selector' => '{{QUBELY}} .edumax-course-custom-tab .course-tab-menu li button.active {color: {{tabActiveColor}};} 
                                {{QUBELY}} .edumax-course-custom-tab .course-tab-menu li button::after {background: {{tabActiveColor}};} 
                                {{QUBELY}} .edumax-course-custom-tab .course-tab-menu li button:hover {color: {{tabActiveColor}};} '
                            ]]
                        ),

                        # Admin
                        'enableMeta' => array (
                            'type'         => 'boolean',
                            'default'      => true,
                        ),
                        'typographyMeta' => array(
                            'type' => 'object',
                            'default' => (object) [
                                'openTypography' => 0,
                                'family' => "Quicksand",
                                'type' => "sans-serif",
                                'size' => (object) ['md' => '', 'unit' => 'px'],
                            ],
                            'style' => [(object) [
                                'selector' => '{{QUBELY}} .edumax-course-author'
                            ]]
                        ),
                        'metaColor' => array(
                            'type'    => 'string',
                            'default' => '',
                            'style' => [(object) [
                                'selector' => '{{QUBELY}} .edumax-course-author {color: {{metaColor}};}'
                            ]]
                        ),

                        # Rating
                        'enableRating' => array (
                            'type'         => 'boolean',
                            'default'      => true,
                        ),
                        'ratingColor' => array(
                            'type'    => 'string',
                            'default' => '',
                            'style' => [(object) [
                                'selector' => '{{QUBELY}} .tutor-icon-star-line, {{QUBELY}} .tutor-icon-star-full, {{QUBELY}} .tutor-course-grid-item .tutor-course-grid-content .tutor-course-content .tutor-loop-rating-wrap .tutor-star-rating-group {color: {{ratingColor}};}'
                            ]]
                        ),

                        # Price
                        'typographyPrice' => array(
                            'type'      => 'object',
                            'default'   => (object) [
                                'openTypography' => 0,
                                'family'    => "Quicksand",
                                'type'      => "sans-serif",
                                'size'      => (object) ['md' => '', 'unit' => 'px'],
                            ],
                            'style'         => [(object) [
                                'selector'  => '{{QUBELY}} .edumax-course-pricing .tutor-course-loop-price .price'
                            ]]
                        ),
                        'priceColor' => array(
                            'type'    => 'string',
                            'default' => '',
                            'style' => [(object) [
                                'selector' => '{{QUBELY}} .edumax-course-pricing .tutor-course-loop-price .price {color: {{priceColor}};}'
                            ]]
                        ), 

                        # Enrolled
                        'typographyEnrolled' => array(
                            'type'      => 'object',
                            'default'   => (object) [
                                'openTypography' => 0,
                                'family'    => "Quicksand",
                                'type'      => "sans-serif",
                                'size'      => (object) ['md' => '', 'unit' => 'px'],
                            ],
                            'style'         => [(object) [
                                'selector'  => '{{QUBELY}} .edumax-course-pricing .tutor-course-loop-price .tutor-loop-cart-btn-wrap a'
                            ]]
                        ),

                        'enrolledColor' => array(
                            'type'      => 'string',
                            'default'   => '',
                            'style'     => [(object) [
                                'selector' => '{{QUBELY}} .edumax-course-pricing .tutor-course-loop-price .price {color: {{enrolledColor}};}'
                            ]]
                        ),

                        'enrolledHoverColor' => array(
                            'type'      => 'string',
                            'default'   => '',
                            'style'     => [(object) [
                                'selector' => '{{QUBELY}} .edumax-course-pricing .tutor-course-loop-price .price:hover {color: {{enrolledHoverColor}};}'
                            ]]
                        ),
                        

                    ),
                    'render_callback' => array( $this, 'Edumax_Core_Tutor_Course_block_callback' ),
                )
            );
        }
    
		public function Edumax_Core_Tutor_Course_block_callback( $att ){
            $uniqueId 		= isset( $att['uniqueId'] ) ? $att['uniqueId'] : '';
            $layout 		= isset( $att['layout'] ) ? $att['layout'] : '1';
			$columns 		= isset( $att['columns'] ) ? $att['columns'] : '3';
			$order 		    = isset( $att['order'] ) ? $att['order'] : 'desc';
			$numbers 		= isset( $att['numbers'] ) ? $att['numbers'] : 6;
            $enableTitle 	= isset($att['enableTitle']) ? $att['enableTitle'] : 1;
            $enableMeta 	= isset($att['enableMeta']) ? $att['enableMeta'] : 1;
            $enableRating 	= isset($att['enableRating']) ? $att['enableRating'] : 1;
            $enablePrice 	= isset($att['enablePrice']) ? $att['enablePrice'] : 1;
            $category 		= isset( $att['selectedCategory'] ) ? $att['selectedCategory'] : ['all'];
            $html = '';
 
            $terms = get_terms( array(
                'taxonomy'      => 'course-category',
                'hide_empty'    => true,
                'number'        => 6
            ));

            $category_list = array();
            foreach ($terms as $term){
                $category_list[$term->slug] = $term->name;
            }

            $count = 0;
            $html = '';
            ob_start();  
            
            ?>

            <div class="qubely-block-<?php echo $uniqueId; ?>">
                <div class="edumax-course-custom-tab container">
                    <?php 
                    if(count($category_list) ){
                        echo "<ul class='course-tab-menu'>";
                        $index = 0;
                        foreach ($category_list as $category){
                            $category = get_term_by('slug' ,$category, 'course-category');
                            $index++;
                            $active = $index == 1 ? 'active' : '';
                            echo "<li><button class='$active' data-tab-toggle='tab-$index'>$category->name</button></li>";
                        }
                        echo  "</ul>";
                    }

                    if(count($category_list) ){
                        $index = 0;
                        foreach ($category_list as $key){
                            $index++;
                            $style = $index == 1 ? '' : 'display: none';
            
                            $q = new WP_Query(array(
                                'post_type'         => tutor()->course_post_type,
                                'posts_per_page'    => $numbers,
                                'order'             => $order,
                                'tax_query'         => array(
                                    array(
                                        'taxonomy' => 'course-category',
                                        'field'    => 'slug',
                                        'terms'    => $key
                                    )
                                )
                            ));
                            
                            if($q->have_posts()){ ?>
                                
                                <div class="row" data-tab-content="tab-<?php echo $index; ?>" style="<?php echo $style; ?>">
                                    <?php while ($q->have_posts()) {
                                        $q->the_post();
                                        $idd = get_the_ID();
                                        global $authordata;
                                        $profile_url = tutor_utils()->profile_url($authordata->ID); ?>
                                
                                        <div class="col-lg-<?php echo esc_attr($columns); ?> col-sm-6 edumax-course-col">
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

                                                
                                                    <?php if( $enableTitle ) { ?>
                                                        <h3>
                                                            <a href="<?php the_permalink(); ?>">
                                                                <?php echo get_the_title(); ?>
                                                            </a>
                                                        </h3>
                                                    <?php } ?>

                                                    <?php if( $enableMeta ) { ?>
                                                        <a href="<?php echo esc_url($profile_url); ?>" class="edumax-course-author"><?php the_author(); ?></a>
                                                    <?php } ?>
                                                    
                                                    <?php if( $enableRating ) { ?>
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
                                                    <?php } ?>
            
                                                    <div class="edumax-course-pricing clearfix">
                                                        <?php echo tutor_course_loop_price(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            
                            <?php }
                            wp_reset_query();
                        }
                    }else{
                        if($q->have_posts()){ ?> 

                            <div class="row">
                                <?php 
                                while ($q->have_posts()) {
                                $q->the_post();
                                $idd = get_the_ID();
                                global $authordata;
                                $profile_url = tutor_utils()->profile_url($authordata->ID); ?>

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
                            <?php } ?>
                            </div> 
                        <?php }
                        } 
                    ?>
                </div>
            </div>

            <?php 
            $html = ob_get_contents();
            ob_end_clean();
            wp_reset_postdata();
            return $html;
		}
    }
}
Edumax_Core_Tutor_Course::instance();


