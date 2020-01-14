<?php
require_once '../Controller/DAO/funcionarioDAO.php';
require_once '../Controller/DTO/funcionarioDTO.php';
require_once '../Controller/DTO/usuarioDTO.php';

$data = $_POST["datanascimento"];
$arrayData = explode("/", $data);

$dtnasc = $arrayData[2]."-".$arrayData[1]."-".$arrayData[0];

$idFuncionario = $_POST["idFuncionario"];
$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$cpf = $_POST["cpf"];
$datanascimento = $dtnasc;
$sexo = $_POST["sexo"];
$celular = $_POST["celular"];
$endereco = $_POST["endereco"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];

$idUsuario = $_POST["idUsuario"];
$usuario = $_POST["usuario"];
$senha = $_POST["senha"];
$perfil = $_POST["perfil"];

$funcionarioDTO = new FuncionarioDTO();
$funcionarioDTO->setIdFuncionario($idFuncionario);
$funcionarioDTO->setNome($nome);
$funcionarioDTO->setSobrenome($sobrenome);
$funcionarioDTO->setCpf($cpf);
$funcionarioDTO->setDatanascimento($datanascimento);
$funcionarioDTO->setSexo($sexo);
$funcionarioDTO->setCelular($celular);
$funcionarioDTO->setEndereco($endereco);
$funcionarioDTO->setCidade($cidade);
$funcionarioDTO->setEstado($estado);

$usuarioDTO = new UsuarioDTO();
$usuarioDTO->setIdUsuario($idUsuario);
$usuarioDTO->setUsuario($usuario);
$usuarioDTO->setSenha($senha);
$usuarioDTO->setPerfil($perfil);

$funcionarioDAO = new FuncionarioDAO();
$sts = $funcionarioDAO->alterarFuncionario($funcionarioDTO, $usuarioDTO);

if (!empty($sts)) {
    echo "<script>";
    echo "alert('Manezao Alterado com Sucesso!')";
    echo "</script>";

    echo "<script>";
    echo "window.location='../View/home.php'";
    echo "</script>";
}


