<?php
session_start();
require 'Contato.class.php';

if(isset($_POST['email']) && !empty($_POST['email'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $conecta = $contato = new Contato();

    if($conecta){
        $user = $contato -> checkUser($email);

        if(!empty($user)){
            $pass = $contato -> checkPass($email, $senha);
           if(!empty($pass)){
            $_SESSION['nome'] = $pass['nome'];
           }
            header("location:index.php");
        }
        else{
            echo "Login ou Senha Incorretos!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="js/acesso.js" ></script>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
    <div class="topo verde">
        <div class="data verde borda" id="data">
            <script>
                acesso();
            </script>
        </div>
        <spam class="fonte">Logomarca
    </div>
    <div class="centraliza">
        <div class="formulario interna">
            <form class="form" method="POST">
                Nome:<br>
                <input type="text" name="nome" class="i1"><br><br>
                Email:<br>
                <input type="text" name="email" class="i1"><br><br>
                Senha:<br>
                <input type="password" name="senha" class="i1"><br><br>

                <p><a href="forgotpass.html" class="esqueceu">Esqueceu a Senha?</a></p>

                <input type="submit" name="botao" value="Enviar" class="centralizaBotao">
            </form>
        </div>
    </div>
</body>
</html>