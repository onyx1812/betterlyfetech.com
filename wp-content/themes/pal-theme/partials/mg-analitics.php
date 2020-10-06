<?php

/*

$current_user = wp_get_current_user();
if (user_can( $current_user, 'administrator' )) {

	global $wpdb;
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

	$page_ID = get_the_ID();

	$table_analytics = $wpdb->prefix . "analytics";
	$sql = "CREATE TABLE {$table_analytics} (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		date DATETIME NOT NULL,
		ip text NOT NULL,
		last_activity text NOT NULL,
		count_activity INT DEFAULT 1,
		page_id INT DEFAULT 0,
		UNIQUE KEY id (id)
	) {$charset_collate};";
	dbDelta($sql);

	$table_analytics_pages = $wpdb->prefix . "analytics_pages";
	$sql = "CREATE TABLE {$table_analytics_pages} (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		page_id INT DEFAULT 0,
		page_name text NOT NULL,
		page_counter INT DEFAULT 0,
		page_activity INT DEFAULT 0,
		page_orders INT DEFAULT 0,
		UNIQUE KEY id (id)
	) {$charset_collate};";
	dbDelta($sql);


	if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}

	$user_ip = apply_filters( 'wpb_get_ip', $ip );

	$date = date('Y-m-d H:i:s');
	$table_analytics = $wpdb->prefix . "analytics";
	$insert_ip = true;
	$datas = $wpdb->get_results("SELECT * FROM $table_analytics");
	foreach( $datas as $data ){
		if( $data->ip == $user_ip ){
			$cur_date = date('Y-m-d H:i:s');
			$count_activity = $data->count_activity + 1;
			$wpdb->update(
				$table_analytics,
				array(
					'last_activity' => $cur_date,
					'count_activity' => $count_activity,
				),
				array( 'id' => $data->id )
			);
			$insert_ip = false;
		}
	}

	if($insert_ip){
		$wpdb->insert(
			$table_analytics,
			array(
				'date' 			=> $date,
				'ip' 				=> $user_ip,
				'last_activity' => $date,
				'page_id' 		=> $page_ID
			)
		);
	}





	// Page activity
	$pages = $wpdb->get_results(" SELECT * FROM $table_analytics_pages WHERE page_id = $page_ID ");
	$page_activity = $pages[0]->page_activity + 1;
	$wpdb->update(
		$table_analytics_pages,
		array(
			'page_activity' => $page_activity,
		),
		array( 'id' => $pages[0]->id )
	);

	// Page Counter
	$users = $wpdb->get_results(" SELECT page_id FROM $table_analytics");
	$page_visitors = 0;
	foreach ($users as $user) {
		if($page_ID == $user->page_id){
			++$page_visitors;
		}
	}

	if( isset($_GET['pid']) ){
		global $wpdb;
		$page_order_id = $_GET['pid'];
		$page_order = $wpdb->get_results(" SELECT * FROM $table_analytics_pages WHERE page_id = '$page_order_id' ");
		$page_orders = $page_order[0]->page_orders + 1;
		$wpdb->update(
			$table_analytics_pages,
			array(
				'page_orders' => $page_orders,
			),
			array( 'id' => $page_order[0]->id )
		);
	}

	$page_analitics = $wpdb->get_results(" SELECT * FROM $table_analytics_pages WHERE page_id = '$page_ID' ");

	echo '<script>
		console.log("Page visitors - '.$page_visitors.'");
		console.log("Page activity - '.$page_analitics[0]->page_activity.'");
		console.log("Page successed orders - '.$page_analitics[0]->page_orders.'");
	</script>';

}

*/

