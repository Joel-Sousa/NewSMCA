<html>
    <body>
    <head>
        <script language=javascript>
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
			
            function VALIDA() {
                if (isCPF(document.form.cpf.value, 1)) {
//	alert('OK');
                } else {
                    alert('Digite um CPF Valido!');
                    document.getElementById('cpf1').value = '';
                    document.form.cpf.focus()
                }
            }
        </script>
    </head>
        
    <form action="" method="" name="form">
            <input type="text" name="cpf" onChange="VALIDA()" onKeyPress="formata(this, '###.###.###-##')" maxlength="14">
        </form>
    </body>
</html>