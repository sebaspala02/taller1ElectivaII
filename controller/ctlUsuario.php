<?php

include "../model/clsUsuario.php";
include '../DAO/usuarioDAO.php';


    $idusuario = isset($_POST['idusuario']) ? $_POST['idusuario'] : "";
    $cedula = isset($_POST['cedula']) ? $_POST['cedula'] : "";
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
    $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : "";
    $correo = isset($_POST['correo']) ? $_POST['correo'] : "";
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    $type = isset($_POST['type']) ? $_POST['type'] : "";
    //$valor = isset($_POST['valor']) ? $_POST['valor'] : "";

    $usuario = new clsUsuario($idusuario, $cedula, $nombre, $apellido, $correo, $usuario, $password);
    $conex = new usuarioDAO();

switch ($type) {
    case "save":
        $conex->guardar($usuario);
        break;
    case "search":
        $conex->buscar($usuario);
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
}
?>