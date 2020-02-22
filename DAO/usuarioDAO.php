<?php
class usuarioDAO
{
    private $con;
    private $objCon;

    function __construct()
    {
        require '../infrastructure/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function guardar(clsUsuario $obj)
    {
        $sql = "select guardarUsuario (" . $obj->getCedula() . ",'" . $obj->getNombreUsuario() . "','"  .
            $obj->getApellidoUsuario() . "','"  . $obj->getCorreo() . "','"  . $obj->getUsuario() . "',"  .
            $obj->getPassword() . ")";
        $this->objCon->ExecuteTransaction($sql);
    }

    // public function guardar(clsUsuario $obj)
    // {
    //     $sql = "select guardarUsuario (" . $obj->getCedula() . ",'" . $obj->getNombreUsuario() . "','"  .
    //         $obj->getApellidoUsuario() . "','"  . $obj->getCorreo() . "','"  . $obj->getUsuario() . "',"  .
    //         $obj->getPassword() . ")";
    //     $this->objCon->ExecuteTransaction($sql);
    // }

    // public function guardar(clsUsuario $obj){
    //     $sql = "INSERT INTO usuario(cedula,nombre,apellido,correo,usuario,password) "
    //     . "VALUES (" . $obj->getCedula() . ",'" . $obj->getNombreUsuario() . "','"  . 
    //     $obj->getApellidoUsuario(). "','"  . $obj->getCorreo() . "','"  . $obj->getUsuario() . "',"  . 
    //     $obj->getPassword() . ")";
    //     $this->objCon->ExecuteTransaction($sql);
    // }

    public function buscar(clsUsuario $obj)
    {
        $sql = "SELECT cedula,nombre,apellido,correo,usuario,password from usuario 
        where idusuario = " . $obj->getIdUsuario() . "";
        $this->objCon->Execute($sql);
    }

    public function eliminar(clsUsuario $obj)
    {
        $sql = "DELETE from usuario where idusuario=" . $obj->getIdUsuario() . "";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function modificar(clsUsuario $obj)
    {
        $sql = "UPDATE usuario SET cedula=" . $obj->getCedula() . ",nombre='" .
            $obj->getNombreUsuario() . "',apellido='"  . $obj->getApellidoUsuario() .
            "',correo='"  . $obj->getCorreo() . "',usuario='"  . $obj->getUsuario() .
            "',password="  . $obj->getPassword() . " where idusuario=" . $obj->getIdUsuario() . "";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function listar()
    {
        $sql = "SELECT idusuario,cedula,nombre,apellido,correo,usuario,password from usuario";
        $this->objCon->Execute($sql);
    }
}
