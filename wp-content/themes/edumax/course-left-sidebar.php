<?php
/**
 * Template Name: Course Left Sidebar
 */


get_header(); ?>

<?php get_template_part('lib/sub-header')?>
    <div class="generic-padding">
        <div class="container">
            <?php
            do_shortcode('[edumax-course sidebar="true" sidebar_position="left" column="2" style="1"]');
            ?>
        </div>
    </div>

<?php get_footer();
