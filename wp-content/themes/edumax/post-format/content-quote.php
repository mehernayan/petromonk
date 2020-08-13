<?php if( is_single() ): ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('edumax-post edumax-single-post single-content-flat'); ?>>
    <?php else: ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('edumax-post edumax-blog-listing edumax-index-post'); ?>>
        <?php endif; ?>

        <?php
        $blog_column = get_theme_mod( 'blog_column', 6 );
        ?>
        <div class="featured-wrap-quite">
            <?php if(function_exists('rwmb_meta')){ ?>
                <?php  if ( get_post_meta( get_the_ID(), 'themeum_qoute',true ) ) { ?>
                    <div class="entry-quote-post-format">
                        <span class="blog-content-quote"><i class="fas fa-quote-left" aria-hidden="true"></i></span>
                        <blockquote>
                            <h2><?php echo esc_html(get_post_meta( get_the_ID(), 'themeum_qoute',true )); ?></h2>
                            <span>&nbsp; <i class="fas fa-minus" aria-hidden="true"></i> &nbsp;<?php echo esc_html(get_post_meta( get_the_ID(), 'themeum_qoute_author',true )); ?></span>
                        </blockquote>
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