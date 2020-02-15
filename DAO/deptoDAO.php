<?php
class deptoDAO {
    private $con;
    private $objCon;

    function __construct(){
        require '../infrastructure/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function guardar(clsDepto $obj){
        $sql = "INSERT INTO Departamento (nombreDepto) " . "VALUES ('". $obj->getNombreDepto() . "')";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function buscar(clsDepto $obj){
        $sql = "SELECT idDepartamento,nombreDepto from Departamento
        where idDepartamento = " . $obj->getIdDepartamento() . "";
        $this->objCon->Execute($sql);
    }

    public function eliminar(clsDepto $obj)
    {   
        $sql = "DELETE from departamento where idDepartamento=" . $obj->getIdDepartamento() . "";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function modificar(clsDepto $obj){
        $sql = "UPDATE departamento SET nombreDepto='" . $obj->getNombreDepto(). "'" . " where idDepartamento=" . $obj->getIdDepartamento() ."";
        $this->objCon->ExecuteTransaction($sql);
    }
    
    public function listar(){
        $sql = "SELECT idDepartamento,nombreDepto from Departamento";
        $this->objCon->Execute($sql);
    }
}