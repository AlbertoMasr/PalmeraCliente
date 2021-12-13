<?php

namespace App\DataBase;

use App\Datil;
use App\Variedad;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\MockObject\Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DatilDAO extends DB
{

    public function getDatiles()
    {

        return Datil::all();

    }

    public function buscarDatiles($buscar)
    {
        
        try
        {

            return Datil::whereIn('Variedad', function($query) use ($buscar) {

                $query->select('VarID')
                ->from(with(new Variedad())->getTable())
                ->where('varNombre', 'like', '%' . $buscar . '%');

            })->get();

        }
        catch (Exception $e)
        {

            return $respuesta = array(
                "tipo" => "error",
                "mensaje" => "No se encontró variedad"
            );  

        }

    }

}
