<?php

include '../DAO/listDAO.php';

$type = isset($_POST['type']) ? $_POST['type'] : "";
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";

$conex = new listDAO();

switch ($type) {
    case "loadListUsuarios":
        $conex->listUsuarios();
        break;
    case "loadListLabs":
        $conex->listLabs();
        break;
    // case "loadListFinca":
    //     $conex->listFinca();
    //     break;
}
