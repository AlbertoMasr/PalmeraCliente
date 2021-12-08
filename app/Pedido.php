<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    protected $table = "pedidos";
    protected $primaryKey = 'idPedido';
    protected $fillable = ['Cliente', 'Empleado', 'Entregado', 'FechaPedido', 'FechaEntregado'];
    
    public $productosCarritoDAO;

    public function __construct()
    {

        $this->productosCarritoDAO = new productosCarritoDAO();
        
    }

    public function agregarProducto($datil, $cantidad, $idCliente)
    {

        $cdc = new ProductosCarrito();
        $cdc->setIdDatiles($datil);
        $cdc->setCantidades($cantidad);
        $cdc->setIdClientes($idCliente);

        $respuesta = $this->productosCarritoDAO->añadir($cdc);

        return json_encode($respuesta);

    }

    public function getArticulos($idCliente)
    {

        return $this->productosCarritoDAO->getArticulos($idCliente);

    }

}