<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    protected $table = "pedidos";
    protected $primaryKey = 'idPedido';
    protected $fillable = ['Cliente', 'Empleado', 'Entregado', 'FechaPedido', 'FechaEntregado'];
    
    public $carritoDeCompraDAO;

    public function __construct()
    {

        $this->carritoDeCompraDAO = new CarritoDeCompraDAO();
        
    }

    public function agregarProducto($datil, $cantidad, $idCliente)
    {

        $cdc = new CarritoDeCompra($datil, $cantidad, $idCliente);

        $respuesta = $this->carritoDeCompraDAO->añadir($cdc);

        return json_encode($respuesta);

    }

}