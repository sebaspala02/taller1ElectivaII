<?php
require '../infrastructure/CORS.php';
include "../model/clsEstante.php";
include '../DAO/estanteDAO.php';
require '../util/Helper.php';
require '../util/Security.php';

$idestante = isset($_REQUEST['idestante']) ? $_REQUEST['idestante'] : "";
$codigo = isset($_REQUEST['codigo']) ? $_REQUEST['codigo'] : "";
$categoria = isset($_REQUEST['categoria']) ? $_REQUEST['categoria'] : "";
$descripcion = isset($_REQUEST['descripcion']) ? $_REQUEST['descripcion'] : "";
$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";
//$valor = isset($_POST['valor']) ? $_POST['valor'] : "";

$estante = new clsEstante($idestante, $codigo, $categoria, $descripcion);
$conex = new estanteDAO();

$token = getInfo('token');
$security = new Security();

switch ($type) {
    case "save":
        if ($security->validarTokenUser($token)) {
            $conex->guardar($estante);
        }
        break;
    case "search":
        if ($security->validarTokenUser($token)) {
            $conex->buscar($estante);
        }
        break;
    case "delete":
        if ($security->validarTokenUser($token)) {
            $conex->eliminar($estante);
        }
        break;
    case "update":
        if ($security->validarTokenUser($token)) {
            $conex->modificar($estante);
        }
        break;
    case "list":
        $conex->listar();
        break;
}
