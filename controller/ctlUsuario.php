<?php

include "../model/clsUsuario.php";
include '../DAO/usuarioDAO.php';


    $idUsuario = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : "";
    $nombreUsuario = isset($_POST['nombreUsuario']) ? $_POST['nombreUsuario'] : "";
    $apellidoUsuario = isset($_POST['apellidoUsuario']) ? $_POST['apellidoUsuario'] : "";
    $correo = isset($_POST['correo']) ? $_POST['correo'] : "";
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
    $password = isset($_POST['piscina']) ? $_POST['piscina'] : "";
    $type = isset($_POST['type']) ? $_POST['type'] : "";
    //$valor = isset($_POST['valor']) ? $_POST['valor'] : "";

    $usuario = new clsUsuario($idUsuario, $nombreUsuario, $apellidoUsuario, $correo, $usuario, $password);
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