<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    protected $table = "pedidos";
    protected $primaryKey = 'idPedido';
    protected $fillable = ['Cliente', 'Empleado', 'Entregado', 'FechaPedido', 'FechaEntregado'];
    
    public function agregarProducto($datil, $cantidad, $idCliente)
    {

        $cdc = new ProductosCarrito();
        $cdc->setIdDatiles($datil);
        $cdc->setCantidades($cantidad);
        $cdc->setIdClientes($idCliente);

        $respuesta = $cdc->añadir();

        return json_encode($respuesta);

    }

    public function getArticulos($idCliente)
    {

        $cdc = new ProductosCarrito();
        return $cdc->getArticulos($idCliente);

    }

    public function getTotal($productosCarrito){

        $cdc = new ProductosCarrito();
        
        $total = $cdc->getSubTotal($productosCarrito);

        return $total;


    }

    public function eliminarProductoCarrito($idCliente, $iDatil){

        $cdc = new ProductosCarrito();

        $respuesta = $cdc->eliminarProductoCarrito($idCliente, $iDatil);

        return json_encode($respuesta);

    }

    public function actualizarProductoCarrito($idCliente, $datil, $cantidad)
    {

        $cdc = new ProductosCarrito();
        $cdc->setIdDatiles($datil);
        $cdc->setCantidades($cantidad);
        $cdc->setIdClientes($idCliente);

        $respuesta = $cdc->actualizarProductoCarrito();

        return json_encode($respuesta);

    }    

    public function realizarPago($NoTarjeta, $CVV, $Total)
    {

        dd($NoTarjeta);

    }        

}