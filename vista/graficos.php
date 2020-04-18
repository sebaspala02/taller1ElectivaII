<!-- Masthead -->
<script src="resource/js/examplec1.js" type="text/javascript"></script>
<header class="masthead">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end">
                <h1 class="text-uppercase text-white font-weight-bold">Reportes Exclusivos en C3</h1>
                <!-- <hr class="divider my-4"> -->
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title" style="color: rgba(0, 26, 255, 0.7);">Grafico #1</h5>
                            <p class="card-text text-justify">Se debe generar un gráfico que indique el
                                total de clientes hombres y mujeres y su distribución en porcentajes.<br><br></p>
                            <table>
                                <tr>
                                    <!-- <td>
                                        <form name="formPDF" method="post" action="./controller/ctlExportar.php">
                                            <input type="text" id="txtReporteU" style="display: none" value="Genero()" name="tabla">
                                            <input type="text" value="," name="coma" id="coma" style="display: none">
                                            <input type="text" id="nomTabla" style="display: none" value="datos1" name="nomTabla">
                                            <input class="btn btn-outline-info" type="submit" value="Exportar CSV ,">
                                        </form>
                                    </td> -->
                                    <td>
                                        <form name="graficas" method="post" target="_blank" action="masterpage.php?page=C1">
                                            <!-- <input type="text" id="txtReporteU" style="display: none" value="PlUno()" name="tabla"> -->
                                            <!-- <input type="text" id="nomTabla" style="display: none" value="Informe Clientes" name="nomTabla"> -->
                                            <!-- <input type="text" value=";" name="coma" id="coma" style="display: none"> -->
                                            <input class="btn btn-outline-success" type="submit" value="Ver Grafico" id="btnCsvG1">
                                            <!-- <a class="btn btn-outline-success" id="btnCsvG1" href="masterpage.php?page=C1">Graficos en C3</a> -->
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
                            <h5 class="card-title" style="color: rgba(0, 26, 255, 0.7);">Grafico #2</h5>
                            <p class="card-text text-justify">Se debe generar un gráfico que indique la cantidad de los
                                productos y su distribución en %.</p>
                            <br>
                            <table>
                                <tr>
                                    <td>
                                        <form name="formPDF" method="post" target="_blank" action="./controller/ctlExportar.php">
                                            <input type="text" id="txtReporteU" style="display: none" value="PlDos()" name="tabla">
                                            <input type="text" id="nomTabla" style="display: none" value="Informe Empleados" name="nomTabla">
                                            <input type="text" value="," name="coma" id="coma" style="display: none">
                                            <input class="btn btn-outline-info" type="submit" value="Exportar CSV ,">
                                        </form>
                                    </td>
                                    <td>
                                        <form name="formPDF" method="post" target="_blank" action="./controller/ctlExportar.php">
                                            <input type="text" id="txtReporteU" style="display: none" value="PlDos()" name="tabla">
                                            <input type="text" id="nomTabla" style="display: none" value="Informe Empleados" name="nomTabla">
                                            <input type="text" value=";" name="coma" id="coma" style="display: none">
                                            <input class="btn btn-outline-info" type="submit" value="Exportar CSV ;" id="btnCsvM">
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
                            <h5 class="card-title" style="color: rgba(0, 26, 255, 0.7);">Reporte #3</h5>
                            <p class="card-text text-justify">Se debe mostrar un informe de los productos más vendidos al menos vendido. Indicando por cada producto la
                                cantidad total que se ha vendido cada producto.</p>
                            <table>
                                <tr>
                                    <td>
                                        <form name="formPDF" method="post" target="_blank" action="./controller/ctlExportar.php">
                                            <input type="text" id="txtReporteU" style="display: none" value="PlTres()" name="tabla">
                                            <input type="text" id="nomTabla" style="display: none" value="Informe Productos" name="nomTabla">
                                            <input type="text" value="," name="coma" id="coma" style="display: none">
                                            <input class="btn btn-outline-info" type="submit" value="Exportar CSV ,">
                                        </form>
                                    </td>
                                    <td>
                                        <form name="formPDF" method="post" target="_blank" action="./controller/ctlExportar.php">
                                            <input type="text" id="txtReporteU" style="display: none" value="PlTres()" name="tabla">
                                            <input type="text" id="nomTabla" style="display: none" value="Informe Productos" name="nomTabla">
                                            <input type="text" value=";" name="coma" id="coma" style="display: none">
                                            <input class="btn btn-outline-info" type="submit" value="Exportar CSV ;" id="btnCsvM">
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
                            <h5 class="card-title" style="color: rgba(0, 26, 255, 0.7);">Reporte #4</h5>
                            <p class="card-text text-justify">Se debe mostrar un informe que indique por día, cuantas ventas se ha realizado, y el total de ingresos generados
                                por día.</p>
                            <table>
                                <tr>
                                    <td>
                                        <form name="formPDF" method="post" target="_blank" action="./controller/ctlExportar.php">
                                            <input type="text" id="txtReporteU" style="display: none" value="PlCuatro()" name="tabla">
                                            <input type="text" id="nomTabla" style="display: none" value="Informe Día" name="nomTabla">
                                            <input type="text" value="," name="coma" id="coma" style="display: none">
                                            <input class="btn btn-outline-info" type="submit" value="Exportar CSV ,">
                                        </form>
                                    </td>
                                    <td>
                                        <form name="formPDF" method="post" target="_blank" action="./controller/ctlExportar.php">
                                            <input type="text" id="txtReporteU" style="display: none" value="PlCuatro()" name="tabla">
                                            <input type="text" id="nomTabla" style="display: none" value="Informe Día" name="nomTabla">
                                            <input type="text" value=";" name="coma" id="coma" style="display: none">
                                            <input class="btn btn-outline-info" type="submit" value="Exportar CSV ;" id="btnCsvM">
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