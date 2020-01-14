<html>
    <head>
        <?php include 'principal.php';?>
        <script>
            function deleta(idf,idu) {
                var resposta = confirm("Deseja Excluir esse Funcionario?");
                if (resposta === true) {
                    window.location.href = "../Controller/excluirFuncionarioController.php?ids="+idf+"-"+idu;
                 }
            }
        </script>
        
    </head>
    <body onLoad="document.form.pesquisa.focus();">
        <form action="" method="post" align="center" name="form">
            <input type="text" name="pesquisa" placeholder="Pesquisa" class="txt">
            <input type="submit" value="Pesquisar">
        </form>
        <?php
        require_once '../Controller/DAO/funcionarioDAO.php';
        $funcionarioDAO = new FuncionarioDAO();
        if(isset($_POST["pesquisa"])){
            $pesquisa = $_POST["pesquisa"];
            $funcionarios = $funcionarioDAO->pesquisa($pesquisa);
        }else{
        $funcionarios = $funcionarioDAO->listar();
        }
        echo "<center>";
        echo "<table border='' align='center'  bgcolor='#fff' cellspacing='0'>";
        echo "<tr>";
        echo "<td>Nome</td>";
        echo "<td>Sobrenome</td>";
        echo "<td>Idade</td>";
        echo "<td>CPF</td>";
        echo "<td>Data de Nascimento</td>";
        echo "<td>Sexo</td>";
        echo "<td>Celular</td>";
        echo "<td>Usuario</td>";
        echo "<td>Perfil</td>";
        echo "<td>Alterar</td>";
        echo "<td>Excluir</td>";
        echo "</tr>";
        foreach ($funcionarios as $f) {
            echo "<tr>";
            echo "<td>{$f["nome"]}</td>";
            echo "<td>{$f["sobrenome"]}</td>";
            echo "<td>{$f["idade"]}</td>";
            echo "<td>{$f["cpf"]}</td>";
            echo "<td>{$f["datanascimento"]}</td>";
            echo "<td>{$f["sexo"]}</td>";
            echo "<td>{$f["celular"]}</td>";
            echo "<td>{$f["usuario"]}</td>";
            echo "<td>{$f["perfil"]}</td>";
            echo "<td><a href='alterarFuncionario.php?idf={$f["idFuncionario"]}&idu={$f["idUsuario"]}'>Alterar</a></td>";
            echo "<td><a href='javascript:func()' onclick='deleta({$f["idFuncionario"]},{$f["idUsuario"]})'>Excluir</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</center>";
        ?>
    </body>
</html>
