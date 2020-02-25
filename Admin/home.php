<?php
// Conexão
require_once '../Functions/db_connect.php';

// Sessão
session_start();

// Verificação
if(!isset($_SESSION['logado'])):
    header('Location: index.php');
endif;

// Dados
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
mysqli_close($connect);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2653944b87.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Styles/style-admin.css">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
<body>
    <h1 class="center light"> ADMIN </h1>

        <div class="row">
            <div class="col s12 m6 push-m3">
                <p class="light" style="font-size: 20px;"> Nova Postagem</p>

                <form action="../Postar/create.php" method="POST">
                    <div class="input-field col s12">
                        <input type="text" name="titulo" id="titulo" required>
                        <label for="titulo">Titulo</label>
                    </div>

                    <div class="input-field col s12">
                        <input type="text" name="descricao" id="descricao" required>
                        <label for="descricao">Descrição</label>
                    </div>

                    <div class="input-field col s12">
                        <input type="text" name="criador" id="criador" required>
                        <label for="criador">Criador</label>
                    </div>

                    <button type="submit" name="btn-cadastrar" class="btn blue"> Postar </button>
                    <a href="./lista.php" class="btn blue"> Lista de Postagens </a>
                    <a href="logout.php" class="btn red">Logout</a>
                </form>
            </div>
        </div>

    <div class="footer blue darken-2">
        <a href="https://www.instagram.com/wesley.ramox/"><i class="fab fa-instagram" style="color: #ffea00"></i></a>
        <a href="#"><i class="fab fa-github" style="color: #ffea00"></i></a>
        <p style="color: #ffffff;">Desenvolvido por <span style="color: #ffea00">Wesley Ramos</span></p>
    </div>

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
</body>
</html>