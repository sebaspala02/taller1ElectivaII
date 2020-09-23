<?php
require '../infrastructure/CORS.php';
include "../model/clsLaboratorio.php";
include '../DAO/laboratorioDAO.php';
require '../util/Helper.php';
require '../util/Security.php';

$idlaboratorio = isset($_REQUEST['idlaboratorio']) ? $_REQUEST['idlaboratorio'] : "";
$nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : "";
$descrip = isset($_REQUEST['descrip']) ? $_REQUEST['descrip'] : "";
$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";
//$valor = isset($_POST['valor']) ? $_POST['valor'] : "";

$laboratorio = new clsLaboratorio($idlaboratorio, $nombre, $descrip);
$conex = new laboratorioDAO();

$token = getInfo('token');
$security = new Security();

switch ($type) {
    case "save":
        if ($security->validarTokenUser($token)) {
            $conex->guardar($laboratorio);
        }
        break;
    case "search":
        if ($security->validarTokenUser($token)) {
            $conex->buscar($laboratorio);
        }
        break;
    case "delete":
        if ($security->validarTokenUser($token)) {
            $conex->eliminar($laboratorio);
        }
        break;
    case "update":
        if ($security->validarTokenUser($token)) {
            $conex->modificar($laboratorio);
        }
        break;
    case "list":
        $conex->listar();
        break;
}
