<?php
class usuarioDAO
{
    private $con;
    private $objCon;
    private $dao;

    function __construct()
    {
        require '../infrastructure/clsConexion.php';
        require './DAO.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
        $this->dao = new clsDAO();
    }

    // public function crearConsulta($nombreFuncion, $datos)
    // {
    //     $resultado = "select " . $nombreFuncion . "(" . $datos . ")";
    //     $this->objCon->ExecuteTransaction($resultado);
    // }
    public function guardar(clsUsuario $obj)
    {
        $this->dao->crearConsulta("guardarUsuario", array($obj->getCedula() ,  $obj->getNombreUsuario() . "','"  .
            $obj->getApellidoUsuario() . "','"  . $obj->getCorreo() . "','"  . $obj->getUsuario() . "',"  .
            $obj->getPassword()), "funcion");
        // $sql = "select guardarUsuario (" . $obj->getCedula() . ",'" . $obj->getNombreUsuario() . "','"  .
        //     $obj->getApellidoUsuario() . "','"  . $obj->getCorreo() . "','"  . $obj->getUsuario() . "',"  .
        //     $obj->getPassword() . ")";
        // $this->objCon->ExecuteTransaction($sql);
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
        $this->dao->crearConsulta("buscarUsuario", $obj->getIdUsuario());
        // $sql = "SELECT cedula,nombre,apellido,correo,usuario,password from usuario 
        // where idusuario = " . $obj->getIdUsuario() . "";
        // $this->objCon->Execute($sql);
    }

    public function eliminar(clsUsuario $obj)
    {
        $this->dao->crearConsulta("eliminarUsuario", $obj->getIdUsuario());
        // $sql = "DELETE from usuario where idusuario=" . $obj->getIdUsuario() . "";
        // $this->objCon->ExecuteTransaction($sql);
    }

    public function modificar(clsUsuario $obj)
    {
        $this->dao->crearConsulta("modificarUsuario", $obj->getCedula() . ",'" .
            $obj->getNombreUsuario() . "','"  . $obj->getApellidoUsuario() .
            "','"  . $obj->getCorreo() . "','"  . $obj->getUsuario() .
            "',"  . $obj->getPassword());
        // $sql = "UPDATE usuario SET cedula=" . $obj->getCedula() . ",nombre='" .
        //     $obj->getNombreUsuario() . "',apellido='"  . $obj->getApellidoUsuario() .
        //     "',correo='"  . $obj->getCorreo() . "',usuario='"  . $obj->getUsuario() .
        //     "',password="  . $obj->getPassword() . " where idusuario=" . $obj->getIdUsuario() . "";
        // $this->objCon->ExecuteTransaction($sql);
    }

    public function listar()
    {
        $this->dao->crearConsulta("listarUsuario", "");
    }
}
