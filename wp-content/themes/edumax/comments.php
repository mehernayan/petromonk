<?php
/* This comments template */
if ( post_password_required() )
    return;
?>
<div id="comments" class="comments-area comments">
    <?php if ( have_comments() ) : ?>
        <h3 class="comments-title">
            <?php comments_number( esc_html__('No Comment', 'edumax' ), esc_html__('One Comment', 'edumax' ), esc_html__('Comment List', 'edumax' ) ); ?>
        </h3>
        <ul class="comment-list">
            <?php
            wp_list_comments( array(
                'style'       => 'ul',
                'short_ping'  => true,
                'callback' => 'edumax_comment',
                'avatar_size' => 50
            ) );
            ?>
        </ul><!-- .comment-list -->
        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <nav class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment navigation', 'edumax' ); ?></h1>
                <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'edumax' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'edumax' ) ); ?></div>
            </nav><!-- .comment-navigation -->
        <?php endif; // Check for comment navigation ?>
        <?php if ( ! comments_open() && get_comments_number() ) : ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.' , 'edumax' ); ?></p>
        <?php endif; ?>
    <?php endif; // have_comments() ?>
    <?php
        $commenter  = wp_get_current_commenter();
        $req        = sanitize_email(get_option( 'require_name_email' ));
        $aria_req   = ( $req ? " aria-required='true'" : '' );
        $fields     =  array(
            'author'    => '<div class=""><input id="author" name="author" type="text" placeholder="'. esc_html__( 'Name', 'edumax' ) .'" value="" size="30"' . esc_attr($aria_req) . '/>',
            'email'     => '<input id="email" name="email" type="text" placeholder="'. esc_html__( 'Email', 'edumax' ) .'" value="" size="30"' . esc_attr($aria_req) . '/>',
            'url'       => '<input id="url" name="url" type="text" placeholder="'. esc_html__( 'Website url', 'edumax' ) .'" value="" size="30"/></div>',
        );
        $comments_args = array(
            'fields'                    =>  $fields,
            'class_form'                => 'comment-form clearfix',
            'title_reply'               => esc_html__('Write a comment', 'edumax'),
            'comment_notes_before'      => '',
            'comment_notes_after'       => '',
            'comment_field'             => '<div class="comment-form-inner"><textarea id="comment" placeholder="'. esc_html__( 'Comment', 'edumax' ) .'" name="comment" aria-required="true"></textarea></div>',
            'label_submit'              => esc_html__( 'Send Comment', 'edumax' ),
        );
        ob_start();
        comment_form($comments_args);
        $search     = array('class="comment-form"','class="form-submit"');
        $replace    = array('class="comment-form"','class="form-submit"');
        echo str_replace($search,$replace,ob_get_clean());
    ?>
</div>