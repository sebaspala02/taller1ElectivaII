<?php
class muniDAO {
    private $con;
    private $objCon;

    function __construct(){
        require '../infrastructure/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function guardar(clsMuni $obj){
        $sql = "INSERT INTO Municipio(nombreMpio,Departamento_idDepartamento) " . 
        "VALUES ('". $obj->getNombreMpio() . "'," . $obj->getDepartamento_idDepartamento().")";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function buscar(clsMuni $obj){
        $sql = "SELECT idMunicipio,nombreMpio from Municipio M 
        join Departamento D on M.Departamento_idDepartamento = D.idDepartamento 
        where idMunicipio = " . $obj->getIdMunicipio() . "";
        $this->objCon->Execute($sql);
    }

    public function eliminar(clsMuni $obj)
    {
        $sql = "DELETE from Municipio where idMunicipio=" . $obj->getIdMunicipio() . "";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function modificar(clsMuni $obj){
        $sql = "UPDATE Municipio SET nombreMpio='" . $obj->getNombreMpio() . "',Departamento_idDepartamento=" . 
        $obj->getDepartamento_idDepartamento() ."";
        $this->objCon->ExecuteTransaction($sql);
    }
    
    public function listar(){
        $sql = "SELECT idMunicipio,nombreMpio,nombreDepto from Municipio M 
        join Departamento D on M.Departamento_idDepartamento = D.idDepartamento";
        $this->objCon->Execute($sql);
    }
}