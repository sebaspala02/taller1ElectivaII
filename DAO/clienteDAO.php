<?php
class clienteDAO {
    private $con;
    private $objCon;

    function __construct(){
        require '../infrastructure/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function guardar(clsCliente $obj){
        $sql = "INSERT INTO cliente(nombre,apellido,cedula,genero,fecha_naci) " . 
        "VALUES ('". $obj->getNombre() . "','" . $obj->getApellido()."'," . $obj->getCedula().",
        '" . $obj->getGenero()."','" . $obj->getFecha_naci()."')";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function buscar(clsCliente $obj){
        $sql = "SELECT nombre,apellido,cedula,genero,fecha_naci from cliente
        where idcliente = " . $obj->getIdCliente() . "";
        $this->objCon->Execute($sql);
    }

    public function eliminar(clsCliente $obj)
    {
        $sql = "DELETE from Cliente where idcliente=" . $obj->getIdCliente() . "";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function modificar(clsCliente $obj){
        $sql = "UPDATE cliente SET nombre='" . $obj->getNombre() . "',apellido='" . 
            $obj->getApellido() . "',cedula="  . $obj->getCedula() . 
            ",genero='"  . $obj->getGenero() . "',fecha_naci='"  . $obj->getFecha_naci() . 
            "' where idcliente=" . $obj->getIdCliente() ."";
        $this->objCon->ExecuteTransaction($sql);
    }
    
    public function listar(){
        $sql = "SELECT idcliente,nombre,apellido,cedula,genero,fecha_naci from cliente";
        $this->objCon->Execute($sql);
    }
}