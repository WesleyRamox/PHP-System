<?php 
// Conexão
include_once '../Functions/db_connect.php';

// Sessão
session_start();

// Verificação
if(!isset($_SESSION['logado'])):
    header('Location: index.php');
endif;

// Select
if(isset($_GET['id'])):
    $id = mysqli_escape_string($connect, $_GET['id']);

    $sql = "SELECT * FROM posts WHERE id = '$id' ";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
endif;
?>

<html>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2653944b87.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Styles/style-admin.css">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css"/>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light"> Editar Postagem </h3>

        <form action="../Postar/update.php" method="POST">

            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                    <div class="input-field col s12">
                        <input type="text" name="titulo" id="titulo" value="<?php echo $dados['titulo']; ?>" required>
                        <label for="titulo">Titulo</label>
                    </div>

                    <div class="input-field col s12">
                        <input type="text" name="descricao" id="descricao" value="<?php echo $dados['descricao']; ?>" required>
                        <label for="descricao">Descrição</label>
                    </div>

                    <div class="input-field col s12">
                        <input type="text" name="criador" id="criador" value="<?php echo $dados['criador']; ?>" required>
                        <label for="criador">Criador</label>
                    </div>

                    <button type="submit" name="btn-editar" class="btn blue"> Editar </button>
                    <a href="lista.php" class="btn blue"> Lista de Postagens </a>
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
</html>