<?php

namespace App;

use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\MockObject\Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductosCarritoDAO extends DB
{

    public function añadir($cdc)
    {

        return DB::select("CALL sp_agregar_productos_carrito(".$cdc->getIdClientes().",".$cdc->getIdDatiles().",".$cdc->getCantidades()." )")[0];
    
    }

    public function getArticulos($idCliente)
    {

        return ProductosCarrito::where('idCliente', '=', $idCliente)->get();

    }

    public function eliminarProductoCarrito($idCliente, $idDatil){

        try{

            ProductosCarrito::where('idCliente', '=', $idCliente)->where('idDatil', '=', $idDatil)->delete();

            $respuesta = array(
                "tipo" => "mensaje",
                "mensaje" => "Producto eliminado correctamente"
            );

        }catch(Exception $e){

            $respuesta = array(
                "tipo" => "error",
                "mensaje" => "Ocurrio un error al eliminar el producto"
            );            

        }

        return $respuesta;

    }

    public function actualizarProductoCarrito($cdc)
    {

        return DB::select("CALL sp_actualizar_producto_carrito(".$cdc->getIdClientes().",".$cdc->getIdDatiles().",".$cdc->getCantidades()." )")[0];
    
    }    

}