<?php


include '../DAO/graficosDAO.php';


// $nTabla = isset($_POST['nomTabla']) ? $_POST['nomTabla'] : "";
// $tabla = isset($_POST['tabla']) ? $_POST['tabla'] : "";
$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";
//$valor = isset($_POST['valor']) ? $_POST['valor'] : "";
$conex = new graficosDAO();
switch ($type) {
        case 'list':
                $conex->listarG1();
                break;
        case "list1":
                $conex->listarG2();
                break;
        case "list2":
                $conex->listarG3();
                break;
        case "list3":
                $conex->listarG4();
                break;
        case "list4":
                $conex->listarG5();
                break;
        case "list5":
                $conex->listarG6();
                break;
}
