<?php

class clsLaboratorio
{
    private $idlaboratorio;
    private $nombre;
    private $descrip;


    public function __construct($idlaboratorio, $nombre, $descrip)
    {
        $this->idlaboratorio = $idlaboratorio;
        $this->nombre = $nombre;
        $this->descrip = $descrip;
    }

    public function getIdlaboratorio()
    {
        return $this->idlaboratorio;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getDescrip()
    {
        return $this->descrip;
    }

    // Setter
    public function setIdlaboratorio($idlaboratorio)
    {
        $this->idlaboratorio = $idlaboratorio;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setDescrip($descrip)
    {
        $this->descrip = $descrip;
    }
}
