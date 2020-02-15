<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="resource/js/gestionLogin.js"></script>
    <title>Document</title>
</head>

<body>
    <form name ="formularioLogin" method="post" action="controller/gestionLogin.php">
        <table border ="0">
            <tr>
                <td>
                    <label for="">Usuario</label>
                </td>
                <td>
                    <input type="text" name="usuario" id="usuario">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="">Password</label>
                </td>
                <td>
                    <input type="password" name="password" id="txtPassword">
                </td>
            </tr>

            <tr>
                <td>
                    <input type="text" name="type" style="display:none;">
                </td>
                <td>
                    <input type="button" value="Login" id="btnLogin"
                    onclick="validarLogin(formularioLogin,'con')">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>