$(document).ready(function() {
  listarVaca();
  $("#btnGuardarV").click(guardarVaca);
  $("#btnModificarV").click(guardarVaca);
  $("#btnEliminarV").click(eliminarVaca);
  $("#btnLimpiarV").click(limpiar);
});

function guardarVaca() {
  let objVaca = {
    idVaca: $("#txtIdVaca").val(),
    peso: $("#txtPeso").val(),
    edad: $("#txtEdad").val(),
    nombreVaca: $("#txtNombre").val().toUpperCase(),
    crias: $("#txtCrias").val(),
    num_ordenada: $("#txtNum_ordenada").val(),
    idFinca: $("#txtFinca").val(),
    type: ""
  };
  if (
    objVaca.peso !== "" &&
    objVaca.edad !== "" &&
    objVaca.nombreVaca !== "" &&
    objVaca.crias !== "" &&
    objVaca.num_ordenada !== "" &&
    objVaca.idFinca !== ""
  ) {
    if (objVaca.idVaca !== "") {
      objVaca.type = "update";
    } else {
      objVaca.type = "save";
    }
    $.ajax({
      type: "post",
      url: "controller/ctlVaca.php",
      beforeSend: function() {},
      data: objVaca,
      success: function(data) {
        console.log(data);
        var info = JSON.parse(data);
        console.log(info);
        if (info.res === "Success") {
          limpiar();
          alert("Operacion exitosa");
          listarVaca();
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

function listarVaca() {
  $.ajax({
    type: 'post',
    url: "controller/ctlVaca.php",
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
          lista = lista + '<tr id="codigo" onclick="buscarVaca(' + info[k].idVaca + ')">';
          lista = lista + '<td style="display: none">' + info[k].idVaca + "</td>";
          lista = lista + '<td>' + info[k].peso + '</td>';
          lista = lista + '<td>' + info[k].edad + '</td>';
          lista = lista + '<td>' + info[k].nombreVaca + '</td>';
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
        $("#listaVacas").html(lista);
      } else {
        $("#listaVacas").html("<tr><td>No se encuentra informacion</td>></tr>");
      }
    },
    error: (jqXHR, textStatus, errorThrown) => {
      alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
      alert("verifique la ruta de archivo!");
    }
  });
}

function buscarVaca(codigo) {
  $("#txtIdVaca").val(codigo);
  const objVaca = {
    idVaca: $("#txtIdVaca").val(),
    type: "search"
  };

  $.ajax({
    type: "post",
    url: "controller/ctlVaca.php",
    async: false,
    beforeSend: function() {},
    data: objVaca,
    success: function(res) {
      const info = JSON.parse(res);
      let data;
      if (info.res !== "NotInfo") {
        data = JSON.parse(info.data);
      }
      if (info.msj === "Success") {
        $("#txtPeso").val(data[0].peso);
        $("#txtEdad").val(data[0].edad);
        $("#txtNombre").val(data[0].nombreVaca);
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

function eliminarVaca() {
  var dato = $("#txtIdVaca").val();
  if (dato == "") {
    alert("Debe cargar los datos a eliminar");
  } else {
    const objVaca = {
      idVaca: dato,
      type: "delete"
    };

    $.ajax({
      type: "post",
      url: "controller/ctlVaca.php",
      beforeSend: function() {},
      data: objVaca,
      success: function(res) {
        var info = JSON.parse(res);
        if (info.res == "Success") {
          limpiar();
          alert("Eliminado con exito");
          listarVaca();
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