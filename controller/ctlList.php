<?php

include '../DAO/listDAO.php';

$type = isset($_POST['type']) ? $_POST['type'] : "";
$depto = isset($_POST['depto']) ? $_POST['depto'] : "";

$conex = new listDAO();

switch ($type) {
    case "loadListDepto":
        $conex->listDeptos();
        break;
    case "loadListMuni":
        $conex->listMuni($depto);
        break;
    case "loadListFinca":
        $conex->listFinca();
        break;
}
