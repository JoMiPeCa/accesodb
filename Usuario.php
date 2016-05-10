<?php

require 'db_funciones.php';

Class Usuario {

    var $nombre;
    var $apellido;
    var $nomusuario;
    var $clave;

    public function __construct($snombre = NULL, $sapellido = NULL, $snomusuario, $sclave) {
        $this->nombre = $snombre;
        $this->apellido = $sapellido;
        $this->nomusuario = $snomusuario;
        $this->clave = $sclave;
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

    function setClave($clave) {
        $this->clave = $clave;
    }

    public function Acceso() {
        /* $snomusuario="admin";
          $sclave=md5("holamundo"); */
        /* Llamado a la función que crea la instancia del objeto PDO */

        $db = dbconnect();

        /* Declaración de la sentencia SQL que se requiere ejecutar */
        $squery = "Select nombre from usuarios where usuario=:usr and clave=:pwd";

        /* Instancia del objeto que realizará el query */
        $queryseleccion = $db->prepare($squery);

        $queryseleccion->bindParam(":usr", $this->nomusuario);
        $queryseleccion->bindParam(":pwd", $this->clave);

        $datos = $queryseleccion->execute();

        if ($queryseleccion->rowCount() == 1) {
            $this->nombre = $queryseleccion->fetchColumn();
            return true;
        } else {
            return false;
        }

        /*
          if($this->nomusuario==$snomusuario && $this->clave==$sclave)
          return true;
          else
          return false;
         */
    }

    public function cambioClave($newPwd) {

        $db = dbconnect();

        /* Declaración de la sentencia SQL que se requiere ejecutar */
        $squery = "UPDATE usuarios set clave =:pwd where usuario=:usr";
        
        $queryseleccion = $db->prepare($squery);
        
        $queryseleccion->bindParam(":usr", $this->nomusuario);
        $queryseleccion->bindParam(":pwd", $newPwd);

        $datos = $queryseleccion->execute();
        
    }

}

?>
