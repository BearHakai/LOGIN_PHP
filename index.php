<?php
session_start();

if(!isset($_SESSION['nome'])){
    echo "Não tem Acesso";
}
else{
    echo "Bem vindo ".$_SESSION['nome'];
}
?>