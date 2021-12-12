<?php

namespace App;

use App\DataBase\PedidoDAO;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    protected $table = "pedidos";
    protected $primaryKey = 'idPedido';
    protected $fillable = ['Cliente'];
    public $timestamps = false;

    private $pedidoDAO;

    public function __construct()
    {

        $this->pedidoDAO = new PedidoDAO();
        
    }

    public function setCliente($cliente)
    {

        $this->Cliente = $cliente;

    }

    public function getCliente()
    {

        return $this->Cliente;

    }
    
    public function agregarProducto($datil, $cantidad, $idCliente)
    {

        $cdc = new ProductoCarrito();
        $cdc->setIdDatiles($datil);
        $cdc->setCantidades($cantidad);
        $cdc->setIdClientes($idCliente);

        $respuesta = $cdc->añadir();

        return json_encode($respuesta);

    }

    public function getArticulos($idCliente)
    {

        $cdc = new ProductoCarrito();
        return $cdc->getArticulos($idCliente);

    }

    public function getTotal($ProductoCarrito){

        $cdc = new ProductoCarrito();

        $st = 0.0;

        foreach ($ProductoCarrito as $productoCarrito)
        {

            $st += ($cdc->getSubTotal($productoCarrito) * $productoCarrito->getCantidades() );
        
        }
        
        return $st;


    }

    public function eliminarProductoCarrito($idCliente, $iDatil){

        $cdc = new ProductoCarrito();

        $respuesta = $cdc->eliminarProductoCarrito($idCliente, $iDatil);

        return json_encode($respuesta);

    }

    public function actualizarProductoCarrito($idCliente, $datil, $cantidad)
    {

        $cdc = new ProductoCarrito();
        $cdc->setIdDatiles($datil);
        $cdc->setCantidades($cantidad);
        $cdc->setIdClientes($idCliente);

        $respuesta = $cdc->actualizarProductoCarrito();

        return json_encode($respuesta);

    }    

    public function realizarPago($NoTarjeta, $FechaVencimiento, $CVV, $Total)
    {

        $pago = new Pago($NoTarjeta, $FechaVencimiento, $CVV, $Total);

        return $pago->getRespuesta();

    }        

    public function esCompletado()
    {

        $pedido = $this->pedidoDAO->guardarPedido($this);

        if(!$pedido)
            return 0;

        $inventario = $this->pedidoDAO->actualizarInventario($this);

        if(!$inventario)
            return 0;

        return 0;

    }

}