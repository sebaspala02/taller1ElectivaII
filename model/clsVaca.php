<?php

class clsVaca
{
    private $idVaca;
    private $peso;
    private $edad;
    private $nombreVaca;
    private $crias;
    private $num_ordenada;
    private $idFinca;


    public function __construct($idVaca, $peso, $edad, $nombreVaca, $crias, $num_ordenada, $idFinca)
    {
        $this->idVaca = $idVaca;
        $this->nombreVaca = $nombreVaca;
        $this->peso = $peso;
        $this->edad = $edad;
        $this->nombreVaca = $nombreVaca;
        $this->crias = $crias;
        $this->num_ordenada = $num_ordenada;
        $this->idFinca = $idFinca;
    }

    public function getIdVaca()
    {
        return $this->idVaca;
    }
    public function getNombreVaca()
    {
        return $this->nombreVaca;
    }
    public function getPeso()
    {
        return $this->peso;
    }
    public function getEdad()
    {
        return $this->edad;
    }
    public function getCrias()
    {
        return $this->crias;
    }
    public function getNum_ordenada()
    {
        return $this->num_ordenada;
    }
    public function getIdFinca()
    {
        return $this->idFinca;
    }
    //quedeee aqui
    // Setter
    public function setIdVaca($idVaca)
    {
        $this->idVaca = $idVaca;
    }
    public function setNombreVaca($nombreVaca)
    {
        $this->nombreVaca = $nombreVaca;
    }
    public function setPeso($peso)
    {
        $this->peso = $peso;
    }
    public function setEdad($edad)
    {
        $this->edad = $edad;
    }
    public function setCrias($crias)
    {
        $this->crias = $crias;
    }
    public function setNum_ordenada($num_ordenada)
    {
        $this->num_ordenada = $num_ordenada;
    }
    public function setIdFinca($idFinca)
    {
        $this->idFinca = $idFinca;
    }
}
