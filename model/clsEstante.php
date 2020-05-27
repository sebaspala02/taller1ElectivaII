<?php

class clsEstante
{
    private $idestante;
    private $codigo;
    private $categoria;
    private $descripcion;


    public function __construct($idestante, $codigo, $categoria, $descripcion)
    {
        $this->idestante = $idestante;
        $this->codigo = $codigo;
        $this->categoria = $categoria;
        $this->descripcion = $descripcion;
    }

    public function getIdestante()
    {
        return $this->idestante;
    }
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function getCategoria()
    {
        return $this->categoria;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    // Setter
    public function setIdestante($idestante)
    {
        $this->idestante = $idestante;
    }
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
}
