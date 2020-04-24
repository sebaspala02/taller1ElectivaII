<!-- <script src="resource/js/examplec3.js" type="text/javascript"></script>
<link href="resource/Framework/c3-0.4.17/c3.css" rel="stylesheet" type="text/css" />
<script src="resource/Framework/c3-0.4.17/bower_components/d3/d3.min.js" type="text/javascript"></script>
<script src="resource/Framework/c3-0.4.17/c3.min.js" type="text/javascript"></script>
<script type="text/javascript" src="resource/jquery/jquery.js"></script> -->
<!-- Masthead -->
<!-- <header class="masthead"> -->
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
                                <td>
                                    <form name="graficas" method="post" target="_blank" action="masterpage.php?page=C3&1">
                                        <!-- <input type="text" id="txtReporteU" style="display: none" value="Genero()" name="tabla"> -->
                                        <input class="btn btn-outline-success" type="submit" value="Ver Grafico en C3">
                                        <!-- <input id="btnCsvG1" class="btn btn-outline-success" type="submit" value="Grafico en C31"> -->
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
                                    <form name="graficas" method="post" target="_blank" action="masterpage.php?page=C3&2">
                                        <input class="btn btn-outline-success" type="submit" value="Ver Grafico en C3">
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
                        <p class="card-text text-justify">Se debe mostrar un gráfico que indique la cantidad de productos vendidos por cada producto, y que además
                            indique las ganancias generadas por cada producto en el mismo gráfico.</p>
                        <table>
                            <tr>
                                <td>
                                    <form name="graficas" method="post" target="_blank" action="masterpage.php?page=C3&3">
                                        <input class="btn btn-outline-success" type="submit" value="Ver Grafico en C3">
                                    </form>
                                </td>
                            </tr>
                        </table>
                        <!-- <a href="#" class="btn btn-primary">Generar Reporte</a> -->
                        <br>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" style="color: rgba(0, 26, 255, 0.7);">Reporte #4</h5>
                        <p class="card-text text-justify">Se debe mostrar un gráfico que indique por empleado la cantidad de ventas ha realizado al que menos ventas
                            ha realizado. Además, de cada empleado se debe mostrar cuantos ingresos por ventas ha generado a la
                            farmacia.</p>
                        <table>
                            <tr>
                                <td>
                                    <form name="graficas" method="post" target="_blank" action="masterpage.php?page=C3&4">
                                        <input class="btn btn-outline-success" type="submit" value="Ver Grafico en C3">
                                    </form>
                                </td>
                            </tr>
                        </table>
                        <!-- <a href="#" class="btn btn-primary">Generar Reporte</a> -->
                    </div>
                </div>
                <br>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" style="color: rgba(0, 26, 255, 0.7);">Reporte #5</h5>
                        <p class="card-text text-justify">Se debe mostrar un gráfico que indique por día del mes, cuantas ventas se ha realizado, y el total de ingresos
                            generados por día.</p>
                        <table>
                            <tr>
                                <td>
                                    <form name="graficas" method="post" target="_blank" action="masterpage.php?page=C3&5">
                                        <input class="btn btn-outline-success" type="submit" value="Ver Grafico en C3">
                                    </form>
                                </td>
                            </tr>
                        </table>
                        <!-- <a href="#" class="btn btn-primary">Generar Reporte</a> -->
                        <br>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" style="color: rgba(0, 26, 255, 0.7);">Reporte #6</h5>
                        <p class="card-text text-justify">Se debe mostrar un gráfico que indique por día de la semana, cuantas ventas se ha realizado, y el total de
                            ingresos generados por día de la semana.</p>
                        <table>
                            <tr>
                                <td>
                                    <form name="graficas" method="post" target="_blank" action="masterpage.php?page=C3&6">
                                        <input class="btn btn-outline-success" type="submit" value="Ver Grafico en C3">
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
<!-- </header> -->

<!-- Bootstrap core JavaScript -->
<!-- <script src="vendor/jquery/jquery.min.js"></script> -->
<!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

<!-- Plugin JavaScript -->
<!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->
<!-- <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script> -->

<!-- Custom scripts for this template -->
<!-- <script src="js/creative.min.js"></script> -->