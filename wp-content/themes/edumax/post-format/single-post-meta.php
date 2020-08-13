<?php

//single
$blog_author_single = get_theme_mod( 'blog_author_single', true ) ;
$blog_date_single = get_theme_mod( 'blog_date_single', true ) ;
$blog_category_single = get_theme_mod( 'blog_category_single', true ) ;
$blog_hit_single = get_theme_mod( 'blog_hit_single', true ) ;
$blog_tags_single = get_theme_mod( 'blog_tags_single', true ) ;
$blog_comment_single = get_theme_mod( 'blog_comment_single', true ) ;

if ( $blog_author_single || $blog_date_single || $blog_category_single || $blog_hit_single || $blog_tags_single || $blog_comment_single ): ?>
    <ul class="blog-post-meta">
        <?php if ( $blog_author_single ) : ?>
            <li class="meta-author">
                By <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author_meta('display_name'); ?></a>
            </li>
        <?php endif; ?>

        <?php if ( $blog_date_single ) { ?>
            <li>
                <div class="blog-date-wrapper">
                    <?php
                        $archive_year  = get_the_time( 'Y' );
                        $archive_month = get_the_time( 'm' );
                        $archive_day   = get_the_time( 'd' );
                    ?>
                    <a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) ); ?>"><time datetime="<?php echo get_the_date('Y-m-d') ?>"><i class="fas fa-calendar"></i> <?php echo get_the_date(); ?></time></a>
                </div>
            </li>
        <?php } ?>

        <?php if ( $blog_category_single ): ?>
            <li class="meta-category">
                <i class="fas fa-folder"></i> <?php printf(esc_html__('%s', 'edumax'), get_the_category_list(', ')); ?>
            </li>
        <?php endif; ?>

        <?php if ( $blog_hit_single ) { ?>
            <li>
                <?php
                # blog Count Down
                $visitor_count = get_post_meta( $post->ID, '_post_views_count', true);
                if( $visitor_count == '' ){ $visitor_count = 0; }
                if( $visitor_count >= 1000 ){
                    $visitor_count = round( ($visitor_count/1000), 2 );
                    $visitor_count = $visitor_count.'k';
                }
                echo '<i class="fas fa-eye" aria-hidden="true"></i>'; ?>
                <span><?php echo esc_attr( $visitor_count );
                    ?></span>
            </li>
        <?php } ?>

        <?php if ( $blog_tags_single ) { ?>
            <li><?php echo get_the_tag_list('<i class="fas fa-tags"></i> ',', ',''); ?></li>
        <?php } ?>

        <?php if ( $blog_comment_single ) { ?>
            <li><i class="fas fa-comments"></i> <span><?php comments_number( '0', '1', '%' ); ?><?php esc_html_e(' Comments', 'edumax') ?></span></li>
        <?php } ?>

    </ul>

<?php endif; ?>