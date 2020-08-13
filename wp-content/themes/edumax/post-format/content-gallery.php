<?php if( is_single() ): ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('edumax-post edumax-single-post single-content-flat'); ?>>
    <?php else: ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('edumax-post edumax-blog-listing edumax-index-post'); ?>>
        <?php endif; ?>

        <?php
        $blog_column = get_theme_mod( 'blog_column', 6 );

        ?>

        <div class="featured-wrap blog-details-img">
            <div class="entry-content-gallery">
                <?php if(function_exists('rwmb_meta')){ ?>
                    <?php $slides = get_post_meta( get_the_ID(),'themeum_gallery_images',false); ?>
                    <?php if(count($slides) > 0) { ?>
                        <div id="blog-gallery-slider<?php echo get_the_ID(); ?>" class="carousel slide blog-gallery-slider">
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <?php $slide_no = 1; ?>
                                <?php foreach( $slides as $slide ) { ?>
                                    <div class="carousel-item <?php if($slide_no == 1) echo 'active'; ?>">
                                        <?php //$images = wp_get_attachment_image_src( $slide, 'edumax-large' ); ?>

                                        <?php
                                        $col = get_theme_mod( 'blog_column', 4 );
                                        if ($col == 3) {
                                            $images = wp_get_attachment_image_src( $slide, 'edumax-blog-medium' );
                                        }elseif ($col == 4) {
                                            $images = wp_get_attachment_image_src( $slide, 'edumax-blog-medium' );
                                        }else{
                                            $images = wp_get_attachment_image_src( $slide, 'edumax-large' );
                                        }
                                        ?>
                                        <img class="img-responsive" src="<?php echo esc_url($images[0]); ?>" alt="<?php  esc_html_e( 'image', 'edumax' ); ?>">
                                    </div>
                                    <?php $slide_no++; ?>
                                <?php } ?>
                            </div>
                            <!-- Controls -->
                            <a class="carousel-control-prev" href="#blog-gallery-slider<?php echo get_the_ID(); ?>" data-slide="prev"><i class="fas fa-angle-left"></i></a>
                            <a class="carousel-control-next" href="#blog-gallery-slider<?php echo get_the_ID(); ?>" data-slide="next"><i class="fas fa-angle-right"></i></a>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div><!--/.entry-content-gallery-->
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
