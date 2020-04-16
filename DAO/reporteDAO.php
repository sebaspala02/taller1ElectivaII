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


    public function crearReporte($tabla, $nTabla)
    {
        // $nomTabla = $tabla.substr(-3,2);
        // $sql = "SELECT * FROM " . $tabla;
        $sql = "call listar" . $tabla;
        $result = $this->objCon->ExecuteReport($sql);
        $resultKeys = array_keys($result[0]);
        print_r($result);
        // print_r($resultKeys);

        ob_start(); //Habilita el buffer para la salida de datos 
        ob_get_clean(); //Limpia lo que actualmente tenga el buffer
        // //En la variable content entre las etiquetas <page></page> va todo el contenido del pdf en formato html
        $content = "<page backtop='40mm' backbottom='30mm' backleft=8mm' backright='2mm' footer='date;page'>";


        // $content .= '<link href="./estilosPDF.css" type="text/css" rel="stylesheet">';
        $content .= '<link href="../resource/styles/tabla.css" type="text/css" rel="stylesheet">';

        $content .= "<page_header>";
        $content .= "<div>
                        <img class='izq' src='../resource/img/cruzA.jpg' width='110' height='100'/>
                        <br>
                        <br>
                        <h2 class='dere' style='color: #54c8fd;'>Drogueria FarmaTest S.A.S</h2>
                     </div>";
        $content .= '<h1 class="centro">' . $nTabla . '</h1>';
        $content .= "</page_header>";
        $content .= "<br>";
        $content .= "<br>";


        $content .= "<page_footer>
                        <table style='width: 100%;'>
                            <tr>
                                <td>
                                    <div>
                                        <img class='izq' src='../resource/img/cruzA.jpg' width='110' height='100'/>
                                        <h2 class='centro' style='color: #54c8fd;'>Drogueria FarmaTest S.A.S</h2>
                                        <h4 class='centro' style='color: #393cf7;'>Realizado por Alejandro Hoyos & Sebastian Palacio</h4>
                                        <hr style='color: blue;'/>
                                    </div>
                                </td>                                        
                            </tr>
                        </table>
                    </page_footer>";

        // $content .= "<div class='tabla'>";
        $content .= "<table class='table tabla'>";
        $content .= "<tr>";
        for ($i = 1; $i < count($resultKeys); $i++) {
            // print_r($resultKeys[$i]);
            $content .= "<th>" . $resultKeys[$i] . "</th>";
        }
        // $content .= "<th>Codigo</th>";
        // $content .= "<th>Nombre</th>";
        // $content .= "<th>Apellido</th>";
        // $content .= "<th>Cedula</th>";
        // $content .= "<th>Edad</th>";
        // $content .= "<th>Semestre</th>";
        $content .= "</tr>";
        for ($i = 0; $i < count($result); $i++) {
            $aux = $result[$i];
            for ($j = 1; $j < count($result[$i]); $j++) {
                if ($j == 1) {
                    $content .= "<tr>";
                }
                $b = $resultKeys[$j];
                $content .= "<td>" . $aux[$b] . "</td>";
                if ($j == count($result[$i]) - 1) {
                    $content .= "</tr>";
                }
                // print_r($aux[$b] . $j . "   ");
            }
        }
        print_r($content);
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

        $content .= "</table>";
        // $content .= "</div>";
        $content .= "</page>";


        $html2pdf = new HTML2PDF('P', 'A4', 'es'); //formato del pdf (posicion (P=vertical L=horizontal), tamaño del pdf, lenguaje)
        $html2pdf->WriteHTML($content); //Lo que tenga content lo pasa a pdf
        ob_end_clean(); // se limpia nuevamente el buffer
        $html2pdf->Output('Reporte_' . $nTabla . 'PDF.pdf'); //se genera el pdf, generando por defecto el nombre indicado para guardar

    }
}