/*------------------------------
  START create_tables
------------------------------*/
function create_tables() {
  global $wpdb;
  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
  // Table analytics
  // $table_analytics = $wpdb->prefix . "analytics";
  // $table_analytics_sql = "CREATE TABLE {$table_analytics} (
  //   id mediumint(9) NOT NULL AUTO_INCREMENT,
  //   date datetime,
  //   ip text NOT NULL,
  //   last_activity text NOT NULL,
  //   count_activity int(11) DEFAULT 1,
  //   page_id int(11) DEFAULT 0,
  //   UNIQUE KEY id (id)
  // ) {$charset_collate};";
  // dbDelta($table_analytics_sql);
  // Table analytics_pages
  $table_analytics_pages = $wpdb->prefix . "analytics_pages";
  $table_analytics_pages_sql = "CREATE TABLE {$table_analytics_pages} (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    page_id int(11) DEFAULT 0,
    page_visitors int(11) DEFAULT 0,
    page_activity int(11) DEFAULT 0,
    page_clicks int(11) DEFAULT 0,
    page_ips LONGTEXT NOT NULL,
    UNIQUE KEY id (id)
  ) {$charset_collate};";
  dbDelta($table_analytics_pages_sql);
} create_tables();
/*------------------------------
  END create_tables
------------------------------*/
/*------------------------------
  START add_pages
------------------------------*/
function add_pages(){

  global $wpdb;

  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

  $page_ID = get_the_ID();

  $args = array(
    'meta_key' => '_wp_page_template',
    'meta_value' => 'templates/page-v1.php'
  );

  $table_analytics_pages = $wpdb->prefix . "analytics_pages";

  $get_template_pages_id = get_pages($args);
  $get_template_pages_id_arr = array();
  foreach ($get_template_pages_id as $page) {
    array_push($get_template_pages_id_arr, $page->ID);
  }

  $get_pages_id = $wpdb->get_results("SELECT page_id FROM $table_analytics_pages");
  $get_pages_id_arr = array();
  foreach ($get_pages_id as $page) {
    array_push($get_pages_id_arr, $page->page_id);
  }

  $new_pages = array_diff($get_template_pages_id_arr, $get_pages_id_arr);
  $arr = array();
  foreach ($new_pages as $id) {
    $wpdb->insert($table_analytics_pages,
      array(
        'page_id' => $id,
        'page_ips' => json_encode($arr)
      )
    );
  }

} add_pages();
/*------------------------------
  END add_pages
------------------------------*/

/*------------------------------
  START table_analytics_fun
------------------------------*/
function table_analytics_fun(){

  global $wpdb;

  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

  $page_ID = get_the_ID();

  if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }

  $user_ip = apply_filters( 'wpb_get_ip', $ip );

  $date = date('Y-m-d H:i:s');
  $table_analytics_pages = $wpdb->prefix . "analytics_pages";
  $page_data = $wpdb->get_results("SELECT * FROM $table_analytics_pages WHERE page_id = $page_ID");
  $page_ips = json_decode($page_data[0]->page_ips);
  $page_activity = intval($page_data[0]->page_activity) + 1;
  $page_clicks = $page_data[0]->page_clicks;
  if( count($page_ips) > 0 ){
    foreach ($page_ips as $ip) {
      if($ip !== $user_ip){
        $push_ip = true;
        break;
      } else {
        $push_ip = false;
      }
    }
    if($push_ip){
      array_push($page_ips, $user_ip);
    }
    $page_ips_arr = $page_ips;
  } else {
    $page_ips_arr = array($user_ip);
  }
  $wpdb->update($table_analytics_pages,
    array(
      'page_visitors' => count($page_ips_arr),
      'page_activity' => $page_activity,
      'page_ips' => json_encode($page_ips_arr)
    ),
    array( 'page_id' => $page_ID )
  );

  $page_visitors = count($page_ips_arr);
  $page_clicks_conversion = intval($page_clicks) / intval($page_visitors) * 100;
  $current_user = wp_get_current_user();
  if( user_can( $current_user, 'administrator' ) ):
    echo '<script>
      console.log("Page visitors - '.$page_visitors.'");
      console.log("Page activity - '.$page_activity.'");
      console.log("Page clicks - '.$page_clicks.'");
      console.log("Page clicks conversion - '.$page_clicks_conversion.'%");
    </script>';
  endif;

  if( count($page_ips) !== count($page_ips_arr) ){
    echo '<script>
      const UNIQ_USER = true;
    </script>';
  } else {
    echo '<script>
      const UNIQ_USER = false;
    </script>';
  }

}
table_analytics_fun();