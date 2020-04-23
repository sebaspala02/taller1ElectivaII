<?php


include '../DAO/graficosDAO.php';


// $nTabla = isset($_POST['nomTabla']) ? $_POST['nomTabla'] : "";
// $tabla = isset($_POST['tabla']) ? $_POST['tabla'] : "";
$type = isset($_POST['type']) ? $_POST['type'] : "";
//$valor = isset($_POST['valor']) ? $_POST['valor'] : "";
$conex = new graficosDAO();
switch ($type) {
        case 'list':
                $conex->listarG1();
                break;
        case "list1":
                $conex->listarG2();
                break;
}
