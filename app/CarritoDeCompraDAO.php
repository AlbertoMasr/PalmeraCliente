<?php

namespace App;

use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\MockObject\Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CarritoDeCompraDAO extends DB
{

    public function añadir($cdc)
    {

        return DB::select("CALL sp_agregar_productos_carrito(".$cdc->getIdClientes().",".$cdc->getIdDatiles().",".$cdc->getCantidades()." )")[0];
    
    }

    public function getArticulos($idCliente)
    {

        return CarritoDeCompra::where('idCliente', '=', $idCliente)->get();

    }

}