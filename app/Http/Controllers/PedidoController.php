<?php

namespace App\Http\Controllers;

use App\Datil;
use App\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{

    private $pedido;
    private $datil;

    public function __construct()
    {

        $this->pedido = new Pedido();
        $this->datil  = new Datil();

    }
    
    public function iniciaPedido()
    {

       $datiles = $this->datil->getDatiles();

       return view('home', compact('datiles'));

    }

    public function seleccionarProducto(Datil $datil)
    {

            return view('datil', compact('datil'));

    }

    public function agregarProducto(Request $request)
    {

        $data = request()->validate([
            'cantidad' => 'required|numeric',
            'idDatil' => 'required|numeric'
        ]);

        if(!Auth::check())
        {

            $logearse = 'Favor de logearse para agregar producto';

            return redirect()->route('login')
            ->with('mensaje', $logearse);

        }

        $respuesta = json_decode($this->pedido->agregarProducto( $data["idDatil"], $data["cantidad"], Auth::user()->Clientes->getID()));

        return redirect()->action("PedidoController@iniciaPedido")->with($respuesta->tipo, $respuesta->mensaje);

    }

    public function confirmarPedido($idCliente)
    {

        $productoCarrito = $this->pedido->getArticulos($idCliente);

        return view('carrito')->with('productoCarrito',$productoCarrito);

    }

    public function eliminarProductoCarrito($idCliente, $idDatil){
        
        dd($idCliente);

    }

}
