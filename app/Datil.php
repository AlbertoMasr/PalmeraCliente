<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datil extends Model
{

    protected $table = "datiles";
    protected $primaryKey = 'idDatil';
    protected $fillable = ['Categoria', 'Variedad', 'Precio', 'Stock'];

    private $datilDAO;

    /* Referencia a Capa Técnica */
    public function __construct()
    {

        $this->datilDAO = new DatilDAO();

    }
    
    /* Métodos Get y Set para clase Datil  */
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

    /* Mensajes hacia la Capa Técnica */
    public function getDatiles()
    {

        return $this->datilDAO->getDatiles();

    }


    /* Referencia entre clases */
    public function objetoVariedad(){

        return $this->belongsTo(Variedades::class, 'Variedad', 'VarID');

    }

    public function objetoCategoria()
    {
        return $this->belongsTo(Categoria::class, 'Categoria', 'CatID');
    }

}

