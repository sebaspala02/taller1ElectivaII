var precioTotal = 0;
var medisV = [];
var cantmedisV = [];
$(document).ready(function() {
  listarVentas();
  // listDeptos();
  // listMunicipios();
  // $("#btnGuardarV").click(guardarVenta);
  $("#btnModificarV").click(guardarVenta);
  // $("#btnEliminarV").click(eliminarVenta);
  $("#btnCompra").click(guardarVenta);
  $("#tableRealizarV").on("click", "a", function(e) {
    $(this)
      .closest("tr")
      .remove();
    calcularPrecio();
  });
});

function guardarVenta() {
  console.log(medisV.toString());
  let objCliente = {
    fecha: new Date(),
    medi: medisV.toString() + ",",
    cant: cantmedisV.toString() + ",",
    total: $("#precioVenta").val(),
    cliente: $("#txtIdClienteVenta").val(),
    usuario: 1,
    type: ""
  };
  if (
    objCliente.fecha !== "" &&
    objCliente.total !== "" &&
    objCliente.cliente != 0 &&
    objCliente.usuario !== ""
  ) {
    // if (objCliente.id !== "") {
    // objCliente.type = "update";
    // } else {
    objCliente.type = "save";
    // }
    $.ajax({
      type: "post",
      url: "controller/ctlDetalle.php",
      beforeSend: function() {},
      data: objCliente,
      success: function(data) {
        console.log(data);
        var info = JSON.parse(data);
        console.log(info);
        if (info.res === "Success") {
          limpiar();
          Swal.fire("Operacion exitosa");
          listarVentas();
          listarMedi();
        } else {
          Swal.fire("No se pudo almacenar");
        }
      },
      error: (jqXHR, textStatus, errorThrown) => {
        Swal.fire(
          "Error detectado: " + textStatus + "\nException: " + errorThrown
        );
        Swal.fire("verifique la ruta de archivo!");
      }
    });
  } else {
    Swal.fire("Ingrese todos los datos");
  }
}

function listarVentas() {
  $.ajax({
    type: "post",
    url: "controller/ctlDetalle.php",
    beforeSend: function() {},
    data: { type: "list" },

    success: function(respuesta) {
      console.log(respuesta);
      const res = JSON.parse(respuesta);
      const info = JSON.parse(res.data);

      var lista = "";

      if (info.length > 0) {
        for (k = 0; k < info.length; k++) {
          lista =
            lista +
            '<tr id="codigo" onclick="listarDetalle(' +
            info[k].idventa +
            ')">';
          lista =
            lista + '<td style="display: none">' + info[k].idventa + "</td>";
          lista = lista + "<td>" + info[k].cliente + "</td>";
          lista = lista + "<td>" + info[k].fecha_venta + "</td>";
          lista = lista + "<td>" + info[k].valor_total + "</td>";
          // if (info[k].piscina === '1') {
          //     lista = lista + '<td>SI</td>';
          // } else {
          //     lista = lista + '<td>NO</td>';
          // }
          lista = lista + "</tr>";
        }
        $("#listaVenta").html(lista);
        $("#tableVentas").dataTable();
      } else {
        $("#listaCliente").html(
          "<tr><td>No se encuentra informacion</td>></tr>"
        );
      }
    },
    error: (jqXHR, textStatus, errorThrown) => {
      Swal.fire(
        "Error detectado: " + textStatus + "\nException: " + errorThrown
      );
      Swal.fire("verifique la ruta de archivo!");
    }
  });
}

