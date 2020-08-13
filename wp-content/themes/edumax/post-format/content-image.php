<?php if( is_single() ): ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('edumax-post edumax-single-post single-content-flat'); ?>>
    <?php else: ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('edumax-post edumax-blog-listing edumax-index-post'); ?>>
        <?php endif; ?>

        <?php
        $blog_column = get_theme_mod( 'blog_column', 6 );
        if(has_post_thumbnail()){
            if(is_single()){
                echo '<div class="blog-details-img">';
                the_post_thumbnail('edumax-large', array('class' => 'img-fluid'));
                echo '</div>';
            }else{
                echo '<a href="'.esc_url(get_the_permalink()).'" class="blog-details-img">';
                if($blog_column == 3){
                    the_post_thumbnail('edumax-blog-medium', array('class' => 'img-fluid'));
                }elseif ($blog_column == 4){
                    the_post_thumbnail('edumax-blog-medium', array('class' => 'img-fluid'));
                }else{
                    the_post_thumbnail('edumax-large', array('class' => 'img-fluid'));
                }
                echo '</a>';
            }
        }
        ?>

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