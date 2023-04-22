<?php
global $wpdb;
$url = $_POST['url'];
$ip = $_SERVER['REMOTE_ADDR'];
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    $visitor = $ip;
$f  = date("d/m/Y");
$hora   = date("h:i:s A");
$wpdb->insert($wpdb->prefix . 'click_contacclickiframe',
      array(
        'id_clikifra' => NULL,
        'ip'       => $ip,
        'pagina'    => $url,
        'fecha' => $f,
        'hora'    => $hora,
      )
    );