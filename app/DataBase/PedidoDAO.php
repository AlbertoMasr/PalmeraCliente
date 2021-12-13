<?php

namespace App\DataBase;

use App\Pedido;
use Illuminate\Support\Facades\DB;

class PedidoDAO extends DB
{

    public function guardarPedido($pedido)
    {

        return DB::select("CALL sp_actualizar_inventario(".$pedido->getCliente().")")[0];

    }

}
