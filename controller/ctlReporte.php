<?php


include '../DAO/reporteDAO.php';


$nTabla = isset($_REQUEST['nomTabla']) ? $_REQUEST['nomTabla'] : "";
$tabla = isset($_REQUEST['tabla']) ? $_REQUEST['tabla'] : "";

//$valor = isset($_POST['valor']) ? $_POST['valor'] : "";
$conex = new reporteDAO();
// switch ($type) {
// case "reporte":
$conex->crearReporte($tabla,$nTabla);
        // break;
// }
