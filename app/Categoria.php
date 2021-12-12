<?php

namespace App;

use App\DataBase\CategoriaDAO;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = "Categorias";
    protected $primaryKey = 'CatID';
    protected $fillable = ['CatNombre'];
    public $timestamps = false;

    public function getId()
    {

        return $this->CatID;
    }

    public function setId($id)
    {

        $this->CatID = $id;
    }

    public function getCatNombre()
    {
        return $this->CatNombre;
    }

    public function setCatNombre($CatNombre)
    {
        $this->CatNombre = $CatNombre;
    }
    
}
