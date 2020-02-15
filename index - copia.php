<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fincas</title>
    <link rel="stylesheet" href="resource/styles/style.css">
    <script type="text/javascript" src="resource/jquery/jquery.js"></script>
    <script type="text/javascript" src="resource/js/cargarList.js"></script>
    <script type="text/javascript" src="resource/js/gestionFinca.js"></script>
</head>

<body>
    <div class="header">
        <h1>REGISTRO FINCAS</h1>
    </div>
    <div class="container">
        <div class="conFields">
            <form action="">
                <p>NOMBRE</p>
                <input type="text" id="txtIdFinca" style="display: none" value="" onchange="listMunicipios()"> 
                <input type="text" class="campos" id="txtNombre">
                <p>TAMAÑO</p>
                <input type="number" class="campos" id="txtTamanio">
                <p>DEPARTAMENTO</p>
                <select class="campos" id="txtDepto" name="depto" onchange="listMunicipios()"></select>
                <p>MUNICIPIO</p>
                <select class="campos" id="txtMunicipio">
                    <option value="0">---SELECCIONE---</option>
                </select>
                <p>NRO CABAÑAS</p>
                <input type="number" class="campos" id="txtCantidad">
                <p>PISCINA</p>
                <select class="campos" id="txtPiscina">
                    <option value="0">---SELECCIONE---</option>
                    <option value="1">Si</option>
                    <option value="2">No</option>
                </select>
                <p>DESCRIPCION</p>
                <textarea class="campos" id="txtDescripcion" cols="30" rows="2"></textarea>
            </form>
            <div class="botonera">
                <input class="boton" type="button" value="Guardar" id="btnGuardar">
                <input class="boton" type="button" value="Modificar" id="btnModificar">
                <br>
                <input class="boton" type="button" value="Eliminar" id="btnEliminar">
            </div>
        </div>
        <div class="conTable rowspan="10"">
            <table border="1">
                <thead>
                    <tr>
                        <th>NOMBRE</th>
                        <th>TAMAÑO HS</th>
                        <th>MUNICIPIO</th>
                        <th>DEPTO</th>
                        <th>CANTIDAD</th>
                        <th>PISCINA</th>
                        <th>DESCRIPCION</th>
                    </tr>
                </thead>
                <tbody id="listaFincas">
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>