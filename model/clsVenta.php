<?php

class clsVenta
{
    private $idventa;
    private $fecha_venta;
    private $valor_total;
    private $cliente_idcliente;
    private $usuario_idusuario;


    public function __construct($idventa, $fecha_venta, $valor_total, $cliente_idcliente, $usuario_idusuario)
    {
        $this->idventa = $idventa;
        $this->fecha_venta = $fecha_venta;
        $this->valor_total = $valor_total;
        $this->cliente_idcliente = $cliente_idcliente;
        $this->usuario_idusuario = $usuario_idusuario;
    }

    public function getidventa()
    {
        return $this->idventa;
    }
    public function getcliente_idcliente()
    {
        return $this->cliente_idcliente;
    }
    public function getfecha_venta()
    {
        return $this->fecha_venta;
    }
    public function getvalor_total()
    {
        return $this->valor_total;
    }
    public function getusuario_idusuario()
    {
        return $this->usuario_idusuario;
    }
    // Setter
    public function setidventa($idventa)
    {
        $this->idventa = $idventa;
    }
    public function setcliente_idcliente($cliente_idcliente)
    {
        $this->cliente_idcliente = $cliente_idcliente;
    }
    public function setfecha_venta($fecha_venta)
    {
        $this->fecha_venta = $fecha_venta;
    }
    public function setvalor_total($valor_total)
    {
        $this->valor_total = $valor_total;
    }
    public function setusuario_idusuario($usuario_idusuario)
    {
        $this->usuario_idusuario = $usuario_idusuario;
    }
}
