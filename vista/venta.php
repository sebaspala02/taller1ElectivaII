<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Venta</title>

    <!-- Theme CSS - Includes Bootstrap -->
    <link href="../resource/styles/creative.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../resource/styles/bootstrap.min.css">

    <script type="text/javascript" src="../resource/jquery/jquery.js"></script>
    <script type="text/javascript" src="../resource/js/cargarList.js"></script>
    <script type="text/javascript" src="../resource/js/gestionVaca.js"></script>
    <script type="text/javascript" src="../resource/js/gestionDepto.js"></script>
</head>

<body>
    <br><br><br><br><br>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div id="content" class="col-lg-12">
                        <div id="element" class="col-lg-12" style="display: none;">
                            <!-- <div id="close"><a class="btn btn-small" href="#" id="hide" title="Cerrar"><i class="fa fa-close"></i></a></div> -->
                            <!-- <h2>What is Lorem Ipsum?</h2>
                            <p>Lorem Ipsum...</p> -->
                            <table>
                                <tr>
                                    <td>
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h1>Datos Cliente</h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Nombre Cliente:</label>
                                    </td>
                                    <td colspan="2">
                                        <input type="text" id="txtIdCliente" style="display: none" value="">
                                        <input class="form-control" type="text" placeholder="Nombre" id="txtNombreCliente" required>
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Apellido Cliente.:</label>
                                    </td>
                                    <td colspan="2">

                                        <input class="form-control" type="text" placeholder="Apellido" id="txtApellidoCliente" required>
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Cedula Cliente.:</label>
                                    </td>
                                    <td colspan="2">

                                        <input class="form-control" type="number" placeholder="C.C" id="txtCedulaCliente" required>
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Sexo:</label>
                                    </td>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <select class="form-control" id="txtIdUsuario" name="usuario">
                                                <option value="0">Seleccionar</option>
                                                <option value="1">Masculino</option>
                                                <option value="2">Femenino</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <table border="1">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Cedula</th>
                                            <th>Sexo</th>
                                            <!-- <th>Descripción</th> -->
                                        </tr>
                                    </thead>
                                    <tbody id="listaCliente">

                                    </tbody>
                                </table>
                                <br>
                                <br>
                                <p><a class="btn btn-danger" href="#" id="hide"><i class="fa fa-eye"></i> Cerrar</a></p>
                            </table>
                        </div>
                    </div>
                    <br>
                    <br>
                    <p><a class="btn btn-primary" href="#" id="show"><i class="fa fa-eye"></i> Agregar Cliente</a></p>
                    <br>
                    <br>
                    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $("#hide").on('click', function() {
                                $("#element").hide();
                                return false;
                            });

                            $("#show").on('click', function() {
                                $("#element").show();
                                return false;
                            });
                        });
                    </script>
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
                                        <p style="text-align: center;"><b>Lista de medicamentos</b></p>
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
                                    <tbody id="listaMedi">

                                    </tbody>
                                </table>
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
                            <td>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h1>Realizar Venta</h1>
                            </td>
                        </tr>
                        <!-- ------------------------------
                        
                        venta
                        
                        
                        ---------------------------------------------------- -->
                        <tr>
                            <td>
                            </td>
                            <td>
                                <input class="btn btn-success" type="button" value="Comprar" id="btnCompra">
                                <input class="btn btn-outline-dark" type="button" value="Limpiar" id="btnLimpiarD">
                                <!-- <input type="button" value="Buscar" id="btnBuscar"> -->
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                                <input class="btn btn-warning" type="button" value="Editar Compra " id="btnModificarC">
                                <input class="btn btn-danger" type="button" value="Eliminar Compra" id="btnEliminarC">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>
</body>

</html>