<?php
// Conexão
require_once '../Functions/db_connect.php';

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

// Botão enviar
    if(isset($_POST['btn-entrar'])):
        $erros = array();
        $login = clear($_POST['login']);
        $senha = clear($_POST['senha']);

        if(empty($login) or empty($senha)):
            $erros[] = "<li> O campo Login e senha precisam ser preenchidos</li>";
        else:
            $sql = "SELECT login FROM usuarios WHERE login = '$login'";
            $resultado = mysqli_query($connect, $sql);

            if(mysqli_num_rows($resultado) > 0):
                $senha = md5($senha);
                $sql = "SELECT * FROM usuarios WHERE login = '$login' and senha = '$senha'";
                $resultado = mysqli_query($connect, $sql);

                    if(mysqli_num_rows($resultado) == 1):
                        $dados = mysqli_fetch_array($resultado);
                        mysqli_close($connect);
                        $_SESSION['logado'] = true;
                        $_SESSION['id_usuario'] = $dados['id'];
                        header('Location: home.php');
                    else:
                        $erros[] = "<li> Usuario e senha não conferem </li>";
                    endif;

            else:
                $erros[] = "<li> Usuario inexistente </li>";
            endif;

        endif;

    endif;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body style="background-color: black;">
<?php 
    if(!empty($erros)):
        foreach($erros as $erro):
            echo $erro;
        endforeach;
    endif;
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <input type="text" name="login">
    <br>
    <input type="password" name="senha"><br>
    <button type="submit" name="btn-entrar">Oi</button>
</form>

</body>
</html>