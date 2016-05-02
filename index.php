<?php
session_start();
require 'Usuario.php';
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <!-- URL de prueba http://jsfiddle.net/33hmj/ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <body>
        <?php
        require 'Redireccion.php';
        ?>
        <?php
        

        $oUsr = unserialize($_SESSION['oUsr']);

        echo "Bienvenido: ".$oUsr->getNombre()." ".$oUsr->getApellido();
        
        ?>
        <br>
        <br>
        <br>
        <a href="logout.php">Log Out</a>
    </body>
</html>