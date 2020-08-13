<?php
defined( 'ABSPATH' ) || exit;

if (! class_exists('Edumax_Tutor_Course_Search')) {
    class Edumax_Tutor_Course_Search{
        protected static $_instance = null;
        public static function instance(){
            if(is_null(self::$_instance)){
                self::$_instance = new self();
            }
            return self::$_instance;
        } 
        public function __construct(){
			register_block_type(
                'qubely/edumax-course-search',
                array(
                    'attributes' => array(
                        'uniqueId'      => array(
                            'type'      => 'string',
                            'default'   => ''
                        ),
                        

                        

                        # Input Typrography
                        'inputTypography'   => array(
                            'type'          => 'object',
                            'default'       => (object) [
                                'openTypography' => 1,
                                'family'    => "Quicksand",
                                'type'      => "sans-serif",
                                'size'      => (object) ['md' => 16, 'unit' => 'px'],
                            ],
                            'style'         => [(object) [
                                'selector'  => '{{QUBELY}} .search_form_shortcode input[type="text"].search-active {{QUBELY}} .search_form_shortcode input[type="text"].search-active::placeholder, {{QUBELY}} .search_form_shortcode input[type="text"]'
                            ]]
                        ),
                        
                        # Normal
                        'inputBg'        => array(
                            'type'          => 'string',
                            'default'       => '#fff',
                            'style'         => [(object) [
                                'selector'  => '{{QUBELY}} .search_form_shortcode input[type="text"]  { background: {{inputBg}}; }'
                            ]]
                        ),
                        'inputColor'        => array(
                            'type'          => 'string',
                            'default'       => '#1f2949',
                            'style'         => [(object) [
                                'selector'  => '{{QUBELY}} .search_form_shortcode input[type="text"] { color: {{inputColor}};}'
                            ]]
                        ),
                        'placeholderColor'  => array(
                            'type'          => 'string',
                            'default'       => '#8c94a8',
                            'style'         => [(object) [
                                'selector'  => '{{QUBELY}} .search_form_shortcode input[type="text"]::placeholder { color: {{placeholderColor}};}'
                            ]]
                        ),

                        # Focus Color
                        'inputBgFocus'  => array(
                            'type'          => 'string',
                            'default'       => '#fafafa',
                            'style'         => [(object) [
                                'selector'  => '{{QUBELY}} .search_form_shortcode input[type="text"]:focus {background: {{inputBgFocus}};}'
                            ]]
                        ),
                        'inputBorderColorFocus'  => array(
                            'type'          => 'string',
                            'default'       => '#fafafa',
                            'style'         => [(object) [
                                'selector'  => '{{QUBELY}} .search_form_shortcode input[type="text"]:focus {border-color: {{inputBorderColorFocus}};}'
                            ]]
                        ),

                        'border'            => array(
                            'type'          => 'object',
                            'default'       => (object) array(),
                            'style'         => [(object) [
                                'selector'  => '{{QUBELY}} .search_form_shortcode input[type="text"]'
                            ]]
                        ),
                        'borderRadius'      => array(
                            'type'          => 'object',
                            'default'       => (object) array(),
                            'style'         => [(object) [
                                'selector' => '{{QUBELY}} .search_form_shortcode input[type="text"]'
                            ]]
                        ),

                        
                    ),
                    'render_callback' => array( $this, 'Edumax_Course_Search_block_callback' ),
                )
            );
        }
    
		public function Edumax_Course_Search_block_callback( $att ){

            $uniqueId   = isset($att['uniqueId']) ? $att['uniqueId'] : '';
            $action     = function_exists('tutor_utils') ? tutor_utils()->course_archive_page_url() : site_url('/');
            
            $html = '';
            $html .= '<div class="qubely-block-' . $uniqueId . '">';
                $html .= '<div class="edumax-form-search-wrapper edumax-qubely-search">';
                    $html .= '<form class="search_form_shortcode" role="search" action="'.esc_url($action).'" method="get">
                                <input class="edumax-ajax-search" data-url="'.plugin_dir_url('', __FILE__).'edumax-core/lib/search-data.php'.'" type="text" name="s" value="'.esc_attr( get_search_query()).'" placeholder="'.__( 'Search ...', 'edumax-core' ).'"/>
                                <button type="submit"><i class="fas fa-search"></i></button>
                                <div class="edumax-course-search-results"></div>
                            </form>';
                    $html .= '<div class="edumax-course-search-results"></div>';
                $html .= '</div>';
            $html .= '</div>';

			return $html;
		}
    }
}
Edumax_Tutor_Course_Search::instance();

