$(document).ready(function() {
  listarMedi();
  $("#btnGuardarM").click(guardarMedi);
  $("#btnModificarM").click(guardarMedi);
  $("#btnEliminarM").click(eliminarMedi);
  $("#btnLimpiarM").click(limpiar);
});

function guardarMedi() {
  let objMedi = {
    id: $("#txtIdMedicamento").val(),
    nombre: $("#txtNombreMedicamento").val().toUpperCase(),
    descripcion: $("#txtDescripcion").val(),
    vencimiento: $("#txtFecha_venci").val(),
    cantidad: $("#txtCant").val(),
    fecha: $("#txtFecha_crea").val(),
    precio: $("#txtPrecio").val(),
    usuario: $("#txtIdUsuario").val(),
    laboratorio : $('#txtIdLaboratorio').val(),
    type: ""
  };
  if (
    objMedi.id !== "" &&
    objMedi.nombre !== "" &&
    objMedi.descripcion !== "" &&
    objMedi.vencimiento !== "" &&
    objMedi.cantidad !== "" &&
    objMedi.fecha !== "" &&
    objMedi.precio !== "" &&
    objMedi.usuario !== "" &&
    objMedi.laboratorio !== ""
  ) {
    if (objMedi.idMedi !== "") {
      objMedi.type = "update";
    } else {
      objMedi.type = "save";
    }
    $.ajax({
      type: "post",
      url: "controller/ctlMedi.php",
      beforeSend: function() {},
      data: objMedi,
      success: function(data) {
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
          lista = lista + '<tr id="codigo" onclick="buscarMedi(' + info[k].idMedi + ')">';
          lista = lista + '<td style="display: none">' + info[k].idMedi + "</td>";
          lista = lista + '<td>' + info[k].peso + '</td>';
          lista = lista + '<td>' + info[k].edad + '</td>';
          lista = lista + '<td>' + info[k].nombreMedi + '</td>';
          if (info[k].crias === '1') {
            lista = lista + '<td>SI</td>';
          } else {
            lista = lista + '<td>NO</td>';
          }
          // lista = lista + '<td>' + info[k].crias + '</td>';
          lista = lista + '<td>' + info[k].num_ordenada + '</td>';
          lista = lista + '<td>' + info[k].nombreFinca + '</td>';
          //   lista = lista + "<td>" + info[k].descripcion + "</td>";
          lista = lista + '</tr>';
        }
        $("#listaMedis").html(lista);
      } else {
        $("#listaMedis").html("<tr><td>No se encuentra informacion</td>></tr>");
      }
    },
    error: (jqXHR, textStatus, errorThrown) => {
      alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
      alert("verifique la ruta de archivo!");
    }
  });
}

function buscarMedi(codigo) {
  $("#txtIdMedi").val(codigo);
  const objMedi = {
    idMedi: $("#txtIdMedi").val(),
    type: "search"
  };

  $.ajax({
    type: "post",
    url: "controller/ctlMedi.php",
    async: false,
    beforeSend: function() {},
    data: objMedi,
    success: function(res) {
      const info = JSON.parse(res);
      let data;
      if (info.res !== "NotInfo") {
        data = JSON.parse(info.data);
      }
      if (info.msj === "Success") {
        $("#txtPeso").val(data[0].peso);
        $("#txtEdad").val(data[0].edad);
        $("#txtNombre").val(data[0].nombreMedi);
        $("#txtCrias").val(data[0].crias);
        $("#txtNum_ordenada").val(data[0].num_ordenada);
        $("#txtFinca").val(data[0].Finca_idFinca);
        // $("#txtDescripcion").val(data[0].descripcion);
      } else {
        alert("No se encuentra");
        limpiar();
      }
    }
  });
}

function eliminarMedi() {
  var dato = $("#txtIdMedi").val();
  if (dato == "") {
    alert("Debe cargar los datos a eliminar");
  } else {
    const objMedi = {
      idMedi: dato,
      type: "delete"
    };

    $.ajax({
      type: "post",
      url: "controller/ctlMedi.php",
      beforeSend: function() {},
      data: objMedi,
      success: function(res) {
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
  $("#txtPeso").val("");
  $("#txtEdad").val("");
  $("#txtnombre").val("");
  $("#txtNum_ordenada").val("");
  $("#txtCrias").val(0);
  $("#txtFinca").val("");
}