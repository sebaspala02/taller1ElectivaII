<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="resource/js/gestionLogin.js"></script>
    <!-- css -->
    <link href="resource/styles/creative.min.css" rel="stylesheet">

    <link rel="stylesheet" href="resource/styles/bootstrap.min.css">
    <!-- ICONOS -->
    <!-- Place your kit's code here -->
    <script src="https://kit.fontawesome.com/77cb279007.js" crossorigin="anonymous"></script>

    <title>LogIn</title>
</head>

<body>
    <div class="container">
        <br><br><br>
        <div class="card border-primary p-3" style="margin-left: 265px; margin-right: 620px;">
            <form name="formularioLogin" method="post" action="controller/gestionLogin.php">
                <table class="card-body text-primary">
                    <tr>
                        <td>
                            <label for=""><b>Usuario:</b></label>
                        </td>
                    </tr>
                    <br>
                    <tr>
                        <td>
                            <input class="form-control" type="text" name="usuario" id="usuario">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for=""><b>Password:</b></label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="form-control" type="password" name="password" id="txtPassword">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fas fa-sign-in-alt"></i>
                            <input class="btn btn-primary" type="button" value="Login" id="btnLogin" onclick="validarLogin(formularioLogin,'con')">
                        </td>
                        <td>
                            <input type="text" name="type" style="display:none;">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>