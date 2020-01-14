<html>
    <head>
        <?php include 'principal.php';?>
        <script>
            function deleta(ida) {
                var resposta = confirm("Deseja Excluir esse Aluno?");
                if (resposta === true) {
                    window.location.href = "../Controller/excluirAlunoController.php?ida="+ida;
                 }
            }
        </script>
    </head>
    <body onLoad="document.form.pesquisa.focus();">
        <form action="" method="post" align="center" name="form">
            <input type="text" name="pesquisa" placeholder="Pesquisa" maxlength="10" class="txt">
            <input type="submit" value="Pesquisar">
        </form>
        <?php
        
        require_once '../Controller/DAO/alunoDAO.php';
        $alunoDAO = new AlunoDAO();
        if(isset($_POST["pesquisa"])){
            $pesquisa = $_POST["pesquisa"];
            $alunos = $alunoDAO->pesquisa($pesquisa);
        }else{
        $alunos = $alunoDAO->listar();
        }
        echo "<center>";
        echo "<table border='' align='center' bgcolor='#fff' cellspacing='0'>";
        echo "<tr>";
        echo "<td>Nome</td>";
        echo "<td>Sobrenome</td>";
        echo "<td>Idade</td>";
        echo "<td>Matricula</td>";
        echo "<td>CPF</td>";
        echo "<td>Data de Nascimento</td>";
        echo "<td>Sexo</td>";
        echo "<td>Celular</td>";
        echo "<td>Status</td>";
        echo "<td>Alterar</td>";
        echo "<td>Excluir</td>";
        echo "</tr>";
        foreach ($alunos as $a) {
            echo "<tr>";
            echo "<td>{$a["nome"]}</td>";
            echo "<td>{$a["sobrenome"]}</td>";
            echo "<td>{$a["idade"]}</td>";
            echo "<td>{$a["matricula"]}</td>";
            echo "<td>{$a["cpf"]}</td>";
            echo "<td>{$a["datanascimento"]}</td>";
            echo "<td>{$a["sexo"]}</td>";
            echo "<td>{$a["celular"]}</td>";
            echo "<td>{$a["status"]}</td>";
            echo "<td><a href='alterarAluno.php?ida={$a["idAluno"]}'>Alterar</a></td>";
            echo "<td><a href='javascript:func()' onclick='deleta({$a["idAluno"]})'>Excluir</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</center>"
        ?>
    </body>
</html>
