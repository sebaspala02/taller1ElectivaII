<?php

include "../model/clsCliente.php";
include '../DAO/clienteDAO.php';


    $idcliente = isset($_REQUEST['idcliente']) ? $_REQUEST['idcliente'] : "";
    $nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : "";
    $apellido = isset($_REQUEST['apellido']) ? $_REQUEST['apellido'] : "";
    $cedula = isset($_REQUEST['cedula']) ? $_REQUEST['cedula'] : "";
    $genero = isset($_REQUEST['genero']) ? $_REQUEST['genero'] : "";
    $fecha_naci = isset($_REQUEST['fecha_naci']) ? $_REQUEST['fecha_naci'] : "";
    $type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";
    //$valor = isset($_POST['valor']) ? $_POST['valor'] : "";

    $cliente = new clsCliente($idcliente, $nombre, $apellido, $cedula, $genero, $fecha_naci );
    $conex = new clienteDAO();

switch ($type) {
    case "save":
        $conex->guardar($cliente);
        break;
    case "search":
        $conex->buscar($cliente);
        break;
    case "delete":
        $conex->eliminar($cliente);
        break;
    case "update":
        $conex->modificar($cliente);
        break;
    case "list":
        $conex->listar();
        break;
}
?>