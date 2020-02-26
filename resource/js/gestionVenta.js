$(document).ready(function() {
    listarVentas();
    // listDeptos();
    // listMunicipios();
    $("#btnGuardarV").click(guardarVenta);
    $("#btnModificarV").click(guardarVenta);
    $("#btnEliminarV").click(eliminarVenta);
});

function guardarVenta() {
    let objCliente = {
        fecha_venta: new Date(),
        valor_total: $("#txtvalor_totalCliente").val(),
        cliente_idcliente: $("#txtCedulaClienteVenta").val(),
        usuario_idusuario: $("#txtusuario_idusuario").val(),
        type: ""
    };
    if (
        objCliente.fecha_venta !== "" &&
        objCliente.valor_total !== "" &&
        objCliente.cliente_idcliente !== "" &&
        objCliente.usuario_idusuario !== ""
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
                    listarVentas();
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

function listarVentas() {
    $.ajax({
        type: "post",
        url: "controller/ctlCliente.php",
        beforeSend: function() {},
        data: { type: "list" },

        success: function(respuesta) {
            //console.log(data);
            const res = JSON.parse(respuesta);
            const info = JSON.parse(res.data);

            var lista = "";

            if (info.length > 0) {
                for (k = 0; k < info.length; k++) {
                    lista = lista + '<tr id="codigo" onclick="listarVenta(' + info[k].idcliente + ')">';
                    lista = lista + '<td style="display: none">' + info[k].idcliente + "</td>";
                    lista = lista + "<td>" + info[k].fecha_venta + "</td>";
                    lista = lista + "<td>" + info[k].valor_total + "</td>";
                    lista = lista + "<td>" + info[k].cliente_idcliente + "</td>";
                    lista = lista + "<td>" + info[k].usuario_idusuario + "</td>";
                    // if (info[k].piscina === '1') {
                    //     lista = lista + '<td>SI</td>';
                    // } else {
                    //     lista = lista + '<td>NO</td>';
                    // }
                    lista = lista + "</tr>";
                }
                $("#listaCliente").html(lista);
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

function listarVenta(codigo) {
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
                $("#txtfecha_ventaCliente").val(data[0].fecha_venta);
                $("#txtvalor_totalCliente").val(data[0].valor_total);
                $("#txtcliente_idclienteCliente").val(data[0].cliente_idcliente);
                $("#txtusuario_idusuario").val(data[0].usuario_idusuario);
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
//                     combo = combo + "<option value='" + municipios[k].idMunicipio + "'>" + municipios[k].fecha_ventaMpio + "</option>";
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

function eliminarVenta() {
    var dato = $("#txtIdClienteVenta").val();
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
                    listarVentas();
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
    $("#txtfecha_ventaCliente").val("");
    $("#txtvalor_totalCliente").val("");
    $("#txtcliente_idclienteCliente").val("");
    $("#txtusuario_idusuario").val("");
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
//                     lista = lista + "<option value='" + info[k].idDepartamento + "'>" + info[k].fecha_ventaDepto + "</option>";
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