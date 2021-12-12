<?php

namespace App\DataBase;

use App\Pedido;
use Illuminate\Support\Facades\DB;

class PedidoDAO extends DB
{

    public function guardarPedido($pedido)
    {

        $resultado = $pedido->save();

        dd($resultado);

        return true;

    }

    public function actualizarInventario($pedido)
    {

        return DB::select("CALL sp_actualizar_inventario(".$pedido->getCliente().")")[0];

    }

}
