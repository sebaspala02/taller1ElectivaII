<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Venta</title>

    <!-- Theme CSS - Includes Bootstrap -->
    <link href="resource/styles/creative.min.css" rel="stylesheet">

    <link rel="stylesheet" href="resource/styles/bootstrap.min.css">
    <link href="resource/styles/jquery.dataTables.css" rel="stylesheet">
    <script type="text/javascript" src="resource/jquery/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="resource/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!-- <script type="text/javascript" src="../resource/js/cargarList.js"></script> -->
    <script type="text/javascript" src="resource/js/gestionCliente.js"></script>
    <script type="text/javascript" src="resource/js/gestionVenta.js"></script>
    <script type="text/javascript" src="resource/js/gestionLogin.js"></script>
    <script type="text/javascript" src="resource/js/cargarList.js"></script>
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




            listarClientes();
            listarMedi()
            // listDeptos();
            // listMunicipios();
            $("#btnGuardarC").click(guardarCliente);
            $("#btnModificarC").click(guardarCliente);
            $("#btnEliminarC").click(eliminarCliente);



            function guardarCliente() {
                let objCliente = {
                    idcliente: $("#txtIdCliente").val(),
                    nombre: $("#txtNombreCliente").val().toLowerCase(),
                    apellido: $("#txtApellidoCliente").val().toLowerCase(),
                    cedula: $("#txtCedulaCliente").val(),
                    genero: $("#txtGenero").val(),
                    type: ""
                };
                if (
                    objCliente.nombre !== "" &&
                    objCliente.apellido !== "" &&
                    objCliente.cedula !== "" &&
                    objCliente.genero !== "" &&
                    objCliente.fecha_naci !== ""
                ) {
                    if (objCliente.idcliente !== "") {
                        objCliente.type = "update";
                    } else {
                        objCliente.type = "save";
                    }
                    $.ajax({
                        type: "post",
                        url: "controller/ctlCliente.php",
                        beforeSend: function() {},
                        data: objCliente,
                        success: function(data) {
                            console.log(data);
                            var info = JSON.parse(data);
                            console.log(info);
                            if (info.res === "Success") {
                                limpiar();
                                alert("Operacion exitosa");
                                listarClientes();
                            } else {
                                alert("No se pudo almacenar");
                            }
                        },
                        error: (jqXHR, textStatus, errorThrown) => {
                            alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
                            alert("verifique la ruta de archivo!");
                        }
                    });
                } else {
                    alert("Ingrese todos los datos");
                }
            }

            function listarClientes() {
                $.ajax({
                    type: "post",
                    url: "controller/ctlCliente.php",
                    beforeSend: function() {},
                    data: {
                        type: "list"
                    },

                    success: function(respuesta) {
                        //console.log(data);
                        const res = JSON.parse(respuesta);
                        const info = JSON.parse(res.data);

                        var lista = "";

                        if (info.length > 0) {
                            for (k = 0; k < info.length; k++) {
                                lista = lista + '<tr id="codigo" onclick="buscarCliente(' + info[k].idcliente + ')">';
                                lista = lista + '<td style="display: none">' + info[k].idcliente + "</td>";
                                lista = lista + "<td>" + info[k].nombre + "</td>";
                                lista = lista + "<td>" + info[k].apellido + "</td>";
                                lista = lista + "<td>" + info[k].cedula + "</td>";
                                lista = lista + "<td>" + info[k].genero + "</td>";
                                lista = lista + "<td>" + info[k].fecha_nacimiento + "</td>";
                                // if (info[k].piscina === '1') {
                                //     lista = lista + '<td>SI</td>';
                                // } else {
                                //     lista = lista + '<td>NO</td>';
                                // }
                                lista = lista + "</tr>";
                            }
                            $("#listaCliente").html(lista);
                            $('#tableClientes').dataTable({
                                "language": {
                                    "lengthMenu": "Mostrar _MENU_ elementos por pagina",
                                    "zeroRecords": "No se encuentra la informacion",
                                    "info": "Mostrando pagina _PAGE_ de _PAGES_",
                                    "infoEmpty": "Informacion vacia",
                                    "infoFiltered": "(filtered from _MAX_ total records)",
                                    "search": "Buscar:",
                                    "paginate": {
                                        "first": "Primero",
                                        "last": "Ultimo",
                                        "next": "Siguiente",
                                        "previous": "Anterior"
                                    },
                                }
                            })
                        } else {
                            $("#listaCliente").html(
                                "<tr><td>No se encuentra informacion</td>></tr>"
                            );
                        }
                    },
                    error: (jqXHR, textStatus, errorThrown) => {
                        alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
                        alert("verifique la ruta de archivo!");
                    }
                });
            }

            function buscarCliente(codigo) {
                $("#txtIdCliente").val(codigo);
                const objCliente = {
                    idcliente: $("#txtIdCliente").val(),
                    type: "search"
                };

                $.ajax({
                    type: "post",
                    url: "controller/ctlCliente.php",
                    async: false,
                    beforeSend: function() {},
                    data: objCliente,
                    success: function(res) {
                        // console.log(data);
                        const info = JSON.parse(res);
                        let data;
                        if (info.res !== "NotInfo") {
                            data = JSON.parse(info.data);
                        }
                        if (info.msj === "Success") {
                            $("#txtNombreCliente").val(data[0].nombre);
                            $("#txtApellidoCliente").val(data[0].apellido);
                            $("#txtCedulaCliente").val(data[0].cedula);
                            $("#txtGenero").val(data[0].genero);
                            $('#txtCedulaClienteVenta').val(codigo)
                        } else {
                            alert("No se encuentra");
                            limpiar();
                        }
                    }
                });
            }

            // function listMunicipios() {
            //     console.log($('#txtDepto').val())
            //     $.ajax({
            //         type: 'post',
            //         url: "controller/ctlList.php",
            //         data: { type: 'loadListMuni', depto: $('#txtDepto').val()},
            //         success: function (response) {
            //             var aux= JSON.parse(response)
            //             var municipios = JSON.parse(aux.data);
            //             console.log(municipios)
            //             var combo = "<option value='0'>---SELECCIONAR MUNICIPIO---</option>";
            //             if (municipios.length > 0) {
            //                 for (k = 0; k < municipios.length; k++) {
            //                     combo = combo + "<option value='" + municipios[k].idMunicipio + "'>" + municipios[k].nombreMpio + "</option>";
            //                 }
            //                 $("#txtMunicipio").html(combo);
            //             } else {

            //             }
            //         },
            //         error: (jqXHR, textStatus, errorThrown) => {
            //             alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
            //             alert("verifique la ruta de archivo!");
            //         }
            //     });
            // }

            function eliminarCliente() {
                var dato = $("#txtIdCliente").val();
                if (dato == "") {
                    alert("Debe cargar los datos a eliminar");
                } else {
                    const objCliente = {
                        idcliente: dato,
                        type: "delete"
                    };

                    $.ajax({
                        type: "post",
                        url: "controller/ctlCliente.php",
                        beforeSend: function() {},
                        data: objCliente,
                        success: function(res) {
                            var info = JSON.parse(res);
                            if (info.res == "Success") {
                                limpiar();
                                alert("Eliminado con exito");
                                listarClientes();
                            } else {
                                alert("No se pudo eliminar");
                                limpiar();
                            }
                        },
                        error: (jqXHR, textStatus, errorThrown) => {
                            alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
                            alert("verifique la ruta de archivo!");
                        }
                    });
                }
            }

            function limpiar() {
                $("#txtIdCliente").val("");
                $("#txtNombreCliente").val("");
                $("#txtApellidoCliente").val("");
                $("#txtCedulaCliente").val("");
                $("#txtGenero").val("");
                $("#txtFecha_naci").val("");
            }

            // function listDeptos() {
            //     $.ajax({
            //         type: 'post',
            //         url: "controller/ctlList.php",
            //         beforeSend: function() {

            //         },
            //         data: { type: 'loadListDepto' },
            //         success: function(respuesta) {
            //             const res = JSON.parse(respuesta);
            //             const info = JSON.parse(res.data);
            //             var lista = "<option value='0'>---SELECCIONE DEPTO---</option>";

            //             if (info.length > 0) {
            //                 for (k = 0; k < info.length; k++) {
            //                     lista = lista + "<option value='" + info[k].idDepartamento + "'>" + info[k].nombreDepto + "</option>";
            //                 }
            //                 $("#txtDepto").html(lista);
            //             } else {

            //             }
            //         },
            //         error: (jqXHR, textStatus, errorThrown) => {
            //             alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
            //             alert("verifique la ruta de archivo!");
            //         }
            //     });
            // }   });
            // }









        });
    </script>
