<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datil extends Model
{

    private $DatilDAO;

    public function __construct()
    {

        $this->DatilDAO = new DatilDAO();

    }
    
    public function getDatiles()
    {

        return $this->DatilDAO->getDatiles();

    }

}
