<?php
class gestionCSV
{
    private $con;
    private $objCon;

    function __construct()
    {
        // require_once('../resource/html2pdf_4.0/html2pdf.class.php');
        require '../infrastructure/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function exportarCSV($tabla,$nTabla)
    {

        $sql = "call listar" . $tabla;
        $result = $this->objCon->ExecuteReport($sql);
        $resultKeys = array_keys($result[0]);
        // print_r($result);

        /* Se define la zona horaria en Colombia para generar el archivo */
        date_default_timezone_set("America/Bogota");
        /* Se genera el nombre del archivo con la fecha y hora de la generacion */
        $fileName = 'Reporte de '. $nTabla . '-' . date("Y-m-d") . "(" . date("h:i:sa") . ")" . '.csv';
        /* Se define que se retornara un archivo CVS */
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename=' . $fileName);

        $caracterSeparado = ';';

        $content = '';
        for ($i = 1; $i < count($resultKeys); $i++) {
            // print_r($resultKeys[$i]);
            $content .= $resultKeys[$i] . $caracterSeparado;
        }
        $content .= "\n";
        // $content .= "Codigo" . $caracterSeparado . "Nombre" . $caracterSeparado . "Apellido" .
        //     $caracterSeparado . "Cedula" . $caracterSeparado . "Edad" . $caracterSeparado . "Semestre";
        // $content .= "\n";

        // for ($cont = 0; $cont < 20; $cont++) {
        //     $content .= "";
        //     $content .= "Codigo " . $cont . "" . $caracterSeparado;
        //     $content .= "Nombre " . $cont . "" . $caracterSeparado;
        //     $content .= "Apellido " . $cont . "" . $caracterSeparado;
        //     $content .= "Cedula " . $cont . "" . $caracterSeparado;
        //     $content .= "Edad " . $cont . "" . $caracterSeparado;
        //     $content .= "Semestre " . $cont . "";
        //     $content .= "\n";
        // }

        for ($i = 0; $i < count($result); $i++) {
            $aux = $result[$i];
            for ($j = 1; $j < count($result[$i]); $j++) {
                // if ($j == 1) {
                //     $content .= "<tr>";
                // }
                $b = $resultKeys[$j];
                $content .= $aux[$b]. $caracterSeparado;
                // if ($j == count($result[$i]) - 1) {
                //     $content .= "</tr>";
                // }
                // print_r($aux[$b] . $j . "   ");
            }
            $content .= "\n";
        }
        // print_r($content);

        echo $content;
    }
}
