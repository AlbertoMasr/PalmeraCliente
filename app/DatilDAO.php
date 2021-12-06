<?php

namespace App;

use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\MockObject\Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DatilDAO extends DB
{

    public function getDatiles()
    {

        return Datil::all();

    }

    public function buscar($idDatil)
    {

        try
        {

            $predio = Datil::findOrFail($idDatil);

            return $predio;

        }
        catch (Exception $e)
        {

            return "No se encontró el datil";

        }

    }

}
