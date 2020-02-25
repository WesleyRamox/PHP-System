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
    $nome = clear($_POST['nome']);

    $sql = "INSERT INTO emails (email, nome) VALUES ('$email', '$nome') ";

    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        header('Location: ../index.php');
    else:
        $_SESSION['menssagem'] = "Erro ao cadastrar";
        header('Location: ../index.php');
    endif;
endif;
