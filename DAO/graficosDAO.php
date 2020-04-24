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
        // $sql = "call listar" . $tabla;
        // $result = $this->objCon->ExecuteReport($sql);
        // $resultKeys = array_keys($result[0]);
        // return $resultKeys;
        $this->dao->crearConsulta("listarGenero", array(0), "procedimiento");
        // $sql = "SELECT idmedicamento,nombre,descrip,fecha_venc,cant,fecha_creado,precio,usuario_idusuario,laboratorio_idlaboratorio from medicamento M";
        // $this->objCon->Execute($sql);
    }
    public function listarG2()
    {
        // $sql = "call listar" . $tabla;
        // $result = $this->objCon->ExecuteReport($sql);
        // $resultKeys = array_keys($result[0]);
        // return $resultKeys;
        $this->dao->crearConsulta("listarProd", array(0), "procedimiento");
        // $sql = "SELECT idmedicamento,nombre,descrip,fecha_venc,cant,fecha_creado,precio,usuario_idusuario,laboratorio_idlaboratorio from medicamento M";
        // $this->objCon->Execute($sql);
    }
    public function listarG3()
    {
        // $sql = "call listar" . $tabla;
        // $result = $this->objCon->ExecuteReport($sql);
        // $resultKeys = array_keys($result[0]);
        // return $resultKeys;
        $this->dao->crearConsulta("listarVentaProd", array(0), "procedimiento");
        // $sql = "SELECT idmedicamento,nombre,descrip,fecha_venc,cant,fecha_creado,precio,usuario_idusuario,laboratorio_idlaboratorio from medicamento M";
        // $this->objCon->Execute($sql);
    }
    public function listarG4()
    {
        // $sql = "call listar" . $tabla;
        // $result = $this->objCon->ExecuteReport($sql);
        // $resultKeys = array_keys($result[0]);
        // return $resultKeys;
        $this->dao->crearConsulta("listar4", array(0), "procedimiento");
        // $sql = "SELECT idmedicamento,nombre,descrip,fecha_venc,cant,fecha_creado,precio,usuario_idusuario,laboratorio_idlaboratorio from medicamento M";
        // $this->objCon->Execute($sql);
    }
    public function listarG5()
    {
        // $sql = "call listar" . $tabla;
        // $result = $this->objCon->ExecuteReport($sql);
        // $resultKeys = array_keys($result[0]);
        // return $resultKeys;
        $this->dao->crearConsulta("listar5", array(0), "procedimiento");
        // $sql = "SELECT idmedicamento,nombre,descrip,fecha_venc,cant,fecha_creado,precio,usuario_idusuario,laboratorio_idlaboratorio from medicamento M";
        // $this->objCon->Execute($sql);
    }
}
