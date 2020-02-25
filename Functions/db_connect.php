<?php

// Conexão
$server = "localhost";
$user = "root";
$pass = "";
$db_name = "emails";

$connect = mysqli_connect($server, $user, $pass, $db_name);
mysqli_set_charset($connect, "utf8");

if(mysqli_connect_error()):
    echo "Erro na conexão: ".mysqli_connect_error();
endif;