<?php
require '../infrastructure/CORS.php';
include "../model/clsMedi.php";
include '../DAO/mediDAO.php';
require '../util/Helper.php';
require '../util/Security.php';

$idmedicamento = isset($_REQUEST['idmedicamento']) ? $_REQUEST['idmedicamento'] : "";
$nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : "";
$descrip = isset($_REQUEST['descrip']) ? $_REQUEST['descrip'] : "";
$fecha_venc = isset($_REQUEST['fecha_venc']) ? $_REQUEST['fecha_venc'] : "";
$cant = isset($_REQUEST['cant']) ? $_REQUEST['cant'] : "";
$fecha_creado = isset($_REQUEST['fecha_creado']) ? $_REQUEST['fecha_creado'] : "";
$precio = isset($_REQUEST['precio']) ? $_REQUEST['precio'] : "";
$idusuario = isset($_REQUEST['usuario_idusuario']) ? $_REQUEST['usuario_idusuario'] : "";
$idlaboratorio = isset($_REQUEST['laboratorio_idlaboratorio']) ? $_REQUEST['laboratorio_idlaboratorio'] : "";
$proveedor_idproveedor = isset($_REQUEST['proveedor_id']) ? $_REQUEST['proveedor_id'] : "";
$estante_idestante = isset($_REQUEST['estante_idestante']) ? $_REQUEST['estante_idestante'] : "";
$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";
//$valor = isset($_POST['valor']) ? $_POST['valor'] : "";
$medi = new clsMedi($idmedicamento, $nombre, $descrip, $fecha_venc, $cant, $fecha_creado, $precio, $idusuario, $idlaboratorio, $proveedor_idproveedor, $estante_idestante);
$conex = new mediDAO();

$token = getInfo('token');
$security = new Security();

switch ($type) {
    case "save":
        if ($security->validarTokenUser($token)) {
            $conex->guardar($medi);
        }
        break;
    case "search":
        if ($security->validarTokenUser($token)) {
            $conex->buscar($medi);
        }
        break;
    case "delete":
        if ($security->validarTokenUser($token)) {
            $conex->eliminar($medi);
        }
        break;
    case "update":
        if ($security->validarTokenUser($token)) {
            $conex->modificar($medi);
        }
        break;
    case "list":
        $conex->listar();
        break;
}