</head>

<body>
    <br><br><br><br><br>
    <div class="row">
        <div class="col-sm-6">
            <div class="card" style="border-right-width: 1px; margin-right: 54px;">
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
                                            <select class="form-control" id="txtGenero" name="genero">
                                                <option value="0">Seleccionar</option>
                                                <option value="Masculino">Masculino</option>
                                                <option value="Femenino">Femenino</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Fecha de Nacimiento:</label>
                                    </td>
                                    <td colspan="2">

                                        <input class="form-control" type="date" id="txtFecha_naci" required>
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="btn btn-success" type="button" value="Guardar Cliente" id="btnGuardarC">
                                        <br><br>
                                    </td>
                                </tr>
                                <table border="1" id="tableClientes">
                                    <thead>
                                        <tr>
                                            <th style="display: none">id</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Cedula</th>
                                            <th>Sexo</th>
                                            <th>Fecha Nacimiento</th>
                                            <!-- <th>Descripción</th> -->
                                        </tr>
                                    </thead>
                                    <tbody id="listaCliente">

                                    </tbody>
                                </table>
                                <table>
                                    <tr>
                                        <td>
                                            <form name="formPDF" method="post" target="_blank" action="./controller/ctlReporte.php">
                                                <input type="text" id="txtReporteC" style="display: none" value="Cliente(0)" name="tabla">
                                                <input type="text" id="nomTabla" style="display: none" value="Clientes" name="nomTabla">
                                                <input style="width: 100%" class="btn btn-outline-info" type="submit" value="Generar PDF" id="btnPdfC">
                                            </form>
                                        </td>
                                        <td>
                                            <form name="formPDF" method="post" target="_blank" action="./controller/ctlExportar.php">
                                                <input type="text" id="txtReporteU" style="display: none" value="Cliente(0)" name="tabla">
                                                <input type="text" id="nomTabla" style="display: none" value="Clientes" name="nomTabla">
                                                <input type="text" value="," name="coma" id="coma" style="display: none">
                                                <input class="btn btn-outline-info" type="submit" value="Exportar CSV con ( , )" id="btnCsvC">
                                            </form>
                                        </td>
                                        <td>
                                            <form name="formPDF" method="post" target="_blank" action="./controller/ctlExportar.php">
                                                <input type="text" id="txtReporteU" style="display: none" value="Cliente(0)" name="tabla">
                                                <input type="text" id="nomTabla" style="display: none" value="Clientes" name="nomTabla">
                                                <input type="text" value=";" name="coma" id="coma" style="display: none">
                                                <input class="btn btn-outline-info" type="submit" value="Exportar CSV con ( ; )" id="btnCsvM">
                                            </form>
                                        </td>
                                        <!-- <td> -->
                                        <!-- </td> -->
                                    </tr>
                                    <tr>
                                        <td>
                                            <form name="formPDF" method="post" target="_blank" action="./controller/ctlExportar.php">
                                                <input type="text" id="txtReporteU" style="display: none" value="Cliente(0)" name="tabla">
                                                <input type="text" id="nomTabla" style="display: none" value="Clientes" name="nomTabla">
                                                <input type="text" value=":" name="coma" id="coma" style="display: none">
                                                <input class="btn btn-outline-info" type="submit" value="Exportar CSV con ( : )" id="btnCsvM">
                                            </form>
                                        </td>
                                    </tr>
                                </table>
                                <br>
                                <br>
                                <div class="text-center">
                                    <p><a class="btn btn-danger" href="#" id="hide"><i class="fa fa-eye"></i> Cerrar Pestaña -</a></p>
                                </div>
                            </table>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="text-center">
                        <p><a class="btn btn-primary" href="#" id="show"><i class="fa fa-eye"></i> Agregar Cliente +</a></p>
                    </div>
                    <br>
                    <br>
                    <!-- aca iba el script -->
                </div>
            </div>
        </div>

        <div class="col-sm-6" style="right: 45px;">
            <div class="card">
                <div class="card-body" style="margin-left: -20px;">
                    <table>
                        <tr>
                            <td rowspan="10">
                                <table class="table table-hover" id="tableMedisV">
                                    <thead>
                                        <b>
                                            <h3 style="text-align: center;">Lista de Medicamentos</h3>
                                        </b>
                                        <tr>
                                            <th style="display: none">id</th>
                                            <th>Nombre</th>
                                            <th>Fecha de Vencimiento</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th>Laboratorio</th>
                                            <!-- <th>Descripción</th> -->
                                        </tr>
                                    </thead>
                                    <tbody id="listaMediV">

                                    </tbody>
                                    <table>
                                        <tr>
                                            <td>
                                                <form name="formPDF" method="post" target="_blank" action="./controller/ctlReporte.php">
                                                    <input type="text" id="txtReporteM" style="display: none" value="Medi(0)" name="tabla">
                                                    <input type="text" id="nomTabla" style="display: none" value="Medicamentos" name="nomTabla">
                                                    <input class="btn btn-outline-info" type="submit" value="Generar PDF" id="btnPdfM">
                                                </form>
                                            </td>
                                            <td>
                                                <form name="formPDF" method="post" target="_blank" action="./controller/ctlExportar.php">
                                                    <input type="text" id="txtReporteU" style="display: none" value="Medi(0)" name="tabla">
                                                    <input type="text" id="nomTabla" style="display: none" value="Medicamentos" name="nomTabla">
                                                    <input type="text" value="," name="coma" id="coma" style="display: none">
                                                    <input class="btn btn-outline-info" type="submit" value="Exportar CSV con ( , )" id="btnCsvM">
                                                </form>
                                            </td>
                                            <td>
                                                <form name="formPDF" method="post" target="_blank" action="./controller/ctlExportar.php">
                                                    <input type="text" id="txtReporteU" style="display: none" value="Medi(0)" name="tabla">
                                                    <input type="text" id="nomTabla" style="display: none" value="Medicamentos" name="nomTabla">
                                                    <input type="text" value=";" name="coma" id="coma" style="display: none">
                                                    <input class="btn btn-outline-info" type="submit" value="Exportar CSV con ( ; )" id="btnCsvM">
                                                </form>
                                            </td>
                                            <td>
                                                <form name="formPDF" method="post" target="_blank" action="./controller/ctlExportar.php">
                                                    <input type="text" id="txtReporteU" style="display: none" value="Medi(0)" name="tabla">
                                                    <input type="text" id="nomTabla" style="display: none" value="Medicamentos" name="nomTabla">
                                                    <input type="text" value=":" name="coma" id="coma" style="display: none">
                                                    <input class="btn btn-outline-info" type="submit" value="Exportar CSV con ( : )" id="btnCsvM">
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


        <div class="col-sm-6">
            <br>
            <div class="card" style="border-right-width: 1px; margin-right: -285px;">
                <div class="card-body">
                    <table class="table table-hover" id="tableRealizarV">
                        <!-- <tr>
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
                        </tr> -->

                        <!-- ------------------------------
                        
                        venta

                        ---------------------------------------------------- -->
                        <thead>
                            <b>
                                <h2 style="text-align: center;">Realizar Venta</h2>
                            </b>
                            <hr>
                            <input type="text" id="txtIddetalleventa" style="display: none" value="">
                            <label for=""><b>Cliente: &nbsp;&nbsp;&nbsp;</b></label>
                            <select class="form-control" id="txtIdClienteVenta" name="laboratorio" style="display: inline-block; width: 40%;"></select>
                            <tr>
                                <th style="display: none">id</th>
                                <th>Medicamento</th>
                                <th>Laboratorio</th>
                                <th>Cantidad</th>
                                <th>Inventario</th>
                                <th>Precio/Unitario</th>
                                <th>Accion</th>
                                <!-- <th>Descripción</th> -->
                            </tr>
                        </thead>
                        <tbody id="bodyTableV">
                        </tbody>
                        <tr>
                            <td>
                                <input class="btn btn-success" type="button" value="Comprar" id="btnCompra">

                            </td>
                            <!-- <td>
                                <input class="btn btn-outline-dark" type="button" value="Limpiar" id="btnLimpiarD">
                            </td>
                            <td>
                                <input class="btn btn-warning" type="button" value="Editar Compra " id="btnModificarC">
                            </td>
                            <td>
                                <input class="btn btn-danger" type="button" value="Eliminar Compra" id="btnEliminarC">
                            </td> -->
                        </tr>
                    </table>
                    <label for=""><b>Precio Total: &nbsp;&nbsp;</b></label>
                    <input type="number" name="txtPrecioVenta" id="precioVenta" placeholder="Precio Total" readonly>
                </div>
            </div>
        </div>
    </div>
</body>

</html>