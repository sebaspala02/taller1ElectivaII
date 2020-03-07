<?php

class clsDetalle
{
    private $iddetalle_venta;
    private $total;
    private $fecha;
    private $medi;
    private $cant;
    private $cliente;
    private $usuario;
    private $idventa;


    public function __construct($iddetalle_venta,$total, $fecha, $medi, $cant,$cliente,$usuario, $idventa)
    {
        $this->iddetalle_venta = $iddetalle_venta;
        $this->total = $total;
        $this->fecha = $fecha;
        $this->medi = $medi;
        $this->cant = $cant;
        $this->cliente = $cliente;
        $this->usuario = $usuario;
        $this->idventa = $idventa;
    }

    public function getIddetalle_venta()
    {
        return $this->iddetalle_venta;
    }
    public function getTotal()
    {
        return $this->total;
    }
    public function getCant()
    {
        return $this->cant;
    }
    public function getFecha()
    {
        return $this->fecha;
    }
    public function getMedi()
    {
        return $this->medi;
    }
    public function getCliente()
    {
        return $this->cliente;
    }
    public function getUsuario()
    {
        return $this->usuario;
    }
    public function getIdventa()
    {
        return $this->idventa;
    }


    // Setter
    public function setIddetalle_venta($iddetalle_venta)
    {
        $this->iddetalle_venta = $iddetalle_venta;
    }
    public function setTotal($total)
    {
        $this->total = $total;
    }
    public function setCant($cant)
    {
        $this->cant = $cant;
    }
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
    public function setMedi($medi)
    {
        $this->medi = $medi;
    }
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }
    public function setIdventa($idventa)
    {
        $this->idventa = $idventa;
    }
}
