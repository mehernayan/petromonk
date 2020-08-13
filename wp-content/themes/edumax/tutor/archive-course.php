<?php
/**
 * Template for displaying courses
 *
 * @since v.1.0.0
 *
 * @author Themeum
 * @url https://themeum.com
 */

get_header(); ?>

<?php get_template_part('lib/sub-header')?>
<div class="generic-padding">
    <div class="container">
        <?php
            do_shortcode('[edumax-course]');
        ?>
    </div>
</div>

<?php get_footer();
