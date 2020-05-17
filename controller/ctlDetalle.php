<?php

include "../model/clsDetalle.php";
include '../DAO/ventaDAO.php';


$iddetalle_venta = isset($_REQUEST['iddetalle_venta']) ? $_REQUEST['iddetalle_venta'] : "";
$total = isset($_REQUEST['total']) ? $_REQUEST['total'] : "";
$fecha = isset($_REQUEST['fecha']) ? $_REQUEST['fecha'] : "";
$medi = isset($_REQUEST['medi']) ? $_REQUEST['medi'] : "";
$cant = isset($_REQUEST['cant']) ? $_REQUEST['cant'] : "";
$cliente = isset($_REQUEST['cliente']) ? $_REQUEST['cliente'] : "";
$usuario = isset($_REQUEST['usuario']) ? $_REQUEST['usuario'] : "";
$idventa = isset($_REQUEST['idventa']) ? $_REQUEST['idventa'] : "";
$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";
//$valor = isset($_POST['valor']) ? $_POST['valor'] : "";

$detalle = new clsDetalle($iddetalle_venta, $total, $fecha, $medi, $cant, $cliente, $usuario, $idventa);
$conex = new ventaDAO();
switch ($type) {
    case "save":
        $conex->guardar($detalle);
        break;
    case "search":
        $conex->buscar($detalle);
        break;
    case "delete":
        $conex->eliminar($detalle);
        break;
    case "update":
        $conex->modificar($detalle);
        break;
    case "list":
        $conex->listarVenta();
        break;
    case "listD":
        $conex->listarDetalle($idventa);
        break;
}
