<?php

include "../model/clsVenta.php";
include '../DAO/ventaDAO.php';


    $idventa = isset($_REQUEST['idventa']) ? $_REQUEST['idventa'] : "";
    $fecha_venta = isset($_REQUEST['fecha_venta']) ? $_REQUEST['fecha_venta'] : "";
    $valor_total = isset($_REQUEST['valor_total']) ? $_REQUEST['valor_total'] : "";
    $venta_idcliente = isset($_REQUEST['cliente_idcliente']) ? $_REQUEST['cliente_idcliente'] : "";
    $type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";
    //$valor = isset($_POST['valor']) ? $_POST['valor'] : "";

    $venta = new clsVenta($idventa, $fecha_venta, $valor_total, $venta_idcliente, $usuario_idusuario);
    $conex = new ventaDAO();

switch ($type) {
    case "save":
        $conex->guardar($venta);
        break;
    case "search":
        $conex->buscar($venta);
        break;
    case "delete":
        $conex->eliminar($venta);
        break;
    case "update":
        $conex->modificar($venta);
        break;
    case "list":
        $conex->listar();
        break;
}
?>