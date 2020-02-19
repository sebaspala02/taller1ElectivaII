<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Usuario</title>

    <!-- Theme CSS - Includes Bootstrap -->
    <link href="../resource/styles/creative.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../resource/styles/bootstrap.min.css">

    <script type="text/javascript" src="../resource/jquery/jquery.js"></script>
    <script type="text/javascript" src="../resource/js/cargarList.js"></script>
    <script type="text/javascript" src="../resource/js/gestionFinca.js"></script>
</head>

<body>
    <br><br><br><br><br>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <table>
                        <tr>
                            <td>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h1>Gestionar Usuario</h1>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Cedula:</label>
                            </td>
                            <td colspan="2">
                                <input type="text" id="txtIdUsuario" style="display: none" value="">
                                <input class="form-control" type="number" placeholder="C.C" id="txtCedula" required>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Nombre:</label>
                            </td>
                            <td colspan="2">
                                <!-- <input type="text" id="txtIdUsuario" style="display: none" value=""> -->
                                <input class="form-control" type="text" placeholder="Nombre" id="txtNombre" required>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Apellido:</label>
                            </td>
                            <td colspan="2">
                                <!-- <input type="text" id="txtIdUsuario" style="display: none" value=""> -->
                                <input class="form-control" type="text" placeholder="Apellido" id="txtApellido" required>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Correo:</label>
                            </td>
                            <td colspan="2">
                                <!-- <input type="text" id="txtIdUsuario" style="display: none" value=""> -->
                                <input class="form-control" type="text" placeholder="Correo" id="txtCorreo" required>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Usuario:</label>
                            </td>
                            <td colspan="2">
                                <!-- <input type="text" id="txtIdUsuario" style="display: none" value=""> -->
                                <input class="form-control" type="text" placeholder="Usuario" id="txtUsuario" required>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Password:</label>
                            </td>
                            <td colspan="2">
                                <!-- <input type="text" id="txtIdUsuario" style="display: none" value=""> -->
                                <input class="form-control" type="password" placeholder="Calve" id="txtPassword" required>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                                <input class="btn btn-success" type="button" value="Guardar" id="btnGuardar">
                                <input class="btn btn-outline-dark" type="button" value="Limpiar" id="btnLimpiar">
                                <!-- <input type="button" value="Buscar" id="btnBuscar"> -->
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                                <input class="btn btn-warning" type="button" value="Modificar" id="btnModificar">
                                <input class="btn btn-danger" type="button" value="Eliminar" id="btnEliminar">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>








        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <table>
                        <tr>
                            <td rowspan="10">
                                <table border="1">
                                    <thead>
                                        <tr>
                                            <th>Cedula</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Correo</th>
                                            <th>Usuario</th>
                                            <th>Password</th>
                                        </tr>
                                    </thead>
                                    <tbody id="listaUsuarios">

                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>