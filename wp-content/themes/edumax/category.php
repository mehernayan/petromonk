<?php get_header(); ?>
<?php get_template_part('lib/sub-header')?>
<section id="main" class="generic-padding">
    <div class="container"> 
        <div id="content" class="site-content" role="main">
            <div class="row">
                <?php
                    $enable_sidebar = get_theme_mod('enable_sidebar', true);
                    $content_column = $enable_sidebar ? '8' : '12';
                ?>
                <div id="content" class="site-content col-sm-<?php echo esc_attr($content_column); ?>" role="main">
                    <div class="row">
                <?php
                    $col = get_theme_mod( 'blog_column', 6 );
                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post(); ?>
                                <div class="separator-wrapper col-md-<?php echo esc_attr($col);?>">
                                    <?php get_template_part( 'post-format/content', get_post_format() ); ?>
                                </div>
                            <?php
                        endwhile;
                    else:
                        get_template_part( 'post-format/content', 'none' );
                    endif;                              
                $page_numb = max( 1, get_query_var('paged'));
                $max_page = $wp_query->max_num_pages;
                echo edumax_pagination( $page_numb, $max_page );
                ?>
                    </div>
                </div><!-- site content -->
                <?php if($enable_sidebar) get_sidebar(); ?>
            </div><!-- .row -->
        </div><!-- .container -->
    </div> <!-- #content -->
</section> 

<?php get_footer();