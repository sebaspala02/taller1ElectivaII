<?php

include "../model/clsDetalle.php";
include '../DAO/ventaDAO.php';


$iddetalle_venta = isset($_POST['iddetalle_venta']) ? $_POST['iddetalle_venta'] : "";
$total = isset($_POST['total']) ? $_POST['total'] : "";
$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : "";
$medi = isset($_POST['medi']) ? $_POST['medi'] : "";
$cant = isset($_POST['cant']) ? $_POST['cant'] : "";
$cliente = isset($_POST['cliente']) ? $_POST['cliente'] : "";
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
$idventa = isset($_POST['idventa']) ? $_POST['idventa'] : "";
$type = isset($_POST['type']) ? $_POST['type'] : "";
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
