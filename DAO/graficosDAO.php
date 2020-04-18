<?php
class graficosDAO
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
    public function listarG1()
    {
        $this->dao->crearConsulta("listarGenero", array(0), "procedimiento");
        // $sql = "SELECT idmedicamento,nombre,descrip,fecha_venc,cant,fecha_creado,precio,usuario_idusuario,laboratorio_idlaboratorio from medicamento M";
        // $this->objCon->Execute($sql);
    }
}
