<?php

class clsMuni {
    
    private $idMunicipio;
    private $nombreMpio;
    private $Departamento_idDepartamento;

    public function __construct($idMunicipio, $nombreMpio, $Departamento_idDepartamento)
    {
        $this->idMunicipio = $idMunicipio;
        $this->nombreMpio = $nombreMpio;
        $this->Departamento_idDepartamento = $Departamento_idDepartamento;
    }

    public function getIdMunicipio()
    {
        return $this->idMunicipio;
    }
    
    public function getNombreMpio()
    {
        return $this->nombreMpio;
    }
    
    public function getDepartamento_idDepartamento()
    {
        return $this->Departamento_idDepartamento;
    }
    
    // Setter
    public function setIdMunicipio($idMunicipio)
    {
        $this->idMunicipio = $idMunicipio;
    }
    public function setNombreMpio($nombreMpio)
    {
        $this->nombreMpio = $nombreMpio;
    }
    public function setDepartamento_idDepartamento($Departamento_idDepartamento)
    {
        $this->Departamento_idDepartamento = $Departamento_idDepartamento;
    }
}
