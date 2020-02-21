<?php

include "../model/clsCliente.php";
include '../DAO/clienteDAO.php';


    $idcliente = isset($_POST['idcliente']) ? $_POST['idcliente'] : "";
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
    $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : "";
    $cedula = isset($_POST['cedula']) ? $_POST['cedula'] : "";
    $genero = isset($_POST['genero']) ? $_POST['genero'] : "";
    $fecha_naci = isset($_POST['fecha_naci']) ? $_POST['fecha_naci'] : "";
    $type = isset($_POST['type']) ? $_POST['type'] : "";
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