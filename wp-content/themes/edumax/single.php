<?php get_header(); ?>
<?php get_template_part('lib/sub-header'); ?>
    <section id="main" class="generic-padding">
        <div class="container single-wrapper-content">
            <div class="row">
                <?php
                    $enable_sidebar = get_theme_mod('enable_sidebar', true);
                    $content_column = $enable_sidebar ? '8' : '12';
                ?>
                <div id="content" class="site-content blog-content-wrapper col-sm-<?php echo esc_attr($content_column); ?>" role="main">
                    <?php if ( have_posts() ) :  ?> 
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php get_template_part( 'post-format/content', get_post_format() ); ?>
                        <?php endwhile; ?>
                    <?php else: ?>
                    <?php get_template_part( 'post-format/content', 'none' ); ?>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                </div> <!-- #content -->
                <?php if($enable_sidebar) get_sidebar(); ?>
            </div> <!-- .row -->
        </div> <!-- .container -->
    </section> <!-- #main -->
<?php get_footer();