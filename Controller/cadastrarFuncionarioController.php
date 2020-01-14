<?php

require_once '../Controller/DAO/funcionarioDAO.php';
require_once '../Controller/DTO/funcionarioDTO.php';
require_once '../Controller/DTO/usuarioDTO.php';

// Data
{
    $ddia = $_POST["dia"]; $dmes = $_POST["mes"]; $dano = $_POST["ano"];

    $datanasc = $dano . "-" . $dmes . "-" . $ddia;

    $dia = date("d"); $mes = date("m"); $ano = date("Y");

    $dianasc = $ddia;
    $mesnasc = $dmes;
    $anonasc = $dano;
    $idadex = $ano - $anonasc;
}

$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$idade = $idadex;
$cpf = $_POST["cpf"];
$datanascimento = $datanasc;
$sexo = $_POST["sexo"];
$celular = $_POST["celular"];
$endereco = $_POST["endereco"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];

$usuario = $_POST["usuario"];
$senha = $_POST["senha"];
$perfil = $_POST["perfil"];

$funcionarioDTO = new FuncionarioDTO();
$funcionarioDTO->setNome($nome);
$funcionarioDTO->setSobrenome($sobrenome);
$funcionarioDTO->setIdade($idade);
$funcionarioDTO->setCpf($cpf);
$funcionarioDTO->setDatanascimento($datanascimento);
$funcionarioDTO->setSexo($sexo);
$funcionarioDTO->setCelular($celular);
$funcionarioDTO->setEndereco($endereco);
$funcionarioDTO->setCidade($cidade);
$funcionarioDTO->setEstado($estado);

$usuarioDTO = new UsuarioDTO();
$usuarioDTO->setUsuario($usuario);
$usuarioDTO->setSenha($senha);
$usuarioDTO->setPerfil($perfil);

$funcionarioDAO = new FuncionarioDAO();

$x = $funcionarioDAO->getCpf($_POST["cpf"]);
$y = $funcionarioDAO->getUsuario($_POST["usuario"]);

//var_dump($x);
//var_dump($y);

if ($x["cpf"] == $_POST["cpf"]) {
    echo "<script>";
    echo "alert('Cpf Ja Cadastrado!')";
    echo "</script>";
    echo "<script>";
    echo "javascript:window.history.back(1);";
    echo "</script>";
} elseif ($y["usuario"] == $_POST["usuario"]) {
    echo "<script>";
    echo "alert('Usuario Ja Cadastrado!')";
    echo "</script>";
    echo "<script>";
    echo "javascript:window.history.back(1);";
    echo "</script>";
} else {
    echo "<script>";
    echo "alert('Manezao Cadastrado com Sucesso!')";
    echo "</script>";

    $funcionarioDAO->salvar($funcionarioDTO, $usuarioDTO);
    
    echo "<script>";
    echo "window.location='../View/home.php'";
    echo "</script>";
}
