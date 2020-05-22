$(document).ready(function () {
  listarLaboratorio();
  $("#btnGuardar").click(guardarLaboratorio);
  $("#btnModificar").click(guardarLaboratorio);
  $("#btnEliminar").click(eliminarLaboratorio);
});

function guardarLaboratorio() {
  let objLaboratorio = {
    idlaboratorio: $("#txtIdLaboratorio").val(),
    nombre: $("#txtNombre").val().toLowerCase(),
    descrip: $("#txtDescrip").val().toLowerCase(),
    type: "",
  };
  if (objLaboratorio.idlaboratorio !== "") {
    objLaboratorio.type = "update";
  } else {
    objLaboratorio.type = "save";
  }
  $.ajax({
    type: "post",
    url: "controller/ctlLaboratorio.php",
    beforeSend: function () {},
    data: objLaboratorio,
    success: function (data) {
      var info = JSON.parse(data);
      console.log(info);
      if (info.res === "Success") {
        limpiar();
        Swal.fire("Operacion Exitosa!", "Usuario guardado", "success");
        listarLaboratorio();
      } else {
        Swal.fire("Error!", "No se pudo almacenar", "error");
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

function listarLaboratorio() {
  $.ajax({
    type: "post",
    url: "controller/ctlLaboratorio.php",
    beforeSend: function () {},
    data: { type: "list" },

    success: function (respuesta) {
      const res = JSON.parse(respuesta);
      const info = JSON.parse(res.data);

      var lista = "";

      if (info.length > 0) {
        for (k = 0; k < info.length; k++) {
          lista = lista + '<tr id="codigo" onclick="buscarLaboratorio(' + info[k].idlaboratorio + ')">';
          lista = lista + '<td style="display: none">' + info[k].idlaboratorio + "</td>";
          lista = lista + "<td>" + info[k].nombre + "</td>";
          lista = lista + "<td>" + info[k].descrip + "</td>";
          lista = lista + "</tr>";
        }
        $("#listaLaboratorios").html(lista);
        $("#tableLaboratorios").dataTable();
      } else {
        $("#listaUsuarios").html(
          "<tr><td>No se encuentra informacion</td>></tr>"
        );
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

function buscarLaboratorio(codigo) {
  $("#txtIdLaboratorio").val(codigo);
  const objLaboratorio = {
    idlaboratorio: $("#txtIdLaboratorio").val(),
    type: "search",
  };

  $.ajax({
    type: "post",
    url: "controller/ctlLaboratorio.php",
    async: false,
    beforeSend: function () {},
    data: objLaboratorio,
    success: function (res) {
      // console.log(data);
      const info = JSON.parse(res);
      let data;
      if (info.res !== "NotInfo") {
        data = JSON.parse(info.data);
      }
      if (info.msj === "Success") {
        $("#txtNombre").val(data[0].nombre);
        $("#txtDescrip").val(data[0].descrip);
      } else {
        Swal.fire("No se encuentra");
        limpiar();
      }
    },
  });
}

function eliminarLaboratorio() {
  var dato = $("#txtIdLaboratorio").val();
  if (dato == "") {
    Swal.fire("Debe cargar los datos a eliminar");
  } else {
    const objLaboratorio = {
      idlaboratorio: dato,
      type: "delete",
    };

    $.ajax({
      type: "post",
      url: "controller/ctlLaboratorio.php",
      beforeSend: function () {},
      data: objLaboratorio,
      success: function (res) {
        var info = JSON.parse(res);
        if (info.res == "Success") {
          limpiar();
          Swal.fire("Operacion Exitosa!", "Usuario eliminado", "success");
          listarLaboratorio();
        } else {
          Swal.fire("Error!", "No se pudo eliminar", "error");
          limpiar();
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
}

function limpiar() {
  $("#txtIdLaboratorio").val("");
  $("#txtNombre").val("");
  $("#txtDescrip").val("");
}