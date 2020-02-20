$(document).ready(function() {
    listarUsuarios();
    // listDeptos();
    // listMunicipios();
    $("#btnGuardar").click(guardarUsuario);
    $("#btnModificar").click(guardarUsuario);
    $("#btnEliminar").click(eliminarUsuario);
});

function guardarUsuario() {
    let objUsuario = {
        idusuario: $("#txtIdUsuario").val(),
        cedula: $("#txtCedula").val(),
        nombre: ($("#txtNombre").val()).toUpperCase(),
        apellido: ($("#txtApellido").val()).toUpperCase(),
        correo: ($("#txtCorreo").val()).toUpperCase(),
        usuario: ($("#txtUsuario").val()).toUpperCase(),
        password: ($("#txtPassword").val()).toUpperCase(),
        type: ""
    };
    if (
        objUsuario.cedula !== "" &&
        objUsuario.nombre !== "" &&
        objUsuario.apellido !== "" &&
        objUsuario.correo !== "" &&
        objUsuario.usuario !== "" &&
        objUsuario.password !== ""
    ) {
        if (objUsuario.idusuario !== "") {
            objUsuario.type = 'update';
        } else {
            objUsuario.type = 'save';
        }
        $.ajax({
            type: 'post',
            url: "controller/ctlUsuario.php",
            beforeSend: function() {},
            data: objUsuario,
            success: function(data) {
                console.log(data);
                var info = JSON.parse(data);
                console.log(info);
                if (info.res === "Success") {
                    limpiar();
                    alert("Operacion exitosa");
                    listarUsuarios();
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

function listarUsuarios() {
    $.ajax({
        type: 'post',
        url: "controller/ctlUsuario.php",
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
                    lista = lista + '<tr id="codigo" onclick="buscarUsuario(' + info[k].idusuario + ')">';
                    lista = lista + '<td style="display: none">' + info[k].idusuario + '</td>';
                    lista = lista + '<td>' + info[k].cedula + '</td>';
                    lista = lista + '<td>' + info[k].nombre + '</td>';
                    lista = lista + '<td>' + info[k].apellido + '</td>';
                    lista = lista + '<td>' + info[k].correo + '</td>';
                    lista = lista + '<td>' + info[k].usuario + '</td>';
                    lista = lista + '<td>' + info[k].password + '</td>';
                    // if (info[k].piscina === '1') {
                    //     lista = lista + '<td>SI</td>';
                    // } else {
                    //     lista = lista + '<td>NO</td>';
                    // }
                    lista = lista + '</tr>';
                }
                $("#listaUsuarios").html(lista);
            } else {
                $("#listaUsuarios").html("<tr><td>No se encuentra informacion</td>></tr>");
            }
        },
        error: (jqXHR, textStatus, errorThrown) => {
            alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
            alert("verifique la ruta de archivo!");
        }
    });
}

function buscarUsuario(codigo) {
    $("#txtIdUsuario").val(codigo);
    const objUsuario = {
        idusuario: $("#txtIdUsuario").val(),
        type: 'search'
    };
    
    $.ajax({
        type: 'post',
        url: "controller/ctlUsuario.php",
        async: false,
        beforeSend: function() {

        },
        data: objUsuario,
        success: function(res) {
            const info = JSON.parse(res);
            let data;
            if (info.res !== "NotInfo") {
                data = JSON.parse(info.data);
            }
            if (info.msj === "Success") {
                $("#txtCedula").val(data[0].cedula);
                $("#txtNombre").val(data[0].nombre);
                $("#txtApellido").val(data[0].apellido);
                $("#txtCorreo").val(data[0].correo);
                $("#txtUsuario").val(data[0].usuario);
                $("#txtPassword").val(data[0].password);
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

function eliminarUsuario() {
    var dato = $("#txtIdUsuario").val();
    if (dato == "") {
        alert("Debe cargar los datos a eliminar");
    } else {
        const objUsuario = {
            idusuario: dato,
            type: 'delete'
        };

        $.ajax({
            type: 'post',
            url: "controller/ctlUsuario.php",
            beforeSend: function() {

            },
            data: objUsuario,
            success: function(res) {
                var info = JSON.parse(res);
                if (info.res == "Success") {
                    limpiar();
                    alert("Eliminado con exito");
                    listarUsuarios();
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
    $("#txtIdUsuario").val("");
    $("#txtCedula").val("");
    $("#txtNombre").val("");
    $("#txtApellido").val(0);
    $("#txtCorreo").val(0);
    $("#txtUsuario").val("");
    $("#txtPassword").val("");
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
// }