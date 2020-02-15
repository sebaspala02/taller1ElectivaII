<?php

class loginDAO {
    private $con;
    private $objCon;

    function __construct() {
        require '../infrastructure/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function logear(clsLogin $obj) {
        $sql = "SELECT nickname,password from usuario where "
        . "nickname='" . $obj->getUsuario() . "' and "
        . "password='" . $obj->getPassword() . "'";

        $resultado = $this->objCon->getConnect()->prepare($sql);
        $resultado->execute();

        if($resultado->rowCount() > 0) {
            $vec = $resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        if(isset($vec)) {
            session_start();
            $_SESSION["user"] = $vec[0]['nickname'];
            header('location:../index.php');
        } else {
            $mensaje = "El usuario ingresado no existe";
            header('location:../index.php?msjlogin=' . $mensaje);
        }

    }
}