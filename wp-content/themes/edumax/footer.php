<?php if ( get_theme_mod( 'bottom_en', true ) && (is_active_sidebar('bottom1') || is_active_sidebar('bottom2') || is_active_sidebar('bottom3') || is_active_sidebar('bottom4'))) { ?>
    <?php $col = get_theme_mod( 'bottom_column', 3 ); ?>
        <div id="bottom-wrap">
            <div class="container">
                <div class="row clearfix">
                    <?php if (is_active_sidebar('bottom1')):?>
                        <div class="col-sm-6 col-md-6 col-lg-<?php echo esc_attr($col);?>">
                            <?php dynamic_sidebar('bottom1'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (is_active_sidebar('bottom2')):?>
                        <div class="col-sm-6 col-md-6 col-lg-<?php echo esc_attr($col);?>">
                            <?php dynamic_sidebar('bottom2'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (is_active_sidebar('bottom3')):?>
                        <div class="col-sm-6 col-md-6 col-lg-<?php echo esc_attr($col);?>">
                            <?php dynamic_sidebar('bottom3'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (is_active_sidebar('bottom4')):?>
                        <div class="col-sm-6 col-md-6 col-lg-<?php echo esc_attr($col);?>">
                            <?php dynamic_sidebar('bottom4'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div><!--/#bottom-wrap-->
        <?php } ?>
        <?php if ( get_theme_mod( 'footer_en', true )) { ?>
            <footer id="footer-wrap"> 
                <div class="container">
                    <div class="row clearfix">
                        <?php if ( get_theme_mod( 'copyright_en', true )) { ?>
                            <div class="col-12 col-lg-6">
                                <div class="footer-copyright text-center text-lg-left">
                                    <?php if( get_theme_mod( 'copyright_en', true ) ) { ?>
                                        <?php echo wp_kses_post(balanceTags( get_theme_mod( 'copyright_text', '&copy; 2019 Edumax. All Rights Reserved.') )); ?>
                                    <?php } ?>
                                </div> <!-- col-md-6 -->
                            </div> <!-- end footer-copyright -->
                        <?php } ?>                        

                        <?php if ( get_theme_mod( 'bottom_footer_menu', true )) { ?>
                            <?php if ( has_nav_menu( 'footernav' ) ) { ?>
                                <div class="col-12 col-lg-6 text-center text-lg-right">
                                    <?php
                                    $default = array( 'theme_location'  => 'footernav',
                                      'container'       => '', 
                                      'menu_class'      => 'menu-footer-menu',
                                      'menu_id'         => 'menu-footer-menu',
                                      'fallback_cb'     => 'wp_page_menu',
                                      'depth'           => 1
                                    );
                                    wp_nav_menu($default);
                                    ?>
                                </div>
                            <?php } ?> 
                        <?php } ?>
                    </div><!--/.row clearfix-->    
                </div><!--/.container-->    
            </footer><!--/#footer-wrap-->    
        <?php } ?>
    </div> <!-- #page -->
<?php wp_footer(); ?>
</body>
</html>