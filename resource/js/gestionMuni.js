$(document).ready(function() {
    listarMuni();
    $("#btnGuardarM").click(guardarMuni);
    $("#btnModificarM").click(guardarMuni);
    $("#btnEliminarM").click(eliminarMuni);
    $("#btnLimpiarM").click(limpiar);
  });
  
  function guardarMuni() {
    let objMuni = {
      idMunicipio: $("#txtIdMunicipio").val(),
      nombreMpio: $("#txtNombre_Muni").val(),
      Departamento_idDepartamento: $("#txtDepto").val(),
      type: ""
    };
    if (
      objMuni.nombreMpio !== "" &&
      objMuni.Departamento_idDepartamento !== ""
    ) {
      if (objMuni.idMunicipio) {
        objMuni.type = "update";
      } else {
        objMuni.type = "save";
      }
    //   console.log(objMuni.type)
      $.ajax({
        type: "post",
        url: "controller/ctlMuni.php",
        beforeSend: function() {},
        data: objMuni,
        success: function(data) {
          console.log(data);
          var info = JSON.parse(data);
          console.log(info);
          if (info.res === "Success") {
            limpiar();
            alert("Operacion exitosa");
            listarMuni();
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
  
  function listarMuni() {
    $.ajax({
      type: 'post',
      url: "controller/ctlMuni.php",
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
            lista = lista + '<tr id="codigo" onclick="buscarMuni(' + info[k].idMunicipio + ')">';
            lista = lista + '<td style="display: none">' + info[k].idMunicipio + "</td>";
            lista = lista + '<td>' + info[k].nombreMpio + '</td>';
            lista = lista + '<td>' + info[k].nombreDepto + '</td>';
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
          $("#listaMunis").html(lista);
        } else {
          $("#listaMunis").html("<tr><td>No se encuentra informacion</td>></tr>");
        }
      },
      error: (jqXHR, textStatus, errorThrown) => {
        alert("Error detectado: " + textStatus + "\nException: " + errorThrown);
        alert("verifique la ruta de archivo!");
      }
    });
  }
  
  function buscarMuni(codigo) {
    $("#txtIdMunicipio").val(codigo);
    const objMuni = {
      idMunicipio: $("#txtIdMunicipio").val(),
      type: "search"
    };
  
    $.ajax({
      type: "post",
      url: "controller/ctlMuni.php",
      async: false,
      beforeSend: function() {},
      data: objMuni,
      success: function(res) {
        const info = JSON.parse(res);
        let data;
        if (info.res !== "NotInfo") {
          data = JSON.parse(info.data);
        }
        if (info.msj === "Success") {
          $("#txtNombre_Muni").val(data[0].nombreMpio);
          $("#txtDepto").val(data[0].Departamento_idDepartamento);
        //   $("#txtNombre").val(data[0].nombreVaca);
        //   $("#txtCrias").val(data[0].crias);
        //   $("#txtNum_ordenada").val(data[0].num_ordenada);
        //   $("#txtFinca").val(data[0].Finca_idFinca);
          // $("#txtDescripcion").val(data[0].descripcion);
        } else {
          alert("No se encuentra");
          limpiar();
        }
      }
    });
  }
  
  function eliminarMuni() {
    var dato = $("#txtIdMunicipio").val();
    if (dato == "") {
      alert("Debe cargar los datos a eliminar");
    } else {
      const objMuni = {
        idMunicipio: dato,
        type: "delete"
      };
  
      $.ajax({
        type: "post",
        url: "controller/ctlMuni.php",
        beforeSend: function() {},
        data: objMuni,
        success: function(res) {
          var info = JSON.parse(res);
          if (info.res == "Success") {
            limpiar();
            alert("Eliminado con exito");
            listarMuni();
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
    $("#txtNombre_Muni").val("");
    $("#txtDepto").val(0);
  }