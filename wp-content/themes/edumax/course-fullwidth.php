<?php
/**
 * Template Name: Course Fullwidth
 */

get_header(); ?>

<?php get_template_part('lib/sub-header')?>
    <div class="generic-padding">
        <div class="container">
            <?php
            do_shortcode('[edumax-course sidebar="false" style="1"]');
            ?>
        </div>
    </div>

<?php get_footer();
