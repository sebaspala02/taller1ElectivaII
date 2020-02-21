<?php

class clsCliente
{
    private $idcliente;
    private $nombre;
    private $apellido;
    private $cedula;
    private $genero;
    private $fecha_naci;


    public function __construct($idcliente, $nombre, $apellido, $cedula, $genero, $fecha_naci)
    {
        $this->idcliente = $idcliente;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->cedula = $cedula;
        $this->genero = $genero;
        $this->fecha_naci = $fecha_naci;
    }

    public function getIdCliente()
    {
        return $this->idcliente;
    }
    public function getCedula()
    {
        return $this->cedula;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getApellido()
    {
        return $this->apellido;
    }
    public function getGenero()
    {
        return $this->genero;
    }
    public function getFecha_naci()
    {
        return $this->fecha_naci;
    }
    // Setter
    public function setIdCliente($idcliente)
    {
        $this->idcliente = $idcliente;
    }
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }
    public function setGenero($genero)
    {
        $this->genero = $genero;
    }
    public function setFecha_naci($fecha_naci)
    {
        $this->fecha_naci = $fecha_naci;
    }
}
