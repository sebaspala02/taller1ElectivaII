<?php

class clsUsuario
{
    private $idusuario;
    private $cedula;
    private $nombreUsuario;
    private $apellidoUsuario;
    private $correo;
    private $tipoUsuario_idTipoUsuario;
    private $usuario;
    private $password;
    private $puntos;


    public function __construct($idusuario, $cedula, $nombreUsuario, $apellidoUsuario, $correo, $tipoUsuario_idTipoUsuario, $usuario, $password, $puntos)
    {
        $this->idusuario = $idusuario;
        $this->cedula = $cedula;
        $this->nombreUsuario = $nombreUsuario;
        $this->apellidoUsuario = $apellidoUsuario;
        $this->correo = $correo;
        $this->tipoUsuario_idTipoUsuario = $tipoUsuario_idTipoUsuario;
        $this->usuario = $usuario;
        $this->password = $password;
        $this->puntos = $puntos;
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
    public function getTipoUsuario_idTipoUsuario()
    {
        return $this->tipoUsuario_idTipoUsuario;
    }
    public function getUsuario()
    {
        return $this->usuario;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getPuntos()
    {
        return $this->puntos;
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
    public function setTipoUsuario_idTipoUsuario($tipoUsuario_idTipoUsuario)
    {
        $this->tipoUsuario_idTipoUsuario = $tipoUsuario_idTipoUsuario;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }
    public function setPuntos($puntos)
    {
        $this->puntos = $puntos;
    }
}
