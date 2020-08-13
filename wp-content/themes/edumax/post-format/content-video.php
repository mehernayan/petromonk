<?php if( is_single() ): ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('edumax-post edumax-single-post single-content-flat'); ?>>
    <?php else: ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('edumax-post edumax-blog-listing edumax-index-post'); ?>>
        <?php endif; ?>

        <?php
        $blog_column = get_theme_mod( 'blog_column', 6 );
        ?>
        <?php if(function_exists('rwmb_meta')){ ?>
            <?php  if ( get_post_meta( get_the_ID(), 'themeum_video',true ) ) { ?>
                <div class="entry-video embed-responsive embed-responsive-16by9">
                    <?php $video_source = esc_attr(get_post_meta( get_the_ID(), 'themeum_video_source',true )); ?>
                    <?php $video = get_post_meta( get_the_ID(), 'themeum_video',true ); ?>
                    <?php if($video_source == 1): ?>
                        <?php echo get_post_meta( get_the_ID(), 'themeum_video',true ); ?>
                    <?php elseif ($video_source == 2): ?>
                        <?php echo '<iframe width="100%" height="350" src="http://www.youtube.com/embed/'.esc_attr($video).'?rel=0&showinfo=0&modestbranding=1&hd=1&autohide=1&color=white"  allowfullscreen></iframe>'; ?>
                    <?php elseif ($video_source == 3): ?>
                        <?php echo '<div class="embed-responsive embed-responsive-16by9"><iframe src="http://player.vimeo.com/video/'.esc_attr($video).'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>'; ?>
                    <?php endif; ?>
                </div>
            <?php } ?>
        <?php } ?>
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