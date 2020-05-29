<?php
class clienteDAO
{
    private $con;
    private $objCon;
    private $dao;

    function __construct()
    {
        // require '../infrastructure/clsConexion.php';
        require '../DAO/DAO.php';
        // $this->objCon = new clsConexion();
        // $this->con = $this->objCon->conectar();
        $this->dao = new clsDAO();
    }

    public function guardar(clsCliente $obj)
    {
        $this->dao->crearConsulta("guardarCliente", array(
            $obj->getNombre(),  $obj->getApellido(), $obj->getCedula(), $obj->getGenero(), $obj->getFecha_naci()
        ), "funcion");
        // $sql = "INSERT INTO cliente(nombre,apellido,cedula,genero,fecha_naci) " .
        //     "VALUES ('" . $obj->getNombre() . "','" . $obj->getApellido() . "'," . $obj->getCedula() . ",
        // '" . $obj->getGenero() . "','" . $obj->getFecha_naci() . "')";
        // $this->objCon->ExecuteTransaction($sql);
    }

    public function buscar(clsCliente $obj)
    {
        $this->dao->crearConsulta("buscarCliente", array($obj->getIdCliente()), "procedimiento");
        // $sql = "SELECT nombre,apellido,cedula,genero,fecha_naci from cliente
        // where idcliente = " . $obj->getIdCliente() . "";
        // $this->objCon->Execute($sql);
    }

    public function eliminar(clsCliente $obj)
    {
        $this->dao->crearConsulta("eliminarCliente", array($obj->getIdCliente()), "funcion");
        // $sql = "DELETE from Cliente where idcliente=" . $obj->getIdCliente() . "";
        // $this->objCon->ExecuteTransaction($sql);
    }

    public function modificar(clsCliente $obj)
    {
        $this->dao->crearConsulta("modificarCliente", array(
            $obj->getIdCliente(), $obj->getNombre(),  $obj->getApellido(), $obj->getCedula(), $obj->getGenero(), $obj->getFecha_naci()
        ), "funcion");
        // $sql = "UPDATE cliente SET nombre='" . $obj->getNombre() . "',apellido='" .
        //     $obj->getApellido() . "',cedula="  . $obj->getCedula() .
        //     ",genero='"  . $obj->getGenero() . "',fecha_naci='"  . $obj->getFecha_naci() .
        //     "' where idcliente=" . $obj->getIdCliente() . "";
        // $this->objCon->ExecuteTransaction($sql);
    }

    public function listar()
    {
        $this->dao->crearConsulta("listarClientes", array(0), "procedimiento");
        // $sql = "SELECT idcliente,nombre,apellido,cedula,genero,fecha_naci from cliente";
        // $this->objCon->Execute($sql);
    }
}
