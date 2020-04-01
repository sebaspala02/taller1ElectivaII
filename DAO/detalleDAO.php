<?php
class detalleDAO
{

    public function listarDetalle($valor)
    {
        $this->dao->crearConsulta("listarDetalleV", array($valor), "procedimiento");
        // $sql = "SELECT d.iddetalle_venta,d.cant,d.medicamento_idmedicamento,d.venta_idventa,m.nombre 
        // from medicamento m join detalle_venta d on m.idmedicamento = d.medicamento_idmedicamento where d.venta_idventa= " . $valor;
        // $this->objCon->Execute($sql);
    }
}
// preguntar a alejo esta clase que creamos que ¿?