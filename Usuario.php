<?php
require 'db_funciones.php';

Class Usuario{
    var $nombre;
    var $apellido;
    var $nomusuario;
    var $clave;
            
    public function __construct($snombre=NULL,$sapellido=NULL,$snomusuario,$sclave) {
        $this->nombre=$snombre;
        $this->apellido=$sapellido;
        $this->nomusuario=$snomusuario;
        $this->clave=$sclave;
    }
    
    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getNomusuario() {
        return $this->nomusuario;
    }

    function getClave() {
        return $this->clave;
    }

    public function Acceso(){
        /*$snomusuario="admin";
        $sclave=md5("holamundo");*/
        /*Llamada a la funcion que crea la instancia del objeto PDO*/
        $db= dbconnect();
        
        /*Declaracion de la sentencia SQL que se requiere ejecutar*/
        $squery="SELECT nombre FROM usuario WHERE usuario=:usr and clave=:pwd";
        
        /*Instancia del objeto que realizara el query*/
        $queryseleccion=$db->prepare($squery);
        
        $queryseleccion->bindParam(":usr", $this->nomusuario);
        $queryseleccion->bindParam(":pwd", $this->clave);
        
        if($this->nomusuario==$snomusuario && $this->clave==$sclave)
            return true;
        else
            return false;
        
    }
}

?>
