<?php
// Sessão
session_start();

// Verificação
if(!isset($_SESSION['logado'])):
    header('Location: ../index.php');
endif;

// Conexão
require_once '../Functions/db_connect.php';


// Clear
function clear($input) {
    global $connect;
    // Sql
    $var = mysqli_escape_string($connect, $input);
    // xss
    $var = htmlspecialchars($var);
    return $var;
}

if(isset($_POST['btn-deletar'])):
    
    $titulo = clear($_POST['titulo']);
    $descricao = clear($_POST['descricao']);
    $criador = clear($_POST['criador']);

    $id = clear($_POST['id']);

    $sql = "DELETE FROM posts WHERE id = '$id' ";

    if(mysqli_query($connect, $sql)):
        header('Location: ../Admin/lista.php');
    else:
        header('Location: ../index.php');
    endif;
endif;