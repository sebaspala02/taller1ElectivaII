<?php

include "../model/clsDepto.php";
include '../DAO/deptoDAO.php';


    $idDepartamento = isset($_POST['idDepartamento']) ? $_POST['idDepartamento'] : "";
    $nombreDepto = isset($_POST['nombreDepto']) ? $_POST['nombreDepto'] : "";
    $type = isset($_POST['type']) ? $_POST['type'] : "";
    //$valor = isset($_POST['valor']) ? $_POST['valor'] : "";

    $depto = new clsDepto($idDepartamento, $nombreDepto);
    $conex = new deptoDAO();

switch ($type) {
    case "save":
        $conex->guardar($depto);
        break;
    case "search":
        $conex->buscar($depto);
        break;
    case "delete":
        $conex->eliminar($depto);
        break;
    case "update":
        $conex->modificar($depto);
        break;
    case "list":
        $conex->listar();
        break;
}
?>