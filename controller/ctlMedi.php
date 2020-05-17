<?php

include "../model/clsMedi.php";
include '../DAO/mediDAO.php';


$idmedicamento = isset($_REQUEST['idmedicamento']) ? $_REQUEST['idmedicamento'] : "";
$nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : "";
$descrip = isset($_REQUEST['descrip']) ? $_REQUEST['descrip'] : "";
$fecha_venc = isset($_REQUEST['fecha_venc']) ? $_REQUEST['fecha_venc'] : "";
$cant = isset($_REQUEST['cant']) ? $_REQUEST['cant'] : "";
$fecha_creado = isset($_REQUEST['fecha_creado']) ? $_REQUEST['fecha_creado'] : "";
$precio = isset($_REQUEST['precio']) ? $_REQUEST['precio'] : "";
$idusuario = isset($_REQUEST['idusuario']) ? $_REQUEST['idusuario'] : "";
$idlaboratorio = isset($_REQUEST['idlaboratorio']) ? $_REQUEST['idlaboratorio'] : "";
$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";
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
