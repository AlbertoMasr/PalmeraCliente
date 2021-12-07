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

        $cdc = new CarritoDeCompra();
        $cdc->setIdDatiles($datil);
        $cdc->setCantidades($cantidad);
        $cdc->setIdClientes($idCliente);

        $respuesta = $this->carritoDeCompraDAO->añadir($cdc);

        return json_encode($respuesta);

    }

    public function getArticulos($idCliente)
    {

        return $this->carritoDeCompraDAO->getArticulos($idCliente);

    }

}