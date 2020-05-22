<?php
class laboratorioDAO
{
    // private $con;
    // private $objCon;
    private $dao;

    function __construct()
    {
        // require '../infrastructure/clsConexion.php';
        require '../DAO/DAO.php';
        // $this->objCon = new clsConexion();
        // $this->con = $this->objCon->conectar();
        $this->dao = new clsDAO();
    }

    public function guardar(clsLaboratorio $obj)
    {
        $this->dao->crearConsulta(
            "guardarLaboratorio",
            array(
                $obj->getNombre(),
                $obj->getDescrip()
            ),
            "funcion"
        );
    }

    public function buscar(clsLaboratorio $obj)
    {
        $this->dao->crearConsulta("buscarLaboratorio", array($obj->getIdlaboratorio()), "procedimiento");
    }

    public function eliminar(clsLaboratorio $obj)
    {
        $this->dao->crearConsulta("eliminarLaboratorio", array($obj->getIdLaboratorio()), "funcion");
    }

    public function modificar(clsLaboratorio $obj)
    {
        $this->dao->crearConsulta("modificarLaboratorio", array(
            $obj->getIdLaboratorio(), $obj->getNombre(),
            $obj->getDescrip()
        ), "funcion");
    }

    public function listar()
    {
        $this->dao->crearConsulta("listarLaboratorio", array(0), "procedimiento");
    }
}