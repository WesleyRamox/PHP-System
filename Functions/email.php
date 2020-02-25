<?php
// Sessão
session_start();

// Clear
function clear($input) {
    global $connect;
    // Sql
    $var = mysqli_escape_string($connect, $input);
    // xss
    $var = htmlspecialchars($var);
    return $var;
}

// Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-enviar'])):
    
    $email = clear($_POST['email']);

    $sql = "INSERT INTO emails (email) VALUES ('$email') ";

    if(mysqli_query($connect, $sql)):
        echo "Enviado com Sucesso!";
        header('Location: ../index.php');
    else:
        echo "Erro ao Enviar";
        header('Location: ../index.php');
    endif;
endif;