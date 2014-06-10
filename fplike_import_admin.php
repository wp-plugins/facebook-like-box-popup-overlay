<?php
//Hence I started Here

global $wpdb;
$table_name = $wpdb->prefix ."fplike";
global $wpdb;
$draft = $wpdb->get_row("SELECT * FROM $table_name WHERE id = 1");
$urlone = $draft->url;


?>
<div class="wrap">

</div>

<div class="wrap">
    <?php    echo "<h2>" . __( 'FaceBook Like PopUp Settings', 'fplike_trdom' ) . "</h2>"; ?>
     
    <form name="oscimp_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
        <input type="hidden" name="fplike_hidden" value="Y">
        
        <p><?php _e("URL to your FaceBook page: " ); ?><input type="text" name="fplike_url" value="<?php echo $urlone; ?>" size="20"><?php _e(" ex: http://www.facebook.com/idilibrain" ); ?></p>
         
     
        <p class="submit">
        <input type="submit" name="submit" value="<?php _e('Update', 'fplike_trdom' ) ?>" />
        </p>
    </form>
</div>

<?PHP
	$id = 1;
   	global $wpdb;
    $table = $wpdb->prefix."fplike";
 	if(isset($_POST['submit'])) {
   	// process $_POST data here
   	$url = $_POST['fplike_url'];

  	$wpdb->update($table, array( 'url' => $url),array('id'=>$id));

  	echo "Updated";
 }

?>