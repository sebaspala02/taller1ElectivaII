$(document).ready(function () {
  listarMedi();
  $("#btnGuardarM").click(guardarMedi);
  $("#btnModificarM").click(guardarMedi);
  $("#btnEliminarM").click(eliminarMedi);
  $("#btnLimpiarM").click(limpiar);
});

function guardarMedi() {
  let objMedi = {
    idmedicamento: $("#txtIdMedicamento").val(),
    nombre: $("#txtNombre").val().toUpperCase(),
    descrip: $("#txtDescripcion").val(),

    fecha_venc: $("#txtFecha_venci").val(),
    cant: parseFloat($("#txtCant").val()),
    fecha_creado: $("#txtFecha_crea").val(),
    precio: parseFloat($("#txtPrecio").val()),
    idusuario: parseInt($("#txtIdUsuario").val()),
    idlaboratorio: parseInt($('#txtIdLaboratorio').val()),
    type: ""
  };
  console.log(objMedi)
  if (
    objMedi.nombre !== "" &&
    objMedi.descrip !== "" &&
    objMedi.fecha_venc !== "" &&
    objMedi.cant !== "" &&
    objMedi.fecha_creado !== "" &&
    objMedi.precio !== "" &&
    objMedi.idusuario !== "" &&
    objMedi.idlaboratorio !== ""
  ) {
    if (objMedi.idmedicamento !== "") {
      objMedi.type = "update";
    } else {
      objMedi.type = "save";
    }
    $.ajax({
      type: "post",
      url: "controller/ctlMedi.php",
      data: objMedi,
      success: function (data) {
        console.log(data);
        var info = JSON.parse(data);
        console.log(info);
        if (info.res === "Success") {
          limpiar();
          alert("Operacion exitosa");
          listarMedi();
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

function listarMedi() {
  $.ajax({
    type: 'post',
    url: "controller/ctlMedi.php",
    beforeSend: function () {

    },
    data: { type: 'list' },

    success: function (respuesta) {
      console.log(respuesta);
      const res = JSON.parse(respuesta);
      const info = JSON.parse(res.data);

      var lista = "";

      if (info.length > 0) {
        for (k = 0; k < info.length; k++) {
          lista = lista + '<tr id="codigo" onclick="buscarMedi(' + info[k].idmedicamento + ')">';
          lista = lista + '<th style="display: none">' + info[k].idmedicamento + "</th>";
          lista = lista + '<th>' + info[k].nombre + '</th>';
          lista = lista + '<th>' + info[k].descrip + '</th>';
          lista = lista + '<th>' + info[k].fecha_venc + '</th>';
          lista = lista + '<th>' + info[k].cant + '</th>';
          lista = lista + '<th>' + info[k].fecha_creado + '</th>';
          lista = lista + '<th>' + info[k].precio + '</th>';
          lista = lista + '<th>' + info[k].usuario_idusuario + '</th>';
          lista = lista + '<th>' + info[k].laboratorio_idlaboratorio + '</th>';
          //   lista = lista + "<th>" + info[k].descripcion + "</th>";
          lista = lista + '</tr>';
        }
        $("#listaMedi").html(lista);
        $("#listaMedi").DataTable();
      } else {
        $("#listaMedi").html("<tr><th>No se encuentra informacion</th>></tr>");
      }
    },
    error: (jqXHR, textStatus, errorThrown) => {
      alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
      alert("verifique la ruta de archivo!");
    }
  });
}

function buscarMedi(codigo) {
  $("#txtIdMedicamento").val(codigo);
  const objMedi = {
    idmedicamento: codigo,
    type: "search"
  };

  $.ajax({
    type: "post",
    url: "controller/ctlMedi.php",
    async: false,
    beforeSend: function () { },
    data: objMedi,
    success: function (res) {
      console.log(res)
      const info = JSON.parse(res);
      let data;
      if (info.res !== "NotInfo") {
        data = JSON.parse(info.data);
      }
      if (info.msj === "Success") {
        $("#txtNombre").val(data[0].nombre);
        $("#txtDescripcion").val(data[0].descrip);
        $("#txtFecha_venci").val(data[0].fecha_venc);
        $("#txtCant").val(data[0].cant);
        $("#txtFecha_crea").val(data[0].fecha_creado);
        $("#txtPrecio").val(data[0].precio);
        $('#txtIdUsuario').val(data[0].usuario_idusuario);
        $('#txtIdLaboratorio').val(data[0].laboratorio_idlaboratorio);
        // $("#txthescripcion").val(data[0].descripcion);
      } else {
        alert("No se encuentra");
        limpiar();
      }
    }
  });
}

function eliminarMedi() {
  var dato = $("#txtIdMedicamento").val();
  if (dato == "") {
    alert("Debe cargar los datos a eliminar");
  } else {
    const objMedi = {
      idmedicamento: dato,
      type: "delete"
    };

    $.ajax({
      type: "post",
      url: "controller/ctlMedi.php",
      beforeSend: function () { },
      data: objMedi,
      success: function (res) {
        var info = JSON.parse(res);
        if (info.res == "Success") {
          limpiar();
          alert("Eliminado con exito");
          listarMedi();
          limpiar();
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
  $("#txtIdMedicamento").val("")
  $("#txtNombre").val("")
  $("#txtDescripcion").val("")
  $("#txtFecha_venci").val("")
  $("#txtCant").val(0)
  $("#txtFecha_crea").val("")
  $("#txtPrecio").val(0)
  $("#txtIdUsuario").val("")
  $('#txtIdLaboratorio').val("")
}