<html>
    <head>
        <?php
        include 'principal.php';
        require_once '../Controller/DAO/alunoDAO.php';
        $alunoDAO = new AlunoDAO();
        $mes = $alunoDAO->mes();
        ?>
    </head>
    <body>
    <center>
        Cadastrar Aluno<br>
        Campos Obrigatorios(*)
    </center>
    <form action="../Controller/cadastrarAlunoController.php" method="post" enctype="multipart/form-data" name="form">
        <center><table>
                <tr>
                    <td>Nome(*):</td>
                    <td><input type="text"name="nome" placeholder="Nome" required="true" class="txt"></td>
                </tr>
                <tr>
                    <td>Sobrenome(*):</td>
                    <td><input type="text" name="sobrenome" placeholder="Sobrenome" required="true" class="txt"></td>
                </tr>
                <tr>
                    <td>Matricula(*):</td>
                    <td><input type="text" name="matricula" placeholder="11111111" minlength="8" maxlength="8" required="true" class="txt"></td>
                </tr>
                <tr>       
                    <td>CPF(*):</td>
                    <td><input type="text" name="cpf" id="cpf" onchange="valida()" onKeyPress="formata(this, '###.###.###-##')" placeholder="cpf" maxlength="14" required="true" class="txt"></td>
                </tr>
                <tr>
                    <td>Data(*):</td>
                    <td><input type="text" name="dia" size="2" maxlength="2" id="dia" onChange="limiteDia(this.value)" onkeypress='return SomenteNumero(event)' required="true" class="d1">
                        <select name="mes" required="true"  class="d2">
                            <option value="">&nbsp;&nbsp;.:Mes:.</option>
                            <?php
                            foreach ($mes as $m) {
                                echo "<option value='{$m["idMes"]}'>{$m["mes"]}</option>";
                            }
                            ?>    
                        </select>
                        <input type="text" name="ano" size="2" minlength="4" maxlength="4" id="ano" onchange="limiteAno(this.value)" onkeypress='return SomenteNumero(event)' required="true" class="d3"></td>
                </tr>
                <tr>
                    <td>Sexo(*):</td>
                    <td><select name="sexo" required="true" class="d2">
                            <option value="">.:Selecione:.</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                        </select></td>
                </tr>
                <tr>
                    <td>Celular:</td>
                    <td><input type="text" name="celular" placeholder="Celular"  onKeyPress='MascaraCelular(this);' onkeydown='return SomenteNumero(event)' maxlength="15" class="txt"></td>
                </tr>
                <tr>
                    <td>Endereco:</td>
                    <td><input type="text" name="endereco" placeholder="endereco" class="txt"></td>
                </tr>
                <tr>
                    <td>Cidade:</td>
                    <td><input type="text" name="cidade" placeholder="Cidade" class="txt"></td>
                </tr>
                <tr>
                    <td>Estado(*):</td>
                    <td><select name="estado" required="true" class="d2">
                            <option value="">.:Selecione:.</option>
                            <option value="GO">DF</option>
                            <option value="DF">GO</option>
                        </select><br></td>
                </tr>
                <tr>
                    <td>Imagen:</td>
                    <td><input type="file" name="arquivo" multiple="multiple"><br></td>
                </tr>
                <tr>
                    <td>Status:</td>
                    <td><select name="status" class="d2">
                            <option value="Regular">Regular</option>
                            <option value="Pendente">Pendente</option>
                        </select></td>
                </tr>
                <input type="hidden" name="perfil" value="3">                                
                <tr>
                    <td colspan="2"><input type="submit" value="Cadastrar" class="btp"></td>
                </tr>
            </table></center>
    </form>
</body>
</html>

