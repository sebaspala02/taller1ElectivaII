<?php

include "../model/clsMedi.php";
include '../DAO/mediDAO.php';


$idmedicamento = isset($_POST['idmedicamento']) ? $_POST['idmedicamento'] : "";
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
$descrip = isset($_POST['descrip']) ? $_POST['descrip'] : "";
$fecha_venc = isset($_POST['fecha_venc']) ? $_POST['fecha_venc'] : "";
$cant = isset($_POST['cant']) ? $_POST['cant'] : "";
$fecha_creado = isset($_POST['fecha_creado']) ? $_POST['fecha_creado'] : "";
$precio = isset($_POST['precio']) ? $_POST['precio'] : "";
$idusuario = isset($_POST['idusuario']) ? $_POST['idusuario'] : "";
$idlaboratorio = isset($_POST['idlaboratorio']) ? $_POST['idlaboratorio'] : "";
$type = isset($_POST['type']) ? $_POST['type'] : "";
//$valor = isset($_POST['valor']) ? $_POST['valor'] : "";
$medi = new clsMedi($idmedicamento, $nombre, $descrip, $fecha_venc, $cant, $fecha_creado, $precio, $idusuario, $idlaboratorio);
$conex = new mediDAO();

switch ($type) {
    case "save":
        $conex->guardar($medi);
        break;
    case "search":
        $conex->buscar($medi);
        break;
    case "delete":
        $conex->eliminar($medi);
        break;
    case "update":
        $conex->modificar($medi);
        break;
    case "list":
        $conex->listar();
        break;
}
