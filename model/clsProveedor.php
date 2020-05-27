<?php

class clsProveedor
{
    private $idproveedor;
    private $nit;
    private $nombre;
    private $ciudad;
    private $direccion;
    private $telefono;


    public function __construct($idproveedor, $nit, $nombre, $ciudad, $direccion, $telefono)
    {
        $this->idproveedor = $idproveedor;
        $this->nit = $nit;
        $this->nombre = $nombre;
        $this->ciudad = $ciudad;
        $this->direccion = $direccion;   
        $this->telefono = $telefono;
    }

    public function getIdproveedor()
    {
        return $this->idproveedor;
    }
    public function getNit()
    {
        return $this->nit;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getCiudad()
    {
        return $this->ciudad;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }

    // Setter
    public function setIdproveedor($idproveedor)
    {
        $this->idproveedor = $idproveedor;
    }
    public function setNit($nit)
    {
        $this->nit = $nit;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;
    }
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

}
