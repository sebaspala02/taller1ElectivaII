<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Usuario</title>

    <!-- Theme CSS - Includes Bootstrap -->
    <link href="resource/styles/creative.min.css" rel="stylesheet">

    <link rel="stylesheet" href="resource/styles/bootstrap.min.css">

    <script type="text/javascript" src="resource/jquery/jquery.js"></script>
    <script type="text/javascript" src="resource/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!-- <script type="text/javascript" src="../resource/js/cargarList.js"></script> -->
    <script type="text/javascript" src="resource/js/gestionUsuario.js"></script>
    <script type="text/javascript" src="resource/js/gestionLogin.js"></script>

</head>

<body>
    <br><br><br><br><br>
    <div class="row">
        <div class="col-sm-6">
            <div class="card" style="border-right-width: 1px; margin-right: 254px;">
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
                                <input class="btn btn-success" type="button" value="Guardar" id="btnGuardar">
                                <input class="btn btn-outline-dark" type="button" value="Limpiar" id="btnLimpiar">
                                <!-- <input type="button" value="Buscar" id="btnBuscar"> -->
                            </td>
                            <td>
                                <input class="btn btn-warning" type="button" value="Modificar" id="btnModificar">
                            </td>
                            <td>
                                <input class="btn btn-danger" type="button" value="Eliminar" id="btnEliminar">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>








        <div class="col-sm-6" style="right: 172px; padding-left: 0px;padding-right: 0px;">
            <div class="card" style="margin-right: -60px;left: -27px;">
                <div class="card-body">
                    <table>
                        <tr>
                            <td rowspan="10">
                                <table class="table table-hover" id="tableUsuarios">
                                    <thead>
                                    <b><h3 style="text-align: center;">Lista de Usuarios</h3></b>
                                    <hr>
                                        <tr>
                                            <th style="display: none">id</th>
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