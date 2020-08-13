<?php
define('WP_USE_THEMES', false);
$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
$wp_load = $parse_uri[0].'wp-load.php';
require_once($wp_load);

$output 	= '';
if(isset($_POST['raw_data'])){
	$row_data = $_POST['raw_data'];
	$args = array(
		'post_type' => 'courses',
		's'					=> $row_data,
		'posts_per_page' 	=> 10
	);
}
$search_data = new WP_Query($args);

if(!empty($row_data)){
	if($search_data->have_posts()){
		$output .= '<ul class="edumax-courses-search results-list">';
		while ($search_data->have_posts()): $search_data->the_post();
			$output .= '<li>';
				$output .= '<div class="pack-thumb">';
					$output .= '<a href="'.get_permalink().'">'.get_the_title().'</a>';
				$output .= '</div>';
			$output .= '</li>';
		endwhile;
		$output .= '</ul>';
		wp_reset_postdata();
	}
}
echo $output;
