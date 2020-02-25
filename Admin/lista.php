<?php 

// Conexão
include_once '../Functions/db_connect.php';

// Sessão
session_start();

// Verificação
if(!isset($_SESSION['logado'])):
    header('Location: index.php');
endif;

?>

    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2653944b87.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Styles/style-admin.css">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css"/>

    <div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light"> Postagens </h3>
        <table class="striped">
            <thead>
                <tr>
                    <th>Titulo:</th>
                    <th>Descrição:</th>
                    <th>Criador:</th>
                </tr>
            </thead>
            
            <tbody>
                <?php 
                    $sql = "SELECT * FROM posts";
                    $resultado = mysqli_query($connect, $sql);

                    if(mysqli_num_rows($resultado) > 0):
                    while($dados = mysqli_fetch_array($resultado)): 
                ?>
                <tr>
                    <td><?php echo $dados['titulo']; ?></td>
                    <td><?php echo $dados['descricao']; ?></td>
                    <td><?php echo $dados['criador']; ?></td>
                    <td><a href="editar.php?id=<?php echo $dados['id'] ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
                    
                    <td><a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>
                        
                      <!-- Modal Structure -->
                    <div id="modal<?php echo $dados['id']; ?>" class="modal">
                        <div class="modal-content">
                            <h4>Opa!</h4>
                            <p>Tem certeza que deseja deletar esta Postagem?</p>
                            </div>
                            <div class="modal-footer">

                            <form action="../Postar/delete.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                                <button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>
                                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </tr>

                <?php 
                    endwhile;
                    else: ?>

                <tr>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>

                <?php
                    endif;
                ?>

            </tbody>
        </table>
        <br>
        <a href="home.php" class="btn blue">Adicionar Postagem</a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

<script>
    $(document).ready(function(){
            $('.modal').modal();
    });
</script>