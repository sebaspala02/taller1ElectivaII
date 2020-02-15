<?php

class clsDepto
{
    private $idDepartamento;
    private $nombreDepto;

    public function __construct($idDepartamento, $nombreDepto)
    {
        $this->idDepartamento = $idDepartamento;
        $this->nombreDepto = $nombreDepto;
    }

    public function getIdDepartamento()
    {
        return $this->idDepartamento;
    }
    
    public function getnombreDepto()
    {
        return $this->nombreDepto;
    }
    
    
    // Setter
    public function setIdDepartamento($idDepartamento)
    {
        $this->idDepartamento = $idDepartamento;
    }
    public function setnombreDepto($nombreDepto)
    {
        $this->nombreDepto = $nombreDepto;
    }
}
