<?php
class vacaDAO {
    private $con;
    private $objCon;

    function __construct(){
        require '../infrastructure/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function guardar(clsVaca $obj){
        $sql = "INSERT INTO Vaca(peso,edad,nombreVaca,crias,num_ordenada,Finca_idFinca) "
        . "VALUES (". $obj->getPeso() . "," . $obj->getEdad(). ",'" . 
        $obj->getNombreVaca() . "'," . $obj->getCrias() . ","  . 
        $obj->getNum_ordenada(). "," . $obj->getIdFinca() . ")";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function buscar(clsVaca $obj){
        $sql = "SELECT idVaca,peso,edad,nombreVaca,crias,num_ordenada from Vaca V 
        join Finca F on V.Finca_idFinca = F.idFinca 
        where idVaca = " . $obj->getIdVaca() . "";
        $this->objCon->Execute($sql);
    }

    public function eliminar(clsVaca $obj)
    {
        $sql = "DELETE from Vaca where idVaca=" . $obj->getIdVaca() . "";
        $this->objCon->ExecuteTransaction($sql);
    }

    public function modificar(clsVaca $obj){
        $sql = "UPDATE Vaca SET peso=" . $obj->getPeso() . ",edad=" . 
        $obj->getEdad() . ",nombreVaca='"  . $obj->getNombreVaca() . "',crias=" . 
        $obj->getCrias() . ",num_ordenada="  . $obj->getNum_ordenada() . " where idVaca=" . $obj->getIdVaca() ."";
        $this->objCon->ExecuteTransaction($sql);
    }
    
    public function listar(){
        $sql = "SELECT idVaca,peso,edad,nombreVaca,crias,num_ordenada,nombreFinca from Vaca V 
        join Finca F on V.Finca_idFinca = F.idFinca";
        $this->objCon->Execute($sql);
    }
}