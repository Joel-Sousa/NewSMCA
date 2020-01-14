<?php

// verifica se foi enviado um arquivo 
if (isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0) {

    $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
    $nome = $_FILES['arquivo']['name'];
    // Pega a extensao
    $extensao = strrchr($nome, '.');
    // Converte a extensao para mimusculo
    $extensao = strtolower($extensao);
    // Somente imagens, .jpg;.jpeg;.gif;.png
    if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {
        // Cria um nome único para esta imagem
        // Evita que duplique as imagens no servidor.
        $novoNome = md5(microtime()) . $extensao;
        // Concatena a pasta com o nome
        $destino = '../Img/' . $novoNome;
        // tenta mover o arquivo para o destino
        if (@move_uploaded_file($arquivo_tmp, $destino)) {
            //echo "Arquivo salvo com sucesso em : <strong>" . $destino . "</strong><br />";
            //echo "<img src=\"" . $destino . "\" />";
        } else
            echo "Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />";
    } else
        echo "Você poderá enviar apenas arquivos \"*.jpg;*.jpeg;*.gif;*.png\"<br />";
}
?>

<?php

require_once './DAO/AlunoDAO.php';
require_once './DTO/AlunoDTO.php';

if (empty($destino)) {
    $destino = "../Img/default.jpg";
}
// Data
{
    $ddia = $_POST["dia"];
    $dmes = $_POST["mes"];
    $dano = $_POST["ano"];

    $datanasc = $dano . "-" . $dmes . "-" . $ddia;

    $dia = date("d");
    $mes = date("m");
    $ano = date("Y");

    $dianasc = $ddia;
    $mesnasc = $dmes;
    $anonasc = $dano;
    $idadex = $ano - $anonasc;
}

$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$idade = $idadex;
$matricula = $_POST["matricula"];
$cpf = $_POST["cpf"];
$datanascimento = $datanasc;
$sexo = $_POST["sexo"];
$celular = $_POST["celular"];
$endereco = $_POST["endereco"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$imagem = $destino;
$status = $_POST["status"];
$perfil = $_POST["perfil"];

$alunoDTO = new AlunoDTO();
$alunoDTO->setNome($nome);
$alunoDTO->setSobrenome($sobrenome);
$alunoDTO->setIdade($idade);
$alunoDTO->setMatricula($matricula);
$alunoDTO->setCpf($cpf);
$alunoDTO->setDatanascimento($datanascimento);
$alunoDTO->setSexo($sexo);
$alunoDTO->setCelular($celular);
$alunoDTO->setEndereco($endereco);
$alunoDTO->setCidade($cidade);
$alunoDTO->setEstado($estado);
$alunoDTO->setImagem($imagem);
$alunoDTO->setStatus($status);
$alunoDTO->setPerfil($perfil);

$alunoDAO = new AlunoDAO();


$x = $alunoDAO->getMatricula($_POST["matricula"]);
$y = $alunoDAO->getCpf($_POST["cpf"]);

if ($x["matricula"] == $_POST["matricula"]) {
    echo "<script>";
    echo "alert('Matricula Ja Cadastrado!')";
    echo "</script>";
    echo "<script>";
    echo "javascript:window.history.back(1);";
    echo "</script>";
} elseif ($y["cpf"] == $_POST["cpf"]) {
    echo "<script>";
    echo "alert('CPF Ja Cadastrado!')";
    echo "</script>";
    echo "<script>";
    echo "javascript:window.history.back(1);";
    echo "</script>";
} else {
    echo "<script>";
    echo "alert('Manezao Cadastrado com Sucesso!')";
    echo "</script>";

    $sts = $alunoDAO->cadastrarAluno($alunoDTO);
    
    echo "<script>";
    echo "window.location='../View/home.php'";
    echo "</script>";
}