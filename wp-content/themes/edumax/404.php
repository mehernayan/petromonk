<?php get_header();
/*
*Template Name: 404 Page Template
*/
?>
<div class="container edumax-error-wrapper">
    <div class="col-12 info-wrapper">
    	<h1 class="error-title"><?php _e('404','edumax'); ?></h1>
    	<h2 class="error-message-title"><?php  echo esc_html(get_theme_mod( '404_title', 'Page not found!' )); ?></h2>
    	<p class="error-message"><?php  echo esc_html(get_theme_mod( '404_description', '' )); ?></p>
    	<a class="edumax_btn  btn-fill standard" href="<?php echo esc_url( home_url('/') ); ?>" title="<?php  esc_html_e( 'HOME', 'edumax' ); ?>"><?php  echo esc_html(get_theme_mod( '404_btn_text', esc_html__('Go Back', 'edumax') )); ?></a>
    </div>
</div>
<?php get_footer(); ?>
