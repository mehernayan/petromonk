<div class="entry-summary clearfix">
    <?php 
    if ( is_single() ) {
        the_content();
        if(get_theme_mod( 'blog_nav_link', true )){
        ?>
            <div class="clearfix post-navigation">
                <?php previous_post_link('<span class="previous-post pull-left">%link</span>','<i class="fas fa-long-arrow-alt-left"></i> '.esc_html__("Previous article",'edumax')); ?>
                <?php next_post_link('<span class="next-post pull-right">%link</span>',esc_html__("Next article",'edumax').' <i class="fas fa-long-arrow-alt-right"></i>'); ?>
            </div>
        <?php
        }
        wp_link_pages( array(
            'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'edumax' ) . '</span>',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
        ));
        get_template_part( 'post-format/social-buttons' );

        ?>
            <div class="usehlhdkjs">
                <?php
                if ( get_theme_mod( 'blog_single_comment_en', true ) ) {
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                }
                ?>
            </div>
        <?php

            if ( is_singular( 'post' ) ){
                $count_post = esc_attr( get_post_meta( $post->ID, '_post_views_count', true) );
                if( $count_post == ''){
                    $count_post = 1;
                    add_post_meta( $post->ID, '_post_views_count', $count_post);
                }else{
                    $count_post = (int)$count_post + 1;
                    update_post_meta( $post->ID, '_post_views_count', $count_post);
                }
            }
    } else {
        if ( get_theme_mod( 'blog_intro_text_en', false ) ) {
            if ( get_theme_mod( 'blog_post_text_limit', 100 ) ) {
                $textlimit = get_theme_mod( 'blog_post_text_limit', 100 );
                if (get_theme_mod( 'blog_intro_text_en', true )) {
                    echo edumax_excerpt_max_charlength($textlimit);
                }
            } else {
                the_content();
            }
        }
        if ( get_theme_mod( 'blog_continue_en', false ) ) {
            if ( get_theme_mod( 'blog_continue', 'Read Article' ) ) {
                $continue = esc_html( get_theme_mod( 'blog_continue', 'Read More' ) );
                echo '<a class="blog-listing-loadmore" href="'.get_permalink().'">'. $continue .' <i class="fas fa-chevron-right" aria-hidden="true"></i></a>';
            }
        }
    } 
    ?>
</div> <!-- //.entry-summary -->




