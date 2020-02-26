<?php

include "../model/clsVenta.php";
include '../DAO/ventaDAO.php';


    $idventa = isset($_POST['idventa']) ? $_POST['idventa'] : "";
    $fecha_venta = isset($_POST['fecha_venta']) ? $_POST['fecha_venta'] : "";
    $valor_total = isset($_POST['valor_total']) ? $_POST['valor_total'] : "";
    $venta_idcliente = isset($_POST['cliente_idcliente']) ? $_POST['cliente_idcliente'] : "";
    $type = isset($_POST['type']) ? $_POST['type'] : "";
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