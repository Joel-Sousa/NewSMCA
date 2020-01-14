<html>
    <head>
        <?php
        include 'principal.php';
        require_once '../Controller/DAO/funcionarioDAO.php';
        $idf = $_GET["idf"];
        $idu = $_GET["idu"];
        $funcionarioDAO = new FuncionarioDAO();
        $funcionario = $funcionarioDAO->getById($idf, $idu);
        
        $data = $funcionario["datanascimento"];
        $AD = explode("-", $data);
        ?>
    </head>
    <body>
        <center>
        Alterar Funcionario<br>
        Campos Obrigatorios(*)
    </center>
        <form action="../Controller/alterarFuncionarioController.php" method="post" align="center" name="form">
            <input type="hidden" name="idFuncionario" value="<?php echo $funcionario["idFuncionario"]?>">
            <input type="hidden" name="idUsuario" value="<?php echo $funcionario["idUsuario"]?>">
            <center><table>
                <tr>
            <td>Nome(*):</td>
            <td><input type="text" name="nome" value="<?php echo $funcionario["nome"]?>" required="true" class="txt"></td>        
                </tr>
                <tr>
            <td>Sobrenome(*):</td>
            <td><input type="text" name="sobrenome" value="<?php echo $funcionario["sobrenome"]?>" required="true" class="txt"></td>        
                </tr>
                <tr>
            <td>CPF:</td>
            <td><input type="text" name="cpf" value="<?php echo $funcionario["cpf"]?>" id="cpf" onchange="valida()" onKeyPress="formata(this, '###.###.###-##')" maxlength="14" readonly="true" class="txt"></td>        
                </tr>
                <tr>
                    <td>Data:</td>
                    <td><input type="text" name="datanascimento" readonly="readonly" maxlength="10" value="<?php echo $AD[2]."/".$AD[1]."/".$AD[0]?>" class="txt"></td>
                </tr>
                <tr>
            <?php
            echo "<td>Sexo:</td><td><select name='sexo' class='txt1'>";
            if($aluno["sexo"] == "Masculino"){
                echo "<option selected value='Masculino'>Masculino</option>";
                echo "<option  value='Feminino'>Feminino</option>";
            }else{
                echo "<option value='Masculino'>Masculino</option>";
                echo "<option selected value='Feminino'>Feminino</option>";
            }
            echo "</select></td>";
            ?>
            </tr>
            <tr>
            <td>Celular:</td>
            <td><input type="text" name="celular" value="<?php echo $funcionario["celular"]?>" onKeyPress='MascaraCelular(this);' onkeydown='return SomenteNumero(event)' maxlength="15" class="txt"></td>    
            </tr>
            <tr>
            <td>Endereco:</td>
            <td><input type="text" name="endereco" value="<?php echo $funcionario["endereco"]?>" class="txt"></td>    
            </tr>
            <tr>
            <td>Cidade:</td>
            <td><input type="text" name="cidade" value="<?php echo $funcionario["cidade"]?>" class="txt"></td>   
            </tr>
            <tr>
            <?php
            echo "<td>Estado:</td><td><select name='estado'  class='txt1'>";
            if($aluno["estado"] == "GO"){
                echo "<option selected value='GO'>GO</option>";
                echo "<option  value='DF'>DF</option>";
            }else{
                echo "<option value='GO'>GO</option>";
                echo "<option selected value='DF'>DF</option>";
            }
            echo "</select></td>";
            ?>
            </tr>
            <tr>
            <td>Usuario:</td>
            <td><input type="text" name="usuario" value="<?php echo $funcionario["usuario"]?>" readonly="true" class="txt"></td>    
            </tr>
            <tr>
            <td>Senha(*):</td>
            <td><input type="text" id="senha" name="senha" value="<?php echo $funcionario["senha"] ?>" required="true" class="txt"></td>
            </tr>
            <tr>
                <td>Repetir Senha(*):</td>
                <td><input type="text" id="rsenha" name="rsenha" placeholder="Repetir Senha" value="<?php echo $funcionario["senha"] ?>" onchange="validaSenha(this);" required="true" class="txt"></td>
            </tr>
            <tr>
            <?php
            $funcionario["perfil_idPerfil"];
            echo "<td>Perfil:</td><td><select name='perfil' required='true' class='txt1'>";
            echo "<option value=''>.:Selecione:.</option>";
            if ($funcionario["perfil_idPerfil"] == '1') {
                echo "<option selected value='1'>Administrador</option>";
                echo "<option value='2'>Funcionario</option>";
            } else {
                echo "<option value='1'>Administrador</option>";
                echo "<option selected value='2'>Funcionario</option>";
            }
            echo "</select></td>";
            ?>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Alterar"></td>
            </tr>
            </table></center>
        </form>
    </body>
</html>