function listarDetalle(id) {
  $('#txtReporteDV').val("DetalleV("+id+")")
  $.ajax({
    type: "post",
    url: "controller/ctlDetalle.php",
    beforeSend: function() {},
    data: { type: "listD", idventa: id },

    success: function(respuesta) {
      console.log(respuesta);
      const res = JSON.parse(respuesta);
      const info = JSON.parse(res.data);

      var lista = "";

      if (info.length > 0) {
        for (k = 0; k < info.length; k++) {
          lista = lista + '<tr id="codigo"></tr>';
          lista =
            lista +
            '<td style="display: none">' +
            info[k].iddetalle_venta +
            "</td>";
          lista = lista + "<td>" + info[k].cant + "</td>";
          lista = lista + "<td>" + info[k].nombre + "</td>";
          lista = lista + "<td>" + info[k].venta_idventa + "</td>";
          lista =
            lista +
            "<td>" +
            '<input class="btn btn-outline-dark" type="button" value="Devolver" id="btnDev"></input>' +
            "</td>"; // if (info[k].piscina === '1') {
          //     lista = lista + '<td>SI</td>';
          // } else {
          //     lista = lista + '<td>NO</td>';
          // }
          lista = lista + "</tr>";
        }
        $("#listaDetalle").html(lista);
        $("#tableDetalle").dataTable();
      } else {
        $("#listaCliente").html(
          "<tr><td>No se encuentra informacion</td>></tr>"
        );
      }
    },
    error: (jqXHR, textStatus, errorThrown) => {
      Swal.fire(
        "Error detectado: " + textStatus + "\nException: " + errorThrown
      );
      Swal.fire("verifique la ruta de archivo!");
    }
  });
}
function listarMedi() {
  $.ajax({
    type: "post",
    url: "controller/ctlMedi.php",
    beforeSend: function() {},
    data: { type: "list" },

    success: function(respuesta) {
      const res = JSON.parse(respuesta);
      const info = JSON.parse(res.data);

      var lista = "";

      if (info.length > 0) {
        // let a =
        for (k = 0; k < info.length; k++) {
          if (info[k].cantidad > 0) {
            lista =
              lista +
              '<tr id="codigo" onclick="agregarMedi(' +
              info[k].idmedicamento +
              ",'" +
              info[k].nombre +
              "'," +
              info[k].precio +
              ",'" +
              info[k].laboratorio +
              "'," +
              info[k].cantidad +
              "," +
              info[k].idlaboratorio +
              ')">';
            lista =
              lista +
              '<th style="display: none">' +
              info[k].idmedicamento +
              "</th>";

            lista = lista + "<th>" + info[k].nombre + "</th>";
            lista = lista + "<th>" + info[k].vencimiento + "</th>";
            lista = lista + "<th>" + info[k].cantidad + "</th>";
            lista = lista + "<th>" + info[k].precio + "</th>";
            lista =
              lista + "<th>" + info[k].laboratorio + "</th>";
            //   lista = lista + "<th>" + info[k].descripcion + "</th>";
            lista = lista + "</tr>";
          }
        }
        $("#listaMediV").html(lista);
        $("#tableMedisV").dataTable();

        // {
        //     "language": {
        //         "lengthMenu": "Mostrar _MENU_ elementos por pagina",
        //         "zeroRecords": "No se encuentra la informacion",
        //         "info": "Mostrando pagina _PAGE_ de _PAGES_",
        //         "infoEmpty": "Informacion vacia",
        //         "infoFiltered": "(filtered from _MAX_ total records)",
        //         "search": "Buscar:",
        //         "paginate": {
        //             "first": "Primero",
        //             "last": "Ultimo",
        //             "next": "Siguiente",
        //             "previous": "Anterior"
        //         },
        //     }
        // }
      } else {
        $("#listaMedi").html("<tr><th>No se encuentra informacion</th>></tr>");
      }
    },
    error: (jqXHR, textStatus, errorThrown) => {
      Swal.fire(
        "Error detectado: " + textStatus + "\nException: " + errorThrown
      );
      Swal.fire("verifique la ruta de archivo!");
    }
  });
}

function agregarMedi(id, nombre, precio, labo, cantidad,idlaboratorio) {
  var existe = $("tr[value='" + id + "']");
  if (existe.length > 0) {
    Swal.fire("El medicamento elegido ya esta en la venta");
  } else {
    $("#bodyTableV").append(
      "<tr value='" +
        id +
        "'><td style='display: none'>" +
        id +
        "</td><td>" +
        nombre +
        "</td> <td>" +
        labo +
        "</td> <td> <input type='number'onClick='calcularPrecio()'onChange='calcularPrecio()' onkeydown='calcularPrecio()' value='1' min='1' max='" +
        cantidad +
        "'" +
        " value='1'> </td><td>" +
        cantidad +
        "</td> <td>" +
        precio +
        "</td> <td> <a href='javascript:'> Eliminar </a> </td> </tr>"
    );
    // arrInv.push(id);
    // actualiza_total();
  }
  // let text = '<tr>'
  calcularPrecio();
  //     + '<td style="display: none">' + id + '</td>'
  //     + '< td >' + nombre + '</td >'
  //     + '< td >' + labo + '</td >'
  //     + '< td > <input class="form-control" type="number" placeholder="Cant." id="txtCantidad" required> </td >'
  //     + '< td >' + precio + '</td >'
  //     + '</tr>';
  // $('#tableRealizarV').find('tbody').append("'"+text+"'")
}

