<html>
    <head>
    </head>
    <body>
    <center>
        <?php
        include 'principal.php';
        echo "<b><p size='5'>";
        echo "Usuario: ", $_SESSION["usuario"], "<br>";
        echo "Perfil: ", $_SESSION["perfil"], "<br>";
        echo "</b></p>";
        ?>
    </center>
</body>
<?php include './footer.php'; ?>
</html>
