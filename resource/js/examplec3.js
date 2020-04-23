/* global c3 */

//http://c3js.org/gettingstarted.html
//http://c3js.org/examples.html
var param = location.search.substring(1, location.search.length);
var arrayParam = param.split("&");
var tipo = arrayParam[1];
console.log(tipo);

if (tipo == 1) {
  cargarDataset1();
} else if (tipo == 2) {
  cargarDataset2();
}

function cargarDataset1() {
  /*La grafica 3 sera de tipo lineas, y se cargara con un conjunto de datos
   * externo en formato csv*/

  //   document.getElementById("chart3").style.display = "block";
  document.getElementById("titulo").innerHTML = "Grafica #1";
  document.getElementById("tipo").innerHTML = "Consulta Genero";
  var info = {};
  var arreglo = [];
  $.ajax({
    type: "post",
    url: "controller/ctlGraficos.php",
    beforeSend: function () {},
    data: { type: "list" },
    success: function (respuesta) {
      const res = JSON.parse(respuesta);
      info = JSON.parse(res.data);

      console.log(res);

      //   var info = JSON.parse(data);

      console.log(info);

      if (info.length > 0) {
        for (k = 0; k < info.length; k++) {
          var fila = [info[k].genero, info[k].total];
          arreglo.push(fila);
          console.log(fila + "holaaaa");
          //   chart3.Palette = ChartColorPalette.Pastel;
          //   chart3.Titles.Add("no se" + info[k].genero, info[k].total);
          //   info = chart1.Series.Add(info[k]);
          //   info.Label = puntos[k].ToString();
          //   info.Points.Add(puntos[k]);
        }
      }

      //   $("#chart3").hide();
      var chart3 = c3.generate({
        bindto: "#chart3",
        data: {
          columns: arreglo,
          // url: "resource/data/datos1.csv",
          type: "donut",
          onmouseover: function (d, i) {
            console.log("onmouseover", d, i);
          },
          onmouseout: function (d, i) {
            console.log("onmouseout", d, i);
            console.log(d.id);
            console.log(d.value);
          },
        },
        donut: {
          title: "Cant. Clientes por Genero",
        },
      });
    },
    error: (jqXHR, textStatus, errorThrown) => {
      Swal.fire(
        "Error detectado: " + textStatus + "\nException: " + errorThrown
      );
      Swal.fire("verifique la ruta de archivo!");
    },
  });
}

function cargarDataset2() {
  /*La grafica 3 sera de tipo lineas, y se cargara con un conjunto de datos
   * externo en formato csv*/
  //   document.getElementById("chart2").style.display = "block";
  //   $("#chart2").hide();
  document.getElementById("titulo").innerHTML = "Grafica #2";
  document.getElementById("tipo").innerHTML = "Consulta Prodcutos";
  var info = {};
  var arreglo = [];
  $.ajax({
    type: "post",
    url: "controller/ctlGraficos.php",
    beforeSend: function () {},
    data: { type: "list1" },
    success: function (respuesta) {
      const res = JSON.parse(respuesta);
      info = JSON.parse(res.data);

      console.log(res);

      //   var info = JSON.parse(data);

      console.log(info);

      if (info.length > 0) {
        for (k = 0; k < info.length; k++) {
          var fila = [info[k].nombre, info[k].cantidad];
          arreglo.push(fila);
        }
      }

      //   $("#chart3").hide();
      var chart3 = c3.generate({
        bindto: "#chart2",
        data: {
          columns: arreglo,
          // url: "resource/data/datos1.csv",
          type: "donut",
        },
        donut: {
          title: "Cant. de Productos",
        },
      });
    },
    error: (jqXHR, textStatus, errorThrown) => {
      Swal.fire(
        "Error detectado: " + textStatus + "\nException: " + errorThrown
      );
      Swal.fire("verifique la ruta de archivo!");
    },
  });
}
