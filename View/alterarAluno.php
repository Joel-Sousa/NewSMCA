<html>
    <head>
        <?php
        include 'principal.php';
        require_once '../Controller/DAO/alunoDAO.php';
        $ida = $_GET["ida"];
        $alunoDAO = new AlunoDAO();
        $aluno = $alunoDAO->getById($ida);
        $data = $aluno["datanascimento"];
        $AD = explode("-", $data);
        ?>
    </head>
    <body>
    <center>
        Alterar Aluno<br>
        Campos Obrigatorios(*)
    </center>
    <form action="../Controller/alterarAlunoController.php" method="post" align="center" enctype="multipart/form-data" name="form">
        <input type="hidden" name="idAluno" value="<?php echo $aluno["idAluno"] ?>"><br>
        <center><table>
                <tr>
                    <td>Nome(*):</td>
                    <td><input type="text" name="nome" value="<?php echo $aluno["nome"] ?>" required="true" class="txt"></td>
                </tr>    
                <tr>
                    <td>Sobrenome(*):</td>
                    <td><input type="text" name="sobrenome" value="<?php echo $aluno["sobrenome"] ?>" required="true" class="txt"></td>        
                </tr>
                <tr>
                    <td>Matricula:</td>
                    <td><input type="text" name="matricula" value="<?php echo $aluno["matricula"] ?>" readonly="true" class="txt"></td>        
                </tr>
                <tr>
                    <td>CPF:</td>
                    <td><input type="text" name="cpf" value="<?php echo $aluno["cpf"] ?>" id="cpf" onchange="valida()" onKeyPress="formata(this, '###.###.###-##')" maxlength="14" readonly="true" class="txt"></td>        
                </tr>
                <tr>
                    <td>Data:</td><td><input type="text" name="datanascimento" readonly="readonly" maxlength="10" value="<?php echo $AD[2] . "/" . $AD[1] . "/" . $AD[0] ?>" class="txt"></td>
                </tr>
                <tr>
                    <td>Sexo:</td>
                    <td><select name="sexo" class="txt1">
                            <?php
                            if ($aluno["sexo"] == "Masculino") {
                                echo "<option selected value='Masculino'>Masculino</option>";
                                echo "<option  value='Feminino'>Feminino</option>";
                            } else {
                                echo "<option value='Masculino'>Masculino</option>";
                                echo "<option selected value='Feminino'>Feminino</option>";
                            }
                            ?>
                        </select></td>
                </tr>
                <tr>
                    <td>Celular:</td>
                    <td><input type="text" name="celular" value="<?php echo $aluno["celular"] ?>"  onKeyPress='MascaraCelular(this);' onkeydown='return SomenteNumero(event)' maxlength="15" class="txt"></td>
                </tr>
                <tr>
                    <td>Endereco:</td>
                    <td><input type="text" name="endereco" value="<?php echo $aluno["endereco"] ?>" class="txt"></td>    
                </tr>
                <tr>
                    <td>Cidade:</td>
                    <td><input type="text" name="cidade" value="<?php echo $aluno["cidade"] ?>" class="txt"></td>
                </tr>
                <tr>
                    <td>Estado:</td>
                    <td><select name='estado' class='txt1'>
                    <?php
                    if ($aluno["estado"] == "GO") {
                        echo "<option selected value='GO'>GO</option>";
                        echo "<option  value='DF'>DF</option>";
                    } else {
                        echo "<option value='GO'>GO</option>";
                        echo "<option selected value='DF'>DF</option>";
                    }
                    ?>
                            </select></td>
                </tr>
                <tr>
                    <td>Imagen:</td><td><input type="file" name="arquivo" multiple="multiple"></td>   
                </tr>
                <input type="hidden" name="imv" value="<?php echo $aluno["imagem"] ?>"/>
                <tr>
                    <td>Status:</td><td>
                        <?php
                        if ($aluno["status"] == 'Regular') {
                            echo " Regular: <input checked type='radio' name='status' value='Regular'/>";
                            echo " Pedente: <input type='radio' name='status' value='Pedente'/>";
                        } else {
                            echo "Regular <input type='radio' name='status' value='Regular'/>";
                            echo "Pedente <input checked type='radio' name='status' value='Pedente'/>";
                        }
                        ?>
                    </td></tr>
                <input type="hidden" name="perfil" value="<?php echo $aluno["perfil_idPerfil"] ?>">
                <tr>
                    <td colspan="2"><input type="submit" value="Alterar" class="btp"></td>   
                </tr>
            </table></center>
    </form>
</body>
</html>
