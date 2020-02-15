<?php

include "../model/clsMuni.php";
include '../DAO/muniDAO.php';


    $idMunicipio = isset($_POST['idMunicipio']) ? $_POST['idMunicipio'] : "";
    $nombreMpio = isset($_POST['nombreMpio']) ? $_POST['nombreMpio'] : "";
    $Departamento_idDepartamento = isset($_POST['Departamento_idDepartamento']) ? $_POST['Departamento_idDepartamento'] : "";
    $type = isset($_POST['type']) ? $_POST['type'] : "";
    //$valor = isset($_POST['valor']) ? $_POST['valor'] : "";

    $muni = new clsMuni($idMunicipio, $nombreMpio, $Departamento_idDepartamento);
    $conex = new muniDAO();

switch ($type) {
    case "save":
        $conex->guardar($muni);
        break;
    case "search":
        $conex->buscar($muni);
        break;
    case "delete":
        $conex->eliminar($muni);
        break;
    case "update":
        $conex->modificar($muni);
        break;
    case "list":
        $conex->listar();
        break;
}
?>