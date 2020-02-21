<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROYECTO FINAL</title>

    <!-- Theme CSS - Includes Bootstrap -->
    <link href="resource/styles/creative.min.css" rel="stylesheet">

    <link rel="stylesheet" href="resource/styles/bootstrap.min.css">
    <link href="resource/styles/jquery.dataTables.css" rel="stylesheet">
    <script type="text/javascript" src="resource/jquery/jquery.js"></script>
    <!-- <script type="text/javascript" src="resource/js/cargarList.js"></script> -->
    <script type="text/javascript" src="resource/js/gestionUsuario.js"></script>
    <script type="text/javascript" src="resource/js/gestionMedi.js"></script>
    <script type="text/javascript" src="resource/js/gestionCliente.js"></script>
    <script type="text/javascript" src="resource/js/jquery.dataTables.js"></script>
    <!-- <script type="text/javascript" src="resource/js/gestionDepto.js"></script>
    <script type="text/javascript" src="resource/js/gestionMuni.js"></script> -->
</head>

<body>

    <?php

    include('vista/navbar.php');
    ?>

    <?php
    if (isset($_GET['page'])) {
        include("vista/" . $_GET['page'] . ".php");
    } else {
        include("vista/home.php");
    }

    ?>

</body>

</html>