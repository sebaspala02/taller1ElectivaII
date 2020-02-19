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
                                <h1>Gestionar Vacas</h1>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Peso:</label>
                            </td>
                            <td colspan="2">
                                <input type="text" id="txtIdVaca" style="display: none" value="">
                                <input class="form-control" type="number" placeholder="Peso/kg" id="txtPeso" required>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Edad:</label>
                            </td>
                            <td colspan="2">
                                <input class="form-control" type="number" placeholder="Edad de la vaca" id="txtEdad" required>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Nombre:</label>
                            </td>
                            <td colspan="2">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Nombre de la vaca" id="txtNombre" required>
                                    <!-- <input class="form-control" type="text" placeholder="Nombre" id="txtNombre" required> -->
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>¿Crias?:</label>
                            </td>
                            <td colspan="2">
                                <div class="form-group">
                                    <select class="form-control" id="txtCrias">
                                        <option value="0">si / no</option>
                                        <option value="1">Si</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>N° ordeñada:</label>
                            </td>
                            <td colspan="2">
                                <input class="form-control" type="number" placeholder="Num. de ordeñadas" id="txtNum_ordenada" required>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Finca:</label>
                            </td>
                            <td colspan="2">
                                <div class="form-group">
                                    <select class="form-control" id="txtFinca" name="finca" ></select>
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
                                            <th>Peso</th>
                                            <th>Edad</th>
                                            <th>Nombre</th>
                                            <th>¿Crias?</th>
                                            <th>N° Ordeñadas</th>
                                            <th>Finca</th>
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