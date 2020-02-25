<?php
// Sessão
session_start();

// Verificação
if(!isset($_SESSION['logado'])):
    header('Location: ../index.php');
endif;

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
require_once '../Functions/db_connect.php';

if(isset($_POST['btn-cadastrar'])):
    
    $titulo = clear($_POST['titulo']);
    $descricao = clear($_POST['descricao']);
    $criador = clear($_POST['criador']);

    $sql = "INSERT INTO posts (titulo, descricao, criador) VALUES ('$titulo', '$descricao', '$criador') ";

    if(mysqli_query($connect, $sql)):
        header('Location: ../Admin/home.php');
    else:
        header('Location: ../Admin/home.php');
    endif;
endif;