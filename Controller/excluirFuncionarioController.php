<?php

require_once '../Controller/DAO/funcionarioDAO.php';

$id = $_GET["ids"];
$ids = explode("-", $id);

$idf = $ids[0];
$idu = $ids[1];

$funcionarioDAO = new FuncionarioDAO();
$sts = $funcionarioDAO->deleteById($idf, $idu);

if (!empty($sts)) {
    echo "<script>";
    echo "alert('Manezao Deletado com Sucesso!')";
    echo "</script>";
    
    echo "<script>";
    echo "window.location='../View/listarFuncionarios.php'";
    echo "</script>";
}
