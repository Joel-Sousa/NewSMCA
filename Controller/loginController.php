<?php
session_start();
require_once '../Controller/DAO/funcionarioDAO.php';

$usuario = $_POST["usuario"];
$senha = $_POST["senha"];

$funcionarioDAO = new FuncionarioDAO();
$login = $funcionarioDAO->login($usuario, $senha);

if(!empty($login)){
    $_SESSION["idFuncionario"] = $login["idFuncionario"];
    $_SESSION["idUsuario"] = $login["idUsuario"];
    $_SESSION["usuario"] = $login["usuario"];
    $_SESSION["perfil"] = $login["perfil"];
    header("location: ../View/home.php");
}else{
    $msg = "Errou Manzao!";
    header("location: ../index.php?msg={$msg}");
}