<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fincas</title>
    <link rel="stylesheet" href="resource/styles/bootstrap.min.css">

    <script type="text/javascript" src="resource/jquery/jquery.js"></script>
    <script type="text/javascript" src="resource/js/cargarList.js"></script>
    <script type="text/javascript" src="resource/js/gestionFinca.js"></script>
    <script type="text/javascript" src="resource/js/gestionLogin.js"></script>
    <script type="text/javascript" src="resource/js/gestionMuni.js"></script>
    <script type="text/javascript" src="resource/js/gestionVaca.js"></script>
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