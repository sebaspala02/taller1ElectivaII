<?php
class mediDAO
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

    public function guardar(clsMedi $obj)
    {
        $this->dao->crearConsulta("guardarMedicamento", array($obj->getNombre(),$obj->getDescrip(), $obj->getFecha_venc(),
            $obj->getCant(), $obj->getFecha_creado(),
            $obj->getPrecio(), $obj->getIdUsuario(), $obj->getIdLaboratorio()),"funcion");
        // $sql = "INSERT INTO medicamento(nombre,descrip,fecha_venc,cant,fecha_creado,precio,usuario_idusuario,laboratorio_idlaboratorio) "
        //     . "VALUES ('" . $obj->getNombre() . "','" .
        //     $obj->getDescrip() . "','" . $obj->getFecha_venc() . "',"  .
        //     $obj->getCant() . ",'" . $obj->getFecha_creado() . "'," .
        //     $obj->getPrecio() . "," . $obj->getIdUsuario() . "," . $obj->getIdLaboratorio()
        //     . ")";
        // $this->objCon->ExecuteTransaction($sql);
    }

    public function buscar(clsMedi $obj)
    {
        $this->dao->crearConsulta("buscarMedicamento", array($obj->getIdMedicamento()),"procedimiento");
        // $sql = "SELECT idmedicamento,nombre,descrip,fecha_venc,cant,fecha_creado,precio,usuario_idusuario,laboratorio_idlaboratorio from medicamento M 
        // where idmedicamento ="  . $obj->getIdMedicamento()  . ""  ;
        // $this->objCon->Execute($sql);
    }

    public function eliminar(clsMedi $obj)
    {
        $this->dao->crearConsulta("eliminarMedicamento", array($obj->getIdMedicamento()), "funcion");
        // $sql = "DELETE from medicamento where idmedicamento=" . $obj->getIdMedicamento() . "";
        // $this->objCon->ExecuteTransaction($sql);
    }

    public function modificar(clsMedi $obj)
    {
        $this->dao->crearConsulta("modificarMedicamento", array(
            $obj->getIdMedicamento(), $obj->getNombre(),
            $obj->getDescrip(), $obj->getFecha_venc(),
            $obj->getCant(), $obj->getFecha_creado(),
            $obj->getPrecio(), $obj->getIdUsuario(), $obj->getIdLaboratorio()
        ),"funcion");
        // $sql = "UPDATE medicamento SET nombre=" . "'" . $obj->getNombre() . "',descrip='" .
        //     $obj->getDescrip() . "',fecha_venc='"  . $obj->getFecha_venc() . "',cant=" .
        //     $obj->getCant() . ",fecha_creado='"  . $obj->getFecha_creado() . "',precio=" . $obj->getPrecio() .
        //     " where idmedicamento=" . $obj->getIdMedicamento() . "";
        // $this->objCon->ExecuteTransaction($sql);
    }

    public function listar()
    {
        $this->dao->crearConsulta("listarMedi", array(""), "funcion");
        // $sql = "SELECT idmedicamento,nombre,descrip,fecha_venc,cant,fecha_creado,precio,usuario_idusuario,laboratorio_idlaboratorio from medicamento M";
        // $this->objCon->Execute($sql);
    }
}
