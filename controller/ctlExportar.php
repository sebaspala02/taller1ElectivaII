<?php


include '../DAO/gestionCSV.php';


$nTabla = isset($_REQUEST['nomTabla']) ? $_REQUEST['nomTabla'] : "";
$tabla = isset($_REQUEST['tabla']) ? $_REQUEST['tabla'] : "";

$coma = isset($_REQUEST['coma']) ? $_REQUEST['coma'] : "";
// $punto = isset($_POST['punto']) ? $_POST['punto'] : "";
//$valor = isset($_POST['valor']) ? $_POST['valor'] : "";
$conex = new gestionCSV();
// switch ($type) {
// case "reporte":
$conex->exportarCSV($tabla,$nTabla,$coma);
        // break;
// }
