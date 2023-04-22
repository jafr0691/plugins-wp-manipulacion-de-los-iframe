<?php
/*
Plugin Name: Click Iframe
Plugin URI:  https://tucontenidoweb.com
Description: Capture the Ip public
Version:     1.0
Author:      Diego Armando
Author URI:  https://tucontenidoweb.com
Domain Path: /languages/
Text Domain: Click Iframe
 */
defined('ABSPATH') or die('No script please!');

global $wpdb;
define('Docckif', plugin_dir_path(__FILE__));
define('Arcckif', plugin_dir_url(__FILE__));

function jsclickiframejs()
{
    wp_enqueue_script('query.min_file', plugins_url('/js/query.3.2.1.js', __FILE__));
    wp_enqueue_script('iframetracker_file', plugins_url('/js/iframeTracker.js', __FILE__), '', true );
    wp_register_script('script_save', plugin_dir_url(__FILE__) . 'js/clickifram.js', array('jquery'), '11', true);
    wp_enqueue_script('script_save');
    wp_localize_script('script_save', 'clickiframe', ['clickajaxurl' => admin_url('admin-ajax.php')]);
}
add_action('wp_enqueue_scripts', 'jsclickiframejs');
add_action('wp_ajax_clickiframe', 'clickiframe');
add_action('wp_ajax_nopriv_clickiframe', 'clickiframe');

function clickiframe()
{
    require_once Docckif . 'action/clicksave.php';
}

function control_jquery_click_iframe()
{
    wp_enqueue_script('bootstrap.3.4.1.min_file', plugins_url('/js/bootstrap.3.4.1.min.js', __FILE__));
    wp_register_script('script_sql', plugin_dir_url(__FILE__) . 'js/controlclick.js', array('jquery'), '1', true);
    wp_enqueue_script('script_sql');
    wp_localize_script('script_sql', 'sqlclickiframe', ['sqlajaxurl' => admin_url('admin-ajax.php')]);
}
add_action('admin_enqueue_scripts', 'control_jquery_click_iframe');
add_action('wp_ajax_sqlclickiframe', 'sqlclickiframe');
add_action('wp_ajax_nopriv_sqlclickiframe', 'sqlclickiframe');

function sqlclickiframe()
{
    require_once Docckif . 'action/sql.php';
}

function db_click_iframe()
{
    require_once Docckif . 'dbclickiframe.php';
}
register_activation_hook(__FILE__, 'db_click_iframe');

register_uninstall_hook( __FILE__, 'click_iframe_uninstall' );
function click_iframe_uninstall() {
    require_once Docckif . 'uninstall.php';
}


function panel_click_iframe()
{
    add_menu_page('Click Iframe', 'ClickIframe', 'manage_options', Docckif . 'action/controlclickiframe.php');

}
add_action('admin_menu', 'panel_click_iframe');