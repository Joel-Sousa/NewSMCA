<html>
    <head>
        <script>
            function sair() {
                var resposta = confirm("Deseja Sair Manezao?");
                if (resposta == true) {
                    window.location.href = "sair.php";
                 }
            }
        </script>
        <link rel="stylesheet" type="text/css" href="../CSS/estilo.css">
        <script language="JavaScript" src="../JS/check.js"></script>
        <script language="JavaScript" src="../JS/validaCPF.js"></script>
    </head>
    <body>
        <?php
        include 'validarLogin.php';
        switch ($_SESSION["perfil"]) {
            case "Administrador":
                echo "<ul align='center' id='primcipal'>";
                echo "<li><a href='home.php'>Home</li></a>&nbsp;";
                echo "<li><a href='alteraDados.php'>Alterar Dados</li></a>&nbsp;";
                echo "<li><a href='listarAlunos.php'>Alunos</li></a>&nbsp;";
                echo "<li><a href='listarFuncionarios.php'>Funcionarios</li></a>&nbsp;";
                echo "<li><a href='historico.php'>Historico Alunos</li></a>&nbsp;";
                echo "<li><a href='cadastrarAluno.php'>Cadastrar Alunos</li></a>&nbsp;";
                echo "<li><a href='cadastrarFuncionario.php'>Cadastrar Funcionarios</li></a>&nbsp;";
                echo "<li><a href='altenticar.php'>Altenticar</li></a>&nbsp;";
                echo "<li><a href='javascript:func()' onclick='sair()'>Sair</li></a>";
                echo "</ul>";
                echo "<br>";
                break;
            case "Funcionario":
                echo "<ul align='center'>";
                echo "<li><a href='home.php'>Home</a></li>&nbsp;";
                echo "<li><a href='alteraDados.php'>Alterar Dados</a></li>&nbsp;";
                echo "<li><a href='listarAlunos.php'>Alunos</a></li>&nbsp;";
                echo "<li><a href='historico.php'>Historico Alunos</a></li>&nbsp;";
                echo "<li><a href='cadastrarAluno.php'>Cadastrar Alunos</a></li>&nbsp;";
                echo "<li><a href='altenticar.php'>Altenticar</a></li>&nbsp;";
                echo "&nbsp;&nbsp;&nbsp;";
                echo "<li><a href='sair.php'>Sair</a></li>";
                echo "</ul>";
                echo "<br>";
                break;
        }
        ?>
    </body>
</html>
