<?php
session_start();
class ventaDAO
{
    private $con;
    private $objCon;

    function __construct()
    {
        // require '../infrastructure/clsConexion.php';
        // $this->objCon = new clsConexion();
        // $this->con = $this->objCon->conectar();
        require '../DAO/DAO.php';
        // $this->objCon = new clsConexion();
        // $this->con = $this->objCon->conectar();
        $this->dao = new clsDAO();
    }

    public function guardar(clsDetalle $obj)
    {
        $user = $_SESSION['user'];
        $this->dao->crearConsulta("guardarVenta", array(
            $obj->getTotal(),
            $obj->getMedi(), $obj->getCant(), $obj->getCliente(), $user
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

    // public function listar()
    // {
    //     $this->dao->listar();
    // }
    public function listarVenta()
    {
        $this->dao->crearConsulta("listarVenta", array(0), "procedimiento");
        // $sql = "SELECT d.iddetalle_venta,d.cant,d.medicamento_idmedicamento,d.venta_idventa,m.nombre 
        // from medicamento m join detalle_venta d on m.idmedicamento = d.medicamento_idmedicamento where d.venta_idventa= " . $valor;
        // $this->objCon->Execute($sql);
    }
    // public function listarDetalle($id)
    // {
    //     $this->dao->listarDetalle($id);

    // }

    public function listarDetalle($valor)
    {
        $this->dao->crearConsulta("listarDetalleV", array($valor), "procedimiento");
        // $sql = "SELECT d.iddetalle_venta,d.cant,d.medicamento_idmedicamento,d.venta_idventa,m.nombre 
        // from medicamento m join detalle_venta d on m.idmedicamento = d.medicamento_idmedicamento where d.venta_idventa= " . $valor;
        // $this->objCon->Execute($sql);
    }
}
