<?php

require '../infrastructure/CORS.php';
include "../model/clsEstante.php";
include '../DAO/estanteDAO.php';


    $idestante = isset($_REQUEST['idestante']) ? $_REQUEST['idestante'] : "";
    $codigo = isset($_REQUEST['codigo']) ? $_REQUEST['codigo'] : "";
    $categoria = isset($_REQUEST['categoria']) ? $_REQUEST['categoria'] : "";
    $descripcion = isset($_REQUEST['descripcion']) ? $_REQUEST['descripcion'] : "";
    $type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";
    //$valor = isset($_POST['valor']) ? $_POST['valor'] : "";

    $estante = new clsEstante($idestante, $codigo, $categoria,$descripcion);
    $conex = new estanteDAO();

switch ($type) {
    case "save":
        $conex->guardar($estante);
        break;
    case "search":
        $conex->buscar($estante);
        break;
    case "delete":
        $conex->eliminar($estante);
        break;
    case "update":
        $conex->modificar($estante);
        break;
    case "list":
        $conex->listar();
        break;
}
