<?php
/****************** Crear tabla con la clase wpdb *****************/
global $wpdb;

// Con esto creamos el nombre de la tabla y nos aseguramos que se cree con el mismo prefijo que ya tienen las otras tablas creadas (wp_form).
$table_contacclickiframe = $wpdb->prefix . 'click_contacclickiframe';

$sql = "CREATE TABLE $table_contacclickiframe (
`id_clikifra` int(11) NOT NULL AUTO_INCREMENT,
`ip` varchar(100) NOT NULL,
`pagina` varchar(200) NOT NULL,
`fecha` varchar(20) NOT NULL,
`hora` varchar(15) NOT NULL,
UNIQUE KEY id_clikifra (id_clikifra)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

// upgrade contiene la función dbDelta la cuál revisará si existe la tabla.
require_once ABSPATH . 'wp-admin/includes/upgrade.php';
// Creamos la tabla
dbDelta($sql);