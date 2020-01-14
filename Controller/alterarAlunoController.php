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
require_once '../Controller/DAO/alunoDAO.php';
require_once '../Controller/DTO/alunoDTO.php';

if(empty($destino)){
    $imv = $_POST["imv"];
    $destino = $imv;
}

$data = $_POST["datanascimento"];
$arrayData = explode("/", $data);

$dtnasc = $arrayData[2]."-".$arrayData[1]."-".$arrayData[0];
//echo $dtnasc;
//exit();
$idAluno = $_POST["idAluno"];
$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$matricula = $_POST["matricula"];
$cpf = $_POST["cpf"];
$datanascimento = $dtnasc;
$sexo = $_POST["sexo"];
$celular = $_POST["celular"];
$endereco = $_POST["endereco"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$imagem = $destino;
$status = $_POST["status"];
$perfil = $_POST["perfil"];

$alunoDTO = new AlunoDTO();
$alunoDTO->setIdAluno($idAluno);
$alunoDTO->setNome($nome);
$alunoDTO->setSobrenome($sobrenome);
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
$sts = $alunoDAO->alterar($alunoDTO);

if (!empty($sts)) {
    echo "<script>";
    echo "alert('Manezao Alterado com Sucesso!')";
    echo "</script>";

    echo "<script>";
    echo "window.location='../View/listarAlunos.php'";
    echo "</script>";
}

