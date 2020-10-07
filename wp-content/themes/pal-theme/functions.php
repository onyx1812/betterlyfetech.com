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
  $post_id = $_POST['post_id'];
  $ip = $_POST['ip'];
  $table = $wpdb->prefix . "analitics_page_$post_id";
  $date = new DateTime();
  if( $wpdb->update($table,
    array(
      'click_date' => $date->format('Y-m-d H:i:s'),
      'click' => true
    ),
    array('ip' => $ip)
  )){
    echo "success";
  } else {
    echo "fail";
  }

  wp_die();
}
add_action('wp_ajax_addClick', 'addClick');
add_action('wp_ajax_nopriv_addClickt', 'addClick');