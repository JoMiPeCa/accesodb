<?php

session_start();
require 'Usuario.php';

$oUsr = unserialize($_SESSION['oUsr']);

if($oUsr->cambioClave($_POST["clave"])){
    $_SESSION['oUsr']=serialize($oUsr);
    echo json_encode(true);
    return;
    
}
echo json_encode(false);

?>
