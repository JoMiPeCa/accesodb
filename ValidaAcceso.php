<?php
require 'Usuario.php';

/* 
 * 
 */

$oUsr=new Usuario(NULL,NULL,$_POST["usuario"],$_POST["clave"]);

if($oUsr->Acceso()){
    session_start();
    $_SESSION['oUsr']=serialize($oUsr);
    echo json_encode(true);
    return;
}

echo json_encode(false);
require './Redireccion.php';
?>

