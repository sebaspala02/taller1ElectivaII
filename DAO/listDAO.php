<?php
class listDAO {
    private $con;
    private $objCon;

    function __construct(){
        require '../infrastructure/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function listUsuarios(){
        $sql = "SELECT * FROM usuario";
        $this->objCon->Execute($sql);
    }

    public function listLabs(){
        $sql = "SELECT * FROM laboratorio";
        $this->objCon->Execute($sql);
    }

    // public function listMuni($valor){
    //     $sql = "SELECT * from Municipio where Departamento_idDepartamento = " . $valor;
    //     $this->objCon->Execute($sql);
    // }

    // public function listFinca(){
    //     $sql = "SELECT * from Finca";
    //     $this->objCon->Execute($sql);
    // }
}