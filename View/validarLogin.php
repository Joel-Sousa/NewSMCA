<?php
session_start();

if(!$_SESSION["usuario"]){
    $msg = "Manezao nao esta logado!";
    header("location: ../index.php?msg={$msg}");
}


