<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    
    protected $table = "Clientes";
    protected $primaryKey = 'idCliente';
    protected $fillable = ['Nombre', 'Telefono', 'Correo'];
    public $timestamps = false;

    public function getID()
    {

        return $this->idCliente;

    }

    public function setID($idCliente)
    {

        $this->idCliente = $idCliente;

    }

    public function getNombre()
    {

        return $this->Nombre;

    }

    public function setNombre($Nombre)
    {

        $this->Nombre = $Nombre;

    }

    public function getTelefono()
    {

        return $this->Telefono;

    }

    public function setTelefono($Telefono)
    {

        $this->Telefono = $Telefono;

    }

    public function getCorreo()
    {

        return $this->Correo;

    }

    public function setCorreo($Correo)
    {

        $this->Correo = $Correo;

    }

    public function productosCarrito(){

        return $this->hasMany(ProductosCarrito::class, 'idCliente');

    }

}
