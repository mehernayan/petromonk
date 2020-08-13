<?php
$blog_author = get_theme_mod( 'blog_author', false ) ;
$blog_category = get_theme_mod( 'blog_category', true ) ;
$blog_comment = get_theme_mod( 'blog_comment', false ) ;
$blog_date = get_theme_mod( 'blog_date', false ) ;
$blog_hit = get_theme_mod( 'blog_hit', false ) ;
$blog_tags = get_theme_mod( 'blog_tags', false ) ;

$category_list = get_the_category( get_the_ID() );

if ($blog_comment || $blog_date): ?>
    <ul class="blog-post-meta">
        <?php if ( $blog_date ) { ?>
            <li>
                <?php
                    $archive_year  = get_the_time( 'Y' );
                    $archive_month = get_the_time( 'm' );
                    $archive_day   = get_the_time( 'd' );
                ?>
                <a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) ); ?>">
                    <time datetime="<?php echo get_the_date('Y-m-d') ?>">
                        <i class="fas fa-calendar"></i>
                        <?php echo get_the_date(); ?></time>
                </a>
            </li>
        <?php } ?>
        <?php if ( $blog_hit ) { ?>
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
                <span><?php echo esc_attr( $visitor_count ); ?></span>
            </li>
        <?php } ?>

        <?php

        $blog_tag_list = get_the_tag_list('<i class="fas fa-tags"></i> ',', ','');

        if ( $blog_tags && !empty($blog_tag_list) ) { ?>
            <li><?php echo get_the_tag_list('<i class="fas fa-tags"></i> ',', ',''); ?></li>
        <?php } ?>

        <?php if ( $blog_comment ) { ?>
            <li><i class="fas fa-comments"></i> <span><?php comments_number( '0', '1', '%' ); ?></span></li>
        <?php } ?>

    </ul>

<?php endif;

the_title( '<h2 class="content-item-title"><a href="'.get_the_permalink().'">', '</a></h2>' );


if ( $blog_author || $blog_category): ?>
    <div class="blog-meta-top">
        <?php if($blog_author) : ?>
            <span>By
                <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
                    <?php echo get_the_author_meta('display_name'); ?>
                </a>
            </span>
        <?php endif; ?>
        In
        <?php
        if($blog_category) {
            foreach ($category_list as $category){
                echo "<a href='". get_category_link($category->term_id) ."'>".$category->name."</a>";
            }
        }
        ?>
    </div>

<?php endif;