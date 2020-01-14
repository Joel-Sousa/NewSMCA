<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../CSS/estilo.css"
    </head>
    <body onLoad="document.form.matricula.focus();">
        <a href="home.php"><img src="download.png" width="50" height="50"></a>
        <form action="" method="post" align="center" name="form">
            <input type="text" name="matricula" class="txt" placeholder="Matricula"minlength="8" maxlength="8" required="true">
            <input type="submit" value="Pesquisar" class="btp">
            <?php
            include 'validarLogin.php';

            date_default_timezone_set('America/Sao_Paulo');
            $data = date('Y/m/d');
            $hora = date('H:i');

            require_once "../Controller/DAO/alunoDAO.php";
            require_once "../Controller/DTO/alunoDTO.php";

            $alunoDAO = new AlunoDAO();

            if (isset($_POST["matricula"])) {
                $pesquisa = $_POST["matricula"];
                $aluno = $alunoDAO->pesquisarMatricula($pesquisa);
                echo "<br><br><br><br><br><br><br><br><br><br>";
                if (empty($aluno)) {
                    echo "Manezao nao encontrado!";
                    echo "<script>";
                    echo "alert('Manezao Nao encontrado!')";
                    echo "</script>";
                } else {
                    foreach ($aluno as $a) {
                        $idAluno = $aluno["idAluno"];
                        $nome = $aluno["nome"];
                        $sobrenome = $aluno["sobrenome"];
                        $matricula = $aluno["matricula"];
                        $status = $aluno["status"];
                    }
                    echo "<center><table border='' width='400' height='200' bgcolor='#fff'>";
                    echo "<tr>";
                    echo "<td width='150' rowspan='4'><img src='{$aluno['imagem']}' width='150' height='190'></td>";
                    echo "<td>&nbsp;{$aluno['nome']} {$aluno['sobrenome']}</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>&nbsp;{$aluno['matricula']}</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>&nbsp;{$aluno['sexo']}</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>&nbsp;{$aluno['status']}</td>";
                    echo "</tr>";
                    echo "</table></center>";

                    $alunoDTO = new AlunoDTO();
                    $alunoDTO->setIdAluno($idAluno);
                    $alunoDTO->setNome($nome);
                    $alunoDTO->setSobrenome($sobrenome);
                    $alunoDTO->setMatricula($matricula);
                    $alunoDTO->setStatus($status);
                    $alunoDTO->setHora($hora);
                    $alunoDTO->setData($data);

                    $alunoDAO = new AlunoDAO();
                    $alunoDAO->historico($alunoDTO);
                }
            }
            ?>
        </form>
    </body>
</html>