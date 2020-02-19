<?php

class clsUsuario
{
    private $idUsuario;
    private $nombreUsuario;
    private $apellidoUsuario;
    private $correo;
    private $usuario;
    private $password;


    public function __construct($idUsuario, $nombreUsuario, $apellidoUsuario, $correo, $usuario, $password)
    {
        $this->idUsuario = $idUsuario;
        $this->nombreUsuario = $nombreUsuario;
        $this->apellidoUsuario = $apellidoUsuario;
        $this->correo = $correo;        
        $this->usuario = $usuario;
        $this->password = $password;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }
    public function getApellidoUsuario()
    {
        return $this->apellidoUsuario;
    }
    public function getCorreo()
    {
        return $this->correo;
    }
    public function getUsuario()
    {
        return $this->usuario;
    }
    public function getPassword()
    {
        return $this->password;
    }

    // Setter
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }
    public function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;
    }
    public function setApellidoUsuario($apellidoUsuario)
    {
        $this->apellidoUsuario = $apellidoUsuario;
    }
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }
}
