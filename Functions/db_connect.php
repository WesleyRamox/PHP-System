<?php

// Conexão
$server = "mysql669.umbler.com:41890";
$user = "wesleyramox";
$pass = "bWMv7?#h4Pz5";
$db_name = "youneddhelp";

$connect = mysqli_connect($server, $user, $pass, $db_name);
mysqli_set_charset($connect, "utf8");

if(mysqli_connect_error()):
    echo "Erro na conexão: ".mysqli_connect_error();
endif;