<?php

// Includes
include('include/settings.php');
include('include/clear.php');

// Scripts
function front_scripts() {
  if( is_front_page() ){
    wp_enqueue_style( 'styles', get_template_directory_uri().'/css/styles-index.css');
  }

  if( is_404() ){
    wp_enqueue_style( 'styles', get_template_directory_uri().'/css/styles-404.css');
  }

  if( is_page_template( 'templates/page-v1.php' ) ){
    wp_enqueue_style( 'styles', get_template_directory_uri().'/css/styles-v1.css');
  }

  if( is_page_template( array('templates/page-v1.php') ) ){
    wp_enqueue_script( 'scripts', ROOT . '/js/scripts.js', false, false, 'in_footer');
  }
}
add_action( 'wp_enqueue_scripts', 'front_scripts' );




function addClick(){
  global $wpdb;
  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
  $page_ID = $_POST['post_id'];
  $table_analytics_pages = $wpdb->prefix . "analytics_pages";

  $page_data = $wpdb->get_results("SELECT * FROM $table_analytics_pages WHERE page_id = $page_ID");
  $page_clicks = intval($page_data[0]->page_clicks) + 1;
  $result = $wpdb->update($table_analytics_pages,
    array(
      'page_clicks' => $page_clicks
    ),
    array( 'page_id' => $page_ID )
  );

  return json_encode($result);

  wp_die();
}
add_action('wp_ajax_addClick', 'addClick');
add_action('wp_ajax_nopriv_addClickt', 'addClick');