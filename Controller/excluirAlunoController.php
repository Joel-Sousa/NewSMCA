<?php
require_once '../Controller/DAO/alunoDAO.php';

$ida = $_GET["ida"];


$alunoDAO = new AlunoDAO();
$alunoDAO->deleteByHistorico($ida);
$sts = $alunoDAO->deleteById($ida);

if (!empty($sts)) {
    echo "<script>";
    echo "alert('Manezao Deletado com Sucesso!')";
    echo "</script>";

    echo "<script>";
    echo "window.location='../View/listarAlunos.php'";
    echo "</script>";
}
