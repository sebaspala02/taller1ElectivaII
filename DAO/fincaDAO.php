<?php
class fincaDAO {
    private $con;
    private $objCon;

    function __construct(){
        require '../infrastructure/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function guardar(clsFinca $obj){
        $sql = "INSERT INTO Finca(nombreFinca,tamanio,Municipio_idMunicipio,cantidad,piscina,descripcion) "
        . "VALUES ('" . $obj->getNombreFinca() . "'," . $obj->getTamanio() . ","  . 
        $obj->getIdMunicipio(). ","  . $obj->getCantidad() . ","  . $obj->getPiscina() . ",'"  . 
        $obj->getDescripcion() . "')";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function buscar(clsFinca $obj){
        $sql = "SELECT nombreFinca,tamanio,Municipio_idMunicipio,Departamento_idDepartamento,cantidad,piscina,descripcion from Finca F 
        join Municipio M on F.Municipio_idMunicipio = M.idMunicipio 
        join Departamento D on M.Departamento_idDepartamento = D.idDepartamento
        where idFinca = " . $obj->getIdFinca() . "";
        $this->objCon->Execute($sql);
    }

    public function eliminar(clsFinca $obj)
    {
        $sql = "DELETE from Finca where idFinca=" . $obj->getIdFinca() . "";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function modificar(clsFinca $obj){
        $sql = "UPDATE Finca SET nombreFinca='" . $obj->getNombreFinca() . "',tamanio=" . 
            $obj->getTamanio() . ",Municipio_idMunicipio="  . $obj->getIdMunicipio() . 
            ",cantidad="  . $obj->getCantidad() . ",piscina="  . $obj->getPiscina() . 
            ",descripcion='"  . $obj->getDescripcion() . "' where idFinca=" . $obj->getIdFinca() ."";
        $this->objCon->ExecuteTransaction($sql);
    }
    
    public function listar(){
        $sql = "SELECT idFinca,nombreFinca,tamanio,nombreMpio,nombreDepto,cantidad,piscina,descripcion from Finca F 
        join Municipio M on F.Municipio_idMunicipio = M.idMunicipio 
        join Departamento D on M.Departamento_idDepartamento = D.idDepartamento";
        $this->objCon->Execute($sql);
    }
}