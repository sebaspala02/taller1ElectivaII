<!-- Masthead -->
<header class="masthead">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end">
                <h1 class="text-uppercase text-white font-weight-bold">Reportes Exclusivos en CSV</h1>
                <!-- <hr class="divider my-4"> -->
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Reporte #1</h5>
                            <p class="card-text text-justify">Se debe mostrar un informe de los clientes, ordenados del que más compras a realizado al que menos compras
                                a realizado, mostrando el total de compras y el total de dinero invertido en la farmacia.<br><br></p>
                            <table>
                                <tr>
                                    <td>
                                        <form name="formPDF" method="post" target="_blank" action="./controller/ctlExportar.php">
                                            <input type="text" id="txtReporteU" style="display: none" value="PlUno()" name="tabla">
                                            <input type="text" value="," name="coma" id="coma" style="display: none">
                                            <input type="text" id="nomTabla" style="display: none" value="Informe Clientes" name="nomTabla">
                                            <input class="btn btn-outline-info" type="submit" value="Exportar CSV con ( , )">
                                        </form>
                                    </td>
                                    <td>
                                        <form name="formPDF" method="post" target="_blank" action="./controller/ctlExportar.php">
                                            <input type="text" id="txtReporteU" style="display: none" value="PlUno()" name="tabla">
                                            <input type="text" id="nomTabla" style="display: none" value="Informe Clientes" name="nomTabla">
                                            <input type="text" value=";" name="coma" id="coma" style="display: none">
                                            <input class="btn btn-outline-info" type="submit" value="Exportar CSV con ( ; )" id="btnCsvM">
                                        </form>
                                    </td>
                                    <td>
                                        <form name="formPDF" method="post" target="_blank" action="./controller/ctlExportar.php">
                                            <input type="text" id="txtReporteU" style="display: none" value="PlUno()" name="tabla">
                                            <input type="text" id="nomTabla" style="display: none" value="Informe Clientes" name="nomTabla">
                                            <input type="text" value=":" name="coma" id="coma" style="display: none">
                                            <input class="btn btn-outline-info" type="submit" value="Exportar CSV con ( : )" id="btnCsvM">
                                        </form>
                                    </td>
                                </tr>
                            </table>
                            <!-- <a href="#" class="btn btn-primary">Generar Reporte</a> -->
                        </div>
                    </div>
                    <div style="padding-bottom: 10px;"></div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Reporte #2</h5>
                            <p class="card-text text-justify">Se debe mostrar un informe de todos los empleados, ordenados del empleado que más ventas ha realizado al
                                que menos ventas ha realizado. Además, de cada empleado se debe mostrar cuantos ingresos por ventas ha
                                generado a la farmacia.</p>
                            <table>
                                <tr>
                                    <td>
                                        <form name="formPDF" method="post" target="_blank" action="./controller/ctlExportar.php">
                                            <input type="text" id="txtReporteU" style="display: none" value="PlDos()" name="tabla">
                                            <input type="text" id="nomTabla" style="display: none" value="Informe Empleados" name="nomTabla">
                                            <input type="text" value="," name="coma" id="coma" style="display: none">
                                            <input class="btn btn-outline-info" type="submit" value="Exportar CSV con ( , )">
                                        </form>
                                    </td>
                                    <td>
                                        <form name="formPDF" method="post" target="_blank" action="./controller/ctlExportar.php">
                                            <input type="text" id="txtReporteU" style="display: none" value="PlDos()" name="tabla">
                                            <input type="text" id="nomTabla" style="display: none" value="Informe Empleados" name="nomTabla">
                                            <input type="text" value=";" name="coma" id="coma" style="display: none">
                                            <input class="btn btn-outline-info" type="submit" value="Exportar CSV con ( ; )" id="btnCsvM">
                                        </form>
                                    </td>
                                    <td>
                                        <form name="formPDF" method="post" target="_blank" action="./controller/ctlExportar.php">
                                            <input type="text" id="txtReporteU" style="display: none" value="PlDos()" name="tabla">
                                            <input type="text" id="nomTabla" style="display: none" value="Informe Empleados" name="nomTabla">
                                            <input type="text" value=":" name="coma" id="coma" style="display: none">
                                            <input class="btn btn-outline-info" type="submit" value="Exportar CSV con ( : )" id="btnCsvM">
                                        </form>
                                    </td>
                                </tr>
                            </table>
                            <!-- <a href="#" class="btn btn-primary">Generar Reporte</a> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Reporte #3</h5>
                            <p class="card-text text-justify">Se debe mostrar un informe de los productos más vendidos al menos vendido. Indicando por cada producto la
                                cantidad total que se ha vendido cada producto.</p>
                            <table>
                                <tr>
                                    <td>
                                        <form name="formPDF" method="post" target="_blank" action="./controller/ctlExportar.php">
                                            <input type="text" id="txtReporteU" style="display: none" value="PlTres()" name="tabla">
                                            <input type="text" id="nomTabla" style="display: none" value="Informe Productos" name="nomTabla">
                                            <input type="text" value="," name="coma" id="coma" style="display: none">
                                            <input class="btn btn-outline-info" type="submit" value="Exportar CSV con ( , )">
                                        </form>
                                    </td>
                                    <td>
                                        <form name="formPDF" method="post" target="_blank" action="./controller/ctlExportar.php">
                                            <input type="text" id="txtReporteU" style="display: none" value="PlTres()" name="tabla">
                                            <input type="text" id="nomTabla" style="display: none" value="Informe Productos" name="nomTabla">
                                            <input type="text" value=";" name="coma" id="coma" style="display: none">
                                            <input class="btn btn-outline-info" type="submit" value="Exportar CSV con ( ; )" id="btnCsvM">
                                        </form>
                                    </td>
                                    <td>
                                        <form name="formPDF" method="post" target="_blank" action="./controller/ctlExportar.php">
                                            <input type="text" id="txtReporteU" style="display: none" value="PlTres()" name="tabla">
                                            <input type="text" id="nomTabla" style="display: none" value="Informe Productos" name="nomTabla">
                                            <input type="text" value=":" name="coma" id="coma" style="display: none">
                                            <input class="btn btn-outline-info" type="submit" value="Exportar CSV con ( : )" id="btnCsvM">
                                        </form>
                                    </td>
                                </tr>
                            </table>
                            <!-- <a href="#" class="btn btn-primary">Generar Reporte</a> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Reporte #4</h5>
                            <p class="card-text text-justify">Se debe mostrar un informe que indique por día, cuantas ventas se ha realizado, y el total de ingresos generados
                                por día.</p>
                            <table>
                                <tr>
                                    <td>
                                        <form name="formPDF" method="post" target="_blank" action="./controller/ctlExportar.php">
                                            <input type="text" id="txtReporteU" style="display: none" value="PlCuatro()" name="tabla">
                                            <input type="text" id="nomTabla" style="display: none" value="Informe Día" name="nomTabla">
                                            <input type="text" value="," name="coma" id="coma" style="display: none">
                                            <input class="btn btn-outline-info" type="submit" value="Exportar CSV con ( , )">
                                        </form>
                                    </td>
                                    <td>
                                        <form name="formPDF" method="post" target="_blank" action="./controller/ctlExportar.php">
                                            <input type="text" id="txtReporteU" style="display: none" value="PlCuatro()" name="tabla">
                                            <input type="text" id="nomTabla" style="display: none" value="Informe Día" name="nomTabla">
                                            <input type="text" value=";" name="coma" id="coma" style="display: none">
                                            <input class="btn btn-outline-info" type="submit" value="Exportar CSV con ( ; )" id="btnCsvM">
                                        </form>
                                    </td>
                                    <td>
                                        <form name="formPDF" method="post" target="_blank" action="./controller/ctlExportar.php">
                                            <input type="text" id="txtReporteU" style="display: none" value="PlCuatro()" name="tabla">
                                            <input type="text" id="nomTabla" style="display: none" value="Informe Día" name="nomTabla">
                                            <input type="text" value=":" name="coma" id="coma" style="display: none">
                                            <input class="btn btn-outline-info" type="submit" value="Exportar CSV con ( : )" id="btnCsvM">
                                        </form>
                                    </td>
                                </tr>
                            </table>
                            <!-- <a href="#" class="btn btn-primary">Generar Reporte</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Bootstrap core JavaScript -->
<!-- <script src="vendor/jquery/jquery.min.js"></script> -->
<!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

<!-- Plugin JavaScript -->
<!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->
<!-- <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script> -->

<!-- Custom scripts for this template -->
<!-- <script src="js/creative.min.js"></script> -->