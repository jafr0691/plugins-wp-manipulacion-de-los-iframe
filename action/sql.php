<?php
global $wpdb;
if($_POST['acti']=='delet'){
	$delet = $wpdb->delete($wpdb->prefix . 'click_contacclickiframe', array('id_clikifra' => $_POST['id']));

	exit(true);
}


 ?>