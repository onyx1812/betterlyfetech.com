<?php

add_action( 'save_post', 'json_pages', 10, 3);
function json_pages( $post_ID, $post, $update ) {
	$json = [];

	$args = array(
		'post_type'      => 'page',
		'posts_per_page' => -1,
		'post__not_in' => [57],
		'orderby'        => 'date',
		'order'          => 'ASC'
	);
	$myQuery = new WP_Query($args);
	while ($myQuery->have_posts()): $myQuery->the_post();
		$product = array(
			'id'          => get_the_ID(),
			'title'       => get_the_title(),
			'content'  => get_field('content'),
		);
		array_push($json, $product);
	endwhile;

	$file = ABSPATH . './wp-vue/data/pages.json';
	file_put_contents($file, json_encode($json));

	wp_reset_postdata();
}