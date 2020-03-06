<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INICIO</title>
    <link rel="stylesheet" href="resource/styles/bootstrap.min.css">
    <link href="resource/styles/jquery.dataTables.css" rel="stylesheet">
    <link href="resource/styles/creative.min.css" rel="stylesheet">
    <script type="text/javascript" src="resource/jquery/jquery.js"></script>
    <script type="text/javascript" src="resource/js/cargarList.js"></script>
    <script type="text/javascript" src="resource/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="resource/js/gestionUsuario.js"></script>
    <script type="text/javascript" src="resource/js/gestionLogin.js"></script>
    <!-- <script type="text/javascript" src="resource/js/gestionMuni.js"></script> -->
    <script type="text/javascript" src="resource/js/gestionMedi.js"></script>
    <script type="text/javascript" src="resource/js/gestionCliente.js"></script>
    <!-- ICONOS -->
    <!-- Place your kit's code here -->
    <script src="https://kit.fontawesome.com/77cb279007.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php

    session_start();
    if (isset($_REQUEST['msjlogin'])) {
        echo $_REQUEST['msjlogin'];
    }
    if (isset($_SESSION['user'])) {
        include("masterpage.php");
    } else {
        include("views/login.php");
    }
    ?>

</body>

</html>