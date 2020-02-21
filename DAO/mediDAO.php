<?php
class mediDAO
{
    private $con;
    private $objCon;

    function __construct()
    {
        require '../infrastructure/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function guardar(clsMedi $obj)
    {
        $sql = "INSERT INTO medicamento(nombre,descrip,fecha_venc,cant,fecha_creado,precio,usuario_idusuario,laboratorio_idlaboratorio) "
            . "VALUES ('" . $obj->getNombre() . "','" .
            $obj->getDescrip() . "','" . $obj->getFecha_venc() . "',"  .
            $obj->getCant() . ",'" . $obj->getFecha_creado() . "'," .
            $obj->getPrecio() . "," . $obj->getIdUsuario() . "," . $obj->getIdLaboratorio()
            . ")";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function buscar(clsMedi $obj)
    {
        $sql = "SELECT idmedicamento,nombre,descrip,fecha_venc,cant,fecha_creado,precio,usuario_idusuario,laboratorio_idlaboratorio from medicamento M 
        where idmedicamento ="  . $obj->getIdMedicamento()  . ""  ;
        $this->objCon->Execute($sql);
    }

    public function eliminar(clsMedi $obj)
    {
        $sql = "DELETE from medicamento where idmedicamento=" . $obj->getIdMedicamento() . "";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function modificar(clsMedi $obj)
    {
        $sql = "UPDATE medicamento SET nombre=" . "'" . $obj->getNombre() . "',descrip='" .
            $obj->getDescrip() . "',fecha_venc='"  . $obj->getFecha_venc() . "',cant=" .
            $obj->getCant() . ",fecha_creado='"  . $obj->getFecha_creado() . "',precio=" . $obj->getPrecio() .
            " where idmedicamento=" . $obj->getIdMedicamento() . "";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function listar()
    {
        $sql = "SELECT idmedicamento,nombre,descrip,fecha_venc,cant,fecha_creado,precio,usuario_idusuario,laboratorio_idlaboratorio from medicamento M";
        $this->objCon->Execute($sql);
    }
}
