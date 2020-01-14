// Adiciona a formatacao no cpf "Uma mascara".
function formata(src, mask)
{
    var i = src.value.length;
    var saida = mask.substring(0, 1);
    var texto = mask.substring(i)
    if (texto.substring(0, 1) != saida)
    {
        src.value += texto.substring(0, 1);
    }
}

// Verifica os numeros digitados do cpf valida-os.
function valida() {
    if (isCPF(document.form.cpf.value, 1)) {
//	alert('OK');
    } else {
        alert('Digite um CPF Valido!');
        document.getElementById('cpf').value = '';
        document.form.cpf.focus();
    }
}

// Coloca somente numeros no campo dia da data.
function SomenteNumero(e) {
    var tecla = (window.event) ? event.keyCode : e.which;
    if ((tecla > 47 && tecla < 58))
        return true;
    else {
        if (tecla == 8 || tecla == 0)
            return true;
        else
            return false;
    }
}

// Valida o valor digitado no campo dia digitato tem que ser menor que 31.
function limiteDia(val) {
    var max = 31;
    if (val > max) {
        alert("Numero Tem que Ser Menor ou Igual a 31! ", val);
        document.getElementById('dia').value = '';
        document.form1.datadia.focus();
        return false;
    } else {
        return true;
    }
}

// Valida o valor digitado no campo ano, tem que ser menor que o ano atual.
function limiteAno(val) {
    var max = 2016;
    if (val > max) {
        alert("O ano tem Que Ser Inferior A 2017! ", val);
        document.getElementById('ano').value = '';
        document.form1.dataano.focus();
        return false;
    } else {
        return true;
    }
}

// Mascara do celular
function MascaraCelular(obj)
{
    switch (obj.value.length)
    {
        case 0:
            obj.value = obj.value + "(";
            break;
        case 3:
            obj.value = obj.value + ") ";
            break;
        case 10:
            obj.value = obj.value + "-";
            break;
    }
}

// Valida Senha
function validaSenha() {
    if (document.getElementById('senha').value != document.getElementById('rsenha').value) {
        alert('As Senhas Nao Sao Iguais!');
        document.getElementById('senha').value = '';
        document.getElementById('rsenha').value = '';
        document.form.senha.focus();
    }
}

// Deleta o funcionario com os dois ids
function deleta(idf,idu) {
                var resposta = confirm("Deseja Excluir esse Funcionario?");
                if (resposta == true) {
                    window.location.href = "../Controller/excluirFuncionarioController.php?ids="+idf+"-"+idu;
                 }
            }
