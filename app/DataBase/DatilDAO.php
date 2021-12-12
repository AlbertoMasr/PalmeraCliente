<?php

namespace App\DataBase;

use App\Datil;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\MockObject\Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DatilDAO extends DB
{

    public function getDatiles()
    {

        return Datil::all();

    }

}
