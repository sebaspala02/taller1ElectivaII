$(document).ready(function () {
  $("#btnCsvG1").click(generarR1);
});

function generarR1() {
  $.ajax({
    type: "post",
    url: "controller/ctlGraficos.php",
    beforeSend: function () {
      
    },
    data: { type: "list1" },

    success: function (respuesta) {
      const res = JSON.parse(respuesta); //res
      const info = JSON.parse(res.data); //datdaProcedimineto4

      console.log(res);

      if (info.length > 0) {
        var arreglo = [];
        for (k = 0; k < info.length; k++) {
          var fila = [info[k].genero, info[k].total];
          arreglo.push(fila);
        }
        return arreglo;
      } else {
        Swal.fire("No se encuentra la información", "warning");
      }

      /*La grafica 3 sera de tipo lineas, y se cargara con un conjunto de datos
       * externo en formato csv*/
      var chart1 = c3.generate({
        bindto: "#chart1",
        data: {
          columns: arreglo,
          type: "donut",
        },
        donut: {
          title: "Cant. Clientes por Genero",
        },
      });

      // var info = filtrar();
      // grafico(info);

      // var lista = "";

      // if (info.length > 0) {
      //   for (k = 0; k < info.length; k++) {
      //     lista =
      //       lista +
      //       '<tr id="codigo" onclick="buscarUsuario(' +
      //       info[k].idusuario +
      //       ')">';
      //     lista =
      //       lista + '<td style="display: none">' + info[k].idusuario + "</td>";
      //     lista = lista + "<td>" + info[k].cedula + "</td>";
      //     lista = lista + "<td>" + info[k].nombre + "</td>";
      //     lista = lista + "<td>" + info[k].apellido + "</td>";
      //     lista = lista + "<td>" + info[k].correo + "</td>";
      //     lista = lista + "<td>" + info[k].usuario + "</td>";
      //     lista = lista + "<td>" + info[k].password + "</td>";
      // if (info[k].piscina === '1') {
      //     lista = lista + '<td>SI</td>';
      // } else {
      //     lista = lista + '<td>NO</td>';
      // }
      //   lista = lista + "</tr>";
      // }
      // $("#listaUsuarios").html(lista);
      // $('#tableUsuarios').dataTable()
      // }
      // else {
      //     $("#listaUsuarios").html("<tr><td>No se encuentra informacion</td>></tr>");
      // }
    },
    error: (jqXHR, textStatus, errorThrown) => {
      Swal.fire(
        "Error detectado: " + textStatus + "\nException: " + errorThrown
      );
      Swal.fire("verifique la ruta de archivo!");
    },
  });
}
