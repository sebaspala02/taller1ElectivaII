<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fincas</title>

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
                                <h1>Gestionar Finca</h1>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Nombre:</label>
                            </td>
                            <td colspan="2">
                                <input type="text" id="txtIdFinca" style="display: none" value="">
                                <input class="form-control" type="text" placeholder="Nombre" id="txtNombre" required>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tamaño en Hectareas:</label>
                            </td>
                            <td colspan="2">
                                <input class="form-control" type="number" placeholder="Numero de Hectareas" id="txtTamanio" required>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Departamento:</label>
                            </td>
                            <td colspan="2">
                                <div class="form-group">
                                    <select class="form-control" id="txtDepto" name="depto" onchange="listMunicipios()"></select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Municipio:</label>
                            </td>
                            <td colspan="2">
                                <div class="form-group">
                                    <select class="form-control" id="txtMunicipio">
                                        <option value="0">---SELECCIONE---</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>N° de Cabañas:</label>
                            </td>
                            <td colspan="2">
                                <input class="form-control" type="number" placeholder="Numero de cabañas" id="txtCantidad" required>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Piscina:</label>
                            </td>
                            <td colspan="2">
                                <div class="form-group">
                                    <select class="form-control" id="txtPiscina">
                                        <option value="0">si / no</option>
                                        <option value="1">Si</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Descripción:</label>
                            </td>
                            <td colspan="2">
                                <textarea class="form-control" rows="3" id="txtDescripcion" required></textarea>
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
                                            <th>Nombre</th>
                                            <th>Tamaño en Hectareas</th>
                                            <th>Departamento</th>
                                            <th>Municipio</th>
                                            <th>Num. de cabañas</th>
                                            <th>Pisicina</th>
                                            <th>Descripción</th>
                                        </tr>
                                    </thead>
                                    <tbody id="listaFincas">

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