<?php


include '../DAO/gestionCSV.php';


$nTabla = isset($_POST['nomTabla']) ? $_POST['nomTabla'] : "";
$tabla = isset($_POST['tabla']) ? $_POST['tabla'] : "";

//$valor = isset($_POST['valor']) ? $_POST['valor'] : "";
$conex = new gestionCSV();
// switch ($type) {
// case "reporte":
$conex->exportarCSV($tabla,$nTabla);
        // break;
// }
