$(document).ready(function() {
    listarFincas();
    listDeptos();
    listMunicipios();
    $("#btnGuardar").click(guardarFinca);
    $("#btnModificar").click(guardarFinca);
    $("#btnEliminar").click(eliminarFinca);
});

function guardarFinca() {
    let objFinca = {
        idFinca: $("#txtIdFinca").val(),
        nombreFinca: ($("#txtNombre").val()).toUpperCase(),
        tamanio: $("#txtTamanio").val(),
        idMunicipio: $("#txtMunicipio").val(),
        cantidad: $("#txtCantidad").val(),
        piscina: $("#txtPiscina").val(),
        descripcion: ($("#txtDescripcion").val()).toUpperCase(),
        type: ""
    };
    if (
        objFinca.nombreFinca !== "" &&
        objFinca.tamanio !== "" &&
        objFinca.idMunicipio !== "" &&
        objFinca.cantidad !== "" &&
        objFinca.piscina !== "" &&
        objFinca.descripcion !== ""
    ) {
        if (objFinca.idFinca !== "") {
            objFinca.type = 'update';
        } else {
            objFinca.type = 'save';
        }
        $.ajax({
            type: 'post',
            url: "controller/ctlFinca.php",
            beforeSend: function() {},
            data: objFinca,
            success: function(data) {
                console.log(data);
                var info = JSON.parse(data);
                console.log(info);
                if (info.res === "Success") {
                    limpiar();
                    alert("Operacion exitosa");
                    listarFincas();
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

function listarFincas() {
    $.ajax({
        type: 'post',
        url: "controller/ctlFinca.php",
        beforeSend: function() {

        },
        data: { type: 'list' },

        success: function(respuesta) {
            //console.log(data);
            const res = JSON.parse(respuesta);
            const info = JSON.parse(res.data);

            var lista = "";

            if (info.length > 0) {
                for (k = 0; k < info.length; k++) {
                    lista = lista + '<tr id="codigo" onclick="buscarFinca(' + info[k].idFinca + ')">';
                    lista = lista + '<td style="display: none">' + info[k].idFinca + '</td>';
                    lista = lista + '<td>' + info[k].nombreFinca + '</td>';
                    lista = lista + '<td>' + info[k].tamanio + '</td>';
                    lista = lista + '<td>' + info[k].nombreMpio + '</td>';
                    lista = lista + '<td>' + info[k].nombreDepto + '</td>';
                    lista = lista + '<td>' + info[k].cantidad + '</td>';
                    if (info[k].piscina === '1') {
                        lista = lista + '<td>SI</td>';
                    } else {
                        lista = lista + '<td>NO</td>';
                    }
                    lista = lista + '<td>' + info[k].descripcion + '</td>';
                    lista = lista + '</tr>';
                }
                $("#listaFincas").html(lista);
            } else {
                $("#listaFincas").html("<tr><td>No se encuentra informacion</td>></tr>");
            }
        },
        error: (jqXHR, textStatus, errorThrown) => {
            alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
            alert("verifique la ruta de archivo!");
        }
    });
}

function buscarFinca(codigo) {
    $("#txtIdFinca").val(codigo);
    const objFinca = {
        idFinca: $("#txtIdFinca").val(),
        type: 'search'
    };
    
    $.ajax({
        type: 'post',
        url: "controller/ctlFinca.php",
        async: false,
        beforeSend: function() {

        },
        data: objFinca,
        success: function(res) {
            const info = JSON.parse(res);
            let data;
            if (info.res !== "NotInfo") {
                data = JSON.parse(info.data);
            }
            if (info.msj === "Success") {
                $("#txtNombre").val(data[0].nombreFinca);
                $("#txtTamanio").val(data[0].tamanio);
                $("#txtDepto").val(data[0].Departamento_idDepartamento);
                $("#txtMunicipio").val(data[0].Municipio_idMunicipio);
                $("#txtCantidad").val(data[0].cantidad);
                $("#txtPiscina").val(data[0].piscina);
                $("#txtDescripcion").val(data[0].descripcion);
            } else {
                alert("No se encuentra");
                limpiar();
            }
        }
    });
}

function listMunicipios() {
    console.log($('#txtDepto').val())
    $.ajax({
        type: 'post',
        url: "controller/ctlList.php",
        data: { type: 'loadListMuni', depto: $('#txtDepto').val()},
        success: function (response) {
            var aux= JSON.parse(response)
            var municipios = JSON.parse(aux.data);
            console.log(municipios)
            var combo = "<option value='0'>---SELECCIONAR MUNICIPIO---</option>";
            if (municipios.length > 0) {
                for (k = 0; k < municipios.length; k++) {
                    combo = combo + "<option value='" + municipios[k].idMunicipio + "'>" + municipios[k].nombreMpio + "</option>";
                }
                $("#txtMunicipio").html(combo);
            } else {

            }
        },
        error: (jqXHR, textStatus, errorThrown) => {
            alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
            alert("verifique la ruta de archivo!");
        }
    });
}

function eliminarFinca() {
    var dato = $("#txtIdFinca").val();
    if (dato == "") {
        alert("Debe cargar los datos a eliminar");
    } else {
        const objFinca = {
            idFinca: dato,
            type: 'delete'
        };

        $.ajax({
            type: 'post',
            url: "controller/ctlFinca.php",
            beforeSend: function() {

            },
            data: objFinca,
            success: function(res) {
                var info = JSON.parse(res);
                if (info.res == "Success") {
                    limpiar();
                    alert("Eliminado con exito");
                    listarFincas();
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
    $("#txtIdFinca").val("");
    $("#txtNombre").val("");
    $("#txtTamanio").val("");
    $("#txtDepto").val(0);
    $("#txtMunicipio").val(0);
    $("#txtCantidad").val("");
    $("#txtPiscina").val("");
    $("#txtDescripcion").val("");
}

function listDeptos() {
    $.ajax({
        type: 'post',
        url: "controller/ctlList.php",
        beforeSend: function() {

        },
        data: { type: 'loadListDepto' },
        success: function(respuesta) {
            const res = JSON.parse(respuesta);
            const info = JSON.parse(res.data);
            var lista = "<option value='0'>---SELECCIONE DEPTO---</option>";

            if (info.length > 0) {
                for (k = 0; k < info.length; k++) {
                    lista = lista + "<option value='" + info[k].idDepartamento + "'>" + info[k].nombreDepto + "</option>";
                }
                $("#txtDepto").html(lista);
            } else {

            }
        },
        error: (jqXHR, textStatus, errorThrown) => {
            alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
            alert("verifique la ruta de archivo!");
        }
    });
}