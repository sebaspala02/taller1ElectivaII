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

    public function guardar(clsDetalle $obj)
    {
        $this->dao->crearConsulta("guardarVenta", array(
            $obj->getTotal(),  $obj->getFecha(),
            $obj->getMedi(), $obj->getCant() , $obj->getCliente() , $_SESSION['user']
        ), "funcion");
        // $sql = "INSERT INTO venta(fecha_venta,valor_total,cliente_idcliente,usuario_idusuario) " .
        //     "VALUES ('" . $obj->getfecha_venta() . "'," . $obj->getvalor_total() . "," . $obj->getcliente_idcliente() . ",
        // " . $obj->getusuario_idusuario() . ")";
        // $this->objCon->ExecuteTransaction($sql);
    }

    public function buscar(clsDetalle $obj)
    {
        $sql = "SELECT idventa,fecha_venta,valor_total,cliente_idcliente,usuario_idusuario from venta
        where idventa = " . $obj->getidventa() . "";
        $this->objCon->Execute($sql);
    }

    public function eliminar(clsDetalle $obj)
    {
        $sql = "DELETE from venta where idcliente=" . $obj->getidventa() . "";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function modificar(clsDetalle $obj)
    {
        // $sql = "UPDATE venta SET fecha_venta='" . $obj->getfecha_venta() . "',valor_total=" .
        //     $obj->getvalor_total() . ",cliente_idcliente="  . $obj->getcliente_idcliente() .
        //     ",usuario_idusuario="  . $obj->getusuario_idusuario() . " where idventa=" . $obj->getidventa() . "";
        // $this->objCon->ExecuteTransaction($sql);
    }

    public function listar()
    {
        $sql = "SELECT idventa,fecha_venta,valor_total,cliente_idcliente,usuario_idusuario from venta";
        $this->objCon->Execute($sql);
    }
}
