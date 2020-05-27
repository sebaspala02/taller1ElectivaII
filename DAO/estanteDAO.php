<?php
class estanteDAO
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

    public function guardar(clsEstante $obj)
    {
        $this->dao->crearConsulta(
            "guardarEstante",
            array(
                $obj->getIdestante(),
                $obj->getCodigo(),
                $obj->getCategoria(),
                $obj->getDescripcion()
            ),
            "funcion"
        );
    }

    public function buscar(clsEstante $obj)
    {
        $this->dao->crearConsulta("buscarEstante", array($obj->getIdestante()), "procedimiento");
    }

    public function eliminar(clsEstante $obj)
    {
        $this->dao->crearConsulta("eliminarEstante", array($obj->getIdestante()), "funcion");
    }

    public function modificar(clsEstante $obj)
    {
        $this->dao->crearConsulta("modificarEstante", array(
            $obj->getIdestante(),
            $obj->getCodigo(),
            $obj->getCategoria(),
            $obj->getDescripcion()
        ), "funcion");
    }

    public function listar()
    {
        $this->dao->crearConsulta("listarEstante", array(0), "procedimiento");
    }
}
