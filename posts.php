<?php
    // Conexão
    include_once './Functions/db_connect.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2653944b87.js" crossorigin="anonymous"></script>
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css"/>
    <link rel="stylesheet" href="./Styles/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="Images/sad.png" type="image/x-icon">
    <title>Can i Help?</title>
</head>
<body>    
    
    <nav class="blue darken-2">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center" id="logo">CAN i HELP?</a>
            <a href="" data-activates="menu-mobile" class="button-collapse">
                <i class="fa fa-bars"></i>
            </a>
            <ul class="left hide-on-med-and-down">
                <li><a href="./index.php" id="font">Home</a></li>
                <li><a href="./posts.php" id="font">Posts</a></li>
                <li><a href="./about.php" id="font">About</a></li>
            </ul>
            <!-- <ul class="right hide-on-med-and-down">
                <li><a class="waves-effect waves-light btn">Large Button</a></li>
            </ul> -->
            <ul class="side-nav" id="menu-mobile">
                <li><a href="./index.php" class="" id="font"><i class="fa fa-home" style="color: #ffffff"></i>Home</a></li>
                <li><a href="#" class="" id="font"><i class="fab fa-buffer" style="color: #ffffff"></i>Posts</a></li>
                <li><a href="./about.php" class="" id="font"><i class="fa fa-mail-bulk" style="color: #ffffff"></i>About</a></li>
            </ul>
        </div>
    </nav>

    <br>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light" id="font" style="font-size: 50px; color: #FFFFFF">POSTAGENS</h3>
        <table class="striped">
            
                <?php 
                    $sql = "SELECT * FROM posts";
                    $resultado = mysqli_query($connect, $sql);

                    if(mysqli_num_rows($resultado) > 0):
                    while($dados = mysqli_fetch_array($resultado)): 
                ?>

                <ul class="collection with-header">
                    <li class="collection-header light-blue accent-3"><h5><?php echo $dados['titulo']; ?></h5></li>
                    <li class="collection-item"><?php echo $dados['descricao']; ?></li>
                    <li class="postador">Postado por: @<?php echo $dados['criador'];?></li>
                </ul>


                <?php 
                    endwhile;
                    endif; ?>
        </table>
        <br>
    </div>
</div>

    <div class="footer blue darken-2">
        <a href="https://www.instagram.com/wesley.ramox/"><i class="fab fa-instagram" style="color: #ffea00"></i></a>
        <a href="#"><i class="fab fa-github" style="color: #ffea00"></i></a>
        <p style="color: #ffffff;">Desenvolvido por <span style="color: #ffea00">Wesley Ramos</span></p>
    </div>

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

    <script>
    $(function(){
        $(".button-collapse").sideNav();
    });

    $(document).ready(function(){
      $('.slider').slider();
    });
    </script>
</body>
</html>