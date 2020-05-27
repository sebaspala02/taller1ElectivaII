<?php
class proveedorDAO
{
    private $dao;

    function __construct()
    {
        require '../DAO/DAO.php';
        $this->dao = new clsDAO();
    }

    public function guardar(clsProveedor $obj)
    {
        $this->dao->crearConsulta("guardarProveedor", array(
            $obj->getNit(),  $obj->getNombre(),
            $obj->getCiudad(), $obj->getDireccion(), $obj->getTelefono()
        ), "funcion");
    }


    public function buscar(clsProveedor $obj)
    {
        $this->dao->crearConsulta("buscarProveedor", array($obj->getIdproveedor()), "procedimiento");
    }

    public function eliminar(clsProveedor $obj)
    {
        $this->dao->crearConsulta("eliminarProveedor", array($obj->getIdproveedor()), "funcion");
    }

    public function modificar(clsProveedor $obj)
    {
        $this->dao->crearConsulta("modificarProveedor", array(
            $obj->getIdproveedor(), $obj->getNit(),  $obj->getNombre(),
            $obj->getCiudad(), $obj->getDireccion(), $obj->getTelefono()
        ), "funcion");
    }

    public function listar()
    {
        $this->dao->crearConsulta("listarProveedor", array(0), "procedimiento");
    }
}
