<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datil extends Model
{

    protected $table = "datiles";
    protected $primaryKey = 'idDatil';
    protected $fillable = ['Categoria', 'Variedad', 'Precio', 'Stock'];

    private $datilDAO;

    public function __construct()
    {

        $this->datilDAO = new DatilDAO();

    }
    
    public function getDatiles()
    {

        return $this->datilDAO->getDatiles();

    }

    public function getDatil($datil)
    {

        return $this->datilDAO->buscar($datil);

    }

    public function getID()
    {

        return $this->idDatil;
        
    }

    public function getCategoria()
    {

        return $this->Categoria;

    }

    public function getVariedad()
    {

        return $this->Variedad;

    }

    public function getPrecio()
    {

        return $this->Precio;
        
    }

    public function setVariedad($VarId){

        $this->Variedad = $VarId;

    }

    public function objetoVariedad(){

        return $this->belongsTo(Variedades::class, 'Variedad', 'VarID');

    }

}