// function agrega_venta(id, cantidad, precio) {
//     var existe = $("tr[value='" + id + "'][class='tr_venta']");
//     if (existe.length > 0) {
//         Swal.fire('El medicamento elegido ya esta en la venta');
//     } else {
//         $("#body_venta").append("<tr value='" + id + "' class='tr_venta' data-precio='" + precio + "'> <td>" + $("tr[value=" + id + "]").data('nombre') + "</td> <td> <input type='number' onkeydown='return false' data-precio='" + precio + "'class='cantidad_venta' value='1' min='1' max='" + cantidad + "'> </td> <td data-unitario='" + precio + "' class='valor_medicamento'>" + precio + "</td> <td> <button class='btn_elimina btn btn-danger btn-sm' value='" + id + "'type='button'> X </button> </td> </tr>")
//         arrInv.push(id);
//         actualiza_total();
//     }
// }
function calcularPrecio() {
  precioTotal = 0;
  medisV = [];
  cantmedisV = [];
  $("#bodyTableV tr").each(function() {
    let id = parseFloat(
      $(this)
        .find("td")
        .eq(0)
        .text()
    );
    let cant = parseFloat(
      $(this)
        .find("td")
        .find("input")
        .val()
    );
    let prec = parseFloat(
      $(this)
        .find("td")
        .eq(5)
        .text()
    );
    precioTotal += cant * prec;
    medisV.push(id);
    cantmedisV.push(cant);
  });
  $("#precioVenta").val(precioTotal);
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
        Swal.fire("No se encuentra");
        limpiar();
      }
    }
  });
}
// function guardarVenta() {
//     let objCliente = {
//         vtotal: precioTotal,
//         vfecha: new Date(),
//         vinv: medisV,
//         vcant: cantmedisV,
//         vcliente: parseInt($('#txtIdClienteVenta').val()),
//         vusuario: 1,
//         type: ""
//     };
//     console.log(objCliente)
//     if (
//         objCliente.vtotal !== "" &&
//         objCliente.vfecha !== "" &&
//         objCliente.vinv !== "" &&
//         objCliente.vcant !== "" &&
//         objCliente.vcliente !== "" &&
//         objCliente.vusuario !== ""
//     ) {
//         if (objCliente.idcliente !== "") {
//             objCliente.type = "update";
//         } else {
//             objCliente.type = "save";
//         }
//         $.ajax({
//             type: "post",
//             url: "controller/ctlVenta.php",
//             beforeSend: function () { },
//             data: objCliente,
//             success: function (data) {
//                 console.log(data);
//                 var info = JSON.parse(data);
//                 console.log(info);
//                 if (info.res === "Success") {
//                     limpiar();
//                     Swal.fire("Operacion exitosa");
//                     listarVentas();
//                 } else {
//                     Swal.fire("No se pudo almacenar");
//                 }
//             },
//             error: (jqXHR, textStatus, errorThrown) => {
//                 Swal.fire("Error detectado: " + textStatus + "\nException: " + errorThrown);
//                 Swal.fire("verifique la ruta de archivo!");
//             }
//         });
//     } else {
//         Swal.fire("Ingrese todos los datos");
//     }
// }

// function eliminarVenta() {
//     var dato = $("#txtIdClienteVenta").val();
//     if (dato == "") {
//         Swal.fire("Debe cargar los datos a eliminar");
//     } else {
//         const objCliente = {
//             idcliente: dato,
//             type: "delete"
//         };

//         $.ajax({
//             type: "post",
//             url: "controller/ctlCliente.php",
//             beforeSend: function () { },
//             data: objCliente,
//             success: function (res) {
//                 var info = JSON.parse(res);
//                 if (info.res == "Success") {
//                     limpiar();
//                     Swal.fire("Eliminado con exito");
//                     listarVentas();
//                 } else {
//                     Swal.fire("No se pudo eliminar");
//                     limpiar();
//                 }
//             },
//             error: (jqXHR, textStatus, errorThrown) => {
//                 Swal.fire("Error detectado: " + textStatus + "\nException: " + errorThrown);
//                 Swal.fire("verifique la ruta de archivo!");
//             }
//         });
//     }
// }

function limpiar() {
  $("#txtIdClienteVenta").val(0);
  $("#bodyTableV").html("");
  $("#precioVenta").val(0);
  $("#txtfecha_ventaCliente").val("");
  $("#txtvalor_totalCliente").val("");
  $("#txtcliente_idclienteCliente").val("");
  $("#txtusuario_idusuario").val("");
}
