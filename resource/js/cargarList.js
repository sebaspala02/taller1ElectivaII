$(document).ready(function () {
  listUsuarios();
  listLabs();
  listClientes();
  listTipoUsuarios();
  listShelf();
  listSuppliers();
});

function listUsuarios() {
  $.ajax({
    type: "post",
    url: "controller/ctlList.php",
    beforeSend: function () {},
    data: { type: "loadListUsuarios" },
    success: function (respuesta) {
      const res = JSON.parse(respuesta);
      const info = JSON.parse(res.data);
      var lista = "<option value='0'>.: Seleccionar :. </option>";

      if (info.length > 0) {
        for (k = 0; k < info.length; k++) {
          lista =
            lista +
            "<option value='" +
            info[k].idusuario +
            "'>" +
            info[k].nombre +
            "</option>";
        }
        $("#txtIdUsuario").html(lista);
      } else {
      }
    },
    error: (jqXHR, textStatus, errorThrown) => {
      Swal.fire(
        "Error detectado: " + textStatus + "\nException: " + errorThrown
      );
      Swal.fire("verifique la ruta de archivo!");
    },
  });
}

function listTipoUsuarios() {
  $.ajax({
    type: "post",
    url: "controller/ctlList.php",
    beforeSend: function () {},
    data: { type: "loadListTipoUsuarios" },
    success: function (respuesta) {
      const res = JSON.parse(respuesta);
      const info = JSON.parse(res.data);
      var lista = "<option value='0'>.: Seleccionar :.</option>";
      if (info.length > 0) {
        for (k = 0; k < info.length; k++) {
          lista = lista + "<option value='" + info[k].idTipoUsuario + "'>" + info[k].nombre + "</option>";
        }
        $("#txtIdTipoUsuario").html(lista);
      } else {
      }
    },
    error: (jqXHR, textStatus, errorThrown) => {
      Swal.fire(
        "Error detectado: " + textStatus + "\nException: " + errorThrown
      );
      Swal.fire("verifique la ruta de archivo!");
    },
  });
}

function listLabs() {
  $.ajax({
    type: "post",
    url: "controller/ctlList.php",
    beforeSend: function () {},
    data: { type: "loadListLabs" },
    success: function (respuesta) {
      const res = JSON.parse(respuesta);
      const info = JSON.parse(res.data);
      var lista = "<option value='0'>.: Seleccionar :. </option>";

      if (info.length > 0) {
        for (k = 0; k < info.length; k++) {
          lista =
            lista +
            "<option value='" +
            info[k].idlaboratorio +
            "'>" +
            info[k].nombre +
            "</option>";
        }
        $("#txtIdLaboratorio").html(lista);
      } else {
      }
    },
    error: (jqXHR, textStatus, errorThrown) => {
      Swal.fire(
        "Error detectado: " + textStatus + "\nException: " + errorThrown
      );
      Swal.fire("verifique la ruta de archivo!");
    },
  });
}
function listSuppliers() {
  $.ajax({
    type: "post",
    url: "controller/ctlList.php",
    beforeSend: function () {},
    data: { type: "loadListSuppliers" },
    success: function (respuesta) {
      const res = JSON.parse(respuesta);
      const info = JSON.parse(res.data);
      var lista = "<option value='0'>.: Seleccionar :. </option>";

      if (info.length > 0) {
        for (k = 0; k < info.length; k++) {
          lista =
            lista +
            "<option value='" +
            info[k].idproveedor +
            "'>" +
            info[k].nombre +
            "</option>";
        }
        $("#txtIdProveedor").html(lista);
      } else {
      }
    },
    error: (jqXHR, textStatus, errorThrown) => {
      Swal.fire(
        "Error detectado: " + textStatus + "\nException: " + errorThrown
      );
      Swal.fire("verifique la ruta de archivo!");
    },
  });
}
function listShelf() {
  $.ajax({
    type: "post",
    url: "controller/ctlList.php",
    beforeSend: function () {},
    data: { type: "loadListShelf" },
    success: function (respuesta) {
      const res = JSON.parse(respuesta);
      const info = JSON.parse(res.data);
      var lista = "<option value='0'>.: Seleccionar :. </option>";

      if (info.length > 0) {
        for (k = 0; k < info.length; k++) {
          lista =
            lista +
            "<option value='" +
            info[k].idestante +
            "'>" +
            info[k].categoria +
            "</option>";
        }
        $("#txtIdEstanteria").html(lista);
      } else {
      }
    },
    error: (jqXHR, textStatus, errorThrown) => {
      Swal.fire(
        "Error detectado: " + textStatus + "\nException: " + errorThrown
      );
      Swal.fire("verifique la ruta de archivo!");
    },
  });
}
function listClientes() {
  $.ajax({
    type: "post",
    url: "controller/ctlList.php",
    beforeSend: function () {},
    data: { type: "loadListClientes" },
    success: function (respuesta) {
      const res = JSON.parse(respuesta);
      const info = JSON.parse(res.data);
      var lista = "<option value='0'>.: Seleccionar :. </option>";

      if (info.length > 0) {
        for (k = 0; k < info.length; k++) {
          lista =
            lista +
            "<option value='" +
            info[k].idcliente +
            "'>" +
            info[k].nombre +
            " " +
            info[k].apellido +
            "</option>";
        }
        $("#txtIdClienteVenta").html(lista);
      } else {
      }
    },
    error: (jqXHR, textStatus, errorThrown) => {
      Swal.fire(
        "Error detectado: " + textStatus + "\nException: " + errorThrown
      );
      Swal.fire("verifique la ruta de archivo!");
    },
  });
}

// function listFinca() {
//     $.ajax({
//         type: 'post',
//         url: "controller/ctlList.php",
//         beforeSend: function() {

//         },
//         data: { type: 'loadListFinca' },
//         success: function(respuesta) {
//             const res = JSON.parse(respuesta);
//             const info = JSON.parse(res.data);
//             var lista = "<option value='0'>---SELECCIONE---</option>";

//             if (info.length > 0) {
//                 for (k = 0; k < info.length; k++) {
//                     lista = lista + "<option value='" + info[k].idFinca + "'>" + info[k].nombreFinca + "</option>";
//                 }
//                 $("#txtFinca").html(lista);
//             } else {

//             }
//         },
//         error: (jqXHR, textStatus, errorThrown) => {
//             Swal.fire("Error detectado: " + textStatus + "\nException: " + errorThrown);
//             Swal.fire("verifique la ruta de archivo!");
//         }
//     });
// }

// function listMunicipios() {
//     const objMunicipio = {
//         valor: $("#txtDepto").val(),
//         type: 'loadListMuni'
//     };
//     $.ajax({
//         type: 'post',
//         url: "controller/ctlList.php",
//         beforeSend: function() {},
//         data: objMunicipio,
//         success: function(respuesta) {

//             const res = JSON.parse(respuesta);
//             const info = JSON.parse(res.data);

//             var lista = "<option value='0'>---SELECCIONE---</option>";

//             if (info.length > 0) {
//                 for (k = 0; k < info.length; k++) {
//                     lista = lista + "<option value='" + info[k].idMunicipio + "'>" + info[k].nombreMpio + "</option>";
//                 }
//                 $("#txtMunicipio").html(lista);
//             } else {}
//         },
//         error: (jqXHR, textStatus, errorThrown) => {
//             Swal.fire("Error detectado: " + textStatus + "\nException: " + errorThrown);
//             Swal.fire("verifique la ruta de archivo!");
//         }
//     });
// }
