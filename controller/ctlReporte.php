<?php


include '../DAO/reporteDAO.php';


$nTabla = isset($_POST['nomTabla']) ? $_POST['nomTabla'] : "";
$tabla = isset($_POST['tabla']) ? $_POST['tabla'] : "";

//$valor = isset($_POST['valor']) ? $_POST['valor'] : "";
$conex = new reporteDAO();
// switch ($type) {
// case "reporte":
$conex->crearReporte($tabla,$nTabla);
        // break;
// }
