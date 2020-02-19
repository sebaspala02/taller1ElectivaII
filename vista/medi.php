<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vacas</title>

    <!-- Theme CSS - Includes Bootstrap -->
    <link href="../resource/styles/creative.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../resource/styles/bootstrap.min.css">

    <script type="text/javascript" src="../resource/jquery/jquery.js"></script>
    <script type="text/javascript" src="../resource/js/cargarList.js"></script>
    <script type="text/javascript" src="../resource/js/gestionVaca.js"></script>
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
                                <h1>Gestionar Medicamentos</h1>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Nombre:</label>
                            </td>
                            <td colspan="2">
                                <input type="text" id="txtIdMedicamento" style="display: none" value="">
                                <input class="form-control" type="text" placeholder="Nombre" id="txtNombre" required>
                                <br>
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
                                <label>Fecha de Vencimiento:</label>
                            </td>
                            <td colspan="2">
                                <div class="form-group">
                                    <input class="form-control" type="date" id="txtFecha_venci" required>
                                    <!-- <input class="form-control" type="text" placeholder="Nombre" id="txtNombre" required> -->
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Cantidad:</label>
                            </td>
                            <td colspan="2">
                                <input class="form-control" type="number" placeholder="Cant." id="txtCant" required>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Fecha de Creación:</label>
                            </td>
                            <td colspan="2">
                                <div class="form-group">
                                    <input class="form-control" type="date" id="txtFecha_crea" required>
                                    <!-- <input class="form-control" type="text" placeholder="Nombre" id="txtNombre" required> -->
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Precio:</label>
                            </td>
                            <td colspan="2">
                                <input class="form-control" type="number" placeholder="Precio" id="txtPrecio" required>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Usuario:</label>
                            </td>
                            <td colspan="2">
                                <div class="form-group">
                                    <select class="form-control" id="txtIdUsuario" name="usuario"></select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Laboratorio:</label>
                            </td>
                            <td colspan="2">
                                <div class="form-group">
                                    <select class="form-control" id="txtIdLaboratorio" name="laboratorio"></select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                                <input class="btn btn-success" type="button" value="Guardar" id="btnGuardarV">
                                <input class="btn btn-outline-dark" type="button" value="Limpiar" id="btnLimpiarV">
                                <!-- <input type="button" value="Buscar" id="btnBuscar"> -->
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                                <input class="btn btn-warning" type="button" value="Modificar" id="btnModificarV">
                                <input class="btn btn-danger" type="button" value="Eliminar" id="btnEliminarV">
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
                                            <th>Descripción</th>
                                            <th>Fecha de Vencimiento</th>
                                            <th>Cantidad</th>
                                            <th>Fecha de Creación</th>
                                            <th>Precio</th>
                                            <th>Usuario</th>
                                            <th>Laboratorio</th>
                                            <!-- <th>Descripción</th> -->
                                        </tr>
                                    </thead>
                                    <tbody id="listaVacas">

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