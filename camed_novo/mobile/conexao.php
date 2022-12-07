<?php

// Abre uma conexao com o BD.

$host        = "host = localhost";
$port        = "port = 3306;";
$dbname      = "DB = camed;";
$dbpassword	 = "";

// para conectar ao mysql, substitua pgsql por mysql
$db_con= new PDO('mysql:' . $host . $port . $dbname, $dbpassword);

//alguns atributos de performance.
$db_con->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
$db_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>
