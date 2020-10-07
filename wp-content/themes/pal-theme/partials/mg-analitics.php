<?php
$page_ID = get_the_ID();
$pages = [1493, 1592, 1604, 1609, 1612, 956, 1299, 1298];

if( in_array($page_ID, $pages) ){

  function create_table($table_name) {
    global $wpdb;
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    $table = $wpdb->prefix . "analitics_page_$table_name";
    $charset_collate = $wpdb->get_charset_collate();
    $table_sql = "CREATE TABLE {$table} (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      ip text NOT NULL,
      date datetime,
      click boolean DEFAULT false,
      click_date datetime,
      activity int(11) DEFAULT 0,
      UNIQUE KEY id (id)
    ) {$charset_collate};";
    dbDelta($table_sql);
  }

  // function create_tables_template_pages($template_name){
  //   $pages = get_pages([
  //     'meta_key' => '_wp_page_template',
  //     'meta_value' => $template_name //'templates/page-v1.php'
  //   ]);
  //   foreach ($pages as $page) {
  //     create_table($page->ID);
  //   }
  // }
  $pages = [1493, 1592, 1604, 1609, 1612, 956, 1299, 1298];
  foreach ($pages as $page) {
    create_table($page);
  }

  function add_ip($page_id, $ip){
    global $wpdb;
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    $table = $wpdb->prefix . "analitics_page_$page_id";

    $ip_data = $wpdb->get_results("SELECT * FROM $table WHERE ip = '$ip'");

    if(empty($ip_data)){
      $date = new DateTime();
      $wpdb->insert($table,
        array(
          'ip' => $ip,
          'date' => $date->format('Y-m-d H:i:s'),
          'activity' => 1
        )
      );
      echo '<script>
      const UNIQ_USER = true;
      const USER_IP = "'.$ip.'";
      </script>';
    } else {
      $activity = $ip_data[0]->activity + 1;
      $wpdb->update($table,
        array( 'activity' => $activity ),
        array( 'ip' => $ip )
      );

      if($ip_data[0]->click){
        $unique = 'false';
      } else {
        $unique = 'true';
      }
      echo '<script>
      const UNIQ_USER = '.$unique.';
      const USER_IP = "'.$ip.'";
      </script>';
    }
  }

  function show_analytics($page_id){
    global $wpdb;
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    $table = $wpdb->prefix . "analitics_page_$page_id";

    $page_data = $wpdb->get_results("SELECT * FROM $table");
    $page_data_today = $wpdb->get_results("SELECT * FROM $table WHERE date(click_date) = CURDATE()");
    $page_data_today_visitors = $wpdb->get_results("SELECT * FROM $table WHERE date(date) = CURDATE()");

    if(!empty($page_data)){
      $unique_visitors = count($page_data);
      $page_activity = 0;
      $unique_clicks = 0;
      foreach ($page_data as $page) {
        $unique_clicks = intval($unique_clicks) + $page->click;
        $page_activity = intval($page_activity) + $page->activity;
      }

      $unique_visitors_today = count($page_data_today_visitors);
      $unique_clicks_today = 0;
      foreach ($page_data_today as $page) {
        $unique_clicks_today = intval($unique_clicks_today) + $page->click;
      }

      $unique_clicks_conversion = intval($unique_clicks) / intval($unique_visitors) * 100;
      $unique_clicks_conversion_today = intval($unique_clicks_today) / intval($unique_visitors_today) * 100;
      $current_user = wp_get_current_user();
      if( user_can( $current_user, 'administrator' ) ){
        echo '<script>
          console.log("Page Analytics: --------------------------");
          console.log("Page activity - '.$page_activity.'");
          console.log("All time: --------------------------------");
          console.log("Unique visitors - '.$unique_visitors.'");
          console.log("Unique clicks - '.$unique_clicks.'");
          console.log("Unique clicks conversion - '.$unique_clicks_conversion.'%");
          console.log("Today: -----------------------------------");
          console.log("Unique visitors - '.$unique_visitors_today.'");
          console.log("Unique clicks - '.$unique_clicks_today.'");
          console.log("Unique clicks conversion - '.$unique_clicks_conversion_today.'%");
        </script>';
      }
    }
  }

  $page_ID = get_the_ID();
  if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  $user_ip = apply_filters( 'wpb_get_ip', $ip );
  add_ip($page_ID, $user_ip);
  show_analytics($page_ID);

}