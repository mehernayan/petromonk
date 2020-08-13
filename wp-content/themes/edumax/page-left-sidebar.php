<?php
/**
* Template Name: Page With Left Sidebar
*/
get_header(); ?>
<?php get_template_part('lib/sub-header'); ?>
    <section id="main" class="generic-padding">
        <div class="container ">
            <div class="row">
                <?php
                get_sidebar(); ?> <!--Page with Left Sidebar-->
                <div id="content" class="site-content col-md-8" role="main">
                    <?php while ( have_posts() ): the_post(); ?>
                        <div id="post-<?php the_ID(); ?>">
                            <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
                                <div class="row">
                                    <div class="entry-thumbnail col-md-12">
                                        <?php the_post_thumbnail(); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="entry-content row">
                                <div class="col">
                                    <?php
                                        the_content();
                                        wp_link_pages();
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                        ?>
                    <?php endwhile; ?>
                </div> <!--/#content-->
            </div>
        </div>
    </section> <!--/#main-->
<?php get_footer();