<html>
    <head>
        <?php include 'principal.php';?>
        <script>
            function deleta() {
                var resposta = confirm("Deseja Excluir o Historico?");
                if (resposta === true) {
                    window.location.href = "../Controller/deletaHistoricoController.php";
                 }
            }
        </script>
    </head>
    <body onLoad="document.form.pesquisa.focus();">
        
        <form action="" method="post" align="center" name="form">
            <input type="text" name="pesquisa" placeholder="Matricula" maxlength="8" class="txt">
            <input type="submit" value="Pesquisar">
        </form>
        <?php 
        require_once '../Controller/DAO/alunoDAO.php';
        $alunoDAO = new AlunoDAO();
        
        if(!empty($_POST["pesquisa"])){
            $pesquisa = $_POST["pesquisa"];
            $alunos = $alunoDAO->pesquisaHistorico($pesquisa);
        }else{
        $alunos = $alunoDAO->listaHistorico();
        }
        echo "<a href='javascript:func()' onclick='deleta()'><p align='right'>Deleta&nbsp;</p></a>";
        echo "<center>";
        echo "<table border='' align='center' bgcolor='#fff' cellspacing='0'>";
        echo "<tr>";
        echo "<td>Nome</td>";
        echo "<td>Sobrenome</td>";
        echo "<td>Matricula</td>";
        echo "<td>Status</td>";
        echo "<td>Hora</td>";
        echo "<td>Data</td>";
        echo "</tr>";
        foreach ($alunos as $a){
        echo "<tr>";
        echo "<td>{$a["nome"]}</td>";
        echo "<td>{$a["sobrenome"]}</td>";
        echo "<td>{$a["matricula"]}</td>";
        echo "<td>{$a["status"]}</td>";
        echo "<td>{$a["hora"]}</td>";
        echo "<td>{$a["data"]}</td>";
        echo "</tr>";
        }
        echo "</table>";
        echo "</center>";
        ?>
    </body>
</html>