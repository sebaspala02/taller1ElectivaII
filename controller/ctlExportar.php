<?php


include '../DAO/gestionCSV.php';


$nTabla = isset($_POST['nomTabla']) ? $_POST['nomTabla'] : "";
$tabla = isset($_POST['tabla']) ? $_POST['tabla'] : "";

$coma = isset($_POST['coma']) ? $_POST['coma'] : "";
// $punto = isset($_POST['punto']) ? $_POST['punto'] : "";
//$valor = isset($_POST['valor']) ? $_POST['valor'] : "";
$conex = new gestionCSV();
// switch ($type) {
// case "reporte":
$conex->exportarCSV($tabla,$nTabla,$coma);
        // break;
// }
