<?php

class clsFinca
{
    private $idFinca;
    private $nombreFinca;
    private $tamanio;
    private $idMunicipio;
    private $cantidad;
    private $piscina;
    private $descripcion;
 

    public function __construct($idFinca, $nombreFinca, $tamanio, $idMunicipio, $cantidad, $piscina, $descripcion)
    {
        $this->idFinca = $idFinca;
        $this->nombreFinca = $nombreFinca;
        $this->tamanio = $tamanio;
        $this->idMunicipio = $idMunicipio;
        $this->cantidad = $cantidad;
        $this->piscina = $piscina;
        $this->descripcion = $descripcion;
    }

    public function getIdFinca()
    {
        return $this->idFinca;
    }
    public function getNombreFinca()
    {
        return $this->nombreFinca;
    }
    public function getTamanio()
    {
        return $this->tamanio;
    }
    public function getIdMunicipio()
    {
        return $this->idMunicipio;
    }
    public function getCantidad()
    {
        return $this->cantidad;
    }
    public function getPiscina()
    {
        return $this->piscina;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }

// Setter
    public function setIdFinca($idFinca)
    {
        $this->idFinca = $idFinca;
    }
    public function setNombreFinca($nombreFinca)
    {
        $this->nombreFinca = $nombreFinca;
    }
    public function setTamanio($tamanio)
    {
        $this->tamanio = $tamanio;
    }
    public function setIdMunicipio($idMunicipio)
    {
        $this->idMunicipio = $idMunicipio;
    }
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }
    public function setPiscina($piscina)
    {
        $this->piscina = $piscina;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
}
