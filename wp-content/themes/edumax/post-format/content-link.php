<?php if( is_single() ): ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('edumax-post edumax-single-post single-content-flat'); ?>>
    <?php else: ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('edumax-post edumax-blog-listing edumax-index-post'); ?>>
        <?php endif; ?>

        <?php
        $blog_column = get_theme_mod( 'blog_column', 6 );
        ?>

        <div class="featured-wrap-link">
            <?php if(function_exists('rwmb_meta')){ ?>
                <?php  if ( get_post_meta( get_the_ID(), 'themeum_link',true ) ) { ?>
                    <div class="entry-link-post-format">
                        <h4><?php echo esc_url( get_post_meta( get_the_ID(), 'themeum_link',true ) ); ?></h4>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
        <div class="edumax-post-content">
            <?php
            if (is_single()) {
                the_title( '<h2 class="content-item-title">', '</h2>' );
            }

            if (is_single()) {
                get_template_part('post-format/single-post-meta');
            }else{
                get_template_part('post-format/post-meta');
            }
            ?>
            <div class="entry-blog">
                <?php
                get_template_part( 'post-format/entry-content' );
                ?>
            </div> <!--/.entry-meta -->
        </div>
    </article><!--/#post-->