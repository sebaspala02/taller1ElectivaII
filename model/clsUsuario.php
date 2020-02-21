<?php

class clsUsuario
{
    private $idusuario;
    private $cedula;
    private $nombreUsuario;
    private $apellidoUsuario;
    private $correo;
    private $usuario;
    private $password;


    public function __construct($idusuario, $cedula, $nombreUsuario, $apellidoUsuario, $correo, $usuario, $password)
    {
        $this->idusuario = $idusuario;
        $this->cedula = $cedula;
        $this->nombreUsuario = $nombreUsuario;
        $this->apellidoUsuario = $apellidoUsuario;
        $this->correo = $correo;        
        $this->usuario = $usuario;
        $this->password = $password;
    }

    public function getIdUsuario()
    {
        return $this->idusuario;
    }
    public function getCedula()
    {
        return $this->cedula;
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
    public function setIdUsuario($idusuario)
    {
        $this->idusuario = $idusuario;
    }
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
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
