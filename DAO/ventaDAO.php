<?php
class ventaDAO
{
    private $con;
    private $objCon;

    function __construct()
    {
        require '../infrastructure/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function guardar(clsVenta $obj)
    {
        $sql = "INSERT INTO venta(fecha_venta,valor_total,cliente_idcliente,usuario_idusuario,fecha_naci) " .
            "VALUES ('" . $obj->getfecha_venta() . "'," . $obj->getvalor_total() . "," . $obj->getcliente_idcliente() . ",
        " . $obj->getusuario_idusuario() . ")";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function buscar(clsVenta $obj)
    {
        $sql = "SELECT idventa,fecha_venta,valor_total,cliente_idcliente,usuario_idusuario from venta
        where idventa = " . $obj->getidventa() . "";
        $this->objCon->Execute($sql);
    }

    public function eliminar(clsVenta $obj)
    {
        $sql = "DELETE from venta where idcliente=" . $obj->getidventa() . "";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function modificar(clsVenta $obj)
    {
        $sql = "UPDATE venta SET fecha_venta='" . $obj->getfecha_venta() . "',valor_total=" .
            $obj->getvalor_total() . ",cliente_idcliente="  . $obj->getcliente_idcliente() .
            ",usuario_idusuario="  . $obj->getusuario_idusuario() . ",fecha_naci='"  . $obj->getfecha_venta() .
            "' where idcliente=" . $obj->getidventa() . "";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function listar()
    {
        $sql = "SELECT idventa,fecha_venta,valor_total,cliente_idcliente,usuario_idusuario,fecha_naci from venta";
        $this->objCon->Execute($sql);
    }
}
