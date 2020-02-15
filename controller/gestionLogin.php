<?php

include '../model/clsLogin.php';
include '../DAO/loginDAO.php';

isset($_REQUEST['type']) ? $accion = $_REQUEST['type'] : $accion = "";
isset($_REQUEST['usuario']) ? $usuario = $_REQUEST['usuario'] : $usuario = "";
isset($_REQUEST['password']) ? $password = $_REQUEST['password'] : $password = "";

session_start();

$login = new clsLogin($usuario, $password);
$conex = new loginDAO();

switch ($accion) {
    case "con":
        $conex->logear($login);
        break;

    case "desc";
        session_destroy();
        $mensaje = "sesion cerrada";
        header('location:../index.php?msjlogin=' . $mensaje);
        break;

    }
