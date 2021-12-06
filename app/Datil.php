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

    public function getDatil($idDatil)
    {

        return $this->datilDAO->buscar($idDatil);

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

}
