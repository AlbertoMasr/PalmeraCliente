<?php

namespace App;

use App\DataBase\VariedadDAO;
use Illuminate\Database\Eloquent\Model;

class Variedad extends Model
{
    protected $table = "Variedades";
    protected $primaryKey = 'VarID';
    protected $fillable = ['VarNombre', 'VarDescripcion'];
    public $timestamps = false;

    public function getID()
    {

        return $this->VarID;
    }

    public function setId($id)
    {

        $this->VarID = $id;
    }

    public function getVarNombre()
    {
        return $this->VarNombre;
    }

    public function setVarNombre($VarNombre)
    {
        $this->VarNombre = $VarNombre;
    }

    public function getVarDescripcion()
    {
        return $this->VarDescripcion;
    }

    public function setVarDescripcion($VarDescripcion)
    {
        $this->VarDescripcion = $VarDescripcion;
    }

}
