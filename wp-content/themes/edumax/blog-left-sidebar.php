<?php
/**
 * Template Name: Blog Left Sidebar
 */

get_header(); ?>

<?php get_template_part('lib/sub-header')?>
    <section id="main" class="generic-padding">
        <div class="container">
            <?php
            $enable_sidebar = get_theme_mod('enable_sidebar', true);
            query_posts(array( 'post_type' => 'post' ));
            ?>
            <div class="row">
                <?php if($enable_sidebar) get_sidebar(); ?>
                <div id="content" class="site-content col-sm-<?php echo esc_attr($enable_sidebar ? '8' : '12'); ?>" role="main">
                    <div class="row">
                        <?php
                        if (have_posts() ) {
                            while (have_posts() ) :the_post(); ?>
                                <div class="separator-wrapper col-md-<?php echo esc_attr(get_theme_mod( 'blog_column', 6 ));?>">
                                    <?php get_template_part( 'post-format/content', get_post_format() ); ?>
                                </div>
                            <?php
                            endwhile;
                            echo "<div class='col-12'>".get_the_posts_pagination()."</div>";
                        } else {
                            get_template_part( 'post-format/content', 'none' );
                        }
                        ?>
                    </div>
                </div><!-- content//column -->
            </div> <!--row-->
        </div> <!-- .container -->
    </section> <!-- #main -->

<?php get_footer();