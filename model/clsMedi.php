<?php

class clsMedi
{
    private $idmedicamento;
    private $nombre;
    private $descrip;
    private $fecha_venc;
    private $cant;
    private $fecha_creado;
    private $precio;
    private $idusuario;
    private $idlaboratorio;
    private $proveedor_idproveedor;


    public function __construct($idmedicamento, $nombre, $descrip, $fecha_venc, $cant, $fecha_creado, $precio, $idusuario, $idlaboratorio,$proveedor_idproveedor)
    {
        $this->idmedicamento = $idmedicamento;
        $this->nombre = $nombre;
        $this->descrip = $descrip;
        $this->fecha_venc = $fecha_venc;
        $this->cant = $cant;
        $this->fecha_creado = $fecha_creado;
        $this->precio = $precio;
        $this->idusuario = $idusuario;
        $this->idlaboratorio = $idlaboratorio;
        $this->proveedor_idproveedor=$proveedor_idproveedor;
    }

    public function getIdMedicamento()
    {
        return $this->idmedicamento;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getDescrip()
    {
        return $this->descrip;
    }
    public function getFecha_venc()
    {
        return $this->fecha_venc;
    }
    public function getCant()
    {
        return $this->cant;
    }
    public function getFecha_creado()
    {
        return $this->fecha_creado;
    }
    public function getPrecio()
    {
        return $this->precio;
    }
    public function getIdUsuario()
    {
        return $this->idusuario;
    }
    public function getIdLaboratorio()
    {
        return $this->idlaboratorio;
    }
    // Setter
    public function setIdMedicamento($idmedicamento)
    {
        $this->idmedicamento = $idmedicamento;
    }
    public function getproveedor_idproveedor()
    {
        return $this->proveedor_idproveedor;
    }
    // Setter
    public function setproveedor_idproveedor($proveedor_idproveedor)
    {
        $this->proveedor_idproveedor = $proveedor_idproveedor;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setDescrip($descrip)
    {
        $this->descrip = $descrip;
    }
    public function setFecha_venc($fecha_venc)
    {
        $this->fecha_venc = $fecha_venc;
    }
    public function setCant($cant)
    {
        $this->cant = $cant;
    }
    public function setFecha_creado($fecha_creado)
    {
        $this->fecha_creado = $fecha_creado;
    }
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }
    public function setIdUsuario($idusuario)
    {
        $this->idusuario = $idusuario;
    }
    public function setIdLaboratorio($idlaboratorio)
    {
        $this->idlaboratorio = $idlaboratorio;
    }
}
