<?php


include '../DAO/reporteDAO.php';



$tabla = isset($_POST['tabla']) ? $_POST['tabla'] : "";
$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : "";
//$valor = isset($_POST['valor']) ? $_POST['valor'] : "";
$conex = new reporteDAO();
// switch ($type) {
// case "reporte":
$conex->crearReporte($tabla);
        // break;
// }
