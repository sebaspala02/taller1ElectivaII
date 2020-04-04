<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista-Venta</title>

    <!-- Theme CSS - Includes Bootstrap -->
    <link href="resource/styles/creative.min.css" rel="stylesheet">

    <link rel="stylesheet" href="resource/styles/bootstrap.min.css">
    <link href="resource/styles/jquery.dataTables.css" rel="stylesheet">
    <script type="text/javascript" src="resource/jquery/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript" src="resource/js/jquery.dataTables.js"></script>
    <!-- <script type="text/javascript" src="../resource/js/cargarList.js"></script> -->
    <script type="text/javascript" src="resource/js/gestionCliente.js"></script>
    <script type="text/javascript" src="resource/js/gestionMedi.js"></script>
    <script type="text/javascript" src="resource/js/gestionLogin.js"></script>
    <script type="text/javascript" src="resource/js/gestionVenta.js"></script>
</head>

<body>
    <br><br><br><br><br>
    <div class="row">
        <div class="col-sm-6">
            <div class="card" style="margin-right: -55px;right: -77px;">
                <div class="card-body">
                    <table>
                        <tr>
                            <td rowspan="10">
                                <table class="table table-hover" id="tableVentas">
                                    <thead>
                                        <b>
                                            <h3 style="text-align: center;">Lista de Ventas</h3>
                                        </b>
                                        <tr>
                                            <th style="display: none">id</th>
                                            <th>Cliente</th>
                                            <th>Fecha Venta</th>
                                            <th>Precio/Total</th>
                                            <!-- <th>Descripción</th> -->
                                        </tr>
                                    </thead>
                                    <!-- <tr>
                                        <td>jajajajajajajajajajajja</td>
                                        <td>asasas</td>
                                        <td>asasas</td>
                                        <td>$1.03783737878</td>
                                        <td>asasas</td>
                                    </tr> -->
                                    <tbody id="listaVenta">

                                    </tbody>
                                    <table>
                                        <tr>
                                            <td>
                                                <form name="formPDF" method="post" target="_blank" action="./controller/ctlReporte.php">
                                                    <input type="text" id="txtReporteV" style="display: none" name="tabla" value="Venta(0)">
                                                    <input type="text" id="nomTabla" style="display: none" value="Ventas" name="nomTabla">
                                                    <input class="btn btn-outline-info" type="submit" value="Generar PDF" id="btnPdfV">
                                                </form>
                                            </td>
                                            <td>
                                            <form name="formPDF" method="post" target="_blank" action="./controller/ctlExportar.php">
                                                <input type="text" id="txtReporteU" style="display: none" value="Venta(0)" name="tabla">
                                                <input type="text" id="nomTabla" style="display: none" value="Ventas" name="nomTabla">
                                                <input class="btn btn-outline-info" type="submit" value="Exportar CSV" id="btnCsvV">
                                            </form>
                                        </td>
                                        </tr>
                                    </table>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-4" style="left: 135px;">
            <div class="card">
                <div class="card-body">
                    <table>
                        <tr>
                            <td rowspan="10">
                                <table class="table table-hover" id="tableDetalle">
                                    <thead>
                                        <b>
                                            <h3 style="text-align: center;">Detalle Ventas</h3>
                                        </b>
                                        <tr>
                                            <th style="display: none">id</th>
                                            <th>Cant.</th>
                                            <th>Medicamento</th>
                                            <th>Ref. Venta</th>
                                            <th>Opción</th>
                                        </tr>
                                    </thead>
                                    <!-- <tr>
                                        <td><input class="col-md-8 mb-8" type="text" name="cant" id="" placeholder="Cant."></td>
                                        <td>asasas</td>
                                        <td>3783737878</td>
                                    </tr> -->
                                    <tbody id="listaDetalle">

                                    </tbody>
                                </table>
                                <table>
                                    <tr>
                                        <td>
                                            <form name="formPDF" method="post" target="_blank" action="./controller/ctlReporte.php">
                                                <input type="text" id="txtReporteDV" style="display: none" value="DetalleV(0)" name="tabla">
                                                <input type="text" id="nomTabla" style="display: none" value="Detalle Ventas" name="nomTabla">
                                                <input class="btn btn-outline-info" type="submit" value="Generar PDF" id="btnPdfDV">
                                            </form>
                                        </td>
                                        <td>
                                            <form name="formPDF" method="post" target="_blank" action="./controller/ctlExportar.php">
                                                <input type="text" id="txtReporteU" style="display: none" value="DetalleV(0)" name="tabla">
                                                <input type="text" id="nomTabla" style="display: none" value="Detalle_Venta" name="nomTabla">
                                                <input class="btn btn-outline-info" type="submit" value="Exportar CSV" id="btnCsvDV">
                                            </form>
                                        </td>
                                    </tr>
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

<!-- <div class="col-sm-6">
            <div class="card" style="border-right-width: 1px; margin-right: 54px;">
                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <td>
                                <h1>Realizar Venta</h1>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Cedula Cliente.:</label>
                            </td>
                            <td colspan="2">
                                <input class="form-control" type="number" placeholder="C.C" id="txtCedulaClienteVenta" required>
                                <select name="" id="">
                                    <option value="0">Seleccione cliente</option>
                                </select>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Medicamento:</label>
                            </td>
                            <td colspan="2">
                                <input class="form-control" type="text" placeholder="Nombre" id="txtMedicamentoVenta" required readonly>
                                <br>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Cantidad:</label>
                            </td>
                            <td colspan="2">
                                <input class="form-control" type="number" placeholder="Cant." id="txtCantidad" required>
                                <br>
                            </td>
                        </tr>

                        ------------------------------
                        
                        venta

                        ----------------------------------------------------

                        <thead>
                            <b>
                                <h2 style="text-align: center;">Realizar Venta</h2>
                            </b>
                            <tr>
                                <th style="display: none">id</th>
                                <th>Medicamento</th>
                                <th>Laboratorio</th>
                                <th>Cantidad</th>
                                <th>Precio/Unitario</th>
                            </tr>
                        </thead>
                        <tr>
                            <td>asassasasa</td>
                            <td>asassasasa</td>
                            <td><input class="col-md-12" type="number" name="txtcantidad" id="" placeholder="Cant."></td>
                            <td>asassasasa</td>
                        </tr>
                        <tr>
                            <td>
                                <input class="btn btn-success" type="button" value="Comprar" id="btnCompra">
                            </td>
                            <td>
                                <input class="btn btn-outline-dark" type="button" value="Limpiar" id="btnLimpiarD">
                            </td>
                            <td>
                                <input class="btn btn-warning" type="button" value="Editar Compra " id="btnModificarC">
                            </td>
                            <td>
                                <input class="btn btn-danger" type="button" value="Eliminar Compra" id="btnEliminarC">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div> -->