<?php
// Sessão
session_start();

// Conexão
require_once '../Functions/db_connect.php';

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

if(isset($_POST['btn-editar'])):
    
    $titulo = clear($_POST['titulo']);
    $descricao = clear($_POST['descricao']);
    $criador = clear($_POST['criador']);

    $id = clear($_POST['id']);

    $sql = "UPDATE posts SET titulo = '$titulo', descricao = '$descricao', criador = '$criador' WHERE id = '$id' ";

    if(mysqli_query($connect, $sql)):
        header('Location: ../Admin/lista.php');
    else:
        header('Location: ../index.php');
    endif;
endif;