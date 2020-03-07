$(document).ready(function () {
    // $('#tableUsuarios').dataTable( {
    //     "language": {
    //         "lengthMenu": "Mostrar _MENU_ elementos por pagina",
    //         "zeroRecords": "No se encuentra la informacion",
    //         "info": "Mostrando pagina _PAGE_ de _PAGES_",
    //         "infoEmpty": "Informacion vacia",
    //         "infoFiltered": "(filtered from _MAX_ total records)",
    //         "search": "Buscar:",
    //         "paginate": {
    //             "first":      "Primero",
    //             "last":       "Ultimo",
    //             "next":       "Siguiente",
    //             "previous":   "Anterior"
    //         },
    //     }
    // } )
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
        nombre: ($("#txtNombre").val()).toLowerCase(),
        apellido: ($("#txtApellido").val()).toLowerCase(),
        correo: ($("#txtCorreo").val()).toLowerCase(),
        usuario: $("#txtUsuario").val().toLowerCase(),
        password: $("#txtPassword").val(),
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
            beforeSend: function () { },
            data: objUsuario,
            success: function (data) {
                var info = JSON.parse(data);
                console.log(info);
                if (info.res === "Success") {
                    limpiar();
                    Swal.fire(
                        'Operacion Exitosa!',
                        'Usuario guardado',
                        'success'
                    )
                    listarUsuarios();
                } else {
                    Swal.fire(
                        'Error!',
                        'No se pudo almacenar',
                        'error'
                    )
                }
            },
            error: (jqXHR, textStatus, errorThrown) => {
                Swal.fire("Error detectado: " + textStatus + "\nException: " + errorThrown);
                Swal.fire("verifique la ruta de archivo!");
            }
        });
    } else {
        Swal.fire(
            'No se pudo almacenar',
            'Llenar todos los campos',
            'warning'
        )
    }
}

function listarUsuarios() {
    $.ajax({
        type: 'post',
        url: "controller/ctlUsuario.php",
        beforeSend: function () {

        },
        data: { type: 'list' },

        success: function (respuesta) {
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
                $('#tableUsuarios').dataTable()
            } else {
                $("#listaUsuarios").html("<tr><td>No se encuentra informacion</td>></tr>");
            }
        },
        error: (jqXHR, textStatus, errorThrown) => {
            Swal.fire("Error detectado: " + textStatus + "\nException: " + errorThrown);
            Swal.fire("verifique la ruta de archivo!");
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
        beforeSend: function () {

        },
        data: objUsuario,
        success: function (res) {
            // console.log(data);
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
                Swal.fire("No se encuentra");
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
//             Swal.fire("Error detectado: " + textStatus + "\nException: " + errorThrown);
//             Swal.fire("verifique la ruta de archivo!");
//         }
//     });
// }

function eliminarUsuario() {
    var dato = $("#txtIdUsuario").val();
    if (dato == "") {
        Swal.fire("Debe cargar los datos a eliminar");
    } else {
        const objUsuario = {
            idusuario: dato,
            type: 'delete'
        };

        $.ajax({
            type: 'post',
            url: "controller/ctlUsuario.php",
            beforeSend: function () {

            },
            data: objUsuario,
            success: function (res) {
                var info = JSON.parse(res);
                if (info.res == "Success") {
                    limpiar();
                    Swal.fire(
                        'Operacion Exitosa!',
                        'Usuario eliminado',
                        'success'
                    )
                    listarUsuarios();
                } else {
                    Swal.fire(
                        'Error!',
                        'No se pudo eliminar',
                        'error'
                    )
                    limpiar();
                }
            },
            error: (jqXHR, textStatus, errorThrown) => {
                Swal.fire("Error detectado: " + textStatus + "\nException: " + errorThrown);
                Swal.fire("verifique la ruta de archivo!");
            }
        });
    }
}


function limpiar() {
    $("#txtIdUsuario").val("");
    $("#txtCedula").val("");
    $("#txtNombre").val("");
    $("#txtApellido").val("");
    $("#txtCorreo").val("");
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
//             Swal.fire("Error detectado: " + textStatus + "\nException: " + errorThrown);
//             Swal.fire("verifique la ruta de archivo!");
//         }
//     });
// }