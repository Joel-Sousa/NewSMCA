<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="CSS/estilo.css">
    </head>
    <body><br><br><br><br><br><br><br><br><br><br><br><br>
        <form action="./Controller/loginController.php" method="post" align="center"><br>
            <input type="text" name="usuario" value="Adm" class="txt"><br> <br>
            <input type="text" name="senha" value="123" class="txt"><br> <br>
            <input type="submit" value="Logar" class="btp"><br> 
        </form> 
    <center>
            <?php if(isset($_GET["msg"])) echo $_GET["msg"];?>
    </center>
    </body>
</html>