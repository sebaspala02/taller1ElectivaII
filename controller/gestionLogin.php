<?php
require '../infrastructure/CORS.php';
include '../model/clsLogin.php';
include '../DAO/loginDAO.php';
require '../util/Helper.php';
require '../util/Security.php';

isset($_REQUEST['type']) ? $accion = $_REQUEST['type'] : $accion = "";
isset($_REQUEST['usuario']) ? $usuario = $_REQUEST['usuario'] : $usuario = "";
isset($_REQUEST['password']) ? $password = $_REQUEST['password'] : $password = "";

session_start();

$login = new clsLogin($usuario, $password);
$conex = new loginDAO();

$token = getInfo('token');
$security = new Security();

switch ($accion) {
    case "con":
        $conex->logear($login);
        break;

    case "desc";
        session_destroy();
        $mensaje = "sesion cerrada";
        header('location:../index.php?msjlogin=' . $mensaje);
        break;

    case "conNotRedirect":
        if ($security->validarTokenUser($token)) {
            $conex->logInNotRedirect($login);
        }
        break;
}
