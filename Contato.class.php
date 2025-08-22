<?php
Class Contato{
    private $nome;
    private $email;
    private $senha;
    private $pdo;

    function __construct(){
        $dns = "mysql:dbname=contato;host=localhost";
        $dbUser = "root";
        $dbPass = "";

        try{
            $this -> pdo = new PDO($dns, $dbUser, $dbPass);
        }
        catch (Exception $e) {
            echo "<script>alert('Não Consegui Conectar. Tente Novamente Mais Tarde!')</script>";
            exit;
        }
    }

    function getNome(){
        return $this -> nome;
    }
    function getEmail(){
        return $this -> email;
    }
    function getSenha(){
        return $this -> senha;
    }
    function setNome($nome){
        $this -> nome = $nome;
    }
    function setEmail($email){
        $this -> email = $email;
    }
    function setSenha($senha){
        $this -> senha = $senha;
    }

    function checkUser($email){
        $sql = "SELECT * FROM usuario WHERE email = :email";
        $stmt = $this -> pdo ->prepare($sql);
        $stmt -> bindValue(":email", $email);

        $stmt -> execute();

        return $stmt -> rowCount() > 0;
    }

    function checkPass($email, $senha){
        $sql = "SELECT * FROM usuario WHERE email = :email AND senha = :senha";
        $stmt = $this -> pdo -> prepare($sql);
        $stmt -> bindVAlue(":email", $email);
        $stmt -> bindVAlue(":senha", $senha);

        $stmt -> execute();

        if($stmt -> rowCount() > 0){
            $dados = $stmt -> fetch();
            return $dados;
        }
        else{
            return array();
        }
    }

    function insertUser($nome, $email, $senha){
        $sql = "INSERT INTO usuario SET email = :e, senha = :s, nome = :n";
        $stmt = $this -> pdo -> prepare($sql);

        $sql -> bindValue(":e", $email);
        $sql -> bindValue(":s", $senha);
        $sql -> bindValue(":n", $nome);

        $isTrue = $sql -> execute();

        return $isTrue;
    }
}
?>