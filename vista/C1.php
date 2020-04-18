<!DOCTYPE html>
<html lang="en">

<head>
    <link href="./resource/c3-0.4.17/c3.css" rel="stylesheet" type="text/css" />
    <script src="./resource/c3-0.4.17/bower_components/d3/d3.min.js" type="text/javascript"></script>
    <script src="./resource/c3-0.4.17/c3.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="./resource/jquery/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script type="text/javascript" src="./resource/js/gestionLogin.js"></script>
</head>
<!-- style="background: white;" -->

<body>
    <!-- <div id="chart"></div>

        <div id="chart2"></div>

        <input type="button" value="dataset1" onclick="cargarDataset1();"> 
        <input type="button" value="dataset2" onclick="cargarDataset2();">  -->
    <br><br><br><br>
    <div class="mx-auto" style="width: 200px;">
        <!-- <div class="col-sm-2"> -->
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <h2 style="color: rgba(0, 26, 255, 0.7);">Grafico #1</h2>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>
    <br>
    <div id="chart1"></div>
    <form name="formPDF" target="_blank" method="post" action="./controller/ctlGraficos.php">
        <input class="btn btn-success" type="submit" value="Guardar" id="btnCsvG1">
    </form>
</body>

<!-- <script src="resource/js/examplec3.js" type="text/javascript"></script> -->
<script src="./resource/js/examplec1.js" type="text/javascript"></script>

</html>