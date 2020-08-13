<?php
define( 'EDUMAX_CSS', get_template_directory_uri().'/css/' );
define( 'EDUMAX_JS', get_template_directory_uri().'/js/' );
define( 'EDUMAX_DIR', get_template_directory() );
define( 'EDUMAX_URI', trailingslashit(get_template_directory_uri()) );


/* -------------------------------------------
*           	Include TGM Plugins
* -------------------------------------------- */
require_once( EDUMAX_DIR . '/lib/class-tgm-plugin-activation.php');

/* -------------------------------------------
*           	Membership Pro Sign Up Shortcode
* -------------------------------------------- */
require_once(EDUMAX_DIR . '/lib/shortcode/pmpro/pmpro-advanced-levels-shortcode.php');


/*-------------------------------------------*
 *				Register Navigation
 *------------------------------------------*/
register_nav_menus( array(
    'primary' => esc_html__( 'Primary Menu', 'edumax' ),
    'footernav' => esc_html__( 'Footer Menu', 'edumax' ),
) );


/*-------------------------------------------*
 *				navwalker
 *------------------------------------------*/
require_once( EDUMAX_DIR . '/lib/menu/mobile-navwalker.php');


/*-------------------------------------------*
 *				Edumax Register
 *------------------------------------------*/
require_once( EDUMAX_DIR . '/lib/main-function/themeum-register.php');


/*-------------------------------------------------------
 *				Edumax Core
 *-------------------------------------------------------*/
require_once( EDUMAX_DIR . '/lib/main-function/themeum-core.php');

/*-----------------------------------------------------
 * 				Custom Excerpt Length
 *----------------------------------------------------*/
if(!function_exists('edumax_excerpt_max_charlength')):
    function edumax_excerpt_max_charlength($charlength) {
        $excerpt = get_the_excerpt();
        $charlength++;

        if ( mb_strlen( $excerpt ) > $charlength ) {
            $subex = mb_substr( $excerpt, 0, $charlength - 5 );
            $exwords = explode( ' ', $subex );
            $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
            if ( $excut < 0 ) {
                return mb_substr( $subex, 0, $excut );
            } else {
                return $subex;
            }
        } else {
            return $excerpt;
        }
    }
endif;

/* -------------------------------------------
 * 				Custom body class
 * ------------------------------------------- */
add_filter( 'body_class', 'edumax_body_class' );
function edumax_body_class( $classes ) {
    $layout = get_theme_mod( 'boxfull_en', 'fullwidth' );
    $classes[] = $layout.'-bg';
    return $classes;
}

/* -------------------------------------------
 * 				Logout Redirect Home
 * ------------------------------------------- */
add_action( 'wp_logout', 'edumax_auto_redirect_external_after_logout');
function edumax_auto_redirect_external_after_logout(){
    wp_redirect( home_url('/') );
    exit();
}


/* -------------------------------------------
 * 				Remove API
 * ------------------------------------------- */
function edumax_remove_api() {
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
}
add_action( 'after_setup_theme', 'edumax_remove_api' );



/* -------------------------------------------
 *   show header cart
 * ------------------------------------------- */

if ( ! function_exists( 'edumax_header_cart' ) ) {
    function edumax_header_cart() {
        if(!function_exists('wc_get_cart_url')) return;
        ?>
        <ul id="site-header-cart" class="site-header-cart menu">
            <li class="cart-icon">
                <a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'edumax' ); ?>">
                    <span class="count"><?php echo wp_kses_data( sprintf( _n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'edumax' ), WC()->cart->get_cart_contents_count() ) );?></span>
                </a>
            </li>
            <li>
                <?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
            </li>
        </ul>
        <?php
    }
}

add_filter( 'woocommerce_add_to_cart_fragments', 'storefront_cart_link_fragment' );

if ( ! function_exists( 'storefront_cart_link_fragment' ) ) {
    function storefront_cart_link_fragment( $fragments ) {
        global $woocommerce;

        ob_start(); ?>
        <a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'edumax' ); ?>">
            <span class="count"><?php echo wp_kses_data( sprintf( _n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'edumax' ), WC()->cart->get_cart_contents_count() ) );?></span>
        </a>
        <?php
        $fragments['a.cart-contents'] = ob_get_clean();

        return $fragments;
    }
}


if(function_exists('tutor_utils')){

    if(!function_exists('edumax_shop_redirect')){
        function edumax_shop_redirect(){
            return get_post_type_archive_link(tutor()->course_post_type);
        }
    }
    add_filter('woocommerce_return_to_shop_redirect', 'edumax_shop_redirect');


    if(!function_exists('edumax_login_class')){
        function edumax_login_class(){
            return 'login-popup';
        }
    }
    add_filter('tutor_enroll_required_login_class', 'edumax_login_class');


    function edumax_cart_permalink($permalink, $item, $key){
        $course = tutor_utils()->product_belongs_with_course($item['product_id']);
        if($course){
            return get_permalink($course->post_id);
        }
        return $permalink;
    }
    add_filter('woocommerce_cart_item_permalink', 'edumax_cart_permalink', 10, 3);
}

