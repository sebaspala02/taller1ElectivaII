<?php
class listDAO
{
    private $con;
    private $objCon;

    function __construct()
    {
        require '../infrastructure/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function listUsuarios()
    {
        $sql = "SELECT * FROM usuario";
        $this->objCon->Execute($sql);
    }
    public function listLabs()
    {
        $sql = "SELECT * FROM laboratorio";
        $this->objCon->Execute($sql);
    }
    public function listClientes()
    {
        $sql = "SELECT * FROM cliente";
        $this->objCon->Execute($sql);
    }
    public function listTipoUsuarios()
    {
        $sql = "SELECT * FROM tipousuario";
        $this->objCon->Execute($sql);
    }
    public function listSuppliers()
    {
        $sql = "SELECT * FROM proveedor";
        $this->objCon->Execute($sql);
    }
    public function listShelfs()
    {
        $sql = "SELECT * FROM estante";
        $this->objCon->Execute($sql);
    }

    // public function listMuni($valor){
    //     $sql = "SELECT * from Municipio where Departamento_idDepartamento = " . $valor;
    //     $this->objCon->Execute($sql);
    // }

    // public function listFinca(){
    //     $sql = "SELECT * from Finca";
    //     $this->objCon->Execute($sql);
    // }
}
