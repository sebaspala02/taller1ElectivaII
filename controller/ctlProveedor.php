<?php
require '../infrastructure/CORS.php';
include "../model/clsProveedor.php";
include '../DAO/proveedorDAO.php';
require '../util/Helper.php';
require '../util/Security.php';

$idproveedor = isset($_REQUEST['idproveedor']) ? $_REQUEST['idproveedor'] : "";
$nit = isset($_REQUEST['nit']) ? $_REQUEST['nit'] : "";
$nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : "";
$ciudad = isset($_REQUEST['ciudad']) ? $_REQUEST['ciudad'] : "";
$direccion = isset($_REQUEST['direccion']) ? $_REQUEST['direccion'] : "";
$telefono = isset($_REQUEST['telefono']) ? $_REQUEST['telefono'] : "";
$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";
//$valor = isset($_POST['valor']) ? $_POST['valor'] : "";

$proveedor = new clsProveedor($idproveedor, $nit, $nombre, $ciudad, $direccion, $telefono);
$conex = new proveedorDAO();

$token = getInfo('token');
$security = new Security();

switch ($type) {
    case "save":
        if ($security->validarTokenUser($token)) {
            $conex->guardar($proveedor);
        }
        break;
    case "search":
        if ($security->validarTokenUser($token)) {
            $conex->buscar($proveedor);
        }
        break;
    case "delete":
        if ($security->validarTokenUser($token)) {
            $conex->eliminar($proveedor);
        }
        break;
    case "update":
        if ($security->validarTokenUser($token)) {
            $conex->modificar($proveedor);
        }
        break;
    case "list":
        $conex->listar();
        break;
}
