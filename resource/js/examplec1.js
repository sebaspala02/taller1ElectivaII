$(document).ready(function () {
  $("#btnCsvG1").click(generarR1);
});

function generarR1() {
  $.ajax({
    type: "post",
    url: "controller/ctlGraficos.php",
    beforeSend: function () {},
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
// a. rose
function readGrafica() {
  $.ajax({
    url: "controllers/ClientCtrl.php",
    method: "POST",
    data: { type: "readGrafico" },
    success: function (resServer) {
      let res = JSON.parse(resServer);
      //  console.log(res);
      let info = JSON.parse(res.data);
      //   console.log(res.data);
      if (info.length > 0) {
        var chart2 = c3.generate({
          bindto: "#chart2",
          data: {
            columns: [
              ["Hombres", info[0].Hombres],
              ["Mujeres", info[0].Mujeres],
            ],
            type: "donut",
          },
          donut: {
            title: "Estadistica Generos",
          },
        });
      }
    },
    error: function (jqXRH, textStatus, errorThrown) {
      console.error("error on server: ", textStatus);
      console.error("Exception on server:", errorThrown);
    },
  });
}

/*
function organizarGrafica2(){
  let datos=[];
  for(let i=0; i<dataProcedimiento.length; i++){
    let columna=[dataProcedimiento[i].nombre,dataProcedimiento[i].cantidad_ventas];
    datos.push(columna);
  }
  return datos;
}*/

function readGrafica2() {
  let dataProcedimiento = {};
  $.ajax({
    url: "controllers/ClientCtrl.php",
    method: "POST",
    data: { type: "readGrafico2" },
    success: function (respuesta) {
      const res = JSON.parse(respuesta);
      dataProcedimiento = JSON.parse(res.data);
      // console.log(dataProcedimiento);
      const informacion = organizarRespuesta();
      Grafica(informacion);
    },
    error: function (jqXRH, textStatus, errorThrown) {
      console.error("error on server: ", textStatus);
      console.error("Exception on server:", errorThrown);
    },
  });

  function organizarRespuesta() {
    let datos = [];
    let nombre = [];
    let cantidad = [];
    //  console.log(dataProcedimiento);
    for (var j in dataProcedimiento) {
      nombre.push(dataProcedimiento[j].name);
      cantidad.push(dataProcedimiento[j].quantity);
      // console.log(name+":"+cantidad);
    }

    for (let i = 0; i < dataProcedimiento.length; i++) {
      /* datos.push([nombre[i]+":"+cantidad[i],cantidad[i]]);
    let columna=[dataProcedimiento[i].name,dataProcedimiento[i].quantity];
     datos.push(columna);
     
   //  console.log(""+[i]);
     console.log(columna);*/
      datos.push([nombre[i] + ":" + cantidad[i], cantidad[i]]);
    }
    return datos;
  }

  function Grafica(datos) {
    var chart3 = c3.generate({
      bindto: "#chart3",
      data: {
        columns: datos,
        type: "donut",
      },
      donut: {
        title: "Productos/Cantidad",
      },
    });
  }
}

function readGrafica3() {
  let dataProcedimiento2 = {};
  $.ajax({
    url: "controllers/ClientCtrl.php",
    method: "POST",
    data: { type: "readGrafico4" },
    success: function (resServer) {
      const res = JSON.parse(resServer);
      //   console.log(res);
      dataProcedimiento2 = JSON.parse(res.data);
      const informacion2 = organziar();
      llenarGrafico(informacion2);
      // console.log(res.data);
    },
    error: function (jqXRH, textStatus, errorThrown) {
      console.error("error on server: ", textStatus);
      console.error("Exception on server:", errorThrown);
    },
  });

  function organziar() {
    let datos = [];
    for (let i = 0; i < dataProcedimiento2.length; i++) {
      let columna = [
        dataProcedimiento2[i].name,
        dataProcedimiento2[i].cantidad_ventas,
        dataProcedimiento2[i].total,
      ];
      datos.push(columna);

      //  console.log(""+[i]);
      //console.log(columna);
    }
    return datos;
  }

  function llenarGrafico(datos) {
    var chart4 = c3.generate({
      bindto: "#chart4",
      data: {
        columns: datos,
      },
      type: "spline",
    });
  }
}

function readGrafica4() {
  let dataProcedimiento3 = {};
  $.ajax({
    url: "controllers/ClientCtrl.php",
    method: "POST",
    data: { type: "readGrafico3" },
    success: function (resServer) {
      const res = JSON.parse(resServer);
      //   console.log(res);
      dataProcedimiento3 = JSON.parse(res.data);
      const informacion3 = organziar();
      // console.log(dataProcedimiento3);
      llenarGrafico2(informacion3);
      //  console.log(res.data);
    },
    error: function (jqXRH, textStatus, errorThrown) {
      console.error("error on server: ", textStatus);
      console.error("Exception on server:", errorThrown);
    },
  });

  function organziar() {
    let cantidad = [];
    let precio = [];
    let nombre = [];
    let datos = [];
    let total = [];

    for (var k in dataProcedimiento3) {
      cantidad.push(dataProcedimiento3[k].cuantity);
      precio.push(dataProcedimiento3[k].price);
      nombre.push(dataProcedimiento3[k].name);
      total.push(dataProcedimiento3[k].total);
    }

    for (let i = 0; i < dataProcedimiento3.length; i++) {
      /* let columna=[dataProcedimiento3[i].name,dataProcedimiento3[i].cuantity,dataProcedimiento3[i].price,dataProcedimiento3[i].total];
   datos.push(columna);
   
  // console.log(""+[i]);
   console.log(columna);*/
      datos.push([
        "El precio de " + nombre[i] + " es " + precio[i],
        precio[i],
        cantidad[i],
        total[i],
      ]);
    }
    return datos;
  }

  function llenarGrafico2(datos) {
    var chart5 = c3.generate({
      bindto: "#chart5",
      data: {
        columns: datos,
        type: "bar",
        types: {
          data3: "spline",
          data4: "line",
          data6: "area",
        },
        groups: { datos },
      },
    });
  }
}

function readGrafica5() {
  let dataProcedimiento4 = {};
  $.ajax({
    url: "controllers/ClientCtrl.php",
    method: "POST",
    data: { type: "readGrafico5" },
    success: function (resServer) {
      const res = JSON.parse(resServer);
      //   console.log(res);
      dataProcedimiento4 = JSON.parse(res.data);
      const informacion4 = organziar();
      // console.log(dataProcedimiento3);
      llenarGrafico3(informacion4);
      //  console.log(res.data);
    },
    error: function (jqXRH, textStatus, errorThrown) {
      console.error("error on server: ", textStatus);
      console.error("Exception on server:", errorThrown);
    },
  });

  function organziar() {
    let datos = [];
    let mes = [];

    for (var k in dataProcedimiento4) {
      mes.push(dataProcedimiento4[k].Mes);
    }

    for (let i = 0; i < dataProcedimiento4.length; i++) {
      /* let columna=[dataProcedimiento4[i].Dia,dataProcedimiento4[i].Mes,dataProcedimiento4[i].NumVentas,dataProcedimiento4[i].VentaTotal];*/
      datos.push([
        mes[i] + "/" + dataProcedimiento4[i].Dia,
        dataProcedimiento4[i].NumVentas,
        dataProcedimiento4[i].VentaTotal,
      ]);
      //  datos.push(columna);

      // console.log(""+[i]);
      //  console.log(columna);
    }
    return datos;
  }

  function llenarGrafico3(datos) {
    var chart6 = c3.generate({
      bindto: "#chart6",
      data: {
        columns: datos,
        type: "bar",
        types: {
          datos: "spline",
          datos: "line",
          datos: "area",
        },
        groups: { datos },
      },
    });
  }
}

function readGrafica6() {
  let dataProcedimiento4 = {};
  $.ajax({
    url: "controllers/ClientCtrl.php",
    method: "POST",
    data: { type: "readGrafico6" },
    success: function (resServer) {
      const res = JSON.parse(resServer);
      //   console.log(res);
      dataProcedimiento4 = JSON.parse(res.data);
      const informacion4 = organziar();
      // console.log(dataProcedimiento3);
      llenarGrafico3(informacion4);
      //  console.log(res.data);
    },
    error: function (jqXRH, textStatus, errorThrown) {
      console.error("error on server: ", textStatus);
      console.error("Exception on server:", errorThrown);
    },
  });

  function organziar() {
    let datos = [];
    let dia = [];
    let cantidad = [];

    for (var k in dataProcedimiento4) {
      dia.push(dataProcedimiento4[k].dia);
      cantidad.push(dataProcedimiento4[k].cantidad);
    }

    for (let i = 0; i < dataProcedimiento4.length; i++) {
      /* let columna=[dataProcedimiento4[i].Dia,dataProcedimiento4[i].Mes,dataProcedimiento4[i].NumVentas,dataProcedimiento4[i].VentaTotal];*/
      datos.push([
        "la cantidad de ventas son: " +
          cantidad[i] +
          " en el dia " +
          dataProcedimiento4[i].dia,
        dataProcedimiento4[i].cantidad,
        dataProcedimiento4[i].total,
      ]);
      //  datos.push(columna);

      // console.log(""+[i]);
      //  console.log(columna);
    }
    return datos;
  }

  function llenarGrafico3(datos) {
    var chart7 = c3.generate({
      bindto: "#chart7",
      data: {
        columns: datos,
        type: "bar",
        types: {
          datos: "spline",
          datos: "line",
          datos: "area",
        },
        groups: { datos },
      },
    });
  }
}
