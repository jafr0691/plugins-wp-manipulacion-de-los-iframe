<?php
// If uninstall is not called from WordPress, exit
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit();
}

// Drop a custom db table
global $wpdb;
$contacto   = $wpdb->prefix . 'click_contacclickiframe';

$wpdb->query( "DROP TABLE IF EXISTS {$contacto}" );

