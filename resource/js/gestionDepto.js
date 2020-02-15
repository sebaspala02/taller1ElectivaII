$(document).ready(function() {
    listarDepto();
    $("#btnGuardarD").click(guardarDepto);
    $("#btnModificarD").click(guardarDepto);
    $("#btnEliminarD").click(eliminarDepto);
    $("#btnLimpiarD").click(limpiar);
  });

  function guardarDepto() {
    let objDepto = {
      idDepartamento: $("#txtIdDepto").val(),
      nombreDepto: $("#txtNombreDepto").val(),
      type: ""
    };
    if (
      objDepto.nombreDepto !== ""
    ) {
      if (objDepto.idDepartamento !== "") {
        objDepto.type = "update";
      } else {
        objDepto.type = "save";
      }
      $.ajax({
        type: "post",
        url: "controller/ctlDepto.php",
        beforeSend: function() {},
        data: objDepto,
        success: function(data) {
          console.log(data);
          var info = JSON.parse(data);
          console.log(info);
          if (info.res === "Success") {
            limpiar();
            alert("Operacion exitosa");
            listarDepto();
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
  
  function listarDepto() {
    $.ajax({
      type: 'post',
      url: "controller/ctlDepto.php",
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
            lista = lista + '<tr id="codigo" onclick="buscarDepto(' + info[k].idDepartamento + ')">';
            lista = lista + '<td style="display: none">' + info[k].idDepartamento + "</td>";
            lista = lista + '<td>' + info[k].nombreDepto + '</td>';
            // lista = lista + '<td>' + info[k].edad + '</td>';
            // lista = lista + '<td>' + info[k].nombreVaca + '</td>';
            // if (info[k].crias === '1') {
            //   lista = lista + '<td>SI</td>';
            // } else {
            //   lista = lista + '<td>NO</td>';
            // }
            // lista = lista + '<td>' + info[k].crias + '</td>';
            // lista = lista + '<td>' + info[k].num_ordenada + '</td>';
            // lista = lista + '<td>' + info[k].nombreFinca + '</td>';
            //   lista = lista + "<td>" + info[k].descripcion + "</td>";
            lista = lista + '</tr>';
          }
          $("#listaDeptos").html(lista);
        } else {
          $("#listaDeptos").html("<tr><td>No se encuentra informacion</td>></tr>");
        }
      },
      error: (jqXHR, textStatus, errorThrown) => {
        alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
        alert("verifique la ruta de archivo!");
      }
    });
  }
  
  function buscarDepto(codigo) {
    $("#txtIdDepto").val(codigo);
    const objDepto = {
      idDepartamento: $("#txtIdDepto").val(),
      type: "search"
    };
  
    $.ajax({
      type: "post",
      url: "controller/ctlDepto.php",
      async: false,
      beforeSend: function() {},
      data: objDepto,
      success: function(res) {
        const info = JSON.parse(res);
        let data;
        if (info.res !== "NotInfo") {
          data = JSON.parse(info.data);
        }
        if (info.msj === "Success") {
          $("#txtNombreDepto").val(data[0].nombreDepto);
          // $("#txtEdad").val(data[0].edad);
          // $("#txtNombre").val(data[0].nombreVaca);
          // $("#txtCrias").val(data[0].crias);
          // $("#txtNum_ordenada").val(data[0].num_ordenada);
          // $("#txtFinca").val(data[0].Finca_idFinca);
          // $("#txtDescripcion").val(data[0].descripcion);
        } else {
          alert("No se encuentra");
          limpiar();
        }
      }
    });
  }
  
  function eliminarDepto() {
    var dato = $("#txtIdDepto").val();
    if (dato == "") {
      alert("Debe cargar los datos a eliminar");
    } else {
      const objDepto = {
        idVaca: dato,
        type: "delete"
      };
  
      $.ajax({
        type: "post",
        url: "controller/ctlDepto.php",
        beforeSend: function() {},
        data: objDepto,
        success: function(res) {
          var info = JSON.parse(res);
          if (info.res == "Success") {
            limpiar();
            alert("Eliminado con exito");
            listarDepto();
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
    $("#txtIdDepto").val("");
    $("#txtNombreDepto").val("");
  }