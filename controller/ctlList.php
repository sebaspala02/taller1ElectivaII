<?php

include '../DAO/listDAO.php';

$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";
$usuario = isset($_REQUEST['usuario']) ? $_REQUEST['usuario'] : "";

$conex = new listDAO();

switch ($type) {
    case "loadListUsuarios":
        $conex->listUsuarios();
        break;
    case "loadListLabs":
        $conex->listLabs();
        break;
    case "loadListClientes":
        $conex->listClientes();
        break;
    case "loadListTipoUsuarios":
        $conex->listTipoUsuarios();
        break;
        // case "loadListFinca":
        //     $conex->listFinca();
        //     break;
}
