<?php

// Abre uma conexao com o BD.

$host        = "host = 127.0.0.1;";
$port        = "port = 3307;";
$dbname      = "dbname = camed;";
$dbuser 	 = "root";
$dbpassword	 = "usbw";

// para conectar ao mysql, substitua pgsql por mysql
$db_con= new PDO('mysql:' . $host . $port . $dbname, $dbuser, $dbpassword);

//alguns atributos de performance.
$db_con->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
$db_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>
