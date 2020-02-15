<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Municipios</title>

    <!-- Theme CSS - Includes Bootstrap -->
    <link href="../resource/styles/creative.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../resource/styles/bootstrap.min.css">

    <script type="text/javascript" src="../resource/jquery/jquery.js"></script>
    <script type="text/javascript" src="../resource/js/cargarList.js"></script>
    <script type="text/javascript" src="../resource/js/gestionMuni.js"></script>
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
                                <h1>Gestionar Municipios</h1>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Nombre Muni. :</label>
                            </td>
                            <td colspan="2">
                                <input type="text" id="txtIdMuni" style="display: none" value="">
                                <input class="form-control" type="text" placeholder="Nombre del Municipio" id="txtNombre_Muni" required>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Departamento:</label>
                            </td>
                            <td colspan="2">
                                <div class="form-group">
                                    <select class="form-control" id="txtDepto" name="depto" ></select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                                <input class="btn btn-success" type="button" value="Guardar" id="btnGuardarM">
                                <input class="btn btn-outline-dark" type="button" value="Limpiar" id="btnLimpiarM">
                                <!-- <input type="button" value="Buscar" id="btnBuscar"> -->
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                                <input class="btn btn-warning" type="button" value="Modificar" id="btnModificarM">
                                <input class="btn btn-danger" type="button" value="Eliminar" id="btnEliminarM">
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
                                            <th>Nombre Municipio</th>
                                            <th>Departamento</th>
                                            <!-- <th>Nombre</th>
                                            <th>¿Crias?</th>
                                            <th>N° Ordeñadas</th>
                                            <th>Finca</th> -->
                                            <!-- <th>Descripción</th> -->
                                        </tr>
                                    </thead>
                                    <tbody id="listaMunis">

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