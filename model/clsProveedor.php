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

    public function getidproveedor()
    {
        return $this->idproveedor;
    }
    public function getnit()
    {
        return $this->nit;
    }
    public function getnombre()
    {
        return $this->nombre;
    }
    public function getciudad()
    {
        return $this->ciudad;
    }
    public function getdireccion()
    {
        return $this->direccion;
    }
    public function gettelefono()
    {
        return $this->telefono;
    }

    // Setter
    public function setidproveedor($idproveedor)
    {
        $this->idproveedor = $idproveedor;
    }
    public function setnit($nit)
    {
        $this->nit = $nit;
    }
    public function setnombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setciudad($ciudad)
    {
        $this->ciudad = $ciudad;
    }
    public function setdireccion($direccion)
    {
        $this->direccion = $direccion;
    }
    public function settelefono($telefono)
    {
        $this->telefono = $telefono;
    }

}
