<?php

require '../infrastructure/CORS.php';
include "../model/clsUsuario.php";
include '../DAO/usuarioDAO.php';


$idusuario = isset($_REQUEST['idusuario']) ? $_REQUEST['idusuario'] : "";
$cedula = isset($_REQUEST['cedula']) ? $_REQUEST['cedula'] : "";
$nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : "";
$apellido = isset($_REQUEST['apellido']) ? $_REQUEST['apellido'] : "";
$correo = isset($_REQUEST['correo']) ? $_REQUEST['correo'] : "";
$tipoUsuario_idTipoUsuario = isset($_REQUEST['tipoUsuario_idTipoUsuario']) ? $_REQUEST['tipoUsuario_idTipoUsuario'] : "";
$usuario = isset($_REQUEST['usuario']) ? $_REQUEST['usuario'] : "";
$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : "";
$puntos = isset($_REQUEST['puntos']) ? $_REQUEST['puntos'] : "";
$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";
//$valor = isset($_POST['valor']) ? $_POST['valor'] : "";

$usuario = new clsUsuario($idusuario, $cedula, $nombre, $apellido, $correo, $tipoUsuario_idTipoUsuario, $usuario, $password, $puntos);
$conex = new usuarioDAO();

switch ($type) {
    case "save":
        $conex->guardar($usuario);
        break;
    case "search":
        $conex->buscar($usuario);
        break;
    case "searchCliente":
        $conex->buscarCliente($usuario);
        break;
    case "delete":
        $conex->eliminar($usuario);
        break;
    case "update":
        $conex->modificar($usuario);
        break;
    case "list":
        $conex->listar();
        break;
    case "listCliente":
        $conex->listarCliente();
        break;
}
