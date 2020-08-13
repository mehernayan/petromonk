<form method="get" id="searchform" action="<?php echo esc_url(home_url( '/' )); ?>" >
    <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" class="form-control" placeholder="<?php esc_html_e('Search.....','edumax'); ?>" autocomplete="off" />
</form>