<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="resource/js/gestionLogin.js"></script>
    <!-- css -->
    <link href="resource/styles/creative.min.css" rel="stylesheet">

    <link rel="stylesheet" href="resource/styles/bootstrap.min.css">

    <title>LogIn</title>
</head>

<body>
    <div class="card">
        <div class="card-body">
            <form name="formularioLogin" method="post" action="controller/gestionLogin.php">
                <table border="0">
                    <tr>
                        <td>
                            <label for=""><b>Usuario:</b></label>
                        </td>
                        <td>
                            <input class="form-control" type="text" name="usuario" id="usuario">
                        </td>
                    </tr>
                    <br>
                    <tr>
                        <td>
                            <label for=""><b>Password:</b></label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td>
                            <input class="form-control" type="password" name="password" id="txtPassword">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="text" name="type" style="display:none;">
                        </td>
                        <td>
                            <input class="btn btn-primary" type="button" value="Login" id="btnLogin" onclick="validarLogin(formularioLogin,'con')">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>