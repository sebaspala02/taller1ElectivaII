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
            $obj->getnit(),  $obj->getnombre(),
            $obj->getciudad(), $obj->getdireccion(), $obj->gettelefono()
        ), "funcion");
    }


    public function buscar(clsProveedor $obj)
    {
        $this->dao->crearConsulta("buscarProveedor", array($obj->getidproveedor()), "procedimiento");
    }

    public function eliminar(clsProveedor $obj)
    {
        $this->dao->crearConsulta("eliminarProveedor", array($obj->getidproveedor()), "funcion");
    }

    public function modificar(clsProveedor $obj)
    {
        $this->dao->crearConsulta("modificarProveedor", array(
            $obj->getidproveedor(), $obj->getnit(),  $obj->getnombre(),
            $obj->getciudad(), $obj->getdireccion(), $obj->gettelefono()
        ), "funcion");
    }

    public function listar()
    {
        $this->dao->crearConsulta("listarProveedor", array(0), "procedimiento");
    }
}
