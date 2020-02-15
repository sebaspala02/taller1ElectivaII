<?php

include "../model/clsFinca.php";
include '../DAO/fincaDAO.php';


    $idFinca = isset($_POST['idFinca']) ? $_POST['idFinca'] : "";
    $nombreFinca = isset($_POST['nombreFinca']) ? $_POST['nombreFinca'] : "";
    $tamanio = isset($_POST['tamanio']) ? $_POST['tamanio'] : "";
    $idMunicipio = isset($_POST['idMunicipio']) ? $_POST['idMunicipio'] : "";
    $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : "";
    $piscina = isset($_POST['piscina']) ? $_POST['piscina'] : "";
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
    $type = isset($_POST['type']) ? $_POST['type'] : "";
    //$valor = isset($_POST['valor']) ? $_POST['valor'] : "";

    $finca = new clsFinca($idFinca, $nombreFinca, $tamanio, $idMunicipio, $cantidad, $piscina, $descripcion);
    $conex = new fincaDAO();

switch ($type) {
    case "save":
        $conex->guardar($finca);
        break;
    case "search":
        $conex->buscar($finca);
        break;
    case "delete":
        $conex->eliminar($finca);
        break;
    case "update":
        $conex->modificar($finca);
        break;
    case "list":
        $conex->listar();
        break;
}
?>