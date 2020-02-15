<?php

include "../model/clsVaca.php";
include '../DAO/vacaDAO.php';


    $idVaca = isset($_POST['idVaca']) ? $_POST['idVaca'] : "";
    $peso = isset($_POST['peso']) ? $_POST['peso'] : "";
    $edad = isset($_POST['edad']) ? $_POST['edad'] : "";
    $nombreVaca = isset($_POST['nombreVaca']) ? $_POST['nombreVaca'] : "";
    $crias = isset($_POST['crias']) ? $_POST['crias'] : "";
    $num_ordenada = isset($_POST['num_ordenada']) ? $_POST['num_ordenada'] : "";
    $idFinca = isset($_POST['idFinca']) ? $_POST['idFinca'] : "";
    $type = isset($_POST['type']) ? $_POST['type'] : "";
    //$valor = isset($_POST['valor']) ? $_POST['valor'] : "";

    $vaca = new clsVaca($idVaca, $peso, $edad, $nombreVaca, $crias, $num_ordenada, $idFinca);
    $conex = new vacaDAO();

switch ($type) {
    case "save":
        $conex->guardar($vaca);
        break;
    case "search":
        $conex->buscar($vaca);
        break;
    case "delete":
        $conex->eliminar($vaca);
        break;
    case "update":
        $conex->modificar($vaca);
        break;
    case "list":
        $conex->listar();
        break;
}
?>