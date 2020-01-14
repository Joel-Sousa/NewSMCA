<?php
require_once '../Controller/DAO/alunoDAO.php';

$alunoDAO = new AlunoDAO();
$sts = $alunoDAO->deletaHistorico();

if (!empty($sts)) {
    echo "<script>";
    echo "alert('Historico limpo!')";
    echo "</script>";

    echo "<script>";
    echo "window.location='../View/historico.php'";
    echo "</script>";
}

