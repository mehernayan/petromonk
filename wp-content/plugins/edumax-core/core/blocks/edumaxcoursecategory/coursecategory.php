<?php
defined( 'ABSPATH' ) || exit;

if (! class_exists('Edumax_Tutor_Course_Category')) {
    class Edumax_Tutor_Course_Category{
        protected static $_instance = null;
        public static function instance(){
            if(is_null(self::$_instance)){
                self::$_instance = new self();
            }
            return self::$_instance;
        }
        public function __construct(){
			register_block_type(
                'qubely/edumax-course-category',
                array(
                    'attributes' => array(
                        //common settings

                        'uniqueId'          => array (
                            'type'          => 'string',
                        ),
                        'order' => array(
                            'type'    => 'string',
                            'default' => 'desc',
                        ),
                        'disFilter'         => array(
                            'type'          => 'boolean',
                            'default'       => true
                        ),
                        'numbers'           => array(
                            'type'          => 'number',
                            'default'       => 3,
                        ),
                        'columns'           => array(
                            'type'          => 'string',
                            'default'       => '4',
                        ),

                        //title
                        'enableTitle' => array (
                            'type'         => 'boolean',
                            'default'      => true,
                        ),
                        'categoryTypography' => array(
                            'type' => 'object',
                            'default' => (object) [
                                'openTypography' => 1,
                                'family' => "Quicksand",
                                'type' => "sans-serif",
                                'size' => (object) ['md' => 24, 'unit' => 'px'],
                            ],
                            'style' => [(object) [
                                'selector' => '{{QUBELY}} .course-category-wraper .single-course-categories-two .category-content h3, {{QUBELY}} .course-category-wraper .single-course-categories-two .category-content h3 .single-course-categories'
                            ]]
                        ),
                        'categoryColor' => array(
                            'type'    => 'string',
                            'default' => '',
                            'style' => [(object) [
                                'selector' => '{{QUBELY}} .course-category-wraper .single-course-categories-two .category-content h3, {{QUBELY}} .course-category-wraper .single-course-categories-two .category-content h3 a, {{QUBELY}} .course-category-wraper .single-course-categories-two .category-content h3 .single-course-categories {color:{{categoryColor}};}'
                            ]]
                        ),
                        'categoryHoverColor' => array(
                            'type'    => 'string',
                            'default' => '',
                            'style' => [(object) [
                                'selector' => '{{QUBELY}} .course-category-wraper .single-course-categories-two .category-content h3:hover, {{QUBELY}} .course-category-wraper .single-course-categories-two .category-content h3:hover a, {{QUBELY}} .course-category-wraper .single-course-categories-two .category-content h3:hover .single-course-categories {color: {{categoryHoverColor}};}'
                            ]]
                        ),
                        'marginTop' => array(
                            'type' => 'object',
                            'default' => (object) array(
                                'md' => 8,
                                'unit' => 'px'
                            ),
                            'style' => [
                                (object) [
                                    'condition' => [
                                        (object) ['key' => 'layout', 'relation' => '==', 'value' => 2]
                                    ],
                                    'selector' => '{{QUBELY}} .course-category-wraper .single-course-categories-two .category-content h3 .single-course-categories { display: inline-block; margin-top: {{marginTop}};} {{QUBELY}} .course-category-wraper .single-course-categories-two .category-content h3 span { display: inline-block; margin-top: {{marginTop}};}'
                                ],
                            ],
                        ),


                        # Cource Count.
                        'courceCountTypo' => array(
                            'type' => 'object',
                            'default' => (object) [
                                'openTypography' => 1,
                                'family' => "Quicksand",
                                'type' => "sans-serif",
                                'size' => (object) ['md' => 14, 'unit' => 'px'],
                            ],
                            'style' => [(object) [
                                'selector' => '{{QUBELY}} .course-category-wraper .single-course-categories-two .category-content span'
                            ]]
                        ),
                        'courceColor' => array(
                            'type'    => 'string',
                            'default' => '',
                            'style' => [(object) [
                                'selector' => '{{QUBELY}} .course-category-wraper .single-course-categories-two .category-content span {color:{{courceColor}};}'
                            ]]
                        ),
                        'courcemarginTop' => array(
                            'type' => 'object',
                            'default' => (object) array(
                                'md' => '',
                                'unit' => 'px'
                            ),
                            'style' => [
                                (object) [
                                    'selector' => '{{QUBELY}} .course-category-wraper .single-course-categories-two .category-content span { margin-top: {{courcemarginTop}};}'
                                ],
                            ],
                        ),




                        # Button .
                        'enableButton' => array (
                            'type'         => 'boolean',
                            'default'      => true,
                        ),
                        'buttontypography' => array(
                            'type' => 'object',
                            'default' => (object) [
                                'openTypography' => 1,
                                'family' => "Open Sans",
                                'type' => "sans-serif",
                                'size' => (object) ['md' => 14, 'unit' => 'px'],
                            ],
                            'style' => [(object) [
                                'selector' => '{{QUBELY}} .single-course-categories-two .category-content a'
                            ]]
                        ),
                        'buttonColor' => array(
                            'type'    => 'string',
                            'default' => '#ffffff',
                            'style' => [(object) [
                                'selector' => '{{QUBELY}} .single-course-categories-two .category-content a {color: {{buttonColor}};}'
                            ]]
                        ),
                        'buttonHoverColor' => array(
                            'type'    => 'string',
                            'default' => '#fff',
                            'style' => [(object) [
                                'selector' => '{{QUBELY}} .single-course-categories-two .category-content a:hover {color: {{buttonHoverColor}};}'
                            ]]
                        ),
                        'buttonBg' => array(
                            'type'    => 'string',
                            'default' => '',
                            'style' => [(object) [
                                'selector' => '{{QUBELY}} .single-course-categories-two .category-content a {background: {{buttonBg}};}'
                            ]]
                        ),
                        'buttonHoverBg' => array(
                            'type'    => 'string',
                            'default' => '#008cc9',
                            'style' => [(object) [
                                'selector' => '{{QUBELY}} .single-course-categories-two .category-content a:hover {background: {{buttonHoverBg}};}'
                            ]]
                        ),

                        'buttonBorder' => array(
                            'type' => 'object',
                            'default' => (object) array(
                                'unit' => 'px',
                                'widthType' => 'global',
                                'global' => (object) array(
                                    'md' => '1',
                                ),
                            ),
                            'style' => [
                                (object) [
                                    'selector' => '{{QUBELY}} .single-course-categories-two .category-content a'
                                ]
                            ]
                        ),
                    ),
                    'render_callback' => array( $this, 'Edumax_Course_Category_block_callback' ),
                )
            );
        }
    
		public function Edumax_Course_Category_block_callback( $att ){
            $uniqueId       = isset($att['uniqueId']) ? $att['uniqueId'] : '';
			$columns 		= isset( $att['columns'] ) ? $att['columns'] : '3';
            $order          = isset($att['order']) ? $att['order'] : 'DESC';
            $numbers 		= isset( $att['numbers'] ) ? $att['numbers'] : 3;
            
			$enableTitle 	= isset( $att['enableTitle'] ) ? $att['enableTitle'] : 1;
          
            $html = '';
            $edumax_course_cateories = get_terms(array(
                'taxonomy' 		=> 'course-category',
                'number'    	=> $numbers,
                'order'         => $order,
                'hide_empty' 	=> false,
            ));

            $html .= '<div class="qubely-block-'.$uniqueId.'">';
                $html .= '<div class="course-category-wraper row">';
                    foreach ($edumax_course_cateories as $edumax_course_cateory) {
                        $image_id = get_term_meta($edumax_course_cateory->term_id,'thumbnail_id', true );

                        $dummy_cat_image = get_parent_theme_file_uri(). '/images/dummy-category.jpg';
                        $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'large') : $dummy_cat_image;
 
                        $html .= '<div class="category-col col-sm-6 col-md-'.esc_attr($columns).'">';
                            $html .= '<div style="background-image: url('.esc_url($image_url).')" class="single-course-categories-two">';
                                $html .= '<div class="category-content">';
                                    $html .= '<h3>'.esc_html($edumax_course_cateory->name).'</h3>';
                                    $html .= '<span class="course-count">';
                                        $html .= esc_html($edumax_course_cateory->count);
                                        $html .= __(' Courses', 'edumax-core');
                                    $html .= '</span>';
                                    $html .= '<a href="'.get_term_link($edumax_course_cateory->term_id).'">'.__('View Category', 'edumax-core').'</a>';
                                $html .= '</div>';
                            $html .= '</div>';
                        $html .= '</div>';
                    }
                $html .= '</div>';
            $html .= '</div>';
            return $html;
		}
    }
}
Edumax_Tutor_Course_Category::instance();
