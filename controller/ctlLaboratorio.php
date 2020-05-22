<?php

require '../infrastructure/CORS.php';
include "../model/clsLaboratorio.php";
include '../DAO/laboratorioDAO.php';


    $idlaboratorio = isset($_REQUEST['idlaboratorio']) ? $_REQUEST['idlaboratorio'] : "";
    $nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : "";
    $descrip = isset($_REQUEST['descrip']) ? $_REQUEST['descrip'] : "";
    $type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";
    //$valor = isset($_POST['valor']) ? $_POST['valor'] : "";

    $laboratorio = new clsLaboratorio($idlaboratorio, $nombre, $descrip);
    $conex = new laboratorioDAO();

switch ($type) {
    case "save":
        $conex->guardar($laboratorio);
        break;
    case "search":
        $conex->buscar($laboratorio);
        break;
    case "delete":
        $conex->eliminar($laboratorio);
        break;
    case "update":
        $conex->modificar($laboratorio);
        break;
    case "list":
        $conex->listar();
        break;
}
