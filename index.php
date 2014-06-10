<?php
  /*
    Plugin Name: FaceBook Like Box
    Plugin URI: http://www.idilibrain.com/wordpress-plugin-facebook-like-box-popup-overlay
    Description: Plugin for displaying FaceBook like box as an overlay popup
    Author: Nebu John Thaliyath
    Version: 1.0
    Author URI: http://www.idilibrain.com
    */
	function fplike_load() {
		include('fplike_code.php');
	}
    function fplike_admin() {

   		include('fplike_import_admin.php');
	}

    function fplike_admin_actions() {

    	add_options_page("FaceBook Like PopUp", "FaceBook Like PopUp", 1, "FaceBook_Like_PopUp", "fplike_admin");
 
	}

	global $fplike_db_version;
	$fplike_db_version = "1.0";

	function fplike_install() {
    global $wpdb;
   	global $fplike_db_version;

   	$table_name = $wpdb->prefix . "fplike";
      
   	$sql = "CREATE TABLE $table_name (
  	id mediumint(9) NOT NULL AUTO_INCREMENT,
  	time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
  	url VARCHAR(55) DEFAULT '' NOT NULL,
  	UNIQUE KEY id (id)
    );";

   	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
 	dbDelta( $sql );
 
 	add_option( "fplike_db_version", $jal_db_version );
	}

	function fplike_install_data() {
   	global $wpdb;
   	$welcome_url = "http://www.facebook.com/idilibrain";
   	$table_name = $wpdb->prefix . "fplike";
   	$rows_affected = $wpdb->insert( $table_name, array( 'time' => current_time('mysql'), 'url' => $welcome_url ) );
	}
 
 	function fplike_remove_database() {
     global $wpdb;
     $table_name = $wpdb->prefix . "fplike";
     $sql = "DROP TABLE IF EXISTS $table_name;";
     $wpdb->query($sql);
     delete_option("my_plugin_db_version");
}




	add_action('admin_menu', 'fplike_admin_actions');
	register_activation_hook( __FILE__, 'fplike_install' );
	register_activation_hook( __FILE__, 'fplike_install_data' );
	register_deactivation_hook( __FILE__, 'fplike_remove_database' );
	
  if(!isset($_COOKIE["cookie_fplike"]))
  {
	if(!is_admin()) 
  {
	add_action( 'wp_loaded', 'fplike_load', 10000 );
	}
  }

?>