<?php
class reporteDAO
{
    private $con;
    private $objCon;

    function __construct()
    {
        require_once('../resource/html2pdf_4.0/html2pdf.class.php');
        require '../infrastructure/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }


    public function crearReporte($tabla)
    {
        $sql = "SELECT * FROM " . $tabla;
        $this->objCon->Execute($sql);
        $colcount = $this->objCon->getConnect->columnCount();
        echo($colcount);
        // ob_start(); //Habilita el buffer para la salida de datos 
        // ob_get_clean(); //Limpia lo que actualmente tenga el buffer
        // //En la variable content entre las etiquetas <page></page> va todo el contenido del pdf en formato html
        // $content = "<page backtop='40mm' backbottom='30mm' backleft='20mm' backright='20mm' footer='date;page'>";

        // $content .= "<h1>ESTE ES EL REPORTE</h1>";
        // $content .= '<link href="./estilosPDF.css" type="text/css" rel="stylesheet">';


        // $content .= "<page_header>
        //             <table style='width: 100%;'>
        //                 <tr>
        //                     <td>
        //                         <div><label class='logo'>Aqui pueden cargar una imagen que va en el header</label></div>
        //                     </td>                                        
        //                 </tr>
        //             </table>
        //         </page_header>
                               
        //         <page_footer>
        //             <table style='width: 100%;'>
        //                 <tr>
        //                     <td>
        //                         <div><label class='footer'>Aqui pueden cargar una imagen que va en el footer</label></div>
        //                     </td>                                        
        //                  </tr>
        //             </table>
        //         </page_footer>";



        // $content .= "<table border='1'>";

        // $content .= "<tr>";
        // $content .= "<th>Codigo</th>";
        // $content .= "<th>Nombre</th>";
        // $content .= "<th>Apellido</th>";
        // $content .= "<th>Cedula</th>";
        // $content .= "<th>Edad</th>";
        // $content .= "<th>Semestre</th>";
        // $content .= "</tr>";

        // for ($cont = 0; $cont < 20; $cont++) {
        //     $content .= "<tr>";
        //     $content .= "<td>Codigo " . $cont . "</td>";
        //     $content .= "<td>Nombre " . $cont . "</td>";
        //     $content .= "<td>Apellido " . $cont . "</td>";
        //     $content .= "<td>Cedula " . $cont . "</td>";
        //     $content .= "<td>Edad " . $cont . "</td>";
        //     $content .= "<td>Semestre " . $cont . "</td>";
        //     $content .= "</tr>";
        // }

        // $content .= "</table>";
        // $content .= "</page>";


        // $html2pdf = new HTML2PDF('P', 'A4', 'es'); //formato del pdf (posicion (P=vertical L=horizontal), tamaño del pdf, lenguaje)
        // $html2pdf->WriteHTML($content); //Lo que tenga content lo pasa a pdf
        // ob_end_clean(); // se limpia nuevamente el buffer
        // $html2pdf->Output('miPDF.pdf'); //se genera el pdf, generando por defecto el nombre indicado para guardar

    }
}
